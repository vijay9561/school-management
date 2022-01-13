<?php if(isset($_SESSION['PRINCIPLE_ID'])) {  $currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
//echo $this->db->last_query();
//exit;
?>
<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *from tbl_student_history  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}elseif((isset($_GET['class_details'])) && (isset($_GET['division_details'])) && (isset($_GET['sub_caste'])) && (isset($_GET['year']))){
$class=$_GET['class_details'];
$division=$_GET['division_details'];
$sub_caste=$_GET['sub_caste'];
$year=$_GET['year'];
if((!empty($_GET['class_details'])) && (!empty($_GET['division_details'])) && (!empty($_GET['sub_caste'])) && (!empty($_GET['year']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and divsion='$division' and sub_cast='$sub_caste' and  Student_year='$year' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and divsion='$division' and sub_cast='$sub_caste' and  Student_year='$year' order by Student_name asc")->result();

 }
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['division_details'])) && (!empty($_GET['sub_caste']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and sub_cast='$sub_caste' and  divsion='$division' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and divsion='$division' and sub_cast='$sub_caste'  order by Student_name asc")->result();
}
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['sub_caste'])) && (!empty($_GET['year']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and sub_cast='$sub_caste' and   Student_year='$year' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and sub_cast='$sub_caste' and  Student_year='$year' order by Student_name asc")->result();
}
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['division_details'])) && (!empty($_GET['year']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and divsion='$division' and   Student_year='$year' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and divsion='$division' and  Student_year='$year' order by Student_name asc")->result();
}
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['division_details']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and divsion='$division' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and divsion='$division' order by Student_name asc")->result();
}
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['sub_caste']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and sub_cast='$sub_caste' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and and sub_cast='$sub_caste' order by Student_name asc")->result();
}
}elseif((!empty($_GET['class_details'])) && (!empty($_GET['year']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_year='$year' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' and and Student_year='$year' order by Student_name asc")->result();
}
}else{
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."')  order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_student_history where  (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Student_class_division='$class' order by Student_name asc")->result();
   }
  }
 }else{
$mysqluery=$this->db->query("select *from tbl_student_history where  pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."' order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}
		 ?>
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
		 <script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='student_history?searchkeyowords='+search_id2;
return false;
}
</script>

<script>
	function delestudents(id){
	var con=confirm('are you sure to the delete this records!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/delete_student",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	

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
			if(divsion==''){
			$("#divsionr").html('Please select division');
			$("#divsion").focus();
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
			if(date_of_birth_word==''){
			$("#date_of_birth_wordr").html('Please enter date of birth in words');
			$("#date_of_birth_word").focus();
			return false;
			}
			$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/student_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='student_history';
						return false;
						}else if(data==3){
						  $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('this adhar card already register here');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
						}else {
				  $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('can not select of student future year');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
				}
			});
			return false;  
		});
				
	}

</script>		
<script>
function download_data(){
alert();
return false;
var class=$("#class_name").val();
var division=$("#divison_name").val();
window.location='download_student_excel_data?class='+class+'&division='+division;
//window.location='student_history?searchkeyowords='+search_id2;
return false;
 }
</script>
<div class="container main">			
		
	
		<?php if(isset($_GET['view-details'])){ 
		$t=$this->db->query("select  *from tbl_student_history where Ptid='".$_GET['view-details']."'")->result(); ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">View Details&nbsp;&nbsp;<a href="<?php echo site_url(); ?>student_history" class="btn btn-success">Back</a></div>
		<div class="panel-body">
					<table id="datatable" class="table table-striped table-bordered">
					<tbody>
					<tr><th>Old School Name:</th><td><?php echo $t[0]->old_schools; ?></td> <th>Admission No:</th><td><?php echo $t[0]->gr_code; ?></td></tr>
					<tr><th>Admission Date:</th><td><?php echo $t[0]->admission_date; ?></td> <th>Student I.D. NO:</th><td><?php echo $t[0]->student_id_no; ?></td></tr>
					<tr><th>U.I.D. NO.:</th><td><?php echo $t[0]->u_id_no; ?></td> <th>Aadhar No:</th><td><?php echo $t[0]->adhar_card; ?></td></tr>
					<tr><th>Pan Card:</th><td><?php echo $t[0]->pan_no; ?></td> <th>Mobile No:</th><td><?php echo $t[0]->Parent_mobile_no; ?></td></tr>
					<tr><th>Roll No:</th><td><?php echo $t[0]->Student_roll_no; ?></td> <th>Class & Division:</th><td><?php echo $t[0]->Student_class_division; ?>&nbsp;&nbsp;(<?php echo $t[0]->divsion; ?>)</td></tr>
					<tr><th>Medium:</th><td><?php echo $t[0]->medium; ?></td> <th>Class Year:</th><td><?php echo $t[0]->Student_year; ?></td></tr>
					<tr><th>Student Name:</th><td><?php echo $t[0]->Student_name; ?></td><th>Gender:</th><td><?php echo $t[0]->gender; ?></td></tr>
			    <tr><th>Mother Name:</th><td><?php echo $t[0]->mother_name; ?></td><th>Address & Residential Address:</th><td><?php echo $t[0]->address.'&nbsp;'.$t[0]->redensital_address; ?></td></tr>
			<tr><th>Religion (Caste) & Subgenre (Sub-Caste):</th><td><?php echo $t[0]->cast; if(!empty($t[0]->Subgenre)) { ?> <?php echo '('.$t[0]->Subgenre.')'; } ?></td> <th>Caste Category:</th><td><?php echo $t[0]->sub_cast; ?></td></tr>
					<tr><th>Nationality:</th><td><?php echo $t[0]->nationality; ?></td> <th>Bith Place:</th><td><?php echo $t[0]->birth_place; ?></td></tr>
					<tr><th>Date Of Birth(in words):</th><td><?php echo $t[0]->dob; ?></td> <th>Date of Birth (In Words):</th><td><?php echo $t[0]->date_of_birth_word; ?></td></tr>
					<tr><th>Bank Name:</th><td><?php echo $t[0]->bank_no; ?></td><th>Account Number:</th><td><?php echo $t[0]->account_no; ?></td></tr>
				<tr><th>IFC:</th><td><?php echo $t[0]->ifc_code; ?></td><th>Created Date:</th><td><?php echo date('d-m-Y',strtotime($t[0]->Date)); ?></td></tr>
					<tr><th colspan="2">Images:</th><td colspan="2"><?php if(!empty($t[0]->Student_profile_picture)){ ?>
	   <img src="<?php echo base_url() ?>assets/student/<?php echo $t[0]->Student_profile_picture; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?></td></tr>
	   <tr></tr>
					</tbody>
			</table>
			</div>
</div>
		</div>
		</div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$student=$this->db->query("select  *from tbl_student_history where Ptid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Student Update</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post" id="pincodemangement">
		<input type="hidden" name="Ptid" value="<?php echo $_GET['action']; ?>" />
		 <div class="form-group">
            <label>Old Schools Name</label>
            <input type="text" id="old_schools" name="old_schools" value="<?php echo $student[0]->old_schools; ?>"  maxlength="100" class="form-control">
            <span id="old_schoolsr" style="color:red;"></span> </div>
		 <div class="form-group">
            <label>GR Code </label>
            <input type="text" id="gr_code" value="<?php echo $student[0]->gr_code; ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="gr_code" maxlength="16" autcomplete="off" class="form-control">
            <span id="gr_codee" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Admission Date </label>
            <input type="text" id="admission_date" value="<?php echo $student[0]->admission_date; ?>" name="admission_date" maxlength="30" autcomplete="off" class="form-control">
			</div>
			<div class="form-group">
            <label>Student I.D.NO </label>
            <input type="text" id="student_id_no" value="<?php echo $student[0]->student_id_no; ?>" name="student_id_no" maxlength="30" autcomplete="off" class="form-control">
			</div>
			<div class="form-group">
            <label>U.I.D. NO. </label>
            <input type="text" id="u_id_no" value="<?php echo $student[0]->u_id_no; ?>" name="u_id_no" maxlength="30" autcomplete="off" class="form-control">
			</div>
		
		<div class="form-group">
            <label>Adhar Card Number <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card" value="<?php echo $student[0]->adhar_card; ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="adhar_card" onchange="adhar_cardr()" maxlength="12" autocomplete="off" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Pan Card</label>
            <input type="text" id="pan_no" name="pan_no"  maxlength="100" value="<?php echo $student[0]->pan_no; ?>" class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>
			 <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" id="Parent_mobile_no" name="Parent_mobile_no" value="<?php echo $student[0]->Parent_mobile_no; ?>" onchange="Parent_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Parent_mobile_nor" style="color:red;"></span> </div>
			
          <div class="form-group">
            <label>Roll.No <b style="color:red;">*</b></label>
            <input type="text" id="Student_roll_no" value="<?php echo $student[0]->Student_roll_no; ?>" readonly="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="Student_roll_no" onchange="Student_roll_nor()" maxlength="5" autcomplete="off" required="required" class="form-control">
            <span id="Student_roll_nor" style="color:red;"></span> </div>
			  <div class="form-group">
            <label>Select Class<b style="color:red;">*</b></label>
            <select type="text" id="schools_name" name="schools_name" onchange="schools_namer()" maxlength="200" required="required" class="form-control" style="resize:none;">
			<?php $schools_name=$this->db->query("select name from schools_master")->result(); ?>
			<option value="<?php echo $student[0]->Student_class_division; ?>"><?php echo $student[0]->Student_class_division; ?></option>
			<?php foreach($schools_name as $row) { if($student[0]->Student_class_division!=$row->name){ ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php } } ?>
			</select>
            <span id="schools_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Class Division <b style="color:red;">*</b></label>
				<?php $schools_name=$this->db->query("select divison_name from divison_master")->result(); ?>
            <select type="text" maxlength="6" id="divsion" onchange="divsionr();" name="divsion" class="form-control">
			<option value="<?php echo $student[0]->divsion; ?>"><?php echo $student[0]->divsion; ?></option>
			<?php foreach($schools_name as $di){ if($di->divison_name!=$student[0]->divsion){ ?>
		   <option value="<?php echo $di->divison_name; ?>"><?php echo $di->divison_name; ?></option>	
			<?php } } ?>
			</select>
			 <span id="divsionr" style="color:red;"></span> </div>
			 	 <div class="form-group">
            <label>Medium <b style="color:red;">*</b></label>
				<?php $medium_master=$this->db->query("select name from medium_master")->result(); ?>
            <select type="text" maxlength="6" id="medium"  name="medium" class="form-control">
			<?php if(empty( $student[0]->medium)){ ?>
			 <option value="">Select</option>
			<?php  }else{?>
			<option value="<?php echo  $student[0]->medium; ?>"><?php echo  $student[0]->medium; ?></option>
			<?php } foreach($medium_master as $di){ if($student[0]->medium!=$di->name){ ?>
		   <option value="<?php echo $di->name; ?>"><?php echo $di->name; ?></option>	
			<?php } } ?>
			</select>
			</div>
			<div class="form-group">
            <label>Class Year <b style="color:red;">*</b></label>
				<?php $tbl_student_anual_year=$this->db->query("select year from tbl_student_anual_year")->result(); ?>
            <select type="text" maxlength="6" id="year" onchange="yearr();" name="year" class="form-control">
			<option value="<?php echo $student[0]->Student_year; ?>"><?php echo $student[0]->Student_year; ?></option>
			<?php foreach($tbl_student_anual_year as $di){ if($student[0]->Student_year!=$di->year){ ?>
		   <option value="<?php echo $di->year; ?>"><?php echo $di->year; ?></option>	
			<?php }  } ?>
			</select>
			 <span id="yearr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Student Name <b style="color:red;">*</b></label>
            <input type="text" id="Student_name" name="Student_name" value="<?php echo $student[0]->Student_name; ?>" onchange="Student_namer()" maxlength="50" required="required" class="form-control">
            <span id="Student_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<?php $gender_master=$this->db->query("select name from gender_master")->result(); ?>
			<option value="<?php echo $student[0]->gender ?>"><?php echo $student[0]->gender; ?></option>
			<?php foreach($gender_master as $row){ if($student[0]->gender!=$row->name){ ?>
			<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
			<?php }  } ?>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
			 <div class="form-group">
            <label>Mother Name <b style="color:red;">*</b></label>
            <input type="text" id="mother_name" name="mother_name"  value="<?php echo $student[0]->mother_name; ?>" onchange="mother_namer()" maxlength="50" required="required" class="form-control">
            <span id="mother_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Address</label>
            <input type="text" id="address" name="address"  maxlength="100" value="<?php echo $student[0]->address; ?>" class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
		<div class="form-group">
            <label>Residential Address</label>
            <input type="text" id="redensital_address" name="redensital_address" value="<?php echo $student[0]->redensital_address; ?>"  maxlength="100" class="form-control">
            </div>
			
			<div class="form-group">
            <label>Caste</label>
			<?php $caste_master=$this->db->query("select name from caste_master order by name asc")->result(); ?>
            <select type="text" id="cast" name="cast"  maxlength="100" class="form-control">
			<?php if(!empty($student[0]->cast)){ ?>
			<option value="<?php echo $student[0]->cast; ?>"><?php echo $student[0]->cast; ?></option>
			<?php }else{ ?>
			<option value="">Select</option>
			<?php } ?>

			<?php foreach($caste_master as $c){ ?>
			<option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
			<?php } ?>
			</select>
            </div>
			<div class="form-group">
            <label>SubCaste</label>
			<?php $sub_caste=$this->db->query("select name from subcaste_master order by name asc")->result(); ?>
            <select type="text" id="sub_cast" name="sub_cast"  maxlength="100" class="form-control">
			<?php if(!empty($student[0]->sub_cast)){ ?>
			<option value="<?php echo $student[0]->sub_cast; ?>"><?php echo $student[0]->sub_cast; ?></option>
			<?php }else{ ?>
			<option value="">Select</option>
			<?php } ?>
			<?php foreach($sub_caste as $c){ ?>
			<option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
			<?php } ?>
			</select>
            </div>
			<div class="form-group">
            <label>Nationality</label>
            <input type="text" id="nationality"  autocomplete="off" name="nationality" value="<?php echo $student[0]->nationality; ?>"  maxlength="100" class="form-control">
            <span id="bank_nor122" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Birth Place</label>
            <input type="text" id="birth_place"  autocomplete="off" name="birth_place" value="<?php echo $student[0]->birth_place; ?>"  maxlength="100" class="form-control">
            <span id="birth_placerrr" style="color:red;"></span> </div>
			 <div class="form-group">
            <label>Date Of Birth(in number) <b style="color:red;">*</b></label>
            <input type="text" id="dob" name="dob" onchange="dobr()" value="<?php echo $student[0]->dob; ?>" maxlength="100" class="form-control">
            <span id="dobr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Date Of Birth(in words) <b style="color:red;">*</b></label>
            <input type="text" id="date_of_birth_word" name="date_of_birth_word" onchange="date_of_birth_wordr()" value="<?php echo $student[0]->date_of_birth_word; ?>" maxlength="100" class="form-control">
            <span id="date_of_birth_wordr" style="color:red;"></span> </div>
			<div class="form-group">
			<div class="form-group">
            <label>Bank Name</label>
            <input type="text" id="bank_no" value="<?php echo $student[0]->bank_no; ?>" autocomplete="off" name="bank_no"  maxlength="100" class="form-control">
            <span id="bank_nor" style="color:red;"></span> </div>
            <label>Account No</label>
            <input type="text" id="account_no" value="<?php echo $student[0]->account_no; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" name="account_no"  maxlength="100" class="form-control">
            <span id="account_nor" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>IFC Code</label>
            <input type="text" id="ifc_code"  autocomplete="off" name="ifc_code" value="<?php echo $student[0]->ifc_code; ?>"  maxlength="100" class="form-control">
            <span id="ifc_coder" style="color:red;"></span> </div>
			
			 
			<div class="form-group">
			<label>Student Image</label>
			<input type="hidden" name="defaultimage" value="<?php echo $student[0]->Student_profile_picture; ?>" />
			<div id="tempprofileimage">
			<?php if(!empty($student[0]->Student_profile_picture)){ ?>
	   <img src="<?php echo base_url() ?>assets/student/<?php echo $student[0]->Student_profile_picture; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
          </div>
        </form>
			  </div></div>
		</div>
		<div class="col-md-2"></div>
		</div>
		                    
		<?php }elseif(isset($_GET['upload_excel'])){ ?>
		<script type="text/javascript">
		function upload_validation_exctanation(){
var lblError = document.getElementById("uploadsheetr");
myfile= $('#uploadsheet').val();
var ext = myfile.split('.').pop();
if(ext=="csv"){
// alert('Valid');
lblError.innerHTML='';
} else{
lblError.innerHTML = "Please upload files having extensions: <b> .csv</b> only.";
document.getElementById('uploadsheet').value='';
return false;
}
}
		</script>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">Upload Excel Sheet</div>
		<div class="panel-body">
		<form method="post" name="uploadexcelsheet" action="<?php echo  site_url();?>Excel_Upload_Controller/excel_student_upload" enctype="multipart/form-data">
		<div class="form-group">
		<label>Upload Excel Shet(Only .csv Accepted)</label>
		<input	 type="file" name="uploadsheet" id="uploadsheet" required onchange="return upload_validation_exctanation()" />
		<span id="uploadsheetr" style="color:red;"></span>                     
		</div>
		<div  class="form-group">
		<input	 type="submit" name="SUB" class="btn  btn-primary" value="Submit" />
		</div>
		</form>
		</div>
		</div>
		</div>
		<div  class="col-md-2"></div>
		</div>
		<?php }else{ ?>
		<div class="row">
		<form name="bulk_action_form" action="<?php echo site_url(); ?>users_controller/multiple_student_history_delete" method="post">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
	 <?php if(count($mysqluery)>=1){ ?>
<!--	<span>Select All<input style="margin: -17px 33px 0px;" type="checkbox" name="select_all" id="select_all" value=""/></span>-->
	<?php  } ?>
	<input type="submit" class="btn btn-danger" name="bulk_delete_submit" id="bulk_delete_submit" style="display:none"  onclick="return deleteConfirm();" value="Delete" />
	<!--<a href="<?php echo site_url(); ?>new-student-registration" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Student</a>&nbsp;&nbsp;-->
		<?php } ?>
		</div>

<div class="col-md-6">
<div class="form-group pull-right">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>"  style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="button" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</div>
</div>	</div>	
<div class="row">
<?php  $class_m=$this->db->query("select name from schools_master")->result();
$divison_name=$this->db->query("select divison_name from divison_master")->result();
$subcaste_master=$this->db->query("select name from subcaste_master")->result();
$tbl_student_anual_year=$this->db->query("select year from tbl_student_anual_year")->result();
 ?>
<div class="col-md-3">
<select name="class_name" class="form-control" id="class_name">
<?php if(isset($_GET['class_details'])) { if(!empty($_GET['class_details'])) { ?>
<option value="<?php echo $_GET['class_details']; ?>"><?php echo $_GET['class_details']; ?></option>
<?php }else{ ?>
<option value="">Select Class</option>
<option value="all">All</option>
<?php  } }else{ ?>
<option value="">Select Class</option>
<option value="all">All</option>
<?php } ?>
<!--<option value="all">All</option>-->
<?php foreach($class_m as $class) {?>
<option value="<?php echo $class->name; ?>"><?php echo $class->name; ?></option>
<?php } ?>
</select>
</div>
<div class="col-md-3">
<select name="divison_name" class="form-control" id="divison_name">
<?php if(isset($_GET['division_details'])) { if(!empty($_GET['division_details'])) { ?>
<option value="<?php echo $_GET['division_details']; ?>"><?php echo $_GET['division_details']; ?></option>
<?php }else{ ?>
<option value="">Select Division</option>
<?php  } }else{ ?>
<option value="">Select Division</option>
<?php } ?>
<?php foreach($divison_name as $d) {?>
<option value="<?php echo $d->divison_name; ?>"><?php echo $d->divison_name; ?></option>
<?php } ?>
</select>
</div>
<div class="col-md-2">
<select name="sub_caste" class="form-control" id="sub_caste">
<?php if(isset($_GET['sub_caste'])) { if(!empty($_GET['sub_caste'])) { ?>
<option value="<?php echo $_GET['sub_caste']; ?>"><?php echo $_GET['sub_caste']; ?></option>
<?php }else{ ?>
<option value="">Select SubCaste</option>
<?php  } }else{ ?>
<option value="">Select SubCaste</option>
<?php } ?>
<?php foreach($subcaste_master as $d) {?>
<option value="<?php echo $d->name; ?>"><?php echo $d->name; ?></option>
<?php } ?>
</select>
</div>

<div class="col-md-2">
<select name="year" class="form-control" id="year">
<?php if(isset($_GET['year'])) { if(!empty($_GET['year'])) { ?>
<option value="<?php echo $_GET['year']; ?>"><?php echo $_GET['year']; ?></option>
<?php }else{ ?>
<option value="">Select Year</option>
<?php  } }else{ ?>
<option value="">Select Year</option>
<?php } ?>
<?php foreach($tbl_student_anual_year as $d) {?>
<option value="<?php echo $d->year; ?>"><?php echo $d->year; ?></option>
<?php } ?>
</select>
</div>
<div class="col-md-2">
 <!--<a  class="btn btn-primary" onclick="return alerts();"><i class="fa fa-download"></i> Download</a>&nbsp;-->
<a  href="#" class="btn btn-primary"  onclick="return search_student_class();"><i class="fa fa-search"></i> Search</a>
</div>
</div>
<br />
<script>
function alerts(){
 //alert();
var class12=$("#class_name").val();
var division=$("#divison_name").val();
var sub_caste=$("#sub_caste").val();
if(class12==""){
 alert("Please select class?")
 $("#class_name").focus();
 return false;
 }
window.location='download_student_excel_data?class='+class12+'&division='+division+'&sub_details='+sub_caste;
}
function search_student_class(){
 //alert();
var class12=$("#class_name").val();
var division=$("#divison_name").val();
var sub_caste=$("#sub_caste").val();
var year=$("#year").val();
if(class12==""){
 alert("Please select class?")
 $("#class_name").focus();
 return false;
 }
window.location='student_history?class_details='+class12+'&division_details='+division+'&sub_caste='+sub_caste+'&year='+year;
}

</script>
		<div class="table-responsive">
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Roll Number</th>
                          <th>Student Name</th>
						  <th>Gender</th>
						  <th>Adhar Card Number</th>
						   <th>Mobile No</th>
						  <th>Class</th>
						  <th>SubCaste</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  if(count($mysqluery)>=1){
					    $serial = ($pageLimit * $setLimit) + 1; $sn = ($page * $setLimit) + 1; $page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                        $start_num =((($page_num*$setLimit)-$setLimit)+1); $i=1; $j= (($page-1) * $setLimit) + $i; 
						foreach($mysqluery as $row){ $num = $sn ++;
					   ?>
                        <tr>
						<td><!--<input type="checkbox" style="display: inherit;margin: -17px 33px 0px;" name="checked_id[]" class="checkbox" onclick="check_checkboxes()" value="<?php echo $row->Ptid; ?>"/>&nbsp;--><?php echo $j++; ?></td>
						<td><?php echo $row->Student_roll_no; ?></td>
						<td><?php echo $row->Student_name; ?></td>
						<td><?php echo $row->gender; ?></td>
						<td><?php echo $row->adhar_card; ?></td>
						<td><?php echo $row->Parent_mobile_no; ?></td>
				        <td><?php echo $row->Student_class_division; ?>&nbsp;&nbsp;(<?php echo $row->divsion;?>)</td>
						 <td><?php echo $row->sub_cast; ?></td>
						<td>
					
			 &nbsp;&nbsp;
				<a href="<?php echo site_url(); ?>student_history?view-details=<?php echo $row->Ptid; ?>" title="View" class="btn btn-success"><i class="fa fa-eye"></i></a>
			</td>
                        </tr>
						<?php $i++; } }else{ ?>
						<tr><td colspan="9"><div class="alert alert-danger">No Student Founds</div></td></tr>
						<?php } ?>
                      </tbody>
                    </table>
					<br /><br />
					<br />
					<div class="row">
				<div class="col-md-12">
				<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
				<?php 
				$d=$currentrecords[0]->login_id;
				}else{
				$d=$currentrecords[0]->Pid;
				}
				   if(isset($_GET['searchkeyowords'])){
				    
				echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$d);
				}elseif(isset($_GET['class_details'])){
				} else{  echo userspagings($setLimit,$page,$d);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
		<br /><br />
		<br /><br />
	</div>
	<script>
	</script>
	<?php //include('footer.php');
	
	
	 ?>
	<script>
	   
	    function inactivestatus(id){
	var con=confirm('are you sure to the update status !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/principle_status_inactive",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
   	
	
</script>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>
<?php
function userspagings($per_page,$page,$login){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_student_history  where (pid='".$login."' OR pid='".$login."')")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}                                           
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}

if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}

$setPaginate.= "</ul>\n";		
}


return $setPaginate;
} 


function userspaignsearchings($per_page,$page,$searchid,$login){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_student_history  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and  (pid='".$login."' OR pid='".$login."')")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)

{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}                                                    
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}

if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}

$setPaginate.= "</ul>\n";		
}


return $setPaginate;
} 

 ?>
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
