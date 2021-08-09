<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
<link rel="icon" href="{{url('public/admin/img/favicon.png')}}" sizes="16x16" type="images/png">
<link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">

</head>
<style>
  #exampleInputPassword-error , #exampleInputEmail-error{
    color: #ff0000;
}
.err {
    color: #ff0000;
    margin-left: -23px;
    text-align: -webkit-left;
}
.p-5 {
    padding: 3rem!important;
    overflow-x: auto;
    height: 490px;
}
  </style>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-9" style="margin-top: 68px;">
          <div class="card-body p-0" style="height: 463px;">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="{{url('public/admin/img/andrewlogo.png')}}" width="150">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                    @if($errors->any())
                  <div class="backend_err">
                    <ul>

                      @foreach($errors->all() as $error) 
                     
                          <li class="err">{{ $error }}</li>

                      @endforeach 

                    </ul>
                  </div>
                @endif
                    @include('admin.notifications')
                  </div>
                  <form method="POST" id="validate_form">
                  {{@csrf_field()}}
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" onkeypress="return AvoidSpace(event)" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" onkeypress="return AvoidSpace(event)" placeholder="Password">
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me" value ="remember_me">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('admin.forgotPassword')}}">Forgot Password?</a>
                  </div>
              
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('public/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('public/admin/js/sb-admin-2.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>

<script type="text/javascript">
  
jQuery.validator.addMethod("valid_email", function(value, element) {
  console.log(value.indexOf("."))
  if(value.indexOf(".") >= 0 ){
    return true;
  }else {
    return false;
  }
}, "Please enter valid email address.");


$.validator.addMethod("valid_email2", function(value, element) {
            return this.optional(element) || value == value.match(/^[.@a-zA-Z0-9\s]+$/);
    }, "Please enter valid email address.");


$("#validate_form").validate({
  rules : {
      email : {
          email : true,
          required : true,
          valid_email: true,
          valid_email2:true,
      },
      password : {
        required: true
      }
     
  },
  messages : {
    email : {
        email : "Please enter valid email address.",
        required : "Please enter email address.",
    },
    password : {
      required : "Please enter password."
    }
  },
  submitHandler:function(form){
    form.submit();
  }

});

</script>

<script type="text/javascript">
$(document).ready(function(){
    $(function() {
        setTimeout(function(){
            $(".alertz").hide();
        }, 5000);
    });

});           
</script>

<script type="text/javascript">
      function AvoidSpace(event) {
          var k = event ? event.which : window.event.keyCode;
          if (k == 32) return false;
      }
</script>


</body>



<!-- trim space -->
<script type="text/javascript">
    $(document).ready(function(){
      $(".form-control").on("keyup",function(){
        var length = $.trim($(this).val()).length;
        if(length == 0){
           $(this).val("");
        }
      })
    });
</script>



 
<!-- Block space at beninning of field -->
<script type="text/javascript">
  $(document).ready(function(){
    $('input').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
  });

</script>


</html>
