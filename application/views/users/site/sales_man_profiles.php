<?php if(isset($_SESSION['SALES_ID'])) { ?>
<div class="container main">			
		<div class="row">
			<div class="col-lg-12">
				
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
	<?php $techers=$this->db->query("select *from tbl_sales_users where id='".$_SESSION['SALES_ID']."'")->result(); ?>
		</div>
		<div class="col-md-9 col-xs-9">
		<table class="table table-bordered">
		<tr><th>Name:&nbsp;</th><td><?php echo $techers[0]->name; ?></td><th>Mobile No</th><td><?php echo $techers[0]->mobile_no; ?></td></tr>
		<tr><th>Email ID:&nbsp;</th><td><?php echo $techers[0]->email; ?></td><th>Register Date</th><td><?php echo date('m-d-Y',strtotime($techers[0]->created_date)); ?></td></tr>
		<tr><th>Aadhar No:&nbsp;</th><td><?php echo $techers[0]->aadhar_card; ?></td><th>Pan No</th><td><?php echo $techers[0]->pan_no; ?></td></tr>
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
		<input type="hidden" name="id" id="id" value="<?php echo $techers[0]->id; ?>" />
          <div class="row">
			<div class="form-group col-md-6">
            <label>Salesman Name <b style="color:red;">*</b></label>
            <input type="text" id="name"  name="name" value="<?php echo $techers[0]->name; ?>" onchange="namer()" maxlength="300" required="required" class="form-control">
            <span id="namer" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="mobile_no" name="mobile_no" value="<?php echo $techers[0]->mobile_no; ?>" onchange="mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="mobile_nor" style="color:red;"></span> </div>
			</div>
			<div class="row">
			<div class="form-group col-md-6">
            <label>Email <b style="color:red;">*</b></label>
            <input type="email" id="email" name="email" value="<?php echo $techers[0]->email; ?>" onchange="emailr()" maxlength="50" required="required"  class="form-control">
            <span id="emailr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="password" name="password" value="<?php echo $techers[0]->password; ?>" onchange="passwordr()" maxlength="50" required="required"  class="form-control">
            <span id="passwordr" style="color:red;"></span> </div>
          	</div>
			
			<div class="row">
			<div class="form-group col-md-6">
            <label>Aadhar Card <b style="color:red;">*</b></label>
            <input type="text" id="aadhar_card" name="aadhar_card" value="<?php echo $techers[0]->aadhar_card; ?>" onchange="aadhar_cardr()" maxlength="50" required="required"  class="form-control">
            <span id="aadhar_cardr" style="color:red;"></span> </div>
			<div class="form-group col-md-6">
            <label>Pan Card <b style="color:red;">*</b></label>
            <input type="text" id="pan_no" name="pan_no" onchange="pan_nor()" value="<?php echo $techers[0]->pan_no; ?>" maxlength="50" required="required"  class="form-control">
            <span id="pan_nor" style="color:red;"></span> </div>
          	</div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return uadd_sales_man_information();" value="Submit">&nbsp;&nbsp;&nbsp;
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
function namer(){if($('#name').val()==''){}else{ $('#namer').html(' '); }}
function emailr(){if($('#email').val()==''){}else{ $('#emailr').html(' '); }}
function passwordr(){if($('#password').val()==''){}else{ $('#passwordr').html(' '); }}
function aadhar_cardr(){if($('#aadhar_card').val()==''){}else{ $('#aadhar_cardr').html(' '); }}
function mobile_nor(){if($('#mobile_no').val()==''){}else{ $('#mobile_nor').html(' '); }}
function pan_nor(){if($('#pan_no').val()==''){}else{ $('#pan_nor').html(' '); }}

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
		   $("#pincodemangement").unbind('submit').bind('submit',function() {
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
					  window.location='salesman-profiles';
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


