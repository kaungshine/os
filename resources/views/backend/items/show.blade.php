@extends('backendtemplate')

@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2 class="text-center my-5">Item Details</h2>
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
							<td>{{$item->price}}</td>
						</tr>
						<tr>
							<td>Description:</td>
							<td>{{$item->description}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
@endsection