<?php
namespace App\Helper;
use DB;
class UniqueSlug{
	public static function slug($tobeslug,$table){
		$slug = str_slug($tobeslug);
		$latestSlug =
               DB::table($table)->whereRaw("slug = '$slug' or slug LIKE '$slug-%'")
                   ->latest('id')
                   ->value('slug');
                   //dd($latestSlug);
           if ($latestSlug) {
               $pieces = explode('-', $latestSlug);

               $number = intval(end($pieces));

               $slug .= '-' . ($number + 1);
           }
           return $slug;

	}
}