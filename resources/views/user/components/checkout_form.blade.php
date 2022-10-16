<div class="col-lg-9">
    <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
        <div class="row">
            <div class="col-sm-6">
                <label for="first">First Name *</label>
                <input type="text" class="form-control" name="checkout_first" value="{{Auth::user()->first_name}}" id="first" required>
            </div><!-- End .col-sm-6 -->

            <div class="col-sm-6">
                <label for="last">Last Name *</label>
                <input type="text" class="form-control" name="checkout_last"  value="{{Auth::user()->last_name}}" id="last" required>
            </div><!-- End .col-sm-6 -->
        </div><!-- End .row -->

        <label for="company">Company Name (Optional)</label>
        <input type="text" class="form-control" name="checkout_company" id="company">

        <label for="street">Street address *</label>
        <input type="text" class="form-control" name="checkout_street"  value="{{Auth::user()->address}}" placeholder="House number and Street name" id="street" required>

        <div class="row">
            <div class="col-sm-6">
                <label for="city">Town / City *</label>
                <input type="text" class="form-control" name="checkout_city" id="city" required>
            </div><!-- End .col-sm-6 -->

            <div class="col-sm-6">
                <label for="country">State / County *</label>
                <input type="text" class="form-control" name="checkout_country" id="country" required>
            </div><!-- End .col-sm-6 -->
        </div><!-- End .row -->

        <div class="row">
            <div class="col-sm-6">
                <label for="post_code">Postcode / ZIP *</label>
                <input type="text" class="form-control" name="checkout_post_code" id="post_code" required>
            </div><!-- End .col-sm-6 -->

            <div class="col-sm-6">
                <label for="phone">Phone *</label>
                <input type="tel" class="form-control" name="checkout_phone"  value="{{Auth::user()->mobile_number}}" id="phone" required>
            </div><!-- End .col-sm-6 -->
        </div><!-- End .row -->

        <label for="email">Email address *</label>
        <input type="email" class="form-control" name="checkout_email"  value="{{Auth::user()->email}}" id="email" required>

        <label for="notes">Order notes (optional)</label>
        <textarea class="form-control" cols="30" rows="4" name="notes" id="notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
        <div id="card-element"></div>

</div><!-- End .col-lg-9 -->