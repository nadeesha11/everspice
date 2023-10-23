@extends('web.web_master')

@section('content')

@if ($message = Session::get('alert_checkout'))
<div class="alert alert-success alert-block">
    {{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
        <strong>{{ $message }}</strong>
</div>
@endif



<div class="page-content pt-150 pb-150 bg" >
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto white_bg">
                <div class="row">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--<div class="col-lg-6 pr-30 d-none d-lg-block">-->
                    <div class="col-lg-6 pr-30 d-block">    
                        
                         <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Login</h1>
                                    <p class="mb-30">Don't have an account? <a href="{{ url('web/customer/register') }}">Create here</a></p>
                                </div>

                            
                   @if ($message = Session::get('message'))
                         <div class="alert alert-danger alert-block">
                           
                         <strong>{{ $message }}</strong>
                         </div>
                         @endif

                                <form method="post" action="{{ route('customer.postlogin') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email"  value="{{ old("email") }}"   name="email" maxlength="100" placeholder="Email" />
                                        <span style="color: brown " >@error('email'){{ $message }} @enderror   </span> 
                                    </div>
                                    <div class="form-group">
                                        <input  type="password"   maxlength="15"  name="password" placeholder="Your password" />
                                        <span style="color: brown " >@error('password'){{ $message }} @enderror   </span> 
                                    </div>
                                   
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" /> --}}
                                                <!--<label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>-->
                                            </div>
                                        </div>
                                        <!--<a class="text-muted" href="#">Forgot password?</a>-->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                    </div>
                                     
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-lg-6 col-md-8">
                       <div style=" margin:0 !important" class="card-login mt-115  text-center">
                           
                           
                            <!--<a href="/facebook-login" class="social-login facebook-login">-->
                            <!--    <img src="{{asset('assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />-->
                            <!--    <span>Continue with Facebook</span>-->
                            <!--</a>-->
                            
                            
                            <a href="/google-login" class="social-login google-login">
                                <img src="{{asset('assets/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                <span>Continue with Google</span>
                            </a>
                            
                        
   
                               <a id="guest_logout" href="{{ url('verfity_for_checkout') }}" class="social-login apple-login">
                                <!--<img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />-->
                                <span  >Checkout as guest </span >
                            </a>
                            
   
                        
                            
                         
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>

  
  $(document).ready(function(){



// ajx start

$.ajax({

       
url: "{{url('cart_json')}}", //this is your uri
type: 'get', //this is your method
success: function (data) {
//  console.log(data);
    var pro = JSON.parse(data);
   
    var count = pro.original.count;
   


      if(count>0){

        // console.log('cart not empty');
      }
       else{
        // console.log('cart  empty');
        document.getElementById("guest_logout").style.display = "none";
    
        
         

    }

  
   
    





   

}


});
  
  
  
// ajax end

  });  
   
   
   
    
   
</script>



@endsection































