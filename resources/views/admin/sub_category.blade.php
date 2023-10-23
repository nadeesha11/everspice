@extends('admin.master')

@section('content')
    
<!--<h1>{{ $sub_id }}</h1>-->
<h1 class="text-center">Sub Category</h1>
<div class=" container-fluid">

    <a href="#addEmployeeModal" data-toggle="modal" class=" m-2 btn btn-success">Add sub category</a>
    {{-- {{ route('customer_controller.create') }} --}}
</div>


  




        {{-- crud category --}}
        <table id="table_id2" class="display">
            <thead>
            <tr>
              <th>number</th>
             
              <th>Sub Category</th>
              <th>Action</th>
             
            </tr>
        </thead>
       
           <tbody>
         @php
             $number = 1;
         @endphp
         
            @foreach ($subcategory_data as $item)
                
          
            <tr>
                {{-- {{ route('profiles.show',$logged_user) }}  --}}
              <td>{{ $number++ }}</td>
          

              <td>{{ $item->sub_name }}</td>
              <td>
        		{{-- <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                <button class="btn btn-primary" onclick="editsubcategory('{{$item->sub_id}}','{{$item->sub_name}}','{{$item->id}}')"><i class="fa fa-pencil"></i></button>
       
                {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                <button class="btn btn-danger" onclick="deletesubcategory( '{{ $item->id }}','{{ $item->sub_id }}')"><i class="fa fa-trash-o"></i></button>
             </td>
       
            </tr>


            <div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/subcategory/edit') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Sub Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="sub_name" maxlength="25" name="sub_name" class="form-control" required>
                                    <input type="hidden" id="id" name="id" class="form-control" required>
                                    <input type="hidden" id="sub_id" name="sub_id" class="form-control" required>
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
                <form method="POST" action="{{ url('/admin/subcategory/delete') }}">
                    @csrf
                    
                    <input type="hidden" id="id3" name="id" class="form-control" required>	
                    <input type="hidden" id="sub_id3" name="sub_id" class="form-control" required>	
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Employee</h4>
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
            <form method="POST" action="{{ url('/admin/subcategory/') }}">
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Add New Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Sub category Name</label>
                        <input type="text" name="sub_name" maxlength="25" class="form-control" required>
                        <input type="hidden" name="sub_id" value="{{ $sub_id }}" class="form-control" required>
                    </div>
                    
                   
                                      
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


    function editsubcategory(sub_id,sub_name,id){

        $('#sub_id').val(sub_id);
		$('#sub_name').val(sub_name);
     
        $('#id').val(id);
		
		$('#editEmployeeModal').modal('show');
	}

    
    function deletesubcategory(id,sub_id){
		$('#id3').val(id);
        $('#sub_id3').val(sub_id);
		
		$('#deleteEmployeeModal2').modal('show');
	}


   







</script>
  




@endsection

















