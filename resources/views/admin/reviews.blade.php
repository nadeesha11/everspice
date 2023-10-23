@extends('admin.master')

@section('content')
   


   
    </head>
   
    <body>
        
        <h1 class="text-center">Reviews</h1>


        <div class=" container-fluid">

           <!-- <a href="#addReviewModal" data-toggle="modal" class=" m-2 btn btn-success">Add Category</a>-->
            {{-- {{ route('customer_controller.create') }} --}}
        </div>

        {{-- crud category --}}
        <table id="table_id" class="table table-striped m-5 p-3">
            <thead>
            <tr>
              <th> number </th>
              <th> name </th>
              <th> email </th>
              <!--<th>Category</th>-->
              <th>Action</th>
             
            </tr>
        </thead>
       
           <tbody>
            @php
      
            $c_id = 1 ;
              
      
           @endphp
         
            @foreach ($product_reviews as $item)
            <tr>
                {{-- {{ route('profiles.show',$logged_user) }}  --}}
              <td><a >{{  $c_id++ }}</a></td>
              <td>{{ $item->name }}</td>
               <td>{{ $item->email }}</td>
            
              <td>
        		{{-- <a href="#editReviewModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                <button class="btn btn-primary" onclick="editreview('{{$item->id}}','{{$item->name}}','{{$item->email}}','{{$item->comment}}','{{$item->approved}}')"><i class="fa fa-pencil"></i></button>
       
                {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
                <button class="btn btn-danger" onclick="delete_review('{{$item->id}}')"><i class="fa fa-trash-o"></i></button>
             </td>
       
            </tr>


            <div id="editReviewModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/reviews/edit') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Edit Review</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="review_name" name="name" class="form-control" required>
                                    <label>email</label>
                                     <input type="text" id="review_email" name="user_email" class="form-control" required>
                                     <label>comment</label>
                                         <textarea id="review_comment" name="comment" class="form-control" required>
                                    </textarea>
                                     <label>Approved</label>
                                     <select id="approved_status" name="approved_status" class="form-control" value="" required >
                                         <option value="1">Yes</option>
                                         <option value="0"> No</option>
                                     </select>
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
     <div id="deleteReviewModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/reviews/delete') }}">
                    @csrf
                    
                    <input type="hidden" id="id2" name="id2" class="form-control" required>	
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Review</h4>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      
      <script>
           $(document).ready( function () {
           $('#table_id').DataTable();
    } );

    function editreview(id,name,email,comment,approved_status){
         $('#id').val(id);
		$('#review_name').val(name);
        $('#review_email').val(email);
         $('#review_comment').val(comment);
          $('#approved_status').val(approved_status);
		
		$('#editReviewModal').modal('show');
	}

    function delete_review(id){
	
        $('#id2').val(id);
		
		$('#deleteReviewModal').modal('show');
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
                            <input type="text" name="Cat_name" class="form-control" required>
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




























