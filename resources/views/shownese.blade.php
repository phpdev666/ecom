@extends('layouts.admin')
 @section('content')


 <div class="col-sm-12">


</div>
<!-- main content start-->
<div id="page-wrapper" style="min-height: 918px;">
   <div class="main-page">
      <div class="tables">
         <h2 class="title1">Tables</h2>
 
         <div class="bs-example widget-shadow" data-example-id="hoverable-table">

 <a href="/listnews" style="float: right;" class="btn btn-primary">Bake</a>

	<div class="form-group"><label><b>Massage date :</b></label> <label>{{ $get[0]->created_at }}</label></div>


	<div class="form-group"><label><b>Massage  :</b></label> <label>{{ $get[0]->msg }}</label></div>
	
	

</div></div></div></div>


 @endsection