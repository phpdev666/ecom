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
               <h4>Add slider:</h4>
            </div>
            <div class="form-body">
  <form  method="post" enctype="multipart/form-data">
   
        @csrf
        <div><label>Name</label> <input type="test" name="name" class="form-text" style="width: 100%;" placeholder="Name" /></div>

        <div><label>Image</label><input style="width: 100%;" type="file" name="image" id="file"  onchange="previewImage();" /></div>
        <br />
        <img style="margin: 20px; max-width: 50vh;max-height: 30vh;float: right;" class="profile-img" id="preview" />
        <div><input type="submit" name="sunmit" class="btn btn-success" /></div>
  
</form>
</div>
         </div>
      </div>
   </div>
</div>
</div>
<script>
        function previewImage() {
            var file = document.getElementById("file").files;
            if (file.length > 0) {
                var fileReader = new FileReader();

                fileReader.onload = function (event) {
                    document.getElementById("preview").setAttribute("src", event.target.result);
                };

                fileReader.readAsDataURL(file[0]);
            }
        }
    </script>
@endsection
