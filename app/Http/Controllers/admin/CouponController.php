<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\coupon;
use RealRashid\SweetAlert\Facades\Alert;
use Input;

use Excel;
use App\Imports\csvImport;



class CouponController extends Controller
{
    
    
    
    public function index(){
        
        
        $items = DB::table('products')->get();
        
        $coupons = DB::table('coupons')
        ->join('products','coupons.Product_id','=','products.id')
        ->select('products.*','coupons.*','products.id AS pid')
        ->get();
        
        // dd($coupons);
        
        return view('admin.coupons',compact('items','coupons'));
        
        
    }
    
    public function add_coupons(Request $request){
        
        
        
              $request->validate([

       
            'offer_name' =>'required',
            'Product_id' =>'required',
            'coupon_code' =>'required',
            'coupon_limit' =>'required',
            'coupon_discount' =>'required|regex:"^\d*\.?\d*$"',
            
          

        ]);
        
        
             $coupons_data = array([
            
            "offer_name"=>$request["offer_name"],
            "Product_id"=>$request["Product_id"],
            "coupon_code"=>$request["coupon_code"],
            "coupon_limit"=>$request["coupon_limit"],
            "coupon_discount"=>$request["coupon_discount"],
            
         
            
            ]);
            
           $success = coupon::insert($coupons_data);
            
            if(   $success){
                
                 Alert::success('Congrats', 'Promo Code Added succesful');
                
            }
            else{
                
                  Alert::error('Error', 'Promo Code Added Unsuccesful');
                
            }
            
            
            return redirect()->back();
            
            
            
        
        
    }
    
    public function delete_coupons(Request $request){
        
        
        // dd($request);
        
       $success =  DB::table('coupons')->where('id', $request->couponId)->delete();
       
    //   return $success;
    
        
        if($success){
            
              Alert::success('Success', 'Promo Code Deleted succesful');
            
        }
        else{
            
              Alert::error('Error', 'Promo Code Deleted Unsuccesful');
            
        }
        
        // $items = DB::table('products')->get();
        // $coupons = DB::table('coupons')->get();
        // return view('admin.coupons',compact('items','coupons'));
          return redirect()->back();
        
        
    }
    
    
    
    public function edit_coupons(Request $request){
        
        
        
            
              $request->validate([
            'coupon_code' =>'required',
            'offer_name' =>'required',
            'coupon_limit' =>'required',
            'coupon_discount' =>'required|regex:"^\d*\.?\d*$"',
               ]);
        
        
        
       
         
         $status="";
       
         if(isset($request->status)){
             
             $status=1;
             
         }
         
         else{
             
             $status=0;
         }
         
         
         $edit_coupon =[
             
             'coupon_code'=>$request->coupon_code,
             'id'=>$request->id,
             'offer_name'=>$request->offer_name,
             'coupon_limit'=>$request->coupon_limit,
             'coupon_discount'=>$request->coupon_discount,
             'status'=>$status,
         
             
             ];
             
             
             
        //   $success = coupon::insert($edit_coupon);
           
          $success = coupon::where('id',$request->id)->update( $edit_coupon );
           
           
         
         if($success){
             
              Alert::success('Success', 'Promo Code Updated succesful');
             
             
         }
         else{
             
              Alert::error('Error', 'Promo Code Updated Unsuccesful');
             
         }
         
         
         
         return redirect()->back();
         
         
         
         
         
         
        
    }
    
    /*new promo code function start*/
    
    /*function for handle promo code table*/
    
    
    public function manageCoupens(){
        
        if(request()->ajax())
        {
            $data = DB::table('coupons')->orderBy('id')->get();
            
            
            
            
             return datatables()->of($data)
            ->addColumn('action',function($data){
                
            //   modified by nadeesha
            
            //     $button = '<button class="edit btn btn-sm btn-primary "  id="'.$data->id.'" name="edit"> 
            //     <div style="text-align:center;"><i class="material-icons ">create</i></div>  
                
            //   </button>';
              
              $button="";
              
              
              $button .='&nbsp;&nbsp;';
              $button .='<button class="delete btn btn-sm btn-danger"  id="'.$data->id.'" name="delete"> 
              <div style="text-align:center;"><i class="material-icons ">delete</i></div>  
                
            </button>';

              $button .='&nbsp;&nbsp;';
              
           
            //   $button .=' <a href="coupens/productsbycoupen/'.$data->id.'"><button  type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Coupens By Product" ><i class="material-icons btn-success ">manage_accounts</i></button></a>';
          
              $button .='&nbsp;&nbsp;';
                return $button;
            
            })
            ->rawColumns(['action'])
            ->addColumn('checkbox','<input type="checkbox" name="coupens_checkbox[]" class="coupens_checkbox selectbox" value="{{$id}}" />')
             ->addColumn('status',function($data){
              $coupenid = $data->id;
              $status = $data->status;
              if($status == 1 ){
                  
                  $status_row = "";
                  $status_row .= "<label class='switch'>
                  <input type='checkbox' data-id='".$coupenid."' class='status-switch'   name='is_active'   checked  >
                  <div class='slider'></div>
                </label>";
              }else{
                  $status_row = "";
                  $status_row .= "<label class='switch'>
                  <input type='checkbox' data-id='".$coupenid."' class='status-switch'   name='is_active'  >
                  <div class='slider'></div>
                </label>";
              }
            

              return $status_row;
          })
            ->rawColumns(['checkbox','status','action'])
            ->make(true);
            
        }
        
        return view('admin.coupenmanage');
    }
    
    
    /*function for add coupon*/
    
     public function addCoupon(Request $request){
        
        
        
        $request->validate([
            'product_id'=>'required',
            'offer_name' =>'required',
            'coupon_code' =>'required|unique:coupons,coupon_code',
            'coupon_limit' =>'required',
            'coupon_discount' =>'required|regex:"^\d*\.?\d*$"',
            'item_count_per_cus'=>'required',
        ],[
        'offer_name.required'=>'Please Enter Offer name',
        'coupon_code.required'=>'Please Enter Coupon Code',
        'coupon_limit.required'=>'Please Enter Coupon Limit',
        'coupon_discount.required'=>'Please Enter Coupon Discount',
        'coupon_discount.regex'=>'Please enter valid coupon discount',
        'product_id.required'=>'Please enter Product id',
        'item_count_per_cus.required'=> 'Please enter item count',
        ]);
        
        
          $coupons_data = array([
            "product_id"=>$request["product_id"],
            "offer_name"=>$request["offer_name"],
            "coupon_code"=>$request["coupon_code"],
            "coupon_limit"=>$request["coupon_limit"],
            "coupon_discount"=>$request["coupon_discount"],
            "item_count_per_cus"=>$request["item_count_per_cus"],
            "status"=>0,
            ]);
            
           $success = coupon::insert($coupons_data);
            
            if($success){
                
                // Alert::success('Congrats', 'Promo Code Added succesful');
                
                return response()->json(['success'=>'Coupon code added successfully']);
                
            }
            else{
                
                return response()->json(['error'=>'Error adding coupon code']);
                
            }
            
            
          
            
            
            
        
        
    }
    
    /*function for get coupon code info*/
    
    public function getCouponCode($id){
        
        if(request()->ajax()){
            $data = DB::table("coupons")->where("id",$id)->get();
            return response()->json(['data'=>$data]);
        }
        
    }
    
    /*function for update coupon code info*/
    
    public function updateCouponCode(Request $request){
        
        // dd($request);
        
        $request->validate([
            'offer_name' =>'required',
            'coupon_code' =>'required|unique:coupons,coupon_code,'.$request->get('hidden_id'),
            'coupon_limit' =>'required',
            'coupon_discount' =>'required|regex:"^\d*\.?\d*$"',
             'product_id.required'=>'Please enter Product id',
             'item_count_per_cus.required'=> 'Please enter item count',
            ],['offer_name.required'=>'Please Enter Offer name','coupon_code.required'=>'Please Enter Coupon Code','coupon_limit.required'=>'Please Enter Coupon Limit','coupon_discount.required'=>'Please Enter Coupon Discount','coupon_discount.regex'=>'Please enter valid coupon discount','product_id.required'=>'Plese Enter product id','item_count_per_cus.required'=>'Please Enter Item count']);
        
        $edit_coupon =[
             'coupon_code'=>$request->get('coupon_code'),
             'id'=>$request->get('hidden_id'),
             'offer_name'=>$request->get('offer_name'),
             'coupon_limit'=>$request->get('coupon_limit'),
             'product_id'=>$request->get('product_id'),
             "item_count_per_cus"=>$request->get("item_count_per_cus"),
             ];
             
             
             
        $success = coupon::where('id',$request->get('hidden_id'))->update($edit_coupon);
        
        if($success){
          return response()->json(['success'=>'Coupon Edited Sucessfully']);
        }else {
           return response()->json(['error'=>'Error Updating Coupon']);
        }
        
      
        
    }
    
    /*function for deletecoupon code */
    
    public function deleteCouponCode($id){
        $deletecoupon = DB::delete("delete from coupons where id = ?",[$id]);
        if($deletecoupon){
            return response()->json(['success'=>'Coupon Deleted Sucessfully']);
        }else {
            return response()->json(['error'=>'Error Deleting Coupon']);
        }
    }
    
    /*function for updatecoupon code status*/
    
    public function updateCouponStatus(Request $request){
        $id = $request->get('id');
        $is_active = $request->get('is_active');
        $update_coupon_status = DB::update('update coupons set status =? where id=? ',[$is_active,$id]);
    }
    
    public function getProductByCoupen($id) {
        
        $promoid = request()->id;
        
          if(request()->ajax())
        {
            $promoid = request()->id;
            $data = DB::table('coupen_product')->where('coupen_product.coupen_id')->leftjoin('products as products','coupen_product.product_id','=','products.id')->leftjoin('coupons as coupons','coupen_product.coupen_id','=','coupons.id' )->select('coupen_product.id','coupen_product.coupen_code','coupen_product.product_id','coupen_product.status','products.product_name','coupons.coupon_limit','coupons.coupon_discount')->orderBy('coupen_product.id')->get();
            
             return datatables()->of($data)
            ->addColumn('action',function($data){

                $button = '<button class="edit btn btn-sm btn-primary "  id="'.$data->id.'" name="edit"> 
                <div style="text-align:center;"><i class="material-icons ">create</i></div>  
                  
              </button>';
              $button .='&nbsp;&nbsp;';
              $button .='<button class="delete btn btn-sm btn-danger"  id="'.$data->id.'" name="delete"> 
              <div style="text-align:center;"><i class="material-icons ">delete</i></div>  
                
            </button>';
           return $button;
            })
            ->rawColumns(['action'])
            ->addColumn('checkbox','<input type="checkbox" name="coupens_checkbox[]" class="coupens_checkbox selectbox" value="{{$id}}" />')
             ->addColumn('status',function($data){
              $coupenid = $data->id;
              $status = $data->status;
              if($status == 1 ){   
        
                  $status_row = "";
                  $status_row .= "<label class='switch'>
                  <input type='checkbox' data-id='".$coupenid."' class='status-switch'   name='is_active'   checked  >
                  <div class='slider'></div>
                </label>";
              }else{
                  $status_row = "";
                  $status_row .= "<label class='switch'>
                  <input type='checkbox' data-id='".$coupenid."' class='status-switch'   name='is_active'  >
                  <div class='slider'></div>
                </label>";
              }
            

              return $status_row;
          })
            ->rawColumns(['checkbox','status','action'])
            ->make(true);
            
        }
        
        return view('admin.couponproduct');
        
    }
    
     /*function for add coupon*/
    
     public function addCouponProduct(Request $request){
        
        
        
        $request->validate([
            'coupen_id' =>'required',
            'coupon_code' =>'required',
            'product_id' =>'required',
            'item_count_per_cus'=> 'required',
        ],['coupen_id.required'=>'Please Enter coupen id ','coupon_code.required'=>'Please Enter Coupon Code','product_id.required'=>'Please Enter Prodcut id ','item_count.required'=>'Please Enter Coupon Item count applicable for this coupen',]);
        
        
         
            $coupen_id=$request->get("coupon_id");
            $coupon_code=$request->get("coupon_code");
            $coupon_limit=$request->get("coupon_limit");
            $coupon_discount=$request->get("coupon_discount");
            $item_count = $request->get("item_count");
          
            
            
             $insertcoupenproductdata = DB::insert('insert into coupen_product (coupen_id,coupen_code,product_id,item_count) value(?,?,?,?)',[$coupen_id,$coupen_code,$coupon_limit,$coupon_discount,$item_count]);
             
            
            
            
            
            
          // $success = coupon::insert($coupons_data);
            
            if( $insertcoupenproductdata ){
                
                // Alert::success('Congrats', 'Promo Code Added succesful');
                
                return response()->json(['success'=>'Coupon code added successfully']);
                
            }
            else{
                
                return response()->json(['error'=>'Error adding coupon code']);
                
            }
            
            
          
            
            
            
        
        
    }
    
    
    public function uploadCoupon(Request $request){
        
               $request->validate([
               'file' =>'required|mimes:csv,xlsx',
               ],['file.required'=>'Please insert file with coupon codes' , 'file.mimes'=>'Please insert xlsx or csv format' ]); 
        
        // return "dsf";
        
     
      
    if(   Excel::import(new csvImport,$request->file)  ){
        
          Alert::success('Congrats', 'Promo Codes Added succesful');
          return back();
    
    }
    else{
        
         
           Alert::error('Error', 'Promo Codes Added Unsuccesful');
           return back();
    }
      
    
        
        
    }
   
    
   
    
    
    
    
    
    
    
    
    
}
