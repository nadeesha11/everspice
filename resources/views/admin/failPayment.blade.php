@extends('admin.master')

@section('content')


 <!--<h1 class="m-5 p-2 ">DASHBOARD</h1>-->
     
     
   
           <h3 class="m-1 text-center " style="margin-bottom:15px!important">Failed Payment</h3>
           
      
      
      
      
     <div id="failed_payment"  style="overflow-x:auto;"> 
          
    <table id="cus" class="table table-striped m-5 p-3" style="width:100%" >
    <thead>
    <tr>
      <th >Number</th>
      <th >Name</th>
      <th >Email</th>
      <th> Phone</th>
      <th >Reason</th>
      <th >Time</th>
      <th >Address</th>
  
    </tr>
  </thead>
  <tbody>

    @php
    
    $id = 1;
    
    @endphp
     
    @foreach($Fail_payments as $Fail_payment) 
    
 
       
    <tr>
       
      <td> {{ $id++}} </td>
      <td> {{ $Fail_payment->first_name }} {{ $Fail_payment->last_name }} </td>
      <td> {{ $Fail_payment->email }} </td>
      <td> {{ $Fail_payment->phone }} </td>
      <td> {{ $Fail_payment->reason }} </td>
      <td> {{ $Fail_payment->created_at }} </td>
      <td> <button class="btn btn-secondary" onclick="view_details('{{$Fail_payment->billing_address1}}','{{$Fail_payment->billing_address2}}','{{$Fail_payment->billing_address3}}','{{$Fail_payment->billing_address4}}','{{$Fail_payment->country_name}}','{{$Fail_payment->zipcode}}')" ><i class="fa fa-info-circle"></i></button> </td>
      <!--<td> <button class="btn btn-secondary" onclick="view_details()" ><i class="fa fa-info-circle"></i></button> </td>-->
      
    </tr>
    
    
    
         
         <div id="payment_model" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                      
                            <div class="modal-header">						
                                <h4 class="modal-title">Address</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            
                            
                            <div class="modal-body">
                                
                                		
       	<!--$('#billing_address1').val(billing_address1);-->
        <!--$('#billing_address2').val(billing_address2);-->
        <!--$('#billing_address3').val(billing_address3);-->
        <!--$('#billing_address4').val(billing_address4);-->
        <!--$('#country_name').val(country_name);-->
        <!--$('#zipcode').val(zipcode);    		-->
                                					
                                <div class="form-group">
                                    <label>Street Address Line One</label>
                                    <input type="text"  id="billing_address1" readonly name="billing_address1" class="form-control" >
                                </div>
                                
                                 <div class="form-group">
                                    <label>Street Address Line Two</label>
                                    <input type="text"  id="billing_address2" readonly name="billing_address2" class="form-control" >
                                </div>
                               
                                 <div class="form-group">
                                    <label>Town/City</label>
                                    <input type="text"  id="billing_address3" readonly name="billing_address3" class="form-control" >
                                </div>
                                
                                  <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text"  id="billing_address4" readonly name="billing_address4" class="form-control" >
                                </div>
                                
                                  <div class="form-group">
                                    <label>Country</label>
                                    <input type="text"  id="country_name" readonly name="country_name" class="form-control" >
                                </div>
                                
                                  <div class="form-group">
                                    <label>Zip / Postcode</label>
                                    <input type="text"  id="zipcode" readonly name="zipcode" class="form-control" >
                                </div>
                               
                                                 
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Back">
                                <!--<input type="submit" class="btn btn-info" value="Save">-->
                            </div>
                
                
                
                    </div>
                </div>
            </div>
            
            
            
            
            
 
     @endforeach

  </tbody>
  
  
</table>


 </div> 














      <script>
      
      
      
          function view_details(billing_address1,billing_address2,billing_address3,billing_address4,country_name,zipcode){
              
 

		$('#billing_address1').val(billing_address1);
        $('#billing_address2').val(billing_address2);
        $('#billing_address3').val(billing_address3);
        $('#billing_address4').val(billing_address4);
        $('#country_name').val(country_name);
        $('#zipcode').val(zipcode);
        
        
        
// 		console.log(billing_address1,billing_address2,billing_address3,billing_address4,country_name,zipcode);
		
		$('#payment_model').modal('show');
	}
	
	
	
	
      
      
           $(document).ready( function () {
           $('#cus').DataTable();
      });



      </script>
         
         

@endsection