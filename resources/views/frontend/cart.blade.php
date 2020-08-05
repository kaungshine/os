@extends('frontendtemplate')

@section('title', 'Item Detail')

@section('content')
	<div class="container">
		<h4 class="my-4">Cart Page</h4>
		<table id="cart-table-001" class="table table-bordered">
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

			</tbody>
		</table>
		<a href="#" class="btn btn-success checkout">Checkout</a>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		var url = "{{ route('checkout') }}";
	</script>
	<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection