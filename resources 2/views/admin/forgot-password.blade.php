<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="{{url('public/admin/img/favicon.png')}}" sizes="16x16" type="images/png">
<link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">

</head>

<style>

.err {
    color: #ff0000;
}
label.error {
    color: #ff0000;
    float: left;
}
.p-5 {
    padding: 3rem!important;
    overflow-y: auto;
    height: 400px;
}  


div#loaderImg2 {
        position: absolute;
        left: 0;
        right: 0;
        text-align: center;
        margin-top: 250px;
    }
</style>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg " style="margin-top: 130px;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image-1"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
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


                  <form method="post" id="validate_form">
                    {{csrf_field()}}
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" onkeypress="return AvoidSpace(event)" aria-describedby="emailHelp" placeholder="Email Address">
                    </div>
                    <button type="submit" id="submit_btn" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('admin.login')}}">Back to Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div id="loaderModel" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="loaderImg2" id="loaderImg2">
        <img src = "{{url('public/loader.gif')}}">
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
  
  $(document).ready(function(){

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

    
    $("form[id = 'validate_form']").validate({
      rules:{
        email: {
            required:true,
            email:true,
            valid_email: true,
            valid_email2:true,
        },
      },
      messages:{
        email:{
          required: 'Please enter email address.',
          email : 'Please enter valid email address.',
        }, 
      },
      submitHandler: function(form) { 
                $("#submit_btn").attr("disabled", true);
                $("#loaderModel").modal("show");
                $("#loaderModel").unbind("click");
                form.submit();
                
            }
    })
  })
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
