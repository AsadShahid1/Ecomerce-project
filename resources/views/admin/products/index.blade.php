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
        <x-auth-session-status class="text-2xl mb-4" :status="session('message')"></x-auth-session-status>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">S_Price</th>
                    <th scope="col">P_Price</th>
                    <th scope="col">G_Price</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->standard }}</td>
                        <td>{{ $product->premium }}</td>
                        <td>{{ $product->gold }}</td>
                        <td class="text-center">
                            @if ($product->in_stock == 0)
                                <span class="btn btn-xs btn-danger">Out of Stock</span>
                            @else
                                <span class="btn btn-xs btn-success ">In Stock</span>
                            @endif
                        </td>
                        <td>
                            <a title="Edit" href="{{ route('product.edit', $product->id) }}" class="btn btn-link"><i class="fa fa-edit fa-xs"></i></a>
   
                                <button title="Delete" data-route="{{route('product.destroy', $product->id)}}" class="btn btn-link delete"><i
                                    class="fa fa-trash fa-xs"></i> </button>
                            
 
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@include('admin.components.footer')
