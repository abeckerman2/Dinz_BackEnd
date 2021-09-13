@extends('restaurant.layout.layout')
@section('title','Entity Details')
@section('content')
<style type="text/css">
		#basic-datatables_wrapper .col-sm-12 {
		    overflow-x: auto;
		}


		div.dataTables_wrapper div.dataTables_paginate {
		    margin: 10px 0px 19px 0px;
		}

		input.form-control.form-control-sm {
		    background-image: url('{{url('public/restaurant/assets/img/loupe.png')}}');
		    background-repeat: no-repeat;
		    background-size: 15px;
		    background-position: 3% 50%;
		}



/*Delete popup css*/
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
		.sr-no {
			width: 23.5px !important;
		}
		.descp {
			background-color: #303031;
    		border-radius: 15px;
   			border: 2px solid #FFf;
   			margin-top: 25px
		}
		.dashboard_panel .card .card-body .dataTables_filter {
			margin-top: 20px;
		}
		.date_time {
			width: 75px !important;
		}
		.add_imgae_box h3 {
			color: #fff;
    		font-size: 24px;
		}
		#print {
			background-color: #ed1f24 !important;
		    border: 2px solid #ed1f24 !important;
		    padding: 8px 0px 10px;
		    margin-top: 7px !important;
		    color: #fff !important;
		    text-shadow: none;
		    font-size: 15px;
		    letter-spacing: 0.7px;
		    width: 150px;
		    font-weight: 700;
		    text-transform: inherit;
		    border-radius: 3px;
		    text-align: center;
		    margin-bottom: 19px;
		    cursor: pointer;
		}
		#print:hover {
			opacity: .9;
    		transition: all .3s;
		}
		/*table.dataTable thead .descption_data.sorting:before, table.dataTable thead .descption_data.sorting_asc:before, table.dataTable thead .descption_data.sorting_asc_disabled:before, table.dataTable thead .descption_data.sorting_desc:before, table.dataTable thead .descption_data.sorting_desc_disabled:before {
			display: none;
		}
		table.dataTable thead .descption_data.sorting:after, table.dataTable thead .descption_data.sorting_asc:after, table.dataTable thead .descption_data.sorting_asc_disabled:after, table.dataTable thead .descption_data.sorting_desc:after, table.dataTable thead .descption_data.sorting_desc_disabled:after {
			display: none;
		}
*/		
		#print2 {
		    text-align: center;
		        width: 150px;

		}
		#print2:hover {
			opacity: .9;
    		transition: all .3s;
		}


.select-dropdown{
	width: 200px;
    height: 40px!important;
    background-color: #000!important;

    -webkit-appearance: none;
    -moz-appearance: none;

    background-image: url('{{url('public/restaurant/assets/img/white_arrow.png')}}');
	background-repeat: no-repeat;
    content: ' ';
    background-position: 89% 54%;
    background-size: 13px;

        padding-right: 42px;
            line-height: 12px;


}


.page-inner .button-resize .remove_button_two{
	margin-top: 1px!important;
    margin-left: 15px;
    height: 38px;
    line-height: 19px;
    width: 93px;
    font-size: 14px;
}


.heading_data_name th{
	    min-width: 150px;
}
.upload-error{
	font-weight: 500;
    color: red;
    margin-top: 5px;
    margin-bottom: 5px;
}
.line_wrapper {
    display: flex;
    flex-direction: column;
}

.validate_spacing{
	margin-top: 14px;
}

</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.tableManagement')}}">Entity Management</a></li>
								<li class="breadcrumb-item remove_hover">Entity Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<div style="display: flex;justify-content: space-between;padding: 22px 0px;">
						<h1 style="margin: 0px;padding: 0px">Entity Details</h1>
                        <div class="right_wrapper">
							<a href="#"> <button type="button" class="btn btn-warning same_wd_btn mr-2 delete_table" id="delete_table" data-id="{{$table_find->id}}" >Delete</button> </a> 
							<a href="{{url('restaurant/edit-table').'/'.$table_id}}"> <button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button> </a>
						</div>
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



					<div class="card">
						<div class="card-body add_imgae_box">

							<?php
								// dd($table_id); die();
							?>	

							<form method="POST" id="add-doc-menu">
							{{csrf_field()}}
								<div class="table-responsive simple_table">
									<table class="display table table-striped table-hover dataTable heading_data_name" >
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
											<!-- <tr>
												<th>Table ID</th>
												<td>
													{{$table_find->table_id}}
												</td>
											</tr> -->
											<tr>
												<th style="width: 110px" >Entity Name</th>
												<td>
													{{$table_find->table_name}}
												</td>
											</tr>

											


											


											<?php
												if($table_find->is_occupied == 2){
													$table_status = "Occupied";
												}
												else if($table_find->is_occupied == 3){
													$table_status = "Request Service";
												}else{
													$table_status = "Vacant";
												}
											?>
											<tr>
												<th style="width: 110px" >Entity Status</th>
												<td>
													{{$table_status}}
												</td>
											</tr>

											<?php
											 	$total_active_orders = count($table_find->activeOrders);
											?>
											<tr>
												<th style="width: 110px" >Active Orders</th>
												<td>
													{{$total_active_orders}}
												</td>
											</tr>










											<tr>
												<th>Menu Name</th>
												<td>
													<div class="d-flex button-resize" id="main-menu">

														<div>
															<select class="form-control select-dropdown" id="menu_id" name="menu_id" title="Select menu" style="cursor: pointer;">
																<option value="">Select Menu</option>
																@foreach($main_menu_name as $rows)
																	<option value="{{$rows->id}}" @if($rows->id == $table_find->assign_menu_id) selected @endif>{{$rows->menu_name}}
																	</option>
																@endforeach
															</select>

															<span style="display: none" class="upload-error" id="menu-error">Please select menu.</span>
														</div>
														<button type="button" class="btn btn-warning same_wd_btn mr-2 remove_button_two" id="add-menu" title="Click to add menu" style="display: none;">ADD</button>
													</div>

													<input type="hidden" value="{{$table_find->assign_menu_id}}" id="is_menu_selected">

												</td>
											</tr>
											@if($table_find->assign_menu_id != '')
											<tr>
												<th style="width: 110px" >Menu QR Code</th>
												<td class="code_img">
													<div class="line_wrapper">
													<img style="width: 150px; height: 150px;margin-top: 19px; margin-bottom: 10px;" id="image" src="{{$table_find->qr_code}}" alt="qr-code">

														<a href="javascript:void(0)" id="print">Print QR Code</a>
												</div>
												</td>
											</tr>
											@endif










											<tr>
												<th>Document Name</th>
												<td>
													<div class="d-flex button-resize" id="main-document">
														<div>
															<select class="form-control select-dropdown" id="document_id" name="document_id" title="Select document" style="cursor: pointer;">
																<option value="">Select Document</option>
																@foreach($documents as $rows)
																	<option value="{{$rows->id}}" @if($rows->id == $table_find->assign_document_id) selected @endif>{{$rows->document_name}}
																	</option>
																@endforeach
															</select>

															<span style="display: none" class="upload-error" id="document-error">Please select document.</span>

															<span style="display: none" class="upload-error" id="both-error">Please select at least one menu or document.</span>

														</div>
														<button type="button" class="btn btn-warning same_wd_btn mr-2 remove_button_two" id="add-document" title="Click to add document" style="display: none">ADD</button>
													</div>

													<input type="hidden" value="{{$table_find->assign_document_id}}" id="is_document_selected">
												</td>
											</tr>
											@if($table_find->assign_document_id != '')
											<tr>
												<th style="width: 110px">Document QR Code</th>
												<td class="code_img">
													<img style="width: 150px; height: 150px;margin-top: 19px; margin-bottom: 10px;" id="image2" src="{{$document_details->qr_code_name}}" alt="qr-code">

													<div class="flex" style="    margin-bottom: 18px;">
															<a href="{{$document_details->file}}" target="_blank" title="Click to Document Details" class="btn btn-warning same_wd_btn mr-2" style="width: 150px;">View Document</a>


															<a href="javascript:void(0)" id="print2" class="btn btn-warning same_wd_btn mr-2">Print QR Code</a>
														</div>
													</div>
												</td>
											</tr>
											@endif

											<tr>
												<th style="width: 110px" ></th>
												<td>
													<button type="button" class="btn btn-warning same_wd_btn mr-2 remove_button_two" id="add">ADD</button>
												</td>
											</tr>


										</tbody>
									</table>


								


								</div>
							</form>


							<div class="table-responsive">
								<table id="basic-datatables" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Order ID</th>
											<!-- <th>Table Name</th> -->
											<th>Item Name</th>
											<th>Order Date & Time</th> 
											<th>Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>

										<?php
											$i=0;
										?>

										@foreach($table_find->activeOrdersWithOrderItem as $rows)


										<?php
											$s=$rows->date_time;
											$arr = explode(" ", $s);
											$date = $arr[0];
											$time = $arr[1];
										?>

										<tr>
											<td>{{++$i}}</td>
											<td>{{$rows->id}}</td>
											<!-- <td>{{$table_find->table_name}}</td> -->

											<?php 
												$count_items = count($rows->orderItemsWithMenu);
											?> 
											<td>
												@if($count_items > 0) 
													<?php 
														$menu_pluck = Illuminate\Support\Arr::pluck($rows->orderItemsWithMenu, 'menu');
														$item_pluck = Illuminate\Support\Arr::pluck($menu_pluck, 'item_name');
														echo $implode_items = implode(", ", $item_pluck);  
													?> 
												@else 
													<?php echo "N/A"; ?> 
												@endif() 
											</td>
											<td>{{$date}} {{$time}}</td> 

											<?php
												if($rows->order_status == 'order_placed'){
													$status = ucfirst('order placed');
												}else{
													$status = ucfirst($rows->order_status);
												}
											?>
											<td>{{$status}}</td>
											<td class="text-center" style="padding-right: 15px !important;">
												<a href="{{url('restaurant/table-order-details').'/'.$rows->id}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
											</td>
										</tr>
										@endforeach
								 
									</tbody>
								</table>
							</div>








							 

							







							
						</div>
					</div>
				</div>
			</div>
		</div>





<!-- delete popup -->
<div id="deleteModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{route('restaurant.deleteTable')}}" id="deleteFORM"> 

			{{@csrf_field()}}
		<input type="hidden" name="delete_table_id" id="delete_table_id">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="right: -11px; top: -15px">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
            
            <p id="delete_alert_txt">Are you sure, you want to delete this entity?</p>    

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
			$('#basic-datatables,#basic-datatables-2').DataTable({
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

		});
	</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_table').on('click' , function(){
			let table_id = $(this).data("id");
			// alert(table_id)
			$("#delete_table_id").val(table_id);
			$("#deleteModel").modal("show");
			$("#deleteModel").unbind("click");
			return false;  
		});

		$(".yes").on("click",function(){
			$("#deleteFORM").submit();
		});

		$(".no").on("click",function(){
			$("#deleteModel").modal("hide");
		});

		$(".close").on("click",function(){
			$("#deleteModel").modal("hide");
		}); 

	})
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.dataTables_empty').text('No data available');
	})

	const printBtn = document.getElementById('print');

	printBtn.addEventListener('click', function() {
		const iframe = document.createElement('iframe');

		// Make it hidden
		iframe.style.height = 0;
		iframe.style.visibility = 'hidden';
		iframe.style.width = 0;

		// Set the iframe's source
		iframe.setAttribute('srcdoc', '<html><body></body></html>');

		document.body.appendChild(iframe);

		iframe.addEventListener('load', function() {
	    // Clone the image
		    const image = document.getElementById('image').cloneNode();
		    image.style.maxWidth = '100%';

		    // Append the image to the iframe's body
		    const body = iframe.contentDocument.body;
		    body.style.textAlign = 'center';
		    body.appendChild(image);

		    image.addEventListener('load', function() {
		        // Invoke the print when the image is ready
		        iframe.contentWindow.print();

		        iframe.contentWindow.addEventListener('afterprint', function() {
				    iframe.parentNode.removeChild(iframe);
				});
		    });
		});
	});

</script>


<script type="text/javascript">
 
	const printBtn2 = document.getElementById('print2');

	printBtn2.addEventListener('click', function() {
		const iframe = document.createElement('iframe');

		// Make it hidden
		iframe.style.height = 0;
		iframe.style.visibility = 'hidden';
		iframe.style.width = 0;

		// Set the iframe's source
		iframe.setAttribute('srcdoc', '<html><body></body></html>');

		document.body.appendChild(iframe);

		iframe.addEventListener('load', function() {
	    // Clone the image
		    const image = document.getElementById('image2').cloneNode();
		    image.style.maxWidth = '100%';

		    // Append the image to the iframe's body
		    const body = iframe.contentDocument.body;
		    body.style.textAlign = 'center';
		    body.appendChild(image);

		    image.addEventListener('load', function() {
		        // Invoke the print when the image is ready
		        iframe.contentWindow.print();

		        iframe.contentWindow.addEventListener('afterprint', function() {
				    iframe.parentNode.removeChild(iframe);
				});
		    });
		});
	});

</script>



<script type="text/javascript">
	$(document).ready(function(){

		/*For add menu*/
		$('#menu_id').on('change' , function(){

			$('#both-error').css('display' , 'none');

			$('#main-menu').removeClass('validate_spacing');
			$('#menu-error').css('display' , 'none');
			var value  = $(this).val();
			$('#is_menu_selected').val(value);
		})

		// $('#add-menu').on('click' , function(){
		// 	var is_menu_selected = $('#is_menu_selected').val();
		// 	if(is_menu_selected != ""){
		// 		$('#add-doc-menu').submit();
		// 		$(this).attr('disabled' , 'true');
		// 	}else{
		// 		$('#main-menu').addClass('validate_spacing');
		// 		$('#menu-error').css('display' , 'block');
		// 		return false;
		// 	}
		// })



		/*For add document*/
		$('#document_id').on('change' , function(){

			$('#both-error').css('display' , 'none');

			$('#main-document').removeClass('validate_spacing');
			$('#document-error').css('display' , 'none');
			var value  = $(this).val();
			$('#is_document_selected').val(value);
		})

		// $('#add-document').on('click' , function(){
		// 	var is_document_selected = $('#is_document_selected').val();
		// 	if(is_document_selected != ""){
		// 		$('#add-doc-menu').submit();
		// 		$(this).attr('disabled' , 'true');
		// 	}else{
		// 		$('#main-document').addClass('validate_spacing');
		// 		$('#document-error').css('display' , 'block');
		// 		return false;
		// 	}
		// })



	})
</script>


<script type="text/javascript">
	$(document).ready(function(){


		$('#add').on('click' , function(){
			var is_menu_selected = $('#is_menu_selected').val();
			var is_document_selected = $('#is_document_selected').val();

			if(is_menu_selected == "" && is_document_selected == ''){
				// $('#main-menu').addClass('validate_spacing');
				// $('#menu-error').css('display' , 'block');
				// $('#main-document').addClass('validate_spacing');
				// $('#document-error').css('display' , 'block');

				$('#main-document').addClass('validate_spacing');
				$('#both-error').css('display' , 'block');

				return false;
			}else{

				$('#menu_id').css('pointer-events' , 'none')	
				$('#document_id').css('pointer-events' , 'none')

				$('#add-doc-menu').submit();
				$(this).attr('disabled' , 'true');
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


<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#add-menu').on('click' , function(){
			var check_is_any_selected = $('#menu_id').val();
				if(check_is_any_selected != ''){
					$('#menu_id').css('pointer-events' , 'none')	
				}
		})

		
		$('#add-document').on('click' , function(){
			var check_is_any_selected = $('#document_id').val();
				if(check_is_any_selected != ''){
					$('#document_id').css('pointer-events' , 'none')	
				}
		})
	})
</script>
 -->@endsection()