@extends('frontendtemplate')

@section('title', 'Item Detail')

@section('content')
	<div class="container">
		<h4 class="my-4">Cart Page</h4>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<img src="" class="img-fluid">
					</td>
					<td>Item One</td>
					<td>100</td>
					<td>3</td>
					<td>300</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection