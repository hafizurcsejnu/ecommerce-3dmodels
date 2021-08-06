
@extends('layouts.master')
@section('main_content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">{{$data->title}}<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Shop</a></li>
            </ol> --}}
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
<style>
img {
    max-width: 100%!important;
} 
</style> 

<div class="page-content">
	<div class="container">

		<div class="popular-courses-contnet">
			<h5>{{$data->title}}</h5>
			{{-- <div class="post_meta">
				<ul>
					<li><a href="#">Political Science</a></li>
					<li><p>Duration : 4 Yr</p></li>
				</ul>
			</div> --}}
			<p>{!! $data->description !!}</p>
		</div>
	</div><!--// single-courses -->

	</div>
</div>


 @endsection
