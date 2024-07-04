<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'original_price',
        'current_price',
        'description',
        'day',
        'night'
    ];
}
