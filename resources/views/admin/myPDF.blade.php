

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<style>
 .bg{
     
     
     
     
   
  
 

 }   
    
    
    
    
</style>






<div class="bg">  

<div style="background-color: #f5f0f0"   >
    
    
<div class="row p-3">
 
 <div class="col-4  " style="background-color: #6b2a2a ;  
  padding: 5px;
  border-top-right-radius: 70px;
    border-bottom-right-radius: 70px;
  
  
  "

  >
    
    
    <h1  style="  font-style: italic;    "  class="mt-5 ml-5    text-light" >INVOICE</h1>
    
    
</div> 



 <div class="col-4">

    
    
</div> 





<!-- <div class="col-4" style="background-color: #6b2a2a ;    padding: 10px;-->
<!--  border-top-left-radius: 70px;-->
<!--    border-bottom-left-radius: 70px; ">-->
    
<!--      <img src="http://everspiceceylon.com/assets/imgs/theme/logo footer copy (1).png" alt="logo">-->
    
    
    
<!--</div> -->
    
    
    
    
</div>



<div class="row">
    
 <div class="col-3 m-1">
       <div >
           
      <p><spsn style="color: #6b2a2a   "  >  Invoice Number </spsn> </br> {{ $orderid }} </p> 
    
     </div>
   
     
     
     
 </div>   
    
   <div class="col-2 m-1">
     
        <div>
            
       <p >  <span  style="color: #6b2a2a   " >   Date of Issue   </span>  </br>{{ $updated_at }} </p> 
       
     </div>
     
     
     
 </div> 
 
 
   <div class="col-2 m-1">
     
        <div>
            
       <p >  <span  style="color: #6b2a2a   " >   Payment  </span>  </br>{{ $method }} </p> 
       
     </div>
     
     
     
 </div> 
 
 
 
 
 
 
  <div class="col-4 m-1">
     
   <p><span  style="color: #6b2a2a   " >  EVERSPICE CEYLON(PVT) LTD    </span> </br>
      No 4 , Menikpalahena</br>
      Naimbala 2 , Thihagoda</br>
       Sri lanka</br>
   
   </p>  
  
     
     
 </div> 
    
    
    
    
</div>
    
    
    
    
</div>




  <div >
            <div >
                <div >
                    <div >
                        <div >
                            <div >
                                <div >
                                    
                                    <div class="row">
                                     
                                      <div class="col-4">  </div>
                                     <div class="col-4">  </div>
                                     <div class="col-4">
                                        <p >
                                      
                                           
                                        </p>
                                         </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <div >
                                        
                                        
                                        <div class="row" > 
                                        
                                        
                                        <div class="col-4 ">
                                            <div class=" ml-5"> 
                                            <h4 style="color: #6b2a2a   ">Shipping Address</h4>
                                            <p >
                                              
                                                 {{  $first_name }} {{ $last_name}}<br />
                                                  {{ $billing_address1 }} <br />
                                                 {{ $billing_address2 }}<br />
                                                 {{ $billing_address3 }}<br />
                                                 {{ $billing_address4 }}<br />
                                            
                                                 {{ $zipcode }}<br />
                                                 {{ $country_name }}<br/></br>
                                               
                                                 <abbr title="Phone">Phone:</abbr> {{ $phone }}<br />
                                                 <abbr title="Email">Email: </abbr>{{ $email }} <br />
                                            
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                            </p>
                                            </div>
                                        </div>
                                 
                                               <div class="col-4">
                                               <div class="  ml-5">        
                                            <h4 style="color: #6b2a2a   ">Billing Address</h4>
                                            <p >
                                         
                                                        {{  $first_name_b }} {{ $last_name_b}}  <br />
                                                     {{ $street_address_line_1_b }} <br />
                                                  {{ $street_address_line_2_b }} <br />
                                                    {{ $town_b }}  <br />
                                                    {{ $company_name_b }} <br />
                                               
                                               
                                               
                                               
                                           
                                                  {{ $zip_b }} <br />
                                                  {{ $country_b }}   <br/></br>
                                                
                                                
                                                 <abbr title="Phone">Phone:</abbr>     {{ $phone_b }}   <br />
                                                 <abbr title="Email">Email: </abbr>    {{ $email_b }}  <br />
                                                 
                                            
                                               
                                               
                                            </p>
                                        </div>
                                        
                                        
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    <div >
                             
                                    </div>
                                </div>
                            </div>
                            <div >
                                <div >
                                    
                                    
                                    
                                    
                                    
                                    <table class="table table-striped table-hover">
                                        <thead >
                                            <tr style="background-color: #6b2a2a;  color:#ffffff; ">
                                                <th>Item </th>
                                                <th >Unit Price</th>
                                                <th >Quantity</th>
                                                <th >Discount</th>
                                                <th >Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                     
                                               @foreach ($new as $item)
                                                
                                                  <tr>
                                                <td >  {{$item->product_name}} </td>
                                                <td >$  {{$item->price}} </td>
                                                <td >  {{$item->qty}}   </td>
                                                 <td >  {{$item->product_discount}} %  </td>
                                                <td >$  {{$item->subtotal}} </td>
                                            
                                                        </tr>
                                                        
                                                         @endforeach    
                                                         
                                                      
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                                         
                                   
                                            <tr>
                                             
                                                <td></td>
                                                 <td></td>
                                            </tr>
                                            
                                            <tr>
                                                 <td  >Shipping price</td>
                                                <td></td>
                                                 <td></td>
                                                  <td></td>
                                               
                                                <td >$ {{$country}} </td>
                                            </tr>
                                            <tr>
                                                 <td  >Grand Total</td>
                                                 <td></td>
                                                 <td></td>
                                                  <td></td>
                                               
                                                <td >$ {{ $amount}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div >
                                <div >
                             
                                </div>
                                <div >
                                    <div ></div>
                                
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <div class="row" >
            
              <div class="col-6 m-1" style="background-color: #f5f0f0; " >
            
            <h4  class="text-center" style="background-color: #6b2a2a;   color:#ffffff" > Special Notes And Instructions</h4>
            <p style="height: 140px;"> </p>
            
                 </div>
                 
                    <div class="col-5" >

            
                 </div>
            
            
        </div>
        
        
        
        
        <h3 style="color: #6b2a2a   " class="text-center mt-2 m-2">Thank you for your business !</h3>
         <p  class="text-center m-1">Should you have any enquiries concerning this invoice,please contact Mr.Sithira Akbo on </br> +94 76 324 0465 </p>
         
         <div>
             
                  <div  class="text-center m-2" > 
    <img src="{{ asset('assets/imgs/theme/logo-everspicenew.png') }}" alt="logo" />
  
    </div>
             
            
         </div>
         
         
         
         
         <div class="row">
          
          
             <div class="col-3">
             
             
            
            </div>  
            
            
          
             <div class="col-2">
             
             <p  style="color: #6b2a2a   "> +94 70 160 0007</p>
             
            
            </div>
            
              <div class="col-2">
             
              <p style="color: #6b2a2a   ">everspiceceylon@gmail.com </p>
            
            </div>
            
              <div class="col-2">
             
               <p style="color: #6b2a2a   "> www.everspiceceylon.com </p>
            
            </div>
            
            
            
            
            
             <div class="col-3">
             
             
            
            </div>
             
             
             
             
             
             
             
         </div>
         
         
         
         
         
        
 </div>




<!--</body>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!--</html>-->





