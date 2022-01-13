<?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['PARENT_ID']))) {  $currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
//echo $this->db->last_query();
//exit;
?>
	 <script>
$(document).ready(function(){
$(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
    });
	});
</script>
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
		function fees_discount(){
		  var total_fees1=$("#total_fees1").val();
		  var discount_fees=$("#discount_fees").val();
		  var dicount_percentage =$("#dicount_percentage").val();
		  var total_discount_fees = total_fees1 - (total_fees1 * (dicount_percentage / 100));
		  $("#discount_fees").val(total_discount_fees);
		}
	
</script>		
<script>
function download_data(){
//alert();
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
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>users_controller/add_student_fees_details">
		<input type="hidden" name="class" id="class" value="<?php echo $s->Student_class_division; ?>" />
		<input type="hidden" name="division" id="division" value="<?php echo $s->divsion; ?>" />
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $s->Ptid; ?>" />
		<input type="hidden" name="pid" id="pid" value="<?php echo $s->pid; ?>" />
		<div class="row">
		<div class="form-group col-md-4">
		 <input type="text" name="total_fees1" id="total_fees1" placeholder="Total Fees *" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		  <input type="text" name="discount_fees" id="discount_fees" placeholder="Discount Fees *" readonly="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		 <select class="form-control" name="dicount_percentage" id="dicount_percentage" onchange="fees_discount();" required>
		 <option value="">Fees Discount *</option>
		 <?php $tbl_fees_discount_master=$this->db->query("select discount from tbl_fees_discount_master")->result(); ?>
		 <option value="0">No Discount</option>
		 <?php foreach($tbl_fees_discount_master as $row){ ?>
		 <option value="<?php echo $row->discount; ?>"><?php echo $row->discount; ?> %</option>
		 <?php } ?>
		 </select>
		 </div>
		</div>
		<div class="row">
		<table class="table table-bordered">
		<thead><tr><th>Sr No</th><th>Fees Type</th><th>Total Fees</th><th>Paid Fees</th><th>Fees Paid Date</th></tr></thead>
		<tbody>
		<tr>
		<td>1</td>
		<td><input type="text" required name="fees_type[]"  placeholder="Fees Type *"  class="form-control" required /></td>
		<td><input type="text" required name="total_fees[]" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Total Fees *" class="form-control" required /></td>
		<td><input type="text" required name="paid_fees[]"  autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Paid Fees *" class="form-control" required /></td>
		<td><input type="text"  name="created_date[]"   placeholder="Paid Date *" autocomplete="off" class="form-control datepicker" required /></td>
		</tr>
		</tbody>
		</table>
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
			     $fees=$this->db->query("select  *from tbl_fees_master where id='".$_GET['update_amount']."'")->row();
			     $fees_type=$this->db->query("select  *from tbl_fees_type where fees_id='".$fees->id."'")->result();
			     $s=$this->db->query("select  *from tbl_parent where Ptid='".$fees->parent_id."' and Status='active'")->row();
				 $sumvalues=$this->db->query("select sum(paid_fees) as paidfees from tbl_fees_type where fees_id='".$fees->id."'")->result();
		 ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size:18px;text-align: center;margin-top: 6px;">Update Student Fees Details</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>users_controller/update_student_fees_details">
		<input type="hidden" name="class" id="class" value="<?php echo $s->Student_class_division; ?>" />
		<input type="hidden" name="division" id="division" value="<?php echo $s->divsion; ?>" />
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $s->Ptid; ?>" />
		<input type="hidden" name="pid" id="pid" value="<?php echo $s->pid; ?>" />
		<input type="hidden" name="fees_id" id="fees_id" value="<?php echo $fees->id ?>" />
		<div class="row">
		<div class="form-group col-md-4">
		<label>Total Fees *</label>
		 <input type="text" name="total_fees1" id="total_fees1" value="<?php echo $fees->total_fees; ?>" placeholder="Total Fees *" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		 <label>Discount Fees *</label>
		  <input type="text" name="discount_fees" id="discount_fees" value="<?php echo $fees->total_discount_fees; ?>" placeholder="Discount Fees *" readonly="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" required class="form-control" />
		 </div>
		 <div class="form-group col-md-4">
		 <label>Discount Percentage *</label>
		 <select class="form-control" name="dicount_percentage" id="dicount_percentage" onchange="fees_discount();" required>
		 <option value="<?php echo $fees->dicount_percentage; ?>"><?php echo $fees->dicount_percentage; ?> %</option>
		 <?php $tbl_fees_discount_master=$this->db->query("select discount from tbl_fees_discount_master")->result(); ?>
		
		 <?php foreach($tbl_fees_discount_master as $row){ ?>
		 <option value="<?php echo $row->discount; ?>"><?php echo $row->discount; ?> %</option>
		 <?php } ?>
		 <option value="0">0</option>
		 </select>
		 </div>
		 <div class="col-md-4">
		 <strong>Total Paid Fees <?php echo $sumvalues[0]->paidfees; ?></strong>
		 </div><div class="col-md4"> <strong>Total Remaining Fees 
		 <?php $paid=($fees->total_discount_fees)-($sumvalues[0]->paidfees); 
		 if($paid<=0){ echo '0'; }else{ echo  $paid; }
		 ?></strong></div>
		</div>
		<div class="row">
		<table class="table table-bordered">
		<thead><tr><th>Sr No</th><th>Fees Type</th><th>Total Fees</th><th>Paid Fees</th><th>Paid Date</th></tr></thead>
		<tbody>
		<tr>
		<?php $i=1; $ii=1; $tot=''; foreach($fees_type as $row){  if($i==1){?>
		<td><?php echo $i;  ?></td>
		<td><input type="text" required name="fees_type[]"  value="<?php echo $row->fees_type; ?>" placeholder="Fees Type *" class="form-control" required /></td>
		<td><input type="text" required name="total_fees[]" value="<?php echo round($row->total_fees); ?>"  autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Total Fees *" class="form-control" required /></td>
		<td><input type="text" required name="paid_fees[]"  value="<?php echo round($row->paid_fees); ?>"  autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Paid Fees *" class="form-control" required /></td>
		<td>
	<input type="text" required name="created_date[]"  value="<?php if($row->created_date!='0000-00-00'){ echo ($row->created_date); } ?>" autocomplete="off" placeholder="Paid Date" class="form-control datepicker" required />
		</td>
		</tr>
		<?php }else{  ?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><input type="text"  name="fees_type[]" value="<?php echo $row->fees_type; ?>" placeholder="Fees Type" class="form-control" /></td>
		<td><input type="text"  name="total_fees[]" value="<?php echo round($row->total_fees); ?>" autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  placeholder="Total Fees" class="form-control" /></td>
		<td><input type="text"  name="paid_fees[]" value="<?php echo round($row->paid_fees); ?>" autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  placeholder="Paid Fees" class="form-control" /></td>
	<td>	
	<input type="text"  name="created_date[]" value="<?php if($row->created_date!='0000-00-00'){ echo ($row->created_date); } ?>" autocomplete="off" placeholder="Paid Date" class="form-control datepicker"  />
		</td>
		</tr>
		<?php  } ?>
		<input type="hidden" value="<?php echo $row->id; ?>" name="intallmentid[]" />
		<?php $i++; $tot=$ii+$tot; } ?>
		
		<tr>
		<td><?php echo $tot+1; ?></td>
		<input type="hidden" value="" name="intallmentid[]" />
		<td><input type="text" required name="fees_type[]"  placeholder="Fees Type *"  class="form-control" required /></td>
		<td><input type="text" required name="total_fees[]" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Total Fees *" class="form-control" required /></td>
		<td><input type="text" required name="paid_fees[]"  autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/\./g,'')"  placeholder="Paid Fees *" class="form-control" required /></td>
		<td><input type="text"  name="created_date[]"   placeholder="Paid Date *" autocomplete="off" class="form-control datepicker" required /></td>
		</tr>
		</tbody>
		</table>
		</div>
		
		<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-3">
		<input type="submit" class="btn btn-primary" value="Save Changes" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo site_url(); ?>student-fees-details" class="btn btn-danger"> Back</a></div>
		</div>
		</form>
		</div>
		</div>
		</div>
		</div>
		<br /><br /><br /><br /><br /><br /><br />
		<?php }elseif(isset($_GET['view_fees_details'])){ 
		$id=$_GET['view_fees_details'];
		$tbl_fees=$this->db->query("select *from tbl_fees_master where id='$id'")->row(); 
		$parent_id=$tbl_fees->parent_id;
		$parent=$this->db->query("select *from tbl_parent where Ptid='$parent_id' and Status='active'")->row();
		$installment=$this->db->query("select *from tbl_fees_type where fees_id='$id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		$fees=$this->db->query("select sum(paid_fees) as totalfees from tbl_fees_type where fees_id='$id'")->result();
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
			<th colspan="6" style="text-align:center;background-color: #423d3d;color: white;">Student School Fees Details</th>
			<tr><th>Student Name </th><td colspan="2"><?php echo $parent->Student_name; ?></td><th colspan="1">Class & Division</th>
			<td><?php echo $tbl_fees->class; if(!empty($tbl_fees->division)){ echo '('.$tbl_fees->division.')'; } ?></td>
			<tr><th>Total Fees</th><td colspan="2"><i class="fa fa-inr"></i> <?php echo $tbl_fees->total_fees; ?></td><th colspan="1">Discount Fees</th>
			<td> <i class="fa fa-inr"></i> <?php echo $tbl_fees->total_discount_fees; ?></td></tr>
			<tr><th>Total Paid Fees</th><th colspan="2"><i class="fa fa-inr"></i> <?php echo $fees[0]->totalfees; ?> </th><th colspan="">Total Remaining Fees</th>
			<th><i class="fa fa-inr"></i>  <?php $totalss=$total_amunt-$fees[0]->totalfees; if($totalss<=0){ echo 0; }else{ echo $totalss; }  ?></th>
			
			</tr>
			<tr><td colspan="4"></td></tr>
			<tr><th>Sr.No</th><th>Fees Type</th><th>Total Fees</th><th>Paid Fees</th><th>Paid Date</th></tr>
			<?php $i=1; $total_fees=''; $total_paid=''; $remaining_fees=''; foreach($installment as $row){ ?>
			<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row->fees_type; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $row->total_fees;    $total_fees=$total_fees+$row->total_fees; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $row->paid_fees;      $total_paid=$total_paid+$row->paid_fees; ?></td>
			<td><i class="fa fa-calendar"></i> <?php if($row->created_date!='0000-00-00'){ echo date('d-m-Y',strtotime($row->created_date)); }else{ echo 'NA'; } ?></td>
			</tr>
			<?php } ?>
			<tr>
			<td></td><td></td>
			<td><i class="fa fa-inr"></i> <?php echo $total_fees; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $total_paid; ?></td>
			</tr>
			</tr>
			</table>
			</div>
			<div class="col-md-1"></div>
			</div>
			 </div></div></div></div>
		<?php  }elseif(isset($_SESSION['PARENT_ID'])){ ?>
		<?php 
	 $parent_id=$_SESSION['PARENT_ID'];
		//$id=$_GET['view_fees_details'];
		$tbl_fees=$this->db->query("select *from tbl_fees_master where parent_id='$parent_id'")->row(); 
		$id=$tbl_fees->id;
		$parent_id=$tbl_fees->parent_id;
		$parent=$this->db->query("select *from tbl_parent where Ptid='$parent_id' and Status='active'")->row();
		$installment=$this->db->query("select *from tbl_fees_type where fees_id='$id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		$fees=$this->db->query("select sum(paid_fees) as totalfees from tbl_fees_type where fees_id='$id'")->result();
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
			<th colspan="6" style="text-align:center;background-color: #423d3d;color: white;">Student School Fees Details</th>
			<tr><th>Student Name </th><td colspan="2"><?php echo $parent->Student_name; ?></td><th colspan="1">Class & Division</th>
			<td><?php echo $tbl_fees->class; if(!empty($tbl_fees->division)){ echo '('.$tbl_fees->division.')'; } ?></td>
			<tr><th>Total Fees</th><td colspan="2"><i class="fa fa-inr"></i> <?php echo $tbl_fees->total_fees; ?></td><th colspan="1">Discount Fees</th>
			<td> <i class="fa fa-inr"></i> <?php echo $tbl_fees->total_discount_fees; ?></td></tr>
			<tr><th>Total Paid Fees</th><th colspan="2"><i class="fa fa-inr"></i> <?php echo $fees[0]->totalfees; ?> </th><th colspan="">Total Remaining Fees</th>
			<th><i class="fa fa-inr"></i>  <?php $totalss=$total_amunt-$fees[0]->totalfees; if($totalss<=0){ echo 0; }else{ echo $totalss; }  ?></th>
			
			</tr>
			<tr><td colspan="4"></td></tr>
			<tr><th>Sr.No</th><th>Fees Type</th><th>Total Fees</th><th>Paid Fees</th><th>Paid Date</th></tr>
			<?php $i=1; $total_fees=''; $total_paid=''; $remaining_fees=''; foreach($installment as $row){ ?>
			<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row->fees_type; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $row->total_fees;    $total_fees=$total_fees+$row->total_fees; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $row->paid_fees;      $total_paid=$total_paid+$row->paid_fees; ?></td>
			<td><i class="fa fa-calendar"></i> <?php if($row->created_date!='0000-00-00'){ echo date('d-m-Y',strtotime($row->created_date)); }else{ echo 'NA'; } ?></td>
			</tr>
			<?php } ?>
			<tr>
			<td></td><td></td>
			<td><i class="fa fa-inr"></i> <?php echo $total_fees; ?></td>
			<td><i class="fa fa-inr"></i> <?php echo $total_paid; ?></td>
			</tr>
			</tr>
			</table>
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
						$tbl_fees=$this->db->query("select *from tbl_fees_master where division='$division' and class='$class' and pid='$pid' and parent_id='$parent_id'")->row(); 
						
						
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
						   $paid_fees1=$this->db->query("SELECT SUM(paid_fees) AS total_paid_amount FROM tbl_fees_type where fees_id='".$tbl_fees->id."'")->result();
						   $paid_fees=$tbl_fees->total_discount_fees-$paid_fees1[0]->total_paid_amount;
						   
						  
						 ?>
						
						 <td><?php if($paid_fees<=0) { echo 0; }else{ echo  $paid_fees; } ?></td>
						 <td><?php if($paid_fees1[0]->total_paid_amount<=0) { echo 0; }else{ echo $paid_fees1[0]->total_paid_amount; } ?></td>
						  <td><?php echo $tbl_fees->total_discount_fees; ?></td>
						 <td><?php if(count($tbl_fees)>=1){
						   if($paid_fees<=0)
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
		 <?php if($paid_fees<=0)
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
