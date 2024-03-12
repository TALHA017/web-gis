<!doctype html>
<html lang="en">
<head>
    <title>Gis Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://qa.fms-sfd.com/assets/css/L.switchBasemap.css"/>
    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>

</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" style="background-color: #d87c0a">
        <div class="custom-menu" style="z-index: 100000;">
            <button type="button" id="sidebarCollapse" class="btn btn-primary" style="">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>

        <div class="p-3 pt-4 text-center DynamicLabel" style="background-color: #c97001">
            {{--		  		<h5 style="color: white"><a class="logo" style="color: white">Geo-spatial Map</a></h5>--}}
            <div>
                <div class="row">
                    {{--                    <div class="col-2 mt-3 float-right">--}}
                    {{--                        <i class="fa fa-backward"></i>--}}
                    {{--                    </div>--}}
                    <div class="col-12 float-left ml-n4">
                        <h1 class="text-white Hidelabel CapabilityLabel">Capabilities</h1>
                        <h3 class="text-white Hidelabel countryLabel"></h3>
                        <h3 class="text-white Hidelabel contractLabel"></h3>
                    </div>

                </div>

            </div>


            <div class="footer" style="position: absolute;
            bottom: 0;
">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    <BR>Made<i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank"
                                                                                style="color: white">Gis-Experts</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

        </div>


        <div class=" mt-4 text-white HideAll capabilitiesDiv" style="color: white !important;">
            <p class="ml-3 ">Select a capability to view Countries</p>
            <ul class="list-group text-white ">
                @foreach($capabilities as $capabilty)
                    <li class="list-group-item text-white"><a href="javascript:void(0)"
                                                              data-id="{{$capabilty->id ?? ''}}"
                                                              onclick="showHideDetails('{{ $capabilty->name ?? '' }}', 'country')">
                            <h4 class="text-white ">{{ $capabilty->name ?? '' }}</h4></a></li>
                @endforeach
            </ul>
        </div>


        <div class=" mt-4 text-white HideAll CountriesDiv" style="color: white !important;display: none">
            <p class="ml-3 ">Select a Country to view contacts and operating companies.</p>
            <ul class="list-group text-white " style="max-height: 300px;overflow-y: scroll">
                @foreach($countries as $country)
                    <li class="list-group-item text-white {{$country->id ?? ''}}"><a href="javascript:void(0)"
                                                                                     data-id="{{$country->id ?? ''}}"
                                                                                     data-latitude="{{$country->latitude ?? ''}}"
                                                                                     data-longitude="{{$country->longitude ?? ''}}"
                                                                                     onclick="showHideDetails( '{{ $country->name ?? ''}}' , 'contract',{{$country->latitude ?? 'null'}}, {{$country->longitude ?? 'null'}})">
                            <h4 class="text-white ">{{ $country->name ?? '' }}</h4></a></li>
                @endforeach
            </ul>
        </div>

        <div class=" mt-4 text-white HideAll contractsOperatingCompaniesDiv"
             style="color: white !important;display: none">
            <p class="ml-3 "></p>
            <ul class="list-group text-white ">
                <div class="row p-3">
                    <div class="col-4">
                        <img src="{{ asset('assets/BussinessPeople/regional-contact.jpg') }}" class="rounded"
                             width="100px" height="100px" alt="...">
                    </div>
                    <div class="col-8 ps-4 pe-4">
                        <h5>Zane Brink</h5>
                        <p class="font-italic">Regional President, Central</p>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-4">
                        <img src="{{ asset('assets/BussinessPeople/regional-bio.jpg') }}" class="rounded" width="100px"
                             height="100px" alt="...">
                    </div>
                    <div class="col-8 ps-4 pe-4">
                        <h5>Zane Brink</h5>
                        <p class="font-italic">Regional President, Central</p>
                    </div>
                </div>
                <div class="ps-3 pe-3">
                    <h3><b>Operating Companies: </b></h3>
                    <div class="card">
                        <div class="card-body " style="background-color: white">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('assets/Companies/Blattner-logo-for-website-10.png') }}"
                                         class="rounded" width="100px"
                                         height="100px" alt="...">
                                </div>
                                <div class="col-8 ps-4 pe-4">
                                    <h5>Blanter</h5>
                                    <p class="font-italic text-black-50">392 County Road 50 Avon, MN 56310</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </ul>
        </div>


        <div class="p-3 pt-4 text-start mt-4">
            {{--		  		<h5 style="color: white"><a class="logo" style="color: white">Geo-spatial Map</a></h5>--}}
            <div>
                <h6 class="text-white">Point Address:</h6>
                <h6 class="card-subtitle mt-2  text-white card-title" id="PropAddress"></h6>
            </div>

            {{--<ul class="list-unstyled components mb-5">
              <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
                </ul>
              </li>
              <li>
                  <a href="#">About</a>
              </li>
              <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
              </li>
              <li>
              <a href="#">Portfolio</a>
              </li>
              <li>
              <a href="#">Contact</a>
              </li>
            </ul>

            <div class="mb-5">
                        <h3 class="h6">Subscribe for newsletter</h3>
                        <form action="#" class="colorlib-subscribe-form">
                <div class="form-group d-flex">
                    <div class="icon"><span class="icon-paper-plane"></span></div>
                  <input type="text" class="form-control" placeholder="Enter Email Address">
                </div>
              </form>
                    </div>
--}}


        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="">
        <div id="map"></div>
    </div>
</div>

{{--    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="{{ asset('assets/js/popper.js') }}"></script>
{{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://qa.fms-sfd.com/assets/js/L.switchBasemap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script>
    var map = L.map('map').setView([0, 0], 2);
    var customZoomControl = L.control.zoom({position: 'topright'});
    map.addControl(customZoomControl);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    new L.basemapsSwitcher([{
        layer: L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '&copy; Esri Maps</a>',
                zIndex: 1,
                maxZoom: 19
            }).addTo(map),
        icon: "{{ asset('assets/images/img2.PNG') }} ",
        name: 'Satellite'
    },
        {
            layer: L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                zIndex: 1,
                maxZoom: 19
            }), //DEFAULT MAP
            icon: "{{ asset('assets/images/img1.PNG') }} ",
            name: 'Street'
        },
        {
            layer: L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                zIndex: 1,
                maxZoom: 19
            }),
            icon: "{{ asset('assets/images/img3.PNG') }} ",
            name: 'Topographic'
        },
    ], {
        position: 'topright'
    }).addTo(map);


    var countriesLayer = L.tileLayer.wms('{{env("GeoServerPath")}}', {
        layers: 'talha:countries',
        transparent: true,
        format: "image/png",
        zIndex: 7,
        opacity: 0.9
    }).addTo(map);

    var citiesLayer = L.tileLayer.wms('{{env("GeoServerPath")}}', {
        layers: 'talha:cities',
        transparent: true,
        format: "image/png",
        zIndex: 6,

    }).addTo(map);



    // var thresholdZoom =;
    // Function to toggle layers based on zoom level
    function toggleLayersByZoom() {
        var currentZoom = map.getZoom();
        var thresholdZoom = 5; // Adjust this to your desired zoom level
        // console.log(currentZoom);

        // Toggle visibility based on zoom level
        if (currentZoom < thresholdZoom) {
            map.removeLayer(citiesLayer);
            map.addLayer(countriesLayer);
        } else {
            map.removeLayer(countriesLayer);
            map.addLayer(citiesLayer);

        }
    }

    // Listen for zoomend event and call the toggleLayersByZoom function
    map.on('zoomend', toggleLayersByZoom);

    var customIcon = L.icon({
        iconUrl: "{{ asset('assets/images/sticky-marker.png')}}",
        iconSize: [32, 32], // specify the icon size
    });

    /* Load Map details */

    clickMarker = '';
    map.on('click', function (e) {
        var latlng = e.latlng;
        var centroid = e.latlng;
        var currentZoom = map.getZoom();


        if (typeof centroid.lat != 'undefined') {
            $('#latlng_input').val(centroid.lat + ', ' + centroid.lng);
        }

        let size = map.getSize(),
            crs = map.options.crs,
            bounds = map.getBounds(),
            xy = map.latLngToContainerPoint(centroid, map.getZoom()),
            sw = crs.project(bounds.getSouthWest()),
            ne = crs.project(bounds.getNorthEast());

        // Using AJAX to fetch records from GeoServer

        $.ajax({
            url: '/fetch-geoserver-data',
            type: 'GET',
            dataType: 'json',
            data: {
                // Pass necessary parameters here
                srs: {srs: crs.code},
                zoom: {zoom: currentZoom},
                sw: {x: sw.x, y: sw.y},
                ne: {x: ne.x, y: ne.y},
                size: {x: size.x, y: size.y},
                xy: {x: Math.round(xy.x), y: Math.round(xy.y)},
            },
            success: function (response) {
                // Handle the response data here
                map.eachLayer(function (layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });
                var newMarkers = response.data;

                newMarkers.forEach(function (newMarker) {
                    // Ensure that coordinates are valid
                    var latitude = newMarker.lat || '';
                    var longitude = newMarker.long || '';
                    var countryName = newMarker.country_name || '';
                    var cityName = newMarker.city_name || '';  // Assuming cityName is a property in your response
                    var capabilityName = newMarker.capability_name || '';  // Assuming cityName is a property in your response

                    if (latitude && longitude) {
                        var marker = L.marker([latitude, longitude], {icon: customIcon}).addTo(map);
                        // Create a popup content with styling
                        var popupContent = "<div style='text-align: center;'>" +
                            "<b>Coordinates:</b> " + latitude + ", " + longitude +
                            "<br><b>Country:</b> " + countryName + "<br>" +
                            "<b>City:</b> " + cityName + "<br>" +
                            "<b>Capability:</b> " + capabilityName + "<br>" +
                            "</div>";

                        marker.bindPopup(popupContent);
                    }
                    marker.on('click', function () {
                        // Fetch records and display in sidebar (replace the following with your actual logic)
                        var markerRecords = fetchRecordsForMarker(newMarker); // Implement your own function to fetch records
                        displayRecordsInSidebar(markerRecords);
                    });
                });
                if (clickMarker) {
                    map.removeLayer(clickMarker);
                }
                clickMarker = L.marker(centroid).bindPopup(centroid).addTo(map);
            },
            error: function (xhr, status, error) {
                // Handle errors here
                console.error('Error fetching records from GeoServer:', error);
            }
        });
    });

    function fetchRecordsForMarker(marker) {
        // Implement your logic to fetch records based on the clicked marker
        // You can use marker properties (e.g., newMarker.lat, newMarker.long) to identify the marker
        // Replace the following line with your actual logic
        return "Records for Point at " + marker.lat + ", " + marker.long + " City Name: " + marker.city_name + ", Country Name: " + marker.country_name+ ", Capability Name: " + marker.capability_name || '';
    }

    function displayRecordsInSidebar(records) {
        // Implement your logic to display records in the sidebar
        // Replace the following line with your actual logic
        $('#PropAddress').html(records);
    }

    function dynamicCard(label, type) {
        $('.Hidelabel').text('');
        if (type == 'country') {
            let concatenatedHtml = `<a onclick="showHideDetails('Capabilities', 'capabilities')"><i class="fa fa-chevron-left mr-4"></i></a> ${label} `;
            $('.DynamicLabel .countryLabel').html(concatenatedHtml);
        }

        if (type == 'contract') {
            let concatenatedHtml = `<a onclick="showHideDetails('${label}', 'country')"><i class="fa fa-chevron-left mr-4"></i></a> ${label}`;
            $('.DynamicLabel .contractLabel').html(concatenatedHtml);
        }

        if (type == 'capabilities') {``
            let concatenatedHtml = `${label}`;
            $('.DynamicLabel .CapabilityLabel').html(concatenatedHtml);
        }
    }

    function showHideDetails(capabilityName, type,latitude=null,longitude=null) {
        // Display the hidden div
        $('.HideAll').hide();
        if (type == 'country') {
            $('.CountriesDiv').show();
            dynamicCard(capabilityName, type)
        }
        /* For Country */
        if (type == 'contract') {
            $('.contractsOperatingCompaniesDiv').show();
            dynamicCard(capabilityName, type)
        }
        /* For Capabilities */
        if (type == 'capabilities') {
            $('.capabilitiesDiv').show();
            dynamicCard('Capabilities', type)
        }
/*
        var latitude = $(this).data('latitude');
        var longitude = $(this).data('longitude');
        alert(latitude)*/

        // Check if latitude and longitude are provided
        if (latitude !== null && longitude !== null) {
            // Assuming you have a Leaflet map object named 'map'
            if (clickMarker) {
                map.removeLayer(clickMarker);
            }
            var centroid = [latitude, longitude]
            clickMarker = L.marker(centroid).bindPopup(capabilityName).addTo(map).openPopup();// Set the view to the specified coordinates
            map.setView([parseFloat(latitude), parseFloat(longitude)], 4);

        }

        // You can use the capabilityId to load content or perform additional actions
        // For example, you might want to make an Ajax call to fetch details based on the capabilityId
        // and update the content of the hidden div.
    }

    // Assuming you have a Leaflet map object named 'map'
    var countriesGeoJSON;
    $.ajax({
        url: '{{ env("GeoServerPath") }}/wfs',
        type: 'GET',
        data: {
            service: 'WFS',
            version: '2.0.0',
            request: 'GetFeature',
            typeName: 'talha:countries',
            outputFormat: 'application/json'
        },
        success: function (data) {
            // Create a GeoJSON layer with custom styling
            countriesGeoJSON = L.geoJSON(data, {
                style: function (feature) {
                    return {
                        fillColor: 'rgba(216,124,10,0.65)', // Change this to your default fill color
                        color: 'rgba(245,245,245,0.4)', // Change this to your default border color
                        weight: 1,
                        opacity: 0.7,
                        fillOpacity: 0.7
                    };
                },
                onEachFeature: function (feature, layer) {
                    // Add hover effect
                    layer.on({
                        mouseover: function (e) {
                            var layer = e.target;
                            layer.setStyle({
                                fillColor: '#d87c0a', // Change this to your hover fill color
                                color: '#d87c0a', // Change this to your hover border color
                                weight: 2,
                                opacity: 1,
                                fillOpacity: 0.9
                            });
                        },
                        mouseout: function (e) {
                            countriesGeoJSON.resetStyle(e.target);
                        }
                    });
                }
            }).addTo(map);
        }
    });

    // Load GeoJSON data from GeoServer using AJAX




</script>


</body>
</html>
