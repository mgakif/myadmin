<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function image(){
    	return $this->hasMany('App\Models\Image','model_id','articles_id');
    }
    protected $table = 'pictures';
    
}
