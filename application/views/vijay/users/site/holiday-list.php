<?php
$currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
if($_SESSION['USERTYPE']=='clerk'){ 
$p_id=$currentrecords->login_id;
}else{
$p_id=$currentrecords->Pid;
}
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *from yearly_holiday_master  where (event_name LIKE '%".$searchid."%' OR fromdate LIKE '%".$searchid."%' OR todate LIKE '%".$searchid."%') and ptid='".$p_id."' order by yid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from yearly_holiday_master where ptid='".$p_id."' order by yid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}
		 ?>
<script>	
function event_namer(){if($('#event_name').val()==''){}else{ $('#event_namer').html(' '); }}
function fromdater(){if($('#fromdate').val()==''){}else{ $('#fromdater').html(' '); }}
function todater(){if($('#todate').val()==''){}else{ $('#todate').html(' '); }}
function holiday_adds(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  event_name=document.getElementById('event_name').value.trim();
			var  fromdate=document.getElementById('fromdate').value.trim();
			var  todate=document.getElementById('todate').value.trim();
         
			if(event_name==''){
			$("#event_namer").html('Please enter holiday name');
			$("#event_name").focus();
			return false;
			}
			if(fromdate==''){
				$("#fromdater").html('Please select start holiday date');
				$("#fromdate").focus();
				 return false;
			}
			if(todate==''){
			$("#todater").html('Please select end holiday date');
			$("#todate").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/update_holidays_events",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='holiday-list';
						return false;
					}else{
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('this day holiday already added please select another days');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
				}
			}
			});
			return false;  
		});
				
	}

$(document).ready(function(){
    $("#fromdate").datepicker({
        numberOfMonths: 1,
		changeYear: true,
		dateFormat: "yy-mm-dd",
        onSelect: function(selected) {
          $("#todate").datepicker("option","minDate", selected)
        }
    });
    $("#todate").datepicker({ 
        numberOfMonths: 1,
		changeYear: true,
		dateFormat: "yy-mm-dd",
        onSelect: function(selected) {
           $("#fromdate").datepicker("option","maxDate", selected)
        }
    });  
});

</script>		
<div class="container main">			
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['add-new'])){ ?>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$holiday=$this->db->query("select  *from yearly_holiday_master where yid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Holiday Update</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
		<input type="hidden" name="yid" id="yid" value="<?php echo $holiday[0]->yid ?>" />
          <div class="form-group">
            <label>Holiday Name <b style="color:red;">*</b></label>
            <input type="text" id="event_name"  name="event_name" onchange="event_namer()" value="<?php echo $holiday[0]->event_name; ?>" autocomplete="off" maxlength="150" autcomplete="off" required="required" class="form-control">
            <span id="event_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Holiday From Date <b style="color:red;">*</b></label>
            <input type="text" id="fromdate" name="fromdate" onchange="fromdater()" maxlength="50" autocomplete="off" value="<?php echo $holiday[0]->fromdate; ?>" required="required" class="form-control">
            <span id="fromdater" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Holiday To Date <b style="color:red;">*</b></label>
            <input type="text" id="todate" name="todate" onchange="todater()" maxlength="50" autocomplete="off" value="<?php echo $holiday[0]->todate; ?>" required="required" class="form-control">
            <span id="todater" style="color:red;"></span> </div>
			
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return holiday_adds();" value="Submit">
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
	<a href="<?php echo site_url(); ?>create-event" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Holiday</a>
	<?PHP } ?>
		</div>
<div class="col-md-6">
<div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result()" />
</form>
</div>
</div>		
		</div>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Holiday Name</th>
                          <th>Holiday Start Date</th>
						   <th>Holiday End Date</th>
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
						<td><?php echo $row->event_name; ?></td>
						<td><?php echo $row->fromdate; ?></td>
						<td><?php echo $row->todate; ?></td>
				                      <td>
								  <?php if($_SESSION['USERTYPE']=='clerk'){ ?>
					   <a href="<?php echo site_url(); ?>holiday-list?action=<?php echo $row->yid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
					   <?PHP } ?>
						  <a href="#" onclick="return deletepincodes(<?php echo $row->yid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
				<?php if(isset($_GET['searchkeyowords'])){ echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$p_id); } else{  echo userspaging($setLimit,$page,$p_id);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
		<br /><br /><br />
		<br><br>
	</div>
	<script>
	function Teacher_namer(){if($('#Teacher_name').val()==''){}else{ $('#Teacher_namer').html(' '); }}
function Teacher_emailr(){if($('#Teacher_email').val()==''){}else{ $('#Teacher_emailr').html(' '); }}
function Teacher_passwordr(){if($('#Teacher_password').val()==''){}else{ $('#Teacher_passwordr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function Teacher_mobile_nor(){if($('#Teacher_mobile_no').val()==''){}else{ $('#Teacher_mobile_nor').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var   	Teacher_name=document.getElementById('Teacher_name').value.trim();
			var  Teacher_email=document.getElementById('Teacher_email').value.trim();
			var  Teacher_password=document.getElementById('Teacher_password').value.trim();
			var  schools_name=document.getElementById('schools_name').value.trim();
			var  Teacher_mobile_no=document.getElementById('Teacher_mobile_no').value.trim();
      
			if(Teacher_name==''){
			$("#Teacher_namer").html('Please enter name');
			$("#Teacher_name").focus();
			return false;
			}
			if(Teacher_email==''){
				$("#Teacher_emailr").html('Please enter email address');
				$("#Teacher_email").focus();
				 return false;
					}
					var email1 = Teacher_email.toLowerCase();
					if (emailpattern.test(email1) == false){
					$("#Teacher_emailr").html("Please enter valid email address");
					$("#Teacher_email").focus();       
					return false;
					}
			if(Teacher_mobile_no==''){
			$("#Teacher_mobile_nor").html('Please enter contact number');
			$("#Teacher_mobile_no").focus();
			return false;
			}
			if (!(Teacher_mobile_no.match(mobilenovalidation))) {
			$("#Teacher_mobile_nor").html("Please enter valid contact number");	
			$("#Teacher_mobile_no").focus();
			return false;
			}
			if(Teacher_password==''){
			$("#Teacher_passwordr").html('Please enter password');
			$("#Teacher_password").focus();
			return false;
			}
			if(schools_name==''){
			$("#schools_namer").html('Please select schools');
			$("#schools_name").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/teacher_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='holiday-list';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Teacher_email+'&nbsp; This day already holiday added');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}

	</script>
	
	<script>
	function deletepincodes(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/delete_holidays",
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
	
	function activeusersstatus(id){
	var con=confirm('are you sure to the update status !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/principle_status_active",
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
	
	function search_result(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='holiday-list?searchkeyowords='+search_id2;
return false;
}
</script>


<?php //include('footer.php');
	
	function userspaging($per_page,$page,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM yearly_holiday_master  where ptid='".$pid."' order by yid desc")->result();
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


function userspaignsearchings($per_page,$page,$searchid,$pid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM yearly_holiday_master  where (event_name LIKE '%".$searchid."%' OR fromdate LIKE '%".$searchid."%' OR todate LIKE '%".$searchid."%') and  ptid='".$pid."' order by yid desc")->result();
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