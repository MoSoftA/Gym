<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use Illuminate\Support\Str;
class SiteController extends Controller
{
	  use ApiResponse;

   public function getNavbar(){

	   	$nav = DB::table('navbar')->first();

	   	if($nav){
	   	 return $this->ApiResponse(200,"success", $nav);
	   }	

   }

   public function storeNavbar(Request  $request)
   {
	   	$nav = DB::table('navbar')->first();
	   	if(!$nav){
		   	DB::table('navbar')->Insert([
		   		'name' => $request->name,
		   		'background_color' => $request->background_color,
		   		'font_color' => $request->font_color,
		   		'button_background' => $request->button_background,
		   		'button_font_color' => $request->button_font_color
			]);

		}else{

		   	DB::table('navbar')->update([
	   		'name' => $request->name,
	   		'background_color' => $request->background_color,
	   		'font_color' => $request->font_color,
	   		'button_background' => $request->button_background,
	   		'button_font_color' => $request->button_font_color

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }


   public function getSlider(){

	   	$slider = DB::table('sliders')->get();

	   	if($slider){
	   	 return $this->ApiResponse(200,"success", $slider);
	   }	

   }

   public function storeSlider(Request  $request)
   {
	   	if($request->hasFile('image'))
        {
         $this->validate($request,['image'=>'image'],[],[]);
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/slider'), $imgName); 
        
        }else{$imgName = NULL;}
		  	DB::table('sliders')->Insert([
	   		'image' =>'uploads/slider/'.$imgName,
	   		'text' => $request->text
		]);
   	 return $this->ApiResponse(200,"success");
   }
}


		