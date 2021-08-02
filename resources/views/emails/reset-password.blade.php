<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="icon" href="{{url('public/other_css/img/app_icon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{url('public/other_css/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('public/other_css/css/custom.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<style type="text/css">
.forgot_modal .modal-content {
  position: relative;
}
.forgot_modal .close_btn {
  border-radius: 50%;
    background-color: #60be80;
    opacity: 1;
    height: 40px;
    width: 40px;
    position: absolute;
    right: 0;
    top: 4px;
    box-shadow: 4px 4px 15px 4px rgba(0, 0, 0, 0.3);
}
.forgot_modal .close_btn span {
  font-size: 33px;
    color: #fff;
    /* margin-top: 20px; */
    top: 3px;
    position: absolute;
    right: 10px;
}
.forgot_modal .close_btn.close:not(:disabled):not(.disabled):focus {
  outline: 0;
    opacity: 1;
}
.forgot_modal .close_btn.close:not(:disabled):not(.disabled):hover {
  opacity: 1;
}
.err {
  font-size: 14px;
    font-weight: 600;
    color: #ec0202;
}

  .backend_err {
    margin-left: 40%;
    margin-top: 2%;
}

.alert_mesg,
.alert_msg_red {
  width: 100%;
    margin-bottom: 20px !important;
}
button.close.close_icon {
    position: absolute!important;
    top: 50%;
    right: 0;
    opacity: 1;
    color: #fff;
    /* transform: translate(-50%, -50%); */
}

}
.pass_group img.show_icon {
    z-index: 99;
    cursor:pointer!important;
}


.loader {
  border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #60be80;
    border-bottom: 8px solid #60be80;
    width: 60px;
    height: 60px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

div#loaderModel .modal-dialog {
    text-align: -webkit-center !important;
    text-align: -moz-center !important;
    text-align: -o-center !important;
    margin-top: 240px;
  /*text-align: center !important;*/
}


</style>
<body>
  <div class="login-bg_img">
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-lg-6 p_0">
          <div class="login_content">
            <div class="inner_content">
              @if($errors->any())
              <div class="backend_err">
                  <ul>

                      @foreach($errors->all() as $error) 
                     
                          <li class="err">{{ $error }}</li>

                      @endforeach 

                  </ul>
              </div>
              @endif


              <form method="POST" id="validate_form">
                {{csrf_field()}}

                <div class="form-group pass_group password_container">
                  <label for="" style="margin-left: 5px;">New Password</label><br>
                  <div class="input_content">
                    <img src="{{url('public/other_css/img/password-look-gn.png')}}" class="lock_icon" alt="password-look-gn">
                    <input type="password" class="form-control pp" name="password" id="password" placeholder="Enter New Password" style="padding-right: 91px;">
                    <label id="password-error" class="error err" for="password"></label>
                    <img src="{{url('public/other_css/img/password-closed-eye-gry.png')}}" class="show_icon" class="show_icon" show="false" alt="password-closed-eye-gry">
                  </div>
                </div>

                <div class="form-group pass_group password_container">
                  <label for="" style="margin-left: 5px;">Confirm Password</label><br>
                  <div class="input_content">
                    <img src="{{url('public/other_css/img/password-look-gn.png')}}" class="lock_icon" alt="password-look-gn">
                    <input type="password" class="form-control pp" name="confirm_password" placeholder="Enter Confirm Password" style="padding-right: 91px;">
                    <label id="confirm_password-error" class="error err" for="confirm_password"></label>
                    <img src="{{url('public/other_css/img/password-closed-eye-gry.png')}}" class="show_icon" class="show_icon" show="false" alt="password-closed-eye-gry">
                  </div>
                </div>

                
                <div class="text-center">
                  <a href="javascript:void(0);">
                    <button type="submit" id="submit_btn" class="btn btn-secondary btn-lg login_btn">Submit</button>
                  </a>
                </div>
                </form>
                
                
               
              
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript" src="{{url('public/other_css/js/jquery-3.3.1.slim.min.js')}}"></script>  
<script src="{{url('public/other_css/js/jquery.3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/other_css/js/popper.min.js')}}"></script> 
<script type="text/javascript" src="{{url('public/other_css/js/bootstrap.min.js')}}"></script>  
<script>
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })
</script>



<script type="text/javascript">
$(document).ready(function(){

  $(".form-control").keyup(function(){
    var length = $.trim($(this).val()).length;
 
     if(length == 0){
       $(this).val("");
     }
  });

  $(".show_icon").on("click",function(){
    let eyeFace = $(this).attr("show");

    if(eyeFace == "false"){
      $(this).attr("src", "{{url('public/other_css/img/eye_show.png')}}");
      $(this).attr("show","true");

      $(this).parent().closest('.password_container').find(".pp").attr("type","text");
      
    }else{
      $(this).attr("src", "{{url('public/other_css/img/password-closed-eye-gry.png')}}");
      $(this).attr("show","false");
      $(this).parent().closest('.password_container').find(".pp").attr("type","password");
    }
  });

});
</script>

<script>
      
     $(".alert-success").fadeTo(5000, 5000).slideUp(500, function(){
      $(".alert-success").slideUp(500);
    });
         
   </script>

   <script>
      
     $(".alert-danger").fadeTo(5000, 5000).slideUp(500, function(){
      $(".alert-danger").slideUp(500);
    });
         
   </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>


<script type="text/javascript">
  $(document).ready(function(){


    $.validator.addMethod("checkallowedchars", function (value) {
        /*var pattern = new RegExp('^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&*^()])[a-zA-Z0-9!@#$%&*^()]+$');*/
        var pattern = new RegExp('^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%&*^()?,.<>:;+_=-])[a-zA-Z0-9!@#$%&*^()?,.<>:;+_=-{}|"/]+$');
        return pattern.test(value)
    }, "Password must contain at least one number, one uppercase letter and one special character.");

    $("#validate_form").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength:100,
                //checkallowedchars: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Please enter new password.",
                minlength: "New password must be at least 8 characters long."
            },
            confirm_password: {
                required: "Please enter confirm password.",
                equalTo: "New password and confirm password must be same."
            }
        },submitHandler:function(form){
            $("#submit_btn").attr("disabled",true);
            form.submit();
                
          }
    });
  });
</script>

</body>
</html>