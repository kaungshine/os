$('.add-to-cart').on('click', function(){
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

});