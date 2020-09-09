@extends('layouts.admin') 

@section('content')


<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h2 class="title1">Forms</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                      @if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
            <li style="width: 30%; display: block; float: right;" class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
               <h4>Add Category:</h4>
            </div>
            <div class="form-body">
               <form method="post">
   @csrf
                   

                  
                  <div class="form-group"> <label for="exampleInputPassword1">Category Name</label> <input type="text" name="name" class="form-control" id="Category Name"  placeholder="Category Name"> </div>
                 
                 
                 
                  <button type="submit" class="btn btn-success">Submit</button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
