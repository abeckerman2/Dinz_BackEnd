@extends('restaurant.layout.layout')
@section('title','Edit Restaurant Details')
@section('content')
	

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/css/intlTelInput.css" integrity="sha256-rTKxJIIHupH7lFo30458ner8uoSSRYciA0gttCkw1JE=" crossorigin="anonymous" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />


<style type="text/css">

	/*country code*/
	li.country {
	    color: #080808;
	}
	.selected-dial-code {
	    color: #080808;
	} 
	.intl-tel-input .country-list .country .dial-code {
	    color: #080808!important;
	}


	.intl-tel-input {
      position: relative;
      display: inline-block;
      width: 100%;
    }

	label.error {
	    color: #f00!important;
	    font-size: 95%!important;
	    margin-top: .5rem;
	    margin-bottom: 0px;
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
		/*margin-top: -15px;*/
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
	     background-image: url('{{url('public/restaurant/assets/img/cross.png')}}');
	     background-size: cover;
	     cursor: pointer;
	     z-index: 1;
   }
    .media_preview .upload_images {
   		padding-left: 0;
    }
    .media_preview .upload_images { 
      float: left;
      position: relative;
      word-break: break-all; 
      margin: 0 0px 8px 0;
      padding: 2px;
      display: flex;
      align-items: center;
      justify-content: center;
      top: 10px;
    }
    #image_error , #image_error2{ 
     color: red !important;
     margin-bottom: 18px; 
   }
 
	.rest_logo .cross_icon, .cross_icon {
	    top: -10px;
	    right: 4px;
	    font-size: 19px; 
	    border-radius: 100%;
	    cursor: pointer;
	    color: #ffffff;
	    height: 18px;
	    width: 18px;
	}
	.upload_images  .cross_icon{
		top: -8px;
    	right: 6px;
	}
	

	.rest_logoo img { 
	    margin-top: -10px;
	}
/*
.rest_images img { 
    margin-top: -15px;
}
*/
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
								<li class="breadcrumb-item remove_hover">Edit Restaurant Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Edit Restaurant Details</h1>
					<div class="card">
						<div class="card-body add_imgae_box">

							<div class="add_content">
									<label for="" class="pb-1">
										First Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control block-start-space" name="first_name" maxlength="50" placeholder="Enter First Name" value="{{$data->first_name ?? 'N/A'}}" required />
									</div>
							</div>


							<div class="add_content">
									<label for="" class="pb-1">
										Last Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control block-start-space" name="last_name" maxlength="50" placeholder="Enter Last Name" value="{{$data->last_name ?? 'N/A'}}" required />
									</div>
							</div>


							<div class="add_content">
								<label for="" class="pb-1">
									Company Name
								</label>
								<div class="form-group pb-3">
									<input type="text" class="form-control block-start-space" name="restaurant_name" maxlength="50" placeholder="Enter Company Name" value="{{$data->restaurant_name ?? 'N/A'}}" required />
								</div>
							</div>

							<!-- <div class="add_content">
									<label for="" class="pb-1">
										Owner Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" name="owner_name" maxlength="50" placeholder="Enter Owner Name" value="{{$data->owner_name ?? 'N/A'}}" required />
									</div>
							</div> -->



							<div class="add_content">
									<label for="" class="pb-1">
										Company Logo/Image
									</label>
									  <div class="pb-1 rest_logo rest_logoo">
				                      	<img src="{{$data->restaurant_logo}}" onclick="$('#imgInp').click()" title="Change Restaurant Logo" id="blah"/>
				                      	<input style="display:none;" type="file" id="imgInp" name="restaurant_logo" data-role="magic-overlay" data-target="#pictureBtn" value="{{$data->restaurant_logo}}" accept="Image/*">
				                      	<!-- <div class="plus_icon">
				                      		<div style="position: relative;" >
				                      			<img src="{{url('public/restaurant/assets/img/plus1.png')}}" alt="plus1"/>
				                      		</div>
				                      	</div> -->
				                      </div>
				                     <span style="display:none; font-weight: 400; margin-bottom: 15px; margin-top: -8px; color: #f90303!important;" class="text-danger" id="invalid_file">Please select jpg, jpeg or png image format only. 
 									</span>
							</div>



							 
 


							<div class="add_content">
									<label for="" class="pb-1">
										Company Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control block-start-space-special" name="restaurant_address" id="restaurant_address" maxlength="100" placeholder="Enter Company Address" value="{{$data->restaurant_address ?? 'N/A'}}" required />
										<input type="hidden" name="lat" value="{{$data->lat}}" id="lat">
                  						<input type="hidden" name="lon" value="{{$data->lon}}" id="lon"> 
									</div>

									<div class="form-group" id="map" style="width:100%;height:200px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></div>
							</div>


							<div class="add_content">
									<label for="" class="pb-1" style="margin-top: 15px">
										City
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control block-start-space-special" name="city" id="city" maxlength="50" placeholder="Enter City" value="{{$data->city ?? 'N/A'}}" required />  
									</div>
							</div>




						
							<div class="add_content">
									<label for="" class="pb-1">
										Email Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control block-start-space" name="email_address" placeholder="Enter Email Address" id="email" value="{{$data->email ?? 'N/A'}}" onkeypress="return AvoidSpace(event)" required />

										<!-- <label id="email-error-dot" class="error" style="display: none">Please enter valid email address.</label> -->

									</div>
							</div>



							<div class="add_content country_code">
				                <label for="" class="pb-1">
				                	Mobile Number
				                </label>
				                <div class="form-group pb-3">
				                	<input style="" type="text" class="form-control block-start-space" minlength="8" maxlength="15" placeholder="Enter Mobile Number" value="+{{$data->country_code ?? ''}} {{$data->phone_number ?? 'N/A'}}"  name="phone_number" id="phone_number" required />
				                	<label id="phone_number-error" class="error" for="phone_number" style="display: none;">{{$errors->first('phone_number')}}</label>
				               		<input type="hidden" name="country_code" id="country_code" value="{{$data->country_code ?? ''}}">
				               	</div>
				            </div>



							<div class="add_content">
									<label for="" class="pb-1">
										Description
									</label>
									<div class="form-group pb-3">
										<!-- <input type="email" class="form-control" placeholder="Email Address" value="" required /> -->
										<textarea class="form-control block-start-space-special" name="description" id="description" rows="4" maxlength="200" placeholder="Enter Description">{{$data->description ?? 'N/A'}}</textarea>
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


<!-- Country Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
<script src="{{url('public/restaurant/assets/js/common.js')}}"></script>

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

		$.validator.addMethod("valid_email2", function(value, element) {
	        return this.optional(element) || value == value.match(/^[.@a-zA-Z0-9\s]+$/);
		}, "Please enter valid email address.");


        $.validator.addMethod("alphabatic", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
    	});


		$('#validate-form').validate({

			rules:{
				first_name:{
		            required:true,
		            minlength:2,
		            alphabatic: true,
		          },
		          last_name:{
		            required:true,
		            minlength:2,
		            alphabatic: true,
		          },
				  restaurant_name:{
		            required:true,
		            minlength:2,
		            // alphabatic: true,
		          },
		          // owner_name:{
		          //   required:true,
		          //   minlength:2,
		          //   alphabatic: true,
		          // },
		          restaurant_address:{
		            required:true,
		            //minlength:2,
		          }, 
		          email_address:{
		            required:true,
		            email:true,
		            valid_email: true,
		            valid_email2: true,
		            remote:"{{url('restaurant/check-exist-email-user-edit')}}",
		          },
		          city:{
		          	required:true,
		          	minlength:2,
		          	maxlength:50,
		          	// alphabatic: true,
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
				first_name:{
		            required: 'Please enter first name.',
		            minlength: 'First name should be at least 2 characters long.',
		            alphabatic: "First name should be alphanumeric only.",
		          },
		          last_name:{
		            required: 'Please enter last name.',
		            minlength: 'Last name should be at least 2 characters long.',
		            alphabatic: "Last name should be alphanumeric only.",
		          },
				  restaurant_name:{
		            required: 'Please enter company name.',
		            minlength: 'Company name should be at least 2 characters long.',
		            alphabatic: "Company name should be alphanumeric only.",
		          },
		          owner_name:{
		            required: 'Please enter owner name.',
		            minlength: 'Owner name should be at least 2 characters long.',
		            alphabatic: "Owner name should be alphanumeric only.",
		          },
		          restaurant_address:{
		            required: 'Please enter company address.',
		            minlength: 'Company address should be at least 2 characters long.'
		          }, 
		          city:{
		          	required:'Please enter city.',
		          	minlength: 'City should be at least 2 charcters long.',
		          	alphabatic: "City name should be alphanumeric only.",
		          },
		          email_address:{
		            required: 'Please enter email address.',
		            email: 'Please enter valid email address.'
		          },
		          phone_number:{
		            required: 'Please enter mobile number.',
		            digits: 'Please enter digits only.',
		            minlength: 'Mobile number should be between 8 to 15 digits.',
		            maxlength: 'Mobile number should be between 8 to 15 digits.'
		          },
		          description:{
		          	required:'Please enter description.',
		          	minlength: 'Description should be at least 2 charcters long.',
		          }
			},
		})


		$("#validate-form").on("submit",function(){


			 


     //      	max_images_check = $(".img_count").find('img').length - 1;
     //        if(max_images_check==0){
			  // $('#image_error2').css({'display':'none'});
     //          $(".custom_error").text("Please upload restaurant other images.").show();
     //          return false
     //        }

      })


	})

</script>

<!-- when type in email dot validation removes -->
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#email').on('keyup' , function(){
			$('#email-error-dot').css('display' , 'none');
		})
	})
</script> -->


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

              var size = event.target.files[0].size;

              // console.log(size);
              if (file) {
                // console.log(file.type);

                if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

	               	if(size > 20971520){
	               		$('#invalid_file').css({'display': 'block'});
		                $("#invalid_file").text("Image size should not be greater than 20 MB.");
		                $("#imgInp").val("");
		                $("#blah").attr("src", user_img);
	               	}else{
		                var reader = new FileReader();
		                reader.onload = function(e) {
		                  $('#blah').attr('src', e.target.result);
		                  $("#imgInp").attr("img","true");
		                  $('#invalid_file').css({'display': 'none'});
		                  //attr set
		                  document.getElementById("imgInp").setAttribute("img", "true");
		                }
		               reader.readAsDataURL(file);
               		}
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
        setLocation(lat,long);

    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>





<script type="text/javascript">

  function setLocation(lat_val, lon_val){

    if(lat_val == "" || lon_val == ""){
      lat_val = $("#lat").val(lat);
      lon_val = $("#lon").val(long);
    }
    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(lat_val, lon_val),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat_val, lon_val),
        map: map,
        draggable:true,
        // icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        //icon: 'http://labs.google.com/ridefinder/images/mm_20_gray.png',
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
      });


      marker.setMap(map);
      map.setZoom(16);
      map.setCenter(marker.getPosition());


      google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {

              $("#restaurant_address-error").css("display","none");
              $('#lat').val(marker.getPosition().lat());
              $('#lon').val(marker.getPosition().lng());
              $("#restaurant_address").val(results[0].formatted_address);
            }else{
              $('#lat').val("");
              $('#lon').val("");
              $("#restaurant_address").val("");
              $("#restaurant_address-error").text("Please enter company address.").css("display","block");
            }
          }
        });
      });


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {

        //stop to click view popup;
        return false;
        let html_restaurant = "<p>abc</>";
        infowindow.setContent(html_restaurant);
        infowindow.open(map, marker);
      }

    })(marker, i));
  }



    let __lat_val = "{{$data->lat}}";
    let __lon_val = "{{$data->lon}}";
    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(__lat_val, __lon_val),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(__lat_val, __lon_val),
        map: map,
        draggable:true,
        // icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        //icon: 'http://labs.google.com/ridefinder/images/mm_20_gray.png',
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
      });

      marker.setMap(map);
      map.setZoom(16);
      map.setCenter(marker.getPosition());


      google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {

              $("#restaurant_address-error").css("display","none");
              $('#lat').val(marker.getPosition().lat());
              $('#lon').val(marker.getPosition().lng());
              $("#restaurant_address").val(results[0].formatted_address);
            }else{
              $('#lat').val("");
              $('#lon').val("");
              $("#restaurant_address").val("");
              $("#restaurant_address-error").text("Please enter company address.").css("display","block");
            }
          }
        });
      });


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {

        //stop to click view popup;
        return false;
        let html_restaurant = "<p>abc</>";
        infowindow.setContent(html_restaurant);
        infowindow.open(map, marker);
      }

    })(marker, i));
  
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


<!-- Block space at beninning of field -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.block-start-space').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
 
    $('.block-start-space-special').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-~!@#$%^&*()_+{}:"<>,.;'/"]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
  });

</script>

@endsection()