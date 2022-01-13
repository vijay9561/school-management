<style>
@media(max-width:768px){
	
	.collapse.in {
    display: block;
    margin-top: 93px;
}
}
</style>
<nav  class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div  class="container-fluid">
<div  class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="<?php echo site_url(); ?>deshboard"><span>Vimlai School Management</span> Admin</a>
<ul class="user-menu">
<li class="dropdown pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> <?php echo $_SESSION['SUPPER_ADMIN_USERNAME']; ?> <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?php echo site_url(); ?>admin-change-password"> <i class="fa fa-pencil"></i> Change Password</a></li>
    <li><a href="<?php echo site_url(); ?>supper_admin_controller/logoutuser"> <i class="fa fa-circle-o-notch"></i> Logout</a></li>
  </ul>
</li>
<?php /*?> <li class="pull-right"><a href="pin-code-master.php"><i class="fa fa-map-marker"></i> Location</a>&nbsp;&nbsp;&nbsp;</li><?php */?>
<li class="dropdown pull-right" id="load_me"> </li>
</div>
</div>
<!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
  <ul class="nav menu">
    <script>
<?php /*?>function updathidenotification(){
			$.ajax({
			url: "post.php?action=update_mynotifications",
			type: 'POST',
			data: {},
			success: function(data) {
			//$("#load_me").fadeOut().html(data).fadeIn('slow');
			}
			});
}
 $(document).ready(function() {
                function loadData() {
                    $('#load_me').load('js.php', function() {
                       if (window.reloadData != 0)
                           window.clearTimeout(window.reloadData);
                       window.reloadData = window.setTimeout(loadData,2000)
                   }).fadeIn("slow"); 
                }
             window.reloadData = 0; // store timer load data on page load, which sets timeout to reload again
               loadData();
            });<?php */?>
</script>
    <style>
#subordersmenu li a{
color:#30a5ff;background-color:#FFFFFF;
}
#subordersmenu li a:hover{ background-color:#0099FF; color:#FFFFFF;}
.submenuactive{ background-color:#0099FF; color:#FFFFFF;}
</style>
    <li class="<?php if($page=='Supper Admin Dashboard'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>deshboard"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a></li>
    <li  class="<?php if($page=='Principle View'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>admin-principle"><i class="fa fa-university" aria-hidden="true"></i> Schools</a></li>
    <li  class="<?php if($page=='Slider Images'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>main_sliders"><i class="fa fa-image" aria-hidden="true"></i> Slider Images</a></li>
    <li  class="<?php if($page=='Admin Notification'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>notification-admin"><i class="fa fa-globe" aria-hidden="true"></i> Notification</a></li>
    <li  class="<?php if($page=='Class Division Master'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>division_and_class_master"><i class="fa fa-globe" aria-hidden="true"></i> Class & Division</a></li>
    <li  class="<?php if($page=='View Invoice Details' || $page=='Inovice Details'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>invoice_view_details"><i class="fa fa-file" aria-hidden="true"></i> Inovice Details</a></li>
    <li  class="<?php if($page=='Salesman Users' || $page=='Salesman Users'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>salesman_users"><i class="fa fa-users" aria-hidden="true"></i> Associate Users</a></li>
  <!--  <li  class="<?php if($page=='Partner Users' || $page=='Partner Users'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>partner_commision"><i class="fa fa-users" aria-hidden="true"></i> Partner Commission</a></li>-->
    <li  class="<?php if($page=='Common Notification'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>common-mail-notification"><i class="fa fa-envelope" aria-hidden="true"></i> Common Mail Alert</a></li>
    <li  class="dropdown <?php if($page=='Class Division Master'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Import Excel Sheet<span class="caret"></span></a>
      <ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">
        <li><a class="#" href="<?php echo site_url(); ?>admin_import_student_excel_sheet?student_excel=sheet"><i class="fa fa-sign-in" aria-hidden="true"></i> Student Sheet</a></li>
        <li><a class="#" href="<?php echo site_url(); ?>admin_import_student_excel_sheet?teacher_excel=sheet"><i class="fa fa-sign-in" aria-hidden="true"></i> Teacher Sheet</a></li>
      </ul>
    </li>
  </ul>
</div>
<script>
$(document).ready(function(){
		$('.pull-right').click(function(){
		$('.bg-success').hide();
		});
		});
</script>
