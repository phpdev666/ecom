<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\categort;
use Storage;
use DB;

class categorycontroller extends Controller
{
   public function insertcat()
		   {
		   	return view('addcat');
		   }
   public function addcaragori(request $request)
			   {
			           $this->validate($request, [
			            'name' => 'required',
			           
			        ]);
			      	 $name = $request->input('name');
			        // $post = new categort(['name' => $name]);
			        // $post->save();

						DB::table('categort')->insert(
						    ['name' => $name],
						);
						      
			       
			        return redirect('/categoryilist')->with('success', 'Record inserted successfully.');

			   }
	public function listcat()
			{
				 $tabdata = DB::table('categort')
		            ->distinct()
		            ->get();

				return view('listcat',['tabdata' => $tabdata]);
			}
	public function delete($id)
	    {
	       

	        DB::table('categort')
	            ->where('cat_id', $id)
	            ->delete();
	      
	        return redirect('/categoryilist')->with('success', 'Record Delete successfully.');
	    }
	    public function edit($id)
			    {
			        //echo $id;

			        $get = DB::table('categort')
				            ->where('cat_id', $id)
			            ->get();
			        // print_r($get);
			        // exit();
			        return view('editdata', ['get' => $get]);
			    }
        public function updatedata(request $request)
		    {
		        $id = $request->input('cat_id');

		        $name = $request->input('name');
		       
		        $data = ['name' => $name];
		        //DB::table('categort')->whereIn('id', $id)->update($data);

		        // echo "<pre>";
		        // print_r($data);
		        // exit();
		        DB::table('categort')
		            ->where('cat_id', $id)
		            ->update($data);

		         return redirect('/categoryilist')->with('success', 'Record Updata  successfully.');
		    }


}
