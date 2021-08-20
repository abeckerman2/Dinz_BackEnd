<!DOCTYPE html>
<html>
   <head>
      <title>cart</title>
      <link rel="icon" href="{{url('public/website/images/favicon.png')}}" sizes="16x16" type="images/png">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/bootstrap.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{url('public/website/css/font-awesome.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.carousel.min.css')}}">
      <!--          <link rel="stylesheet" type="text/css" href="{{url('public/website/css')}}/animate.css">
         -->  
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/responsive.css')}}">
      <style type="text/css">
         input#demoInput {
         border-radius: 7px;
         background-color: rgb(255, 255, 255);
         box-shadow: 0px 0px 24.65px 4.35px rgb(0 1 1 / 10%);
         border: 0;
         width: 34px;
         height: 31px;
         margin: 2px 10px;
         font-size: 18px;
         text-align: center;
         color: #ff0000;
         font-weight: 600;
         }

         a.new_button {
            background-image: linear-gradient(#ff0000, #980505);
            border: 0;
            padding: 4px 5px;
            border-radius: 6px!important;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            line-height: 20px;
            font-weight: 600;
            width: 24px!important;
            height: 25px;
            cursor: pointer;
            line-height: 15px;
            text-align: center;
        }


      </style>
   </head>
   <body>
      <div class="new_div">
         <div class="container">
            <div class="d-flex newdata">
               <div class="name">
                  <a href="{{url('website/menu-list/'.$restaurant_id).'/'.$table_id}}">
                    <img src="{{url('public/website/images/arrow.png')}}" alt="">
                  </a>
               </div>
               <div class="line_element" style="margin: auto;">
                  <p>Cart</p>
               </div>
            </div>


          <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant_id}}">
          <input type="hidden" name="menu_id" id="table_id" value="{{$table_id}}">

 
            <div class="new-file-line" id="main_page_items">
      

              <h2 style="text-align: center;" id="informational_message" >No item available in cart list</h2>

           </div>
         <div>
         </div>
      </div>
      </div>

   </body>
</html>