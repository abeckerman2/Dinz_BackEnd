
@extends('admin.layout.layout')
@section('title','Orders')
@section('content')
<style>


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
          <!-- Page Heading -->
          <div class="wrapper_breadcrumbs">
          <h1 class="h3 mb-2 text-gray-800">Orders</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.userManagement')}}">User Management</a></li>
  <li><a href="{{route('admin.userDetails',base64_encode($user_id))}}">View User</a></li>
  <li>Orders</li>
</ul>
</div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Order ID</th>
                      <th>Restaurant Name</th>
                      <th>Item Name</th>
                      <th>Order Date</th>
                      <th>Order Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  ?>
                  @foreach($orders_find as $order_find)

                  <?php
                  $date = $order_find->date_time;
                  $converted_date = date('Y-m-d', strtotime($date));
                  $converted_time = date('h:i A', strtotime($date));
                ?>
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$order_find->id}}</td>
                      <td>{{$order_find->restaurant->restaurant_name}}</td>


                      <?php 
                        $count_items = count($order_find->orderItemsWithMenu);
                      ?> 
                      <td>
                        @if($count_items > 0) 
                          <?php 
                            $menu_pluck = Illuminate\Support\Arr::pluck($order_find->orderItemsWithMenu, 'menu');
                            $item_pluck = Illuminate\Support\Arr::pluck($menu_pluck, 'item_name');
                            echo $implode_items = implode(", ", $item_pluck);  
                          ?> 
                        @else 
                          <?php echo "N/A"; ?> 
                        @endif() 
                      </td>



                        
                      <td>{{$converted_date}}</td>
                      <td>{{$converted_time}}</td>
                      <td><a href="{{route('admin.userOrderDetails',base64_encode($order_find->id))}}" class="view">View</a>
                      </td>
                    </tr>
                    @endforeach()
                </table>
                <?php
                    $count = 0;
                      foreach($orders_find as $rows){
                        $count++;
                      }


                    ?>
                    @if($count == 0)
                    <div class="" style="text-align: center;">
                    <h2 style="font-size: 15px;">No Order Available.</h2>
                    </div>
                    @endif
                  </tbody>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
@section('js')
@endsection
