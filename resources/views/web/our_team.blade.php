
@extends('web.web_master')


@section('content')
    
<style>
    .about_inner{
        background:white;
        margin-bottom:20px;
        
    }
    .bg{
        background-image: url("/public/about/background-image-copy-re.jpg");
        background-size: cover;
    }
    h1{
        padding-top:15px;
        padding-bottom:15px;
        color:#000000;
    }
    h2{
        padding-top:15px;
        padding-bottom:15px;
        color:#000000;
    }
    img {
        max-width: 100%;
        height: auto;
    }
    .inner_content{
        padding: 35px 35px;
    }
    .marge {
      padding-top: 100px;
    }
    #sticky > a{
        padding:10px 25px;
        font-size:16px;
        font-weight:600;
        color:#636363;
    }
</style>
<script src="https://use.fontawesome.com/783f6d1386.js"></script>
    <main class="main">
    
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> About <span></span> Our Team
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="container">
        <h1>Our Team</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="about_inner">
                        <!--<img src="/public/about/about-header.jpg">-->
                        <div class="inner_content">
                            <h2>Message from the Director</h2>
                            <div class="row">
                                <div class="col-md-4">
                                   <img src="/public/about/director.jpg"> 
                                </div>
                                <div class="col-md-8">
                                    <p style="color:black;font-size:17px"> "We strive to be one of the best spice Export brand in the world. We work hard to provide our
                                        customers with pure, healthy, and hygienic spice products. We will make every effort to provide
                                        our customers with a high level of satisfaction. We are committed to expanding our presence
                                        throughout the country and around the world, and we have entered the export market with the
                                        goal of creating a trademark of Ceylon spices that has been known for thousands of years. We
                                        intend to accomplish this feat by establishing a global exclusive chain of retail shops selling
                                        healthy and tasty spices. 
                                        </p>
                                    
                                    <p class="mb-30">We believe that we have a moral obligation to the entire society and humanity in terms of health
                                        and the environment. That is one of the reasons we do not engage in any unethical activities
                                        and instead achieve our goals through professional means.</p>
                                                                             <p class="mb-30">Our magnificent and genuine spices, some of which have been known and used in Sri Lanka for
                                        many centuries, are essential ingredients in many international cuisines and products. Spices,
                                        which are so important to millions of people, deserve the best treatment possible during
                                        production. So we source spices that are grown organically and then processed gently. We are
                                        confident that with our product's authenticity and purity, we will also win awards in international
                                        marketing." </p>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                <!--    <ul class="list-group sticky-top" id="sticky">-->
                <!--      <li class="list-group-item active">What is Everspicy?</li>-->
                <!--      <li class="list-group-item">Our History</li>-->
                <!--    </ul>-->
                <!--</div>-->
                
                <div class="list-group sticky-top" id="sticky">
                    <a href="{{ url('/about') }}" class="list-group-item list-group-item-action ">
                        <i class="fa fa-circle" aria-hidden="true"></i> &nbsp; What is Everspice?
                    </a>
                    <a href="{{ url('/our-history') }}" class="list-group-item list-group-item-action">
                        <i class="fa fa-circle" aria-hidden="true"></i> &nbsp; Our History
                    </a>
                
                    <a href="{{ url('/our-team') }}" class="list-group-item list-group-item-action active" style="color:white;background:black;border-color:black">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Our Team
                    </a>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
    <script>
    window.onscroll = function() {myFunction()};
    
    function myFunction() {
      if (document.documentElement.scrollTop > 150) {
        $("#sticky").addClass("marge")
      } else {
        $("#sticky").removeClass("marge")
      }
    }
    </script>

    </main>
    @endsection




    