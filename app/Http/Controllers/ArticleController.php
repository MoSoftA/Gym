<?php

namespace App\Http\Controllers;


use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Article;
use Illuminate\Support\Str;
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
        $articles = Article::all();
        return $this->ApiResponse(200, 'success', $articles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
   
    if($request->hasFile('article.img'))
        {
          $img = $request->file('img');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/articles'), $imgName); 
           $image = 'uploads/articles/'.$imgName ;
        }else{ $image = null;}

       Article::create([
            'title' =>  $request->article['title'],
            'shortDescription' => $request->article['info'],
            'longDescription' => $request->article['body'],
            'author' => auth()->user()->id,
            'image'=>$image,
       ]); 

       return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('img'))
        {
            $img = $request->file('img');
            $imgName = Str::random(50).'.'. $img->extension();
            $url = $img->move(public_path('uploads/articles'), $imgName); 
            $image = 'uploads/articles/'.$imgName ;
        }
        Article::find($id)->update([
           'title' =>  $request->title,
            'shortDescription' => $request->info,
            'longDescription' => $request->body,
            'author' => auth()->user()->id,
            'image'=> $image,
       ]); 

       return back(); 
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
        return back();
    }
}
