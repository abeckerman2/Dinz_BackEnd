<!DOCTYPE html>
<html>
   <head>
      <title>mobile</title>
      <link rel="icon" href="{{url('public/website/images/favicon.png')}}" sizes="16x16" type="images/png">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/bootstrap.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{url('public/website/css/font-awesome.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('public/website/css/owl.carousel.min.css')}}">
      <!-- 		      <link rel="stylesheet" type="text/css" href="{{url('public/website/css')}}/animate.css">
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

        .button_line.inc-dec {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: auto;
        }


        button.flot_button {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            margin: auto;
            background-color: #000!important;
            background-image: none;
            max-width: 150px;
            width: 100%;
            height: 39px;
            border-radius: 24px;
        }


      </style>


   </head>
   <body>
     <div class="new_div">
         <div class="container">
            <div class="d-flex newdata">
           
            <div class="line_element">
               <p>Restaurant</p>
            </div>
            <div class="cart">
             <!--  <a href="{{url('website/cart-listing')}}">
                <img src="{{url('public/website/images/cart.png')}}" title="Cart" alt="">
              </a> -->
            </div>
         </div>

         <div class="new-file-line">
            <div class="align_data">
            <!-- <img src="{{url('public/website/images/image.png')}}" alt="" width="300px;"> -->
            <img src="{{$restaurant_find->restaurant_logo}}" style="height: 180px;width: 180px;    border-radius: 20px;" alt="" width="300px;">
         </div>
         <div class="fine_line" style="    margin-top: 15px;">
            <h2>Restaurant</h2>
            <p>{{$restaurant_find->restaurant_address}}</p>
            <h3 class="spain_line">Open</h3>
            <!-- <h5>Snacks</h5> -->

         </div>


          <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant_id}}">
          <input type="hidden" name="menu_id" id="table_id" value="{{$table_id}}">


 
            @foreach($menus as $rows)
              <div class="veg menus" menu_id="{{$rows->id}}">
                <div class="d-flex lines">
                   <div class="d-flex vegetable">

                    @if($rows->item_type == "Veg")
                      <span class="green"></span>
                    @else
                      <span class="red"></span>
                    @endif

                   {{$rows->item_type}}
                  </div>

                   <h3>{{$rows->item_name}}</h3>
                   <h2>{{$rows->price}}</h2>
                   <p style="word-break: break-all;">{{$rows->description}}</p>
                </div>


                  <div class="line_item">
                     <img src="{{$rows->image}}"  alt="" class="lines">
                      
                      @if($rows->quantity)
                      <div class="button_line inc-dec">
                        <button  class="small-b decrement" menu_id= "{{$rows->id}}">-</button>
                            <input type=text min="1" max=20 class="no_of_item" item-count= "{{$rows->quantity}}" value="{{$rows->quantity}}" disabled style="opacity: 1!important;">
                        <button class="small-b increment" menu_id= "{{$rows->id}}">+</button>
                      </div>
                        <button class="add_to_cart"  menu_id= "{{$rows->id}}" style="display: none; margin:auto;">Add</button>
                      @else
                      <div class="button_line inc-dec" style="display: none">
                        <button  class="small-b decrement" menu_id= "{{$rows->id}}">-</button>
                            <input type=text min="1" max=20 class="no_of_item" item-count= "0" value="0" disabled style="opacity: 1!important;">
                        <button class="small-b increment" menu_id= "{{$rows->id}}">+</button>
                      </div>
                       <button class="add_to_cart"  menu_id= "{{$rows->id}}">Add</button>
                      @endif
                  </div>


              </div>
            @endforeach



               </div>
                </div>
               <div>
            </div>


         </div>
     </div>
     

     <a href="{{url('website/cart-listing')}}">
       <button class="flot_button">Go To Cart</button>
     </a>
     
     
    
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


<!-- 
            <script>
               function increment() {
                  document.getElementsByClassName('no_of_item').stepUp();
               }
               function decrement() {
                  document.getElementsByClassName('no_of_item').stepDown();
               }
            </script> -->



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

    $('.add_to_cart').on('click' , function(){

      $(this).css('display' , 'none');
      $(this).parent().find('.inc-dec').css('display' , 'flex');
      $(this).parent().find('.no_of_item').attr('item-count' , 1);
      $(this).parent().find('.no_of_item').val(1);

      // var menu_id = $(this).attr('menu_id');
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
        'menu_data' : menu
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
  });
</script>




<script type="text/javascript">
  $(document).ready(function(){
    $('.increment').on('click' , function(){
      let previous_no_of_item = $(this).parent().find('.no_of_item').attr('item-count');
      let new_value  = parseInt(previous_no_of_item) + 1 ;
      $(this).parent().find('.no_of_item').attr('item-count' , new_value);
      $(this).parent().find('.no_of_item').val(new_value);

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
        console.log(data)

        $.ajax({

          url : "{{url('website/add-cart')}}",
          type: "POST",
          data: data,
            success:function(res){
              console.log(res)
            }
        })

      }

      if(new_value == 0){
        $(this).next(".no_of_item").attr("item-count" , '');
        $(this).next(".no_of_item").val('');
        $(this).parent('.inc-dec').css('display' , 'none');
        $(this).parent('.inc-dec').next('.add_to_cart').css('display' , 'block');
      }
      
    })
  // })


</script>

<!-- 
<script type="text/javascript">
  $(document).ready(function(){
    $('input').keypress(function(e) {
        e.preventDefault();
    });
  })
</script> -->
</body>
</html>