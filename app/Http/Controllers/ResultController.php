<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Component;
use App\ComponentType;
use App\Geometry;
use App\Location;
use App\OpeningHour;
use App\WeekdayText;
use App\Type;
use App\Review;
use App\HtmlAttribution;
use App\Photo;
use App\Period;

class ResultController extends Controller
{
    public static function store($item){
    	
 
    	//result items
    	Result::create([
			'adr_address' => isset($item->result->adr_address) 
				? $item->result->adr_address 
				: null,
			'formatted_address' => isset($item->result->formatted_address) 
				? $item->result->formatted_address 
				:null ,
			'icon' => isset($item->result->icon) 
				? $item->result->icon 
				: null,
			'id' => isset($item->result->id) 
				? $item->result->id 
				: null,
			'international_phone_number' => isset($item->result->international_phone_number) 
				? $item->result->international_phone_number
				: null,
			'name' => isset($item->result->name) 
				? $item->result->name 
				: null,
			'place_id' => isset($item->result->place_id) 
				? $item->result->place_id 
				: null,
			'price_level' => isset($item->result->price_level) 
				? $item->result->price_level 
				: null,
			'rating' => isset($item->result->rating) 
				? $item->result->rating 
				: null,
			'reference' => isset($item->result->reference) 
				? $item->result->reference 
				: null ,
			'scope' => isset($item->result->scope) 
				? $item->result->scope 
				: null,
			'url' => isset($item->result->url) 
				? $item->result->url 
				: null,
			'utc_offset' => isset($item->result->utc_offset) 
				? $item->result->utc_offset 
				: null,
			'vicinity' => isset($item->result->vicinity) 
				? $item->result->vicinity 
				: null,
    	]); 
    	
    	//address_components
    	if(isset($item->result->address_components)):
	    	foreach($item->result->address_components as $address_components){
	    		Component::create([
	    			'result_id' => isset($item->result->id)
	    				? $item->result->id
	    				: null,
		    		'long_name' => isset($address_components->long_name)
		    			? $address_components->long_name
		    			: null,
		    		'short_name' => isset($address_components->short_name)
		    			? $address_components->short_name
		    			: null,
	    		]);
	    		
	    		$components = Component::where('long_name', $address_components->long_name)->get();
	    		
	    		foreach ($components as $component){
	    			$component_id = $component->id;
	    		}
	    		
	    		foreach ($address_components->types as $type){
	    			ComponentType::create([
	    				'component_id' => $component_id,
	    				'name' => $type,
	    			]);
	 	   		}
	     	}
		endif;
		     	
     	// geometry
     	Geometry::create([
				'result_id' => isset($item->result->id)
					? $item->result->id
					: null,
				'location_lat' => isset($item->result->geometry->location->lat)
					? $item->result->geometry->location->lat
					: null,
				'location_lng' => isset($item->result->geometry->location->lng)
					? $item->result->geometry->location->lng
					: null,
				'viewport_northeast_lat' => isset($item->result->geometry->viewport->northeast->lat)
					? $item->result->geometry->viewport->northeast->lat
					: null,
				'viewport_northeast_lng' => isset($item->result->geometry->viewport->northeast->lng)
					? $item->result->geometry->viewport->northeast->lng
					: null,
	    		'viewport_southwest_lat' => isset($item->result->geometry->viewport->southwest->lat)
	    			? $item->result->geometry->viewport->southwest->lat
	    			: null,
	    		'viewport_southwest_lng' => isset($item->result->geometry->viewport->southwest->lng)
	    			? $item->result->geometry->viewport->southwest->lng
	    			: null,
     	]);
     	
    	
    	OpeningHour::create([
    		'result_id' => isset($item->result->id)
    			? $item->result->id
    			: null,
    		'open_now' => isset($item->result->opening_hours->open_now)
    			? $item->result->opening_hours->open_now
    			: null,
    	]);
    	
		if(isset($item->result->opening_hours->periods)):
	    	foreach($item->result->opening_hours->periods as $period){
	    		Period::create([
					'opening_hours_id' => isset($item->result->id)
						? $item->result->id
						: null,
					'close_day' => isset($period->close->day)
						? $period->close->day
						: null,
					'close_time' => isset($period->close->time)
						? $period->close->time
						: null,
					'open_day' => isset($period->open->day)
						? $period->open->day
						: null,
					'open_time' => isset($period->open->time)
						? $period->open->time
						: null,
	    		]);
	    	}
		endif;
		    	
    	if(isset($item->result->opening_hours->weekday_text)):
	    	foreach($item->result->opening_hours->weekday_text as $weekday_text){
	    		WeekdayText::create([
					'opening_hours_id' => isset($item->result->id)
						? $item->result->id
						: null,			
					'body'=> $weekday_text,
	    		]);	
	    	}
		endif;
		    	
    	if(isset($item->result->photos)):
	    	foreach($item->result->photos as $photo){
	  			Photo::create([
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
	  			
	  			foreach($photo->html_attributions as $attribution){
	  				HtmlAttribution::create([
	  					'photo_id' => $photo_id,
	  					'attribution' => $attribution,
					]);
	  			}	
	    	}
    	endif;
    	
    	if(isset($item->result->reviews)):
	    	foreach($item->result->reviews as $review){
	    		Review::create([
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
		    	
    	if(isset($item->result->types)):
	    	foreach($item->result->types as $type){
	    		Type::create([
	    			'result_id' => isset($item->result->id)
	    				? $item->result->id
	    				: null,
					'body' => $type,
	    		]);
	    	}
	    endif;
			
	}
}
