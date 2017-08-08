<?php

namespace App;

class Place extends Model
{
     protected $guarded = [];
     
     public static function getNames(){
     	return static::whereNull('place_id')->where('is_checked', 0)->get();
     }
     
     public static function getPlaceIds(){
     	return static::whereNotNull('place_id')->where('is_checked', 1)->get();
     }
     
     public static function setPlaceId($data){
     	foreach ($data->results as $result){
     		if(! $data->status == "OK"){
     			return static::where('bar_name', 'like', '%'.$result->name.'%')
     			->orWhere('bar_name_ja', $result->name)
     			->update(['place_id' => null, 'is_checked' => 1]);
     		}
     	
     		return static::where('bar_name', 'like', '%'.$result->name.'%')
     		->orWhere('bar_name_ja', $result->name)
     		->update(['place_id' => $result->place_id, 'is_checked' => 1]);
     		 
     	} 
     }
}
