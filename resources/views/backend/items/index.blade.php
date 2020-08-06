@extends('backendtemplate')

@section('title', 'Items')
@section('custom-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('backendtemplate/jquery-confirm/jquery-confirm.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<h2 class="d-inline-block">Items Lists</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Codeno</th>
				<th>Name</th>
				<th>Price</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->codeno}}
					<a href="{{route('items.show', $item->id)}}">
						<span class="badge badge-success">More</span>
					</a>

					<a href="#" class="detailBtn" data-photo="{{ asset($item->photo) }}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-description="{{$item->description}}">
						<span class="badge badge-primary"><i class="fas fa-eye"></i></span>
					</a>
				</td>
				<td>{{$item->name}}</td>
				<td>{{$item->price}}</td>
				<td>
					<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>
					<form id="form-id-{{ $item->id }}" class="d-inline-block" method="post" data-submit="false" action="{{route('items.destroy', $item->id)}}" onsubmit="return submitted(this);">
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
	<script src="/js/app.js"></script>
	<script type="text/javascript" src="{{ asset('backendtemplate/jquery-confirm/jquery-confirm.min.js') }}">
	</script>
	<script type="text/javascript">
	$(document).ready(function(){

		$('.detailBtn').click(function() {
			let photo = $(this).data('photo');
			let name = $(this).data('name');
			let codeno = $(this).data('codeno');
			let price = $(this).data('price');
			let description = $(this).data('description');

			$('.itemImg').attr('src', photo);
			$('.name').text(name);
			$('.content').html(`<p>${codeno}</p>
								<p>${price} MMK</p>
								<p>${description}</p>`);

			$('#detailModal').modal('show');

		});

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

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title name" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
      		<div class="row">
      			<div class="col-md-6">
      				<img src="" class="img-fluid itemImg d-block">
      			</div>
      			<div class="col-md-6 content">
      				
      			</div>
      		</div>
      		<table class="table">
      			<tbody class=""></tbody>
      		</table>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection