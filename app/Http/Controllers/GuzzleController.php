<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Place;
use App\Http\Requests\BarRegister;

class GuzzleController extends Controller
{
	
    public function getRemoteData(BarRegister $register){
    	
    	$register->key();
    	
    	$places = Place::getNames();
    	
    	$count = 0;
    	
    	foreach($places->chunk(10) as $chunk){
    		foreach($chunk as $place){
    			$count++;
    			$barName = $place->bar_name;
    			$latitude = $place->map_latitude;
    			$longitude = $place->map_longitude;
    			
   				$func = 1;
    			$register->guzzle('https://maps.googleapis.com/maps/api/place/textsearch/json?query=', 
    								$barName.'&location='.$latitude.','.$longitude, $func);
    	
    			if($count == 99){
    				session(['key' => session('key2')]);
    			}
    		}
    	}		
		return view('imports.process');
	} 
	
	public function processPlaceId(BarRegister $register){
		
		$places = Place::getPlaceIds();
		
		$count = 0;
		
		session(['key' => session('key3')]);
			
		foreach($places as $place){
			$count++;
			$placeId = $place->place_id;
			$func = 2;
			$register->guzzle('https://maps.googleapis.com/maps/api/place/details/json?placeid=', 
								$placeId, $func);
			
			if($count == 99){
				session(['key' => session('key4')]);
			}
		}
		return redirect('/viewExport');
	}
}
