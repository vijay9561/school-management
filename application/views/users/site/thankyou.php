<style>
    h4{font-weight: bold;}
</style>
<div class="container main">			
		
    
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<script>
	
		</script>
<?php if(isset($_GET['payment_id'])){ ?>	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
                    <br><br><br><br>
	      <?php if(isset($_SESSION['ErrorsMsg'])) { ?><div class="alert alert-danger"><?php echo $_SESSION['ErrorsMsg']; unset($_SESSION['ErrorsMsg']); ?></div><?php } ?>
              <div class="panel panel-primary" style="border: 1px solid #746c6c;box-shadow: 0px 4px 4px 4px #7d7575;">
                    
                  <div class="panel-heading" style="background-color: #29cc18;border-color: #29cc18;"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;"><i class="fa fa-check-circle"></i> Payment Received Successful !</h3></div>
                  <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="plogin">
                    <h1 style="text-align:center;color: #29cc18;"><i style="font-size: 100px;" class="fa fa-check-circle"></i></h1>
                    <h1 style="text-align: center;font-weight:bold;">Payment Completed</h1>
                    <div style="text-align:center">
                    <h4>Thank you! Your payment of <i class="fa fa-inr"></i> <?php echo $amount; ?> has been received</h4>
                    <h4>Your Transaction Ref No: <?php echo $payment_id; ?></h4>
                    <h4>Note: Please save Transaction Ref no. for future reference</h4>
                    </div>
		</div>
	
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
                <br><br><br><br><br>
	</div>
	<?php }else{ ?>
	<script>
	window.location='<?php echo stie_url(); ?>';
	</script>
	<?php  } ?>
<script>

function principle_registrations(){
		
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/principle_login_process",
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
				        window.location="principle-login";
						}
					
				}
			});
			return false;  
		});
				
	}
</script>


