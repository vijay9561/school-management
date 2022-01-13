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
$mysqluery=$this->db->query("select *from tbl_sales_users  where (name LIKE '%".$searchid."%' OR email LIKE '%".$searchid."%' OR mobile_no LIKE '%".$searchid."%' OR aadhar_card LIKE '%".$searchid."%')  order by id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from tbl_sales_users  order by id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}
		 ?>
		 <script>	
		 function Principle_schools_imager1(){
			var lblError = document.getElementById("Principle_schools_imager1");
			     myfile= $('#Principle_schools_image1').val();
				   var ext = myfile.split('.').pop();
 if(ext=="png" || ext=="PNG" || ext=="jpg" || ext=="jpeg" || ext=="JPEG" || ext=="JPG" || ext=="gif" ||  ext=="BMP" ||  ext=="bmp"  ||  ext=="PPM" ||  ext=="ppm" ||  ext=="PGM" ||  ext=="Exif" ||  ext=="PNM" ||  ext=="PBM" || ext=="JFIF"){
      // alert('Valid');
	    lblError.innerHTML='';
   } else{
         lblError.innerHTML = "Please upload files having extensions: <b> only png,jpg,jpeg,gif</b> only.";
			document.getElementById('Principle_schools_image1').value='';
			return false;
   }
    var fileUpload = document.getElementById("Principle_schools_image1");
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("tempprofileimage1");
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
								$('#Principle_schools_image1').val('');
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
         
			}
	
function namer(){if($('#name').val()==''){}else{ $('#namer').html(' '); }}
function emailr(){if($('#email').val()==''){}else{ $('#emailr').html(' '); }}
function passwordr(){if($('#password').val()==''){}else{ $('#passwordr').html(' '); }}
function aadhar_cardr(){if($('#aadhar_card').val()==''){}else{ $('#aadhar_cardr').html(' '); }}
function mobile_nor(){if($('#mobile_no').val()==''){}else{ $('#mobile_nor').html(' '); }}
function pan_nor(){if($('#pan_no').val()==''){}else{ $('#pan_nor').html(' '); }}
function acount_numberr(){if($('#acount_number').val()==''){}else{ $('#acount_numberr').html(' '); }}
function ifsc_coder(){if($('#ifsc_code').val()==''){}else{ $('#ifsc_coder').html(' '); }}
function bank_namer(){if($('#bank_name').val()==''){}else{ $('#bank_namer').html(' '); }}

function add_sales_man_information(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var adharcartvalidation=/^\d{12}$/;
	        var  name=document.getElementById('name').value.trim();
			var  mobile_no=document.getElementById('mobile_no').value.trim();
			var  email=document.getElementById('email').value.trim();
			var  password=document.getElementById('password').value.trim();
			var  aadhar_card=document.getElementById('aadhar_card').value.trim();
			var  pan_no=document.getElementById('pan_no').value.trim();
			var  acount_number=document.getElementById('acount_number').value.trim();
			var  ifsc_code=document.getElementById('ifsc_code').value.trim();
			var  bank_name=document.getElementById('bank_name').value.trim();
			var myfile= $('#Principle_schools_image1').val();
		   if(name==''){
			$("#namer").html('Please enter salesman name');
			$("#name").focus();
			return false;
			}
			if(mobile_no==''){
			$("#mobile_nor").html('Please enter contact number');
			$("#mobile_no").focus();
			return false;
			}
			if (!(mobile_no.match(mobilenovalidation))) {
			$("#mobile_nor").html("Please enter valid contact number");	
			$("#mobile_no").focus();
			return false;
			}	
			if(email==''){
			$("#emailr").html('Please enter email address');
			$("#email").focus();
			return false;
			}
			var email1 = email.toLowerCase();
			if (emailpattern.test(email1) == false){
			$("#emailr").html("Please enter valid email address");
			$("#email").focus();       
			return false;
			}
			if(password==''){
			$("#passwordr").html('Please enter password');
			$("#password").focus();
			return false;
			}
			 if(aadhar_card==''){
			$("#aadhar_cardr").html('Please enter adhar card number');
			$("#aadhar_card").focus();
			return false;
			}
		    if (!(aadhar_card.match(adharcartvalidation))) {
			$("#aadhar_cardr").html("Please enter valid adhar card number");	
			$("#aadhar_card").focus();
			return false;
			}
			if(pan_no==''){
			$("#pan_nor").html('Please enter pan card number');
			$("#pan_no").focus();
			return false;
			}
			if(acount_number==''){
			$("#acount_numberr").html('Please enter account number');
			$("#acount_number").focus();
			return false;
			}
			if(ifsc_code==''){
			$("#ifsc_coder").html('Please enter ifsc code');
			$("#ifsc_code").focus();
			return false;
			}
			if(bank_name==''){
			$("#bank_namer").html('Please enter bank name');
			$("#bank_name").focus();
			return false;
			}
			if(myfile==''){	
			$("#Principle_schools_imager1").html('Please enter bank name');
			$("#Principle_schools_image1").focus();
			return false;
			}
		   $("#addsales_man").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>supper_admin_controller/add_salesman_information",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='salesman_users';
						return false;
						}else {
				       $("#emailr").html('This Email already registered'); 
				       return false;
					  $("#email").focus();
					}
				 }
			 });
		   return false;  
		});			
	}
	
	function uadd_sales_man_information(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		var adharcartvalidation=/^\d{12}$/;
	        var  name=document.getElementById('name').value.trim();
			var  mobile_no=document.getElementById('mobile_no').value.trim();
			var  email=document.getElementById('email').value.trim();
			var  password=document.getElementById('password').value.trim();
			var  aadhar_card=document.getElementById('aadhar_card').value.trim();
			var  pan_no=document.getElementById('pan_no').value.trim();
			var  acount_number=document.getElementById('acount_number').value.trim();
			var  ifsc_code=document.getElementById('ifsc_code').value.trim();
			var  bank_name=document.getElementById('bank_name').value.trim();
			
		   if(name==''){
			$("#namer").html('Please enter salesman name');
			$("#name").focus();
			return false;
			}
			if(mobile_no==''){
			$("#mobile_nor").html('Please enter contact number');
			$("#mobile_no").focus();
			return false;
			}
			if (!(mobile_no.match(mobilenovalidation))) {
			$("#mobile_nor").html("Please enter valid contact number");	
			$("#mobile_no").focus();
			return false;
			}	
			if(email==''){
			$("#emailr").html('Please enter email address');
			$("#email").focus();
			return false;
			}
			var email1 = email.toLowerCase();
			if (emailpattern.test(email1) == false){
			$("#emailr").html("Please enter valid email address");
			$("#email").focus();       
			return false;
			}
			if(password==''){
			$("#passwordr").html('Please enter password');
			$("#password").focus();
			return false;
			}
			 if(aadhar_card==''){
			$("#aadhar_cardr").html('Please enter adhar card number');
			$("#aadhar_card").focus();
			return false;
			}
		    if (!(aadhar_card.match(adharcartvalidation))) {
			$("#aadhar_cardr").html("Please enter valid adhar card number");	
			$("#aadhar_card").focus();
			return false;
			}
			if(pan_no==''){
			$("#pan_nor").html('Please enter pan card number');
			$("#pan_no").focus();
			return false;
			}
			if(acount_number==''){
			$("#acount_numberr").html('Please enter account number');
			$("#acount_number").focus();
			return false;
			}
			if(ifsc_code==''){
			$("#ifsc_coder").html('Please enter ifsc code');
			$("#ifsc_code").focus();
			return false;
			}
			if(bank_name==''){
			$("#bank_namer").html('Please enter bank name');
			$("#bank_name").focus();
			return false;
			}
		   $("#uaddsales_man").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>supper_admin_controller/update_salesman_information",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='salesman_users';
						return false;
						}else {
				       $("#emailr").html('This Email already registered'); 
				       return false;
					  $("#email").focus();
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
				<li class="active">Salesman Users</li>
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
				
		<?php if(isset($_GET['add-new'])){ ?>
		
		<div class="row">
		  <div class="col-md-1"></div>
		  <div class="col-md-10">
		  <div class="panel default-panel">
		  <div class="panel-heading">Add Salesman Details</div>
		  <div class="panel-body">
		  <form role="form" method="post"  id="addsales_man" enctype="multipart/form-data">
		  <div class="row">
			<div class="form-group col-md-6">
            <label>Salesman Name <b style="color:red;">*</b></label>
            <input type="text" id="name"  name="name" onchange="namer()" maxlength="300" required="required" class="form-control">
            <span id="namer" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="mobile_no" name="mobile_no" onchange="mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="mobile_nor" style="color:red;"></span> </div>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
            <label>Email <b style="color:red;">*</b></label>
            <input type="email" id="email" name="email" onchange="emailr()" maxlength="50" required="required"  class="form-control">
            <span id="emailr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="password" name="password" onchange="passwordr()" maxlength="50" required="required"  class="form-control">
            <span id="passwordr" style="color:red;"></span> </div>
          	</div>
			
			<div class="row">
			<div class="form-group col-md-6">
            <label>Aadhar Card <b style="color:red;">*</b></label>
            <input type="text" id="aadhar_card" name="aadhar_card" onchange="aadhar_cardr()" maxlength="50" required="required"  class="form-control">
            <span id="aadhar_cardr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Pan Card <b style="color:red;">*</b></label>
            <input type="text" id="pan_no" name="pan_no" onchange="pan_nor()" maxlength="50" required="required"  class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>
          	</div>
            
            <div class="row">
			<div class="form-group col-md-6">
            <label>Account Number<b style="color:red;">*</b></label>
            <input type="text" id="acount_number" name="acount_number" onchange="acount_numberr()" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" maxlength="20" required="required"  class="form-control">
            <span id="acount_numberr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>IFSC Code <b style="color:red;">*</b></label>
            <input type="text" id="ifsc_code" name="ifsc_code" onchange="ifsc_coder()" maxlength="30" required="required"  class="form-control">
            <span id="ifsc_coder" style="color:red;"></span> </div>
          	</div>
            <div class="row">
            <div class="form-group col-md-6">
            <label>Bank Name <b style="color:red;">*</b></label>
            <input type="text" id="bank_name" name="bank_name" onchange="bank_namer()" maxlength="90" required="required"  class="form-control">
            <span id="bank_namer" style="color:red;"></span> </div>
           
            <div class="form-group  col-md-6">
			<label>Signature <b style="color:red;">*</b></label>
			<div id="tempprofileimage1">		
	   <img  src="<?php echo base_url(); ?>assets/images/signature.png" style="height:150px; width:150px;" />
	   </div>
	   <input type="file" name="signature" id="Principle_schools_image1" onchange="Principle_schools_imager1()" />
	   <input type="hidden" name="signature1" value="<?php echo $principle_details[0]->signature; ?>" />
	   <span id="Principle_schools_imager1" style="color:red;"></span>
			</div>
             </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return add_sales_man_information();" value="Submit">
          </div>
        </form>
		  </div>
		  </div>
		  </div>
		  <div class="col-md-1"></div>
		  
		  </div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$sales=$this->db->query("select *from tbl_sales_users where id='".$_GET['action']."'")->row();
		  ?>
		  
		  <div class="row">
		  <div class="col-md-1"></div>
		  <div class="col-md-10">
		  <div class="panel default-panel">
		  <div class="panel-heading">Update Salesman Details</div>
		  <div class="panel-body">
		  <form role="form" method="post"  id="uaddsales_man" enctype="multipart/form-data">
		  <input type="hidden" name="id" value="<?php echo $_GET['action']; ?>" id="id" />
		  <div class="row">
			<div class="form-group col-md-6">
            <label>Salesman Name <b style="color:red;">*</b></label>
            <input type="text" id="name"  name="name" value="<?php echo $sales->name; ?>" onchange="namer()" maxlength="300" required="required" class="form-control">
            <span id="namer" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="mobile_no" name="mobile_no" value="<?php echo $sales->mobile_no; ?>" onchange="mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="mobile_nor" style="color:red;"></span> </div>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
            <label>Email <b style="color:red;">*</b></label>
            <input type="email" id="email" name="email" value="<?php echo $sales->email; ?>" onchange="emailr()" maxlength="50" required="required"  class="form-control">
            <span id="emailr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="password" name="password" value="<?php echo $sales->password; ?>" onchange="passwordr()" maxlength="50" required="required"  class="form-control">
            <span id="passwordr" style="color:red;"></span> </div>
          	</div>
			
			<div class="row">
			<div class="form-group col-md-6">
            <label>Aadhar Card <b style="color:red;">*</b></label>
            <input type="text" id="aadhar_card" name="aadhar_card" value="<?php echo $sales->aadhar_card; ?>" onchange="aadhar_cardr()" maxlength="50" required="required"  class="form-control">
            <span id="aadhar_cardr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Pan Card <b style="color:red;">*</b></label>
            <input type="text" id="pan_no" name="pan_no" onchange="pan_nor()" value="<?php echo $sales->pan_no; ?>" maxlength="50" required="required"  class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>
          	</div>
                        <div class="row">
			<div class="form-group col-md-6">
            <label>Account Number<b style="color:red;">*</b></label>
            <input type="text" id="acount_number" name="acount_number" value="<?php echo $sales->acount_number; ?>" onchange="acount_numberr()" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" maxlength="20" required="required"  class="form-control">
            <span id="acount_numberr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>IFSC Code <b style="color:red;">*</b></label>
            <input type="text" id="ifsc_code" name="ifsc_code" value="<?php echo $sales->ifsc_code; ?>" onchange="ifsc_coder()" maxlength="30" required="required"  class="form-control">
            <span id="ifsc_coder" style="color:red;"></span> </div>
          	</div>
            <div class="row">
            <div class="form-group col-md-6">
            <label>Bank Name <b style="color:red;">*</b></label>
            <input type="text" id="bank_name" name="bank_name" value="<?php echo $sales->bank_name; ?>" onchange="bank_namer()" maxlength="90" required="required"  class="form-control">
            <span id="bank_namer" style="color:red;"></span> </div>
            <div class="form-group  col-md-6">
			<label>Signature </label>
			<div id="tempprofileimage1">
			<?php if(!empty($sales->signature)){ ?>
	   <img src="<?php echo base_url() ?>assets/signature/<?php echo $sales->signature; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/signature.png" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>  
	   <input type="file" name="signature" id="Principle_schools_image1" onchange="Principle_schools_imager1()" />
	   <input type="hidden" name="signature1" value="<?php echo $sales->signature; ?>" />
	   <span id="Principle_schools_imager1" style="color:red;"></span>
        </div>
	</div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return uadd_sales_man_information();" value="Submit">
          </div>
        </form>
		  </div>
		  </div>
		  </div>
		  <div class="col-md-1"></div>
		  </div>
		<!-- /.row -->
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<a href="<?php echo site_url(); ?>salesman_users?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>
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
                          <th>Salesman Name</th>
                          <th>Email ID</th>
						   <th>Password</th>
						  <th>Mob No</th>
                          <th>Pan NO</th>
                          <th>Aadhar No</th>
                          <th>Account No</th>
                          <th>IFSC Code</th>
                          <th>Bank Name</th>
						  <th>Created Date</th>
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
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->password; ?></td>
				        <td><?php echo $row->mobile_no; ?></td>
						<td><?php echo $row->pan_no; ?></td>
						<td><?php echo $row->aadhar_card; ?></td>
                        <td><?php echo $row->acount_number; ?></td>
                        <td><?php echo $row->ifsc_code; ?></td>
                        <td><?php echo $row->bank_name; ?></td>
                       <td><?php echo  date('d-m-Y',strtotime($row->created_date)); ?></td>
					   <td><a href="<?php echo site_url(); ?>salesman_users?action=<?php echo $row->id; ?>"  class="btn btn-primary" title="Edit" ><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
			<a href="#" onclick="return deleletusers(<?php echo $row->id; ?>)" class="btn btn-danger" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a>  
						  </td>
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_sales_users  order by id desc")->result();
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_sales_users  where (name LIKE '%".$searchid."%' OR email LIKE '%".$searchid."%' OR mobile_no LIKE '%".$searchid."%' OR aadhar_card LIKE '%".$searchid."%')  order by id desc")->result();
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
	function deleletusers(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_salesman_users",
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
window.location='salesman_users?searchkeyowords='+search_id2;
return false;
}
</script>


