@extends('restaurant.layout.layout')
@section('title','Contact Us')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li>
								<li class="breadcrumb-item remove_hover">Contact Us</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Contact Us</h1>
					<div class="card">
						<div class="card-body add_imgae_box" style="padding: 22px 17px 22px;">
							<div class="add_content">
								<form action="" class=" pt-2">
									<label for="" class="pb-1">
										Title
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Title" value="" required />
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Description
									</label>
									<div class="form-group pb-3">
										<!-- <input type="email" class="form-control" placeholder="Email Address" value="" required /> -->
										<textarea class="form-control" name="" id="" rows="4" placeholder="Enter Description"></textarea>
									</div>
								</form>
							</div>
							<div class="text-center mt-2">
								<a href="">
									<button type="button" class="btn btn-warning same_wd_btn mb-2">Send</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection()
@section('js')
@endsection()