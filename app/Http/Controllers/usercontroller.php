<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class usercontroller extends Controller
{
	public function index()
			{
				
				return view('auth.register');
			}
    public function user(request $request)
	    {
	    	  $this->validate($request, [
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'unique:users'],
	            'password' => ['required', 'string', 'min:8', 'confirmed'],
	        ]);
	    	  
	    	  	$date=date("Y-m-d h:i:s");
	    	  	
	    	 DB::table('users')->insert([
	            'name' => $request['name'],
	            'email' => $request['email'],
	            'password' => md5($request['password']),
	            	'created_at' => $date]);

	    	  echo "Record inserted successfully.";
	    	    return redirect('/userlist')->with('success', 'add  New User successfully.');
	    }
	    	public function verified($id)
	    	{
	    		$date=date("Y-m-d h:i:s");
		        $data = ['email_verified_at' => $date];
		        //DB::table('users')->whereIn('id', $id)->update($data);

		        // echo "<pre>";
		        // print_r($data);
		        // exit();
		        DB::table('users')
		            ->where('id', $id)
		            ->update($data);

		        echo "Record update successfully.<br/>";
		        return redirect('/userlist')->with('success', 'Record verified successfully.');
	    	}
    public function tabel()
    {
    	   $data = DB::table('users')
            ->distinct()
            ->get();
        // print_r($data);
        // exit();
        return view('userlist', ['data' => $data]);

    }
        public function delete($id)
		    {

			        DB::table('users')
			            ->where('id', $id)
			            ->delete();
			     
			        return redirect('/userlist')->with('success', 'Record Delete successfully.');
			    }
		    public function edit($id)
			    {
			        //echo $id;

			        $get = DB::table('users')
			            ->where('id', $id)
			            ->get();
			        // print_r($get);
			        // exit();
			        return view('userdata', ['get' => $get]);
			    }
    public function updatedata(request $request)
		    {
		        $id = $request->input('id');

		       
		        $date=date("Y-m-d h:i:s");
		        $data = ['name' => $request->input('name'), 'email' => $request->input('email'),'updated_at' => $date];
		        //DB::table('users')->whereIn('id', $id)->update($data);

		        // echo "<pre>";
		        // print_r($data);
		        // exit();
		        DB::table('users')
		            ->where('id', $id)
		            ->update($data);

		        echo "Record update successfully.<br/>";
		        return redirect('/userlist')->with('success', 'Record Upadate successfully.');
		    }


}
