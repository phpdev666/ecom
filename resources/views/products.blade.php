@extends('layouts.user') 

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--- products --->
	<div class="products">
		<div class="container-fluid">
			<div class="col-md-2 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						@foreach($cat as $cats)
						<li><a href="{{url('/products/select',$cats->cat_id )}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$cats->name}}</a></li>
					@endforeach
							
						
					</ul>
				</div>																																												
			</div>
			<div class="col-md-9 products-right">
				

				@foreach($get as $pro)
				
				<div class="agile_top_brands_grids">
								<div class="col-md-3 top_brand_left"  style="margin-bottom: 10px;">
									<div class="hover14 column" >
										<div class="agile_top_brand_left_grid" >
											
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{ url('products',$pro->product_id)}}"><img style="  min-height: 19vh;  max-width: 50vh;
    max-height: 19vh;" src="{{url('uploads/productimage/',$pro->image)}}" /></a>		
															<p>{{ substr($pro->productname, 0,25) }}..</p>
															
															<h4>{{$pro->sell_price }} <span>{{$pro->price }}</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
																					
													<form action="{{url('addcart',$pro->product_id )}}" method="post">
														@csrf
														<fieldset>
															<input type="hidden" name="path" value="{{ url('products/select',$pro->cat_id) }}">
															<input type="hidden" name="id" value="{{$pro->product_id}}">
															<input type="submit" name="submit" value="Add to cart" class="button">
														</fieldset>
													</form>

														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div></div>
					@endforeach
					
					
						<div class="clearfix"> </div>
				</div>
				
			<div class="clearfix"> </div>
			<div align="center">{{$get->links()}}</div>
	</div>
<!--- products --->
@endsection