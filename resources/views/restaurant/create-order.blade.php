@extends('restaurant.layout.layout')
@section('title','Create Order')
@section('content')

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="{{route('restaurant.orderManagement')}}">Order Management</a></li>
								<li class="breadcrumb-item remove_hover">Create Order</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>
					<h1>Create Order</h1>
					<div class="card">
						<div class="card-body add_imgae_box">
							<div class="text-right mb-5">
								<a href="">
									<button type="button" class="btn btn-warning same_wd_btn mb-2" style="width: 155px">Add More Item</button>
								</a>
							</div>
							<div class="cross_box mb-5">
								<div class="cross_icon">
									<img src="{{url('public/restaurant/assets/img/cross.png')}}" alt="cross" class="navbar-brand">
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Select Category
										</label>
										<div class="selectdiv mb-3">
											<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
												<option>Select An Option</option>
												<option>Breakfast</option>
												<option>Lunch</option>
												<option>Dinner</option>
												<option>Snacks</option>
												<option>Beverages</option>

											</select>
										</div>
									</form>
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
											Item Quantity
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Price" value="1" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Table Name
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Table Name" value="First" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Mobile Number
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Mobile Number" value="+91 5879487554" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Payment Type
										</label>
										<div class="selectdiv mb-3">
											<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
												<option>Select An Option</option>
												<option>Online</option>
												<option>Offine</option>

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
											<input type="text" class="form-control" placeholder="Enter Price" value="400" required />
										</div>
									</form>
								</div>
							</div>
							<div class="cross_box">
								<div class="cross_icon">
									<img src="{{url('public/restaurant/assets/img/cross.png')}}" alt="cross" class="navbar-brand">
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Select Category
										</label>
										<div class="selectdiv mb-3">
											<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
												<option>Select An Option</option>
												<option>Breakfast</option>
												<option>Lunch</option>
												<option>Dinner</option>
												<option>Snacks</option>
												<option>Beverages</option>

											</select>
										</div>
									</form>
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
											Item Quantity
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Price" value="1" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Table Name
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Table Name" value="First" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Mobile Number
										</label>
										<div class="form-group pb-3">
											<input type="text" class="form-control" placeholder="Enter Mobile Number" value="+91 5879487554" required />
										</div>
									</form>
								</div>
								<div class="add_content">
									<form action="">
										<label for="" class="pb-1">
											Payment Type
										</label>
										<div class="selectdiv mb-3">
											<select class="form-control form-group" style="padding: .6rem 1rem; position: relative;" id="exampleFormControlSelect1">
												<option>Select An Option</option>
												<option>Online</option>
												<option>Offine</option>

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
											<input type="text" class="form-control" placeholder="Enter Price" value="400" required />
										</div>
									</form>
								</div>
							</div>
							<div class="d-flex total_price mt-2">
								<h4>Total Price ($):-</h4>
								<label style="color: #ed1f24 !important">800</label>
							</div>
							<div class="text-center mt-2">
								<a href="{{route('restaurant.orderManagement')}}">
									<button type="button" class="btn btn-warning same_wd_btn mb-2">Submit</button>
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