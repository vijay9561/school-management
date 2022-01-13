
<?php if(isset($_SESSION['TEACHER_ID'])) {  
$teachers=$this->db->query("select Pid,divsion,schools_name from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
$class=$teachers->schools_name;
$division=$teachers->divsion;
$pid=$teachers->Pid;
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
$mysqluery=$this->db->query("select *from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where (p.Student_name LIKE '%".$searchid."%' OR p.adhar_card LIKE '%".$searchid."%' OR p.Student_roll_no LIKE '%".$searchid."%' OR p.Parent_mobile_no LIKE '%".$searchid."%') and r.class='$class' and r.division='$division' and r.pid='$pid' order by r.arid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$mysqluery=$this->db->query("select *from  application_request r inner join tbl_parent p on p.Ptid=r.sid  where  r.pid='".$pid."' and r.class='".$class."' and r.division='$division' order by r.arid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
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
		 <script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='view_application_request?searchkeyowords='+search_id2;
return false;
}
</script>

<script>
function approved_application(id){
	var con=confirm('are you sure to the approved this student request!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/student_request_approved",
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
	
	function cancel_application(id){
	var con=confirm('are you sure to the cancel this student request!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/student_request_cancel",
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">View Application Request</li>
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
		<?php if(isset($_GET['view-details'])){ 
		$t=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['view-details']."'")->result(); ?>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$student=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
	<a href="<?php echo site_url(); ?>new-student-registration" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Student</a>
		<?php } ?>
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
                          <th>Aadhar Number</th>
						  <th>Application Type</th>
						  <th>Application Description</th>
						  <th>Status</th>
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
						<td><?php echo $row->Student_name; ?></td>
						<td><?php echo $row->adhar_card; ?></td>
						<td><?php echo $row->application_for; ?></td>
						<td><?php echo $row->application_description; ?></td>
						<td><?php if($row->app_status=='pending') { echo '<b style="color:#2196F3">'.$row->app_status.'</b>'; } ?>
						   <?php if($row->app_status=='cancel') { echo '<b style="color:red">'.$row->app_status.'</b>'; } ?>
						   <?php if($row->app_status=='approved') { echo '<b style="color:green">'.$row->app_status.'</b>'; } ?>
						</td>
						 <td>
			&nbsp;&nbsp;<a  href="#" onclick="return approved_application(<?php echo $row->arid; ?>)" class="btn btn-success"><i class="fa fa-check"></i> Approved</a>
				&nbsp;&nbsp;<a  href="#" onclick="return cancel_application(<?php echo $row->arid; ?>)" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
</td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">				<div class="col-md-12">
				<?php 
				   if(isset($_GET['searchkeyowords'])){ 
				echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$class,$pid,$division); 
				} else{  echo userspagings($setLimit,$page,$pid,$class,$division);  } ?>
		</div>
			</div>
		</div></div>
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
function userspagings($per_page,$page,$pid,$class,$division){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM application_request r inner join  tbl_parent p on p.Ptid=r.sid  where  r.class='$class' and r.division='$division' and r.pid='$pid' order by r.arid desc")->result();
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


function userspaignsearchings($per_page,$page,$searchid,$class,$pid,$division){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where (p.Student_name LIKE '%".$searchid."%' OR p.adhar_card LIKE '%".$searchid."%' OR p.Student_roll_no LIKE '%".$searchid."%' OR p.Parent_mobile_no LIKE '%".$searchid."%') and r.class='$class' and r.division='$division' and r.pid='$pid' order by r.arid desc")->result();
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
