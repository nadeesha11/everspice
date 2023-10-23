

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mail from everspice</title>
    
    <style>
   
   
  body{
      
        font-family: Arial, Helvetica, sans-serif;
  }    
        .flex-row {
   display: flex;
   flex-direction: col; 
} 
/*.flex-col{*/
/* padding: 15px;*/
/* margin: 0 15px;*/
/* background: #F3F3F3;*/
/*  border-radius: 25px;*/
 
/* }*/
/* .flex-row-multicolum{ */
/*   display: flex; */
/*   flex-direction: row; */
/*   flex-wrap: wrap; */
/*   flex-flow: row wrap; */
/*}*/
/*.flex-row-multicolum .flex-col{ width: 45%; margin: 0 15px 15px}*/


.wrapper{
    
    margin: auto;
  width: 80%;
  border: 3px solid #111111;
  padding: 20px;
   text-align: left; 
    margin-bottom: 5px;
    
    
    
    
    
} 


 .div-1 {
        background-color: #313131  ;
    }
    
    
    
    
  #customers {

  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #111111;
  color: white;
}  

.text_color_white{
    
     color: #000000;
    
    
}



.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}

    
.inside{
     width: 80%;
    margin: auto;
}

p{
    
       color: #000000; 
    
}



    </style>
  
   
</head>
<body>

<div style="margin-bottom: 10px"> 
<img class="center" src="{{ asset('assets/imgs/theme/logo-everspicenew.png') }}" alt="logo" />

</div>

    

<div  class="div-1">  
<br>
<h3 style=" text-align: center;  color: #F3F3F3;" >Your Order Is Succesfully Placed</h3><br>
</div>



<br>
<table class="text_color_white"  align="center" cellpadding="5px" cellspacing="5px" style=" margin-bottom:20px;   text-align: left;">
  <tr>
    <td>Order Id </td>
    <td> {{ $details['orderid'] }}</td>
  
  </tr>
  <tr>
    <td> Payment Method</td>
    <td>{{ $details['method'] }}</td>
  
  </tr>

</table>


















  
     

      
  <div  class="wrapper text_color_white">
      
      <h4 style=" text-align: center;"  >Shipping Details</h4>
  
  <div class="inside"> 
  
  
<p style="color:#000000 ;" >
 {{ $details['first_name'] }}<br>
 {{ $details['last_name'] }}<br>
 {{ $details['billing_address1'] }}<br>
 {{ $details['billing_address2'] }}<br>
 {{ $details['billing_address3'] }}<br>
 {{ $details['billing_address4'] }}<br>

 {{ $details['zipcode'] }}<br>
 {{ $details['country_name'] }}</p><br>


     <abbr>Phone:</abbr>{{ $details['phone'] }}<br>
     <abbr >Email: </abbr>{{  $details['email'] }}</p>
   
    </div>
   
     
     </div>
     
     
     
     
     
     
  
  
  
  
     
     
  <div class="wrapper text_color_white">
      
      <h4 style=" text-align: center;" >Billing Details</h4>
   
 <div class="inside">  
  

<p style="color:#000000 ;" >
   {{ $details['first_name_b'] }} <br>
   {{ $details['last_name_b'] }} <br>
   {{ $details['street_address_line_1_b'] }}<br>
   {{ $details['street_address_line_2_b'] }}<br>
   {{ $details['town_b'] }} <br>
   {{ $details['zip_b'] }} <br>

   {{ $details['country_b'] }} <br>


  <P > 
     <abbr >Phone:</abbr>   {{  $details['phone_b'] }}  <br>
     <abbr >Email: </abbr>  {{  $details['email_b'] }}  </p>
     
  </div>  
      
      
  </div>
  
  
  
  
  
  
  
  
  
  


     
     
     
     
     
     
     
     
     
     
     
<h4 style="text-align:center" class="text_color_white"> Order Details </h4><br>

<!--table-->
  
                            
                                    <table class="text_color_white" id="customers">
                                        <thead >
                                            <tr>
                                                <th>Item </th>
                                               
                                                <th >Quantity</th>
                                              
                                                <th >Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 
                                            
                                          @foreach($multiple_items as $item)
                                          
                                        
                                            <tr>
                                                
                                                
                                                <td > {{ $item['product_name'] }}     </td>
                                                <td >  {{ $item['qty'] }}   </td>
                                                <td >$ {{ $item['subtotal'] }}    </td>
                                                
                                               
                                            </tr>
                                            @endforeach
                                         
                                     
                                            
                                            <tr>
                                                <td >Shipping price</td>
                                                 <td></td>
                                                <td >  $ {{ $details['shipping'] }}  </td>
                                            </tr>
                                            <tr>
                                                <td >Grand Total</td>
                                                 <td></td>
                                                <td > ${{ $details['amount'] }}   </td>
                                            </tr>
                                        </tbody>
                                    </table>
                       
                       
                       
                       

<!--table-->
<h2 class="text_color_white" style="  text-align: center;">Thank You</h2>





    
</body>

</html>