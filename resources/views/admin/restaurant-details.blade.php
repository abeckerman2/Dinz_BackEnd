@extends('admin.layout.layout')
@section('title','Restaurant Details')
@section('content')   

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
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
  <li>Restaurant Details</li>
</ul>
</div>

          <div class="card shadow mb-4" style="padding: 25px 25px;

">

            <form class="user">
                      <label>Restaurant Image</label>
              <div class="text-center liner">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
              <div class="img_line"></div>
              <div class="img_line"></div>
              <div class="img_line"></div>
              <div class="img_line"></div>
            </div>
            <label style="margin-top: 16px;">Restaurant Logo</label>
            <div>
              <img src="{{url('public/admin/img/andrewlogo.png')}}" width="200px" style="">
            </div>  
                
                    <div class="form-group">
                      <label>Restaurant Name</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="ABC123" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Owner Name</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Shivam" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="shivam@yopmail.com" disabled="">
                    </div>
                    <div class="form-group">
                      <label>Restaurant Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Mohali" disabled="">
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Chandigarh" disabled="">
                    </div>
                     <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="+919816214072" disabled="">
                    </div>
                   <div class="text-center Restaurant">
                    <div>
                    <a href="JavaScript:void(0);" class="btn btn-primary btn-user btn-block button_bottom">
                     Accept
                    </a>
                  </div>
                  <div>

                     <a href="JavaScript:void(0);" class="btn btn-primary btn-user btn-block button_bottom">
                      Reject
                    </a>
                  </div>
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

