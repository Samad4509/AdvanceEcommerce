@extends('frontEnd.master')
@section('title')
    Product
@endsection

@section('content')
<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                        </ul>
                        <h1 class="title">Explore All Products</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('frontend/assets')}}/images/product/product-45.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="axil-shop-sidebar">
                        <div class="d-lg-none">
                            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="toggle-list product-categories active">
                            <h6 class="title">CATEGORIES</h6>
                            <div class="shop-submenu">
                                <ul>
{{--                                    <li class="current-cat"><a href="#">Sun Care</a></li>--}}
                                    @foreach($categories as $category)
                                    <li><a href="{{route('category.products',$category->id)}}">{{$category->name}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-categories product-gender active">
                            <h6 class="title">GENDER</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#">Men (40)</a></li>
                                    <li><a href="#">Women (56)</a></li>
                                    <li><a href="#">Unisex (18)</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-color active">
                            <h6 class="title">COLORS</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#" class="color-extra-01"></a></li>
                                    <li><a href="#" class="color-extra-02"></a></li>
                                    <li><a href="#" class="color-extra-03"></a></li>
                                    <li><a href="#" class="color-extra-04"></a></li>
                                    <li><a href="#" class="color-extra-05"></a></li>
                                    <li><a href="#" class="color-extra-06"></a></li>
                                    <li><a href="#" class="color-extra-07"></a></li>
                                    <li><a href="#" class="color-extra-08"></a></li>
                                    <li><a href="#" class="color-extra-09"></a></li>
                                    <li><a href="#" class="color-extra-10"></a></li>
                                    <li><a href="#" class="color-extra-11"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="toggle-list product-size active">
                            <h6 class="title">SIZE</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#">XS</a></li>
                                    <li><a href="#">S</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                    <li><a href="#">3XL</a></li>
                                    <li><a href="#">4XL</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="toggle-list product-price-range active">
                            <h6 class="title">PRICE</h6>
                            <div class="shop-submenu">
                                <ul>
                                    <li class="chosen"><a href="#"> &#2547; 30</a></li>
                                    <li><a href="#">&#2547; 5000</a></li>
                                </ul>
                                <form action="#" class="mt--25">
                                    <div id="slider-range"></div>
                                    <div class="flex-center mt--20">
                                        <span class="input-range">Price: </span>
                                        <input type="text" id="amount" class="amount-range" readonly>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <button class="axil-btn btn-bg-primary">All Reset</button>
                    </div>
                    <!-- End .axil-shop-sidebar -->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--40">
                                <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                                    <!-- Start Single Select  -->
                                    <span class="filter-results">Showing 1-12 of 84 results</span>
                                    <select class="single-select" id="sort-by">
                                        <option value="">Select here..</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="newest">Newest</option>
                                        <option value="highest_price">Highest Price</option>
                                        <option value="lowest_price">Lowest Price</option>
                                    </select>
                                    <!-- End Single Select  -->
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                    
                       
                       <div class="search-result">
                            @include('frontEnd.product.pricefilter')
                       </div>

                    
                    <div class="text-center pt--20">
                        <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->

    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--5">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
</main>

@endsection
