<?php

namespace App\Models;
use URL;
use Str;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'link', 'description', 'sort_order', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('Page');
    }

    public function get_absolute_url() {
        if ($this->link) {
            return $this->link;
        }
        return URL::route('page',
            array('slug' => $this->slug));
    }

}
