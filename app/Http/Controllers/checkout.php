<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;
use Illuminate\Support\Facades\Auth;

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
   public function checkoutinsert(Request $request)
    {
    	$this->validate($request, [
            'fist_name' => 'required',
            'last_name' => 'required',
            'number' => 'required|min:10|max:10',
            'email' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'City' => 'required',
            'pincode' => 'required|min:6|max:6',
        ]);
        $id=DB::table('orderproduct')->insertGetId(
						    ['fist_name' => $request->input('fist_name'),
						    'last_name' => $request->input('last_name'),
						    'number' => $request->input('number'),
						    'email' => $request->input('email'),
						    'address' => $request->input('address'),
						    
						    'country' => $request->input('country'),
						    'state' => $request->input('state'),
						    'City' => $request->input('City'),
						    'pincode' => $request->input('pincode'),
						    'user_id'=>Auth::id()
						],
						);
      //   print_r($id);
// print_r($request->pro);
        // exit();

		$data=$request->pro;

		foreach ($data as $key ) {
			DB::table('orderaddress')->insert(
                    	    ['qty' => $key['qty'],
                    	    'price' => $key['price'],
                    	    'product_id' => $key['id'],
                    	    'add_id' => $id,
                    	    'user_id' =>Auth::id(),
                    	    ]
                    	);

			echo $key['qty']* $key['price'].'<br>';

    }

}

}