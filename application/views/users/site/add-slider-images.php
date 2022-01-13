<?php
if(isset($_SESSION['PRINCIPLE_ID'])){
 $query1=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
		$login_id=$query1->login_id;
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *from tbl_main_slider  where (slider_Heading LIKE '%".$searchid."%' OR slider_small_heading LIKE '%".$searchid."%') and slider_type='schools' and pid='$login_id'")->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from tbl_main_slider where slider_type='schools' and pid='$login_id'")->result();
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
		
<div class="container main">			
		<div class="row">
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slider</h1>
				<?php if(isset($_SESSION['ERROMESSAGE'])){ ?>
				<div class="alert bg-danger" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['ERROMESSAGE']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['ERROMESSAGE']); } ?>
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['add-new'])){ ?>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">Add New Slider</div>
		<div class="panel-body">
		<form method="post" action="<?php echo site_url(); ?>users_controller/principle_update_profiles1" enctype="multipart/form-data">
		 <div class="form-group">
		 <label>Slider Heading</label>
		 <input type="text" class="form-control" name="slider_Heading" id="slider_Heading" maxlength="40" />
		 </div>
		 <div class="form-group">
		 <label>Slider Slogan</label>
		 <textarea type="text" class="form-control"  name="slider_small_heading" maxlength="100" id="slider_small_heading"></textarea>
		 </div>
		 <div class="form-group">
		 <label>Slider Image</label>
		 <div id="tempprofileimage"></div>
		  <input type="file" name="Principle_schools_image" id="Principle_schools_image" required onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
		 </div>
		 <div class="form-group">
		 <input type="submit" name="sub" value="Submit" class="btn btn-danger" />
		 </div>
		 </form>
		</div>
		</div>
		</div>
		<div class="col-md-2"></div>
		</div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		//$query=mysql_query("select  *from pincode_master where pmid='".$_GET['pincodeid']."'"); $pin=mysql_fetch_array($query);
		$principle_details=$this->db->query("select *from tbl_main_slider where mid='".$_GET['action']."'")->result(); 
		  ?>
		  <div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="panel panel-primary">
		<div class="panel-heading">Update Slider</div>
		<div class="panel-body">
		<form method="post" action="<?php echo site_url(); ?>users_controller/update_banner_images" enctype="multipart/form-data">
		 <div class="form-group">
		 <label>Slider Heading</label>
		 <input type="text" class="form-control"  name="slider_Heading" value="<?php echo $principle_details[0]->slider_Heading; ?>" id="slider_Heading" />
		 <input type="hidden" name="mid" id="mid" value="<?php echo $principle_details[0]->mid; ?>" />
		 </div>
		 <div class="form-group">
		 <label>Slider Slogan</label>
		 <textarea rows="4" type="text" class="form-control"  name="slider_small_heading" id="slider_small_heading" value=""><?php echo $principle_details[0]->slider_small_heading; ?></textarea><input type="hidden" name="defaultimage" value="<?php echo $principle_details[0]->slider_banner_images; ?>" />
		 </div>
		 <div class="form-group">
			<div id="tempprofileimage">
			<?php if(!empty($principle_details[0]->slider_banner_images)){ ?>
	   <img src="<?php echo base_url() ?>assets/slider/<?php echo $principle_details[0]->slider_banner_images; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
		 <div class="form-group">
		 <input type="submit" name="sub" value="Submit" class="btn btn-danger" />
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
		<a href="<?php echo site_url(); ?>schools_slider?add-new=add-new" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
		<br />
<br />
		</div>
<div class="col-md-6">
<div class="form-group pull-right">
<?php /*?><form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result()" />
</form><?php */?>
</div>
</div>		
		</div>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Slider Heading</th>
                          <th>Slider Slogan</th>
						   <th>Slider Image</th>
					
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
						<td><?php echo $row->slider_Heading; ?></td>
						<td><?php echo $row->slider_small_heading; ?></td>
						<td><img src="<?php echo base_url(); ?>assets/slider/<?php echo $row->slider_banner_images; ?>" style="height:60px; width:200px;" /></td>
				     
						<td><?php if($row->status=='active') { ?>  
						<a href="#" onclick="return inactivestatus(<?php echo $row->mid; ?>)" class="btn btn-success" title="Change Status" ><?php echo $row->status; ?></a></td>
						<?php }else{ ?>
						<a href="#" onclick="return activeusersstatus(<?php echo $row->mid; ?>)" class="btn btn-danger" title="Change Status" ><?php echo $row->status; ?></a></td>
						<?php } ?>
                       <td>
						  <a href="#" onclick="return deletepincodes(<?php echo $row->mid; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a>
						&nbsp;&nbsp; <a href="<?php echo site_url(); ?>schools_slider?action=<?php echo $row->mid; ?>"  class="btn btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>  
						  </td>
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
		<br /><br /><br />
		<br><br>
	</div>
	<?php //include('footer.php');
	 ?>
	<script>
	function deletepincodes(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_sliders",
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
	url: "<?php echo site_url(); ?>supper_admin_controller/slider_status_inactive",
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
	url: "<?php echo site_url(); ?>supper_admin_controller/slider_status_active",
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


<?php }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>