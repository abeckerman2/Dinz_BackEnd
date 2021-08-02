@extends('restaurant.layout.layout')
@section('title','Add Restaurant Time')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li>
								<li class="breadcrumb-item active"><a href="add_open_close_time.html">Add Open And Close Time</a></li>
								<li class="breadcrumb-item remove_hover">Add Restaurant Time</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Add Restaurant Time</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<div class="table-responsive simple_table">
								<table id="basic-datatables" class="display table table-striped table-hover dataTable" >
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
										<tr>
											<th>Sunday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker2" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Monday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker3" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker4" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Tuesday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker5" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker6" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Wednesday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker7" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker8" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Thursday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker9" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker10" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Friday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker11" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker12" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th>Saturday</th>
											<td>
												<div class="d-flex justify-content-between">
													<div class="booking_clock mr-2 w-100">
														<input type="text" class="form-control w-100" placeholder="Select Open Time" value="" id="timepicker13" />
													</div>
													<div class="booking_clock w-100">
														<input type="text" class="form-control w-100" placeholder="Select Close Time" value="" id="timepicker14" />
													</div>
													<div class="open_tick ml-5">
														<label>Open</label>
														<div class="tick">
															<label class="tick_box">
																<input type="checkbox" checked="checked">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
													<div class="open_tick ml-3">
														<label>Close</label>
														<div class="tick">
															<label class="tick_box tick_close_box">
																<input type="checkbox">
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<th></th>
											<td>
												<a href="{{route('restaurant.addOpenCloseTime')}}">
													<button type="button" class="btn btn-warning same_wd_btn mb-2">Save</button>
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
	<script>
      $(document).ready(function(){
        $('#timepicker').mdtimepicker();
        $('#timepicker2').mdtimepicker();
        $('#timepicker3').mdtimepicker(); 
        $('#timepicker4').mdtimepicker();
        $('#timepicker5').mdtimepicker();
        $('#timepicker6').mdtimepicker();
        $('#timepicker7').mdtimepicker();
        $('#timepicker8').mdtimepicker();
        $('#timepicker9').mdtimepicker();
        $('#timepicker10').mdtimepicker();
        $('#timepicker11').mdtimepicker();
        $('#timepicker12').mdtimepicker();
        $('#timepicker13').mdtimepicker();
        $('#timepicker14').mdtimepicker();
      });
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
@endsection()
