
<div class="container main">			
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		
		
<?php if(!isset($_SESSION['PRINCIPLE_ID'])){ ?>	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	      <?php if(isset($_SESSION['ErrorsMsg'])) { ?><div class="alert alert-danger"><?php echo $_SESSION['ErrorsMsg']; unset($_SESSION['ErrorsMsg']); ?></div><?php } ?>
		 <div class="panel panel-primary">
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Parent Login</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
          
          <div class="form-group">
				<label class="control-label" for="name">Aadhar Card Number <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" onchange="Principle_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
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

function Principle_emailr(){if($('#Principle_email').val()==''){}else{ $('#Principle_emailr').html(' '); }}
function principle_registrations(){
		var mobilenovalidation=/^\d{12}$/;
			var  Principle_email=document.getElementById('Principle_email').value.trim();
          if(Principle_email==''){
			$("#Principle_emailr").html('Please enter adhar card number');
			$("#Principle_email").focus();
			return false;
			}
			if(!(Principle_email.match(mobilenovalidation))) {
			$("#Principle_emailr").html("Please enter valid adhar card number");	
			$("#Principle_email").focus();
			return false;
			}
			
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/parent_login_process",
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
				        window.location="parent-login";
						}
					
				}
			});
			return false;  
		});
				
	}
</script>


