<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class reviewcontroller extends Controller
{
    public function add()
	    {
	    	 $data = DB::table('product')
	            ->distinct()
	            ->get();
	        // print_r($data);
	        // exit();
	        return view('addreview',['data'=>$data]);
	    }
    public function insert(Request $request)
		    {
		        $this->validate($request, [
		            'product_id' => 'required',
		            'title' => 'required',
		            'description' => 'required|min:20',
		        ]);
		       
		        
			      $date=date("Y-m-d h:i:s");
			 DB::table('review')->insert(['title' => $request->input('title'),
		                    	    'product_id' => $request->input('product_id'),
		                    	    'description' => $request->input('description'),
		                    	    'status_at' => 'deactivate',
		                    	    'created_at' => $date
		                    	    ]);
		        echo "Record inserted successfully.<br/>";
		       return redirect('/reviewlist')->with('success', 'Add  New review successfully.');
		    }
	public function index()
	    {
	        // $data = DB::table('review')
	        //     ->distinct()
	        //     ->get();
	        // print_r($data);
	        // exit();
	        $data = DB::table('review')
			
            ->Join('product', 'review.product_id', '=', 'product.product_id')
            ->get();
			    // echo '<pre>';
			    // print_r($pro);
			    // exit();
	        return view('reviewlist', ['data' => $data]);
	    }
   public function delete($id)
	    {
	        

	        DB::table('review')
	            ->where('review_id', $id)
	            ->delete();
	       
	        return redirect('/reviewlist')->with('success', 'Record Delete successfully.');
	    }
	    public function show($id)
	    {
	    	 $pro = DB::table('review')
	    	->where('review_id', $id)
	            ->distinct()
	            ->get();
	            // print_r($data);
	          
	             return view('showrivw', ['pro' => $pro]);
	    }
    public function edit($id)
    {
        //echo $id;
    	 $data = DB::table('product')
	            ->distinct()
	            ->get();

        $get = DB::table('review')
            ->where('review_id', $id)
            ->get();
        // print_r($get);
        // exit();
        return view('editreview', ['get' => $get,'data' => $data]);
    }
    public function updatedata(request $request)
    {
        $id = $request->input('id');

       
      
        $date=date("Y-m-d h:i:s");
        $data = (['title' => $request->input('title'),
		                    	    'product_id' => $request->input('product_id'),
		                    	    'description' => $request->input('description'),
		                    	   
		                    	    'updated_at' => $date
		                    	    ]);
        //DB::table('users')->whereIn('id', $id)->update($data);

        // echo "<pre>";
        // print_r($data);
        // exit();
        DB::table('review')
            ->where('review_id', $id)
            ->update($data);

      
        
        return redirect('/reviewlist')->with('success', 'Record update successfully.');
    }
    public function activate($id)
    {
    	 $get = DB::table('review')
            ->where('review_id', $id)
            ->get();
             // print_r($get[0]->status_at);
             // echo "<br>";
            if ($get[0]->status_at=='deactivate') {
            	// echo "activate";
            	 $data = (['status_at' => 'activate']);

            }else{
            	// echo "deactivate";
            	$data = (['status_at' => 'deactivate']);
            }
             DB::table('review')
            ->where('review_id', $id)
            ->update($data);

            return redirect('/reviewlist')->with('success', 'Record update successfully.');
     }

}
