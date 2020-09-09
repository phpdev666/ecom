<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;
use App\news;
use DataTables;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;






class newscontroller extends Controller
{
  public function index()
	  {
	  	return view('news');
	  }
	public function inser(request $request)
	{
			$this->validate($request,[
                         'news'=>'required']);
	   		 // $request->input('news');
			//print_r($request->input('news'));

		   $data = DB::table('users')
            ->distinct()
            ->get();
           foreach ($data as $key) {
          $mail= $key->email;


         	 $dataa = array('name'=>$request->input('news'));
         	 // print_r($dataa);
         	 // print_r($key);
         	 // exit();
			   
			     	 Mail::send('mail', $dataa, function($message) use ($key) {
			     	 	// print_r($key);
			     	 	// exit();
			         $message->to($key->email, $key->name)->subject
			            ('News');
				         $message->from('php.devloper666@gmail.com','Php devloper');
				     	 });
	
           }
           $date=date("Y-m-d h:i:s");
           DB::table('news')->insert(
                    	    ['msg' => $request->input('news'),'created_at' => $date]);

       return redirect('/listnews')->with('success', 'All User mail send successfully ');

	}
	public function listnews(Request $request)
	{
	          
		 	if ($request->ajax()) {
		//  		echo "string";
		// exit();
  $data =DB::table('news')->distinct()->get();

	            return Datatables::of($data)
	                ->addIndexColumn()
	                ->addColumn('action', function($row){
// 	                	print_r($row);
// exit();

	                    $btn = '<a href="/news/show/'.$row->news_id .'" class="edit btn btn-warning btn-sm">Show</a> ';
	                    return $btn;
	                })
	                ->rawColumns(['action'])
	                ->make(true);
	        }
  

		return view('listnews');
	}
public function show($id)
		{
			$get = DB::table('news')
            ->where('news_id', $id)
            ->get();
        // print_r($get);
        // exit();
                return view('shownese', ['get' => $get]);
		}
	
}
