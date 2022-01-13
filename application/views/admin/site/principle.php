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
$mysqluery=$this->db->query("select *from tbl_principle  where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_mobile_no LIKE '%".$searchid."%') and  data_operators='principal' order by Pid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from tbl_principle  where  data_operators='principal' order by Pid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
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
			
function Principle_namer(){if($('#Principle_name').val()==''){}else{ $('#Principle_namer').html(' '); }}
function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function Principle_mobile_nor(){if($('#Principle_mobile_no').val()==''){}else{ $('#Principle_mobile_nor').html(' '); }}
function Principle_passwordr(){if($('#Principle_password').val()==''){}else{ $('#Principle_passwordr').html(' '); }}
function Principle_school_namer(){if($('#Principle_school_name').val()==''){}else{ $('#Principle_school_namer').html(' '); }}
function Principle_schools_cityr(){if($('#Principle_schools_city').val()==''){}else{ $('#Principle_schools_cityr').html(' '); }}
function addressr(){ if($("#address").val()=='') { }else { $("#addressr").html(" "); } }
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var   	Principle_name=document.getElementById('Principle_name').value.trim();
			var  Principle_email=document.getElementById('Principle_email').value.trim();
			var  Principle_mobile_no=document.getElementById('Principle_mobile_no').value.trim();
			var  Principle_school_name=document.getElementById('Principle_school_name').value.trim();
			var  Principle_password=document.getElementById('Principle_password').value.trim();
			var  Principle_schools_city=document.getElementById('Principle_schools_city').value.trim();
			var  address=document.getElementById('address').value.trim();
      
			if(Principle_name==''){
			$("#Principle_namer").html('Please enter name');
			$("#Principle_name").focus();
			return false;
			}
			if(Principle_email==''){
				$("#Principle_emailr").html('Please enter email address');
				$("#Principle_email").focus();
				 return false;
					}
					var email1 = Principle_email.toLowerCase();
					if (emailpattern.test(email1) == false){
					$("#Principle_emailr").html("Please enter valid email address");
					$("#Principle_email").focus();       
					return false;
					}
					if(Principle_password==''){
			$("#Principle_passwordr").html('Please enter password');
			$("#Principle_password").focus();
			return false;
			}
			if(Principle_mobile_no==''){
			$("#Principle_mobile_nor").html('Please enter contact number');
			$("#Principle_mobile_no").focus();
			return false;
			}
			if (!(Principle_mobile_no.match(mobilenovalidation))) {
			$("#Principle_mobile_nor").html("Please enter valid contact number");	
			$("#Principle_mobile_no").focus();
			return false;
			}
			if(Principle_school_name==''){
			$("#Principle_school_namer").html('Please enter schools name');
			$("#Principle_school_name").focus();
			return false;
			}
			if(address==''){
			$("#addressr").html('Please enter schools adddress');
			$("#address").focus();
			return false;
			}
			if(Principle_schools_city==''){
			$("#Principle_schools_cityr").html('Please enter city name');
			$("#Principle_schools_city").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>supper_admin_controller/principle_update_profiles1",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='admin-principle';
						return false;
						}else {
				   alert('Not Updated'); 
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
				<li><a href="<?php echo site_url(); ?>dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Principle</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Principle Mangement</h1>
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['add-new'])){ ?>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$principle_details=$this->db->query("select *from tbl_principle where Pid='".$_GET['action']."'")->result();
		  ?>
		  <div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-8">
		  <div class="panel default-panel">
		  <div class="panel-heading">Update Schools Details</div>
		  <div class="panel-body">
		  <form role="form" method="post"  id="pincodemangement" enctype="multipart/form-data">
          <div class="form-group">
            <label>Principle Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_name" name="Principle_name" onchange="Principle_namer()" maxlength="60" required="required" class="form-control" value="<?php echo $principle_details[0]->Principle_name; ?>">
			<input type="hidden" id="principle_id" name="principle_id" value="<?php echo $principle_details[0]->Pid; ?>" />
            <span id="Principle_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" value="<?php echo $principle_details[0]->Principle_email; ?>" onchange="Principle_emailr()" maxlength="50" required="required" readonly="true" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Password <b style="color:red;">*</b></label>
            <input type="passwor" id="Principle_password" name="Principle_password" value="<?php echo $principle_details[0]->Principle_password; ?>" onchange="Principle_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_passwordr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Principle_mobile_no" value="<?php echo $principle_details[0]->Principle_mobile_no; ?>" name="Principle_mobile_no" onchange="Principle_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Alternate Mobile Numbers </label>
            <input type="text" id="aternative_phone" value="<?php echo $principle_details[0]->aternative_phone; ?>" name="aternative_phone"  maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>LnadLine Phone Number </label>
            <input type="text" id="land_line_number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" 
			autocomplete="off" value="<?php echo $principle_details[0]->land_line_number; ?>" name="land_line_number"  maxlength="50" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
       
          <div class="form-group">
            <label>Schools Name <b style="color:red;">*</b></label>
            <textarea type="text" id="Principle_school_name"  name="Principle_school_name" onchange="Principle_school_namer()" maxlength="300" required="required" class="form-control" style="resize:none;"><?php echo $principle_details[0]->Principle_school_name; ?></textarea>
            <span id="Principle_school_namer" style="color:red;"></span> </d iv>
			<div class="form-group">
            <label>Schools Address <b style="color:red;">*</b></label>
            <textarea type="text" id="address" value="" name="address" onchange="addressr()" maxlength="300" required="required" class="form-control"><?php echo $principle_details[0]->address; ?></textarea>
            <span id="addressr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Schools City Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_schools_city" value="<?php echo $principle_details[0]->Principle_schools_city; ?>" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="50" required="required" class="form-control">
			<input type="hidden" name="defaultimage" value="<?php echo $principle_details[0]->Principle_schools_image; ?>" />
            <span id="Principle_schools_cityr" style="color:red;"></span> </div>
			<div class="form-group">
			<div id="tempprofileimage">
			<?php if(!empty($principle_details[0]->Principle_schools_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/profile/<?php echo $principle_details[0]->Principle_schools_image; ?>" style="height:150px;width:150px;" />
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
		  </div>
		  </div>
		  </div>
		  <div class="col-md-2"></div>
		  
		  </div>
		<!-- /.row -->
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
                          <th>Email ID</th>
						   <th>Mobile No</th>
						  <th>College Name</th>
                          <th>status</th>
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
						<td><?php echo $row->Principle_name; ?></td>
						<td><?php echo $row->Principle_email; ?></td>
						<td><?php echo $row->Principle_mobile_no; ?></td>
				        <td><?php echo $row->Principle_school_name; ?></td>
						<td><?php if($row->Status=='active') { ?>  
						<a href="#" onclick="return inactivestatus(<?php echo $row->Pid; ?>)" class="btn btn-success" title="Change Status" ><?php echo $row->Status; ?></a></td>
						<?php }else{ ?>
						<a href="#" onclick="return activeusersstatus(<?php echo $row->Pid; ?>)" class="btn btn-danger" title="Change Status" ><?php echo $row->Status; ?></a></td>
						<?php } ?>
                       <td>
					   <a href="<?php echo site_url(); ?>admin-principle?action=<?php echo $row->Pid; ?>"  class="btn btn-primary" title="Edit" ><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
						  <a href="#" onclick="return deletepincodes(<?php echo $row->Pid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
				<?php if(isset($_GET['searchkeyowords'])){ echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords']); } else{  echo userspaging($setLimit,$page);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
	</div>
	<?php //include('footer.php');
	
	function userspaging($per_page,$page){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_principle where data_operators='principal' order by Pid desc")->result();
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_principle  where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_mobile_no LIKE '%".$searchid."%') and  data_operators='principal' order by Pid desc")->result();
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
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_principle",
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
window.location='admin-principle?searchkeyowords='+search_id2;
return false;
}
</script>


