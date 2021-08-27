@extends('restaurant.layout.layout')
@section('title','Past Orders Details')
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

</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.pastOrders')}}">Order Management</a></li>
								<!-- <li class="breadcrumb-item active"><a href="{{route('restaurant.pastOrders')}}">Past Orders</a></li> -->
								<li class="breadcrumb-item remove_hover">Past Orders Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Past Orders Details</h1>
					

 

					<?php
						$total_item_price = 0;
					?>

					 
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



				</div>
			</div>
		</div>




@endsection()