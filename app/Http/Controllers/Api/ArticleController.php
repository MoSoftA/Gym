<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Article;
use Illuminate\Support\Str;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
      use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->ApiResponse(200, 'success', 
        	ArticleResource::collection(Article::all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {   

    if($request->hasFile('img'))
        {
         
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $img->move(public_path('uploads/articles'), $imgName); 
          $url = url('uploads/articles/'. $imgName);
        }else{ $url = null; }
       Article::create([
            'title' =>  $request->title,
            'shortDescription' => $request->info,
            'longDescription' => $request->body,
            'author' => auth()->user()->id,
            'image'=> $url
       ]); 

       return $this->ApiResponse(200,"success");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $imgName = Str::random(50).'.'. $img->extension();
             $img->move(public_path('uploads/articles'), $imgName); 
             $url = url('uploads/articles/'. $imgName);
            }else{$url = null;}
       
        Article::find($id)->update([
            'title' =>  $request->title,
            'shortDescription' => $request->info,
            'longDescription' => $request->body,
            'author' => auth()->user()->id,
            'image'=> $url
       ]); 

     return $this->ApiResponse(200,"success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return $this->ApiResponse(200,"success");
    }
}
