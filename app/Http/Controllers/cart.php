<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;
use Illuminate\Support\Facades\Auth;

class cart extends Controller
{
	public function view()
	{
		$pro = DB::table('addtocart')
			->where('login_id',Auth::user()->id)
			
            ->Join('product', 'addtocart.product_id', '=', 'product.product_id')
            ->get();
		// print_r($pro);
		// exit();
	
	  
   return view('cart', ['pro' => $pro]);
	   }
	public function delete($id)
	   {
	   	 DB::table('addtocart')
            ->where('cart_id', $id)
            ->delete();
        
        return redirect('/cart');

	   }
}
