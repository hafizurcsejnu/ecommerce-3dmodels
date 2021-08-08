<?php
use App\Models\ProductCategory;
use App\Models\Product;
?>
@php 
$total = 0
@endphp
@if(session('cart'))
@foreach(session('cart') as $id => $details)  
  @php
    $total += $details['price'] * 1 ;
  @endphp
@endforeach
@endif

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ready 3D Models</title>
    <meta name="keywords" content="Ready 3D Models">
    <meta name="description" content="Ready 3D Models | High Quality 3D Design">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('frontend/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('frontend/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('frontend/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('frontend/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/jquery.countdown.css')}}">

   
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/nouislider/nouislider.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/demos/demo-4.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
</head>

<body>
    
<style>
    a#lcdveli610g81fc025tlk {
    display: none!important;
}
</style>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61062447d6e7610a49adf8ce/1fbvvre8m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance">
            <div class="header-top d-none">
                <div class="container">
                    <div class="header-left">
                        <p>Hello, welcome here</p>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>                 
                                    <li><div class="header-dropdown"><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></div></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="{{URL::to('/')}}" class="logo">
                            <img src="{{asset('frontend/images/logo.png')}}" class="logo" alt="Logo" width="250" height="40">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            
                            <h5 id="not_found"  style="color:red; text-align:center;display:none">No item is found with this keyword!</h5>

                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">Search</label>    
                                <input type="text" name="search_text" id="search_text" placeholder="Search 3D Models" class="form-control" >                                   
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            </div><!-- End .header-search-wrapper -->
                               
                        </div><!-- End .header-search -->                        

                    </div>                

                    <div class="header-right">
                        <div class="offer">
                            <i class="la la-lightbulb-o"></i><p>High quality 3D models</p>
                        </div>

                        <div class="account login_m">                           
                            <?php 
                                if (Session::get('user')) {?>   
                                    <a href="{{URL::to('/logout')}}" title="{{session('user.name')}}">  
                                        <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Logout</p>
                                    </a>
                                <?php }else{?>
                                    <a href="{{url('login')}}" target="_blank">    
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <p>Login</p>
                                    </a>
                            <?php } ?>
                        </div>
                        

                        <!-- <div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div> -->
                        <!-- End .compare-dropdown -->

                    
                        <div class="dropdown cart-dropdown login_m">
                            
                            <a href="{{ URL::to('cart') }}" class="dropdown-toggle" role="button" data-toggle="dropdown1" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count"><span class="number-cart">@if(session()->get('cart')!=null) {{count(Session::get('cart'))}} @else{{0}} @endif</span></span>
                                </div>
                                <p>Cart</p>
                            </a>
                        

                            <div class="d-none dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">

                @if(session('cart'))
                  @foreach(session('cart') as $id => $details)
                    <?php 
                        $product = \App\Models\Product::where('id',$id)->first();  
                        $src = asset($details['image']);    
                        //dd($product);
                    ?>
                    <div class="product">
                        <div class="product-cart-details">
                            <h4 class="product-title">
                                <a href="#">{{$product->name}}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">1</span>
                                x ${{$product->price}}
                            </span>
                        </div><!-- End .product-cart-details -->

                        <figure class="product-image-container">
                            <a href="#" class="product-image">
                                <img src="{{ URL::asset('storage/app/public/'.$product->images.'') }}{{asset('frontend/images/products/cart/product-1.jpg')}}" alt="product">
                            </a>
                        </figure>
                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                    </div><!-- End .product -->
                   @endforeach
                @endif
                    

                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total $</span>
                                    <span class="total">{{$total}}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{URL::to('cart')}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{URL::to('checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->

                        
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

          
            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">

                                        {{-- <li class="item-lead"><a href="#">Daily offers</a></li>
                                        <li class="item-lead"><a href="#">Gift Ideas</a></li> --}}
                                        <?php                            
                                        $categories=DB::table('product_categories')
                                        ->where('parent_id', null)
                                        ->get();
                                       ?>
                                        @foreach($categories as $category) 
                                        <?php 
                                            // skip those categories who has no product.
                                            $product = Product::orderBy('id', 'desc')->where('category_id', $category->id)->get();	  
                                            $row_count = $product->count();
                                            if ($row_count==0) {
                                                continue;
                                            }
                                        ?>

                                        <li><a href="{{URL::to('shop-category')}}/{{$category->id}}">{{$category->name}}</a></li>
                                        @endforeach
                                        
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav"> 
                            <?php 
                            if(isset($menu)){
                            }
                            else{
                                $menu = 'home';
                            }
                                
                            ?>

                            <ul class="menu sf-arrows">
                                <li class="@if($menu == 'home') active @endif"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
                                <li class="@if($menu == 'shop') active @endif"><a class="nav-link" href="{{URL::to('/shop')}}">Shop</a></li>
                                <li class="@if($menu == 'freebies') active @endif"><a class="nav-link" href="{{URL::to('/freebies')}}">FreeBies</a></li>
                                <li class="@if($menu == 'services') active @endif"><a class="nav-link" href="{{URL::to('/services')}}">Custom 3D Service</a></li>
                                
                            <?php 
                            if(Session::get('user')) {?>                              
                                {{-- <li aria-haspopup="true"><a href="{{url('my-account')}}">My Account</a></li> --}}
                                <li class="@if($menu == 'my-account') active @endif">
                                    <a href="{{url('my-account')}}" class="sf-with-ul">My Account</a>
                                    <ul style="display: none;">
                                        <li><a href="{{url('my-account')}}">My Orders</a></li>
                                        <li><a href="{{url('my-wishlist')}}">My Wishlist</a></li>
                                        <li><a href="{{url('logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                               
                            <?php }?>
                           

                               
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        
                        <div class="account">                           
                            <?php 
                                if (Session::get('user')) {?>   
                                    <a href="{{URL::to('/logout')}}">  
                                        <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <p>Logout</p>
                                    </a>
                                <?php }else{?>
                                    <a href="{{url('login')}}" target="_blank">    
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                        <p>Login</p>
                                    </a>
                            <?php } ?>
                        
                        
                        <div class="dropdown cart-dropdown">
                            <a href="{{ URL::to('cart') }}" class="dropdown-toggle" role="button" data-toggle="dropdown1" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count"><span class="number-cart">@if(session()->get('cart')!=null) {{count(Session::get('cart'))}} @else{{0}} @endif</span></span>
                                </div>
                                <p>Cart</p>
                            </a>
                        </div>
                    </div>


                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
<style>
    .search_item{
        float: left;
        margin-top: 10px;
    }
    .product-body {
    min-height: 169px;
}
</style>
            <div class="row">
                <div class="container">
                    <div class="row search_result" style="background: #ededed;position: relative; width: 100%;z-index: 9999;">
                        <div id="result" style="width: 100%!important;"></div>
                    </div>
                </div>
            </div>


        </header><!-- End .header -->
    
    @yield('main_content') 

    <footer class="footer footer-2">
        <div class="icon-boxes-container" style="background: #dde2f2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                       
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-rotate-left"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Simple Returns</h3><!-- End .icon-box-title -->
                                <p>within 30 days</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-life-ring"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                <p>24/7 amazing services</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                      
                    </div><!-- End .col-sm-6 col-lg-3 -->

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->

  

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="widget widget-about">
                            <img src="{{asset('frontend/images/logo.png')}}" class="footer-logo" alt="Footer Logo" width="300" height="75">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex aut tenetur ab aliquam? Alias sequi facere at rem earum nam nihil rerum recusandae voluptates voluptate, ipsam iusto ea quos accusantium.</p>
                            
                            <div class="widget-about-info">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <span class="widget-about-title">Got Question? Call us 24/7</span>
                                        <a href="tel:123456789">+0123 456 789</a>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 col-md-8">
                                        <span class="widget-about-title">Payment Method</span>
                                        <figure class="footer-payments">
                                            <img src="{{asset('frontend/images/payments.png')}}" alt="Payment methods" width="272" height="20">
                                        </figure><!-- End .footer-payments -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget-about-info -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-12 col-lg-3 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">Information</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#">About</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Log in</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-3 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-3 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{url('login')}}">Sign In</a></li>
                                <li><a href="{{url('cart')}}">View Cart</a></li>
                                <li><a href="{{url('my-wishlist')}}">My Wishlist</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-64 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">Copyright © 2021 Ready 3D Models. All Rights Reserved.</p><!-- End .footer-copyright -->
                <ul class="footer-menu">
                    <li><a href="#">Terms Of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul><!-- End .footer-menu -->

                <div class="social-icons social-icons-color">
                    <span class="social-label">Social Media</span>
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .container -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search 3D Models" required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="#">Home</a>

                        </li>
                      
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                        <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                        <li><a href="#">Beds</a></li>
                        <li><a href="#">Lighting</a></li>
                        <li><a href="#">Sofas & Sleeper sofas</a></li>
                        <li><a href="#">Storage</a></li>
                        <li><a href="#">Armchairs & Chaises</a></li>
                        <li><a href="#">Decoration </a></li>
                        <li><a href="#">Kitchen Cabinets</a></li>
                        <li><a href="#">Coffee & Tables</a></li>
                        <li><a href="#">Outdoor Furniture </a></li>
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->


<!-- Plugins JS File -->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/superfish.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.plugin.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.elevateZoom.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-input-spinner.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/demos/demo-2.js')}}"></script>
<script src="{{asset('frontend/js/cart.js')}}"></script>
@stack('js')
<script>
     // live search start
     $( document ).ready(function() {
            $('#search_text').keyup(function (){
             // disable the search area when click at outside of that div
              $(document).mouseup(function(e){
                  var container = $('.search_result');
                  // if the target of the click isn't the container nor a descendant of the container
                  if (!container.is(e.target) && container.has(e.target).length === 0) 
                  {
                    container.hide();
                  }
              });
              

              var txt= $(this).val();
              if (txt=='')
              {
                 $('#result').html('');
                 $('#result').hide();
              }
              else
              {   
                  $('.search_result').show();
                  $.ajax({
                    url:"search_product",
                    data: {
                        _token: '{{csrf_token()}}',
                        search: txt
                    },
                    type: 'POST',
                    success: function(data){
                        //console.log(data);
                        if( data != 'not found'){
                            $('#result').html(data);
                            $('#result').show();
                            $("#not_found").css("display", "none");
                        }else{
                            $('#result').hide();
                            $("#not_found").css("display", "block");
                        }                     
                      
                    }
                  });

              }
            });

        });
        // end live search
</script>


<script>    
$( document ).ready(function() {

    $('.menu .nav-link').click(function(){
        console.log('nav-link clicked');
      $('.menu .nav-link').removeClass('active');
      $(this).addClass('active');
   })


    // coupon start
    $('#couponBtn').click(function (){              
        var coupon_code = $('#coupon_code').val();
        var total_price=$('.total').html();
        //console.log(coupon_code);
        if (coupon_code=='')
        {
        var string= 'Empty coupon code! Please try with a valid one.';
        $('#error_message').html(string);
        }
        else if (total_price==0)
        {
        var string= 'Please add product in the cart first!';
        $('#error_message').html(string);
        }
        else
        {                  
            $.ajax({
            url:"coupon_execution",
            data: {
                _token: '{{csrf_token()}}',
                coupon_code: coupon_code, total_price: total_price
            },
            type: 'POST',
            success: function(response){     
                console.log(response.total_price);              
            //   if(response.total_price=='less'){
            //     var string= 'The total price should be more than coupon discount amount. Please add more products.';
            //     $('#error_message').html(string);
            //   }
                if(response.success==true){
                var total_price=$('.total').html();
                var discount_amount = response.data.discount_amount;
                var updated_price = total_price-discount_amount;
                console.log(updated_price);                                          
                
                var tr_coupon = '<td>Coupon Discount:</td><td>-$'+discount_amount+'</td>';
                $('.coupon').append(tr_coupon);
                $(".total").html(updated_price);
                
                var string= 'You are enjoying $'+discount_amount+ ' as a discount.';
                $('#success_message').html(string);
                //$('#error_message').hide();
                $("#error_message").css("display", "none");
                $('.cart-discount').hide();
                $('.coupon_discount').hide();
                }
                else{
                var total_price=$('.total').html();
                $(".total").html(total_price);
                $('.coupon_discount').hide();
                
                var string= 'Wrong coupon code! Please use correct one.';
                $('#error_message').html(string);
                
                } 
                
            }
            });

        }
    });
    // coupon end
});
</script>

<script>
//     function setActiveLink(setActive){
// if ($("a").hasClass('active'))
// $("a").removeClass('active');
// if (setActive)
// $("#"+setActive).addClass('active');
// }

// $(function() {
// $("#link4").click(function() {
// setActiveLink(this.id);
// });
// });
</script>

</body>


</html>