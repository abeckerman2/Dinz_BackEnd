</div>
	<!--   Core JS Files   -->
	<script src="{{url('public/restaurant/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{url('public/restaurant/assets/js/core/popper.min.js')}}"></script>
	<script src="{{url('public/restaurant/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{url('public/restaurant/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{url('public/restaurant/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{url('public/restaurant/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{url('public/restaurant/assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{url('public/restaurant/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{url('public/restaurant/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{url('public/restaurant/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<!-- <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- jQuery Vector Maps -->
	<script src="{{url('public/restaurant/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{url('public/restaurant/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{url('public/restaurant/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
    <script src="{{url('public/restaurant/assets/js/atlantis.min.js')}}"></script>
    <script src="{{url('public/restaurant/assets/js/mdtimepicker.js')}}" type="text/javascript"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{url('public/restaurant/assets/js/setting-demo.js')}}"></script>
	<!-- <script src="{{url('public/restaurant/assets/js/demo.js')}}"></script>	 -->
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>

<script type="text/javascript">
    $(document).ready(function(){
      $(".form-control").on("keyup",function(){
        var length = $.trim($(this).val()).length;
        if(length == 0){
           $(this).val("");
        }
      })
    });
</script>



<script type="text/javascript">
	$(document).ready(function(){

		setInterval(function(){

			$.ajax({
		        url: "{{url('restaurant/check-book-table')}}",
		        type: 'GET',
		        dataType: 'json', // added data type
		        success: function(res) {

		        	let sound_play = 0;
		            if(res.length > 0){
		            	for(let i=0; res.length > i; i++){
		            		let active_order_count = 0;
		            		if(res[i]['is_occupied'] == 2){
		            			active_order_count = res[i]['active_orders'].length;

		            			if(active_order_count > 0){
		            				sound_play = 1;
		            			}

		            			// $(".new_table[data-id='"+res[i]["id"]+"']").removeClass('green');
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('green');

		            			$(".new_table[data-id='"+res[i]["id"]+"']").removeClass('ServerWaiter');
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('orange');

		            			$(".new_table[data-id='"+res[i]["id"]+"']").addClass('Occupied');
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").addClass('red');

		            			$(".status[data-id='"+res[i]["id"]+"']").text("Occupied");
		            			$(".active_order[data-id='"+res[i]["id"]+"']").text(active_order_count);


		            			if(localStorage.getItem("noti_"+res[i]["id"]) == "false"){

		            				localStorage.setItem("noti_"+res[i]["id"], "true");
		            			}


		            			 
		            		}



		            		else if(res[i]['is_occupied'] == 3){
		            			request_waiter_count = res[i]['server_waiters'].length;

		            			console.log(request_waiter_count)

		            			if(request_waiter_count > 0){
		            				sound_play = 1;
		            			}
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('green');

		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('Occupied');
		            			$(".new_table[data-id='"+res[i]["id"]+"']").removeClass('Occupied');

		            			$(".new_table[data-id='"+res[i]["id"]+"']").addClass('ServerWaiter');
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").addClass('orange');

		            			$(".status[data-id='"+res[i]["id"]+"']").text("Request Service");
		            			$(".server_waiters[data-id='"+res[i]["id"]+"']").text(request_waiter_count);

		            			if(localStorage.getItem("noti_"+res[i]["id"]) == "false"){

		            				localStorage.setItem("noti_"+res[i]["id"], "true");
		            			}


		            			 
		            		}else{




		            			active_order_count = 0;

		            			localStorage.setItem("noti_"+res[i]["id"], "false");


		            			$(".new_table[data-id='"+res[i]["id"]+"']").removeClass('ServerWaiter');
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('orange');

		            			$(".new_table[data-id='"+res[i]["id"]+"']").removeClass('Occupied')
		            			$(".left_dot[data-id='"+res[i]["id"]+"']").removeClass('red');

		            			$(".left_dot[data-id='"+res[i]["id"]+"']").addClass('green');
		            			$(".status[data-id='"+res[i]["id"]+"']").text("Vacant");
		            			$(".active_order[data-id='"+res[i]["id"]+"']").text(active_order_count);
		            		}
		            	}

		            	if(sound_play == 1){
		            		

		            		// console.log("llllllllllllllllllll")
		            		//$("#play_button_call").click();
		            		
		            	}




		            	/*Notification Code*/

		            	let keys = Object.keys(localStorage);
		            	for(let k=0; keys.length > k; k++){
		            	//console.log(localStorage.key(k));

		            		let key_name = localStorage.key(k);

			            	if(localStorage.getItem(keys[k]) == "true"){

				            	let promise = Notification.requestPermission().then(function(result) {
		                              // console.log(result);
		                            });

		                           let theBody = "You have get new order request from user.";
		                           let theIcon = "{{url('public/favicon.png')}}";
		                           let theTitle = "Dinz";
		                           var dts = Math.floor(Date.now());

		                           var options = {
		                              body: theBody,
		                              icon: theIcon
		                            }

		                            if (!("Notification" in window)) {
		                                alert("This browser does not support desktop notification");
		                            }

		                              // Let's check whether notification permissions have already been granted
		                            else if (Notification.permission === "granted") {
		                                // If it's okay let's create a notification
		                                var notification = new Notification(theTitle,options);

		                                notification.onclick = function(event) {
		                                  event.preventDefault(); // prevent the browser from focusing the Notification's tab
		                                  window.open("{{url('/restaurant/table-management')}}", '_blank');
		                                }
		                            	localStorage.removeItem(localStorage.key(k));
		                            }


		                              // Otherwise, we need to ask the user for permission
		                            else if (Notification.permission !== "denied") {
		                                Notification.requestPermission().then(function (permission) {
		                                  // If the user accepts, let's create a notification
		                                  if (permission === "granted") {
		                                    var notification = new Notification("Hi there! Please allow premission for notifications show on desktop.");
		                                  }
		                                });
		                            }


		                            navigator.serviceWorker.register('sw.js');

		                            var options = { tag : 'user_alerts' };

		                            navigator.serviceWorker.ready.then(function(registration) {
		                              registration.getNotifications(options).then(function(notifications) {
		                                // do something with your notifications
		                              })
		                            });
			            	}
		            	}

		            	/*End Of Notification Code*/
		            }
		        }
	    	});
		},5000);

	});
</script>

@yield('js')

</body>


</html>