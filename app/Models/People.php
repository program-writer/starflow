<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'country_code',
        'email',
        'birthday',
    ];
}
