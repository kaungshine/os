$('.add-to-cart').on('click', function(event){
	event.preventDefault();
    let my_cart = localStorage.getItem('my_cart');
    let product = {
      id: $(this).data('id'),
      name: $(this).data('name'),
      price: $(this).data('price'),
      photo: $(this).data('photo'),
      quantity: 1
    };
    if(!my_cart){
      my_cart = '{"product_list": []}';
    }
    var my_cart_obj = JSON.parse(my_cart);
    var has_value = false;
    $(my_cart_obj.product_list).each((i, v) => {
      if(product.id == v.id){
        v.quantity += 1;
        has_value = true;
      } 
  	})
    if(!has_value)
      my_cart_obj.product_list.push(product);
    localStorage.setItem('my_cart', JSON.stringify(my_cart_obj));  
    showBadgeCount();
});
$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$('.checkout').click(function () {
		let loStr = localStorage.getItem('my_cart');
		if(loStr){

			$.post(url,{data:loStr}, function (res){
				console.log(res);
			})
			localStorage.clear();
			window.location.href="/";
		}
	})

	showBadgeCount();
	showTable();
	$('#cart-table-001').on('click', '.increase-qty', function(){
		change_product_quantity(1, $(this).closest('tr').data('id'));
		showBadgeCount();
	})
	$('#cart-table-001').on('click', '.decrease-qty', function(){
		change_product_quantity(2, $(this).closest('tr').data('id'));
		showBadgeCount();	
	})
});


function change_product_quantity(type, id){
var my_cart = localStorage.getItem('my_cart');
var my_cart_obj = JSON.parse(my_cart);
$(my_cart_obj.product_list).each(function(i, v){
  if(v.id == id){
    if(type == 1){
      v.quantity += 1;
    }else{
      if(v.quantity == 1){
        var ans = confirm('Are you sure to delete?');
        if(ans){
          my_cart_obj.product_list.splice(i, 1);
        }
      }else v.quantity--;
    }
  }
});
localStorage.setItem('my_cart', JSON.stringify(my_cart_obj));
showTable();
}

function showTable(){
	if($('#cart-table-001').length !== null){
		let my_cart = localStorage.getItem('my_cart');
		let html = '';
		if(!my_cart){
			html = `<tr><td colspan=5 class="text-center">No Record</td></tr>`;
		}
		else{
			let my_cart_obj = JSON.parse(my_cart)['product_list'];
			let total = 0;
			$.each(my_cart_obj, function(key, value){
				let subtotal = value.price * value.quantity;
				total += subtotal;
				html += `
					<tr data-id="${value.id}">
						<td><img src="${value.photo}" class="img-thumbnail" width=100 height=100></td>
						<td>${value.name}</td>
						<td>${value.price}</td>
						<td>
						<span class="increase-qty"><i class="fas fa-plus-square fa-lg btn_plus"></i></span>
						${value.quantity}
						<span class="decrease-qty"><i class="fas fa-minus-square fa-lg btn_minus"></i></span>
						</td>
						<td>${subtotal}</td>
					</tr>
				`;
			});
			html += `<tr><td colspan=4 class="text-center">Total</td><td>${total}</td></tr>`;
		}
		$('#cart-table-001').find('tbody').html(html);
	}
}
function showBadgeCount(){
	let my_cart = localStorage.getItem('my_cart');
	if(!my_cart){
		$('#show-cart-badge').text('0');
	}	
	else{
		let my_cart_obj = JSON.parse(my_cart)['product_list'];
		let qty = 0;
		$.each(my_cart_obj, function(key, value){
			qty += Number(value.quantity);
		});	
	    $('#show-cart-badge').text(qty);
	}
}