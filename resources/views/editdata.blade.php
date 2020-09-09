@extends('layouts.admin') 

@section('content')




<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h2 class="title1">Forms</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
               <h4>Edit Category:</h4>
            </div>
            <div class="form-body">
               <form method="post" action="{{ url('/edit/cat/$get[0]->cat_id') }}">
   @csrf
                 <input type="hidden" name="cat_id" value="{{ $get[0]->cat_id }}">  

                  
                  <div class="form-group"> <label for="exampleInputPassword1">Category Name</label> <input type="text" name="name" value="{{ $get[0]->name }}" class="form-control" id="Category Name"  placeholder="Category Name"> </div>
                 
                 
                 
                  <button type="submit" class="btn btn-success">Submit</button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
