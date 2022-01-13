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
$mysqluery=$this->db->query("select *from tbl_principle  where (Principle_email LIKE '%".$searchid."%' OR Principle_name LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Teacher_email LIKE '%".$searchid."%') and login_id='".$_SESSION['PRINCIPLE_ID']."' order by Pid desc")->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from tbl_principle where login_id='".$_SESSION['PRINCIPLE_ID']."' order by Pid desc")->result();
//$mysqluery=mysql_query($query);
}
		 ?>
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
			

</script>	
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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Clerk List</li>
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
		$t=$this->db->query("select  *from tbl_principle where Pid='".$_GET['view-details']."'")->result(); ?>
		<div class="row">
		<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading" align="center">View Details&nbsp;&nbsp;<a href="<?php echo site_url(); ?>clerk-list" class="btn btn-success">Back</a></div>
		<div class="panel-body">
					<table id="datatable" class="table table-striped table-bordered">
					<tbody>
					<tr><th>Name:</th><td><?php echo $t[0]->Principle_name; ?></td></tr>
					<tr><th>Email:</th><td><?php echo $t[0]->Principle_email; ?></td></tr>
					<tr><th>Adhar Card:</th><td><?php echo $t[0]->adhar_card; ?></td></tr>
					<tr><th>Mobile No:</th><td><?php echo $t[0]->Principle_mobile_no; ?></td></tr>
					
					<tr><th>Date Of Birth:</th><td><?php echo $t[0]->dob; ?></td></tr>
					<tr><th>Pan Card:</th><td><?php echo $t[0]->pan_card; ?></td></tr>
					<tr><th>Address:</th><td><?php echo $t[0]->address; ?></td></tr>
					<tr><th>Monthly Payment:</th><td><?php echo $t[0]->monthly_salary; ?></td></tr>
					<tr><th>Account Number:</th><td><?php echo $t[0]->acount_no; ?></td></tr>
					<tr><th>IFC Code:</th><td><?php echo $t[0]->ifc_code; ?></td></tr>
					<tr><th>Images:</th><td><?php if(!empty($t[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $t[0]->Principle_schools_image; ?>" style="height:150px;width:150px;" />
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
		$techers=$this->db->query("select  *from tbl_principle where Pid='".$_GET['action']."'")->result(); ?>
		<!-- /.row -->
		
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Clerk Update</h3></div>
			 <div class="panel-body">
		
		<form role="form" method="post"  id="pincodemangement">
		<input type="hidden" name="Pid" id="Pid" value="<?php echo $techers[0]->Pid; ?>" />
          <div class="form-group">
            <label>Teacher Name <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_name" name="Teacher_name" value="<?php echo $techers[0]->Principle_name; ?>" onchange="Teacher_namer()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<?php if(!empty($techers[0]->gender)) { ?>
			      <?php if($techers[0]->gender=='Male'){ ?>
				  <option value="Male">Male</option>
			<option value="Female">Female</option>
		       <?php }else{ ?>
			   <option value="Female">Female</option>
			   <option value="Male">Male</option>
			<?php  } }else{ ?>
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			<?php } ?>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_email" name="Teacher_email"  value="<?php echo $techers[0]->Principle_email; ?>" onchange="Teacher_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_mobile_no" value="<?php echo $techers[0]->Principle_mobile_no; ?>" name="Teacher_mobile_no" onchange="Teacher_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_mobile_nor" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Adhar card <b style="color:red;">*</b></label>
            <input type="text" id="adhar_card" name="adhar_card" value="<?php echo $techers[0]->adhar_card; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" onchange="adhar_cardr()" maxlength="50" required="required" class="form-control">
            <span id="adhar_cardr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Date Of Birth <b style="color:red;">*</b></label>
            <input type="text" id="dob" name="dob" onchange="dobr()" value="<?php echo $techers[0]->dob; ?>" maxlength="50" required="required" class="form-control">
            <span id="dobr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Address </label>
            <input type="text" id="address" name="address" maxlength="20" value="<?php echo $techers[0]->address; ?>" required="required" class="form-control">
            <span id="addressr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Pan Card <b style="color:red;">*</b></label>
            <input type="text" id="pan_card" name="pan_card" onchange="pan_cardr()" value="<?php echo $techers[0]->pan_card; ?>" maxlength="20" required="required" class="form-control">
            <span id="pan_cardr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Monthly Salary</label>
            <input type="text" id="payment" name="payment" value="<?php echo $techers[0]->monthly_salary; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="10"  class="form-control">
            </div>
			
			<div class="form-group">
            <label>Account Number</label>
            <input type="text" id="account_no" name="account_no" value="<?php echo $techers[0]->acount_no; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" outocomplete="off" maxlength="15"  class="form-control">
             </div>
			
			<div class="form-group">
            <label>IFC Code</label>
            <input type="text" id="ifc_code" name="ifc_code" value="<?php echo $techers[0]->ifc_code; ?>" outocomplete="off" maxlength="15"  class="form-control">
            </div>
          <div class="form-group">
             <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="Teacher_password" name="Teacher_password" value="<?php echo $techers[0]->Principle_password; ?>" onchange="Teacher_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_passwordr" style="color:red;"></span> </div>
          	 
			 			<div class="form-group">
			<label>Profile Image</label>
			<input type="hidden" name="defaultimage" value="<?php echo $techers[0]->Principle_schools_image; ?>" />
			<div id="tempprofileimage">
			<?php if(!empty($techers[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $techers[0]->Principle_schools_image; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
			<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">&nbsp;&nbsp;&nbsp;
			<a href="<?php echo site_url(); ?>clerk-list" class="btn btn-danger">Back</a>
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
                          <th>Name</th>
						  <th>Gender</th>
                          <th>Email ID</th>
						   <th>Mobile No</th>
						  <th>Adhar Card</th>
                          <th>Images</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php 
	                 $j=1;
					foreach($mysqluery as $row){  
					   ?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $row->Principle_name; ?></td>
						<td><?php echo $row->gender; ?></td>
						<td><?php echo $row->Principle_email; ?></td>
						<td><?php echo $row->Principle_mobile_no; ?></td>
				        <td><?php echo $row->adhar_card; ?></td>
						<td><?php if(!empty($row->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $row->Principle_schools_image; ?>" style="height:60px;width:60px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:60px; width:60px;" />
	   <?php } ?></td>
						                  <td>
					   <a href="<?php echo site_url(); ?>clerk-list?action=<?php echo $row->Pid; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="<?php echo site_url(); ?>clerk-list?view-details=<?php echo $row->Pid; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
						  <a href="#" onclick="return deletepincodes(<?php echo $row->Pid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
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
function Teacher_namer(){if($('#Teacher_name').val()==''){}else{ $('#Teacher_namer').html(' '); }}
function divsionr(){if($('#divsion').val()==''){}else{ $('#divsionr').html(' '); }}
function yearr(){if($('#year').val()==''){}else{ $('#yearr').html(' '); }}
function Teacher_emailr(){if($('#Teacher_email').val()==''){}else{ $('#Teacher_emailr').html(' '); }}
function Teacher_passwordr(){if($('#Teacher_password').val()==''){}else{ $('#Teacher_passwordr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function Teacher_mobile_nor(){if($('#Teacher_mobile_no').val()==''){}else{ $('#Teacher_mobile_nor').html(' '); }}

function adhar_cardr(){if($('#adhar_card').val()==''){}else{ $('#adhar_cardr').html(' '); }}
function dobr(){if($('#dob').val()==''){}else{ $('#dobr').html(' '); }}
function pan_cardr(){if($('#pan_card').val()==''){}else{ $('#pan_cardr').html(' '); }}
function teacher_typer(){if($('#teacher_type').val()==''){}else{ $('#teacher_typer').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var adharcartvalidation=/^\d{12}$/;
	
			var   	Teacher_name=document.getElementById('Teacher_name').value.trim();
			var  Teacher_email=document.getElementById('Teacher_email').value.trim();
			var  Teacher_password=document.getElementById('Teacher_password').value.trim();
			var  Teacher_mobile_no=document.getElementById('Teacher_mobile_no').value.trim();
			var  adhar_card=document.getElementById('adhar_card').value.trim();
			var  dob=document.getElementById('dob').value.trim();
			var  pan_card=document.getElementById('pan_card').value.trim();
			var  gender=document.getElementById('gender').value.trim();
			
      
			if(Teacher_name==''){
			$("#Teacher_namer").html('Please enter name');
			$("#Teacher_name").focus();
			return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
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
			if(adhar_card==''){
			$("#adhar_cardr").html('Please enter adhar card number');
			$("#adhar_card").focus();
			return false;
			}
			if(!(adhar_card.match(adharcartvalidation))) {
			$("#adhar_cardr").html("Please enter valid adhar card number");	
			$("#adhar_card").focus();
			return false;
			}
			if(dob==''){
			$("#dobr").html('Please select date of birth');
			$("#dob").focus();
			return false;
			}
			if(pan_card==''){
			$("#pan_cardr").html('Please enter pan card');
			$("#pan_card").focus();
			return false;
			}
			if(Teacher_password==''){
			$("#Teacher_passwordr").html('Please enter password');
			$("#Teacher_password").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/clerk_update",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='clerk-list';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Teacher_email+'&nbsp; This email address already register');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}

	</script>
	<?php //include('footer.php');
	
	function userspaging($per_page,$page){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_teacher  where Pid='".$_SESSION['PRINCIPLE_ID']."' order by Pid desc")->result();
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


function userspaignsearchings($per_page,$page,$searchid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_teacher  where (Teacher_name LIKE '%".$searchid."%' OR Teacher_email LIKE '%".$searchid."%' OR adhar_card LIKE '%".$searchid."%' OR Teacher_mobile_no LIKE '%".$searchid."%') and  Pid='".$_SESSION['PRINCIPLE_ID']."' order by tid desc")->result();
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
	function deletepincodes(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/clerk_deletion",
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
window.location='clerk-list?searchkeyowords='+search_id2;
return false;
}
</script>


