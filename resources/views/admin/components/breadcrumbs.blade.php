<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">{{$main_menu_title ?? 'User'}}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$sub_menu_title ?? ''}}</li>
            </ol>
        </nav>
    </div>

</div>
<!--end breadcrumb-->