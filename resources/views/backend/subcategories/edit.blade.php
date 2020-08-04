@extends('backendtemplate')

@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2>Edit Subcategory</h2>
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
	<form method="post" action="{{route('subcategories.update', $subcategory->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputName" name="name" value="{{$subcategory->name}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
			<div class="col-sm-6">
				<select name="category" class="custom-select">
					<optgroup label="Choose Category">
						@foreach($categories as $category)
						<option value="{{$category->id}}" @if($category->id == $subcategory->category_id){{'selected'}} @endif>{{$category->name}}</option>
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