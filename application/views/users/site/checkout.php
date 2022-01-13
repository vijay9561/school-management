
<div class="container main">			
		
    
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<script>
	
		</script>
<?php if(isset($_GET['chekout'])){ $Pid=$_GET['chekout']; 
$school=$this->db->query("select *from tbl_principle where Pid='$Pid'")->row(); 
if(count($school)>=1){
?>	
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
                     <br><br>
	      <?php if(isset($_SESSION['ErrorsMsg'])) { ?><div class="alert alert-danger"><?php echo $_SESSION['ErrorsMsg']; unset($_SESSION['ErrorsMsg']); ?></div><?php } ?>
                <?php if(isset($_SESSION['SUCESSMSG'])) { ?><div class="alert alert-success"><?php echo $_SESSION['SUCESSMSG']; unset($_SESSION['SUCESSMSG']); ?></div><?php } ?>
              <div class="panel panel-primary" style="border: 1px solid #746c6c;box-shadow: 0px 4px 4px 4px #7d7575;">
                    
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Checkout Payment</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<div class="plogin">
                    <form method="post" action="<?php echo site_url(); ?>procced_to_payment">
                        <input type="hidden" value="<?php echo base64_encode($Pid); ?>" id="principal_name" name="principal_name">
                    <table class="table table-bordered">
                        <tr> <th>Payment For</th><td> School Registration Charges</td> </tr>
                        <tr> <th>Registraton Charges Amount</th><td> <i class="fa fa-inr"></i> 1000</td> </tr>
                        <tr> <th>Email Address</th><td> <?php echo $school->Principle_email; ?></td> </tr>
                        <tr> <th>School Name</th><td> <?php echo   $school->Principle_school_name; ?></td> </tr>
                         <tr> <th>Mobile No.</th><td> <?php echo   $school->Principle_mobile_no; ?></td> </tr>
                         <tr><th colspan="2"><button type="submit" class="btn btn-primary btn-block">Click here to Pay <i class="fa fa-inr"></i> 1000 </button></th></tr>
                    </table>
                    </form>
		</div>
	
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		
		<br><br>
	</div>
<?php }?>
       <script>
	window.location='<?php echo stie_url(); ?>';
	</script>
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


