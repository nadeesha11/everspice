
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
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> About
            </div>
        </div>
    </div>
    <div class="bg">
        <div class="container">
        <h1>About Everspice</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="about_inner">
                        <img src="/public/about/about-everspice-re.jpg">
                        <div class="inner_content">
                            <h2>What is Everspice?</h2>
                            <p>Sri Lanka is known for its abundance of exotic and lavish spices and herbs, that has been
                                making every cuisine a regal gourmet experience worth cherishing. Here at ‘Everspice Ceylon’
                                we bring you that sophisticated Ceylonese bliss with every dash of our spices, saturated with
                                the rich and ambrosial essence of pure Ceylon spirit. 
                                </p>
                            
                            <h2>Our Vision</h2>
                            <p>To be the leading brand in Sri Lanka for ready-to-eat ethnic food preparations, spices, and spice
                                blends.</p>
                                <p>As an export brand based in Sri Lanka, we incorporate fresh, organic raw materials of the best
                                quality, straight from the bountiful spice cultivations of Sri Lanka in our products and we aim to
                                reinforce the export economy of the country as well as strengthen the small-scale farmer
                                community built around the spice and herb industry in Sri Lanka.
                                </p>
                            
                            <h2>Our Mission</h2>
                            <p>To Produce delicious, clean, unadulterated, high-quality products through the use of consistent,
                                professional, and hygienic practices, as well as the positive participation of a motivated,
                                committed, and happy workforce. </p>
                            <p>Our brand brings you a line of pure spices ensured with grandeur quality and strong flavors,
                                garden fresh and free from artificial preserves or additives. They will add a pleasurable relish
                                and authentic aesthetic to your cuisine, making your everyday cookery a proper culinary
                                experience and your dining a profound affair to you and your loved ones. </p>
                                <p>Our own interpretation of Ceylonese spice experience, the product line fused with spices and
                                herbs will bring an unforgettable and unique twist to your taste buds, a heavenly new exploit
                                with an absolutely astonishing explosion of flavors. 
                                </p>
                            <h2>Our Brand Values</h2>
                            <p>Our products, 100% natural and eco-friendly, are made with the best interest of the customer in
                                mind, each product delicately crafted and packed, to bring you the best experience from the
                                purchase to every mouthful of a dish and each sip of beverage with ‘Everspice Ceylon’ as their
                                ingredients. 
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
                    <a href="{{ url('/about') }}" class="list-group-item list-group-item-action active" style="color:white;background:black;border-color:black">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>  &nbsp; What is Everspice?
                    </a>
                    <a href="{{ url('/our-history') }}" class="list-group-item list-group-item-action">
                        <i class="fa fa-circle" aria-hidden="true"></i>  &nbsp; Our History
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




    