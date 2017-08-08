<?php

namespace App;

class Review extends Model
{
    public static function create($item){
	    if(isset($item->result->reviews)):
		    foreach($item->result->reviews as $review){
		    	return static::firstOrCreate([
			    	'result_id' => isset($item->result->id)
			    	? $item->result->id
			    	: null,
			    	'author_name' => isset($review->author_name)
			    	? $review->author_name
			    	: null,
			    	'author_url' => isset($review->author_url)
			    	? $review->author_url
			    	: null,
			    	'language' => isset($review->language)
			    	? $review->language
			    	: null,
			    	'profile_photo_url' => isset($review->profile_photo_url)
			    	? $review->profile_photo_url
			    	: null,
			    	'rating' => isset($review->rating)
			    	? $review->rating
			    	: null,
			    	'relative_time_description' => isset($review->relative_time_description)
			    	? $review->relative_time_description
			    	: null,
			    	'text' => isset($review->text)
			    	? $review->text
			    	: null,
			    	'time' => isset($review->time)
			    	? $review->time
			    	: null,
		    	]);
		    }
	    endif;
	}
}
