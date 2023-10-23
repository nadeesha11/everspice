@extends('admin.master')
@section('content')


<h1 class="text-center">Products</h1>
<div class=" container-fluid">

    <a href="{{ url('/admin/product') }}"  class=" m-2 btn btn-success">Add new product</a>
    
</div>




<div  style="overflow-x:auto;" >
<table id="view_product" class="display nowrap" style="width:100% " >

    <thead>
        <tr>
            <th>Product</th>
            <th>Product ID</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Main image</th>
            <!--<th>sub image one</th>-->
            <!--<th>sub image two</th>-->
            <!--<th>sub image three</th>-->
            <!--<th>sub image four</th>-->
            <!--<th>stock</th>-->
            <!--<th>description</th>-->
            <th>price</th>
            <th>discount</th>
            <th>action</th>
            
          
          </tr>
        </thead>


    @foreach ($product_data as $product)
        
  
    
    
          <tbody>
          <tr>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->Cat_name  }}</td>
            <td>{{ $product->sub_name  }}</td>

            <td>
                <img width="50px" src="{{ asset('product_images/'.$product->product_main_img) }}" alt="main_image">
            </td>

            <!--<td>-->
            <!--    <img width="50px" src="{{ asset('product_images/'.$product->product_sub_img1) }}" alt="sub_image1">-->
            <!--</td>-->

            <!--<td>-->
            <!--    <img width="50px" src="{{ asset('product_images/'.$product->product_sub_img2) }}" alt="sub_image2">-->
            <!--</td>-->

            <!--<td>-->
            <!--    <img width="50px" src="{{ asset('product_images/'.$product->product_sub_img3) }}" alt="sub_image3">-->
            <!--</td>-->

            <!--<td>-->
            <!--    <img width="50px" src="{{ asset('product_images/'.$product->product_sub_img4) }}" alt="sub_image4">-->
            <!--</td>-->


            <!--<td> $product->stock </td>-->
            <!--<td>{{ $product->description }}</td>-->
            <td>$ {{ $product->price }}</td>
            <td>{{ $product->discount }}%</td>
            <td>
               <a class="btn btn-primary mb-2" href="{{ url("/admin/producthome/edit/".$product->id) }}" class="edit" ><i class="material-icons"  title="Edit">&#xE254;</i></a></br>
               <button class="btn btn-danger"  onclick="deletesubcategory('{{ $product->id }}')" ><i class="fa fa-trash-o"></i></button>

            </td>
          </tr>
        </tbody>

                     <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('/admin/producthome/delete') }}">
                    @csrf
                    
                    <input type="hidden" name="id" id="id" class="form-control" required>	
                    <div class="modal-header">						
                        <h4 class="modal-title">Delete Product</h4>
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
  

</table>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>




<script>

$(document).ready(function() {

    $(document).ready(function() {
    $('#view_product').DataTable();
} );
   
});
 
function deletesubcategory(id){
      console.log(id);
		$('#id').val(id);	
		$('#deleteEmployeeModal2').modal('show');
	}



</script>
    
@endsection















