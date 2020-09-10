@extends('layouts.user') @section('content')

<div class="row">
    <div class="col-md-8" style="padding: 15vh;">
    	<div class="form-group">
	    	<input type="text" name="fist_name" class="form-control" placeholder="Fist Name">
	    	<input type="text" name="last_name" class="form-control" placeholder="Las Name">
    	</div>
    	<div class="form-group">
	    	<input type="number" name="number" min="10" max="10"  class="form-control" placeholder="content Number">
    	</div>
    	<div class="form-group">
	    	<input type="email" name="email"  class="form-control" placeholder="Email">
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

@endsection
