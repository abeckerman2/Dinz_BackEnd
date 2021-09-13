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





		/*Flash message*/
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


		/*Delete model popup*/
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


</style>

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"> Order Management </li>
								<li class="breadcrumb-item remove_hover">Past Orders</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Past Orders</h1>

					<form method="post" id="validate-form">
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


						<div class="card">
							<div class="card-body calender_inputs">
								<div class="d-flex justify-content-between">
									<div class="add_btn" style="position: inherit; visibility: hidden;">
										<a href="present_create_order.html">
											<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Create Order</button>
										</a>
									</div>
									<div class="d-flex">

										<?php
											$current_date = date('Y-m-d');
										?>
										<div class="mr-3">
											<input type="date" class="form-control" id="start_date" name="start_date" max="{{$current_date}}" value="{{$start_date}}" placeholder="Start Date" style="padding: 8px 15px;">
										</div>
										<div class="mr-3">
											<input type="date" class="form-control" id="end_date" name="end_date" max="{{$current_date}}" value="{{$end_date}}" placeholder="End Date" style="padding: 8px 15px;">
										</div>
										<div>
											<button type="button" id="filter" class="btn btn-warning same_wd_btn">Filter</button>
										</div>
									</div>
								</div>
								<div class="mt-5">
										<a href="{{route('restaurant.orderManagement')}}">
											<button type="button" class="btn btn-warning same_wd_btn border_btn" style="width: 146px;">Ongoing Orders</button>
										</a>
										<a href="{{route('restaurant.todayOrders')}}">
											<button type="button" class="btn btn-warning same_wd_btn border_btn" style="width: 146px;">Today Orders</button>
										</a>
										<a href="{{route('restaurant.pastOrders')}}">
											<button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Past Orders</button>
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
												<th>Table Entity</th>
												<th>Item Name</th>
												<th>Order Date</th>
												<th>Order Time</th>
												<th>Price($)</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>

											<?php
												$i=0;
											?>

										@foreach($order as $row)

											<tr>
												<td>{{++$i}}</td>
												<td>
													{{$row->id}}
												</td>
												<td>{{$row->table->table_name}}</td>

												<?php 
													$count_items = count($row->orderItemsWithMenu);
												?> 

												<td>

													@if($count_items > 0) 
														<?php 
															$menu_pluck = Illuminate\Support\Arr::pluck($row->orderItemsWithMenu, 'menu');
															$item_pluck = Illuminate\Support\Arr::pluck($menu_pluck, 'item_name');
															echo $implode_items = implode(", ", $item_pluck);  
														?> 
													@else 
														<?php echo "N/A"; ?> 
													@endif() 
												</td>



												<?php
													$date_and_time = explode(" ", $row->date_time);
													$date  =  $date_and_time[0];
													$time  =  $date_and_time[1];

												?>
												<td>{{$date}}</td>
												<td>{{$time}}</td>
												<td>{{$row->total_amount}}</td>
												<td class="text-center" style="padding-right: 15px !important;    white-space: nowrap;">
													<a href="{{url('restaurant/past-order-details').'/'.$row->id}}">
														<button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
													</a>
													<button type="button" class="btn btn-warning same_wd_btn border_btn delete_btn"  data-id="{{$row->id}}">Delete</button>
												</td>
											</tr>
										@endforeach

											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>



<div id="deleteModel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    	<form method="POST" action="{{route('restaurant.deleteOrder')}}" id="deleteFORM">
		{{@csrf_field()}}
		<input type="hidden" name="delete_order_id" id="delete_order_id">
      <div class="modal-header">
        <button type="button" class="close no" data-dismiss="modal" style="right: -11px; top: -15px">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body"> 
            <p id="delete_alert_txt">Are you sure, you want to delete this order?</p>    
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



<script type="text/javascript">
	$(document).ready(function(){
		$(".delete_btn").on("click",function(){
			let order_id = $(this).data("id");
			$("#delete_order_id").val(order_id);
			$("#deleteModel").modal("show");
			$("#deleteModel").unbind("click");
		});

		$(".yes").on("click",function(){
			$("#deleteFORM").submit();
		});

		$(".no").on("click",function(){
			$("#deleteModel").modal("hide");
		});
	})
</script>



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
	$(document).ready(function(){
		$('#filter').on('click' , function(){

			var start_date = $('#start_date').val();
			var end_date = $('#end_date').val();

			if(start_date != '' && end_date != ''){
 
	          if(start_date > end_date){
	            alert('Start date should be less than end date');
	            return false;
	          }else{
				$('#validate-form').submit();
	          }

			}else{
				return false;
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

@endsection()