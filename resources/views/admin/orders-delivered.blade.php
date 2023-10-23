@extends('admin.master')

@section('content')


 
    </head>
   
    <body>
        
        <h1 class="text-center">Orders</h1>


        <div class=" container-fluid">


<table  id="orders" class=" table table-striped m-5 p-3 ">
    
      <thead>
    
     
          
  <tr> 
    <th>Customer</th>
    <th>Order date</th>
    <th>Order ID</th>
    <th>Price</th>
    <th>Status</th>
    <th>Action</th>
    
  </tr>
    </thead>
  
  <tbody>
      
        @foreach ($orders as $order)
      
  <tr>
    <td>{{  $order->first_name}} {{  $order->last_name}}</td>
    <td>{{ $order->created_at}}</td>
    <td>{{  $order->orderid}}</td>
    <td>{{  $order->amount}}</td>
    <td>{{$order->order_status}}</td>
    <td><a class="btn btn-primary" href="{{ url('/admin/orders_details'.$order->id) }}"> <span class="material-icons"> login</span></a>
    <button class="btn btn-primary" onclick="editorder('{{$order->id}}','{{$order->order_status}}')"><i class="fa fa-pencil"></i></button>
    </td>
  </tr>
   
      @endforeach

  
</table>
</tbody>
  <div id="OrderStatusModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/admin/orders/updatestatus') }}">
                            @csrf
                            <div class="modal-header">						
                                <h4 class="modal-title">Order Status</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                     <label>Order Status</label>
                                     <select id="order_status" name="order_status" class="form-control" value="" required >
                                         <option value="inprogess">inprogress</option>
                                         <option value="delivered">delivered</option>
                                         <option value="shipped">shipped</option>
                                      
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


   


</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
      
       
         
         function editorder(id,order_status){
         $('#id').val(id);
          $('#order_status').val(order_status);
		
		$('#OrderStatusModal').modal('show');
	}
	
    $(document).ready( function(){
           $('#orders').DataTable();
           
           
         } );


      </script>

@endsection