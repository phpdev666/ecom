@extends('layouts.admin')

@section('content')
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h2 class="title1">Forms</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
               <h4>Add Category:</h4>
              
            </div>
            <div class="form-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
 <input  type="hidden" name="id"  value="{{$get[0]->id}}">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " value="{{$get[0]->name}}" name="name"  autocomplete="name" autofocus>

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$get[0]->email}}" class="form-control " name="email" autocomplete="email">

                                                            </div>
                        </div>

                   
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                      @if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
            <li style=" display: block; " class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                    </form>
                </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
