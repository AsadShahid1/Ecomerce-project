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
                    <th scope="col-2">#</th>
                    <th scope="col-2">Address</th>
                    <th scope="col-2">Mobile #</th>
                    <th scope="col-2">Instagram</th>
                    <th scope="col-2">Email</th>
                    <th scope="col-2">Twitter</th>
                    <th scope="col-2">Facebook</th>
                    <th scope="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($settings as $setting)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $setting->address }}</td>
                        <td>{{ $setting->mobile_number }}</td>
                        <td>{{ $setting->instagram }}</td>
                        <td>{{ $setting->email }}</td>
                        <td>{{ $setting->twitter }}</td>
                        <td class="text-center">
                          {{$setting->facebook}}
                        </td>
                        <td>
                            <button class="btn btn-primary"><a href="{{ route('setting.edit', $setting->id) }}" class="text-white">Edit</a></button
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@include('admin.components.footer')
