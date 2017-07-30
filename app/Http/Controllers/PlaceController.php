<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Excel;
use App\Place;

class PlaceController extends Controller
{
	public function extract(){
		return view('imports.success');
	}
	
	public function index(){
	
		return view('imports.index');
	
	}
	
	
	public function store(Request $request){
	
		$upload = $request->file('excelFile');
		$filePath = $upload->getRealPath();
		$file = fopen($filePath, 'r');
	
		$header = fgetcsv($file);
		$escapedHeader = [];
	
		foreach($header as $key => $value){
				
			$lheader = strtolower($value);
			array_push($escapedHeader, $lheader);
				
		}
	
		while($columns = fgetcsv($file)){
				
			if($columns[0] == ""){
	
				continue;
	
			}
				
				
			$data = array_combine($escapedHeader, $columns);
				
				
			$id = $data['id'];
			$bar_name= $data['bar_name'];
			$bar_name_ja= $data['bar_name_ja'];
			$type= $data['type'];
			$area= $data['area'];
			$subarea_eng= $data['subarea_eng'];
			$subarea_ja= $data['subarea_ja'];
			$address_eng= $data['address_eng'];
			$address_ja= $data['address_ja'];
			$hours_eng= $data['hours_eng'];
			$hours_ja= $data['hours_ja'];
			$highlights_eng= $data['highlights_eng'];
			$highlights_ja= $data['highlights_ja'];
			$phone= $data['phone'];
			$website= $data['website'];
			$smokefree= $data['smokefree'];
			$number_taps= $data['number_taps'];
			$number_bottles= $data['number_bottles'];
			$closest_station_eng= $data['closest_station_eng'];
			$closest_station_ja= $data['closest_station_ja'];
			$map_latitude= $data['map_latitude'];
			$map_longitude= $data['map_longitude'];
			$jbt_permalink= $data['jbt_permalink'];
			$twitter_id= $data['twitter_id'];
			$image1= $data['image1'];
			$image2= $data['image2'];
			$image3= $data['image3'];
			$image4= $data['image4'];
			$desc_eng= $data['desc_eng'];
			$desc_ja= $data['desc_ja'];
			$specials_eng= $data['specials_eng'];
			$specials_ja= $data['specials_ja'];
				
			$maps = Place::firstOrNew([
					'id' => $id,
					'bar_name' => $bar_name,
					'bar_name_ja' => $bar_name_ja]);
			$maps->type= $type;
			$maps->area= $area;
			$maps->subarea_eng= $subarea_eng;
			$maps->subarea_ja= $subarea_ja;
			$maps->address_eng= $address_eng;
			$maps->address_ja= $address_ja;
			$maps->hours_eng= $hours_eng;
			$maps->hours_ja= $hours_ja;
			$maps->highlights_eng= $highlights_eng;
			$maps->highlights_ja= $highlights_ja;
			$maps->phone= $phone;
			$maps->website= $website;
			$maps->smokefree= $smokefree;
			$maps->number_taps= $number_taps;
			$maps->number_bottles= $number_bottles;
			$maps->closest_station_eng= $closest_station_eng;
			$maps->closest_station_ja= $closest_station_ja;
			$maps->map_latitude= $map_latitude;
			$maps->map_longitude= $map_longitude;
			$maps->jbt_permalink= $jbt_permalink;
			$maps->twitter_id= $twitter_id;
			$maps->image1= $image1;
			$maps->image2= $image2;
			$maps->image3= $image3;
			$maps->image4= $image4;
			$maps->desc_eng= $desc_eng;
			$maps->desc_ja= $desc_ja;
			$maps->specials_eng= $specials_eng;
			$maps->specials_ja= $specials_ja;
			$maps->save();
				
		}
		
		session(['key' => request('key1')]);
		return redirect('/extract');
	}
}
