@extends('restaurant.layout.layout')
@section('title','Edit Restaurant Profile')
@section('content')
	
<style type="text/css">
	label.error {
	    color: #f00!important;
	    font-size: 95%!important;
	    margin-top: .5rem;
	}
	body[data-background-color=dark] .main-panel label.error {
	    color: #ff0a0a!important;
	}
	.upload_images img{
		width: 96px;
	    border-radius: 5px;
	    height: 100px;
	    object-fit: cover;
	    border: 2px solid #8e8888 !important;
	    margin-right: 12px;
	    margin-bottom: 12px;
	    cursor: pointer;
	}
	input[type="file"] {
	    display: none;
	}
	.img_count{
		display: flex;
	}
	.remove-img {
	     /*width: 18px;*/
	     /*height: 18px;*/
	     /*padding: 4px;*/
	     border-radius: 50%;
	     box-shadow: 0px 0px 54px 0px rgba(82, 82, 82, 0.35);
	     position: absolute;
	     right: 5px;
	     top: -10px;
	     /*background-image: url('{{url('public/restaurant/assets/img/cross.png')}}');*/
	     background-size: cover;
	     cursor: pointer;
	     z-index: 1;
   }
    .media_preview .upload_images {
   		padding-left: 0;
    }
    .media_preview .upload_images {
      /*width: 143px;*/
      /*height: 136px;*/
      float: left;
      position: relative;
      word-break: break-all;
      /*border: 1px solid lightgray;*/
      /*margin: 0 15px 15px 0;*/
      margin: 0 0px 8px 0;
      padding: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      top: 10px;
    }
    #image_error , #image_error2{
     margin-top: 7px !important;
     color: red !important;
     margin-bottom: 20px; 
   }


   .rest_logo .cross_icon , .cross_icon {
	    top: -11px;
	    right: 7px;
	    font-size: 19px;
	    background: #fff;
    	border-radius: 100%;
	     cursor: pointer;
	     color: #575962;

	} 
	




/*Modal*/
#alertModel h4.modal-title {
    text-align: center;
    margin: auto;
    color: #fff;
}
#alertModel  .modal-header .close{
    padding: 0;
    margin: 0;
}
#alertModel  button.close {
    position: absolute;
    right: -11px;
    top: -12px;
    width: 31px;
    height: 30px;
    text-shadow: 0 1px 0 #ed1f24;
    background: #ed1f24;
    opacity: .5;
    border-radius: 100%;
    opacity: 1;
        border: 2px solid #fff;

}

#alertModel .modal-header {
    background-color: #ed1f24 !important;
    border: 1px solid #ed1f24 !important;
    background: linear-gradient( 
167deg
 , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
}

#alertModel .modal-footer {
    border-top: 0px solid #e9ecef;

}
#alertModel button.btn.btn-secondary.btn-lg.login_btn {
    width: 37%;
    font-size: 24px;
    padding: 6px 0;
}

#alertModel .modal-dialog {
    margin-top: 200px;
}

p#alert_txt {
    text-align: center;
    font-weight: 500;
}

#alertModel .modal-content {
    width: 110%;
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
								<li class="breadcrumb-item active"><a href="{{route('restaurant.profile')}}">Restaurant Profile</a></li>
								<li class="breadcrumb-item remove_hover">Edit Restaurant Profile</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Edit Restaurant Profile</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<div class="add_content">
									<label for="" class="pb-1">
										Owner Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="owner_name" maxlength="50" placeholder="Enter Owner Name" value="{{$data->owner_name ?? 'N/A'}}" required />
									</div>
							</div>



							<div class="add_content">
									<label for="" class="pb-1">
										Restaurant Logo
									</label>
									  <div class="pb-1 rest_logo">
				                      	<img src="{{$data->restaurant_logo}}" onclick="$('#imgInp').click()" title="Change Restaurant Logo" id="blah"/>
				                      	<input style="display:none;" type="file" id="imgInp" name="restaurant_logo" data-role="magic-overlay" data-target="#pictureBtn" value="{{$data->restaurant_logo}}" accept="Image/*">
				                      	<!-- <div class="plus_icon">
				                      		<div style="position: relative;" >
				                      			<img src="{{url('public/restaurant/assets/img/plus1.png')}}" alt="plus1"/>
				                      		</div>
				                      	</div> -->
				                      </div>
				                     <span style="display:none; font-weight: 400; margin-bottom: 20px;
 										; color: #f90303!important;" class="text-danger" id="invalid_file">Please select jpg, jpeg or png image format only. 
 									</span>
							</div>



							<!-- <div class="add_content">
									<label for="" class="pb-1">
										Restaurant Other Images
									</label>
									<div class="d-flex flex-wrap pb-1">

										
										@foreach($data->restaurantImages as $rows)
										<div class="rest_logo">
											<img src="{{$rows->restaurant_image}}" alt="cafe">
											<div class="cross_icon">
												<img src="{{url('public/restaurant/assets/img/cross.png')}}" alt="cross">
											</div>
										</div>
										@endforeach
										
										
										<div class="rest_logo" data-toggle="tooltip" data-placement="right" title="Add Restaurant Image">
											<img src="{{url('public/restaurant/assets/img/add-mul.png')}}" alt="add-mul" style="margin-right: 0;">
										</div>
									</div>
							</div> -->

                    	<input type="hidden" name="delete_images" id="delete_image">	
							<div class="add_content">
		                     <label>Restaurant Other Images</label>
		                      <div class="restru_images" style="margin-top: 11px;">
		                        <div class="images_container">
		                          <div class="img_count">

		                          	<?php $img_counts = count($data->restaurantImages); ?>

		                          	<div class="media_inputs">
		                              <div class="img_upload upload_images">
		                                  <input type="hidden" name="non_acceptable_files" class="non_acceptable_files">
		                                  <input type="hidden" class="ext_media_record" images="0" total-media ="{{$img_counts}}" />
		                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" class="images_placehold" title="Select image" data-recursion="-1" / style="margin-top: 12px;">
		                              </div>
		                            </div>


		                            <div class="media_preview d-flex flex-wrap pb-1">
		                              <?php $count = 0; ?>
		                                @foreach($data->restaurantImages as $photo)
		                                @php ($urls = $photo->restaurant_image ? url($photo->restaurant_image) : url('public/restaurant/production/images/add_image.png'))
		                                  <div class="rest_logo"  >
		                                    <img src='{{$urls}}' id="{{$photo->id}}" /> 
		                                    <i class="remove-img far fa-times-circle cross_icon" id="{{$photo->id}}" data-parent="0_0" title="Remove image" type="total-media"></i>
		                                  </div>
		                                <?php $count++ ?>
		                                @endforeach
		                            </div>
		                            
		                          </div>
		                        </div>
		                         <div class="clear-fix"></div>
		                        <label class="custom_error" id="image_error" style="display: none;"></label>
		                        <label class="custom_error2" id="image_error2" style="display: none;"></label>

		                      </div>
		                    </div>



							<div class="add_content">
									<label for="" class="pb-1">
										Restaurant Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="restaurant_name" maxlength="50" placeholder="Enter Restaurant Name" value="{{$data->restaurant_name ?? 'N/A'}}" required />
									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Mobile Number
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="phone_number" maxlength="15" placeholder="Enter Mobile Number" value="{{$data->phone_number ?? 'N/A'}}" required />
									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Email Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="email_address" placeholder="Enter Email Address" value="{{$data->email ?? 'N/A'}}" onkeypress="return AvoidSpace(event)" required />
									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Restaurant Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="restaurant_address" id="restaurant_address" maxlength="100" placeholder="Enter Restaurant Address" value="{{$data->restaurant_address ?? 'N/A'}}" required />
										<input type="hidden" name="lat" value="{{$data->lat}}" id="lat">
                  						<input type="hidden" name="lon" value="{{$data->lon}}" id="lon">


									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Description
									</label>
									<div class="form-group pb-3">
										<!-- <input type="email" class="form-control" placeholder="Email Address" value="" required /> -->
										<textarea class="form-control" name="description" id="description" rows="4" maxlength="1000" placeholder="Enter Description">{{$data->description ?? 'N/A'}}</textarea>
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



<div id="alertModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
            
            <p id="alert_txt"></p>    

      </div>
      
    </div>

  </div>



</div>

@endsection()
@section('js')


<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script src="{{url('public/restaurant/assets/js/editMultipleImages.js')}}"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){

		$(".close").on("click",function(){
            $("#alertModel").modal("hide");
        });


        jQuery.validator.addMethod("valid_email", function(value, element) {
	      console.log(value.indexOf("."))
	        if(value.indexOf(".") >= 0 ){
	          return true;
	        }else {
	          return false;
	        }
	    }, "Please enter valid email address.");


		$('#validate-form').validate({

			rules:{
				  restaurant_name:{
		            required:true,
		            minlength:2,
		          },
		          owner_name:{
		            required:true,
		            minlength:2,
		          },
		          restaurant_address:{
		            required:true,
		            //minlength:2,
		          }, 
		          email_address:{
		            required:true,
		            email:true,
		            valid_email: true,
		            remote:"{{url('restaurant/check-exist-email-user-edit')}}",
		          },
		          phone_number:{
		            required:true,
		            digits:true,
		            minlength:8,
		            maxlength:15,
		            remote:"{{url('restaurant/check-exist-phone-number-user-edit')}}",
		          },
		          description:{
		          	required:true,
		          	minlength:2,
		          },
			},
			messages:{
				  restaurant_name:{
		            required: 'Please enter restaurant name.',
		            minlength: 'Restaurant name should be atleast 2 characters long.'
		          },
		          owner_name:{
		            required: 'Please enter owner name.',
		            minlength: 'Owner name should be atleast 2 characters long.'
		          },
		          restaurant_address:{
		            required: 'Please enter restaurant address.',
		            minlength: 'Restaurant address should be atleast 2 characters long.'
		          }, 
		          email_address:{
		            required: 'Please enter email address.',
		            email: 'Please enter valid email address.'
		          },
		          phone_number:{
		            required: 'Please enter mobile number.',
		            digits: 'Please enter digits only.',
		            minlength: 'Mobile number should be in between 8 to 15 digits.',
		            maxlength: 'Mobile number should be in between 8 to 15 digits.'
		          },
		          description:{
		          	required:'Please enter description.',
		          	minlength: 'Description should be atleast 2 charcters long.'
		          }
			},
		})


		$("#validate-form").on("submit",function(){

          max_images_check = $(".img_count").find('img').length - 1;
            if(max_images_check==0){
			  $('#image_error2').css({'display':'none'});
              $(".custom_error").text("Please upload restaurant other images.").show();
              return false
            }

      })


	})

</script>


<script type="text/javascript">
	// $(document).ready(function(){

		$(document).on("click",".remove-img",function(){
			max_images_check = $(".img_count").find('img').length - 1;
            if(max_images_check==0){
            	$('#image_error2').css({'display':'block'});
            	$("#image_error2").text("Please upload restaurant other images.").show();
            }

		})

		$('.images_placehold').on('click' , function(){
			$('#image_error2').css({'display':'none'});
		})

	// })
</script>

<!-- For Restaurant logo -->
 <script type="text/javascript">
  $(document).ready(function(){

    $("#imgInp").attr("img","true");
    $(".blah").click(function(){
          $("#imgInp").click();
      });

    $("#imgInp").change(function(event){

              let user_img = "{{$data->restaurant_logo}}";
        
              var file = event.target.files[0];

            /*  console.log(file);*/
              if (file) {
                console.log(file.type);

               if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#blah').attr('src', e.target.result);
                  $("#imgInp").attr("img","true");
                  $('#invalid_file').css({'display': 'none'});
                  //attr set
                  document.getElementById("imgInp").setAttribute("img", "true");
                }
        
               reader.readAsDataURL(file);

              }else {

                $('#invalid_file').css({'display': 'block'});
                $("#invalid_file").text("Please select jpg, jpeg or png image format only.");
                $("#imgInp").val("");
                $("#blah").attr("src", user_img);
             }
            }
            })

  })
</script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbgWTyuXJbZtehcat3VvAsHE3FyapBVDs&libraries=places"></script>


 <script>

function initialize() {
  var input = document.getElementById('restaurant_address');
  var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var long = place.geometry.location.lng();
        
        $("#lat").val(lat);
        $("#lon").val(long);

    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
    $(document).ready(function(){

    	$("#restaurant_address").on('keyup',function(){
            $("#lat").val("");
            $("#lon").val("");
        });

        $(document).on("click",function(){
            let checkLat = $("#lat").val();
            let checkLong = $("#lon").val();
            if(checkLat == "" && checkLong == ""){
                $("#restaurant_address").val("");
            }
        }); 
    }); 
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

@endsection()