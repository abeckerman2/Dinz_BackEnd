@extends('restaurant.layout.layout')
@section('title','Change Password')
@section('content')
	
<style type="text/css">
	label.error {
	    color: #f00!important;
	    font-size: 95%!important;
	    /*margin-top: .5rem;*/
	    margin-bottom: 0px;
	}
	body[data-background-color=dark] .main-panel label.error {
	    color: #ff0a0a!important;
	}
	 
 	/*.alert-danger {
	    border-left: 0px; 
	    color: #302d2d;
	}
	.alert-success {
	    border-left: 0px; 
	    color: #302d2d;
	} */
		.alert-danger {
		    border-left: 0px;
		    color: #302d2d;
		    background-color: #ed2227;
		    color: #fff;
		}
		.alert-success {
		    border-left: 0px;
		    color: #302d2d;
		    background-color: #008000;
		    color: white;
		}

		.dashboard_panel .add_content {
		    width: 62%;
		}

</style>

	<form method="POST" enctype="multipart/form-data" id="validate-form">
	{{csrf_field()}}

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li> 
								<li class="breadcrumb-item remove_hover">Change Password</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Change Password</h1>

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

					<div class="card">
						<div class="card-body add_imgae_box">



							<div class="add_content">
									<label for="" class="pb-1">
										Old Password
									</label>
									<div class="form-group pb-3">
										<input type="password" class="form-control" name="password" maxlength="70" placeholder="Enter Old Password" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off" onkeypress="return AvoidSpace(event)"  required />
									</div>
							</div>


							<div class="add_content">
									<label for="" class="pb-1">
										New Password
									</label>
									<div class="form-group pb-3">
										<input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" maxlength="70" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off"   onkeypress="return AvoidSpace(event)" required />
									</div>
							</div> 


							<div class="add_content">
									<label for="" class="pb-1">
										Confirm Password
									</label>
									<div class="form-group pb-3">
										<input type="password" class="form-control" name="confirm_password" maxlength="70" placeholder="Enter Confirm Password" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off" onkeypress="return AvoidSpace(event)"  required />
									</div>
							</div>


 

							<div class="text-center mt-2">
								<!-- <a href="{{route('restaurant.profile')}}"> -->
									<!-- <button type="button" class="btn btn-warning same_wd_btn mb-2">Update</button> -->
								<!-- </a> -->
								<input type="submit" name="submit" value="Update" class="btn btn-warning same_wd_btn mb-2">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</form>	



 

@endsection()
@section('js')

 

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
 
 


		$('#validate-form').validate({

			rules:{
				  password:{
		            required:true,
		            // minlength:6,
		          },
		          new_password:{
		            required:true,
		            minlength:6,
		          }, 
		          confirm_password:{
		            required:true,
		            equalTo:'#new_password',
		          },
			},
			messages:{
				  password:{
		            required: 'Please enter old password.',
		            minlength: 'Password should be at least 6 characters long.'
		          },
		          new_password:{
		            required: 'Please enter new password.',
		            minlength: 'New Password should be at least 6 characters long.'
		          },
		          confirm_password:{
		            required: 'Please enter confirm password.',
		            equalTo: 'New password and confirm password should be same.'
		          }, 
			},
		})

  
	})

</script>



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

<script type="text/javascript">
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
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

@endsection()