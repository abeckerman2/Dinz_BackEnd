
@extends('admin.layout.layout')
@section('title','Edit User')
@section('content')

<style>
#first_name-error, #last_name-error,#email-error{
    color: #ff0000;
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

          

            <!-- Nav Item - Messages -->
           
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
          <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.userManagement')}}">User Management</a></li>
  <li>Edit User</li>
</ul>
</div>

          <div class="card shadow mb-4" style="padding: 25px 25px;">

                  @if($errors->any())
                    <div class="backend_err">
                        <ul>

                          @foreach($errors->all() as $error) 
                        
                              <li class="err">{{ $error }}</li>

                          @endforeach 

                        </ul>
                    </div>
                  @endif

            <form class="user" id="user_update_form" method="POST" enctype="multipart/form-data">
                    {{@csrf_field()}}

                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control form-control-user" id="first_name" name="first_name" aria-describedby="emailHelp" value="{{$user_find->first_name}}">
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control form-control-user" id="last_name" name="last_name" value="{{$user_find->last_name}}">
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" class="form-control form-control-user" id="email" name="email" value="{{$user_find->email}}">
                    </div>
                    <!-- <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Mohali">
                    </div>
                     <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control form-control-user" id="exampleInputtext" value="Chandigarh">
                    </div> -->
                   
                    <button type="submit" class="btn btn-primary btn-user btn-block button_bottom">
                      Update
                    </button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
  
jQuery.validator.addMethod("valid_email", function(value, element) {
  console.log(value.indexOf("."))
  if(value.indexOf(".") >= 0 ){
    return true;
  }else {
    return false;
  }
}, "Please enter valid email address.");

$.validator.addMethod("first_name_alphanumeric", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
    },"First name should be alphanumeric only.");

    $.validator.addMethod("last_name_alphanumeric", function(value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s]+$/);
    },"Last name should be alphanumeric only.");

    //space not count in the starting
  jQuery.validator.addMethod("noSpace", function(value, element) {
    return value.length > 0 ? (value.trim().length == 0 ? false : true) : true
  }, "Space not allowed.");

  $("#user_update_form").validate({
  rules : {
      first_name: {
         required: true,
         first_name_alphanumeric: true,
         minlength: 3,
         maxlength : 50,
         noSpace: true,
      },
      last_name: {
         required: true,
         last_name_alphanumeric: true,
         minlength: 3,
         maxlength : 50,
         noSpace: true,
      },
      email : {
          email : true,
          required : true,
          valid_email: true
      },
  },
  messages : {
   first_name: {
      required: "Please enter first name.",
      minlength: "First name must be at least 3 characters long.",
      maxlength : "First name should be less than 50 characters."
   },
   last_name: {
      required: "Please enter last name.",
      minlength: "last name must be at least 3 characters long.",
      maxlength : "last name should be less than 50 characters."
   },
    email : {
        email : "Please enter valid email address.",
        required : "Please enter email address.",
    },
  },
  submitHandler:function(form){
    form.submit();
  }
});
});

</script>

@endsection()