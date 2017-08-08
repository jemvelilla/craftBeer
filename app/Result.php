<?php

namespace App;

class Result extends Model
{
	protected $guarded = [];
	
	public function component(){
		return $this->hasMany(Component::class, 'result_id', 'result_id');
	}
	
	public function geometry(){
		return $this->hasMany(Geometry::class, 'result_id', 'result_id');
	}
	
	public function schedule(){
		return $this->hasMany(WeekdayText::class, 'opening_hours_id', 'result_id');
	}
	
	public static function create($item){
		return static::firstOrCreate([
			'adr_address' => isset($item->result->adr_address)
			? $item->result->adr_address
			: null,
			'formatted_address' => isset($item->result->formatted_address)
			? $item->result->formatted_address
			:null ,
			'icon' => isset($item->result->icon)
			? $item->result->icon
			: null,
			'result_id' => isset($item->result->id)
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
	}
}
