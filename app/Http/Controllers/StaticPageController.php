<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Cache;

class StaticPageController extends BaseController
{
    public function staticpage($slug){
    	
    	$context = $this->get_context_data();
    	$page = Cache::remember('page_'.$slug,60,function() use ($slug){
            return Page::where('slug', $slug)->limit(1)->first();
            });
	    if(!$page){
	        \App::abort(404);
	    }
	    if ($page->link != '') {
	    	\App::abort(404);
	    }
	    return view('staticpage', compact(
	        'page', 'context'
	    ));
    }
}
