<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiUpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    use ApiResponse;

    public function all(){
        return $this->ApiResponse(200,"success", UserResource::collection(User::orderBy('id', 'desc')->get()));
    }
    public function get(Request $request){
        $user = User::find($request->id);
        if ($user) {
            return $this->ApiResponse(200,"success",new UserResource($user));
        }
        return $this->ApiResponse(404,"not found");
    }
    
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiUpdateUserRequest $request, $id)
    {

        $this->validate($request, [
            'email' => Rule::unique('users')->ignore($id),
            
        ], [], []);
        if($request->password){
            $password = $request->password;
        }else{
            $password = User::find($id)->first()->passowrd;
        }
        User::find($id)->update([
            "name"=> $request->name,
            "email"=> $request->email,
            'start'=> $request->start,
            'end'=> $request->end,
            'admin' =>$request->admin ,
            'updated_at'=> Now()
            
        ]);
         return $this->ApiResponse(200,"success");
      
     
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
       return $this->ApiResponse(200,"success");
    }

}
