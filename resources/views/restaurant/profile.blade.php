@extends('restaurant.layout.layout')
@section('title','Profile')
@section('content')


<style type="text/css">
	/*.alert-success , .alert-danger {
	    border-left: 0px;
	}*/
	.alert-danger {
	    border-left: 0px;
	    color: #302d2d;
	    background-color: #ed2227;
	    color: #fff;
	}
	.alert-success {
	    border-left: 0px;
	    color: #302d2d;
	    background-color: #008000;
	    color: white;
	}	
	.rest_logo img { 
	    margin-top: -10px;
	}

</style>

		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active"><a href="#">Settings</a></li>
								<li class="breadcrumb-item remove_hover">Profile</li>
								<!-- <li class="breadcrumb-item"><a href="#">Library</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data</li> -->
							</ol>
						</nav>
					</div>



					<h1>Profile</h1>
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
						<div class="card-body add_imgae_box">

							<div class="add_content">
								<form action="" class=" pt-2">
									<label for="" class="pb-1">
										First Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter First Name" value="{{$data->first_name ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>

							<div class="add_content">
								<form action="" class=" pt-2">
									<label for="" class="pb-1">
										Last Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Last Name" value="{{$data->last_name ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>

							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Company Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Restaurant Name" value="{{$data->restaurant_name ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>

<!-- 
							<div class="add_content">
								<form action="" class=" pt-2">
									<label for="" class="pb-1">
										Owner Name
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Owner Name" value="{{$data->owner_name ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div> -->
							<div class="add_content">
								<form>
									<label for="" class="pb-1">
										Company Logo/Image
									</label>
									<div class="pb-1 rest_logo">
										<img src="{{$data->restaurant_logo}}" alt="kitchen">
									</div>
								</form>
							</div>

							
							<!-- <div class="add_content" style="display: none">
								<form>
									<label for="" class="pb-1">
										Restaurant Other Images
									</label>
									<div class="d-flex flex-wrap pb-1">
										@foreach($data->restaurantImages as $rows)
										<div class="rest_logo">
											<img src="{{$rows->restaurant_image}}" alt="cafe">
										</div>
										@endforeach
									</div>
								</form>
							</div> -->
							
							
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Company Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Restaurant Address" value="{{$data->restaurant_address ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										City
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter city" value="{{$data->city ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Email Address
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Email Address" value="{{$data->email ?? 'N/A'}}" required readonly/>
									</div>
								</form>
							</div>
							
							<div class="add_content">
								<form action="">
									<label for="" class="pb-1">
										Mobile Number
									</label>
									<div class="form-group pb-3">
										<input type="text" class="form-control" placeholder="Enter Mobile Number" value="+{{$data->country_code}} {{$data->phone_number ?? 'N/A'}}" required readonly/>
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
										<textarea class="form-control" name="" id="" rows="4" readonly placeholder="Enter Description">{{$data->description ?? 'N/A'}}</textarea>
									</div>
								</form>
							</div>
							<div class="text-center mt-2">
								<a href="{{route('restaurant.editProfile')}}">
									<button type="button" class="btn btn-warning same_wd_btn mb-2">Edit</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection()
@section('js')


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