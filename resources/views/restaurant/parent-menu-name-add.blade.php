 @extends('restaurant.layout.layout')
@section('title','Add Menu')
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



    #menu_name-error {
        font-size: 95%!important;
        margin-top: .5rem;
        margin-bottom: 0px;
        color: #f90000!important;
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
							   <li class="breadcrumb-item active"><a href="{{route('restaurant.documentManagement')}}">Menu Management</a></li>

								<li class="breadcrumb-item remove_hover">Add Menu</li>


							</ol>
						</nav>
					</div>


            <h1>Add Menu</h1>


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
                      Menu Name
                    </label>
                    <div class="form-group pb-3" style="padding-left: 0;">
                      <input type="text" name="menu_name" maxlength="50" class="form-control block-start-space" placeholder="Enter Menu Name"/>
                    </div>
                </div>
                


                <div class="add_content" style="    text-align: center;    margin-top: 12px;">
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
        menu_name:{
          required:true,
          minlength:2,
        },
      },
      messages:{
        menu_name:{
          required:'Please enter menu name.',
          minlength: 'Menu name should be greater than 2 characters.',
        },
      },


      submitHandler:function(form){
          $('#submit').attr('disabled' , 'true');
          form.submit();
      }
    });
  });


</script>








@endsection()