<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class dashboard extends Controller
{
        public function index()
        {
        		 
        		  $categort = DB::table('categort')->count();
        		  $news = DB::table('news')->count();
        		  $product = DB::table('product')->count();
        		  $review = DB::table('review')->count();
        		  $slider = DB::table('slider')->count();
        		  $testimonials = DB::table('testimonials')->count();
        		  $users = DB::table('users')->count();
        		  
        		  $data=(['categort'=>$categort,'news'=>$news,'product'=>$product,'review'=>$review,'slider'=>$slider,'testimonials'=>$testimonials,'users'=>$users]);
        // print_r($data);
        // exit();
        		  return view('dashboard',['data' => $data]);
        }

}
