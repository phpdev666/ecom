@extends('layouts.admin')

@section('content')

<div class="col-sm-12">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
            <table class="table table-hover" id="myTable">
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
                   ?>
                  
                 
               <tbody>
                  @foreach ($data as $key ) 

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
                 @endforeach
               </tbody>
            </table>
            <div align="right">
             <a class="btn btn-success" href="{{ route('file-export') }}">Excel  data</a>
             <a class="btn btn-primary" href="{{url('file-import-export')}}">Excel Insert data</a>

             </div>
         </div>
      </div>
   </div>
</div>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

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
