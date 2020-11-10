<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
       
    public function addcart()
    {
        $id=request()->input('login_id');
        $proid=request()->input('product_id');
        $catdata=DB::table('addtocart')->where([['login_id', $id],['product_id',$proid]])->get()->first();  
      
        if (!isset($catdata)) {
                DB::table('addtocart')->insert(
                         ['product_id' => $proid,
                         'login_id'=>$id,
                         ]);
        }

        return response()->json([
            'status' => '200',
            'message' => 'your product added to cart',
        ]);
    }

    public function removecart()
    {
    	$cart_id=request()->input('cart_id');
         DB::table('addtocart')
            ->where('cart_id', $cart_id)
            ->delete();
        return response()->json([
            'status' => '200',
            'message' => 'product remove to cart successfully',
        ]);
    }
}
