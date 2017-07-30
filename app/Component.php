<?php

namespace App;

class Component extends Model
{
    public function result(){
		return $this->belongsTo(Result::class);
	}
	
	public function componentType(){
		return $this->hasMany(ComponentType::class);
	}
}
