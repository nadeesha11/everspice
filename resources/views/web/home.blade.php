
@extends('web.web_master')


@section('content')
<style>
    .shadow2{
        text-shadow: 0px 1px 20px #000;
    }
    .text{
           overflow: hidden;
           text-overflow: ellipsis;
           display: -webkit-box;
           -webkit-line-clamp: 2; /* number of lines to show */
                   line-clamp: 2; 
           -webkit-box-orient: vertical;
    }
    
</style>    

    <link rel="stylesheet" href="{{ asset('assets/css/carousel-style.css') }}" />
    <script src="https://use.fontawesome.com/783f6d1386.js"></script>
    
    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="home-slide-cover">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    
                    <div class="single-hero-slider rectangle single-animation-wrap" style="background-image: url(assets/imgs/slider/first_1.jpg)">
                        <!--<div class="slider-content" style="text-align:left">-->
                        <!--    <h1 class="mt-160 font-weight-bold text-white shadow2">-->
                        <!--        Our cinnamon Tea Reduces Belly Fat and Heal Gastritis!-->
                        <!--    </h1>-->
                        <!--    <p class="mt-10 text-muted shadow2">Nun bulging stomach with proper abdominal shape</p>-->
                         
                        <!--</div>-->
                    </div>
                    
                    <div class="single-hero-slider rectangle single-animation-wrap" style="background-image: url(assets/imgs/slider/second_1.jpg)">
                        <!--<div class="slider-content" style="margin-left: -150px!important;">-->
                        <!--    <h2 class="mt-70 font-weight-bold text-white shadow2">-->
                        <!--        It's a fair call to say your life's incomplete if you still haven't tried the sensational Ceylon Cinnamon Black tea and drawn out the deepest, best flavour! -->
                        <!--    </h2>-->
                           
                        <!--</div>-->
                    </div>
                    
                       <div class="single-hero-slider rectangle single-animation-wrap" style="background-image: url(assets/imgs/slider/third_1.jpg)">
                        <!--<div class="slider-content" style="margin-left: -150px!important;">-->
                        <!--    <h2 class="mt-70 font-weight-bold text-white shadow2">-->
                        <!--        It's a fair call to say your life's incomplete if you still haven't tried the sensational Ceylon Cinnamon Black tea and drawn out the deepest, best flavour! -->
                        <!--    </h2>-->
                          
                        <!--</div>-->
                    </div>
                    
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </section>
        <!--End hero-->

  <!--End category slider-->
  <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img home-spice-card wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="assets/imgs/banner/Quality-product-1.jpg" alt="" />
                         
                            <div class="banner-text">
                               <!-- <h4>
                                    Turmeric <br /> Powder <br />
                                    
                                </h4>-->
                                <!--<a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img home-spice-card wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="assets/imgs/banner/Quality-product-2.jpg" alt="" />
                            <div class="banner-text">
                               <!-- <h4>
                                    Curry<br />
                                    Powder
                                </h4>-->
                                <!--<a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img home-spice-card mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="assets/imgs/banner/Quality-product-3.jpg" alt="" />
                            <div class="banner-text">
                                <!--<h4>Chilli <br /> Powder </h4>-->
                                <!--<a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
       





        <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/zero.png') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Zero Sugar</h3> 
                            <!--<p>10+ Products <br> Only 3 with sugar </p>   -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/natural.png') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">100% Natural</h3>
                            <!--<p> Just pure flavour </p>-->
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/gulten.png') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Gluten free</h3>
                           <!--<p> No flour, emulsifiers </p>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/vrgan.png') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Vegan & Paleo</h3>
                            <!--<p> Vegan or veggie? <br> We got you covered </p>-->
                        </div>
                    </div>
                </div>
                                
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/slim.png') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Slimmers & Gymmers</h3>
                            <!--<p> Vegan or veggie? <br> We got you covered </p>-->
                        </div>
                    </div>
                </div>
                
                
           
            </div>
        </div>
    </section>


  <section class="bg-grey-1 section-padding  pb-80 mb-80">
    <div class="container">
         <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="row align-items-center ">
                            
                            <div class="col-lg-6">
                                <div class="pl-25">
                                <h5 class="mb-5 text-brand">MODERN LIFESTYLE WITH NATURE'S WAY  </h5>
                                    <h2 class="mb-30">Welcome to Everspice ceylon</h2>
                                    <p class="mb-25"> Sri Lanka is known for its abundance of exotic and lavish spices and herbs, that has been making every cuisine a regal gourmet experience worth cherishing. Here at ‘Everspice Ceylon’ we bring you that sophisticated Ceylonese bliss with every dash of our spices, saturated with the rich and ambrosial essence of pure Ceylon spirit. </p>
                                  
                                    <a href="{{route('home.about')}}" class="btn btn-more-info-round-outlined "> View More </a> &nbsp; <a href="{{url('/products')}}" class="btn btn-more-info-round-outlined"> Buy now </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="assets/imgs/page/png-re.png" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                            </div>
                        </section>
                    </div>
        </div>
 </div>
</section>


        <section class="bg-grey-1 section-padding pt-40 pb-40 bg">
            <div class="container">
                <h1 class="mb-80 text-center">Latest Products </h1>
                <!--<div class="row product-grid" style="padding: 20px;">-->
                  <!--remove product-grid class  -->
                    
                     <div class="row" style="padding: 20px;">  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--this is where i put old products -->
                    
                    
                    
                    @foreach( $product_detailed as $product)
                    
                   
                    
                    
                    
                 
                    
                      <div class="row  mt-30">
                      <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                           
                                
                          
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src=" {{ asset('product_images/'.$product->product_main_img) }}" alt="product image" />
                                </figure>
                             
                              
                            </div>
                            <!-- THUMBNAILS -->
                       
                       
                       
                       
                       
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            {{-- <span class="stock-status out-stock"> Sale Off </span> --}}
                            <h2 class="title-detail">  {{ $product->product_name }}</h2>
                            <div class="product-detail-rating">
                                {{-- <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                 
                                </div> --}}
                            </div>

                         
                       
                       @if ($product->discount > 0)

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                   
                                    <span class="current-price text-brand">${{ $product->price - (($product->discount/100) * $product->price ) }}</span>

                                    <span class="old-price  text-brand"> {{ $product->price }}</span>
                                  
                                
                                </div>
                            </div>

                            @else

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                               
                                    <span class="current-price text-brand">${{ $product->price }}</span>
                                    
                                 
                                </div>
                            </div>


                                
                            @endif


                        

                          




                             <div class="short-desc mb-30">
                                
                                <div class="custom_p">
                                    
                             
                                <p      class="font-lg" >{!! $product->description !!}</p>
                                   </div>
                                
                            </div> 
                            
                            
                           
                             <a class="add p-3 " style="background-color: #111111;  color:#FFFFFF ;  margin-bottom: 100px  !important;   border-radius: 5px;"   onMouseOver="this.style.color='#FFFFFF'"  href=" {{ url('/web/products/detailed/'.$product->id) }}  "><i class="fi-rs-shopping-cart mr-5"></i>View More</a>
                            


                                <div class="detail-extralink mb-10 mt-50">
    
                                    
                                  
                                      
                                      
                                <form action="{{ url('add/to/cart') }}" method="post">
                                    
                                    
                                    <div class-="row">  
                                    
                                   
                                    
                                    <div class="col-6 ">
                                    
                                    @csrf
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    
                                    <input type="number" name="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                
                                    <input type="hidden" name="product_id" value="{{  $product->id }}" >
                                    <input type="hidden" name="discount" value="{{  $product->discount }}" >
                                   

                               
                                      
                            
                        
                               
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" onclick="check_add_to_cart()" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart </button>
                                    
                                     </div>
                                    
                                   
                                    
                                    <div class="col-6"> </div>
                                    
                                    
                                    </div>
                                    
                                      </form>
                                      
                                   

 
   
                                   
                              

                                            
                                            
                       
                                     <div class="p-10">
                                         
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
                                        <span class=" ml-5 ">(@php   echo round($rating/$count,1);  @endphp)</span>
                                        </div> 
                          
                               
                            </div>
                                </div>
                              <!--</form>-->
                              
                              
                            </div>
                      
                        </div>
                     
                    </div>
                </div>
               
                   <hr/>
                   
                   
                   @endforeach
                    <!--this is where i put old products -->
                    
                    
                        
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                   
                </div>
              
            </div>
        </section>

      

        <section class="bg-grey-1 section-padding pt-100 pb-40 delivery-details mt-10">
            <div class="container pr-50 pl-50">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-5"><img class="delivery-img" src="{{ asset('home/lorry.png') }}" alt="" /> </div>
                            <div class="col-7">
                                <h2 class="text-white">Delivery Available </h2>
                                <h6 class="text-white" style="opacity:0.9">We Guaranteed within 48 hours Delivery - 10 AED Only anywhere in United Arab Emirates </h6>
                            </div>
                        </div>
                         
                    </div>
                    <div class="col-md-6 mt-3">
                        <h6 class="text-white">Buy your favorite functional spices and cinnamon tea online exclusively from us and experience the excellence of online shopping with special discounts and most secure free deliveries to your doorsteps.</h6>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <a href="/products" class="btn btn-more-info-round-outlined text-white bg-dark mt-2">Shop Online &nbsp; &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>                            
                        </center>

                    </div>
                </div>
            </div>
            
        </section>
        
        <section class="bg-grey-1 section-padding mb-20">
            <div class="container">
                <center>
                    <h1 class="mb-5 p-5"> What Our Clients say</h1>
                </center>
                <section id="testim" class="testim" style="margin-top: 250px;">
         <div class="testim-cover" style="margin-bottom: -200px;">
            <div class="wrap">

                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                <ul id="testim-dots" class="dots">
                    <li class="dot active"></li>
                    <li class="dot"></li>
                    
                    <li class="dot"></li>
                      <li class="dot"></li>
                      
                        <li class="dot"></li>
                      <li class="dot"></li>
                        <li class="dot"></li>
                      <li class="dot"></li>
                  
                </ul>
                <div id="testim-content" class="cont">
                    
                    
                    
                    
                    <div class="active">
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/1 (2).jpg') }}" alt=""></div>
                        <h2>Abbas Ali</h2>
                        <p> نفس اللي ف البقالة توصيل سريع مغلف ف كرتون</p>                    
                    </div>



                    <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/2 (2).jpg') }}" alt=""></div>
                        <h2>Abdul Malik</h2>
                       <p> ممتاز من أفضل الشاي</p>
                    </div>
                    
                    
                    <div>
                        <div class="img"><img src=" {{ asset('assets/imgs/theme/icons/3 (2).jpg') }} " alt=""></div>
                        <h2>Philippe Polleux</h2>
                       <p> Un té de carácter muy fuerte y especiado. Si te gusta la canela, te encantará este te. Recomiendo tomarlo siempre sin azúcar</p>
                    </div>



                          <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/4.png') }}" alt=""></div>
                        <h2>Luciano Paulo</h2>
                     <p>Yes, the tea is pricey but worth it if you love cinnamon and spice. Like Christmas in a tea cup. Will buy again.It came on time, perfectly packed and, above all, with a great taste as usually !!!</p>
                    </div>
                    
                            <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/6.jpg') }}" alt=""></div>
                        <h2>Naveen Adeesha</h2>
                      <p>A legendary tea!
                    Honestly obsessed with this tea. Great little caffeine boost in the middle of the afternoon if you still want to sleep at night and don't want a cup of coffee. Kind of sweet in taste but really good with honey or rock sugar. Best when brewed for 3 minutes at 175 degrees F. Best paired with a buttery type of treat like shortbread or a croissant.
                   </p>
                    </div>
                    
                    
                            <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/7 (2).jpg') }}" alt=""></div>
                        <h2>Mohomad Farzan</h2>
                        <p>This is the strongest flavoured Ceylon black tea I have ever had. It is delicious. It is a little more expensive than most black teas but well worth the extra money. I ordered more and going to try another one.</p>
                    </div>
                    
                            <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/8 (2).png') }}" alt=""></div>
                        <h2>Jaafar Tabina</h2>
                        <p>My order has arrived as promised. I like trying something new and not mainstream brands. I was surprised by this brand: excellent quality, fantastic aroma. My family is in love with the rich taste of berries.Really refreshing and you can taste the quality. Much better than the teas in the supermarket. Have given some to colleagues in work and they keep asking for more</p>
                    </div>
                    
                    
                            <div>
                        <div class="img"><img src="{{ asset('assets/imgs/theme/icons/9 (2).jpg') }}" alt=""></div>
                        <h2>Daarina Qabihah</h2>
                        <P>Shipping to sabah is very secure! I'm surprised the packaging doesn't even have any dents! Love this tea . Have tried other Masala teas but this has the best balance of Masala
                    Thanks selller!!!! Definitely recommended!!!!!!!
                     </P>
                    </div>

               
                      




                </div>
                

            </div>
         </div>
    </section>
                
            </div>
            
        </section>
      
        <!--End 4 columns-->
    </main>
    <script>
    




//   meta for check visitors
fbq('track', 'ViewContent');




    
    
    
    
    
    

// meta check for facebook
 function  check_add_to_cart(){
       
   fbq('track', 'AddToCart');


    
   }
 
    
    
    
    
    
    
        var	testim = document.getElementById("testim"),
		testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
		touchStartPos,
		touchEndPos,
		touchPosDiff,
		ignoreTouch = 30;
;

window.onload = function() {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length-1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");            
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;
    
        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })    

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;
                
            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })
		
		testim.addEventListener("touchstart", function(e) {
				touchStartPos = e.changedTouches[0].clientX;
		})
	
		testim.addEventListener("touchend", function(e) {
				touchEndPos = e.changedTouches[0].clientX;
			
				touchPosDiff = touchStartPos - touchEndPos;
			
				console.log(touchPosDiff);
				console.log(touchStartPos);	
				console.log(touchEndPos);	

			
				if (touchPosDiff > 0 + ignoreTouch) {
						testimLeftArrow.click();
				} else if (touchPosDiff < 0 - ignoreTouch) {
						testimRightArrow.click();
				} else {
					return;
				}
			
		})
}







    </script>
    
    
    
    
    
    @endsection




    