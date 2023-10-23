
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
        padding: 25px 80px;
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
                <span></span> About <span></span> Our History
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="container">
        <h1>Our History</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="about_inner">
                        <img src="/public/about/history.jpg">
                        <div class="inner_content">
                            <!--<h2>Our History</h2>-->
                            <p style="color:black;font-size:17px">Everspice Ceylon(Pvt) Limited was founded in 2022 and began operations in Sri Lanka with
                            help of young creative minds. Today, the company employs a large number of partners
                            worldwide, including Malaysia, the United Arab Emirates, and many other countries.</p>
                            <p>We actively seek innovation in our product line, and it is a challenge that Everspice Ceylon is
                            eager to accept. We can tailor any of our products to our clients' needs and produce custom
                            spice blends to match a given recipe thanks to our in-house research and development lab and
                            team. 
                            </p>
                            
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
                    <a href="{{ url('/our-history') }}" class="list-group-item list-group-item-action active" style="color:white;background:black;border-color:black">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Our History
                    </a>
                    <a href="{{ url('/our-team') }}" class="list-group-item list-group-item-action">
                        <i class="fa fa-circle" aria-hidden="true"></i> &nbsp; Our Team
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




    