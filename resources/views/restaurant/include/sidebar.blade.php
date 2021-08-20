<!-- Sidebar -->
<div class="sidebar sidebar-style-2 custom_sidebar" data-background-color="dark2">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">
				
				<a href="{{route('restaurant.dashboard')}}" class="logo">
					<img src="{{url('public/restaurant/assets/img/andrewlogo.png')}}" alt="navbar brand" class="navbar-brand">
          			<h2 class="heading">Restaurant Panel</h2>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto hide_hum" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="navbar-toggler sidenav-toggler ml-auto hide_bar" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-times"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
				<!-- <div class="border-bottom"></div>	 -->
			<!-- End Logo Header -->
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item @if(Request::is('restaurant/dashboard')) active @endif">
							<a href="{{route('restaurant.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="caret"></span> -->
							</a>
							<!-- <div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div> -->
						</li>
						
						<li class="nav-item @if(Request::is('restaurant/table-management') || Request::is('restaurant/create-table') || Request::is('restaurant/table-details/*')  || Request::is('restaurant/edit-table/*') || Request::is('restaurant/table-order-details/*') ) active @endif">
							<a href="{{route('restaurant.tableManagement')}}">
								<i class="fas fa-table"></i>
								<p>Table Management</p>
								<!-- <span class="caret"></span> -->
							</a>
							<!-- <div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="sidebar-style-1.html">
											<span class="sub-item">Sidebar Style 1</span>
										</a>
									</li>
									<li>
										<a href="overlay-sidebar.html">
											<span class="sub-item">Overlay Sidebar</span>
										</a>
									</li>
									<li>
										<a href="compact-sidebar.html">
											<span class="sub-item">Compact Sidebar</span>
										</a>
									</li>
									<li>
										<a href="static-sidebar.html">
											<span class="sub-item">Static Sidebar</span>
										</a>
									</li>
									<li>
										<a href="icon-menu.html">
											<span class="sub-item">Icon Menu</span>
										</a>
									</li>
								</ul>
							</div> -->
						</li>

						<li class="nav-item @if(Request::is('restaurant/parent-menu-management') || Request::is('restaurant/add-parent-menu-name') || Request::is('restaurant/edit-parent-menu-name/*')  || Request::is('restaurant/menu-management/*') || Request::is('restaurant/add-item') || Request::is('restaurant/edit-item/*') || Request::is('restaurant/menu-images') ) active @endif">
							<a href="{{route('restaurant.parentMenuManagement')}}">
								<i class="fas fa-bars"></i>
								<p>Menu Management</p> 
							</a> 
						</li>




						<li class="nav-item @if(  Request::is('restaurant/create-order') || Request::is('restaurant/order-management')  || Request::is('restaurant/present-order-details/*') || Request::is('restaurant/present-order-edit')  || Request::is('restaurant/past-orders') || Request::is('restaurant/past-order-details/*')  ||  Request::is('restaurant/today-orders')  ||  Request::is('restaurant/today-order-details/*')  ) active @endif">
							<a href="{{route('restaurant.orderManagement')}}">
								<i class="fas fa-book"></i>
								<p>Order Management</p>
								<!-- <span class="caret"></span> -->
							</a>
					
						</li>



						<li class="nav-item @if(Request::is('restaurant/document-management') || Request::is('restaurant/add-document') || Request::is('restaurant/view-document/*') || Request::is('restaurant/edit-document/*')) active @endif">
							<a href="{{route('restaurant.documentManagement')}}">
								<i class="far fa-file"></i>
								<p>Document Management</p>
								<!-- <span class="caret"></span> -->
							</a>
					
						</li>



						<li class="nav-item">
							<a href="#base" data-toggle="collapse" class="collapsed" aria-expanded="false">
								<i class="fas fa-sliders-h"></i>
								<p>Settings</p>
								<span class="caret"></span>
							</a>
							<div class="collapse @if(Request::is('restaurant/profile') || Request::is('restaurant/change-password') || Request::is('restaurant/edit-profile') ||Request::is('restaurant/my-earnings') || Request::is('restaurant/add-open-close-time')  || Request::is('restaurant/contact-us')  || Request::is('restaurant/about-us')  || Request::is('restaurant/terms-conditions') ) show @endif" id="base">
								
								<ul class="nav nav-collapse">
									<li class="nav-item @if(Request::is('restaurant/profile') || Request::is('restaurant/edit-profile')) active @endif">
										<a href="{{route('restaurant.profile')}}">
											<i class="fas fa-user-alt"></i>
											<p>Profile</p> 
										</a>
									</li>

									<li class="nav-item @if(Request::is('restaurant/change-password')) active @endif">
										<a href="{{route('restaurant.changePassword')}}">
											<i class="fas fa-key"></i>
											<p>Change Password</p> 
										</a>
									</li>

									<li class="nav-item @if(Request::is('restaurant/my-earnings')) active @endif">
										<a href="{{route('restaurant.myEarnings')}}">
											<i class="fas fa-dollar-sign"></i>
											<p>My Earnings</p>
										</a>
									</li>
									<li class="nav-item @if(Request::is('restaurant/add-open-close-time')) active @endif">
										<a href="{{route('restaurant.addOpenCloseTime')}}">
											<i class="fas fa-clock"></i>
											<p>Add Open and Close Time</p>
										</a>
									</li>
									<li class="nav-item @if(Request::is('restaurant/contact-us')) active @endif">
										<a href="{{route('restaurant.contactUs')}}">
											<i class="fas fa-envelope"></i>
											<p>Contact Us</p>
										</a>
									</li>
									<li class="nav-item @if(Request::is('restaurant/about-us')) active @endif">
										<a href="{{route('restaurant.aboutUs')}}">
											<i class="fas fa-address-card"></i>
											<p>About Us</p>
										</a>
									</li>
									<li class="nav-item @if(Request::is('restaurant/terms-conditions')) active @endif">
										<a href="{{route('restaurant.termsConditions')}}">
											<i class="fas fa-file-signature"></i>
											<p>Terms & Conditions</p>
										</a>
									</li>
									<li class="nav-item @if(Request::is('restaurant/logout')) active @endif">
										<a href="{{route('restaurant.logout')}}">
											<i class="fas fa-sign-out-alt"></i>
											<p>Logout</p>
										</a>
									</li>
									<!-- <li class="nav-item">
										<a href="login.html">
											<i class="fas fa-sign-out-alt"></i>
											<p>Logout</p>
										</a>
									</li> -->
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->