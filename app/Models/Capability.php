<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Point;

class Capability extends Model
{
    use HasFactory;
    protected $fillable = ['name','desc'];

    public function points(){
        return $this->hasMany(Point::class);
    }
}
