                                 <?php
if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PARENT_ID']))) { 
  if(isset($_SESSION['PRINCIPLE_ID'])){
     if($_SESSION['USERTYPE']=='clerk'){ 
	 $clerk_get_details1=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
	 $pid=$clerk_get_details1->login_id;
	 $principal_details=$this->db->query("select *from tbl_principle where pid='$pid'")->row();
	 }else{
	$principal_details=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
	}
	}
if((isset($_SESSION['TEACHER_ID']))){
$clerk_get_details=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
	 $pid=$clerk_get_details->Pid;
	 $principal_details=$this->db->query("select *from tbl_principle where Pid='$pid'")->row();
 }
 if((isset($_SESSION['PARENT_ID']))){
$clerk_get_details=$this->db->query("select *from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
	 $pid=$clerk_get_details->pid;
	 $principal_details=$this->db->query("select *from tbl_principle where Pid='$pid'")->row();
 }
?>	
<style>
.paragraphline{ font-size:18px;}
@media(max-width:500px){                                                                                              
.paragraphline{ font-size:14px;}
}
</style>
<div class="container main">			
		<div class="row">
	
		</div><!--/.row-->
		
		<!--/.row-->
		<div class="row">
	
		<div class="col-md-6">
                    <br /><br>
		<div class="panel panel-primary">
		<div class="panel-heading">School Contact Details</div>
		<div class="panel-body">
		<div class="row">
		<div class="col-md-4 col-xs-4"><p class="paragraphline"><strong>Schools Name</strong></p></div>
		<div class="col-md-8 col-xs-8"><p class="paragraphline"><i class="fa fa-child" aria-hidden="true"></i>
&nbsp;&nbsp;<?php echo $principal_details->Principle_school_name; ?></p></div>
		</div>
		<div class="row">
		<div class="col-md-4 col-xs-4"><p class="paragraphline"><strong>Address</strong></p></div>
		<div class="col-md-8 col-xs-8"><p class="paragraphline"><i class="fa fa-map-marker" aria-hidden="true"></i>
&nbsp;&nbsp;<?php echo $principal_details->address; ?></p></div>
		</div>
		<hr / style="margin-bottom:2px; margin-top:2px;">
		<div class="row">
		<div class="col-md-4 col-xs-4"><p class="paragraphline"><strong>Email</strong></p></div>
		<div class="col-md-8 col-xs-8"><p class="paragraphline"><i class="fa fa-envelope" aria-hidden="true"></i>
&nbsp;&nbsp;<a href="mailto:<?php echo $principal_details->Principle_email; ?>"><?php echo $principal_details->Principle_email; ?></a></p></div>
		</div>
		<hr / style="margin-bottom:2px; margin-top:2px;">
		<div class="row">
		<div class="col-md-4 col-xs-4"><p class="paragraphline"><strong>Mobile Number</strong></p></div>
		<div class="col-md-8 col-xs-8"><p class="paragraphline"><i class="fa fa-mobile" aria-hidden="true"></i>
&nbsp;&nbsp;+91 <?php echo $principal_details->Principle_mobile_no; ?> &nbsp;/&nbsp;<?php echo $principal_details->aternative_phone; ?></p></div>
		</div>
		<hr / style="margin-bottom:2px; margin-top:2px;">
		<div class="row">
		<div class="col-md-4 col-xs-4"><p class="paragraphline"><strong>Telephone</strong></p></div>
		<div class="col-md-8 col-xs-8"><p class="paragraphline"><i class="fa fa-phone-square" aria-hidden="true"></i>
&nbsp;&nbsp; <?php echo $principal_details->land_line_number; ?></p></div>
		</div>
		</div>
		</div>
		</div>
		<div class="col-md-6"><img style="width:100%;" src="<?php echo base_url(); ?>assets/img/Contact Us_1.png" /></div>
		</div>		
		
	</div>
	<?php //include('footer.php');          adaadfafafa
	 ?>                                                      
<?php }else{ ?>
<div class="container main">			
		<div class="row">
                    <h3 style="text-align:center;" class="heading_titles">Contact Us</h3>
		</div><!--/.row-->
		<div class="row">
			<script>
			function namer(){ if($("#name").val()==''){  }else{ $("#namer").html('') } }
		    function emailr(){ if($("#email").val()==''){  }else{ $("#emailr").html(' ') } }
			function mobiler(){ if($("#mobile").val()==''){  }else{ $("#mobiler").html('') } }
			function messager(){ if($("#message").val()==''){  }else{ $("#messager").html('') } }
						
			function send_email_contactas(){
			var name=document.getElementById('name').value.trim();
			var email=document.getElementById('email').value.trim();
			var mobile=document.getElementById('mobile').value.trim();
			var message=document.getElementById('message').value.trim();
			var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
			var mobilenovalidation=/^\d{10}$/;
			if(name==""){
			$("#namer").html("Please enter your name");
			$("#name").focus();
			return false;
			}
			if(email==''){
			$("#emailr").html('Please enter email address');
			$("#email").focus();
			return false;
			}
			var email1 = email.toLowerCase();
			if (emailpattern.test(email1) == false){
			$("#emailr").html("Please enter valid email address");
			$("#email").focus();       
			return false;
			}
			if(mobile==''){
			$("#mobiler").html('Please enter contact number');
			$("#mobile").focus();
			return false;
			}
			if (!(mobile.match(mobilenovalidation))) {
			$("#mobiler").html("Please enter valid contact number");	
			$("#mobile").focus();
			return false;
			}
			if(message==""){
			$("#messager").html("Please enter your name");
			$("#message").focus();
			return false;
			}
			}
		</script>
	
		<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-heading">Please get in touch using the form below</div>
		<div class="panel-body">
			
		<form method="post" action="<?php echo site_url(); ?>users_controller/contactus_email_sends">
		<div class="form-group label-floating">
		  <label class="control-label" for="name">Full Name <b style="color:red;">*</b></label>
		<input type="text" name="name" id="name" onchange="namer()" class="form-control"  />
		<label style="color:red;" id="namer"></label>
		</div>
		<div class="form-group">
		 <label class="control-label" for="name">Email ID <b style="color:red;">*</b></label>
		<input type="email" name="email" id="email" onchange="emailr()" class="form-control" placeholder="" />
		<label style="color:red;" id="emailr"></label>
		</div>
		<div class="form-group">
		 <label class="control-label" for="name">Mobile No <b style="color:red;">*</b></label>
		<input type="text" name="mobile" id="mobile" onchange="mobiler()" class="form-control" placeholder="" />
		<label style="color:red;" id="mobiler"></label>
		</div>
		<div class="form-group">
		<label class="control-label" for="name">Messages.. <b style="color:red;">*</b></label>
		<textarea type="text" name="message" id="message" onchange="messager()" class="form-control" placeholder=""  style="resize:none;"></textarea>
		<label style="color:red;" id="messager"></label>
		</div>
		<div class="form-group">
		<input type="submit" name="sub" value="Submit" class="btn btn-danger" onclick="return send_email_contactas();" />
		</div>
		</form>
		</div>
		</div>
		</div>
		<style>
		p{  color:#000000;}
		.ogination_name{color: #cf481b;
font-weight: bold;
margin-top: 0px;
text-decoration: underline;}
		</style>
		<div class="col-md-6">
		
		<div class="panel panel-primary">
		<div class="panel-heading">Contact & Office Address Details</div>
		<div class="panel-body">
		<div class="row">
		<div class="col-md-4" >
		<p><strong>Mr. Sandip Surwase</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i> +91 7448286205</p>
		<p><i class="glyphicon glyphicon-envelope"></i> sandip@vmbss.org</p>
		<p><strong>Mr. Vikram Shilwant</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i>+91 7083926023</p>
		<p><i class="glyphicon glyphicon-envelope"></i> vikram@vmbss.org</p>
		<p><strong>Mr. Vaibhav Pawar</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i> +91 8828447636</p>
		<p><i class="glyphicon glyphicon-envelope"></i> vaibhav@vmbss.org</p>
		</div>
		<div class="col-md-8">
		<h4 class="ogination_name">VIMLAI SCHOOL MANAGEMENT</h4>
		 <p style="font-size:14px; color:#000000;font-weight: normal;">Fl No 05, S No 43/46, Savitri Vihar B Wing<br />
                NR Navdeep Society, Manaji Nagar,<br />
                Nahre, Pune - 411041<br />
                PH.NO:- +91 7083926023 <br />
                E-MAIL :- sales@vmbss.org </p>
		</div>
		</div>
		</div>
		<br /><br />
		</div></div></div>
		<div class="row">
		<div class="col-md-12">
		<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d121113.33402919381!2d73.75331473275843!3d18.447764949327222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3bc2953c97d25831%3A0x7c01f86e48cc3507!2svimlai+school+management!3m2!1d18.4477778!2d73.8233552!5e0!3m2!1sen!2sin!4v1517023100446"  style="width:100%; height:450px; border:1px solid #8e09e7;"></iframe>
		</div>
		</div>
		
		</div>
<?php } ?>