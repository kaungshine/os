@extends('backendtemplate')

@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2>Edit Item</h2>
	{{-- Must Show related input errors --}}
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('items.update', $item->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="inputCodeNo" class="col-sm-2 col-form-label">Code No</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputCodeNo" name="codeno" value="{{$item->codeno}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputName" name="name" value="{{$item->name}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-6">
				<input type="file" class="form-control-file" id="inputPhoto" name="photo">
				<img src="{{asset($item->photo)}}" width="100">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-6">
				<input type="number" class="form-control" id="inputPrice" name="price" value="{{$item->price}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
			<div class="col-sm-6">
				<input type="number" class="form-control" id="inputDiscount" name="discount" value="{{$item->discount}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-6">
				<textarea class="form-control" id="inputDescription" name="description">{{$item->description}}</textarea> 
			</div>
		</div>
		<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
			<div class="col-sm-6">
				<select name="brand" class="custom-select">
					<optgroup label="Choose Brand">
						@foreach($brands as $brand)
						<option value="{{$brand->id}}" @if($brand->id == $item->brand_id){{'selected'}} @endif>{{$brand->name}}</option>
						@endforeach
					</optgroup>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
			<div class="col-sm-6">
				<select name="subcategory" class="custom-select">
					<optgroup label="Choose Subcategory">
						@foreach($subcategories as $subcategory)
						<option value="{{$subcategory->id}}" @if($subcategory->id == $item->subcategory_id){{'selected'}} @endif>{{$subcategory->name}}</option>
						@endforeach
					</optgroup>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6">
				<input type="submit" class="btn btn-primary" name="btnsubmit" value="Update">
			</div>
		</div>
	</form>
</div>
@endsection