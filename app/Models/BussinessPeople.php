<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessPeople extends Model
{
    use HasFactory;
    protected $fillable = ['country_id',
    'country_name',
    'name',
    'image',
    'desc'];
}
