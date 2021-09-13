<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
  <div class="sidebar-brand-text mx-3"><img src="{{url('public/admin/img/andrewlogo.png')}}"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if(Request::is("admin/dashboard")) {echo 'active';}?>">
  <a class="nav-link" href="{{route('admin.dashboard')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Management
</div>

<!-- Nav Item - Charts -->
<div style="display: none">
<li class="nav-item <?php if(Request::is("admin/user-management") || Request::is("admin/user-details/*")|| Request::is("admin/edit-user/*")|| Request::is("admin/orders")|| Request::is("admin/user-order-details")) {echo 'active';}?>">
  <a class="nav-link " href="{{route('admin.userManagement')}}">
    <i class="fas fa-user"></i>
    <span>User Management</span></a>
</li>
</div>


<!-- Nav Item - Tables -->
<li class="nav-item <?php if(Request::is("admin/restaurant-management") || Request::is("admin/restaurant-approved")|| Request::is("admin/restaurant-rejected")|| Request::is("admin/restaurant-details/*")|| Request::is("admin/edit-restaurant")|| Request::is("admin/restaurant-rejected-details/*")  || Request::is("admin/approved-restaurant-details/*")  || Request::is("admin/edit-restaurant/*") ) {echo 'active';}?> ">
  <a class="nav-link" href="{{route('admin.restaurantManagement')}}">
    <i class="fas fa-utensils"></i>
    <span>Restaurant Management </span></a>
</li>

<li class="nav-item  <?php if(Request::is("admin/order-management") || Request::is("admin/user-details")|| Request::is("admin/order-details")|| Request::is("admin/orders")|| Request::is("admin/edit-order")) {echo 'active';}?>">
  <a class="nav-link" href="{{route('admin.orderManagement')}}">
    <i class="fas fa-fw fa-table"></i>
    <span>Order Management </span></a>
</li>
<li class="nav-item <?php if(Request::is("admin/my-earnings")) {echo 'active';}?> ">
  <a class="nav-link" href="{{route('admin.myEarnings')}}">
   <i class="fas fa-money-bill-wave"></i>
    <span>My Earnings </span></a>
</li>
<li class="nav-item <?php if(Request::is("admin/change-password")) {echo 'active';}?>">
  <a class="nav-link" href="{{route('admin.changePassword')}}">
   <i class="fas fa-unlock-alt"></i>
    <span>Change Password</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->