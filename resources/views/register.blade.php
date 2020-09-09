@extends('layouts.admin') 

@section('content')


<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
          @if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
            <li style="display: block; " class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
         <h2 class="title1">Forms</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                    
               <h4>Add User:</h4>
            </div>
            <div class="form-body">
               <form method="post" action="{{url('addregister')}}">
   @csrf
                   

                  
                  <div class="form-group">
                   <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" id="Category Name"  placeholder=" Name">
                     </div>
                 
                 <div class="form-group">
                   <label for="exampleInputPassword1">E-Mail Address</label>
                  <input id="email" type="email" class="form-control " name="email" value="" autocomplete="email" placeholder=" E-Mail Address">
                     </div>

                     <div class="form-group">
                   <label for="exampleInputPassword1">Password</label>
                   <input id="password" type="password" class="form-control " name="password" autocomplete="new-password" placeholder=" Password">
                     </div>

                     <div class="form-group">
                   <label for="exampleInputPassword1">Confirm Password</label>
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder=" Confirm Password">
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
