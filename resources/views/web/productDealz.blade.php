@extends('web.web_master')

@section('content')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Deals
                </div>
            </div>
        </div>
<div class="bg" style="padding: 4rem!important;">


    <h1>Current Deals</h1>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">
              
              
          
          
          
          
          @if (  0 <  (count($product_data)))
          
          
             @foreach ($product_data as $product)
           
           
               
          

                <!--end product card-->
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                
                                    <img class="default-img" src="{{ asset('product_images/'.$product->product_main_img) }}" alt="" />
                                    {{-- <img class="hover-img" src="{{ asset('product_images/1657514985991.jpg') }}" alt="" /> --}}
                                
                            </div>
                           
                        </div>

                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">-{{  $product->discount }}%</span>
                        </div>


                        <div class="product-content-wrap">
                            <div class="product-category">
                                {{-- <a href="shop-grid-right.html">Meats</a> --}}
                                <p>{{ $product->Cat_name  }}</p>
                            </div>
                            <h2><a href=" {{ url('/web/products/detailed/'.$product->id) }}  ">{{ $product->product_name }}</a></h2>
                            
                            
                            
                            <!--rating system-->
                                       
                                         @php
                                         
                                         
                                         $rating = 0;
                                         $count = 0.01;
                                         
                                         
                                         @endphp
                                         
                                         
                                         <div class="product-rate-cover">
                                               
                                               
                                               
                                         @foreach($product_reviews as $review )  
                                         
                                         
                                         @if($review->prod_id == $product->id )
                                         
                                         
                                         @php
                                          
                                          
                                         $rating  =   $review->rating + $rating;
                                         $count = $count+1;
                                         
                                         @endphp
                                         
                                         @endif
                                         
                               
                                        
                                        
                                         @endforeach
                                        
                                     
                                            <div class="product-rate d-inline-block">
                                          
                                        <div class="product-rating" style="width:@php   echo ($rating/$count)*20; @endphp%"></div>
                                        </div>
                                        <span class=" ml-5 ">(@php   echo  round($rating/$count,1);  @endphp)</span>
                                        </div> 
                          
                             <!--rating system-->
                            
                            
                            
   
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    
                                    <span>${{  $product->price - (($product->discount/100) * $product->price ) }}</span>
                                    
                                </div>
                                <div class="product-price">
                                    <span class="old-price">${{  $product->price  }}</span>
                                    
                                </div>
                                {{-- <div class="add-cart">
                                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                </div> --}}
                            </div>
                            
                                <div class="product-card-bottom">
                                    <!--<div class="add-cart">-->
                                    <!--    <a class="view" href="/web/products/detailed/{{$product->id}}">View More</a>-->
                                    <!--</div> -->
                                    <div class="add-cart">
                                        <a class="add" href=" {{ url('/web/products/detailed/'.$product->id) }}  "><i class="fi-rs-shopping-cart mr-5"></i>View More</a>
                                    </div> 
                                    </div>
                        </div>
                    </div>
                </div>
                <!--end product card-->

                @endforeach
  
  
  
  
  
  
  
           
         @else
         
         
         
         <h4 class="text-center" >No discounts available at the moment</h4>
          
         @endif
          
          
          


        

               
            </div>
            <!--End product-grid-4-->
        </div>
    </div>








</div>







    
@endsection