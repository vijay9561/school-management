<style>
.school-icons{
font-size:30px;
color:#ff5900;
font-weight: bold;
}
.logo-images{
    height: 101px;
    margin-top: -8px;
    width: 57%
}
@media(max-width:500px){
.school-icons{
font-size:22px;
color:#ff5900;
}
}
.login_text{border: 1px solid #8e09e7;}
.login_text:focus{border: 1px solid red;}
.navbar {
    border-radius: 0px;
}
.navbar-nav {
    float: right;
    margin: 0;
        margin-top: 21px;
}
.main_header{margin-bottom: 104px;}
.school_namge_heading{
color: #f83701;
margin-top: 8px;
text-shadow: 2px 2px 2px #3e3837;
font-weight: bold;
font-size: 30px;
text-align: center;}
.school_namge_heading1{ display: none;}
@media(max-width:500px){
  .main_header {
   margin-bottom: 62px;
}
.school_namge_heading{display: none;}
.logo-images{display: none;}
.navbar-nav {
    float: left;
    margin: 0;
        margin-top: 0px;
    margin-top: 21px;
    display: block;
    width: 100%;
}
.school_namge_heading1{
color: #f83701;
margin-top: 8px;
text-shadow: 2px 2px 2px #3e3837;
font-weight: bold;
font-size:18px;
text-align: center; display: block;width: 80%;}
}
</style>
<script>
// Capital
$(document).ready(function(){ $('[data-toggle="popover"]').popover(); });
</script>

<?php $school_details=$this->db->query("select Principle_school_name,Principle_schools_image from tbl_principle where Pid='".$_SESSION['SCHOOL_ID']."'")->row(); ?>
<div class="school-home-page-header main_header">
     
	
                    <!--<h2 class="school-icons">SCHOOL MANAGEMENT</h2>--> 
                <div class="navbar-fixed-top">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
          <h3 class="school_namge_heading1"> 
                    <?php if(isset($_SESSION['SCHOOL_ID'])) {  echo $school_details->Principle_school_name; }else{ ?>Vimlai School Management <?php } ?>
                </h3>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
        
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="row">
            <div class="col-md-2">
               
                <?php if(isset($_SESSION['SCHOOL_ID'])) { if(!empty($school_details->Principle_schools_image)){ ?>
                <a style="color:#FFFFFF;" href="<?php echo site_url(); ?>"><img class="logo-images" src="<?php echo base_url(); ?>assets/profile/<?php echo $school_details->Principle_schools_image;  ?>" /></a>
<?php }else{ ?>
 <a style="color:#FFFFFF;" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/vmbss_logo.jpeg" class="logo-images" />
                <?php } }else{ ?>
                <a style="color:#FFFFFF;" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/vmbss_logo.jpeg" class="logo-images" /></a>
<?php } ?>
            </div>
            <div class="col-md-4">
                <h3 class="school_namge_heading"> 
                    <?php if(isset($_SESSION['SCHOOL_ID'])) {  echo $school_details->Principle_school_name; }else{ ?>Vimlai School Management <?php } ?>
                </h3>
            </div>
            <div class="col-md-6">
      <ul class="nav navbar-nav">
	  <li class="<?php if($page=='Home') { echo 'active'; } ?>"><a href="<?php echo site_url(); ?>">Home</a></li>
	     <?php if((isset($_SESSION['PRINCIPLE_ID']))) {  ?>
    <?php if($_SESSION['USERTYPE']=='clerk'){  ?>
	<!-- Clerk Menu -->
    <li  class="dropdown <?php if($page=='New Teacher Create' || $page=='Create Time Table'   || $page=='New Student Registration' || $page=='Examination Time Table' || $page=='Notification' || $page=='Create Event' || $page=='Bonafied Certificate' || $page=='Applications List' || $page=='Student Fees Details'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i> Create<span class="caret"></span></a>
      <ul class="dropdown-menu"  role="menu" style="width: 100%;">
        <li><a class="#" href="<?php echo site_url(); ?>teacher-create"><i class="fa fa-user" aria-hidden="true"></i>Teacher</a></li>
        <li><a href="<?php echo site_url(); ?>new-student-registration"><i class="fa fa-child" aria-hidden="true"></i> Student</a></li>
        <li><a href="<?php echo site_url(); ?>create-event"><i class="fa fa-calendar" aria-hidden="true"></i> Holiday </a></li>
        <li><a href="<?php echo site_url(); ?>create-time-table"><i class="fa fa-calendar" aria-hidden="true"></i> School Time Table</a></li>
        <li><a href="<?php echo site_url(); ?>create-examination-time-table"><i class="fa fa-calendar" aria-hidden="true"></i> Examination Time Table </a></li>
		<li><a href="<?php echo site_url(); ?>clerk-application-request"><i class="fa fa-question-circle"></i> Application</a></li>
        <li><a href="<?php echo site_url(); ?>notification"><i class="fa fa-globe"></i> Notification</a></li>
		<li><a href="<?php echo site_url(); ?>student-fees-details"><i class="fa fa-inr"></i> Fees</a></li>
      </ul>
    </li>
    
    <li  class="dropdown <?php if($page=='Student Attendance List Admin' || $page=='View Time Table' || $page=='View Student Result' || $page=='Student History' || $page=='Teacher List' || $page=='Student List Clerk' || $page=='Holiday List'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bar-chart" aria-hidden="true"></i> Report<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
	  <li ><a class="#" href="<?php echo site_url(); ?>teacher-list"><i class="fa fa-user" aria-hidden="true"></i> Teacher List</a></li>
        <li><a href="<?php echo site_url(); ?>student-list-clerk"><i class="fa fa-users" aria-hidden="true"></i> Student List</a></li>
        <li ><a class="#" href="<?php echo site_url(); ?>holiday-list"><i class="fa fa-calendar" aria-hidden="true"></i> Holiday List</a></li>
        <li><a href="<?php echo site_url(); ?>student-attendance-list-admin"><i class="fa fa-list" aria-hidden="true"></i> Student Attendance List</a></li>
        <li><a href="<?php echo site_url(); ?>view-schools-time-table"><i class="fa fa-list" aria-hidden="true"></i> School Time Table</a></li>
        <li><a href="<?php echo site_url(); ?>view-exam-time-table"><i class="fa fa-calendar" aria-hidden="true"></i> Examination Time Table</a></li>
        <li><a href="<?php echo site_url(); ?>view-student-result"><i class="fa fa-calendar" aria-hidden="true"></i> Result</a></li>
		<li><a href="<?php echo site_url(); ?>student_history"><i class="fa fa-history"></i> Gendral Register</a></li>  
      </ul>
    </li>
 <li class="<?php if($page=='Slider Images') { echo 'active'; }else{ echo '0'; } ?>"><a href="<?php echo site_url(); ?>schools_slider"><i class="fa fa-image"></i> School Image</a></li>
	<!-- end -->
    <?php  }else{ ?>
	<!-- principal menu-->
	      <li  class="dropdown <?php if($page=='Create Clerek' || $page=='Clerk List'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i> Create Clerk<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li><a   class="#" href="<?php echo site_url(); ?>create-clerek"><i class="fa fa-plus" aria-hidden="true"></i>Create Teacher</a></li>
        <li ><a class="#" href="<?php echo site_url(); ?>clerk-list"><i class="fa fa-list" aria-hidden="true"></i> Clerk List</a></li>
      </ul>
    </li>
    <li  class="dropdown <?php if($page=='Student Attendance List Admin' || $page=='Invoice Details' || $page=='Schools Invoice Details' || $page=='View Student Result' || $page=='Student Fees Details'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file" aria-hidden="true"></i> Report<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class="#"><a href="<?php echo site_url(); ?>student-attendance-list-admin"><i class="fa fa-list" aria-hidden="true"></i> Student Attendance List</a></li>
        <li><a href="<?php echo site_url(); ?>schools_invoice_details"><i class="fa fa-list" aria-hidden="true"></i> Invoice Details</a></li>
      <!--  <li ><a class="#" href="<?php echo site_url(); ?>view-exam-time-table"><i class="fa fa-calendar" aria-hidden="true"></i> Examination Time Table</a></li>-->
        <li ><a class="#" href="<?php echo site_url(); ?>view-student-result"><i class="fa fa-calendar" aria-hidden="true"></i> Result</a></li>
		<li><a href="<?php echo site_url(); ?>student-fees-details"><i class="fa fa-inr"></i> Fees Details</a></li>
      </ul>
    </li>
	<!-- end--->
	<?php } ?>
	 <!-- Teacher Menu -->
	 <?php }elseif((isset($_SESSION['TEACHER_ID']))) { ?>
	 <li  class="dropdown <?php if($page=='Create Student Result' || $page=='Student Attendance'  || $page=='Create Ghoswara' || $page==''){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i> Create<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>create-student-result"><i class="fa fa-plus" aria-hidden="true"></i> Create Result</a></li>
        <li class=""><a href="<?php echo site_url(); ?>student-attendance"><i class="fa fa-plus" aria-hidden="true"></i> Student Attendance</a></li>
		<li class=""><a href="<?php echo site_url(); ?>create-final-result"><i class="fa fa-plus" aria-hidden="true"></i> Create Final Student</a></li>
		<li class=""><a href="<?php echo site_url(); ?>create-ghoswara"><i class="fa fa-plus" aria-hidden="true"></i> Create Ghoswara</a></li>
      </ul>
    </li>
    <li  class="dropdown <?php if($page=='Student List' ||  $page=='Student Attendance List' || $page=='View Time Table' || $page=='View Student Result'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file" aria-hidden="true"></i> Report<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""> <a href="<?php echo site_url(); ?>student-list"><i class="fa fa-list" aria-hidden="true"></i> Student List</a></li>
        <li class=""> <a href="<?php echo site_url(); ?>attendance-student-list"><i class="fa fa-list" aria-hidden="true"></i> Attendance List</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-schools-time-table"><i class="fa fa-list" aria-hidden="true"></i> School Time Table</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-exam-time-table"><i class="fa fa-list" aria-hidden="true"></i> Examination Time Table</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-student-result"><i class="fa fa-list" aria-hidden="true"></i> Result</a></li>
      </ul>
    </li>
    <li  class="dropdown <?php if($page=='Individual Notification' || $page=='Common Notification'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Notification<span class="caret"></span></a>
      <ul class="dropdown-menu"  role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>individual_notification"><i class="fa fa-list" aria-hidden="true"></i> Individual Notification</a></li>
      </ul>
    </li>
	<!-- end--->
	 <?PHP }elseif((isset($_SESSION['PARENT_ID']))){  ?>
	 <li  class="dropdown <?php if($page=='Individual Notification' || $page=='Common Notification' ||  $page=='Common Notification' || $page=='View Time Table' || $page=='View Student Result'){ echo 'active'; }else{echo '0';} ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Report<span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>attendance_calendar"><i class="fa fa-list" aria-hidden="true"></i> Studant Attendance</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-schools-time-table"><i class="fa fa-list" aria-hidden="true"></i> School Time Table</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-exam-time-table"><i class="fa fa-list" aria-hidden="true"></i> Examination Time Table</a></li>
        <li class=""><a href="<?php echo site_url(); ?>view-student-result"><i class="fa fa-list" aria-hidden="true"></i> Result</a></li>
      </ul>
    </li>
    <li  class="<?php if($page=='Application Request'){ echo 'active'; }else{echo '0';} ?>">
	<a href="<?php echo site_url(); ?>application-request"> <i class="fa fa-question-circle" aria-hidden="true"></i> Application</a>
	</li>
	<li class="<?php if($page=='Student Fees Details') { echo 'active'; }else{ echo '0'; } ?>"><a href="<?php echo site_url(); ?>student-fees-details"><i class="fa fa-inr"></i> Fees Details</a></li>
	    <?php }elseif(isset($_SESSION['SALES_ID'])) {  ?>
		<li class="<?php if($page=='Salesman School Details') { echo 'active'; }else{ echo '0'; } ?>"><a class="" href="<?php echo site_url(); ?>salesman-school-details"><i class="fa fa-list" aria-hidden="true"></i> Commission Details</a></li>
		<li class="<?php if($page=='About Us') { echo 'active'; } ?>"><a href="<?php echo site_url(); ?>about-us">About Us</a></li>
		<li class="<?php if($page=='Contact Us') { echo 'active'; } ?>"><a href="<?php echo site_url(); ?>contact-us">Contact Us</a></li>
	  <?php }else{ ?>
		<li class="<?php if($page=='About Us') { echo 'active'; } ?>"><a href="<?php echo site_url(); ?>about-us">About Us</a></li>
		<li class="<?php if($page=='Contact Us') { echo 'active'; } ?>"><a href="<?php echo site_url(); ?>contact-us">Contact Us</a></li>
		<li class="<?php if($page=='Terms & Condition') { echo 'active'; } ?>"><a href="<?php site_url(); ?>terms_and_condition">Policy</a></li>
                <li><a href="#" data-toggle="modal" data-target="#Login_Staff">Login</a></li>
		<li><a href="#" data-toggle="modal" data-target="#student_login">Student</a></li>
		<li><a href="#" data-toggle="modal" data-target="#sales_login">Associate</a></li>
		<?php } ?>
       <?php if(isset($_SESSION['SALES_ID'])){ ?>
             <li  class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Profile<span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>salesman-profiles"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
        <li class=""><a href="<?php echo site_url(); ?>change-password"><i class="fa fa-pencil" aria-hidden="true"></i> Change Password</a></li>
        <li class=""><a href="<?php echo site_url(); ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
             </ul></li> 
       <?php } ?>        
                
              <?php  if(isset($_SESSION['PRINCIPLE_ID'])){ ?>
             <li  class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Profile<span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>principle-profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
        <li class=""><a href="<?php echo site_url(); ?>change-password"><i class="fa fa-pencil" aria-hidden="true"></i> Change Password</a></li>
        <li class=""><a href="<?php echo site_url(); ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
             </ul></li> 
       <?php } ?>     
             
              <?php  if(isset($_SESSION['TEACHER_ID'])){ ?>
             <li  class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Profile<span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>teacher-profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
        <li class=""><a href="<?php echo site_url(); ?>change-password"><i class="fa fa-pencil" aria-hidden="true"></i> Change Password</a></li>
        <li class=""><a href="<?php echo site_url(); ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
             </ul></li> 
       <?php } ?>     
             
               <?php  if(isset($_SESSION['PARENT_ID'])){ ?>
             <li  class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe" aria-hidden="true"></i> Profile<span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu" style="width: 100%;">
        <li class=""><a href="<?php echo site_url(); ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
             </ul></li> 
       <?php } ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
    </div></div>
  </div><!-- /.container-fluid -->
</nav>
</div>
</div>           

<style>
.slider_bottom_border{
/*border-bottom: 2px solid #ab227e;*/
/*box-shadow: 3px -6px 11px 7px #8e09e7;*/
}
  .errormsg1 {
    color: #ff0249;
    font-size: 12px;
}
.title_border{
     text-shadow: 2px 2px 1px #8f7f8a;
    position: relative;
	text-align:center;
	margin-bottom: 0px;
}
.fixed_school_logo{
   top:330px;
    position:absolute;
    z-index: 1000;
    height: 100px;
    border-radius: 50%;
border: 2px solid #ab227e;
box-shadow: 0px 0px 0px 2px #8e09e7;
}
.fixed_message_postion{
position: fixed;
width: 57%;
top: 49px;
left: 240px;
padding-top: 0px;
background-color: #22ce1e;
}
.fixed_message_postion_dagner{
position: fixed;
width:50%;
top: 49px;
left: 240px;
padding-top: 0px;
background-color:red;
color:#FFFFFF;
padding-top:10px;
}
@media(max-width:500px){
.fixed_message_postion{
position: fixed;
width: 100%;
top: 10px;
padding-top: 0px;
background-color: #22ce1e;
left:0px;
}
.fixed_message_postion_dagner{
position: fixed;
width:100%;
top: 10px;
left: 100%;
padding-top: 0px;
background-color:red;
}
.title_border {
    text-shadow: 1px 1px 1px #8f7f8a;
    position: relative;
    text-align: center;
    margin-bottom: 0px;
    font-size: 16px;
    color: #000000;
}
.fixed_school_logo {
   position: absolute;
top: 200px;
z-index: 1000;
height: 75px;
border-radius: 50%;
right: 125px;
}
}
  </style>
<div class="col-lg-12">
  <?php if(isset($_SESSION['SUCESSMSG'])){ ?>
  <div class="alert bg-success fixed_message_postion" role="alert">
    <svg class="glyph stroked checkmark">
      <use xlink:href="#stroked-checkmark"></use>
    </svg>
    <?php echo $_SESSION['SUCESSMSG']; ?><a href="#" style="margin-top: 12px;" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> </div>
  <?php unset($_SESSION['SUCESSMSG']); } ?>
  <?php if(isset($_SESSION['ErrorsMsg'])) { ?>
  <div class="alert alert-danger fixed_message_postion_dagner"><?php echo $_SESSION['ErrorsMsg']; unset($_SESSION['ErrorsMsg']); ?></div>
  <?php } ?>
  <?php //unset($_SESSION['SUCESSMSG']); } ?>
</div>
<?php if(isset($_SESSION['PARENT_ID'])) { ?>
<style>
.navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :60%;   
    float:none !important;
	text-align:center;
}
@media(max-width:500px){
  .navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :100%;   
    float:none !important;
}

 }
 
 .error_msg{ color:#FF0000; font-size:12px;}
</style>
<?PHP } ?>
<script>
$(document).ready(function(){
setTimeout(function(){ $(".fixed_message_postion").fadeOut('slow'); }, 5000);
setTimeout(function(){ $(".fixed_message_postion_dagner").fadeOut('slow'); }, 5000);
		$('.pull-right').click(function(){
		$('.bg-success').hide();
		});
		});
</script>
<style>
.contactus_call{
position: absolute !important;
bottom: 20px !important;
width: 100%; background-color:#cf481b;}
@media(max-width:500px){
.contactus_call{position: absolute !important;
bottom: -29px !important;
width: 100%;}
}
.team{
    padding:20px 0;
}
h6.description{
	font-weight: bold;
	letter-spacing: 2px;
	color: #999;
	border-bottom: 1px solid rgba(0, 0, 0,0.1);
	padding-bottom: 5px;
}
.profile{
	margin-top: 25px;
}
.profile h1{
	font-weight: normal;
	font-size: 20px;
	margin:10px 0 0 0;
}
.profile h2{
	font-size: 14px;
	font-weight: lighter;
	margin-top: 5px;
}
.profile .img-box{
opacity: 1;
display: block;
position: relative;
border: 2px solid #30a5ff;
box-shadow: 0px 3px 6px 6px;
}
.profile .img-box:after{
	content:"";
	opacity: 0;
	background-color: rgba(0, 0, 0, 0.75);
	position: absolute;
	right: 0;
	left: 0;
	top: 0;
	bottom: 0;
}
.img-box ul{
	position: absolute;
	z-index: 2;
	bottom: 50px;
	text-align: center;
	width: 100%;
	padding-left: 0px;
	height: 0px;
	margin:0px;
	opacity: 0;
}
.profile .img-box:after, .img-box ul, .img-box ul li{
	-webkit-transition: all 0.5s ease-in-out 0s;
    -moz-transition: all 0.5s ease-in-out 0s;
    transition: all 0.5s ease-in-out 0s;
}
.img-box ul i{
	font-size: 20px;
	letter-spacing: 10px;
}
.img-box ul li{
	width: 30px;
    height: 30px;
    text-align: center;
    border: 1px solid #88C425;
    margin: 2px;
    padding: 5px;
	display: inline-block;
}
.img-box a{
	color:#fff;
}
.img-box:hover:after{
	opacity: 1;
}
.img-box:hover ul{
	opacity: 1;
}
.img-box ul a{
	-webkit-transition: all 0.3s ease-in-out 0s;
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out 0s;
}
.img-box a:hover li{
	border-color: #fff;
	color: #88C425;
}
a{
    color:#88C425;
}
a:hover{
    text-decoration:none;
    color:#519548;
}
i.red{
    color:#BC0213;
}
</style>
<script>

function Principle_emailr1(){if($('#Principle_email1').val()==''){}else{ $('#Principle_emailr1').html(' '); }}
function Principle_passwordr1(){if($('#Principle_password1').val()==''){}else{ $('#Principle_passwordr1').html(' '); }}

function login_users(){
var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
var  Principle_email=document.getElementById('Principle_email1').value.trim();
var  Principle_password=document.getElementById('Principle_password1').value.trim();

if(Principle_email==''){
$("#Principle_emailr1").html('Please enter email address');
$("#Principle_email1").focus();
return false;
}
var email1 = Principle_email.toLowerCase();
if (emailpattern.test(email1) == false){
$("#Principle_emailr1").html("Please enter valid email Id");
$("#Principle_email1").focus();       
return false;
}
if(Principle_password==''){
$("#Principle_passwordr1").html('Please enter password');
$("#Principle_password1").focus();
return false;
}
var formData = new FormData($("#commonloginusers")[0]);
$.ajax({   
url: "<?php site_url(); ?>users_controller/login_process",
type: "POST",
data : formData,
async: true,
cache: false,
contentType: false,
processData: false,
success: function(data){
if(data==1){
window.location='<?php echo site_url(); ?>';
return false;
}else {
  $("#errror_common_login").show();
  $("#errror_common_login").html("Email ID or Password Incorrect");
 }
}  
});
}
</script>
