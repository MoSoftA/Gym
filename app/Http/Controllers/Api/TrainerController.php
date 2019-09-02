<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Support\Str;
use App\Traits\ApiResponse;
use App\Http\Requests\TrainerRequest;
use Illuminate\Validation\Rule;
class TrainerController extends Controller
{
	 use ApiResponse;
    public function getTainers()
    {
    	 return $this->ApiResponse(200, 'success', Trainer::orderBy('id', 'desc')->get());
    }

    public function store(TrainerRequest $request)
    {
    	$this->validate($request, ['email' => Rule::unique('trainers')], ['email.unique'=> "هذا البريد مستخدم من قبل "]);
     if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $img->move(public_path('uploads/trainers'), $imgName); 
             $url = url('uploads/trainers/'. $imgName);
        }

        Trainer::create([
        	'name'	=> $request->name, 
            'email'	=> $request->email,
            'image' => $url, 
            'info'  =>$request->info,
            'phone'  =>$request->phone,
            'created_at' => now()
        ]);

        return $this->ApiResponse(200, 'success');
    }

     public function update(TrainerRequest $request)
    {	
    	
    $this->validate($request, ['email' => Rule::unique('trainers')->ignore($request->id)], ['email.unique'=> "هذا البريد مستخدم من قبل "]);

     if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
           $img->move(public_path('uploads/trainers'), $imgName); 
          $url = url('uploads/trainers/'. $imgName);
        }else if (Trainer::where('image', $request->image))
        {
          $url = $request->image;
        }

        Trainer::find($request->id)->update([
        	'name'	=> $request->name, 
            'email'	=> $request->email,
            'image' => $url, 
            'info'  => $request->info,
            'phone'  => $request->phone,
            'created_at' => now()
        ]);

        return $this->ApiResponse(200, 'success');
    }

    public function destroy($id)
    {
    	Trainer::find($id)->delete();
       return $this->ApiResponse(200, 'success');
    }
}
