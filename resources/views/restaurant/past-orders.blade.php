@extends('restaurant.layout.layout')
@section('title','Past Orders')
@section('content')

<style type="text/css">
	#basic-datatables_wrapper .col-sm-12 {
		    overflow-x: auto;
		}


		div.dataTables_wrapper div.dataTables_paginate {
		    margin: 10px 0px 0px 0px;
		}
</style>

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.orderManagement')}}">Order Management</a></li>
								<li class="breadcrumb-item remove_hover">Past Orders</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Past Orders</h1>
					<div class="card">
						<div class="card-body calender_inputs">
							<div class="d-flex justify-content-between">
								<div class="add_btn" style="position: inherit; visibility: hidden;">
									<a href="present_create_order.html">
										<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Create Order</button>
									</a>
								</div>
								<div class="d-flex">
									<div class="mr-3">
										<input type="date" class="form-control" placeholder="Start Date" style="    padding: 8px 15px;">
									</div>
									<div class="mr-3">
										<input type="date" class="form-control" placeholder="End Date" style="    padding: 8px 15px;">
									</div>
									<div>
										<a href="">
											<button type="button" class="btn btn-warning same_wd_btn">Filter</button>
										</a>
									</div>
								</div>
							</div>
							<div class="mt-5">
									<a href="{{route('restaurant.orderManagement')}}">
										<button type="button" class="btn btn-warning same_wd_btn border_btn" style="width: 146px;">Present Orders</button>
									</a>
									<a href="{{route('restaurant.pastOrders')}}">
										<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Past Orders</button>
									</a>
									<a href="{{route('restaurant.todayOrders')}}">
										<button type="button" class="btn btn-warning same_wd_btn border_btn" style="width: 146px;">Today Orders</button>
									</a>
							</div>
							<div class="serch_icon">
								<i class="fas fa-search" style="top: 172px;"></i>
							</div>
							<div class="table-responsive">
								<table id="basic-datatables" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Order ID</th>
											<th>Table Name</th>
											<th>Item Name</th>
											<th>Order Date</th>
											<th>Order Time</th>
											<th>Price($)</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												56567
											</td>
											<td>First</td>
											<td>Bread</td>
											<td>30-05-2021</td>
											<td>8:00 AM</td>
											<td>400</td>
											<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
												<a href="{{route('restaurant.pastOrderDetails')}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
												<!-- <a href="">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a> -->
												<a href="">
													<button type="button" class="btn btn-warning same_wd_btn border_btn">Delete</button>
												</a>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												56567
											</td>
											<td>Second</td>
											<td>Bread</td>
											<td>30-05-2021</td>
											<td>8:00 AM</td>
											<td>400</td>
											<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
												<a href="{{route('restaurant.pastOrderDetails')}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
												<!-- <a href="">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a> -->
												<a href="">
													<button type="button" class="btn btn-warning same_wd_btn border_btn">Delete</button>
												</a>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												56567
											</td>
											<td>Thrid</td>
											<td>Bread</td>
											<td>30-05-2021</td>
											<td>8:00 AM</td>
											<td>400</td>
											<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
												<a href="{{route('restaurant.pastOrderDetails')}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
												<!-- <a href="">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a> -->
												<a href="">
													<button type="button" class="btn btn-warning same_wd_btn border_btn">Delete</button>
												</a>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												56567
											</td>
											<td>Fourth</td>
											<td>Bread</td>
											<td>30-05-2021</td>
											<td>8:00 AM</td>
											<td>400</td>
											<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
												<a href="{{route('restaurant.pastOrderDetails')}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
												<!-- <a href="">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a> -->
												<a href="">
													<button type="button" class="btn btn-warning same_wd_btn border_btn">Delete</button>
												</a>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												56567
											</td>
											<td>Fifth</td>
											<td>Bread</td>
											<td>30-05-2021</td>
											<td>8:00 AM</td>
											<td>400</td>
											<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
												<a href="{{route('restaurant.pastOrderDetails')}}">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
												</a>
												<!-- <a href="">
													<button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
												</a> -->
												<a href="">
													<button type="button" class="btn btn-warning same_wd_btn border_btn">Delete</button>
												</a>
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
@endsection()