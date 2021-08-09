@extends('admin.layout.layout')
@section('title','User Management')
@section('content')
<style>
  .error{
    color: #ff0101;
  }
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


#deleteModel .modal-header img.close

 {
    /*font-size: 24px;*/
    position: absolute;
    opacity: 1;
    /*background-color: #ed1f24;*/
    /*color: #fff;*/
    /*border-radius: 50%;*/
        height: 30px;
    width: 30px;
    top: -13px;
    /*padding: 0px 5px 0 6px;*/
    /* padding-right: 0px; */
    right: -12px;
    /*display: inline-block;*/
    /*border: 2px solid #fff;*/
    /*text-shadow: 0 1px 0 #ed1f24;*/

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
		    background: linear-gradient( 
		167deg
		 , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
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
.modal-dialog {
    width: 465px;
    margin: 174px auto 0;
}
/*.login_btn:hover, .signup:hover, .logout:hover, .header_logout a:hover {
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
}*/
.modal_style .modal-header img.close {
    /*font-size: 24px;*/
    position: absolute;
    opacity: 1;
    /*background-color: #ed1f24;*/
    /*color: #000;*/
    /*border-radius: 50%;*/
    height: 30px;
    width: 30px;
    top: -13px;
    /*padding: 0px 5px 0 6px;*/
    /* padding-right: 0px; */
    right: -11px;
    margin: 0 !important;
    padding: 0 !important;
    /*display: inline-block;*/
    /*border: 2px solid #fff;*/
    /*text-shadow: 0 1px 0 #ed1f24;*/
}
img.close:hover {
  opacity: 1
}
.modal-header {
        background-color: #ed1f24 !important;
		    border: 1px solid #ed1f24 !important;
        color:#fff;
		    background: linear-gradient( 
		167deg
		 , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
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






table.table-bordered.dataTable td:nth-child(2) {
    min-width: 210px!important;
    word-break: break-all;
    white-space: break-spaces;
}
table.table-bordered.dataTable td:nth-child(3) {
    min-width: 210px!important;
    word-break: break-all;
    white-space: break-spaces;
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
                      <th>Sr. No.</th>
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
              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
              <img src="{{url('public/admin/img/crosss.png')}}" class="close" style="cursor: pointer;" />
              <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body pb-0">
                   
                  <p>Are you sure, you want to delete this user?</p>

            </div>
            <div class="modal-footer" style="margin-bottom: 25px;">
            <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="yes" style="margin-right: 25px;">Yes</button>
            <button class="btn btn-secondary btn-lg login_btn dlt_btn" ui="no">No</button>
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
        <!-- <button type="button" class="close close_btn" data-dismiss="modal">&times;</button> -->
        <img src="{{url('public/admin/img/crosss.png')}}" class="close" style="cursor: pointer;" />
        <h4 class="modal-title text-left">Block Reason</h4>
      </div>
      <div class="modal-body" style="padding-top: 34px;">
        <p>
          <!-- <label for="" style="font-weight: bold;">Description</label> -->
          <textarea class="form-control" name="text_message" maxlength="200" id="block_reason" placeholder="Block Reason" style="height: 150px; width: 100% !important; resize: none;"></textarea>
        </p>
      </div>
      <div class="modal-footer text-center" style="text-align: center !important; padding-bottom: 12px; display: flex; justify-content: center; border: 0; padding-top: 0">
        <button class="btn btn-success submit" id="send_btn" style="margin-top: 0; font-weight: 400; font-size: 17px; background-color:#ed2227; border: 0px;margin-bottom: 15px; ">Send</button>
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
      $('#block_reason').val('');
      $("#deleteModel").modal("hide");
      $("#myModal").modal("hide");

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


<!-- trim space -->
<script type="text/javascript">
    $(document).ready(function(){
      $(".form-control").on("keyup",function(){
        var length = $.trim($(this).val()).length;
        if(length == 0){
           $(this).val("");
        }
      })
    });
</script>
<!-- Block space at beninning of field -->
<script type="text/javascript">
  $(document).ready(function(){
    $('input').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
    // $('textarea').keypress(function( e ) {    
    //   if($(this).val() == ''){
    //       if(!/[0-9a-zA-Z-]/.test(String.fromCharCode(e.which)))
    //         return false;
    //   }
    // })
    $('textarea').keypress(function( e ) {    
      if($(this).val() == ''){
          if(!/[0-9a-zA-Z-~!@#$%^&*()_+{}:"<>,.;'/"]/.test(String.fromCharCode(e.which)))
            return false;
      }
    })
  });

</script>


  @endsection()
