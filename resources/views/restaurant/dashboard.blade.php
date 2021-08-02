@extends('restaurant.layout.layout')
@section('title','Dashboard')
@section('content')
		

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<div class="row mt-5">
						<div class="col-md-6 mb_bottom ">
							<a href="" class="hover_box">
								<div class="box">
									<div class="icon_text">
										<i class="fas fa-users"></i>
										<h2>
											Total Users
										</h2>
										<h2 class="number">{{$total_users}}</h2>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="" class="hover_box">
								<div class="box">
									<div class="icon_text">
										<i class="fas fa-book"></i>
										<h2>
											Total Orders
										</h2>
										<h2 class="number">20</h2>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-md-6 mb_bottom">
							<a href="" class="hover_box">
								<div class="box" style="padding: 20px 15px 20px;">
									<div class="icon_text">
										<i class="fas fa-dollar-sign"></i>
										<h2>
											Total Earnings
										</h2>
										<div class="d-flex earnings justify-content-around">
											<div>
												<p class="mb-0">This Day</p>
												<h2 class="number">$200</h2>
											</div>
											<div>
												<p class="mb-0">This Month</p>
												<h2 class="number">$1000</h2>
											</div>
											<div>
												<p class="mb-0">This Year</p>
												<h2 class="number">$2000</h2>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="" class="hover_box">
								<div class="box">
									<div class="icon_text">
										<i class="fas fa-table"></i>
										<h2>
											Total Tables
										</h2>
										<h2 class="number">{{$total_table}}</h2>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection()
@section('js')
@endsection()
	