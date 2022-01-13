
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teacher Login</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
		<?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
		
		
<?php if(!isset($_SESSION['PRINCIPLE_ID'])){ ?>	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	      <?php if(isset($_SESSION['ErrorsMsg'])) { ?><div class="alert alert-danger"><?php echo $_SESSION['ErrorsMsg']; unset($_SESSION['ErrorsMsg']); ?></div><?php } ?>
		 <div class="panel panel-primary">
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Teacher Login</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
          
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
	</div>
	<?php }else{ ?>
	<script>
	window.location='<?php echo stie_url(); ?>';
	</script>
	<?php  } ?>
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
			var  Principle_email=document.getElementById('Principle_email').value.trim();
		
			var  Principle_password=document.getElementById('Principle_password').value.trim();

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
				url: "<?php site_url(); ?>users_controller/teacher_login_process",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='<?php echo site_url(); ?>';
						return false;
						}else {
				        window.location="teacher-login";
						}
					
				}
			});
			return false;  
		});
				
	}
</script>


