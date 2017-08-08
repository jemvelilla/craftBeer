<?php

namespace App;

class OpeningHour extends Model
{
   	public static function create($item){
	   	return static::firstOrCreate([
		   	'result_id' => isset($item->result->id)
		   	? $item->result->id
		   	: null,
		   	'open_now' => isset($item->result->opening_hours->open_now)
		   	? $item->result->opening_hours->open_now
		   	: null,
	   	]);
	}
}
