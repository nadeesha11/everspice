@extends('admin.master')

@section('content')



   
    </head>
   
    <body>
        
        <h1 class="text-center">Coupons</h1>


        <div class=" container-fluid">

            <a href="#addEmployeeModal" data-toggle="modal" class=" m-2 btn btn-success">Add Promocode</a>
          
        </div>

        {{-- crud category --}}
        <table id="table_id" class="display">
            <thead>
            <tr>
              <th>Offer Name</th>
              <th>Coupon Code</th>
              <th>Coupon Limit</th>
              <th>Product</th>
              <th>Coupon Discount</th>
              <th>Status</th>
              <th>Action</th>
      
             
            </tr>
        </thead>
       
           <tbody>
             
            @foreach($coupons as $coupon)   
           
            <tr>
              
              <td>{{ $coupon->offer_name }} </td>
              <td>{{ $coupon->coupon_code }} </td>
              <td>{{ $coupon->coupon_limit }} </td>
               <td>{{ $coupon->product_name }} </td>
              <td>{{ $coupon->coupon_discount }} </td>
              
              
                @if ($coupon->status==0)
              
                 <td> Active</td>
             
              
                 @elseif($coupon->status==1 )
     
                 <td> Deactive </td>
                  
                  
                 @endif
              
            
            
            
            
            
            
            
            
              <td>
        	
                <button class="btn btn-primary" onclick="editCoupon('{{$coupon->coupon_code}}','{{$coupon->id}}','{{$coupon->offer_name}}','{{$coupon->coupon_limit}}','{{$coupon->coupon_discount}}','{{$coupon->status}}')"><i class="fa fa-pencil"></i></button>
                                                                          
              
                <button class="btn btn-danger" onclick="delete_coupon( '{{$coupon->id}}' )"><i class="fa fa-trash-o"></i></button>
             </td>
       
            </tr>




            <div id="editCouponModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/Coupon_edit') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Coupon</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                
                           <input type="hidden" require name="id" class="form-control" id="id" >      
                               
                                					
                        <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="offer_name">Offer Name</label>
                         <input type="text" require name="offer_name" class="form-control" id="offer_name" placeholder="Offer Name">
                           <span style="color: brown" >@error('offer_name'){{ $message }} @enderror   </span>
                         </div>
                         
                         
                        <div class="form-group col-md-6">
                        <label for="coupon_code">Coupon Code </label>
                        <input type="text" require name="coupon_code" class="form-control" id="coupon_code" placeholder="Coupon Code">
                          <span style="color: brown" >@error('coupon_code'){{ $message }} @enderror   </span>
                         </div>
                         
                          </div>
                          
                          
                             <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="coupon_limit">Coupon Limit</label>
                         <input type="number" require name="coupon_limit" class="form-control" id="coupon_limit" placeholder="Coupon Limit">
                           <span style="color: brown" >@error('coupon_limit'){{ $message }} @enderror   </span>
                         </div>
                         
                           <div class="form-group col-md-6">
                         <label for="coupon_discount">Coupon Discount</label>
                         <input type="number" require name="coupon_discount" class="form-control" id="coupon_discount" step=".01" min="0" max="100" placeholder="Coupon Discount">
                           <span style="color: brown" >@error('coupon_discount'){{ $message }} @enderror   </span>
                         </div>
                     
                         
                          </div>
                          
                          
                          
                             <div class="form-row">
                             
                        <div class="form-group col-md-6">
                             
                        <!--<label for="coupon_limit">Status</label>-->
                        <!--<input type="number" name="coupon_limit" class="form-control" id="coupon_limit" placeholder="Status">-->
                         
                        <!--  <span style="color: brown" >@error('coupon_limit'){{ $message }} @enderror   </span>-->
                        <div class="form-check">
                       <input class="form-check-input" type="checkbox" value="status" name="status"   id="status" />
                       <label class="form-check-label" for="status">Deactivate</label>
                       </div>
                          
                          </div>
                         
                         
                     
                         
                      
                          </div>
                          
                          
                          <!--<div class="form-row">-->
                          
                        
                          
                          <!-- </div>-->
                          
                          
                               
                                                 
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>




               <!-- Delete Modal HTML -->
     <div id="deleteCouponModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/coupons_delete') }}">
                    @csrf
                    
                    <input type="hidden" id="couponId" name="couponId" class="form-control" >	
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Coupon</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
 				
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                
                  
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
     {{-- end crud category --}}

  @endforeach
           

          
          </tbody>
          </table>
       {{-- crud category --}}


      
      <script>
           $(document).ready( function () {
           $('#table_id').DataTable();
    } );
    


    function editCoupon(coupon_code,id,offer_name,coupon_limit,coupon_discount,status){
        
     
      console.log(coupon_code,id,offer_name,coupon_limit,coupon_discount,status);
      
         
      
	    	$('#coupon_code').val(coupon_code);
	    	$('#id').val(id);
	    	$('#offer_name').val(offer_name);
	    	$('#coupon_limit').val(coupon_limit);
	    	$('#coupon_discount').val(coupon_discount);
        // 	$('#status').val(status);
		
		$('#editCouponModal').modal('show');
	}
	
	

    function delete_coupon(id){
        
        console.log("it works");

        $('#couponId').val(id);
		
		$('#deleteCouponModal').modal('show');
	}

      </script>
 
   




    <!-- add category Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">

 
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/coupons_add') }}">
                    @csrf
                    
                    <div class="modal-header">						
                        <h4 class="modal-title">Add New Coupons</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                    <div class="modal-body">
                        
                         <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="offer_name">Offer Name</label>
                         <input type="text" name="offer_name" class="form-control" id="offer_name" placeholder="Offer Name">
                           <span style="color: brown" >@error('offer_name'){{ $message }} @enderror   </span>
                         </div>
                         
                        <div class="form-group col-md-6">
                        <label for="Product_id">Product </label>
                        @foreach($items as $item)
                        
                        
                        <select name="Product_id" class="form-control" id="Product_id">
                        <option selected value="">Please Select Product</option>   
                        <option value="{{ $item->id }}">{{  $item->product_name }}</option>
                        </select>
                        
                        
                        @endforeach
                          <span style="color: brown" >@error('Product_id'){{ $message }} @enderror   </span>
                         </div>
                         
                          </div>	
                          
                          
                          
                         <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="coupon_code">coupon code</label>
                         <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="coupon code">
                           <span style="color: brown" >@error('coupon_code'){{ $message }} @enderror   </span>
                         </div>
                         
                         
                        <div class="form-group col-md-6">
                        <label for="coupon_limit">coupon limit </label>
                        <input type="number" name="coupon_limit" class="form-control" id="coupon_limit" placeholder="coupon limit">
                          <span style="color: brown" >@error('coupon_limit'){{ $message }} @enderror   </span>
                         </div>
                         
                          </div>
                          
                          
                         <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="coupon_discount">coupon discount</label>
                         <input type="text"  name="coupon_discount" class="form-control" id="coupon_discount" placeholder="coupon discount">
                           <span style="color: brown" >@error('coupon_discount'){{ $message }} @enderror   </span>
                         </div>
                         
                        <!--<div class="form-group col-md-6">-->
                        <!--<label for="inputPassword4">status</label>-->
                        <!--<input type="text" class="form-control" id="inputPassword4" placeholder="status">-->
                        <!-- </div>-->
                         
                          </div>
                        <!--<div class="form-group">-->
                        <!--    <label>Category Name</label>-->
                        <!--    <input type="text" name="Cat_name" class="form-control" required>-->
                        <!--</div>-->
                        
                       
                      					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit"  class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- end add category Modal HTML -->


    {{-- <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                       
                     					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

















@endsection












