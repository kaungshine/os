@extends('backendtemplate')
@section('title','Orders')

@section('content')
	
<div class="container-fluid">
	<h2 class="d-inline-block my-3">Orders Lists</h2>
	<table class="table mt-3">
		<thead>
			<tr>
				<th>Voucher No</th>
				<th>User</th>
				<th>Total</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{$order->voucherno}}</td>
				<td>{{$order->user_id}}</td>
				<td>{{$order->total}}</td>
				<td>
					<a href="#" class="btn btn-info">Detail</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection