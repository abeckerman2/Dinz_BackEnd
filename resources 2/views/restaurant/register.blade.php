<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{url('public/restaurant/assets/img/favicon.png')}}" type="image/x-icon')}}"/>

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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/css/intlTelInput.css" integrity="sha256-rTKxJIIHupH7lFo30458ner8uoSSRYciA0gttCkw1JE=" crossorigin="anonymous" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

	<style>
		body {
			background: linear-gradient(
177deg
, rgb(237 31 36 / 80%) 0%, rgb(90 0 3 / 60%) 100%);
		}
		/*
 *  STYLE 1
 */
.intl-tel-input {
  position: relative;
  display: inline-block;
  width: 100%;
}

.intl-tel-input .country-list { 
    width: 327px; 
}


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
  

#style-1::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 50px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #555;
}


/*Multiple images*/
/*.remove-img { 
   width: 18px;
   height: 18px;
   padding: 4px;
   border-radius: 50%;
   box-shadow: 0px 0px 54px 0px rgba(82, 82, 82, 0.35);
   position: absolute;
   right: 3px;
   top: -15px;
   background-image: url('{{url('public/restaurant/assets/img/cross.png')}}');
   background-size: cover;
   cursor: pointer;
   z-index: 1;
}
.media_preview .upload_images {
  width: 112px;
  height: 100px;
  float: left;
  position: relative;
  word-break: break-all;
  margin: 0 13px 12px 0;
  padding: 2px;
  display: flex;
  align-items: center;
  justify-content: center;
}
input[type="file"] {
    display: none;
}
*/


label#image_error {
  position: relative;
  top: -13px;
  color: #ff000d!important;
}
#image_error {
  color: #ff000d!important;
}
label.error {
    color: #ff000d!important;
    font-size: 95%!important;
    margin-top: .5rem;
    margin-bottom: 0px;
}





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


.dynamic_image_show {
    display: flex;
    flex-wrap: wrap;
}

.dynamic_image_show .img_div img {
    width: 96px;
    height: 100px;
    object-fit: cover;
    border: 2px solid #8e8888 !important;
    border-radius: 5px;
    margin-right: 12px; 
    margin-bottom : 19px;
}

 
.dynamic_image_show .img_div img.cross_icon {
    width: 18px!important;
    height: 18px!important;
    background-color: transparent;
    position: absolute;
    top: -9px;
    z-index: 999;
    right: -7px; 
    color: white;
    font-size: 20px;
    border: 0 !important;
}

.img_div {
    position: relative;
}

div#loaderImg2 {
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    margin-top: 250px;
}

textarea.form-control {
    color: #000!important;
}

textarea.form-control::placeholder {
    color: #82868b!important;
}
span#logo_invalid_file {
    position: relative;
    top: -6px;
}
.restaurant_div.form-group.label {
    padding-top: 0px;
}
label#restaurant_address-error {
    margin-bottom: 7px;
}
	</style>
</head>
<body>

	<div class="container">
		
		<div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 login_card">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <a href="{{route('restaurant.login')}}" class="back"><img src="{{url('public/restaurant/assets/img/back1.png')}}" alt=""></a>
                    <div class="logo-wrapper"><a href="{{url('restaurant/login')}}"><img src="{{url('public/restaurant/assets/img/andrewlogo.png')}}" alt="andrewlogo"/></a></div>
                    <h1 class="h4 text-gray-900 mb-4">Register For Restaurant</h1>
                  </div>
                  <form method="POST" enctype="multipart/form-data" class="user scrollbar" style="max-height: 330px; overflow-y: scroll; padding-right: 10px"  id="style-1">
                  {{csrf_field()}}


                  <input type="hidden" name="click_on_file_count" id="click_on_file_count">
                  <input type="hidden" name="image_count" value="0" id="image_count">
                  <input type="hidden" name="click_on_cross_count" id="click_on_cross_count">
                  <input type="hidden" name="upload_file_count" id="upload_file_count">
                  <input type="hidden" name="acceptable[]" id="acceptable">
                  <input type="hidden" name="non_acceptable[]" id="non_acceptable">
                  <input type="hidden" name="lat" id="lat">
                  <input type="hidden" name="lon" id="lon">
                  <input type="hidden" name="country_code" value="+1">


                  <div class="files_container" style="display: none;">

                       
                      
                  </div>

                  	<div class="force-overflow"></div>
                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="first_name" maxlength="50" class="form-control form-control-user block-start-space" aria-describedby="emailHelp" placeholder="Enter First Name">
                    </div>
                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="last_name" maxlength="50" class="form-control form-control-user block-start-space" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="restaurant_name" maxlength="50" class="form-control form-control-user block-start-space" placeholder="Enter Restaurant Name">
                    </div> 


                   <!--  <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="owner_name" maxlength="50" class="form-control form-control-user" placeholder="Enter Owner Name">
                    </div>  -->



                    <div class="form-group label" style="padding-right: 0; padding-left: 0; margin-top: -5px;">
                    	<label>Restaurant Logo/Image</label>
                      <div class="rest_logo" style="margin-top: 0px">
                      	<img src="{{url('public/restaurant/assets/img/add-mul.png')}}" title="Click to upload logo" id="logo_upload" />
                      	<input style="display:none; " type="file" id="logo_file" name="restaurant_logo" data-role="magic-overlay" img="false";  data-target="#pictureBtn" value="" class="user_img" accept="image/*">
                      </div>
                      <span style="display:block; font-weight: 600; color: #ff000d!important;" class="text-danger" id="logo_invalid_file"></span>
                    </div>




                      <!-- <div class=" restaurant_div form-group label" style="padding-right: 0; padding-left: 0; margin-top: -5px;">
                        <label>Restaurant Other Images</label>
                          <div class="restru_images d-flex flex-wrap" style="">
                              <div class="rest_logo images_container">
                                <div class="media_preview" ></div>
                              </div>

                              <div class="media_inputs rest_logo">
                                  <div class="img_upload upload_images">
                                    <input type="hidden" name="non_acceptable_files" class="non_acceptable_files">
                                    <input type="hidden" class="ext_media_record" images="0" total-media = "0" />
                                      <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" class="images_placehold" title="Upload image" data-recursion="-1" />
                                  </div>
                              </div>
                          </div>
                              <label class="custom_error" id="image_error" style="display: none; margin-top: 0;"></label>
                      </div> -->




                      <div class=" restaurant_div form-group label" style="padding-right: 0; padding-left: 0; margin-top: -5px;    padding-bottom: 0px;">
                        <label>Restaurant Other Images</label>
                          <div class="restru_images d-flex flex-wrap" style="">

                            <div class="dynamic_image_show">
                              
                              <!-- <div class="img_div">
                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" data-recursion="-1" />
                                  <span>
                                        <i class="far fa-times-circle cross_icon" ui="image"></i>
                                  </span>
                              </div>

                              <div class="img_div">
                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" data-recursion="-1" />
                                  <span>
                                        <i class="far fa-times-circle cross_icon" ui="image"></i>
                                  </span>
                              </div>

                              <div class="img_div">
                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" data-recursion="-1" />
                                  <span>
                                        <i class="far fa-times-circle cross_icon" ui="image"></i>
                                  </span>
                              </div>


                              <div class="img_div">
                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" data-recursion="-1" />
                                  <span>
                                        <i class="far fa-times-circle cross_icon" ui="image"></i>
                                  </span>
                              </div>

                              <div class="img_div">
                                  <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" data-recursion="-1" />
                                  <span>
                                        <i class="far fa-times-circle cross_icon" ui="image"></i>
                                  </span>
                              </div> -->

                              <div class="rest_logo plus_icon" style="margin:0;">
                                      <img src="{{url('public/restaurant/assets/img/add-mul.png')}}" class="images_placehold plus_icon_click_for_multiple_img_upload" title="Click to upload images" data-recursion="-1" />
                              </div>
                            </div>



                          </div>
                              <span style="display:none; font-weight: 600; color: #ff000d!important; top: -6px;
    position: relative;" class="text-danger" id="other_images_invalid"></span>
                      </div>






                    
                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="restaurant_address" id="restaurant_address" maxlength="100" class="form-control form-control-user block-start-space-special" placeholder="Enter Restaurant Address">
                    </div>

                    <div class="form-group" id="map" style="width:100%;height:200px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></div>

                    <div class="form-group" style="padding-right: 0; padding-left: 0; margin-top: 10px;">
                      <input type="text" name="city" maxlength="50" class="form-control form-control-user" placeholder="Enter City">
                    </div>





                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="email" id="email" maxlength="100" class="form-control form-control-user block-start-space" placeholder="Enter Email Address">
                    </div>

                    <div class="form-group country_code" style="padding-right: 0; padding-left: 0">
                      <input type="text" name="phone_number" id="phone_number" maxlength="15" class="form-control form-control-user block-start-space" placeholder="Enter Mobile Number">
                      <label id="phone_number-error" class="error" for="phone_number" style="display: none;">
                        {{$errors->first('phone_number')}}</label>
                       <input type="hidden" name="country_code" id="country_code">
                    </div>




                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <textarea class="form-control block-start-space-special" name="description" id="description" rows="3" maxlength="1000" placeholder="Enter Description"></textarea>
                    </div>



                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="password" name="password" id="password" maxlength="70" class="form-control form-control-user" placeholder="Enter Password"  onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off"   onkeypress="return AvoidSpace(event)">
                    </div>
                    <div class="form-group" style="padding-right: 0; padding-left: 0">
                      <input type="password" name="confirm_password" maxlength="70" class="form-control form-control-user" placeholder="Enter Confirm Password"  onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off"   onkeypress="return AvoidSpace(event)">
                    </div>
                    <!-- <a href="{{route('restaurant.login')}}" class="btn btn-primary btn-user btn-block common_btn mt-3">
                      Sign Up
                    </a> -->

                    <button type="submit" id="submit_btn" class="btn btn-primary btn-user btn-block common_btn mt-3">
                      Sign Up
                    </button>

                    <!-- <input type="submit" name="submit" id="submit" value="Sign Up" class="btn btn-primary btn-user btn-block common_btn mt-3"> -->
                  </form>
                </div>
                  
              </div>
              <div class="col-lg-6 d-none d-lg-block bg-login-image register"></div>
            </div>
          </div>
        </div>

      </div>

    </div>
	</div>




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


<div id="loaderModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="loaderImg2" id="loaderImg2">
               <img src = "{{url('public/loader.gif')}}">
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
<!-- <script src="{{url('public/restaurant/assets/js/demo.js')}}"></script> -->

<script src="{{url('public/restaurant/assets/js/addMultipleImages.js')}}"></script>


<!-- Country Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
<script src="{{url('public/restaurant/assets/js/common.js')}}"></script>

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




<script type="text/javascript">
    $(document).ready(function(){

        $("#logo_upload").click(function(){
            $("#logo_file").click();
        });


        $("#logo_file").change(function(event){
        
              var file = event.target.files[0];
        
              if (file) {

               if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                var size = event.target.files[0].size;

                if(size > 20971520){
                    $("#logo_invalid_file").text("Image size should not be greater than 20 MB.").show();

                    $("#logo_file").val("");
                    $('#logo_upload').attr('src',"{{url('public/restaurant/assets/img/add-mul.png')}}");
                    //attr remove
                    $("#logo_file").attr("img","false");
                    return false;
                }

                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#logo_file').attr('src', e.target.result);
                  $('#logo_upload').attr('src', e.target.result);
                  //attr set
                  document.getElementById("logo_file").setAttribute("img", "true");
                }
        
               reader.readAsDataURL(file);
               $("#logo_invalid_file").text("").hide();
              }else {
                $("#logo_invalid_file").text("Please select jpg, jpeg or png image format only.").show();
                $("#logo_file").val("");
                $('#logo_upload').attr('src',"{{url('public/restaurant/assets/img/add-mul.png')}}");
                
                document.getElementById("logo_file").setAttribute("img","false");

             }
            }
            });

    });
</script>




<script type="text/javascript">
    $(document).ready(function(){

        $(".close").on("click",function(){
            $("#alertModel").modal("hide");
        });

        enableClickClasses();

        function enableClickClasses(){

            $(document).on("click",".plus_icon_click_for_multiple_img_upload",function(){

                let __count_click = $("#click_on_file_count").val();



                __count = __count_click == "" ? 0 : parseInt(__count_click) + 1;

                $("#click_on_file_count").val(__count);

                
                /*Make Html Input FIles*/

                $(".files_container").append(`<input type='file' style="display:none" id="files_`+__count+`" accept="image/*" class ="files" name="files[`+__count+`][]" multiple>`);


                $("#files_"+__count).click();



                $("#files_"+__count).on("change",function(event){

                    var files = event.target.files;

                    let error = "false";

                    let image_count = 0;

                    $.each(files, function (i) {
                        
                        let file = event.target.files[i];


                        let size = event.target.files[i].size;



                        if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                            if(size > 20971520){
                                
                                $("#alertModel").modal("show");
                                $("#alertModel").unbind("click");
                                $("#alert_txt").text("Image size should not be greater than 20 MB.");

                                $("#files_"+__count).remove();  
                                error = "true";
                                return false;
                            }

                            image_count++;
                           
                        }else{
                            

                            $("#alertModel").modal("show");
                            $("#alertModel").unbind("click");
                            $("#alert_txt").text("Only .jpeg, .jpg, .png type file are allowed.");

                            $("#files_"+__count).remove();  
                            error =  "true";
                            return false;

                         }

                    });

                   // console.log(image_count);

                    if(error == "false"){

                        let already_upload_img_count = $("#image_count").val();

                        let total_img_count = parseInt(already_upload_img_count) + image_count;

                        if(total_img_count > 5){

                            $("#alertModel").modal("show");
                            $("#alertModel").unbind("click");
                            $("#alert_txt").text("Maximum 5 images are allowed.");
                            $("#files_"+__count).remove();  
                            error =  "true";
                            return false;
                        }


                        if(total_img_count == 5){
                          $(".plus_icon").hide();
                        }else{
                          $(".plus_icon").show();
                        }

                    }


                    if(error == "false"){

                    $.each(files, function (i) {
                        
                        let file = event.target.files[i];
                        let file_name = file.name;


                        if(file){

                           if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                            var reader = new FileReader();
                            
                            reader.onload = function(e) {
                              //$('#profile_picture').attr('src', e.target.result);
                              
                                let upload_file_count_val = $("#upload_file_count").val();

                                let __upload_file_count = upload_file_count_val == "" ? 1 : parseInt(upload_file_count_val) + 1;

                                $("#upload_file_count").val(__upload_file_count);


                                let acceptable_file_arr = __count+'_'+i;

                                
                                let acceptable_val = $("#acceptable").val();

                                let push_val_acceptable = acceptable_val == "" ? acceptable_file_arr : acceptable_val+','+acceptable_file_arr;

                       

                                $("#acceptable").val(push_val_acceptable);


                                let image_count_val = $("#image_count").val();

                                let __count_image = image_count_val == "" ? 1 : parseInt(image_count_val) + 1;

                                $("#image_count").val(__count_image);

                                
                                let image_html = `<div class="img_div">
                                  <img id="accept_`+acceptable_file_arr+`" src="`+e.target.result+`" data-recursion="-1" />
                                  <span>
                                        <img class="cross_icon" src="{{url('public/restaurant/assets/img/cross.png')}}" id="cross_`+acceptable_file_arr+`" style="cursor:pointer;" ui="image">
                                  </span>
                                  </div>`;

                                $(".dynamic_image_show").append(image_html);


                                //cross function

                                $("#cross_"+acceptable_file_arr).on("click",function(){


                                  
                                  $(".plus_icon").show();
                                  

                                    let check_type = $(this).attr("ui");

                                    if(check_type == "image"){
                                        
                                        let parent_div = $(this).parent().parent();

                                        
                                        let image_count_val = $("#image_count").val();

                                        let sub_image_count_val = image_count_val - 1;

                                        $("#image_count").val(sub_image_count_val);


                                        let non_acceptable = $("#non_acceptable").val();

                                        let acceptable = $(this).attr('id');

                                        acceptable = acceptable.replace("cross_", "");

                                        let push_val_non_acceptable = non_acceptable == "" ? acceptable : non_acceptable+','+acceptable;

                               

                                        $("#non_acceptable").val(push_val_non_acceptable);


                                        let cross_count_val = $("#click_on_cross_count").val();


                                        let cross_count = cross_count_val == "" ? 1 : parseInt(cross_count_val) + 1;

                                        $("#click_on_cross_count").val(cross_count);

                                        parent_div.remove();



                                        if($("#image_count").val() == "" || $("#image_count").val() == 0){
                                            
                                            $("#other_images_invalid").text("Please upload restaurant other images.").show();
                                        }



                                    }

        
                                });

                                //end cross function




                            }
                    
                           reader.readAsDataURL(file);
                           $("#other_images_invalid").text("").hide();
                           
                          }

                        }



                    });

                    }


                    

                });

            });

        }

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
      lat_val = "36.7783";
      lon_val = "119.4179";
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
              $("#restaurant_address-error").text("Please enter restaurant address.").css("display","block");
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



    let __lat_val = "36.7783";
    let __lon_val = "119.4179";
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
              $("#restaurant_address-error").text("Please enter restaurant address.").css("display","block");
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



    $("#submit_btn").on("click",function(){
      let logo_check = $("#logo_file").attr("img");
      if(logo_check == "false"){
        $("#logo_invalid_file").text("Please upload Logo/Image.").show();
      }else{
        $("#logo_invalid_file").text("").hide();
      }

      let other_images_check = $("#image_count").val();

      if(other_images_check <= 0){
        $("#other_images_invalid").text("Please upload restaurant other images.").show();
      }else{
        $("#other_images_invalid").text("").hide();
      }
    });


    // $("#email").on("focusout",function(){
    //         let val = $(this).val();

    //         var data = {
    //         '_token': "{{csrf_token()}}",
    //         'email': val,
    //         };

    //       $.ajax({
    //           url:"{{url('restaurant/check-exist-email-user')}}",
    //           type:'POST',
    //           data:data,
    //           success: function(res){
    //             if(res == 1){
    //               $("#email-error").text("Email address already exists.").show();
    //             }else{
    //              // $("#email-error").text("").hide();
    //             }
    //           },
    //           error: function(data, textStatus, xhr) {
    //             if(data.status == 422){
    //               var result = data.responseJSON;
    //               alert('Something went worng.');
    //               window.location.href = "";
    //               return false;
    //             } 
    //           }
    //         });
    //     });



        // $("#phone_number").on("focusout",function(){
        //     let val = $(this).val();

        //     var data = {
        //     '_token': "{{csrf_token()}}",
        //     'phone_number': val,
        //     };

        //   $.ajax({
        //       url:"{{url('restaurant/check-exist-phone-number-user')}}",
        //       type:'POST',
        //       data:data,
        //       success: function(res){
        //         if(res == 1){
        //           $("#phone_number-error").text("Phone number already exists.").show();
        //         }else{
        //          // $("#phone_number-error").text("").hide();
        //         }
        //       },
        //       error: function(data, textStatus, xhr) {
        //         if(data.status == 422){
        //           var result = data.responseJSON;
        //           alert('Something went worng.');
        //           window.location.href = "";
        //           return false;
        //         } 
        //       }
        //     });
        // });


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


    $('#style-1').validate({

        rules: {
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
            // alphabatic: true,
            //minlength:2,
          },
          city:{
            required:true,
            minlength:2,
            // alphabatic: true,
          },
          email:{
            required:true,
            email:true,
            valid_email: true,
            valid_email2: true, 
            remote:"{{url('restaurant/check-email')}}",
          },
          phone_number:{
            required:true,
            digits:true,
            minlength:8,
            maxlength:15,
            remote:"{{url('restaurant/check-phone')}}",
          },
          password:{
            required:true,
            minlength:6,
          },
          confirm_password:{
            required:true,
            equalTo: '#password',
          },
          description:{
            required:true,
            minlength:2,
          },

        },
        messages: {
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
            required: 'Please enter restaurant name.',
            minlength: 'Restaurant name should be at least 2 characters long.',
            alphabatic: "Restaurant name should be alphanumeric only.",
          },
          owner_name:{
            required: 'Please enter owner name.',
            minlength: 'Owner name should be at least 2 characters long.',
            alphabatic: "Owner name should be alphanumeric only.",
          },
          restaurant_address:{
            required: 'Please enter restaurant address.',
            minlength: 'Restaurant address should be at least 2 characters long.',
            // alphabatic: "Restaurant should be alphanumeric only.",
          },
          city:{
            required: 'Please enter city.',
            minlength: 'City should be at least 2 characters long.',
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
          password:{
            required: 'Please enter password.',
            minlength: 'Password should be at least 6 charcters long.'
          },
          confirm_password:{
            required: 'Please enter confirm password.',
            equalTo: 'Password and confirm password should be same.'
          },
          description:{
            required:'Please enter description.',
            minlength: 'Description should be at least 2 charcters long.',
          }
        },
        submitHandler:function(form){

              let email_validate = "false";
              let phone_validate = "false";
              let multiple_image_validate = "false";
              let logo_validate = "false";

              let multiple_images_check = $("#image_count").val();
              if(multiple_images_check <= 0){
                multiple_image_validate = "true";
              }

              let logo_image_check = $("#logo_file").attr("img");

              if(logo_image_check == "false"){
                logo_validate = "true";
              }




              $("#submit_btn").attr('disabled', true);

              $("#loaderModel").modal("show");
              $("#loaderModel").unbind("click");

                let email_val = $("#email").val();

                var data = {
                  '_token': "{{csrf_token()}}",
                  'email': email_val,
                };

                $.ajax({
                    url:"{{url('restaurant/check-exist-email-user')}}",
                    type:'POST',
                    data:data,
                    success: function(res){
                      console.log(res);
                      if(res == 1){
                          $("#email-error").text("Email address already exists.").show();
                          $("#submit_btn").attr("disabled",false);
                          email_validate = "true";
                        }else{
                            $("#email-error").text("").hide();
                            email_validate = "false";
                            
                        }
                      },
                      error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                          $("#submit_btn").attr("disabled",false);
                          var result = data.responseJSON;

                          alert('Something went worng.');
                        window.location.href = "";
                        return false;
                        } 
                      }
                });



                let phone_number = $("#phone_number").val();

                var data = {
                  '_token': "{{csrf_token()}}",
                  'phone_number': phone_number,
                };

                $.ajax({
                    url:"{{url('restaurant/check-exist-phone-number-user')}}",
                    type:'POST',
                    data:data,
                    success: function(res){
                      console.log(res);
                      if(res == 1){
                          $("#phone_number-error").text("Phone number already exists.").show();
                          $("#submit_btn").attr("disabled",false);
                          phone_validate = "true";
                        }else{
                            $("#phone_number-error").text("").hide();
                            phone_validate = "false";
                        }
                      },
                      error: function(data, textStatus, xhr) {
                        if(data.status == 422){
                          $("#submit_btn").attr("disabled",false);
                          var result = data.responseJSON;

                          alert('Something went worng.');
                        window.location.href = "";
                        return false;
                        } 
                      }
                });


                setTimeout(function(){
                  if(email_validate == "true" || phone_validate == "true" || multiple_image_validate == "true" || logo_validate == "true"){

                    $("#loaderModel").modal("hide");
                    $("#submit_btn").attr('disabled', false);
                  }else{
                    form.submit();
                  }
              }, 5000);

            }

    });

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

<!-- Block space in password -->
<script type="text/javascript">
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
</script>

 
<!-- Block space at beninning of field -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('input').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
   
    $('textarea').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-~!@#$%^&*()_+{}:"<>,.;'/"]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
  });

</script> -->


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


</body>