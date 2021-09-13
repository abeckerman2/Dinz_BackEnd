@extends('restaurant.layout.layout')
@section('title','Add Item')
@section('content')

<style type="text/css">
	div#loaderImg2 {
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    margin-top: 250px;
}

body[data-background-color=dark] .main-panel label.error {
    color: #ff000d!important;
}

label.error {
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

span#item_file_invalid {
    right: 0;
    left: 0;
    text-align: center;
    margin-bottom: 10px;
}

label#exampleFormControlSelect1-error {
    font-weight: 600;
}


</style>

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>

								<li class="breadcrumb-item active">
									<a href="{{url('restaurant/parent-menu-management')}}">Menu Management</a>
								</li>
								
								<li class="breadcrumb-item active">
									<a href="{{url('restaurant/menu-management').'/'.$parent_menu_id}}">Menu Details</a>
								</li>
								<li class="breadcrumb-item remove_hover">Add Item</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Add Item</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<form method="POST" enctype="multipart/form-data" id="validate-form">
							{{@csrf_field()}}

							<input type="hidden" name="item_type" id="item_type" value="Veg">
							<div class="user_img" style="width: 12%;
							margin: auto; position: relative;" data-toggle="tooltip" data-placement="right" title="Click to upload image" data-original-title="Change Image">
								<img id="item_image" src="{{url('public/restaurant/assets/img/foodImage.jpg')}}" alt="woman" style="margin: 12px 0 12px;">
								<div class="add_img">
									<img src="{{url('public/restaurant/assets/img/plus1.png')}}" id="plus_icon" alt="plus1">
								</div>
								<input style="display:none; " type="file" id="item_file" name="image" data-role="magic-overlay" img="false";  data-target="#pictureBtn" value="" class="user_img" >


							</div>
								<span style="display:block; font-weight: 600; color: #ff000d!important; font-size: 95%;" class="text-danger" id="item_file_invalid"></span>
							<div class="add_content">
									<label for="" class="pb-1">
										Item Name
									</label>
									<div class="form-group pb-3">
										<input type="text" name="item_name" maxlength="50" class="form-control" placeholder="Enter Item Name"/>
									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Select Category
									</label>
									<div class="selectdiv mb-3">
										<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" name="category_id" id="exampleFormControlSelect1">
											<option value="">Select Category</option>
											@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->category_name}}</option>
											@endforeach()

										</select>
									</div>
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Item Type
									</label>
									<div class="form-group">
										<label class="raaddio"><span class="text">Vegetarian</span>
											<input type="radio" checked="checked" class="radio" n_type="Veg">
											<span class="checkmark"></span>
										</label>
										<label class="raaddio"><span class="text">Not Vegetarian</span>
											<input type="radio" class="radio" n_type="Non-Veg">
											<span class="checkmark"></span>
										</label>
									</div>
								
							</div>
							<div class="add_content">
								
									<label for="" class="pb-1">
										Price($)
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" maxlength="5" name="price" id="price" placeholder="Enter Price" onpaste="return false" />
									</div>
								
							</div>
							<div class="add_content">
									<label for="" class="pb-1">
										Description
									</label>
									<div class="form-group pb-3">
										<!-- <input type="email" class="form-control" placeholder="Email Address" value="" required /> -->
										<textarea class="form-control" name="description" rows="4" placeholder="Enter Description" maxlength="200"></textarea>
									</div>
							</div>
							<div class="text-center mt-2">
								
								<button type="submit" id="submit_btn" class="btn btn-warning same_wd_btn mb-2">Add</button>
								
							</div>
						</form>
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
@endsection()
@section('js')


<script type="text/javascript">
    $(document).ready(function(){

        $("#item_image").click(function(){
            $("#item_file").click();
        });
        $("#plus_icon").click(function(){
            $("#item_file").click();
        });


        $("#item_file").change(function(event){
        
              var file = event.target.files[0];
        
              if (file) {

               if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png"){

                var size = event.target.files[0].size;

                if(size > 20971520){
                    $("#item_file_invalid").text("Image size should not be greater than 20 MB.").show();

                    $("#item_file").val("");
                    $('#item_image').attr('src',"{{url('public/restaurant/assets/img/foodImage.jpg')}}");
                    //attr remove
                    $("#item_file").attr("img","false");
                    $(".add_img").show();
                    return false;
                }

                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#item_file').attr('src', e.target.result);
                  $('#item_image').attr('src', e.target.result);
                  //attr set
                  document.getElementById("item_file").setAttribute("img", "true");
                }
        
               reader.readAsDataURL(file);
               $(".add_img").hide();
               $("#item_file_invalid").text("").hide();
              }else {
                $("#item_file_invalid").text("Only .jpeg, .jpg and .png format images are allowed.").show();
                $("#item_file").val("");
                $('#item_image').attr('src',"{{url('public/restaurant/assets/img/foodImage.jpg')}}");
                $(".add_img").show();
                document.getElementById("item_file").setAttribute("img","false");

             }
            }
            });

    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$(".radio").on("click",function(){
			$(".radio").prop("checked",false);
			let item_type = $(this).attr("n_type");
			$(this).prop("checked",true);
			$("#item_type").val(item_type)
		});

		$("#submit_btn").on("click",function(){
			let checkImg = $("#item_file").attr("img");
			if(checkImg == "false"){
				$("#item_file_invalid").text("Please upload image.").show();
			}
		});



		$.validator.addMethod("alphabatic", function(value, element) {
	            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
	    });

		$('#validate-form').validate({

	        rules: {
	          item_name:{
	            required:true,
	            minlength:2,
	            alphabatic: true,
	          },
	          category_id:{
	            required:true
	          },
	          price:{
	            required:true,
	            // number:true,
	            max:10000,
	            min:0.1,
	          },
	          description:{
	            required:true
	          },
	        },
	        messages: {
	          item_name:{
	            required: 'Please enter item name.',
	            minlength: 'Item name should be at least 2 characters long.',
	            alphabatic: "Item name should be alphanumeric only.",
	          },
	          category_id:{
	            required: 'Please select category.'
	          },
	          price:{
	            required: 'Please enter price.',
	            max: 'Price should be less than or equal to $10000.',
	            min:'Price should be greater than 0.',
	          },
	          description:{
	            required: 'Please enter description.'
	          },
	        },
	        submitHandler:function(form){

	        	  let validate = "false";

	              let image_check = $("#item_file").attr("img");

	              if(image_check == "false"){
	                validate = "true";
	              }

	              $("#submit_btn").attr('disabled', true);

	              $("#loaderModel").modal("show");
	              $("#loaderModel").unbind("click");

	              setTimeout(function(){

	                  if(validate == "true"){

	                    $("#loaderModel").modal("hide");
	                    $("#submit_btn").attr('disabled', false);
	                  }else{
	                    form.submit();
	                  }
	              },500);

	            }

	    });

	});
</script>



<script type="text/javascript">
	
	$(document).ready(function(){
		$('input').keypress(function( e ) {    
			if($(this).val() == ''){
		    	if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
		        return false;
			}
		})
		// $('textarea').keypress(function( e ) {    
		// 	if($(this).val() == ''){
		//     	if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
		//         return false;
		// 	}
		// })
		$('textarea').keypress(function( e ) {    
			if($(this).val() == ''){
		    	if(!/[0-9a-zA-Z-~!@#$%^&*()_+{}:"<>,.;'/"]/.test(String.fromCharCode(e.which)))
		        return false;
			}
		})
	});

</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('#price').keypress(function (event) {
	        return isNumber(event, this)
		});

		// THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
		function isNumber(evt, element) {
		    var charCode = (evt.which) ? evt.which : event.keyCode
				if($(element).val().indexOf('.') != -1){
					$("#price").attr("maxlength","6");

					var number = ($(element).val().split('.'));
					var filtered = number.filter(function (el) {
					  return el != "";
					});
					if(filtered[1] && filtered[1].length > 1){
						return false;
					}
				}else{
					$("#price").attr("maxlength","5");
				}
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

@endsection()