<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

        label.error{
            color: #fe0202;
          }

    </style>
</head>
<body>




<form role="form"   method="post" class="require-validation" action="{{url('website/payment')}}"      data-cc-on-file="false"      id="payment-form">
{{csrf_field()}}


<div class="container">
    
    <!-- <h1>User Details</h1> -->
    <input type="hidden" name="order_id" class="form-control" value="{{$main_order_id}}">
   <!--  <input type="text" name="first_name" maxlength="50" class="form-control" placeholder="Enter First Name">
    <input type="text" name="last_name" maxlength="50" class="form-control" placeholder="Enter Last Name">
    <input type="email" name="email_address" class="form-control" placeholder="Enter Email Address">
    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
    <input type="text" name="phone_number" maxlength="16" id="phone_number" class="form-control" placeholder="Enter Phone Number">
 -->
    <h1 style="text-align: center;">Payment</h1>
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
               <!--  <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div> -->
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    
                    
                    
                    

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input name="name_on_card" 
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input value="42424242424242" name="card_number"     autocomplete='off' class='form-control card-number' size='20'    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input name="cvv" autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>

                            <div class="form-group col-md-8">
                                 <label>Expiry Month/Expiry Year</label>
                                <input type="text" name="expiry_month_year" maxlength="5" id="expiry_month_year" class="form-control" value="12/25" placeholder="Enter Expiry Month/Expiry Year">
                                <label id="expiry_month_year-error" class="error" for="expiry_month_year"></label>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <?php
                                    $bill_amount = "$".$order['total_amount'];
                                ?>
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ({{$bill_amount}})</button>
                            </div>
                        </div>
                          
                </div>
            </div>        
        </div>
    </div>
      
</div>


</form>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<!-- <script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
        },"Name on card should be alphanumeric only.");

        $.validator.addMethod("expiry_month_and_year_val", function(value, element) {
                return this.optional(element) || value == value.match(/^[/0-9\s]+$/);
        },"Expiry month and year should be number only.");



        $("#payment-form").validate({
                // rules : {
                //       name_on_card  : {
                //         required : true,
                //         alphanumeric: true,
                //        // minlength:2,
                //         maxlength:50
                //       },
                //       card_number : {
                //         required : true,
                //         digits : true,
                //         maxlength: 16,
                //         minlength: 14
                //       },
                //       cvv : {
                //         required : true,
                //         digits : true,
                //         maxlength: 4,
                //         minlength: 3
                //       },
                //       expiry_month_year:{
                //         required : true,
                //         expiry_month_and_year_val : true
                //       },
                //   },
                // messages : {
                //       name_on_card :  {
                //         required : "Please enter name on card.",
                //         minlength : "Name on card should be at least 2 alphanumeric long.",
                //         maxlength : "Name on card should be less than or equal to 50 alphanumeric."
                //       },
                //       card_number : {
                //         required : "Please enter card number.",
                //         digits : "Please enter only number.",
                //         maxlength : "The card number must be between 14 to 16 digits.",
                //         minlength : "The card number must be between 14 to 16 digits."
                //       },
                //       cvv : {
                //         required : "Please enter CVV.",
                //         digits : "Please enter only number.",
                //         maxlength : "The CVV must be between 3 to 4 digits.",
                //         minlength : "The CVV must be between 3 to 4 digits."

                //       },
                //       expiry_month_year : {
                //         required : "Please enter expiry month/expiry year."
                //       },
                // },

        });
    })
</script>
</html>