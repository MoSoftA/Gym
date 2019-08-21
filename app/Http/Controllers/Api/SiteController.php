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


//=====================
// navbar
//===========================
   public function getNavbar(){

	   	$nav = DB::table('navbar')->first();

	   	if($nav){
	   	 return $this->ApiResponse(200,"success", $nav);
	   }	

   }

   public function storeNavbar(Request  $request)
   {
   	 	if($request->hasFile('img'))
        {
         $this->validate($request,['img'=>'image'],[],[]);
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $img->move(public_path('uploads/navbar'), $imgName); 
          $url = url('uploads/navbar/'. $imgName);
        }else{$url = null;}

	   	$nav = DB::table('navbar')->first();
	   	if(!$nav){
		   	DB::table('navbar')->Insert([
		   		'name' => $request->name,
		   		'logo' =>  $url ,
		   		'background_color' => $request->background_color,
		   		'font_color' => $request->font_color,
		   		'button_background' => $request->button_background,
		   		'button_font_color' => $request->button_font_color,
		   		'created_at'=> now()
			]);

		}else{

		   	DB::table('navbar')->update([
	   		'name' => $request->name,
	   		'logo' =>  $url ,
	   		'background_color' => $request->background_color,
	   		'font_color' => $request->font_color,
	   		'button_background' => $request->button_background,
	   		'button_font_color' => $request->button_font_color,
	   		'updated_at' => now()

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }
//=====================
// slider
//===========================
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
          $img->move(public_path('uploads/slider'), $imgName); 
       	  $url = url('uploads/slider/'. $imgName);
        
        }else{$url = null;}
		  	DB::table('sliders')->Insert([
	   		'image' => $url,
	   		'text' => $request->text,
	   		'created_at'=> now()
		]);
   	 return $this->ApiResponse(200,"success");
   }

   public function deleteSlider($id)
   {
		DB::table('sliders')->where('id', $id)->delete(); 
   		return $this->ApiResponse(200,"success");
   }

//=====================
// footer
//===========================
   public function getFooter()
   {
   		$footer = DB::table('footer')->get();

	   	if($footer){
	   	 return $this->ApiResponse(200,"success", $footer);
	   }	
   }


    public function storeFooter(Request  $request)
   {
   		$this->validate($request, [
   			'facebook' =>'email',
   			'google' =>'email',
   			'linkedIn' =>'email',
   			'twitter' =>'email'
   		],[
   			'facebook.email'  => 'مخصص للاميل فقط'   ,
   			'google.email'  => 'محصص للاميل فقط'   ,
   			'linkedIn.email'  => 'مخصص للاميل فقط'   ,
   			'twitter.email'  => 'مخصص للاميل فقط'   ,
   			]);
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
		   		'twitter' => $request->twitter,
		   		'created_at'=> now()
			]);

		}else{
		   	DB::table('footer')->update([
	   			'we' => $request->we,
		   		'info' => $request->info,
		   		'address' => $request->address,
		   		'Phone' => $request->Phone,
		   		'fax' => $request->fax,
		   		'facebook' => $request->facebook,
		   		'google' => $request->google,
		   		'linkedIn' => $request->linkedIn,
		   		'twitter' => $request->twitter,
		   		'updated_at' => now()

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }


//=====================
// aboutUs
//===========================
   public function getAboutUs()
   {
   		$about_us = DB::table('about_us')->get();

	   	if($about_us){
	   	 return $this->ApiResponse(200,"success",$about_us);
	   }	
   }


    public function storerAboutUs(Request  $request)
   {
   	 	if($request->hasFile('image'))
        {
         $this->validate($request,['image'=>'image'],[],[]);
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $img->move(public_path('uploads/aboutUs'), $imgName); 
          $url = url('uploads/aboutus/'. $imgName);
        }else{$url = null;}

	   	$about_us = DB::table('about_us')->first();
	   	if(!$about_us){
		   	DB::table('about_us')->Insert([
		   		'body' => $request->body,
		   		'image' => $url,
		   		'created_at'=> now()
		   	
			]);

		}else{
		   	DB::table('about_us')->update([
	   			'body' => $request->body,
		   		'image' => $url,
		   		'updated_at' => now()

	   		]);
		}
   	 return $this->ApiResponse(200,"success");
   }


}


		