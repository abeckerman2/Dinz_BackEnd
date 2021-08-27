
@extends('admin.layout.layout')
@section('title','Edit Order')
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
          <h1 class="h3 mb-2 text-gray-800">Edit Order</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.orderManagement')}}">Order Management</a></li>
  <li>Edit Order</li>
</ul>
</div>

          <div class="card shadow mb-4" style="padding: 25px 25px;

">

            <form class="user">
              <label>Item Image</label>
              <div class="" style="margin-bottom: 12px;">
              <img src="{{url('public/admin/img/dummy1.jpg')}}" width="200px" style="">
            </div>
            <div class="form-group">
                      <label>Select Category</label>
                      <select class="form-control">
                        <option>Select a option</option>
                        <option>Breakfast</option>
                        <option>Lunch</option>
                        <option>Dinner</option>
                        <option>Snack</option>
                      </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                      <label style="width: 100%;">Type</label>
                      <input type="radio" id="male" name="gender" value="male">

                        <label for="male">Veg</label>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                          <input type="radio" id="female" name="gender" value="female">
                           <label for="female">Non-Veg</label>
                      
                    </div>
                    <div class="form-group">
                      <label>Item Name</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Bread">
                    </div>
                    
                     <div class="form-group">
                      <label>Select Payment Type</label>
                      <select class="form-control">
                        <option>Select an option</option>
                        <option>Offline</option>
                        <option>Online</option>
                       
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="$40">
                    </div>
                    <a href="{{route('admin.orderManagement')}}" class="btn btn-primary btn-user btn-block button_bottom">
                      Update
                    </a>
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
@endsection()
@section('js')
@endsection()

