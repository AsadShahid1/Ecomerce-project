@foreach ($products as $product)
    <div class="col-6 col-md-4 col-lg-4">
        <div class="product product-7 text-center">
            <figure class="product-media">
                <span class="product-label label-new">New</span>
                <a href="product.html">
                    <img src="{{ asset('products/' . $product->product_image) }}" alt="Product image"
                        class="product-image">
                </a>

                @auth
                    <div class="product-action-vertical add-wishlist" data-route="{{ route('add-wishlist', $product->id) }}">
                        <a href="javascript:void" value="{{ $product->id }}"
                            class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                wishlist</span></a>
                    </div><!-- End .product-action-vertical -->
                    <div class="product-action add-to-cart" data-route="{{ route('add-cart', $product->id) }}">
                        <a href="javascript:void" class="btn-product btn-cart"><span>Add to
                                cart</span></a>
                    </div><!-- End .product-action -->
                @endauth

            </figure><!-- End .product-media -->

            <div class="product-body">
                <div class="product-cat">
                    <a href="#">{{ $product->category->name }}</a>
                </div><!-- End .product-cat -->
                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3>
                <!-- End .product-title -->
                <div class="product-price">
                    Price : ${{ $product->standard }} - ${{ $product->gold }}
                </div><!-- End .product-price -->

            </div><!-- End .product-body -->
        </div><!-- End .product -->
    </div><!-- End .col-sm-6 col-lg-4 -->
@endforeach
