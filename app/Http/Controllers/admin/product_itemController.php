<?php

namespace App\Http\Controllers\admin;

use Faker\Extension\Extension;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\create_product_image_table;
use Illuminate\Http\Request;

class product_itemController extends Controller
{
    public function index(){

        // $category = DB::table('category')
        // ->get(); 

     $category =  DB::table('category')
     ->whereNull('status')
     ->get();


        return view('admin.add_product', ['category' => $category]);
       
    }

    public function add_product(Request $request){

        // $validator = validator::make($request->all(),[

        //     'cat_id' =>'required',
        //     'subcat_id' =>'required',
        //     'product_name' =>'required',
        //     'stock' =>'required',
        //     'description' =>'required',
        //     'price' =>'required',
        //     'product_main_img'=>'required|image',
        //     'product_sub_img1'=>'required|image',
        //     'product_sub_img2'=>'required|image',
        //     'product_sub_img3'=>'required|image',
        //     'product_sub_img4'=>'required|image'
        // ]);

        // if($validator->fails()){

        //     return back()->with('status','please check your inputs again');
        // }
        // die();

        // $regex = '^\d*\.?\d*$';

    //  ,['email.required'=>'Please Enter Your email','password.required' => 'Please Enter Your Password']
    
    //   $request->validate([
    //         'email' => 'required',
    //         'password'=>'required',
    //     ],['email.required'=>'Please Enter Your email','password.required' => 'Please Enter Your Password']);
    
        $request->validate([

       
            'cat_id' =>'required',
            'subcat_id' =>'required',
            'product_name' =>'required',
            // 'stock' =>'required',
            'description' =>'required',
            'description1' =>'required',
            'description2' =>'required',
            'price' =>'required|numeric',
            'product_main_img'=>'required|mimes:jpg|max:500',
            'product_sub_img1'=>'required|mimes:jpg|max:500',
            'product_sub_img2'=>'required|mimes:jpg|max:500',
            'product_sub_img3'=>'required|mimes:jpg|max:500',
            'product_sub_img4'=>'required|mimes:jpg|max:500',
            'discount'=>'required|numeric',
    ],
            ['cat_id.required'=>'Please Select Category',
            'subcat_id.required' => 'Please Select Subcategory',
            'product_name.required' => 'Please Select Product Name',
            // 'stock.required' => 'Please Fill Stock Value',
            
            // numeric
            // 'stock.numeric' => 'Please Fill Stock With Valid Value',
            'price.numeric' => 'Please Fill Price With Valid Value',
            'discount.numeric' => 'Please Fill Discount With Valid Value',
            
           // numeric
          
            'description.required' => 'Please Fill Description',
            'description1.required' => 'Please Fill How It Works',
            'description2.required' => 'Please Fill Key Benefits',
            'price.required' => 'Price Is Required',
            'product_main_img.required' => 'Product Main Image Is Required',
            'product_main_img.mimes' => 'Image Should Be In JPG Format',
            
            'product_sub_img1.required' => 'Product Sub Image One Is Required',
            'product_sub_img1.mimes' => 'Image Should Be In JPG Format',
            'product_sub_img2.required' => 'Product Sub Image Two Is Required',
            'product_sub_img2.mimes' => 'Image Should Be In JPG Format',
            'product_sub_img3.required' => 'Product Sub Image Three Is Required',
            'product_sub_img3.mimes' => 'Image Should Be In JPG Format',
            'product_sub_img4.required' => 'Product Sub Image Four Is Required',
            'product_sub_img4.mimes' => 'Image Should Be In JPG Format',
            'discount.required' => 'Please Fill Discount',
            'product_main_img.max' => 'Image Size Should Not Be exceed than 500kb',
            'product_sub_img1.max' => 'Image Size Should Not Be exceed than 500kb',
            'product_sub_img2.max' => 'Image Size Should Not Be exceed than 500kb',
            'product_sub_img3.max' => 'Image Size Should Not Be exceed than 500kb',
            'product_sub_img4.max' => 'Image Size Should Not Be exceed than 500kb',
            
        ]);
        
        
        
        
        

//   return "success";
    
       $products = array([
            "cat_id"=>$request["cat_id"],
            "subcat_id"=>$request["subcat_id"],
            "product_name"=>$request["product_name"],
            "stock"=>0,
            "description"=>$request["description"],
             "description1"=>$request["description1"],
              "description2"=>$request["description2"],
            "price"=>$request["price"],
            "discount"=>$request["discount"],

             ]
        );
    //  required for send product data 
      DB::table('products')->insert($products);
  
      $last = DB::table('products')->orderBy('id','desc')->first();
     



    //    in here i shuld rename thename of img files

    $product_main_imgs = time().rand(1,1000).'.'.$request->product_main_img->extension();
    $product_sub_imgs1 = time().rand(1,1000).'.'.$request->product_sub_img1->extension();
    $product_sub_imgs2 = time().rand(1,1000).'.'.$request->product_sub_img2->extension();
    $product_sub_imgs3 = time().rand(1,1000).'.'.$request->product_sub_img3->extension();
    $product_sub_imgs4 = time().rand(1,1000).'.'.$request->product_sub_img4->extension();


   $request->product_main_img->move(public_path('product_images'),$product_main_imgs);
   $request->product_sub_img1->move(public_path('product_images'),$product_sub_imgs1);
   $request->product_sub_img2->move(public_path('product_images'),$product_sub_imgs2);
   $request->product_sub_img3->move(public_path('product_images'),$product_sub_imgs3);
   $request->product_sub_img4->move(public_path('product_images'),$product_sub_imgs4);

   create_product_image_table::create([
    'product_id'=>$last->id,
    'product_main_img'=>$product_main_imgs,
    'product_sub_img1'=>$product_sub_imgs1,
    'product_sub_img2'=>$product_sub_imgs2,
    'product_sub_img3'=>$product_sub_imgs3,
    'product_sub_img4'=>$product_sub_imgs4,

   ]);



   $product_data =  DB::table('products')
   ->join('category','products.cat_id','=','category.id')
   ->join('subcategory','products.subcat_id','=','subcategory.id')
   ->join('create_product_image_tables','products.id','=','create_product_image_tables.product_id')
   ->select('products.*','category.Cat_name','subcategory.sub_name','create_product_image_tables.product_main_img','create_product_image_tables.product_sub_img1','create_product_image_tables.product_sub_img2','create_product_image_tables.product_sub_img3','create_product_image_tables.product_sub_img4')
   ->get();


    return view('admin.product_home',compact('product_data'));
            

    }

   public function displaysubcat($cat_id){

    // $sub_category = DB::table('subcategory')->where('cat_id',$cat_id)->get();
    $sub_category = DB::table('subcategory')
     ->whereNull('status')
    ->where('sub_id',$cat_id)
    ->get();
    
    return response()->json(['sub_category'=>$sub_category]);
   

   }
   
  public function reviews(){
       $product_reviews = DB::table('customer_reviews')->get();
        return view('admin.reviews', ['product_reviews' => $product_reviews]);
  }
   
    public function edit_review(Request $request){

    DB::table('customer_reviews')->where('id', $request->id)->update(array('approved' => $request->approved_status)); 
  

    //$category_data = category::get();
    $product_reviews = DB::table('customer_reviews')->get();
    return view('admin.reviews', ['product_reviews' => $product_reviews]);

  }

  public function delete_review(Request $request){

    
    DB::table('customer_reviews')->where('id', $request->id2)->delete();
     
    
    //$category_data = category::get();
     $product_reviews = DB::table('customer_reviews')->get();
     return view('admin.reviews', ['product_reviews' => $product_reviews]);
  }





}
