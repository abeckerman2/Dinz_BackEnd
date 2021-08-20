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

        .pay_button{width: 200px;
          height: 53px;
          margin-top: 23px;
          font-size: 21px;
          font-weight: 300;
          text-transform: capitalize;
          background-image: linear-gradient(#ff0000, #980505);
          border: 0;
          padding: 4px 5px;
          border-radius: 100px;
          color: #fff;
          line-height: 20px;
        } 


        .tip_percentage{
              margin-right: 2px;
              background-color: transparent;
              border-radius: 100%;
              width: 43px;
              font-size: 16px;
              height: 42px;
              line-height: 37px;
              text-align: center;
              font-weight: 700;
              border: 2px solid #000;
              color: #000;
              cursor: pointer;
        }

        .color{
               background-color: #d20a0a; 
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


            @if($cart_list['menu_data'])
            <div class="new-file-line" id="main_page_items">
            <form method="POST" id="order" >
            {{csrf_field()}}

              <?php 
                $total_item_price = 0;
              ?>
              @foreach($cart_menu_details as $row)
               <div class="veg menus" menu_id="{{$row->id}}" style="margin-top: 0px;margin-bottom:12px" >
                  <div class="d-flex lines">
                     <div class="d-flex vegetable">
                        <h3>{{$row->item_name}}</h3>
                        <span class="nine"></span>
                     </div>
                     <h4 class="semi-blold">${{$row->price}}</h4>
                     <!-- <h5 class="line-event">instruction <img src="{{url('public/website/images/drop-bottom.png')}}" alt=""></h5> -->
                     <p style="word-break: break-all;">{{$row->description}}.</p>
                  </div>
                  <div class="line_item inc-dec">
                     <img src="{{url('public/website/images/lollipop.png')}}" alt="" class="lines">
                     <div class="d-flex button_line">
                        <a class="small-b decrement new_button" item-price="{{$row->price}}" menu_id= "{{$row->id}}">-</a>
                          <input type=text min="1" max=20 class="no_of_item" item-count= "{{$row->quantity}}" value="{{$row->quantity}}" disabled  style="opacity: 1!important;">
                        <a  class="small-b increment new_button" item-price="{{$row->price}}" menu_id= "{{$row->id}}">+</a>
                     </div>
                     <!-- <button type="submit" class="add" style="display: none;">Add</button> -->
                  </div>
               </div>

               <?php
                  $total_item_price = $row->price_acc_to_quantity + $total_item_price;
               ?>
               @endforeach

               <?php
                  $tax_10_percent = $total_item_price * 10 / 100;
                  $final_amount_without_tip = $total_item_price + $tax_10_percent;
               ?>

               <input type="hidden" name="total_item_price" id="total_item_price" value="{{$total_item_price}}">
               <input type="hidden" name="tax_10_percent" id="tax_10_percent" value="{{$tax_10_percent}}">
               <input type="hidden" name="tip" id="tip" value='0'>
               <input type="hidden" name="final_amount_without_tip" id="final_amount_without_tip" value="{{$final_amount_without_tip}}">





               <div class="text-area">
                  <textarea placeholder="Any special request/ Allergy to restaurant?" name="order_text_customization"></textarea>
                  <div class="words_new">
                     <!-- <span class="words">50 words</span> -->
                     <br>
                  </div>
               </div>
               <div class="d-flex trip">
                  <div class="trip">
                     <h3>Add Tip</h3>
                  </div>
                  <div class="" style="display: flex;">
                     <!-- <div class="d-flex button_line">
                        <a class="small-b new_button" id="tip-dec">-</a>
                        <input id='demoInput' type=text min=1 max=10 tip_amount=0 value="0" disabled  style="opacity: 1!important;">
                        <a  class="small-b new_button" id="tip-inc">+</a>
                     </div> -->
                     <p class="tip_percentage static-tip" id="tip_15" tip="15" is_selected ="false" title="Tip">15%</p> 
                     <p class="tip_percentage static-tip" id="tip_20" tip="20" is_selected ="false" title="Tip">20%</p> 
                     <p class="tip_percentage static-tip" id="tip_25" tip="25" is_selected ="false" title="Tip">25%</p>

                     <!-- <input type="text" name="" id="customize_tip_amount" > -->

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
            <h2 style="text-align: center;color: red;">No item available in cart list</h2>
            @endif

            <h2 style=" text-align: center; display: none;color: red;" id="informational_message" >No item available in cart list</h2>

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

      let total_item_price_after_select_dish = parseInt(total_item_price) + parseInt(price_to_selected_dish);
      $('#total_item_price').val(total_item_price_after_select_dish);
      $('#change-total-amount').text('$'+total_item_price_after_select_dish);

      let tax_10_percent = total_item_price_after_select_dish/10;
      $('#tax_10_percent').val(tax_10_percent);
      $('#change-tax').text("$"+tax_10_percent);

      let final_total_item_price_after_select_dish = parseInt(total_item_price_after_select_dish) + parseInt(tax_10_percent);
      $('#final_amount_without_tip').val(final_total_item_price_after_select_dish);
      $('#change-final-amount').text('$'+final_total_item_price_after_select_dish);
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

        let total_item_price_after_select_dish = parseInt(total_item_price) - parseInt(price_to_selected_dish);
        $('#total_item_price').val(total_item_price_after_select_dish);
        $('#change-total-amount').text('$'+total_item_price_after_select_dish);

        let tax_10_percent = total_item_price_after_select_dish/10;
        $('#change-tax').text("$"+tax_10_percent);
        $('#tax_10_percent').val(tax_10_percent);

        let final_total_item_price_after_select_dish = parseInt(total_item_price_after_select_dish) + parseInt(tax_10_percent);
        $('#final_amount_without_tip').val(final_total_item_price_after_select_dish);
        $('#change-final-amount').text('$'+final_total_item_price_after_select_dish);
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



<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#tip_15').on('click' , function(){

      let item_price_without_tax = $('#total_item_price').val();
      let tax_10_percent = $('#tax_10_percent').val();

      var check_selected  = $(this).attr('is_selected');

      if(check_selected == "false"){
        let tip_amount_of_15_percent = parseInt(item_price_without_tax) * 15 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent) + parseInt(tip_amount_of_15_percent);        

        $('#change-tip').text("$" + tip_amount_of_15_percent);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(tip_amount_of_15_percent);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_15').addClass('color');
        $(this).attr('is_selected' , 'true');

      }else{

        let tip_amount_of_15_percent = parseInt(item_price_without_tax) * 15 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent);      
        $('#change-tip').text("$" + 0);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(0);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_15').removeClass('color')
        $(this).attr('is_selected' , 'false');
      }


    })





    $('#tip_20').on('click' , function(){

      let item_price_without_tax = $('#total_item_price').val();
      let tax_10_percent = $('#tax_10_percent').val();

      var check_selected  = $(this).attr('is_selected');

      if(check_selected == "false"){
        let tip_amount_of_20_percent = parseInt(item_price_without_tax) * 20 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent) + parseInt(tip_amount_of_20_percent);        

        $('#change-tip').text("$" + tip_amount_of_20_percent);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(tip_amount_of_20_percent);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_20').addClass('color');
        $(this).attr('is_selected' , 'true');

      }else{

        let tip_amount_of_20_percent = parseInt(item_price_without_tax) * 15 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent);      
        $('#change-tip').text("$" + 0);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(0);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_20').removeClass('color')
        $(this).attr('is_selected' , 'false');
      }


    })





    $('#tip_25').on('click' , function(){

      let item_price_without_tax = $('#total_item_price').val();
      let tax_10_percent = $('#tax_10_percent').val();

      var check_selected  = $(this).attr('is_selected');

      if(check_selected == "false"){
        let tip_amount_of_25_percent = parseInt(item_price_without_tax) * 25 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent) + parseInt(tip_amount_of_25_percent);        

        $('#change-tip').text("$" + tip_amount_of_25_percent);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(tip_amount_of_25_percent);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_25').addClass('color');
        $(this).attr('is_selected' , 'true');

      }else{

        let tip_amount_of_25_percent = parseInt(item_price_without_tax) * 15 /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent);      
        $('#change-tip').text("$" + 0);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(0);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);

        $('#tip_25').removeClass('color')
        $(this).attr('is_selected' , 'false');
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
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if($(element).val().indexOf('.') != -1){
          $("#customize_tip_amount").attr("maxlength","5");  
        }else{
          $("#customize_tip_amount").attr("maxlength","4");
        }
        if((charCode != 46 || $(element).val().indexOf('.') != -1) &&  (charCode < 48 || charCode > 57)){
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
        let tip_amount = parseInt(item_price_without_tax) * parseInt(tax_percentage) /100; 
        let final_amount_after_add_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent) + parseInt(tip_amount);        

        $('#change-tip').text("$" + tip_amount);
        $('#change-final-amount').text('$' + final_amount_after_add_tip);

        $('#tip').val(tip_amount);
        $('#final_amount_without_tip').val(final_amount_after_add_tip);


        $('.static-tip').removeClass('color')
        $(this).addClass('color');
        $('.static-tip').attr('is_selected' , 'false')
        $(this).attr('is_selected' , 'true');

      }else{

        let final_amount_after_sub_tip = parseInt(item_price_without_tax) + parseInt(tax_10_percent);      
        $('#change-tip').text("$" + 0);
        $('#change-final-amount').text('$' + final_amount_after_sub_tip);

        $('#tip').val(0);
        $('#final_amount_without_tip').val(final_amount_after_sub_tip);

        $(this).removeClass('color')
        $(this).attr('is_selected' , 'false');
      }

    });

  })
</script>



</body>
</html>