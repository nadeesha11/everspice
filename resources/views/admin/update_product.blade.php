@extends('admin.master')

@section('content')
  <style>
    label{
        color:black;
        font-size:18px;
        font-weight:600;
    }
</style>  
<form id="product_add" method="POST" enctype="multipart/form-data" action="{{ url('/admin/producthome/update').$product_edit[0]->id }}">
    @csrf
    @method('PUT')
 
   


      <div class="m-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" name="product_name" value="{{ $product_edit[0]->product_name }}" class="form-control" id="product_name" >
        <span style="color: brown" >@error('product_name'){{ $message }} @enderror   </span>
      </div>


      <div class="m-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="hidden" value="{{ $product_edit[0]->stock }}" name="stock" class="form-control" id="stock" >
        <span style="color: brown" >@error('stock'){{ $message }} @enderror   </span>
      </div>

      <div class="m-4">
        <label for="product_main_img" class="form-label">Main Image   </label><br>
        <img width="60px" src="{{ asset('product_images/'.$product_edit[0]->product_main_img) }}" alt="main_image" >
        <input type="file" name="product_main_img" id="product_main_img" ><br>
        <span style="color: brown" >@error('product_main_img'){{ $message }} @enderror   </span>
      </div>

     
      


      <div class="m-4">
        <label for="product_sub_img1" class="form-label">Sub Image One</label><br>
        <img width="60px" src="{{ asset('product_images/'.$product_edit[0]->product_sub_img1) }}" alt="main_image" >
        <input type="file" name="product_sub_img1"  id="product_sub_img1" ><br>
        <span style="color: brown" >@error('product_sub_img1'){{ $message }} @enderror   </span>
      </div>


      <div class="m-4">
        <label for="product_sub_img2" class="form-label">Sub Image two</label><br>
        <img width="60px" src="{{ asset('product_images/'.$product_edit[0]->product_sub_img2) }}" alt="main_image" >
        <input type="file" name="product_sub_img2"  id="product_sub_img2" ><br>
        <span style="color: brown" >@error('product_sub_img2'){{ $message }} @enderror   </span>
      </div>

      <div class="m-4">
        <label for="product_sub_img3" class="form-label">Sub Image three </label><br>
        <img width="60px" src="{{ asset('product_images/'.$product_edit[0]->product_sub_img3) }}" alt="main_image" >
        <input type="file" name="product_sub_img3"  id="product_sub_img3" ><br>
        <span style="color: brown" >@error('product_sub_img3'){{ $message }} @enderror   </span>
      </div>
      <div class="m-4">
        <label for="product_sub_img4" class="form-label">Sub Image four</label><br>
        <img width="60px" src="{{ asset('product_images/'.$product_edit[0]->product_sub_img4) }}" alt="main_image" >
        <input type="file" name="product_sub_img4"  id="product_sub_img4" ><br>
        <span style="color: brown" >@error('product_sub_img4'){{ $message }} @enderror   </span>
      </div>

      <div class="m-3">
        <label for="description" class="form-label">Description</label>
        <!--<input type="text" value="{{ $product_edit[0]->description }}"  name="description" class="form-control" id="description" >-->
        
          <textarea class="form-control"    name="description" id="description" rows="7">{{ $product_edit[0]->description  }}</textarea>
        
        <span style="color: brown" >@error('description'){{ $message }} @enderror   </span>
      </div>
      
      
         <div class="m-3">
        <label for="description" class="form-label">How it Works</label>
        <!--<input type="text" value="{{ $product_edit[0]->description }}"  name="description" class="form-control" id="description" >-->
        
          <textarea class="form-control"    name="description1" id="description1" rows="7">{{ $product_edit[0]->description1  }}</textarea>
        
        <span style="color: brown" >@error('description1'){{ $message }} @enderror   </span>
      </div>
      
      
         <div class="m-3">
        <label for="description" class="form-label">Key Benefits</label>
        <!--<input type="text" value="{{ $product_edit[0]->description }}"  name="description" class="form-control" id="description" >-->
        
          <textarea class="form-control"    name="description2" id="description2" rows="7">{{ $product_edit[0]->description2  }}</textarea>
        
        <span style="color: brown" >@error('description2'){{ $message }} @enderror   </span>
      </div>
      
      

      <div class="m-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" value="{{ $product_edit[0]->price }}" name="price" class="form-control" id="price" >
        <span style="color: brown" >@error('price'){{ $message }} @enderror   </span>
      </div>

      <div class="m-3">
        <label for="discount" class="form-label">Discount </label>
        <input type="text" value="{{ $product_edit[0]->discount }}" name="discount" class="form-control" id="discount" >
        <span style="color: brown" >@error('discount'){{ $message }} @enderror   </span>
      </div>
    
   
    <button type="submit" class="btn btn-primary" style="margin-left:20px">Update</button>
  </form>
  
  
  
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

























