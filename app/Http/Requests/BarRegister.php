<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Place;
use GuzzleHttp\Client;
use App\Http\Controllers\ResultController;

class BarRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        ];
    }
    
    public function key(){
    	session(['key' => request('key1'),
    	'key2' => request('key2'),
    	'key3' => request('key3'),
    	'key4' => request('key4'),
    	]);
    }
    public function guzzle($query, $param, $func){
    	$client = new Client(['base_uri' => 'https://maps.googleapis.com','verify' => false]);
    	 
    	$response = $client->request('GET',$query.$param.'&key='.session('key'));
    	
    	if ($response->getStatusCode() == 200){
    		if($response->hasHeader('content-length')){
    			$contentLength = $response->getHeader('content-length')[0];
    		}
    		$data = $response->getBody();
    		$data = json_decode($data);
    		
    		if($func == 1){
    			Place::setPlaceId($data);
    		}
    		
    		if($func == 2){
    			ResultController::store($data);
    		}
    	}
    }
}
