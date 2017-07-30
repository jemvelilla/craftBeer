<?php

namespace App;

class Result extends Model
{
	protected $guarded = [];
	
	public function component(){
		return $this->hasMany(Component::class);
	}
	
	public function geometry(){
		return $this->hasMany(Geometry::class);
	}
	
}
