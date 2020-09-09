@extends('layouts.admin')

@section('content')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<!-- main content start-->
<div id="page-wrapper" style="min-height: 918px;">
   <div class="main-page">
      <div class="tables">
         <h2 class="title1">Tables</h2>
         <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Category List:</h4>
            <a class="btn btn-success" style="float: right;" href="/addproduct">Add Category</a>
            <table class="table table-hover" id="tbl">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Model No</th>
                     <th>Category Name</th>
                     <th>Product Name</th>
                     <th>shot Description</th>
                     <th>Description</th>
                     <th>image</th>
                     <th>Price</th>
                     <th>Discount</th>
                     <th>discount price</th>
                     <th>sell price</th>
                     <th>active/deactivate</th>
                     <th>Show</th>
                     
                     
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
              
               <label style="display: none;">  {{ $no=1}}</label>
                  
                  
                 
               <tbody>
                  @foreach ($tabdata as $key ) 
                  <tr>
                     <th scope="row"><?php echo $no++;?></th>
                     <td>{{ $key->modelno }}</td>
                     <td>{{ $key->cat_id }}</td>
                     <td><?php $proname=$key->productname; ?>{{ substr($proname,0,30)}} </td>
                     <td><?php $sub=$key->shot_description; ?>{{ substr($sub,0,80)}} </td>
                     <td><?php $disc=$key->description; ?>{{ substr($disc,0,150)}} </td>
                     <td><img style=" max-width: 20vh; max-height: 20vh;" src="uploads/productimage/{{$key->image}}"></td>
                     <td>{{ $key->price }}</td>
                     <td>{{ $key->discount }}</td>
                     <td>{{ $key->discount_price }}</td>
                     <td>{{ $key->sell_price }}</td>
                     <td>@if($key->status=='active') <a href="/pro/active/{{$key->product_id }}" class="btn btn-outline-warning">active</a>
                              @else <a href="/pro/active/{{$key->product_id }}" class="btn btn-warning">deactivate</a>@endif </td>
                     <td><a href="/show/pro/{{$key->product_id}}" class="btn btn-primary">Show</a></td>
                     
                    
                     <td><a href="/edit/pro/{{$key->product_id}}" class="btn btn-info">Edit</a></td>
                     <td><a onclick="myFunction(<?php echo $key->product_id ;?>)"  class="btn btn-danger">Delete</a></td>
                  </tr>
               @endforeach
                  </tbody>
                 
            </table>
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
    $('#tbl').DataTable();
} );
    </script>
<script>
   function myFunction($id) {
     var txt;
     var r = confirm("Press a button!");
     if (r == true) {
       window.location.href = "/Delete/pro/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
