<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Restaurant Block</title>
<link rel="icon" href="{{url('public/other_css/img/app_icon.png')}}" type="image/x-icon">
</head>

<body>
  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#efefef; margin-top:10px;">
  <tr>
    <td width="20" align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr style="background-color: #ed2227;">
        <td width="20" align="left" valign="top">&nbsp;</td>
        <td align="center" valign="top" style="padding:20px 0;">
        	<a style="border:0; outline:0; width: 30%;"><img src="{{$message->embed($logo)}}" style="background-color: #fff; border-radius: 2px; width: 130px;" alt="" style="width:115px;"/></a>
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
          <!-- <tr>
            <td align="center" valign="top" style="font-family:arial, sans-serif; font-size:25px; color:#474747; font-weight: 600;">Restaurant Block</b></td>
          </tr> -->
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
		  	  <tr>
            <td style="">
              <h2 style="font-family:Arial, sans-serif, 'Helvetica Neue', Helvetica; font-size:20px;background:#efefef; color:#393939; font-weight:normal; margin:0; padding-left: 0;">
               <?php
               if(!$restaurant_block->restaurant_name){
                 echo "Hello Restaurant,";
               }else{
                echo "Hello"." ". ucfirst($restaurant_block->owner_name);
               }
               ?>

              </h2>
            </td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top" style="font-family:arial, sans-serif; font-size:15px; color:#474747;">Your restaurant has been blocked by Admin.<br></br>
            </td>
          </tr>
          <tr>
            <td height="10" align="left" valign="top"></td>
          </tr>


          <tr>
          <td align="left" valign="top"><strong style="font-size: 14px; color: #f68b1f;">Reason:</strong></td>
          </tr>

		 <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
		   <tr>
           <td align="left" valign="top" style="font-family:arial, sans-serif; font-size:13px; color:#474747;">{{$text_message}}<br> 
          </tr>
          <!--  -->
        </table></td>
      </tr>
      <tr>
        <td height="40" align="left" valign="top">&nbsp;</td>
      </tr>

    </table>
  </td>
  </tr>


  <tr>
    <td align="left" valign="top" style="background:#413e3e; padding:20px; text-align:center;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
        	<a href="http://facebook.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-facebook.png" alt=""/></a> &nbsp;
            <a href="http://twitter.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-twitter.png" alt=""/></a> &nbsp;
            <a href="http://instagram.com" target="_blank" style="border:0; outline:0; text-decoration:none;"><img src="assets/icon-instagram.png" alt=""/></a>
        </td>
      </tr>
      <tr>
        <td align="center" valign="top" style="font-family:arial, sans-serif; font-size:13px; color:#727272; padding-top:0px;padding-bottom: 10px;">??  Dinz {{date('Y')}}</td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>