@extends('layouts.admin') 

@section('content')


<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h2 class="title1"> Settings</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                      @if ($errors->any())
    <div >
        <ul>
            @foreach ($errors->all() as $error)
            <li style=" display: block; " class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
               <h4>Settings:</h4>
            </div>
            <div class="form-body">
               <form method="post" action="settings">
   @csrf
                   <input type="hidden" name="id" value="{{$get[0]->settings_id }}">

                  
                  <div class="form-group">
                   <label for="">company Name</label>
                    <input type="text" name="company_name" value="{{$get[0]->company_name}}" class="form-control" id="company Name"  placeholder="company Name">
                     </div>

                     <div class="form-group">
                   <label for="">company Email</label>
                    <input type="text" name="Email" value="{{$get[0]->Email}}" class="form-control" id="company Email"  placeholder="company Email">
                     </div>
                 
                  <div class="form-group">
                   <label for="">Mobile Number</label>
                    <input type="text" name="mobile_number" value="{{$get[0]->mobile_number}}" class="form-control" id="company Email"  placeholder="company Mobilen Number">
                     </div>

                   <div class="form-group">
                   <label >Address</label>
                   <textarea name="address"  placeholder="Address" style=" width: 100%; min-height: 10vh;">{{$get[0]->address}}</textarea>
                     </div>
                      <div class="form-group">
                   <label >Map URL</label>
                   <textarea name="mapurl" id="map" placeholder="mapurl" style=" width: 100%; min-height: 10vh;">{{$get[0]->mapurl}}</textarea>
                     </div>
                    
                    <div class="form-group">
                   <label><b>Terms Conditions</b></label>
                   <textarea name="terms_conditions" id="temp" placeholder="Address" style=" width: 100%; ">{{$get[0]->terms_conditions}}</textarea>
                     </div>

                  <button type="submit" class="btn btn-success">Submit</button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
 <script>
                        CKEDITOR.replace( 'temp' );
 </script>
  <script>
                        CKEDITOR.replace( 'map' );
 </script>
@endsection
