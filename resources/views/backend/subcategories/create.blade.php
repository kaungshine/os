@extends('backendtemplate')

@section('title', 'Subcategories')

@section('content')
<div class="container-fluid">
	<h2>Create Subcategory</h2>
	<form method="post" action="{{route('subcategories.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-6">
				<input type="text" class="form-control @if($errors->has('name')) {{ 'is-invalid' }} @endif" id="inputName" name="name" value="{{ old('name') }}">
			    @if($errors->has('name'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('name') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			      	</div>
			    @endif
			</div>
		</div>
		
		<div class="form-group row">
			<label for="inputSubcategory" class="col-sm-2 col-form-label">Category</label>
			<div class="col-sm-6">
				<select class="form-control custom-select @if($errors->has('category')) {{ 'is-invalid' }} @endif" id="inputBrand" name="category">
						<option value="" @if(empty(old('category'))){{ 'selected' }}@endif>Choose Category</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}" @if(old('category') == $category->id){{ 'selected' }}@endif>{{ $category->name }}</option>
						@endforeach
				</select>
				@if($errors->has('category'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('category') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			     	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6">
				<input type="submit" class="btn btn-primary" name="btnsubmit" value="Save">
			</div>
		</div>
	</form>
</div>
@endsection