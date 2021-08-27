@extends('restaurant.layout.layout')
@section('title','Edit Order')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.orderManagement')}}">Order Management</a></li>
								<li class="breadcrumb-item remove_hover">Edit Order</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Edit Order</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<div class="user_img" style="width: 12%;
							margin: auto; position: relative;" data-original-title="Change Image">
								<img src="{{url('public/restaurant/assets/img/woman.jpg')}}" alt="woman" style="margin: 12px 0 12px;">
								<!-- <div class="add_img">
									<img src="../assets/img/plus.png" alt="plus">
								</div> -->
							</div>
							<div class="add_content">
								<form action="" class=" pt-2">
									<label for="" class="pb-1">
										Item Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Item Name" value="Bread" required />
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Select Category
									</label>
									<div class="selectdiv mb-3">
										<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
											<option>Select An Option</option>
											<option selected>Breakfast</option>
											<option>Lunch</option>
											<option>Dinner</option>
											<option>Snacks</option>
											<option>Beverages</option>

										</select>
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Item Type
									</label>
									<div class="form-group">
										<label class="raaddio"><span class="text">Veg</span>
											<input type="radio" checked="checked" name="radio">
											<span class="checkmark"></span>
										</label>
										<label class="raaddio"><span class="text">Non-Veg</span>
											<input type="radio" name="radio">
											<span class="checkmark"></span>
										</label>
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Select Payment Type
									</label>
									<div class="selectdiv mb-3">
										<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
											<option>Select An Option</option>
											<option selected>Offline</option>
											<option>Online</option>

										</select>
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Price($)
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Price" value="40" required />
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
										<textarea class="form-control" name="" id="" rows="4" placeholder="Enter Description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
									</div>
								</form>
							</div>
							<div class="text-center mt-2">
								<a href="{{route('restaurant.orderManagement')}}">
									<button type="button" class="btn btn-warning same_wd_btn mb-2">Update</button>
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