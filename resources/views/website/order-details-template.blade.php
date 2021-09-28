<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
         <title>Dinz Template</title>
         <!-- Bootstrap -->
         <link rel="icon" href="images/favicon.png" type="image/x-icon">
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet">
   </head>
   <body>
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#fff;
         border: 10px solid #ccc;
         ">
      <tr>
         <td width="20" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td width="20" align="left" valign="top">&nbsp;</td>
                  <td align="center" valign="top">
                     <a href="#" style="border:0; outline:0;" style="width: 100px">
                      <img src="{{$message->embed($logo)}}" alt="" width="120"/ style="width: 100px">
                    </a>
                  </td>
                  <td width="20" align="left" valign="top">&nbsp;</td>
               </tr>
            </table>
         </td>
      </tr>
      <tr>
      <td width="20" align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #e2e2e2;    padding: 12px 9px;
">
      <tr>
         <td align="left" valign="top" width="200"> <h2 style="font-size: 24px;color: #000;text-decoration:none; margin:0; margin-bottom: 0px;">Invoice #{{$is_order->id}}</h2></td>
              <td align="left" valign="top" style="padding:10px 0; ">
              
             </td>
           </tr>
           <tr style="margin-top: 12px;">
      <td width="20" ><label style="font-weight: bold;    padding-top: 12px;
    display: block;">Restaurant Name:</label></td>
      <td><p style="font-size: 16px;color: #000;text-decoration:none;  margin: 0;     padding-top: 12px;
    ">
    <?php
      $restaurant_name = ucfirst($restaurant_details->restaurant_name);
    ?>
    {{$restaurant_name}}</p></td>
      </tr>
      <tr>
      <!-- <td  width="20" align="left" valign="top">&nbsp;</td> -->
      <td style=""><label style="font-weight: bold;padding-top: 12px;
    display: block;">Address:</label></td>
      <td><p style="font-size: 16px;color: #000;text-decoration:none;  margin: 0; padding-top: 12px;">
        <?php
          $restaurant_address = ucfirst($restaurant_details->restaurant_address);
        ?>
        {{$restaurant_address}}</p></td>
      </tr>
      <tr>
      <td style=""><label style="font-weight: bold;     padding-top: 12px;
    display: block;">Date & Time:</label></td>
      <td><p style="font-size: 16px;color: #000;text-decoration:none;  margin: 0; padding-top: 12px;">
        <?php
          $order_date =  date('m-d-Y h:i:s A', strtotime($payment->payment_date_time));
        ?>
        {{$order_date}}</p></td>
      </tr>
      
      </table>
    </td>
  </tr>
       
    <!-- invoice-ends -->
     <!-- <tr>
         <td width="20" align="right" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                  <td style="    padding-top: 14px;">
                     <label style="font-weight: bold; padding: 0px 15px 8px; margin-top: 12px;">Order Details:</label>
                     <p style="font-size: 16px;color: #000;text-decoration:none;  margin: 0; padding: 6px 15px; ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </td>
               </tr>
            </table>
         </td>
      </tr> -->
        <!-- vehicle featured ends -->
         <tr>
         <td width="20" align="right" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="    padding: 12px 6px 0;" class="table table-striped table-bordered table-responsive dataTable no-footer">
              <thead>
               <tr style="background-color: #ccc;">
                <th width="20" style="border: 1px solid #eeeeee; padding: 10px 0px;">Sr. NO.</th>
                  <th width="20" style="border: 1px solid #eeeeee; padding: 10px 0px;">Item Name</th>
                  <th width="20" style="border: 1px solid #eeeeee; padding: 10px 0px;">Price</th>
                  <th width="20" style="border: 1px solid #eeeeee; padding: 10px 0px;">Quantity</th>
                  <th width="20"  style="border: 1px solid #eeeeee;">Total</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      $i=0;
                    ?>
                  @foreach($menu_order_details as $row)
                  <tr>
                    <td  width="20" style="border: 1px solid #eeeeee; padding: 10px 5px;">{{++$i}}</td>
                    <td  width="20" style="border: 1px solid #eeeeee; padding: 10px 5px;">{{$row->menu->item_name}}</td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;">${{$row->menu->price}}</td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;">{{$row->quantity}}</td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;">${{$row->amount}}</td>
                  </tr>
                  @endforeach


                    <tr style="background-color: #ccc;">
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"><strong>Tax (10%)</strong></td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;"><strong>${{$payment->tax_amount}}</strong></td>

                  </tr>
                   <tr  style="background-color: #ccc;">
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"  ></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"  ></td>
                     <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"><strong>Tip</strong></td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;"><strong>${{$payment->tip_amount}}</strong></td>

                  </tr>
                   <tr  style="background-color: #ccc;">
                    <td  width="20" align="right"  style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right"  style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                     <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"></td>
                    <td  width="20" align="right" style="border: 1px solid #eeeeee; padding: 10px 6px;"><strong>Total</strong></td>
                    <td  width="20" style="border: 1px solid #eeeeee; text-align: center;"><strong>${{$payment->total_amount}}</strong></td>

                  </tr>
                    </tbody>

                  </table>
               </td>
               </tr>
               <tr>
                  <td align="left" valign="top">&nbsp;</td>
               </tr>
               <tr>
                  <td width="100" align="center" valign="top" style="font-weight: bold;">Powered By @Dinz</td>
               </tr>
      <!-- ends -->
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>

   
      </table>

   </body>
</html>