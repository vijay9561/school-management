<?php 
 $currentrecords=$this->db->query("select login_id,Pid from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
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
$mysqluery=$this->db->query("select *from notification_admin  where (notification_name LIKE '%".$searchid."%')")->result();
}else{
$mysqluery=$this->db->query("select *from notification_admin")->result();
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
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_my_notifications",
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
function add_notifications(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  notification_name=document.getElementById('notification_name').value.trim();
			var  expiry_date=document.getElementById('expiry_date').value.trim();
			if(notification_name==''){
			$("#notification_namer").html('Please notification details');
			$("#notification_name").focus();
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
				url: "<?php site_url(); ?>Supper_admin_controller/notifications_add",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='notification-admin';
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
			var  expiry_date=document.getElementById('expiry_date').value.trim();
			if(notification_name==''){
			$("#notification_namer").html('Please notification details');
			$("#notification_name").focus();
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
				url: "<?php site_url(); ?>Supper_admin_controller/update_notifications",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='notification-admin';
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teacher List</li>
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
				
		<?php if(isset($_GET['add-new-notification'])){ ?>
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">Add Notification</div>
		<div class="panel-body">
	<form role="form" method="post" id="notification_add">
	<div class="form-group">
	<label>Notification Name <b style="color:red;"> *</b></label>
	<textarea name="notification_name" id="notification_name" onchange="notification_namer()" class="form-control"></textarea>
	<span id="notification_namer" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label>Notification Expiry Date <b style="color:red;"> *</b></label>
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
		$not=$this->db->query("select  *from notification_admin where nid='".$_GET['action']."'")->row(); ?>
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
	<label>Notification Name <b style="color:red;"> *</b></label>
	<textarea name="notification_name" id="notification_name"  onchange="notification_namer()" class="form-control"><?php echo $not->notification_name; ?></textarea>
	<span id="notification_namer" style="color:#FF0000"></span>
	</div>
	<div class="form-group">
	<label>Notification Expiry Date <b style="color:red;"> *</b></label>
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
	
	<a href="<?php echo site_url(); ?>notification-admin?add-new-notification=add-new-notification" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Notification</a>
	
		</div>

<div class="col-md-6">
<div class="form-group pull-right">
<!--<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</form>-->
</div>
</div>		
		</div>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Notification Details</th>
						  <th>Expiry Date</th>
						  <th>Create Date</th>
                    
                          <th style=" width:15%;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php $i=1; 
					foreach($mysqluery as $row){  
					   ?>
                        <tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->notification_name; ?></td>
												<td><?php echo $row->expiry_date; ?></td>
						<td><?php echo $row->date; ?></td>

				       
						
						                      <td>
											 
					   <a href="<?php echo site_url(); ?>notification-admin?action=<?php echo $row->nid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
					  
				<a href="#" onclick="return delestudents(<?php echo $row->nid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
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

