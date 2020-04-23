<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo base_url();	?>" class="site_title">
				<i class="fa fa-university" aria-hidden="true"></i> <span style='color: #000;'>Dashboard </span>
			</a>
		</div>

		<div class="clearfix"></div>

		<!-- menu prile quick info -->
		<div class="profile" style='display: none;'>
			<div class="profile_pic">
				<img src="<?php echo base_url(); ?>assets/images/img.jpg" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2><?php //echo $this->tank_auth->get_user_full_name();
					?></h2>
			</div>
		</div>
		<!-- /menu prile quick info -->
		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<!---  <h3 style="float:left; margin:10px 0; width:100%;">General Menu </h3>  ---->
				<ul class="nav side-menu">
					<li>
						<a><i class="fa fa-book"></i> Setup <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li> <a href="<?php echo  base_url(); ?>class_routine_create"> Class Routine </a> </li>
							<li> <a href="<?php echo  base_url(); ?>class_create"> Class </a> </li>
							<li> <a href="<?php echo  base_url(); ?>subject_create"> Subject </a> </li>
							<li> <a href="<?php echo  base_url(); ?>app_info_create"> App Info </a> </li>
						</ul>
					</li>
					<li><a><i class="fa fa-book"></i> Reports<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li> <a href="<?php echo  base_url(); ?>/"> Class Routine </a> </li>
							<li> <a href="<?php echo  base_url(); ?>class_list"> Class List </a> </li>
							<li> <a href="<?php echo  base_url(); ?>subject_list"> Subject List </a> </li>
							<li> <a href="<?php echo  base_url(); ?>app_info_list"> App Info List </a> </li>
						</ul>
					</li>
					<li>
						<a><i class="fa fa-book"></i> Users Report <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li> <a href="<?php echo base_url(); ?>users_show">Users</a> </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- /sidebar menu -->

		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a href="<?php echo base_url(); ?>auth/logout" data-toggle="tooltip" data-placement="top" title="Logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>