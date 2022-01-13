<script>
function subjectr(){if($('#subject').val()==''){}else{ $('#subjectr').html(' '); }}
function messager(){if($('#message').val()==''){}else{ $('#messager').html(' '); }}
function pidr(){if($('#pid').val()==''){}else{ $('#pidr').html(' '); }}
function submit_mails_sends(){
			var  subject=document.getElementById('subject').value.trim();
			var  pid=document.getElementById('pid').value.trim();
			var  message=document.getElementById('message').value.trim();
			 if(subject==''){
			$("#subjectr").html('Please enter subject');
			$("#subject").focus();
			return false;
			}
			if(message==''){
			$("#messager").html('Please enter message');
			$("#message").focus();
			return false;
			}
			if(pid==''){
				$("#pidr").html('Please select school name');
				$("#pid").focus();
				 return false;
			}
	}

</script>		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Mail Send</li>
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
	
	
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
		<div class="panel panel-primary">
		<div class="panel-heading">School Mail Sends</div>
		<div class="panel-body">
		<form method="post" name="mailsend" action="<?php echo  site_url();?>Excel_Upload_Controller/send_bulk_mails" enctype="multipart/form-data">
		<div class="row">
		<div class="col-md-12">
		<div class="form-group">
		<input type="text" maxlength="150" class="form-control" name="subject" id="subject" maxlength="10000" onchange="subjectr()" placeholder="Subject" />
		<span id="subjectr" style="color:red;"></span>
		</div>
		<div class="form-group">
		<textarea class="form-control" name="message" id="message"  onchange="messager();" rows="8" maxlength="10000" placeholder="Message"></textarea>
		<span id="messager" style="color:red;"></span>
		</div>
		<div class="form-group">
		<label>Schools Name</label>
		<?php $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name from  tbl_principle where login_id='NULL'")->result(); ?>
		<select  class="form-control"  id="pid" name="pid" onchange="pidr()" required>
		<option value="">Select</option>
		<option value="All">All Schools</option>
		<?php foreach($tbl_principle as $row){ ?>
		<option value="<?php echo $row->Pid; ?>"><?php echo $row->Principle_school_name.'('.$row->Principle_name.')'; ?></option>
		<?php } ?>
		</select>
		<span id="pidr" style="color:red;"></span>
		</div>
		</div>
		</div>
		<div  class="form-group">
		<input	 type="submit" name="SUB" class="btn  btn-primary" value="Submit"  onclick="return submit_mails_sends();" />
		</div>
		</form>
		</div>
		</div>
		</div>
		<div  class="col-md-2"></div>
		</div>
		<br /><br />
		<br /><br />
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
