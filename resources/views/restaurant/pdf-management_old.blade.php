 @extends('restaurant.layout.layout')
@section('title','Pdf Management')
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
    margin-left: 23px;
    width: 100px;
}


.qr_image img{
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    margin-left: 60px;
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
              

                <li class="breadcrumb-item remove_hover">Pdf Management</li>


              </ol>
            </nav>
          </div>


            <h1>Pdf Management</h1>


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


                @if($data != "")
                <div class="img-upload" style="display: flex;">
                    <div class="upload_img">
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

                         <div class="user_img" data-toggle="tooltip" data-placement="top" title="Upload Image">
                            <div  class="img-wraps">

                              <img  title="Click to upload document"  onclick="$('#imgInp').click()" src='{{$file}}' id="blah" />
                              <input style="display:none; " type="file" id="imgInp" name="image" data-role="magic-overlay"  data-target="#pictureBtn" value="" class="user_img" img="true" >
                                <input type="hidden" name="file_type" value="{{$data->file_type}}" id="file_type">
                            </div>
                            <span style="display:none; font-weight: 400; color: #f90303!important; margin-top: 8px;" class="text-danger" id="invalid_file">Please select jpg, jpeg or png image format only. </span>

                            <span class = "error" style="margin-top: 8px;">{{$errors->first('image')}}</span>
                          </div>

                          <input type="Submit" name="submit" id="submit" value="Upload" class="btn btn-warning same_wd_btn">
                     </div>

                    <div class="qr_image">
                      <img src="{{$data->qr_code_name}}">
                      <br>
                      @if($data->file) 
                      <a href="{{$data->file}}" target="_blank" title="Click to view document" class="show_name btn btn-warning same_wd_btn" style="margin-left: 68px;margin-top: 22px;    width: 137px;">View Document</a>
                      @endif
                    </div>


                </div>
                @endif




                @if($data == "")
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

                      <input type="Submit" name="submit" id="submit" value="Upload" class="btn btn-warning same_wd_btn">
                @endif

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

  var is_already_upload_doc = <?php echo $is_already_upload_doc; ?>;

    if(is_already_upload_doc == 0){
      $('#form-validate').on('submit' , function(){
        var check_file = $('#imgInp').attr('img');
        if(check_file != 'true'){
          alert('Please upload document.')
          return false;
        }
      })
    }
  })
</script>
  <!-- image -->
<script>

$(document).ready(function(){

  var is_already_upload_doc = <?php echo $is_already_upload_doc; ?>;

    function readURL(input) {

        let old_image = "{{$image_backend}}";
        let show_image;
        if(old_image != "" && old_image.length > 0){
          show_image = old_image;
        }else{
          show_image = "{{url('public/restaurant/assets/img/add-mul.png')}}";
        }
      
        if (input.files && input.files[0]) {

            var type = (input.files[0].type);

            if (type == "image/png" || type == "image/jpeg") {


                var size = event.target.files[0].size;

                if(size > 20971520){
                    $('#invalid_file').css({'display': 'block'});
                    $("#invalid_file").text("Image should be less than 20 MB.");
                    $("#blah").attr("img",show_image);
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
                    $("#blah").attr("img",show_image);
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
                    $("#blah").attr("img",show_image);
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
                $("#blah").attr("src", show_image);
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