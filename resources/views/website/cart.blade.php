<!DOCTYPE html>
<html>
   <head>
      <title>Cart List</title>
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
       img.lines {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin: 5px;
        }

        .custom_tip_class{
              height: 27px;
              width: 75px;
              border-top: 0px solid transparent;
              border-left: 0px solid transparent;
              border-right: 0px solid transparent;
              border-bottom: 1px solid #000;
              margin-right: 10px;
              line-height: 66px;
              position: relative;
              text-align: center;
              top: 3px;
              line-height: 189px;
              padding-bottom: 0!important;
              padding: 1px;
              margin-top: 6px;
                  text-align: left;

        }
        :focus-visible {
            outline: -webkit-focus-ring-color auto 0px;
        }
        .alert-danger {
            color: #ffffff;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            text-align: center;
            background-color: #c30000;
        }

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
            color: #fff!important;
            text-transform: uppercase;
            line-height: 20px;
            font-weight: 600;
            width: 24px!important;
            height: 25px;
            cursor: pointer;
            line-height: 18px;
            text-align: center;
        } 

        .pay_button{
          width: 103px;
          height: 40px;
          margin-top: 20px;
          font-size: 18px;
          font-weight: 300;
          text-transform: capitalize;
          background-image: linear-gradient(#ff0000, #980505);
          border: 0;
          padding: 4px 5px;
          border-radius: 100px;
          color: #fff;
          line-height: 20px;
              margin-bottom: 25px;

        } 


        .tip_percentage{
              margin-right: 2px;
              background-color: transparent;
              border-radius: 100%;
              width: 43px;
              font-size: 16px;
              height: 42px;
              line-height: 39px;
              text-align: center;
              font-weight: 700;
              border: 2px solid #000;
              color: #000;
              cursor: pointer;
        }

        .color{
               background-color: #1f8b1f; 
        }


            .info_message {
                  font-size: 17px;
                  color: #ff0000;
                  font-weight: 600;
              }


      </style>
   </head>
   <body>
      <div class="new_div">
         <div class="container">


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


            @if($cart_list['menu_data'])
            <div class="new-file-line" id="main_page_items">
            <form method="POST" id="order" >
            {{csrf_field()}}

              <?php 
                $total_item_price_with_decimal = 0;
              ?>
              @foreach($cart_menu_details as $row)
               <div class="veg menus" menu_id="{{$row->id}}" style="margin-top: 0px;margin-bottom:12px" >
                  <div class="d-flex lines">
                     <div class="d-flex vegetable">
                        <h3 style="word-break: break-all;">{{$row->item_name}}</h3>
                        <span class="nine"></span>
                     </div>
                     <h4 class="semi-blold">${{$row->price}}</h4>
                     <!-- <h5 class="line-event">instruction <img src="{{url('public/website/images/drop-bottom.png')}}" alt=""></h5> -->


                      <?php
                      $category_id = $row->category_id;
                      if($category_id == 1){
                        $category_name = "Breakfast";
                      }
                      elseif($category_id == 2){
                        $category_name = "Lunch";
                      }
                      elseif($category_id == 3){
                        $category_name = "Snacks";
                      }
                      elseif($category_id == 4){
                        $category_name = "Dinner";
                      }
                      else{
                        $category_name = "Beverages";
                      }
                     ?>
                     <h3>{{$category_name}}</h3>


                   
                     <p style="word-break: break-all;">{{$row->description}}.</p>
                  </div>
                  <div class="line_item inc-dec">
                     <img src="{{$row->image}}" alt="" class="lines">
                     <div class="d-flex button_line">
                        <a class="small-b decrement new_button" item-price="{{$row->price}}" menu_id= "{{$row->id}}">-</a>
                          <input type=text min="1" max=20 class="no_of_item" item-count= "{{$row->quantity}}" value="{{$row->quantity}}" disabled  style="opacity: 1!important;">
                        <a  class="small-b increment new_button" item-price="{{$row->price}}" menu_id= "{{$row->id}}">+</a>
                     </div>
                     <!-- <button type="submit" class="add" style="display: none;">Add</button> -->
                  </div>
               </div>

               <?php
                  $total_item_price_with_decimal = $row->price_acc_to_quantity + $total_item_price_with_decimal;
               ?>
               @endforeach

               <?php
                  $total_item_price = number_format((float)$total_item_price_with_decimal, 2, '.', '');

                  $tax_10_percent_with_decimal = $total_item_price * 10 / 100;
                  $tax_10_percent = number_format((float)$tax_10_percent_with_decimal, 2, '.', '');
                  
                  $final_amount_without_tip_with_Decimal = $total_item_price + $tax_10_percent;
                  $final_amount_without_tip = number_format((float)$final_amount_without_tip_with_Decimal, 2, '.', '');


                  // dd($final_amount_without_tip); die();
               ?>

               <input type="hidden" name="total_item_price" id="total_item_price" value="{{$total_item_price}}">
               <input type="hidden" name="tax_10_percent" id="tax_10_percent" value="{{$tax_10_percent}}">
               <input type="hidden" name="tip" id="tip" value='0'>
               <input type="hidden" name="final_amount_without_tip" id="final_amount_without_tip" value="{{$final_amount_without_tip}}">





               <div class="text-area">
                  <textarea placeholder="Any special request" name="order_text_customization" maxlength="200"></textarea>
                  <div class="words_new">
                     <!-- <span class="words">50 words</span> -->
                     <br>
                  </div>
               </div>
               <div class="d-flex trip">
                  <div class="trip">
                     <h3>Add Tip</h3>
                  </div>
                  <div class="" id="check_is_tip" style="display: flex;">
                     <!-- <div class="d-flex button_line">
                        <a class="small-b new_button" id="tip-dec">-</a>
                        <input id='demoInput' type=text min=1 max=10 tip_amount=0 value="0" disabled  style="opacity: 1!important;">
                        <a  class="small-b new_button" id="tip-inc">+</a>
                     </div> -->
                     <input type="text" name="" id="customize_tip_amount" class="custom_tip_class" placeholder="Enter Tip" onpaste="return false">


                     <p class="tip_percentage static-tip" id="tip_15" tip="15" is_selected ="false" title="Tip">15%</p> 
                     <p class="tip_percentage static-tip" id="tip_20" tip="20" is_selected ="false" title="Tip">20%</p> 
                     <p class="tip_percentage static-tip" id="tip_25" tip="25" is_selected ="false" title="Tip">25%</p>


                  </div>
               </div>
               <h3 class="bill">Bill Details </h3>
               <div class="first_idiot wrapper">
                  <div class="line_view box">
                     <p>Item Total</p>
                     <h3 id="change-total-amount">${{$total_item_price}}</h3>
                  </div>
                  <div class="line_view box">
                     <p>Tax (10%)</p>
                     <h3 id="change-tax">${{$tax_10_percent}}</h3>
                  </div>
                  <div class="line_view box">
                     <p>Tip</p>
                     <h3 id="change-tip">$0</h3>
                  </div>
                  <div class="line_view box last">
                     <p>Total</p>
                     <h3 id="change-final-amount">${{$final_amount_without_tip}}</h3>
                  </div>
                  <p style="color: red ; text-align: right;    font-weight: 600;display: none" id="amount-error">Total amount should be less than $100,000</p>
               </div>
               <div class="text-center">
                <!-- <a href="{{url('website/book-order')}}"> -->
                  <!-- <button type="submit" class="button_large">Pay</button> -->
                <!-- </a> -->
                <input type="submit" name="submit" id="submit" value="Pay" class="pay_button">
               </div>
               </form>
            </div>
            @else
            <h2 style="text-align: center;color: red;" class="info_message">No item available in cart list.</h2>
            @endif

            <h2 style=" text-align: center; display: none;color: red;" id="informational_message" class="info_message" >No item available in cart list.</h2>

         </div>
         <div>
         </div>
      </div>
      </div>
      <script src="{{url('public/website/js/jquery.js')}}"></script>
      <script type="text/javascript" src="{{url('public/website/js/bootstrap.js')}}"></script>
      <!-- <script src="{{url('public/website/js')}}/popper.min.js"></script> -->
      <script type="text/javascript" src="{{url('public/website/js/owl.carousel.js')}}"></script>
      <script type="text/javascript" src="{{url('public/website/js/custom.js')}}"></script>
      <script src="{{url('public/website/js/wow.min.js')}}"></script>
      <script type="text/javascript">
         $(".button_live").click(function(){
         $(".openChat").toggleClass("block");
         });
      </script>
 
      <script type="text/javascript">
         var wow = new WOW(
           {
             boxClass:     'wow',      // animated element css class (default is wow)
             animateClass: 'animated', // animation css class (default is animated)
             offset:       0,          // distance to the element when triggering the animation (default is 0)
             mobile:       true,       // trigger animations on mobile devices (default is true)
             live:         true,       // act on asynchronously loaded content (default is true)
             callback:     function(box) {
               // the callback is fired every time an animation is started
               // the argument that is passed in is the DOM node being animated
             },
             scrollContainer: null // optional scroll container selector, otherwise use window
           }
         );
         wow.init();
      </script>
      <script type="text/javascript">
         $(window).scroll(function() {
         if ($(this).scrollTop() > 1){  
         $('header').addClass("sticky");
         }
         else{
         $('header').removeClass("sticky");
         }
         });
      </script>



<script type="text/javascript">
  $(document).ready(function(){
    $('.increment').on('click' , function(){
      let previous_no_of_item = $(this).parent().find('.no_of_item').attr('item-count');
      let new_value  = parseInt(previous_no_of_item) + 1 ;
      $(this).parent().find('.no_of_item').attr('item-count' , new_value);
      $(this).parent().find('.no_of_item').val(new_value);


      /*Change item amount , tax , final amount on add item in bill*/
      let price_to_selected_dish = $(this).attr('item-price');
      
      let total_item_price = $('#total_item_price').val();
      let tax = $('#tax_10_percent').val();
      let final_total_item_price = $('#final_amount_without_tip').val();

      let total_item_price_after_select_dish = parseFloat(total_item_price) + parseFloat(price_to_selected_dish);

      // console.log(total_item_price_after_select_dish);

      $('#total_item_price').val(total_item_price_after_select_dish.toFixed(2));
      $('#change-total-amount').text('$'+total_item_price_after_select_dish.toFixed(2));

      let tax_10_percent = total_item_price_after_select_dish*10/100;
      $('#tax_10_percent').val(tax_10_percent.toFixed(2));
      $('#change-tax').text("$"+tax_10_percent.toFixed(2));


      /*Final amount based on tip or not*/
      var customize_tip_amount = $('#customize_tip_amount').val();

      var check_is_tip = $('.color').length;
      if(check_is_tip > 0){

        let how_much_tip = $('#check_is_tip').find('.color').attr('tip');

        let tip_amout = total_item_price_after_select_dish * how_much_tip / 100;
        $('#tip').val(tip_amout.toFixed(2));
        $('#change-tip').text('$'+tip_amout.toFixed(2));

        let final_total_item_price_after_select_dish = total_item_price_after_select_dish + tax_10_percent  + tip_amout;
        $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
        $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2));

      }
      else if(customize_tip_amount > 0){
        $('#tip').val(customize_tip_amount);
        $('#change-tip').text('$'+customize_tip_amount);

        let final_total_item_price_after_select_dish = parseFloat(total_item_price_after_select_dish) + parseFloat(tax_10_percent)  + parseFloat(customize_tip_amount);
        $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
        $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2));
      }
      else{
        let final_total_item_price_after_select_dish = total_item_price_after_select_dish + tax_10_percent;
        $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
        $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2)); 
      }
      /*End*/


      var restaurant_id = $('#restaurant_id').val();
      var table_id = $('#table_id').val(); 
      let menu = [];

      $(".menus").each(function(){
        let menu_id = $(this).attr('menu_id');
        let item_count = $(this).children().find(".no_of_item").attr("item-count");
        if(item_count != 0 && item_count != "" && item_count != undefined){
          let object = {
          }
          object.menu_id = menu_id;
          object.quantity = item_count;
          menu.push(object);
        }
      });

      
      var data = {
        '_token' : "{{csrf_token()}}",
        'restaurant_id' : restaurant_id,
        'table_id' : table_id,
        'menu_data' : menu, 
      };

      $.ajax({

        url : "{{url('website/add-cart')}}",
        type: "POST",
        data: data,
          success:function(res){
            console.log(res)
          }
      })

    })
  })



  // $(document).ready(function(){
    $('.decrement').on('click' , function(){

      $('#amount-error').css('display' , 'none');

      let previous_no_of_item = $(this).parent().find('.no_of_item').attr('item-count');
      let new_value  = parseInt(previous_no_of_item) - 1 ;

      if(new_value >= 0){

        $(this).parent().find('.no_of_item').attr('item-count' , new_value);
        $(this).parent().find('.no_of_item').val(new_value);

        /*Change item amount , tax , final amount on remove item in bill*/
        let price_to_selected_dish = $(this).attr('item-price');
        
        let total_item_price = $('#total_item_price').val();
        let tax = $('#tax_10_percent').val();
        let final_total_item_price = $('#final_amount_without_tip').val();

        let total_item_price_after_select_dish = parseFloat(total_item_price) - parseFloat(price_to_selected_dish);
        $('#total_item_price').val(total_item_price_after_select_dish.toFixed(2));
        $('#change-total-amount').text('$'+total_item_price_after_select_dish.toFixed(2));

        let tax_10_percent = total_item_price_after_select_dish*10/100;
        $('#change-tax').text("$"+tax_10_percent.toFixed(2));
        $('#tax_10_percent').val(tax_10_percent.toFixed(2));



        /*Final amount based on tip or not*/
        var customize_tip_amount = $('#customize_tip_amount').val();

        var check_is_tip = $('.color').length;
        if(check_is_tip > 0){

          let how_much_tip = $('#check_is_tip').find('.color').attr('tip');

          let tip_amout = total_item_price_after_select_dish * how_much_tip / 100;
          $('#tip').val(tip_amout.toFixed(2));
          $('#change-tip').text('$'+tip_amout.toFixed(2));

          let final_total_item_price_after_select_dish = total_item_price_after_select_dish + tax_10_percent  + tip_amout;
          $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
          $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2));

        }
        else if(customize_tip_amount > 0){
          $('#tip').val(customize_tip_amount);
          $('#change-tip').text('$'+customize_tip_amount);

          let final_total_item_price_after_select_dish = parseFloat(total_item_price_after_select_dish) + parseFloat(tax_10_percent)  + parseFloat(customize_tip_amount);
          $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
          $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2));
        }
        else{
          let final_total_item_price_after_select_dish = total_item_price_after_select_dish + tax_10_percent;
          $('#final_amount_without_tip').val(final_total_item_price_after_select_dish.toFixed(2));
          $('#change-final-amount').text('$'+final_total_item_price_after_select_dish.toFixed(2)); 
        }

        // let final_total_item_price_after_select_dish = parseInt(total_item_price_after_select_dish) + parseInt(tax_10_percent);
        // $('#final_amount_without_tip').val(final_total_item_price_after_select_dish);
        // $('#change-final-amount').text('$'+final_total_item_price_after_select_dish);
        /*End*/





        var restaurant_id = $('#restaurant_id').val();
        var table_id = $('#table_id').val();  

        let menu = [];

        $(".menus").each(function(){
          let menu_id = $(this).attr('menu_id');
          let item_count = $(this).children().find(".no_of_item").attr("item-count");
          if(item_count != 0 && item_count != "" && item_count != undefined){
            let object = {
            }
            object.menu_id = menu_id;
            object.quantity = item_count;
            menu.push(object);
          }
          else{
            menu.push(null);
          }
        });

        
        var data = {
          '_token' : "{{csrf_token()}}",
          'restaurant_id' : restaurant_id,
          'table_id' : table_id,
          'menu_data' : menu, 
        };
        // console.log(data)

        $.ajax({

          url : "{{url('website/add-cart')}}",
          type: "POST",
          data: data,
            success:function(res){
              console.log(res)


              // if(res['menu_data'] == ""){
              //   alert()
              // }
            }
        })

        if(total_item_price_after_select_dish == 0){

          $('#main_page_items').css('display' , 'none')
          $('#informational_message').css('display' , 'block');
        }

      }

      if(new_value == 0){
        $(this).next(".no_of_item").attr("item-count" , '');
        $(this).next(".no_of_item").val('');
        $(this).parent('.button_line').parent('.inc-dec').parent('.menus').css('display' , 'none');

      } 
      
    })
  // })


</script>



















<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#tip-inc').on('click' , function(){
      let already_tip = $(this).parent().find('#demoInput').attr('tip_amount');
      let add_tip_amount = 10;
      let new_tip_amount = parseInt(already_tip) + parseInt(add_tip_amount);

      $('#change-tip').text("$"+new_tip_amount);
      $('#tip').val(new_tip_amount);

      let final_amount = $('#final_amount_without_tip').val();
      let final_amount_after_add_tip = parseInt(final_amount) + parseInt(add_tip_amount)
      $('#change-final-amount').text("$"+final_amount_after_add_tip);
      $('#final_amount_without_tip').val(final_amount_after_add_tip );

      $(this).parent().find('#demoInput').attr('tip_amount' , new_tip_amount);
      $(this).parent().find('#demoInput').val(new_tip_amount);
    })



    $('#tip-dec').on('click' , function(){
      let already_tip = $(this).parent().find('#demoInput').attr('tip_amount');
      if(already_tip == 0){
        return false;
      }else{
        let sub_tip_amount = 10;
        let new_tip_amount = parseInt(already_tip) - parseInt(sub_tip_amount);


        $('#change-tip').text("$"+new_tip_amount);
        $('#tip').val(new_tip_amount);

        let final_amount = $('#final_amount_without_tip').val();
        let final_amount_after_sub_tip = parseInt(final_amount) - parseInt(sub_tip_amount)
        $('#change-final-amount').text("$"+final_amount_after_sub_tip);
        $('#final_amount_without_tip').val(final_amount_after_sub_tip );


        $(this).parent().find('#demoInput').attr('tip_amount' , new_tip_amount);
        $(this).parent().find('#demoInput').val(new_tip_amount);
      }
    })

  })
</script> -->




<script type="text/javascript">
  $(document).ready(function(){
    $('#customize_tip_amount').keypress(function (event) {
          return isNumber(event, this)
          
    });

    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    // function isNumber(evt, element) {
    //     var charCode = (evt.which) ? evt.which : event.keyCode
    //     if($(element).val().indexOf('.') != -1){
    //       $("#customize_tip_amount").attr("maxlength","5");  
    //     }else{
    //       $("#customize_tip_amount").attr("maxlength","4");
    //     }
    //     if((charCode != 46 || $(element).val().indexOf('.') != -1) &&  (charCode < 48 || charCode > 57)){
    //       return false;
    //   }else{
    //       return true;
    //   }

    // }
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if($(element).val().indexOf('.') != -1){
          $("#customize_tip_amount").attr("maxlength","5");

          var number = ($(element).val().split('.'));
          var filtered = number.filter(function (el) {
            return el != "";
          });
          if(filtered[1] && filtered[1].length > 1){
            return false;
          }
        }else{
          $("#customize_tip_amount").attr("maxlength","4");
        }
        if (            
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57)){

            return false;
      }else{

              return true;
      }

    }
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){

    $('.static-tip').on('click' , function(){

      let item_price_without_tax = $('#total_item_price').val();
      let tax_10_percent = $('#tax_10_percent').val();

      var check_selected  = $(this).attr('is_selected');

      var tax_percentage = $(this).attr('tip')

      if(check_selected == "false"){
        let tip_amount = parseFloat(item_price_without_tax) * parseFloat(tax_percentage) /100; 
        let final_amount_after_add_tip = parseFloat(item_price_without_tax) + parseFloat(tax_10_percent) + parseFloat(tip_amount);        

        $('#change-tip').text("$" + tip_amount.toFixed(2));
        $('#change-final-amount').text('$' + final_amount_after_add_tip.toFixed(2));

        $('#tip').val(tip_amount.toFixed(2));
        $('#final_amount_without_tip').val(final_amount_after_add_tip.toFixed(2));


        $('.static-tip').removeClass('color')
        $('.static-tip').attr('is_selected' , 'false')
        $(this).addClass('color');
        $(this).attr('is_selected' , 'true');

      }else{


        $('#amount-error').css('display' , 'none');

        let final_amount_after_sub_tip = parseFloat(item_price_without_tax) + parseFloat(tax_10_percent);      
        $('#change-tip').text("$" + 0);
        $('#change-final-amount').text('$' + final_amount_after_sub_tip.toFixed(2));

        $('#tip').val(0);
        $('#final_amount_without_tip').val(final_amount_after_sub_tip.toFixed(2));

        $(this).removeClass('color')
        $(this).attr('is_selected' , 'false');
      }

    });

  })
</script>



<!-- <script type="text/javascript">
    $(document).ready(function(){
      var check_is_tip = $('.color').length;

      if(check_is_tip > 0){

      }

    })
</script> -->
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

    /*When click on %age tip then custon tip remove*/
    $('.static-tip').on('click' , function(){
      $('#customize_tip_amount').val('');
    })

    /*When type in tip then %age tip remove*/
    $('#customize_tip_amount').on('keyup' , function(){

      $('#amount-error').css('display' , 'none');
      
        $('.tip_percentage').removeClass('color')
          
          let new_tip_amount  = $(this).val();
          let item_price_without_tax = $('#total_item_price').val();
          let tax_10_percent = $('#tax_10_percent').val();

        // alert(new_tip_amount)

        if(new_tip_amount == ""){
            let final_amount = parseFloat(item_price_without_tax) + parseFloat(tax_10_percent) ;

            $('#tip').val(0);
            $('#final_amount_without_tip').val(final_amount.toFixed(2));

            $('#change-tip').text('$'+0);
            $('#change-final-amount').text('$'+final_amount.toFixed(2));
        }
        else{
            let final_amount = parseFloat(item_price_without_tax) + parseFloat(tax_10_percent) + parseFloat(new_tip_amount);

            $('#tip').val(new_tip_amount);
            $('#final_amount_without_tip').val(final_amount.toFixed(2));

            $('#change-tip').text('$'+new_tip_amount);
            $('#change-final-amount').text('$'+final_amount.toFixed(2));

        } 

    })
  })
</script>


<script type="text/javascript">
  $(document).on('submit' , function(){
    var final_amount = $('#final_amount_without_tip').val();
    if(final_amount >= 100000){
      $('#amount-error').css('display' , 'block');
      return false;
    }else{
      $('#amount-error').css('display' , 'none');
    }
  })
</script>
</body>
</html>