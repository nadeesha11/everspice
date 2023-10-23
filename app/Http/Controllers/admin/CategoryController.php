<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    
  public function index(){

    //   $category_data = category::get();
    
    
      $category_data =  DB::table('category')
     ->whereNull('status')
     ->get();
    
    
     
     return view('admin.categories', ['category_data' => $category_data]);

  }

  public function add_category(Request $request){

  

//   category::create($request->all());
   
   if( category::create($request->all()) ){
       
        Alert::success('Category Added', 'Category Added Succesfully');
   }
   else{
       
        Alert::warning('Category Added', 'Category Add Failed');
       
   }

  
    $category_data = category::get();
    return view('admin.categories', ['category_data' => $category_data]);
    //   return redirect()->back();
    
    
    
    
  }

  public function edit_category(Request $request){

  $new =  DB::table('category')->where('id', $request->id)->update(array('Cat_name' => $request->Cat_name)); 
  
  
  if($new>0){
      
      Alert::success('Category Edit', 'Category Edited Succesfully');
      
  }
  else{
      
      Alert::success('Category Edit', 'Category Edit unsuccesful');
      
      
  }
  
  
  
  

    $category_data = category::get();
    return view('admin.categories', ['category_data' => $category_data]);
    //   return redirect()->back();

  }

  public function delete_category(Request $request){

    
//   $new =   DB::table('category')->where('id', $request->id2)->delete();

    $result = DB::table('category')
    ->where('id',$request->id2)
    ->update([
        'status'=>0,
      
    ]);
     
    //  dd($result);
     
     
     
       if($result==1){
      
       Alert::success('Category Delete', 'Category Deleted Succesfully');
      
       }
       else{
      
       Alert::error('Category Delete', 'Category Delete unsuccesful');
      
      
      }
     
     
     
         return redirect()->back();
    
    // $category_data = category::get();
    // return view('admin.categories', ['category_data' => $category_data]);
    
    
    
  }

}
