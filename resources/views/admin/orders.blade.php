@extends('admin.master')

@section('content')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
   
    <body>
        
        <h1 class="text-center">Orders</h1>


        <div class=" container-fluid">
            
            
 
      <form  method="POST"  action="{{url('admin-filter') }}"  >     
        @csrf        
                    
     <div class="row m-3 pt-3">
         
    <div class="col-2">
        <div class="input-group">
          
           
            <input type="text" placeholder="First Name" id="Customer"  name="Customer" class="form-control filter Customer">
        </div>
    </div>
    
    
      <div class="col-2">
        <div class="input-group">
          
           
            <input type="text" placeholder="Last Name" id="LastName"  name="LastName" class="form-control filter Customer">
        </div>
    </div>
    
    
    
    
    
    <!--<div class="col-1">-->
    <!--    <div class="input-group">-->
           
    <!--        <input type="date"  placeholder="Date From" id="OrderDateFrom"    name="OrderDateFrom" class="form-control filter">-->
         
    <!--    </div>-->
    <!--</div>-->
    
    
    
    
    
      
    <!--<div class="col-1">-->
    <!--    <div class="input-group">-->
           
    <!--        <input type="date" placeholder="Date To" id="OrderDateTo"    name="OrderDateTo" class="form-control filter">-->
    <!--    </div>-->
    <!--</div>-->
    
    
    
    
      <div class="col-2">
        <div class="input-group">
           
            <input type="text" placeholder="Order Id" id="Order_Id"  name="Order_Id" class="form-control filter">
        </div>
    </div>
    
    

    
      <div class="col-2">
        <div class="input-group">
           
            <!--<input type="text" placeholder="Status" id="Status"    name="Status"  class="form-control filter">-->
           <select name="Status" class="form-select form-select-sm mb-3 form-control" >
           <option value="" selected>Status</option>
           <option value="inprogress">Inprogress</option>
           <option value="delivered">Delivered</option>
           <option value="shipped">Shipped</option>
           </select>
            
            
            
        </div>
    </div>
    
    
    
      <div class="col-2">
        <div class="input-group">
           
  
           
           
           <button type="submit" class="btn btn-primary "  style="background-color: #55acee; "  role="button">Apply Filter</button>

           
       
           
           
           
            
            
        </div>
    </div>
    
    
    
    
          <div class="row">
            
            
            
            
            
         <div class="col-4">
         <div class="input-group">
            <label for="OrderDateFrom" class="m-2">Date From</label>
            <input type="date"  placeholder="Date From" id="OrderDateFrom"    name="OrderDateFrom" class="form-control filter mr-1">
         
        </div>
        </div>

        

        <div class="col-4">
        <div class="input-group">
             <label for="OrderDateFrom" class="m-2">Date To</label>
            <input type="date" placeholder="Date To" id="OrderDateTo"    name="OrderDateTo" class="form-control filter">
        </div>
       </div>

             
             
             
               
               
               
               
           </div>
    
    
    
    
    
    
    
  
    
    
    
    
   </div>  
            
       </form>      
            
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
            


 <table  id="orders" class="table table-striped m-5 p-3  font-size: 12px  !important;">
    
      <thead>
    
     
          
  <tr> 
    <th>Customer</th>
    <th>Order date</th>
    <th>Order ID</th>
    <th>Price</th>
    <th>Status</th>
    <th>Method</th>
     <th>info</th>
    <th>Action</th>
    
  </tr>
    </thead>
  
  <tbody id ="fiter_body">
      
        @foreach ($orders as $order)
      
  <tr >
    <td>{{  $order->first_name}} {{  $order->last_name}}</td>
    <td>{{  $order->created_at}}</td>
    <td>{{  $order->orderid}}</td>
    <td>{{  $order->amount}}</td>
    <td>{{  $order->order_status}}</td>
    <td>{{  $order->method}}</td>
    <td>     <button class="btn btn-primary" onclick="info('{{$order->additional_information}}')"><i class="fa fa-pencil"></i></button>
 </td>
    <td><a class="btn btn-primary mb-1" href="{{ url('/admin/orders_details'.$order->id) }}"> <span class="material-icons"> login</span></a></br>
    <button class="btn btn-primary" onclick="editorder('{{$order->id}}','{{$order->order_status}}')"><i class="fa fa-pencil"></i></button>
    </td>
  </tr>
   
      @endforeach

 </tbody> 
</table>






  <div id="OrderStatusModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/orders/updatestatus') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Order Status</h4>
                                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                     <label>Order Status</label>
                                     <select id="order_status" name="order_status" class="form-control" value="" required >
                                         <option value="inprogress">inprogress</option>
                                         <option value="delivered">delivered</option>
                                         <option value="shipped">shipped</option>
                                      
                                     </select>
                                    <input type="hidden" id="id" name="id" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">-->
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


   
   
   <!--additional info-->
   
     <div id="infoModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                     
                            <div class="modal-header">						
                                <h4 class="modal-title">Additional info</h4>
                                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                  
                              <div class="mb-3">
                     
                      <textarea readonly class="form-control" id="information" rows="3"></textarea>
                       </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">-->
                             
                            </div>
                       
                    </div>
                </div>
            </div>
   
   
   
   
   
   
   
   
   
   
   
     <!--additional info-->
   
   
   
   
   


</div>

      <!--<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>-->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.3/typeahead.bundle.min.js" integrity="sha512-E4rXB8fOORHVM/jZYNCX2rIY+FOvmTsWJ7OKZOG9x/0RmMAGyyzBqZG0OGKMpTyyuXVVoJsKKWYwbm7OU2klxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

      <script>
          
       
          
        //   type a head
          
      

        
        
        
 
        // typeahead for customer name
        
        url = "{{ route('get-result') }}"
        
        $('#Customer').typeahead({
            
            
            source:function(query,process){
                
                
               return $.get(url,{term:query},function(data){
                   
                //   console.log(data);
                   return process(data);
                   
                   
               }); 
            }
        });
        
        
      //end typeahead for customer name 
        
        
        
        
        
        // typeahead for order id
    

              url2 = "{{ route('get-result-orderid') }}"
        
              $('#Order_Id').typeahead({
            
            
              source:function(query,process){
                
                
               return $.get(url2,{term:query},function(data){
                   
            //   console.log(data);
               return process(data);
                   
                   
               }); 
            }
        });
        


        
             // typeahead for order id
        


             // typeahead for price
    

              url3 = "{{ route('get-result-price') }}"
        
              $('#Price').typeahead({
            
            
              source:function(query,process){
                
                
               return $.get(url3,{term:query},function(data){
                   
               console.log(data);
               return process(data);
                   
                   
               }); 
            }
            });
        


        
         // typeahead for price
        
        
        
        
               // typeahead for price
    



              url4 = " {{route('get-result-LastName') }}"
        
              $('#LastName').typeahead({
            
            
              source:function(query,process){
                
                
              return $.get(url4,{term:query},function(data){
                   
              console.log(data);
              return process(data);
                   
                   
              }); 
            }
            });
            
        
            
            
            
    //         var myVal ="myval";
        
    //   $('#Status').typeahead('val', myVal);

        
         // typeahead for price
        
   
       
          
          
       //   type a head 
       
       
       
       
       
       
       
       
       
       
          
          
          
          
       
          
          
          
          
          
         
         function editorder(id,order_status){
         $('#id').val(id);
          $('#order_status').val(order_status);
		
		$('#OrderStatusModal').modal('show');
	
      	}
      	
      	
      	
    //   	info
      	      function info(info){
       
          $('#information').val(info);
		
		$('#infoModal').modal('show');
	
      	}
      	
      	
      	
      	
      	
      	
      	
      	
      	
      	
      	
  	

		 $(document).ready( function(){
		     
   
             $('#orders').DataTable();
           
           
           });





    







      </script>
      
      
     
      
      
      
      
      


@endsection