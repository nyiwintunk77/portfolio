
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo ADMIN_URL;?>" class="simple-text">
                    Moving Forward
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if($page_title == "DASHBOARD"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_DASHBOARD_LINK; ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "TOUR PACKAGES" || $parent_page == "TOUR PACKAGES"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_TOUR_PACKAGES_LINK; ?>">
                        <i class="pe-7s-plane"></i>
                        <p>Tour Packages</p>
                    </a>
                </li>

                <li class="<?php if($page_title == "PURCHASE MANAGEMENT" || $parent_page == "PURCHASE MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_PURCHASE_MANAGE_LINK; ?>">
                        <i class="pe-7s-shopbag"></i>
                        <p>Purchase Management</p>
                    </a>
                </li>
                 <li class="<?php if($page_title == "USER MANAGEMENT" || $parent_page == "USER MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_USER_MANAGE_LINK; ?>">
                        <i class="pe-7s-users"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "HOTEL MANAGEMENT" || $parent_page == "HOTEL MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_HOTEL_MANAGE_LINK; ?>">
                        <i class="pe-7s-culture"></i>
                        <p>Hotel Management</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "CAR MANAGEMENT" || $parent_page == "CAR MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_CAR_MANAGE_LINK; ?>">
                        <i class="pe-7s-car"></i>
                        <p>Car Management</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "RESTAURANT MANAGEMENT" || $parent_page == "RESTAURANT MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_RESTAURANT_MANAGE_LINK; ?>">
                        <i class="pe-7s-piggy"></i>
                        <p>Restaurant Management</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "DESTINATION MANAGEMENT" || $parent_page == "DESTINATION MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_DESTINATION_MANAGE_LINK; ?>">
                        <i class="pe-7s-map-marker"></i>
                        <p>Destination Management</p>
                    </a>
                </li>
                <li class="<?php if($page_title == "DELIVERY MANAGEMENT" || $parent_page == "DELIVERY MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_DELIVERY_MANAGE_LINK; ?>">
                        <i class="pe-7s-paper-plane"></i>
                        <p>Delivery Management</p>
                    </a>
                </li>
                   <li class="<?php if($page_title == "TICKET MANAGEMENT" || $parent_page == "TICKET MANAGEMENT"){ echo "active"; }?>">
                    <a href="<?php echo ADMIN_TICKET_MANAGE_LINK; ?>">
                        <i class="pe-7s-paper-plane"></i>
                        <p>Ticket Management</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo ADMIN_LOGOUT_LINK; ?>">
                        <i class="pe-7s-right-arrow"></i>
                        <p>Logout</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Welcome, <?php echo $db_admin_username; ?></p>
                            </a>
                        </li>
                        
                        <li>
                            <a href="<?php echo ADMIN_LOGOUT_LINK; ?>">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
