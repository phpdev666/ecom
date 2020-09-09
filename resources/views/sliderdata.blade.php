@extends('layouts.admin')

@section('content')
<div class="col-sm-12">

  
</div>
<!-- main content start-->
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
            <h4>slider List:</h4>
            <a class="btn btn-success" style="float: right;" href="/slider/add">Add slider</a>
            <table class="table table-hover" id="tbid">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>slider Name</th>
                     <th>Image</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <?php
                  $no=1;
                  
                  foreach ($data as $key ) {
                  
                  ?>
               <tbody>
                  <tr>
                     <th scope="row">{{ $no++}}</th>
                     <td>{{ $key->name}}</td>
                    <td><img class="img-responsive" style="   max-width: 25vh;max-height: 25vh;" src="{{ url('uploads/slider/') }}/{{$key->image}}"></td>
                     <td><a href="/edit/slider/{{$key->slider_id }}" class="btn btn-primary">Edit</a></td>
                     <td><a onclick="myFunction(<?php echo $key->slider_id ;?>)"  class="btn btn-danger">Delete</a></td>
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
       window.location.href = "/Delete/slider/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
