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
   </head>
   <body>
     <div class="new_div">
         <div class="container">

         <div class="new-file-line">
           <div class="text-center">
            <img src="{{url('public/website/images/chartwe.png')}}" alt="" style="width: 384px; margin:auto;">
              </div>
            <h3 class="placed">Your Order has been placed!</h3>
            <p><div class="text-center"><img src="{{url('public/website/images/appi.png')}}" alt="" style="margin: auto;"></div></p>
              <h4 class="heading">Order ID: 6789654</h4>
            <div class="text-center">
              <a href="{{url('website/menu-list/'.$restaurant_id).'/'.$table_id}}">
               <button type="submit" class="button_large closee">Close</button>
             </a>
            </div>
           


               </div>
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
      <script>
   function increment() {
      document.getElementById('demoInput').stepUp();
   }
   function decrement() {
      document.getElementById('demoInput').stepDown();
   }
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
   </body>
</html>