<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\ApiExercieseRequest;
use App\Exercise;
	  
class ExerciseController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $exercises = Exercise::where('user_id', $id)->get();
        return $this->ApiResponse(200, 'success',  $exercises);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiExercieseRequest $request)
    {
       Exercise::create([
            'day' =>  $request->day,
            'exercise' => json_encode($request->lists),
            'user_id' => $request->user_id,
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
    public function update(ApiExercieseRequest $request, $id)
    {
        Exercise::find($id)->update([
          	'day' =>  $request->day,
            'exercise' => json_encode($request->lists),
            'user_id' => $request->id,
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
        Exercise::where('user_id', $id)->delete();
        return $this->ApiResponse(200,"success");
    }
}
 