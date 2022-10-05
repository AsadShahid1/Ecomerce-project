@include('admin.components.header')
@include('admin.components.sidebar')
@include('admin.components.topnav')

<!-- page content -->
<div class="right_col" role="main">
    @include('admin.components.color_theme')

    <!-- top tiles -->
    <div class="row" style="">
        <div class="col-4">
            <div class="card bg-light mb-3 " style="max-width: 18rem;">
                <div class="card-header"><i class="fa fa-user" style="font-size:20px"> Total Users</i>
                </div>
                <div class="card-body">
                    <h5 class="card-text">
                     {{$active_users}}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 " style="max-width: 18rem;">
                <div class="card-header"><i class="fa fa-shopping-bag" style="font-size:20px"> Total Revenue </i>
                </div>
                <div class="card-body">
                    <h5 class="card-text">0</h5>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 " style="max-width: 18rem;">
                <div class="card-header"><i class="fa fa-product-hunt" style="font-size:20px"> Total Products </i>
                </div>
                <div class="card-body">
                    <h5 class="card-text">{{$total_products}}</h5>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 " style="max-width: 18rem;">
                <div class="card-header"><i class="fa fa-shopping-cart" style="font-size:20px"> Total Orders </i>
                </div>
                <div class="card-body">
                    <h5 class="card-text">0</h5>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card bg-light mb-3 " style="max-width: 18rem;">
                <div class="card-header"><i class="fa fa-clone"style="font-size:20px"> Total Offers </i>
                </div>
                <div class="card-body">
                    <h5 class="card-text">{{$total_offers}}</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>



@include('admin.components.footer')

           


       


   
