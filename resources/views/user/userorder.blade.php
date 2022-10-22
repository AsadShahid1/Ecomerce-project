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
    <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
        <h6 class="fs-base text-light mb-0">All Orders:</h6>

      </div>
      <div class="table-responsive fs-md mb-4">

        @if ($orders->count() != 0)

          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>Order #</th>
                <th>Date Purchased</th>
                <th>Status</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td class="py-3">
                  <a class="nav-link-style fw-medium fs-sm order-det" href="#order-details" data-route="" data-bs-toggle="modal">{{$order->order_number}}</a>
                </td>
                <td class="py-3">
                    {{-- {{$order->created_at}} --}}
                  {{$order->getCreatedAtAttribute($order->created_at)}}
                </td>
                @php
                    if($order->status == "pending" )
                      $class ="btn btn-warning";
                    elseif($order->status == "dispatched")
                    $class ="btn btn-info";
                    elseif($order->status == "cancelled")
                    $class ="btn btn-danger";
                    elseif($order->status == "approved" || $order->status == "delivered")
                    $class ="btn btn-success";
                @endphp
                <td class="py-3"><span class="badge {{$class}} m-0">{{$order->status}}</span></td>
                <td class="py-3">${{$order->amount}}</td>
              </tr>
              @endforeach

            </tbody>
          </table>

        @else
        <div class="text-center">
          <h3 class="text-danger">No Orders Found</h3>
        </div>
        @endif
      </div>
</div>



@include('admin.components.footer')

           


       


   
