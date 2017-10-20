<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    protected $fillable = [
        'name', 'price', 'image'
    ];

}
