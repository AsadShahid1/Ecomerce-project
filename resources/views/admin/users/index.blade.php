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

        <button type="button" class="btn btn-primary">Add User</button>
        <br><br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile #</th>
                    <th scope="col">P-Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }}</th>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_number}}</td>
                        <td class="text-center">

                            <select id="{{$user->id}}" onchange="changeCategory({{$user->id}})"
                                    name="price_category" data-name="{{ $user->first_name}}" class="form-select">
                                <?php $category = old('price_category', @$user->price_category); ?>
                                <option value="standard"
                                        @if(($user->price_category=='standard')) selected="selected" @endif>
                                    Normal
                                </option>
                                <option value="premium"
                                        @if(($user->price_category=='premium')) selected="selected" @endif>
                                    Premium
                                </option>
                                <option value="gold"
                                        @if($user->price_category=='gold') selected="selected" @endif>Gold
                                </option>
                            </select>

                        </td>
                        <td>{{$user->status=="1" ? 'Active' :'Inactive'}}</td>

                        <td class="text-center">
                            @if($user->is_admin)
                                <span class="btn btn-xs btn-success">Admin</span>

                            @else

                        
                                <a title="Modify" href="" class="btn btn-link" data-toggle="ajaxModal"><i
                                        class="fa fa-edit fa-xs"></i></a>
                                <a href="" title="Delete" class="btn btn-link delete-offer" id=""
                                    data-name=""><i class="fa fa-trash fa-xs"></i> </a>
                            

                            @endif
                        </td>
                @endforeach
                {{-- {{$users->links()}} --}}
            </tbody>
        </table>
    </div>
</div>
@include('admin.components.footer')
