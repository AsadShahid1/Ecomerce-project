<aside class="col-lg-3 order-lg-first">
    <div class="sidebar sidebar-shop">
        <div class="widget widget-clean">
            <label>Filters</label>
            <a href="#" class="sidebar-filter-clear">Clean All</a>
        </div><!-- End .widget widget-clean -->

        {{-- category filter --}}

        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                    Category
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-1">
                <div class="widget-body ">
                    <div class="filter-items filter-items-count">
                        {{-- <input type="text" class="form-controller" id="search" name="search"> --}}

                        @foreach ($categories as $cat)
                            <div class="filter-item ">
                                <ul class="row">
                                    <input data-type="cat"  type="checkbox" class="mr-3 search-cat filter" value="{{$cat->id}}" id="cat-{{$cat->id}}">
                                    <li for="cat-{{$cat->id}}">{{ $cat->name }}</li>
                                </ul>
                                <span class="item-count">{{$cat->products()->count()}}</span>
                            </div><!-- End .filter-item -->
                        @endforeach
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

        {{-- brand filter --}}
        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                    Brand
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-4">
                <div class="widget-body">
                    <div class="filter-items filter-items-count">
                        {{-- <div class="input-group input-group mb-2">
                            <input class="widget-filter-search form-control rounded-end" type="text"
                                placeholder="Search"><i class=" fa fa-search "></i>
                        </div> --}}
                        @foreach ($brands as $brand)
                            <div class="filter-item ">
                                <ul class="row">
                                    <input type="checkbox" data-type="brand" class="mr-3 filter" value="{{$brand->id}}" id="cat-{{$brand->id}}">
                                    <li for="cat-{{$brand->id}}">{{ $brand->name }}</li>
                                </ul>
                                <span class="item-count">{{$brand->products->count()}}</span>
                            </div><!-- End .filter-item -->
                        @endforeach
                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->

        {{-- price filter --}}

        <div class="widget widget-collapsible">

            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                    Price
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-5">
                <div class="widget-body">
                    <div class="filter-price">
                        <div class="input-group input-group mb-2">
                            <div class="filter-price-text filter">
                                {{-- Price Range: --}}
                                <p>
                                    <label for="amount">Price range:</label>
                                    <input type="text" data-type="price" id="amount" class="filter" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                  </p>

                                   
                                  <div id="slider-range"></div>
                                
                                {{-- <span id="filter-price-range">${{ $min_price }} - ${{ $max_price }}</span> --}}
                            </div><!-- End .filter-price-text -->

                    </div><!-- End .filter-price -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->
    </div><!-- End .sidebar sidebar-shop -->
</aside><!-- End .col-lg-3 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .page-content -->
</main>
