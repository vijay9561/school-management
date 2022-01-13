<style>
@media(max-width:768px){
	
	.collapse.in {
    display: block;
    margin-top:44px;
}
}
.logininmages{
width: 106px;
margin-top: -16px;
}
.goog-te-banner-frame.skiptranslate { display: none !important;} 
body { top: 0px !important; }
#goog-gt-tt{display: none !important; top: 0px !important; } 
.goog-tooltip skiptranslate{display: none !important; top: 0px !important; } 
.activity-root { display: hide !important;} 
.status-message { display: hide !important;}
.started-activity-container { display: hide !important;}
</style>
<nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	  <?php if(isset($_SESSION['PRINCIPLE_ID'])){
	  if($_SESSION['USERTYPE']=='clerk'){ 
	  $login_id=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
	  $login=$login_id->login_id;
	  $images=$this->db->query("select Principle_schools_image from tbl_principle where Pid='$login'")->row();
	   }else{
	    $images=$this->db->query("select Principle_schools_image from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
	   }
	    
	  } 
	  if(isset($_SESSION['TEACHER_ID'])){
	  $images=$this->db->query("select p.Principle_schools_image from tbl_teacher t inner join tbl_principle p on  p.Pid=t.Pid where Tid='".$_SESSION['TEACHER_ID']."'")->row();
	  }
	  if(isset($_SESSION['PARENT_ID'])){
	  $images=$this->db->query("select p.Principle_schools_image from tbl_parent t inner join tbl_principle p on  p.Pid=t.pid where Ptid='".$_SESSION['PARENT_ID']."'")->row();
	//  echo $this->db->last_query();
	  }
	  ?>
      <a class="navbar-brand" href="<?php echo site_url(); ?>" style=""><span>
	  <?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PARENT_ID']))){ ?>
	  <?php if(!empty($images->Principle_schools_image)){ ?>
	  <img src="<?php echo site_url(); ?>assets/profile/<?php echo $images->Principle_schools_image; ?>" class="logininmages" / >
	  <?php }else{ ?><img src="<?php echo site_url(); ?>assets/img/default.png" class="logininmages" /><?php } ?>
	  <?php }else{ ?>
	  SCHOOLS MANAGEMENT
	  <?php  } ?>
	  </span>
	  </a>
	  <?php if((!isset($_SESSION['PRINCIPLE_ID'])) && (!isset($_SESSION['TEACHER_ID'])) && (!isset($_SESSION['PARENT_ID']))){ ?>
     <ul class="user-menu">
	 <li class="dropdown pull-right" id="load_me" style="margin-top:-12px;">
<span id="google_translate_element"></span>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	  </li>
	 </li>
	 </ul>
	 <?php }  ?>
	  <?PHP if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
      <ul class="user-menu">
	  
	    <li class="dropdown pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-user"></i>
          <?php echo $_SESSION['PRINCIPLE_USERNAME']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo site_url(); ?>principle-profile"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="<?php echo site_url(); ?>change-password">
			<i class="fa fa-pencil"></i>
              Change Password</a></li>
            <li><a href="<?php echo site_url(); ?>logoutprinciple">
              <i class="fa fa-circle-o-notch"></i>
              Logout</a></li>
          </ul>
        </li>
       <?php /*?> <li class="pull-right"><a href="pin-code-master.php"><i class="fa fa-map-marker"></i> Location</a>&nbsp;&nbsp;&nbsp;</li><?php */?>&nbsp;&nbsp;&nbsp;
		<li class="dropdown pull-right" id="load_me" style="margin-top:-12px;">
<span id="google_translate_element"></span>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	  </li>
	  </ul>
	  <?php } ?>
	  
	  <?PHP if(isset($_SESSION['TEACHER_ID'])) { ?>
      <ul class="user-menu">
        <li class="dropdown pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-user"></i>
          <?php echo $_SESSION['TEACHER_USERNAME']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo site_url(); ?>teacher-profile"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="<?php echo site_url(); ?>change-password">
			<i class="fa fa-pencil"></i>
              Change Password</a></li>
            <li><a href="<?php echo site_url(); ?>logoutprinciple">
              <i class="fa fa-circle-o-notch"></i>
              Logout</a></li>
          </ul>
        </li>
       <?php /*?> <li class="pull-right"><a href="pin-code-master.php"><i class="fa fa-map-marker"></i> Location</a>&nbsp;&nbsp;&nbsp;</li><?php */?>&nbsp;&nbsp;&nbsp;
		<li class="dropdown pull-right" id="load_me" style="margin-top:-12px;">
<span id="google_translate_element"></span>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	  </li>
	  </ul>
	  <?php } ?>
	   <?PHP if(isset($_SESSION['PARENT_ID'])) { ?>
      <ul class="user-menu">
        <li class="dropdown pull-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-user"></i>
          <?php echo $_SESSION['PARENT_USERNAME']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo site_url(); ?>parent-profile"><i class="fa fa-user"></i> Profile</a></li>
            <?php /*?><li><a href="<?php echo site_url(); ?>change-password">
			<i class="fa fa-pencil"></i>
              Change Password</a></li>
<?php */?>            <li><a href="<?php echo site_url(); ?>logoutprinciple">
              <i class="fa fa-circle-o-notch"></i>
              Logout</a></li>
          </ul>
        </li>
       <?php /*?> <li class="pull-right"><a href="pin-code-master.php"><i class="fa fa-map-marker"></i> Location</a>&nbsp;&nbsp;&nbsp;</li><?php */?>&nbsp;&nbsp;&nbsp;
		<li class="dropdown pull-right" id="load_me" style="margin-top:-12px;">
<span id="google_translate_element"></span>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	  </li>
	  </ul>
	  <?php } ?>
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
</script>
    <style>
#subordersmenu li a{
color:#30a5ff;background-color:#FFFFFF;
}
#subordersmenu li a:hover{ background-color:#0099FF; color:#FFFFFF;}
.submenuactive{ background-color:#0099FF; color:#FFFFFF;}
</style>
	</li>
    <li class="<?php if($page=='Schools Mangement'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
	<?php if((isset($_SESSION['PRINCIPLE_ID']))) {  ?>
    <li  class="dropdown <?php if($page=='New Teacher Create'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Staff Mangement<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">
<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
        <li><a class="#" href="<?php echo site_url(); ?>teacher-create"><i class="fa fa-sign-in" aria-hidden="true"></i>Create Teacher</a></li>
		<?php } ?>
        <li ><a class="#" href="<?php echo site_url(); ?>teacher-list"><i class="fa fa-sign-in" aria-hidden="true"></i> Teacher List</a></li>
      </ul>
	</li>
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
	<li class="<?php if($page=='New Student Registration'){ echo 'active'; }else{echo '0';} ?>">
	 <a href="<?php echo site_url(); ?>new-student-registration"><i class="fa fa-child" aria-hidden="true"></i> Add New Student</a></li>	
	 <?php } ?>
	  <li class="<?php if($page=='Student List Clerk'){ echo 'active'; }else{echo '0';} ?>">
	 <a href="<?php echo site_url(); ?>student-list-clerk"><i class="fa fa-list" aria-hidden="true"></i> Student List</a></li>	
	<?php if($_SESSION['USERTYPE']=='principal'){ ?>
	 <li  class="dropdown <?php if($page=='Create Clerek' || $page=='Clerk List'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Create Clerk<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">
        <li><a   class="#" href="<?php echo site_url(); ?>create-clerek"><i class="fa fa-sign-in" aria-hidden="true"></i>Create Teacher</a></li>
        <li ><a class="#" href="<?php echo site_url(); ?>clerk-list"><i class="fa fa-sign-in" aria-hidden="true"></i> Clerk List</a></li>
      </ul>
	</li>
	
<?php } ?>
	<li class="<?php if($page=='Student Attendance List Admin'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>student-attendance-list-admin">Student Attendance List</a></li>
	<li  class="dropdown <?php if($page=='Create Event' || $page=='Holiday List'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar" aria-hidden="true"></i> Holiday Mangement<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">
<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
        <li><a   class="#" href="<?php echo site_url(); ?>create-event"><i class="fa fa-calendar" aria-hidden="true"></i> Add Holiday </a></li>
	<?PHP } ?>
        <li ><a class="#" href="<?php echo site_url(); ?>holiday-list"><i class="fa fa-calendar" aria-hidden="true"></i> Holiday List</a></li>
      </ul>
	</li>
		<li class="<?php if($page=='Notification'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>notification"><i class="fa fa-globe"></i> Notification</a></li>
	<?php }elseif((isset($_SESSION['TEACHER_ID']))) { ?>
	 <li  class="dropdown <?php if($page=='Student List' || $page=='Student Attendance' ||  $page=='Student Attendance List'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file" aria-hidden="true"></i> Report<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">	
	  <li class="">
	 <a href="<?php echo site_url(); ?>student-list"><i class="fa fa-list" aria-hidden="true"></i> Student List</a></li>	
	 <li class="">
	 <a href="<?php echo site_url(); ?>student-attendance"><i class="fa fa-list" aria-hidden="true"></i> Student Attendance</a></li>	
	 <li class="">
	 <a href="<?php echo site_url(); ?>attendance-student-list"><i class="fa fa-list" aria-hidden="true"></i> Attendance List</a></li>	
	  <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i> Time Table School</a></li>	
	 <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i> Time Table Exam</a></li>	
	 <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i> Result</a></li>	
	 </ul></li>
	 <li  class="dropdown <?php if($page=='Individual Notification' || $page=='Common Notification'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Notification<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">	
	  <?php /*?><li class=""> <a href="<?php echo site_url(); ?>common_notification"><i class="fa fa-list" aria-hidden="true"></i> Common Notification</a></li>	<?php */?>
	 <li class=""><a href="<?php echo site_url(); ?>individual_notification"><i class="fa fa-list" aria-hidden="true"></i> Individual Notification</a></li> </ul></li>
<?PHP }elseif((isset($_SESSION['PARENT_ID']))){ 
?>
<li  class="dropdown <?php if($page=='Individual Notification' || $page=='Common Notification'){ echo 'active'; }else{echo '0';} ?>">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Report<span class="caret"></span></a>
<ul class="dropdown-menu" id="subordersmenu" role="menu" style="width: 100%;">	
	  <?php /*?><li class=""> <a href="<?php echo site_url(); ?>common_notification"><i class="fa fa-list" aria-hidden="true"></i> Common Notification</a></li>	<?php */?>
	 <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i> Studant Attendance</a></li> 
	  <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i>  Time Table School</a></li> 
	  <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i>  Time Table Exam</a></li> 
	   <li class=""><a href="<?php echo site_url(); ?>comming_soons"><i class="fa fa-list" aria-hidden="true"></i>  Result</a></li> 
	 </ul>
	 
	 </li>
	  <li class="<?php if($page=='Parent Notification'){ echo 'active'; }else{echo '0';} ?>">
	 <a href="<?php echo site_url(); ?>parent_notifications"><i class="fa fa-globe" aria-hidden="true"></i> Notification</a></li>	
<?php
}else{?>
 <li  class="<?php if($page=='Principle Registration'){ echo 'active'; }else{echo '0';} ?>"><a href="<?php echo site_url(); ?>principle-registration"><i class="fa fa-university" aria-hidden="true"></i> Principal Register<?PHP //echo $_SESSION['PRINCIPLE_ID']; ?></a></li>		
<li class="dropdown <?php if($page=='Principle Login' || $page=='Teacher Login' || $page=='Parent Login'){ echo 'active'; }else{echo '0';} ?>">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in" aria-hidden="true"></i> Login<span class="caret"></span></a>
	
	 <ul class="dropdown-menu <?php if($page=='Teacher Login' || $page=='Parent Login' || $page=='Principle Login'){ echo 'active'; }else{echo '0';} ?>" id="subordersmenu" role="menu" style="width: 100%;">
        <li><a   class="#" href="<?php site_url(); ?>parent-login"><i class="fa fa-sign-in" aria-hidden="true"></i> Parent Login</a></li>
        <li ><a class="#" href="<?php echo site_url(); ?>teacher-login"><i class="fa fa-sign-in" aria-hidden="true"></i> Teacher Login</a></li>
        <li ><a class=""  href="<?php echo site_url(); ?>principle-login"><i class="fa fa-sign-in" aria-hidden="true"></i> Principal Login</a></li>
      </ul>
</li>

<?php } ?>
	</ul>
</div>