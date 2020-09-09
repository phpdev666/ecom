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
            <h4>Testi Monials List:</h4>
            <a class="btn btn-success" style="float: right;" href="{{url('test')}}">Add Testi Monials</a>
            <table class="table table-hover" id="tbl">
               <thead>
                  <tr>
                     <th>#</th>
                     
                     <th>Title</th>
                     <th>Description</th>
                    
                     <th>Show</th>
                     
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
                     <th scope="row"><?php echo $no++;?></th>
                     <td>{{ $key->title }}</td>
                    
                     <td><?php $sub=$key->description; ?>{{ substr($sub,0,80)}} </td>
                    
                     
                    

                     <td><a href="/show/test/{{$key->test_id }}" class="btn btn-primary">Show</a></td>
                     
                    
                     <td><a href="/edit/test/{{$key->test_id }}" class="btn btn-info">Edit</a></td>
                     <td><a onclick="myFunction(<?php echo $key->test_id  ;?>)"  class="btn btn-danger">Delete</a></td>
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
       window.location.href = "/Delete/test/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
