@extends('restaurant.layout.layout')
@section('title','Edit Table Details')
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

label.raaddio {
    margin-right: 17px;
}	

</style>

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.tableManagement')}}">Table Management</a></li>
								<li class="breadcrumb-item active"><a href="{{url('restaurant/table-details').'/'.$table_id}}">Table Details</a></li>
								<li class="breadcrumb-item remove_hover">Edit Table Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Edit Table Details</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<form method="POST" id="validate-form">
								{{@csrf_field()}}


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

							<!-- <div class="add_content">
									<label for="" class="pb-1">
										Table ID
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Table ID" value="" required />
									</div>
							</div> -->
							<div class="add_content">
									<label for="" class="pb-1">
										Table Name
									</label>
									<div class="form-group pb-3">
										<input type="text" name="table_name" class="form-control" value="{{$data->table_name ?? ''}}" placeholder="Enter Table Name" maxlength="30" />
									</div>
							</div>


 


							<div class="add_content">
									<label for="" class="pb-1">
										Table Status
									</label>
									<div class="form-group" style="display: flex">
										<label class="raaddio"><span class="text">Vacant</span>
											<input type="radio"  name="is_occupied"  class="radio box" value="1"  id="Checkbox1"   @if($data->is_occupied == "1") checked="yes" @endif>
											<span class="checkmark"></span>
										</label>
										<label class="raaddio"><span class="text">Occupied</span>
											<input type="radio"  name="is_occupied" class="radio box" value="2"   id="Checkbox2"  @if($data->is_occupied == "2") checked="yes" @endif>
											<span class="checkmark"></span>
										</label>
									</div>
								
							</div>


							<?php
							 	$total_active_orders = count($data->activeOrders);
							 	if(!$total_active_orders){
							 		$total_active_orders = 0;
							 	}
							?>
							<div class="add_content" style="margin-top: -2px">
									<label for="" class="pb-1">
										Active Orders
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" value="{{$total_active_orders ?? ''}}" readonly disabled maxlength="50" />
									</div>
							</div>


						<!-- 	<input type="radio" id="html" name="fav_language" value="HTML">
 	 						<label for="html">HTML</label><br> -->

							<div class="text-center mt-2">
									<button type="submit" class="btn btn-warning same_wd_btn mb-2" id="submit_btn">Update</button>
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


<div id="alertModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Information</h4>
      </div>
      <div class="modal-body">
            
            <p id="alert_txt">You can not change the table status because some active order is on this table.</p>    

      </div>
      
    </div>

  </div>



</div>		

@endsection()
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>


<script type="text/javascript">
	$(document).ready(function(){
		

		$.validator.addMethod("alphabatic", function(value, element) {
	            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
	    });

		$('#validate-form').validate({
	        rules: {
	          table_name:{
	            required:true,
	            minlength:2,
            	alphabatic: true,
	          }
	        },
	        messages: {
	          table_name:{
	            required: 'Please enter table name.',
	            minlength: 'Table name should be at least 2 characters long.',
            	alphabatic: "Table name should be alphanumeric only.",
	          }
	        },
	        submitHandler:function(form){

	              $("#submit_btn").attr('disabled', true);

	              $("#loaderModel").modal("show");
	              $("#loaderModel").unbind("click");

	   

	              if(validate == "true"){

	                $("#loaderModel").modal("hide");
	                $("#submit_btn").attr('disabled', false);
	              }else{
	                form.submit();
	              }
	             

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
	});

</script>

<script type="text/javascript">
	$(document).ready(function(){

		var active_order_count = <?php echo count($data->activeOrders) ?> ;
		$('#Checkbox1').on('click' , function(){
			if(active_order_count > 0){
				// alert('no')

				$('#Checkbox1').prop('checked', false);
				$('#Checkbox2').prop('checked', true);

				$("#alertModel").modal("show");
		        $("#alertModel").unbind("click");
			}
		})


		$('.close').on("click" , function(){
			$('#alertModel').modal('hide');
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


@endsection()