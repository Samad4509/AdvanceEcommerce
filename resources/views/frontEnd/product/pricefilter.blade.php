<div class="row row--15">
    @foreach($products as $product)
        <div class="col-xl-4 col-sm-6">
            <div class="axil-product product-style-one mb--30">
                <div class="thumbnail">
                    <a href="{{route('product.details',$product->id)}}">
                        <img src="{{asset($product->image)}}" style="height: 250px" alt="Product Images">
                    </a>
                    <div class="label-block label-right">
                        
                        @php($off = (($product->regular_price - $product->selling_price)/$product->regular_price )* 100)
                        <div class="product-badget">{{ceil($off)}}% OFF</div>
                    </div>
                    <div class="product-hover-action">
                        <ul class="cart-action">
                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="inner">
                        <h5 class="title"><a href="{{route('product.details',$product->id)}}">{{$product->name}}</a></h5>
                        <div class="product-price-variant">
                            <span class="price current-price">&#2547; {{number_format($product->selling_price)}}</span>
                            <span class="price old-price">&#2547; {{number_format($product->regular_price)}}</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Single Product  -->
    @endforeach                
</div>                      
                        
                        
                        