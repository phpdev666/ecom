<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class UserController extends Controller
{

    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => '401','error' => $validator->errors()->first()]);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['status' => '310','error' => 'your login is invalid. please try again.']);
        }
        // print_r($token);
        // exit();
       $data= $this->createNewToken($token);
            return response()->json(['status' => '200','message' => 'you are login successfully.','result'=> $data]);

    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => '401','error' => $validator->errors()->first()]);
        }

        $user =  User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'status' => '200',
            'message' => 'User successfully registered',
            'result' => $user
        ]);
    }


    public function logout() {

        auth()->logout();

        return response()->json(['status'=>'200','message' => 'User successfully signed out']);
    }

    public function refresh() {

        // return $this->createNewToken(auth()->refresh());
    return response()->json(['status' => '200','message' => 'you are login successfully.','result'=> $this->createNewToken(auth()->refresh())]);
       
    }


    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function userProfile() {

        return response()->json(auth()->user());
    }
    public function update_profile()
    {
        $id=request()->input('id');
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => '401','error' => $validator->errors()->first()]);
        }

         $user = User::where('id', $id)->update(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt(request()->password)]
                ));

        return response()->json([
            'status' => '200',
            'message' => 'User successfully registered',
            
        ]);
    }
   
}