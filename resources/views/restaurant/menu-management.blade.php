@extends('restaurant.layout.layout')
@section('title','Menu Details')
@section('content')
<style type="text/css">
	/*.alert-danger {
		    border-left: 0px; 
		    color: #302d2d;
		}
		.alert-success {
		    border-left: 0px; 
		    color: #302d2d;
		}*/
		.alert-danger {
		    border-left: 0px;
		    color: #302d2d;
		    background-color: #ed2227;
		    color: #fff;
		    margin-top: 23px;
		}
		.alert-success {
		    border-left: 0px;
		    color: #302d2d;
		    background-color: #008000;
		    color: white;
		    margin-top: 23px;
		}
		 
		div#loaderImg2 {
		    position: absolute;
		    left: 0;
		    right: 0;
		    text-align: center;
		    margin-top: 250px;
		}



		/*Pop up*/
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




		#deleteModel h4.modal-title {
		    text-align: center;
		    margin: auto;
		    color: #fff;
		}
		#deleteModel  .modal-header .close{
		    padding: 0;
		    margin: 0;
		}
		#deleteModel  button.close {
		    position: absolute;
		    right: -15px;
		    top: -16px;
		    width: 31px;
		    height: 30px;
		    text-shadow: 0 1px 0 #ed1f24;
		    background: #ed1f24;
		    opacity: .5;
		    border-radius: 100%;
		    opacity: 1;
		        border: 2px solid #fff;

		}

		#deleteModel .modal-header {
		    background-color: #ed1f24 !important;
		    border: 1px solid #ed1f24 !important;
		    background: linear-gradient( 
		167deg
		 , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
		}

		#deleteModel .modal-footer {
		    border-top: 0px solid #e9ecef;
		    justify-content: center;
		}
		#deleteModel button.btn.btn-secondary.btn-lg.login_btn {
		    width: 37%;
		    font-size: 24px;
		    padding: 6px 0;
		}

		#deleteModel .modal-dialog {
		    margin-top: 200px;
		}


		p#delete_alert_txt {
		    text-align: center;
		    font-weight: 500;
		    margin-bottom: -2px;
    		margin-top: 30px;
    		font-size: 16px;
		}

		#deleteModel .modal-content {
		    width: 110%;
		}







		#basic-datatables_wrapper .col-sm-12 {
		    overflow-x: auto;
		}


		div.dataTables_wrapper div.dataTables_paginate {
		    margin: 10px 0px 0px 0px;
		}
		.dashboard_panel .card td.user_img img { 
		    object-fit: cover;
		    border-radius: 5px;
		}
				
		.dashboard_panel .card .card-body .serch_icon i{
			top: 38px;
		}	


		input.form-control.form-control-sm {
		    background-image: url('{{url('public/restaurant/assets/img/loupe.png')}}');
		    background-repeat: no-repeat;
		    background-size: 15px;
		    background-position: 3% 50%;
		}
		.common_btnn {
			/*padding: 0px 31px;*/
			font-size: 15px;
			font-weight: 700;
		}
		.common_btnn:hover {
			color: #fff !important;
		}
		.btn-info:disabled, .btn-info:focus, .btn-info:hover {
			color: #fff !important;
		}


		.menu_image {
		    width: 100%;
		    margin-right: auto;
		    text-align: right;
		}

</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>

								<li class="breadcrumb-item active">
									<a href="{{url('restaurant/parent-menu-management')}}">Menu Management</a>
								</li>

								<li class="breadcrumb-item remove_hover">Menu Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>

					

					<form action="{{ url('restaurant/import-menu') }}" method="POST" name="importform" enctype="multipart/form-data" >
                			{{csrf_field()}}

						
                		<!-- <div class="d-flex"> -->
						<input type="file" name="import_menu" class="form-control" title="Select File" style="width: 300px; border: 0 !important; background-color: transparent; color: #fff !important; padding-left: 0; cursor: pointer;">
                			
                		<!-- </div> -->
						<div class="d-flex mt-3">
		        			<button class="btn btn-success mr-3 common_btnn" title="Import menu">Import Menu</button>
							<a class="btn btn-info mr-3 common_btnn" href="{{ url('restaurant/export-menu') }}" title="Export menu"> Export Menu </a>

							<a class="btn btn-info mr-3 common_btnn" href="{{ url('public/restaurant/assets/samplefile.xlsx') }}" title="Downlaod" download>Sample File </a>

		                	<!-- <a href="{{url('restaurant/menu-images')}}">
								<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Menu Images</button>
							</a> -->
							<div class="menu_image">
								<a href="{{url('restaurant/menu-images')}}">
			                    	<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Menu Images</button>
			                  	</a>
			                  </div>
						</div>




						



					</form>



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


					<h1>Menu Details</h1>

					<?php
						$menu_name = ucfirst($main_menu_details->menu_name);
					?>
					<h2>{{$menu_name}}</h2>
					<br>
					

					<div class="card">
						<div class="card-body">
							<div class="add_btn">
								<a href="{{route('restaurant.addItem')}}">
									<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Add Item</button>
								</a>


							


							</div>
							<!-- <div class="serch_icon">
								<i class="fas fa-search"></i>
							</div> -->
							<div class="table-responsive">
								<table id="basic-datatables" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th class="text-left">Item Image</th>
											<th>Item Name</th>
											<th>Price ($)</th>
											<th>Category</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i= 0; ?>
										@foreach($menus as $menu)
										<tr>
											<td>{{++$i}}</td>
											<td class="user_img">
												<img src="{{$menu->image}}" alt="arashmil">
											</td>
											<td>{{$menu->item_name}}</td>
											<td>{{$menu->price}}</td>
											<td>{{$menu->category->category_name}}</td>
											<td class="text-center" style="padding-right: 15px !important;">
												<a href="{{route('restaurant.editItem',base64_encode($menu->id))}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a>
													<?php 
														if($menu->is_available == 1){
															$text = "Available";
														}else{
															$text = "Unavailable";
														}
													?>
													<button type="button" class="btn btn-warning same_wd_btn mr-2 av_unavailable" data-id="{{$menu->id}}" status = "{{$menu->is_available}}">{{$text}}</button>
												
												
													<button type="button" class="btn btn-warning same_wd_btn border_btn delete_btn" data-id="{{$menu->id}}">Delete</button>
												
											</td>
										</tr>
										
										@endforeach()
										
										
									</tbody>
								</table>
							</div>
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
            
            <p id="alert_txt"></p>    

      </div>
      
    </div>

  </div>



</div>


<div id="deleteModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	<form method="POST" action="{{route('restaurant.deleteItem')}}" id="deleteFORM">
			{{@csrf_field()}}
		<input type="hidden" name="delete_item_id" id="delete_item_id">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="right: -11px; top: -15px">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
            
            <p id="delete_alert_txt">Are you sure, you want to delete this item?</p>    

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning same_wd_btn border_btn yes" style="background-color: #ed1f24!important; font-weight: 600 ; border: 0px">Yes</button>
        <button type="button" class="btn btn-warning same_wd_btn border_btn no" style="background-color: #ed1f24!important; font-weight: 600 ; border: 0px">No</button>
      </div>
      </form>
    </div>

  </div>



</div>

@endsection()
@section('js')
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
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

		$(".close").on("click",function(){
			$("#alertModel").modal("hide");
			$("#deleteModel").modal("hide");
		});


		$(".av_unavailable").on("click",function(){

			$("#loaderModel").modal("show");
			$("#loaderModel").unbind("click");
			let target = $(this);
			let text_check = target.text();
			let menu_id = target.data("id");
			let status = target.attr("status");
			

			/*ajax calling*/

				var data = {
	            '_token': "{{csrf_token()}}",
	            'menu_id': menu_id,
	            'status' : status
	            };

	          	$.ajax({
	              url:"{{url('restaurant/avail-unavail')}}",
	              type:'POST',
	              data:data,
	              success: function(res){
	              	setTimeout(function(){

		              	if(res.status == 1){
		              		target.text("Unavailable");
		              		target.attr('status',"2");
		              		$("#alert_txt").text("Item has been update available to unavailable successfully.");
		              	}else{
		              		target.text("Available");
		              		target.attr('status',"1");
		              		$("#alert_txt").text("Item has been update unavailable to available successfully.");
		              	}
		              	$("#loaderModel").modal("hide");
		              	$("#alertModel").modal("show");
		              	$("#alertModel").unbind("click");
	              	},500);
	                
	              },
	              error: function(data, textStatus, xhr) {
	                if(data.status == 422){
	                  var result = data.responseJSON;
	                  alert('Something went worng.');
	                  window.location.href = "";
	                  return false;
	                } 
	              }
	            });
			
		});


		$(".delete_btn").on("click",function(){
			let item_id = $(this).data("id");
			$("#delete_item_id").val(item_id);
			$("#deleteModel").modal("show");
			$("#deleteModel").unbind("click");
		});

		$(".yes").on("click",function(){
			$("#deleteFORM").submit();
			$("#deleteModel").modal("hide");
		});

		$(".no").on("click",function(){
			$("#deleteModel").modal("hide");
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.dataTables_empty').text("No data available");
	})
</script>
@endsection()