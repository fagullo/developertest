<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    /**
     * Massive assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'properties', 'image',
    ];
}
