<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\users;
use Storage;
use DB;


class settings extends Controller
{
       public function get()
    {
        //echo $id;

        $get = DB::table('settings')
            ->where('settings_id', '1')
            ->get();
        // print_r($get);
        // exit();
        return view('setingspahe', ['get' => $get]);
    }
    public function updatedata(request $request)
    {
        $id = $request->input('id');

       
       
        $data = ['company_name' =>$request->input('company_name') ,'mapurl' =>$request->input('mapurl') ,  'Email' =>$request->input('Email') ,'mobile_number' =>$request->input('mobile_number') ,'address' =>$request->input('address') ,'terms_conditions' =>$request->input('terms_conditions') ];
        //DB::table('users')->whereIn('id', $id)->update($data);

        // echo "<pre>";
        // print_r($data);
        // exit();
        DB::table('settings')
            ->where('settings_id', $id)
            ->update($data);

        echo "Record update successfully.<br/>";
        return redirect('/categoryilist')->with('success', 'Settings update successfully.');
    }
}


