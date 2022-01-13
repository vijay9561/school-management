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
$("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2030"
    });
	});
</script>
<style>
.giii{ font-size:inherit;}
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
$(document).ready(function(){
$('.giii').blur(function(){
    var validTime = $(this).val().match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
    if (!validTime) {
       $(this).val('').focus().css('background', '#fff');
	    $(this).focusout();
    } else {
       $(this).css('background', 'transparent');
	   setTimeout(function() { $(this).focus()}, 0);
	    $(this).focusout();
    }
});
});

function insert_time_table(){
			var  class1=document.getElementById('class').value.trim();
			var  division=document.getElementById('division').value.trim();
			var  time1=document.getElementById('time1').value.trim();
			var  mon1=document.getElementById('mon1').value.trim();
			var  tue1=document.getElementById('tue1').value.trim();
			var  wed1=document.getElementById('wed1').value.trim();
			var  thu1=document.getElementById('thu1').value.trim();
			var  fir1=document.getElementById('fir1').value.trim();
			var  stu1=document.getElementById('stu1').value.trim();
			if(class1==''){
			$("#classr").html('Please select class');
			$("#class").focus();
			return false;
			}
			if(division==''){
			$("#divisionr").html('Please select division');
			$("#division").focus();
			return false;
			}
			if(time1==''){
			$("#time1r").html('Please select time');
			$("#time1").focus();
			return false;
			}
			if(mon1==''){
			$("#mon1r").html('Please enter subject name');
			$("#mon1").focus();
			return false;
			}
		    if(tue1==''){
			$("#tue1r").html('Please enter subject name');
			$("#tue").focus();
			return false;
			}
			 if(wed1==''){
			$("#wed1r").html('Please enter subject name');
			$("#wed1").focus();
			return false;
			}
			 if(thu1==''){
			$("#thu1r").html('Please enter subject name');
			$("#thu1").focus();
			return false;
			}
			 if(fir1==''){
			$("#fir1r").html('Please enter subject name');
			$("#fir1").focus();
			return false;
			}
			 if(stu1==''){
				$("#stu1r").html('Please enter subject name');
				$("#stu1").focus();
				return false;
				}	
		$("#inesert_array").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/add_student_time_tables",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='create-time-table';
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
        <div class="panel-heading">Create Schools Time Table</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		<div class="row">
		<div class="col-md-6 form-group">
		<label>Class</label>
		<select type="text" class="form-control" maxlength="30" name="class" onchange="classr();" id="class" placeholder="Class">
		<?php $schools_master=$this->db->query("select name from schools_master")->result(); ?>
				<option value="">Select</option>
				<?php foreach($schools_master as $class){ ?>
				<option value="<?php echo $class->name; ?>"><?php echo $class->name; ?></option> <?php } ?>
		</select>
		<span id="classr" style="color:#FF0000"></span>
		</div>
		<div class="col-md-6 form-group">
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
		</div>
		<div class="row">
		<table class="table table-bordered">
		<thead>
		<tr><th>Time</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></tr>
		<tr>
		<td style="padding:5px;">
		
		<input  type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time1"  onchange="time1r();">
		<span id="time1r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon1" placeholder="Subject" onchange="mon1r()" />
		<span id="mon1r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" onchange="tue1r();" maxlength="30" name="tue[]" id="tue1" placeholder="Subject"  />
		<span id="tue1r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed1" onchange="wed1r();" placeholder="Subject" />
		<span id="wed1r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu1" placeholder="Subject" onchange="thu1r();" />
		<span id="thu1r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir1" placeholder="Subject" onchange="fir1r();"/>
		<span id="fir1r();" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu1" placeholder="Subject" onchange="stu1r();"/>
		<span id="stu1r" style="color:#FF0000"></span>
		</th>
		</tr>
		<tr>
		<td style="padding:5px;">
		<input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time2">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon2" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue2" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed2" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu2" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir2" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu2" placeholder="Subject"/></th>
		</tr>
        <tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time3">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon3" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue3" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed3" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu3" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir3" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu3" placeholder="Subject"/></th>
		</tr>

      <tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time4">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon4" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue4" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed4" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu4" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir4" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu4" placeholder="Subject"/></th>
		</tr>
<tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time5">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon5" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue5" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed5" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu5" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir5" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu5" placeholder="Subject"/></th>
		</tr>
<tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time6 ">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon6" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue6" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed6" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu6" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir6" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu6" placeholder="Subject"/></th>
		</tr>
<tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time7">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon7" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue7" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed7" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu7" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir7" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu7" placeholder="Subject"/></th>
		</tr>
<tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time8">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon8" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue8" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed8" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu8" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir8" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu8" placeholder="Subject"/></th>
		</tr>
<tr>
		<td style="padding:5px;"><input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]" placeholder="Time" id="time9">
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="mon[]" id="mon9" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="tue[]" id="tue9" placeholder="Subject"  /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed9" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu9" placeholder="Subject" /></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir9" placeholder="Subject"/></th>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Stu[]" id="stu9" placeholder="Subject"/></th>
		</tr>
		</thead>
		</table>
		</div>
		<div class="form-group">
		<br />
		<input type="submit" name="Sub" value="Submit" class="btn btn-primary" onclick="return insert_time_table();" />
		</div>
		</form>
		<br /><br />
			  </div></div>
		</div>
		<div class="col-md-1"></div>
		</div>
		
		<br /><br /><br />
		<br><br>
	</div>
	<script>
	</script>
	<?php //include('footer.php');
	
	
	 ?>
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
