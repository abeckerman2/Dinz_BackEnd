<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="{{url('public/website/css/style.css')}}">

   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        button#payment{

        }

          label.error{
            color: #fe0202;
          }

          #expiry_time{
            color: #fe0202;
          }

          
          button#payment{
            width: 200px;
            height: 53px;
            margin-top: 23px;
            font-size: 21px;
            font-weight: 300;
            text-transform: capitalize;
            background-image: linear-gradient(#ff0000, #980505);
            border: 0;
            padding: 4px 5px;
            border-radius: 100px;
            color: #fff;
            line-height: 20px;
            margin: auto;
          }

    </style>
</head>
<body>




<form role="form"   method="post" class="require-validation" action="{{url('website/payment')}}"      data-cc-on-file="false"      id="payment-form">
{{csrf_field()}}


<div class="container">
    
    <!-- <h1>User Details</h1> -->
    <input type="hidden" name="first_name" maxlength="50" class="form-control" placeholder="Enter First Name">
    <input type="hidden" name="last_name" maxlength="50" class="form-control" placeholder="Enter Last Name">
    <input type="hidden" name="email_address" class="form-control" placeholder="Enter Email Address">
    <input type="hidden" name="address" id="address" class="form-control" placeholder="Enter Address">
    <input type="hidden" name="phone_number" maxlength="16" id="phone_number" class="form-control" placeholder="Enter Phone Number">

    <!-- <h1 style="text-align: center;">Payment</h1> -->
    


     <div class="d-flex newdata" style="display: flex">
       <div class="name">
          <a href="{{url('website/cart-listing')}}">
            <img src="{{url('public/website/images/arrow.png')}}" alt="">
          </a>
       </div>
       <div class="line_element" style="margin: auto;">
          <h2 style="text-align: center; margin-top: -5px">Payment</h2>
       </div>
    </div>


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
                                <label class='control-label'>Name on Card</label><input name="name_on_card"  placeholder="Enter Name On Card" class='form-control' maxlength="50" size='4' value="" type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label><input value="" name="card_number" placeholder="Enter Card Number" id="card_number"  autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> 
                                <input name="cvv" autocomplete='off'   class='form-control card-cvc' placeholder='***' value="" size='4' id="cvc" 
                                    type='password'>
                            </div>
                          </div>

                        <div class='form-row row'>
                            <div class="form-group col-md-8">
                                 <label>Expiry Month/Expiry Year</label>
                                <input type="text" name="expiry_month_year" maxlength="5" id="expiry_month_year" class="form-control" value="" placeholder="Enter Expiry Month/Expiry Year">
                                <label id="expiry_time" style="display: none"></label>
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
                                <button class="btn btn-primary btn-lg btn-block pay_button" id="payment" type="submit">Pay Now ({{$bill_amount}})</button>
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


        document.getElementById('expiry_month_year').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/, '').replace(/(.{2})/, '$1/').trim();
        });



        $("#payment-form").validate({
                rules : {
                      name_on_card  : {
                        required : true,
                        alphanumeric: true,
                        minlength:2,
                        maxlength:50
                      },
                      card_number : {
                        required : true,
                        digits : true,
                        maxlength: 16,
                        minlength: 14
                      },
                      cvv : {
                        required : true,
                        digits : true,
                        maxlength: 4,
                        minlength: 3
                      },
                      expiry_month_year:{
                        required : true,
                        expiry_month_and_year_val : true
                      },
                  },
                messages : {
                      name_on_card :  {
                        required : "Please enter name on card.",
                        minlength : "Name on card should be at least 2 alphanumeric long.",
                        maxlength : "Name on card should be less than or equal to 50 alphanumeric."
                      },
                      card_number : {
                        required : "Please enter card number.",
                        digits : "Please enter only number.",
                        maxlength : "The card number must be between 14 to 16 digits.",
                        minlength : "The card number must be between 14 to 16 digits."
                      },
                      cvv : {
                        required : "Please enter CVV.",
                        digits : "Please enter only number.",
                        maxlength : "The CVV must be between 3 to 4 digits.",
                        minlength : "The CVV must be between 3 to 4 digits."

                      },
                      expiry_month_year : {
                        required : "Please enter expiry month/expiry year."
                      },
                },

                submitHandler:function(form){

                  let validate = "false";

                  let expiry_time = $("#expiry_time").text();

                  if(expiry_time.length > 0){
                    validate = "true";
                  }



                 
                  setTimeout(function(){

                    if(validate == "true"){
                      return false;
                    }else{
                      $('#payment').attr('disabled' , 'true')
                      form.submit();
                    }
                  },1000);

                  
                }

        });
    })
</script>

<script type="text/javascript">
    
       $(document).click(function(event) {

          let dd = new Date().getFullYear();
          let first_two_digits = String(dd).substr(0,2);
          if (!$(event.target).is("#expiry_month_year")) {
              let expiry_month_year = $("#expiry_month_year").val();
              let split = expiry_month_year.split("/");
              var filtered = split.filter(function (el) {
                return el != "";
              });
              
              if(filtered.length > 0){
                let compare_val_y = first_two_digits+filtered[1];

                console.log(new Date().getMonth()+1);

                if(filtered[0] == undefined || filtered[1] == undefined){
                  $("#expiry_time").text("Please enter valid expiry month and expiry year.").css("display","block");
                }else if(filtered[1].length < 2){
                  $("#expiry_time").text("Please enter valid expiry month and expiry year.").css("display","block");
                }else if(parseInt(compare_val_y) < new Date().getFullYear() || parseInt(filtered[0]) < new Date().getMonth()+1 && parseInt(compare_val_y) == new Date().getFullYear() || filtered[0] == 0 || filtered[0] > 12){

                  $("#expiry_time").text("Please enter valid expiry month and expiry year.").css("display","block");

                }
                                 
              }
          }
      })
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#cvc').keypress(function (event) {
          return isNumber(event, this)
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
          $("#cvc").attr("maxlength","4"); 
        if((charCode != 46 || $(element).val().indexOf('.') != -1) &&  (charCode < 48 || charCode > 57)){
          return false;
      }else{
          return true;
      }
    }
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#card_number').keypress(function (event) {
          return isNumber(event, this)
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
          $("#card_number").attr("maxlength","16"); 
        if((charCode != 46 || $(element).val().indexOf('.') != -1) &&  (charCode < 48 || charCode > 57)){
          return false;
      }else{
          return true;
      }
    }
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#expiry_month_year').on('keyup' , function(){ 
        $('#expiry_time').text('');
        $('#expiry_time').css('display', 'none');
    })
  })
</script>

</html>