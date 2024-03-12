<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = ['capability_id,capability_name'];
    use HasFactory;
    protected $casts = [
        'lat' => 'float',
        'long' => 'float',
    ];
    public function capability(){
        return $this->belongsTo(Capability::class);
    }
}
