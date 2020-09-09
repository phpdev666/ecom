@extends('layouts.admin') 
@section('content') 
 
<style type="text/css">
   .imagp{
   style='max-height: 30vh;
   max-width: 30vh;'
   }
</style>
<!-- main content start-->
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
            <h4>Add Image:</h4>
         </div>
         <div class="form-body">
            <form method="post" action="/pro/image/{{$id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="insert_id" value="{{$id}}">
                    <div class="form-group">
                         <input type="file" class="form-control-file" id="images" onchange="preview_images();"  name="imgname" class="custom-file">
                         <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="Add images">
                        </div>
                          <div class="row" id="image_preview"></div>
                </form>
            </div>
            </div>
         </div>
      </div>
   </div>
</div>


<script>
   function preview_images() 
   {
    var total_file=document.getElementById("images").files.length;
    for(var i=0;i<total_file;i++)
    {
     $('#image_preview').append("<div class='col-md-2' ><img style='width: 15vh; height: 15vh' class='img-responsive imagp' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }
   }
</script>
 @endsection
                   