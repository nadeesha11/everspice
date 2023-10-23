

@extends('web.web_master')


@section('content')





 <div id="card_container">
        
   <input type="hidden" id="token" name="token" value="{{$csrf}}">   
   
   
    </div>
    <body>
     
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>-->
        
        <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
        
        <!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
        
        <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>-->
        <script>


        //   var obj = JSON.parse($purchase);
        //   console.log(obj);
        
        var purchase =   {!! json_encode($purchase, JSON_HEX_TAG) !!};
        
        
    
        //   console.log(purchase); 
          console.log(purchase[0].coupon_id); 
          console.log(purchase[0].dis_qty); 
         
        
             DirectPayCardPayment.init({
                    container: 'card_container', //<div id="card_container"></div>
                    merchantId: 'RE15035', //your merchant_id
                    amount:purchase[0].amount ,
                    refCode: "DP12346", //unique referance code form merchant
                    currency: 'USD',
                    type: 'ONE_TIME_PAYMENT',
                    customerEmail:purchase[0].email,
                    customerMobile:purchase[0].phone,
                    description:purchase[0].additional_information,  //product or service description
                    debug: true,
                    responseCallback: responseCallback,
                    errorCallback: errorCallback,
                    logo: 'https://test.com/directpay_logo.png',
                    apiKey: '4b1c4ac29cf412810627c5a79cb99070a9e71a39cf8a77bc5a0bc8ea3d9608a2'
                });

             //response callback.
             function responseCallback(result) {
                 
               

                 
                //  console.log(test);
                 
                    // location.href = "https://www.w3schools.com";
                    console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
                    $('#back').show();
                    $('#cancel').hide();
                    
                    
                    
                    
            //   $.ajax({
            //      type: 'POST',      
            //      data: JSON.parse(test),
            //      url:"{{ url('add_order_details') }}",
            //      dataType:'json',

            //   success:function(res){
            //   console.log("lol: "+res);
            //     }
            //   });
            
            
            // ajax with url variables
            
            
            
            //     $.ajax({
              
            //      url:"{{ url('add_order_details') }}",
            
            //      dataType:'json',
            
            //      success:function(res){
                     
            //      console.log("success");
                 
            //      console.log(res);
                
            //   }
            //   });
               
               
               
            // ajax with url variables
            
            
            
            // this is compulsory for run add_data function
             add_data(result);

            
            
            
            
            
            
                    
                }

             //error callback
             function errorCallback(result) {
                 
                 
                    // console.log("successCallback-Client", result);
                    alert(JSON.stringify(result));
                    
                    console.log("main error call back working : nadeesha");
                    
                    
                    error_data(result);
               }
               
               
               
         
               
        </script>

<script>

       function error_data(result){
           
           
           console.log("second error function is working : nadeesha");
           
           
       
                  console.log("successCallback-Client_nadeesha", result.data.message);
                  
                  
                  
                //  start  ajax fro send failed order details
                
                
                   $.ajax({
                      url: "add_order_error_details",
                      method: "POST",
                      data: {
                            
                      reason:result.data.message,
                      amount:purchase[0].amount,
                      billing_address1:purchase[0].billing_address1,
                      billing_address2:purchase[0].billing_address2,
                      billing_address3:purchase[0].billing_address3,
                      billing_address4:purchase[0].billing_address4,
                      country_name:purchase[0].country_name,
                      email:purchase[0].email,
                      first_name:purchase[0].first_name,
                      last_name:purchase[0].last_name,
                      phone:purchase[0].phone,
                      zipcode:purchase[0].zipcode,
                      country:purchase[0].country,
                      
                   
                      
        
                      },
                      headers: {'X-CSRF-TOKEN': $('#token').val()},
                      context: document.body
                      }).done(function (response) {
                          
                          console.log(response);
                 
                     });
                
                
                
                
                
                
                
                //  start  ajax fro send failed order details
                  
                  
                  
           
       }







    
         function add_data(result){
             
            //  console.log(">>>>>>>>result");
             
                
                // console.log(purchase);
                
                // console.log(purchase[0].first_name_b);
                // console.log(purchase[0].last_name_b);
                // console.log(purchase[0].street_address_line_1_b);
                // console.log(purchase[0].street_address_line_2_b);
                // console.log(purchase[0].town_b);
                // console.log(purchase[0].country_b);
                // console.log(purchase[0].company_name_b);
                // console.log(purchase[0].email_b);
                // console.log(purchase[0].zip_b);
                // console.log(purchase[0].p_id);
        
              
                               
                
                
                    $.ajax({
                      url: "add_order_details",
                      method: "POST",
                      data: {
                      additional_information:purchase[0].additional_information,
                      amount:purchase[0].amount,
                      billing_address1:purchase[0].billing_address1,
                      billing_address2:purchase[0].billing_address2,
                      billing_address3:purchase[0].billing_address3,
                      billing_address4:purchase[0].billing_address4,
                      country_name:purchase[0].country_name,
                      email:purchase[0].email,
                      first_name:purchase[0].first_name,
                      last_name:purchase[0].last_name,
                      phone:purchase[0].phone,
                      zipcode:purchase[0].zipcode,
                      country:purchase[0].country,
                      
                      user_id:purchase[0].user_id,
                      
                    //   billing details
                      
                      first_name_b:purchase[0].first_name_b,
                      last_name_b:purchase[0].last_name_b,
                      street_address_line_1_b:purchase[0].street_address_line_1_b,
                      street_address_line_2_b:purchase[0].street_address_line_2_b,
                      town_b:purchase[0].town_b,
                      country_b:purchase[0].country_b,
                      company_name_b:purchase[0].company_name_b,
                      email_b:purchase[0].email_b,
                      zip_b:purchase[0].zip_b,
                      phone_b:purchase[0].phone_b,
                      
                   
                    
                    //  coupon code data from form
                    
                      dis_qty:purchase[0].dis_qty,
                      coupon_id:purchase[0].coupon_id,
                    
                    
                    //  coupon code data from form
                      
        
                      },
                      headers: {'X-CSRF-TOKEN': $('#token').val()},
                      context: document.body
                      }).done(function (response) {
                          
                          console.log(response);
                 
                     });
                    
                                     
                // var request = new XMLHttpRequest();
                // var data = new FormData();
                                            
                //                             data.append('additional_information', purchase[0].additional_information);
                //                             data.append('amount', purchase[0].amount);
                //                             data.append('billing_address1', purchase[0].billing_address1);
                //                             data.append('billing_address2', purchase[0].billing_address2);
                //                             data.append('billing_address3', purchase[0].billing_address3);
                //                             data.append('billing_address4', purchase[0].billing_address4);
                //                             data.append('country_name', purchase[0].country_name);
                //                             data.append('email', purchase[0].email);
                //                             data.append('first_name', purchase[0].first_name);
                //                             data.append('last_name', purchase[0].last_name);
                //                             data.append('phone', purchase[0].phone);
                //                             data.append('zipcode',purchase[0].zipcode);
                                            
                //                             request.open('POST', 'add_order_details', true);
                //                             request.send(data);
                //                             request.onload = ()=>{
                                                
                //                             }
            
            
            
            
                 
             } 
</script>


<div  id="cancel" class="border border-light p-3 mb-4">

    <div class="text-center">
      <!--<button type="button" href="{{url("/products")}}" class="btn btn-primary">Cancel order</button>-->
      <a type="button" href="{{url("/products")}}">Cancel order</a>
      
    </div>

  </div>
  
  
  <div style="display:none" id="back" class="border border-light p-3 mb-4">

    <div class="text-center">
     
      <a type="button" href="{{url("/products")}}">Back to site</a>
      
    </div>

  </div>








@endsection






















