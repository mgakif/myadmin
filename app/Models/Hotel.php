<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'category', 'description','city','address'
    ];

    public function image(){
    	return $this->hasMany('App\Models\Image','model_id','id');
    }
   
}
