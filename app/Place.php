<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
     protected $fillable = [
    		'id',
    		'bar_name',
    		'bar_name_ja',
    		 'type', 
    		 'area', 
    		 'subarea_eng', 
    		 'subarea_ja', 
    		 'address_eng', 
    		 'address_ja', 
    		 'hours_eng', 
    		 'hours_ja', 
    		 'highlights_eng', 
    		 'highlights_ja', 
    		 'phone', 
    		 'website', 
    		 'smokefree', 
    		 'number_taps', 
    		 'number_bottles', 
    		 'closest_station_eng', 
    		 'closest_station_ja', 
    		 'map_latitude', 
    		 'map_longitude', 
    		 'jbt_permalink', 
    		 'twitter_id', 
    		 'image1', 
    		 'image2', 
    		 'image3', 
    		 'image4', 
    		 'desc_eng', 
    		 'desc_ja', 
    		 'specials_eng', 
    		 'specials_ja', 
    ];
}
