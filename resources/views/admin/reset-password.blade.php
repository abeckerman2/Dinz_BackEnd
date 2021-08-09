<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reset Password</title>

  <!-- Custom fonts for this template-->
<link rel="icon" href="{{url('public/admin/img/favicon.png')}}" sizes="16x16" type="images/png">
<link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">

</head>
<style>
  #new_password-error,#confirm_password-error{
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
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="{{url('public/admin/img/andrewlogo.png')}}" width="150">
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                    @if($errors->any())
                  <div class="backend_err">
                    <ul>

                      @foreach($errors->all() as $error) 
                     
                          <li class="err">{{ $error }}</li>

                      @endforeach 

                    </ul>
                  </div>
                @endif
                  </div>
                  <form method="POST" id="validate_form">
                  {{@csrf_field()}}
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="new_password" name="new_password" aria-describedby="emailHelp" onkeypress="return AvoidSpace(event)" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off" placeholder="New Password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" onkeypress="return AvoidSpace(event)" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Send
                    </button>
                  </form>
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

  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){

    $("form[id = 'validate_form']").validate({
      rules:{
        new_password: {
            required: true,
            minlength: 6,
            maxlength : 100
        },
        confirm_password:{
          required:true,
          equalTo:'#new_password',
        },
      },
      messages:{
        new_password:{
          required : "Please enter new password.",
          minlength: 'New password must be at least 6 characters long.',
          maxlength : "New password should be less than 100 characters."
        },
        confirm_password:{
          required: 'Please enter confirm password.',
          equalTo: 'New password and confirm password must be same.',
        },
      },
    })
  })
</script>
<script type="text/javascript">
      function AvoidSpace(event) {
          var k = event ? event.which : window.event.keyCode;
          if (k == 32) return false;
      }
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


</body>

</html>