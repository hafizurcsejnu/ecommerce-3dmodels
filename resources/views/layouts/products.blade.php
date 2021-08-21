
<style>               
    .btn-product-icon {
        color: #c96;
        border-color: #c96;
        background-color: transparent;
        border: 0.1rem solid #c96;
    }
    .product-body {
        min-height: 105px;
    }
    /* figure.product-media img {
        height: 238px!important;
    }  */
    
</style>

<div class="products">
    <div class="row">
        @foreach($data as $item)      
        <div class="col-6 col-md-4 col-lg-4 col-xl-2 product-column"  data-count="{{$item->popularity_count}}" data-date="{{$item->created_at}}" data-price="{{$item->price}}">     
            
            <div class="product product-2">
                <figure class="product-media">
                    
                    <?php if($item->images!=null) { $images = explode('|', $item->images);?>

                    <a href="{{URL::to('product')}}/{{$item->id}}">
                        <img src="{{asset('images')}}/{{$images[0]}}" alt="{{$images[0]}}" class="product-image">
                    </a>
                    <?php } else{?>
                        <a href="{{URL::to('product')}}/{{$item->id}}">
                            <img style="width: 100%" src="{{asset('frontend/images/no-image.png')}}" alt="Product image not found">
                        </a>                                    
                    <?php }?>
    
                    <div class="product-action-vertical">
                        @if (Session::get('user'))
                            <a href="javascript:void(0)" class="btn-product-icon btn-wishlist btn-expandable addToWishlist" title="Wishlist" data-id="{{$item->id}}">
                                <span id="atw{{$item->id}}">Add to Wishlist</span> 
                            </a>                                           
                        @else
                            <a href="{{url('login')}}" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>Add to Wishlist</span></a>
                        @endif    
                    </div>
                    <!-- End .product-action -->
                    

                    <div class="product-action product-action-dark">
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

                        <a href="javascript:void(0)" class="btn-product btn-cart addToCart {{$class}}" data-id="{{$item->id}}"><span>Add to cart</span></a>
                    
                        <a href="{{URL::to('quick-view')}}/{{$item->id}}" class="btn-product btn-quickview" title="Quick view"><span>Quick view</span></a>
                    </div>
                    <!-- End .product-action -->
                </figure>
                <!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        {{-- <a href="3dmodels-category/{{$item->catId}}" target="_blank">{{$category}}</a> --}}
                    </div>
                    <!-- End .product-cat -->
                    
                    <h3 class="product-title"><a href="{{URL::to('product')}}/{{$item->id}}">{{$item->name}} {{$item->id}}</a></h3>
                    <!-- End .product-title -->
                    <div class="product-price">
                        ${{$item->price}}
                    </div>
                    <!-- End .product-price -->                   
                </div>
                <!-- End .product-body -->
            </div>

        </div>
         @endforeach
    </div><!-- End .row -->

    <div class="" id="status"></div>
    @if(count($data)>=30)
    <div class="load-more-container text-center">
        <a href="javascript:void(0)" class="btn btn-outline-darker btn-load-more" data-count="30">More Models <i class="icon-refresh"></i></a>
    </div><!-- End .load-more-container -->
    @endif
</div>