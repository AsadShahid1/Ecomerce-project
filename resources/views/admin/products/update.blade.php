@include('admin.components.header')
@include('admin.components.sidebar')
@include('admin.components.topnav')
<div class="right_col" role="main">
    <div class="divcol ">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @include('admin.components.color_theme')
        <!--breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>{{$main_title}}</b></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$sub_title}}</a></li>
            </ol>
        </nav>
        <!--end breadcrumb-->
        <form method="post" action="{{ route('product.update' , $product->id) }}" class="bootstrap-modal-form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group w-75">
                <label for="sel1">Select Category :</label>
                <select class="form-control" id="sel1" name="category_id">
                    @foreach ($categories as $cat)
                        <option value="{{$cat->id }}" >{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group w-75">
                <label for="sel2">Select Brand :</label>
                <select class="form-control" id="sel2" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="p_name">Product Name :</label>
            <input type="text" class="form-control w-50" id="p_name" name="name" value="{{$product->name}}">
            <label for="weight">Weight :</label>
            <input type="text" class="form-control w-50" id="weight" name="weight" value="{{$product->weight}}">
            <label for="unit">Unit :</label>
            <input type="text" class="form-control w-50" id="unit" name="measuring_unit"  value="{{$product->measuring_unit}}">

            <label for="sp">Standard Price :</label>
            <input type="text" class="form-control w-50" id="sp" name="standard" value="{{$product->standard}}">
            <label for="pp">Premium Price :</label>
            <input type="text" class="form-control w-50" id="pp" name="premium" value="{{$product->premium}}">
            <label for="gp">Gold Price :</label>
            <input type="text" class="form-control w-50" id="gp" name="gold" value="{{$product->gold}}">
            <label for="sel1">Select Size :</label>
            <select class="form-control" id="size" name="size[]" multiple>
                <option value="">Large</option>
                <option value="">Medium</option>
                <option value="">Small</option>
            </select>
            <br>
            <label for="desc">Write Product Description :</label><br>
            <div id="summernote" name="description" value="value="{{$product->description}}"">

            </div><br><br>
            <label for="img">Select Product Image </label><br>
            <input type="file" name="product_image" id="img">
            <div class="row form-group mb-3">
                <div class="col-4">
                    <label for="color">Select Product Color : </label><br>
                    <input type="color" name="color" id="color">
                </div>
                <div class="col-2 custom-control custom-switch">
                    <label class="custom-control-label" for="customSwitches">Active</label>
                    <input type="checkbox" class="custom-control-input" id="customSwitches" name="status">
                </div>
                <div class="col-2 custom-control custom-switch">
                    <label class="custom-control-label" for="customSwitches2">In Stock</label>
                    <input type="checkbox" class="custom-control-input" id="customSwitches2" name="in_stock">
                </div>
                <div class="col-2 custom-control custom-switch">
                    <label class="custom-control-label" for="customSwitches3">Featured</label>
                    <input type="checkbox" class="custom-control-input" id="customSwitches3" name="is_featured">
                </div>
            </div>
            {{-- <input class="btn btn-primary update" type="submit" value="Update Product"> --}}
            <button data-route="{{route('product.update', $product->id)}}" class="btn btn-primary">Update Product </button>

        </form>
    </div>
</div>

@include('admin.components.footer')
