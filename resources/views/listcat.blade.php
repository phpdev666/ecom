@extends('layouts.admin')

@section('content')

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
            <h4>Category List:</h4>
            <a class="btn btn-success" style="float: right;" href="/addcatagori">Add Category</a>
            <table class="table table-hover" id="tbid">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Category Name</th>
                     
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
               <?php
                  $no=1;
                  
                  foreach ($tabdata as $key ) {
                  
                  ?>
               <tbody>
                  <tr>
                     <th scope="row"><?php echo $no++;?></th>
                     <td><?php echo $key->name;?></td>
                    
                     <td><a href="/edit/cat/{{$key->cat_id}}" class="btn btn-primary">Edit</a></td>
                     <td><a onclick="myFunction(<?php echo $key->cat_id;?>)"  class="btn btn-danger">Delete</a></td>
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
       window.location.href = "/Delete/cat/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
