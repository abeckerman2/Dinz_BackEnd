
@extends('admin.layout.layout')
@section('title','Approved Restaurants')
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
          <h1 class="h3 mb-2 text-gray-800"></h1>

               <div class="wrapper_breadcrumbs">
          <h1 class="h3 mb-2 text-gray-800">Approved Restaurants</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.restaurantManagement')}}">Restaurant Management</a></li>
  <li>Approved Restaurants</li>
</ul>
</div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('admin.restaurantManagement')}}" class="view">Requests</a>
                          <a href="{{route('admin.approvedRestaurant')}}" class="view">Accepted</a>
                        <a href="{{route('admin.rejectedRestaurant')}}" class="view">Rejected</a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Restaurant Logo</th>
                      <th>Restaurant Name</th>
                      <th>Owner Name</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><img src="https://images.unsplash.com/source-404?fit=crop&fm=jpg&h=800&q=60&w=1200" width="50" height="30"></td>
                      <td>ABC123</td>
                      <td>Shivam</td>
                      <td>Mohali</td>
                      <td>+916767676767</td>
                      <td><a href="{{route('admin.editRestaurant')}}" class="view">Edit</a>
                          <a href="javascript:void(0);" class="view">Block</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      </td>
                    </tr>
                      <tr>
                      <td>2</td>
                      <td><img src="https://images.unsplash.com/source-404?fit=crop&fm=jpg&h=800&q=60&w=1200" width="50" height="30"></td>
                      <td>ABC123</td>
                      <td>Shivam</td>
                      <td>Mohali</td>
                      <td>+916767676767</td>
                      <td><a href="{{route('admin.editRestaurant')}}" class="view">Edit</a>
                          <a href="javascript:void(0);" class="view">Block</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      </td>
                    </tr>
                       <tr>
                      <td>3</td>
                      <td><img src="https://images.unsplash.com/source-404?fit=crop&fm=jpg&h=800&q=60&w=1200" width="50" height="30"></td>
                      <td>ABC123</td>
                      <td>Shivam</td>
                      <td>Mohali</td>
                      <td>+916767676767</td>
                      <td><a href="{{route('admin.editRestaurant')}}" class="view">Edit</a>
                          <a href="javascript:void(0);" class="view">Block</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      </td>
                    </tr>
                        <tr>
                      <td>4</td>
                      <td><img src="https://images.unsplash.com/source-404?fit=crop&fm=jpg&h=800&q=60&w=1200" width="50" height="30"></td>
                      <td>ABC123</td>
                      <td>Shivam</td>
                      <td>Mohali</td>
                      <td>+916767676767</td>
                      <td><a href="{{route('admin.editRestaurant')}}" class="view">Edit</a>
                          <a href="javascript:void(0);" class="view">Block</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      </td>
                    </tr>
                       <tr>
                      <td>5</td>
                      <td><img src="https://images.unsplash.com/source-404?fit=crop&fm=jpg&h=800&q=60&w=1200" width="50" height="30"></td>
                      <td>ABC123</td>
                      <td>Shivam</td>
                      <td>Mohali</td>
                      <td>+916767676767</td>
                      <td><a href="{{route('admin.editRestaurant')}}" class="view">Edit</a>
                          <a href="javascript:void(0);" class="view">Block</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      </td>
                    </tr>
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

  
@endsection()
@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
  $('#dataTable').DataTable();
});
  </script>

@endsection()
