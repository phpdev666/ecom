<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getproduct()
    {
    	// exit();
    	 $products = Product::get()->toArray();
    	  return response()->json([
            'status' => '200',
            'message' => 'product get successfully',
            'result'=>$products,
        ]);
    }

     public function getproductbycat()
	    {
	    	$cat_id=request()->input('cat_id');
	    	
	    	 $products = Product::where('cat_id', $cat_id)->get()->toArray();
	    	  return response()->json([
	            'status' => '200',
	            'message' => 'product get successfully',
	            'result'=>$products,
	        ]);
	    }
	 public function getproductbysearch()
	    {
	    	$proname=request()->input('product');
	    	$products =  Product::where('modelno', 'like', "%{$proname}%")
                 ->orWhere('productname', 'like', "%{$proname}%")
                 ->orWhere('shot_description', 'like', "%{$proname}%")
                 ->get()->toArray();
	    	
	    	 // print_r($products);
                 if ($products) {
                 	  return response()->json([
				            'status' => '200',
				            'message' => 'product get successfully',
				            'result'=>$products,
				        ]);
                 }
                 else{
                  return response()->json([
				            'status' => '401',
				            'message' => 'product is not found',
				            
				        ]);
                 }
	    

	    	
	    }
}
