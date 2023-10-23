@extends('web.web_master')

@section('content')


<div class="page-content pt-150 pb-150 bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto white_bg">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create an Account</h1>
                                    <p class="mb-30">Already have an account? <a href="{{ url('web/customer/login/check') }}">Login</a></p>
                                </div>
                                <form method="post" action="{{ route('customer.postsignup') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" value="{{ old("first_name") }}" maxlength="20" name="first_name" placeholder="First name" />   
                                        <span style="color: crimson; font-weight: 600;  font-size: 12px; " >@error('first_name'){{ $message }} @enderror   </span> 
                                    </div>

                                    <div class="form-group">
                                        <input type="text" value="{{ old("last_name") }}" maxlength="20" name="last_name" placeholder="Last name" />
                                        <span style="color: crimson;  font-weight: 600;  font-size: 12px;" >@error('last_name'){{ $message }} @enderror   </span>
                                    </div>

                                    <div class="form-group">
                                        <input  type="text" value="{{ old("username") }}" maxlength="20" name="username" placeholder="Username" />
                                        <span style="color: crimson ; font-weight: 600;   font-size: 12px;" >@error('username'){{ $message }} @enderror   </span>
                                    </div>

                                    <div class="form-group">
                                        <input  type="email" value="{{ old("email") }}" maxlength="25" name="email" placeholder="Email" />
                                        <span style="color: crimson;    font-size: 12px;" >@error('email'){{ $message }} @enderror   </span>
                                    </div>

                                    <div class="form-group">
                                        <input  type="text" value="{{ old("phone") }}" maxlength="15" name="phone" placeholder="Telephone" />
                                        <span style="color: crimson ; font-weight: 600;  font-size: 12px;" >@error('phone'){{ $message }} @enderror   </span>
                                    </div>

                                    <div class="form-group">
                                        {{-- <input  type="text"   name="password" placeholder="Password" /> --}}
                                        <input id="password" maxlength="15" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" >

                                     @error('password')
                                         <span style="color: crimson; font-weight: 600;  font-size: 12px;" class="invalid-feedback   font-size: 12px;" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                  
                                        {{-- <span style="color: brown" >@error('password'){{ $message }} @enderror   </span> --}}
                                    </div>

                                    <div class="form-group">
                                        {{-- <input  type="text" name="password_confirmation" placeholder="Confirm password" /> --}}
                                        <input id="password" maxlength="15" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="retype password" name="password_confirmation" >
                                        <span style="color: crimson; font-weight: 600;  font-size: 12px;" >@error('password_confirmation'){{ $message }} @enderror   </span>
                                    </div>

                                  
                                 
                                    <!--<div class="login_footer form-group mb-50">-->
                                    <!--    <div class="chek-form">-->
                                            <!--<div class="custome-checkbox">-->
                                            <!--    <input class="form-check-input" type="checkbox"  id="exampleCheckbox12" value="" name="agree" />-->
                                            <!--    <span style="color: brown" >@error('agree'){{ $message }} @enderror   </span>-->
                                            <!--    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>-->
                                            <!--</div>-->
                                    <!--    </div>-->
                                    <!--    <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>-->
                                    <!--</div>-->

                                    
                                    <div class="form-group mb-30">
                                        <button type="submit"  onclick="CompleteRegistration()"   class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                    </div>
                                    
                                    <!--<p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>-->
                                </form>
                                
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    

                    <div class="col-lg-6 pr-30 ">
                 
                        
                        <div class="card-login mt-115">
                            
                            <!--<a onclick="CompleteRegistration()"  href="/facebook-login" class="social-login facebook-login">-->
                            <!--    <img src="{{asset('assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />-->
                            <!--    <span>Continue with Facebook</span>-->
                            <!--</a>-->
                            
                            <a onclick="CompleteRegistration()"  href="/google-login" class="social-login google-login">
                                <img src="{{asset('assets/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                <span>Continue with Google</span>
                            </a>
                     
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                </div>
                
              <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>

                
            </div>
        </div>
        
        
     
        
        
    </div>
</div>


<script>
    
    
  function  CompleteRegistration(){
       
  fbq('track', 'CompleteRegistration');
 

    
   }
    
    
    
    
</script>





@endsection