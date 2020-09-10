@extends('layouts.user') 
@section('content')
<style>


* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Singlepage</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>
	<div class="products">
	
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="expandedImg" style="max-height: 30vh; margin: auto;" src="{{url('uploads/productimage/',$get[0]->image)}}" class="img-responsive"> <div id="imgtext"></div>
					<br>

					<?php $geta = DB::table('product_image')->where('product_id', $get[0]->product_id)->get();?>
					<div class=" agileinfo_single_left" >
						
						<img style="max-width: 15vh; margin: 10px; max-height: 15vh;  padding: 5px;"  onclick="myFunction(this)" src="{{url('uploads/productimage/',$get[0]->image)}}">
					@foreach($geta as $subimg)

						<img style="max-width: 15vh; margin: 10px; max-height: 15vh;  padding: 5px;"  onclick="myFunction(this)" src="{{url('uploads/allimg/',$subimg->imgname)}}">
						@endforeach
					</div>
				</div>

				<div class="col-md-8 agileinfo_single_right">
				<h2>{{$get[0]->productname}}</h2>

						

					<div class="w3agile_description">
						<h4>Shot Description :</h4>
						<p>{{$get[0]->shot_description}}.</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">{{$get[0]->sell_price}} <span>{{$get[0]->price}}</span>&nbsp&nbsp&nbsp<b>{{$get[0]->discount}}% OFF</b></h4>
						</div>
						@if($get[0]->status=='deactivate')
						<h2 style="color: red;">Out of stock</h2>
						@else
						
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="{{url('addcart',$get[0]->product_id )}}" method="post">
								@csrf
								<fieldset>
									<input type="hidden" name="path" value="products/{{$get[0]->product_id}}">
									<input type="hidden" name="id" value="{{$get[0]->product_id}}">
									<input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>
						@endif
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$get[0]->description}}.</p>
					</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	
<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>New offers</h3>
				<div class="agile_top_brands_grids">
					@foreach($pro as $pr)
					<div class="col-md-3 top_brand_left-1">
						<div class="hover14 columna">
							<div class="agile_top_brand_left_grid">
								
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
													<a href="{{ url('products',$pr->product_id)}}"><img style="  min-height: 19vh;  max-width: 50vh;
    max-height: 19vh;" src="{{url('uploads/productimage/',$pr->image)}}" /></a>		
												<p style="display: none;">{{$name=$pr->productname}}</p>
												<p>{{substr($name, 0,45)}}</p>
													<h4>{{$pr->sell_price}} <span>{{$pr->discount_price}}</span></h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
@if ($pr->status=='deactivate')
<h4 style="font-size: 22px; color: red;">OUT OF STOCK</h4>
@else
												<form action="{{url('addcart',$pr->product_id )}}" method="post">
													@csrf
													<fieldset>
														<input type="hidden" name="path" value="products/{{$get[0]->product_id}}">
														<input type="hidden" name="id" value="{{$pr->product_id}}">
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
@endif
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					@endforeach
						<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->
@endsection