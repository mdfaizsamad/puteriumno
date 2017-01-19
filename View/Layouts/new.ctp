<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head>
	<title>Ergo - Admin &amp; App UI Template (v1.2)</title>

	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

	<!-- Bootstrap -->
	<link href="../common/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../common/bootstrap/css/responsive.css" rel="stylesheet" />

	<!-- Glyphicons Font Icons -->
	<link href="../common/theme/css/glyphicons.css" rel="stylesheet" />

	<!-- Uniform Pretty Checkboxes -->
	<link href="../common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />

	<!--[if IE]><!--><script src="../common/theme/scripts/plugins/other/excanvas/excanvas.js"></script><!--<![endif]-->
	<!--[if lt IE 8]><script src="../common/theme/scripts/plugins/other/json2.js"></script><![endif]-->

	<!-- Bootstrap Extended -->
	<link href="../common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="../common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
	<link href="../common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	<link href="../common/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet" />

	<!-- Select2 Plugin -->
	<link href="../common/theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />

	<!-- DateTimePicker Plugin -->
	<link href="../common/theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />

	<!-- JQueryUI -->
	<link href="../common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />

	<!-- MiniColors ColorPicker Plugin -->
	<link href="../common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />

	<!-- Notyfy Notifications Plugin -->
	<link href="../common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
	<link href="../common/theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />

	<!-- Gritter Notifications Plugin -->
	<link href="../common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

	<!-- Easy-pie Plugin -->
	<link href="../common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.css" rel="stylesheet" />

	<!-- Google Code Prettify Plugin -->
	<link href="../common/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<!-- Bootstrap Image Gallery -->
	<link href="../common/bootstrap/extend/bootstrap-image-gallery/css/bootstrap-image-gallery.min.css" rel="stylesheet" />

	<!-- Main Theme Stylesheet :: CSS -->
	<link href="../common/theme/css/style-light.css?1439461910" rel="stylesheet" />


	<!-- Google Analytics -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-36057737-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

	<!-- LESS.js Library -->
	<script src="../common/theme/scripts/plugins/system/less.min.js"></script>
</head>
<body class="">

		<!-- Main Container Fluid -->
	<div class="container-fluid fluid menu-left">

		<!-- Top navbar (note: add class "navbar-hidden" to close the navbar by default) -->
		<div class="navbar main hidden-print">

			<!-- Wrapper -->
			<div class="wrapper">


								<!-- Menu Toggle Button -->
				<button type="button" class="btn btn-navbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
				</button>
				<!-- // Menu Toggle Button END -->

								<!-- Top Menu -->
				<ul class="topnav pull-left tn1 hidden-phone">

										<!-- Themer -->
					<li><a href="#themer" data-toggle="collapse" class="glyphicons eyedropper single-icon"><i></i></a></li>
					<!-- // Themer END -->

										<li class="hidden-phone">
												<a class="glyphicons sun" href="?page=index&amp;lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-dark"><i></i>Go Dark</a>

											</li>

					<li class="dropdown dd-1 dd-2">
						<a href="" data-toggle="dropdown">Notifications <span class="count">3</span></a>
						<ul class="dropdown-menu pull-left">
							<li><a href="#" class="glyphicons envelope"><i></i> New Email</a></li>
                            <li><a href="#" class="glyphicons chat"><i></i> 5 Messages</a></li>
                            <li><a href="#" class="glyphicons conversation"><i></i> 1 New Reply</a></li>
						</ul>
					</li>

				</ul>
				<!-- // Top Menu END -->

				<!-- Top Menu Right -->
				<ul class="topnav pull-right">

					<!-- Language menu -->
					<li class="hidden-phone dropdown dd-1 dd-flags" id="lang_nav">
						<a href="#" data-toggle="dropdown"><img src="../common/theme/images/lang/en.png" alt="en" /></a>
				    	<ul class="dropdown-menu pull-left">
				      		<li class="active"><a href="?page=index&amp;lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" title="English"><img src="../common/theme/images/lang/en.png" alt="English"> English</a></li>
				      		<li><a href="?page=index&amp;lang=ro&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" title="Romanian"><img src="../common/theme/images/lang/ro.png" alt="Romanian"> Romanian</a></li>
				      		<li><a href="?page=index&amp;lang=it&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" title="Italian"><img src="../common/theme/images/lang/it.png" alt="Italian"> Italian</a></li>
				      		<li><a href="?page=index&amp;lang=fr&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" title="French"><img src="../common/theme/images/lang/fr.png" alt="French"> French</a></li>
				      		<li><a href="?page=index&amp;lang=pl&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" title="Polish"><img src="../common/theme/images/lang/pl.png" alt="Polish"> Polish</a></li>
				    	</ul>
					</li>
					<!-- // Language menu END -->

					<!-- Dropdown -->
					<li class="dropdown dd-1 visible-desktop">
						<a href="" data-toggle="dropdown" class="glyphicons shield"><i></i>Get Help <span class="caret"></span></a>
						<ul class="dropdown-menu pull-right">

							<li class="dropdown submenu">
	                    		<a href="#" class="dropdown-toggle glyphicons bell" data-toggle="dropdown"><i></i>Level 2</a>
								<ul class="dropdown-menu submenu-show submenu-hide pull-left">
			                        <li class="dropdown submenu">
			                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 2.1</a>
										<ul class="dropdown-menu submenu-show submenu-hide pull-left">
											<li><a href="#">Level 2.1.1</a></li>
	                                    	<li><a href="#">Level 2.1.2</a></li>
	                                    	<li><a href="#">Level 2.1.3</a></li>
	                                    	<li><a href="#">Level 2.1.4</a></li>
			                            </ul>
			                        </li>
			                        <li class="dropdown submenu">
			                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Level 2.2</a>
			                            <ul class="dropdown-menu submenu-show submenu-hide pull-left">
											<li><a href="#">Level 2.2.1</a></li>
			                                <li><a href="#">Level 2.2.2</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                </li>

			                <li><a href="" class="glyphicons settings"><i></i>Some option</a></li>
							<li><a href="" class="glyphicons bell"><i></i>Some other option</a></li>
							<li><a href="" class="glyphicons bell"><i></i>Other option</a></li>

						</ul>
					</li>
					<!-- // Dropdown END -->

					<!-- Profile / Logout menu -->
					<li class="account dropdown dd-1">
												<a data-toggle="dropdown" href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" class="glyphicons logout lock"><span class="hidden-phone">mosaicpro</span><i></i></a>
						<ul class="dropdown-menu pull-right">
							<li><a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" class="glyphicons cogwheel">Settings<i></i></a></li>
							<li><a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" class="glyphicons camera">My Photos<i></i></a></li>
							<li class="profile">
								<span>
									<span class="heading">Profile <a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" class="pull-right">edit</a></span>
									<span class="img"></span>
									<span class="details">
										<a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light">Mosaic Pro</a>
										contact@mosaicpro.biz
									</span>
									<span class="clearfix"></span>
								</span>
							</li>
							<li>
								<span>
									<a class="btn btn-default btn-mini pull-right" href="login.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light">Sign Out</a>
								</span>
							</li>
						</ul>
											</li>
					<!-- // Profile / Logout menu END -->

				</ul>
				<!-- // Top Menu Right END -->


				<div class="clearfix"></div>
			</div>
			<!-- // Wrapper END -->

			<span class="toggle-navbar"></span>
		</div>
		<!-- Top navbar END -->

				<!-- Sidebar menu & content wrapper -->
		<div id="wrapper">

		<!-- Sidebar Menu -->
		<div id="menu" class="hidden-phone hidden-print">

			<!-- Brand -->
			<a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light" class="appbrand">Ergo <span>Admin UI Template (v1.2)</span></a>

			<!-- Scrollable menu wrapper with Maximum height -->
			<div class="slim-scroll" data-scroll-height="800px">

			<!-- Sidebar Profile -->
			<span class="profile">
				<p>Welcome <a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light">mosaicpro</a></p>
				<a class="img" href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><img src="../common/theme/images/avatar-style-light.jpg" alt="Avatar" /></a>
				<span>
					<ul>
						<li><a href="" class="glyphicons lock"><i></i>Account</a></li>
						<li><a href="" class="glyphicons keys"><i></i>Password</a></li>
						<li><a href="" class="glyphicons eject"><i></i>Logout</a></li>
					</ul>
				</span>
			</span>
			<!-- // Sidebar Profile END -->

			<!-- Regular Size Menu -->
			<ul class="menu-0">


								<!-- Menu Regular Item -->
				<li class="glyphicons display active"><a href="index.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Dashboard</span></a></li>

				<!-- Components Submenu Level 1 -->
				<li class="hasSubmenu glyphicons cogwheels">
					<a data-toggle="collapse" href="#menu_components"><i></i><span>Components</span></a>
					<ul class="collapse" id="menu_components">

						<!-- Components Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_forms"><span>Forms</span></a>
							<ul class="collapse" id="menu_forms">
								<li class=""><a href="form_wizards.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Form Wizards</span></a></li>
								<li class=""><a href="form_elements.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Form Elements</span></a></li>
								<li class=""><a href="form_validator.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Form Validator</span></a></li>
								<li class=""><a href="file_managers.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>File Managers</span></a></li>
							</ul>
							<span class="count">4</span>
						</li>
						<!-- // Components Submenu Level 2 END -->

						<!-- Components Submenu Regular Items -->
						<li class=""><a href="ui.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>UI Elements</span></a></li>
						<li class=""><a href="icons.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Icons</span></a></li>
						<li class=""><a href="widgets.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Widgets</span></a></li>
						<li class=""><a href="tabs.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Tabs</span></a></li>
						<li class=""><a href="sliders.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Sliders</span></a></li>
						<li class=""><a href="charts.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Charts</span></a></li>
						<!-- // Components Submenu Regular Items END -->

						<!-- Components Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_tables"><span>Tables</span></a>
							<ul class="collapse" id="menu_tables">
								<li class=""><a href="tables.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Tables</span></a></li>
								<li class=""><a href="pricing_tables.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Pricing tables</span></a></li>
							</ul>
							<span class="count">2</span>
						</li>
						<!-- // Components Submenu Level 2 -->

						<!-- Components Submenu Regular Items -->
						<li class=""><a href="grid.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Grid system</span></a></li>
						<li class=""><a href="notifications.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Notifications</span></a></li>
						<li class=""><a href="modals.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Modals</span></a></li>
						<li class=""><a href="thumbnails.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Thumbnails</span></a></li>
						<li class=""><a href="carousels.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Carousels</span></a></li>
						<li class=""><a href="tour.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Page Tour</span></a></li>
						<!-- // Components Submenu Regular Items END -->

					</ul>
					<span class="count">18</span>
				</li>
				<!-- Components Submenu Level 1 END -->

				<!-- Exmaples Submenu Level 1 -->
				<li class="hasSubmenu">

					<a data-toggle="collapse" class="glyphicons luggage" href="#menu_examples"><i></i><span>Examples</span></a>
					<ul class="collapse" id="menu_examples">

						<!-- Account Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_account"><i></i><span>Account</span></a>
							<ul class="collapse" id="menu_account">
								<li class=""><a href="my_account_advanced.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Advanced profile</span></a></li>
								<li class=""><a href="my_account.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>My Account</span></a></li>
								<li><a href="login.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Login</span></a></li>
								<li><a href="signup.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Register</span></a></li>
							</ul>
							<span class="count">4</span>
						</li>
						<!-- // Account Submenu Level 2 END -->

						<!-- Landings Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_landings"><i></i><span>Landing pages</span></a>
							<ul class="collapse" id="menu_landings">
								<li><a href="landing_page_1.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Landing #1</span></a></li>
								<li><a href="landing_page_2.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Landing #2</span></a></li>
							</ul>
							<span class="count">2</span>
						</li>
						<!-- // Landings Submenu Level 2 END -->

						<!-- Examples Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_gallery"><i></i><span>Photo Gallery</span></a>
							<ul class="collapse" id="menu_gallery">
								<li class=""><a href="gallery_1.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Regular</span></a></li>
								<li class=""><a href="gallery_2.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Masonry</span></a></li>
							</ul>
							<span class="count">2</span>
						</li>
						<!-- // Examples Submenu Level 2 END -->

						<!-- Examples Submenu Level 2 -->
						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_maps"><i></i><span>Maps</span></a>
							<ul class="collapse" id="menu_maps">
								<li class=""><a href="maps_vector.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Vector maps</span></a></li>
								<li class=""><a href="maps_google.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Google maps</span></a></li>
							</ul>
							<span class="count">2</span>
						</li>
						<!-- // Examples Submenu Level 2 END -->

						<!-- Examples Submenu Regular Items -->
						<li class=""><a href="invoice.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Invoice</span></a></li>
						<li class=""><a href="faq.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>FAQ</span></a></li>
						<li class=""><a href="calendar.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><i></i><span>Calendar</span></a></li>
						<!-- // Examples Submenu Regular Items END -->

						<li class="hasSubmenu">
							<a data-toggle="collapse" href="#menu_ecommerce"><i></i><span>Online Shop</span></a>

							<!-- Closed by default -->
							<ul class="collapse" id="menu_ecommerce">
								<li class="hasSubmenu">
									<a data-toggle="collapse" href="#menu_ecommerce_client"><i></i><span>Client interface</span></a>
									<ul class="collapse" id="menu_ecommerce_client">
										<li class=""><a href="shop_client_products.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Products</span></a></li>
										<li class=""><a href="shop_client_product.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Product details</span></a></li>
										<li class=""><a href="shop_client_cart.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Shopping cart</span></a></li>
									</ul>
									<span class="count">3</span>
								</li>
								<li class="hasSubmenu">
									<a data-toggle="collapse" href="#menu_ecommerce_admin"><i></i><span>Management</span></a>
									<ul class="collapse" id="menu_ecommerce_admin">
										<li class=""><a href="shop_admin_products.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Products</span></a></li>
										<li class=""><a href="shop_admin_product.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Add product</span></a></li>
									</ul>
									<span class="count">2</span>
								</li>
							</ul>
							<span class="count">5</span>
						</li>

						<li class=""><a href="bookings.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Bookings</span></a></li>
						<li class=""><a href="finances.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Finances</span></a></li>
						<li class=""><a href="pages.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Site Pages</span></a></li>
						<li><a href="error.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Error page</span></a></li>
						<li><a href="blank.html?lang=en&amp;layout_type=fluid&amp;menu_position=menu-left&amp;style=style-light"><span>Blank page</span></a></li>

					</ul>
					<span class="count">21</span>
				</li>
				<!-- // Examples Submenu Level 1 END -->

			</ul>
			<div class="clearfix"></div>
			<!-- // Regular Size Menu END -->

			<ul class="menu-1">
				<li class="hasSubmenu active">
					<a class="glyphicons wifi_alt" href="#menu-recent-stats" data-toggle="collapse"><i></i><span>Recent stats</span></a>
					<ul class="collapse in" id="menu-recent-stats">
						<li><a class="glyphicons envelope" href="#"><i></i><span>5 New Emails</span></a></li>
						<li><a class="glyphicons chat" href="#"><i></i><span>New Message on 19 Jan</span></a></li>
						<li><a class="glyphicons user_add" href="#"><i></i><span>10 Users Subscribed</span></a></li>
						<li><a class="glyphicons cart_in" href="#"><i></i><span>2 Orders worth of &dollar;239</span></a></li>
						<li><a class="glyphicons single circle_plus" href="#"><i></i><span>View all</span></a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
			<div class="separator bottom"></div>

						<!-- Sidebar Stats Widgets -->
			<div class="widget-sidebar-stats">
				<strong>3,540</strong>
				<span>Messages</span>
				<span class="pull-right sparkline"></span>
				<div class="clearfix"></div>
			</div>
			<div class="widget-sidebar-stats">
				<strong>2,510,402</strong>
				<span>Photos</span>
				<span class="pull-right sparkline"></span>
				<div class="clearfix"></div>
			</div>
			<div class="separator bottom"></div>
			<!-- // Sidebar Stats Widgets END -->

			<!-- Stats Widget -->
			<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie widget-sidebar-stats txt-single">
				<div data-percent="90" class="easy-pie primary"><span class="value">90</span>%</div>
				<span class="txt">Completed tasks</span>
				<div class="clearfix"></div>
			</a>
			<!-- // Stats Widget END -->

			<div class="widget-sidebar-stats">
				<h5>Generic widget</h5>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>

						<!-- Menu Position Change -->
			<div class="separator top uniformjs menu_js hidden-phone">
				<div class="innerLR">
					<label for="toggle-menu-position" class="checkbox">
						<input type="checkbox" class="checkbox" id="toggle-menu-position" />
						right menu
					</label>
				</div>
			</div>
			<!-- // Menu Position Change END -->

						<!-- Layout Type Change -->
			<div class="uniformjs layout_js hidden-phone">
				<div class="innerLR">
					<label for="toggle-layout" class="checkbox">
						<input type="checkbox" class="checkbox" id="toggle-layout" />
						fixed layout
					</label>
				</div>
			</div>
			<!-- // Layout Type Change END -->

			</div>
			<!-- // Scrollable Menu wrapper with Maximum Height END -->

		</div>
		<!-- // Sidebar Menu END -->

		<!-- Content -->
		<div id="content"">
	<h2>Dashboard <span>for your next cool web APP</span></h2>

<div class="innerLR">

	<!-- Website Traffic Chart -->
	<div class="widget" data-toggle="collapse-widget">
		<div class="widget-head">
			<h4 class="heading glyphicons cardio"><i></i>Website Traffic</h4>
		</div>
		<div class="widget-body">
			<div id="chart_lines_fill_nopoints" style="height: 250px;"></div>
		</div>
	</div>
	<!-- // Website Traffic Chart END -->

	<!-- Stats Widgets -->
	<div class="row-fluid widget-stats-group">

		<div class="span1 center hidden-phone">
			<a class="btn disabled btn-small btn-default glyphicons standard chevron-left"><i></i></a>
		</div>

		<div class="span2">

			<!-- Stats Widget -->
			<a href="" class="widget-stats">
				<span class="glyphicons cart_in"><i></i></span>
				<span class="txt">Sales</span>
				<div class="clearfix"></div>
				<span class="count label label-important">20</span>
			</a>
			<!-- // Stats Widget END -->

		</div>
		<div class="span2">

			<!-- Stats Widget -->
			<a href="" class="widget-stats">
				<span class="glyphicons shield"><i></i></span>
				<span class="txt">Alerts</span>
				<div class="clearfix"></div>
				<span class="count label">25</span>
			</a>
			<!-- // Stats Widget END -->

		</div>
		<div class="span2">

			<!-- Stats Widget -->
			<a href="" class="widget-stats">
				<span class="glyphicons user_add"><i></i></span>
				<span class="txt">Clients</span>
				<div class="clearfix"></div>
				<span class="count label label-warning">33</span>
			</a>
			<!-- // Stats Widget END -->

		</div>
		<div class="span2">

			<!-- Stats Widget -->
			<a href="" class="widget-stats">
				<span class="glyphicons envelope"><i></i></span>
				<span class="txt">Messages</span>
				<div class="clearfix"></div>
				<span class="count label label-primary">265</span>
			</a>
			<!-- // Stats Widget END -->

		</div>
		<div class="span2">

			<!-- Stats Widget -->
			<a href="" class="widget-stats primary">
				<span class="glyphicons usd"><i></i></span>
				<span class="txt">Earnings</span>
				<div class="clearfix"></div>
				<span class="count label label-success">&dollar;2,920</span>
			</a>
			<!-- // Stats Widget END -->

		</div>

		<div class="span1 center hidden-phone">
			<a class="btn btn-small btn-default glyphicons standard chevron-right"><i></i></a>
		</div>

	</div>
	<div class="separator bottom"></div>
	<!-- // Stats Widgets END -->

	<div class="tickertape">
		<strong class="title">Important</strong>
		<span class="marquee">
			<span><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</span>
			<span>Lorem Ipsum has been the <strong>industry's standard</strong> dummy text ever since the 1500s.</span>
		</span>
	</div>

	<div class="row-fluid">
	<div class="span6">

		<div class="widget widget-activity margin-none" data-toggle="collapse-widget">
			<div class="widget-head">
				<h4 class="heading">Recent Activity</h4>
			</div>
			<div class="widget-body">

				<div class="innerB">
					<ul class="tabs">
						<li class="glyphicons user_add"><span data-toggle="tab" data-target="#filterUsersTab"><i></i></span></li>
						<li class="glyphicons shopping_cart"><span data-toggle="tab" data-target="#filterOrdersTab"><i></i></span></li>
						<li class="glyphicons envelope active"><span data-toggle="tab" data-target="#filterMessagesTab"><i></i></span></li>
						<li class="glyphicons link"><span data-toggle="tab" data-target="#filterLinksTab"><i></i></span></li>
						<li class="glyphicons camera"><span data-toggle="tab" data-target="#filterPhotosTab"><i></i></span></li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="tab-content">


					<!-- Filter Users Tab -->
					<div class="tab-pane" id="filterUsersTab">
						<ul class="list">

														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon user_add"><i></i></span>
								<span class="ellipsis"><a href="">Martin Glades</a> registered at <a href="">John Doe's</a> suggestion.</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon user_add"><i></i></span>
								<span class="ellipsis"><a href="">Darius Jackson</a> registered at <a href="">John Doe's</a> suggestion.</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon user_add"><i></i></span>
								<span class="ellipsis"><a href="">John Doe</a> registered at <a href="">Jane Doe's</a> suggestion.</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon user_add"><i></i></span>
								<span class="ellipsis"><a href="">Jane Doe</a> registered at <a href="">Melisa Ragae's</a> suggestion.</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->

						</ul>
						<button type="button" class="btn btn-small btn-inverse view-all hidden-phone"><span class="hidden-phone hidden-tablet">View </span>members</button>
					</div>
					<!-- // Filter Users Tab END -->

					<!-- Filter Orders Tab -->
					<div class="tab-pane" id="filterOrdersTab">
						<ul class="list">

														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon shopping_cart"><i></i></span>
								<span class="ellipsis"><a href="">John Doe</a> bought 10 items worth of &euro;50 (<a href="">order #2301</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon shopping_cart"><i></i></span>
								<span class="ellipsis"><a href="">Jane Doe</a> bought 10 items worth of &euro;50 (<a href="">order #2302</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon shopping_cart"><i></i></span>
								<span class="ellipsis"><a href="">Darius Jackson</a> bought 10 items worth of &euro;50 (<a href="">order #2303</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon shopping_cart"><i></i></span>
								<span class="ellipsis"><a href="">Darius Jackson</a> bought 10 items worth of &euro;50 (<a href="">order #2304</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->

						</ul>
						<button type="button" class="btn btn-small btn-inverse view-all hidden-phone"><span class="hidden-phone hidden-tablet">View </span>orders</button>
					</div>
					<!-- // Filter Orders Tab END -->

					<!-- Filter Messages Tab -->
					<div class="tab-pane active" id="filterMessagesTab">
						<ul class="list">

																					<!-- Activity item -->
							<li class="double">
								<span class="glyphicons activity-icon envelope"><i></i></span>
								<span class="ellipsis">
									You have received an email from <a href="">Darius Jackson</a> (darius.jackson@fake-email.net)
									<span class="meta glyphicons calendar single"><i></i> on 29 March, 2013 <span>1 hour ago</span></span>
								</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
																					<!-- Activity item -->
							<li class="double highlight">
								<span class="glyphicons activity-icon envelope"><i></i></span>
								<span class="ellipsis">
									You have received an email from <a href="">Darius Jackson</a> (darius.jackson@fake-email.net)
									<span class="meta glyphicons calendar single"><i></i> on 29 March, 2013 <span>1 hour ago</span></span>
								</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
																					<!-- Activity item -->
							<li class="double">
								<span class="glyphicons activity-icon envelope"><i></i></span>
								<span class="ellipsis">
									You have received an email from <a href="">Jane Doe</a> (jane.doe@lovely-email.net)
									<span class="meta glyphicons calendar single"><i></i> on 29 March, 2013 <span>1 hour ago</span></span>
								</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
																					<!-- Activity item -->
							<li class="double">
								<span class="glyphicons activity-icon envelope"><i></i></span>
								<span class="ellipsis">
									You have received an email from <a href="">Darius Jackson</a> (darius.jackson@fake-email.net)
									<span class="meta glyphicons calendar single"><i></i> on 29 March, 2013 <span>1 hour ago</span></span>
								</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->

						</ul>
						<button type="button" class="btn btn-small btn-inverse view-all hidden-phone"><span class="hidden-phone hidden-tablet">View </span>messages</button>
					</div>
					<!-- // Filter Messages Tab END -->

					<!-- Filter Links Tab -->
					<div class="tab-pane" id="filterLinksTab">
						<ul class="list">

														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon link"><i></i></span>
								<span class="ellipsis"><a href="">Melisa Ragae</a> bought 10 items worth of &euro;50 (<a href="">order #2301</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon link"><i></i></span>
								<span class="ellipsis"><a href="">John Doe</a> bought 10 items worth of &euro;50 (<a href="">order #2302</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon link"><i></i></span>
								<span class="ellipsis"><a href="">Melisa Ragae</a> bought 10 items worth of &euro;50 (<a href="">order #2303</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon link"><i></i></span>
								<span class="ellipsis"><a href="">Martin Glades</a> bought 10 items worth of &euro;50 (<a href="">order #2304</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->

						</ul>
						<button type="button" class="btn btn-small btn-inverse view-all hidden-phone"><span class="hidden-phone hidden-tablet">View </span>referrals</button>
					</div>
					<!-- // Filter Links Tab END -->

					<!-- Filter Photos Tab -->
					<div class="tab-pane" id="filterPhotosTab">
						<ul class="list">

														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon camera"><i></i></span>
								<span class="ellipsis"><a href="">Darius Jackson</a> bought 10 items worth of &euro;50 (<a href="">order #2301</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon camera"><i></i></span>
								<span class="ellipsis"><a href="">Melisa Ragae</a> bought 10 items worth of &euro;50 (<a href="">order #2302</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon camera"><i></i></span>
								<span class="ellipsis"><a href="">Jane Doe</a> bought 10 items worth of &euro;50 (<a href="">order #2303</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->
														<!-- Activity item -->
							<li>
								<span class="date">21/03</span>
								<span class="glyphicons activity-icon camera"><i></i></span>
								<span class="ellipsis"><a href="">Martin Glades</a> bought 10 items worth of &euro;50 (<a href="">order #2304</a>)</span>
								<div class="clearfix"></div>
							</li>
							<!-- // Activity item END -->

						</ul>
						<button type="button" class="btn btn-small btn-inverse view-all hidden-phone"><span class="hidden-phone hidden-tablet">View </span>photos</button>
					</div>
					<!-- // Filter Photos Tab END -->

				</div>
				<div class="separator bottom"></div>

				<button type="button" class="btn btn-default">Default</button>
				<button type="button" class="btn btn-primary">Primary</button>
				<button type="button" class="btn btn-success hidden-phone">Success</button>
				<button type="button" class="btn btn-warning hidden-phone">Warning</button>
				<button type="button" class="btn btn-danger hidden-phone">Danger</button>
			</div>
		</div>

	</div>
	<div class="span6">

		<!-- Chat -->
		<div class="widget widget-chat margin-none">

			<div class="widget-head">
				<h4 class="heading">Chat</h4>
			</div>
			<div class="widget-body">

			<!-- Slim Scroll -->
			<div class="slim-scroll chat-items" data-scroll-height="222px">

				<!-- Media item -->
				<div class="media">
					<div class="media-object pull-left thumb"><img data-src="holder.js/51x51" alt="Image"></div>
					<div class="media-body">
						<blockquote>
							<small><a href="#" title="" class="strong">Martin</a> <cite>just now</cite></small>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae accumsan mauris. Donec vitae nibh felis, facilisis bibendum sapien.</p>
						</blockquote>
					</div>
				</div>
				<!-- // Media item END -->

				<!-- Media item -->
				<div class="media">
					<div class="media-object pull-right thumb"><img data-src="holder.js/51x51" alt="Image"></div>
					<div class="media-body right">
						<blockquote class="pull-right">
							<small><a href="#" title="" class="strong">John Doe</a><cite> 15 seconds ago</cite></small>
							<p>In ultricies ante eget tortor euismod vitae molestie eros hendrerit. Cras tristique, orci ac lacinia aliquet, velit risus laoreet lectus, eget sollicitudin metus orci non nulla.</p>
						</blockquote>
					</div>
				</div>
				<!-- // Media item END -->

				<!-- Media item -->
				<div class="media">
					<div class="media-object pull-left thumb"><img data-src="holder.js/51x51" alt="Image"></div>
					<div class="media-body">
						<blockquote>
							<small><a href="#" title="" class="strong">Ricky</a> <cite>5 minutes ago</cite></small>
							<p>Pellentesque ac turpis turpis. Aliquam erat volutpat. Proin semper auctor mauris vel tempor. Ut eget turpis neque. Nam ultricies tortor eu odio ultricies euismod.</p>
						</blockquote>
					</div>
				</div>
				<!-- // Media item END -->

			</div>
			<!-- // Slim Scroll END -->

			</div>

			<div class="chat-controls">
				<div class="innerLR">
					<form class="margin-none">
						<div class="row-fluid">
							<div class="span10">
								<input type="text" name="message" class="input-block-level margin-none" placeholder="Type your message .." />
							</div>
							<div class="span2">
								<button type="submit" class="btn btn-block btn-inverse">Send</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
		<!-- // Chat END -->

	</div>
	</div>
	<div class="separator bottom"></div>

</div>

<div class="widget widget-gallery widget-gallery-slide margin-bottom-none" data-toggle="collapse-widget">
	<div class="widget-head"><h4 class="heading">Photo Gallery</h4></div>
	<div class="widget-body">

		<!-- Gallery Layout -->
		<div class="gallery gallery-2">
			<ul class="row-fluid" data-toggle="modal-gallery" data-target="#modal-gallery" id="gallery-4" data-delegate="#gallery-4">
								<li class="span3"><a class="thumb" href="../common/theme/images/gallery-2/1.jpg" data-gallery="gallery"><img src="../common/theme/images/gallery-2/1.jpg" alt="photo" /></a></li>
								<li class="span3"><a class="thumb" href="../common/theme/images/gallery-2/2.jpg" data-gallery="gallery"><img src="../common/theme/images/gallery-2/2.jpg" alt="photo" /></a></li>
								<li class="span3"><a class="thumb" href="../common/theme/images/gallery-2/3.jpg" data-gallery="gallery"><img src="../common/theme/images/gallery-2/3.jpg" alt="photo" /></a></li>
								<li class="span3 hidden-phone"><a class="thumb" href="../common/theme/images/gallery-2/4.jpg" data-gallery="gallery"><img src="../common/theme/images/gallery-2/4.jpg" alt="photo" /></a></li>
							</ul>
		</div>
		<!-- // Gallery Layout END -->

		<span class="nav nav-left disabled glyphicons standard left_arrow"><i></i></span>
		<span href="" class="nav nav-right glyphicons standard right_arrow"><i></i></span>

	</div>
</div>

<div class="row-fluid row-merge border-bottom">
	<div class="span6">

	<!-- Inner -->
	<div class="innerAll">

		<!-- Row -->
		<div class="row-fluid">
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2">
					<span class="sparkline"></span>
					<span class="txt"><span class="count">2,566</span> Sales</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2 widget-stats-3">
					<span class="sparkline success"></span>
					<span class="txt"><span class="count">12,566</span> Photos</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2 widget-stats-3">
					<span class="sparkline danger"></span>
					<span class="txt"><span class="count">12,566</span> Photos</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
		</div>
		<!-- // Row END -->

	</div>
	<!-- // Inner END -->

	</div>
	<div class="span6">

	<!-- Inner -->
	<div class="innerAll">

		<!-- Row -->
		<div class="row-fluid">
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie">
					<div data-percent="75" class="easy-pie"><span class="value">75</span>%</div>
					<span class="txt"><span class="count">2,566</span> Sales</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie txt-single">
					<div data-percent="85" class="easy-pie danger"><span class="value">85</span>%</div>
					<span class="txt">Server workload</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
			<div class="span4">

				<!-- Stats Widget -->
				<a href="" class="widget-stats widget-stats-2 widget-stats-easy-pie">
					<div data-percent="23" class="easy-pie inverse"><span class="value">23</span>%</div>
					<span class="txt"><span class="count">1,244</span> Emails</span>
					<div class="clearfix"></div>
				</a>
				<!-- // Stats Widget END -->

			</div>
		</div>
		<!-- // Row END -->

	</div>
	<!-- // Inner END -->

	</div>
</div>
<div class="separator bottom"></div>
<div class="innerLR">

	<div class="row-fluid">
		<div class="span6">

			<!-- Stats/List/Sparklines Widget -->
			<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">

				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons stats"><i></i>Overview</h4>
				</div>
				<!-- // Widget Heading END -->

				<div class="widget-body list">
					<ul>

						<!-- List item -->
						<li>
							<span class="count">350,254 <span class="sparkline"></span></span>
							Visits						</li>
						<!-- // List item END -->

						<!-- List item -->
						<li>
							<span class="count">120,103 <span class="sparkline"></span></span>
							Visitors						</li>
						<!-- // List item END -->

						<!-- List item -->
						<li>
							<span class="count">5,156,392 <span class="sparkline"></span></span>
							Pageviews						</li>
						<!-- // List item END -->

					</ul>
				</div>
			</div>
			<!-- Stats/List/Sparklines Widget END -->

			<!-- Stats/List/Sparklines Widget -->
			<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">

				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons heart"><i></i>Interest</h4>
				</div>
				<!-- // Widget Heading END -->

				<div class="widget-body list">
					<ul>

						<!-- List item -->
						<li>
							<span class="count">00:01:59 <span class="sparkline"></span></span>
							avg.time						</li>
						<!-- // List item END -->

						<!-- List item -->
						<li>
							<span class="count">48% <span class="sparkline"></span></span>
							returning						</li>
						<!-- // List item END -->

					</ul>
				</div>
			</div>
			<!-- // Stats/List/Sparklines Widget END -->

			<!-- Activity/List Widget -->
			<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">

				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons history"><i></i>Activity</h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<!-- // Widget Heading END -->

				<div class="widget-body list">
					<ul>

						<!-- List item -->
						<li>
							<span>Sales today</span>
							<span class="count">&euro;5,900</span>
						</li>
						<!-- // List item END -->

						<!-- List item -->
						<li>
							<span>Some other stats</span>
							<span class="count">36,900</span>
						</li>
						<!-- // List item END -->

					</ul>
				</div>
			</div>
			<!-- // Activity/List Widget END -->

			<!-- Latest Orders/List Widget -->
			<div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">

				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons cart_in"><i></i>Last orders</h4>
					<a href="" class="details pull-right">view all</a>
				</div>
				<!-- // Widget Heading -->

				<div class="widget-body list products">
					<ul>

						<!-- List item -->
						<li>
							<span class="img">photo</span>
							<span class="title">10 items<br/><strong>&euro;5,900.00</strong></span>
							<span class="count"></span>
						</li>
						<!-- // List item END -->

						<!-- List item -->
						<li>
							<span class="img">photo</span>
							<span class="title">Product name<br/><strong>&euro;2,900</strong></span>
							<span class="count"></span>
						</li>
						<!-- // List item END -->

					</ul>
				</div>
			</div>
			<!-- // Latest Orders/List Widget END -->

			<!-- Comments Widget -->
			<div class="widget widget-scroll" data-scroll-height="223px" data-toggle="collapse-widget" data-collapse-closed="true">

				<!-- Widget Heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons conversation"><i></i>Comments</h4>
				</div>
				<!-- // Widget Heading END -->

				<div class="widget-body">
					<div>

						<!-- Media item -->
						<div class="media">
							<img class="media-object pull-left thumb" data-src="holder.js/51x51" alt="Image" />
							<div class="media-body">
								<blockquote>
									  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae accumsan mauris. Donec vitae nibh felis, facilisis bibendum sapien. Duis a odio id erat scelerisque fermentum in ut leo. Suspendisse potenti. Nunc semper cursus dui luctus porttitor. Donec facilisis semper magna sit amet ullamcorper. Cras rutrum magna eget risus vulputate congue. Sed sem libero, dignissim sit amet viverra vitae, suscipit sit amet elit. Integer tincidunt risus in metus rhoncus molestie.</p>
									  <small><a href="#" title="">John Doe</a><cite> | client @ Famous Company</cite></small>
								</blockquote>
							</div>
						</div>
						<!-- // Media item END -->

						<!-- Media item -->
						<div class="media">
							<img class="media-object pull-right thumb" data-src="holder.js/51x51" alt="Image" />
							<div class="media-body">
								<blockquote class="pull-right">
									  <p>In ultricies ante eget tortor euismod vitae molestie eros hendrerit. Cras tristique, orci ac lacinia aliquet, velit risus laoreet lectus, eget sollicitudin metus orci non nulla. Pellentesque ac turpis turpis. Aliquam erat volutpat. Proin semper auctor mauris vel tempor. Ut eget turpis neque. Nam ultricies tortor eu odio ultricies euismod. Nulla rhoncus iaculis felis vulputate euismod. Maecenas sapien arcu, gravida eu tincidunt vel, ultricies ullamcorper neque.</p>
									  <small><a href="#" title="">John Doe</a><cite> | client @ Famous Company</cite></small>
								</blockquote>
							</div>
						</div>
						<!-- // Media item END -->

					</div>
				</div>
			</div>
			<!-- // Comments Widget END -->

		</div>
		<div class="span6">

			<!-- Traffic Sources Pie Chart -->
			<div class="widget" data-toggle="collapse-widget" data-collapse-closed="false">
				<div class="widget-head">
					<h4 class="heading glyphicons pie_chart"><i></i>Traffic sources</h4>
				</div>
				<div class="widget-body">
					<div id="pie" style="height: 221px;"></div>
				</div>
			</div>
			<!-- // Traffic Sources Pie Chart END -->

		</div>
	</div>
</div>


		</div>
		<!-- // Content END -->

				</div>
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->

		<div id="footer" class="hidden-print">

			<!--  Copyright Line -->
			<div class="copy">&copy; 2012 - 2015 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/item/ergo-admin-ui-template/4602755?ref=mosaicpro" target="_blank">Purchase Ergo on ThemeForest</a> - Current version: v1.2 / <a target="_blank" href="http://demo.mosaicpro.biz/ergoadmin/CHANGELOG">changelog</a></div>
			<!--  End Copyright Line -->

		</div>
		<!-- // Footer END -->

	</div>
	<!-- // Main Container Fluid END -->


<!-- Themer -->
<div id="themer" class="collapse">
	<div class="wrapper">
		<span class="close2">&times; close</span>
		<h4>Themer <span>color options</span></h4>
		<ul>
			<li>Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>
			<li>Primary Color: <input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" /><div class="clearfix"></div></li>
			<li>
				<span class="link" id="themer-custom-reset">reset theme</span>
				<span class="pull-right"><label>advanced <input type="checkbox" value="1" id="themer-advanced-toggle" /></label></span>
			</li>
		</ul>
		<div id="themer-getcode" class="hide">
			<hr class="separator" />
			<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i>Get LESS</button>
			<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i>Get CSS</button>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- // Themer END -->

	<!-- Modal Gallery -->
	<div id="modal-gallery" class="modal modal-gallery hide fade hidden-print" tabindex="-1">
	    <div class="modal-header">
	        <a class="close" data-dismiss="modal">&times;</a>
	        <h3 class="modal-title"></h3>
	    </div>
	    <div class="modal-body"><div class="modal-image"></div></div>
	    <div class="modal-footer">
	        <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
	        <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
	        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
	        <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
	    </div>
	</div>
	<!-- // Modal Gallery END -->

	<!-- JQuery -->
	<script src="../common/theme/scripts/plugins/system/jquery.min.js"></script>

	<!-- JQueryUI -->
	<script src="../common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="../common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>


	<!-- Modernizr -->
	<script src="../common/theme/scripts/plugins/system/modernizr.js"></script>

	<!-- Bootstrap -->
	<script src="../common/bootstrap/js/bootstrap.min.js"></script>

	<!-- SlimScroll Plugin -->
	<script src="../common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>

	<!-- Common Demo Script -->
	<script src="../common/theme/scripts/demo/common.js?1439461910"></script>

	<!-- Holder Plugin -->
	<script src="../common/theme/scripts/plugins/other/holder/holder.js"></script>

	<!-- Uniform Forms Plugin -->
	<script src="../common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Global -->
	<script>
	var basePath = '../common/';
	</script>

	<!-- Bootstrap Extended -->
	<script src="../common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="../common/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="../common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="../common/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
	<script src="../common/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js"></script>
	<script src="../common/bootstrap/extend/bootbox.js"></script>
	<script src="../common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"></script>
	<script src="../common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"></script>

	<!-- Google Code Prettify -->
	<script src="../common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>

	<!-- Gritter Notifications Plugin -->
	<script src="../common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>

	<!-- Notyfy Notifications Plugin -->
	<script src="../common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>

	<!-- MiniColors Plugin -->
	<script src="../common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>

	<!-- DateTimePicker Plugin -->
	<script src="../common/theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Cookie Plugin -->
	<script src="../common/theme/scripts/plugins/system/jquery.cookie.js"></script>

	<!-- Colors -->
	<script>
	var primaryColor = '#8ec657',
		dangerColor = '#b55151',
		successColor = '#609450',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	</script>

	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="../common/theme/scripts/demo/themer.js"></script>

	<!-- Twitter Feed -->
	<script src="../common/theme/scripts/demo/twitter.js"></script>

	<!-- Easy-pie Plugin -->
	<script src="../common/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>

	<!-- Sparkline Charts Plugin -->
	<script src="../common/theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>

	<!-- Ba-Resize Plugin -->
	<script src="../common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>

	<!-- Dashboard Demo Script -->
	<script src="../common/theme/scripts/demo/index.js?1439461910"></script>


	<!-- Google JSAPI -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<!--  Flot Charts Plugin -->
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.js"></script>
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.pie.js"></script>
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js"></script>
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script>
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.resize.js"></script>
	<script src="../common/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js"></script>

	<!-- Charts Helper Demo Script -->
	<script src="../common/theme/scripts/demo/charts.helper.js?1439461910"></script>


	<!-- Bootstrap Image Gallery -->
	<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
	<script src="../common/bootstrap/extend/bootstrap-image-gallery/js/bootstrap-image-gallery.min.js" type="text/javascript"></script>

</body>
</html>
