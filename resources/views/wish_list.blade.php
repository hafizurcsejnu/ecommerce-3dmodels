
<?php $menu ='my-account';?>
@extends('layouts.master')
@section('main_content')

<style>
    .details-action-wrapper {
    display: none;
}
</style>
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">My Wishlist<span></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{URL::to('/3dmodels')}}">3D Models</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container"> 
            <div id="message"></div>   
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Model Title</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $item) 
                    <tr  id="product{{$item->id}}">
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media1" style="margin-right: 30px">
                                    <?php if($images = $item->images) $images = explode('|', $images);?>

                                <a href="product/{{$item->id}}">
                                    <img src="{{asset('images')}}/{{$images[0]}}" alt="{{$images[0]}}"  style="width: 100px!important; height:100px!important" class="product-image">
                                </a>
                                </figure>

                                <h3 class="product-title"><a href="product/{{$item->id}}">{{$item->name}}</a></h3>
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col"> ${{$item->price}}</td>                       
                        <td class="price-col"> <a href="3dmodels-category/{{$item->catId}}" target="_blank">{{$item->catName}}</a> </td>                
                              
                       
                        <td class="action-col">

                            @if(session('cart'))
                                    @php
                                    $cart = session()->get('cart');
                                    if(isset($cart[$item->id])) {
                                    $class= "cart";
                                    }
                                    else{
                                    $class="";
                                    }
                                    @endphp
                                    @else
                                    @php
                                    $class = "";
                                    @endphp
                                    @endif                                    

                            <a  href="javascript:void(0)" class="btn btn-block btn-outline-primary-2 add-to-cart {{$class}}" data-id="{{$item->id}}"><i class="icon-cart-plus"></i>Add to Cart</a>
                        </td>
                        <td class="remove-col">
                            <a  href="javascript:void(0)" class="wishlistRemoveBtn" class="btn-remove" data-id="{{$item->id}}"><i class="icon-close"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>


           
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>

<script>
    $(document).ready(function(){
        $('.wishlistRemoveBtn').click(function(){
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
            url:"wishlist_remove",
            data: {
                _token: '{{csrf_token()}}',
                product_id: id
            },
            type: 'POST',
            success: function(response){ 
                if(response.success==true){
                    var string= 'Item is removed fron your wishlist';
                    console.log(response.product_id); 
                    var string = '<p class="alert alert-success text-center">Item has been removed from wishlist.</p>';
                    $('#message').html(string);        
                    
                    $('#product'+response.product_id+'').hide();
                }
                else{
                                   
                } 
                
            }
            });

        });
    });
</script>
@endsection