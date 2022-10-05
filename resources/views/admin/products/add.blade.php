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
                <li class="breadcrumb-item"><a href="#"><b>Product Management</b></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Product</a></li>
            </ol>
        </nav>
        <!--end breadcrumb-->
        <form method="POST" action="{{ route('product.store') }}">
            @csrf

            <div class="form-group w-75">
                <label for="sel1">Select Category :</label>
                <select class="form-control" id="sel1" name="category_id">
                    @foreach ($categories as $cat)
                        <option value="{{old('category_id',$cat->id)}}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group w-75">
                <label for="sel2">Select Brand :</label>
                <select class="form-control" id="sel2" name="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{old('brand_id',$brand->id)}}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <label for="p_name">Product Name :</label>
            <input type="text" class="form-control w-50" id="p_name" value="{{old('name')}}" name="name">
            <label for="weight">Weight :</label>
            <input type="text" class="form-control w-50" id="weight" name="weight"  value="{{old('weight')}}">
            <label for="unit">Unit :</label>
            <input type="text" class="form-control w-50" id="unit" name="measuring_unit" value="{{old('measuring_unit')}}">

            <label for="sp">Standard Price :</label>
            <input type="text" class="form-control w-50" id="sp" name="standard" value="{{old('standard')}}">
            <label for="pp">Premium Price :</label>
            <input type="text" class="form-control w-50" id="pp" name="premium" value="{{old('premium')}}">
            <label for="gp">Gold Price :</label>
            <input type="text" class="form-control w-50" id="gp" name="gold" value="{{old('gold')}}">
        
            <br>
            <label for="desc">Write Product Description :</label><br>
            <div id="summernote" name="description" value="{{old('description')}}">

            </div><br><br>
            <label for="img">Select Product Image </label><br>
            <input type="file" name="product_image" id="img" ><br>
            <label for="color">Select Color </label><br>
            <input type="color" name="color" id="color" ><br>

                {{-- <button type="button" class="btn btn-primary add-color mt-5">Add Color</button>
                <div class="select-color ">
                    <div class="col-4 form-check">
                        <span class="text-danger remove"><i class="fa fa-close"></i></span>
                        <label class="form-check-label" for="colors">Select Color</label>
                        <input name="colors[]" class="form-control" value="" type="color" id="colors">
                        <button type="button" class="btn btn-primary add-color mt-5">Add New Color <i
                            class="fa fa-plus"></i></button>
                    </div>
                </div> --}}
    

            <div class="row form-group m-3">
                <div class="col-2 form-check form-switch ">
                    <input type="checkbox" class="form-check-input" id="customSwitches" name="status" checked>
                    <label class="form-check-label" for="customSwitches">Active</label>
                </div>
                <div class="col-2 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="customSwitches2" name="in_stock">
                    <label class="form-check-label" for="customSwitches2">In Stock</label>
                </div>
                <div class="col-2 form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="customSwitches3" name="is_featured">
                    <label class="form-check-label" for="customSwitches3">Featured</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"> Submit </button>

        </form>
    </div>
</div>

@include('admin.components.footer')
