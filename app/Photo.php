<?php

namespace App;

class Photo extends Model
{
    public static function create($item){
    	if(isset($item->result->photos)):
	    	foreach($item->result->photos as $photo){
	    		return static::firstOrCreate([
	    		'height' => isset($photo->height)
	    		? $photo->height
	    		: null,
	    		'photo_reference' => isset($photo->photo_reference)
	    		? $photo->photo_reference
	    		: null,
	    		'width' => isset($photo->width)
	    		? $photo->width
	    		: null,
	    		]);
	    	
	    		$photos = Photo::where('photo_reference', $photo->photo_reference)->get();
	    	
	    		foreach($photos as $img){
	    			$photo_id = $img->id;
	    		}
	    	
	    		HtmlAttribution::create($photo, $photo_id);
	    	}
    	endif;
	}
}
