@extends('layouts.admin')
 @section('content')



<div id="page-wrapper">
   <div class="main-page">
     @if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
            <li style="  display: block;" class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <div class="forms">
         <h2 class="title1">Forms</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                     
               <h4>Add Review:</h4>
            </div>
            <div class="form-body">
                
               <form method="post">
   @csrf
                   <div class="form-group"> 
                    <label for="exampleInputPassword1">Product</label> 
                   <select name="product_id" class="form-control">
                       <option value="" hidden="">Selevt Product</option>
                       @foreach($data as $key)
                       <option value="{{$key->product_id }}">{{ $key->productname}}</option>
                       @endforeach
                   </select>
                </div>

                  <div class="form-group"> 
                    <label for="exampleInputPassword1">Title</label> 
                    <input type="text" name="title" class="form-control" id="Category Name"  placeholder="Category Name"> 
                </div>
                 
                  <div class="form-group">
                   <label for="exampleInputPassword1">Description</label>
                    <textarea style="border: 2px solid #ccc; width: 100%; min-height: 25vh;" name="description"></textarea> 
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
