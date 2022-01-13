<?php 
?>
<?php
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
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_division_notification",
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
	
		function delestudents1(id){
	var con=confirm('are you sure to the delete this records!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_class_notification",
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
				<li class="active">Class and Division</li>
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
				
		<?php if(isset($_GET['add-new-division'])){ ?>
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">Add Division</div>
		<div class="panel-body">
	<form role="form" method="post" id="notification_add" action="<?php echo site_url(); ?>supper_admin_controller/add_new_division">
	<div class="form-group">
	<label>Division Name <b style="color:red;"> *</b></label>
	<input name="division" id="division" required class="form-control">
	</div>
	<div class="form-group">
	<input type="submit" name="sub" value="Submit" class="btn btn-primary"/>
	</div>
	</form>				
	</div>
  </div>
 </div>
 </div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['add-new-class'])){ ?>
		<!-- /.row -->
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Add Class</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post" id="update_notifications" action="<?php echo site_url(); ?>supper_admin_controller/add_new_class">
	<div class="form-group">
	<label>Class Name <b style="color:red;"> *</b></label>
	<input type="text" name="class" id="class" required class="form-control" />
	</div>
	<div class="form-group">
	<input type="submit" name="sub" value="Submit" class="btn btn-primary"  onclick="return update_notifications1()"/>
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
		<div class="row">
		<div class="col-md-6">
		<a href="<?php echo site_url(); ?>division_and_class_master?add-new-class=add-new-class" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Class</a>
		<div class="table-responsive">
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Class</th>
                          <th style=" width:15%;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php $i=1; 
					  $class=$this->db->query("select id,name from schools_master order by id asc")->result();
					foreach($class as $row){  
					   ?>
                        <tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->name; ?></td>						
						 <td>
				<a href="#" onclick="return delestudents1(<?php echo $row->id; ?>)" class="btn btn-danger btn-sm" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php  } ?>
                      </tbody>
                    </table>
					</div>
					</div>
					<div class="col-md-6">
					<a href="<?php echo site_url(); ?>division_and_class_master?add-new-division=add-new-division" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Division</a>
					<div class="table-responsive">
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Division</th>
                          <th style=" width:15%;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php $i=1; 
					  $class=$this->db->query("select dmid,divison_name from divison_master order by dmid asc")->result();
					foreach($class as $row){  
					   ?>
                        <tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->divison_name; ?></td>						
						 <td>
				<a href="#" onclick="return delestudents(<?php echo $row->dmid; ?>)" class="btn btn-danger btn-sm" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php  } ?>
                      </tbody>
                    </table>
					</div>
					</div>
					</div>
					<div class="row">
				<div class="col-md-12">
				<br /><br /><br />
				
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

