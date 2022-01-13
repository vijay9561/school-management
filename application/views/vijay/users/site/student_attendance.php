<style>
.table > thead > tr > th{
height:26px;

}
.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 2.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
}
.option-input:hover {
  background:red;
}
.option-input:checked {
  background:red;
}
.option-input:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: "\2714";
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background:red;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}

.option-input1{
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 2.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background:#cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
}
.option-input1:hover {
  background: #006600;
}
.option-input1:checked {
  background:#006600;
}
.option-input1:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: "\2714";
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input1:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background:red;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input1.radio {
  border-radius: 50%;
}
.option-input1.radio::after {
  border-radius: 50%;
}

.option-input2{
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 2.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background:#cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
}
.option-input2:hover {
  background: #8ad919;
}
.option-input2:checked {
  background:#8ad919;
}
.option-input2:checked::before {
  height: 20px;
  width: 20px;
  position: absolute;
  content: "\2714";
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input2:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background:red;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input2.radio {
  border-radius: 50%;
}
.option-input2.radio::after {
  border-radius: 50%;
}

</style>
<?php if(isset($_SESSION['TEACHER_ID'])) { ?>
		 <script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='student-attendance?searchkeyowords='+search_id2;
return false;
}
</script>		
<div class="container main">			
				
		<?php if(isset($_GET['add-new'])){ ?>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$student=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-2">
		<label>Attendance Date</label>
		</div>
		<div class="col-md-3">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->&nbsp;
<input type="text" class="form-control" name="attendance_date" id="attendance_date" style="margin-top: -19px;" value="<?php echo date('Y-m-d'); ?>" onchange="get_date_users()" />&nbsp;&nbsp;
</div>
<div class="col-md-2">
<input type="button" value="All Attendance Submit" onclick="all_attendance_submit()" class="btn btn-primary" />
	</div>
<div class="col-md-5">

<?php /*?><div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</form>
</div><?php */?>
</div>		
		</div>
		<script>
		function noSunday(date){ 
          var day = date.getDay(); 
                      return [(day > 0), '']; 
      }; 
$(document).ready(function(){
$("#attendance_date").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		maxDate:0,
		beforeShowDay: noSunday,
		yearRange:"2016:2030"
    });
	});
</script>
		<script>
		function attendance_status_pr(id){
	var	pid=$("#pid"+id).val();
	var	tid=$("#tid"+id).val();
	var	divsion=$("#divsion"+id).val();
	var	class_name=$("#class_name"+id).val();
	var	attendance_status_p=$("#attendance_status_p"+id).val();
    var attendance_status_a=$("#attendance_status_a"+id).val();
	var attendance_status_h=$("#attendance_status_h"+id).val();
	var attendance_date=$("#attendance_date").val();
	$("#loading").show();
		$.ajax({
				url: "<?php echo site_url() ?>users_controller/student_attendancesubmit12",
				type: 'POST',
				data: {divsion:divsion,class_name:class_name,attendance_status_p:attendance_status_p,attendance_status_a:attendance_status_a,attendance_status_h:attendance_status_h,id:id,pid:pid,tid:tid,attendance_date:attendance_date},
				success: function(data) {
				$("#getrowscords"+id).fadeOut().html(data).fadeIn('slow');
				$.ajax({
		url: "<?php echo site_url() ?>users_controller/get_total_attendance_counts",
		type: 'POST',
		data: {attendance_date:attendance_date},
		success: function(data) {
		$("#get_new_data").fadeOut().html(data).fadeIn('slow');
		}
		});
				$("#loading").fadeOut("slow");
				}
				});
		}
		function attendance_status_ar(id){
		var	pid=$("#pid"+id).val();
		var	tid=$("#tid"+id).val();
		var	divsion=$("#divsion"+id).val();
		var	class_name=$("#class_name"+id).val();
		var	attendance_status_p=$("#attendance_status_p"+id).val();
		var attendance_status_a=$("#attendance_status_a"+id).val();
		var attendance_status_h=$("#attendance_status_h"+id).val();
		var attendance_date=$("#attendance_date").val();
		$("#loading").show();
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/student_attendancesubmit",
		type: 'POST',
		data: {divsion:divsion,class_name:class_name,attendance_status_p:attendance_status_p,attendance_status_a:attendance_status_a,attendance_status_h:attendance_status_h,id:id,pid:pid,tid:tid,attendance_date:attendance_date},
		success: function(data) {
		$("#getrowscords"+id).fadeOut().html(data).fadeIn('slow');
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/get_total_attendance_counts",
		type: 'POST',
		data: {attendance_date:attendance_date},
		success: function(data) {
		$("#get_new_data").fadeOut().html(data).fadeIn('slow');
		}
		});
		$("#loading").fadeOut("slow");
		}
		});
		}
		
		function attendance_status_hr(id){
		var	pid=$("#pid"+id).val();
		var	tid=$("#tid"+id).val();
		var	divsion=$("#divsion"+id).val();
		var	class_name=$("#class_name"+id).val();
		var	attendance_status_p=$("#attendance_status_p"+id).val();
		var attendance_status_a=$("#attendance_status_a"+id).val();
		var attendance_status_h=$("#attendance_status_h"+id).val();
		var attendance_date=$("#attendance_date").val();
		$("#loading").show();
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/student_attendancesubmithalf",
		type: 'POST',
		data: {divsion:divsion,class_name:class_name,attendance_status_p:attendance_status_p,attendance_status_a:attendance_status_a,attendance_status_h:attendance_status_h,id:id,pid:pid,tid:tid,attendance_date:attendance_date},
		success: function(data) {
		$("#getrowscords"+id).fadeOut().html(data).fadeIn('slow');
		$("#loading").fadeOut("slow");
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/get_total_attendance_counts",
		type: 'POST',
		data: {attendance_date:attendance_date},
		success: function(data) {
		$("#get_new_data").fadeOut().html(data).fadeIn('slow');
		}
		});
		}
		});
		}
		function get_date_users(){
		var attendance_date=$("#attendance_date").val();
		$("#loading").show();
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/get_attendance_data",
		type: 'POST',
		data: {attendance_date:attendance_date},
		success: function(data) {
		$("#get_attendance_values").fadeOut().html(data).fadeIn('slow');
		$("#loading").fadeOut("slow");
		}
		});
		}
		
		function all_attendance_submit(){
		con=confirm('Are you sure to submit the all attendance?');
		if(con==true){
		var attendance_date=$("#attendance_date").val();
		if(attendance_date==''){
		  alert('Please select attendance date');
		  return false;
		 }
		$("#loading").show();
		$.ajax({
		url: "<?php echo site_url() ?>users_controller/all_student_attendance_submit",
		type: 'POST',
		data: {attendance_date:attendance_date},
		success: function(data){
		//alert(data);
		if(data==1){
		alert("Do not get attendance today because today is Sunday");
		$("#loading").fadeOut("slow");
		return false;
		}else if(data==2){
		alert("Todays is holiday");
		$("#loading").fadeOut("slow");
		}else{
		$("#get_attendance_values").fadeOut().html(data).fadeIn('slow');
		$("#loading").fadeOut("slow");
		}
		}
		});
		}else{
		  return false;
		 }
		}
		</script>
		<style> 
		.mediaclass{}
		@media(max-width:500px){
		  .countclass{
		     margin-left: 20px;
             margin-right: 20px;
		  }
		  .total-count{
		      margin-top: -36px;
		  }
		}                              
		</style>
		<div class="table-responsive" style="width: 100%;overflow: auto;" id="get_attendance_values">
		<?php $teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); 
		   $a_class=$teacher_name[0]->schools_name;
		   $Pid=$teacher_name[0]->Pid;
		   $a_division=$teacher_name[0]->divsion;
		   $date=date('Y-m-d');
		  $persent_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$date' and attendance_status='P'")->result();
		$abscent_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$date' and attendance_status='A'")->result();
		$Halfdays_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$date' and attendance_status='H'")->result();
		$p_count=count($persent_stud);
		$a_count=count($abscent_stud);
		$h_count=count($Halfdays_stud);
		$total=$p_count+$a_count+$h_count;
		?>
		<div class="row countclass" id="get_new_data">
		<div class="col-md-1"></div>
<div class="col-md-2 col-xs-6" style="border:2px solid #8e09e7;padding: 6px;background-color: #060;color: white;margin-bottom: 10px;"><strong>Persent:</strong> <?php echo $p_count; ?></div>
		<div class="col-md-2 col-xs-6" style="border: 2px solid #8e09e7;padding: 6px;color: white;background-color: red;"><strong>Absent:</strong> <?php echo $a_count; ?></div>
		<div class="col-md-2 col-xs-6" style="border:2px solid #8e09e7;padding: 6px;color: white;background-color:#a7d919;"><strong>Halfday:</strong> <?php echo $h_count; ?></div>
		<div class="col-md-2 col-xs-6 total-count" style="border:2px solid #8e09e7;padding: 6px;color: white;background-color:#cc4a2c;"><strong>Total:</strong> <?php echo $total; ?></div>
		</div>
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" rowspan="2">TEACHER NAME :-<?php echo ucfirst($teacher_name[0]->Teacher_name); ?></th>
                          <th>CLASS:&nbsp;<?php echo $teacher_name[0]->schools_name; ?></th>
                        </tr>
						<tr><th>&nbsp;&nbsp;&nbsp;DIVISION:&nbsp;<?php echo $teacher_name[0]->divsion; ?></th></tr>
						<tr><th>&nbsp;&nbsp;&nbsp;ROLL NUMBER.</th><th>&nbsp;&nbsp;&nbsp;NAME OF STUDENT.</th><?php /*?><th>&nbsp;&nbsp;&nbsp;ADHAR CARD NUMBER</th><?php */?><th>&nbsp;&nbsp;&nbsp;ATTENDANCE.</th><?php /*?><TH>&nbsp;&nbsp;&nbsp;DAYS</TH></tr><?php */?>
						<?php 
$adhar_card=$this->db->query("select *from tbl_parent where pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Status='active' order by Student_name asc")->result();
						
						 ?>
                      </thead>
                      <tbody>
					  <?php foreach($adhar_card as $row){ ?>
					  <tr>
					  <td><?php echo $row->Student_roll_no; ?></td>
					  <td><?php echo $row->Student_name; ?></td>
					 <?php /*?> <td><?php echo $row->adhar_card; ?></td><?php */?>
					  <?php $date=date('Y-m-d');
			$tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$date."' and pid='".$row->pid."' and  divsion='".$row->divsion."' and class_name='".$row->Student_class_division."'  and Ptid='".$row->Ptid."'")->result();
			//echo $this->db->last_query(); ?>
				<input type="hidden" name="pid<?php echo $row->Ptid; ?>" id="pid<?php echo $row->Ptid; ?>" value="<?php echo $row->pid; ?>" />
				<input type="hidden" name="tid<?php echo $row->Ptid; ?>" id="tid<?php echo $row->Ptid; ?>" value="<?php echo $row->tid; ?>" />
				<input type="hidden" name="divsion<?php echo $row->Ptid; ?>" id="divsion<?php echo $row->Ptid; ?>" value="<?php echo $row->divsion; ?>" />
				<input type="hidden" name="class_name<?php echo $row->Ptid; ?>" id="class_name<?php echo $row->Ptid; ?>" value="<?php echo $row->Student_class_division; ?>" />
				  <?php $days=date('D'); 
			         $holidayslist=$this->db->query("select pid,yid,date1 from child_master where date1='$date' and pid='".$row->pid."'")->result();
					 $yid=$holidayslist[0]->yid;
					 $holi=$this->db->query("select event_name from yearly_holiday_master where yid='$yid'")->result();
					 if(count($holidayslist)>=1){ ?>
					    <td style="color:orange;">Holiday&nbsp;(<?php echo $holi[0]->event_name; ?>)</td>
					   <?php 
				        }elseif($days=='Sun'){ ?>
				        <td style="color:red;">Sunday</td>	 
			      <?php }else if(count($tbl_attendance)>=1){ ?>
					  <td id="getrowscords<?php echo $row->Ptid; ?>">
					  <input type="radio" class="option-input1 radio" <?php if($tbl_attendance[0]->attendance_status=='P'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>" id="attendance_status_p<?php echo $row->Ptid; ?>" onclick="attendance_status_pr(<?php echo $row->Ptid; ?>)" value="P" />&nbsp;&nbsp;<span style="color:#006600;">P</span>
					  <input type="radio" class="option-input radio" <?php if($tbl_attendance[0]->attendance_status=='A'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>"     id="attendance_status_a<?php echo $row->Ptid; ?>" onclick="attendance_status_ar(<?php echo $row->Ptid; ?>)" value="A"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>
					  
					  <input type="radio" class="option-input2 radio" <?php if($tbl_attendance[0]->attendance_status=='H'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>"     id="attendance_status_h<?php echo $row->Ptid; ?>" onclick="attendance_status_hr(<?php echo $row->Ptid; ?>)" value="H"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span></td>
					  <?php }else{ ?>
					  <td id="getrowscords<?php echo $row->Ptid; ?>">
		  <input type="radio" class="option-input1 radio" name="attendance_status<?php echo $row->Ptid; ?>" onclick="attendance_status_pr(<?php echo $row->Ptid; ?>)"  id="attendance_status_p<?php echo $row->Ptid; ?>" value="P" />&nbsp;&nbsp;<span style="color:#006600;">P</span>
	 <input type="radio" class="option-input radio" name="attendance_status<?php echo $row->Ptid; ?>" onclick="attendance_status_ar(<?php echo $row->Ptid; ?>)" id="attendance_status_a<?php echo $row->Ptid; ?>"  value="A"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>
	  <input type="radio" class="option-input2 radio" name="attendance_status<?php echo $row->Ptid; ?>" onclick="attendance_status_hr(<?php echo $row->Ptid; ?>)" id="attendance_status_h<?php echo $row->Ptid; ?>"  value="H"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>
	 
	 </td>
					  <?php } ?>
					 <?php /*?> <td><?php echo date('d'); ?></td><?php */?>
					  </tr>
					  <?php } ?>
					  
					  </tbody>
                      
                    </table>
					<div class="row">
				<div class="col-md-12">				
		</div>
			</div>
		</div></div>
		
		</div>
		<?php } ?>
		<br /><br /><br /><br />
	</div>
	<script>
	</script>
	<?php //include('footer.php');
	
	function userspaging($per_page,$page,$tid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where tid='".$tid."' and Status='active' order by Student_roll_no asc")->result();
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


function userspaignsearchings($per_page,$page,$tid,$searchid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and  tid='".$tid."' and Status='active' order by Student_roll_no asc")->result();
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

