@extends('admin.layout.layout')
@section('title','Rejected Restaurants')
@section('content')
<style>
  table.table-bordered.dataTable tbody td {
    white-space: normal;
    word-break: break-all;
}
#dataTable_wrapper td:last-child, #dataTable_wrapper th:last-child {
    text-align: center!important;
    /* display: flex; */
    white-space: inherit;
}


.view-tabs {
  padding: 8px 11px!important;
}
a.view.un-active {
    border: 2px solid #ed2227 !important;
    background: none;
    color: #ee2328;
    /* padding: 0; */
    padding: 6px 8px!important;
    margin-left: 7px;
}
a.view.un-active:hover {
      background-image: linear-gradient( 
180deg
 ,#ED222B 10%,#5e0202 100%);
      color: #fff;
}
.card-header .text-primary {
      height: 34px;
    padding-top: 8px;
}





#deleteModel h4.modal-title {
    text-align: center;
    margin: auto;
    color: #fff;
}
#deleteModel  .modal-header .close  {
    padding: 0;
    margin: 0;
}



#deleteModel .modal-header img.close
{
  position: absolute;
  opacity: 1;
  height: 30px;
  width: 30px;
  top: -13px;
  right: -12px;
}

#myModal .modal-header img.close:hover {
  opacity: 1;
}
#deleteModel input#update_file_name {
    margin: 0;
    padding: 0;
}


#deleteModel .modal-header{
  background-color: #ed1f24 !important;
  border: 1px solid #ed1f24 !important;
  background: linear-gradient(  167deg
     , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
    }
}
#editModel  h4.h4_course.file_upload {
    margin-bottom: 13px;
}


#deleteModel .modal-footer{
    border-top: 0px solid #e9ecef;

}
#deleteModel button.btn.btn-secondary.btn-lg.login_btn{
    width: 25%;
    font-size: 18px;
    padding: 6px 0;
}
div#deleteModel p {
    text-align: center;
    margin-top: 25px;
}
#deleteModel .modal-footer {
    border-top: 0px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
}
#send_btn {
  padding: 6px 11px!important;
}
.dlt_btn,
#send_btn{
      padding: 3px 11px!important;
    /*padding: 5px;*/
    border-radius: 3px;
    font-size: 15px;
    font-weight: 400;
    color: #fff;
    box-shadow: 0 8px 16px 0 rgb(0 0 0 / 6%), 0 6px 20px 0 rgb(0 0 0 / 6%);
    background-image: linear-gradient( 
180deg
 ,#ed2227 10%,#5e0202 100%);
    border: 0;
    width: 80px!important;
}










.alert-danger {
        border-left: 0px;
        color: #302d2d;
        background-color: #ed2227;
        color: #fff;
    }
    .alert-success {
        border-left: 0px;
        color: #302d2d;
        background-color: #008000;
        color: white;
    }



.address {
    min-width: 185px!important;
    word-break: break-all;
}
.phone_number{
  min-width: 190px!important;
    word-break: break-all;
}
.owner_name{
  min-width: 165px!important;
    word-break: break-all;
}
.rest_name{
  min-width: 165px!important;
  word-break: break-all;
}
#dataTable_wrapper .col-sm-12 {
    width: 100%;
    overflow: auto;
    white-space: unset;
}
.button_box  {
    display: flex;
    margin-right: 8px;

}
.button_box  a {
    margin-right: 8px;

}
.table thead th{
  white-space: nowrap;
}
table.table-bordered.dataTable tbody td {
    white-space: normal;
    word-break: unset;
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
          <h1 class="h3 mb-2 text-gray-800"></h1>

               <div class="wrapper_breadcrumbs">
          <h1 class="h3 mb-2 text-gray-800">Rejected Restaurants</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li><a href="{{route('admin.restaurantManagement')}}">Restaurant Management</a>
  <li>Rejected Restaurants</li>
</ul>
</div>





                  @if(Session::has("error"))
                  <div class="alert alert-danger">{{Session::get("error")}}</div>
                  @endif
                  @if(Session::has("success"))
                  <div class="alert alert-success">{{Session::get("success")}}</div>
                  @endif
                  @if ($errors->any())
                  <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                  </div>
                  @endif



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">

                      <a href="{{route('admin.restaurantManagement')}}" class="view un-active">Requests</a>
                      <a href="{{route('admin.approvedRestaurant')}}" class="view un-active">Approved</a>
                      <a href="{{route('admin.rejectedRestaurant')}}" class="view view-tabs" style="margin-left: 7px;">Rejected</a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Restaurant Logo</th>
                      <th>Restaurant Name</th>
                      <th>Owner Name</th>
                      <th>Address</th>
                      <th style="width:160px;">Phone Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  ?>
                  @foreach($rejected_restaurants as $rejected_restaurant)
                    <tr>
                      <td>{{$i++}}</td>
                      <td><img src="{{$rejected_restaurant->restaurant_logo}}" width="50" height="30" style="object-fit: contain; height: 60px; width: 100%;"></td>
                      <td><div class="rest_name">@if(strlen($rejected_restaurant->restaurant_name) > 40 ){{ substr($rejected_restaurant->restaurant_name,0,40)}}.....@else {{substr($rejected_restaurant->restaurant_name,0,40)}}  @endif</div></td>

                      <?php
                        $first_name = $rejected_restaurant->first_name;
                        $last_name = $rejected_restaurant->last_name;

                        $full_name = $first_name.' '.$last_name;

                      ?>

                      <td><div class="owner_name">@if(strlen($full_name) > 40 ){{ substr($full_name,0,40)}}.....@else {{substr($full_name,0,40)}}  @endif</div></td>


                      <td><div class="address"> @if(strlen($rejected_restaurant->restaurant_address) > 40 ){{ substr($rejected_restaurant->restaurant_address,0,40)}}.....@else {{substr($rejected_restaurant->restaurant_address,0,40)}}  @endif</div></td>

                      
                      <td><div class="phone_number">+{{$rejected_restaurant->country_code}}{{$rejected_restaurant->phone_number}}</div></td>
                      <td>
                        <div class="button_box">
                          <a href="{{route('admin.rejectedRestaurantDetails',base64_encode($rejected_restaurant->id))}}" class="view" style="    padding: 6px 21px!important;">View</a>
                          <button type="button" class="view action" data-id="{{$rejected_restaurant->id}}">Delete</a>
                        </div>
                      </td> 
                    </tr>
                    @endforeach()
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


<div id="loaderModel" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <div class="loaderImg2" id="loaderImg2">
        <img src = "{{url('public/loader.gif')}}">
      </div>

    </div>
  </div>

<!-- Delete Model -->

<div id="deleteModel" class="modal fade" role="dialog">
    <form method="POST" enctype="multipart/form-data" id="delete_validate_form" action="{{route('admin.deleterejectedRestaurant')}}">
      {{csrf_field()}}
      <input type="hidden" name="class_id" class="class_id">
      <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <img src="{{url('public/admin/img/crosss.png')}}" class="close" style="cursor: pointer;" />
                <h4 class="modal-title">Alert</h4>
              </div>
              <div class="modal-body pb-0">
                    <!-- <div class="user_img">
                        <label for="">Date Of Birth</label>
                    </div> -->
                    <p>Are you sure, you want to delete this restaurant?</p>

              </div>
              <div class="modal-footer" style="margin-bottom: 25px;">
              <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="yes" style="margin-right: 25px;">Yes</button>
              <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="no">No</button>
             </div>
           </div>
      </div>
    </form>
  </div>



  @endsection()
  @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
  $('#dataTable').DataTable();
});
  </script>



<script type="text/javascript">


  $(document).on('click', '.action', function(){       
      let id = $(this).data("id");
      $(".class_id").val(id);
      $("#deleteModel").modal("show");
      $("#deleteModel").unbind("click");
});


  $(document).ready(function(){
      $(".dlt_btn").on("click",function(){
      let action = $(this).attr("ui");
      if(action == "yes"){
          $(this).attr("disabled",true);
          $("#loaderModel").modal("show");
          $("#loaderModel").unbind("click");
          $("#delete_validate_form").submit();
      }else{
          $("#deleteModel").modal("hide");
          return false;
          //$(this).attr("disabled",true);
      }
  });


       $(".close").on("click",function(){
            $("#deleteModel").modal("hide");
        });


  })
</script>



<script type="text/javascript">
  $(function(){
    setTimeout(function(){
      $('.alert-danger').hide();
    },5000);
  });
  $(function(){
    setTimeout(function(){
      $('.alert-success').hide();
    },5000);
  });
</script>
@endsection()
