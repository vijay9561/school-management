<style>
.table > thead > tr > th{
height:26px;
}
</style>
<script>
function search_result122(){
var month=$("#month").val();
var year=$("#year").val();
var schools=$("#schools").val();
var division=$("#division").val();
if(month==""){
 alert("Please select month");
 return false;
}
if(year==""){
 alert("Please select year");
 return false;
}
if(schools==""){
 alert("Please select schools");
 return false;
}
if(division==""){
 alert("Please select division");
 return false;
}
window.location='student-attendance-list-admin?year='+year+'&month='+month+'&division='+division+'&schools='+schools;
return false;
}

</script>
<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<div class="col-sm-12 main">			
			<br />	
		<div class="row">
		<div class="col-md-12">
		<div class="row">
		<form method="post" action="#" enctype="multipart/form-data">
		<div class="col-md-1"></div>
		<div class="col-md-2">
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
		<div class="col-md-2">
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
		<label>Select Class</label>
		<?php $schools_master=$this->db->query("select name from schools_master")->result(); ?>
		<select name="schools" id="schools" class="form-control">
		<?php if(isset($_GET['month'])){ 
	//	$months=$this->db->query("select month,month_name from month_master where month='".$_GET['schools']."'")->row();
		?>
		<option value="<?php echo $_GET['schools']; ?>"><?php echo $_GET['schools']; ?></option>
		<?php foreach($schools_master as $m){  if($_GET['schools']!=$m->name){ ?>
		<option value="<?php echo $m->name; ?>"><?php echo $m->name; ?></option>
		<?php } } ?>
		<?php }else{ ?>
		<option value="">Select</option>
		<?php foreach($schools_master as $m){ ?>
		<option value="<?php echo $m->name; ?>"><?php echo $m->name; ?></option>
		<?php  } ?>
		<?php } ?>
		</select></div>
		<div class="col-md-2">
		<label>Select Division</label>
		<?php $divison_master=$this->db->query("select divison_name from divison_master")->result(); ?>
		<select name="division" id="division" class="form-control">
		<?php if(isset($_GET['division'])){ 
		?>
		<option value="<?php echo $_GET['division']; ?>"><?php echo $_GET['division']; ?></option>
		<?php foreach($divison_master as $y){  if($_GET['division']!=$y->divison_name){ ?>
		<option value="<?php echo $y->divison_name; ?>"><?php echo $y->divison_name; ?></option>
		<?php } } ?>
		<?php }else{ ?>
		<option value="">Select</option>
		<?php foreach($divison_master as $a){ ?>
		<option value="<?php echo $a->divison_name; ?>"><?php echo $a->divison_name; ?></option>
		<?php }  ?>
		<?php } ?>
		</select></div>

		<div class="col-md-1">
		<br />
		<input type="submit" name="sub" style="margin-top:7px;" value="Submit" class="btn btn-success" onclick="return search_result122()" /></div>
		<div class="col-md-2"></div>
		</form>
		</div><br />
		<?php //$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); ?>
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

$currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result(); 
//$div=$currentrecords[0]->divsion;
//$school=$currentrecords[0]->schools_name;
//$year=$currentrecords[0]->year;

 if($_SESSION['USERTYPE']=='clerk'){ 
$pid=$currentrecords[0]->login_id;
}else{
$pid=$currentrecords[0]->Pid;
}
if((isset($_GET['year'])) && (isset($_GET['month']))){
$tbl_attendance=$this->db->query("select *from tbl_attendance where pid='".$pid."' and divsion='".$_GET['division']."' and class_name='".$_GET['schools']."' and year='".$_GET['year']."' and month='".$_GET['month']."' GROUP BY class_name,divsion")->result();
//echo $this->db->last_query();
}else{
$tbl_attendance=$this->db->query("select *from tbl_attendance where pid='".$pid."' GROUP BY class_name,divsion")->result();
//echo $this->db->last_query();
//echo count($tbl_attendance);
}
?>
<div class="table-responsive" style="width: 100%;overflow: auto;">
<table class="table table-bordered">
<thead><tr><th>Class</th><th>Division</th><th>Attendance</th><?php for($i=$start_time; $i<$end_time; $i+=86400){ ?><th style="width:100px;" colspan="2"><?php echo date('d', $i);  ?></th><?php } ?></tr>
<tr><th colspan="3"><?php for($i=$start_time; $i<$end_time; $i+=86400){ ?><th title="Male">&nbsp;&nbsp;M&nbsp;&nbsp;</th> <th title="Female">&nbsp;&nbsp;F&nbsp;&nbsp;</th><?php } ?></th></th></tr>
</thead>
<tbody>
<?php foreach($tbl_attendance as $rows){
 $class_name=$rows->class_name;
 $division=$rows->divsion;
  ?>
<tr>
<td><?php echo $rows->class_name; ?></td>
<td><?php echo $rows->divsion; 
  //$holidaysdate=$this->db->query("select *from yearly_holiday_master")?></td>
  <td><span style="color:green;">Present</span>
  <br /><span style="color:red;">Abscent</span>
  <br /><span style="color:#8ad919;">Halfday</span>
  <br /><span style="color:#ff00cf;">Total</span></td>
<?php $persent=0; $absent=0; $holiday=0; $halfday=0; 
   for($i=$start_time; $i<$end_time; $i+=86400){  
     $holiday_date=date('Y-m-d',$i);
	// echo $holiday_date;
$child_date_range=$this->db->query("select date1,yid from child_master where date1='".$holiday_date."' and pid='".$pid."'")->result();
$attendance_list=$this->db->query("select roll_no,year,month,attendance_date,class_name,anual_year,pid,divsion,attendance_status from tbl_attendance where attendance_date='".$holiday_date."' and pid='".$pid."' and class_name='".$class_name."' and divsion='".$division."' ")->result();
//$status=$attendance_list[0]->attendance_status; 
//echo $status;
//echo $this->db->last_query();
 ?><?php  $days=date('D', $i); if(count($child_date_range)>=1){
 $yearly_holiday_master=$this->db->query("select event_name from yearly_holiday_master where yid='".$child_date_range[0]->yid."' and ptid='".$pid."'")->row();
  $holiday=$holiday+1; echo '<td colspan="2"><b style="color:orange;">'.$yearly_holiday_master->event_name.'</b></td>'; 
  }elseif($days=='Sun') { echo '<td colspan="2"><b style="color:red">'.$days.'</b></td>'; }elseif(count($attendance_list)>=1){
 
 $persent_student_male=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='P' and p.gender='Male'")->result();
 
 $half_days_studen_male=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='H' and p.gender='Male'")->result();
 
 $abcent_student_male=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='A' and p.gender='Male'")->result();


$persent_student_female=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='P' and p.gender='Female'")->result();
 
 $half_days_studen_female=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='H' and p.gender='Male'")->result();
 
 $abcent_student_female=$this->db->query("select a.roll_no,a.year,a.month,a.attendance_date,a.class_name,a.anual_year,a.pid,a.divsion,a.attendance_status from tbl_attendance a inner join tbl_parent p on p.Ptid=a.ptid where a.attendance_date='".$holiday_date."' and a.pid='".$pid."' and a.class_name='".$class_name."' and a.divsion='".$division."'  and a.attendance_status='A' and p.gender='Male'")->result();
 
 $mtotals=count($persent_student_male)+count($half_days_studen_male)+count($abcent_student_male);
 $ftotal=count($persent_student_female)+count($half_days_studen_female)+count($abcent_student_female);
  echo '<td><b style="color:green" title="Male">&nbsp;'.count($persent_student_male).'<br>'; 
 echo '<b style="color:red" title="Male">&nbsp;'.count($abcent_student_male).'</b><br>'; 
 echo '<b style="color:#8ad919" title="Male">&nbsp;'.count($half_days_studen_male).'</b><br>'; 
  echo '<b style="color:#ff00cf">&nbsp;'.($mtotals).'</b></td>'; 
 
  echo '<td><b title="Female" style="color:green" >&nbsp;'.count($persent_student_female).'</b><br>'; 
 echo '<b title="Female" style="color:red">&nbsp;'.count($abcent_student_female).'</b><br>'; 
 echo '<b title="Female" style="color:#8ad919;">&nbsp;'.count($half_days_studen_female).'</b><br>'; 
  echo '<b style="color:#ff00cf;">&nbsp;'.($ftotal).'</b></td>'; 
   }else{ echo '<td colspan="2"><b style="color: #8e09e7;font-weight: bold;">NA</b></td>';  }  ?></td><?php } ?>
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
	<br /><br /><br /><br />
	</div>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>

