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
            <li style="display: block;" class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
               <h4>Add Testi Monials :</h4>
            </div>
            <div class="form-body">
               <form method="post">
   @csrf
                   

                  
                  <div class="form-group">
                   <label for="exampleInputPassword1">title</label> 
                   <input type="text" name="title" class="form-control" id="Category Name"  placeholder="Title">
                    </div>

                  <div class="form-group">
                   <label for="exampleInputPassword1">Description</label> 
                   <textarea name="description" style="  min-height: 20vh; width: 100%; border: 1px solid #ccc;" placeholder="Description"></textarea>
                    </div>
                 
                 
                 
                  <button type="submit" class="btn btn-success">Submit</button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
