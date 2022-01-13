<style>
.school-icons{
font-size:30px;
color:#ff5900;
}
.logo-images{
width: 100%;
height: 64px;
margin-top: -13px;
}
@media(max-width:500px){
.school-icons{
font-size:22px;
color:#ff5900;
}
}
.login_text{border: 1px solid #8e09e7;}
.login_text:focus{border: 1px solid red;}
</style>
<script>
// Capital
$(document).ready(function(){ $('[data-toggle="popover"]').popover(); });
</script>
<?php if((!(isset($_SESSION['PRINCIPLE_ID']))) && (!(isset($_SESSION['TEACHER_ID']))) && (!(isset($_SESSION['PARENT_ID'])))) { ?>
<div class="school-home-page-header">
  <div class="container">
    <form method="post" id="commonloginusers" action="<?php site_url(); ?>users_controller/login_process" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-1 col-sm-3 col-xs-4">
          <h2 class="header-text-logo"><a style="color:#FFFFFF;" href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" class="logo-images" /></a></h2>
        </div>
		<div class="col-md-6 col-sm-9 col-xs-8"> <h2 class="school-icons">SCHOOL MANAGEMENT</h2> </div>
		<?php if(!isset($_SESSION['SALES_ID'])){ ?>
        <div class="col-md-2 login-text-box">
          <input type="text" class="form-control inline-text-login login_text" style="text-transform: none;"  id="Principle_email1"  onchange="Principle_emailr1()" name="email" placeholder="Email ID" name="email"  />
          <span id="Principle_emailr1" class="errormsg1"></span></div>
        <div class="col-md-2 login-text-box">
          <input type="password" style="text-transform: none;" class="form-control inline-text-login login_text" id="Principle_password1" onchange="Principle_passwordr1();" name="password" placeholder="Password" name="password"  />
          <span id="Principle_passwordr1" class="errormsg1"></span></div>
        <div class="col-md-1 login-text-box">
          <input type="submit"  name="sub" onclick="return login_users();" class="btn btn-primary btn-sm login-button" value="Log In" />
        </div>
		<?php } ?>
		<?php if(isset($_SESSION['SALES_ID'])){ ?>
		<a href="#" class="btn btn-primary" style="float:right; margin-top:20px;" data-toggle="popover" data-placement="bottom" title="Profile" data-html="true" data-content="<a href='<?php echo site_url(); ?>salesman-profiles'>Profile<a><br><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>change-password'>Change Password<a><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>logout'>Logout</a>
<hr style='margin-top:0px;margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' />" style="position: absolute;top: 20px;right:100px;z-index: 9999;"><i class="fa fa-user"></i></a>
		<?php } ?>
      </div>
    </form>
  </div>
</div>
<?php }else{ 
$pid=$_SESSION['SCHOOL_ID']; 
$slider=$this->db->query("select slider_banner_images from tbl_main_slider where slider_type='schools' and pid='$pid'")->result(); if(isset($_SESSION['PRINCIPLE_ID'])){ ?>
<a href="#" class="btn btn-primary" data-toggle="popover" data-placement="bottom" title="Profile" data-html="true" data-content="<a href='<?php echo site_url(); ?>principle-profile'>Profile<a><br><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>change-password'>Change Password<a><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>logout'>Logout</a>
<hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' />" style="position: absolute;top: 20px;right:100px;z-index: 9999;"><i class="fa fa-user"></i></a>
<?php } ?>
<?php if(isset($_SESSION['TEACHER_ID'])) { ?>
<a href="#" class="btn btn-primary" data-toggle="popover" data-placement="bottom" title="Profile" data-html="true" data-content="<a href='<?php echo site_url(); ?>teacher-profile'>Profile<a><br><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>change-password'>Change Password<a><br><hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' /><a href='<?php echo site_url(); ?>logout'>Logout<a> <hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' />" style="position: absolute;top: 20px;right:100px;z-index: 9999;"><i class="fa fa-user"></i></a>
<?php } ?>
<?php if(isset($_SESSION['PARENT_ID'])) { ?>
<a href="#" class="btn btn-primary" data-toggle="popover" data-placement="bottom" title="Profile" data-html="true" data-content="<a href='<?php echo site_url(); ?>logout'>Logout<a> <hr style='margin-top:0px; margin-bottom:0px;padding:0px;border-top: 1px solid #292323;' />" style="position: absolute;top: 20px;right:100px;z-index: 9999;"><i class="fa fa-user"></i></a>
<?php } ?>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <!-- Indicators -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner slider_bottom_border">
  <?php if(count($slider)>=1){ $counter = 1; foreach($slider as $row) { ?>
    <div class="item slides <?php if($counter <= 1){echo " active"; } ?>">
	  <img src="<?php echo base_url(); ?>assets/slider/<?php echo $row->slider_banner_images; ?>" style="width:100%;" />
    </div>
	<?php $counter++; } }else{ ?>
    <div class="item slides active">
	  <img src="<?php echo base_url(); ?>assets/slider/s2_5595.jpg" style="width:100%;"/>
    </div>
   <?php } ?>
  </div> 
</div>
<?php $school_details=$this->db->query("select Principle_school_name,Principle_schools_image from tbl_principle where Pid='".$_SESSION['SCHOOL_ID']."'")->row(); 
//echo $this->db->last_query();
?>
<div align="center">
<?php if(!empty($school_details->Principle_schools_image)){ ?>
<img class="fixed_school_logo" src="<?php echo base_url(); ?>assets/profile/<?php echo $school_details->Principle_schools_image;  ?>" class="img-circle" />
<?php }else{ ?>
<img class="fixed_school_logo" src="<?php echo base_url(); ?>assets/img/school.png" class="img-circle" />
<?php } ?>
</div>			
<div class="container">
<div class="row"><br /><div class="col-md-12"><h2 class="title_border" align="center"><?php echo $school_details->Principle_school_name; ?></h2></div></div>
</div>
<hr  style="border: 1px solid #534d4d; margin-top:5px; margin-bottom:3px;" />
<?php } ?>
<style>
.slider_bottom_border{
border-bottom: 2px solid #ab227e;
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
/*var formData = new FormData($("#commonloginusers")[0]);
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
window.location="<?php echo site_url(); ?>";
 }
}  
});*/
}
</script>
