<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Everspice - Spice from ceylon</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="facebook-domain-verification" content="s0yycpb9ikhm9nsv0khso0rne39tcw" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/favicon.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slider-range.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=5.3') }}" />
    <script src="https://use.fontawesome.com/783f6d1386.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="google-site-verification" content="LZnFhn4mRffD1RCAjUS0jAiQ_dMS95bIDYEWz86j6S0" />
    
    
    
    
    
    
    
                              <!-- Facebook Pixel Code -->
                              

                              <script>
                              !function(f,b,e,v,n,t,s)

                              {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                              
                              n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                              
                              if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                              
                              n.queue=[];t=b.createElement(e);t.async=!0;
                              
                              t.src=v;s=b.getElementsByTagName(e)[0];
                              
                              s.parentNode.insertBefore(t,s)}(window,document,'script',
                              
                              'https://connect.facebook.net/en_US/fbevents.js');
                             
                              fbq('init', '1705977673099022');
                              
                              fbq('track', 'PageView');
                              
                              </script>
                              
                              <noscript>
                              
                              <img height="1" width="1"
                              

                              src="https://www.facebook.com/tr?id=1705977673099022&ev=PageView
                          
                              &noscript=1"/>
                            
                              </noscript>
                              

                              <!-- End Facebook Pixel Code -->
   
   
   
   
   
   
    
</head>

<body>
    
    
   
    
    
    
<style>
    #myTabContent{
        background:rgba(255,255,255,0.5)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
    }
</style>

    


    <!-- Quick view -->
   <!--i deleted slider in here 9.7-->
   
 
 
 
    
    <header class="header-area header-style-1 header-style-5 header-height-2">
        <!--<div class="mobile-promotion">-->
        <!--    <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>-->
        <!--</div>-->
      
        <div class="header-middle d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{route('home.main')}}"><img src="{{ asset('assets/imgs/theme/logo.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                    <div class="hotline d-none d-lg-flex">
                            <p> &nbsp;&nbsp; </p>
                        </div>
                        <div class="hotline d-none d-lg-flex">
                            <p> &nbsp;&nbsp; </p>
                        </div>
                        <div class="header-action-right">
                        
                        <div class="hotline d-none d-lg-flex" style="border-right:1px solid #000000; margin-right:20px; padding-right:40px;">
                        <img src="{{ asset('assets/imgs/theme/icons/1.png') }}" alt="hotline" />
                        <p> <a  href="tel:070 1600 007"  >  (+94) 701 600 007 </a>   <span>  <a class="text-dark" href="mailto:info@everspiceceylon.com">info@everspiceceylon.com</a>    </span></p>
                        
                        <!--<a href="https://www.w3schools.com">Visit W3Schools.com!</a>-->
                        
                    </div>
                    <div class="hotline d-none d-lg-flex" style="border-right:1px solid #000000; margin-right:20px; padding-right:40px;">
                        <img src="{{ asset('assets/imgs/theme/icons/2.png') }}" alt="hotline" />
                        <p style="color:#363636">Delivery Available<span style="color:#636363">Buy more and enjoy free delivery </span></p>
                    </div>
                            <div class="header-action-2">
                              

                                <div class="header-action-icon-2" style="border-right:1px solid #000000; margin-right:20px; padding-right:40px;">
                                 
                                    <?php
                                            $user = Auth::user();
                                            $logged = Auth::check();
                                            
                                            //dd( $user );
                                            
                                            
                                            
                                            // echo $logged;
                                        ?>
                                        
                                        @if(session()->has('auth_user_session_object')) 
                                         <a href="{{url("customer/account")}}"><span class="lable ml-10">
                                            <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Account
                                        </span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                           <li>
                                                <a href="{{ url("customer/account") }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                           
                                            <li>
                                               <a href="{{url("customer/logout")}}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                            </li>
                                        </ul>
                                    </div>
                                        @else
                                        
                                        
                                         <a href="{{url("customer/login/")}}"><span class="lable ml-10">
                                            <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Login/Sign up
                                        </span></a> 
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            
                                           <li>
                                                <a href="{{ url("customer/signup") }}"><i class="fi fi-rs-user mr-10"></i>Sign up</a>
                                            </li>
                                            
                                            
                                              <li>
                                                  <a href="{{ url("customer/login/") }}"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                        
                                              
                                            </li>
                                            
                                            
                                            
                                            
                                            
                                        </ul>
                                    </div>
                                        @endif
                                      
                                                                           
                                    

                                    
                                </div>

                                <div class="header-action-icon-2" style="border-right:1px solid #000000; margin-right:20px; padding-right:10px;">
                                 
                                    <a class="mini-cart-icon" >    
                                        <img alt="" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                        
                                        <span id="cart_count" class="pro-count blue"></span>
                                    </a>
                                    <div style="display:flex;justify-content:center;align-items: baseline;margin-left:5px">
                                        <a href="#"><span class="lable  ml-10"  style="margin-top:40px;" > $ </span></a>
                                        
                                        
                                        <span class="lable cart_price" id="cart_price" style="margin: 10px 0 0 22px;margin-left:0px!important" >  </span>    
                                    </div>
                                    
                                    
                                    <!--drop down-->
                                 
                                    <!--<div     class="  cart-dropdown-wrap   cart-dropdown-hm2   cart_popup">-->
                                    
                                    
                                    
                                    
                                    <div   
                                    
                                    
                                      @if(session()->has('new_item'))
                              
                              
                                      style="opacity: 1 !important;     visibility: visible !important ;   " 
                                      
   
                                      @else
                             
                          
   
                                      @endif
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     class="  cart-dropdown-wrap   cart-dropdown-hm2   cart_popup">
                                    
                                     <div style="text-align:right" class="row">
                                     <div class="col-md-12 bg-light  mb-2">
                           
                           
                                         @if(session()->has('new_item'))
                              
                              
                                                   <a href="{{ url("unset_popup")}}">Close</a>
                                      
   
                                      @else
                             
                          
   
                                      @endif
                                     
                        
                                      
                                      
                                      
                                      
                                      
                                      
                                     <!--<button type="button" href="{{url("/products")}}" class="btn btn-warning ">close</button>-->
                                     <!-- <a class="btn btn-warning   href="{{ url('/cart') }}" >close</a>-->
                                     
                                     
                                     @php 
                                     
                                     Illuminate\Support\Facades\Session::forget('new_item'); 
   
                                    @endphp
                                     
                                     
                                     </div>
                                      </div>
                                    
                                    
                                   
                                   
                                     <!--style="opacity: 1 !important;     visibility: visible !important ;   " -->
                                   
                                          <!--opacity: 0;-->
                                          <!-- visibility: hidden;-->
                                        <ul id="cart_popup">
                                            

                                    
                                        </ul>
                                        
                                        
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total  <span id="last_price"></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ url('/cart') }}" class="outline">View cart</a>
                                                
                                                
                                                   @if(session()->has('auth_user_session_object')) 
                    
                    <a href="{{ url("verfity_for_checkout")}}">Checkout</a>
                    @else
                    
                      <a href="{{ url("customer/login")}}">Checkout</a>
                    @endif
                                                
                                                
                                                

                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                     <!--drop down-->
                                    
                                    
                                    
                                </div>

                               
                     
                            
                            
                            
                            
                              @if(session()->has('new_item'))
                              
                          
   
                             @else
                             
                          
   
                             @endif
                              
                              
                              
                            <!--pop up message    -->    
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-lg-none">
                        <a href="{{route('home.main')}}"><img src="{{ asset('assets/imgs/theme/logo.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                           
                          
                            
                            
                            
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                                <ul>
                                   
                                    <li>
                                        <a class="active" href="{{route('home.main')}}">Home </a>
                                       
                                    </li>
                                    <li>
                                        <a href="{{route('home.about')}}">About <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/our-history') }}"> Company Overview </a></li>
                                            <li><a href="{{ url('/our-team') }}"> Our family</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ url('/products') }}">Our Products </a>
                                      
                                    </li>
                                  
                                   
                                    <li>

                                        <a  href="{{ url('/deals') }}">Deals</a>
                                   
                                    </li>
                                  
                                    <li>
                                        <a href="{{route('home.contact')}}">Contact us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                     <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-icon-2" style="border-right:1px solid #ffffff; margin-right:20px; padding-right:40px;">
                                  
                                   
                     </div>
                  
                    <div class="d-none d-lg-flex">
                    <div class="mobile-social-icon d-md-block mt-10" style="margin-bottom: -15px;margin-left: -70%;">
                    <a target="_blank" href=" https://www.facebook.com/Everspice-Ceylon-United-Arab-Emirates-108752518587193/ "><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>

                    <a target="_blank"  href=" https://instagram.com/everspiceceylon.uae "><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
          
                    <a target="_blank"  href="https://www.tiktok.com/@everspiceceylon"><img src="{{ asset('assets/imgs/theme/icons/tick.png') }}" alt="" /></a>
                    </div>
                    </div>

                    
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            
                         
                            
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ url('/cart') }}">
                                    <!--mobile cart-->
                                    <!--<img alt="" src="assets/imgs/theme/icons/icon-cart.svg" />-->
                                     <img alt="" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    
                                    
                                    <span class="pro-count white" id="cart_icon">0</span>
                                </a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{route('home.main')}}"><img src="{{ asset('assets/imgs/theme/logo.png') }}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            
            
            
            <!--mobile slider-->
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    
                 
                    
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        
                        
                        
                        <ul class="mobile-menu font-heading">
                            
                            
                            
                            <!--mobile login-->
                            
                                <li class="menu-item-has-children">
                                    
                                    
                                    
                                  @if(session()->has('auth_user_session_object'))     
                                    
                                    
                                <a >Account</a>
                                <ul class="dropdown">
                                            <li><a href="{{    url('customer/account')    }}">My Account</a></li>
                                            <li><a href="{{    url('customer/logout')     }}">Sign out</a></li>
                                </ul>
                                
                                
                                 @else
                                 
                                 
                                    <a >Login/Sign up</a>
                                <ul class="dropdown">
                                            <li><a href="{{     url('customer/signup') }}">Sign up</a></li>
                                            <li><a href="{{     url('customer/login/') }}">Login</a></li>
                                </ul>
                                   
                                   
                                   
                                 @endif
                                
                                
                                
                                
                                
                                
                                
                                
                                
                             
                            </li>
                              <!--mobile login-->
                         
                            
                            
                            <li class="menu-item-has-children">
                                <a href="{{route('home.main')}}">Home</a>
                               
                            </li>
                            
                            
                            
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.html">About</a>
                                <ul class="dropdown">
                                            <li><a href="{{ url('/our-history') }}"> Company Overview </a></li>
                                            <li><a href="{{ url('/our-team') }}"> Our family</a></li>
                                </ul>
                                
                             
                            </li>
                  
                            <li class="menu-item-has-children">
                                <a href="{{ url('/products') }}">Our Products</a>
                       
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/deals') }}"> Deals</a>
                          
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('home.contact')}}"> Contact us </a>
                       
                            </li>

                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                 
                    <div class="single-mobile-header-info">
                        <a  href="tel:070 1600 007"  ><i class="fi-rs-headphones"></i>(+94) 701 600 007 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    
                    <!--mobile social media-->
                    <h6 class="mb-15">Follow Us</h6>
                    
                 
                           <a target="_blank" href=" https://www.facebook.com/Everspice-Ceylon-United-Arab-Emirates-108752518587193/ " ><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>

                    <a target="_blank"  href=" https://instagram.com/everspiceceylon.uae " ><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>

                    <a target="_blank"  href="https://www.tiktok.com/@everspiceceylon"><img src="{{ asset('assets/imgs/theme/icons/tick.png') }}" alt="" /></a>
                    
                    
                    <!--mobile social media-->
                    
                    
                </div>
                
                
                 
                    
                    
                <div class="site-copyright">Copyright {{ date('Y')}} © Everspice. Developed by Satasme All rights reserved.</div>
            </div>
        </div>
    </div>
    <!--End header-->

  @yield('content')





  
  <footer class="main" style="background-image: url(/public/home/footer-copy.jpg);background-size: cover;">

 


    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col col-sm-12  col-lg-3 col-md-6">
                    <div class="widget-about font-md mb-md-9 mb-lg-9 mb-xl-0">
                  
                        <div class="logo mb-30">
                        <!--<p class="font-lg text-heading" style="color:#979d9d;">Sri Lanka is known for its abundance of exotic and lavish spices and herbs, that has been making every cuisine a regal gourmet experience worth cherishing.</p>-->
                            <a href="/" class="mb-15"><img src="{{ asset('assets/imgs/theme/logo footer copy (1).png') }}" alt="logo" /></a>
                           
                        </div>
                        
                        


                      
                    </div>
                </div>
              
                <div class="footer-link-widget col col-sm-12 col-xs-12 col-md-6 col-lg-2">
                  <a href="tel:070 1600 007"  >    <h5 class="widget-title"><i class="fa fa-phone" aria-hidden="true"></i> (+94) 70 160 007</h5></a>
                    <a>Menikpalahena,
                       Naimbala2,Thihagoda(81280)
                       Sri Lanka.</a>
                   
                </div>
               
               
                <div class="footer-link-widget col col-sm-12 col-xs-12 col-lg-4 col-md-6 ">
                    <h5 class="widget-title"><i class="fa fa-envelope" aria-hidden="true"></i><a  class="text-light" href="mailto:info@everspiceceylon.com">info@everspiceceylon.com </a> </h5>
                    <p>We are Accept</p>
                    <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}" alt="" />
                
                </div>
                    
                
                <div class="footer-link-widget col col-sm-12 col-xs-12  col-lg-2 col-md-6">
                    <!--<h4 class="widget-title">Contact Us</h4>-->
                    <div class="border-radius-15 overflow-hidden">
                        <div class="mobile-social-icon d-md-block mt-10">
                    
                    <a target="_blank" href=" https://www.facebook.com/Everspice-Ceylon-United-Arab-Emirates-108752518587193/ "><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>

                    <a target="_blank"  href=" https://instagram.com/everspiceceylon.uae "><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>

                    <a target="_blank"  href="https://www.tiktok.com/@everspiceceylon"><img src="{{ asset('assets/imgs/theme/icons/tick.png') }}" alt="" /></a>

                    
                    
                    
             
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                
              </div>
          
                </div>
            
            </div>
        </div>
    </section>
    
    <div class="container pb-10">
        <div class="row align-items-center">
            <div class="col-12 mb-10">
                <div class="footer-bottom"></div>
            </div>
            <!--<div class="col-xl-4 col-lg-9 col-md-6">-->
               <!-- <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Nest</strong> - HTML Ecommerce Template <br />All rights reserved</p>-->
            <!--</div>-->
            <div class="col-xl-12 col-lg-6 text-center d-none d-xl-block">
               <ul class="footer-list mb-sm-12 mb-md-0" style="display:flex;align-items: baseline;justify-content: space-evenly;">
                        <li><a href="{{route('quciklinks.privacypolicy')}}"> Privacy Policy </a></li>
                       <li><a href="{{route('quciklinks.terms')}}">Terms and Conditons  </a></li>
                        <li><a href="{{route('quciklinks.returnpolicy')}}"> Return Policy </a></li>
                       <li><a href="{{route('quciklinks.evfoodpolicy')}}"> Everspice Food Policy </a></li>
                       
                        <!--<li><a href=" route('quciklinks.privacyStatement' )">Privacy Statement</a></li>-->
                        
                     <li><p>Copyright © 2022 - everspicecylon | Designed by<span ><a target="_blank" href="https://satasme.lk/"> SATASME </a>  </span>  </p> </li>
                    </ul>
            </div>
           
            <div class="col-xl-4 col-lg-3 col-md-6  text-end d-none d-md-block">

            </div>
        </div>
    </div>
</footer>


<!-- Preloader Start -->
<!--<div id="preloader-active">-->
<!--    <div class="preloader d-flex align-items-center justify-content-center">-->
<!--        <div class="preloader-inner position-relative">-->
<!--            <div class="text-center">-->
<!--                <img src="{{ asset('assets/imgs/theme/loading.gif') }}" alt="" />-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "e894da054fc321492c55e8f62566df0ab436b78866420d84e1dadaed7e17d3bb2252c3a4eef0e73c52dc50476a176908", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>


<!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slider-range.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('./assets/js/main.js?v=5.3') }}"></script>
<script src="{{ asset('./assets/js/shop.js?v=5.3') }}"></script>
{{-- start script for display count of the cart --}}





<script>


$(document).ready(function(){


$('img').lazyload();


});







 var cart_count = document.getElementById('cart_count');
 var total = document.getElementById('cart_price');
 
  
  var last_price = document.getElementById('last_price');
  var cart_popup = document.getElementById('cart_popup');
  
  

  
  var _html5 = '';
  var _html6 = '';
  var _cart = '';
   
   $.ajax({
   
          
   url: "{{url('cart_json')}}", //this is your uri
   type: 'get', //this is your method
   success: function (data) {
    //  console.log(data);

        var pro = JSON.parse(data);
      
      
        var count = pro.original.count;
        
 
        
      
        
        
        var cart_total = pro.original.total;
        
        if(count>0){
            
            //   console.log(" not empty");
                    $('.cart_popup').show();
            
            
        }
        else{
              
              $('.cart_popup').hide();
              
            //   console.log("empty");
            
        }
        
        
        
        for (var i in pro.original.items) {
              
              
             _cart+=                         '<li>'+
                                            '<div class="shopping-cart-img">'+
                                             '<a href="#"> <img src="{{ asset('/product_images/')}}/' +pro.original.items[i].weight+'.jpg'+ '" alt=""  /></a>'+
                                            '</div>'+
                                            '<div class="shopping-cart-title">'+
                                            '<h4><a href="#">'+pro.original.items[i].name+'</a></h4>'+
                                            '<h4><span>'+pro.original.items[i].qty+' × </span>$'+pro.original.items[i].price+'</h4>'+
                                            '</div>'+
                                            '<div class="shopping-cart-delete">'+
                                            '<a  onclick="delete_cart_item('+pro.original.items[i].uid+')" ><i class="fi-rs-cross-small"></i></a>'+
                                            
                                            
             
                                            
                                            
                                            '</div>'+
                                            '</li>';
              
              
              
          }
          
          

        
    
        
        
        
        
        
        
        
        
        
        // var last_price = pro.original.total;
       
         _html5+=count;
         _html6+=cart_total;
    //   _total+=last_price;
       
        // console.log(_cart);
      
   
       cart_count.innerHTML = _html5;
       cart_price.innerHTML = _html6;
       last_price.innerHTML = '$'+_html6;
       
       cart_popup.innerHTML = _cart;
       
       $('#cart_icon').html(_html5)
   }
   
   
   
   


   // h4.innerHTML = _html3;
   
   
   });
   
    function delete_cart_item(uid){
        
        var delete_uid = uid;
        // console.log(delete_uid);
      

             $.ajax({
             url:"{{ url('cart_json_delete') }}"+"/"+delete_uid,
             dataType:'json',

            success:function(res){
                // console.log("res : "+res);
                location.reload();
            }
            });



   
   
    }
    
    
    
    
    
    
    
   
   </script>





<script> if (window.performance) { var navEntries = window.performance.getEntriesByType('navigation'); if (navEntries.length > 0 && navEntries[0].type === 'back_forward') { console.log('As per API lv2, this page is load from back/forward'); } else if (window.performance.navigation && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) { console.log('As per API lv1, this page is load from back/forward'); } else { console.log('This is normal page load'); @if (Session::has('sweet_alert.alert')) swal( {!! Session::get('sweet_alert.alert') !!} ); {{ Session::forget('sweet_alert.alert') }} // This will forget the alert data after displaying it :) @endif } } else { console.log("Unfortunately, your browser doesn't support this API"); } </script>

<!--lazyload-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--lazyload-->





@include('sweetalert::alert')

{{-- end script for display count of the cart --}}
</body>

</html>

















