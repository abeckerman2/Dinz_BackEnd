@extends('admin.layout.layout')
@section('title','Order Management')
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
         
            <!-- Nav Item - User Information -->
            <ul class="navbar-nav ml-auto">
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
          <h1 class="h3 mb-2 text-gray-800">Order Management</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li>Order Management</li>
</ul>
</div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Order ID</th>
                      <th>Restaurant Name</th>
                      <th>Item Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>545454</td>
                      <td>ABC123</td>
                      <td>Bread</td>
                      <td>$400</td>
                      <td>Dinner</td>
                      <td><a href="{{route('admin.orderDetails')}}" class="view">View</a>
                          <a href="{{route('admin.editOrder')}}" class="view">Edit</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      <a href="javascript:void(0);" class="view">Block</a></td>
                    </tr>
                      <tr>
                      <td>2</td>
                      <td>545454</td>
                      <td>ABC123</td>
                      <td>Bread</td>
                      <td>$400</td>
                      <td>Dinner</td>
                      <td><a href="{{route('admin.orderDetails')}}" class="view">View</a>
                          <a href="{{route('admin.editOrder')}}" class="view">Edit</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      <a href="javascript:void(0);" class="view">Block</a></td>
                    </tr>
                      <tr>
                      <td>3</td>
                      <td>545454</td>
                      <td>ABC123</td>
                      <td>Bread</td>
                      <td>$400</td>
                      <td>Dinner</td>
                      <td><a href="{{route('admin.orderDetails')}}" class="view">View</a>
                          <a href="{{route('admin.editOrder')}}" class="view">Edit</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      <a href="javascript:void(0);" class="view">Block</a></td>
                    </tr>
                        <tr>
                      <td>4</td>
                      <td>545454</td>
                      <td>ABC123</td>
                      <td>Bread</td>
                      <td>$400</td>
                      <td>Dinner</td>
                      <td><a href="{{route('admin.orderDetails')}}" class="view">View</a>
                          <a href="{{route('admin.editOrder')}}" class="view">Edit</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      <a href="javascript:void(0);" class="view">Block</a></td>
                    </tr>
                       <tr>
                      <td>5</td>
                      <td>545454</td>
                      <td>ABC123</td>
                      <td>Bread</td>
                      <td>$400</td>
                      <td>Dinner</td>
                      <td><a href="{{route('admin.orderDetails')}}" class="view">View</a>
                          <a href="{{route('admin.editOrder')}}" class="view">Edit</a>
                        <a href="javascript:void(0);" class="view">Delete</a>
                      <a href="javascript:void(0);" class="view">Block</a></td>
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
