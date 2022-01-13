 <?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PARENT_ID']))) {
$pid='';
$class='';
$division=''; 
$mysl_query='';
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
	if(isset($_GET['searchkeyowords'])){
	$search=$_GET['searchkeyowords'];
if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){ 
 $get_pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
 $pid=$get_pid->login_id;
 $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where (r.class='$search' || r.division='$search' || r.exam_name like '%".$search."%' || p.Student_name like '%".$search."%' ||  p.adhar_card like '%".$search."%') and r.pid='".$pid."' and p.Status='active' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
 }else{
 $pid=$_SESSION['PRINCIPLE_ID'];
 $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where (r.class='$search' || r.division='$search' || r.exam_name like '%".$search."%' || p.Student_name like '%".$search."%' ||  p.adhar_card like '%".$search."%') and  r.pid='".$pid."' and p.Status='active' order by r.rmid LIMIT ".$pageLimit." , ".$setLimit)->result();
 } 
 }elseif(isset($_SESSION['TEACHER_ID'])){
 $get_pid=$this->db->query("select Pid,schools_name,divsion from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
 $pid=$get_pid->Pid;
  $class=$get_pid->schools_name;
   $division=$get_pid->divsion;
   $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where (r.class='$search' || r.division='$search' || r.exam_name like '%".$search."%' || p.Student_name like '%".$search."%' ||  p.adhar_card like '%".$search."%') and  r.pid='".$pid."' and p.Status='active' and r.class='$class' and r.division='$division' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
   //echo "select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where (r.class='$class' || r.division='$search' || r.exam_name like '%".$search."%' || p.Student_name like '%".$search."%' ||  p.adhar_card like '%".$search."%') and  r.pid='".$pid."' and r.class='$class' and r.division='$division' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit;
 }else{
  $get_pid=$this->db->query("select pid,Student_class_division,divsion from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
 $pid=$get_pid->pid;
  $class=$get_pid->Student_class_division;
   $division=$get_pid->divsion;
    $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and r.class='$class' and r.division='$division' and p.Status='active' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
   }  
  }else{
if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){ 
 $get_pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
 $pid=$get_pid->login_id;
 $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and p.Status='active' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
 }else{
 $pid=$_SESSION['PRINCIPLE_ID'];
 $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and p.Status='active' order by r.rmid LIMIT ".$pageLimit." , ".$setLimit)->result();
 } 
 }elseif(isset($_SESSION['TEACHER_ID'])){
 $get_pid=$this->db->query("select Pid,schools_name,divsion from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
 $pid=$get_pid->Pid;
  $class=$get_pid->schools_name;
   $division=$get_pid->divsion;
   $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and r.class='$class' and p.Status='active' and r.division='$division' and p.Status='active' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
 }else{
  $get_pid=$this->db->query("select pid,Student_class_division,divsion from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."' and Status='active'")->row();
 $pid=$get_pid->pid;
  $class=$get_pid->Student_class_division;
   $division=$get_pid->divsion;
    $mysl_query=$this->db->query("select *from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where r.parent_id='".$_SESSION['PARENT_ID']."' and  r.pid='".$pid."' and r.class='$class' and r.division='$division' and p.Status='active' and p.Status='active' order by r.rmid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
 }  
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
		 <script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='view-student-result?searchkeyowords='+search_id2;
return false;
}

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

 function deleted_result_student(id){
	var con=confirm('are you sure to the delete this row!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>Users_controller/delete_individual_student_result",
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
	
	 function subject_namer(id){if($('#subject_name'+id).val()==''){}else{ $('#subject_namer'+id).html(' '); }}
 function minmum_marksr(id){if($('#minmum_marks'+id).val()==''){}else{ $('#minmum_marksr'+id).html(' '); }}
 function obtained_marksr(id){if($('#obtained_marks'+id).val()==''){}else{ $('#obtained_marksr'+id).html(' '); }}
  function maximum_marksr(id){if($('#maximum_marks'+id).val()==''){}else{ $('#maximum_marksr'+id).html(' '); }}  

function insert_time_table(){
			var  subject_name1=document.getElementById('subject_name1').value.trim();
			var  minmum_marks1=document.getElementById('minmum_marks1').value.trim();
			var  obtained_marks1=document.getElementById('obtained_marks1').value.trim();
			var  maximum_marks1=document.getElementById('maximum_marks1').value.trim();
			if(subject_name1==''){ 	 $("#subject_namer1").html('Please enter subject name');      $("#subject_name1").focus();  return false;  }
			if(maximum_marks1==''){  $("#maximum_marksr1").html('Please enter max marks');    $("#maximum_marks1").focus(); return false;  }
			if(minmum_marks1==''){ 	 $("#minmum_marksr1").html('Please enter min  marks');        $("#minmum_marks1").focus(); return false;  }
			if(obtained_marks1==''){ $("#obtained_marksr1").html('Please enter obtained marks'); $("#obtained_marks1").focus(); return false; }
			
		
				
	}

	
</script>		
<style>
th{ padding:5px;}
</style>
<div class="container main">			
		<?php if(isset($_GET['edit-result'])) {
		$rmid=$_GET['edit-result']; 
//		$get_class_time=$this->db->query("select *from schools_time_table where sttmid='".$_GET['edit-result']."'")->result();
		$result_subject_marks=$this->db->query("select *from result_subject_marks where rmid='$rmid'")->result();
		  ?>
		<div class="row">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#8e09e7;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#FFFFFF;">Add New Subject Marks</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo site_url(); ?>users_controller/individual_subject_marks_added">
	  <input type="hidden" name="sttid" value="<?php echo $_GET['edit-result']; ?>" />
	  <div class="form-group">
	  <label>Subject Name</label>
	 <input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name"   placeholder="Subject Name" id="subject_name" required>
	  </div>
	  <div class="form-group">
	  <label>Min Marks</label>
	<input type="text" class="form-control" autocomplete="off" maxlength="30" name="maximum_marks"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  placeholder="Subject Name" id="maximum_marks" required>
	  </div>
	  <div class="form-group">
	  <label>Max Marks</label>
	<input type="text" class="form-control" autocomplete="off" maxlength="30" name="minmum_marks"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  placeholder="Subject Name" id="minmum_marks" required>
	  </div>
	   <div class="form-group">
	  <label>Obt Marks</label>
	 <input type="text" class="form-control" autocomplete="off" maxlength="30" name="obtained_marks"   onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" placeholder="Subject Name" id="obtained_marks" required>
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
        <div class="panel-heading">Update Result
		  <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fa fa-plus"></i> Add New</a>
		</div>
			 <div class="panel-body">
			 <div class="row">
			 <div class="col-md-12">
			 <form method="post" action="<?php site_url(); ?>users_controller/update_student_result" id="insert_array">
			 <input type="hidden" name="rmid" value="<?php echo $_GET['edit-result']; ?>" />
			 <table class="table table-bordered">
		<thead>
		<tr style="background-color: #cc4a2c;color: white;"><th>Subject Name</th><th>Max Mark</th><th>Min Marks</th><th>Obt Marks</th><th>Action</th></tr>
		<?php  $i=1; foreach($result_subject_marks as $rows){ ?>
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" value="<?php echo $rows->subject_name; ?>" placeholder="Subject Name" id="subject_name<?php echo $i; ?>"  onchange="subject_namer(<?php echo $i; ?>);">
		<span id="subject_namer<?php echo $i; ?>" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]" value="<?php echo $rows->maximum_marks; ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="maximum_marks<?php echo $i; ?>" placeholder="Max Mark" onchange="maximum_marksr(<?php echo $i; ?>)" />
		<span id="maximum_marksr<?php echo $i; ?>" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" value="<?php echo $rows->minmum_marks; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks<?php echo $i; ?>" placeholder="Min Mark" onchange="minmum_marksr(<?php echo $i; ?>)" />
		<span id="minmum_marksr<?php echo $i; ?>" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" value="<?php echo $rows->obtained_marks; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks<?php echo $i; ?>" placeholder="Min Mark" onchange="obtained_marksr(<?php echo $i; ?>)" />
		<span id="obtained_marksr<?php echo $i; ?>" style="color:#FF0000"></span></td>	
		<td>
		<?php if(count($result_subject_marks)==1){}else{ ?>
		<a href="#"  onclick="deleted_result_student(<?php echo $rows->rsmid; ?>)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
		<?php } ?>
		</td>	
		</tr>
		<?php } ?>
		</thead>
		</table>
		<div class="form-group">
		<br />
		<input type="submit" name="sub" value="Update" class="btn btn-primary" onclick="return insert_time_table();"  />&nbsp;&nbsp;
		<a href="<?php echo site_url(); ?>view-student-result" class="btn btn-danger">Back</a>
		</div>
	</form>
			   </div>
			  </div>
			 </div>
			</div> 
		</div>
		</div>
		<?php }elseif($_GET['particular-result']){ 
		           $rmid=$_GET['particular-result']; 
		   $result_subject_marks=$this->db->query("select *from result_subject_marks where rmid='$rmid'")->result();
		   $d=$this->db->query("select r.division,r.class,r.year,p.Student_roll_no,p.Student_name,pr.Principle_schools_image,pr.Principle_school_name from result_master r inner join tbl_parent p on  r.parent_id=p.Ptid inner join tbl_principle pr on pr.Pid=r.pid where r.rmid='$rmid' and p.Status='active'")->row();
		  // echo $this->db->last_query();
		  ?>
		  <style>
		  .table > thead > tr > th {
    border-bottom: 1px solid #e6e7e8;
    vertical-align: middle;
    height: 37px;
}
 .table > tbody > tr > td {
    border-bottom: 1px solid #e6e7e8;
    vertical-align: middle;
padding: 4px;
}
		  </style>
	 <div class="row">
	   <div class="col-md-12">
		 <div class="panel panel-primary">
           <div class="panel-heading">Details Student Result</div>
			 <div class="panel-body">
			 <div class="table-responsive">
              <table class="table table-bordered">
			  <thead>
			  <tr style="height:50px;"><td colspan="5">
			  
			  <?php if(!empty($d->Principle_schools_image)){ ?>
			 <img src="<?php echo base_url(); ?>assets/profile/<?php echo $d->Principle_schools_image; ?>" style="height:50px; width:60px;" />
			  <?php }else{ ?>
			 <img src="<?php echo base_url(); ?>assets/profile/jquery_179.png" style="height:50px; width:60px;" />
			  <?php } ?>
			  <span style="font-size:25px; color:#cc4a2c; font-weight:bold;">&nbsp;&nbsp;<?php echo $d->Principle_school_name; ?></span>
			  </td></tr>
			  <tr><th colspan="2">Year: <?php echo $d->year; ?></th><th>Class: <?php echo $d->class; ?></th><th>Division: <?php echo $d->division; ?></th><th>Roll No: <?php echo $d->Student_roll_no; ?></th></tr>
			  <tr><th colspan="2">Student Name</th><th colspan="3"><?php echo $d->Student_name; ?></th></tr>
			  </thead>
			  <thead>
			  <tr style="background-color: #cc4a2c;color: white; margin:0px; height:34px;"><th>Sr.No</th>
			  <th>Subject Name</th>
			  <th>Maximum Marks</th>
			  <th>Minimum Marks</th>
			  <th>Obtained Marks</th>
			  </tr>
			  </thead>
			  <tbody>
			  <?php
			  $i=1; 
			   $max_marks='';
			   $obtained_marks='';
			   $min_marks='';
			   $percentage='';
			   $fails='';
			   $passs=''; 
			   foreach($result_subject_marks as $rows){ ?>
			  <tr>
			  <td><?php echo $i++; $percentage=$i+$percentage;  ?></td>
			  <td><?php echo $rows->subject_name; ?></td>
			  <td><?php echo $rows->maximum_marks; $max_marks=$rows->maximum_marks+$max_marks; ?></td>
			  <td><?php echo $rows->minmum_marks; $min_marks=$rows->minmum_marks+$min_marks; ?></td>
			  <td><?php echo $rows->obtained_marks; $obtained_marks=$rows->obtained_marks+$obtained_marks; ?></td>
			  <?php if($rows->obtained_marks>=$rows->minmum_marks){ ?>
			        <?php $pass='PASS'; ?>
			     <?php }else{
				      $fails='FAIL';
				    } ?>
			  </tr>
			  <?php } ?>
			  <tr><td colspan="2"><strong>Total</strong></td>
			  <td><strong>&nbsp;&nbsp;<?php echo $max_marks; ?></strong></td>
			  <td><strong>&nbsp;&nbsp;<?php echo $min_marks; ?></strong></td>
			  <td><strong>&nbsp;&nbsp;<?php echo $obtained_marks; 
			  $percent = ($obtained_marks / $max_marks) * 100;
			   ?></strong></td>
			   <tr><td colspan="2"><strong>Result</strong></td>
			   <td><?php if(!empty($fails)) { echo '<strong>'.$fails.'</strong>'; }else{ echo '<strong>'.$pass.'</strong>'; } ?></td>
			   <td>Percentage</td><td><?php echo  number_format((float) $percent, 2, '.', ''); ?>&nbsp;%</td></tr>
			  </tr>
			  </tbody>
			  </table>
		   </div>
		   </div>
		  </div>
		</div>
	  </div>
	 	<?php 
		}else{ ?>
		<div class="row">
         
		<div class="col-md-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
	<?php if(isset($_SESSION['TEACHER_ID'])){ ?>
	<a href="<?php echo site_url(); ?>create-student-result" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Result</a>&nbsp;&nbsp;
	<a href="<?php echo site_url(); ?>create-student-result?excel=upload" class="btn btn-danger"><i class="fa fa-excel"></i> Import Excel Sheet</a>
	<a href="<?php echo site_url(); ?>Excel_Upload_Controller/download_excel_format" class="btn btn-success"><i class="fa fa-download"></i> Download Excel Format</a>
	<?PHP } ?>
		</div>
<div class="col-md-6">
<?php if((isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PRINCIPLE_ID']))) {?>
<div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result122()" />
</form>
</div>
<?PHP } ?>
</div>		
		</div>
		<div class="panel panel-primary">
        <div class="panel-heading">Student Result</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		
		<div class="row">
		<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
		<tr  style="background-color: #cc4a2c;color: white;">
       <th  style="padding:5px; height:auto;">Student Name</th>
	   <th  style="padding:5px; height:auto;">Aadhar Card</th>
	   <th style="padding:5px; height:auto;">Exam Name</th>		
		<th style="padding:5px; height:auto;">Class</th>
		<th  style="padding:5px; height:auto;">Division</th>
	   <th  style="padding:5px; height:auto;">Result</th>
	   		<th  style="padding:5px; height:auto;">Percentage(%)</th>
	  <th  style="padding:5px; height:auto;">Create Date</th>
		<th  style="padding:5px; height:auto;">Action</th>
		</tr>
		<?php 
		foreach($mysl_query as $row){
		$result_subject_marks=$this->db->query("select *from result_subject_marks where rmid='".$row->rmid."'")->result();
		       $max_marks='';
			   $obtained_marks='';
			   $min_marks='';
			   $percentage='';
			   $fails='';
			   $passs='';
			   $ii=1;
			  foreach($result_subject_marks as $rows){ 
			   $percentage=$i+$percentage;
			   $max_marks=$rows->maximum_marks+$max_marks;
               $min_marks=$rows->minmum_marks+$min_marks;
               $obtained_marks=$rows->obtained_marks+$obtained_marks;
			   if($rows->obtained_marks>=$rows->minmum_marks){ 
			         $pass='PASS'; 
			      }else{
				      $fails='FAIL';
				    } 
			   }
			 $percent = ($obtained_marks / $max_marks) * 100;
		?>
		<tr style="<?php if(!empty($fails)) { echo 'background-color:#BD0E0E;color:#FFFFFF'; }else{ echo 'background-color:green;color:#FFFFFF'; } ?>">
		<td style="padding:5px; height:auto;"><?php echo $row->Student_name; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->adhar_card; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->exam_name; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->class; ?></td>
		<td style="padding:5px; height:auto;"><?php echo $row->division; ?></td>
	    <td style="padding:5px; height:auto;"><?php if(!empty($fails)) { echo '<strong>'.$fails.'</strong>'; }else{ echo '<strong>'.$pass.'</strong>'; } ?></td>
		<td style="padding:5px; height:auto;"><?php echo  number_format((float)$percent, 2, '.', ''); ?> %</td>
		
		<td style="padding:5px; height:auto;"><?php echo $row->create_date; ?></td>
		<td style="padding:5px; height:auto;">
		<a class="btn btn-primary" title="Show Result" href="<?php echo site_url(); ?>view-student-result?particular-result=<?php echo $row->rmid;?>"><i class="fa fa-eye"></i>&nbsp;</a>
		<?php if(isset($_SESSION['TEACHER_ID'])){ ?>
		 <a class="btn btn-info" title="Edit Result" href="<?php echo site_url(); ?>view-student-result?edit-result=<?php echo $row->rmid;?>"><i class="fa fa-edit"></i></a>
		 <?php } ?>
		 </td>
		
		</tr>
		<?php } ?>
		</thead>
		</table>
	 </div>
	 <div class="row">
	 <div class="col-md-12">
	  <?php
	  if(isset($_SESSION['TEACHER_ID'])){
	  
	    $teachers=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
		$class=$teachers->schools_name;
		$division=$teachers->divsion;
		$pid=$teachers->Pid;
	      if(isset($_GET['searchkeyowords'])){
		 // echo teachers_pagings_search($setLimit,$page,$class,$division,$pid,$_GET['searchkeyowords']);
		   }else{
	       echo teachers_pagings($setLimit,$page,$class,$division,$pid);
		  }
	    }
		if(isset($_SESSION['PRINCIPLE_ID'])) { 
 if($_SESSION['USERTYPE']=='clerk'){ 
   $get_pid=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
   $pid=$get_pid->login_id;
   
   }else{
     $pid=$_SESSION['PRINCIPLE_ID'];
   }
   echo principle_pagings($setLimit,$page,$pid);
  }
	   ?>
	 </div>
	 </div>
	</div>
		</form>
			  </div></div>
		</div>
		<div class="col-md-1"></div>
		</div>
		<?php } ?>
		<br /><br /><br /><br /><br /><br />
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
function principle_pagings($per_page,$page,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM result_master  where pid='$pid'")->result();
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
function teachers_pagings($per_page,$page,$class,$division,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM result_master  where pid='".$pid."' AND division='".$division."' and class='$class' ")->result();
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
