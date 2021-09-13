@extends('admin.layout.layout')
@section('title','Restaurant Details')
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
		.img_line {
			width: 164px;
		}
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



		.view-image img {
			object-fit: contain !important;
    		border: 1px solid #000;
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
            <div class="wrapper_breadcrumbs">
          <h1 class="h3 mb-2 text-gray-800">Restaurant Details</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.restaurantManagement')}}">Restaurant Management</a></li>
  <li><a href="{{route('admin.approvedRestaurant')}}">Approved Restaurants</a></li>

  <li>Restaurant Details</li>
</ul>
</div>

          <div class="card shadow mb-4" style="padding: 25px 25px;

">

            <form class="user">



            	



                 <!-- <label >Restaurant Logo</label>
	            <div>
	              <img src="{{$approved_restaurant_detail->restaurant_logo}}" width="100px" height="100px" style="">
	            </div>  

	              <label style="margin-top: 20px;">Restaurant Image</label>
	                <div class="text-center liner">
						  @foreach($approved_restaurant_detail->restaurantImages as $rows)
			              <img src="{{$rows->restaurant_image}}" width="100px" height="100px" style="">
						  @endforeach
		              
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		            </div> -->

		             <label >Company Logo</label>
	            <div class="view-image" >
	              <img src="{{$approved_restaurant_detail->restaurant_logo}}" width="100px" height="100px" style="">
	            </div>  

	            <!--   <label style="margin-top: 20px;">Restaurant Image</label>
	                <div class="text-center liner view-image">
						  @foreach($approved_restaurant_detail->restaurantImages as $rows)
			              <img src="{{$rows->restaurant_image}}" width="100px" height="100px" style="">
						  @endforeach
		              
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		              <div class="img_line"></div>
		            </div> -->



		            <div class="form-group" style="margin-top: 20px;">
	                  <label>Company Name</label>
	                  <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$approved_restaurant_detail->restaurant_name}}" disabled="">
                	</div>
            
                
                    
                    <div class="form-group" style="margin-top: 20px;">
                      <label>Owner Name</label>

                      <?php
                      	$first_name = $approved_restaurant_detail->first_name;
                      	$last_name = $approved_restaurant_detail->last_name;

                      	$full_name = $first_name.' '.$last_name;
                      ?>

                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$full_name}}" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$approved_restaurant_detail->email}}" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Company Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$approved_restaurant_detail->restaurant_address}}" disabled="">
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$approved_restaurant_detail->city}}" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="+{{$approved_restaurant_detail->country_code}}{{$approved_restaurant_detail->phone_number}}" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control form-control-user" rows="3" disabled maxlength="1000" name="description">{{$approved_restaurant_detail->description}}</textarea>
                    </div>
                    
                   
                  </form>
          </div>

        </div>
       

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

@endsection
@section('js')

<script type="text/javascript">
		$(document).ready(function(){


			$(".close").on("click",function(){
				$("#alertModel").modal("hide");
			});
			
			// $(".accept").on("click",function(){
        

			// $("#loaderModel").modal("show");
			// $("#loaderModel").unbind("click");
			// let target = $(this);
			// let text_check = target.text();
			// let restaurant_id = target.data("id");
			

			// /*ajax calling*/

			// 	var data = {
	  //           '_token': "{{csrf_token()}}",
	  //           'restaurant_id': restaurant_id,
	  //           };

	  //         	$.ajax({
	  //             url:"{{url('admin/accept-approved')}}",
	  //             type:'POST',
	  //             data:data,
	  //             success: function(res){

                  
	  //             	setTimeout(function(){

	  //             		console.log(res);
		 //              	if(res){
		 //              		$("#alert_txt").text("Restaurant has been accepted successfully.");
		 //              	}
		 //              	$("#loaderModel").modal("hide");
		 //              	$("#alertModel").modal("show");
		 //              	$("#alertModel").unbind("click");
			// 			$(".reject").hide();
			// 			$(".accept").hide();
			// 			$(".accepted").css('display','block');
	  //             	},500);
	                
	  //             },
	  //             error: function(data, textStatus, xhr) {
	  //               if(data.status == 422){
	  //                 var result = data.responseJSON;
	  //                 alert('Something went worng.');
	  //                 window.location.href = "";
	  //                 return false;
	  //               } 
	  //             }
	  //           });
   //        	});
		});
	</script>


<script type="text/javascript">
		$(document).ready(function(){


			$(".close").on("click",function(){
				$("#alertModel").modal("hide");
			});
			
			// $(".reject").on("click",function(){

			// $("#loaderModel").modal("show");
			// $("#loaderModel").unbind("click");
			// let target = $(this);
			// let text_check = target.text();
			// let restaurant_id = target.data("id");
			

			// /*ajax calling*/

			// 	var data = {
	  //           '_token': "{{csrf_token()}}",
	  //           'restaurant_id': restaurant_id,
	  //           };

	  //         	$.ajax({
	  //             url:"{{url('admin/reject')}}",
	  //             type:'POST',
	  //             data:data,
	  //             success: function(res){


                  
	  //             	setTimeout(function(){

	  //             		console.log(res);
		 //              	if(res){
		 //              		$("#alert_txt").text("Restaurant has been rejected successfully.");
		 //              	}
		 //              	$("#loaderModel").modal("hide");
		 //              	$("#alertModel").modal("show");
		 //              	$("#alertModel").unbind("click");
			// 			$(".reject").hide();
			// 			$(".accept").hide();
			// 			$(".rejected").css('display','block');
	  //             	},500);
	                
	  //             },
	  //             error: function(data, textStatus, xhr) {
	  //               if(data.status == 422){
	  //                 var result = data.responseJSON;
	  //                 alert('Something went worng.');
	  //                 window.location.href = "";
	  //                 return false;
	  //               } 
	  //             }
	  //           });
   //        	});
		});
	</script>

@endsection

