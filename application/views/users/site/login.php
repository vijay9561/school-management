
<div class="container main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>deshboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Principle Login</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		
		
	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Principle Registration</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
          <div class="form-group">
            <label>Principle Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_name" name="Principle_name" onchange="Principle_namer()" maxlength="50" required="required" class="form-control">
            <span id="Principle_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" onchange="Principle_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Principle Mobile Number <b style="color:red;">*</b></label>
            <input type="text" id="Principle_mobile_no" name="Principle_mobile_no" onchange="Principle_mobile_nor()" maxlength="50" required="required" class="form-control">
            <span id="Principle_mobile_nor" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Password <b style="color:red;">*</b></label>
            <input type="password" id="Principle_password" name="Principle_password" onchange="Principle_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_passwordr" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Principle Schools Name <b style="color:red;">*</b></label>
            <textarea type="text" id="Principle_school_name" name="Principle_school_name" onchange="Principle_school_namer()" maxlength="200" required="required" class="form-control" style="resize:none;"></textarea>
            <span id="Principle_school_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label>Schools City Name <b style="color:red;">*</b></label>
            <input type="text" id="Principle_schools_city" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_schools_cityr" style="color:red;"></span> </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return principle_registrations();" value="Submit">
          </div>
        </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<br><br>
	</div>
<script>
function Principle_namer(){if($('#Principle_name').val()==''){}else{ $('#Principle_namer').html(' '); }}
function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function Principle_mobile_nor(){if($('#Principle_mobile_no').val()==''){}else{ $('#Principle_mobile_nor').html(' '); }}
function Principle_passwordr(){if($('#Principle_password').val()==''){}else{ $('#Principle_passwordr').html(' '); }}
function Principle_school_namer(){if($('#Principle_school_name').val()==''){}else{ $('#Principle_school_namer').html(' '); }}
function Principle_schools_cityr(){if($('#Principle_schools_city').val()==''){}else{ $('#Principle_schools_cityr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var   	Principle_name=document.getElementById('Principle_name').value.trim();
			var  Principle_email=document.getElementById('Principle_email').value.trim();
			var  Principle_mobile_no=document.getElementById('Principle_mobile_no').value.trim();
			var  Principle_password=document.getElementById('Principle_password').value.trim();
			var  Principle_school_name=document.getElementById('Principle_school_name').value.trim();
			var  Principle_schools_city=document.getElementById('Principle_schools_city').value.trim();
      
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
			if(Principle_password==''){
			$("#Principle_passwordr").html('Please enter password');
			$("#Principle_password").focus();
			return false;
			}
			if(Principle_school_name==''){
			$("#Principle_school_namer").html('Please enter schools name');
			$("#Principle_school_name").focus();
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


