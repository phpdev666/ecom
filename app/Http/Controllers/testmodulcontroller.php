<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class testmodulcontroller extends Controller
{
    public function addmoduls()
    {
        return view('testmoduls');
    }
    public function insertdata(Request $request)
    {
        $this->validate($request, [
		            
		            'title' => 'required',
		            'description' => 'required|min:20',
		        ]);
		       
		        
			      $date=date("Y-m-d h:i:s");
			 DB::table('testimonials')->insert(['title' => $request->input('title'),
		                    	    'description' => $request->input('description'),
		                    	    'created_at' => $date
		                    	    ]);
		        echo "Record inserted successfully.<br/>";
		       return redirect('/testlist')->with('success', 'Add  New review successfully.');
    }
    public function index()
    {
        $data = DB::table('testimonials')
            ->distinct()
            ->get();
        // print_r($data);
        // exit();['users'=>$users]
        return view('testlist', ['data' => $data]);
    }
    public function delete($id)
    {
        
        DB::table('testimonials')
            ->where('test_id', $id)
            ->delete();
        echo "Record Delete successfully.<br/>";
        return redirect('/testlist')->with('success', 'Record Delete successfully.');

    }
    public function edit($id)
    {
        //echo $id;

        $get = DB::table('testimonials')
            ->where('test_id', $id)
            ->get();
        // print_r($get);
        // exit();
        return view('edittest', ['get' => $get]);
    }
 public function updatedata(request $request)
    {
        $id = $request->input('id');

       
      
        $date=date("Y-m-d h:i:s");
        $data = (['title' => $request->input('title'),
		                    	    
		                    	    'description' => $request->input('description'),
		                    	   
		                    	    'updated_at' => $date
		                    	    ]);
        //DB::table('users')->whereIn('id', $id)->update($data);

        // echo "<pre>";
        // print_r($data);
        // exit();
        DB::table('testimonials')
            ->where('test_id', $id)
            ->update($data);

      
        
        return redirect('/testlist')->with('success', 'Record update successfully.');
    }
     public function show($id)
	    {
	    	 $pro = DB::table('testimonials')
            ->where('test_id', $id)
	            ->distinct()
	            ->get();
	            // print_r($data);
	          
	             return view('showtest', ['pro' => $pro]);
	    }
}
