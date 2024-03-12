<?php

namespace App\Http\Controllers;

use App\Models\Capability;
use App\Models\Point;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PointController extends Controller
{
    public function index(){
        $capabilities= Capability::select('id','name')->get();
        $countries = Country::select('id','name','latitude','longitude')->whereNotNull('name')->get();

        return view('index',compact('countries','capabilities'));
    }
    public function fetchGeoserverData(Request $request)
    {
        // Retrieve parameters from the request
        $srs = $request->srs ?? '';
        $sw = $request->sw ?? '';
        $ne = $request->ne ?? '';
        $size = $request->size ?? '';
        $xy = $request->xy ?? '';
        // Build GeoServer URL
        if($request->zoom['zoom']< 5){

        $geoServerURL = 'http://localhost:8080/geoserver/talha/wms?' .
            'service=WMS' .
            '&version=1.1.1' .
            '&request=GetFeatureInfo' .
            '&layers=talha:countries' .
            '&info_format=application/json' .
            '&srs=' . $srs['srs'] . // Assuming $crs is available in your context
            '&bbox=' . $sw['x'] . "," . $sw['y'] . "," . $ne['x'] . "," . $ne['y'] .
            '&width=' . $size['x'] .
            '&height=' . $size['y'] .
            '&query_layers=talha:countries' .
            '&feature_count=4' .
            '&x=' . round($xy['x']) .
            '&y=' . round($xy['y']);
        }else{
            $geoServerURL = 'http://localhost:8080/geoserver/talha/wms?' .
                'service=WMS' .
                '&version=1.1.1' .
                '&request=GetFeatureInfo' .
                '&layers=talha:cities' .
                '&info_format=application/json' .
                '&srs=' . $srs['srs'] . // Assuming $crs is available in your context
                '&bbox=' . $sw['x'] . "," . $sw['y'] . "," . $ne['x'] . "," . $ne['y'] .
                '&width=' . $size['x'] .
                '&height=' . $size['y'] .
                '&query_layers=talha:cities' .
                '&feature_count=4' .
                '&x=' . round($xy['x']) .
                '&y=' . round($xy['y']);
        }

        // Use cURL or any HTTP library to make the request to GeoServer\
        $ch = curl_init($geoServerURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $res = json_decode($response, true);

// Check if "features" key exists before accessing it
        if (isset($res['features'])) {
//            if (isset($res['features'][0]['properties']['name']);
            // Return the GeoServer response with "features" property
            if($request->zoom['zoom'] < 5){
                $points  =  Point::where('country_id',$res['features'][0]['properties']['id'])
                    ->get();
            }else{
                $points  =  Point::where('city_id',$res['features'][0]['properties']['id'])
                    ->get();
            }
            return response()->json([
                'data' => $points,
                'success' => true,
                'message' => 'Point Loaded Successfully'
            ]);
        } else {
            // If "features" key is not present, handle the error or return an appropriate response
            return response()->json(['error' => 'No features found']);
        }
    }
}
