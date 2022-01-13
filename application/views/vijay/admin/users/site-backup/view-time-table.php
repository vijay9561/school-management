<?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PARENT_ID']))) {
	
$pid='';
$class='';
$division=''; 
$mysl_query='';
if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){ 
 $get_pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
 $pid=$get_pid->login_id;
 $mysl_query=$this->db->query("select *from school_time_table_master where  pid='".$pid."' order by sttmid asc ")->result();
 }else{
 $pid=$_SESSION['PRINCIPLE_ID'];
 $mysl_query=$this->db->query("select *from school_time_table_master where  pid='".$pid."' order by sttmid asc")->result();
 } 
 }elseif(isset($_SESSION['TEACHER_ID'])){
 $get_pid=$this->db->query("select Pid,schools_name,divsion from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
 $pid=$get_pid->Pid;
  $class=$get_pid->schools_name;
   $division=$get_pid->divsion;
   $mysl_query=$this->db->query("select *from school_time_table_master where  pid='".$pid."' and class='$class' and division='$division' order by sttmid asc")->result();
 }else{
  $get_pid=$this->db->query("select pid,Student_class_division,divsion from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
 $pid=$get_pid->pid;
  $class=$get_pid->Student_class_division;
   $division=$get_pid->divsion;
    $mysl_query=$this->db->query("select *from school_time_table_master where  pid='".$pid."' and class='$class' and division='$division' order by sttmid asc ")->result();
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
        $(this).val('').focus().css('background', '#fdd');
    } else {
        $(this).css('background', 'transparent');
    }
});
});

function update_time_tables(){
			var  time1=document.getElementById('time1').value.trim();
			var  mon1=document.getElementById('mon1').value.trim();
			var  tue1=document.getElementById('tue1').value.trim();
			var  wed1=document.getElementById('wed1').value.trim();
			var  thu1=document.getElementById('thu1').value.trim();
			var  fir1=document.getElementById('fir1').value.trim();
			var  stu1=document.getElementById('stu1').value.trim();
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
<style>
th{ padding:5px;}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Schools Time Table</li>
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
		<?php if(isset($_GET['sttid'])) { 
		$get_class_time=$this->db->query("select *from schools_time_table where sttmid='".$_GET['sttid']."'")->result();  ?>
		<div class="row">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#8e09e7;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF;">Add New Time Table</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo site_url(); ?>users_controller/add_new_time_tables">
	  <input type="hidden" name="sttid" value="<?php echo $_GET['sttid']; ?>" />
	  <div class="form-group">
	  <label>Time</label>
	 <input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time" placeholder="Time" required>
	  </div>
	  <div class="form-group">
	  <label>Monday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="mon"  required/>
	  </div>
	  <div class="form-group">
	  <label>Tuesday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="tue"  required/>
	  </div>
	  <div class="form-group">
	  <label>Wednesday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="wed"  required/>
	  </div>
	   <div class="form-group">
	  <label>Thursday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="Thu"  required/>
	  </div>
	    <div class="form-group">
	  <label>Firday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="Fir"  required/>
	  </div>
	   <div class="form-group">
	  <label>Saturday</label>
	  <input type="text" class="form-control" maxlength="30" placeholder="Subject" name="Stu"  required/>
	  </div>
	   <div class="form-group">
	  <input type="submit" name="sub" value="Submit" class="btn btn-primary" />
	  </div>
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
		  <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fa fa-plus"></i> Add New</a>
		</div>
			 <div class="panel-body">
			 <div class="row">
			 <div class="col-md-12">
			 <form method="post" action="<?php echo site_url(); ?>users_controller/update_student_time_tables" id="insert_array">
			 <input type="hidden" name="sttid" value="<?php echo $_GET['sttid']; ?>" />
			 <table class="table table-bordered">
		<thead>
		<tr style="background-color: #cc4a2c;color: white;"><th>Time</th>
		<th style="padding:5px; height:10px;">Monday</th><th style="padding:5px; height:10;">Tuesday</th>
		<th style="padding:5px; height:10px;">Wednesday</th><th style="padding:5px; height:10px;">Thursday</th>
		<th style="padding:5px; height:10px;">Friday</th><th style="padding:5px; height:10px;">Saturday</th><th style="padding:5px; height:10px;">Action</th></tr>
		<?php $i=1; foreach($get_class_time as $row){ ?>
		<tr>
		<td style="padding:5px;">		
	<input type="text" class="form-control giii" placeholder="Format 10:00 AM" maxlength="30" name="time[]"  value="<?php echo $row->time; ?>"  placeholder="Time" id="time<?php echo $i; ?>"  onchange="time1r();">
		<span id="time<?php echo $i; ?>r" style="color:#FF0000"></span>
		</th>
		<td style="padding:5px;"><input type="text" class="form-control" value="<?php echo $row->mon; ?>" maxlength="30" name="mon[]" id="mon<?php echo $i; ?>" placeholder="Subject" onchange="mon<?php echo $i; ?>r()" />
		<span id="mon<?php echo $i; ?>r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" onchange="tue<?php echo $i; ?>r();" value="<?php echo $row->tue; ?>" maxlength="30" name="tue[]" id="tue<?php echo $i; ?>" placeholder="Subject"  />
		<span id="tue<?php echo $i; ?>r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="wed[]" id="wed<?php echo $i; ?>" value="<?php echo $row->wed; ?>" onchange="wed<?php echo $i; ?>r();" placeholder="Subject" />
		<span id="wed<?php echo $i; ?>r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Thu[]" id="thu<?php echo $i; ?>" placeholder="Subject" value="<?php echo $row->Thu; ?>" onchange="thu<?php echo $i; ?>r();" />
		<span id="thu<?php echo $i; ?>r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" name="Fir[]" id="fir<?php echo $i; ?>" placeholder="Subject" value="<?php echo $row->Fir; ?>" onchange="fir<?php echo $i; ?>r();"/>
		<span id="fir<?php echo $i; ?>r();" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;"><input type="text" class="form-control" maxlength="30" value="<?php echo $row->Stu; ?>" name="Stu[]" id="stu<?php echo $i; ?>" placeholder="Subject" onchange="stu<?php echo $i; ?>r();"/>
		<span id="stu<?php echo $i; ?>r" style="color:#FF0000"></span>
		</td>
		<td>
		<?php if(count($get_class_time)==1) { ?>
		
		<?php }else{ ?>
		<a href="#" class="btn btn-danger" onclick="delete_single_time_tables(<?php echo $row->sttid; ?>)"><i class="fa fa-trash"></i></a>
		<?php } ?>
		</td>
		</tr>
		<?php $i++; } ?>
		</thead>
		</table>
		<div class="form-group">
		<br />
		<input type="submit" name="sub" value="Update" class="btn btn-primary" onclick="update_time_tables();"  />&nbsp;&nbsp;
		<a href="<?php echo site_url(); ?>view-schools-time-table" class="btn btn-danger">Back</a>
		</div>
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
        <div class="panel-heading">Schools Time Table</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		
		<div class="row">
		<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
	    <?php foreach($mysl_query as $class){ ?>
		<tr  style="background-color: #cc4a2c;color: white;"><th colspan="3" style="padding:5px; height:auto;">Class</th><th colspan="3" style="padding:5px; height:auto;">Division</th>
		<th  colspan="2" style="padding:5px; height:auto;">Action</th>
		</tr>
		<tr style="background-color: #8e09e7;color: white;font-weight: bold;"><td colspan="3" style="padding:5px; height:auto;"><?php echo $class->class; ?></td>
		<td colspan="3" style="padding:5px; height:auto;"><?php echo $class->division; ?></td>
		<td colspan="2" style="padding:5px; height:auto;">
		<?php 
		  if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){
 ?>
 <a href="#" onclick="delete_all_class(<?php echo $class->sttmid; ?>)" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;
 <a href="<?php echo site_url(); ?>view-schools-time-table?sttid=<?php echo $class->sttmid;?>" class="btn btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
 <?php }  }?> 
 </td>
		</tr>
		<tr style="background-color: #cc4a2c;color: white;"><th style="padding:5px; height:auto;">Time</th><th style="padding:5px; height:auto;">Monday</th ><th style="padding:5px; height:auto;">Tuesday</th>
		<th style="padding:5px; height:auto;">Wednesday</th><th style="padding:5px; height:auto;">Thursday</th><th style="padding:5px; height:auto;">Friday</th>
		<th style="padding:5px; height:auto;">Saturday</th></tr>
		<?php $get_class_time=$this->db->query("select *from schools_time_table where sttmid='".$class->sttmid."'")->result(); 
		foreach($get_class_time as $row){
		?>
		<tr>
		<td style="padding:5px; height:auto;"><?php echo $row->time; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->mon; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->tue; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->wed; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->Thu; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->Fir; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->Stu; ?></td>
		
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
