<?php

namespace App;

class Type extends Model
{
    public static function create($item){
	    if(isset($item->result->types)):
		    foreach($item->result->types as $type){
		    	return static::firstOrCreate([
			    	'result_id' => isset($item->result->id)
			    	? $item->result->id
			    	: null,
			    	'body' => $type,
		    	]);
		    }
	    endif;
	}
}
