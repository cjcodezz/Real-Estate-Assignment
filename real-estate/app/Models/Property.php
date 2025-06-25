<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price',
        'area_sqft',
        'address',
        'description',
        'image_path'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}