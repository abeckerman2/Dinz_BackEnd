@extends('restaurant.layout.layout')
@section('title','Ongoing Orders Details')
@section('content')

<style type="text/css">
		 
		.heading_transaction_width{
			width: 175px!important;
		}
		.heading_user_width{
			width: 100px!important;
		}
		.order_box {
			background-color: #121214;
    		padding: 28px 0px;
    		border-radius: 5px;
		}
		.order_process .green,
		.order_process .grey {
			height: 25px;
		    width: 25px;
		    border-radius: 6px;
		    background-color: #5cbb06;
		    margin: auto;
		}
		.order_process .grey {
			background-color: #adadad
		}
		.border-line {
			position: relative;
			width: 76%;
   			margin: auto;
		}
		.border-line .border-bottom {
			position: absolute;
		    width: 100%;
		    top: 40px;
		}
		.order_process h4 {
			color: #fff;
		    margin-top: 3px;
		    margin-bottom: 0;
		    font-size: 15px;
		}


		/*Popup*/
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


		/*LOADER IN CENTER OF SCREEN*/
		div#loaderImg2 {
		    position: absolute;
		    left: 0;
		    right: 0;
		    text-align: center;
		    margin-top: 250px;
		}

</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>

								<li class="breadcrumb-item remove_hover">Order Management</li>


								<li class="breadcrumb-item active"><a href="{{route('restaurant.orderManagement')}}">Ongoing Orders</a></li>
								<li class="breadcrumb-item remove_hover">Ongoing Orders Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Ongoing Orders Details</h1>
					


					<div style="display: flex;justify-content: space-between;padding: 22px 0px;">
						<h2 style="margin: 0px;padding: 0px;text-align: center;">Order Status</h2> 
					</div>
					<div class="border-line">
						<div class="border-bottom"></div>
					</div>
					<div class="order_box">
						<div class="d-flex justify-content-around" style="position: relative;">

							<?php 
								$text_class_order_placed = "green";
								$text_class_preparing = "grey";
								$text_class_garnishing = "grey";
								$text_class_completed = "grey";

								if($order_details->order_status == "order_placed"){
									$text_class_order_placed = "green";
									$text_class_preparing = "grey";
									$text_class_garnishing = "grey";
									$text_class_completed = "grey";
								}else if($order_details->order_status == "preparing"){
									$text_class_order_placed = "green";
									$text_class_preparing = "green";
									$text_class_garnishing = "grey";
									$text_class_completed = "grey";

								}else if($order_details->order_status == "garnishing"){
									$text_class_order_placed = "green";
									$text_class_preparing = "green";
									$text_class_garnishing = "green";
									$text_class_completed = "grey";

								}else{
									//completed
									$text_class_order_placed = "green";
									$text_class_preparing = "green";
									$text_class_garnishing = "green";
									$text_class_completed = "green";

								}
							?>
							<div class="order_process">
								<div class="{{$text_class_order_placed}}" id="order_placed" data-id = "{{$order_details->table_id}}"  order_id = "{{$order_details->id}}">
								</div>
								<h4>Order Placed</h4>
							</div>
							<div class="order_process">
								<div class="{{$text_class_preparing}}" id="order_preparing" data-id = "{{$order_details->table_id}}"  order_id = "{{$order_details->id}}">
								</div>
								<h4>Order Preparing</h4>
							</div>
							<div class="order_process">
								<div class="{{$text_class_garnishing}}" id="garnishing" data-id = "{{$order_details->table_id}}"  order_id = "{{$order_details->id}}">
								</div>
								<h4>Garnishing</h4>
							</div>
							<div class="order_process">
								<div class="{{$text_class_completed}}" id="completed" data-id = "{{$order_details->table_id}}"  order_id = "{{$order_details->id}}">
								</div>
								<h4>Completed</h4>
							</div>
						</div>
					</div>



					<?php
						$total_item_price = 0;
					?>

					<div style="display: flex;justify-content: space-between;padding: 22px 0px;">
						<h2 style="margin: 0px;padding: 0px;text-align: center;">Order Details</h2> 
					</div>
					<div class="card order_details">
						<div class="card-body add_imgae_box"> 
							<div class="table-responsive">
								<table class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Item Name</th>
											<th>Item Price($)</th> 
											<th>Quantity</th>
											<th>Total Price($)</th>  
										</tr>
									</thead>
									<tbody> 
										<?php
											$i=0;
										?>
										@foreach($order_details->orderItemsWithMenu as $rows)
										<tr>
											<td>{{++$i}}</td>
											<td>{{$rows->menu->item_name ?? 'N/A'}}</td> 
											<td>{{$rows->item_price ?? 'N/A'}}</td> 
											<td>{{$rows->quantity ?? 'N/A'}}</td>  
											<?php
												$item_price = $rows->item_price * $rows->quantity;
											?>
											<td>{{$item_price ?? 'N/A'}}</td>  
										</tr> 
										<?php
											$total_item_price = $total_item_price+$item_price;
										?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>







					

					<div style="display: flex;justify-content: space-between;padding: 22px 0px;">
						<h2 style="margin: 0px;padding: 0px;text-align: center;	">Payment Details</h1> 
					</div>
					<div class="card order_details">
						<div class="card-body add_imgae_box"> 
							<div class="table-responsive">
								<table class="display table table-striped table-hover dataTable" > 
									<tbody> 
										 <tr>
											<th class="heading_transaction_width">Transaction ID</th>
											<td>
												{{$order_details->payment->transaction_id ?? 'N/A'}}
											</td>
										</tr> 
										<tr>
											<th class="heading_transaction_width">Transaction Date & Time</th>
											<td>
												{{$order_details->payment->payment_date_time ?? 'N/A'}}
											</td>
										</tr> 
										 <tr>
											<th class="heading_transaction_width">Payment Mode</th>
											<td>
												<?php
													$mode = ucfirst($order_details->sent_payment_type);
												?>
												{{$mode ?? 'N/A'}}
											</td>
										</tr> 

										<tr>
											<th class="heading_transaction_width">Item Price($)</th>
											<td>
												{{$total_item_price ?? 'N/A'}}
											</td>
										</tr> 


										<!-- <tr>
											<th class="heading_transaction_width">Discount ({{$order_details->payment->discount_percentage ?? 'N/A'}}%)</th>
											<td>
												{{$order_details->payment->discount_amount ?? 'N/A'}}
											</td>
										</tr> -->
										<tr>
											<th class="heading_transaction_width">Tax ({{$order_details->payment->tax_percentage ?? 'N/A'}}%)</th>
											<td>
												{{$order_details->payment->tax_amount ?? 'N/A'}}
											</td>
										</tr>
										<tr>
											<th class="heading_transaction_width">Tip Price($)</th>
											<td>
												{{$order_details->payment->tip_amount ?? 'N/A'}}
											</td>
										</tr>
										<tr>
											<th class="heading_transaction_width">Total Price($)</th>
											<td>
												{{$order_details->payment->total_amount ?? 'N/A'}}
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>







					<div style="display: flex;justify-content: space-between;padding: 22px 0px;">
						<h2 style="margin: 0px;padding: 0px;text-align: center;">Special Instruction</h2> 
					</div>
					<div class="card order_details">
						<div class="card-body add_imgae_box"> 
							<div class="table-responsive">

								<?php
									$check_instruction_exist = $order_details->order_text_customization;
									if($check_instruction_exist == ''){
										$instruction = 'N/A';
									}else{
										$instruction = $order_details->order_text_customization;
									}
								?>

								{{$instruction}}

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
        <h4 class="modal-title">Information</h4>
      </div>
      <div class="modal-body"> 
            <p id="alert_txt"></p> 
      </div> 
    </div> 
  </div> 
</div>



<!-- Loader -->
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
	$('document').ready(function(){


		$(".close").on("click",function(){
			$("#alertModel").modal("hide");
		});


		$('#order_preparing').on('click' , function(){
			let check_class = $(this)[0].className;
			if(check_class == "grey"){

				$("#loaderModel").modal("show");
				$("#loaderModel").unbind("click");

				$(this).removeClass('grey');
				$(this).addClass('green');
				
				var order_id = $(this).attr('order_id'); 
				/*ajax calling*/ 
				var data = {
	            '_token': "{{csrf_token()}}",
	            'order_id': order_id,
	            'status' : status
	            }; 
	          	$.ajax({
	              url:"{{url('restaurant/change-status-to-preparing')}}",
	              type:'POST',
	              data:data,
	              success: function(res){  
	              		console.log(res);  
	              		setTimeout(function(){
		              		$("#loaderModel").modal("hide"); 
		              	},300);
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
			}
		});



		$('#garnishing').on('click' , function(){
			let check_class = $(this)[0].className;
			if(check_class == "grey"){
				let check_prev_class = $("#order_preparing")[0].className;
				if(check_prev_class == "green"){

					$("#loaderModel").modal("show");
					$("#loaderModel").unbind("click");

					$(this).removeClass('grey');
					$(this).addClass('green');
					
					var order_id = $(this).attr('order_id'); 
					/*ajax calling*/ 
					var data = {
		            '_token': "{{csrf_token()}}",
		            'order_id': order_id,
		            'status' : status
		            }; 
		          	$.ajax({
		              url:"{{url('restaurant/change-status-to-garnishing')}}",
		              type:'POST',
		              data:data,
		              success: function(res){  
		              		console.log(res); 
		              		setTimeout(function(){
			              		$("#loaderModel").modal("hide"); 
			              	},300);  
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
				}else{ 
					$("#alert_txt").text("Please change previous order stage first.");
					$("#alertModel").modal("show");
		            $("#alertModel").unbind("click"); 
				} 
			}
		});


		$('#completed').on('click' , function(){
			let check_class = $(this)[0].className;
			if(check_class == "grey"){
				let check_prev_class = $("#garnishing")[0].className;
				if(check_prev_class == "green"){

					$("#loaderModel").modal("show");
					$("#loaderModel").unbind("click");

					$(this).removeClass('grey');
					$(this).addClass('green');
					
					var order_id = $(this).attr('order_id'); 
					var table_id = $(this).data("id");
					/*ajax calling*/ 
					var data = {
		            '_token': "{{csrf_token()}}",
		            'order_id': order_id,
		            'status' : status,
		            'table_id' : table_id
		            }; 
		          	$.ajax({
		              url:"{{url('restaurant/change-status-to-completed')}}",
		              type:'POST',
		              data:data,
		              success: function(res){  
		              		console.log(res); 

		              		setTimeout(function(){
			              		$("#loaderModel").modal("hide"); 
			              		$("#alert_txt").text("Order has been completed successfully.");
								$("#alertModel").modal("show");
					            $("#alertModel").unbind("click");  
			              	},300);

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
				}else{
					$("#alert_txt").text("Please change previous order stage first.");
					$("#alertModel").modal("show");
		            $("#alertModel").unbind("click");
				} 
			}
		});


	});
</script>


@endsection()