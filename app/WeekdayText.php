<?php

namespace App;

class WeekdayText extends Model
{
	public function result(){
		return $this->hasMany(Result::class);
	}
	
	public static function create($item){
		if(isset($item->result->opening_hours->weekday_text)):
			foreach($item->result->opening_hours->weekday_text as $weekday_text){
				return static::firstOrCreate([
					'opening_hours_id' => isset($item->result->id)
					? $item->result->id
					: null,
					'body'=> $weekday_text,
				]);
			}
		endif;
	}
}
