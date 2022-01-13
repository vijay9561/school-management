<?php if(isset($_SESSION['PRINCIPLE_ID'])) {  $currentrecords=$this->db->query("select login_id,Pid from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
//echo $this->db->last_query();
//exit;
?>
<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 50;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *from notification_master  where (notification_name LIKE '%".$searchid."%') and (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') order by nid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$mysqluery=$this->db->query("select *from notification_master where  pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."' order by nid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
}
		 ?>
		 <script>
$(document).ready(function(){
$("#expiry_date").datepicker({
        changeMonth: true,
        changeYear: true,
		minDate:0,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2030"
    });
	});
	$(document).ready(function(){
$("#start_date").datepicker({
        changeMonth: true,
        changeYear: true,
		minDate:0,
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
window.location='notification?searchkeyowords='+search_id2;
return false;
}
</script>

<script>
			
				function delestudents(id){
	var con=confirm('are you sure to the delete this records!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/delete_my_notifications",
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
	

function notification_namer(){if($('#notification_name').val()==''){}else{ $('#notification_namer').html(' '); }}
function expiry_dater(){if($('#expiry_date').val()==''){}else{ $('#expiry_dater').html(' '); }}
function start_dater(){if($('#start_date').val()==''){}else{ $('#start_dater').html(' '); }}
function add_notifications(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  notification_name=document.getElementById('notification_name').value.trim();
			var  start_date=document.getElementById('start_date').value.trim();
			var  expiry_date=document.getElementById('expiry_date').value.trim();
			if(notification_name==''){
			$("#notification_namer").html('Please notification details');
			$("#notification_name").focus();
			return false;
			}
			if(start_date==''){
			$("#start_dater").html('Please select notification start date');
			$("#start_date").focus();
			return false;
			}
			if(expiry_date==''){
			$("#expiry_dater").html('Please select notification expiry date');
			$("#expiry_date").focus();
			return false;
			}
		   $("#notification_add").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/notifications_add",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='notification';
						return false;
						}else {
				         alert("not inserted");
				 	 }
				  }
			});
			return false;  
		});
				
	}


function update_notifications1(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  notification_name=document.getElementById('notification_name').value.trim();
			var  start_date=document.getElementById('start_date').value.trim();
			var  expiry_date=document.getElementById('expiry_date').value.trim();
			if(notification_name==''){
			$("#notification_namer").html('Please notification details');
			$("#notification_name").focus();
			return false;
			}
			if(start_date==''){
			$("#start_dater").html('Please select notification start date');
			$("#start_date").focus();
			return false;
			}
			if(expiry_date==''){
			$("#expiry_dater").html('Please select notification expiry date');
			$("#expiry_date").focus();
			return false;
			}
		   $("#update_notifications").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/update_notifications",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='notification';
						return false;
						}else {
				         alert("not inserted");
				 	 }
				  }
			});
			return false;  
		});
				
	}


</script>		
<div class="container main">			
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['add-new-notification'])){ ?>
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">Add Notification</div>
		<div class="panel-body">
	<form role="form" method="post" id="notification_add">
	<input type="hidden" name="pid" id="pid" value="<?php echo $currentrecords[0]->login_id; ?>" />
	<div class="form-group">
	<label class="control-label" for="name">Notification Name <b style="color:red;"> *</b></label>
	<textarea name="notification_name" id="notification_name" onchange="notification_namer()" class="form-control"></textarea>
	<span id="notification_namer" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label class="control-label" for="name">Start  Date <b style="color:red;"> *</b></label>
	<input type="text" name="start_date" id="start_date" onchange="start_dater()" class="form-control" />
	<span id="start_dater" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label class="control-label" for="name">Notification Expiry Date <b style="color:red;"> *</b></label>
	<input type="text" name="expiry_date" id="expiry_date" onchange="expiry_dater()" class="form-control" />
	<span id="expiry_dater" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<input type="submit" name="sub" value="Submit" class="btn btn-primary"  onclick="return add_notifications()"/>
	</div>
	</form>				
	</div>
  </div>
 </div>
 </div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$not=$this->db->query("select  *from notification_master where nid='".$_GET['action']."'")->row(); ?>
		<!-- /.row -->
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Notification Update</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post" id="update_notifications">
	<input type="hidden" name="nid" id="nid" value="<?php echo $not->nid; ?>" />
	<div class="form-group">
	<label class="control-label" for="name">Notification Name <b style="color:red;"> *</b></label>
	<textarea name="notification_name" id="notification_name"  onchange="notification_namer()" class="form-control"><?php echo $not->notification_name; ?></textarea>
	<span id="notification_namer" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label class="control-label" for="name">Start  Date <b style="color:red;"> *</b></label>
	<input type="text" name="start_date" id="start_date" onchange="start_dater()" class="form-control"  value="<?php echo $not->start_date; ?>"/>
	<span id="start_dater" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label class="control-label" for="name">Notification Expiry Date <b style="color:red;"> *</b></label>
	<input type="text" name="expiry_date" id="expiry_date" onchange="expiry_dater()" class="form-control" value="<?php echo $not->expiry_date; ?>" />
	<span id="expiry_dater" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<input type="submit" name="sub" value="Update" class="btn btn-primary"  onclick="return update_notifications1()"/>
	</div>
	</form>
			  </div></div>
		</div>
		<div class="col-md-2"></div>
		</div>
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
	<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
	<a href="<?php echo site_url(); ?>notification?add-new-notification=add-new-notification" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Notification</a>
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
                          <th>Notification Details</th>
						  <th>Start Date</th>
						  <th>Expiry Date</th>
						  <th>Create Date</th>
                    
                          <th style=" width:15%;">Action</th>
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
						<td><?php echo $row->notification_name; ?></td>
						<td><?php echo $row->start_date; ?></td>
						<td><?php echo $row->expiry_date; ?></td>
						<td><?php echo $row->date; ?></td>

				       
						
						                      <td>
											  <?php if($_SESSION['USERTYPE']=='clerk'){ ?>
					   <a href="<?php echo site_url(); ?>notification?action=<?php echo $row->nid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
					   <?php } ?>
				<a href="#" onclick="return delestudents(<?php echo $row->nid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				<?php if($_SESSION['USERTYPE']=='clerk'){ ?>
				<?php 
				$d=$currentrecords[0]->login_id;
				}else{
				$d=$currentrecords[0]->Pid;
				}
				   if(isset($_GET['searchkeyowords'])){ 
				echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$d); 
				} else{  echo userspagings($setLimit,$page,$d);  } ?>
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
function userspagings($per_page,$page,$login){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM notification_master  where (pid='".$login."' OR pid='".$login."')")->result();
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM notification_master  where (notification_name LIKE '%".$searchid."%') and  (pid='".$login."' OR pid='".$login."')")->result();
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
