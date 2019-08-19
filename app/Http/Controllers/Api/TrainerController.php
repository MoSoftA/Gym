<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trainer;
use Illuminate\Support\Str;
use App\Traits\ApiResponse;
use App\Http\Requests\TrainerRequest;
class TrainerController extends Controller
{
	 use ApiResponse;
    public function getTainers()
    {
    	 return $this->ApiResponse(200, 'success', Trainer::all());
    }

    public function store(TrainerRequest $request)
    {
     if($request->hasFile('img'))
        {
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/trainers'), $imgName); 
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
     if($request->hasFile('img'))
        {
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/trainers'), $imgName); 
        }

        Trainer::update([
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
