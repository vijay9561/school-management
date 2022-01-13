
<?php 

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
$mysqluery=$this->db->query("select *from tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and (pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."') order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$currentrecords[0]->login_id."' OR pid='".$currentrecords[0]->Pid."' order by Student_class_division asc LIMIT ".$pageLimit." , ".$setLimit)->result();
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
window.location='student-list-clerk?searchkeyowords='+search_id2;
return false;
}
</script>

<script>
function Principle_schools_imager(){
			var lblError = document.getElementById("Principle_schools_imager");
			     myfile= $('#Principle_schools_image').val();
				   var ext = myfile.split('.').pop();
 if(ext=="png" || ext=="PNG" || ext=="jpg" || ext=="jpeg" || ext=="JPEG" || ext=="JPG" || ext=="gif" ||  ext=="BMP" ||  ext=="bmp"  ||  ext=="PPM" ||  ext=="ppm" ||  ext=="PGM" ||  ext=="Exif" ||  ext=="PNM" ||  ext=="PBM" || ext=="JFIF"){
      // alert('Valid');
	    lblError.innerHTML='';
   } else{
         lblError.innerHTML = "Please upload files having extensions: <b> only png,jpg,jpeg,gif</b> only.";
			document.getElementById('Principle_schools_image').value='';
			return false;
   }
    var fileUpload = document.getElementById("Principle_schools_image");
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("tempprofileimage");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "150";
                                img.width = "150";
                                img.src = e.target.result;
								img.class="img-thumbnail";
                                dvPreview.appendChild(img);
								
                            }
                            reader.readAsDataURL(file);
							
                        } 
						
						else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
								$('#Principle_schools_image').val('');
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
         
			}
			
			
				function delestudents(id){
	var con=confirm('are you sure to the delete this records!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/delete_student",
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
	

function dobr(){if($('#dob').val()==''){}else{ $('#dobr').html(' '); }}
function Student_roll_nor(){if($('#Student_roll_no').val()==''){}else{ $('#Student_roll_nor').html(' '); }}
function Parent_mobile_nor(){if($('#Parent_mobile_no').val()==''){}else{ $('#Parent_mobile_nor').html(' '); }}
function Student_namer(){if($('#Student_name').val()==''){}else{ $('#Student_namer').html(' '); }}
function Parent_passwordr(){if($('#Parent_password').val()==''){}else{ $('#Parent_passwordr').html(' '); }}
function Student_class_divisionr(){if($('#Student_class_division').val()==''){}else{ $('#Student_class_divisionr').html(' '); }}
function Student_yearr(){if($('#Student_year').val()==''){}else{ $('#Student_yearr').html(' '); }}
function adhar_cardr(){if($('#adhar_card').val()==''){}else{ $('#adhar_cardr').html(' '); }}
function divsionr(){if($('#divsion').val()==''){}else{ $('#divsionr').html(' '); }}
function yearr(){if($('#year').val()==''){}else{ $('#yearr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function mother_namer(){if($('#mother_name').val()==''){}else{ $('#mother_namer').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  Student_roll_no=document.getElementById('Student_roll_no').value.trim();
			var  Student_name=document.getElementById('Student_name').value.trim();
			var  year=document.getElementById('year').value.trim();
			var  divsion =document.getElementById('divsion').value.trim();
			var  schools_name=document.getElementById('schools_name').value.trim();
            var  Parent_mobile_no=document.getElementById('Parent_mobile_no').value.trim();
			var  adhar_card=document.getElementById('adhar_card').value.trim();
			var  dob=document.getElementById('dob').value.trim();
		    var  gender=document.getElementById('gender').value.trim();
			var  mother_name=document.getElementById('mother_name').value.trim();
			var  gender=document.getElementById('gender').value.trim();
			 if(adhar_card==''){
			$("#adhar_cardr").html('Please enter adhar car number');
			$("#adhar_card").focus();
			return false;
			}
				if(!(adhar_card.match(adharcartvalidation))) {
			$("#adhar_cardr").html("Please enter valid adhar card number");	
			$("#adhar_card").focus();
			return false;
			}
			if(Student_roll_no==''){
			$("#Student_roll_nor").html('Please enter roll number');
			$("#Student_roll_no").focus();
			return false;
			}
			if(Student_name==''){
				$("#Student_namer").html('Please enter name');
				$("#Student_name").focus();
				 return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
			return false;
			}
			if(mother_name==''){
				$("#mother_namer").html('Please enter mother name');
				$("#mother_name").focus();
				 return false;
			}
			if(Parent_mobile_no==''){
			$("#Parent_mobile_nor").html('Please enter contact number');
			$("#Parent_mobile_no").focus();
			return false;
			}
			if (!(Parent_mobile_no.match(mobilenovalidation))) {
			$("#Parent_mobile_nor").html("Please enter valid contact number");	
			$("#Parent_mobile_no").focus();
			return false;
			}
			if(dob==''){
			$("#dobr").html('Please select date of birth');
			$("#dob").focus();
			return false;
			}
			
			if(schools_name==''){
			$("#schools_namer").html('Please select schools');
			$("#schools_name").focus();
			return false;
			}
			if(divsion==''){
			$("#divsionr").html('Please select division');
			$("#divsion").focus();
			return false;
			}
			if(year==''){
			$("#yearr").html('Please select year');
			$("#year").focus();
			return false;
			}		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/student_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='student-list-clerk';
						return false;
						}else if(data==3){
						  $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('this adhar card already register here');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
						}else {
				  $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('can not select of student future year');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
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
	<script type="text/javascript">
function upload_validation_exctanation(){
var lblError = document.getElementById("uploadsheetr");
myfile= $('#uploadsheet').val();
var ext = myfile.split('.').pop();
ifext=="xlsx"){
// alert('Valid');
lblError.innerHTML='';
} else{
lblError.innerHTML = "Please upload files having extensions: <b> .csv</b> only.";
document.getElementById('uploadsheet').value='';
return false;
}
}
function excel_sheet_imported_data(){
uploadsheet=$("#uploadsheet").val();
pid=$("#pid").val();
if(uploadsheet==''){
$("#uploadsheetr").html("Please upload excel sheet");
return false
}
if(pid==''){
 $("#pidr").html("Please select schools name");
 return false;
 }
}
function pidr(){ if($("#pid").val()==""){ }else{ $("#pidr").html(" "); } }

		</script>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<?php if(isset($_GET['student_excel'])){ ?>
		<div class="panel panel-primary">
		<div class="panel-heading">Upload Excel Sheet Student</div>
		<div class="panel-body">
		<a href="<?php echo site_url(); ?>Excel_Upload_Controller/download__student_excel_format?filname=Student.xlsx" class="btn btn-success">
	<span class="glyphicon glyphicon-download"> </span> Excel Download </a>
		<form method="post" name="uploadexcelsheet" action="<?php echo  site_url();?>Excel_Upload_Controller/excel_student_upload" enctype="multipart/form-data">
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label>Upload Excel Shet(Only .xlsx Accepted)</label>
		<input	 type="file" name="uploadsheet" id="uploadsheet" required onchange="return upload_validation_exctanation()" />
		<span id="uploadsheetr" style="color:red;"></span>                     
		</div></div>
		<div class="col-md-6">
		<div class="form-group">
		<label>Schools Name</label>
		<?php $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name from  tbl_principle where login_id='NULL'")->result(); ?>
		<select  class="form-control"  id="pid" name="pid" onchange="pidr()" required>
		<option value="">Select</option>
		<?php foreach($tbl_principle as $row){ ?>
		<option value="<?php echo $row->Pid; ?>"><?php echo $row->Principle_school_name.'('.$row->Principle_name.')'; ?></option>
		<?php } ?>
		</select>
		<span id="pidr" style="color:red;"></span>
		</div>
		</div>
		</div>
		<div  class="form-group">
		<input	 type="submit" name="SUB" class="btn  btn-primary" value="Submit"  onclick="return excel_sheet_imported_data();" />
		</div>
		</form>
		</div>
		</div>
		<?php }elseif(isset($_GET['teacher_excel'])){ ?>
		<div class="panel panel-primary">
		<div class="panel-heading">Upload Excel Sheet Teacher</div>
		<div class="panel-body">
		<a href="<?php echo site_url(); ?>Excel_Upload_Controller/download_teacher_excel_sheet?filname=Teacher.xlsx" class="btn btn-success">
	<span class="glyphicon glyphicon-download"> </span> Excel Download </a>
		<form method="post" name="uploadexcelsheet" action="<?php echo  site_url();?>Excel_Upload_Controller/excel_sheet_upload_teachers" enctype="multipart/form-data">
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label>Upload Excel Shet(Only .xlsx Accepted)</label>
		<input	 type="file" name="uploadsheet" id="uploadsheet" required onchange="return upload_validation_exctanation()" />
		<span id="uploadsheetr" style="color:red;"></span>                     
		</div></div>
		<div class="col-md-6">
		<div class="form-group">
		<label>Schools Name</label>
		<?php $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name from  tbl_principle where login_id='NULL'")->result(); ?>
		<select  class="form-control"  id="pid" name="pid" onchange="pidr()">
		<option value="">Select</option>
		<?php foreach($tbl_principle as $row){ ?>
		<option value="<?php echo $row->Pid; ?>"><?php echo $row->Principle_school_name.'('.$row->Principle_name.')'; ?></option>
		<?php } ?>
		</select>
		<span id="pidr" style="color:red;"></span>
		</div>
		</div>
		</div>
		<div  class="form-group">
		<input	 type="submit" name="SUB" class="btn  btn-primary" value="Submit"  onclick="return excel_sheet_imported_data();" />
		</div>
		</form>
		</div>
		</div>
		<?php } ?>
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
