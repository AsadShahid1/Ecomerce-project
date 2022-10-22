<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />

    <title>User Dashboard </title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin_asset/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin_asset/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('admin_asset/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('admin_asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('admin_asset/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('admin_asset/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin_asset/build/css/custom.min.css') }}" rel="stylesheet">

    {{-- summernote editor --}}
    <link rel="stylesheet" href="{{ asset('summernote-0.8.18-dist/summernote.css') }}">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i><span>Admin Panel</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('images/img.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    @include('user.components.sidebar')

                    @include('admin.components.topnav')


                    <!-- page content -->
                    <div class="right_col" role="main">
                        <table class="table table-wishlist table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if (!Auth::user()->wishlist->count() == 0)
                                    <div id="wishlist">
                                        @foreach ($wishlists as $wishlist)
                                            <tr id="remove{{ $wishlist->id }}">
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset('products/' . $wishlist->product->product_image) }}"
                                                                    alt="Product image">
                                                            </a>
                                                        </figure>
                                                    </div><!-- End .product -->
                                                </td>
                                                <td>
                                                    <h3 class="product-title">
                                                        <a href="#">{{ $wishlist->product->name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </td>
                                                <td class="price-col">{{ $wishlist->product->standard }}</td>
                                                <td class="remove-col"><button class="btn-remove btn-danger wishremove"
                                                        data-route="{{ route('wishlist.remove', $wishlist->id) }}"
                                                        data-item="remove{{ $wishlist->id }}">Remove</button></td>
                                            </tr>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h3 class="text-danger">Wishlist is empty</h3>
                                    </div>
                                @endif


                            </tbody>
                        </table><!-- End .table table-wishlist -->
                    </div>
                  


                    @include('admin.components.footer')
