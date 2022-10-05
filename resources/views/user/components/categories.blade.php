<div class="container">
    <h2 class="title text-center mb-2">All Categories</h2><!-- End .title -->

    <div class="cat-blocks-container">
        <div class="row">
           @foreach ($categories as $cat)
           <div class="col-6 col-sm-4 col-lg-2">
            <a href="#" class="cat-block">
                <figure>
                    <span>
                        <img src="assets/images/demos/demo-13/cats/1.jpg" alt="Category image">
                    </span>
                </figure>

                <h3 class="cat-block-title">{{$cat->name}}</h3><!-- End .cat-block-title -->
            </a>
        </div><!-- End .col-sm-4 col-lg-2 -->
           @endforeach
        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->

<div class="mb-2"></div><!-- End .mb-2 -->

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="assets/images/demos/demo-13/banners/banner-1.jpg" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white"><a href="#">Weekend Sale</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Lighting <br>& Accessories <br><span>25% off</span></a></h3><!-- End .banner-title -->
                    <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-3 -->

        <div class="col-sm-6 col-lg-3 order-lg-last">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="assets/images/demos/demo-13/banners/banner-3.jpg" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white"><a href="#">Smart Offer</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Anniversary <br>Special <br><span>15% off</span></a></h3><!-- End .banner-title -->
                    <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-3 -->

        <div class="col-lg-6">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="assets/images/demos/demo-13/banners/banner-2.jpg" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Amazing Value</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Clothes Trending <br>Spring Collection 2019 <br><span>from $12,99</span></a></h3><!-- End .banner-title -->
                    <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
        </div><!-- End .col-lg-6 -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-3"></div><!-- End .mb-3 -->