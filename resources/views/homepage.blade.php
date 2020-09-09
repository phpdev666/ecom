@extends('layouts.user') 

@section('content')

	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="{{ url('user/images/11.jpg') }}" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Buy Rice Products Are Now On Line With Us</h3>
				</div>
			</li>
			<li>
				<img src="{{ url('user/images/22.jpg') }}" alt="" />
				  <div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
			
			<li>
				<img src="{{ url('user/images/44.jpg') }}" alt="" />
				<div class="slide-desc">
					<h3>Whole Spices Products Are Now On Line With Us</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->

	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top selling offers</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active" style="width: 100%;"><a href="#expeditions" id="expeditions-tab" role="tab"  aria-expanded="true"> PRODUCTS</a></li>
						
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp" align="center">
								<h5>Advertised this week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>
							@foreach ($get as $pro)
						<div class="agile_top_brands_grids">
								<div class="col-md-4 top_brand_left"  style="margin-bottom: 10px;">
									<div class="hover14 column" >
										<div class="agile_top_brand_left_grid" style=" min-height: 40vh;
    min-width: 33vh;">
											
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="{{ url('products',$pro->product_id)}}"><img style="  min-height: 19vh;  max-width: 50vh;
    max-height: 19vh;" src="{{url('uploads/productimage/',$pro->image)}}" /></a>		
															<p>{{ substr($pro->productname, 0,30) }}..</p>
															
															<h4>{{$pro->sell_price }} <span>{{$pro->price }}</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
																					
													<form action="{{url('addcart',$pro->product_id )}}" method="post">
														@csrf
														<fieldset>
															<input type="hidden" name="path" value="home">
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
								</div>
								  @endforeach
								<div align="center">{{ $get->links() }}</div>

								<div class="clearfix"> </div>
							</div>
						</div>
					</div></div>
				</div></div>
			</div></div>
		</div>
		</div>
	</div>
	</div>
</div>
			
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          @foreach($sld as $sl)
        <li data-target="#myCarousel" data-slide-to="1"></li>
   		 @endforeach
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         
       <a href="personalcare.html"> <img style="width: 100%; max-height: 55vh;" class="second-slide " src="{{url('uploads/slider/11.jpg')}}" alt="123 slide"></a>
        </div>
        @foreach($sld as $sl)
        <div class="item">
         <a href="personalcare.html"> <img style="width: 100%" class="second-slide " src="{{url('uploads/slider',$sl->image)}}" alt="1111 slide"></a>
         
        </div>
        @endforeach
       
      </div>
    
    </div><!-- /.carousel -->
    
@endsection