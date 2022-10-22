@include('admin.components.header')
@include('admin.components.sidebar')
@include('admin.components.topnav')
<div class="right_col" role="main">
    <div class="divcol">
        @include('admin.components.color_theme')
        <!--breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>{{ $main_title ?? '' }}</b></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $sub_title ?? '' }}</a></li>
            </ol>
        </nav>
        <!--end breadcrumb-->

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Order #</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row"> {{ $order->order_number }}</th>
                        <td>{{ $order->checkout_first }} {{ $order->checkout_last }}</td>
                        <td>{{ $order->checkout_email }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>
                            <select id="{{$order->id}}" onchange="changeStatus({{$order->id}})" name="status" class="form-select">
                                <?php $status= old('status', @$order->status); ?>
                                <option value="pending" @if(($order->status=='pending')) selected="selected" @endif>Pending</option>
                                <option value="approved" @if(($order->status=='approved')) selected="selected" @endif>Approved</option>
                                <option value="cancelled" @if($order->status=='cancelled') selected="selected" @endif>Cancelled</option>
                                <option value="dispatched" @if($order->status=='dispatched') selected="selected" @endif>Dispatched</option>
                                <option value="delivered" @if($order->status=='delivered') selected="selected" @endif>Delivered</option>
                            </select>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                {{ $order->order_number }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <caption>Order Details</caption>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Color</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Image</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->items as $detail)
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>{{ $detail->product->name }}</td>
                                                                <td>{{ $detail->color }}</td>
                                                                <td>{{ $detail->product_price }}</td>
                                                                <td><img src="{{asset('products/'.$detail->product->product_image)}}" alt="" height="100px" width="100px"></td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($order->status != 'approved')
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#myModal">Change Status</button>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Some text in the modal.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @else
                            <p class="text-danger">Status Approved</p>
                            @endif

                            {{-- <a title="Edit" href="" class="btn btn-link"><i class="fa fa-edit fa-xs"></i></a> --}}
                        </td>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@include('admin.components.footer')
