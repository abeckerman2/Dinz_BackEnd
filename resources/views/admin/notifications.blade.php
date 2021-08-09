<style>
.alert-success { 
  background-color: #008000;
    color: #fff;
}

.alert.alert-danger.alert-dismissible.text-center.alertz {
    font-size: 14px;
    background-color: #ed2227;
    color: #fff;
}
</style>
@if(Session::has('message'))
  <div style="padding:11px;font-weight: 400;margin-top:30px" class="alert alert-success alert-dismissible  alertz">{{ Session::get('message') }}</div>
@endif
@if(Session::has('danger'))
  <div style="padding:11px;font-weight: 400;margin-top:30px" class="alert alert-danger alert-dismissible  alertz">{{ Session::get('danger') }}</div>
@endif



@if(Session::has('notification'))
    <div class="row alertz" id="alert2">
        <div class="alert alert-{{ Session::get('notification')['status'] == 'success' ? 'success' : 'danger'}} alert-dismissible fade in text-center">
            <span>{!! Session::get('notification')['message'] !!}</span>
        </div>
        <div class="clearfix"></div>
    </div>
@endif