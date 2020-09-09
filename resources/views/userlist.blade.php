@extends('layouts.admin')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <h4>User List:</h4>
            <a class="btn btn-success" style="float: right;" href="{{url('addregister')}}">Add User</a>
            <table class="table table-hover" id="tbid">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Users Name</th>
                      <th>email</th>
                      <th>created</th>
                      <th>verified</th>
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
                     <th scope="row">{{$no++}}</th>
                     <td>{{  $key->name}}</td>
                    <td>{{  $key->email}}</td>
                    <td>{{  $key->created_at}}</td>
                    <td>@if($key->email_verified_at)
                      {{  $key->email_verified_at}}</td>
                        @else
                        <a href="{{ url('/verified/user')}}/{{  $key->id}}" class="btn btn-warning">verified</a>
                          @endif
                     <td><a href="{{ url('/edit/user')}}/{{  $key->id}}" class="btn btn-primary">Edit</a></td>
                     <td><a onclick="myFunction(<?php echo $key->id;?>)"  class="btn btn-danger">Delete</a></td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
   function myFunction($id) {
     var txt;
     var r = confirm("Press a button!");
     if (r == true) {
       window.location.href = "/Delete/user/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
