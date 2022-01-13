<style>
.marquee {
  width: 100%;
  overflow: hidden;
  border: 1px solid #ccc;
  background: #ccc;
}
.margin_div{ margin-top:230px;}
.notification_images{
width:100%;
height:500px;
}
h1{
    animation-duration: 1800ms;
    animation-name: blink;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    -webkit-animation:blink 1800ms infinite; /* Safari and Chrome */
}
@keyframes blink {
    from {
        color:orange;
    }
    to {
        color:#ff2d00;
    }
}

/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
    .hero { width: 980px; }    
}
@media screen and (max-width: 640px){
    .hero h1 { font-size: 4em; }    
}
</style>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#festivalpopupshow').modal('show');
    });
</script>

	
<?php $pid=''; if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['PARENT_ID'])) || (isset($_SESSION['TEACHER_ID']))) { ?>
<?php if(isset($_SESSION['PRINCIPLE_ID'])){
$pid='';
if($_SESSION['USERTYPE']=='clerk'){ 
$query=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
$pid=$query->login_id;
}else{
$pid=$_SESSION['PRINCIPLE_ID'];
}
 ?>
<div class="container">	
<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-university"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
						<?php $totalstud=$this->db->query("select *from tbl_parent where pid='$pid' and Status='active'")->result(); echo count($totalstud); ?></div>
							<a href="#"><div class="text-muted">Total Student</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-users"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $total_teachers=$this->db->query("select *from tbl_teacher where Pid='$pid' and status='active'")->result(); 
							echo count($total_teachers); ?></div>
							<a href="#"><div class="text-muted">Total Teacher</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-file"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $total_bonafied=$this->db->query("select *from tbl_bonafied where pid='$pid'")->result(); echo count($total_bonafied); ?></div>
							<a href="#"><div class="text-muted">Total Bonafied</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-red  panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-image"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php $leaving_certificate=$this->db->query("select *from leaving_certificate where pid='$pid'")->result(); echo count($leaving_certificate); ?></div>
							<a href="#"><div class="text-muted">Total TC</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-orange  panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-file"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
			<?php $nigram_uttara=$this->db->query("select *from nigram_uttara where pid='$pid'")->result(); echo count($nigram_uttara); ?></div>
							<a href="#"><div class="text-muted">Total Nirgam</div></a>
						</div>
					</div>
				</div>
			</div>
         		
			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-users"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $tbl_parent_l=$this->db->query("select *from tbl_parent where pid='$pid' and status='inactive'")->result(); 
							echo count($tbl_parent_l); ?></div>
							<a href="#"><div class="text-muted">Total Leaving Student</div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br /><br /><br /><br /><br />
</div>
<?php } ?>
<?php }else{ $slider=$this->db->query("select slider_banner_images from tbl_main_slider where slider_type='supper'")->result(); ?>
<style>
#sliders-images{ height:250px;}
@media(max-width:500px){
#sliders-images{ height:170px;}
}
.slider_bottom_border{
border: 2px solid #ab227e;
box-shadow: 0px 0px 6px 3px #272629;
/*box-shadow: 3px -6px 11px 7px #8e09e7;*/
}
</style>
<div class="container">		
		<!--/.row-->
				<div class="row">
		<div class="col-md-6">
		<br />
		<h3 style="color:#080707; font-style:italic;"><strong style="color:#ff5900;">School Management</strong> help to school do paperless work, connect parent to school and communicate with each other</h3>
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->
  <!-- Indicators -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner slider_bottom_border">
  <?php if(count($slider)>=1){ $counter = 1; foreach($slider as $row) { ?>
    <div class="item slides <?php if($counter <= 1){echo " active"; } ?>">
	  <img src="<?php echo base_url(); ?>assets/slider/<?php echo $row->slider_banner_images; ?>"  id="sliders-images" style="width:100%;" />
    </div>
	<?php $counter++; } }else{ ?>
    <div class="item slides active">
	  <img src="<?php echo base_url(); ?>assets/slider/s2_5595.jpg" style="width:100%;"  id="sliders-images"/>
    </div>
   <?php } ?>
  </div> 
</div>
		</div>
		<div class="col-md-6">
		<h3 style="margin-bottom: 0px;" class="colorblink">REGISTER OUR SCHOOL</h3>
		
		<h3 style="margin-top:0px; font-style:italic;" class="">&nbsp;&nbsp;		&nbsp;&nbsp;		&nbsp;&nbsp;		&nbsp;&nbsp;		&nbsp;&nbsp;It's tree,always free</h3>
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="panel panel-primary" style="border: 2px solid #654486;padding: 10px;box-shadow: 0px 0px 3px 3px #928a89;border-radius: 43px 4px 43px 4px;">
	
		<form  enctype="multipart/form-data" method="post"  id="pincodemangement1232">
		<br />
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">School Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_school_name" name="Principle_school_name" placeholder="" onchange="Principle_school_namer()" maxlength="200"  class="form-control" style="resize:none;">
            <span id="Principle_school_namer" style="color:red;"></span> </div>
			
			<div class="form-group col-md-6">
			 <label class="control-label" for="name">U.Dise Code <b style="color:red;">*</b></label>
            <input type="text" id="reg_no" name="reg_no" onchange="reg_nor()" placeholder="" maxlength="200"  class="form-control" style="resize:none;">
            <span id="reg_nor" style="color:red;"></span> </div>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
			<?php $earliest_year = 1920; ?>
        <select type="text" id="establish_year" name="establish_year" onchange="establish_yearr()" maxlength="200"  class="form-control" style="resize:none;">
		<option value="">Select Establishment Year <b style="color:red;">*</b></option>
		<?php foreach (range(date('Y'), $earliest_year) as $x) { ?>
		<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
		<?php } ?>
		</select>
            <span id="establish_yearr" style="color:red;"></span> </div>
			
			<div class="form-group col-md-6">
			 <label class="control-label" for="name">School Address <b style="color:red;">*</b></label>
            <input type="text" id="Principle_schools_city" placeholder="" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="300"  class="form-control">
            <span id="Principle_schools_cityr" style="color:red;"></span> </div>
			</div>
			<div class="row">
          <div class="form-group col-md-6">
 <label class="control-label" for="name">Principal Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_name" name="Principle_name" placeholder="" onchange="Principle_namer()" maxlength="50"  class="form-control">
            <span id="Principle_namer" style="color:red;"></span> </div>
			
			<div class="form-group col-md-6">
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" class="form-control">
			<?php $gender_master=$this->db->query("select name from gender_master")->result(); ?>
			<option value="">Select Gender <b style="color:red;">*</b></option>
			<?php foreach($gender_master as $row){ ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } ?>
		
			</select>
            <span id="genderr" style="color:red;"></span> </div>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
			 <label class="control-label" for="name">Mobile No <b style="color:red;">*</b></label>
            <input type="text" id="Principle_mobile_no" name="Principle_mobile_no" placeholder="" onchange="Principle_mobile_nor()" maxlength="50" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
          <div class="form-group col-md-6">
 <label class="control-label" for="name">Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" style="text-transform: none;"  name="Principle_email" onchange="Principle_emailr()" placeholder="" maxlength="50"  class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-6">
		   <label class="control-label" for="name">Password <b style="color:red;">*</b></label>
            <input type="password" style="text-transform: none;" id="Principle_password" name="Principle_password" placeholder="" onchange="Principle_passwordr()" maxlength="50"  class="form-control">
            <span id="Principle_passwordr" style="color:red;"></span> </div>
          <div class="form-group col-md-6">
            <select type="text" id="sales_id" name="sales_id" onchange="sales_idr()" maxlength="50"  class="form-control">
			<?php $tbl_sales_users=$this->db->query("select name,email,id from tbl_sales_users")->result(); ?>
			<option value="">Referral Name<b style="color:red;">*</b></option>
			<option value="0">No Referral</option>
			<?php foreach($tbl_sales_users as $row){ ?>
			<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?>(<?php echo $row->email; ?>)</option>
			<?php } ?>
		
			</select>
            <span id="sales_idr" style="color:red;"></span> </div>
			</div>
			<div class="form-group">
			<label><input type="checkbox" id="termscondition" onclick="termsconditionr();" name="termscondition" /> I accept the <a  href="<?php echo site_url(); ?>terms_and_condition">terms and conditions</a></label><br />
			<span id="termsconditionr" style="color:red;"></span>
			</div>
          <div class="form-group">
            <input type="button" class="btn btn-primary btn-block" onClick="return sumbit_principal_data();" value="Create Account">
          </div>
        </form>
			  </div></div>
		</div>
		
		
		<br><br>
		<br /><br /><br />
		<br><br />
<script>
function Principle_namer(){if($('#Principle_name').val()==''){}else{ $('#Principle_namer').html(' '); }}
function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function Principle_mobile_nor(){if($('#Principle_mobile_no').val()==''){}else{ $('#Principle_mobile_nor').html(' '); }}
function Principle_passwordr(){if($('#Principle_password').val()==''){}else{ $('#Principle_passwordr').html(' '); }}
function Principle_school_namer(){if($('#Principle_school_name').val()==''){}else{ $('#Principle_school_namer').html(' '); }}
function Principle_schools_cityr(){if($('#Principle_schools_city').val()==''){}else{ $('#Principle_schools_cityr').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function reg_nor(){if($('#reg_no').val()==''){}else{ $('#reg_nor').html(' '); }}
function establish_yearr(){if($('#establish_year').val()==''){}else{ $('#establish_yearr').html(' '); }}
function sales_idr(){if($('#sales_id').val()==''){}else{ $('#sales_idr').html(' '); }}
function termsconditionr(){
	if(document.getElementById('termscondition').checked==false){
	$("#termsconditionr").html("Please checked Agree to Terms & Condition")
	return false;
	}else{
	$("#termsconditionr").html("")
	}
	}
function sumbit_principal_data(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  Principle_name=document.getElementById('Principle_name').value.trim();
			var  Principle_email=document.getElementById('Principle_email').value.trim();
			var  Principle_mobile_no=document.getElementById('Principle_mobile_no').value.trim();
			var  Principle_password=document.getElementById('Principle_password').value.trim();
			var  Principle_school_name=document.getElementById('Principle_school_name').value.trim();
			var  Principle_schools_city=document.getElementById('Principle_schools_city').value.trim();
			var  gender=document.getElementById('gender').value.trim();
			var  reg_no=document.getElementById('reg_no').value.trim();
			var  establish_year=document.getElementById('establish_year').value.trim();
			var  sales_id=document.getElementById('sales_id').value.trim();
          if(Principle_school_name==''){
			$("#Principle_school_namer").html('Please enter schools name');
			$("#Principle_school_name").focus();
			return false;
			}
			 if(reg_no==''){
			$("#reg_nor").html('Please enter schools reg no');
			$("#reg_no").focus();
			return false;
			}
			 if(establish_year==''){
			$("#establish_yearr").html('Please select establishment year');
			$("#establish_year").focus();
			return false;
			}
			if(Principle_schools_city==''){
			$("#Principle_schools_cityr").html('Please enter schools address');
			$("#Principle_schools_city").focus();
			return false;
			}
			
			if(Principle_name==''){
			$("#Principle_namer").html('Please enter name');
			$("#Principle_name").focus();
			return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
			return false;
			}
			if(Principle_mobile_no==''){
			$("#Principle_mobile_nor").html('Please enter contact number');
			$("#Principle_mobile_no").focus();
			return false;
			}
			if (!(Principle_mobile_no.match(mobilenovalidation))) {
			$("#Principle_mobile_nor").html("Please enter valid contact number");	
			$("#Principle_mobile_no").focus();
			return false;
			}
			if(Principle_email==''){
				$("#Principle_emailr").html('Please enter email address');
				$("#Principle_email").focus();
				 return false;
					}
					var email1 = Principle_email.toLowerCase();
					if (emailpattern.test(email1) == false){
					$("#Principle_emailr").html("Please enter valid email address");
					$("#Principle_email").focus();       
					return false;
					}
			
			if(Principle_password==''){
			$("#Principle_passwordr").html('Please enter password');
			$("#Principle_password").focus();
			return false;
			}
			if(sales_id==''){
			$("#sales_idr").html('Please select referral name');
			$("#sales_id").focus();
			return false;
			}
		   if(document.getElementById('termscondition').checked==false){
		    $("#termsconditionr").html("Please checked Agree to Terms & Condition")
		    return false;
		    }
			var formData = new FormData($("#pincodemangement1232")[0]);
			   $.ajax({   
				url: "<?php echo site_url(); ?>users_controller/registration_process",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					 window.location='checkout_payment';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Principle_email+'&nbsp; This email address already register');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}	
				} 
		});
				
	}
</script>



</div>
<?php } ?>
	
		