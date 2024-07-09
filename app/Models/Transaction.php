<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TravelPackage;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'travel_package_id',
        'tourists_number',
        'phone_number',
        'date_start',      
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Travel_Package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }
}
