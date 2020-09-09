@extends('layouts.admin')  @section('content') 


<style type="text/css">
    .imagp{
    style='max-height: 30vh;
    max-width: 30vh;'
    }
</style>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        @if($errors->any())
    <div  class="alert alert-danger" style="width: 30%;  float: right;">
        <ul>
            @foreach ($errors->all() as $error)
            <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="forms">
            <h2 class="title1">Forms</h2>

            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                  
                    <h4>Add Product:</h4>
                </div>
                <div class="form-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Model</label>
                            <input type="text" class="form-control" value="{{old('modelno')}}" id="Category Name" name="modelno" placeholder="Model Numbar" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Name</label>
                            <select style="width: 100%; font-weight: 400;" name="cat_id" class="form-control1">
                                <option value="" hidden="">select Category Name</option>
                                <?php foreach ($catdata as $key) { ?>
                                <option value="<?php echo $key->cat_id; ?>"><?php echo $key->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">product Name</label>
                            <input type="text" class="form-control" value="{{old('productname')}}" id="Category Name" name="productname" placeholder="product Name " />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Shot Description</label>
                            <textarea class="form-control" name="shot_description">{{old('shot_description')}}</textarea>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">image</label>
                                    <input type="file" class="form-control-file" name="image" class="custom-file" id="file" onchange="previewImage();" />
                                    <div align="right">
                                        <img class="img-rounded" style="width: 15vh; height: 15vh;" id="preview" />
                                        <div class="error"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Other images</label>
                                    <input type="file" class="form-control-file" id="imgname" onchange="preview_images();" multiple name="imgname[]" class="custom-file" />
                                    <div class="row" id="image_preview"></div>
                                </div>
                                <div style="display: flex;">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Price</label>
                                        <input type="number" id="price" value="{{old('price')}}" class="form-control" id="Category Name" name="price" placeholder="Price" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Discount</label>
                                        <input type="number" onKeyup="calc();" value="{{old('discount')}}" id="dis" class="form-control" id="Category Name" name="discount" placeholder="discount " />
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Discount Price</label>
                                        <input type="number" id="dis_amt" class="form-control" value="{{old('discount_price')}}" id="Category Name" name="discount_price" placeholder="discountprice " />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">sell price</label>
                                        <input type="number" id="sell_rs" class="form-control" value="{{old('sell_price')}}" id="Category Name" name="sell_price" placeholder="sell price " />
                                    </div>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>
                        </div></form></div></div></div></div></div>

                        <script type="text/javascript">
                            function calc() {
                                var price = Number(document.getElementById("price").value);
                                var dis = Number(document.getElementById("dis").value);

                                ans = (price * dis) / 100;
                                document.getElementById("dis_amt").value = ans;

                                ans1 = price - ans;
                                document.getElementById("sell_rs").value = ans1;
                            }
                        </script>
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
                        <script>
                            function preview_images() {
                                var total_file = document.getElementById("images").files.length;
                                for (var i = 0; i < total_file; i++) {
                                    $("#image_preview").append("<div class='col-md-2' ><img style='width: 15vh; height: 15vh' class='img-responsive imagp' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                }
                            }
                        </script>
                        @endsection
                   
            
      