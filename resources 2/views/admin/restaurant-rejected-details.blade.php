
@extends('admin.layout.layout')
@section('title','Restaurant Details')
@section('content')  
    
    <style type="text/css">
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
                      <li><a href="{{route('admin.rejectedRestaurant')}}">Rejected Restaurants</a>
                      <li>Restaurant Details</li>
                    </ul>
          </div>

          <div class="card shadow mb-4" style="padding: 25px 25px;

">

            <form class="user">
                   


                    <label>Restaurant Logo</label>
                    <div class="view-image">
                      <img src="{{$reject_restaurant_detail->restaurant_logo}}" width="100px" height="100px" style="">
                    </div>


                 <label style="margin-top: 20px;">Restaurant Image</label>
                  <div class="text-center liner view-image">
                  @foreach($reject_restaurant_detail->restaurantImages as $rows)
                   <img src="{{$rows->restaurant_image}}" width="100px" height="100px" style="">
    			        @endforeach
                  <div class="img_line"></div>
                  <div class="img_line"></div>
                  <div class="img_line"></div>
                  <div class="img_line"></div>
                </div>


                        

                         <div class="form-group" style="margin-top: 20px;">
                          <label>Restaurant Name</label>
                          <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$reject_restaurant_detail->restaurant_name}}" disabled="">
                        </div>


                    <div class="form-group" style="margin-top: 20px;">
                      <label>Owner Name</label>

                       <?php
                        $first_name = $reject_restaurant_detail->first_name;
                        $last_name = $reject_restaurant_detail->last_name;

                        $full_name = $first_name.' '.$last_name;
                      ?>

                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$full_name}}" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$reject_restaurant_detail->email}}" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Restaurant Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$reject_restaurant_detail->restaurant_address}}" disabled="">
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="{{$reject_restaurant_detail->city}}" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="+{{$reject_restaurant_detail->country_code}}{{$reject_restaurant_detail->phone_number}}" disabled="">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control form-control-user" rows="3" disabled maxlength="1000" name="description">{{$reject_restaurant_detail->description}}</textarea>
                    </div>
                    
                     <div class="form-group">
                      <label>Rating</label>
                      <div>
                    <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
</div>
</div>
 <div class="form-group">
                      <label>Review</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Lorem ipsum" disabled="">
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

@endsection
@section('js')
@endsection