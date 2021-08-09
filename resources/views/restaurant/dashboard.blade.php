@extends('restaurant.layout.layout')
@section('title','Dashboard')
@section('content')
		
	<style type="text/css">
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
	</style>
	
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


				<!-- 	  @if(Session::has("error"))
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
		              @endif -->


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
	