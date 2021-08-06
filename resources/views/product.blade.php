
@extends('layouts.master')
@section('main_content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</li>
            </ol>           
            
            <!-- End .pager-nav -->
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-7">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">

                                <?php 
                                    if($item->images != null) {
                                    $images = explode('|', $item->images);
                                    //dd($item->images);
                                ?>   
                                <figure class="product-main-image">
                                                                  
                                   
                                    <img id="product-zoom" src="{{asset('images')}}/{{$images[0]}}" data-zoom-image="{{asset('images')}}/{{$images[0]}}" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">

                               
                               <?php 
                               for ($i=0; $i<count($images) && $i<6; $i++) 
                               {  
                               ?>
                                    <a class="product-gallery-item <?php if($i==0) echo "active";?>" href="#" data-image="{{asset('images')}}/{{$images[$i]}}" data-zoom-image="{{asset('images')}}/{{$images[$i]}}">
                                        <img src="{{asset('images')}}/{{$images[$i]}}" alt="product side">
                                    </a>
                                <?php } ?>

                                </div>
                               <?php } else{?>
                                <style>
                                    .product-gallery.product-gallery-vertical {
                                        float: left;
                                    }
                                </style>
                                <img src="{{asset('frontend/images/no-image.png')}}" alt="product image not found">
                                <?php }?>
                                <!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-5"> 
                        <div class="product-details product-details-centered">
                            <h1 class="product-title" style="border-bottom: 1px solid #ece8e8;padding-bottom:5px">{{$item->name}}</h1>
                            <!-- End .product-title -->

                            {{-- <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div> --}}
                            

                            <div class="product-price">
                              Price:  ${{$item->price}}
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                {!!$item->description!!}
                            </div><!-- End .product-content -->

                            {{-- <div class="details-filter-row details-row-size">
                                <label>Color:</label>

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .details-filter-row --> --}}

                            {{-- <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="size" id="size" class="form-control">
                                        <option value="#" selected="selected">One Size</option>
                                        <option value="s">Small</option>
                                        <option value="m">Medium</option>
                                        <option value="l">Large</option>
                                        <option value="xl">Extra Large</option>
                                    </select>
                                </div><!-- End .select-custom -->

                                <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                            </div><!-- End .details-filter-row --> --}}

                            <div class="product-details-action">
                                <a href="javascript:void(0)" class="btn-product btn-cart addToCart" data-id="{{$item->id}}"><span>Add to cart</span></a>
                            </div>

                            <div id="message"></div>
                            <div class="details-action-wrapper">                               
                                @if (Session::get('user'))
                                    <a href="javascript:void(0)"  id="addToWishlist" class="btn-product btn-wishlist" title="Wishlist" data-id="{{$item->id}}"><span>Add to Wishlist</span></a>
                                @else
                                    <a href="{{url('login')}}" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                @endif                                
                            </div>
                                
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <?php 
                                        $category = DB::table('product_categories') 
                                            ->where('id', $item->category_id)
                                            ->first(); 
                                    ?>
                                    <a href="shop-category/{{$category->id}}">{{$category->name}}</a>
                                </div>
                                


                                {{-- <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div> --}}
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Detail Description</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Available File Formates</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                    </li> --}}
                </ul>
                <div class="tab-content">
                    {{-- <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>
                                {!!$item->description!!}
                            </p>
                            
                        </div>
                    </div> --}}

                    <div class="tab-pane fade show active" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3>Faces</h3>
                                    <ul>
                                        <li> {!!$item->faces!!}</li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3>Uses</h3>
                                    <ul>
                                        <li> {!!$item->usages!!}</li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3>Materials</h3>
                                    <ul>
                                        <li> {!!$item->materials!!}</li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3>Style</h3>
                                    <ul>
                                        <li> {!!$item->style!!}</li>
                                    </ul>
                                </div>                                
                            </div>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>File Formats</h3>
                            <ul>

                    <?php                     
                        if($file_formats = $item->file_formats){
                            $file_formats = explode(',', $file_formats);
                            foreach($file_formats as $file){?>                            
                                #{{$file}} &nbsp;
                    <?php } }?>

                            </ul>

                            <?php                     
                            if($source_files = $item->source_files){
                                $source_files = explode(',', $source_files);
                                foreach($source_files as $file){?>  
                                    <a href="{{URL::to('/download')}}/{{$item->id}}">File One</a>&nbsp;
                            <?php } 
                            }?>


                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->

                    {{-- 
                        //review
                         <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .reviews -->
                    </div> --}}

                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
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
                            &quot;items&quot;:4,
                            &quot;nav&quot;: true,
                            &quot;dots&quot;: false
                        }
                    }
                }">
                <!-- End .product -->

                <!-- End .product -->

                <!-- End .product -->

                <!-- End .product -->

                <!-- End .product -->
            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1485px;">
                

        <?php 
        $products = DB::table('products') 
            ->where('category_id', $item->category_id)
            ->get(); 
        ?>
        @foreach ($products as $item)
        
<style>
.owl-item {
    width: 300px!important;
}
</style>
            <div class="owl-item active" style="width: 300px!important; margin-right: 20px;"><div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{URL::to('product')}}/{{$item->id}}">
                            <?php if($item->images != null) { 
                                $images = explode('|', $item->images);?>
                            
                            <img src="{{asset('images')}}/{{$images[0]}}" alt="Product image" class="product-image">
                            <?php }?>
                        </a> 


                        <div class="product-action">                            
                            <a href="javascript:void(0)" class="btn-product btn-cart addToCart" data-id="{{$item->id}}"><span>Add to cart</span></a>                            
                            
                            @if (Session::get('user'))
                                <a href="javascript:void(0)" class="addToWishlist btn-product btn-wishlist" title="Wishlist" data-id="{{$item->id}}"><span>Add to Wishlist</span></a>
                            @else
                                <a href="{{url('login')}}" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                            @endif

                        </div><!-- End .product-action -->
                        

                    </figure><!-- End .product-media -->
                    <div id="message{{$item->id}}"></div>

                    <div class="product-body">
                        {{-- <div class="product-cat">
                            <a href="#">Women</a>
                        </div> --}}
                        
                        <!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{URL::to('product')}}/{{$item->id}}">{{$item->name}}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            ${{$item->price}}
                        </div><!-- End .product-price -->
                        {{-- <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container --> --}}

                        {{-- <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #806b3e;"><span class="sr-only">Color name</span></a>
                        </div> --}}
                        
                        <!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div>
            </div>
        @endforeach
              
                
            
                
            </div></div>
                
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button></div>
                
                <div class="owl-dots disabled">
                    
                    <button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>

<script>    
    $( document ).ready(function() {
        // wishlist start
        $('#addToWishlist').click(function (event){  
            event.preventDefault();            
            var id = $(this).data('id');

            $.ajax({
            url:"add-to-wishlist",
            data: {
                _token: '{{csrf_token()}}',
                id: id
            },
            type: 'POST',
            success: function(response){           

                if(response.success==true){  
                   var string = '<p class="alert alert-success">'+response.data+'</p>';
                   $('#message').html(string);
                   console.log('wishlist added.'); 
                }
                else{
                  var string = '<p class="alert alert-danger">'+response.data+'</p>';
                   $('#message').html(string);  
                }               
            }
            });
        });
    // wishlist end

    // wishlist class start
        $('.addToWishlist').click(function (event){  
            event.preventDefault();            
            var id = $(this).data('id');
                            
            $.ajax({
            url:"add-to-wishlist",
            data: {
                _token: '{{csrf_token()}}',
                id: id
            },
            type: 'POST',
            success: function(response){           

                if(response.success==true){  
                   var string = '<p class="alert alert-success">'+response.data+'</p>';
                   $('#message'+response.product_id+'').html(string);
                   console.log(response.product_id); 
                }
                else{
                  var string = '<p class="alert alert-danger">'+response.data+'</p>';
                  $('#message'+response.product_id+'').html(string);
                }               
            }
            });
        });
    // wishlist end
});
</script>
@endsection