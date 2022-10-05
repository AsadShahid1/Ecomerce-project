@include('admin.components.header')
@include('admin.components.sidebar')
@include('admin.components.topnav')
<div class="right_col" role="main">
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
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <!--end breadcrumb-->
  <div class="divcol">
      <p>Please be careful: Any changes made here will affect the live website.</p>
      <hr>
      <form action="{{route('setting.update',$setting->id)}}" method="post">
          @csrf
          @method('PUT')
        <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Setting Name</th>
                <th scope="col">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Address</td>
                <td>
                    <input type="text" name="address" id="" class="w-100" value="{{$setting->address}}">
                </td>
              </tr>
              <tr>
                <td>Mobile Number</td>
                <td>
                    <input type="text" name="mobile_number" id="" class="w-100" value="{{$setting->mobile_number}}">
                </td>
              </tr>
              <tr>
                <td>Instagram Account</td>
                <td>
                    <input type="text" name="instagram" id="" class="w-100" value="{{$setting->instagram}}">
                </td>
              </tr>
              <tr>
                <td>Email Address</td>
                <td>
                    <input type="text" name="email" id="" class="w-100" value="{{$setting->email}}">
                </td>
              </tr>
              <tr>
                <td>Twitter Account</td>
                <td>
                    <input type="text" name="twitter" id="" class="w-100" value="{{$setting->twitter}}">
                </td>
              </tr>
              <tr>
                <td>Facebook Account</td>
                <td>
                    <input type="text" name="facebook" id="" class="w-100" value="{{$setting->facebook}}">
                </td>
              </tr>
            
              <tr>
                <td>Privacy Policy</td>
                <td>
                    <div id="summernote" name="policy"></div>
                </td>
              </tr>
              <tr>
                <td>Terms and Conditions</td>
                <td>
                    <div id="summernote1" name="terms" ></div>
                </td>
              </tr>
              <tr>
                <td>Paypal Mode</td>
                <td>
                    <input type="text" name="pay_mode" id="" class="w-100"  value="{{$setting->pay_mode}}">
                </td>
              </tr>
            
              <tr>
                <td>Paypal Username</td>
                <td>
                    <input type="text" name="paypal_user" id="" class="w-100"  value="{{$setting->paypal_user}}">
                </td>
              </tr>
            
              <tr>
                <td>Paypal Password</td>
                <td>
                    <input type="text" name="paypal_password" id="" class="w-100"  value="{{$setting->paypal_password}}">
                </td>
              </tr>
            
              <tr>
                <td>Paypal Secret</td>
                <td>
                    <input type="text" name="paypal_secret" id="" class="w-100"  value="{{$setting->paypal_secret}}">
                </td>
              </tr>
            </tbody>
          </table>
          <button data-route="{{route('setting.update', $setting->id)}}" class="btn btn-primary">Update </button>
        </form>
    
  </div>
</div>
@include('admin.components.footer')
