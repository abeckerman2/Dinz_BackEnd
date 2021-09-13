@extends('admin.layout.layout')
@section('title','Restaurant Requests')
@section('content')

<style type="text/css">
		/* .alert-danger {
		    border-left: 0px; 
		    color: #302d2d;
		}
		.alert-success {
		    border-left: 0px; 
		    color: #302d2d;
		} */

		div#loaderImg2 {
		    position: absolute;
		    left: 0;
		    right: 0;
		    text-align: center;
		    margin-top: 250px;
		}


		#alertModel h4.modal-title {
		    text-align: center;
		    margin: auto;
		    color: #fff;
		}
		#alertModel  .modal-header .close{
		    padding: 0;
		    margin: 0;
		}
		#alertModel  button.close {
		    position: absolute;
		    right: -11px;
		    top: -12px;
		    width: 31px;
		    height: 30px;
		    text-shadow: 0 1px 0 #ed1f24;
		    background: #ed1f24;
		    opacity: .5;
		    border-radius: 100%;
		    opacity: 1;
		        border: 2px solid #fff;
				display:inline-block;

		}

		#alertModel .modal-header {
		    background-color: #ed1f24 !important;
		    border: 1px solid #ed1f24 !important;
		    background: linear-gradient( 
		167deg
		 , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
		}

		#alertModel .modal-footer {
		    border-top: 0px solid #e9ecef;

		}
		#alertModel button.btn.btn-secondary.btn-lg.login_btn {
		    width: 37%;
		    font-size: 24px;
		    padding: 6px 0;
		}

		#alertModel .modal-dialog {
		    margin-top: 200px;
		}

		p#alert_txt {
		    text-align: center;
		    font-weight: 500;
		}

		#alertModel .modal-content {
		    width: 110%;
		}

		#basic-datatables_wrapper .col-sm-12 {
		    overflow-x: auto;
		}


		div.dataTables_wrapper div.dataTables_paginate {
		    margin: 10px 0px 0px 0px;
		}


		table.table-bordered.dataTable tbody td {
    white-space: normal;
    word-break: break-all;
}
#dataTable_wrapper td:last-child, #dataTable_wrapper th:last-child {
    text-align: center!important;
    /* display: flex; */
    white-space: inherit;
}



.view-tabs {
	padding: 8px 11px!important;
}
a.view.un-active {
    border: 2px solid #ed2227 !important;
    background: none;
    color: #ee2328;
    /* padding: 0; */
        margin-left: 7px;
    padding: 6px 11px!important;
}
a.view.un-active:hover {
	    background-image: linear-gradient( 
180deg
 ,#ED222B 10%,#5e0202 100%);
	    color: #fff;
}
.card-header .text-primary {
	    height: 34px;
    padding-top: 8px;
}


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






.address {
    min-width: 185px!important;
    word-break: break-all;
}
.phone_number{
  min-width: 190px!important;
    word-break: break-all;
}
.owner_name{
  min-width: 165px!important;
  word-break: break-all;
}
.rest_name{
  min-width: 165px!important;
  word-break: break-all;
}
#dataTable_wrapper .col-sm-12 {
    width: 100%;
    overflow: auto;
    white-space: unset;
}
.button_box  {
    display: flex;
    margin-right: 8px;

}
.button_box  a {
    margin-right: 8px;

}
.table thead th{
  white-space: nowrap;
}
table.table-bordered.dataTable tbody td {
    white-space: normal;
    word-break: unset;
}


</style>


    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

           


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                

              <a class="dropdown-item" href="{{route('admin.logout')}}">
                  
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>

                <div class="wrapper_breadcrumbs">
		          <h1 class="h3 mb-2 text-gray-800">Restaurant Requests</h1>
		          	<ul class="breadcrumb">
					  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
					  <li>Restaurant Management</li>
					</ul>
				</div>




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



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
              			<a href="{{route('admin.restaurantManagement')}}" class="view view-tabs">Requests</a>
                          <a href="{{route('admin.approvedRestaurant')}}" class="view un-active" >Approved</a>
                        <a href="{{route('admin.rejectedRestaurant')}}" class="view un-active">Rejected</a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Company Logo</th>
                      <th>Company Name</th>
                      <th>Owner Name</th>
                      <th>Address</th>
                      <th style="width:160px;">Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                
                  <?php
                      $i = 1;
                  ?> 
                      @foreach($restaurants as $restaurant)
                    <tr>
                      <td>{{$i++}}</td>
                      <td><img src="{{$restaurant->restaurant_logo}}" width="50" height="30" style="object-fit: contain;height: 60px;    width: 100%;"></td>
                      <td><div class="rest_name">@if(strlen($restaurant->restaurant_name) > 40 ){{ substr($restaurant->restaurant_name,0,40)}}.....@else {{substr($restaurant->restaurant_name,0,40)}}  @endif</div></td>

                      <?php
                      	$first_name = $restaurant->first_name;
                      	$last_name = $restaurant->last_name;

                      	$full_name = $first_name.' '.$last_name;

                      ?>
                      <td><div class="owner_name">@if(strlen($full_name) > 40 ){{ substr($full_name,0,40)}}.....@else {{substr($full_name,0,40)}}  @endif</div></td>


                      <td><div class="address"> @if(strlen($restaurant->restaurant_address) > 40 ){{ substr($restaurant->restaurant_address,0,40)}}.....@else {{substr($restaurant->restaurant_address,0,40)}}  @endif</div></td>

                      
                      <td><div class="phone_number">+{{$restaurant->country_code}}{{$restaurant->phone_number}}</div></td>
                      <td>
                      	<div class="button_box">
                      	<a href="{{route('admin.restaurantDetails',base64_encode($restaurant->id))}}" class="view" style="padding: 6px 21px!important;">View</a> 
                      	<a href="{{url('admin/accept-restaurant').'/'.$restaurant->id}}" class="view" style="padding: 6px 21px!important;">Approve</a> 
                      	<a href="{{url('admin/reject-restaurant').'/'.$restaurant->id}}" class="view" style="padding: 6px 21px!important;">Reject</a> 
                        <!-- <button type="button" class="view accept" data-id = "{{$restaurant->id}}">Accept</button>
                        <button type="button" class="view reject" data-id = "{{$restaurant->id}}">Reject</button> -->
                    	</div>
                      </td>
                    </tr>  
                    @endforeach()
                       
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    <div id="loaderModel" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="loaderImg2" id="loaderImg2">
		   <img src = "{{url('public/loader.gif')}}">
		</div>

	</div>
</div>

<div id="alertModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Information</h4>
      </div>
      <div class="modal-body">
            
            <p id="alert_txt"></p>    

      </div>
      
    </div>

  </div>



</div>




@endsection()
@section('js')

  <script type="text/javascript">
    $(document).ready(function() {
     $('#dataTable').DataTable();
    });
  </script>


<script type="text/javascript">
		$(document).ready(function(){


			$(".close").on("click",function(){
				$("#alertModel").modal("hide");
			});
			
			$(".accept").on("click",function(){

			$("#loaderModel").modal("show");
			$("#loaderModel").unbind("click");
			let target = $(this);
			let text_check = target.text();
			let restaurant_id = target.data("id");
			$(this).closest('tr').remove();
			

			/*ajax calling*/

				var data = {
	            '_token': "{{csrf_token()}}",
	            'restaurant_id': restaurant_id,
	            };

	          	$.ajax({
	              url:"{{url('admin/accept-approved')}}",
	              type:'POST',
	              data:data,
	              success: function(res){

                  
	              	setTimeout(function(){

	              		console.log(res);
		              	if(res){
		              		$("#alert_txt").text("Restaurant has been accepted successfully.");
							  
		              	}
		              	$("#loaderModel").modal("hide");
		              	$("#alertModel").modal("show");
		              	$("#alertModel").unbind("click");
	              	},500);
	                
	              },
	              error: function(data, textStatus, xhr) {
	                if(data.status == 422){
	                  var result = data.responseJSON;
	                  alert('Something went worng.');
	                  window.location.href = "";
	                  return false;
	                } 
	              }
	            });
          	});
		});
	</script>


<script type="text/javascript">
		$(document).ready(function(){


			$(".close").on("click",function(){
				$("#alertModel").modal("hide");

			});
			
			$(".reject").on("click",function(){

			$("#loaderModel").modal("show");
			$("#loaderModel").unbind("click");
			let target = $(this);
			let text_check = target.text();
			let restaurant_id = target.data("id");
			$(this).closest('tr').remove();
			
			

			/*ajax calling*/

				var data = {
	            '_token': "{{csrf_token()}}",
	            'restaurant_id': restaurant_id,
	            };

	          	$.ajax({
	              url:"{{url('admin/reject')}}",
	              type:'POST',
	              data:data,
	              success: function(res){

	              	setTimeout(function(){

	              		console.log(res);
		              	if(res){
		              		$("#alert_txt").text("Restaurant has been rejected successfully.");
		              	}
		              	$("#loaderModel").modal("hide");
		              	$("#alertModel").modal("show");
		              	$("#alertModel").unbind("click");
	              	},500);
	                
	              },
	              error: function(data, textStatus, xhr) {
	                if(data.status == 422){
	                  var result = data.responseJSON;
	                  alert('Something went worng.');
	                  window.location.href = "";
	                  return false;
	                } 
	              }
	            });
          	});
		});
    
	</script>


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
