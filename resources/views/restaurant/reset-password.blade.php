<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Reset Password</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('public/restaurant/assets/img/favicon.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{url('public/restaurant/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{url('public/restaurant/assets/css/fonts.min.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{url('public/restaurant/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('public/restaurant/assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{url('public/restaurant/assets/css/custom.css')}}">
	<style>
		body {
			background: linear-gradient( 177deg , rgb(237 31 36 / 80%) 0%, rgb(90 0 3 / 60%) 100%);
		}
		label.error {
		    color: #ff000d!important;
		    font-size: 13px!important;
		}
		.alert-danger, .alert-success {
		    border-left: 0px; 
		}

	</style>
</head>
<body>

	<div class="container">
		<!-- <section class="login_content input_label">
			<form>
				<div class="logo-wrapper"><img src="{{url('public/restaurant/assets/img/logo.png')}}" alt="logo"/></div>
				<span class="new-life">Admin Login</span>
				<div class="mt_form">
					<div>
						<div class="form-group">
							<label for="" class="pb-1">
								Email Address
							</label>
							<input type="text" class="form-control" placeholder="Email Address" required />
						</div>
					</div>
					<div class="form-group">
						<label for="" class="pb-1">
								Password
							</label>
						<input type="password" class="form-control" placeholder="Password" required />
					</div>
					<div>
						<p class="forget">
							<a  href="forgot.html" class="reset_pass to_register">Forgot Password?</a>
						</p>
						<a class="btn btn-success submit" href="index.html">Login</a>
					</div>
				</div>
			</form>
		</section> -->
		<div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

      	<form method="POST" id="validate-form">
      	{{csrf_field()}}

      				  	


        <div class="card o-hidden border-0 shadow-lg my-5 login_card">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                  	<div class="logo-wrapper">


                  		  @if(Session::has("error"))
			              <div class="alert alert-danger">{{Session::get("error")}}</div>
			              @endif
			              @if(Session::has("success"))
			              <div class="alert alert-success">{{Session::get("success")}}</div>
			              @endif
			              @if ($errors->any())
			              <div class="alert alert-danger">
			                    @foreach ($errors->all() as $error)
			                    {{$error}}
			                    @endforeach
			              </div>
			              @endif

                  		<!-- <a href="{{route('restaurant.login')}}" class="back"><img src="{{url('public/restaurant/assets/img/back1.png')}}" alt=""></a> -->
                  		<img src="{{url('public/restaurant/assets/img/andrewlogo.png')}}" alt="andrewlogo"/>
                  	</div>
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
                  <form class="user">
                    <div class="form-group" style="padding-right: 0; padding-left: 0;">
                      <input type="password" class="form-control form-control-user" name="password" id="password" aria-describedby="emailHelp" maxlength="15" placeholder="Enter Password" onkeypress="return AvoidSpace(event)">
                    </div>

                    <div class="form-group" style="padding-right: 0; padding-left: 0;">
                      <input type="password" class="form-control form-control-user" name="confirm_password" id="confirm_password" aria-describedby="emailHelp" maxlength="15" placeholder="Enter Confirm Password" onkeypress="return AvoidSpace(event)">
                    </div>

                    <!-- <a href="{{route('restaurant.login')}}" class="btn btn-primary btn-user btn-block common_btn mt-3"> -->
                      <!-- Send -->
                    <!-- </a> -->
                    	<input type="submit" name="submit" id="submit" class="btn btn-primary btn-user btn-block common_btn mt-3" value="Send">
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-none d-lg-block bg-login-image forgot"></div>
            </div>
          </div>
        </div>

        </form>

      </div>

    </div>
	</div>
<!--   Core JS Files   -->
<script src="{{url('public/restaurant/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{url('public/restaurant/assets/js/core/popper.min.js')}}"></script>
<script src="{{url('public/restaurant/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{url('public/restaurant/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{url('public/restaurant/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{url('public/restaurant/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{url('public/restaurant/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{url('public/restaurant/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{url('public/restaurant/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{url('public/restaurant/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<!-- <script src="{{url('public/restaurant/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> -->

<!-- jQuery Vector Maps -->
<script src="{{url('public/restaurant/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('public/restaurant/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{url('public/restaurant/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{url('public/restaurant/assets/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{url('public/restaurant/assets/js/setting-demo.js')}}"></script>
<script src="{{url('public/restaurant/assets/js/demo.js')}}"></script>
<script>
	$('#lineChart').sparkline([102,109,120,99,110,105,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: 'rgba(255, 255, 255, .5)',
		fillColor: 'rgba(255, 255, 255, .15)'
	});

	$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: 'rgba(255, 255, 255, .5)',
		fillColor: 'rgba(255, 255, 255, .15)'
	});

	$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: 'rgba(255, 255, 255, .5)',
		fillColor: 'rgba(255, 255, 255, .15)'
	});
</script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#validate-form').validate({

			rules:{
				password:{
					required:true,
					minlength:6,
				},
				confirm_password:{
					required:true,
					equalTo:'#password',
				},
			},
			messages:{
				password:{
					required:'Please enter password.',
					minlength:'Password should be atleast 6 characters long.',
				},
				confirm_password:{
					required:'Please enter confirm password.',
					equalTo:'Password and confirm password should be same.',
				},
			},

			submitHandler:function(form){
				$('#submit').attr('disabled' , true);
				form.submit();
			}

		})

	})

</script>


<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$('.alert-danger').hide();
		},5000);
	});

	$(function(){
		setTimeout(function(){
			$('.alert-success').hide();
		},5000);
	});

</script>


<script type="text/javascript">
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
</script>

</body>