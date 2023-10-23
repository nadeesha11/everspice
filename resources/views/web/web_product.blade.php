@extends('web.web_master')

@section('content')
<style>
    
    .text{
           overflow: hidden;
           text-overflow: ellipsis;
           display: -webkit-box;
           -webkit-line-clamp: 2; /* number of lines to show */
                   line-clamp: 2; 
           -webkit-box-orient: vertical;
    }
</style>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Products
            </div>
        </div>
    </div>
<div class="bg" style="padding: 4rem!important;">



    <h1>Our Products  </h1>
   
    <br>
 
      
      
  
    
    
    
    

   

    
  
         
            
      
    
    
            
            <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#All">All Products</a>
                            </li>
                            
                            @if(!empty($product_subs))
                                @foreach($product_subs as $subs)
                             <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#{{$subs->Cat_name}}">{{$subs->Cat_name}}</a>
                            </li> 
                                @endforeach
                            @endif
                            <!-- <li class="nav-item">-->
                            <!--    <a class="nav-link" id="Benifits-tab" data-bs-toggle="tab" href="#Ginger">Ginger</a>-->
                            <!--</li>-->
                            
                            
                        </ul>
                        <?php
                            
                        ?>
        
        <div class="tab-content" id="myTabContent">
            
            <!--all tab-->
            <div class="tab-pane fade show active" id="All" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($product_data as $product)
                        @if ($product->discount > 0)
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
                                    
                                        <p>{{ $product->Cat_name  }}</p>
                                    </div>
                                    <h2><a href=" {{ url('/web/products/detailed/'.$product->id) }}  ">{{ $product->product_name }}</a></h2>
                                    
                                 
                                    
                                    
                                  
                                     
                                     
                                     
                                    
                                    
                                    <div class="text"><p>{!! $product->description !!}</p></div>
                                    
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
                                         
                                            
                                            <div class="add-cart">
                                                <a class="add" href=" {{ url('/web/products/detailed/'.$product->id) }}  "><i class="fi-rs-shopping-cart mr-5"></i>View More</a>
                                            </div> 
                                            </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                        @else
                         <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        
                                            <img class="default-img" src="{{ asset('product_images/'.$product->product_main_img) }}" alt="" />
                                            {{-- <img class="hover-img" src="{{ asset('product_images/1657514985991.jpg') }}" alt="" /> --}}
                                        
                                    </div>
                                   
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        {{-- <a href="shop-grid-right.html">Meats</a> --}}
                                        <p>{{ $product->Cat_name  }}</p>
                                    </div>
                                    <h2><a href=" {{ url('/web/products/detailed/'.$product->id) }}  ">{{ $product->product_name }}</a></h2>
                                    
                                    
                                   
                                    
                                    
                                    <div class="text"><p>{!! $product->description !!}</p></div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{ $product->price }}</span>
                                            
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
                        @endif
                    @endforeach
                </div>
            </div>
            <!--end of all tab-->
            
            
            
            <!--Single tabs-->
            @if(!empty($product_subs))
            @foreach($product_subs as $sub)
            <div class="tab-pane fade" id="{{$sub->Cat_name}}" role="tabpanel" aria-labelledby="tab-{{$sub->Cat_name}}">
                <div class="row product-grid-4">
                    @foreach ($product_data as $product)
                    
                    @if($product->cat_id == $sub->id)
                    
                        @if ($product->discount > 0)
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
                                    
                                    
                                    
                                  
                                     
                                     
                                     
                                     
                                    
                                    
                                    <div class="text"><p>{!! $product->description !!}</p></div>
                                    
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{  $product->price - (($product->discount/100) * $product->price ) }}</span>
                                            
                                        </div>
                                        <div class="product-price">
                                            <span class="old-price">${{  $product->price  }}</span>
                                            
                                        </div>
                                    
                                    </div>
                                    
                                           <div class="product-card-bottom">
                                          
                                            
                                            <div class="add-cart">
                                                <a class="add" href=" {{ url('/web/products/detailed/'.$product->id) }}  "><i class="fi-rs-shopping-cart mr-5"></i>View More</a>
                                            </div> 
                                            </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                        @else
                         <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        
                                            <img class="default-img" src="{{ asset('product_images/'.$product->product_main_img) }}" alt="" />
                                            {{-- <img class="hover-img" src="{{ asset('product_images/1657514985991.jpg') }}" alt="" /> --}}
                                        
                                    </div>
                                   
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        {{-- <a href="shop-grid-right.html">Meats</a> --}}
                                        <p>{{ $product->Cat_name  }}</p>
                                    </div>
                                    <h2><a href=" {{ url('/web/products/detailed/'.$product->id) }}  ">{{ $product->product_name }}</a></h2>
                                    
                                    
                                  
                                    
                                    
                                    <div class="text"><p>{!! $product->description !!}</p></div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>${{ $product->price }}</span>
                                            
                                        </div>
                                     
                                        
                                         
                                        
                                        
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
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <!--end of single tabs-->
            @endforeach
            @endif
                            
                            
            
            
        </div>
        </div>

        
     </div>

    </div>
@endsection


















