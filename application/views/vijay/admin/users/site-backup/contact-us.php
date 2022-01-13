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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Contact Us</li>
			</ol>
		</div><!--/.row-->
		
		<!--/.row-->
		<div class="row">
	
		<div class="col-md-6">
		<br /><br /><br />
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Contact Us</li>
			</ol>
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
		<br /><br />
		<div class="panel panel-primary">
		<div class="panel-heading">Get In Tuch</div>
		<div class="panel-body">
			<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
		<form method="post" action="<?php echo site_url(); ?>users_controller/contactus_email_sends">
		<div class="form-group">
		<input type="text" name="name" id="name" onchange="namer()" class="form-control" placeholder="Full Name" />
		<label style="color:red;" id="namer"></label>
		</div>
		<div class="form-group">
		<input type="email" name="email" id="email" onchange="emailr()" class="form-control" placeholder="Email ID" />
		<label style="color:red;" id="emailr"></label>
		</div>
		<div class="form-group">
		<input type="text" name="mobile" id="mobile" onchange="mobiler()" class="form-control" placeholder="Mobile No" />
		<label style="color:red;" id="mobiler"></label>
		</div>
		<div class="form-group">
		<textarea type="text" name="message" id="message" onchange="messager()" class="form-control" placeholder="Messages.."  style="resize:none;"></textarea>
		<label style="color:red;" id="messager"></label>
		</div>
		<div class="form-group">
		<input type="submit" name="sub" value="Submit" class="btn btn-danger" onclick="return send_email_contactas();" />
		</div>
		</form>
		</div>
		</div>
		</div>
		<div class="col-md-6"><img style="width:100%;" src="<?php echo base_url(); ?>assets/img/Contact Us_1.png" />
		<h3><strong>Contact Person Details</strong></h3>
		<div class="row">
		<div class="col-md-4">
		<p><strong>Mr. Vijay Jadhav</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i> +91 9158680769</p>
		<p><i class="glyphicon glyphicon-envelope"></i> vijay@vmbss.org</p>
		</div>
		<div class="col-md-4">
		<p><strong>Mr. Sandip Surwase</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i> +91 9561168569</p>
		<p><i class="glyphicon glyphicon-envelope"></i> sandip@vmbss.org</p>
		</div>
		<div class="col-md-4">
		<p><strong>Mr. Vikram Shilwant</strong></p>
		<p><i class="glyphicon glyphicon-phone"></i>+91 7083926023</p>
		<p><i class="glyphicon glyphicon-envelope"></i> vikram@vmbss.org</p>
		</div>
		</div>
		</div>
		</div>
		<br /><br /><br /><br />
		</div>
<?php } ?>