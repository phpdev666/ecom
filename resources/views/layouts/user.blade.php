
<!DOCTYPE html>
<html>
<head>
 <title>{{ config('app.name', 'Laravel') }}</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- //for-mobile-apps -->
<link href="{{ url('user/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ url('user/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ url('user/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->

<script src="{{ url('user/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ url('user/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ url('user/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('user/js/easing.js') }}"></script>

<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->

<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
 @if(session()->get('cart'))
  <body onload='swal("products insert Cart", "chake cart", "success");'></body>
 
  @endif
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="{{url('/')}}">SHOP NOW</a></p>
			</div>
			<div class="agile-login">

				<form method="post" action="{{url('logout')}}">@csrf
				<ul>
					
					<a><li><button name="submit" style="    border: none;background-color: #fff0;color: #fff;font-size: 16px;text-transform: uppercase;"> logout</button></li></a>
				
					
				</ul>
				</form>
			</div>
			<div class="product_list_header">  
			
						<a href="{{ url('cart') }}">
						<button class="w3view-cart" style="margin: -20px 0px 0px -15px;" type="submit" name="submit"><span class="badge" style="background-color: #dc3d3d;">	{{ DB::table('addtocart')->where('login_id',Auth::user()->id)->count()}}</span><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
					 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<?php         $company = DB::table('settings')->where('settings_id', '1')->get();  ?>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : {{$company[0]->mobile_number}}</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="{{url('/')}}">{{$company[0]->company_name}}</a></h1>
			</div>
		<div class="w3l_search" style="position: relative;">
			
				<input type="search" name="Search" placeholder="Search for a Product..." id="search">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
				<div id="livesearch" style=" width: 100%;   position: absolute;top: 41px;background-color: #fff; z-index: 1;"></div>
			</form>
		</div>
			




			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{url('/')}}" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<?php  $cat = DB::table('categort') ->get();?>
										@foreach($cat as $cats)
									<li class="dropdown">
										<a href="{{url('/products/select',$cats->cat_id )}}">{{$cats->name}}</a>	
									</li>
									@endforeach
								
									
									<li><a href="{{url('contact')}}">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
     @yield('content')

     
<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{$company[0]->address}} </li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">{{$company[0]->Email}}</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{$company[0]->mobile_number}}</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html">Groceries</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Household</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.html">Personal Care</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packagedfoods.html">Packaged Foods</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="beverages.html">Beverages</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.html">Create Account</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="{{url('user/images/card.png')}}" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<!-- js -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>



<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- main slider-banner -->
<script src="{{ url('user/js/skdslider.min.js') }}"></script>
<link href="{{ url('user/css/skdslider.css') }}" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<script type="text/javascript">
   
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){
    	console.log(data);
    document.getElementById("livesearch").innerHTML = data;
    }
    });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { csrftoken: "{{ csrf_token() }}" } });
</script>
<!-- //main slider-banner --> 
</body>
</html>