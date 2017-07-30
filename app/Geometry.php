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
}
