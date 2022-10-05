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
        <button type="button" class="btn btn-primary">Add Offer</button>
        <br><br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->price}}</td>
                    <td>{{$offer->created_at}}</td>
                    <td>
                        <a title="Modify" href="" class="btn btn-link" data-toggle="ajaxModal"><i
                                class="fa fa-edit fa-xs"></i></a>
                        <a href="" title="Delete" class="btn btn-link delete-offer" id=""
                            data-name=""><i class="fa fa-trash fa-xs"></i> </a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    
    </div>
  </div>
@include('admin.components.footer')
