@extends('admin.master')

@section('content')
   


   
    </head>
   
    <body>
        
        <h1 class="text-center">Category</h1>


        <div class=" container-fluid">

            <a href="#addEmployeeModal" data-toggle="modal" class=" m-2 btn btn-success">Add Category</a>
            {{-- {{ route('customer_controller.create') }} --}}
        </div>

        {{-- crud category --}}
        <table id="table_id" class="display">
            <thead>
            <tr>
              <th>number</th>
              <th>Access subcategory</th>
              <!--<th>Category</th>-->
              <th>Action</th>
             
            </tr>
        </thead>
       
           <tbody>
            @php
      
            $c_id = 1 ;
              
      
           @endphp
         
            @foreach ($category_data as $item)
            <tr>
                {{-- {{ route('profiles.show',$logged_user) }}  --}}
              <td><a >{{  $c_id++ }}</a></td>
              <td><a href=" {{ url('/admin/subcategory/'.$item->id) }}  ">{{ $item->Cat_name }}</a></td>

              <!--<td>{{ $item->Cat_name }}</td>-->
              <td>
        		{{-- <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                <button class="btn btn-primary" onclick="editcategory('{{$item->id}}','{{$item->Cat_name}}')"><i class="fa fa-pencil"></i></button>
       
                {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                <button class="btn btn-danger" onclick="delete_category('{{$item->id}}','{{$item->Cat_name}}')"><i class="fa fa-trash-o"></i></button>
             </td>
       
            </tr>


            <div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/category/edit') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  id="Cat_name" name="Cat_name" class="form-control" maxlength="25" required>
                                    <input type="hidden" id="id" name="id" class="form-control" required>
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
     <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/category/delete') }}">
                    @csrf
                    
                    <input type="hidden" id="id2" name="id2" class="form-control" required>	
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Category</h4>
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
       {{-- crud category --}}


      
      <script>
           $(document).ready( function () {
           $('#table_id').DataTable();
    } );

    function editcategory(id,Cat_name){
		$('#Cat_name').val(Cat_name);
        $('#id').val(id);
		
		$('#editEmployeeModal').modal('show');
	}

    function delete_category(id,Cat_name){
		$('#Cat_name').val(Cat_name);
        $('#id2').val(id);
		
		$('#deleteEmployeeModal').modal('show');
	}

      </script>
 
   




    <!-- add category Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">

 
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/category') }}">
                    @csrf
                    <div class="modal-header">						
                        <h4 class="modal-title">Add New Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" maxlength="25" required name="Cat_name" class="form-control" >
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
                            <input type="text" class="form-control" maxlength="25" required>
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




























