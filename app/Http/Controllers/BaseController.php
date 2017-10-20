<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Page;

class BaseController extends Controller
{
    protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public function parent_pages(){
		return Page::whereNull('parent_id')->orWhere('parent_id',0)
					   ->orderBy('sort_order', 'ASC');
	}

	public function sub_pages(){
		$data = array();
		$parent_pages = $this->parent_pages()->get();
		foreach ($parent_pages as $page)
		{
		    $data[$page->id] = Page::where('parent_id', '=', $page->id)
		    						->orderBy('sort_order', 'ASC')->get();
		}
		return $data;
	}

	public function get_footer() {
		$data = array();
		$main_footer = Page::where('is_footer', '=', 1)
						   ->orderBy('sort_order', 'ASC')
						   ->take(4)
						   ->get();
		foreach ($main_footer as $page)
		{
		    $data['sub'][$page->id] = Page::where('parent_id', '=', $page->id)
		    						->orderBy('sort_order', 'ASC')->get();
		}
		$data['main'] = $main_footer;
		return $data;
	}
	public function get_context_data(){
	    Cache::flush();
        
		$context = array();

		$context['parent_pages'] = Cache::remember('parent_pages',60,function(){
			return $this->parent_pages()->get();
		});
                //Cache::flush();
		$context['pages'] = Cache::remember('pages',60,function(){
			return $this->sub_pages();
		});
		$context['footer'] = Cache::remember('footer',60,function(){
			return $this->get_footer();
		});
		return $context;
	}
}
