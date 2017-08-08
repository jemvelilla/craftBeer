<?php

namespace App;

class ComponentType extends Model
{
    public function component(){
    	return $this->belongsTo(Component::class);
    }
    
    public static function create($address_components, $component_id){
    	foreach ($address_components->types as $type){
    		return static::firstOrCreate([
    		'component_id' => $component_id,
    		'name' => $type,
    		]);
    	}
    }
}
