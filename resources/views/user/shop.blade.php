
@include('user.components.header')
@include('user.components.nav')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Now!<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info ">
                                <h4 class="text-dark">Products</h4>
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->
                    </div><!-- End .toolbox -->
                    <x-auth-session-status class="text-2xl mb-4" :status="session('message')"></x-auth-session-status>
                    <div class="products mb-3">
                        <div class="row justify-content-center" id="result">
                                @include('user.components.filtered-products')
                        </div><!-- End .row -->
                        {{ $products->links() }}
                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
@include('user.components.filters')
@include('user.components.footer')
            
