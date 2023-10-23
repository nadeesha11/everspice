<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\subcategory as ModelsSubcategory;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;


class Subcategory extends Controller
{
    
 public function index( $sub_id){


   //  return view('admin.sub_category',compact('sub_id'));
   $subcategory_data = DB::table('subcategory')
   ->whereNull('status')
   ->where('sub_id', $sub_id)->get();

   //  $subcategory_data = ModelsSubcategory::get();
   return view('admin.sub_category', compact('sub_id', 'subcategory_data'));
     
   //  return view('admin.categories', ['subcategory_data' => $subcategory_data,'sub_id' => $sub_id]);


 }

 public function add_subcategory(Request $request){

    // ModelsSubcategory::create($request->all());
   
   
   if(ModelsSubcategory::create($request->all())  ){
       
       
        Alert::success('Subcategory Added', 'Subcategory Added Succesfully');
       
       
   }
   else{
       
       
       Alert::warning('Subcategory Added', 'Subcategory Added Unsuccesful');
       
   }
   
   
    // return redirect()->back();
   
   
  $sub_id = $request->sub_id;

  $subcategory_data = DB::table('subcategory')->where('sub_id', $sub_id)->get();

  return view('admin.sub_category', ['subcategory_data' => $subcategory_data, 'sub_id'=> $sub_id]);

 }

   public function edit_subcategory(Request $request){

   // dd($request);

    $result =  DB::table('subcategory')->where('id', $request->id)->update(array('sub_name' => $request->sub_name)); 
   
   
   
   
   
   
       if($result>0){
      
       Alert::success('Category Edit', 'Category Edit Succesfully');
      
       }
       else{
      
       Alert::success('Category Edit', 'Category Edit unsuccesful');
      
      
       }
   
   
   
   
   
   
   
   
   
   
   
   $sub_id = $request->sub_id;

  
   // $subcategory_data = ModelsSubcategory::get();
   $subcategory_data = DB::table('subcategory')->where('sub_id', $sub_id)->get();


   return view('admin.sub_category', ['subcategory_data' => $subcategory_data, 'sub_id'=> $sub_id]);
    


   }

   public function delete_subcategory(Request $request){

      // dd($request);
    //   $result =   DB::table('subcategory')->where('id', $request->id)->delete();
    //   dd($request);
      
    $result = DB::table('subcategory')
    ->where('id',$request->id)
    ->update([
        'status'=>0,
      
    ]);
    

      
     
       
     if($result>0){
      
      Alert::success('Subcategory Delete', 'Subcategory Deleted Succesfully');
      
      }
     else{
      
      Alert::error('Subcategory Delete', 'Subcategory Delete unsuccesful');
      
      
      }
     
     
     return redirect()->back();
     
     
     
     

    //   $sub_id = $request->sub_id;

  
    //   // $subcategory_data = ModelsSubcategory::get();
    //   $subcategory_data = DB::table('subcategory')->where('sub_id', $sub_id)->get();
   
   
    //   return view('admin.sub_category', ['subcategory_data' => $subcategory_data, 'sub_id'=> $sub_id]);

   }



}
