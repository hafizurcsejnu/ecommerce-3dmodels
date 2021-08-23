@extends('layouts.master')
@section('main_content')
<?php
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Collection;
?>

<main class="main">	
	
	<div class="intro-slider-container text-center">
		<div class="row">
			<div class="col-md-10">
				<div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
					<div class="intro-slide" style="background-image: url({{asset('frontend/images/demos/demo-14/slider/slide-1.jpg')}});">
						<div class="container intro-content">
							<h3 class="intro-subtitle">Top quality</h3><!-- End .h3 intro-subtitle -->
							<h1 class="intro-title">3D Models for Professissionals <br> by Professionals </h1><!-- End .intro-title -->
		
							<a href="{{URL::to('/3dmodels')}}" class="btn btn-primary">
								<span>Shop Now</span>
								<i class="icon-long-arrow-right"></i>
							</a>
						</div><!-- End .container intro-content -->
					</div><!-- End .intro-slide -->
		
					<div class="intro-slide" style="background-image: url({{asset('frontend/images/demos/demo-2/slider/slide-2.jpg')}});">
						<div class="container intro-content">
							<h3 class="intro-subtitle">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
							<h1 class="intro-title">Ypperlig <br>Coffee Table <br><span class="text-primary"><sup>$</sup>49,99</span></h1><!-- End .intro-title -->
		
							<a href="#" class="btn btn-primary">
								<span>Shop Now</span>
								<i class="icon-long-arrow-right"></i>
							</a>
						</div><!-- End .container intro-content -->
					</div><!-- End .intro-slide -->
		
					<div class="intro-slide" style="background-image: url({{asset('frontend/images/demos/demo-2/slider/slide-3.jpg')}});">
						<div class="container intro-content">
							<h3 class="intro-subtitle">Living Room</h3><!-- End .h3 intro-subtitle -->
							<h1 class="intro-title">
								Make Your Living Room <br>Work For You.<br>
								<span class="text-primary">
									<sup class="text-white font-weight-light">from</sup><sup>$</sup>9,99
								</span>
							</h1><!-- End .intro-title -->
		
							<a href="#" class="btn btn-primary">
								<span>Shop Now</span>
								<i class="icon-long-arrow-right"></i>
							</a>
						</div><!-- End .container intro-content -->
					</div><!-- End .intro-slide -->
				</div><!-- End .owl-carousel owl-simple -->
			</div>
			<div class="col-md-2">
				<div class="banner banner-overlay  banner-content-stretch ">
					<a href="#">
						<img src="https://portotheme.com/html/molla/assets/images/demos/demo-14/banners/banner-1.png" style="height: 400px!important" alt="Banner img desc">
					</a>
					<div class="banner-content text-right">
						<div class="price text-center">
							<sup class="text-white">from</sup>
							<span class="text-white">
								<strong>$199</strong><sup class="text-white">,99</sup>
							</span>
						</div>
						<a href="http://127.0.0.1:8000/3dmodels" class="btn btn-primary">
							<span>Shop Now</span>
							<i class="icon-long-arrow-right"></i>
						</a>
					</div><!-- End .banner-content -->
				</div>
			</div>
		</div>

		

		<span class="slider-loader text-white"></span><!-- End .slider-loader -->
	</div><!-- End .intro-slider-container -->


	<div class="mb-1 mb-lg-1"></div><!-- End .mb-3 mb-lg-5 -->
	

	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				

				{{-- banner --}}
				<div class="d-none row">
					<div class="col-lg-12 col-xxl-4-5col">
						<div class="row">
							<div class="col-md-6">
								<div class="banner banner-overlay">
									<a href="{{URL::to('sets')}}">
										<img src="{{asset('frontend/images/demos/demo-14/banners/banner-2.jpg')}}" alt="Banner img desc">
									</a>

									<div class="banner-content">
										<h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Hottest Deals</a></h4><!-- End .banner-subtitle -->
										<h3 class="banner-title text-white"><a href="{{URL::to('sets')}}">Sets of 3D Models <br>For Spring <br><span>Up To  20% Off</span></a></h3><!-- End .banner-title -->
										<a href="{{URL::to('sets')}}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
									</div><!-- End .banner-content -->
								</div><!-- End .banner -->
							</div><!-- End .col-md-6 -->

							<div class="col-md-6">
								<div class="banner banner-overlay">
									<a href="{{URL::to('collections')}}">
										<img src="{{asset('frontend/images/demos/demo-14/banners/banner-3.png')}}" alt="Banner img desc">
									</a>

									<div class="banner-content">
										<h4 class="banner-subtitle text-white d-none d-sm-block"><a href="{{URL::to('collections')}}">Reduce your effors</a></h4><!-- End .banner-subtitle -->
										<h3 class="banner-title text-white"><a href="{{URL::to('collections')}}">Collection of 3D Models <br><span>Up To 30% Off</span></a></h3><!-- End .banner-title -->
										<a href="{{URL::to('collections')}}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
									</div><!-- End .banner-content -->
								</div><!-- End .banner banner-overlay -->
							</div><!-- End .col-md-6 -->
						</div><!-- End .row -->
					</div><!-- End .col-lg-3 col-xxl-4-5col -->

					<div class="col-12 col-xxl-5col d-none d-xxl-block">
						<div class="banner banner-overlay">
							<a href="{{URL::to('freebies')}}">
								<img src="{{asset('frontend/images/demos/demo-14/banners/banner-4.jpg')}}" alt="Banner img desc">
							</a>

							<div class="banner-content">
								<h4 class="banner-subtitle text-white"><a href="{{URL::to('freebies')}}">Just awesome</a></h4><!-- End .banner-subtitle -->
								<h3 class="banner-title text-white"><a href="{{URL::to('freebies')}}">Freebee Items</a></h3><!-- End .banner-title -->
								<a href="{{URL::to('freebies')}}" class="banner-link">Download Now <i class="icon-long-arrow-right"></i></a>
							</div><!-- End .banner-content -->
						</div><!-- End .banner banner-overlay -->
					</div><!-- End .col-lg-3 col-xxl-2 -->
				</div><!-- End .row -->

				{{-- carosal --}}
				<div class="bg-lighter trending-products">
					<div class="heading heading-flex1" style="padding-top: 10px;">
						{{-- <div class="heading-left">
							<h2 class="title">Trending Today</h2>
						</div> --}}

					  
					   <div class="heading-center">
							<ul class="nav nav-pills justify-content-center" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="sets-link" data-toggle="tab" href="#sets-tab" role="tab" aria-controls="sets-tab" aria-selected="true">Sets</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="collections-link" data-toggle="tab" href="#collections-tab" role="tab" aria-controls="collections-tab" aria-selected="false">Collections</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="top-selling-link" data-toggle="tab" href="#top-selling-tab" role="tab" aria-controls="top-selling-tab" aria-selected="false">New Arrivals</a>
								</li>
								
							</ul>
					   </div><!-- End .heading-right -->
					</div><!-- End .heading -->

					<div class="tab-content tab-content-carousel">
						<div class="tab-pane p-0 fade show active" id="sets-tab" role="tabpanel" aria-labelledby="sets-link">
							<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{
									&quot;nav&quot;: false, 
									&quot;dots&quot;: true,
									&quot;margin&quot;: 20,
									&quot;loop&quot;: false,
									&quot;responsive&quot;: {
										&quot;0&quot;: {
											&quot;items&quot;:1
										},
										&quot;480&quot;: {
											&quot;items&quot;:2
										},
										&quot;768&quot;: {
											&quot;items&quot;:3
										},
										&quot;992&quot;: {
											&quot;items&quot;:4
										},
										&quot;1200&quot;: {
											&quot;items&quot;:5,
											&quot;nav&quot;: true
										},
										&quot;1600&quot;: {
											&quot;items&quot;:6,
											&quot;nav&quot;: true
										}
									}
								}">
							
								
							<div class="owl-stage-outer">
								<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1681px;">
								
									@foreach($sets as $item)    
										@include('layouts.home_products')
									@endforeach
							
								</div>
							</div>


								<div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>

								<div class="owl-dots d-none"><button role="button" class="owl-dot active"><span></span></button>
									<button role="button" class="owl-dot"><span></span></button>
								</div>
								
								</div><!-- End .owl-carousel -->
						</div><!-- .End .tab-pane -->
						
						<div class="tab-pane p-0 fade" id="collections-tab" role="tabpanel" aria-labelledby="collections-link">
							<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{
									&quot;nav&quot;: false, 
									&quot;dots&quot;: true,
									&quot;margin&quot;: 20,
									&quot;loop&quot;: false,
									&quot;responsive&quot;: {
										&quot;0&quot;: {
											&quot;items&quot;:1
										},
										&quot;480&quot;: {
											&quot;items&quot;:2
										},
										&quot;768&quot;: {
											&quot;items&quot;:3
										},
										&quot;992&quot;: {
											&quot;items&quot;:4
										},
										&quot;1200&quot;: {
											&quot;items&quot;:5,
											&quot;nav&quot;: true
										},
										&quot;1600&quot;: {
											&quot;items&quot;:6,
											&quot;nav&quot;: true
										}
									}
								}">
								
								
							
								
								
								<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1681px;">
																		
										@foreach($collections as $item)    
											@include('layouts.home_products')
										@endforeach
								
									</div>
								</div>
								
								<div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
								
								<div class="owl-dots d-none"><button role="button" class="owl-dot active"><span></span></button>
									<button role="button" class="owl-dot"><span></span></button>
								</div>
							
							</div><!-- End .owl-carousel -->
						</div><!-- .End .tab-pane -->


						<div class="tab-pane p-0 fade" id="top-selling-tab" role="tabpanel" aria-labelledby="top-selling-link">
							<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{
									&quot;nav&quot;: false, 
									&quot;dots&quot;: true,
									&quot;margin&quot;: 20,
									&quot;loop&quot;: false,
									&quot;responsive&quot;: {
										&quot;0&quot;: {
											&quot;items&quot;:1
										},
										&quot;480&quot;: {
											&quot;items&quot;:2
										},
										&quot;768&quot;: {
											&quot;items&quot;:3
										},
										&quot;992&quot;: {
											&quot;items&quot;:4
										},
										&quot;1200&quot;: {
											&quot;items&quot;:5,
											&quot;nav&quot;: true
										},
										&quot;1600&quot;: {
											&quot;items&quot;:6,
											&quot;nav&quot;: true
										}
									}
								}">
								
								
								<div class="owl-stage-outer">
									<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1681px;">
									
									@foreach($top_selling as $item)    
										@include('layouts.home_products')
									@endforeach
																	
									</div>
								</div>
								 
								<div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
								
								<div class="owl-dots d-none"><button role="button" class="owl-dot active"><span></span></button>
									<button role="button" class="owl-dot"><span></span></button>
								</div>
							
							</div><!-- End .owl-carousel -->
						</div><!-- .End .tab-pane -->
					
						

					</div><!-- End .tab-content -->
				</div><!-- End .bg-lighter -->

				<div class="mb-5"></div><!-- End .mb-5 -->

				<!-- categories data -->
				<div class="home-category">

					@foreach($categories as $category)
					<div class="row cat-banner-row {{$category->name}}">
						<div class="col-xl-2 col-xxl-2">
							<div class="cat-banner row no-gutters">						

								<div class="col-sm-12 col-xl-12 col-xxl-12">
									<div class="banner banner-overlay">
										<a href="#">
											<img src="http://127.0.0.1:8000/frontend/images/demos/demo-14/banners/banner-6.jpg" style="height: 300px!important" alt="Banner img desc">
										</a>

										<div class="banner-content">										
											<a href="{{route('category',$category->id)}}"><h2 class="title text-center mb-4">{{$category->name}}</h2></a>

											<h3 class="banner-title text-white"><a href="{{route('category',$category->id)}}">{{count($category->children)}} models in this category</a></h3><!-- End .banner-title -->
											<a href="{{route('category',$category->id)}}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
										</div><!-- End .banner-content -->
									</div><!-- End .banner -->
								</div><!-- End .col-sm-6 -->

							</div><!-- End .cat-banner -->
						</div><!-- End .col-xl-3 -->

						<div class="col-xl-10 col-xxl-10">
							<div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{
									&quot;nav&quot;: true, 
									&quot;dots&quot;: false,
									&quot;margin&quot;: 20,
									&quot;loop&quot;: false,
									&quot;responsive&quot;: {
										&quot;0&quot;: {
											&quot;items&quot;:2
										},
										&quot;480&quot;: {
											&quot;items&quot;:2
										},
										&quot;768&quot;: {
											&quot;items&quot;:3
										},
										&quot;992&quot;: {
											&quot;items&quot;:4
										},
										&quot;1200&quot;: {
											&quot;items&quot;:5
										},
										&quot;1600&quot;: {
											&quot;items&quot;:6
										}
									}
								}">
								

							
							<div class="owl-stage-outer">
								<div class="owl-stage" style="transform: translate3d(-3250px, 0px, 0px); transition: all 0.4s ease 0s; width: 4750px;">
																
								@foreach($category->children as $subcat)
									<!-- sub category item-->
									<div class="owl-item" style="width: 230px; margin-right: 20px;"><div class="product text-center">
										<figure class="product-media">
											
											<a href="{{route('sub-category',$subcat->id)}}">	
												<img src="http://127.0.0.1:8000/storage/app/public/images/QYGo0ySyyviXhaUGO4EsUnUokHTu37FWijORID4I.jpg" alt="" class="product-image sub_cat">
											</a>
										</figure>

										<a href="{{route('sub-category',$subcat->id)}}">	
											<div class="product-body">									
												<h3 class="product-title">{{$subcat->name}}</h3>
												<div class="product-price">
													@php
														$models = \App\Models\Product::where('sub_category_id',$subcat->id)->count();	
													@endphp
													{{$models}} Models
												</div>
											</div>
										</a>
										</div>
									</div>
									<!-- sub category item end -->		
								@endforeach				
					

														
								</div>
							</div>
							@if(count($category->children) >5 )
								<div class="owl-nav">
									<button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button>
									<button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
								</div>
								<div class="owl-dots disabled"></div>
								<div class="owl-nav">
									<button type="button" role="presentation" class="owl-prev">
										<i class="icon-angle-left"></i>
									</button>
									<button type="button" role="presentation" class="owl-next disabled">
										<i class="icon-angle-right"></i>
									</button>
								</div>
							@endif
								<div class="owl-dots disabled"></div></div>
							
								
								
							
						</div><!-- End .col-xl-9 -->
					</div>

					@endforeach
				</div>
				<!-- end categories data -->
		
<div class="text-center">
	<a href="javascript:void(0)" class="btn btn-primary category-load-more" data-count="5">
		<span>Load More</span><i class="icon-long-arrow-right"></i>
	</a>
</div>

	<div class="mb-5"></div><!-- End .mb-5 -->

	<div class="container d-none">
		<div class="heading heading-center mb-3">
			<h2 class="title">Top Selling Products</h2><!-- End .title -->

			<ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-tab" role="tab" aria-controls="top-fur-tab" aria-selected="false">Furniture</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="top-decor-link" data-toggle="tab" href="#top-decor-tab" role="tab" aria-controls="top-decor-tab" aria-selected="false">Decoration</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="top-light-link" data-toggle="tab" href="#top-light-tab" role="tab" aria-controls="top-light-tab" aria-selected="false">Lighting</a>
				</li>
			</ul>
		</div><!-- End .heading -->

		<div class="tab-content">
			<div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
				<div class="products">
					<div class="row justify-content-center">
						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-7-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-7-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Petite Table Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-8-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-8-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Madra Log Holder</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->

									<div class="product-nav product-nav-dots">
										<a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
										<a href="#" style="background: #927764;"><span class="sr-only">Color name</span></a>
									</div><!-- End .product-nav -->

								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<span class="product-label label-circle label-sale">Sale</span>
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-9-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-9-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Garden Armchair</a></h3><!-- End .product-title -->
									<div class="product-price">
										<span class="new-price">$94,00</span>
										<span class="old-price">Was $94,00</span>
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-10-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-10-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Carronade Large Suspension Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->

									<div class="product-nav product-nav-dots">
										<a href="#" class="active" style="background: #e8e8e8;"><span class="sr-only">Color name</span></a>
										<a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
									</div><!-- End .product-nav -->

								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-11-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-11-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Original Outdoor Beanbag</a></h3><!-- End .product-title -->
									<div class="product-price">
										$259,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<span class="product-label label-circle label-new">New</span>
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-12-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-12-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">2-Seater</a></h3><!-- End .product-title -->
									<div class="product-price">
										$3.107,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-13-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-13-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Wingback Chair</a></h3><!-- End .product-title -->
									<div class="product-price">
										$2.486,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-14-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-14-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
									<div class="product-price">
										$199,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-15-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-15-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
									<div class="product-price">
										$199,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-16-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-16-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Carronade Table Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$499,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
					</div><!-- End .row -->
				</div><!-- End .products -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane p-0 fade" id="top-fur-tab" role="tabpanel" aria-labelledby="top-fur-link">
				<div class="products">
					<div class="row justify-content-center">
						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<span class="product-label label-circle label-sale">Sale</span>
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-9-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-9-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Garden Armchair</a></h3><!-- End .product-title -->
									<div class="product-price">
										<span class="new-price">$94,00</span>
										<span class="old-price">Was $94,00</span>
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<span class="product-label label-circle label-new">New</span>
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-12-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-12-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">2-Seater</a></h3><!-- End .product-title -->
									<div class="product-price">
										$3.107,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
						
						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-13-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-13-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Furniture</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Wingback Chair</a></h3><!-- End .product-title -->
									<div class="product-price">
										$2.486,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
					</div><!-- End .row -->
				</div><!-- End .products -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane p-0 fade" id="top-decor-tab" role="tabpanel" aria-labelledby="top-decor-link">
				<div class="products">
					<div class="row justify-content-center">
						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-8-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-8-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Madra Log Holder</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->

									<div class="product-nav product-nav-dots">
										<a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
										<a href="#" style="background: #927764;"><span class="sr-only">Color name</span></a>
									</div><!-- End .product-nav -->

								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-11-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-11-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Original Outdoor Beanbag</a></h3><!-- End .product-title -->
									<div class="product-price">
										$259,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-14-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-14-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
									<div class="product-price">
										$199,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-15-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-15-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Decor</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Cushion Set 3 Pieces</a></h3><!-- End .product-title -->
									<div class="product-price">
										$199,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
					</div><!-- End .row -->
				</div><!-- End .products -->
			</div><!-- .End .tab-pane -->
			<div class="tab-pane p-0 fade" id="top-light-tab" role="tabpanel" aria-labelledby="top-light-link">
				<div class="products">
					<div class="row justify-content-center">
						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-7-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-7-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Petite Table Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-10-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-10-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Carronade Large Suspension Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$401,00
									</div><!-- End .product-price -->

									<div class="product-nav product-nav-dots">
										<a href="#" class="active" style="background: #e8e8e8;"><span class="sr-only">Color name</span></a>
										<a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
									</div><!-- End .product-nav -->

								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

						<div class="col-6 col-md-4 col-lg-3 col-xl-5col">
							<div class="product product-11 text-center">
								<figure class="product-media">
									<a href="#">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-16-1.jpg')}}" alt="Product image" class="product-image">
										<img src="{{asset('frontend/images/demos/demo-2/products/product-16-2.jpg')}}" alt="Product image" class="product-image-hover">
									</a>

									<div class="product-action-vertical">
										<a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
									</div><!-- End .product-action-vertical -->
								</figure><!-- End .product-media -->

								<div class="product-body">
									<div class="product-cat">
										<a href="#">Lighting</a>
									</div><!-- End .product-cat -->
									<h3 class="product-title"><a href="#">Carronade Table Lamp</a></h3><!-- End .product-title -->
									<div class="product-price">
										$499,00
									</div><!-- End .product-price -->
								</div><!-- End .product-body -->
								<div class="product-action">
									<a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
								</div><!-- End .product-action -->
							</div><!-- End .product -->
						</div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
					</div><!-- End .row -->
				</div><!-- End .products -->
			</div><!-- .End .tab-pane -->
		</div><!-- End .tab-content -->
	</div><!-- End .container -->
  
</main><!-- End .main -->


 
@endsection

@push('js')
	<script>
		$(document).ready(function(){
			$(document).on('click','.category-load-more',function(){
				var count = $(this).data('count');
				var url = '{{route("load-more-category")}}';
				$.get(url,{
                    count: count,
                },function(response){
					var sub_url = "{{route('category',':cat_id')}}";
					var category_html = '<div class="row cat-banner-row :cat_name"> <div class="col-xl-2 col-xxl-2"> <div class="cat-banner row no-gutters"> <div class="col-sm-12 col-xl-12 col-xxl-12"> <div class="banner banner-overlay"> <a href="#"> <img src="http://127.0.0.1:8000/frontend/images/demos/demo-14/banners/banner-6.jpg" style="height: 300px!important" alt="Banner img desc"> </a> <div class="banner-content"> <a href=":url"><h2 class="title text-center mb-4">:name</h2></a> <h3 class="banner-title text-white"><a href=":url">:children_count models in this category</a></h3><a href=":url" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a> </div></div></div></div></div><div class="col-xl-10 col-xxl-10"> <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow owl-loaded owl-drag" data-toggle="owl" data-owl-options="{\'nav\': true,\'dots\': false,\'margin\': 20,\'loop\': false,\'responsive\':{\'0\':{\'items\':2},\'480\':{\'items\':2},\'768\': {\'items\':3},\'992\':{\'items\':4}}}">:sub_category_card</div> </div></div>';
					var sub_category_card = '<div class="product product-2"><figure class="product-media"> <a href=":sub_cat_url"> <img src=":sub_cat_img" alt="" class="product-image sub_cat"> </a> </figure> <a href=":sub_cat_url"> <div class="product-body"> <h3 class="product-title">:sub_cat_name</h3> <div class="product-price"> :models_count Models </div> </div> </a> </div>';
					var corusel_arrow = '<div class="owl-nav"> <button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button> <button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button> </div> <div class="owl-dots disabled"></div> <div class="owl-nav"> <button type="button" role="presentation" class="owl-prev"> <i class="icon-angle-left"></i> </button> <button type="button" role="presentation" class="owl-next disabled"> <i class="icon-angle-right"></i> </button> </div>';
					count = count+5;
					var items =  JSON.parse(response.items);
					var data_status = jQuery.isEmptyObject(items);
                    if(!data_status){
						var all_html = "";
                        var all_cat_html = "";
                        items.forEach(element => {
                        	var all_subcat_html = "";
							sub_url = sub_url.replace(':cat_id',element.id);
							if(!jQuery.isEmptyObject(element.children)){
								element.children.forEach(subcat=>{
									var sub_cat_url = "{{route('category',':cat_id')}}";
									sub_cat_url = sub_cat_url.replace(':cat_id',subcat.id);
									all_subcat_html = all_subcat_html + sub_category_card;
									all_subcat_html = all_subcat_html.replaceAll(':sub_cat_url',sub_cat_url);
									all_subcat_html = all_subcat_html.replaceAll(':sub_cat_name',subcat.name);
									all_subcat_html = all_subcat_html.replaceAll(':models_count',count);
									all_subcat_html = all_subcat_html.replaceAll(':sub_cat_img','http://127.0.0.1:8000/storage/app/public/images/QYGo0ySyyviXhaUGO4EsUnUokHTu37FWijORID4I.jpg');
								});
							}
							all_html = all_html + category_html;
							all_html = all_html.replaceAll(":sub_category_card",all_subcat_html);
							all_html = all_html.replaceAll(":url",sub_url);
							all_html = all_html.replaceAll(":name",element.name);
							all_html = all_html.replaceAll(":children_count",Object.keys(element.children).length);
							if(Object.keys(element.children).length>5){
								all_html = all_html.replaceAll(":corusel_arrow",corusel_arrow);
							}
							else{
								all_html = all_html.replaceAll(":corusel_arrow","");
							}
						});
						$('.home-category').append(all_html);
						$( ".owl-carousel" ).each(function() {
							$(this).owlCarousel({
								"nav": true, 
								"dots": false,
								"margin": 20,
								"loop": false,
								"responsive": {
									"0": {
										"items":3
									},
									"480": {
										"items":3
									},
									"768": {
										"items":4
									},
									"992": {
										"items":6
									}
								}
                                    
							});
						});
						
						if(response.remaining<0){
							$('.category-load-more').css('display','none');
						}else{
							$('.category-load-more').data('count',count);
						}
					}
					else{
						$('.category-load-more').css('display','none');
					}


				});
			});
			
		});
	</script>	
@endpush