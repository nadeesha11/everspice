@extends('web.web_master')


@section('content')

 <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->

@if ($message = Session::get('alert'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif



<div class="container pb-80 pt-50 bg">
    
    
    <div class="row">
        <div class="col-lg-8 pb-40 pl-40">
            <h1 class="heading-2 mb-10">Your Cart</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand"><h5 id="count" ></h5></span> products in your cart</h6>
               
            </div>
        </div>
    </div>
   
   
  

    <div class="row white_bg mr-20 ml-20">
        <div class="col-lg-8">
            <div class="table-responsive  shopping-summery">
                
                <div >
                
                <!--<table class="table table-wishlist" style="background: white;">-->
                 <table  style="background: white;">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30  " style="border-radius:0">
                        
                            </th>
                            <th class="p-20"   scope="col    "></th>
                            <th class="text-center p-20"    scope="col  ">Name</th>
                            <th  class="text-center p-20" scope="col  ">Price</th>
                            <th  class="text-center p-20" scope="col ">Quantity</th>
                             <th  class="text-center p-20"  scope="col  "></th>
                            <th  class="text-center p-20"  scope="col  ">Subtotal</th>
                            <th  class="text-center p-20"  scope="col   " class="end"  style="border-radius:0">Remove</th>
                            <th  class="text-center p-20"   scope="col   " class="end"  style="border-radius:0">Update Qty</th>
                        </tr>
                    </thead>
                    <tbody id="mycart">

                    </tbody>
                </table>
                
                
                 </div>
                
                
                
                
                
                
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="cart-action d-flex justify-content-between">
                <a href="{{ url('/products') }}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
             
             
                
            </div>
            
            
            
            
            <!--test-->
             <div class="row mt-50">

                
                
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
   
                
                
            </div> 
            <!--test-->
            
            
            
            
            
        </div>
        <div class="col-lg-4">
            <div class="border p-md-4 cart-totals ml-30" style="background: white;">
                <div class="table-responsive">
                    <table class="table no-border">
                        <tbody>
                          
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 id="display_total" class="text-brand text-center"></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                    @if(session()->has('auth_user_session_object')) 
                    
                   <a id="checkout_button" href="{{ url('verfity_for_checkout') }}" class="btn mb-20 w-100">Checkout<i class="fi-rs-sign-out ml-15"></i></a>
                 
                    @else
                    
                   <a id="checkout_button" href="{{ url('customer/login') }}" class="btn mb-20 w-100">Checkout<i class="fi-rs-sign-out ml-15"></i></a>
                    
                    @endif
                 
                

                
            </div>
        </div>
    </div>
</div>



{{-- <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>

var table_body = document.getElementById('mycart');
var h3 = document.getElementById('count');
var h4 = document.getElementById('display_total');


var _html = '';
var _html2 = '';
var _html3 = '';

$.ajax({

       
url: "{{url('cart_json')}}", //this is your uri
type: 'get', //this is your method
success: function (data) {
//  console.log(data);
    var pro = JSON.parse(data);
   
    var count = pro.original.count;
    var total = pro.original.total;

    if(count>0){

        // console.log('cart not empty');
       
    }
    else{
        // console.log('cart  empty');
        //  console.log(count);
        document.getElementById("checkout_button").style.display = "none";
   
        
         

    }

    _html2+=count;
    _html3+=total;

    for (var i in pro.original.items) {
      
 
    var subtotal =  pro.original.items[i].subtotal;
    
    
    var subtotal1 = parseFloat(subtotal).toFixed(2);

    _html+='<tr  scope="row" class="pt-30 ">'+
                            '<td class="custome-checkbox p-7 p-20">'+
                           
                            '</td>'+
                            // '<td class="image product-thumbnail pt-40"><img src="" alt="not found"></td>'+
                            '<td class="image product-thumbnail p-20 ">'+
                    
                                '<img width="70px" src="{{ asset('/product_images/')}}/' +pro.original.items[i].weight+'.jpg'+ '" alt="product_images">' + 
                           
                               '</td>'+
                    
                            '<td class="custome-checkbox p-10 ">'+
                                '<p> '+pro.original.items[i].name+' </p>'+
                            '</td>'+
                            '<td class="price  p-10" data-title="Price">'+
                                '<h4 class="text-body"> '+'$'+pro.original.items[i].price+'  </h4>'+
                            '</td>'+
                           
                            '<td class="price  p-7"  data-title="Price">'+
                            
                            
                           '<input class="col-4 quantity_update " type="number" readonly style="width: 70%;"  value="'+pro.original.items[i].qty +'" id="'+pro.original.items[i].uid +'" onclick="update_cart()"  name="quantity_update" min="1" >'+
                               
                         
                                '<input type="hidden"  value="'+pro.original.items[i].uid +'" id="uid_update"   name="uid_update"  >'+

                                  
                            '</td>'+
                          
                              '<td class="price  p-7" data-title="Price">'+
                              
                                   '<div class="row">'+
                                  
                                      '<button   style=" font-size: 40%    !important;  width:10px !important;"     type="btn"  class="col-12 button-small  btn btn-primary btn-sm  m-1" onclick="increment('+pro.original.items[i].uid +');  update_cart('+pro.original.items[i].uid +')  "><i class="fa fa-plus" aria-hidden="true"></i></button>'+
                                      '<button   style="font-size: 40%    !important; width:10px !important; "    type="btn"  class="col-12 btn btn-primary btn-sm  m-1" onclick="decrement('+pro.original.items[i].uid +');  update_cart('+pro.original.items[i].uid +')  "><i class="fa fa-minus" aria-hidden="true"></i></button>'+
                                
                                   '</div>'+
                              
                              
                            '</td>'+
                       
                             '<td class="price p-10" data-title="Price">'+
                             
                         
                                '<h4 class="text-brand">'+'$'+subtotal1+' </h4>'+
                                
                            '</td>'+
                            
                            
                            
                            '<td class="action text-center m-1" data-title="Remove"><button style="  font-size: 60%    !important;  width:7px !important;" onclick="delete_confirm('+pro.original.items[i].uid+')"  class="btn  btn-sm text-body"><i style=" color: white !important;" class="fa fa-trash-o " aria-hidden="true"></i></button></td>'+
                            
                              '<td class="action text-center m-1" data-title="Remove"><button style="  font-size: 60%    !important;  width:7px !important;" onClick="window.location.reload();"  class="btn  btn-sm text-body"><i style=" color: white !important;"   class="fi-rs-refresh mr-10"></i></button></td>'+
  
                            
                        '</tr>';

    }

    if(count>0){

      
    }
    else{
//   console.log('testing one');
   _html+='<tr class="pt-30 "><td >'+'<P class="text-center">your cart is empty</P>'+'</td></tr>';


    }


    table_body.innerHTML = _html;
    h3.innerHTML = _html2;
    h4.innerHTML = "$"+_html3;

   

}


});

function delete_confirm(uid){
    var test = uid;
    $.ajax({
    url:"{{ url('cart_json_delete') }}"+"/"+test,
    dataType:'json',

        success:function(res){
                // console.log("res : "+res);
                location.reload();
        }
});



// ajax for send uid to controller
  

}


function update_cart(id){
    
   var  qty =  document.getElementById(id).value;
   var  uid_update =  id;

  
   
   
    
    // console.log(uid_update);
    // console.log(qty);

    

                
    
    // send data by post method
          $.ajax({
                      url: "cart_json_update",
                      method: "POST",
                      data: {
                            
                      qty:qty,
                      uid_update:uid_update,
                      
             
                      
        
                      },
                      headers: {'X-CSRF-TOKEN': $('#_token').val()},
                      context: document.body
                      }).done(function (response) {
                          
                        //   console.log(response);
                 
                     });
    
    
    
    
    
    
      // send data by post method
    
    
    
    


  

}







// updown key
 function increment(id) {
     
     var id = id;
  
      document.getElementById(id).stepUp();

      
   }
   
   
   function decrement(id) {
       
       var id = id;
       
      document.getElementById(id).stepDown();
    
   }

// updown key










</script>
@endsection