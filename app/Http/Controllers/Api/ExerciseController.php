<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Requests\ExerciseRequest;
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

        $exercises = Exercise::orderBy('id', 'desc')->where('user_id', $id)->get();
        return $this->ApiResponse(200, 'success',  $exercises);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRequest $request)
    {
        $request->validate(['day'=> 'required|string', 'lists' => 'required', 'user_id'=> 'required|numeric']);
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
    public function update(ExerciseRequest $request, $id)
    {
    
        Exercise::where([
            'user_id' => $id, 
            'day' => $request->day
            ])->update([
          	'day' =>  $request->day,
            'exercise' => json_encode($request->lists),
            'user_id' => $request->id,
       ]); 
     return $this->ApiResponse(200,"success");
    }

    public function destroryDay($id)
    {
         Exercise::where([
            'user_id' => $id, 
            'day' => $request->day
            ])->delete();
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
 