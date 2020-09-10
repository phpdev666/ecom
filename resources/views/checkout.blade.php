@extends('layouts.user') @section('content')


<form method="post" action="{{url('checkoutinsert')}}">@csrf
<div class="row">
    <div class="col-md-8" style="padding: 15vh;">
    	<div class="form-group" style="display: flex;">
	    	<input type="text" name="fist_name" class="form-control" value="{{old('fist_name')}}" placeholder="Fist Name" style="  margin: 0 15px 0 0;"> 
	    	<input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" placeholder="Las Name">
    	</div>
    	<div style="color: #d25555;">
    	  @error('fist_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  @error('last_name')<span class="invalid-feedback" role="alert"><strong style="float: right;">{{ $message }}</strong></span>@enderror
		</div>
    	<div class="form-group">
	    	<input type="number" name="number"  value="{{old('number')}}"  class="form-control" placeholder="content Number">
    	</div>
    	<div style="color: #d25555;">
    	  @error('number')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  </div>
    	<div class="form-group">
	    	<input type="email" name="email"  value="{{old('email')}}"   class="form-control" placeholder="Email">
    	</div>
    	<div style="color: #d25555;">
    	  @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  </div>
    	<div class="form-group">
	    	<textarea name="address" class="form-control" placeholder="Address">{{old('email')}} </textarea>
    	</div>
    	<div style="color: #d25555;">
    	  @error('address')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  </div>
    	<div class="form-group" style="display: flex;">
			<select name="country" class="form-control">
				<option hidden value="">select country</option>
				<option>United States</option>
				<option>Russia</option>
				<option>China</option>
				<option>india</option>
				<option>Australia</option>
				<option>Argentina</option>
				<option>Kazakhstan</option>
				<option>Sudan</option>				
			</select>
			<select name="state" class="form-control" style=" margin: 0 0 0 15px;">
				<option hidden value="">select  state</option>
				<option>Sakha Republic</option>
				<option>Gujrat</option>
				<option>State of Western Australia</option>
				<option>Krasnoyarsk Krai</option>
				<option>Greenland</option>
							
			</select>	
    	
    	 </div>
    	 <div style="color: #d25555;">
    	  @error('country')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  @error('state')<span class="invalid-feedback" role="alert"><strong style="float: right;">{{ $message }}</strong></span>@enderror
		</div>
    	 <div class="form-group" style="display: flex;">
			
			<select name="City" class="form-control" style=" margin: 0 15px 0 0;">
				<option hidden value="" >state  City </option>
				<option>Surat</option>
				<option>Jerusalem</option>
				<option>Cape Town</option>
				<option>Tel Aviv</option>
				<option>Marrakesh, Morocco</option>
				<option>Kyoto</option>
		
			</select>	    
				<input type="number" name="pincode" value="{{old('pincode')}}"   class="form-control" placeholder="Pin code">
    	 </div>
    	  <div style="color: #d25555;">
    	  @error('City')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    	  @error('pincode')<span class="invalid-feedback" role="alert"><strong style="float: right;">{{ $message }}</strong></span>@enderror
		</div>
    	 <div class="form-group" >
    	 	<button type="submit" class="btn btn-primary" style=" font-size: 20px; float: right;">submit</button>
    	 </div>
   	</div>
    <div class="col-md-4" style="padding: 60px;">
        <table id="tblid" class="table table-hover">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Product</th>
                    <th>Quality</th>

                    <th>Price</th>
                </tr>
            </thead>
            <label style="display: none;">{{$no=1}}</label>

            @foreach($data as $key)

            <tr>
                <td>{{$no++}}</td>
                <td>{{substr($key['name'],0,30)}}..</td>
                <td>{{$key['qty']}}</td>
                <td>{{$key['qty']*$key['price']}}</td>
                <input type="hidden" name="pro[{{$no-1}}][id]" value="{{$key['pid']}}" />
                <input type="hidden" name="pro[{{$no-1}}][qty]" value="{{$key['qty']}}" />
                <input type="hidden" name="pro[{{$no-1}}][price]" value="{{$key['price']}}" />
            </tr>

            @endforeach
        </table>
    </div>
</div>
</form>
@endsection
