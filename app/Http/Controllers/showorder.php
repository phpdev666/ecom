<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;
use Illuminate\Support\Facades\Auth;

class showorder extends Controller
{
	public function index()
	{
		# code...
		$id=Auth::id();

	
	$users = DB::table('orderaddress')
			
            ->leftJoin('orderproduct', 'orderproduct.add_id', '=', 'orderaddress.add_id')
            ->leftJoin('product', 'product.product_id', '=', 'orderaddress.product_id')
            ->get();
            print_r($users);
            // exit();
             return view('orderlist', ['data' => $users]);
    }
    public function delete($id)
    {
    	   // DB::table('orderproduct')
        //     ->where('add_id', $id)
        //     ->delete();
            DB::table('orderaddress')
            ->where('order_id', $id)
            ->delete();
             return redirect('/orderlist')->with('success', 'Record Delete successfully.');
    }
}
