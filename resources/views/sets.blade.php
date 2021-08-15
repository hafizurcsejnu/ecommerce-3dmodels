
@extends('layouts.master')
@section('main_content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            @foreach($data as $item) @endforeach 
            <h1 class="page-title"><span>Shop</span> in All Sets</h1>
            
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="#">3D Models</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sets</li>
            </ol> 
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <style>
                .load-more-container{display: none;}
            </style>
            {{-- @include('layouts.filter_link') --}}
            @include('layouts.products')            
            {{-- @include('layouts.filter') --}}

        </div>
    </div>

</main>
@endsection