@extends('admin.master')

@section('content')



   
    </head>
     <style>
   .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius:50px;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
  margin-bottom: 0px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  border-radius:50px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  margin-bottom: 0px;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
</style> 
   
    <body>
        
        <h1 class="text-center">Manage Coupons</h1>


        <div class=" container-fluid">

            <a href="#" data-toggle="modal" class=" m-2 btn btn-success" id="create_promo_code">Add Promocode</a>
          
        </div>

      
        <table id="coupens_table" class="display">
            <thead>
            <tr>
              <th>id</th>
              <th>Offer Name</th>
              <th>Coupon Code</th>
              <th>Coupon Limit</th>
              <th>Coupon Discount</th>
              <th>Action</th>
              <th>Status</th>
              <th>Checkbox</th>
            </tr>
        </thead>
          </table>
       {{-- crud category --}}


      
      <script>
           $(document).ready( function () {
     var url = window.location.href;
    var parts = window.location.href.split('/');
    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

        var promoid = lastSegment;

       // $('#scid').val(sciid);
   $('#coupens_table').DataTable({
            processing:true,
            serverSide:true,
            responsive: true,
            ajax:{
                url:"{{route('coupens.manage')}}",
                data:{id:promoid},
            },
            columns:[
            {
                data:'id',
                name:'id',
            },
            {
                data:'offer_name',
                name:'offer_name',
            },
            {
                data:'coupon_code',
                name:'coupon_code',
            },
            {
              data:'coupon_limit',
              name:'coupon_limit',
            },
            {
              data:'coupon_discount',
              name:'coupon_discount'
            },
            {
                data:'action',
                name:'action',
                orderable:false
            },
            {
                data:'status',
                name:'status',
                orderable:false
            },
            {
               "data":"checkbox",
                orderable:false,
                searchable:false
            }

        ]

        });
    


 

    $('#create_promo_code').click(function(){
        $('#action_button').val("Add");
        $('.modal-title').text("Add New Promo Code");
        $('#action').val("Add");
       $('#hidden_id').val(null);
       $('#offer_name').val(null);
      $('#coupon_code').val(null);
      $('#coupon_limit').val(null);
      $('#coupon_discount').val(null);
     //  $('#subjectid').val('').trigger('change');
     //  $('#sltstype').val('').trigger('change');
      $('#form_result').html(null);
       console.log($('#action').val());
        $('#CoupenModal').modal('show');
    });

  


    
 $('#addcoupon').on('submit',function(event) { 
  
      event.preventDefault();
      if($('#action').val() == 'Add')
  {
            $.ajax({
                url:"{{route('coupens.add')}}",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                beforeSend: function(){
                        var html = '';
                        html = '<div class="alert alert-info" id="data-alert"> Please Wait.. Coupen Data Saving... </div>';
                        $('#form_result').html(html);
                        // Show image container
                        //  $("#loader").show();
   },
                success:function(data)
                {
                     var html = '';
                       
                    // console.log(html);
                     console.log(data.error);
                  /*   if(data.responseJSON.errors)
                     {
                        html = '<div class="alert alert-danger">';
                         $.each(data.responseJSON.errors,function (k,v) {
                         html += '<li>'+ v + '</li>';
                     });
                     }*/

                     if(data.success){
                         html = '<div class="alert alert-success" id="data-alert" >'
                         +data.success + '</div>';
                         $('#addcoupon')[0].reset();
                         $('#coupens_table').DataTable().ajax.reload();
                     }
                     if(data.error){
                         html = '<div class="alert alert-danger" id="data-alert">'
                         +data.error + '</div>';
                     }

            
                     $('#form_result').html(html);

                $("#data-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#data-alert").slideUp(500);
                });
                },
                error:function(data)
                {
                     var html = '';
                     
                     //console.log(html);
                    console.log(data.responseJSON.errors);
                     if(data.responseJSON.errors)
                     {
                         html = '<div class="alert alert-danger" id="data-alert" >';
                         $.each(data.responseJSON.errors,function (k,v) {
                         html += '<li>'+ v + '</li>';
                         html +'</div>';
                  });
                        
                     }

                     if(data.responseJSON.success){
                         html = '<div class="alert alert-success" id="data-alert">'
                         +data.responseJSON.success + '</div>';
                         $('#addcoupon')[0].reset();
                         $('#coupens_table').DataTable().ajax.reload();
                     }


                     $('#form_result').html(html);

                       $("#data-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#data-alert").slideUp(500);

});
                },
                complete:function(data){
    
  /* setTimeout(function(){
        $("#GradeModal").modal('hide');
    }, 1000);*/

   }

                

            })

     }
     if($('#action').val() == "Edit")
            {
                $.ajax({
                    url:"{{route('coupens.update')}}",
                    method:"POST",
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    dataType:"json",
                    beforeSend: function(){
                        var html = '';
                        html = '<div class="alert alert-info">Please Wait.. Data Saving  </div>';
                        $('#form_result').html(html);
    // Show image container
  //  $("#loader").show();
   },
                    success:function(data)
                {
                     var html = '';
                    // console.log(html);
                     console.log(data.success);
                  /*   if(data.responseJSON.errors)
                     {
                        html = '<div class="alert alert-danger">';
                         $.each(data.responseJSON.errors,function (k,v) {
                         html += '<li>'+ v + '</li>';
                     });
                     }*/

                     if(data.success){
                         html = '<div class="alert alert-success">'
                         +data.success + '</div>';
                         $('#addcoupon')[0].reset();
                         $('#coupens_table').DataTable().ajax.reload();
                     }
                     if(data.error){
                         html = '<div class="alert alert-danger">'
                         +data.error + '</div>';
                    
                     }
                     $('#form_result').html(html);


                },
                error:function(data)
                {
                     var html = '';
                     
                     //console.log(html);
                    console.log(data.responseJSON.errors);
                     if(data.responseJSON.errors)
                     {
                         html = '<div class="alert alert-danger" id="data-alert">';
                         $.each(data.responseJSON.errors,function (k,v) {
                         html += '<li>'+ v + '</li>';
                         html +'</div>';
                  });
                        
                     }

                     if(data.responseJSON.success){
                         html = '<div class="alert alert-success" id="data-alert">'
                         +data.responseJSON.success + '</div>';
                         $('#addcoupen')[0].reset();
                         $('#coupens_table').DataTable().ajax.reload();
                     }

            
                     $('#form_result').html(html);
                     $("#data-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#data-alert").slideUp(500);
});

                },
                complete:function(data){
    // Hide image container
   // $("#loader").hide();
  // $('#store_image').hide();
 //  $('#StreamModal').modal('show');
   setTimeout(function(){
        $("#CoupenModal").modal('hide');
    }, 1000);
   }
              
                    
                })
            }
    });


    $(document).on('click','.edit',function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url:"/admin/couponsmanage/edit/"+id,
            dataType:"json",
            beforeSend: function(){
                swal({
                title: 'Please Wait !',
                html: '<h3>Getting Coupen information from server </h3>',// add html attribute if you want or remove
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    showLoading()
                },
            });
    // Show image container
  //  $("#loader").show();
   },
 success:function(responseJSON){

               
        $('#offer_name').val(responseJSON.data[0].offer_name);
        $('#coupon_code').val(responseJSON.data[0].coupon_code);
        $('#coupon_limit').val(responseJSON.data[0].coupon_limit);
        $('#coupon_discount').val(responseJSON.data[0].coupon_discount);
         $('#hidden_id').val(responseJSON.data[0].id);
                $('.modal-title').text("Edit Coupen"+responseJSON.data[0].offer_name);
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#CoupenModal').modal('show');

            },
            complete:function(data){
    // Hide image container
   // $("#loader").hide();
   swal.close();
   }


          
        })
    });

    var grade_id;

    $(document).on('click','.delete',function(){
      grade_id = $(this).attr('id');
      $('#confirmModal').modal('show');
      $('#ok_button').text('Ok');
      $('#ok_button').attr('disabled',false);
      $('#form_result_new').html(null);

    });

    $('#ok_button').click(function(){
        $.ajax({
            url:"/admin/couponsmanage/delete/"+grade_id,
            dataType:"json",
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(data)
            {
                setTimeout(function(){
                 $('#confirmModal').modal('show');
                $('#coupens_table').DataTable().ajax.reload();
                },300);


                var html = '';
                if(data.success){
                         html = '<div class="alert alert-success">'
                         +data.success + '</div>';
                        // $('#add')[0].reset();
                         $('#coupens_table').DataTable().ajax.reload();
                         $('#ok_button').text('Deleted');
                         $('#ok_button').attr('disabled',true);

                     }
                     if(data.error){
                         html = '<div class="alert alert-danger">'
                         +data.error + '</div>';
                         $('#ok_button').text('Try again');
                    
                     }

            
                $('#form_result_new').html(html);

              
               
            },
            complete:function(data){
    // Hide image container
   // $("#loader").hide();
   //$('#store_image').hide();
 //  $('#StreamModal').modal('show');
   setTimeout(function(){
        $("#confirmModal").modal('hide');
    }, 1000);
   }
            
        })
    });


    $(document).on('click','#bulk_delete',function(){
        var ids = [];
 swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm!'
}).then(function(){
    $('.grades_checkbox:checked').each(function(){

ids.push($(this).val());

});

if(ids.length>0)
{
console.log('ids selected',ids);
$.ajax({
 url:"",
 method:"get",
data:{ids:ids},
beforeSend: function(){
                swal({
                title: 'Please Wait !',
                html: 'Deleting Selected teachers form Server',// add html attribute if you want or remove
                type:'info',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    showLoading()
                },
            });
    // Show image container
  //  $("#loader").show();
   },
success:function(data)
{
  // alert(data);
  swal("Good job!", "Selected Teachers deleted successfully!", "success")

$('#coupens_table').DataTable().ajax.reload();

}

});
}else{

 swal("Ooops!", "Please Select one more checkboxes!", "error")
 
}
}).catch(function(reason){
   // alert("The alert was dismissed by the user: "+reason);
});


 });

  $(document).on('change','.status-switch',function(){
    let is_active = $(this).prop('checked') === true ? 1 : 0;
                let id = $(this).data('id');
                console.log('id'+id);
                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
                      });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{route('coupens.updatestatus')}}",
                    data: {'is_active': is_active, 'id': id},
                    success: function (data) {
                       
                        if(data.success){

                         $('#coupens_table').DataTable().ajax.reload();
                         swal("Good job!",data.success,"success");
                         }

                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.responseJSON.success);
                       
                    }
                });
 });

               
               
         
    } );
    


 

</script>
 
   




    <!-- add category Modal HTML -->
    <div id="CoupenModal" class="modal fade">
        <div class="modal-dialog">

 
            <div class="modal-content">
                <form method="POST" id="addcoupon" enctype="multipart/form-data" >
                    @csrf
                    
                    <div class="modal-header">						
                        <h4 class="modal-title">Add New Coupons</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                    <div class="modal-body">
                         <span id="form_result"></span>
                         <div class="form-row">
                             
                         <div class="form-group col-md-6">
                         <label for="offer_name">Offer Name</label>
                         <input type="text" name="offer_name" class="form-control" id="offer_name" placeholder="Offer Name">
                         </div>
                         
                       
                          <div class="form-group col-md-6">
                         <label for="coupon_code">coupon code</label>
                         <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="coupon code">
                          
                         </div>
                         
                         </div>
                          
                          
                          
                         <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="coupon_limit">coupon limit </label>
                        <input type="number" name="coupon_limit" class="form-control" id="coupon_limit" placeholder="coupon limit">
                         </div>
                          <div class="form-group col-md-6">
                         <label for="coupon_discount">coupon discount</label>
                         <input type="text"  name="coupon_discount" class="form-control" id="coupon_discount" placeholder="coupon discount">
                           <input type="hidden" name="action" id="action" value="action"/>
                           <input type="hidden" name="hidden_id" id="hidden_id" />  
                         </div>
                         
                          </div>
                          
                          
                         <div class="form-row">
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
                        <input type="submit" id="action_button"  class="btn btn-success" value="Add">
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
    
    
    
<!--delete grade confirm modal-->
<div class="modal fade" id="confirmModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Delete Coupen </h5>
                                                <button type="button" class="close" data-dismiss="modal" ><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <span id="form_result_new"></span>
                                            <h4  align="center" style="margin:0;">Are you sure want to remove this Coupen? </h4>
                                               
                                                 
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK </button>
                                            
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                               
                                               
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
<!--delete grade confirm modal ends -->

















@endsection












