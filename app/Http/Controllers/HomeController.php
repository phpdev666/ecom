<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $get = DB::table('product')
            ->where('status', 'active')
            ->paginate(6);
        $sld = DB::table('slider')->get();
        // print_r($sld);
        // exit();
        return view('homepage', ['get' => $get, 'sld' => $sld]);
    }
    public function products($id)
    {
        $get = DB::table('product')
            ->where('product_id', $id)
            ->get();

        $pro = DB::table('product')
            ->where('cat_id', $get[0]->cat_id)
            ->paginate(4);

        // print_r($get);
        // exit();
        return view('product_view', ['get' => $get, 'pro' => $pro]);
    }
    public function addcart(request $request)
    {
        $user = DB::table('addtocart')
            ->where([['product_id', $request->input('id')], ['login_id', Auth::user()->id]])
            ->get();
        //          print_r($user);

        //             echo $user->count();
        // exit();
        if ($user->count() == 0) {
            DB::table('addtocart')->insert(['product_id' => $request->input('id'), 'login_id' => Auth::user()->id]);
        }

        return redirect($request->input('path'))->with('cart', 'products insert cart.');
    }
    public function register()
    {
        return view('register');
    }
    public function addregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $date = date("Y-m-d h:i:s");
        DB::table('users')->insert(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password'), 'created_at' => $date]);

        return redirect('/userlist')->with('success', 'Record inserted successfully.');
    }
    public function search(Request $request)
        {
            // print_r($request->ajax());
            // exit();
            if ($request->ajax()) {
                $output = "";
                $products = DB::table('product')
                    ->where('productname', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('modelno', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('shot_description', 'LIKE', '%' . $request->search . "%")
                    ->orWhere('description', 'LIKE', '%' . $request->search . "%") 
                    ->get();

              
                         return view('searchpage',['products' => $products]);
              
            }
        }
    public function contact()
        {
          return view('contact');
        }
    public function contactmsg(Request $request)
    {
         $this->validate($request, [
                    
                    'title' => 'required',
                    'description' => 'required|min:20',
                ]);
               
                
                  $date=date("Y-m-d h:i:s");
             DB::table('testimonials')->insert(['title' => $request->input('title'),
                                    'description' => $request->input('description'),
                                    'created_at' => $date
                                    ]);
                echo "Record inserted successfully.<br/>";
               return redirect('/contact')->with('success', 'Send Message review successfully.');
    }
}
