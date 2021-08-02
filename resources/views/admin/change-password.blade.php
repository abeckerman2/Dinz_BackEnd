@extends('admin.layout.layout')
@section('title','Change Password')
@section('content')
<style type="text/css">
  a.btn.btn-primary.btn-user.btn-block.button_bottom {
    margin-top: 23px;
    display: inline-block;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
#old_password-error , #new_password-error , #confirm_password-error{
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

           
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <!-- <a class="btn btn-primary" href="{{route('admin.logout')}}">Logout</a> -->

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
          <h1 class="h3 mb-2 text-gray-800">Change Password</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li>Change Password</li>
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

                @include('admin.notifications')

            <form method="post" id="validate-form" >
            {{@csrf_field()}}
                    <div class="form-group">
                      <label>Old Password</label>
                      <input type="password"  class="form-control form-control-user"  name="old_password" onkeypress="return AvoidSpace(event)" placeholder="Old Password">
                    </div>
                     <div class="form-group">
                      <label>New Password</label>
                      <input type="password" class="form-control form-control-user" id="new_password" name="new_password"  onkeypress="return AvoidSpace(event)" placeholder="New Password">
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control form-control-user"  name="confirm_password" onkeypress="return AvoidSpace(event)" placeholder="Confirm Password">
                    </div>
                    
                    <div>
                    <button type="submit" class="btn btn-primary btn-user btn-block button_bottom">
                      Update
                    </button>
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

@endsection()
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>

<script>
        $(document).ready(function() {

            $('#validate-form').validate({
                rules: {
                  old_password: {
                      required: true,
                    },
                    new_password: {
                      required: true,
                      minlength: 6,
                      maxlength : 15
                    },
                    confirm_password: {
                      required: true,
                      equalTo:'#new_password',
                    },
                },

                messages: {
                  old_password: {
                      required : "Please enter old password.",
                    },
                    new_password: {
                      required : "Please enter new password.",
                      minlength: 'New password must be at least 6 characters long.',
                      maxlength : "New password should be less than 15 characters."
                    },
                    confirm_password: {
                      required : "Please enter confirm password.",
                      equalTo: "New password and confirm password must be same.",
                    },
                  }
            });
        });
    </script>

<script type="text/javascript">
      function AvoidSpace(event) {
          var k = event ? event.which : window.event.keyCode;
          if (k == 32) return false;
      }
</script>

<script type="text/javascript">
$(document).ready(function(){
    $(function() {
        setTimeout(function(){
            $(".alertz").hide();
        }, 5000);
    });

});           
</script>


@endsection()
