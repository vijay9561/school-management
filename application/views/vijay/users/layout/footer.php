<style>

.footer {

    position: fixed;

    bottom:0px;

    width: 100%;

	background-color:#000;

	color:#FFFFFF;

	z-index: 99999;
	padding-top: 2.5px;
padding-bottom: 2.5px;

}

.footer11 {

    position: fixed;

    bottom:94px;

    width: 100%;

	color:#FFFFFF;
}
@media(max-width:1360px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:1024px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:950px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}

@media(max-width:850px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:768px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}

}
@media(max-width:500px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}
.footer11 {

    position: fixed;

    bottom:112px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:320px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}
}
</style><br><br>


<?php   ?>

<?php if((!isset($_SESSION['PARENT_ID'])) && (!isset($_SESSION['TEACHER_ID'])) && (!isset($_SESSION['PRINCIPLE_ID'])) ) {
 $expiry_date=date('Y-m-d');
$mysqlquerys=$this->db->query("select notification_name from notification_admin where expiry_date>='$expiry_date'")->result(); ?>
<?php if(count($mysqlquerys)>=1){ ?>
<style>
@media(max-width:868px){
.TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -32px;
}
}
</style>
<div class="row footer11">
<?php  //echo $this->db->last_query(); ?>
		<div class="col-md-12">
		 <div class="TickerNews" id="T3">
		    <div class="ti_wrapper">
		        <div class="ti_slide">
		            <div class="ti_content" style="width:100% !important;">
		<!--<div class="marquee-sibling"></div>-->
					<?php foreach($mysqlquerys as $row){ ?>
						 <div class="ti_news"> <?php echo $row->notification_name; ?></div>
						<?php } ?>
				</div>
				</div>
				</div>
				</div>
				</div>
	</div>

<?php } } ?>
<?php if(isset($_SESSION['PARENT_ID'])) { $ptid=$_SESSION['PARENT_ID'];
     $get=$this->db->query("select *from tbl_parent where Ptid='$ptid'")->row();
     $pid=$get->pid; 
	 $class=$get->Student_class_division; 
	 $division=$get->divsion; 
 ?>                 
<?php $mysqluery=$this->db->query("select *from notification where (sid='".$ptid."' OR notification_type='common') and pid='$pid' and class_name='$class' and division='$division'  order by nid desc")->result();  $expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date' and start_date<='$expiry_date'")->result(); ?>
<?php if(count($mysqluery)>=1){ ?>
		<div class="row footer11">
		<div class="col-md-12">
		 <div class="TickerNews" id="T2">
		    <div class="ti_wrapper">
		        <div class="ti_slide">
		            <div class="ti_content">
		<!--<div class="marquee-sibling"></div>-->
					<?php foreach($mysqluery as $row){ ?>
						 <div class="ti_news"> <?php echo $row->notification_description; ?></div>
						<?php } ?>
						<?php foreach($tgetquery as $row){ ?>
						 <div class="ti_news"> <?php echo $row->notification_name; ?></div>
						<?php } ?>
					</div>
					</div>
					</div>
					</div>
					</div>
					
					</div>

	<?php } ?>
<?php } ?>
<?php if((isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PRINCIPLE_ID']))){  ?>
<?php $pid=$_SESSION['SCHOOL_ID'];
	 $expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date' and start_date<='$expiry_date'")->result();
 if(count($tgetquery)>=1){
 ?>
 <style>
.TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -53px;
    position: absolute;
    bottom:32px;
}
@media(max-width:1190px){
 .TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -53px;
    position: absolute;
    bottom: -4px;
}
}
@media(max-width:768px){
 .TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -53px;
    position: absolute;
    bottom:21px;
}
@media(max-width:500px){
 .TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -53px;
    position: absolute;
    bottom:39px;
}
}
 </style>
 <div class="row footer11">
<?php  //echo $this->db->last_query(); ?>
		<div class="col-md-12">
		 <div class="TickerNews" id="T3">
		    <div class="ti_wrapper">
		        <div class="ti_slide11">
		            <div class="ti_content110">
					<marquee behavior="scroll" onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();" onmouseout="this.setAttribute('scrollamount', 3, 0);this.start();" scrollamount="8">
		<!--<div class="marquee-sibling"></div>-->
					<?php foreach($tgetquery as $row){ ?>
						 <?php echo $row->notification_name; ?></div>
						<?php } ?>
						</marquee>
				</div>
				</div>
				</div>
				</div>
				</div>
	</div>



<?php } } ?>
<style>
.navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :46%;   
    float:none !important;
}
@media(max-width:500px){
  .navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :100%;   
    float:none !important;
}
 }
</style>
<div class="navbar-fixed-bottom footer">
<nav class="navbar navbar-default navbar-right">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
		<li><a href="#" data-toggle="modal" data-target="#student_login">Student</a></li>
		<li><a href="#" data-toggle="modal" data-target="#sales_login">Associate</a></li>
		<?php } ?>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>-->
      </ul>
      <!--<ul class="nav navbar-nav">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row">

<div class="col-md-12" align="center"><a href="http://www.vmbss.org" style="color:#cf481b;" target="_blank">&copy; 2018 vmbss.org, VIMLAI SCHOOL MANAGEMENT&nbsp;&copy;</a>&nbsp;&nbsp;</div>
</div>
</div>
<div id="student_login" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
	<form method="post" action="#" id="student_login_form">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Login</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-danger" id="error_logins" style="display:none;"></div>
       <div class="form-group">
	   <input type="text" class="form-control" name="student_aadhar" onchange="student_aadharr();" id="student_aadhar" placeholder="Aadhar No" />
	   <span id="student_aadharr" style="color:red;"></span>
	   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return student_login_function();">Login</button>
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

<div id="sales_login" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
	<form method="post" action="#" id="sales_login_forms">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Associate Login</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-danger" id="errror_sales_login" style="display:none;"></div>
          <div class="form-group">
            <label class="control-label" for="name">Email ID <b style="color:red;">*</b></label>
            <input type="text" id="sales_email" name="sales_email" style="text-transform: none;"  onchange="sales_emailr()" maxlength="50" required="required" class="form-control">
            <span id="sales_emailr" style="color:red;"></span> </div>
          
          <div class="form-group">
            <label class="control-label" for="name">Password <b style="color:red;">*</b></label>
            <input type="password" style="text-transform: none;" id="sales_password" name="sales_password" onchange="sales_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="sales_passwordr" style="color:red;"></span> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return sales_logins();">Login</button>
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

	<script>
	
function sales_emailr(){if($('#sales_email').val()==''){}else{ $('#sales_emailr').html(' '); }}
function sales_password(){if($('#sales_password').val()==''){}else{ $('#sales_passwordr').html(' '); }}

function sales_logins(){
var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
var  Principle_email=document.getElementById('sales_email').value.trim();
var  Principle_password=document.getElementById('sales_password').value.trim();
if(Principle_email==''){
$("#sales_emailr").html('Please enter email address');
$("#sales_email").focus();
return false;
}
var email1 = Principle_email.toLowerCase();
if (emailpattern.test(email1) == false){
$("#sales_emailr").html("Please enter valid email address");
$("#sales_email").focus();       
return false;
}
if(Principle_password==''){
$("#sales_passwordr").html('Please enter password');
$("#sales_password").focus();
return false;
}
var formData = new FormData($("#sales_login_forms")[0]);
$.ajax({   
url: "<?php site_url(); ?>users_controller/salesman_login",
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
	$("#errror_sales_login").show();
	$("#errror_sales_login").html("Email ID or Password Incorrect");
	return false;
	}
}
});
}	

function student_aadharr(){if($('#student_aadhar').val()==''){}else{ $('#student_aadharr').html(' '); }}
function student_login_function(){
		var mobilenovalidation=/^\d{12}$/;
			var  student_aadhar=document.getElementById('student_aadhar').value.trim();
          if(student_aadhar==''){
			$("#student_aadharr").html('Please enter Aadhar card number');
			$("#student_aadhar").focus();
			return false;
			}
			if(!(student_aadhar.match(mobilenovalidation))) {
			$("#student_aadharr").html("Please enter valid adhar card number");	
			$("#student_aadhar").focus();
			return false;
			}
			var formData = new FormData($("#student_login_form")[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/parent_login_process",
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
						$("#error_logins").show();
				         $("#error_logins").html("Aadhar Card Number Incrroect");
						 return false;
						}
					
				}
			});
				
	}


		$('#calendar').datepicker({

		});



		!function ($) {

		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          

		        $(this).find('em:first').toggleClass("glyphicon-minus");      

		    }); 

		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");

		}(window.jQuery);



		$(window).on('resize', function () {

		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')

		})

		$(window).on('resize', function () {

		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')

		})

	</script>	

	<script>

						    $(function () {

						        $('#hover, #striped, #condensed').click(function () {

						            var classes = 'table';

						

						            if ($('#hover').prop('checked')) {

						                classes += ' table-hover';

						            }

						            if ($('#condensed').prop('checked')) {

						                classes += ' table-condensed';

						            }

						            $('#table-style').bootstrapTable('destroy')

						                .bootstrapTable({

						                    classes: classes,

						                    striped: $('#striped').prop('checked')

						                });

						        });

						    });

						

						    function rowStyle(row, index) {

						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						

						        if (index % 2 === 0 && index / 2 < classes.length) {

						            return {

						                classes: classes[index / 2]

						            };

						        }

						        return {};

						    }

							

									function check_checkboxes()

{

  var c = document.getElementsByTagName('input');

  for (var i = 0; i < c.length; i++)

  {

    if (c[i].type == 'checkbox')

       {

       if (c[i].checked) {

	  

	   $('#bulk_delete_submit').show();

		$('#bulk_inactive_submit').show();

		$('#bulk_active_submit').show();

	   return true}else{

	   	$('#bulk_delete_submit').hide();

		$('#bulk_inactive_submit').hide();

		$('#bulk_active_submit').hide();

	   }

    }

  }

  return false;

}

function deleteConfirm(){



    if(!check_checkboxes())

        {

        alert("Please check atleast one row");  

        return false;

      }

    var result = confirm("Are you sure to delete record?");

    if(result){

        return true;

    }else{

        return false;

    }

}

function updatestatus(){

      if(!check_checkboxes())

        {

        alert("Please check atleast one row");  

        return false;

      }

    var result = confirm("Are you sure to update status");

    if(result){

        return true;

    }else{

        return false;

    }

}

$(document).ready(function(){

    $('#select_all').on('click',function(){

        if(this.checked){

            $('.checkbox').each(function(){

                this.checked = true;

            });

		$('#bulk_delete_submit').show();

        }else{

             $('.checkbox').each(function(){

                this.checked = false;

            });

			$('#bulk_delete_submit').hide();

        }

    });

    $('.checkbox').on('click',function(){

        if($('.checkbox:checked').length == $('.checkbox').length){

            $('#select_all').prop('checked',true);

        }else{

            $('#select_all').prop('checked',false);

        }

    });

});



						</script>
						
							<style>
		.control-label {
    font-size: 14px;
    font-weight: 400;
   /* opacity: 0.4;*/
    pointer-events: none;
    position: absolute;
    transform: translate3d(0, 22px, 0) scale(1);
    transform-origin: left top;
    transition: 240ms;
    margin-top:-10px;
    padding-left:10px;
}
.form-group.focused .control-label {
    opacity: 1;
    transform: scale(0.75);
	color: #000;
	font-size:16px;
	font-weight:bold;
}

.form-control {
    align-self: flex-end;
}

.form-control::-webkit-input-placeholder {
}

.form-control:focus::-webkit-input-placeholder {
    transition: none;
}

.form-group.focused .form-control::-webkit-input-placeholder {
    color: #000;
	font-size:16px;
}
		</style>
<script>
$(document).ready(function(){
$('.form-control').on('focus blur', function (e) {
    $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');
});
</script>

</body>



</html>
	
<script>
</script>