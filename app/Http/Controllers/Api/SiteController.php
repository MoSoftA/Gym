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
	   	if($request->hasFile('img'))
        {
         $this->validate($request,['img'=>'image'],[],[]);
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/slider'), $imgName); 
        
        }else{$url = null;}
		  	DB::table('sliders')->Insert([
	   		'image' => $url,
	   		'text' => $request->text
		]);
   	 return $this->ApiResponse(200,"success");
   }

   public function getFooter()
   {
   		$footer = DB::table('footer')->get();

	   	if($footer){
	   	 return $this->ApiResponse(200,"success", $footer);
	   }	
   }


    public function storeFooter(Request  $request)
   {
	   	$footer = DB::table('footer')->first();
	   	if(!$footer){
		   	DB::table('footer')->Insert([
		   		'we' => $request->we,
		   		'info' => $request->info,
		   		'address' => $request->address,
		   		'Phone' => $request->Phone,
		   		'fax' => $request->fax,
		   		'facebook' => $request->facebook,
		   		'google' => $request->google,
		   		'linkedIn' => $request->linkedIn,
		   		'twitter' => $request->twitter
			]);

		}else{
		   	DB::table('navbar')->update([
	   			'we' => $request->we,
		   		'info' => $request->info,
		   		'address' => $request->address,
		   		'Phone' => $request->Phone,
		   		'fax' => $request->fax,
		   		'facebook' => $request->facebook,
		   		'google' => $request->google,
		   		'linkedIn' => $request->linkedIn,
		   		'twitter' => $request->twitter

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }



   public function getAboutUs()
   {
   		$about_us = DB::table('about_us')->get();

	   	if($about_us){
	   	 return $this->ApiResponse(200,"success",$about_us);
	   }	
   }


    public function storerAboutUs(Request  $request)
   {
   	 	if($request->hasFile('img'))
        {
         $this->validate($request,['img'=>'image'],[],[]);
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/aboutUs'), $imgName); 
        
        }else{$url = null;}

	   	$about_us = DB::table('about_us')->first();
	   	if(!$about_us){
		   	DB::table('$about_us')->Insert([
		   		'body' => $request->body,
		   		'image' => $url,
		   	
			]);

		}else{
		   	DB::table('$about_us')->update([
	   			'body' => $request->body,
		   		'image' => $url,

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }

}


		