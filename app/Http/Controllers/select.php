<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;

class select extends Controller
{
    public function products($id)
    {
    	   $get = DB::table('product')
            ->where('cat_id', $id)
           ->paginate(16);


    	   $cat = DB::table('categort')
            ->get();


           return view('products',['get' => $get, 'cat' => $cat]);

    }
    public function select(request $request)
    {
    	// print_r($request->input('Search'));
    	 $data = DB::table('product')
         ->select('modelno', 'productname', 'shot_description', 'description')
       ->get();
            print_r($data);
            exit();
    }
}
