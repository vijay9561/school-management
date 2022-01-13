
<div class="container main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Teacher Login</li>
			</ol>
		</div><!--/.row-->
		
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
            <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Teacher Login</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
          
          <div class="form-group">
            <label class="control-label" for="name">Email ID <b style="color:red;">*</b></label>
            <input type="text" id="Principle_email" name="Principle_email" onchange="Principle_emailr()" maxlength="50" required="required" class="form-control">
            <span id="Principle_emailr" style="color:red;"></span> </div>
          
          <div class="form-group">
            <label class="control-label" for="name">Password <b style="color:red;">*</b></label>
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



