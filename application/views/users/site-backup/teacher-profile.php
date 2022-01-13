<?php if(isset($_SESSION['TEACHER_ID'])) { ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>deshboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">My Profile</li>
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
			<div class="col-md-1"></div>
		<div class="col-md-10">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">My Profile<span style="float:right"><a  style="cursor:pointer;" target=""  data-toggle="modal" data-target="#principle_update" class="btn btn-danger"><i class="fa fa-pencil"></i></a></span></h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="row">
		<div class="col-md-3 col-xs-3" style="padding-top:15px;">
	<?php $techers=$this->db->query("select *from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); ?>
	   <?php if(!empty($techers[0]->Teacher_profile_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/teacher/<?php echo $techers[0]->Teacher_profile_image; ?>" style="height:150px;width:100%;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:100%;" />
	   <?php } ?>
		</div>
		<div class="col-md-9 col-xs-9">
		<table class="table table-bordered">
		<tr><th>Name:&nbsp;</th><td><?php echo $techers[0]->Teacher_name	; ?></td><th>Gender</th><td><?php echo $techers[0]->gender; ?></td></tr>
		<tr><th>DOB:&nbsp;</th><td><?php echo $techers[0]->dob; ?></td><th>Pan Card</th><td><?php echo $techers[0]->pan_card; ?></td></tr>
		<tr><th>Mobile No:&nbsp;</th><td><?php echo $techers[0]->Teacher_mobile_no; ?></td><th>Email ID</th><td><?php echo $techers[0]->Teacher_email; ?></td></tr>
		<tr><th>Class & Division:&nbsp;</th><td><?php echo $techers[0]->schools_name.'&nbsp;('.$techers[0]->divsion.')'; ?></td><th>Class Year</th><td><?php echo $techers[0]->year; ?></td></tr>
		<tr><th>Monthly Salary</th>&nbsp;<td><?php echo $techers[0]->payment; ?></td><th>Account No</th><td><?php echo $techers[0]->account_no; ?></td></tr>
		<tr><th>IFC Code</th><td><?php echo $techers[0]->ifc_code; ?></td><th>Address</th>&nbsp;<td><?php echo $techers[0]->address; ?></td></tr>
		</table>
		</div>
		</div>
		
		<div id="principle_update" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update  Profile</h4>
              </div>
              <div class="modal-body">
			<form role="form" method="post"  id="pincodemangement">
		<input type="hidden" name="Tid" id="Tid" value="<?php echo $techers[0]->Tid; ?>" />
          <div class="form-group">
            <label>Teacher Name <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_name" name="Teacher_name" value="<?php echo $techers[0]->Teacher_name; ?>" onchange="Teacher_namer()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_email" name="Teacher_email"  value="<?php echo $techers[0]->Teacher_email; ?>" onchange="Teacher_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Teacher_mobile_no" value="<?php echo $techers[0]->Teacher_mobile_no; ?>" name="Teacher_mobile_no" onchange="Teacher_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Teacher_mobile_nor" style="color:red;"></span> </div>
          
          <div class="form-group">
            <label>Class<b style="color:red;">*</b></label>
            <input type="text" id="schools_name" name="schools_name" onchange="schools_namer()" maxlength="200" required="required" class="form-control" style="resize:none;" value="<?php echo $techers[0]->schools_name; ?>" readonly="true" >
            <span id="schools_namer" style="color:red;"></span> </div>
			<div class="form-group">
            <label>Class Division </label>
            <input type="text" maxlength="6" id="divsion" readonly="true" value="<?php echo $techers[0]->divsion; ?>" name="divsion" class="form-control">
			</div>
			<div class="form-group">
			<label>Profile Image</label>
			<input type="hidden" name="defaultimage" value="<?php echo $techers[0]->Teacher_profile_image; ?>" />
			<div id="tempprofileimage">
			<?php if(!empty($techers[0]->Teacher_profile_image)){ ?>
	   <img src="<?php echo base_url() ?>assets/teacher/<?php echo $techers[0]->Teacher_profile_image; ?>" style="height:150px;width:150px;" />
	   <?php }else{ ?>
	   <img  src="<?php echo base_url(); ?>assets/images/nursery-schools-for-kids.jpg" style="height:150px; width:150px;" />
	   <?php } ?>
	   </div>
	   <input type="file" name="Principle_schools_image" id="Principle_schools_image" onchange="Principle_schools_imager()" />
	   <span id="Principle_schools_imager" style="color:red;"></span>
			</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">&nbsp;&nbsp;&nbsp;
          </div>
        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
		
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<br><br><br /><br /><br />
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
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
function Teacher_namer(){if($('#Teacher_name').val()==''){}else{ $('#Teacher_namer').html(' '); }}
function Teacher_emailr(){if($('#Teacher_email').val()==''){}else{ $('#Teacher_emailr').html(' '); }}
function Teacher_passwordr(){if($('#Teacher_password').val()==''){}else{ $('#Teacher_passwordr').html(' '); }}
function schools_namer(){if($('#schools_name').val()==''){}else{ $('#schools_namer').html(' '); }}
function Teacher_mobile_nor(){if($('#Teacher_mobile_no').val()==''){}else{ $('#Teacher_mobile_nor').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var   	Teacher_name=document.getElementById('Teacher_name').value.trim();
			var  Teacher_email=document.getElementById('Teacher_email').value.trim();
			var  schools_name=document.getElementById('schools_name').value.trim();
			var  Teacher_mobile_no=document.getElementById('Teacher_mobile_no').value.trim();
      
			if(Teacher_name==''){
			$("#Teacher_namer").html('Please enter name');
			$("#Teacher_name").focus();
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
			$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/teacher_update_profiles",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='teacher-profile';
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


