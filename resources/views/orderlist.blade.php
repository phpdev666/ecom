@extends('layouts.admin') @section('content')

<div id="page-wrapper" style="min-height: 918px;">
   <div class="main-page">
      <div class="tables">

         <h2 class="title1">Tables</h2>


  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
 <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Category List:</h4>
            <a class="btn btn-success" style="float: right;" href="/addcatagori">Add Category</a>
            <table class="table table-hover" id="tbid">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>order_id</th>
                     <th>product_id</th>
                     <th>qty</th>
                     <th>fist name</th>
                     <th>fist_name</th>
                     <th>number</th>
                     <th>email</th>
                     <th>address</th>
                     <th>country</th>
                     
                     <th>City</th>
                     <th>pincode</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <?php
                  $no=1;
                  
                  foreach ($data as $key ) {
                  
                  ?>
               <tbody>
                  <tr>
                     <th scope="row"><?php echo $no++;?></th>
                     <td> {{$key->order_id}}</td>
                     <td><a href="{{url('show/pro',$key->product_id)}}">{{$key->productname}}</a></td>
                     <td>{{$key->qty}}</td>
                     <td>{{$key->fist_name}}</td>
                     <td>{{$key->fist_name}}</td>
                     <td>{{$key->number}}</td>
                     <td>{{$key->email}}</td>
                     <td>{{$key->address}}</td>
                     <td>{{$key->country}}</td>
                    
                     <td>{{$key->City}}City</td>
                     <td>{{$key->pincode}}pincode</td>
                     
                     
                     <td><a onclick="myFunction(<?php echo $key->add_id ;?>)"  class="btn btn-danger">Delete</a></td>
                  </tr>
                  <?php
                     }
                         ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<script>
   function myFunction($id) {
     var txt;
     var r = confirm("Press a button!");
     if (r == true) {
       window.location.href = "/Delete/order/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           

@endsection
