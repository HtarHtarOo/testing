$(document).ready(function(){
show_cart();
update_cart_count();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

	$('.addtocartBtn').click(function(){
		//alert("Hi");

				var id=$(this).data('id');
				var product_name=$(this).data('name');
				var product_price=$(this).data('price');
				var product_discount=$(this).data('discount');
				var product_photo=$(this).data('photo');

				var product={id:id,product_name:product_name,
            product_price:product_price,product_discount:product_discount,
            product_photo:product_photo,quantity:1};
				
				//console.log(id,product_name,product_price,product_discount,product_photo);
				// var oldcart=localStorage.getItem('cart');
				//console.log(product);
			
        add_to_cart(product);
        update_cart_count();
				
          })


           $("#shoppingcart_table").on('click','.fa-plus-circle',function(){
            var id=$(this).data('id');
            //alert(id);
            var mycart=localStorage.getItem('mycart');
            var mycart_obj=JSON.parse(mycart);
            $.each(mycart_obj.product_list,function(i,v){
              if(v.id==id){
                v.quantity++;
              }
            })

            localStorage.setItem('mycart',JSON.stringify(mycart_obj));
              show_cart();
              update_cart_count();
            
          })

          $("#shoppingcart_table").on('click','.fa-minus-circle',function(){
            var id=$(this).data('id');
            //alert(id);
            var mycart=localStorage.getItem('mycart');
            var mycart_obj=JSON.parse(mycart);
            $.each(mycart_obj.product_list,function(i,v){
              if(v){
              if(v.id==id){
                if(v.quantity==1){
                  var ans=confirm('Are you sure to delete?');
                  if(ans){
                    mycart_obj.product_list.splice(i,1);
                  }
                }else{
                   v.quantity--;
                }

               }
            }
          })
             localStorage.setItem('mycart',JSON.stringify(mycart_obj));
              show_cart();
              update_cart_count();
            
          })

          $("#shoppingcart_table").on('click','#btndelete',function(){
            var id=$(this).data('id');
            var mycart=localStorage.getItem('mycart');
            var mycart_obj=JSON.parse(mycart);
            $.each(mycart_obj.product_list,function(i,v){
              //alert('odk');
              if(v){
                if(v.id==id){
                  var ans=confirm('Are you sure to delete');
                  if(ans){
                    mycart_obj.product_list.splice(i,1);
                  }
                }
              }
            })
            localStorage.setItem('mycart',JSON.stringify(mycart_obj));
            show_cart();
             update_cart_count();
          })

          //For Buy Now
          $('.buy_now').on('click',function(){
            var notes=$('.notes').val();
            var shopString=localStorage.getItem("mycart");
            if(shopString){
              $.post('/orders',{shop_data:shopString,notes:notes},function(response){
                if(response){
                  alert(response);
                  localStorage.clear();
                  show_cart();
                  location.href="/";
                }
              })
            }
          })


          function show_cart(){
            var mycart=localStorage.getItem('mycart');
            if(mycart){
              var mycart_obj=JSON.parse(mycart);
              if(mycart_obj.product_list.length){
                var html='';
                var j=1;var total=0;
                $.each(mycart_obj.product_list,function(i,v){
                  if(v){
                    var id=v.id;
                    var product_name=v.product_name;
                    var product_price=v.product_price;
                    var product_photo=v.product_photo;
                    var quantity=v.quantity;
                    var subtotal=quantity*product_price;
                    total+=subtotal;
                    html+=`<tr>
                              <td>
                                <input type='submit' class='btn btn-danger' id="btndelete" value='X'>
                             </td>
                              <td>
                              <img src='${product_photo}' width=120 height=100>
                              </td>
                              <td>
                              <p>${product_name}</p>
                              <p>Code Number</p>
                              </td>
                              <td>
                              <i class='btn fa fa-plus-circle fa-2x' style="color:blue" data-id=${v.id}></i>
                              <span class="badge badge-success" style="font-size:20px">${quantity}</span>
                              <i class='btn fa fa-minus-circle fa-2x' style="color:red" data-id=${v.id}></i>
                              </td>
                              <td>
                              <p class="text-danger">${product_price}Ks</p>
                              </td>
                              <td>${subtotal}Ks</td>
                            
                        </tr>`;
                        j++;
                  }
                   
                })
                html+=`<tr><td colspan=5>Total</td>
                  <td>${total}Ks</td></tr>`;
                $("#shoppingcart_table").html(html);
                $("#total").html(total);
              }else{
                $("#shoppingcart_table").html('');
              }
            }else{
              $("table").html('');
            }
          }


          
          function add_to_cart(product){
            var mycart=localStorage.getItem('mycart');
            if(!mycart){
              mycart='{"product_list":[]}';
            }
            var mycart_obj=JSON.parse(mycart);
           //console.log(mycart_obj);
           //push product into mycart_obj
           var has_id=false;
           $.each(mycart_obj.product_list,function(i,v){
            if(v.id==product.id){
              has_id=true;
              v.quantity+=1;
            }
           })
           if(!has_id){
            mycart_obj.product_list.push(product);
           }
           //convert mycart to JSON string and store in localstorage
           localStorage.setItem('mycart',JSON.stringify(mycart_obj));
           //console.log(mycart);

          }

          function update_cart_count(){
            var mycart=localStorage.getItem('mycart');
            if(mycart){
              //json string to obj
              var mycart_obj=JSON.parse(mycart);
              //check product_list array
              if(mycart_obj.product_list.length){
                var total=0;
                $.each(mycart_obj.product_list,function(i,v){
                  //console.log(i,v);
                  total+=v.quantity;
                })
                $(".cart_item_count").html(total);
              }else{
                $(".cart_item_count").html(0);
              }
            }else{
              $(".cart_item_count").html(0);
            }

          }
        });

