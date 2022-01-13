<script>
function Teacher_namer(){if($('#Teacher_name').val()==''){}else{ $('#Teacher_namer').html(' '); }}
function divsionr(){if($('#divsion').val()==''){}else{ $('#divsionr').html(' '); }}
function yearr(){if($('#year').val()==''){}else{ $('#yearr').html(' '); }}
function Teacher_emailr(){if($('#Teacher_email').val()==''){}else{ $('#Teacher_emailr').html(' '); }}
function Teacher_passwordr(){if($('#Teacher_password').val()==''){}else{ $('#Teacher_passwordr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function Teacher_mobile_nor(){if($('#Teacher_mobile_no').val()==''){}else{ $('#Teacher_mobile_nor').html(' '); }}

function adhar_cardr(){if($('#adhar_card').val()==''){}else{ $('#adhar_cardr').html(' '); }}
function dobr(){if($('#dob').val()==''){}else{ $('#dobr').html(' '); }}
function pan_cardr(){if($('#pan_card').val()==''){}else{ $('#pan_cardr').html(' '); }}
function teacher_typer(){if($('#teacher_type').val()==''){}else{ $('#teacher_typer').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function genderr(){if($('#reg_no').val()==''){}else{ $('#reg_nor').html(' '); }}
function principle_registrations123(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var adharcartvalidation=/^\d{12}$/;
	
			var   	Teacher_name=document.getElementById('Teacher_name').value.trim();
			var  Teacher_email=document.getElementById('Teacher_email').value.trim();
			var  Teacher_password=document.getElementById('Teacher_password').value.trim();
			var  Teacher_mobile_no=document.getElementById('Teacher_mobile_no').value.trim();
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
			if(Teacher_mobile_no==''){
			$("#Teacher_mobile_nor").html('Please enter contact number');
			$("#Teacher_mobile_no").focus();
			return false;
			}
			if (!(Teacher_mobile_no.match(mobilenovalidation))) {
			$("#Teacher_mobile_nor").html("Please enter valid contact number");	
			$("#Teacher_mobile_no").focus();
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
			if(dob==''){
			$("#dobr").html('Please select date of birth');
			$("#dob").focus();
			return false;
			}
			if(pan_card==''){
			$("#pan_cardr").html('Please enter pan card');
			$("#pan_card").focus();
			return false;
			}
			if(Teacher_password==''){
			$("#Teacher_passwordr").html('Please enter password');
			$("#Teacher_password").focus();
			return false;
			}
			var formData = new FormData($("#pincodemangement12")[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/clerk_update1",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					 location.reload();
					 //alert();
						return false;
						}else {
				     
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Teacher_email+'&nbsp; This email address already register');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
		});
				
	}

	</script>

<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<div class="container main">			
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
		<div class="row">
			<div class="col-md-1"></div>
		<div class="col-md-8">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">My Profile<span style="float:right"><a  style="cursor:pointer;" target=""  data-toggle="modal" data-target="#principle_update" class="btn btn-danger"><i class="fa fa-pencil"></i></a></span></h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="row">
		<div class="col-md-3 col-xs-3">
	<?php $techers=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result(); ?>
	   <?php if(!empty($techers[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $techers[0]->Principle_schools_image; ?>" style="height:150px;width:100%;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:100%;" />
	   <?php } ?>
		</div>
		<div class="col-md-9 col-xs-9">
		<table class="table table-bordered">
		<tr><th>Name</th><td><?php echo $techers[0]->Principle_name; ?></td><th>Pan No</th><td><?php echo $techers[0]->pan_card; ?></td></tr>
		<tr><th>Adhar No</th><td><?php echo $techers[0]->adhar_card; ?></td><th>Monthly Salary</th><td><?php echo $techers[0]->monthly_salary; ?></td></tr>
		<tr><th>Email</th><td><?php echo $techers[0]->Principle_email; ?></td><th>Account No</th><td><?php echo $techers[0]->acount_no; ?></td></tr>
		<tr><th>Mobile No</th><td><?php echo $techers[0]->Principle_mobile_no; ?></td><th>IFC Code</th><td><?php echo $techers[0]->ifc_code; ?></td></tr> 	
		<tr><th>DOB</th><td><?php echo $techers[0]->dob; ?></td><th>Address</th><td><?php echo $techers[0]->address; ?></td></tr> 	
	</table>
		</div>
		</div>
		
		<div id="principle_update" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update  Profile</h4>
              </div>
              <div class="modal-body">
			<form role="form" method="post"  id="pincodemangement12"  enctype="multipart/form-data">
		<input type="hidden" name="Pid" id="Pid" value="<?php echo $techers[0]->Pid; ?>" />
          <div class="form-group">
            <label>Teacher Name <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_name" name="Teacher_name" value="<?php echo $techers[0]->Principle_name; ?>" onchange="Teacher_namer()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<?php $gender_master=$this->db->query("select name from gender_master")->result(); ?>
			<option value="<?php echo $techers[0]->gender; ?>"><?php echo $techers[0]->gender; ?></option>
			<?php foreach($gender_master as $row){ if($row->name!=$techers[0]->gender){ ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } } ?>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_email" name="Teacher_email"  value="<?php echo $techers[0]->Principle_email; ?>" onchange="Teacher_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_mobile_no" value="<?php echo $techers[0]->Principle_mobile_no; ?>" name="Teacher_mobile_no" onchange="Teacher_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_mobile_nor" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Adhar card <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card" name="adhar_card" value="<?php echo $techers[0]->adhar_card; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" onchange="adhar_cardr()" maxlength="50" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Date Of Birth <b style="color:red;">*</b></label>
            <input type="text" id="dob" name="dob" onchange="dobr()" value="<?php echo $techers[0]->dob; ?>" maxlength="50" required="required" class="form-control">
            <span id="dobr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Address </label>
            <input type="text" id="address" name="address" maxlength="20" value="<?php echo $techers[0]->address; ?>" required="required" class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Pan Card <b style="color:red;">*</b></label>
            <input type="text" id="pan_card" name="pan_card" onchange="pan_cardr()" value="<?php echo $techers[0]->pan_card; ?>" maxlength="20" required="required" class="form-control">
            <span id="pan_cardr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Monthly Salary</label>
            <input type="text" id="payment" name="payment" value="<?php echo $techers[0]->monthly_salary; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="10"  class="form-control">
            </div>
			
			<div class="form-group">
            <label>Account Number</label>
            <input type="text" id="account_no" name="account_no" value="<?php echo $techers[0]->acount_no; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="15"  class="form-control">
             </div>
			
			<div class="form-group">
            <label>IFC Code</label>
            <input type="text" id="ifc_code" name="ifc_code" value="<?php echo $techers[0]->ifc_code; ?>" outocomplete="off" maxlength="15"  class="form-control">
            </div>
          <div class="form-group">
             <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="Teacher_password" name="Teacher_password" value="<?php echo $techers[0]->Principle_password; ?>" onchange="Teacher_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_passwordr" style="color:red;"></span> </div>
          	 
			 			<div class="form-group">
			<label>Profile Image</label>
			<input type="hidden" name="defaultimage" value="<?php echo $techers[0]->Principle_schools_image; ?>" />
			<div id="tempprofileimage">
			<?php if(!empty($techers[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $techers[0]->Principle_schools_image; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
			<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations123();" value="Submit">&nbsp;&nbsp;&nbsp;
          </div>
        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
		
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		<?php }else{ ?>
		<div class="row">
			<div class="col-md-1"></div>
		<div class="col-md-10">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">My Profile<span style="float:right"><a  style="cursor:pointer;" target=""  data-toggle="modal" data-target="#principle_update" class="btn btn-danger"><i class="fa fa-pencil"></i></a></span></h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="row">
		<div class="col-md-4 col-xs-4">
	<?php $principle_details=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result(); ?>
	   
		</div>
		<div class="col-md-12 col-xs-12">
		<table class="table table-bordered">
		<tr><th>Schools Name</th><td><?php echo $principle_details[0]->Principle_school_name; ?></td><th>Establishment Year</th><td><?php echo $principle_details[0]->establish_year; ?></td></tr>
		<tr><th>Schools Address</th><td><?php echo $principle_details[0]->address; ?></td><th>Schools City</th><td><?php echo $principle_details[0]->Principle_schools_city; ?></td></tr>
		<tr><th>Principal Name</th><td><?php echo $principle_details[0]->Principle_name; ?></td><th>Gender</th><td><?php echo $principle_details[0]->gender; ?></td></tr>
		<tr><th>Mobile No</th><td><?php echo $principle_details[0]->Principle_mobile_no; ?></td><th>Email ID</th><td><?php echo $principle_details[0]->Principle_email; ?></td></tr> 	
		<tr><th>Mobile No(UL)</th><td><?php echo $principle_details[0]->aternative_phone; ?></td><th>Landline No</th><td><?php echo $principle_details[0]->land_line_number; ?></td></tr> 	
		<tr><th>Schools Logo</th><td><?php if(!empty($principle_details[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $principle_details[0]->Principle_schools_image; ?>" style="height:150px;width:200px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:200px;" />
	   <?php } ?></td><th>Signature</th><td><?php if(!empty($principle_details[0]->signature)){ ?>
	   <img src="<?php echo base_url() ?>assets/signature/<?php echo $principle_details[0]->signature; ?>" style="height:150px;width:200px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:200px;" />
	   <?php } ?></td></tr> 
	   <tr>
	   <th colspan="2">Schools Registration Date</th>
	   <td colspan="2"><?php echo date('d-F-Y',strtotime($principle_details[0]->Date)); ?></td>
	   </tr>	
	</table>
		</div>
		</div>
		
		<div id="principle_update" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update  Profile</h4>
              </div>
              <div class="modal-body">
			<form role="form" method="post"  id="pincodemangement" enctype="multipart/form-data">
			<div class="form-group">
            <label>Schools Name <b style="color:red;">*</b></label>
            <textarea type="text" id="Principle_school_name"  name="Principle_school_name" onchange="Principle_school_namer()" maxlength="300" required="required" class="form-control" style="resize:none;"><?php echo $principle_details[0]->Principle_school_name; ?></textarea>
            <span id="Principle_school_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Schools Slogan </label>
      <input type="text" id="schools_slogan"  name="schools_slogan" maxlength="100" class="form-control" style="resize:none;" value="<?php echo $principle_details[0]->schools_slogan; ?>">
            <span  style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Board Of Director </label>
      <input type="text" id="board_of_director"  name="board_of_director" maxlength="100" class="form-control" style="resize:none;" value="<?php echo $principle_details[0]->board_of_director; ?>">
           </div>
			<div class="form-group">
            <label>U.Dise Code <b style="color:red;">*</b></label>
            <input type="text" id="reg_no" name="reg_no" onchange="reg_nor()" value="<?php echo $principle_details[0]->reg_no; ?>"  maxlength="200" required="required" class="form-control" style="resize:none;">
            <span id="reg_nor" style="color:red;"></span> </div>
			<div class="form-group">
			<?php $earliest_year = 1920; ?>
            <label>Establishment Year <b style="color:red;">*</b></label>
        <select type="text" id="establish_year" name="establish_year" onchange="establish_yearr()" maxlength="200" required="required" class="form-control" style="resize:none;">
		<?php if(!empty($principle_details[0]->establish_year)) { ?>
		
			<option value="<?php echo $principle_details[0]->establish_year; ?>"><?php echo $principle_details[0]->establish_year; ?></option>
		<?php }else{ ?>
		<option value="">Select Year</option>
		<?php } ?>
		<?php foreach (range(date('Y'), $earliest_year) as $x) { ?>
		<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
		<?php } ?>
		</select>
            <span id="establish_yearr" style="color:red;"></span> </div>
			          
			<div class="form-group">
            <label>Schools Address <b style="color:red;">*</b></label>
            <textarea type="text" id="address" value="" name="address" onchange="addressr()" maxlength="300" required="required" class="form-control"><?php echo $principle_details[0]->address; ?></textarea>
            <span id="addressr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Schools City Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_schools_city" value="<?php echo $principle_details[0]->Principle_schools_city; ?>" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="50" required="required" class="form-control">
			<input type="hidden" name="defaultimage" value="<?php echo $principle_details[0]->Principle_schools_image; ?>" />
            <span id="Principle_schools_cityr" style="color:red;"></span> </div>

          <div class="form-group">
            <label>Principle Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_name" name="Principle_name" onchange="Principle_namer()" maxlength="50" required="required" class="form-control" value="<?php echo $principle_details[0]->Principle_name; ?>">
			<input type="hidden" id="principle_id" name="principle_id" value="<?php echo $_SESSION['PRINCIPLE_ID']; ?>" />
            <span id="Principle_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<?php if(!empty($principle_details[0]->gender)) { ?>
			      <?php if($principle_details[0]->gender=='Male'){ ?>
				  <option value="Male">Male</option>
			<option value="Female">Female</option>
		       <?php }else{ ?>
			   <option value="Female">Female</option>
			   <option value="Male">Male</option>
			<?php  } }else{ ?>
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<?php } ?>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" value="<?php echo $principle_details[0]->Principle_email; ?>" onchange="Principle_emailr()" maxlength="50" required="required" readonly="true" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Principle_mobile_no" value="<?php echo $principle_details[0]->Principle_mobile_no; ?>" name="Principle_mobile_no" onchange="Principle_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Alternate Mobile Numbers </label>
            <input type="text" id="aternative_phone" value="<?php echo $principle_details[0]->aternative_phone; ?>" name="aternative_phone"  maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>LnadLine Phone Number </label>
            <input type="text" id="land_line_number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" value="<?php echo $principle_details[0]->land_line_number; ?>" name="land_line_number"  maxlength="50" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
           <div class="row">
			<div class="form-group  col-md-6">
			<label>Schools Logo </label>
			<div id="tempprofileimage">
			<?php if(!empty($principle_details[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $principle_details[0]->Principle_schools_image; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
			<div class="form-group  col-md-6">
			<label>Principal Signature </label>
			<div id="tempprofileimage1">
			<?php if(!empty($principle_details[0]->signature)){ ?>
	   <img src="<?php echo base_url() ?>assets/signature/<?php echo $principle_details[0]->signature; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="signature" id="Principle_schools_image1" onchange="Principle_schools_imager1()" />
	   <input type="hidden" name="signature1" value="<?php echo $principle_details[0]->signature; ?>" />
	   <span id="Principle_schools_imager1" style="color:red;"></span>
			</div>
			</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
          </div>
        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
		
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<?php } ?>
		<br><br>
		<br /><br /><br />
		<br><br>
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
<script>
function Principle_schools_imager1(){
			var lblError = document.getElementById("Principle_schools_imager1");
			     myfile= $('#Principle_schools_image1').val();
				   var ext = myfile.split('.').pop();
 if(ext=="png" || ext=="PNG" || ext=="jpg" || ext=="jpeg" || ext=="JPEG" || ext=="JPG" || ext=="gif" ||  ext=="BMP" ||  ext=="bmp"  ||  ext=="PPM" ||  ext=="ppm" ||  ext=="PGM" ||  ext=="Exif" ||  ext=="PNM" ||  ext=="PBM" || ext=="JFIF"){
      // alert('Valid');
	    lblError.innerHTML='';
   } else{
         lblError.innerHTML = "Please upload files having extensions: <b> only png,jpg,jpeg,gif</b> only.";
			document.getElementById('Principle_schools_image1').value='';
			return false;
   }
    var fileUpload = document.getElementById("Principle_schools_image1");
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("tempprofileimage1");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "150";
                                img.width = "150";
                                img.src = e.target.result;
								img.class="img-thumbnail";
                                dvPreview.appendChild(img);
								
                            }
                            reader.readAsDataURL(file);
							
                        } 
						
						else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
								$('#Principle_schools_image1').val('');
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
         
			}


function Principle_schools_imager(){
			var lblError = document.getElementById("Principle_schools_imager");
			     myfile= $('#Principle_schools_image').val();
				   var ext = myfile.split('.').pop();
 if(ext=="png" || ext=="PNG" || ext=="jpg" || ext=="jpeg" || ext=="JPEG" || ext=="JPG" || ext=="gif" ||  ext=="BMP" ||  ext=="bmp"  ||  ext=="PPM" ||  ext=="ppm" ||  ext=="PGM" ||  ext=="Exif" ||  ext=="PNM" ||  ext=="PBM" || ext=="JFIF"){
      // alert('Valid');
	    lblError.innerHTML='';
   } else{
         lblError.innerHTML = "Please upload files having extensions: <b> only png,jpg,jpeg,gif</b> only.";
			document.getElementById('Principle_schools_image').value='';
			return false;
   }
    var fileUpload = document.getElementById("Principle_schools_image");
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("tempprofileimage");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "150";
                                img.width = "150";
                                img.src = e.target.result;
								img.class="img-thumbnail";
                                dvPreview.appendChild(img);
								
                            }
                            reader.readAsDataURL(file);
							
                        } 
						
						else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
								$('#Principle_schools_image').val('');
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
         
			}
			
function Principle_namer(){if($('#Principle_name').val()==''){}else{ $('#Principle_namer').html(' '); }}
function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function Principle_mobile_nor(){if($('#Principle_mobile_no').val()==''){}else{ $('#Principle_mobile_nor').html(' '); }}
function Principle_passwordr(){if($('#Principle_password').val()==''){}else{ $('#Principle_passwordr').html(' '); }}
function Principle_school_namer(){if($('#Principle_school_name').val()==''){}else{ $('#Principle_school_namer').html(' '); }}
function Principle_schools_cityr(){if($('#Principle_schools_city').val()==''){}else{ $('#Principle_schools_cityr').html(' '); }}
function addressr(){ if($("#address").val()=='') { }else { $("#addressr").html(" "); } }
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function reg_nor(){if($('#reg_no').val()==''){}else{ $('#reg_no').html(' '); }}
var  establish_year=document.getElementById('establish_year').value.trim();

function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	       var  establish_year=document.getElementById('establish_year').value.trim();
			var   	Principle_name=document.getElementById('Principle_name').value.trim();
			var  Principle_email=document.getElementById('Principle_email').value.trim();
			var  Principle_mobile_no=document.getElementById('Principle_mobile_no').value.trim();
			var  Principle_school_name=document.getElementById('Principle_school_name').value.trim();
			var  Principle_schools_city=document.getElementById('Principle_schools_city').value.trim();
			var  address=document.getElementById('address').value.trim();
           var  gender=document.getElementById('gender').value.trim();
		   var  reg_no=document.getElementById('reg_no').value.trim();
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
				
			if(address==''){
			$("#addressr").html('Please enter schools adddress');
			$("#address").focus();
			return false;
			}
			if(Principle_schools_city==''){
			$("#Principle_schools_cityr").html('Please enter city name');
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
		
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/principle_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='principle-profile';
						return false;
						}else {
				   alert('Not Updated'); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}
</script>


