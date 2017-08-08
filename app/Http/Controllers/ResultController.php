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
    	Result::create($item); 
    	
    	//address_components
    	Component::create($item);
		     	
     	// geometry
     	Geometry::create($item);
     	
    	//opening hours
    	OpeningHour::create($item);
    	
		//period
		Period::create($item);
		    	
    	//weekday text
    	WeekdayText::create($item);
		    	
    	//photos
    	Photo::create($item);
    	
    	//reviews
    	Review::create($item);
		    	
    	//type
    	Type::create($item);
	}
}
