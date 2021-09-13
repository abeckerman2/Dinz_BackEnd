 @extends('restaurant.layout.layout')
@section('title','Menu Management')
@section('content')
<style type="text/css">

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
div#basic-datatables_wrapper .col-sm-12 {
    overflow: auto;
}


img#blah {
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    cursor: pointer;
}
/*img#blah {
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    cursor: pointer;
}*/
.user_img {
    margin-bottom: 22px;
}
.add_btn.create_btn {
    background-color: #000;
    position: unset;
    padding: 25px 17px;
}
input#submit {
    margin-left: 23px;
    width: 100px;
}


.qr_image img{
    width: 150px;
    height: 150px;
    border: 1px solid #fff;
    object-fit: contain;
    margin-left: 60px;
}



    #deleteModel h4.modal-title {
        text-align: center;
        margin: auto;
        color: #fff;
    }
    #deleteModel  .modal-header .close{
        padding: 0;
        margin: 0;
    }
    #deleteModel  button.close {
        position: absolute;
        right: -15px;
        top: -16px;
        width: 31px;
        height: 30px;
        text-shadow: 0 1px 0 #ed1f24;
        background: #ed1f24;
        opacity: .5;
        border-radius: 100%;
        opacity: 1;
            border: 2px solid #fff;

    }

    #deleteModel .modal-header {
        background-color: #ed1f24 !important;
        border: 1px solid #ed1f24 !important;
        background: linear-gradient( 
    167deg
     , rgb(237 31 36) 0%, rgb(90 0 3) 100%) !important;
    }

    #deleteModel .modal-footer {
        border-top: 0px solid #e9ecef;
        justify-content: center;
    }
    #deleteModel button.btn.btn-secondary.btn-lg.login_btn {
        width: 37%;
        font-size: 24px;
        padding: 6px 0;
    }

    #deleteModel .modal-dialog {
        margin-top: 200px;
    }


    p#delete_alert_txt {
        text-align: center;
        font-weight: 500;
        margin-bottom: -2px;
        margin-top: 30px;
        font-size: 16px;
    }

    #deleteModel .modal-content {
        width: 110%;
    }
.line_management{
        display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 0 26px 0;
  }
.line_management h1{  
    margin-top: 0;
    margin-bottom: 0;
}


.dashboard_panel .card .card-body .serch_icon i {
    position: absolute;
    color: #000;
    right: 181px;
    z-index: 99;
    top: 39px;
    font-size: 14px;
}


</style>


</style>
		<div class="main-panel dashboard_panel">
			<div class="content">
				<div class="page-inner" style="padding-right: 12px;">
					<div class="navbar_bar">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">
									<a href="{{route('restaurant.dashboard')}}"><i class="fas fa-home"></i></a></li>
							

								<li class="breadcrumb-item remove_hover">Menu Management</li>


							</ol>
						</nav>
					</div>

          <div style="display: flex;" class="line_management">
            <h1>Menu Management</h1>

                  <a href="{{url('restaurant/menu-images')}}">
                    <button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;">Menu Images</button>
                  </a>
          </div>


              <form method="POST" id="form-validate" enctype="multipart/form-data">
              {{csrf_field()}}

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



              <div class="add_btn create_btn">



                  <a href="{{route('restaurant.addParentMenuName')}}">
                  <button type="button" class="btn btn-warning same_wd_btn" style="width: 146px;    margin-bottom: 25px;">Add Menu</button>
                </a>
                

              

                <div class="card">
                  <div class="card-body">

                    <div class="serch_icon">
                      <i class="fas fa-search"></i>
                    </div>

                    <div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                            <th>Sr. No.</th> 
                            <th>Menu Name</th>
                            <th>No. of items</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php
                            $i=0;
                          ?>

                          @foreach($data as $rows)

                          <?php
                          ?>
                            <td>{{++$i}}</td>
                            <td>{{$rows->menu_name}}</td>

                            <?php
                              $no_of_items = count($rows->menu);
                            ?>
                            <td>{{$no_of_items}}</td>
                            <td>
                              <a href="{{url('restaurant/menu-management').'/'.$rows->id}}">
                                <button type="button" class="btn btn-warning same_wd_btn mr-2">View</button>
                              </a>

                              <a href="{{url('restaurant/edit-parent-menu-name').'/'.$rows->id}}">
                                <button type="button" class="btn btn-warning same_wd_btn mr-2">Edit</button>
                              </a>


                              <a href="{{url('restaurant/add-item-from-management-page').'/'.$rows->id}}">
                                <button type="button" class="btn btn-warning same_wd_btn mr-2" style="width: 146px;">Add Item</button>
                              </a>
                               
                              <button type="button" class="btn btn-warning same_wd_btn border_btn delete_btn" data-id="{{$rows->id}}">Delete</button>
                            </td>
                          </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>



            </form>

				</div>  
			</div>
		</div>



<div id="deleteModel" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="POST" action="{{route('restaurant.deleteParentMenu')}}" id="deleteFORM">
      {{csrf_field()}}
    <input type="hidden" name="delete_parent_menu_id" id="delete_parent_menu_id">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="right: -11px; top: -15px">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
            
            <p id="delete_alert_txt">Are you sure, you want to delete this Menu?</p>    

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning same_wd_btn border_btn yes" style="background-color: #ed1f24!important; font-weight: 600 ; border: 0px">Yes</button>
        <button type="button" class="btn btn-warning same_wd_btn border_btn no" style="background-color: #ed1f24!important; font-weight: 600 ; border: 0px">No</button>
      </div>
      </form>
    </div>

  </div>



</div>


@endsection()
@section('js')



  <script >
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

      $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });
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

<script type="text/javascript">
  $(document).ready(function(){
    $(".delete_btn").on("click",function(){
      let item_id = $(this).data("id");
      $("#delete_parent_menu_id").val(item_id);
      $("#deleteModel").modal("show");
      $("#deleteModel").unbind("click");
    });
    $(".yes").on("click",function(){
      $("#deleteFORM").submit();
    });

    $(".no").on("click",function(){
      $("#deleteModel").modal("hide");
    });

    $(".close").on("click",function(){
      $("#deleteModel").modal("hide");
    });


  })
</script>


@endsection()