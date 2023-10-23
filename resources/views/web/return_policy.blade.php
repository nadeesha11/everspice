
@extends('web.web_master')


@section('content')
 <style>
    .bg{
        background-image: url("/public/about/background-image-copy-re.jpg");
        background-size: cover;
    }
</style>   

    <main class="main">
    
    <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.main')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Return Policy
                </div>
            </div>
        </div>
        <div class="page-content pt-50 bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                    <div class="single-header style-2">
                                        <h2>Return Policy</h2>
                                       <!-- <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                            <span class="post-by">By <a href="#">Jonh</a></span>
                                            <span class="post-on has-dot">9 April 2020</span>
                                            <span class="time-reading has-dot">8 mins read</span>
                                            <span class="hit-count has-dot">29k Views</span>
                                        </div> -->
                                    </div>
                                    <div class="single-content mb-50">
                                        <h4>Return Policy for Everspice Ceylon</h4>
                                        <p>We do not accept returns on food products once the customer has accepted their order.
Customers must inspect the goods before accepting their order, and if they do not want the
item, they must return it to the delivery person.</p>
                                        <h4>Refunds</h4>
                                        <p>If an item is out of stock or if you decline your order. Refunds will be processed as quickly as
possible. Banks typically process refunds in 3-4 days, depending on the issuing bank. This
process has previously taken up to two weeks. We take food safety very seriously; if you
have any concerns about the quality of our products, please contact us.</p>
                               
                                      
                                        <h4>Exchanges</h4>
                                        <p>We do not accept exchanges because we sell food. Please inspect your goods before
accepting them from the delivery people.</p>
                                      
                                       

                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

 
    </main>
    @endsection




    