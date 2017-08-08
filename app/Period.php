<?php

namespace App;

class Period extends Model
{
    public function result(){
    	return $this->hasMany(Result::class);
	}
	
	public static function create($item){
		if(isset($item->result->opening_hours->periods)):
			foreach($item->result->opening_hours->periods as $period){
				return static::firstOrCreate([
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
	}
}
