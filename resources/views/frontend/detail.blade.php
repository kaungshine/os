@extends('frontendtemplate')

@section('title', 'Item Detail')

@section('content')
	<div class="container">
		<h4 class="mt-4">Detail Page</h4>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-5">
					<img src="{{asset($item->photo)}}" class="img-fluid w-75" >
				</div>
				<div class="col-md-7">
					<table class="table">
						<tbody>
							<tr>
								<td>Product Name:</td>
								<td>{{$item->name}}</td>
							</tr>
							<tr>
								<td>Product Code:</td>
								<td>{{$item->codeno}}</td>
							</tr>
							<tr>
								<td>Product Price:</td>
								<td>{{$item->price}} $</td>
							</tr>
							<tr>
								<td>Description:</td>
								<td>{{$item->description}}</td>
							</tr>
						</tbody>
					</table>
					
					<button data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{$item->price}}" data-photo="{{asset($item->photo)}}" class="btn btn-info btn-block mt-5 add-to-cart">Add To Cart</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection