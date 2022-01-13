<style>
.table > thead > tr > th{
height:26px;
}
</style>
<script>
function search_result122(){
var month=$("#month").val();
var year=$("#year").val();
if(month==""){
 alert("Please select month");
 return false;
}
if(year==""){
 alert("Please select year");
 return false;
}
window.location='attendance-student-list?year='+year+'&month='+month;
return false;
}

</script>
<?php if(isset($_SESSION['TEACHER_ID'])) { ?>
<div class="container main">			
			<br />	
		<div class="row">
		<div class="col-md-12">
		<div class="row">
		<form method="post" action="#" enctype="multipart/form-data">
		<div class="col-md-2"></div>
		<div class="col-md-3">
		<label>Select Month</label>
		<?php $monthss=$this->db->query("select month,month_name from month_master")->result(); ?>
		<select name="month" id="month" class="form-control">
		<?php if(isset($_GET['month'])){ 
		$months=$this->db->query("select month,month_name from month_master where month='".$_GET['month']."'")->row();
		?>
		<option value="<?php echo $_GET['month']; ?>"><?php echo $months->month_name; ?></option>
		<?php foreach($monthss as $m){  if($_GET['month']!=$m->month_name){ ?>
		<option value="<?php echo $m->month; ?>"><?php echo $m->month_name; ?></option>
		<?php } } ?>
		<?php }else{ ?>
		<option value="">Select</option>
		<?php foreach($monthss as $m){ ?>
		<option value="<?php echo $m->month; ?>"><?php echo $m->month_name; ?></option>
		<?php  } ?>
		<?php } ?>
		</select></div>
		<div class="col-md-3">
		<label>Select Year</label>
		<?php $year_master=$this->db->query("select year from year_master")->result(); ?>
		<select name="year" id="year" class="form-control">
		<?php if(isset($_GET['year'])){ 
		?>
		<option value="<?php echo $_GET['year']; ?>"><?php echo $_GET['year']; ?></option>
		<?php foreach($year_master as $y){  if($_GET['year']!=$y->year){ ?>
		<option value="<?php echo $y->year; ?>"><?php echo $y->year; ?></option>
		<?php } } ?>
		<?php }else{ ?>
		<option value="">Select</option>
		<?php foreach($year_master as $y){ ?>
		<option value="<?php echo $y->year; ?>"><?php echo $y->year; ?></option>
		<?php }  ?>
		<?php } ?>
		</select></div>
		<div class="col-md-2">
		<br />
		<input type="submit" name="sub" style="margin-top:7px;" value="Submit" class="btn btn-success" onclick="return search_result122()" /></div>
		<div class="col-md-2"></div>
		</form>
		</div><br />
		<?php $teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); ?>
		    <?php
if((isset($_GET['year'])) && (isset($_GET['month']))){
$month = $_GET['month'];
$year =  $_GET['year'];
}else{
$month = date('m');
$year = date('Y');
}
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);
//print_r($list); 

$currentrecords=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); 
$div=$currentrecords[0]->divsion;
$school=$currentrecords[0]->schools_name;
$year=$currentrecords[0]->year;
$pid=$currentrecords[0]->Pid;
$mysqluery=$this->db->query("select *from tbl_parent where divsion='".$div."' and Student_class_division='".$school."' and pid='".$pid."' and Status='active' order by Student_name asc")->result();
?>
<div class="table-responsive" style="width: 100%;overflow: auto;">
<table class="table table-bordered">
<thead><tr><th>Roll Number</th><th>Name</th><?php for($i=$start_time; $i<$end_time; $i+=86400){ ?><th><?php echo date('d', $i);  ?></th><?php } ?><th>Present(D)</th><th>HalfDay(D)</th><th>Absent(D)</th><th>Holiday(D)</th></tr></thead>
<tbody>
<?php foreach($mysqluery as $rows){ ?>
<tr>
<td><?php echo ucfirst($rows->Student_roll_no); ?></td>
<td><?php echo $rows->Student_name; 
$class_name=$rows->Student_class_division; 
$roll_no=$rows->Student_roll_no;
$division=$rows->divsion;
$student_year=$rows->Student_year;
$student_id=$rows->Ptid;
  //$holidaysdate=$this->db->query("select *from yearly_holiday_master")?></td>
<?php $persent=0; $absent=0; $holiday=0; $halfday=0; for($i=$start_time; $i<$end_time; $i+=86400){  
     $holiday_date=date('Y-m-d',$i);
	// echo $holiday_date;
$child_date_range=$this->db->query("select date1 from child_master where date1='".$holiday_date."' and pid='".$pid."'")->result();
$attendance_list=$this->db->query("select roll_no,year,month,attendance_date,class_name,anual_year,pid,divsion,attendance_status from tbl_attendance where attendance_date='".$holiday_date."' and pid='".$pid."' and class_name='".$class_name."' and divsion='".$division."' and ptid='$student_id'")->result();
//$status=$attendance_list[0]->attendance_status; 
//echo $status;
//echo $this->db->last_query();
 ?><td><?php  $days=date('D', $i); if(count($child_date_range)>=1){ $holiday=$holiday+1; echo '<b style="color:orange;">H</b>'; }elseif($days=='Sun') { echo '<b style="color:red">'.$days.'</b>'; }elseif(count($attendance_list)>=1){
  if($attendance_list[0]->attendance_status=='P') {  
  $persent=$persent+1; echo '<b style="color:green">'.$attendance_list[0]->attendance_status.'</b>'; 
  }else if($attendance_list[0]->attendance_status=='H') {
  $halfday=$halfday+1;
  echo '<b style="color:#8ad919;">HP</b>';                                  
   }else{  $absent=$absent+1; echo '<b style="color:red">'.$attendance_list[0]->attendance_status.'</b>'; 
  }
   }else{ echo  date('d', $i);  }  ?></td><?php } ?>
 <td><?php echo $persent;  ?></td>
  <td><?php echo $halfday;  ?></td>
 <td><?php echo $absent;  ?></td>
 <td><?php echo $holiday;  ?></td>
</tr>
<?php } ?>
</tbody>
</table>
		</div>
		</div>
		</div>
		<br /><br /><br /><br /><br /><br /><br />
		<br><br>
	</div>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>

