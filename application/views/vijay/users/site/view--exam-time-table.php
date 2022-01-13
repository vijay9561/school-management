<?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PARENT_ID']))) {
	
$pid='';
$class='';
$division=''; 
$mysl_query='';
if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){ 
 $get_pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
 $pid=$get_pid->login_id;
 $mysl_query=$this->db->query("select *from exam_master where  pid='".$pid."' order by exid asc ")->result();
 }else{
 $pid=$_SESSION['PRINCIPLE_ID'];
 $mysl_query=$this->db->query("select *from exam_master where  pid='".$pid."' order by exid asc")->result();
 } 
 }elseif(isset($_SESSION['TEACHER_ID'])){
 $get_pid=$this->db->query("select Pid,schools_name,divsion from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
 $pid=$get_pid->Pid;
  $class=$get_pid->schools_name;
   $division=$get_pid->divsion;
   $mysl_query=$this->db->query("select *from exam_master where  pid='".$pid."' and class='$class' and division='$division' order by exid asc")->result();
 }else{
  $get_pid=$this->db->query("select pid,Student_class_division,divsion from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
 $pid=$get_pid->pid;
  $class=$get_pid->Student_class_division;
   $division=$get_pid->divsion;
    $mysl_query=$this->db->query("select *from exam_master where  pid='".$pid."' and class='$class' and division='$division' order by exid asc ")->result();
 } 
?>
<?php
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


		/*$("#inesert_array").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php //echo site_url(); ?>users_controller/update_student_time_tables",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='view-schools-time-table';
						return false;
						}else {
						alert("Not Updated");
					}
					
				}
			});
			return false;  
		});*/
				
	}
	   
</script>
 <script>
$(document).ready(function(){
$(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		minDate:0
    });
	});
	   function exam_date1r(){if($('#exam_date1').val()==''){}else{ $('#exam_date1r').html(' '); }}
	   function time_to1r(){if($('#time_to1').val()==''){}else{ $('#time_to1r').html(' '); }}
	   function time_from1r(){if($('#time_from1').val()==''){}else{ $('#time_from1r').html(' '); }}
	   function subject1r(){if($('#subject1').val()==''){}else{ $('#subject1r').html(' '); }}
	   function subject_code1r(){if($('#subject_code1').val()==''){}else{ $('#subject_code1r').html(' '); }}
	   function day1r(){if($('#day1').val()==''){}else{ $('#day1r').html(' '); }}	
 function classr(){if($('#class').val()==''){}else{ $('#classr').html(' '); }}
 function divisionr(){if($('#division').val()==''){}else{ $('#divisionr').html(' '); }}
function exam_namer(){if($('#exam_name').val()==''){}else{ $('#exam_namer').html(' '); }}
$(document).ready(function(){
$('.giii').blur(function(){
    var validTime = $(this).val().match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
    if (!validTime) {
        $(this).val('').focus().css('background', '#fdd');
    } else {
        $(this).css('background', 'transparent');
    }
});
});

function insert_time_table(){
			var  exam_date1=document.getElementById('exam_date1').value.trim();
			var  exam_name=document.getElementById('exam_name').value.trim();
			var  time_to1=document.getElementById('time_to1').value.trim();
			var  time_from1=document.getElementById('time_from1').value.trim();
			var  subject1=document.getElementById('subject1').value.trim();
			var  subject_code1=document.getElementById('subject_code1').value.trim();
			var  class1=document.getElementById('class').value.trim();
			var  division=document.getElementById('division').value.trim();
			var  day1=document.getElementById('day1').value.trim();         
			if(class1==''){ 	$("#classr").html('Please select class'); $("#class").focus();  return false;  }
			if(division==''){ 	$("#divisionr").html('Please select division');  $("#division").focus(); return false;  }
			if(exam_name==''){ 	$("#exam_namer").html('Please select exam name');  $("#exam_name").focus(); return false;  }
			if(time_from1==''){ $("#time_from1r").html('Please enter exam start time'); $("#time_from1").focus(); return false; }
			if(time_to1==''){ 	$("#time_to1r").html('Please enter exam  end time'); $("#time_to1").focus(); return false; }
			if(subject1==''){   $("#subject1r").html('Please enter subject name'); $("#subject1").focus(); return false; }
		    if(subject_code1==''){ $("#subject_code1r").html('Please enter subject name'); $("#subject_code1").focus(); return false; }
			if(day1==''){        $("#day1r").html('Please select day'); $("#wed1").focus(); return false; }	
			if(subject1==''){    $("#subject1r").html('Please enter subject name'); $("#subject1").focus(); return false; }
		    if(subject_code1==''){ $("#subject_code1r").html('Please enter subject name'); $("#subject_code1").focus(); return false; }
			
		$("#inesert_array").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/update_new_examination_time_tables",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='view-exam-time-table';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('This class time table already added');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}
</script>
		
<style>
th{ padding:5px;}
.giii{ font-size:inherit;}
.datepicker{ font-size:inherit;}
</style>
<div class="container main">			
		<?php if(isset($_GET['sttid'])) { 
		$get_class_time=$this->db->query("select *from schools_time_table where sttmid='".$_GET['sttid']."'")->result();  ?>
		<div class="row">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#8e09e7;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF;">Add New Exam Time Table Subject</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo site_url(); ?>users_controller/add_subject_wise_exam_time_table">
	  <input type="hidden" name="exid" value="<?php echo $_GET['sttid']; ?>" />
	  <div class="form-group">
	  <label>Exam Date</label>
	<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date" placeholder="Date">
	  </div>
	  <div class="form-group">
	  <label>Exam Start Time</label>
	 <input type="text" class="form-control giii" maxlength="30" name="time_from"  placeholder="Format 10:00 AM" />
	  </div>
	  <div class="form-group">
	  <label>Exam End Time</label>
<input type="text" class="form-control giii" maxlength="30" name="time_to" placeholder="Format 10:00 AM" />
	  </div>
	  <div class="form-group">
	  <label>Exam Day</label>
	 <select type="text" class="form-control" onchange="day1r();" maxlength="30" name="day" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
	  </div>
	   <div class="form-group">
	  <label>Subject</label>
	  <input type="text" class="form-control" maxlength="30" name="subject" placeholder="Subject" />
	  </div>
	    <div class="form-group">
	  <label>Subject Code</label>
	  <input type="text" class="form-control" maxlength="30" name="subject_code" placeholder="Subject Code" />
	  </div>
	   <div class="form-group">
	  <input type="submit" name="sub" value="Submit" class="btn btn-primary" />
	  </div>
	  	<br /><br /><br />
	  </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Schools Time Table Update 
		  <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fa fa-plus"></i> Add New</a> &nbsp;&nbsp;
		  <a href="<?php echo site_url(); ?>view-exam-time-table" class="btn btn-success">Back</a>
		</div>
			 <div class="panel-body">
			 <div class="row">
			 <div class="col-md-12">
			 <form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
			 <input type="hidden" name="exid" id="exid" value="<?php echo $_GET['sttid']; ?>" />
		<div class="row">
		<div class="col-md-4 form-group">
		<label>Class</label>
		<select type="text" class="form-control" maxlength="30" name="class" onchange="classr();" id="class" placeholder="Class">
		<?php $schools_master=$this->db->query("select name from schools_master")->result();
		     $exam_master=$this->db->query("select *from exam_master where exid='".$_GET['sttid']."'")->row();
		 ?>
				<option value="<?php echo $exam_master->class; ?>"><?php echo $exam_master->class; ?></option>
				<?php foreach($schools_master as $class){ if($exam_master->class!=$class->name) { ?>
				<option value="<?php echo $class->name; ?>"><?php echo $class->name; ?></option> <?php } } ?>
		</select>
		<span id="classr" style="color:#FF0000"></span>
		</div>
		<div class="col-md-4 form-group">
		<label>Division</label>
		<select type="text" class="form-control" maxlength="30" onchange="divisionr();" name="division" id="division" placeholder="Class">
		<?php $divison_master=$this->db->query("select divison_name from divison_master")->result(); ?>
		<option value="<?php echo $exam_master->division;?>"><?php echo $exam_master->division;?></option>
		<?php foreach($divison_master as $div){ if($exam_master->division!=$div->divison_name) { ?>
		<option value="<?php echo $div->divison_name; ?>"><?php echo $div->divison_name; ?></option>
		<?php } } ?>
		</select>
		<span id="divisionr" style="color:#FF0000"></span>
		</div>
		
		<div class="col-md-4 form-group">
		<label>Examination Name</label>
		<select  class="form-control" maxlength="30" onchange="exam_namer();" name="exam_name" id="exam_name" placeholder="Class">
		<?php $divison_master=$this->db->query("select name from exam_type")->result(); ?>
		<option value="<?php echo $exam_master->exam_name; ?>"><?php echo $exam_master->exam_name; ?></option>
		<?php foreach($divison_master as $div){ if($exam_master->exam_name!=$div->name) { ?>
		<option value="<?php echo $div->name; ?>"><?php echo $div->name; ?></option>
		<?php } } ?>
		</select>
		<span id="exam_namer" style="color:#FF0000"></span>
		</div>
		</div>
		<div class="row">
		<table class="table table-bordered">
		<?php $subject_details=$this->db->query("select *from exam_type_master where exid='".$exam_master->exid."'")->result(); ?>
		<thead>
		<tr style="background-color: #cc4a2c;color: white;"><th>Date</th><th>Start Time</th><th>End Time</th><th>Day</th><th>Subject</th><th>Subject Code</th><th>Action</th></tr>
		<?php foreach($subject_details as $rows){ ?>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker"  value="<?php echo $rows->exam_date; ?>" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date1"  onchange="exam_date1r();">
		<span id="exam_date1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control giii" maxlength="30" name="time_from[]" value="<?php echo $rows->time_from; ?>" id="time_from1" placeholder="Format 10:00 AM" onchange="time_from1r()" />
		<span id="time_from1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to1" value="<?php echo $rows->time_to; ?>" placeholder="Format 10:00 AM" onchange="time_to1r()" />
		<span id="time_to1r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<select type="text" class="form-control" onchange="day1r();" maxlength="30" name="day[]" id="day1" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="<?php echo $rows->day; ?>"><?php echo $rows->day;  ?></option>
		<?php foreach($day_master as $day){ if($rows->day!=$day->name){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } } ?>
		</select>
		<span id="day1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject1" onchange="subject1r();" value="<?php echo $rows->subject; ?>" placeholder="Subject" />
		<span id="subject1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" value="<?php echo $rows->subject_code; ?>" id="subject_code1" placeholder="Subject Code" onchange="subject_code1r();" />
		<span id="thu1r" style="color:#FF0000"></span>
		</td>
		<td>
		<?php if(count($subject_details)==1){}else{ ?>
		<a href="#"  onclick="delete_single_time_tables(<?php echo $rows->emid; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
		<?php } ?>
		</td>
		</tr>	
<?php } ?>				
		</thead>
		</table>
		</div>
		<div class="form-group">
		<br />
		<input type="submit" name="Sub" value="Update" class="btn btn-primary" onclick="return insert_time_table();" />
		</div>
		<br /><br /><br />
		</form>
			   </div>
			  </div>
			 </div>
			</div> 
		</div>
		</div>
		<?php }else{ ?>
		<div class="row">

		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Examination Time Table</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		
		<div class="row">
		<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
	    <?php foreach($mysl_query as $class){ ?>
		<tr  style="background-color: #cc4a2c;color: white;"><th colspan="5" style="padding:5px; height:auto; text-align:center;"><?php echo $class->exam_name.'&nbsp;&nbsp;Class:&nbsp;&nbsp;'.$class->class.'('.$class->division.')'; ?> <span style="float:right">
			<?php 
		  if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){
 ?>
 <a href="#" onclick="delete_all_class(<?php echo $class->exid; ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;
 <a href="<?php echo site_url(); ?>view-exam-time-table?sttid=<?php echo $class->exid;?>" class="btn btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
 <?php }  }?>
		</span></th></tr>
		
		<tr style="background-color: #cc4a2c;color: white;">
		<th style="padding:5px; height:auto;">Time(From-To)</th>
		<th style="padding:5px; height:auto;">Date</th><th style="padding:5px; height:auto;">Day</th ><th style="padding:5px; height:auto;">Subject</th>
		<th style="padding:5px; height:auto;">Subject Code</th></tr>
		<?php $get_class_time=$this->db->query("select *from exam_type_master where exid='".$class->exid."'")->result(); 
		foreach($get_class_time as $row){
		?>
		<tr>
		<td style="padding:5px; height:auto;"><?php echo $row->time_from; ?> To <?php echo $row->time_to; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->exam_date; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->day; ?></td>                    
		<td style="padding:5px; height:auto;"><?php echo $row->subject; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->subject_code; ?></td>
		</tr>
		<?php } ?>
		<?php } ?>
		
		</thead>
		</table>
		</div></div>
		</form>
			  </div></div>
		</div>
		<div class="col-md-1"></div>
		</div>
		<?php } ?>
		<br /><br /><br />
	</div>
	<?php //include('footer.php');?>
	<script>
	   
	   function time1r(){if($('#time1').val()==''){}else{ $('#time1r').html(' '); }}
	   function mon1r(){if($('#mon1').val()==''){}else{ $('#mon1r').html(' '); }}
	   function tue1r(){if($('#tue1').val()==''){}else{ $('#tue1r').html(' '); }}
	   function wed1r(){if($('#wed1').val()==''){}else{ $('#wed1r').html(' '); }}
	   function thu1r(){if($('#thu1').val()==''){}else{ $('#thu1r').html(' '); }}
	   function fir1r(){if($('#fir1').val()==''){}else{ $('#fir1r').html(' '); }}
	   function stu1r(){if($('#stu1').val()==''){}else{ $('#stu1r').html(' '); }}
	   function classr(){if($('#class').val()==''){}else{ $('#classr').html(' '); }}
	   function divisionr(){if($('#division').val()==''){}else{ $('#divisionr').html(' '); }}

	    function delete_single_time_tables(id){
	var con=confirm('are you sure to the delete this row!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>Users_controller/delete_single_exam_tables",
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
   	
	   function delete_all_class(id){
	var con=confirm('are you sure to the delete this class time table!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>Users_controller/delete_all_class",
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
