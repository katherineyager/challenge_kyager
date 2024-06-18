<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'locationid', 'applicant', 'facilitytype', 'cnn', 'locationdescription', 'address',
        'blocklot', 'block', 'lot', 'permit', 'status', 'fooditems', 'x', 'y',
        'latitude', 'longitude', 'schedule', 'dayshours'
    ];
}