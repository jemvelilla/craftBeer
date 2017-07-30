<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Place;

class GuzzleController extends Controller
{
	
    public function getRemoteData(){
    	$places = Place::all();
    	$count = 0;
    	foreach($places as $place){
    		$count++;
    		$barName = $place->bar_name;
			
    		$client = new Client(['base_uri' => 'https://maps.googleapis.com','verify' => false]);
    		
    		$response = $client->request('GET',
    				'https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$barName.
    				'&key='.session('key'));
    		
    		
    		if ($response->getStatusCode() == 200){
    			if($response->hasHeader('content-length')){
    				$contentLength = $response->getHeader('content-length')[0];
    			}
    			$data = $response->getBody();
    			$data = json_decode($data);
				
    			/*
    			 * check status
    			 * echo $data->status."<br>";
    					if(($count%10)==0)
    					{
    						sleep(3);
    					}
    					if($count == 99)
    					{
    						session(['key' => request('key1')]);
    					}
    			 */
    			
				foreach ($data->results as $result){
					if($data->status == "OK"){
						Place::where('bar_name', $result->name)
							->update(['place_id' => $result->place_id]);			
					}	//endif
					else{
						Place::where('bar_name', $result->name)
						->update(['place_id' => null]);
					}
				} //endforeach
				
				if(($count%10)==0){
					sleep(3);
				}
				if($count == 99){
					session(['key' => request('key2')]);
				}
    		} //endif	
		} //endforeach
		
		return view('imports.process');
	} 
	
	public function processPlaceId(){
		$places = Place::all();
		$count = 0;
		session(['key' => request('key3')]);
			
		foreach($places as $place){
			$count++;
			$placeId = $place->place_id;
			
			$client = new Client(['base_uri' => 'https://maps.googleapis.com','verify' => false]);
			
			$response = $client->request('GET',
					'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$placeId.
					'&key='.session('key'));
			
			if ($response->getStatusCode() == 200){
				if($response->hasHeader('content-length')){
					$contentLength = $response->getHeader('content-length')[0];
				}
					
				$item = $response->getBody();
				$item = json_decode($item);
			
					
				ResultController::store($item);
			}
			
			if(($count%10)==0){
				sleep(3);
			}
			if($count == 99){
				session(['key' => request('key4')]);
			}	
		}
	}
}
