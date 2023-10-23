@extends('web.web_master')
@section('content')
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
            
            
      
            
            
            
        </div>
        <div class="page-content pt-150 pb-150 bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto white_bg">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <!--<a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>-->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('customer.getlogout')}}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Hello {{Auth::user()->first_name}} {{ Auth::user()->last_name}}</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    From your account dashboard. you can easily check &amp; view your recent orders,<br />
                                                    manage your account 
                                                    <!--manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>-->
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Your Orders</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <!--<th>Actions</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            
                                                            
                                                     @php
                                                    
                                                    
                                                      $arrLength = count($orders);
                                                       
                                                  
                                                     
                                                     @endphp
                                                    
                                                            
                                                            
                                                            
                                                            
                                                       @if( $arrLength > 0)
                                                       
                                                     
                                                        
                                                            @foreach($orders as $order )
                                                            
                                                            <tr>
                                                                <td>{{ $order->orderid }}</td>
                                                                <td>{{ $order->orderdate }}</td>
                                                                <td>{{$order->order_status  }}</td>
                                                                <td>{{ $order->amount }}</td>
                                                                <!--<td>{{ $order->id }}</td>-->
                                                            </tr>
                                                            
                                                            @endforeach
                                                   
                                                       @else
                                                       
                                                            <tr>
                                                             <td>you have 0 orders</td>
                                                           
                                                            </tr>
                                                     
                                                       @endif
                                                          
                                                          
                                                          
                                                          
                                                         
                                                            
                                                            
                                                          
                                                            
                                                            
                                                            <!--<tr>-->
                                                            <!--    <td>#2468</td>-->
                                                            <!--    <td>June 29, 2020</td>-->
                                                            <!--    <td>Completed</td>-->
                                                            <!--    <td>$364.00 for 5 item</td>-->
                                                            <!--    <td><a href="#" class="btn-small d-block">View</a></td>-->
                                                            <!--</tr>-->
                                                            <!--<tr>-->
                                                            <!--    <td>#2366</td>-->
                                                            <!--    <td>August 02, 2020</td>-->
                                                            <!--    <td>Completed</td>-->
                                                            <!--    <td>$280.00 for 3 item</td>-->
                                                            <!--    <td><a href="#" class="btn-small d-block">View</a></td>-->
                                                            <!--</tr>-->
                                                        </tbody>
                                                    </table>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                             
                                                
                                                 
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <!--test-->
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Orders tracking</h3>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            
                                            <!--<div class="col-lg-6">-->
                                            <!--    <div class="card mb-3 mb-lg-0">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <h3 class="mb-0">Billing Address</h3>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-body">-->
                                            <!--            <address>-->
                                            <!--                3522 Interstate<br />-->
                                            <!--                75 Business Spur,<br />-->
                                            <!--                Sault Ste. <br />Marie, MI 49783-->
                                            <!--            </address>-->
                                            <!--            <p>New York</p>-->
                                            <!--            <a href="#" class="btn-small">Edit</a>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                            <!--<div class="col-lg-6">-->
                                            <!--    <div class="card">-->
                                            <!--        <div class="card-header">-->
                                            <!--            <h5 class="mb-0">Shipping Address</h5>-->
                                            <!--        </div>-->
                                            <!--        <div class="card-body">-->
                                            <!--            <address>-->
                                            <!--                4299 Express Lane<br />-->
                                            <!--                Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444-->
                                            <!--            </address>-->
                                            <!--            <p>Sarasota</p>-->
                                            <!--            <a href="#" class="btn-small">Edit</a>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <!--<p>Already have an account? <a href="page-login.html">Log in instead!</a></p>-->
                                                
                                                
                                                
                                                
                                                <form method="post" action="{{ url('customer/changeDetails') }}">
                                                    
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>First Name <span class="required">*</span></label>
                                                            <input  class="form-control" name="first_name" type="text" value="{{ $user[0]->first_name }}" />
                                                             <span style="color: brown" >@error('first_name'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Last Name <span class="required">*</span></label>
                                                            <input  class="form-control" name="last_name" value="{{ $user[0]->last_name }}"/>
                                                             <span style="color: brown" >@error('last_name'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>User Name <span class="required">*</span></label>
                                                            <input  class="form-control" name="username" type="text" value="{{ $user[0]->username }}"/>
                                                             <span style="color: brown" >@error('username'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input  class="form-control" name="email" readonly type="email" value="{{ $user[0]->email }}"/>
                                                             <span style="color: brown" >@error('email'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        
                                                     
                                                      
                                                            <input  class="form-control" name="id"  type="hidden" value="{{ $user[0]->id }}"/>
                                                          
                                                        
                                                        
                                                        
                                                        
                                                        @if ( isset($user[0]->way) )
                                                        
                                                        <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input  class="form-control" name="current_password" type="password"/>
                                                         <span style="color: brown" >@error('current_password'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group col-md-12">
                                                        <label>New Password<span class="required">*</span></label>
                                                        <input id="password"  class="form-control" name="new_password" type="text" />
                                                         <span style="color: brown" >@error('new_password'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        
                                                        
                                                        
                                                        <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input id="password"  class="form-control" name="password_confirmation" type="text" />
                                                        <span style="color: brown" >@error('password_confirmation'){{ $message }} @enderror   </span> 
                                                        </div>
                                                        
                                                     
                                                        
                                                        @else
                                                        
                                                        
                                                            
                                                            <input  class="form-control" type="hidden"  value="socialLogins" name="socialLogins"  />
                                                            
                                                       
                                                       
                                                        @endif
                                                    
                                                        
                                                      
                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" >Save Change</button>
                                                        </div>
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


@endsection

















