<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>
    
 
    

    <title>ecommerce</title>
    {{-- jquery --}}
  <!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')  }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')  }}" rel="stylesheet">

    



<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

      {{-- check admin logged session for every page --}}
   @if (!Session::has('admin_data'))
   <script>
    //  console.log("lol");
   
     window.location.href="{{ url('http://everspiceceylon.com/admin/login') }}"
   </script>
    
   @endif
   
   
    {{-- check admin logged session for every page --}}


    {{-- links for crud  --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     {{-- links for crud  --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> --}}



    



     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
     <style>
         #example_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #table_id_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #table_id2_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #table_id2_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #orders_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #example{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #view_product_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #product_add{
             background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:5px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
         }
         #invoice{
             
             background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:5px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
             
             
             
         }
         
           #failed_payment{
             
             background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:5px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important
               padding-left:15px;
             padding-right:15px;
             
             /*background:rgba(255,255,255,0.7)!important;*/
             /*padding:20px;*/
             /*box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important*/
             
             
             
         }
         
         #filterd_orders_wrapper{
             background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:5px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important 
             
          
             
         }
         
         #customer_names{
           
             background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:5px;
              padding-left:5px;
             padding-right:5px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important   
             
             
         }
         
         #coupens_table_yajra{
             
              background:rgba(255,255,255,0.7)!important;
             padding-bottom:20px;
             padding-top:15px;
              padding-left:15px;
             padding-right:15px;
             margin-bottom:20px;
             box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important     
             
         }
         
         
         
     </style>
</head>


 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" style="background:#E4E7ED">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->


            
            <div class="text-center d-none d-md-inline" style="display: flex!important;align-items: baseline;">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                    <div class="sidebar-brand-icon">
                        <img src="{{ asset('assets/imgs/theme/logo-everspicenew.png') }}" alt="logo"  style="width: 70%;filter:brightness(0) invert(1)"/>
                  
                         
                        
                    </div>
                    <!--<div class="sidebar-brand-text mx-3"> Everspice  </div>-->
                </a>
            
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">
            
            
              <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/dashboard_new') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Dashboard -->

        

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Products</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded" style="font-size:18px">
                        
                        <a class="collapse-item" href="{{ url('/admin/producthome') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true"style="font-size:10px;"></i>&nbsp; Products</a>
                        <a class="collapse-item" href="{{ url('/admin/product') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px"></i>&nbsp; Add Products</a>
                       
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/category') }}">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>Categories</span></a>
            </li>
            

            <!-- Nav Item - Tables -->
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href=" url('/admin/country_shipping') ">-->
            <!--        <i class="fas fa-fw fa-table"></i>-->
            <!--        <span>Shipping</span></a> -->
            <!--</li>-->
            
            
            <!-- Nav Item - Tables -->

               <!--<li class="nav-item">-->
               <!-- <a class="nav-link" href="{{ url('/admin/reviews') }}">-->
               <!--     <i class="fas fa-fw fa-comments"></i>-->
               <!--     <span>Reviews</span></a> -->
               <!--</li>-->
               
                  
                       <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesorder"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
                <div id="collapsePagesorder" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class=" py-2 collapse-inner rounded" style="font-size:18px">
                        
                        <a class="collapse-item" href="{{ url('/admin/orders') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true"style="font-size:10px;"></i>&nbsp; Orders </a>
                        <a class="collapse-item" href="{{ url('/admin/orders-inprogress') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px"></i>&nbsp; Orders inprogress</a>
                        <a class="collapse-item" href="{{ url('/admin/orders-shipped') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px"></i>&nbsp; Orders Shipping</a>
                        <a class="collapse-item" href="{{ url('/admin/orders-delivered') }}" style="align-items: center;display: flex;"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px"></i>&nbsp; Orders Delivered</a>
                    </div>
                </div>
            </li>
                   
                  <li class="nav-item">
                   <a class="nav-link" href="{{ url('/admin/customers') }}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Customers</span></a> 
                   </li>   
                   
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/reviews') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Reviews</span></a> 
            </li>
            
            
            <!--<li class="nav-item">-->
            <!--<a class="nav-link" href=" url('/admin/coupons') ">-->
            <!--<i class="fas fa-fw fa-comments"></i>-->
            <!--<i class="fa fa-gift"></i>-->
            <!--<span>Coupons</span></a> -->
            <!--</li>-->
            
            
              
            <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/couponsmanage') }}">
            <!--<i class="fas fa-fw fa-comments"></i>-->
            <i class="fa fa-gift"></i>
            <span>manage coupon</span></a> 
            </li>
            
            
            
            
            
            
            
            
              <li class="nav-item">
            <a class="nav-link" href="{{ url('FailPayment') }}">
            <!--<i class="fas fa-fw fa-comments"></i>-->
            <i class="fa fa-credit-card"></i>
            <span>Failed Payment</span></a> 
            </li>
            
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->


          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background:#E4E7ED; background-image: url(/public/about/background-image-copy-re.jpg) ; background-size: cover; ">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background:#3F0010">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--<span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>-->
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!--<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
       
    </div>
                @yield('content')

            </div>
             
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SATASME 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->

    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
    <script  src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      
      
    <!--<script src="cdn.datatables.net/plug-ins/1.12.1/filtering/row-based/range_dates.js" >  </script>  -->
    
    
  
   <!--<script   src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
   <!--<script   src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
   <!--<script   src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script> -->
   <!--<script   src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script> -->
  
    
    	
<script> if (window.performance) { var navEntries = window.performance.getEntriesByType('navigation'); if (navEntries.length > 0 && navEntries[0].type === 'back_forward') { console.log('As per API lv2, this page is load from back/forward'); } else if (window.performance.navigation && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) { console.log('As per API lv1, this page is load from back/forward'); } else { console.log('This is normal page load'); @if (Session::has('sweet_alert.alert')) swal( {!! Session::get('sweet_alert.alert') !!} ); {{ Session::forget('sweet_alert.alert') }} // This will forget the alert data after displaying it :) @endif } } else { console.log("Unfortunately, your browser doesn't support this API"); } </script>


<script>

$(document).ready(function(){


$('img').lazyload();


});

</script>


<!--lazyload-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    
    

   @include('sweetalert::alert')

</body>

</html>