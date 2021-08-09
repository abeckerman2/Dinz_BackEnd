 @extends('restaurant.layout.layout')
@section('title','Add Document')
@section('content')
<style type="text/css">

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



img#blah {
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    cursor: pointer;
}
/*img#blah {
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    cursor: pointer;
}*/
.user_img {
    margin-bottom: 22px;
}
.add_btn.create_btn {
    background-color: #000;
    position: unset;
    padding: 25px 17px;
}
input#submit {
    width: 100px;
}


.qr_image img{
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    margin-left: 60px;
}
input.form-control {
    background-color: #fff!important;
    font-size: 15px !important;
    border: 2px solid #8e8888 !important;
    color: #000 !important;
}

#document_name-error {
    font-size: 95%!important;
    margin-top: .5rem;
    margin-bottom: 0px;
    color: #f90000!important;
}


</style>


</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">
									<a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
							   <li class="breadcrumb-item active"><a href="{{route('restaurant.documentManagement')}}">Document Management</a></li>

								<li class="breadcrumb-item remove_hover">Add Document</li>


							</ol>
						</nav>
					</div>


            <h1>Add Document</h1>


              <form method="POST" id="form-validate" enctype="multipart/form-data">
              {{csrf_field()}}

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


              <div class="add_btn create_btn">

                <div class="add_content">
                    <label for="" class="pb-1">
                      Document Name
                    </label>
                    <div class="form-group pb-3" style="padding-left: 0;">
                      <input type="text" name="document_name" maxlength="50" class="form-control block-start-space" placeholder="Enter Document Name"/>
                    </div>
                </div>
                

                <div class="add_content">
                    <label for="" class="pb-1">
                      Document
                    </label>
                  <div class="img-upload">
                      <div class="upload_img">
                            <div class="user_img" data-toggle="tooltip" data-placement="top" title="Upload Image">
                              <div  class="img-wraps">
                                @php  $url =  url('public/restaurant/assets/img/add-mul.png ') @endphp 
                                <img  title="Click to upload document"  onclick="$('#imgInp').click()" src='{{$url}}' id="blah" />
                                <input style="display:none; " type="file" id="imgInp" name="image" data-role="magic-overlay"
                                     data-target="#pictureBtn" value="" class="user_img" >

                                <input type="hidden" name="file_type" value="" id="file_type">
                              </div>
                              <span style="display:none; font-weight: 400; color: #f90303!important; margin-top: 8px;" class="text-danger" id="invalid_file"></span>

                              <span class = "error" style="margin-top: 8px;">{{$errors->first('image')}}</span>
                            </div>
                      </div>
                  </div>
                </div>

                <div class="add_content">
                  <input type="Submit" name="submit" id="submit" value="Add" class="btn btn-warning same_wd_btn">
                </div>
         

              </div>

            </form>

				</div>  
			</div>
		</div>






@endsection()
@section('js')

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




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.block-start-space').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#form-validate').validate({
      rules:{
        document_name:{
          required:true,
          minlength:2,
        },
      },
      messages:{
        document_name:{
          required:'Please enter document name.',
          minlength: 'Document name should be greater than 2 characters.',
        },
      },


      submitHandler:function(form){
        var check_file = $('#imgInp').attr('img');
        if(check_file == 'true'){
          $('#submit').attr('disabled' , 'true');
          form.submit();
        }
      }
    });


      $('#form-validate').on('submit' , function(){
        var check_file = $('#imgInp').attr('img');
        if(check_file != 'true'){
          $('#invalid_file').css({'display': 'block'});
          $("#invalid_file").text("Please upload document.");
          return false;
        }
      })
    })
</script>
  <!-- image -->
<script>

$(document).ready(function(){


    function readURL(input) {
 
        if (input.files && input.files[0]) {

            var type = (input.files[0].type);

            if (type == "image/png" || type == "image/jpeg") {


                var size = event.target.files[0].size;

                if(size > 20971520){
                    $('#invalid_file').css({'display': 'block'});
                    $("#invalid_file").text("Image should be less than 20 MB.");
                    $("#blah").attr("src","{{url('public/restaurant/assets/img/add-mul.png')}}");
                    $('#imgInp').val('');
                    $("#imgInp").removeAttr("img");
                    $(".closes").hide();
                    $("#file_type").val("");
                    return false;
                }

                $("#file_type").val("image");
                $('#invalid_file').css({'display': 'none'});

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);

                    $("#imgInp").attr("img","true");
                    $(".closes").show();
                }
                reader.readAsDataURL(input.files[0]);

            }else if(type == "application/pdf"){

                var size = event.target.files[0].size;

                if(size > 20971520){
                    $('#invalid_file').css({'display': 'block'});
                    $("#invalid_file").text("PDF should be less than 20 MB.");
                    $("#blah").attr("src","{{url('public/restaurant/assets/img/add-mul.png')}}");
                    $('#imgInp').val('');
                    $("#imgInp").removeAttr("img");
                    $(".closes").hide();
                    $("#file_type").val("");
                    return false;
                }

                $("#file_type").val("pdf");
                $('#invalid_file').css({'display': 'none'});

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', "{{url('public/restaurant/assets/img/dummy_pdf.png')}}");

                    $("#imgInp").attr("img","true");
                    $(".closes").show();
                }
                reader.readAsDataURL(input.files[0]);

            }else if(type == "application/doc"  || type == "application/docx" || type == "application/ms-doc" || type == "application/msword" || type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

                var size = event.target.files[0].size;

                if(size > 20971520){
                    $('#invalid_file').css({'display': 'block'});
                    $("#invalid_file").text("Doc should be less than 20 MB.");
                    $("#blah").attr("src","{{url('public/restaurant/assets/img/add-mul.png')}}");
                    $('#imgInp').val('');
                    $("#imgInp").removeAttr("img");
                    $(".closes").hide();
                    $("#file_type").val("");
                    return false;
                }

                $("#file_type").val("doc");
                $('#invalid_file').css({'display': 'none'});

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', "{{url('public/restaurant/assets/img/dummy_doc.jpg')}}");

                    $("#imgInp").attr("img","true");
                    $(".closes").show();
                }
                reader.readAsDataURL(input.files[0]);

            } else {
                $('#invalid_file').css({'display': 'block'});
                $("#invalid_file").text("File should be jpg, jpeg, png, pdf, doc format only.");
                $("#blah").attr("src", "{{url('public/restaurant/assets/img/add-mul.png')}}");
                $('#imgInp').val('');
                $("#imgInp").removeAttr("img");
                $(".closes").hide();
                return false;
            }
        }
    }
    $("#imgInp").change(function () {
        readURL(this);
    });

  

});
</script>







@endsection()