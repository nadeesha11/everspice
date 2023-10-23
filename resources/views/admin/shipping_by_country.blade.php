@extends('admin.master')

@section('content')

@if ($message = Session::get('add_country_shipping'))
<div class="alert alert-success alert-block">
   
        <strong>{{ $message }}</strong>
</div>

@endif
    

<h1 class="text-center">Add shipping price</h1>
<div class=" container-fluid">

    <a href="#addEmployeeModal" data-toggle="modal" class=" m-2 btn btn-success">Add new country</a>
   
</div>


      
        <table id="table_id2" class="display">
            <thead>
            <tr>
              <th>Number</th>
             
              <th>Country Name</th>
              <th>Shipping</th>
              <th>Action</th>
             
            </tr>
        </thead>
       
           <tbody>
            
                
          
         @php
             $number = 1;
         @endphp
         
          
                
           @foreach ($shipping_details as $item)
               
         
            <tr>
                {{-- {{ route('profiles.show',$logged_user) }}  --}}
              <td>{{ $number++ }}</td>
              <td>{{ $item->country_name }}</td>

              <td>{{ $item->shipping_price }}</td>
              <td>
        		{{-- <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                <button class="btn btn-primary" onclick="editsubcategory('{{$item->id}}','{{$item->country_name}}','{{$item->shipping_price}}')"><i class="fa fa-pencil"></i></button>
       
                {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                <button class="btn btn-danger" onclick="deletesubcategory('{{  $item->id }}')"><i class="fa fa-trash-o"></i></button>
             </td>
       
            </tr>


            <div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/country_shipping/edit') }}">
                            @csrf

                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Shipping country</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>edit country name</label>
                                    <input type="hidden" id="id_delete" name="id_delete" class="form-control" required>
                                    <input type="text" maxlength="25" id="country" name="country" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>edit shipping price</label>
                                    <input type="number" min="0" step=".01" id="shipping" name="shipping" class="form-control" required>   
                                </div>
                               
                                                 
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
    <div id="deleteEmployeeModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/country_shipping/delete') }}">
                    @csrf
                    
                    <input type="hidden" id="id3" name="id" class="form-control" required>	
                    {{-- <input type="hidden" id="sub_id3" name="sub_id" class="form-control" required>	 --}}
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Counrty shipping price</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
 				
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    {{-- <input type="" id="Cat_name" name="Cat_name" class="form-control" required> --}}
                  
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


















   <!-- add category Modal HTML -->
   <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">


        <div class="modal-content">
            <form method="POST" action="/admin/country_shipping">
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Add shipping prices</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    
                    {{-- <form action="" method="post"> --}}
                    <div class="form-group">
                        <label>country</label>
                        <input type="text" maxlength="25"  name="country_name" required class="form-control" required>
                        <span style="color: brown" >@error('country_name'){{ $message }} @enderror   </span>
                      
                    </div>
                    <div class="form-group">
                        <label>shipping price</label>
                        <input type="number" min="0" step=".01" name="shipping_price" required class="form-control" required>
                        <span style="color: brown" >@error('shipping_price'){{ $message }} @enderror   </span>
                      
                    </div>
                    {{-- </form> --}}
                   
                                      
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


<script>



     $(document).ready( function () {
           $('#table_id2').DataTable();
     } );


    function editsubcategory(id,country,shipping){

        $('#id_delete').val(id);
		$('#country').val(country);
        $('#shipping').val(shipping);
     
      
		
		$('#editEmployeeModal').modal('show');
	}

    
    function deletesubcategory(id){
		$('#id3').val(id);
        // $('#sub_id3').val(sub_id);
        // console.log(id);
		
		$('#deleteEmployeeModal2').modal('show');
	}



</script>















@endsection


























