<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


<body>



    <div  class="text-center " > 
    <img  src="{{ asset('assets/imgs/theme/logo-everspicenew.png') }}" alt="logo" />
  
    </div>



  <div class="bg-dark  text-white"> 
  <h1 class="text-center p-3 m-3">Everspiceceylon.com</h1>
  </div>
  
  

  <h3 class="text-center">INVOICE</h3>


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
                                            <strong>Invoice Number:</strong> <strong >324234234</strong> <br />
                                            <strong>Invoice Date:</strong>2022 <br />
                                           
                                        </p>
                                         </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <div >
                                        
                                        
                                        <div class="row" > 
                                        
                                        
                                        <div class="col-4 ">
                                            <div class=" ml-5"> 
                                            <h4 >Shipping Address</h4>
                                            <p >
                                              
                                               nadeesha jayatshan<br />
                                                sdfdfsdf<br />
                                                sdfsdfdfsdf<br />
                                                sdfsdfsdfsdfdsfsdf<br />
                                                dfsdfsdfsdf<br />
                                            
                                               23232323<br />
                                               uae<br/></br>
                                               
                                                 <abbr title="Phone">Phone:</abbr> 34234234234<br />
                                                 <abbr title="Email">Email: </abbr>email<br />
                                  
                                            </p>
                                            </div>
                                        </div>
                                        
                                        
                                        <!--<div class="col-4 ">-->
                                        <!--</div>-->
                                        
                                        
                                               <div class="col-4">
                                               <div class="  ml-5">        
                                            <h4 >Billing Address</h4>
                                            <p >
                                         
                                                  $first_name_b $last_name_b<br />
                                                 $street_address_line_1_b <br />
                                                 $street_address_line_2_b <br />
                                                 $town_b <br />
                                               
                                           
                                                 $zip_b <br />
                                                $country_b <br/></br>
                                                
                                                
                                                 <abbr title="Phone">Phone:</abbr>  $phone_b <br />
                                                 <abbr title="Email">Email: </abbr> $email_b <br />
                                               
                                            </p>
                                        </div>
                                        
                                        
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    <div >
                                        <!--<div>-->
                                        <!--    <h4 >Billing Address</h4>-->
                                        <!--    <p >-->
                                         
                                        <!--          $first_name_b $last_name_b<br />-->
                                        <!--         $street_address_line_1_b <br />-->
                                        <!--         $street_address_line_2_b <br />-->
                                        <!--         $town_b <br />-->
                                               
                                           
                                        <!--         $zip_b <br />-->
                                        <!--        $country_b <br/></br>-->
                                                
                                                
                                        <!--         <abbr title="Phone">Phone:</abbr>  $phone_b <br />-->
                                        <!--         <abbr title="Email">Email: </abbr> $email_b <br />-->
                                                
                                        <!--    </p>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div >
                                <div >
                                    
                                    
                                    
                                    
                                    
                                    <table class="table table-striped table-hover">
                                        <thead >
                                            <tr>
                                                <th>Item </th>
                                                <th >Unit Price</th>
                                                <th >Quantity</th>
                                                <th >Discount</th>
                                                <th >Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                     
                                            
                                                
                                                  
                                                  <tr>
                                                <td > $item->product_name </td>
                                                <td >  $item->price </td>
                                                <td >  $item->qty   </td>
                                                 <td >  $item->discount   </td>
                                                <td >$  $item->subtotal </td>
                                            
                                                        </tr>
                                                
                                                
                                                
                                      
                                          
                                        
                                         
                                         
                                            
                                            
                                            <tr>
                                             
                                                <td></td>
                                                 <td></td>
                                            </tr>
                                            
                                            <tr>
                                                 <td  >Shipping price</td>
                                                <td></td>
                                                 <td></td>
                                                  <td></td>
                                               
                                                <td >$country</td>
                                            </tr>
                                            <tr>
                                                 <td  >Grand Total</td>
                                                 <td></td>
                                                 <td></td>
                                                  <td></td>
                                               
                                                <td >$ $amount</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div >
                                <div >
                                 
                                    <!--      <div >-->
                                    <!--    <h6 >Total Amount</h6>-->
                                    <!--    <h3 >$ $amount</h3>-->
                                        
                                    <!--</div>-->
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
        
        <h3 class="text-center">Thank you !!!</h3>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>

