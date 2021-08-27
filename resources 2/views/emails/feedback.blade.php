  <!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  <link rel="icon" href="{{url('public/other_css/img/app_icon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{url('public/other_css/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('public/other_css/css/custom.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<style type="text/css">
  img#logo_img {
    background-color: #fff;
    border-radius: 2px;
    /* box-shadow: 3px 3px 5px #690404; */
    width: 130px;
}
</style>

<body>
  <div class="col-xs-12">
    <div class="table-responsive">
  <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#efefef; margin: 110px auto;" id="new-table">
  <tr style="background-color: #ed2227;">
    <td width="20" align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="20" align="left" valign="top">&nbsp;</td>
        <td align="center" valign="top" style="padding:20px 0;">
              <a href="javascript:void(0);" style="border:0; outline:0;"><img id="logo_img" src="{{url('public/other_css/img/app_icon.png')}}" alt="" width="100"/></a>
        </td>
        <td width="20" align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td height="1" align="left" valign="top" bgcolor="#d9d9d9"></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background:#efefef; padding:30px 20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            @php
              $color = $type == 'success' ? '#60be80' : '#cc3b28';
            @endphp
            <td align="center" valign="top" style="font-family:arial, sans-serif; font-size:15px; color:{{$color}};">
              <h3 style="font-size: 22px;">{{$message}}</h3>
              @if(isset($link))
                <a href="{{$link}}" style="color: #2279a2; font-size: 18px;">Click here to login</a>
              @endif()
            </td>
          </tr>
          <tr>
            <td height="10" align="left" valign="top"></td>
          </tr>
                 

          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>

        </table></td>
      </tr>
      <tr>
        <td height="40" align="left" valign="top">&nbsp;</td>
      </tr>
    
    </table>
  </td>
  </tr>


  <tr>
    <td align="left" valign="top" style="background-color: #ed2227; padding:20px; text-align:center;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <!-- <td align="center" valign="top">
          <a href="http://facebook.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-facebook.png" alt=""/></a> &nbsp;
            <a href="http://twitter.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-twitter.png" alt=""/></a> &nbsp;
            <a href="http://instagram.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-instagram.png" alt=""/></a>
        </td> -->
      </tr>
      <tr>
        <td align="center" valign="top" style="font-family:arial, sans-serif; font-size:13px; color:#fff; padding-top:2px;">© DINZ {{date('Y')}}</td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</div>

</body>
</html>
