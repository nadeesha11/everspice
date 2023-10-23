@extends('web.web_master')

@section('content')



<div class="bg">

   <div class="container pb-80 pt-50 "> 
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Checkout</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand" id="count"></span> products in your cart</h6>
            </div>
        </div>
    </div>

      <form method="post" class="white_bg"  action="{{ url('directpay') }}">
          
    <div class="row">
  

            <div class="row">
                <h4 class="mb-30">Shipping Details</h4>


                    @csrf

                    <div class="row">
                        
                        






                         @if(session()->has('auth_user_session_object'))    
                        
                            <div class="form-group col-lg-6">
                            <input type="text" required  maxlength="25" value="{{Session::get('auth_user_session_object')->first_name }}  " name="first_name" placeholder="First name *">
                            <span style="color: brown" >@error('first_name'){{ $message }} @enderror   </span>
                            </div>
                        
                        
                          @else

                           <div class="form-group col-lg-6">
                            <input type="text" value="{{ old("first_name") }}"  required  maxlength="25"  name="first_name" placeholder="First name *">
                            <span style="color: brown" >@error('first_name'){{ $message }} @enderror   </span>
                            </div>
                          
                  
                          @endif



                       
                       
                              @if(session()->has('auth_user_session_object')) 
                        
                             <div class="form-group col-lg-6">
                            <input type="text"   maxlength="25" value=" {{    Session::get('auth_user_session_object')->last_name }}" name="last_name" placeholder="Last name (optional)">
                            <span style="color: brown" >@error('last_name'){{ $message }} @enderror   </span>
                            </div>
                        
                        
                          @else

                             <div class="form-group col-lg-6">
                            <input type="text"   value="{{ old("last_name") }}"  maxlength="25" name="last_name" placeholder="Last name (optional)">
                            <span style="color: brown" >@error('last_name'){{ $message }} @enderror   </span>
                           </div>
                          
                  
                          @endif
                    
           

                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" required value="{{ old("billing_address1") }}" name="billing_address1" maxlength="25"  placeholder=" Address Line 1 *">
                            <span style="color: brown" >@error('billing_address1'){{ $message }} @enderror   </span>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text"    value="{{ old("billing_address2") }}"   name="billing_address2" maxlength="25"  placeholder=" Address Line 2 (optional )">
                            <span style="color: brown" >@error('billing_address2'){{ $message }} @enderror   </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" required  value="{{ old("billing_address3") }}"   name="billing_address3" maxlength="25"  placeholder="Town / City *">
                            <span style="color: brown" >@error('billing_address3'){{ $message }} @enderror   </span>
                        </div>
                        
                        
                        
                        <div class="form-group col-lg-6">
                            
                            <!--original code-->
                            <!--<input type="text" required  value=" old("billing_address4") "  name="billing_address4" maxlength="25"  placeholder="State *">-->
                            <!--original code-->
                                  <select required style="height:65px !important;"   name="billing_address4"   class="form-control " >
                                    <option  value="" selected>select your state</option> 
                                    <option value="Dubai" >Dubai</option>
                                    <option value="Abu Zaby/Abu Dhabi " > Abu Zaby/Abu Dhabi </option>
                                    <option value="Ras Al Khaimah " >Ras Al Khaimah </option>
                                    <option value="Al Fujayrah" >Al Fujayrah</option>
                                    <option value="Umm al Qaywayn" >Umm al Qaywayn</option>
                                    <option value="Ajman" >Ajman</option>
                                    <option value="Al Shariqah" >Al Shariqah</option>
                                
                                   
                                 
                                  </select>
                 
                           
                           
                            
                            <span style="color: brown" >@error('billing_address4'){{ $message }} @enderror   </span>
                        </div>
                        
                        
                        
                    </div>

                    <div class="row">
                        <div class="form-group  col-lg-6">
                            
                            {{-- <div class="custom_select"> --}}
                                    <select style="height:65px !important;" required id="country_dropdown" name="country" class="form-control  selectpicker" >
                                    {{-- <option selected>select your country</option> --}}
                                    <option value="" >select your country</option>
                                    @foreach ($shipping as $item)
                                    
                                   
                                    <option  country="{{ $item->country_name }}"  value="{{ $item->shipping_price  }}">{{ $item->country_name }}</option>
                                 
                                    
                                    
                                    @endforeach
                                   
                                    <span style="color: brown" >@error('country'){{ $message }} @enderror   </span>
                                  </select>
                         
                        {{-- </div> --}}
                    </div>





                         @if(session()->has('auth_user_session_object')) 
                        
                           <div class="form-group col-lg-6">
                           <input  type="email"  required value=" {{    Session::get('auth_user_session_object')->email }}" maxlength="35" name="email" placeholder="Email address *">
                           <span style="color: brown" >@error('email'){{ $message }} @enderror   </span>
                           </div>
                           </div>
                        
                        
                          @else

                         <div class="form-group col-lg-6">
                         <input required  type="email" value="{{ old("email") }}" maxlength="35" name="email" placeholder="Email address *">
                         <span style="color: brown" >@error('email'){{ $message }} @enderror   </span>
                         </div>
                         </div>
                          
                  
                          @endif



                    <!--</div>-->


                       <div class="row">
                        <div class="form-group col-lg-6">
                            <input   type="number" value="{{ old("zipcode") }}"  maxlength="10"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  name="zipcode" placeholder="Postcode / ZIP (optional )">
                            <span style="color: brown" >@error('zipcode'){{ $message }} @enderror   </span>
                        </div>
                        
                        
                        
                        
                        
                        
                         @if(session()->has('auth_user_session_object')) 
                        
                            
                        <div class="form-group col-lg-6">
                            <input required  type="number"  maxlength="20"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="{{    Session::get('auth_user_session_object')->phone }}"  name="phone" placeholder="Phone *">
                            <span style="color: brown" >@error('phone'){{ $message }} @enderror   </span>
                        </div>
                        
                          @else

                            
                        <div class="form-group col-lg-6">
                            <input required  type="number" value="{{ old("phone") }}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   maxlength="20" name="phone" placeholder="Phone *">
                            <span style="color: brown" >@error('phone'){{ $message }} @enderror   </span>
                        </div>
                          
                  
                          @endif
                        
                        
                        
                        
                        
                        
                        
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    
                    
                     <input type="hidden"  id="country_name" name="country_name" >
                     <input type="hidden"   name="user_id" value="{{ $cid }}">
              

                    {{-- <div class="row">
                       
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="email" placeholder="Email address *">
                        </div>
                    </div> --}}
                    <div class="form-group mb-30">
                        <textarea rows="5"  name="additional_information" maxlength="2000"  placeholder="Additional information (optional)"></textarea>
                        <span style="color: brown" >@error('additional_information'){{ $message }} @enderror   </span>
                    </div>
                    
                    
          
                    
                    
                    </div>
                    <!--ship diffrent address-->
                    
                     <div class="ship_detail">
                         
                        <div class="form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" value="chameel" id="differentaddress">
                                    <label class="form-check-label label_info" data-bs-toggle="collapse" data-target="#collapseAddress" href="#collapseAddress" aria-controls="collapseAddress" for="differentaddress"><span>Billing to a different address?</span></label>
                                </div>
                            </div>
                        </div>
                        
                        <div id="collapseAddress" class="different_address collapse in">
                            <div class="row">
                                
                                <div class="form-group col-lg-6">
                                    <input type="text"  value="{{ old("first_name_b") }}"   name="first_name_b"  placeholder="First name *">
                                     <span style="color: brown" >@error('first_name_b'){{ $message }} @enderror   </span>
                                </div>
                                
                                
                                <div class="form-group col-lg-6">
                                    <input type="text" value="{{ old("last_name_b") }}"  name="last_name_b"    placeholder="Last name (optional)">
                                     <span style="color: brown" >@error('last_name_b'){{ $message }} @enderror   </span>
                                </div>
                                
                            </div>
                            
                            <div class="row shipping_calculator">
                                
                                
                                <div class="form-group col-lg-6">
                                    <input  type="text"  value="{{ old("street_address_line_1_b") }}"  name="street_address_line_1_b"     placeholder=" Address Line 1 *">
                                     <span style="color: brown" >@error('street_address_line_1_b'){{ $message }} @enderror   </span>
                                </div>
                                
                                
                                
                                <div class="form-group col-lg-6">
                                <input type="text"  value="{{ old("street_address_line_2_b") }}"    name="street_address_line_2_b"  placeholder=" Address Line 2 (optional)">
                                  <span style="color: brown" >@error('street_address_line_2_b'){{ $message }} @enderror   </span>
                                </div>
                                

                                
                            </div>
                            
                            <div class="row">
                                
                                <div class="form-group col-lg-6">
                                    <input type="text"    name="town_b"  value="{{ old("town_b") }}"  placeholder="Town / City *">
                                    <span style="color: brown" >@error('town_b'){{ $message }} @enderror   </span>
                                </div>
                                
                          
                     
                                
                                  <div class="form-group col-lg-6">
                                    <input   type="text" name="company_name_b"  value="{{ old("company_name_b") }}"  placeholder="State *">
                                    <span style="color: brown" >@error('company_name_b'){{ $message }} @enderror   </span>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                            </div>
                            
                            
                            
                            <div class="row">
                                
                                
                              
                                       <div class="form-group  col-lg-6">
                            
                         
                             
                                    
                                     <input   type="text" name="country_b"  value="{{ old("country_b") }}"    placeholder="Choose country *">
                                    <span style="color: brown" >@error('country_b'){{ $message }} @enderror   </span>
                                    
                                
                                    
                                    
                                    
                         
                        
                             </div>
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group col-lg-6">
                                    <input   type="email" name="email_b"  value="{{ old("email_b") }}"    placeholder="Email Address *">
                                    <span style="color: brown" >@error('email_b'){{ $message }} @enderror   </span>
                                </div>
                                
                                
                                
                            </div>
                            
                            
                            <div class="row">
                                
                                <div class="form-group col-lg-6">
                                    <input   type="number" name="zip_b" maxlength="20"  value="{{ old("zip_b") }}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  placeholder="Post Code / Zip (optional)">
                                    <span style="color: brown" >@error('zip_b'){{ $message }} @enderror   </span>
                                </div>
                                
                                
                                 <div class="form-group col-lg-6">
                                    <input   type="number"  value="{{ old("phone_b") }}"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"   name="phone_b" maxlength="20"  placeholder="Phone *">
                                    <span style="color: brown" >@error('phone_b'){{ $message }} @enderror   </span>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                    
                      <!--ship diffrent address-->
                    
                    
                    
                    
                    
                   

                    {{-- hidden inputs --}}

                    <input type="hidden" id="amount" name="amount" value="">


                   <!--<input type="text" id="nadeesha" name="nadeesha" value="">-->
   
                    {{-- hidden inputs --}}

                    {{-- <button type="submit" class=" btn btn-fill-out btn-block mt-30 m-5 " > Place an Orders <i class="fi-rs-sign-out ml-15"></i> </button> --}}

                    {{-- old place for form --}}
                {{-- </form> --}}


            </div>
        </div>


        
        <div class="col-lg-12 mt-4">
            <div class="border p-40 cart-totals ml-15 mr-15 white_bg">
                {{-- <div class="d-flex align-items-end justify-content-between mb-30"> --}}
                 
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody id="order_details">
                      
                         
                        </tbody>
                    </table>
                </div>
                 <div >
                    <h3 class="m-3">Order</h3>

                    <table>


                        <tr>
                            <td> <h5 class="m-2">Total</td>
                            <td><h5 id="total"> </h5></h5></td>
                        </tr>
                        
                           <tr>
                            <td><h5 class="m-2">Shipping prices</td>
                            <td><p >Shipping charge $3.99(14.66 د.إ)apply for below 100$ orders <p></td>
                        </tr>


                       <!--for old details with shipping prices-->
                       
                        <!--<tr>-->
                        <!--    <td><h5 class="m-2">Shipping prices</td>-->
                        <!--    <td><h5 id="shipping_price"> </h5></h5></td>-->
                        <!--</tr>-->

                        <!--<tr>-->
                        <!--    <td> <h5 class="m-2">Total price </td>-->
                        <!--    <td> <h4 id="final"> </h4></h5></td>-->
                        <!--</tr>-->
                        
                           <!--for old details with shipping prices-->


                    </table>

                    {{-- <h5 class="m-2">Sub total  <span id="total"> </span></h5>
                    <h5 class="m-2">Shipping price   <span id="shipping_price"> </span></h5>
                    <h5 class="m-2">Total price  <span id="final"> </span></h5> --}}
                 
                  
                </div>
            <!--</div>-->

            <div class="payment row">
                <div class="col-md-8">
                <!--<h4 class="mb-30">Payment</h4>    -->
                </div>
                
                {{-- <div class="payment_option">
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="">
                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                    </div>
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="">
                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                    </div>
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
                    </div>
                </div> --}}
                
                        <div class="payment_option">
                    
                    <!--<div class="custome-radio">-->
                    <!--    <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios3" checked="">-->
                    <!--    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>-->
                    <!--</div>-->
                    
                    <div class="custome-radio">
                        <input class="form-check-input"  type="radio" name="payment_method" id="exampleRadios4" value="cash" checked="">
                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                    </div>
                    
                    <div class="custome-radio">
                        <input class="form-check-input"  type="radio" name="payment_method" id="exampleRadios5" value="card" checked="">
                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Card Payment</label>
                    </div>
                    
                </div> 

                {{--<div class="payment-logo d-flex">
                    <img class="mr-15" width="100px" src="about/logo-bckp-min_tvuf38" alt="">
                    
                    <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                    <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                    <img src="assets/about/" alt=""> 
                </div>--}}

                {{-- <a href="{{ url('directpay/start') }}" class="btn btn-fill-out btn-block mt-30 m-5">Place an Order<i class="fi-rs-sign-out ml-15"></i></a> --}}
                <div class="col-md-4">
                     <input type="text" id="coupon_code"   placeholder="coupon code">
                     <input type="hidden" id="coupon_id"  @if(Session::get('coupon_id')!="") value="{{Session::get('coupon_id')}}" @elseif(Session::get('coupon_id')!="") value="{{Session::get('coupon_id')}}" @endif   name="coupon_id" >
                     <input type="hidden" id="dis_qty"    @if(Session::get('dis_qty')!="") value="{{Session::get('dis_qty')}}"  @elseif(Session::get('dis_qty')!="") value="{{Session::get('dis_qty')}}" @endif   name="dis_qty" >
                     
                    <button type="button" class="  btn btn-warning m-2" onClick="couponcode();  "> apply </button>
                </div>
                 
                <div class="col-md-4">
                   
                    <button type="submit" onclick="AddPaymentInfo()"  id="place_order" class=" btn btn-fill-out btn-block mt-30 m-5 " > Place an Orders <i class="fi-rs-sign-out ml-15"></i> </button>
                    
                </div>
                
                
                </form>

            </div>
            
            <!--<br>-->
        </div>
    </div>
    
<!--</div>-->
<br>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>

    // meta check for facebook
   function  AddPaymentInfo(){
       
  	fbq('track', 'InitiateCheckout');


    
   }




$(document).ready(function(){
    
    
    
    

   
   
   
   
   
   
   
    
    
    
    var final_price_check;
    
            
        
        // check total value larger than 100$ (modified by nadeesha) testing
          
   $.ajax({
   
          
   url: "{{url('cart_json')}}", 
   type: 'get', 
   success: function (data) {


        var pro = JSON.parse(data);
      

         final_price_check = pro.original.total;
        
        // if(final_price_check>100){
            
        //     var country_shipping = 0.00;
        //     console.log(" delivery free"); 
            
        // } 
        // else{
        //      var country_shipping =  $('#country_dropdown').val();
        //      console.log(" delivery charge");  
            
        // }
       
        
 
   }
 
   });


        
   
        
        
        // check total value larger than 100$ (modified by nadeesha) testing
        
        
        
        
        
    
    
    
       $( "#country_dropdown" ).change(function() {
  
  
  
       var final_price_cal  = $("#country_dropdown").find(':selected').attr('country');
     
       
       

       document.getElementById("country_name").value = final_price_cal; //set value on myInputID
  
       });
    
    
    
    // code for get select country value
    
    
    
//     $( "#country_dropdown" ).change(function() {
  
  
//   var lol  = $("#country_dropdown").find(':selected').attr('country');

//      document.getElementById("country_name").value = lol; //set value on myInputID
  
//   });











// code for get select country value





    var last_price = 0;
    load(last_price)
    
    
    
    
    
    


      $("#country_dropdown").change(function (event) {

      
        last_price=0;


        var country_shipping =  $('#country_dropdown').val();
        
        
        // ajax code old here
      
        
        if(final_price_check>100){
            
         
           country_shipping = 0.00;
        } 
        else{
          
            
        }

        
        
        
        
        


        last_price = last_price+parseFloat(country_shipping);
      
        var order_details4 = document.getElementById('shipping_price');
        var  _details4 = '';
        _details4+=country_shipping;
        order_details4.innerHTML = "$"+_details4;
        // console.log(last_price);
        load(last_price)
        });
        











function load(last){

    $.ajax({
     
     url: "{{url('cart_json')}}", //this is your uri
     type: 'get', //this is your method
     success: function (checkout) {
     console.log(checkout);
        var pro = JSON.parse(checkout);
       
        var count = pro.original.count;
        
        
        
        if(count==0){
            
            $('#place_order').hide();
            
        }
        
        
        
        
        var total = pro.original.total;
        var final_price = last+parseFloat(total);
        var final_prices = final_price.toFixed(2);
        
        
        
        //   print final value in field
          document.getElementById("amount").value = total;
        //   print final value in field 
          
          
          
          
        
        // console.log(  final_prices+"("+(final_prices*3.67).toFixed(2)+")"    );
        
        // var prices for usd and aed mod by nadeesha
        
        
        
        var usd_aed2 = total+" ( د.إ"+(total*3.67).toFixed(2)+ " )";
        // console.log(usd_aed);
        
         // var prices for usd and aed mod by nadeesha
         
         
         
    
        // document.getElementById("amount").value = final_prices;
        // console.log(last_price);

        // total = total+ last_price;
        // console.log(final_price);
    
        var order_details =  document.getElementById('order_details');
        var order_details2 = document.getElementById('total');
        var order_details3 = document.getElementById('count');
        
        
        var order_details4 = document.getElementById('final');
        
        
    
        var  _details2 = '';
        var  _details  = '';
        var  _details3 = '';
        var  _details4 = '';
    
        _details2+=usd_aed2;
        _details3+=count;
        
        // mod by nadeesha for chnage usd to aed special
        // _details4+=final_prices;
         // mod by nadeesha for chnage usd to aed
        
        
        
        // _details4+=usd_aed;
    
        // console.log(count);
        // console.log(total);
        for (var i in pro.original.items) {
    
                   var subtotal = pro.original.items[i].subtotal;
                   var subtotal1 = parseFloat(subtotal).toFixed(2);
   
       
                                   _details+='<tr>'+
                                    '<td class="image product-thumbnail"><img src="{{ asset('/product_images/')}}/' +pro.original.items[i].weight+'.jpg'+ '" alt=""> </td>'+
                                   
                                    '<td>'+
                                        '<h4 class="w-160 mb-5">'+pro.original.items[i].name+'</h4></span>'+                              
                                    '</td>'+
                                     '<td>'+
                                        '<h4 class="w-160 mb-5">'+pro.original.items[i].price+'</h4></span>'+
                                    '</td>'+
                                    '<td>'+
                                        '<h4 class=" pl-20 pr-20">x '+pro.original.items[i].qty+'</h6>'+
                                    '</td>'+
                                    '<td>'+
                                        '<h4 class="text-brand">$'+subtotal1+'</h4>'+           
                                    '</td>'+
                                '</tr> ';
   
        }
    
        
       
        order_details.innerHTML = _details;
        order_details2.innerHTML = "$"+_details2;
        order_details3.innerHTML = _details3;
        
        // mod by nadeeesha for display aed currency
        // order_details4.innerHTML = "$"+_details4;
        
       // mod by nadeeesha for display aed currency
    
    
    }
    
    
    });

}



});




// for chnage new total price after coupon code button




// for chnage new total price after coupon code button














////////////////////////////// modified by chamil///////////////////////////////

function couponcode(){
    var value= document.getElementById("coupon_code").value;
    var pro_id=36;

       $.ajax({
         url: "{{url('check_cart_product')}}" + "/" + value, 
             
             type: 'get', //this is your method
             success: function (checkout) {
                console.log(checkout);

                if(checkout=="null"){
                     swal({
                        title: "Sorry!",
                        text: " Coupon code doesn't exists !! ",
                        icon: "warning",
                        button: "Ok!",
                    });
                }else if(checkout==-1){
                   
                     swal({
                        title: "Sorry!",
                        text: "Same code can't be used twice on the same order !! ",
                        icon: "warning",
                        button: "Ok!",
                    });
                
                }else if(checkout==-2){
                   
                     swal({
                        title: "Sorry!",
                        text: "coupon code expired !! ",
                        icon: "warning",
                        button: "Ok!",
                    });
                
                }else if(checkout==-3){
                   
                     swal({
                        title: "Sorry!",
                        text: "coupon code limit is over !! ",
                        icon: "warning",
                        button: "Ok!",
                    });
                
                }else{

                     var pro = JSON.parse(checkout);

       
                    document.getElementById("coupon_id").value=pro.data.coupon_id;
                    document.getElementById("dis_qty").value=pro.data.dis_qty;

                    var count = pro.data.dropdown_data.original.count;
                    var total = pro.data.dropdown_data.original.total;
                    
                    
                    
                        //   print final value in field
                           document.getElementById("amount").value = total;
                       //   print final value in field 
                    
                    
                    
                    
                    
                    
                    // test modified by nadeesha for change total price with shipping price after click coupon code
                    
                    
                    
                    var final_price = parseFloat(total);
                    
                    // var final_prices = final_price.toFixed(2);
                    
                    var country_shipping =  $('#country_dropdown').val();
                    
                    
                    
                    
                    
                    //  condion that check total price larger than 100 and add 0 to shipping price(modified by nadeesha)   
    
    
                //     if(total>100){
                  
                //   country_shipping = 0.00;
                //   console.log("chnage shipping price after coupon code");
         
                //      } 
                //     else{
          
                //   console.log("chnage shipping price after coupon code");
            
                //     }

                    
                    
                    
                    
                    //  condion that check total price larger than 100 and add 0 to shipping price(modified by nadeesha)  
                 
                    
                    
                    var country_shipping2 = parseFloat(country_shipping);
                    
                 
                    
                    
                    
                    
                    var last_price = final_price+country_shipping2;
                    
                  
                    
                    
                
                    // document.getElementById("amount").value = last_price;
                    
                    // mod by nadeesha for usd for diram
                    //  var usd_aed = last_price.toFixed(2)+" ( د.إ"+(last_price*3.67).toFixed(2)+ " )";
                       // mod by nadeesha for usd for diram
                    
                    
                     // test modified by nadeesha for change total price with shipping price after click coupon code
                    
                    
                     var usd_aed2 = total+" ( د.إ"+(total*3.67).toFixed(2)+ " )";
                    
                    
                    
                    var order_details =  document.getElementById('order_details');
                    var order_details2 = document.getElementById('total');
                    var order_details3 = document.getElementById('count');
                    var order_details4 = document.getElementById('final');
                
                    var  _details2 = '';
                    var  _details  = '';
                    var  _details3 = '';
                    var  _details4 = '';
                
                    _details2+=usd_aed2;
                    _details3+=count;
                    
                    
                    // mod by nadeesha for usd to diram
                    // _details4+=usd_aed;
                    
        
                     for (var i in pro.data.dropdown_data.original.items) {
                         
                          
                              var subtotal = pro.data.dropdown_data.original.items[i].subtotal;
    
    
                              var subtotal1 = parseFloat(subtotal).toFixed(2);
                        
                            
                         
                    
                                _details+='<tr>'+
                                    '<td class="image product-thumbnail"><img src="{{ asset('/product_images/')}}/' +pro.data.dropdown_data.original.items[i].weight+'.jpg'+ '" alt=""> </td>'+
                                   
                                    '<td>'+
                                        '<h4 class="w-160 mb-5">'+pro.data.dropdown_data.original.items[i].name+'</h4></span>'+
                                    '</td>'+
                                    //  '<td>'+
                                    //     '<h4 class="w-160 mb-5">'+pro.data.dropdown_data.original.items[i].uid+'</h4></span>'+
                              
                                    // '</td>'+
                                     '<td>'+
                                        '<h4 class="w-160 mb-5">'+pro.data.dropdown_data.original.items[i].price+'</h4></span>'+
                              
                                    '</td>'+
                                    '<td>'+
                                        '<h4 class=" pl-20 pr-20">x '+pro.data.dropdown_data.original.items[i].qty+'</h6>'+
                                    '</td>'+
                                    '<td>'+
                                    
                                        // '<h4 class="text-brand">$'+pro.data.dropdown_data.original.items[i].subtotal+'</h4>'+
                                            '<h4 class="text-brand">$'+subtotal1+'</h4>'+
                                        
                                    '</td>'+
                                '</tr> ';
    
                     }
                      
                    order_details.innerHTML = _details;
                    order_details2.innerHTML = "$"+_details2;
                    order_details3.innerHTML = _details3;
                    
                      // mod by nadeesha
                    order_details4.innerHTML = "$"+_details4;
                }
        
            }
    
    
    });
    

   
        //   $.ajax({
        //     type: 'POST',
        //     url: '/check_cart_product',
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         pro_id: pro_id,
        //         // ele: ele,
        //         // id: id,
        //         // qty: qty,
        //         // total: gross_total

        //     },
        // }).done(function (data) {
        //       var pro = JSON.parse(data);
           
        //   console.log(">>>>>>>>>>>>>>>> : "+data);
        //   for (var i in pro.original) {
        //         console.log(">>>>>>>>>>>>>>>> : "+  pro.original[i].price);
        //   }
         

    
        // });

       
}

</script>
    
@endsection
















