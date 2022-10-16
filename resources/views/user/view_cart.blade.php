@php
    extract($data);
@endphp
<!DOCTYPE html>
<html lang="en">


<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User - Ecommerce</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-13.css') }}">
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

</head>

<body>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->


        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products->count()>0)

                                      @foreach ($products as $item)
                                        <tr id="productremove{{ $item->id }}">
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('products/' . $item->product_image) }}"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $item->name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">${{ $item->standard }}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control quantity"
                                                        data-route="{{ route('cart.quantity', $item->id) }}"
                                                        value="{{ $item->squantity ? $item->squantity : '0' }}"
                                                        min="1" step="1"
                                                        id="quantity{{ $item->id }}" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="remove-col"><button class="btn-remove remove-product"
                                                    data-route="{{ route('product.remove', $item->id) }}"
                                                    data-remove="productremove{{ $item->id }}"><i
                                                        class="icon-close"></i></button></td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <div class="text-center">
                                        <h3 class="text-danger">Cart is empty</h3>
                                    </div>
                                    @endif


                        </div>


                        </tbody>
                        </table><!-- End .table table-wishlist -->

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td><span class="total_price">${{$total}}</span></td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td><span class="total_price">${{$total}}</span></td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{route('user.checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED
                                TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{route('shop')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

</body>
@include('user.components.footer')
