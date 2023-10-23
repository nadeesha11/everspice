@extends('admin.master')

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<style>
    label{
        color:black;
        font-size:18px;
        font-weight:600;
    }
</style>



<h1 class="text-center">Add Products</h1>


<form id="product_add" method="POST" enctype="multipart/form-data" action="{{ url('/admin/product') }}">
    @csrf

    <div class="m-3">
      <label for="cat_id" class="form-label">Select category</label>
      {{-- <input type="text" name="cat_id" class="form-control" id="cat_id" > --}}
      <select class="form-control cat_id" id="cat_id" name="cat_id">
        @foreach ($category as $item)
        <option value="{{ $item->id }}">{{ $item->Cat_name }}</option>  
        @endforeach 
        </select>
        <span style="color: brown" >@error('cat_id'){{ $message }} @enderror   </span>
   
     </div>


     <div class="m-3">
        <label for="subcat_id" class="form-label">Sub Category</label>
        <select id="subcat_id" class="form-control subcat_id" name="subcat_id">
            
           
         </select>
         <span style="color: brown" >@error('subcat_id'){{ $message }} @enderror   </span>
      </div>
   


      <div class="m-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text"  name="product_name" class="form-control" id="product_name" >
        <span style="color: brown" >@error('product_name'){{ $message }} @enderror   </span>
      </div>



      <!--stock-->
   
        <!--stock-->
      
      

      <div class="m-4">
        <label for="product_main_img" class="form-label">Main Image   </label><br>
        <input type="file" name="product_main_img" id="product_main_img" ><br>
        <span style="color: brown" >@error('product_main_img'){{ $message }} @enderror   </span>
      </div>


      


      <div class="m-4">
        <label for="product_sub_img1" class="form-label">Sub Image One</label><br>
        <input type="file" name="product_sub_img1"  id="product_sub_img1" ><br>
        <span style="color: brown" >@error('product_sub_img1'){{ $message }} @enderror   </span>
      </div>


      <div class="m-4">
        <label for="product_sub_img2" class="form-label">Sub Image Two</label><br>
        <input type="file" name="product_sub_img2"  id="product_sub_img2" ><br>
        <span style="color: brown" >@error('product_sub_img2'){{ $message }} @enderror   </span>
      </div>

      <div class="m-4">
        <label for="product_sub_img3" class="form-label">Sub Image Three </label><br>
        <input type="file" name="product_sub_img3"  id="product_sub_img3" ><br>
        <span style="color: brown" >@error('product_sub_img3'){{ $message }} @enderror   </span>
      </div>
      <div class="m-4">
        <label for="product_sub_img4" class="form-label">Sub Image Four</label><br>
        <input type="file" name="product_sub_img4"  id="product_sub_img4" ><br>
        <span style="color: brown" >@error('product_sub_img4'){{ $message }} @enderror   </span>
      </div>

      <div class="m-3">
        <label for="description" class="form-label">Description</label>
        <!--<input type="text" name="description" class="form-control" id="description" >-->
         <textarea class="form-control" name="description" id="description" rows="7"></textarea>
       
         <!--<textarea id="description" name="description" rows="4" cols="50">-->
         <!--<input type="text" name="description" class="form-control" id="description" >-->
         
        <span style="color: brown" >@error('description'){{ $message }} @enderror   </span>
      </div>
      
      
        <div class="m-3">
        <label for="description1" class="form-label">How it Works</label>
        <!--<input type="text" name="description" class="form-control" id="description" >-->
         <textarea class="form-control" name="description1" id="description1" rows="7"></textarea>
       
         <!--<textarea id="description" name="description" rows="4" cols="50">-->
         <!--<input type="text" name="description" class="form-control" id="description" >-->
         
        <span style="color: brown" >@error('description1'){{ $message }} @enderror   </span>
       </div>
       
         <div class="m-3">
        <label for="description2" class="form-label">Key Benefits</label>
        <!--<input type="text" name="description" class="form-control" id="description" >-->
         <textarea class="form-control" name="description2" id="description2" rows="7"></textarea>
       
         <!--<textarea id="description" name="description" rows="4" cols="50">-->
         <!--<input type="text" name="description" class="form-control" id="description" >-->
         
        <span style="color: brown" >@error('description2'){{ $message }} @enderror   </span>
       </div>
      

      <div class="m-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control" id="price" >
        <span style="color: brown" >@error('price'){{ $message }} @enderror   </span>
      </div>

      <div class="m-3">
        <label for="discount" class="form-label">Discount </label>
        <input type="text" name="discount" class="form-control" id="discount" >
        <span style="color: brown" >@error('discount'){{ $message }} @enderror   </span>
      </div>
    
   
    <button type="submit" class="btn btn-primary" style="margin-left:20px">Submit</button>
  </form>






  <script>
     $(".cat_id").on('click',function(){

     var cat_id =$(this).val();
    //console.log(cat_id);

     $.ajax({

     url:"{{ url('/admin/product/displaysubcat') }}/"+cat_id,
     dataType:'json',
     
     beforeSend:function(){
     $(".subcat_id").html('<option>loading</option>');
     },


    
     success:function(res){
  
          var _html='';
          $.each(res.sub_category,function(index,row){

         _html+='<option  value="'+row.id+'" >'+row.sub_name+'<option>'
         

          });
        $(".subcat_id").html(_html);
   
 
    

    }
});

}); 








  </script>

  <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


  <script>
  
  
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
        
        
        ClassicEditor
        .create( document.querySelector( '#description1' ) )
        .catch( error => {
            console.error( error );
        } );   
        
             ClassicEditor
        .create( document.querySelector( '#description2' ) )
        .catch( error => {
            console.error( error );
        } ); 
        
        
        
</script>






    
@endsection