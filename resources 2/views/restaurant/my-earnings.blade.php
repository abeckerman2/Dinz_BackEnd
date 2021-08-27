@extends('restaurant.layout.layout')
@section('title','My Earnings')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li>
								<li class="breadcrumb-item remove_hover">My Earnings</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>My Earnings</h1>
					<div class="card">
						<div class="card-body add_imgae_box calender_inputs">
							<div class="add_content">
								<div class="d-flex justify-content-between">
									<div class="mr-3 w-100">
										<input type="date" class="form-control w-100" placeholder="Start Date" style="    padding: 8px 15px;">
									</div>
									<div class="mr-3 w-100">
										<input type="date" class="form-control w-100" placeholder="End Date" style="    padding: 8px 15px;">
									</div>
								</div>
							</div>
							<div class="text-center mt-4 ">
								<a href="">
									<button type="button" class="btn btn-warning same_wd_btn">Submit</button>
								</a>
							</div>
							<div class="total_price mt-2 text-center mt-4">
								<h4>Total Earnings</h4>
								<label style="color: #ed1f24 !important">$5000</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection()
@section('js')
@endsection()