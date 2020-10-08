<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function SubscribProcess()
		{
			$price=session()->get('price');
			// print_r($price);
			// exit();
		    return view('payumoney',['price'=>$price]);
		}
	public function SubscribeResponse(Request $request)
	{
	    dd('Payment Successfully done!');
	}
	public function SubscribeCancel()
	{
	     dd('Payment Cancel!');
	}
}
	