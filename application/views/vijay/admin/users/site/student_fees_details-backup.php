<?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['PARENT_ID']))) {  $currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
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
$mysqluery=$this->db->query("select *from tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') and Status='active' order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
 }else{
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."' and Status='active' order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
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
window.location='student-list-clerk?searchkeyowords='+search_id2;
return false;
}
</script>

<script>
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
                        }else{
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
								$('#Principle_schools_image').val('');
                            return false;
                        }
                    }
                }else{
                 alert("This browser does not support HTML5 FileReader.");
                }     
			}
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
	
	$(document).ready(function(){
$("#admission_date").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		maxDate:0
    });
	});
	

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
				url: "<?php site_url(); ?>users_controller/student_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					 window.location='student-list-clerk';
					// alert('ok');
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
//window.location='student-list-clerk?searchkeyowords='+search_id2;
return false;
 }
</script>
<div class="container main">			
				
		<?php if(isset($_GET['view-details'])){ 
		$t=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['view-details']."' and Status='active'")->result(); ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">View Details&nbsp;&nbsp;<a href="<?php echo site_url(); ?>student-list-clerk" class="btn btn-success">Back</a></div>
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
					<tr><th>Religion (Caste):</th><td><?php echo $t[0]->cast; ?></td> <th>Sub Caste:</th><td><?php echo $t[0]->sub_cast; ?></td></tr>
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
		<?php }elseif(isset($_GET['add_fees_details'])){ 
		$s=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['add_fees_details']."' and Status='active'")->row(); ?>
		<!-- /.row -->
		
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">Add Student Fees Details</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>users_controller/add_student_fees">
		<input type="hidden" name="class" id="class" value="<?php echo $s->Student_class_division; ?>" />
		<input type="hidden" name="division" id="division" value="<?php echo $s->divsion; ?>" />
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $s->Ptid; ?>" />
		<input type="hidden" name="pid" id="pid" value="<?php echo $s->pid; ?>" />
		<div class="row">
		<div class="form-group col-md-4">
		 <label class="control-label" for="name">Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="total_fees" id="total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		 <label class="control-label" for="name">Paid Fees <b style="color:red;">*</b></label>
		  <input type="text" name="paid_fees" id="paid_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		 <label class="control-label" for="name">Fees Discount <b style="color:red;">*</b></label>
		 <select class="form-control" name="dicount_percentage" id="dicount_percentage" required>
		 <option value=""></option>
		 <?php $tbl_fees_discount_master=$this->db->query("select discount from tbl_fees_discount_master")->result(); ?>
		 <option value="0">No Discount</option>
		 <?php foreach($tbl_fees_discount_master as $row){ ?>
		 <option value="<?php echo $row->discount; ?>"><?php echo $row->discount; ?> %</option>
		 <?php } ?>
		 </select>
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Exam Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="exam_total_fees" id="exam_total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Exam Paid Fees <b style="color:red;">*</b></label>
		  <input type="text" name="exam_recives_fess" id="exam_recives_fess" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Tour Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="tour_total_fees" id="tour_total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Tour Paid Fees <b style="color:red;">*</b></label>
		  <input type="text" name="tour_recives_fess" id="tour_recives_fess" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Other Total Fees  <b style="color:red;"></b></label>
		 <input type="text" name="other_total_fees" id="other_total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Other Paid Fees <b style="color:red;"></b></label>
		  <input type="text" name="other_recive_fees" id="other_recive_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2">
		<input type="submit" class="btn btn-primary" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url(); ?>student-fees-details" class="btn btn-danger"> Back</a></div>
		</div>
		</form>
		</div>
			  </div>
		</div>
		</div>
		                    
		<?php }elseif(isset($_GET['update_amount'])){
		      $id=$_GET['update_amount'];
			  $t=$this->db->query("select *from tbl_fees where id='$id'")->row(); 
			   $paid_fees=$this->db->query("SELECT SUM(installment_amount) AS total_paid_amount FROM tbl_installment_amount where fees_id='$id'")->result();
			   $total_dis=$t->total_discount_fees-$paid_fees[0]->total_paid_amount;
			   if($total_dis<=0){
			   $total_dis1=0;
			   }else{
			   $total_dis1=$total_dis;
			   }
		 ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">Update Student Fees Details</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>users_controller/update_student_fees">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="row">
		<div class="form-group col-md-4">
		 <label class="control-label" for="name">Discount Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="total_fees" value="<?php echo $t->total_discount_fees; ?>" style="background-color: #fff;"  readonly="true" id="total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
        <strong> Total Amount: <?php echo $t->total_fees; ?></strong>
        <input type="hidden" value="<?php echo $t->total_fees; ?>" name="total_fees123" />
		 </div>
		 <div class="form-group col-md-4">
          <label class="control-label" for="name">Fees Discount <b style="color:red;">*</b></label>
		 <select class="form-control" name="dicount_percentage" id="dicount_percentage" required>
		 <?php $tbl_fees_discount_master=$this->db->query("select discount from tbl_fees_discount_master")->result(); ?>
		 <option value="<?php echo $t->dicount_percentage; ?>"><?php echo $t->dicount_percentage; ?> %</option>
		 <?php foreach($tbl_fees_discount_master as $row){ ?>
		 <option value="<?php echo $row->discount; ?>"><?php echo $row->discount; ?> %</option>
		 <?php } ?>
		 </select>
		 <label for="name">Paid Amount: <?php echo $paid_fees[0]->total_paid_amount; ?></label><br />
		
		 </div>
		 <div class="form-group col-md-4">
		 <label class="control-label" for="name">Paid Installment <b style="color:red;">*</b></label>
		  <input type="text" name="paid_fees" id="paid_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control" />
           <label for="name">Remaining Amount: <?php echo $total_dis1; ?></label>
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Exam Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="exam_total_fees" value="<?php echo $t->exam_total_fees; ?>"  id="exam_total_fees" style="background-color: #fff;"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Exam Paid Fees <b style="color:red;">*</b></label>
		  <input type="text" name="exam_recives_fess" id="exam_recives_fess"  value="<?php echo $t->exam_recives_fess; ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Tour Total Fees  <b style="color:red;">*</b></label>
		 <input type="text" name="tour_total_fees" value="<?php echo $t->tour_total_fees; ?>" style="background-color: #fff;"  id="tour_total_fees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Tour Paid Fees <b style="color:red;">*</b></label>
		  <input type="text" name="tour_recives_fess" value="<?php echo $t->tour_recives_fess; ?>" id="tour_recives_fess" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="form-group col-md-6">
		 <label class="control-label" for="name">Other Total Fees  <b style="color:red;"></b></label>
		 <input type="text" name="other_total_fees" id="other_total_fees" value="<?php echo $t->other_total_fees; ?>" style="background-color: #fff;"  readonly="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control" />
		 </div>
		 <div class="form-group col-md-6">
		 <label class="control-label" for="name">Other Paid Fees <b style="color:red;"></b></label>
		  <input type="text" name="other_recive_fees" id="other_recive_fees" value="<?php echo $t->other_recive_fees; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control" />
		 </div>
		</div>
		<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2">
		<input type="submit" class="btn btn-primary" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url(); ?>student-fees-details" class="btn btn-danger"> Back</a></div>
		</div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<?php }elseif(isset($_GET['view_fees_details'])){ 
		$id=$_GET['view_fees_details'];
		$tbl_fees=$this->db->query("select *from tbl_fees where id='$id'")->row(); 
		$parent_id=$tbl_fees->parent_id;
		$parent=$this->db->query("select *from tbl_parent where Ptid='$parent_id' and Status='active'")->row();
		$installment=$this->db->query("select *from tbl_installment_amount where fees_id='$id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">View Fees Details</h3></div>
			 <div class="panel-body">
			 <div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<table id="datatable" class="table table-striped table-bordered">
			<tr><th>Admission No.</th><td><?php echo $parent->gr_code; ?></td><th>Admission Date.</th><td><?php echo $parent->admission_date; ?></td><th>U.I.D.No. </th><td><?php echo $parent->u_id_no; ?></td></tr>
			<tr><th>Student Name</th><td><?php echo $parent->Student_name; ?></td><th>Class</th><td><?php echo $tbl_fees->class; ?></td><th>Division</th><td><?php echo $tbl_fees->division; ?></td></tr>
			<tr><th>Medium</th><td><?php echo $parent->medium; ?></td><th>Total Fees</th><td><?php echo $tbl_fees->total_fees; ?></td><th>Discount Fees</th><td><?php echo $tbl_fees->total_discount_fees; ?> (<?php echo $tbl_fees->dicount_percentage;  ?>%)</td></tr>
			<tr><th colspan="6" align="center" style="text-align:center;">Admission Fees</th></tr>
			<tr><th>Sr No.</th><th>Date</th><th>PAID INSTALMENT</th><th>Status</th><th>PENDING AMOUNT</th><th>Fess Status</th></tr>
			<?php $total_remaing=''; $paid_amount='0'; $i=1;foreach($installment as $row){  
			  $total_remaing=($total_amunt-$row->installment_amount);
			  $paid_amount=$paid_amount+$row->installment_amount;
			   $all_paid_amount=$total_amunt-$paid_amount;
			   ?>
			<tr><td><?php echo $i++; ?></td>
			<td><?php echo $row->date; ?></td>
			<td><?php echo $row->installment_amount; ?></td>
			<td><b style="color:green;">PAID</b></td>
			<td><?php echo $all_paid_amount; ?></td>
			<td><?php if($all_paid_amount<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<?php } ?>
			<tr><th></th><th>TOTAL FEES</th><th>RECIVE FEES</th><th>DATE</th><th>PENDING AMOUNT</th><th>Fees Status</th></tr>
			<tr><th>Exam Fees</th><td><?php echo $tbl_fees->exam_total_fees; ?></td><td><?php echo $tbl_fees->exam_recives_fess; 
			$remaining_exam_fees=$tbl_fees->exam_total_fees-$tbl_fees->exam_recives_fess; ?></td>
			<td><?php echo $tbl_fees->exam_fees_date; ?></td>
			<td><?php echo $remaining_exam_fees; ?></td>
			<td><?php if($remaining_exam_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<tr><th>Tour Fees</th><td><?php echo $tbl_fees->tour_total_fees; ?></td><td><?php echo $tbl_fees->tour_recives_fess; 
			$remaining_tour_fees=$tbl_fees->tour_total_fees-$tbl_fees->tour_recives_fess; ?></td>
			<td><?php echo $tbl_fees->tour_fees_date; ?></td>
			<td><?php echo $remaining_tour_fees; ?></td>
			<td><?php if($remaining_tour_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<tr><th>Other Fees</th><td><?php echo $tbl_fees->other_total_fees; ?></td><td><?php echo $tbl_fees->other_recive_fees; 
			$remaining_other_fees=$tbl_fees->other_total_fees-$tbl_fees->other_recive_fees; ?></td>
			<td><?php echo $tbl_fees->other_fees_date; ?></td>
			<td><?php echo $remaining_other_fees; ?></td>
			<td><?php if($remaining_other_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			</table>
			</div>
			<div class="col-md-1"></div>
			</div>
			 </div></div></div></div>
		<?php  }elseif(isset($_SESSION['PARENT_ID'])){ ?>
		<?php 
		$id=$_SESSION['PARENT_ID'];
		$parent=$this->db->query("select *from tbl_parent where Ptid='$id' and Status='active'")->row();
		$class=$parent->Student_class_division;
		$division=$parent->divsion;
		$tbl_fees=$this->db->query("select *from tbl_fees where parent_id='$id' and division='$division' and class='$class'")->row(); 
		$fees_id=$tbl_fees->id;
		$installment=$this->db->query("select *from tbl_installment_amount where fees_id='$fees_id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">Student Fess Details</h3></div>
			 <div class="panel-body">
			 <div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<?php if(count($tbl_fees)>=1) { ?>
			<table id="datatable" class="table table-striped table-bordered">
			<tr><th>Admission No.</th><td><?php echo $parent->gr_code; ?></td><th>Admission Date.</th><td><?php echo $parent->admission_date; ?></td><th>U.I.D.No. </th><td><?php echo $parent->u_id_no; ?></td></tr>
			<tr><th>Student Name</th><td><?php echo $parent->Student_name; ?></td><th>Class</th><td><?php echo $tbl_fees->class; ?></td><th>Division</th><td><?php echo $tbl_fees->division; ?></td></tr>
			<tr><th>Medium</th><td><?php echo $parent->medium; ?></td><th>Total Fees</th><td><?php echo $tbl_fees->total_fees; ?></td><th>Discount Fees</th><td><?php echo $tbl_fees->total_discount_fees; ?> (<?php echo $tbl_fees->dicount_percentage;  ?>%)</td></tr>
			<tr><th colspan="6" align="center" style="text-align:center;">Admission Fees</th></tr>
			<tr><th>Sr No.</th><th>Date</th><th>PAID INSTALMENT</th><th>Status</th><th>PENDING AMOUNT</th><th>Fess Status</th></tr>
			<?php $total_remaing=''; $paid_amount='0'; $i=1;foreach($installment as $row){  
			  $total_remaing=($total_amunt-$row->installment_amount);
			  $paid_amount=$paid_amount+$row->installment_amount;
			   $all_paid_amount=$total_amunt-$paid_amount;
			   ?>
			<tr><td><?php echo $i++; ?></td>
			<td><?php echo $row->date; ?></td>
			<td><?php echo $row->installment_amount; ?></td>
			<td><b style="color:green;">PAID</b></td>
			<td><?php echo $all_paid_amount; ?></td>
			<td><?php if($all_paid_amount<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<?php } ?>
			<tr><th></th><th>TOTAL FEES</th><th>RECIVE FEES</th><th>DATE</th><th>PENDING AMOUNT</th><th>Fees Status</th></tr>
			<tr><th>Exam Fees</th><td><?php echo $tbl_fees->exam_total_fees; ?></td><td><?php echo $tbl_fees->exam_recives_fess; 
			$remaining_exam_fees=$tbl_fees->exam_total_fees-$tbl_fees->exam_recives_fess; ?></td>
			<td><?php echo $tbl_fees->exam_fees_date; ?></td>
			<td><?php echo $remaining_exam_fees; ?></td>
			<td><?php if($remaining_exam_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<tr><th>Tour Fees</th><td><?php echo $tbl_fees->tour_total_fees; ?></td><td><?php echo $tbl_fees->tour_recives_fess; 
			$remaining_tour_fees=$tbl_fees->tour_total_fees-$tbl_fees->tour_recives_fess; ?></td>
			<td><?php echo $tbl_fees->tour_fees_date; ?></td>
			<td><?php echo $remaining_tour_fees; ?></td>
			<td><?php if($remaining_tour_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			<tr><th>Other Fees</th><td><?php echo $tbl_fees->other_total_fees; ?></td><td><?php echo $tbl_fees->other_recive_fees; 
			$remaining_other_fees=$tbl_fees->other_total_fees-$tbl_fees->other_recive_fees; ?></td>
			<td><?php echo $tbl_fees->other_fees_date; ?></td>
			<td><?php echo $remaining_other_fees; ?></td>
			<td><?php if($remaining_other_fees<=0){ echo 'COMPLETED'; }else{ echo 'PENDING'; } ?></td>
			</tr>
			</table>
			<?php }else{ ?>
			<div class="alert alert-danger">Your children fees not paid</div>
			<?php } ?>
			</div>
			<div class="col-md-1"></div>
			</div>
			 </div></div></div></div>
		<?php }else{ ?>
		<div class="row">
		<form name="bulk_action_form" action="<?php echo site_url(); ?>users_controller/multiple_student_delete" method="post">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
	<!--<input type="submit" class="btn btn-danger" name="bulk_delete_submit" id="bulk_delete_submit" style="display:none"  onclick="return deleteConfirm();" value="Delete" />
	<a href="<?php echo site_url(); ?>new-student-registration" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Student</a>&nbsp;&nbsp;
	-->	<?php } ?>
		</div>

<div class="col-md-6">
<div class="form-group pull-right">
<input type="text" id="search_id" placeholder="Search *" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>"  style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="button" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</div>
</div>	</div>	
<br />
		<div class="table-responsive">
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Admission No.</th>
                          <th>Student Name</th>
						  <th>Gender</th>
						  <th>Adhar Card</th>
						   
						  <th>Class</th>
						 
						  <th>Remaing Fees</th>
						  <th>Paid Fees</th>
						  <th>Total Fees</th>
						  <th>Fees Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  if(count($mysqluery)){
					    $serial = ($pageLimit * $setLimit) + 1; $sn = ($page * $setLimit) + 1; $page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                        $start_num =((($page_num*$setLimit)-$setLimit)+1); $i=1; $j= (($page-1) * $setLimit) + $i; 
						foreach($mysqluery as $row){ $num = $sn ++;
						$pid=$row->pid; $class=$row->Student_class_division; $division=$row->divsion; $parent_id=$row->Ptid;
						$tbl_fees=$this->db->query("select *from tbl_fees where division='$division' and class='$class' and pid='$pid' and parent_id='$parent_id'")->row(); 
						
						
					   ?>
                        <tr>
						<td>&nbsp;<?php echo $j++; ?></td>
						<td><?php echo $row->gr_code; ?></td>
						<td><?php echo $row->Student_name; ?></td>
						<td><?php echo $row->gender; ?></td>
						<td><?php echo $row->adhar_card; ?></td>
				        <td><?php echo $row->Student_class_division; ?>&nbsp;&nbsp;(<?php echo $row->divsion;  ?>)</td>
						<?php
						 $fees_id=$tbl_fees->id;
						   $paid_fees=$this->db->query("SELECT SUM(installment_amount) AS total_paid_amount FROM tbl_installment_amount where fees_id='$fees_id'")->result();
						   $total_paid_fees=$tbl_fees->total_discount_fees-$paid_fees[0]->total_paid_amount;
						   $total_exam_paid=$tbl_fees->exam_total_fees-$tbl_fees->exam_recives_fess;
						   $total_tour_paid=$tbl_fees->tour_total_fees-$tbl_fees->tour_recives_fess;
						   $total_other_paid=$tbl_fees->other_total_fees-$tbl_fees->other_recive_fees;
						   $total_all_fees=$tbl_fees->total_discount_fees+$tbl_fees->exam_total_fees+$tbl_fees->tour_total_fees+$tbl_fees->other_total_fees;
						   $totalsremaing_fees=$total_paid_fees+$total_exam_paid+$total_tour_paid+$total_other_paid;
						   $totals_paid=$paid_fees[0]->total_paid_amount+$tbl_fees->exam_recives_fess+$tbl_fees->tour_recives_fess+$tbl_fees->other_recive_fees;
						 ?>
						
						 <td><?php if($totalsremaing_fees<=0) { echo 0; }else{ echo  $totalsremaing_fees; } ?></td>
						 <td><?php if($totals_paid<=0) { echo 0; }else{ echo $totals_paid; } ?></td>
						  <td><?php echo $total_all_fees; ?></td>
						 <td><?php if(count($tbl_fees)>=1){
						   if(($total_paid_fees<=0) && ($total_exam_paid<=0) && ($total_tour_paid<=0) && ($total_other_paid<=0))
						   {
						   echo '<b style="color:green;">Completed</b>';
						   }else{
						   echo '<b style="color:red;">Pennding</b>';
						   }
						  }else{ echo '<b style="color:red;">Not Paid</b>'; } ?></td>
						<td>
				<?php 
				if(count($tbl_fees)>=1){
				?>
		 <a href="<?php echo site_url(); ?>student-fees-details?view_fees_details=<?php echo $tbl_fees->id; ?>" title="View" class="btn btn-success"><i class="fa fa-eye"></i></a>
		 <?php if(($total_paid_fees<=0) && ($total_exam_paid<=0) && ($total_tour_paid<=0) && ($total_other_paid<=0))
						   {?>
			<a href="<?php echo site_url(); ?>student-fees-details?update_amount=<?php echo $tbl_fees->id; ?>" class="btn btn-primary" title="Edit" ><i class="fa fa-pencil"></i></a>			   
						   <?php  }else{ ?>
						    <?php if($_SESSION['USERTYPE']=='clerk'){ ?>
		<a href="<?php echo site_url(); ?>student-fees-details?update_amount=<?php echo $tbl_fees->id; ?>" class="btn btn-primary" title="Edit" ><i class="fa fa-pencil"></i></a>
				<?php } } }else{ ?>
				 <?php if($_SESSION['USERTYPE']=='clerk'){ ?>
<a href="<?php echo site_url(); ?>student-fees-details?add_fees_details=<?php echo $row->Ptid; ?>" title="Create Amount" class="btn btn-primary"><i class="fa fa-plus"></i> Add Fees</a>
			<?php } } ?>
			</td>
                        </tr>
						<?php $i++; } }else{ ?>
						<tr><td colspan="8"><div class="alert alert-danger">No Student Founds</div></td></tr>
						<?php } ?>
                      </tbody>
                    </table>
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where (pid='".$login."' OR pid='".$login."')")->result();
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and  (pid='".$login."' OR pid='".$login."')")->result();
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
