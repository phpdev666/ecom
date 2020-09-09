@extends('layouts.admin')
 @section('content')
 <div id="page-wrapper" style="min-height: 918px;">
   <div class="main-page">
      <div class="tables">
         <h2 class="title1">Tables</h2>
 
         <div class="bs-example widget-shadow" data-example-id="hoverable-table">

 <a href="/productilist" style="float: right;" class="btn btn-primary">Bake</a>

	<div class="form-group"><label><b>Product ID :</b></label> <label>{{ $pro[0]->product_id }}</label></div>


	<div class="form-group"><label><b>Model NO :</b></label> <label>{{ $pro[0]->modelno }}</label></div>


	<div class="form-group"><label><b>Category ID :</b></label> <label>{{ $pro[0]->cat_id }}</label></div>


	<div class="form-group"><label><b>Product Name :</b></label> <label>{{ $pro[0]->productname }}</label></div>


	<div class="form-group"><label><b>Shot Description :</b></label> <label>{{ $pro[0]->shot_description }}</label></div>


<div class="form-group"><label><b>Description  :</b></label> <label>{{ $pro[0]->description }}</label></div>


	<div class="form-group"><label><b>Image :</b></label> <img style="max-height: 40vh; max-width: 40vh; float: right;" src="/uploads/productimage/{{$pro[0]->image}}"></div>


	<div class="form-group"><label><b>Product price :</b></label> <label>{{ $pro[0]->price }}</label></div>


	<div class="form-group"><label><b>Product discount :</b></label> <label>{{ $pro[0]->discount }}</label></div>


	<div class="form-group"><label><b>Product Discount price :</b></label> <label>{{ $pro[0]->discount_price }}</label></div>


	<div class="form-group"><label><b>Product Sell Price :</b></label> <label>{{ $pro[0]->sell_price }}</label></div>

	
	<div class="form-group"><label><b>Mote Image</b></label><br><br>
		<?php foreach ($pro as  $value) {?>
		<img style=" max-width: 30vh; max-height: 30vh;" src="/uploads/allimg/{{$value->imgname}}">
		<?php
	} ?>
	 </div>



</div></div></div></div>
 @endsection