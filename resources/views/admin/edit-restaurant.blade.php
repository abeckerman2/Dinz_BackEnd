@extends('admin.layout.layout')
@section('title','Edit Restaurant Details')
@section('content')

<style>

label.error {
    color: #ff0000!important;
    margin-top: 6px;
    
}


.form-group .intl-tel-input .selected-flag .iti-arrow {
    right: 0px;
}


.intl-tel-input {
  position: relative;
  display: inline-block;
  width: 100%;
}
.rest_logoo img,
.rest_images img {
      cursor: pointer;
    object-fit: contain !important;
    border: 1px solid #000;
}
.intl-tel-input .country-list { 
    width: 327px; 
}
.intl-tel-input.separate-dial-code .selected-flag {
    background-color: transparent!important;
}



  .upload_images img{
       width: 96px;
    border-radius: 5px;
    height: 100px;
    object-fit: contain;
    border: 1px solid #000000 !important;
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
       background-image: url('{{url('public/admin/img/cross.png')}}');
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
    #image_error,
     #image_error2{ 
     color: red !important;
     margin-bottom: 4px; 
         
   }
 
  .rest_logo .cross_icon, .cross_icon {
      top: -10px;
      right: -7px;
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



/*Flash message*/
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








/*Pop UP*/
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




/*Popup cross*/
#alertModel  .modal-header .close  {
    padding: 0;
    margin: 0;
}


#alertModel .modal-header img.close
 {
    position: absolute;
    opacity: 1;
    height: 30px;
    width: 30px;
    top: -13px;
    right: -12px;

}
#alertModel .modal-header img.close:hover {
  opacity: 1;
}




form.user img {
    height: 100px;
    width: 100px;
}

</style>

<!-- CSS Just for demo purpose, don't include it in your project -->
<!-- <link rel="stylesheet" href="{{url('public/restaurant/assets/css/custom.css')}}"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/css/intlTelInput.css" integrity="sha256-rTKxJIIHupH7lFo30458ner8uoSSRYciA0gttCkw1JE=" crossorigin="anonymous" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />
    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                

              <a class="dropdown-item" href="{{route('admin.logout')}}">
                  
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
                <div class="wrapper_breadcrumbs">
                  <h1 class="h3 mb-2 text-gray-800">Edit Restaurant Details</h1>
                  <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li><a href="{{route('admin.restaurantManagement')}}">Restaurant Management</a></li>
                    <li><a href="{{route('admin.approvedRestaurant')}}">Approved Restaurants</a></li>
                    <li>Edit Restaurant Details</li>
                  </ul>
                </div>


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


          <div class="card shadow mb-4" style="padding: 25px 25px;">

            <form class="user" id="validate-form" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

                  <input type="hidden" name="lat" id="lat" value="{{$restaurant_find->lat}}">
                  <input type="hidden" name="lon" id="lon" value="{{$restaurant_find->lon}}">



                  




                    <div class="add_content">
                      <label for="" class="">
                        Company Logo
                      </label>
                        <div class="pb-1 rest_logo rest_logoo">
                          <img src="{{$restaurant_find->restaurant_logo}}" onclick="$('#imgInp').click()" width="125px" height="125px" title="Change Restaurant Logo" id="blah" style="    object-fit: contain; cursor: pointer;" />
                            <input style="display:none;" type="file" id="imgInp" name="restaurant_logo" data-role="magic-overlay" data-target="#pictureBtn" value="{{$restaurant_find->restaurant_logo}}" accept="Image/*">
                          </div>
                           <span style="display:none; font-weight: 400; margin-bottom: 13px; color: #f90303!important;" class="text-danger" id="invalid_file">Please select jpg, jpeg or png image format only. 
                        </span>
                    </div>



 



                         <div class="form-group" style="    margin-top: 13px;">
                            <label>Company Name</label>
                            <input type="text" class="form-control form-control-user block-start-space" maxlength="50" id="restaurant_name" name="restaurant_name" placeholder="Company Name" value="{{$restaurant_find->restaurant_name}}">
                          </div>
                
           
        
                   
                    <div class="form-group" >
                      <label>First Name</label>
                      <input type="text" class="form-control form-control-user block-start-space" maxlength="50" id="first_name" name="first_name" placeholder="First Name" value="{{$restaurant_find->first_name}}">
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control form-control-user block-start-space" maxlength="50" id="last_name" name="last_name" placeholder="Last Name" value="{{$restaurant_find->last_name}}">
                    </div>
                     
                     <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control form-control-user block-start-space" maxlength="100" id="email" name="email" placeholder="Email Address" value="{{$restaurant_find->email}}">
                    </div>
                    <div class="form-group">
                      <label>Company Address</label>
                      <input type="text" class="form-control form-control-user block-start-space-special" placeholder="Company Address" maxlength="100"  id="restaurant_address" name="restaurant_address" value="{{$restaurant_find->restaurant_address ?? 'N/A'}}">
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-user block-start-space-special" placeholder="City" maxlength="50" id="city" name="city" value="{{$restaurant_find->city}}">
                    </div>
                     <div class="form-group" style="margin-bottom:3px;">
                      <label id="p">Phone Number</label>
                      <input type="text" class="form-control form-control-user block-start-space" maxlength="15" id="phone_number" name="phone_number" value="+{{$restaurant_find->country_code ?? ''}} {{$restaurant_find->phone_number}}" placeholder="Mobile Number">
                      <input type="hidden" name="country_code" id="country_code" value="{{$restaurant_find->country_code ?? ''}}">
                    </div>
                    <label id="phone_number-error" class="error" style="display:none;" for="phone_number"></label>

                    <div class="form-group" style="margin-top: 15px">
                      <label>Description</label>
                      <textarea class="form-control form-control-user block-start-space-special" rows="3" maxlength="200" name="description">{{$restaurant_find->description}}</textarea>
                    </div>


                   <div class="text-center Restaurant">
                    <div>
                    <button type="submit" class="btn btn-primary btn-user btn-block button_bottom">
                     Update
                    </button>
                  </div>
                  </div>
                  </form>
          </div>

        </div>
       

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->




<div id="alertModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
         <img src="{{url('public/admin/img/crosss.png')}}" class="close" style="cursor: pointer;" />
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
<script src="{{url('public/admin/js/editMultipleImages.js')}}"></script>

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
        $(document).on("click",function(){
            let checkLat = $("#lat").val();
            let checkLong = $("#lon").val();
            if(checkLat == "" && checkLong == ""){
                $("#restaurant_address").val("");
            }
        }); 
    }); 
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>


<script type="text/javascript">
  $(document).ready(function(){


        $(".close").on("click",function(){
            $("#alertModel").modal("hide");
        });



    $(document).on("click",function(){

      let checkLat = $("#lat").val();
      let checkLong = $("#lon").val();

      if(checkLat == "" && checkLong == ""){
          $("#restaurant_address").val("");
      }

    });

    $("#restaurant_address").on('keyup',function(){
      $("#lat").val("");
      $("#lon").val("");
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

      var rest_id = <?php echo $restaurant_find->id ?>;

    $('#validate-form').validate({

			rules:{
				      restaurant_name:{
		            required:true,
		            minlength:2,
                maxlength:100,
		            // alphabatic: true,
		          },
              first_name:{
		            required:true,
		            minlength:2,
                maxlength:100,
		            alphabatic: true,
		          },
              last_name:{
		            required:true,
		            minlength:2,
                maxlength:100,
		            alphabatic: true,
		          },
		          owner_name:{
		            required:true,
		            minlength:2,
                maxlength:100,
		            alphabatic: true,
		          },
		          restaurant_address:{
		            required:true,
                maxlength:100,
		            //minlength:2,
		          }, 
		          email:{
		            required:true,
		            email:true,
                maxlength:100,
		            valid_email: true,
                valid_email2:true,
                remote:"{{url('admin/check-exist-email-restaurant-edit')}}" + '/'+ rest_id,
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
                remote:"{{url('admin/check-exist-phone-number-restaurant-edit')}}" + '/'+ rest_id,
		          },
              description:{
                required:true,
                minlength:2,
              },
		          
			},
		    messages:{ 
				      restaurant_name:{
		            required: 'Please enter company name.',
		            minlength: 'Company name should be at least 2 characters long.',
		            alphabatic: "Company name should be alphanumeric only.",
		          },
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
		          email:{
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
              },
		           
		    },


		})

 

});

    </script>
 


    <!-- Country Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
<script src="{{url('public/restaurant/assets/js/common.js')}}"></script>


<!-- For Restaurant logo -->
<script type="text/javascript">
  $(document).ready(function(){

    $("#imgInp").attr("img","true");
    $(".blah").click(function(){
          $("#imgInp").click();
      });

    $("#imgInp").change(function(event){

              let restaurant_logo = "{{$restaurant_find->restaurant_logo}}";
        
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
		                $("#blah").attr("src", restaurant_logo);
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
	                $("#blah").attr("src", restaurant_logo);
	            }
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
  $(document).ready(function(){
    $('#phone_number').keypress(function (event) {
          return isNumber(event, this)
    });

    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        
          $("#price").attr("maxlength","15"); 
        if (            
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57)){

            return false;
      }else{

              return true;
      }

    }
  });
</script>



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
