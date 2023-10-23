
@extends('web.web_master')


@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
    
    .bg{
        
        background-image: url("/public/about/background-image-copy-re.jpg");
        background-size: cover;
    }
    
    .bottom{
        
        margin-bottom:10px;
        
        
        
    }
    
 
    
    .input{
        
            border-radius: 0px;
    }
    
    
    .map-container{
    overflow:hidden;
     padding-bottom:56.25%;
     position:relative;
    height:0;
       }
       
  .map-container iframe{
   left:0;
   top:0;
   height:100%;
   width:100%;
   position:absolute;
   }
   
  /* table {*/
  /*  border: 0px solid #CCC;*/
  /*  border-collapse: collapse;*/
  /*}*/

  /*td {*/
  /*  border: none;*/
  /*}*/
   

   p{
       margin-bottom:15px;
   }
    
</style>
    

    <main class="main">
        
    
    <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Contact
                </div>
            </div>
        </div>
        
        <div  class="bg">
        
     
        <div class="container ">
            
                  <div class="row ">
                 <div class="col-12 ">
                 <h1 class="m-5">Contact</h1>
                 </div>
           
                  </div>
                  
                <div class="bg-light p-4  m-4 row">
                 
               
                 <div class="col-lg-6  col-md-6  p-1">

                 <h2 class="mb-2">Let’s get to know each other a bit. Call in for a tea and a chat.</h2>
                 <p class="mb-2">Send us a message and get in touch with us. Let’s have a chat to discuss more while enjoying a cup of your favorite functional tea from us and we also like to listen to your business proposals as well.</p>
                
                 
                 
                 <!--<div class="mt-3">-->
                 <!--<h4 class="mb-2 mt-5">Visit Our Place</h4>-->
                 <!--<h5><i class="fa fa-address-book" aria-hidden="true"></i> Food and Nature (Pvt) Ltd,</h5> -->
                 <!--<p> No 106/6A, Araliya Uyana, Depanama<br> Pannipitiya, Sri Lanka.</p>  -->
                 
                     
                 <!--</div>-->
                 
                 <div class="mt-3" style="margin-top: 50px!important">
                 <!--<h4 class="mb-2 mt-5"><i class="fa fa-address-book " aria-hidden="true"></i>Visit Our Place</h4>-->
                 <h5 style="margin-bottom: 30px!important"><i class="fa fa-home ml-2" aria-hidden="true"></i> Everspice Ceylon</h5> 
                   
                   <div class="mt-3">
                       
                
                       
                       
                       
                     <p>contact  +94701600007</p>
                     <p>everspiceceylon@gmail.com</p>
                     <p>www.everspiceceylon.com</p>
                     <p>#4,Menikpalahena,<br>Naimbala2,Thihagoda(81280)<br>Sri Lanka.</p>
                          
                       
                       
                   </div>
                 
                     
                 </div>
                 
                 
                 </div>
                 
                 
                <div class="col-lg-6  p-1  col-md-6  ">
                   
                   
                   
                  <form method="post" action="{{ route('contact_mail') }}"> 
                   @csrf
                   
                  <span style="color: brown" >@error('customer_name'){{ $message }} @enderror   </span>    
                <input class="mb-2 input" value="{{ old("customer_name") }}" required  type="text" maxlength="25" placeholder="Your name" name="customer_name">
               
                <span style="color: brown" >@error('email'){{ $message }} @enderror   </span>
                <input class="mb-2 input" value="{{ old("email") }}" required  maxlength="25" type="email"  placeholder="Email address"  name="email">
                
                 <span style="color: brown" >@error('number'){{ $message }} @enderror   </span>
                <input class="mb-2 input" value="{{ old("number") }}" required  maxlength="20" type="text"  placeholder="Conatct No"  name="number">
              
                
                
                <!--<input class="mb-2 input" maxlength="50" type="text"  placeholder="Subject"  name="subject">-->
                <!--<span style="color: brown" >@error('subject') $message  @enderror   </span>-->
                <span style="color: brown" >@error('message'){{ $message }} @enderror   </span>
                <textarea class="mb-2 input"   maxlength="5000" required   placeholder="Enter your message" name="message"  rows="2"></textarea>
                
                
                
                <button  onclick="contact()"  type="submit" class="btn btn-success">Send message</button>
                
                </form> 
                
                
                
                
                
               
                 </div>
                 
                 
                 
                 
                 
                 
                    <!--Google map-->
                 <div id="map-container-google-1" class="z-depth-1-half map-container mt-3" style="height: 200px ">
                 <iframe src="https://maps.google.com/maps?q=Naimbala2&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                 style="border:0" allowfullscreen></iframe>
                 </div>

                 <!--Google Maps-->
                 
                 

                 
                 
                 
                 
                 
                 
          
                 
                 
                 
                 
             </div> <br>    
                  
                  
                  
                  
                  
                  
            
        </div>
        
        </div>
  
        

 
    </main>
    
    
 <script>
     
     function  contact(){
       
fbq('track', 'Contact');

 

    
   }  
     
     
 </script>
    
    
    
    
    @endsection




    