<div class="bg-light pt-3 pb-5">
    <div class="container">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">All Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab" role="tab"
                            aria-controls="hot-all-tab" aria-selected="true">All</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hot-acc-link" data-toggle="tab" href="#hot-acc-tab" role="tab"
                                aria-controls="hot-acc-tab" aria-selected="false">Accessories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hot-lap-link" data-toggle="tab" href="#hot-lap-tab" role="tab"
                                aria-controls="hot-lap-tab" aria-selected="false">Laptops</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hot-mob-link" data-toggle="tab" href="#hot-mob-tab" role="tab"
                                aria-controls="hot-mob-tab" aria-selected="false">Mobiles</a>
                        </li>

                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-acc-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach ($products as $product)
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="{{ asset('products/' . $product->product_image) }}" alt="Product image"
                                        class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                        title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                                            cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $product->category->name }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">${{ $product->standard }}</span>
                                    <span class="old-price">to {{ $product->gold }}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="hot-acc-tab" role="tabpanel" aria-labelledby="hot-acc-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach ($products as $product)
                        @if ($product->category->name == 'Accessories'))
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{ asset('products/' . $product->product_image) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                to wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-compare"
                                            title="Compare"><span>Compare</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                            title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                                                cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $product->category->name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">{{$product->standard}}</span>
                                        <span class="old-price">to {{$product->gold}}</span>
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" class="active" style="background: #b58555;"><span
                                                class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #93a6b0;"><span class="sr-only">Color
                                                name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endif
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="hot-lap-tab" role="tabpanel" aria-labelledby="hot-lap-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach ($products as $product)
                        @if ($product->category->name == 'Laptops')
                            <div class="product">
                                <figure class="product-media">
                                    <span class="product-label label-sale">Sale</span>
                                    <a href="product.html">
                                        <img src="{{asset('products/'.$product->product_image)}}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#"
                                            class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a>
                                        <a href="#" class="btn-product-icon btn-compare"
                                            title="Compare"><span>Compare</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                            title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add
                                                to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$product->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">{{$product->standard}}</span>
                                        <span class="old-price">to {{$product->gold}}</span>
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 6 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-dots">
                                        <a href="#" class="active" style="background: #b58555;"><span
                                                class="sr-only">Color name</span></a>
                                        <a href="#" style="background: #93a6b0;"><span class="sr-only">Color
                                                name</span></a>
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endif
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="hot-mob-tab" role="tabpanel" aria-labelledby="hot-mob-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach ($products as $product)
                    @if ($product->category->name == 'Mobiles')
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="{{asset('products/'.$product->product_image)}}"
                                        alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#"
                                        class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                            wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare"
                                        title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                        title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add
                                            to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{$product->category->name}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">{{$product->name}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">{{$product->standard}}</span>
                                    <span class="old-price">to {{$product->gold}}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #b58555;"><span
                                            class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #93a6b0;"><span class="sr-only">Color
                                            name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endif
                @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->

        </div><!-- End .tab-content -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-5 -->

<div class="mb-3"></div><!-- End .mb-3 -->
