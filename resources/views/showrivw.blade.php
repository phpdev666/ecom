@extends('layouts.admin')
 @section('content')


 <div id="page-wrapper">
   <div class="main-page">
    
      <div class="forms">
         <h2 class="title1">review</h2>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                     
               <h4>Add review:</h4>
            </div>
            <div class="form-body">
 <a href="/reviewlist" style="float: right;" class="btn btn-primary">Bake</a>

	<div class="form-group"><label><b>Review ID :</b></label> <label>{{ $pro[0]->review_id  }}</label></div>


	<div class="form-group"><label><b>Title :</b></label> <label>{{ $pro[0]->title }}</label></div>

	<div class="form-group"><label><b>Description :</b></label> <label>{{ $pro[0]->description }}</label></div>


	
	 

</div></div></div></div></div>


 @endsection