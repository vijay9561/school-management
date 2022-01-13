<div class="container main">
<?php if(isset($_SESSION['PARENT_ID'])) {  ?>
				
	
<?php 
$getprincipal_id=$this->db->query("select pid from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
		$pid=$getprincipal_id->pid;
		$expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date'")->result();?>
		
<style>
.calendartable{
table-layout: fixed; width:100%;
margin-top:10px;
}
@media(max-width:768px){
.calendartable{
table-layout: fixed;
width: 100%;
margin-top: 10px;
margin-right: -52px;
margin-left: 0px;
}
}
</style>

<div class="row">
<?php if(isset($_SESSION['ERRORMSG'])) { ?>
<div class="alert bg-danger" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['ERRORMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div>
<?php unset($_SESSION['ERRORMSG']); } ?>

<?php if(isset($_GET['add_new_application'])){ ?>
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Application Request Form</div>
<div class="panel-body">
<form method="post" action="<?php echo site_url(); ?>users_controller/send_application_request" id="application_form_submit">
<div class="form-group">
<label>Appication Type</label>
<select name="application_for" id="application_for" required class="form-control">
<option value="">Select Applicationn Type</option>
<?php $application_master=$this->db->query("select name from application_master")->result(); 
foreach($application_master as $row){
?>
<option value="<?php echo $row->name;?>"><?php echo $row->name;?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label>Application Description</label>
<textarea name="application_description"  id="application_description" style="text-transform: none;resize:none;"  class="form-control" rows="6"></textarea> 
</div>
<div class="form-group">
<input type="submit" name="sub" value="Submit" class="btn btn-primary" />
</div>
</form>
</div>
</div>
</div>
<br /><br />

<?php }else{ ?>
<div class="col-md-12">
<a href="<?php echo site_url(); ?>application-request?add_new_application=add_new_application" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
<br /><br />
<div class="table-responsive">
<table class="table table-bordered">
<thead><tr><th>#</th><th>Application Type</th><th>Application Description</th><th>Date</th><th>Status</th></tr></thead>
<tbody>
<?php $query=$this->db->query("select *from application_request where sid='".$_SESSION['PARENT_ID']."'")->result();
$i=1;
  foreach($query as $row){
  ?>
  <tr>
  <td><?php echo $i++; ?></td>
  <td><?php echo $row->application_for; ?></td>
  <td><?php echo $row->application_description; ?></td>
    <td><?php echo $row->create_date; ?></td>
	  <td><?php if($row->app_status=='pending') { ?><?php echo '<b style="color:#1bd1a4;">'.$row->app_status.'</b>';
	   }elseif($row->app_status=='approved') {
	    echo '<b style="color:green;">'.$row->app_status.'</b>'; }else{  
		echo '<b style="color:red;">'.$row->app_status.'</b>'; } ?> </td>  
  </tr>
  <?php } ?>
</tbody>
</table>
<br /><br />
<br />
</div>
</div>
<br /><br />
<br /><br />
<?PHP } ?>
</div>
<?php }else{ ?>

<script>
window.location='<?php echo site_url(); ?>';
</script>
<?php } ?>
</div>	