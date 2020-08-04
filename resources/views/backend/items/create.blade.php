@extends('backendtemplate')

@section('title', 'Items')

@section('content')
<div class="container-fluid">
	<h2>Create Item</h2>
	<form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="inputCodeNo" class="col-sm-2 col-form-label">Code No</label>
			<div class="col-sm-6">
				<input type="text" maxlength="5" class="form-control @if($errors->has('codeno')) {{ 'is-invalid' }} @endif" id="inputCodeNo" name="codeno" value="{{ old('codeno') }}">
			    @if($errors->has('codeno'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('codeno') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			      	</div>
			    @endif
			</div>
		</div>
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
			<label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-6">
				<input type="file" class="form-control-file @if($errors->has('photo')) {{ 'is-invalid' }} @endif" id="inputPhoto" name="photo">
			    @if($errors->has('photo'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('photo') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			      	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
			<div class="col-sm-6">
				<input type="number" class="form-control @if($errors->has('price')) {{ 'is-invalid' }} @endif" id="inputPrice" name="price" value="{{ old('price') }}">
			    @if($errors->has('price'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('price') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			      	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
			<div class="col-sm-6">
				<input type="number" class="form-control @if($errors->has('discount')) {{ 'is-invalid' }} @endif" id="inputDiscount" name="discount" value="{{ old('discount') }}">
			    @if($errors->has('discount'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('discount') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			      	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-6">
				<textarea class="form-control @if($errors->has('description')) {{ 'is-invalid' }} @endif" id="inputDescription" name="description" rows="3">{{ old('description') }}</textarea>
			    @if($errors->has('description'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('description') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			    	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
			<div class="col-sm-6">
				<select class="form-control custom-select @if($errors->has('brand')) {{ 'is-invalid' }} @endif" id="inputBrand" name="brand">
						<option value="" @if(empty(old('brand'))){{ 'selected' }}@endif>Choose Brand</option>
						@foreach($brands as $brand)
						<option value="{{ $brand->id }}" @if(old('brand') == $brand->id){{ 'selected' }}@endif>{{ $brand->name }}</option>
						@endforeach
				</select>
				@if($errors->has('brand'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('brand') as $message)
				        	<li>{{ $message }}</li>
				        @endforeach
				        </ul>
			     	</div>
			    @endif
			</div>
		</div>
		<div class="form-group row">
			<label for="inputSubcategory" class="col-sm-2 col-form-label">Subcategory</label>
			<div class="col-sm-6">
				<select class="form-control custom-select @if($errors->has('subcategory')) {{ 'is-invalid' }} @endif" id="inputBrand" name="subcategory">
						<option value="" @if(empty(old('subcategory'))){{ 'selected' }}@endif>Choose Subcategory</option>
						@foreach($subcategories as $subcategory)
						<option value="{{ $subcategory->id }}" @if(old('subcategory') == $subcategory->id){{ 'selected' }}@endif>{{ $subcategory->name }}</option>
						@endforeach
				</select>
				@if($errors->has('subcategory'))
			      	<div class="invalid-feedback">
				      	<ul>
				        @foreach ($errors->get('subcategory') as $message)
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