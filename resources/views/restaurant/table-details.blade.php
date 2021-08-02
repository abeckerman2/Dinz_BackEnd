@extends('restaurant.layout.layout')
@section('title','Table Details')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.tableManagement')}}">Table Management</a></li>
								<li class="breadcrumb-item remove_hover">Table Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Table Details</h1>
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
											<th>Table ID</th>
											<td>
												{{$table_find->table_id}}
											</td>
										</tr>
										<tr>
											<th>Table Name</th>
											<td>
												{{$table_find->table_name}}
											</td>
										</tr>
										<tr>
											<th>QR Code</th>
											<td class="code_img">
												<img style="width: 150px; height: 150px;margin-top: 10px; margin-bottom: 10px;" src="{{$table_find->qr_code}}" alt="qr-code">
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
@endsection()