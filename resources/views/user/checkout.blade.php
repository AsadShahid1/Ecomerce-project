<!DOCTYPE html>
<html lang="en">


<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User - Ecommerce</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-13.css') }}">
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        .StripeElement{
            color: #495057;
            outline: 0;
            border:1px solid;
            padding:0px 20px;
            height:42px!important;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
        }
        #card-element.StripeElement.empty {
          background: #ffffff30 !important;
          }
          #stripe-exp-element.StripeElement.empty {
          background: #ffffff30 !important;
          }
          #stripe-cvc-element.StripeElement.empty {
          background: #ffffff30 !important;
          }
        .card-element-disabled {
            background-color: #e9ecef;
            opacity: 1;
        }
        #card-element {
            display: flex;
            align-items: center;
        }
        #card-element div {
            flex-grow: 1;
        }
        #card-element-error {
            color: #ff0000;
        }
    
    </style>
</head>

<body>
    <main class="main p-3">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
    

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{route('saveorder') }}" method="POST" id="">
                        @csrf

                        <div class="row">
                           @include('user.components.checkout_form')
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                            @foreach ($products as $product)
                                            <tr>
                                                <td><a href="#">{{$product->name}}</a></td>
                                                <td>${{$product->standard * $product->squantity}}</td>
                                            </tr>
                                            @endforeach
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>${{$total}}</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{$total}}</td>
                                                <input type="hidden" value="{{$total}}" name="amount">
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        <input type="hidden"  name="payment_method" id="payment_method">
                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed check_payment_method" data-value="paypal"  role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                        PayPal 
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed check_payment_method" data-value="stripe" role="button" value="stripe" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                        Credit Card (Stripe)

                                                        <img src="assets/images/payments-summary.png" alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                                <div id="card-element"></div>
                                                {{-- <div class="card-body"> 

                                                </div><!-- End .card-body --> --}}
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@include('user.components.footer')
@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://js.stripe.com/v3/"></script>
 
    <script>
      $(document).on("click" , '.check_payment_method' , function(){
        console.log("jsdfk");
        val = $(this).data('value');
        $("#payment_method").val(val);
        if(val == "stripe"){
            $("form").attr("id" , "payment-form");
            addingEventListener(); 
        }else{
            $("form").attr("id" , "");
        }
    })
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '20px',
                height: '43px',
                border : '2px solid red',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: 'red'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
      

        const stripe = Stripe('{{env('STRIPE_KEY')}}' , { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const card = elements.create('card', { style: style }); // Create an instance of the card Element.

        card.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.City
        function addingEventListener(){
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });
        }
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection