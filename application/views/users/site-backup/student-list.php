<?php if(isset($_SESSION['TEACHER_ID'])) {  $currentrecords=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
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
$mysqluery=$this->db->query("select *from tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and divsion='".$currentrecords[0]->divsion."' and Student_class_division='".$currentrecords[0]->schools_name."' and pid='".$currentrecords[0]->Pid."' order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$div=$currentrecords[0]->divsion;
$school=$currentrecords[0]->schools_name;
$year=$currentrecords[0]->year;
$mysqluery=$this->db->query("select *from tbl_parent where divsion='".$div."' and Student_class_division='".$school."' and pid='".$currentrecords[0]->Pid."' order by Student_name asc LIMIT ".$pageLimit." , ".$setLimit)->result();
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
window.location='student-list?searchkeyowords='+search_id2;
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
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var adharcartvalidation=/^\d{12}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  Student_roll_no=document.getElementById('Student_roll_no').value.trim();
			var  Student_name=document.getElementById('Student_name').value.trim();
			var  Student_year=document.getElementById('Student_year').value.trim();
            var  Parent_mobile_no=document.getElementById('Parent_mobile_no').value.trim();
			 var  adhar_card=document.getElementById('adhar_card').value.trim();
			 var  dob=document.getElementById('dob').value.trim();
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
			if(Student_year==''){
			$("#Student_yearr").html('Please select student year');
			$("#Student_year").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
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
					  window.location='student-list';
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
				
		<?php if(isset($_GET['view-details'])){ 
		$t=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['view-details']."'")->result(); ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">View Details&nbsp;&nbsp;<a href="<?php echo site_url(); ?>student-list" class="btn btn-success">Back</a></div>
		<div class="panel-body">
					<table id="datatable" class="table table-striped table-bordered">
					<tbody>
					<tr><th>Roll Number:</th><td><?php echo $t[0]->Student_roll_no; ?></td></tr>
					<tr><th>GR Code:</th><td><?php echo $t[0]->gr_code; ?></td></tr>
					<tr><th>Adhar Card Number:</th><td><?php echo $t[0]->adhar_card; ?></td></tr>
					<tr><th>Student Name:</th><td><?php echo $t[0]->Student_name; ?></td></tr>
					<tr><th>Mother Name:</th><td><?php echo $t[0]->mother_name; ?></td></tr>
					<tr><th>Mobile No:</th><td><?php echo $t[0]->Parent_mobile_no; ?></td></tr>
					<tr><th>Class:</th><td><?php echo $t[0]->Student_class_division; ?>&nbsp;&nbsp;(<?php echo $t[0]->divsion; ?>)</td></tr>
					<tr><th>Date Of Birth:</th><td><?php echo $t[0]->dob; ?></td></tr>
					<tr><th>Pan Card:</th><td><?php echo $t[0]->pan_no; ?></td></tr>
					
					<tr><th>Caste:</th><td><?php echo $t[0]->cast; ?></td></tr>
					<tr><th>Sub Caste:</th><td><?php echo $t[0]->sub_cast; ?></td></tr>
					<tr><th>Address:</th><td><?php echo $t[0]->address; ?></td></tr>
					<tr><th>Residential Address:</th><td><?php echo $t[0]->redensital_address; ?></td></tr>
					<tr><th>Old School Name:</th><td><?php echo $t[0]->old_schools; ?></td></tr>
					<tr><th>Account Number:</th><td><?php echo $t[0]->account_no; ?></td></tr>
					<tr><th>Bank Name:</th><td><?php echo $t[0]->bank_no; ?></td></tr>
					<tr><th>IFC:</th><td><?php echo $t[0]->ifc_code; ?></td></tr>
					<tr><th>Images:</th><td><?php if(!empty($t[0]->Student_profile_picture)){ ?>
	   <img src="<?php echo base_url() ?>assets/student/<?php echo $t[0]->Student_profile_picture; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?></td></tr>
	   <tr><th>Created Date:</th><td><?php echo $t[0]->Date; ?></td></tr>
					</tbody>
			</table>
			</div>
</div>
		</div>
		</div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$student=$this->db->query("select  *from tbl_parent where Ptid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Student Update</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post" id="pincodemangement">
		<input type="hidden" name="Ptid" value="<?php echo $_GET['action']; ?>" />
		<div class="form-group">
            <label>Adhar Card <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card" value="<?php echo $student[0]->adhar_card; ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="adhar_card" onchange="adhar_cardr()" maxlength="12" autocomplete="off" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Student Roll No <b style="color:red;">*</b></label>
            <input type="text" id="Student_roll_no" value="<?php echo $student[0]->Student_roll_no; ?>" readonly="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="Student_roll_no" onchange="Student_roll_nor()" maxlength="5" autcomplete="off" required="required" class="form-control">
            <span id="Student_roll_nor" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Student Name <b style="color:red;">*</b></label>
            <input type="text" id="Student_name" name="Student_name" value="<?php echo $student[0]->Student_name; ?>" onchange="Student_namer()" maxlength="50" required="required" class="form-control">
            <span id="Student_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Parent_mobile_no" name="Parent_mobile_no" value="<?php echo $student[0]->Parent_mobile_no; ?>" onchange="Parent_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Parent_mobile_nor" style="color:red;"></span> </div>
			 <div class="form-group">
            <label>Date Of Birth <b style="color:red;">*</b></label>
            <input type="text" id="dob" name="dob" onchange="dobr()" value="<?php echo $student[0]->dob; ?>" maxlength="100" class="form-control">
            <span id="dobr" style="color:red;"></span> </div>

 <div class="form-group">
            <label>Address</label>
            <input type="text" id="address" name="address"  maxlength="100" value="<?php echo $student[0]->address; ?>" class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
			
<div class="form-group">
            <label>Pan Card</label>
            <input type="text" id="pan_no" name="pan_no"  maxlength="100" value="<?php echo $student[0]->pan_no; ?>" class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>

			<div class="form-group">
            <label>Old Schools Name</label>
            <input type="text" id="old_schools" name="old_schools" value="<?php echo $student[0]->old_schools; ?>"  maxlength="100" class="form-control">
            <span id="old_schoolsr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Account No</label>
            <input type="text" id="account_no" value="<?php echo $student[0]->account_no; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" name="account_no"  maxlength="100" class="form-control">
            <span id="account_nor" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Bank Name</label>
            <input type="text" id="bank_no" value="<?php echo $student[0]->bank_no; ?>" autocomplete="off" name="bank_no"  maxlength="100" class="form-control">
            <span id="bank_nor" style="color:red;"></span> </div>
			<div class="form-group">
            <label>IFC Code</label>
            <input type="text" id="ifc_code"  autocomplete="off" name="ifc_code" value="<?php echo $student[0]->ifc_code; ?>"  maxlength="100" class="form-control">
            <span id="ifc_coder" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Select Year<b style="color:red;">*</b></label>
            <input readonly="true" value="<?php echo $student[0]->Student_year; ?>" type="text" id="Student_year" name="Student_year" onchange="Student_yearr()" maxlength="200" required="required" class="form-control" style="resize:none;" />
			<span id="Student_yearr" style="color:red;"></span> </div>
			<div class="form-group">
			<label>Student Image</label>
			<input type="hidden" name="defaultimage" value="<?php echo $techers[0]->Student_profile_picture; ?>" />
			<div id="tempprofileimage">
			<?php if(!empty($techers[0]->Student_profile_picture)){ ?>
	   <img src="<?php echo base_url() ?>assets/student/<?php echo $techers[0]->Student_profile_picture; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
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
	<?php /*?><a href="<?php echo site_url(); ?>new-student-registration" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus"> </span> Add New Student</a><?php */?>
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
                          <th>Roll No</th>
                          <th>Student Name</th>
						  <th>Adhar Card Number</th>
						   <th>Mobile No</th>
						  <th>Class</th>
                    
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
						<td><?php echo $row->Student_roll_no; ?></td>
						<td><?php echo $row->Student_name; ?></td>
						<td><?php echo $row->adhar_card; ?></td>
						<td><?php echo $row->Parent_mobile_no; ?></td>
				        <td><?php echo $row->Student_class_division; ?>&nbsp;&nbsp;(<?php echo $row->divsion;?>)</td>
						
						                      <td>
					<?php /*?>   <a href="<?php echo site_url(); ?>student-list?action=<?php echo $row->Ptid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a><?php */?>
					   &nbsp;&nbsp;<a href="<?php echo site_url(); ?>student-list?view-details=<?php echo $row->Ptid; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
						 <?php /*?> <a href="#" onclick="return delestudents(<?php echo $row->Ptid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td><?php */?>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<?php /*?><div class="row">
				<div class="col-md-12">
				<?php $d=$currentrecords[0]->divsion;
				   $s=$currentrecords[0]->schools_name;
				 $y=$currentrecords[0]->year; if(isset($_GET['searchkeyowords'])){ 
				echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$d,$s,$y); 
				} else{  echo userspagings($setLimit,$page,$d,$s,$y);  } ?>
		</div>
			</div><?php */?>
			<br /><br /><br /><br /><br /><br />
		</div></div>
		</div>
		<?php } ?>
	</div>
	<script>
	</script>
	<?php //include('footer.php');
	
	function userspagings($per_page,$page,$division,$class,$year){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where divsion='".$division."' and Student_class_division='".$class."' and Student_year='".$year."' order by Student_roll_no asc")->result();
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


function userspaignsearchings($per_page,$page,$searchid,$division,$class,$year){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_parent  where (Student_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Student_roll_no LIKE '%".$searchid."%' OR Parent_mobile_no LIKE '%".$searchid."%') and  divsion='".$division."' and Student_class_division='".$class."' and Student_year='".$year."' order by Student_roll_no asc")->result();
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

