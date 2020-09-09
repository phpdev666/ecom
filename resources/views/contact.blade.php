@extends('layouts.user') 
@section('content')
<?php         $company = DB::table('settings')->where('settings_id', '1')->get();  ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- contact -->
	<div class="about">
		<div class="w3_agileits_contact_grids">
			<div class="col-md-6 w3_agileits_contact_grid_left">
				<div class="agile_map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.359475725184!2d72.88492081540426!3d21.21758928667979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f7a8074dc8b%3A0x29b9f4ed714ea7db!2sKartum%20Infotech!5e0!3m2!1sen!2sin!4v1599561817031!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="agileits_w3layouts_map_pos">
					<div class="agileits_w3layouts_map_pos1">
						<h3>Contact Info</h3>
						<p>{{$company[0]->address}}.</p>
						<ul class="wthree_contact_info_address">
							<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">{{$company[0]->Email}}</a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i>{{$company[0]->mobile_number}}</li>
						</ul>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 w3_agileits_contact_grid_right">
				<h2 class="w3_agile_header">Leave a<span> Message</span></h2>
				 @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
				<form action="{{url('contactmsg')}}" method="post">@csrf
					<span class="input input--ichiro">
						<input class="input__field input__field--ichiro" type="text" id="input-25" name="title"  required="" />
						<label class="input__label input__label--ichiro" for="input-25">
							<span class="input__label-content input__label-content--ichiro">Message Title</span>
						</label>
					</span>
					
					<textarea name="description" placeholder="Your message here..." required=""></textarea>
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- contact -->
@endsection