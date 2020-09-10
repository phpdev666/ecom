<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class checkout extends Controller
{
    public function index(Request $request)
    {
    	$data=$request->all();
    	if(isset($data['pro'])){
    	 return view('checkout', ['data' => $data['pro']]);
    	}
    	else
    	{
    		return redirect('cart');
    	}
    }
}
