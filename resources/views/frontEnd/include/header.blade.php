<!-- Start Header -->
<header class="header axil-header header-style-2">
    <div class="header-top-campaign">
        <div class="container position-relative">
            <div class="campaign-content">
                <div class="campaign-countdown"></div>
                <p>Open Doors To A World Of Fashion Get <a href="#">Get Your Offer</a></p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>
    <!-- Start Header Top Area  -->
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="header-brand">
                        <a href="{{route('home')}}" class="logo logo-dark">
                            <!-- <img src="{{asset('frontend/assets')}}/images/logo/logo.png" alt="Site Logo"> -->
                             Demo
                        </a>
                        <a href="{{route('home')}}" class="logo logo-light">
                            <img src="{{asset('frontend/assets')}}/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7">
                    <div class="header-top-dropdown dropdown-box-style">
                        <div class="axil-search">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="far fa-search"></i>
                            </button>
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for...." autocomplete="off">
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USD
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">USD</a></li>
                                <li><a class="dropdown-item" href="#">AUD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">EN</a></li>
                                <li><a class="dropdown-item" href="#">ARB</a></li>
                                <li><a class="dropdown-item" href="#">SPN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area  -->

    <!-- Start Mainmenu Area  -->
    <div class="axil-mainmenu aside-category-menu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-nav-department">
                    <aside class="header-department">
                        <button class="header-department-text department-title" id="openCat">
                            <span class="icon"><i class="fal fa-bars"></i></span>
                            <span class="text">Categories</span>
                        </button>
                        <nav class="department-nav-menu" id="closeCat">
                            <button class="sidebar-close"><i class="fas fa-times"></i></button>
                            <ul class="nav-menu-list">
                                @foreach($categoriesnav as $category)
                                <li>
                                    <a href="{{route('category.products',$category->id)}} " class="nav-link {{count($category->subCategory) > 0 ? 'has-megamenu' : ''}}">
                                        <span class="menu-icon">
                                            <img src="{{asset('frontend/assets')}}/images/product/categories/cat-01.png" alt="Department">
                                        </span>
                                        <span class="menu-text">{{$category->name}}</span>
                                    </a>
                                    @if(count($category->subCategory) > 0)
                                    <div class="department-megamenu" >
                                        <div class="department-megamenu-wrap" style="width: 50%;background-color:#f0eeee">
                                            <div class="department-submenu-wrap">
                                                <div class="department-submenu">
                                                    <ul>
                                                        @foreach($category->subCategory as $subCategory)
                                                            <li>
                                                                <a href="{{route('products')}}">{{$subCategory->name}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                        </nav>
                    </aside>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="{{asset('frontend/assets')}}/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="menu-item-has-children">
                                <a href="#">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('products')}}">Products</a>
                            </li>
                            <li><a href="about-us.html">About</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Blog</a>
                                <ul class="axil-submenu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-details.html">Standard Post</a></li>
                                    <li><a href="blog-gallery.html">Gallery Post</a></li>
                                    <li><a href="blog-video.html">Video Post</a></li>
                                    <li><a href="blog-audio.html">Audio Post</a></li>
                                    <li><a href="blog-quote.html">Quote Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-sm-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="wishlist">
                            <a href="wishlist.html">
                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count">{{count(Cart::content())}}</span>
                                <i class="flaticon-shopping-cart autoload"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                @if(Session::get('customer_id'))
                                <ul>
                                    <li>
                                        <h6 class="m-0">{{Session::get('customer_name')}}</h6>
                                    </li>
                                    <li>
                                        <a href="{{route('customer.dashboard')}}">My Account</a>
                                    </li>
                                </ul>

                                @else

                                <div class="login-btn">
                                    <a href="{{route('customer.login')}}" class="axil-btn btn-bg-primary">Login</a>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a href="{{route('customer.register')}}" class="btn-link">REGISTER HERE.</a></div>

                                @endif
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area  -->
</header>
