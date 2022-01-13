<?php if(isset($_SESSION['TEACHER_ID'])) {  // $currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->result();
//echo $this->db->last_query();
//exit;
$teacher_get=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
$division=$teacher_get->divsion;
$class=$teacher_get->schools_name;
$pid=$teacher_get->Pid;
?>
<?php
		 ?>
		 <script>
$(document).ready(function(){
$(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		minDate:0
    });
	});
</script>

<style>
.giii{ font-size:inherit;}
.datepicker{ font-size:inherit;}
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

 function classr(){if($('#class').val()==''){}else{ $('#classr').html(' '); }}
 function divisionr(){if($('#division').val()==''){}else{ $('#divisionr').html(' '); }}
function exam_namer(){if($('#exam_name').val()==''){}else{ $('#exam_namer').html(' '); }}
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
 function parent_idr(){if($('#parent_id').val()==''){}else{ $('#parent_idr').html(' '); }}
 function classr(){if($('#class1').val()==''){}else{ $('#classr').html(' '); }}
 function divisionr(){if($('#division').val()==''){}else{ $('#divisionr').html(' '); }}
 function exam_namer(){if($('#exam_name').val()==''){}else{ $('#exam_namer').html(' '); }}
 
 function subject_name1r(){if($('#subject_name1').val()==''){}else{ $('#subject_name1r').html(' '); }}
 function minmum_marks1r(){if($('#minmum_marks1').val()==''){}else{ $('#minmum_marks1r').html(' '); }}
 function obtained_marks1r(){if($('#obtained_marks1').val()==''){}else{ $('#obtained_marks1r').html(' '); }}
  function maximum_marks1r(){if($('#maximum_marks1').val()==''){}else{ $('#maximum_marks1r').html(' '); }}  

function insert_time_table(){
			var  parent_id=document.getElementById('parent_id').value.trim();
			var  class1=document.getElementById('class1').value.trim();
			var  division=document.getElementById('division').value.trim();
			var  exam_name=document.getElementById('exam_name').value.trim();

            var  subject_name1=document.getElementById('subject_name1').value.trim();
			var  minmum_marks1=document.getElementById('minmum_marks1').value.trim();
			var  obtained_marks1=document.getElementById('obtained_marks1').value.trim();
			var  maximum_marks1=document.getElementById('maximum_marks1').value.trim();
						     
			if(class1==''){ 	$("#classr").html('Please select class'); $("#class").focus();  return false;  }
			if(division==''){ 	$("#divisionr").html('Please select division');  $("#division").focus(); return false;  }
			if(exam_name==''){ 	$("#exam_namer").html('Please select exam name');  $("#exam_name").focus(); return false;  }
			if(parent_id==''){ $("#parent_idr").html('Please select student name'); $("#parent_id").focus(); return false; }
			
			if(subject_name1==''){ 	 $("#subject_name1r").html('Please enter subject name');      $("#subject_name1").focus();  return false;  }
			if(maximum_marks1==''){  $("#maximum_marks1r").html('Please enter max marks');    $("#maximum_marks1").focus(); return false;  }
			if(minmum_marks1==''){ 	 $("#minmum_marks1r").html('Please enter min  marks');        $("#minmum_marks1").focus(); return false;  }
			if(obtained_marks1==''){ $("#obtained_marks1r").html('Please enter obtained marks'); $("#obtained_marks1").focus(); return false; }
			
		$("#inesert_array").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/add_student_result",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='create-student-result';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('This student already result added');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}
	
function upload_validation_exctanation(){
var lblError = document.getElementById("uploadsheetr");
myfile= $('#uploadsheet').val();
var ext = myfile.split('.').pop();
if(ext=="xls" || ext=='csv'){
// alert('Valid');
lblError.innerHTML='';
} else{
lblError.innerHTML = "Please upload files having extensions: <b> .csv</b> only.";
document.getElementById('uploadsheet').value='';
return false;
}
}

function upload_excel_sheet_files(){
var  exam_name=document.getElementById('exam_name').value.trim();
myfile= $('#uploadsheet').val()
if(exam_name==''){ 	$("#exam_namer").html('Please select exam name');  $("#exam_name").focus(); return false;  }
if(myfile==''){ 	$("#uploadsheetr").html('Please select excel sheet');  $("#uploadsheet").focus(); return false;  }
} 

	   
</script>		
<style>
th{ padding:5px;}
</style>
<?php if(isset($_GET['excel'])) { ?>
<div class="container main">			
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Import Excel Sheet</div>
		<?php if(isset($_SESSION['EROOR'])){ ?><div class="alert alert-danger"><?php echo $_SESSION['EROOR']; ?></div><?php  unset($_SESSION['EROOR']);} ?>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="<?php echo site_url(); ?>Excel_Upload_Controller/student_final_result_uploads" enctype="multipart/form-data" id="inesert_array">
		<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
		<div class="row">
		<div class="col-md-2 form-group">
		<label>Class</label>
		<input type="text" class="form-control" value="<?php echo $class; ?>" readonly="true" maxlength="30" name="class" onchange="classr();" id="class1" placeholder="Class">
		<span id="classr" style="color:#FF0000"></span>
		</div>
		<div class="col-md-2 form-group">
		<label>Division</label>
		<input type="text" class="form-control" readonly="true" maxlength="30" onchange="divisionr();" name="division" id="division" placeholder="Class" value="<?php echo $division; ?>">
		<span id="divisionr" style="color:#FF0000"></span>
		</div>
		
		<div class="col-md-3 form-group">
		<label>Examination Name</label>
		<select  class="form-control" maxlength="30" onchange="exam_namer();" name="exam_name" id="exam_name" placeholder="Class">
		<?php $divison_master=$this->db->query("select name from exam_type")->result(); ?>
		<option value="">Select</option>
		<?php foreach($divison_master as $div){ ?>
		<option value="<?php echo $div->name; ?>"><?php echo $div->name; ?></option>
		<?php } ?>
		</select>
		<span id="exam_namer" style="color:#FF0000"></span>
		</div>
		<div class="form-group col-md-3">
		<label>Upload File(Only Upload .csv,.xls file)</label>
		<input type="file" name="uploadsheet" id="uploadsheet" onchange="upload_validation_exctanation()" />
		<span id="uploadsheetr" style="color:red;"></span>
		</div>
		<div class="form-group col-md-2">
		<br />
			<input type="submit" name="Sub" value="Submit" class="btn btn-primary" onclick="return upload_excel_sheet_files();" />
		</div>
		</div></form>
		</div>
		</div><!--/.row-->
		</div></div>
		</div>
		
<?php }else{ ?>
<div class="container main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Create Student Result</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<div class="row">

		<div class="col-md-12">
		<div class="panel panel-primary">
        <div class="panel-heading">Create Student Result</div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form method="post" action="#" enctype="multipart/form-data" id="inesert_array">
		<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
		<div class="row">
		<div class="col-md-3 form-group">
		<label>Class</label>
		<input type="text" class="form-control" value="<?php echo $class; ?>" readonly="true" maxlength="30" name="class" onchange="classr();" id="class1" placeholder="Class">
		<span id="classr" style="color:#FF0000"></span>
		</div>
		<div class="col-md-3 form-group">
		<label>Division</label>
		<input type="text" class="form-control" readonly="true" maxlength="30" onchange="divisionr();" name="division" id="division" placeholder="Class" value="<?php echo $division; ?>">
		<span id="divisionr" style="color:#FF0000"></span>
		</div>
		
		<div class="col-md-3 form-group">
		<label>Examination Name</label>
		<select  class="form-control" maxlength="30" onchange="exam_namer();" name="exam_name" id="exam_name" placeholder="Class">
		<?php $divison_master=$this->db->query("select name from exam_type")->result(); ?>
		<option value="">Select</option>
		<?php foreach($divison_master as $div){ ?>
		<option value="<?php echo $div->name; ?>"><?php echo $div->name; ?></option>
		<?php } ?>
		</select>
		<span id="exam_namer" style="color:#FF0000"></span>
		</div>
		
		<div class="col-md-3 form-group">
		<label>Student Name</label>
		<?php $student_master=$this->db->query("select *from tbl_parent where pid='$pid' and Student_class_division='$class' and divsion='$division' and Status='active'")->result(); 
       //echo $this->db->last_query();
?>
		<select  class="form-control" maxlength="30" onchange="parent_idr();" name="parent_id" id="parent_id" placeholder="Student Name">

		<option value="">Select</option>
		<?php foreach($student_master as $stud){ ?>
		<option value="<?php echo $stud->Ptid; ?>"><?php echo $stud->Student_name; ?>&nbsp;&nbsp;(<?php echo $stud->adhar_card; ?>)</option>
		<?php } ?>
		</select>
		<span id="parent_idr" style="color:#FF0000"></span>
		</div>
		</div>
		<div class="row">
		<table class="table table-bordered">
		<thead>
		<tr style="background-color: #cc4a2c;color: white;"><th>Subject Name</th><th>Max Mark</th><th>Min Marks</th><th>Obt Marks</th></tr>
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name1"  onchange="subject_name1r();">
		<span id="subject_name1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="maximum_marks1" placeholder="Max Mark" onchange="maximum_marks1r()" />
		<span id="maximum_marks1r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks1" placeholder="Min Mark" onchange="minmum_marks1r()" />
		<span id="minmum_marks1r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks1" placeholder="Min Mark" onchange="obtained_marks1r()" />
		<span id="obtained_marks1r" style="color:#FF0000"></span></td>		
		</tr>
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name2"  onchange="subject_name2r();">
		<span id="subject_name2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" autocomplete="off" id="maximum_marks2" placeholder="Max Mark" onchange="maximum_marks2r()" />
		<span id="maximum_marks2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks2" placeholder="Min Mark" onchange="minmum_marks2r()" />
		<span id="minmum_marks2r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks2" placeholder="Min Mark" onchange="obtained_marks2r()" />
		<span id="obtained_marks2r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name2"  onchange="subject_name2r();">
		<span id="subject_name2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" autocomplete="off" id="maximum_marks2" placeholder="Max Mark" onchange="maximum_marks2r()" />
		<span id="maximum_marks2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks2" placeholder="Min Mark" onchange="minmum_marks2r()" />
		<span id="minmum_marks2r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks2" placeholder="Min Mark" onchange="obtained_marks2r()" />
		<span id="obtained_marks2r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name3"  onchange="subject_name3r();">
		<span id="subject_name3r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" autocomplete="off" id="maximum_marks3" placeholder="Max Mark" onchange="maximum_marks3r()" />
		<span id="maximum_marks3r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks3" placeholder="Min Mark" onchange="minmum_marks3r()" />
		<span id="minmum_marks3r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks3" placeholder="Min Mark" onchange="obtained_marks3r()" />
		<span id="obtained_marks3r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name4"  onchange="subject_name4r();">
		<span id="subject_name4r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  autocomplete="off" id="maximum_marks4" placeholder="Max Mark" onchange="maximum_marks4r()" />
		<span id="maximum_marks4r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks4" placeholder="Min Mark" onchange="minmum_marks4r()" />
		<span id="minmum_marks4r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks4" placeholder="Min Mark" onchange="obtained_marks4r()" />
		<span id="obtained_marks4r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name5"  onchange="subject_name5r();">
		<span id="subject_name5r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  autocomplete="off" id="maximum_marks6" placeholder="Max Mark" onchange="maximum_marks6r()" />
		<span id="maximum_marks6r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks6" placeholder="Min Mark" onchange="minmum_marks6r()" />
		<span id="minmum_marks6r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks6" placeholder="Min Mark" onchange="obtained_marks6r()" />
		<span id="obtained_marks6r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name7"  onchange="subject_name7r();">
		<span id="subject_name2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" autocomplete="off" id="maximum_marks7" placeholder="Max Mark" onchange="maximum_marks7r()" />
		<span id="maximum_marks7r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks7" placeholder="Min Mark" onchange="minmum_marks7r()" />
		<span id="minmum_marks7r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"id="obtained_marks7" placeholder="Min Mark" onchange="obtained_marks7r()" />
		<span id="obtained_marks7r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name8"  onchange="subject_name8r();">
		<span id="subject_name8r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  autocomplete="off" id="maximum_marks8" placeholder="Max Mark" onchange="maximum_marks8r()" />
		<span id="maximum_marks8r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks2" placeholder="Min Mark" onchange="minmum_marks8r()" />
		<span id="minmum_marks8r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="obtained_marks8" placeholder="Min Mark" onchange="obtained_marks8r()" />
		<span id="obtained_marks8r" style="color:#FF0000"></span></td>		
		</tr>
		
		<tr>
		<td style="padding:5px;">
<input type="text" class="form-control" autocomplete="off" maxlength="30" name="subject_name[]" placeholder="Subject Name" id="subject_name9"  onchange="subject_name9r();">
		<span id="subject_name2r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
	<input type="text" class="form-control" maxlength="30" name="maximum_marks[]"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" autocomplete="off" id="maximum_marks9" placeholder="Max Mark" onchange="maximum_marks9r()" />
		<span id="maximum_marks9r" style="color:#FF0000"></span>
		</td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="minmum_marks[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" id="minmum_marks9" placeholder="Min Mark" onchange="minmum_marks9r()" />
		<span id="minmum_marks9r" style="color:#FF0000"></span></td>
		<td style="padding:5px;">
		<input type="text" class="form-control" maxlength="30" name="obtained_marks[]"onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  id="obtained_marks9" placeholder="Min Mark" onchange="obtained_marks9r()" />
		<span id="obtained_marks9r" style="color:#FF0000"></span></td>		
		</tr>
		</thead>
		</table>
		</div>
		<div class="form-group">
		<br />
		<input type="submit" name="Sub" value="Submit" class="btn btn-primary" onclick="return insert_time_table();" />
		</div>
		</form>
			  </div></div>
		</div>
		<div class="col-md-1"></div>
		<br /><br /><br />
		<br><br><br />
		</div>
	</div>
	<?php } ?>
	<br /><Br /><br /><br />
	<script>
	</script>
	<?php //include('footer.php');
	
	
	 ?>
	<script>  
	   function exam_date1r(){if($('#exam_date1').val()==''){}else{ $('#exam_date1r').html(' '); }}
	   function time_to1r(){if($('#time_to1').val()==''){}else{ $('#time_to1r').html(' '); }}
	   function time_from1r(){if($('#time_from1').val()==''){}else{ $('#time_from1r').html(' '); }}
	   function subject1r(){if($('#subject1').val()==''){}else{ $('#subject1r').html(' '); }}
	   function subject_code1r(){if($('#subject_code1').val()==''){}else{ $('#subject_code1r').html(' '); }}
	   function day1r(){if($('#day1').val()==''){}else{ $('#day1r').html(' '); }}
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
