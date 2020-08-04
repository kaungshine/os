@extends('backendtemplate')

@section('title', 'Subcategories')
@section('custom-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('backendtemplate/jquery-confirm/jquery-confirm.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Subcategories Lists</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right btn-sm">Add New Subcategory</a>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Subcategory Name</th>
				<th>Category Name</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subcategories as $subcategory)
			<tr>
				<td>{{$subcategory->id}}</td>
				<td>{{$subcategory->name}}</td>
				<td>{{$subcategory->category->name}}</td>
				<td>
					<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>
					<form id="form-id-{{ $subcategory->id }}" class="d-inline-block" method="post" data-submit="false" action="{{route('subcategories.destroy', $subcategory->id)}}" onsubmit="return submitted(this);">
						@csrf
						@method('DELETE')
					
						<input type="submit" name="btn-submit" value="Delete" class="btn btn-danger">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('custom-js')
	<script type="text/javascript" src="{{ asset('backendtemplate/jquery-confirm/jquery-confirm.min.js') }}">
	</script>
	<script src="/js/app.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var status = '<?php if(session('status')) echo session('status'); else echo ""; ?>';
		switch(status) {
		  case 'stored':
		  	sweetalert('Item sucessfully stored');
		    break;
		  case 'updated':
		    sweetalert('Item sucessfully updated');
		    break;
		  case 'deleted':
		    sweetalert('Item sucessfully deleted');
		    break;
		  default:
		    // code block
		}
	function sweetalert(message){
		swal.fire({
		  icon: 'success',
		  title: message,
		  showConfirmButton: false,
		  timer: 1500
		})
	}
	})
	function submitted(obj){
		console.log(obj.dataset.submit);
		if(obj.dataset.submit === "false")
		{
			show(obj);
			return false;
		}
		return true;
	}
	function show(obj){
        $.confirm({
            title: 'Delete',
            content: 'You want to delete?',
            icon: 'fa fa-question',
            animation: 'scale',
            closeAnimation: 'zoom',
            type: 'orange',
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function(){
                    	console.log('Hello');
                    	obj.dataset.submit = 'true';
                    	let form_id = obj.getAttribute('id');
                        $('#' + form_id).submit();
                    }
                },
                cancel: function(){
                   $.alert({
                   		title: 'Cancelled!',	
                        icon: 'fa fa-rocket',
                        content: 'You clicked <strong>cancel</strong>',
                    });
                }
            }
        });
	}
	</script>
@endsection