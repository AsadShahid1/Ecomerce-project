@include('admin.components.header')
@include('admin.components.sidebar')
@include('admin.components.topnav')
<div class="right_col" role="main">
    <div class="divcol">
        @include('admin.components.color_theme')
        <!--breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>{{$main_title ?? ''}}</b></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/adminpanel') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$sub_title ?? ''}}</a></li>
            </ol>
        </nav>
        <!--end breadcrumb-->

        <form action="" method="post">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Province (State)</td>
                        <td>
                            <select class="form-select w-100 p-1" aria-label="Default select example">
                                <option selected>Select State</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Select City</td>
                        <td>
                            <select class="form-select w-100 p-1" aria-label="Default select example">
                                <option selected>Select City</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Post Code</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="" id="" class="w-100">
                        </td>
                    </tr>

                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
</div>
@include('admin.components.footer')
