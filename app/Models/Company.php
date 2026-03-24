<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'title',
        'image',
        'slug',
        'description',
        'email',
        'phone',
        'business_address',
        'country_id',
        'is_verified',
        'is_activated',
    ];
}
