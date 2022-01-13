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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Attendance List</li>
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

if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
 if($_SESSION['USERTYPE']=='clerk'){ 
$pid=$currentrecords[0]->login_id;
}else{
$pid=$currentrecords[0]->Pid;
}
if((isset($_GET['year'])) && (isset($_GET['month']))){
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' and divsion='".$_GET['division']."' and Student_class_division='".$_GET['schools']."' order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
//echo $this->db->last_query();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."'  order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}
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
$attendance_list=$this->db->query("select roll_no,year,month,attendance_date,class_name,anual_year,pid,divsion,attendance_status from tbl_attendance where attendance_date='".$holiday_date."' and pid='".$pid."' and class_name='".$class_name."' and divsion='".$division."' and ptid='".$student_id."'")->result();
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
		<?php if((isset($_GET['year'])) && (isset($_GET['month']))){  
		echo userspagings1($setLimit,$page,$pid,$_GET['schools'],$_GET['division']); }else{  echo userspagings($setLimit,$page,$pid); }  ?>
		</div>
		</div>
		<br /><br /><br /><br /><br /><br /><br />
		<br><br>
	</div>
	<br /><br /><br /><br />
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>

<?php
function userspagings($per_page,$page,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where pid='".$pid."'")->result();
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


function userspagings1($per_page,$page,$pid,$schools,$divison){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where pid='".$pid."' and Student_class_division='$schools' and divsion='$divison'")->result();
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