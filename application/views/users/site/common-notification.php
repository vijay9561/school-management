<?php if(isset($_SESSION['TEACHER_ID'])) { ?>

<?php
$get_teacher=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
			    $division=$get_teacher->divsion;
			    $Pid=$get_teacher->Pid;
			    $class=$get_teacher->schools_name;
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *from notification  where (student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR roll_no LIKE '%".$searchid."%') and division='".$division."' and class_name='".$class."' and pid='".$Pid."' and notification_type='common'  order by nid asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$div=$currentrecords[0]->divsion;
$school=$currentrecords[0]->schools_name;
$year=$currentrecords[0]->year;
$mysqluery=$this->db->query("select *from notification where division='".$division."' and class_name='".$class."' and pid='".$Pid."' and notification_type='common' order by nid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//echo $this->db->last_query();
}
		 ?>
 <script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='individual_notification?searchkeyowords='+search_id2;
return false;
}
</script>
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

<div class="container main">			
		<div class="row">
		
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<?php if(isset($_GET['nid'])) { ?>
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Add New Notification</h3></div>
			 <div class="panel-body">
			 <?php 
			 $nid=$_GET['nid'];
				$student_get=$this->db->query("select *from notification where nid='$nid'")->row();
				//echo $this->db->last_query();
				 ?>
		      <form method="post" action="#" id="update_note1">
			  <input type="hidden" value="<?php echo $nid; ?>" name="nid" />
			  <div class="form-group">
			  <label>Notification</label>
			  <textarea class="form-control" name="notification_description" onchange="notification_descriptionr()" id="notification_description" rows="5" style="resize:none;">
			  <?php echo $student_get->notification_description; ?>
			  </textarea>
			  <span id="notification_descriptionr" style="color:#FF0000"></span>
			  </div>
			  <div class="form-group">
			  <input type="submit" name="sub" value="Submit" class="btn btn-primary" onclick="return update_note();" />
			  </div>
			  </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		<?php }elseif(isset($_GET['add-new-notification'])) { ?>
	 <div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Add New Notification</h3></div>
			 <div class="panel-body">
			 <?php 
				$student_get=$this->db->query("select *from tbl_parent where pid='$Pid' and Student_class_division='$class' and divsion='$division' and Status='active'")->result();
				//echo $this->db->last_query();
				 ?>
		      <form method="post" action="#" id="pincodemangement">
			  
			  <div class="form-group">
			  <label>Notification</label>
			  <textarea class="form-control" name="notification_description" onchange="notification_descriptionr()" id="notification_description" rows="5" style="resize:none;"></textarea>
			  <span id="notification_descriptionr" style="color:#FF0000"></span>
			  </div>
			  <div class="form-group">
			  <input type="submit" name="sub" value="Submit" class="btn btn-primary" onclick="return principle_registrations();" />
			  </div>
			  </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
	    <?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<a href="<?php echo site_url(); ?>common_notification?add-new-notification=add-new-notification" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
	<?php /*?><a href="<?php echo site_url(); ?>new-student-registration" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Student</a><?php */?>
		</div>
<div class="col-md-6">
<div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</form>
</div>
</div>		
		</div>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Student Name</th>
						  <th>Adhar Card Number</th>
						   <th>Notification Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php $serial = ($pageLimit * $setLimit) + 1;
									//  $sn = ($pageLimit * $limit) + 1;
									  $sn = ($page * $setLimit) + 1;
									  $page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                                      $start_num =((($page_num*$setLimit)-$setLimit)+1);
									   $i=1;
									   $j= (($page-1) * $setLimit) + $i; 
									   foreach($mysqluery as $row){  
								//$slNo = $i+$start_num;
								    
							       $num = $sn ++;

					   ?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $row->student_name; ?></td>
						<td><?php echo $row->adhar_card; ?></td>
						<td><?php echo $row->notification_description; ?></td>
						
						                <td>
					&nbsp;<a href="<?php echo site_url(); ?>individual_notification?nid=<?php echo $row->nid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
					   &nbsp;&nbsp;<a  style="cursor:pointer;" onclick="inactivestatus(<?php echo $row->nid ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					   
						</tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
				
		</div></div>
		</div>
		<?php } ?>
		<div class="row">
		<div class="col-md-12">
		<?php if(isset($_GET['searchkeyowords'])) 
		{ echo userspagings($setLimit,$page,$division,$Pid,$class,$_GET['searchkeyowords']);  ?> 
		<?php }else{  echo  userspagings($setLimit,$page,$division,$Pid,$class);?> <?php } ?>
		</div>
		</div>
		
		<br><br>
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
	
	<?php 
	function userspagings($per_page,$page,$division,$Pid,$class){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM notification  where division='".$division."' and pid='".$Pid."' and class_name='".$class."' and notification_type='common' order by nid asc")->result();
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


function userspaignsearchings($per_page,$page,$division,$Pid,$class,$searchid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM notification  where (student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR roll_no LIKE '%".$searchid."%') and  division='".$division."' and class_name='".$class."' and pid='".$Pid."' and notification_type='common' order by nid asc")->result();
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
	var con=confirm('are you sure to delete this notification!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/delete_individual_notification",
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
function student_namer(){if($('#student_name').val()==''){}else{ $('#student_namer').html(' '); }}
function notification_descriptionr(){if($('#notification_description').val()==''){}else{ $('#notification_descriptionr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	        
			var  student_name=document.getElementById('student_name').value.trim();
						if(notification_description==''){
			$("#notification_descriptionr").html('Please enter notification');
			$("#notification_description").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/add_new_notifications",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='individual_notification';
						return false;
					}else{
				    alert("not inserted date");
					}
					
				}
			});
			return false;  
		});
				
	}
	
	function update_note(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	        
			
			var  notification_description=document.getElementById('notification_description').value.trim();
          	
			if(notification_description==''){
			$("#notification_descriptionr").html('Please enter notification');
			$("#notification_description").focus();
			return false;
			}
		$("#update_note1").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/update_notifications_individaul",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='individual_notification';
						return false;
					}else{
				    alert("not inserted date");
					}
					
				}
			});
			return false;  
		});
				
	}
</script>


