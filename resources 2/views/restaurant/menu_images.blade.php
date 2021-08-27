@extends('restaurant.layout.layout')
@section('title','Menu Images')
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

 .dashboard_boxes {
    margin-top: 24px;
  }
  .gallery {
    display: inline-flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin-left: 30px;
   /* height: 500px;
    overflow: auto;*/
  }
  div#image_pre {
    width: 100%;
    margin-left: 0;
    justify-content: center;
    margin-left: 6px;
    display: none;
}
  .gallery img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    margin-right: 12px;
    margin-bottom: 12px;
  }
  .text-new input {
    display: block;
    position: absolute;
    top: 0;
    height: 131px;
    opacity: 0;
    margin: auto;
    width: 22%;
    right: 0;
    left: 0;
    cursor: pointer;
  }
  .modal-content .modal-body {
    padding: 3px 23px 5px;
}
.modal-content .modal-footer {
    padding: 8px 8px 8px 8px;
    border-top: 0;
}
  p#msz,p#msz1 {
    color: red;
    font-size: 16px;
    display: none;
  }
  .modal-dialog {
        max-width: 717px;

    margin: 1.75rem auto;
}
button#upload {
   box-shadow: none;
    text-shadow: none!important;
    background-color: #46ad4b;
    opacity: 1!important;
    font-weight: 500;
        font-size: 14px;

    -webkit-font-smoothing: antialiased !important;
}
  .col-md-12.find img {
    margin-bottom: 4px;
    width: 166px;
    height: 139px;
    object-fit: contain;
    /*cursor: pointer;*/
    border: 2px solid #000;
    background-color: #ccc;

}
.upload_img {
   
    justify-content: space-around;
    gap: 21px;

}
.col-md-12.find p {
  font-size: 12px;
  font-weight: 500;
}
.new-button i.fa.fa-times {
    position: absolute;
    top: 0;
    right: 7px;
}
.new-button {
    position: relative;
}
body.nav-sm .col-md-12.find img {
    margin-bottom: 4px;
    width: 226px;
    }
@media (min-width: 1400px){
  .col-md-12.find img {
    margin-bottom: 4px;
    width: 189px;


}
}
@media (min-width: 1600px){
  .col-md-12.find img {
    margin-bottom: 4px;
    width: 220px;


}
}
@media (min-width: 1800px){
  .col-md-12.find img {
    margin-bottom: 4px;
    width: 239px;


}

}
img#oldImg1 {
    object-fit: contain !important;
    border: 2px solid #000 !important;
    background-color: #ccc !important;
}
.upload_img {
  display: flex;
  flex-wrap: wrap;
}
.div_mr_ryt {
  position: relative;
}
.modal-header.jack {
  position: relative;
}
.close,
.close_icon {
  cursor: pointer;
  position: absolute;
  right: 5px;
  top: 2px;
  background-color: #c40202 !important;
  opacity: 1;
  border-radius: 50%;
  height: 30px;
  width: 30px;
  padding: 8px 11px !important;
  color: #fff;
  font-size: 14px;
  text-align: center;
}
.close:hover,
.close_icon:hover{
  opacity: 1;
  outline: 0;
}
.close:hover i,
.close_icon:hover i {
  color: #fff;
}
.close_icon {
    right: -7px;
    top: -7px;
    opacity: 1;
    height: 20px;
    width: 20px;
    padding: 0px 2px !important;
    color: #fff;
    line-height: 24px;
    font-size: 13px;
}
.div_mr_ryt.new {
    width: 166px;
}
.text-center.page{
 display: flex;
    justify-content: center;
    margin-bottom: 20px;
    width: 100%;
}
.dashboard_boxes.sreach_data .page-item .page-link{
      color: #000000;
    font-weight: 500;
}
.pagination{
      align-items: center;

}
@media(min-width: 1400px){
.close_icon{
      line-height: 22px;

    }
}
@media(min-width: 1500px){
.close_icon{
      line-height: 22px!important;

    }
}
@media(min-width: 1600px){
.close_icon{
    line-height: 25px;

    }
}



.upload-bg {
  background: #121214 !important;
  border-radius: 10px;
  width: 100%;
  margin-left: 18px;
}
.common_btnn {
  font-size: 15px;
    font-weight: 700;
    background-color: #ed1f24 !important;
    border: 1px solid #ed1f24 !important;
}
.common_btnn:hover {
      color: #fff !important;
      background-color: #ed1f24 !important;
    border: 1px solid #ed1f24 !important;
    }
    .btn-success:disabled, .btn-success:focus, .btn-success:hover {
      color: #fff !important;
       background-color: #ed1f24 !important;
    border: 1px solid #ed1f24 !important;
    }
    img.crosss_icon {
      background-color: transparent !important;
    border: 0 !important;
    width: 20px !important;
    position: absolute !important;
    top: -59px !important;
    left: -3px !important;
    }
    img.hide_popup {
      position: absolute;
      width: 20px !important;
      top: 22px;
    left: 7px;
    }
    .close_icon {
      background-color: transparent !important;
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
								<li class="breadcrumb-item active"><a href="{{route('restaurant.parentMenuManagement')}}">Menu Management</a></li>

								<li class="breadcrumb-item remove_hover">Menu Images</li>


							</ol>
						</nav>
					</div>
					<h1>Menu Images</h1>


		

					  @if(Session::has("error"))
                      <div class="alert alert-danger" id="error_alert">{{Session::get("error")}}</div>
                      @endif
                      @if(Session::has("success"))
                      <div class="alert alert-success" id="success_alert">{{Session::get("success")}}</div>
                      @endif
                      @if ($errors->any())
                      <div class="alert alert-danger">
                         <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                         </ul>
                      </div>
                      @endif










					<div class="dashboard_boxes sreach_data user_deatils_data add_question m_top_data ">      
		         
		                <div class="x_content new">
		                  <div class="row">
                         <div class="upload-bg">
		                     <div class="col-md-12" style="margin-bottom: 25px; margin-left: 7px; margin-top: 30px;">
		                        <a href="javascript:void(0);.html" class="btn btn-success edit common_btnn" style="margin-top: 0; " data-toggle="modal" data-target="#myModal1">Upload Image</a>
		                        
		                     </div>
  		                     <div class="col-md-12 find upload_img">
  		                      @if($menu_images && !empty($menu_images) && count($menu_images) > 0)
  		                      @foreach($menu_images as $images)

  		                        <!-- <img src="{{$images->images}}" alt="" data-id="{{$images->id}}" data-image="{{$images->images}}" class="edit_image"> -->
  		                        <div class="div_mr_ryt">
  		                          <img src="{{url('public/storage/restaurant/menu_gallery_images/'.$images->menu_image)}}" alt=""  data-image="{{$images->images}}" class="edit_image">
  		                          <div class="close_icon" title="Click to delete image">
  		                            <a href="javascript:void(0)" class="delete_image" onclick="return confirm('Are you sure you want to delete this image?')">
  		                              <!-- <i style="color: white;" class="fa fa-times menu_images " data-id="{{$images->id}}" aria-hidden="true"></i> -->
                                    <img src="{{url('public/restaurant/assets/img/cross.png')}}" data-id="{{$images->id}}" class="crosss_icon menu_images">
  		                            </a>
  		                          </div>
  		                          <input type="hidden" name="image_id" class="image_id" value="">
  		                          <p style="color: #ffffff;">{{$images->menu_image}}</p>
  		                        </div>
  		                      @endforeach
  		                      <div class="div_mr_ryt new">
  		                      </div>
  		                       <div class="div_mr_ryt new">
  		                      </div>
  		                       <div class="div_mr_ryt new">
  		                      </div>
  		                       <div class="div_mr_ryt new">
  		                      </div>

  		                      @else 
  		                      <div class="ankuj" style="    margin-bottom: 20px;">
  		                          <h2 class="text-center" style="font-size: 20px;">No Images Available</h2>
  		                      </div>
  		                      @endif
  		                     </div>
  		                     <div class="text-center page">
  		                     <div class="page" style="text-align:center;">
  		                          {{$menu_images->links()}}
  		                      </div>
  		                    </div>
                           
                         </div>
		                  </div>
		                </div>
		        	</div>



				</div>
			</div>
		</div>









<div id="myModal1" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" id="form_submit" enctype='multipart/form-data' action="{{url('restaurant/menu-images')}}">
            {{csrf_field()}}
         <div class="modal-header jack">
            <button type="button" class="close" data-dismiss="modal" style="background-color: transparent !important;">
              <!-- <i class="fa fa-times" aria-hidden="true"></i> -->
               <img src="{{url('public/restaurant/assets/img/cross.png')}}" class="hide_popup">
            </button>
            <h2 class="text-center" style="margin: auto;"><b>Upload Menu Images</b></h2>
         </div>
         <div class="modal-body">

            <div class="text-new">
              <div class="text-center">
                <img src="{{url('public/restaurant/assets/img/upload.png')}}" id="oldImg" style="width: 85px !important; height:85px!important; cursor: pointer; margin: 10px 0 15px;" title="Click to upload menu images">
                <input type="file" multiple id="gallery-photo-add" name="menu_images[]" title="Click to upload menu images">
                <p id="msz" style="margin-top: 3px; font-weight: 600 color:red;" class="error"></p>
              </div>
                <div class="gallery" id="image_pre">
                </div>
            </div>
         </div>
         <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success edit upload" id="upload" disabled="true">Upload</button>
         </div>
        </form>
      </div>
   </div>
</div>





@endsection()
@section('js')

<!-- <script type="text/javascript">
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
 -->


 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


<script type="text/javascript">
  $(function() {
    function imagesPreview(input) {
      console.log(input.files)
        if (input.files) {

          let appendDiv = $(".gallery").html("");
          let type = input.files[0].type;
          let size = input.files[0].size;

            if(size > 20971520){
              console.log(size);
                $('#msz').show();
                $('#gallery-photo-add').val("");
                $("#image_pre").html("");
                $(".upload").attr('disabled',true);
                $('#oldImg').attr('src',"{{url('public/restaurant/assets/img/upload.png')}}");
                $('#msz').text('Image size should be less than 20 MB.');
                $('#msz').css('display','block');
            }

            if(type == 'image/jpeg' || type == 'image/png'){
              let filesAmount = input.files.length;
              for (let i = 0; i < filesAmount; i++) {
                $(".upload").attr('disabled',false);
                 let image_type = input.files[i].type;
                 let image_size = input.files[i].size;

                  if(image_type == 'image/jpeg' || image_type == 'image/png'){

                    if(image_size < 20971520){
                        console.log(size);
                        let reader = new FileReader();
                        reader.onload = function(event) {
                          $('#image_pre').css('display','flex');
                          appendDiv.append(`<div class="new-button"><img id="image" src="${event.target.result}"></div>`);
                        }
                        $('#msz').hide( )
                        reader.readAsDataURL(input.files[i]);  
                    }else{
                        $('#msz').show();
                        $('#gallery-photo-add').val("");
                        $("#image_pre").html("");
                        $(".upload").attr('disabled',true);
                        $('#oldImg').attr('src',"{{url('public/restaurant/assets/img/upload.png')}}");
                        $('#msz').text('Image size should be less than 20 MB.');
                        $('#msz').css('display','block');
                    }

                  } else {
                    $('#msz').show();
                    $('#gallery-photo-add').val("");
                    $("#image_pre").html("");
                    $(".upload").attr('disabled',true);
                    $('#oldImg').attr('src',"{{url('public/restaurant/assets/img/upload.png')}}");
                    $('#msz').text('Only .jpeg, .jpg and .png formats are allowed.');
                    $('#msz').css('display','block');
                  }
              }

            } else {
                $(".upload").attr('disabled',true);
                $(".gallery").html("");
                $('#gallery-photo-add').val("");
                $('#msz').show();
                $('#oldImg').attr('src',"{{url('public/restaurant/assets/img/upload.png')}}");
                $('#msz').text('Only .jpeg, .jpg and .png formats are allowed.');
                $('#msz').css('display','block');
            }
        }
    }

    var limit = 10;
    $(document).ready(function(){
        $('#gallery-photo-add').change(function(){
            var files = $(this)[0].files;
            if(files.length > limit){
                $('#msz').text('Only 10 images are allowed.');
                $('#msz').css('display','block');
                $('#gallery-photo-add').val('');
                //return false;
            }else{
                //return true;
                imagesPreview(this, 'div.gallery');
            }
        });
    });

    


    $(".close").click(function() {
       $(".gallery").html("");
       $(".upload").attr('disabled',true);
       $("#msz").html("")
    });

  });


  $(".menu_images").click(function() {
    let id = $(this).attr('data-id')
     //alert(id);
    $(".image_id").val(id)
    $(".delete_image").click(function(e) {
       $(this).attr("href","{{url('restaurant/delete-menu-image')}}/"+id)
        
    })
  })

</script>

<script type="text/javascript">
   setTimeout(function(){
      $(".alert").hide();    
   },4000);
</script>


<script>
   $(document).ready(function () {
    $("#form_submit").submit(function (e) {
        //e.preventDefault();
            $("#upload").attr("disabled", true);
            return true;
        });
    });
</script>




@endsection()