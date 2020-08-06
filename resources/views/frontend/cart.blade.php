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

	<div class="row mb-3">
		<div class="col-md-12 cart-process">
			<a href="{{route('homepage')}}" class="btn btn-success float-left">Continue Shopping</a>

			@auth
			<a href="#" class="btn btn-info checkout float-right">Checkout</a>
			@else
				<a href="{{route('login')}}" class="btn btn-info float-right">Login to Checkout</a>
			@endauth
		</div>
	</div>

</div>
@endsection

@section('script')
<script type="text/javascript">
	var url = "{{ route('checkout') }}";
</script>
<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection