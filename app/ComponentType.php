<?php

namespace App;

class ComponentType extends Model
{
    public function component(){
    	return $this->belongsTo(Component::class);
    }
}
