<?php

namespace App;

class Geometry extends Model
{
    public function result(){
		return $this->belongsTo(Result::class);
	}
	
	public function location(){
		return $this->belongsTo(Location::class);
	}
	
	public static function create($item){
		return static::firstOrCreate([
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
	}
}
