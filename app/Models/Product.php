<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'category_id',
        'price',
        'slug',
        'sku',
        'company_id',
        'is_published',
        'is_activated',
        'views',
    ];
}
