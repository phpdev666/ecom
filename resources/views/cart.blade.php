@extends('layouts.user') 

@section('content')

		<!-- breadcrumbs -->

			<div class="breadcrumbs">
				<div class="container">
					<ol class="breadcrumb breadcrumb1">
						<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
						<li class="active">Checkout Page</li>
					</ol>
				</div>
			</div>
		<!-- //breadcrumbs -->
<!-- checkout -->
		<div class="checkout-right-basket" style="float: right; margin: 1em 15em 0 1em;">
			<a href="{{url('home')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
		</div>
	<div class="checkout">

		<div class="container">

			<h2>Your shopping cart contains: <span>{{count($pro)}} Products</span></h2>

			<div class="checkout-right">
				<table id="tblid" class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<label style="display: none;">{{$no=1}}</label>
					@if($pro->count())
				<form>
				@foreach($pro as $data)
					<tr class="rem1">
						<td class="invert">{{$no++}}</td>
						<td class="invert-image"><a href="{{url('products',$data->product_id)}}"><img src="{{url('/uploads/productimage',$data->image)}}" style="margin: auto;max-height: 15vh;max-width: 15vh; " class="img-responsive" /></a></td>
						<td class="invert" style="width: 25vh;">
							 <div class="quantity"> 
							 	@if($data->status=='active')
								<div class="quantity-select">                           

									<input type="Number" onChange="total(this,{{$no-1}},{{$data->sell_price}})" value="1" class="qty" pattern="[1-9]{1}-[0-9]{2}"><br>
									
								</div>
								@else
								<div>
									<h3 style="color: red;">Out of stock </h3>
								</div>
								@endif
							</div>
						</td>
						<td class="invert">{{$data->productname}}</td>
						
						<input type="hidden" readonly id="price" value="{{$data->sell_price}}">
						
								<td class="total" style="">
									<b id="pricea">{{$data->sell_price}}</b>&nbsp;
									<b>X</b>&nbsp;
									<b class="qant_{{$no-1}}">1</b>
									<b> = </b>
									<b class="tot_{{$no-1}}">{{$data->sell_price}}</b>
								 </td>
								<td class="invert">
							<a href="{{url('removecat',$data->cart_id )}}"><div class="rem">
								<div class="close1"> </div>
								</a>
							</div>
							
						</td>
					</tr>
					
					 						
				@endforeach	
					@else
					<tr>
						<td colspan="6">No product Fist Add to Cart </td>
					</tr>
					@endif	
															<script>
										$('.value-plus').on('click', function(){
											var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
											divUpd.text(newVal);
											
											
										});

										$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
											if(newVal>=1) divUpd.text(newVal);
										});
										</script>
									<!--quantity-->
				</table>
				</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>
						<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$84.00</span></li>
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
 <script type="text/javascript">
                            function total($this,$no,$price) {

                                  // alert(document.getElementById('qty'));
                                 // var qty = $('#qty').html();
                                  
                                   // console.log($price);
                                var qty =$this.value;
                              // console.log(qty);
                                var price = $price;

                                 
                            	// document.getElementsByClassName("qant_{{$no}}").innerHTML = qty;
                            	$('.qant_'+$no).html(qty);
                               
                                 var ans = qty * price;
                                 // document.getElementById("tot").innerHTML  = price * qty;
          //                         console.log('.tot'+$no);
									 // console.log(ans);
                            	 $('.tot_'+$no).html(ans);

                               
                            }
                        </script>			

@endsection