
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>deshboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Schools Registration</li>
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
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Schools Registration</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
		
		<div class="form-group">
            <label>Schools Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_school_name" name="Principle_school_name" onchange="Principle_school_namer()" maxlength="200" required="required" class="form-control" style="resize:none;">
            <span id="Principle_school_namer" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>U.Dise Code  <b style="color:red;">*</b></label>
            <input type="text" id="reg_no" name="reg_no" onchange="reg_nor()" maxlength="200" required="required" class="form-control" style="resize:none;">
            <span id="reg_nor" style="color:red;"></span> </div>
			<div class="form-group">
			<?php $earliest_year = 1920; ?>
            <label>Establishment Year <b style="color:red;">*</b></label>
        <select type="text" id="establish_year" name="establish_year" onchange="establish_yearr()" maxlength="200" required="required" class="form-control" style="resize:none;">
		<option value="">Select Year</option>
		<?php foreach (range(date('Y'), $earliest_year) as $x) { ?>
		<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
		<?php } ?>
		</select>
            <span id="establish_yearr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Schools Address<b style="color:red;">*</b></label>
            <input type="text" id="Principle_schools_city" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_schools_cityr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Principal Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_name" name="Principle_name" onchange="Principle_namer()" maxlength="50" required="required" class="form-control">
            <span id="Principle_namer" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Gender <b style="color:red;">*</b></label>
            <select type="text" id="gender" name="gender" onchange="genderr()" maxlength="50" required="required" class="form-control">
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select>
            <span id="genderr" style="color:red;"></span> </div>
			
			<div class="form-group">
            <label>Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Principle_mobile_no" name="Principle_mobile_no" onchange="Principle_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" onchange="Principle_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
          
          <div class="form-group">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="Principle_password" name="Principle_password" onchange="Principle_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_passwordr" style="color:red;"></span> </div>
          
          
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
          </div>
        </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<br><br>
		<br /><br /><br />
		<br><br>
	</div>
<script>
function Principle_namer(){if($('#Principle_name').val()==''){}else{ $('#Principle_namer').html(' '); }}
function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function Principle_mobile_nor(){if($('#Principle_mobile_no').val()==''){}else{ $('#Principle_mobile_nor').html(' '); }}
function Principle_passwordr(){if($('#Principle_password').val()==''){}else{ $('#Principle_passwordr').html(' '); }}
function Principle_school_namer(){if($('#Principle_school_name').val()==''){}else{ $('#Principle_school_namer').html(' '); }}
function Principle_schools_cityr(){if($('#Principle_schools_city').val()==''){}else{ $('#Principle_schools_cityr').html(' '); }}
function genderr(){if($('#gender').val()==''){}else{ $('#genderr').html(' '); }}
function genderr(){if($('#reg_no').val()==''){}else{ $('#reg_nor').html(' '); }}
function establish_yearr(){if($('#establish_year').val()==''){}else{ $('#establish_yearr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  Principle_name=document.getElementById('Principle_name').value.trim();
			var  Principle_email=document.getElementById('Principle_email').value.trim();
			var  Principle_mobile_no=document.getElementById('Principle_mobile_no').value.trim();
			var  Principle_password=document.getElementById('Principle_password').value.trim();
			var  Principle_school_name=document.getElementById('Principle_school_name').value.trim();
			var  Principle_schools_city=document.getElementById('Principle_schools_city').value.trim();
			var  gender=document.getElementById('gender').value.trim();
			var  reg_no=document.getElementById('reg_no').value.trim();
			var  establish_year=document.getElementById('establish_year').value.trim();
           if(Principle_school_name==''){
			$("#Principle_school_namer").html('Please enter schools name');
			$("#Principle_school_name").focus();
			return false;
			}
			 if(reg_no==''){
			$("#reg_nor").html('Please enter schools reg no');
			$("#reg_no").focus();
			return false;
			}
			 if(establish_year==''){
			$("#establish_yearr").html('Please select establishment year');
			$("#establish_year").focus();
			return false;
			}
			if(Principle_schools_city==''){
			$("#Principle_schools_cityr").html('Please enter schools address');
			$("#Principle_schools_city").focus();
			return false;
			}
			
			if(Principle_name==''){
			$("#Principle_namer").html('Please enter name');
			$("#Principle_name").focus();
			return false;
			}
			if(gender==''){
			$("#genderr").html('Please select gender');
			$("#gender").focus();
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
			
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/registration_process",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='principle-registration';
						return false;
						}else {
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html(Principle_email+'&nbsp; This email address already register');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
					}
					
				}
			});
			return false;  
		});
				
	}
</script>


