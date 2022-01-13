<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<script>
$(document).ready(function(){
$("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2030"
    });
	});
</script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>deshboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teacher Creation</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
		
		
	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Teacher Registration</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
		<?php $pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row(); ?>
		<input type="hidden" name="principleid" id="principleid" value="<?php echo $pid->login_id; ?>" />
          <div class="form-group">
            <label>Teacher Name <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_name" name="Teacher_name" onchange="Teacher_namer()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Date Of Birth </label>
            <input type="text" id="dob" name="dob" onchange="dobr()" maxlength="50"  class="form-control">
            <span id="dobr" style="color:red;"></span> </div>
				<div class="form-group">
            <label>Aadhar card <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card" name="adhar_card"  outocomplete="off" onchange="adhar_cardr()" maxlength="50" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
				<div class="form-group">
            <label>Pan Card </label>
            <input type="text" id="pan_card" name="pan_card" onchange="pan_cardr()" maxlength="20"  class="form-control">
            <span id="pan_cardr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Mobile Number </label>
            <input type="text" id="Teacher_mobile_no" name="Teacher_mobile_no" onchange="Teacher_mobile_nor()" maxlength="50" class="form-control">
            <span id="Teacher_mobile_nor" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_email" name="Teacher_email" onchange="Teacher_emailr()" maxlength="50" class="form-control">
            <span id="Teacher_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="Teacher_password" name="Teacher_password" onchange="Teacher_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_passwordr" style="color:red;"></span> </div>
			
          <div class="form-group">
            <label>Select Class</label>
            <select type="text" id="schools_name" name="schools_name" onchange="schools_namer()" maxlength="200" class="form-control" style="resize:none;">
			<?php $schools_name=$this->db->query("select name from schools_master")->result(); ?>
			<option value="">Select</option>
			<?php foreach($schools_name as $row) { ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } ?>
			</select>
            <span id="schools_namer" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Class Division</label>
				<?php $schools_name=$this->db->query("select divison_name from divison_master")->result(); ?>
            <select type="text" maxlength="6" id="divsion" onchange="divsionr();" name="divsion" class="form-control">
			<option value="">Select</option>
			<?php foreach($schools_name as $di){ ?>
		   <option value="<?php echo $di->divison_name; ?>"><?php echo $di->divison_name; ?></option>	
			<?php } ?>
			</select>
			 <span id="divsionr" style="color:red;"></span> </div>
			 
			 <div class="form-group">
            <label>Class Year </label>
				<?php $tbl_student_anual_year=$this->db->query("select year from tbl_student_anual_year")->result(); ?>
            <select type="text" maxlength="6" id="year" onchange="yearr();" name="year" class="form-control">
			<option value="">Select</option>
			<?php foreach($tbl_student_anual_year as $di){ ?>
		   <option value="<?php echo $di->year; ?>"><?php echo $di->year; ?></option>	
			<?php } ?>
			</select>
			 <span id="yearr" style="color:red;"></span> </div>
			 <div class="form-group">
            <label>Monthly Salary</label>
            <input type="text" id="payment" name="payment" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="10"  class="form-control">
            </div>
			<div class="form-group">
            <label>Account Number</label>
            <input type="text" id="account_no" name="account_no" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="15"  class="form-control">
             </div>
			<div class="form-group">
            <label>IFC Code</label>
            <input type="text" id="ifc_code" name="ifc_code"  outocomplete="off" maxlength="15"  class="form-control">
            </div>
			<div class="form-group">
            <label>Address </label>
            <input type="text" id="address" name="address" maxlength="20"  class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
			</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
			<br /><br /><br /><br /><br />
          </div>
        </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<br><br><br /><br />
		<br /><br /><br /><br />
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
<script>
function Teacher_namer(){if($('#Teacher_name').val()==''){}else{ $('#Teacher_namer').html(' '); }}

function Teacher_emailr(){if($('#Teacher_email').val()==''){}else{ $('#Teacher_emailr').html(' '); }}
function Teacher_passwordr(){if($('#Teacher_password').val()==''){}else{ $('#Teacher_passwordr').html(' '); }}

function Teacher_mobile_nor(){if($('#Teacher_mobile_no').val()==''){}else{ $('#Teacher_mobile_nor').html(' '); }}

function adhar_cardr(){if($('#adhar_card').val()==''){}else{ $('#adhar_cardr').html(' '); }}
function dobr(){if($('#dob').val()==''){}else{ $('#dobr').html(' '); }}
function pan_cardr(){if($('#pan_card').val()==''){}else{ $('#pan_cardr').html(' '); }}
function teacher_typer(){if($('#teacher_type').val()==''){}else{ $('#teacher_typer').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var adharcartvalidation=/^\d{12}$/;
	
			var   	Teacher_name=document.getElementById('Teacher_name').value.trim();
			var  Teacher_email=document.getElementById('Teacher_email').value.trim();
			var  Teacher_password=document.getElementById('Teacher_password').value.trim();
			
			var  Teacher_mobile_no=document.getElementById('Teacher_mobile_no').value.trim();
			var  year=document.getElementById('year').value.trim();
			var  divsion =document.getElementById('divsion').value.trim();
			var  schools_name=document.getElementById('schools_name').value.trim();
			var  adhar_card=document.getElementById('adhar_card').value.trim();
			var  dob=document.getElementById('dob').value.trim();
			var  pan_card=document.getElementById('pan_card').value.trim();
var  gender=document.getElementById('gender').value.trim();
      
			if(Teacher_name==''){
			$("#Teacher_namer").html('Please enter name');
			$("#Teacher_name").focus();
			return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
			return false;
			}
			if(adhar_card==''){
			$("#adhar_cardr").html('Please enter adhar card number');
			$("#adhar_card").focus();
			return false;
			}
			if(!(adhar_card.match(adharcartvalidation))) {
			$("#adhar_cardr").html("Please enter valid adhar card number");	
			$("#adhar_card").focus();
			return false;
			}
			if(Teacher_email==''){
				$("#Teacher_emailr").html('Please enter email address');
				$("#Teacher_email").focus();
				 return false;
					}
					var email1 = Teacher_email.toLowerCase();
					if (emailpattern.test(email1) == false){
					$("#Teacher_emailr").html("Please enter valid email address");
					$("#Teacher_email").focus();       
					return false;
					}
			if(Teacher_mobile_no!=''){
			if (!(Teacher_mobile_no.match(mobilenovalidation))) {
			$("#Teacher_mobile_nor").html("Please enter valid contact number");	
			$("#Teacher_mobile_no").focus();
			return false;
			}
			}
			if(Teacher_password==''){
			$("#Teacher_passwordr").html('Please enter password');
			$("#Teacher_password").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/teacher_creation_process",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='teacher-list';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Teacher_email+'&nbsp; This email address already register');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}
</script>


