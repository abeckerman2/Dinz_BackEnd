 @extends('restaurant.layout.layout')
@section('title','Document Details')
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


.d-flex.view {
    flex-direction: column;
}
.dashboard_panel .same_wd_btn{
      width: 130px;
      margin-bottom: 4px;
}

.dashboard_panel .add_imgae_box .same_wd_btn {
    font-size: 13px;
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

								<li class="breadcrumb-item remove_hover">Document Details</li>


							</ol>
						</nav>
					</div>


            <h1>Document Details</h1>


         

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


              <!-- <div class="add_btn create_btn">

                <div class="add_content">
                    <label for="" class="pb-1">
                      Item Name
                    </label>
                    <div class="form-group pb-3" style="padding-left: 0;">
                      <input type="text" name="item_name" maxlength="50" class="form-control" placeholder="Enter Item Name"/>
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
 

              </div>  -->
              <div class="card">
            <div class="card-body add_imgae_box">

              <div class="table-responsive simple_table">
                <table id="basic-datatables" class="display table table-striped table-hover dataTable" >
                  <!-- <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th class="text-left">Profile Image</th>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead> -->
                  <tbody>
                    <tr>
                      <th>Document Name</th>
                      <td>
                        {{$data->document_name}}
                      </td>
                    </tr>
                     <tr>
                      <th>Document</th>

                          <?php 
                            if(!empty($data->file)){
                                if($data->file_type == "doc"){

                                    $file = url("/public/restaurant/assets/img/dummy_doc.jpg");
                                }else if($data->file_type == "pdf"){
                                    $file = url("/public/restaurant/assets/img/dummy_pdf.png");
                                }else{
                                    // $path =  url('public/storage/restaurant/restaurant_docs');
                                    $file = $data->file;
                                }
                            }else{
                                $file = url("/public/restaurant/assets/img/add-mul.png");
                            }
                          ?>
                      <td>
                        <div class="d-flex view" style="    margin-top: 15px;    margin-bottom: 10px;">
                        <img src="{{$file}}" style="width: 130px; height: 130px;">
                          <!-- <button type="button" class="btn btn-warning same_wd_btn mr-2">Document Details</button> -->
                          <a href="{{$data->file}}" target="_blank" title="Click to Document Details" class="btn btn-warning same_wd_btn mr-2">View Document</a>
                      </div>
                      </td>

                    </tr>
                     <tr>
                      <th>Qr Code</th>
                      <td>
                        <div style="    margin-top: 15px;margin-bottom: 15px;">
                          <img src="{{$data->qr_code_name}}" style="width: 130px; height: 130px;">
                        </div>
                      </td>
                    </tr>
                    

                  </tbody>
                </table>
              </div>

				</div>  
      </div>
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
                    $("#blah").attr("img","{{url('public/restaurant/assets/img/add-mul.png')}}");
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
                    $("#blah").attr("img","{{url('public/restaurant/assets/img/add-mul.png')}}");
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

            }else if(type == "application/doc" || type == "application/ms-doc" || type == "application/msword" || type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){

                var size = event.target.files[0].size;

                if(size > 20971520){
                    $('#invalid_file').css({'display': 'block'});
                    $("#invalid_file").text("Doc should be less than 20 MB.");
                    $("#blah").attr("img","{{url('public/restaurant/assets/img/add-mul.png')}}");
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