@extends('web.web_master')

@section('content')
<script src="https://use.fontawesome.com/783f6d1386.js"></script>
<style>
    p{
            color: #000!important;
            font-size:18px;
    }
</style>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                
                
                
                
                
                
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5  ">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            @foreach ($product_images as $image)
                                
                           {{-- <h1>this is for testing purpose</h1> --}}
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$image->product_main_img) }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$image->product_sub_img1) }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$image->product_sub_img2) }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$image->product_sub_img3) }}" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$image->product_sub_img4) }}" alt="product image" />
                                </figure>
                              
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                      
                                <div><img src="{{ asset('product_images/'.$image->product_main_img) }}" alt="product image" /></div>
                                <div><img src="{{ asset('product_images/'.$image->product_sub_img1) }}" alt="product image" /></div>
                                <div><img src="{{ asset('product_images/'.$image->product_sub_img2) }}" alt="product image" /></div>
                                <div><img src="{{ asset('product_images/'.$image->product_sub_img3) }}" alt="product image" /></div>
                                <div><img src="{{ asset('product_images/'.$image->product_sub_img4) }}" alt="product image" /></div>
                            </div>
                            @endforeach
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 " >
                        <div class="detail-info pr-30 pl-30">
                            {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                            <h2 class="title-detail">{{ $product_detailed[0]->product_name }}</h2>
                            <div class="product-detail-rating">
                                {{-- <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                 
                                </div> --}}
                            </div>

                         
                            @if ($product_detailed[0]->discount > 0)

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                   
                                    <span class="current-price text-brand">${{ $product_detailed[0]->price - (($product_detailed[0]->discount/100) * $product_detailed[0]->price ) }}</span>

                                    <span class="old-price text-muted text-brand">${{  $product_detailed[0]->price  }}</span>
                                  
                                </div>
                            </div>

                            @else

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                  
                                    <span class="current-price text-brand">${{ $product_detailed[0]->price }}</span>
                                    
                            
                                </div>
                            </div>


                                
                            @endif

                          




                             <div class="short-desc mb-30">
                                <p class="font-lg" style="font-size:20px">{!! $product_detailed[0]->description !!}</p>
                            </div> 
                        
                            <div class="detail-extralink mb-50  ">
                                <form action="{{ url('add/to/cart') }}" method="post">
                                    @csrf
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    
                                    <input type="number" name="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                               
                                    <input type="hidden" name="product_id" value="{{  $product_detailed[0]->id }}" >
                                    <input type="hidden" name="discount" value="{{  $product_detailed[0]->discount }}" >
                                   

                                
                                      
                            
                        
                               
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit"  onclick="check_add_to_cart2()" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart </button>
                              
                                     <div class="p-40">
                                <!--<h4 class="mb-10">Apply Coupon</h4>-->
                                <!--<p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>-->
                                
                                <!--    <div class="d-flex justify-content-between">-->
                                <!--        <input class="font-medium mr-15 coupon" name="coupon" placeholder="Enter Your Coupon">-->
                                <!--        <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>-->
                                <!--    </div>-->
                               
                            </div>
                                </div>
                              </form>
                            </div>
                            <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    <li class="mb-5">Category: <span class="text-brand">{{ $product_detailed[0]->Cat_name }}</span></li>
                                    <li class="mb-5">Sub category:<span class="text-brand">{{ $product_detailed[0]->sub_name }}</span></li>
                               
                                </ul>
                                
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                            </li> 
                             <li class="nav-item">
                                <a class="nav-link" id="Benifits-tab" data-bs-toggle="tab" href="#Benifits">Benefits</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{count($product_reviews)}})</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            
                            <div class="tab-pane fade show active" id="Description">
                                <div class="">
                                    <p>{!! $product_detailed[0]->description !!}</p>
                                </div>
                            </div>
                            
                            
                            <div class="tab-pane fade show" id="Additional-info">
                                <div class="">
                                    <p>{!! $product_detailed[0]->description1 !!}</p>
                                </div>
                            </div>
                            
                            
                            <div class="tab-pane fade show" id="Benifits">
                                <div class="">
                                    <p>{!! $product_detailed[0]->description2 !!}</p>
                                </div>
                            </div>
                            
                            {{-- <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                            {{-- <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30">
                                    <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                    <div class="vendor-name ml-15">
                                        <h6>
                                            <a href="vendor-details-2.html">Noodles Co.</a>
                                        </h6>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                </ul>
                                <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">92%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div>
                                <p>Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                            </div> --}}
                            <div class="tab-pane fade" id="Reviews">
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                
                                                @foreach($product_reviews as $product_review)
                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-2.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">{{$product_review->name}}</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">{{$product_review->created_at}} &nbsp;</span>
                                                                </div>
                                                                <div class="product_rate d-inline-block">
                                                                    <div class="product_rating" style="width: 100%">
                                                                        
                                                                       
                                                                        <?php
                                                                            $star = $product_review->rating;
                                                                            // echo $star
                                                                        ?>
                                                                        @for($i=1;$i<=5;$i++)
                                                                            @if($i<=$star)
                                                                                <i class="fa fa-star" aria-hidden="true" style="color:#F7A531"></i>
                                                                                @else
                                                                                <i class="fa fa-star-o" aria-hidden="true" style="color:#F7A531"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10"> {{$product_review->comment}} 
                                                            <!--<a href="#" class="reply">Reply</a>-->
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                               
                                             
                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="width:33%">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class=" d-inline-block ">
                                                    <div  style="width:100%">
                                                         <?php
                                                                            $star = round($avg_rating,0);
                                                                            // echo $star
                                                                        ?>
                                                                        @for($i=1;$i<=5;$i++)
                                                                            @if($i<=$star)
                                                                                <i class="fa fa-star" aria-hidden="true" style="color:#F7A531"></i>
                                                                                @else
                                                                                <i class="fa fa-star-o" aria-hidden="true" style="color:#F7A531"></i>
                                                                            @endif
                                                                        @endfor
                                                        
                                                    </div>
                                                </div>
                                                <h6>{{$avg_rating}} out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{$star5ratingpercentage}}%" aria-valuenow="{{$star5ratingpercentage}}" aria-valuemin="0" aria-valuemax="100">{{$star5ratingpercentage}}%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{$star4ratingpercentage}}%" aria-valuenow="{{$star4ratingpercentage}}" aria-valuemin="0" aria-valuemax="100">{{$star4ratingpercentage}}%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{$star3ratingpercentage}}%" aria-valuenow="{{$star3ratingpercentage}}" aria-valuemin="0" aria-valuemax="100">{{$star3ratingpercentage}}%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{$star2ratingpercentage}}%" aria-valuenow="{{$star2ratingpercentage}}" aria-valuemin="0" aria-valuemax="100">{{$star2ratingpercentage}}%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: {{$star1ratingpercentage}}%" aria-valuenow="{{$star1ratingpercentage}}" aria-valuemin="0" aria-valuemax="100">{{$star1ratingpercentage}}%</div>
                                            </div>
                                            <!--<a href="#" class="font-xs text-muted">How are ratings calculated?</a>-->
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <!--<div class="product-rate d-inline-block mb-30"></div>-->
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="{{url('web/products/detailed/addreview/')}}" method="POST" id="commentForm" enctype="multipart/form-data" >
                                              @csrf
               
 				@if($message = Session::get('success'))
 				<div class="alert alert-success">
 					<strong>{{$message}}</strong>
 				</div>
 				@endif
 				
                                               
                    @if(count($errors) > 0 )
 					@foreach($errors->all() as $error)
 					<p class="alert alert-danger">{{$error}}</p>
 					@endforeach
 					@endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="prod_id" value="{{$prod_id}}" />
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="user_email" id="email" type="email" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                      <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="rating" id="rating" type="number" max="5" min="1" placeholder="Rating" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>
</div>
</div>
</div>


<script>   
// meta check for facebook
 function  check_add_to_cart2(){
       
   fbq('track', 'AddToCart');



    
   }

</script>


    
@endsection




























