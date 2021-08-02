@extends('restaurant.layout.layout')
@section('title','Orders Details')
@section('content')


		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.orderManagement')}}">Order Management</a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.todayOrders')}}">Today Orders</a></li>
								<li class="breadcrumb-item remove_hover">Orders Details</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Orders Details</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<div class="user_img" style="width: 12%;
							margin: auto; position: relative;" data-original-title="Change Image">
								<img src="{{url('public/restaurant/assets/img/woman.jpg')}}" alt="woman" style="margin: 12px 0 12px;">
								<!-- <div class="add_img">
									<img src="../assets/img/plus.png" alt="plus">
								</div> -->
							</div>
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
											<th>Item Name</th>
											<td>
												Bread
											</td>
										</tr>
										<tr>
											<th>Item Type</th>
											<td>
												Veg
											</td>
										</tr>
										<tr>
											<th>Category</th>
											<td>
												Breakfast
											</td>
										</tr>
										<tr>
											<th>Username</th>
											<td>
												Sam
											</td>
										</tr>
										<tr>
											<th>Email Address</th>
											<td>
												Sam@yahoo.com
											</td>
										</tr>
										<tr>
											<th>Price($)</th>
											<td>
												400
											</td>
										</tr>
										<tr>
											<th>Order ID</th>
											<td>
												54545454
											</td>
										</tr>
										<tr>
											<th>Transaction ID</th>
											<td>
												54545454
											</td>
										</tr>
										<tr>
											<th>Payment Type</th>
											<td>
												Offline
											</td>
										</tr>
										<tr>
											<th>Order Date</th>
											<td>
												22-05-2021
											</td>
										</tr>
										<tr>
											<th>Order Time</th>
											<td>
												8:00 AM
											</td>
										</tr>
										<tr>
											<th>Description</th>
											<td>
												<!-- <p> -->
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet,
													
												<!-- </p> -->
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