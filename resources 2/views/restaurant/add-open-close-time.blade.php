@extends('restaurant.layout.layout')
@section('title','Add Open And Close Time')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li>
								<li class="breadcrumb-item remove_hover">Add Open And Close Time</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Add Open And Close Time</h1>
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between mb-4">
								<div class="add_btn" style="position: inherit;">
									<a href="{{route('restaurant.addRestroTime')}}">
										<button type="button" class="btn btn-warning same_wd_btn">Add Time</button>
									</a>
								</div>
								<div class="add_btn" style="position: inherit;">
									<a href="{{route('restaurant.editRestroTime')}}">
										<button type="button" class="btn btn-warning same_wd_btn border_btn">Edit Time</button>
									</a>
								</div>
							</div>
							<div class="table-responsive">
								<table class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th class="text-left">Day</th>
											<th class="text-left" style="padding-left: 13px !important">Opening Time</th>
											<th style="padding-left: 13px !important">Closing Time</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Sunday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/arashmil.jpg" alt="arashmil">
											</td> -->
											<td>Closed</td>
											<td>Closed</td>
										</tr>
										<tr>
											<td>Monday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/chadengle.jpg" alt="chadengle">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
										</tr>
										<tr>
											<td>Tuesday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/profile.jpg" alt="profile">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
										</tr>
										<tr>
											<td>Wednesday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/profile2.jpg" alt="profile2">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
										</tr>
										<tr>
											<td>Thursday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/sauro.jpg" alt="sauro">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
										</tr>
										<tr>
											<td>Friday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/sauro.jpg" alt="sauro">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
										</tr>
										<tr>
											<td>Saturday</td>
											<!-- <td class="user_img">
												<img src="../assets/img/sauro.jpg" alt="sauro">
											</td> -->
											<td>9:00 AM</td>
											<td>6:00 PM</td>
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