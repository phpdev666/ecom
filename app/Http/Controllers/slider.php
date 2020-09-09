<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;

class slider extends Controller
{
    public function upload()
    {
        return view('insertslider');
    }
    public function uploaddata(Request $request)
	    {
	        $this->validate($request, [
	            'name' => 'required',
	            'image' => 'required',
	        ]);
	        $name = $request->input('name');
	        $file = $request->file('image');

	        $destinationPath = '';
	        $file->move('uploads/slider', $file->getClientOriginalName());
	        $date=date("Y-m-d h:i:s");
	       
	        DB::table('slider')->insert(
	                    	    ['name' => $name, 'image' => $file->getClientOriginalName(),'created_at' => $date]
	                    	);
	        echo "Record inserted successfully.<br/>";
	        return redirect('/listslider')->with('success', 'slider inserted successfully.');
	    }
     public function index()
			    {
			        $data = DB::table('slider')
			            ->distinct()
			            ->get();
			        // print_r($data);
			        // exit();
			        return view('sliderdata', ['data' => $data]);
			    }
    public function delete($id)
	    {
	        $get = DB::table('slider')
	            ->where('slider_id', $id)
	            ->get();
	        @unlink('uploads/slider/' . $get[0]->image);

	        DB::table('slider')
	            ->where('slider_id', $id)
	            ->delete();
	        echo "Record Delete successfully.<br/>";
	        return redirect('/listslider')->with('success', 'slider Delete successfully.');
	    }
    public function edit($id)
    {
        //echo $id;

        $get = DB::table('slider')
	          ->where('slider_id', $id)
            ->get();
        // print_r($get);
        // exit();
        return view('editslider', ['get' => $get]);
    }
    public function updatedata(request $request)
    {
        $id = $request->input('id');

        $name = $request->input('name');
        if ($request->file('image')) {
            $file = $request->file('image');
            
            $file->move('uploads/slider', $file->getClientOriginalName());
            $image = $file->getClientOriginalName();
            @unlink('uploads/slider/'.$request->input('old_img'));
        } else {
            $image = $request->input('old_img');
        }

        $data = ['name' => $name, "image" => $image];
        //DB::table('users')->whereIn('id', $id)->update($data);

        // echo "<pre>";
        // print_r($data);
        // exit();
        DB::table('slider')
            ->where('slider_id', $id)
            ->update($data);

        echo "Record update successfully.<br/>";
        return redirect('/listslider')->with('success', 'slider Update successfully.');
    }

}
