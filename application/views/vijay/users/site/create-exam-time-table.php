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
$mysqluery=$this->db->query("select *from tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."' order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}
		 ?>
		 <script>
$(document).ready(function(){
$(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		minDate:0
    });
	});
</script>

<style>
.giii{ font-size:inherit;}
.datepicker{ font-size:inherit;}
</style>
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

 function classr(){if($('#class').val()==''){}else{ $('#classr').html(' '); }}
 function divisionr(){if($('#division').val()==''){}else{ $('#divisionr').html(' '); }}
function exam_namer(){if($('#exam_name').val()==''){}else{ $('#exam_namer').html(' '); }}
$(document).ready(function(){
$('.giii').blur(function(){
    var validTime = $(this).val().match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
    if (!validTime) {
        $(this).val('').focus().css('background', '#fff');
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
				url: "<?php site_url(); ?>users_controller/add_new_examination_time_tables",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='create-examination-time-table';
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
</style>
<div class="container main">			
		<div class="row">
		
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<div class="row">

		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Create Examination  Time</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		<div class="row">
		<div class="col-md-4 form-group">
		<label>Class</label>
		<select type="text" class="form-control" maxlength="30" name="class" onchange="classr();" id="class" placeholder="Class">
		<?php $schools_master=$this->db->query("select name from schools_master")->result(); ?>
				<option value="">Select</option>
				<?php foreach($schools_master as $class){ ?>
				<option value="<?php echo $class->name; ?>"><?php echo $class->name; ?></option> <?php } ?>
		</select>
		<span id="classr" style="color:#FF0000"></span>
		</div>
		<div class="col-md-4 form-group">
		<label>Division</label>
		<select type="text" class="form-control" maxlength="30" onchange="divisionr();" name="division" id="division" placeholder="Class">
		<?php $divison_master=$this->db->query("select divison_name from divison_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($divison_master as $div){ ?>
		<option value="<?php echo $div->divison_name; ?>"><?php echo $div->divison_name; ?></option>
		<?php } ?>
		</select>
		<span id="divisionr" style="color:#FF0000"></span>
		</div>
		
		<div class="col-md-4 form-group">
		<label>Examination Name</label>
		<select  class="form-control" maxlength="30" onchange="exam_namer();" name="exam_name" id="exam_name" placeholder="Class">
		<?php $divison_master=$this->db->query("select name from exam_type")->result(); ?>
		<option value="">Select</option>
		<?php foreach($divison_master as $div){ ?>
		<option value="<?php echo $div->name; ?>"><?php echo $div->name; ?></option>
		<?php } ?>
		</select>
		<span id="exam_namer" style="color:#FF0000"></span>
		</div>
		</div>
		<div class="row">
		<table class="table table-bordered">
		<thead>
		<tr style="background-color: #cc4a2c;color: white;"><th>Date</th><th>Start Time</th><th>End Time</th><th>Day</th><th>Subject</th><th>Subject Code</th></tr>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date1"  onchange="exam_date1r();">
		<span id="exam_date1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from1" placeholder="Format 10:00 AM" onchange="time_from1r()" />
		<span id="time_from1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to1" placeholder="Format 10:00 AM" onchange="time_to1r()" />
		<span id="time_to1r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<select type="text" class="form-control" onchange="day1r();" maxlength="30" name="day[]" id="day1" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		<span id="day1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject1" onchange="subject1r();" placeholder="Subject" />
		<span id="subject1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code1" placeholder="Subject Code" onchange="subject_code1r();" />
		<span id="thu1r" style="color:#FF0000"></span>
		</td>
		
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date2" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from2" placeholder="Format 10:00 AM" />
		</td>
		
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to" placeholder="Format 10:00 AM" />
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day2" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject2" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code2" placeholder="Subject Code" />
		</td>
		</tr>
		
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date3">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from3" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to3" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" onchange="day2r();" maxlength="30" name="day[]" id="day2" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject3" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code3" placeholder="Subject Code" />
		</td>
		</tr>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date4">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from4" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to4" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day3" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject4" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code4" placeholder="Subject Code" />
		</td>
		</tr>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date5">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from5" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to5" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day5" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject5" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code5" placeholder="Subject Code" />
		</td>
		</tr>
		
	<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date6">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from6" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to6" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day6" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject6" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code6" placeholder="Subject Code" />
		</td>
		</tr>	
		
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date7">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from7" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to7" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day7" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject7" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code7" placeholder="Subject Code" />
		</td>
		</tr>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date8">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from8" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to8" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day8" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject8" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code8" placeholder="Subject Code" />
		</td>
		</tr>
		
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control datepicker" autocomplete="off" maxlength="30" name="exam_date[]" placeholder="Date" id="exam_date9">
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_from[]" id="time_from9" placeholder="Format 10:00 AM"  />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control giii" maxlength="30" name="time_to[]" id="time_to9" placeholder="Format 10:00 AM"/>
		</td>
		<td style="padding:5px;">
		<select type="text" class="form-control" maxlength="30" name="day[]" id="day9" placeholder="Day">
		<?php $day_master=$this->db->query("select name from day_master")->result(); ?>
		<option value="">Select</option>
		<?php foreach($day_master as $day){ ?>
				<option value="<?php echo $day->name; ?>"><?php echo $day->name; ?></option>
		<?php } ?>
		</select>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject[]" id="subject9" placeholder="Subject" />
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="subject_code[]" id="subject_code9" placeholder="Subject Code" />
		</td>
		</tr>				
		</thead>
		</table>
		</div>
		<div class="form-group">
		<br />
		<input type="submit" name="Sub" value="Submit" class="btn btn-primary" onclick="return insert_time_table();" />
		</div>
		<br /><br /><br />
		</form>
			  </div></div>
		</div>
		<div class="col-md-1"></div>
		</div>
		
		
	</div>
	<script>
	</script>
	<?php //include('footer.php');
	
	
	 ?>
	<script>
	   
	   function exam_date1r(){if($('#exam_date1').val()==''){}else{ $('#exam_date1r').html(' '); }}
	   function time_to1r(){if($('#time_to1').val()==''){}else{ $('#time_to1r').html(' '); }}
	   function time_from1r(){if($('#time_from1').val()==''){}else{ $('#time_from1r').html(' '); }}
	   function subject1r(){if($('#subject1').val()==''){}else{ $('#subject1r').html(' '); }}
	   function subject_code1r(){if($('#subject_code1').val()==''){}else{ $('#subject_code1r').html(' '); }}
	   function day1r(){if($('#day1').val()==''){}else{ $('#day1r').html(' '); }}
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
