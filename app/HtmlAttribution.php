<?php

namespace App;

class HtmlAttribution extends Model
{
    public static function create($photo, $photo_id){
    foreach($photo->html_attributions as $attribution){
    	return static::firstOrCreate([
	    	'photo_id' => $photo_id,
	    	'attribution' => $attribution,
    	]);
    }
	}
}
