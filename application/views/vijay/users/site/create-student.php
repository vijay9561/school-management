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
$(document).ready(function(){
$("#admission_date").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		maxDate:0,
		yearRange:"1930:2030"
    });
	});
	
	
</script>

<div class="container main">			
	
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<div class="row">
		<div class="col-md-12">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">Add New Student</h3></div>
			 <div class="panel-body">
		
		<form role="form" method="post"  id="pincodemangement">
          <div class="row">
		 <div class="form-group col-md-3">
            <label class="control-label" for="name">Old Schools Name</label>
            <input type="text" id="old_schools" name="old_schools"  maxlength="100" class="form-control">
            <span id="old_schoolsr" style="color:red;"></span> </div>
		 <div class="form-group col-md-3">
            <label class="control-label" for="name">GR Code </label>
            <input type="text" id="gr_code"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="gr_code" maxlength="16" autcomplete="off" class="form-control">
            <span id="gr_codee" style="color:red;"></span> </div>
			
			<div class="form-group col-md-3">
            <label class="control-label" for="name">Admission No </label>
            <input type="text" id="admission_no"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="admission_no" maxlength="16" autcomplete="off" class="form-control">
            <span id="admission_nor" style="color:red;"></span> </div>
			
			<div class="form-group col-md-3">
            <label class="control-label" for="name">Admission Date </label>
            <input type="text" id="admission_date" name="admission_date" maxlength="30" autcomplete="off" class="form-control">
			</div>
			</div>
			 <div class="row">
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Student I.D.NO </label>
            <input type="text" id="student_id_no" name="student_id_no" maxlength="30" autcomplete="off" class="form-control">
			</div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">U.I.D. NO. </label>
            <input type="text" id="u_id_no" name="u_id_no" maxlength="30" autcomplete="off" class="form-control">
			</div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Aadhar No  <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="adhar_card" onchange="adhar_cardr()" maxlength="12" autocomplete="off" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
			</div>
			 <div class="row">
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Pan Card</label>
            <input type="text" id="pan_no" name="pan_no"  maxlength="100" class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Mobile Number </label>
            <input type="text" id="Parent_mobile_no" name="Parent_mobile_no" onchange="Parent_mobile_nor()" maxlength="50"  class="form-control">
            <span id="Parent_mobile_nor" style="color:red;"></span> </div>
		  <div class="form-group col-md-4">
            <label class="control-label" for="name">Roll No</label>
            <input type="text" id="Student_roll_no"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="Student_roll_no" onchange="Student_roll_nor()" maxlength="30" autcomplete="off" class="form-control">
            <span id="Student_roll_nor" style="color:red;"></span> </div>
			</div>
			 <div class="row">
			<div class="form-group col-md-3">
            <label class="control-label" for="name">Select Class<b style="color:red;">*</b></label>
            <select type="text" id="schools_name" name="schools_name" onchange="schools_namer()" maxlength="200" required="required" class="form-control" style="resize:none;">
			<?php $schools_name=$this->db->query("select name from schools_master")->result(); ?>
			<option value=""></option>
			<?php foreach($schools_name as $row) { ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } ?>
			</select>
            <span id="schools_namer" style="color:red;"></span> </div>
			<div class="form-group col-md-3">
            <label class="control-label" for="name">Select Class Division </label>
				<?php $schools_name=$this->db->query("select divison_name from divison_master")->result(); ?>
            <select type="text" maxlength="6" id="divsion" onchange="divsionr();" name="divsion" class="form-control">
			<option value=""></option>
			<?php foreach($schools_name as $di){ ?>
		   <option value="<?php echo $di->divison_name; ?>"><?php echo $di->divison_name; ?></option>	
			<?php } ?>
			</select>
			 <span id="divsionr" style="color:red;"></span> </div>
			 <div class="form-group col-md-3">
            <label class="control-label" for="name">Select Medium <b style="color:red;">*</b></label>
				<?php $medium_master=$this->db->query("select name from medium_master")->result(); ?>
            <select type="text" maxlength="6" id="medium"  name="medium" class="form-control">
			<option value=""></option>
			<?php foreach($medium_master as $di){ ?>
		   <option value="<?php echo $di->name; ?>"><?php echo $di->name; ?></option>	
			<?php } ?>
			</select>
			</div>
			  <div class="form-group col-md-3">
            <label class="control-label" for="name">Select Class Year <b style="color:red;">*</b></label>
				<?php $tbl_student_anual_year=$this->db->query("select year from tbl_student_anual_year")->result(); ?>
            <select type="text" maxlength="6" id="year" onchange="yearr();" name="year" class="form-control">
			<option value=""></option>
			<?php foreach($tbl_student_anual_year as $di){ ?>
		   <option value="<?php echo $di->year; ?>"><?php echo $di->year; ?></option>	
			<?php } ?>
			</select>
			 <span id="yearr" style="color:red;"></span> </div>
			 </div>
			  <div class="row">
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Student Name <b style="color:red;">*</b></label>
            <input type="text" id="Student_name" name="Student_name" onchange="Student_namer()" maxlength="50" required="required" class="form-control">
            <span id="Student_namer" style="color:red;"></span> </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Select Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<?php $gender_master=$this->db->query("select name from gender_master")->result(); ?>
			<option value=""></option>
			<?php foreach($gender_master as $row){ ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } ?>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
          <div class="form-group col-md-4">
            <label class="control-label" for="name">Mother Name <b style="color:red;">*</b></label>
            <input type="text" id="mother_name" name="mother_name" onchange="mother_namer()" maxlength="50" required="required" class="form-control">
            <span id="mother_namer" style="color:red;"></span> </div>
			</div>
			 <div class="row">
            <div class="form-group col-md-4">
            <label class="control-label" for="name">Address</label>
            <input type="text" id="address" name="address"  maxlength="100" class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Residential Address</label>
            <input type="text" id="redensital_address" name="redensital_address"  maxlength="100" class="form-control">
            </div>
            <div class="form-group col-md-4">
            <label class="control-label" for="name">Nationality</label>
            <input type="text" id="nationality"  autocomplete="off" name="nationality"  maxlength="100" class="form-control">
            <span id="bank_nor122" style="color:red;"></span> </div>
			
			</div>
			 
			 <div class="row">
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Date Of Birth(in number) <b style="color:red;">*</b></label>
            <input type="text" id="dob" name="dob" onchange="dobr()" maxlength="100" class="form-control">
            <span id="dobr" style="color:red;"></span> </div>
<div class="form-group col-md-4">
            <label class="control-label" for="name">Date Of Birth(in words)</label>
            <input type="text" id="date_of_birth_word" name="date_of_birth_word" onchange="date_of_birth_wordr()" maxlength="100" class="form-control">
            <span id="date_of_birth_wordr" style="color:red;"></span> </div>
            <div class="form-group col-md-4">
            <label class="control-label" for="name">Birth Place</label>
            <input type="text" id="birth_place"  autocomplete="off" name="birth_place"  maxlength="100" class="form-control">
            <span id="Subgenrer" style="color:red;"></span> </div>
			
			</div>
            <div class="row">
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Select Caste Category</label>
			<?php $sub_caste=$this->db->query("select name from subcaste_master order by name asc")->result(); ?>
            <select type="text" id="sub_cast" name="sub_cast"  maxlength="100" class="form-control">
			<option value=""></option>
			<?php foreach($sub_caste as $c){ ?>
			<option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
			<?php } ?>
			</select>
            </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Select Religion(Caste)</label>
			<?php $caste_master=$this->db->query("select name from caste_master order by name asc")->result(); ?>
            <select type="text" id="cast" name="cast"  maxlength="100" class="form-control">
			<option value=""></option>
			<?php foreach($caste_master as $c){ ?>
			<option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
			<?php } ?>
			</select>
            </div>
            <div class="form-group col-md-4">
            <label class="control-label" for="name">Subgenre(Sub-Caste)</label>
            <input type="text" id="Subgenre"  autocomplete="off" name="Subgenre"  maxlength="100" class="form-control">
            <span id="Subgenrer" style="color:red;"></span> </div>
			</div>
			 <div class="row">
             <div class="form-group col-md-4">
            <label class="control-label" for="name">Bank Name</label>
            <input type="text" id="bank_no"  autocomplete="off" name="bank_no"  maxlength="100" class="form-control">
            <span id="bank_nor" style="color:red;"></span> </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">Account No</label>
            <input type="text" id="account_no" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" name="account_no"  maxlength="100" class="form-control">
            <span id="account_nor" style="color:red;"></span> </div>
			<div class="form-group col-md-4">
            <label class="control-label" for="name">IFC Code</label>
            <input type="text" id="ifc_code"  autocomplete="off" name="ifc_code"  maxlength="100" class="form-control">
            <span id="ifc_coder" style="color:red;"></span> </div>
			</div>
			 <div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
          </div>
        </form>
			  </div></div>
		
		</div>
		</div>
		<br /><br /><br />
		<br><br>
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
<script>
function dobr(){if($('#dob').val()==''){}else{ $('#dobr').html(' '); }}
function Student_roll_nor(){if($('#Student_roll_no').val()==''){}else{ $('#Student_roll_nor').html(' '); }}
function adhar_cardr(){if($('#adhar_card').val()==''){}else{ $('#adhar_cardr').html(' '); }}
function Parent_mobile_nor(){if($('#Parent_mobile_no').val()==''){}else{ $('#Parent_mobile_nor').html(' '); }}
function Student_namer(){if($('#Student_name').val()==''){}else{ $('#Student_namer').html(' '); }}
function Parent_passwordr(){if($('#Parent_password').val()==''){}else{ $('#Parent_passwordr').html(' '); }}
function Student_class_divisionr(){if($('#Student_class_division').val()==''){}else{ $('#Student_class_divisionr').html(' '); }}
function Student_yearr(){if($('#Student_year').val()==''){}else{ $('#Student_yearr').html(' '); }}
function divsionr(){if($('#divsion').val()==''){}else{ $('#divsionr').html(' '); }}
function yearr(){if($('#year').val()==''){}else{ $('#yearr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function mother_namer(){if($('#mother_name').val()==''){}else{ $('#mother_namer').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function date_of_birth_wordr(){ if($('#date_of_birth_word').val()==''){}else{ $('#date_of_birth_wordr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	        var  adhar_card=document.getElementById('adhar_card').value.trim();
			var  schools_name=document.getElementById('schools_name').value.trim();
			var  divsion =document.getElementById('divsion').value.trim();
			var  year=document.getElementById('year').value.trim();
			var  Student_name=document.getElementById('Student_name').value.trim();
			var  mother_name=document.getElementById('mother_name').value.trim();
			var  gender=document.getElementById('gender').value.trim();
            var  Parent_mobile_no=document.getElementById('Parent_mobile_no').value.trim();
			var  dob=document.getElementById('dob').value.trim();
			var date_of_birth_word=document.getElementById('date_of_birth_word').value.trim();
			 if(adhar_card==''){
			$("#adhar_cardr").html('Please enter adhar card number');
			$("#adhar_card").focus();
			return false;
			}
		    if (!(adhar_card.match(adharcartvalidation))) {
			$("#adhar_cardr").html("Please enter valid adhar card number");	
			$("#adhar_card").focus();
			return false;
			}
			if(schools_name==''){
			$("#schools_namer").html('Please select schools');
			$("#schools_name").focus();
			return false;
			}
			if(year==''){
			$("#yearr").html('Please select year');
			$("#year").focus();
			return false;
			}
			if(Student_roll_no==''){
			$("#Student_roll_nor").html('Please enter roll number');
			$("#Student_roll_no").focus();
			return false;
			}
			if(Student_name==''){
				$("#Student_namer").html('Please enter name');
				$("#Student_name").focus();
				 return false;
			}
			if(mother_name==''){
				$("#mother_namer").html('Please enter mother name');
				$("#mother_name").focus();
				 return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
			return false;
			}
			if(Parent_mobile_no!=''){
			if (!(Parent_mobile_no.match(mobilenovalidation))) {
			$("#Parent_mobile_nor").html("Please enter valid contact number");	
			$("#Parent_mobile_no").focus();
			return false;
			}
			}
			if(dob==''){
			$("#dobr").html('Please select date of birth');
			$("#dob").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/student_registration_process",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='student-list-clerk';
						return false;
						}else if(data==2){
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('This roll number student is exist');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}else if(data==5){
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('This adhar number already exist');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}else{
					$("#productoutoffstock12").show();
				$("#productoutoffstock12").html('can not select student future year');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
					}
					
				}
			});
			return false;  
		});
				
	}
</script>


