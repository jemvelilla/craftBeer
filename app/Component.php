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
	
	public static function create($item){
		if(isset($item->result->address_components)):
			foreach($item->result->address_components as $address_components){
				
				return static::firstOrCreate([
					'result_id' => isset($item->result->id)
					? $item->result->id
					: null,
					'long_name' => isset($address_components->long_name)
					? $address_components->long_name
					: null,
					'short_name' => isset($address_components->short_name)
					? $address_components->short_name
					: null,
				]);
				 
				$components = Component::where('long_name', $address_components->long_name)->get();
				 
				foreach ($components as $component){
					$component_id = $component->id;
				}
				 
				ComponentType::create($address_components, $component_id);
			}
		endif;
	}
}
