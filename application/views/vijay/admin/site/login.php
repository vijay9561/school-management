<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Panel Login</title>

<link href="<?php echo base_url(); ?>adminassets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminassets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>adminassets/css/styles.css" rel="stylesheet">
</head>
<body>
	
	<div class="row">
	
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" align="center">Admin Log In</div>
				<div class="panel-body">
				<?php if($this->session->userdata('ErrorsMsg')) { ?>
	          <div class="alert bg-danger" role="alert" style="padding-top: 0px;">
				<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> 
				<?php echo $this->session->userdata('ErrorsMsg'); ?>
				</div>
	           <?php $this->session->unset_userdata('ErrorsMsg'); } ?>
					<form role="form" method="post" id="loginform">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" id="email" type="email" onChange="emailr();" autofocus="">
								<span style="color:red;" id="emailr"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" id="password" onChange="passwordr();" type="password" value="">
								<span style="color:red;" id="passwordr"></span>
								<span style="color:red;" id="emailr"></span>
							</div>
							<input type="submit" onClick="return loginusers();"class="btn btn-primary" value="Login"></a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="<?php echo base_url(); ?>adminassets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>adminassets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>adminassets/js/bootstrap-datepicker.js"></script>
	
	<script>
	
function passwordr(){if($('#password').val()==''){}else{ $('#passwordr').html(' '); }}
  function emailr(){if($('#email').val()==''){}else{ $('#emailr').html(' '); }}
  
  function loginusers(){
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		
		var email=document.getElementById('email').value.trim();
		var password=document.getElementById('password').value.trim();
		
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
		 $("#loginform").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>supper_admin_controller/admin_login",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='deshboard';
						return false;
						}else {
				  	window.location='loginadmin';
						   return false;
					}
					
				}
			});
			return false;  
		});
			
	}
	</script>
</body>

</html>
