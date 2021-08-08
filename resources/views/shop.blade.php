
@extends('layouts.master')
@section('main_content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Top 3D Models<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{URL::to('/shop')}}">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="d-none1 toolbox">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                </div><!-- End .toolbox-left -->

                <div class="toolbox-center">
                    <div class="toolbox-info">
                        Showing <span>12 of 56</span> Products
                    </div><!-- End .toolbox-info -->
                </div><!-- End .toolbox-center -->

                <div class="toolbox-right">
                    <div class="toolbox-sort">
                        <label for="sortby">Sort by:</label>
                        <div class="select-custom">
                            <select name="sortby" id="sortby" class="form-control">
                                <option value="popularity" selected="selected">Most Popular</option>
                                <option value="rating">Most Rated</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div><!-- End .toolbox-sort -->
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">
                    @foreach($data as $item)      
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="product">
                            <figure class="product-media">
                                
                                    <?php 
                                        $now = time();  
                                        $created_at = strtotime($item->created_at);
                                        $datediff = $now - $created_at;
                                        $difference = round($datediff / (60 * 60 * 24));
                                        if($difference < 7){
                                            echo '<span class="product-label label-new">New</span>';
                                        }
                                    ?>
                                

                                <?php if($images = $item->images) $images = explode('|', $images);?>

                                <a href="product/{{$item->id}}">
                                    <img src="{{asset('images')}}/{{$images[0]}}" alt="{{$images[0]}}" class="product-image">
                                </a>

                                <div class="product-action action-icon-top">
                                   
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
                                    <a href="javascript:void(0)" class="btn-product btn-cart add-to-cart {{$class}}" data-id="{{$item->id}}"><span class="add-to-cart-btn">Add to cart</span></a>

                                    <a href="{{URL::to('quick-view')}}/{{$item->id}}" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                   


                                </div>
                            </figure>

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{$item->catName}}</a>
                                </div>
                                <h3 class="product-title"><a href="product/{{$item->id}}">{{$item->name}}</a></h3>
                                <div class="product-price">
                                    ${{$item->price}}
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 0%;"></div>
                                    </div>
                                    <span class="ratings-text">( 0 Reviews )</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     @endforeach

                </div><!-- End .row -->
                <div class="" id="status">
                        
                </div>
                <div class="load-more-container text-center">
                    <a href="javascript:void(0)" data-count="20" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a>
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">
                    <form action="" method="get">
                        <div class="widget widget-clean">
                            <label><i class="icon-close"></i>Filters</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-1">
                                                <label class="custom-control-label" for="cat-1">Dresses</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-2">
                                                <label class="custom-control-label" for="cat-2">T-shirts</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">0</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-3">
                                                <label class="custom-control-label" for="cat-3">Bags</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">4</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-4">
                                                <label class="custom-control-label" for="cat-4">Jackets</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">2</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-5">
                                                <label class="custom-control-label" for="cat-5">Shoes</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">2</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-6">
                                                <label class="custom-control-label" for="cat-6">Jumpers</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">1</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-7">
                                                <label class="custom-control-label" for="cat-7">Jeans</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">1</span>
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="cat" value="cat1" id="cat-8">
                                                <label class="custom-control-label" for="cat-8">Sportwear</label>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">0</span>
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            {{-- <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3> --}}
                            
                            <!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                <label class="custom-control-label" for="size-1">XS</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                <label class="custom-control-label" for="size-2">S</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="size-3">
                                                <label class="custom-control-label" for="size-3">M</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="size-4">
                                                <label class="custom-control-label" for="size-4">L</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                <label class="custom-control-label" for="size-5">XL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                <label class="custom-control-label" for="size-6">XXL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                    </div><!-- End .filter-colors -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget --> --}}

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Brand
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-1">
                                                <label class="custom-control-label" for="brand-1">Next</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-2">
                                                <label class="custom-control-label" for="brand-2">River Island</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-3">
                                                <label class="custom-control-label" for="brand-3">Geox</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-4">
                                                <label class="custom-control-label" for="brand-4">New Balance</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-5">
                                                <label class="custom-control-label" for="brand-5">UGG</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-6">
                                                <label class="custom-control-label" for="brand-6">F&amp;F</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brand-7">
                                                <label class="custom-control-label" for="brand-7">Nike</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range">$0 - $750</span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-connects"><div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.75, 1);"></div></div><div class="noUi-origin" style="transform: translate(-100%, 0px); z-index: 5;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="550.0" aria-valuenow="0.0" aria-valuetext="$0"><div class="noUi-touch-area"></div><div class="noUi-tooltip">$0</div></div></div><div class="noUi-origin" style="transform: translate(-25%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="200.0" aria-valuemax="1000.0" aria-valuenow="750.0" aria-valuetext="$750"><div class="noUi-touch-area"></div><div class="noUi-tooltip">$750</div></div></div></div></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget --> --}}

                        <div>
                            <button type="submit" class="btn btn-warning w-100">Search</button>
                        </div>
                    </form>
                </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
@endsection

@push('js')

    <script>
        $(document).ready(function(){

            // load more function
            $(document).on('click','.btn-load-more',function(){
                var count = $(this).data('count');
                count = count+20;
                var page = count/20;

                $.get('?page='+page, function(data, status){
                    var items =  JSON.parse(data).data;
                    var data_status = jQuery.isEmptyObject(items);
                    if(!data_status){
                        items.forEach(element => {
                            var html = '<div class="col-6 col-md-4 col-lg-4 col-xl-3"> <div class="product"> <figure class="product-media"> <span class="product-label label-new">:product_status</span> <a href=":product_url"> <img src=":image_src" alt=":image_name" class="product-image"> </a> <div class="product-action action-icon-top"> <a href="javascript:void(0)" class="btn-product btn-cart add-to-cart " data-id=":id"><span class="add-to-cart-btn">Add to cart</span></a> <a href=":quick_view_url" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a> </div> </figure> <div class="product-body"> <div class="product-cat"> <a href="#">:cat_name</a> </div> <h3 class="product-title"><a href=":product_url">:name</a></h3> <div class="product-price"> $:price </div> <div class="ratings-container"> <div class="ratings"> <div class="ratings-val" style="width: 0%;"></div> </div> <span class="ratings-text">( 0 Reviews )</span> </div> </div></div></div>';
                            // time difference 
                            var start_date= new Date(element.created_at);
                            var end_date= new Date();
                            var diff = end_date-start_date;
                            var days = Math.round(diff/(1000 * 3600 * 24));
                            
                            // image
                            var images = element.images.split('|');
                            var image_src = "{{asset('images')}}/"+images[0];


                            // product url 
                            var quick_view_url = "{{URL::to('quick-view')}}/"+element.id;
                            var product_url = "product/"+element.id;

                            // append data to html template
                            html = html.replace(":id",element.id);
                            html = html.replace(":name",element.name);
                            html = html.replace(":image_src",image_src);
                            html = html.replace(":image_name",images[0]);
                            html = html.replace(":quick_view_url",quick_view_url);
                            html = html.replace(":product_url",product_url);
                            html = html.replace(":price",element.price);
                            html = html.replace(":cat_name",element.catName);
                            if(days<7){
                                html = html.replace(":product_status",element.id);
                            }
                            else{
                                html = html.replace(":product_status","");
                            }


                            $('.products .row').append(html);
                        });
                        $('.btn-load-more').data('count',count);
                    }else{
                        $('.btn-load-more').css('display',"none");

                        $('#status').html("No More Products Available");
                    }
                });

            });
        });
    </script>

@endpush