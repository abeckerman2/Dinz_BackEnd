@extends('admin.layout.layout')
@section('title','User Management')
@section('content')
<style>
#text_message-error{
  color: #ff0000;
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


#deleteModel button.close

 {
    font-size: 24px;
    position: absolute;
    opacity: 1;
    background-color: #000;
    color: #fff;
    border-radius: 50%;
    height: 35px;
    width: 35px;
    top: -18px;
    padding: 0px 5px 0 6px;
    /* padding-right: 0px; */
    right: -12px;
    display: inline-block;

}

#deleteModel input#update_file_name {
    margin: 0;
    padding: 0;
}


#deleteModel .modal-header{
    background-color: #ed2227 !important;
}
#editModel  h4.h4_course.file_upload {
    margin-bottom: 13px;
}


#deleteModel .modal-footer{
    border-top: 0px solid #e9ecef;

}
#deleteModel button.btn.btn-secondary.btn-lg.login_btn{
    width: 37%;
    font-size: 24px;
    padding: 6px 0;
}
div#deleteModel p {
    text-align: center;
    margin-top: 52px;
}
#deleteModel .modal-footer {
    border-top: 0px solid #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-dialog {
    width: 465px;
    margin: 30px auto;
}
.login_btn:hover, .signup:hover, .logout:hover, .header_logout a:hover {
    background-color: #3e3a3bbd !important;
    border: 1px solid #3e3a3bbd !important;
    color: #fff;
}
.login_btn, .signup {
    text-align: center;
    border-radius: 50px;
    font-weight: 600;
    background-color: #3e3a3b !important;
    border-color: #3e3a3b !important;
    color: #fff;
    width: 80%;
    margin: 30px 0 30px;
    -webkit-box-shadow: 0px 8px 10px 0px rgb(0 0 0 / 30%);
    -moz-box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 8px 10px 0px rgb(0 0 0 / 30%);
}
.modal_style .close_btn {
    font-size: 24px;
    position: absolute;
    opacity: 1;
    background-color: #ed2227;
    color: #fff;
    border-radius: 50%;
    height: 35px;
    width: 35px;
    top: -3px;
    padding: 0px 5px 0 6px;
    /* padding-right: 0px; */
    right: -2px;
    display: inline-block;
}
:focus-visible {
    outline: -webkit-focus-ring-color auto 0px !important;
}
button:focus {
    outline: 0px dotted;
    outline: 0px auto -webkit-focus-ring-color;
}
.view{
    width: 76px!important;
    display: inline-block;
    margin-left: 7px;
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
          <h1 class="h3 mb-2 text-gray-800">User Management</h1>
          <ul class="breadcrumb">
  <li><a href="{{route('admin.dashboard')}}">Home</a></li>
  <li>User Management</li>
</ul>
</div>
@include('admin.notifications')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
         
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Username</th>
                      <th>Email Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>


                     
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

    <!-- Delete Model -->

    <div id="deleteModel" class="modal fade" role="dialog">
      <form method="POST" enctype="multipart/form-data" id="delete_validate_form" action="{{route('admin.deleteUser')}}">
        {{@csrf_field()}}
        <input type="hidden" name="class_id" class="class_id">
        <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body">
                      <!-- <div class="user_img">
                          <label for="">Date Of Birth</label>
                      </div> -->
                      <p>Are you sure you want to delete this user?</p>

                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="yes" style="margin-bottom: 20px;  margin-top: 20px;     margin-right: 25px;">Yes</button>
                <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="no" style="margin-bottom: 20px;  margin-top: 20px;">No</button>
               </div>
             </div>
        </div>
      </form>
    </div>


    <!-- Modal -->
<div id="myModal" class="modal fade modal_style" role="dialog">
 <form method="POST" id="sendMailForm" action="{{route('admin.blockUser')}}">
        {{@csrf_field()}}
        <input type="hidden" name="user_block_id" id="user_block_id">
   <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close_btn" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-left">Block Reason</h4>
      </div>
      <div class="modal-body">
        <p>
          <!-- <label for="" style="font-weight: bold;">Description</label> -->
          <textarea class="form-control" name="text_message" placeholder="Block Reason" style="height: 150px; width: 100% !important; resize: none;"></textarea>
        </p>
      </div>
      <div class="modal-footer text-center" style="text-align: center !important; padding-bottom: 12px; display: flex; justify-content: center; ">
        <button class="btn btn-success submit" id="send_btn" style="margin-top: 0; font-weight: 400; font-size: 17px; background-color:#ed2227; border: 0px;">Send</button>
      </div>
    </div>

  </div>
  </form>
</div>

  

  @endsection()
  @section('js')

  <!-- Page level custom scripts -->
<script type="text/javascript">
    $(document).ready(function() {

      
      let urlHit = "{{route('admin.userManagement')}}";

      
      $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        ajax:{
         url:urlHit,
         beforeSend:function(){
          $('#dataTable').parent()
          .find("#dataTable1_processing").attr("ll",true)
         },
         complete:function(){
        
         }
        },
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id', name: 'id'},
            {data: 'user_name', name: 'user_name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

       });
      });
</script>

<script>
$(document).ready(function(){
$(".form-control[type='search']").attr('placeholder',"Search...");
$("#example1_paginate").css({"text-align":"end"});
})

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

<script>
  $(document).on('click', '.action', function(){       
      let id = $(this).data("id");
      $(".class_id").val(id);
      $("#deleteModel").modal("show");
      $("#deleteModel").unbind("click");
});


  $(".close").on("click",function(){
      $("#deleteModel").modal("hide");
  });

  $(".dlt_btn").on("click",function(){
      let action = $(this).attr("ui");
      if(action == "yes"){
          $(this).attr("disabled",true);
          $("#delete_validate_form").submit();
      }else{
          $("#deleteModel").modal("hide");
          return false;
          //$(this).attr("disabled",true);
      }
  });
  
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.red', function(){
          let user_id = $(this).attr("ui");
          $("#user_block_id").val(user_id);

          $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
          });
        }); 
        });
  </script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){

    //space not count in the starting
  jQuery.validator.addMethod("noSpace", function(value, element) {
    return value.length > 0 ? (value.trim().length == 0 ? false : true) : true
  }, "Space not allowed.");
  
    $("#sendMailForm").validate({
      rules:{
        text_message: {
            required:true,
            minlength: 3,
            noSpace: true,
        },
      },
      messages:{
        text_message:{
          required: 'Please enter block reason.',
          minlength: 'Block reason must be at least 3 characters long.'
        }, 
      },
      submitHandler: function(form) { // <- pass 'form' argument in
                $("#send_btn").attr("disabled", true);
                form.submit(); // <- use 'form' argument here.
            }
    })
  })
</script>


  @endsection()
