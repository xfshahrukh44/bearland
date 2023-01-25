@extends('layouts.main')
@section('content')


      <section class="form-body checkoutPage">
         <div class="container">

            <div class="row">
              <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
			        <h4 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #000000; font-size: 48px; text-transform: capitalize;">Payment Details</h4>
              <form action="{{route('order.place')}}" method="POST" id="order-place">
              @csrf

                <input type="hidden" name="payment_id" value="" />
                <input type="hidden" name="payer_id" value="" />
                <input type="hidden" name="payment_status" value="" />
                <input type="hidden" name="payment_method" id="payment_method" value="" />

            
                <?php  $_getUser= DB::table('users')->where('id', '=', Auth::user()->id)->first();?>

                     <div class="form-group">
                      <span class="invalid-feedback fname" >
                      <strong>{{ $errors->first('first_name') }}</strong></span>
                        <input class="form-control" id="f-name" name="first_name" value="{{old('first_name')?old('first_name'):$_getUser->name}}" placeholder="First Name *" type="text" required>
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback " >
                      <strong>{{ $errors->first('company_name') }}</strong></span>
                        <input class="form-control" id="compnayName" name="company_name" placeholder="Compnay Name " type="text" value="{{old('company_name')}}" required>
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('address_line_1') }}</strong></span>
                        <input class="form-control" id="address" name="address_line_1" placeholder="Address" type="text" value="{{old('address_line_1')}}" required>
                     </div>
                     <div class="form-group">
                       <span class="invalid-feedback" >
                       <strong>{{ $errors->first('city') }}</strong></span>
                        <input class="form-control right" placeholder="Town / City" name="city" id="city" type="text">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('country') }}</strong></span>

                    <select name="country" id="country" class="form-control left" placeholder="Select Country" style="border-radius:0px;">
                    @if(isset($countries) and count($countries) > 0)
                      @foreach($countries as $country)
                      <option value="{{ $country->sortname }}" data-countryId="{{ $country->id }}" selected="selected">{{ $country->name }}</option>
                      @endforeach
              
                  </select>

                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('phone_no') }}</strong></span>
                        <input class="form-control right" placeholder="Phone" name="phone_no" type="text" value="{{old('phone_no')}}">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('email') }}</strong></span>
                        <input class="form-control left" name="email" placeholder="Email" type="email" value="{{old('email')?old('email'):$_getUser->email}}">
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="compnayName" name="zip_code" placeholder="Postcode" type="text" value="{{old('zip_code')}}">
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5"></textarea>
                     </div>

                     <div id="card-element" style="display:none;"></div>
                     <div id="card-errors" role="alert" style="display:none;"></div>

                     <div id="paypal-button-container-popup" style="display:none;"></div>
                     <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>


                     <button type="submit" class="btn btn-primary btn-lg" name="button" id="stripePay" style="display:none;">Pay Now</button>
                     @endif
                  </form>
               </div>

               <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                  <div class="YouOrder" style="margin-top:60px;">
                     <h1>YOUR ORDER</h1>
                     <hr>
                    <?php $subtotal  = 0; $addon_total = 0; ?>
                     @foreach($cart as $key=>$value)
                     <h5>{{ $value['name'] }} x {{ $value['qty'] }} <span>${{ $value['baseprice'] * $value['qty'] }}</span></h5>
                     <?php $subtotal+= $value['baseprice'] * $value['qty']; ?>
                     @endforeach
                     <hr>
                     <h2>Item Subtotal <span>${{ $subtotal }}</span></h2>
                     <hr>
                     <h2> Your Shipping <span>FREE</span></h2>
                     <hr>
                     <h3> Total Price <span>${{ $subtotal }}</span></h3>
                     <hr>
                     <div class="radio">

                       <p>Pay With:</p>

                        <p><input name="payBtn" id="paypalBtn" value="paypal" type="radio" onclick="paymentForm(this.id);"> PayPal</p>
                        <p><input name="payBtn" value="stripe" id="stripeBtn" type="radio" onclick="paymentForm(this.id);"> Stripe</p>

                        <input type="hidden" name="price" value="{{ $subtotal }}" />
                        <input type="hidden" name="product_id" value="" />
                        <input type="hidden" name="qty" value="value['qty']" />

                     </div>
                     <hr>

                  <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection
@section('css')
<style type="text/css">

.btn-primary {
  color: #fff;
  background-color: slateblue;
  border-color: slateblue;
  border-radius: 0px;
  width: 100%;
  margin-top: 15px;
}

  .form-group input.form-control {
    border-width: 1px;
    border-color: rgb(215, 215, 215);
    border-style: solid;
    border-radius: 0px;
    background-color: #fff;
    height: 45px;
}
form.loginForm {
    padding: 20px;
}

.body-space {
    padding: 60px 0;
}

span.invalid-feedback.fname {
    float: left;
    width: 100%;
    color: red;
}

span.invalid-feedback.lname {
    float: left;
    width: auto;
    color: red;
    margin-top: -22px;
}

.form-group label {
    color: #000;
}

.form-control {
  height: 45px;
}

.checkoutPage h4 {
    font-size: 39px;
    color: #000000;
    text-transform: uppercase;
}
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
    position: relative;
    margin-left: 0px;
}

</style>
@endsection
@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
// creating stripe client

var stripe = Stripe("pk_test_51IpegfB7ntYBqOpJvnAEIoI9erRCE2etLs7UnkpxU3pCxTo1RqvNbfuPyz781cYyWw8XJTu6MKQEx5qhNkT066sE00RHIvhsuF");

var elements = stripe.elements();
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

var card = elements.create('card', {style: style});

card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('order-place');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});



function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('order-place');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  form.submit();
}


  paypal.Button.render({
  env: 'production', //sandbox

  style: {
    label: 'checkout',
    size:  'responsive',
    shape: 'rect',
    color: 'gold'
  },
  client: {

    production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
  },
  payment: function(data, actions) {
    return actions.payment.create({
      payment: {
        transactions: [
          {
            amount: { total: {{number_format(((float)$subtotal),2, '.', '')}}, currency: 'USD' }
          }
        ]
      }
    });
  },
  onAuthorize: function(data, actions) {
    return actions.payment.execute().then(function() {
      // generateNotification('success','Payment Authorized');

       $.toast({
                  heading: 'Success!',
                  position: 'bottom-right',
                  text:  'Payment Authorized',
                  loaderBg: '#ff6849',
                  icon: 'success',
                  hideAfter: 1000,
                  stack: 6
              });

      var params = {
        payment_status:'Completed',
        paymentID: data.paymentID,
        payerID: data.payerID
      };


      $('input[name="payment_status"]').val('Completed');
      $('input[name="payment_id"]').val(data.paymentID);
      $('input[name="payer_id"]').val(data.payerID);
      $('input[name="payment_method"]').val('paypal');
      $('#order-place').submit();
    });
  },
  onCancel: function(data, actions) {
      var params = {
        payment_status:'Failed',
        paymentID: data.paymentID
      };
      $('input[name="payment_status"]').val('Failed');
      $('input[name="payment_id"]').val(data.paymentID);
      $('input[name="payer_id"]').val('');
      $('input[name="payment_method"]').val('paypal');
  }
  }, '#paypal-button-container-popup');

</script>

<script type="text/javascript">

function paymentForm(btnId)
{
var button_id = btnId.toLowerCase();

if(button_id == "paypalbtn")
{
  $('#card-element').hide();
  $('#card-errors').hide();
  $('#stripePay').hide();
  $('#paypal-button-container-popup').show();
  $('#payment_method').val('paypal');
}else{

  $('#paypal-button-container-popup').hide();
  $('#card-element').show();
  $('#card-errors').show();
  $('#stripePay').show();
  $('#payment_method').val('stripe');
}

}
$('#stripePay').click(function(){
  $('#order-place').submit();
});


</script>
@endsection
