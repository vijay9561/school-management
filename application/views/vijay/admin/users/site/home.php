
	<div class="container main">			
		<div class="row">
		
		</div><!--/.row-->
		<div class="row">
		<div class="col-md-3"></div>
			<div class="co-md-6">
			<form role="form" method="post"  id="pincodemangement">
								<div class="form-group">
									<label>Principle Name <b style="color:red;">*</b></label>
									 <input type="text" id="Principle_name" name="Principle_name" onchange="Principle_namer()" maxlength="50" required="required" class="form-control">
						  <span id="Principle_namer" style="color:red;"></span>
								</div>
								  							
                             <div class="form-group">
									<label>Email ID <b style="color:red;">*</b></label>
									 <input type="text" id="Principle_email" name="Principle_email" onchange="Principle_emailr()" maxlength="50" required="required" class="form-control">
						  <span id="Principle_emailr" style="color:red;"></span>
								</div>
								  <div class="form-group">
									<label>Principle Mobile Number <b style="color:red;">*</b></label>
									 <input type="text" id="Principle_mobile_no" name="Principle_mobile_no" onchange="Principle_mobile_nor()" maxlength="50" required="required" class="form-control">
						  <span id="Principle_mobile_nor" style="color:red;"></span>
								</div>
							  
							    <div class="form-group">
									<label>Password <b style="color:red;">*</b></label>
									 <input type="text" id="Principle_password" name="Principle_password" onchange="Principle_passwordr()" maxlength="50" required="required" class="form-control">
						  <span id="Principle_passwordr" style="color:red;"></span>
								</div>
							  
							  <div class="form-group">
									<label>Principle Schools Name <b style="color:red;">*</b></label>
									<textarea type="text" id="Principle_school_name" name="Principle_school_name" onchange="Principle_school_namer()" maxlength="200" required="required" class="form-control"></textarea>
						  <span id="Principle_school_namer" style="color:red;"></span>
								</div>
								 <div class="form-group">
									<label>Schools City Name <b style="color:red;">*</b></label>
									 <input type="text" id="Principle_schools_city" name="Principle_schools_city" onchange="Principle_schools_cityr()" maxlength="50" required="required" class="form-control">
						  <span id="Principle_schools_cityr" style="color:red;"></span>
								</div>
							  							
							<div class="form-group"><input type="submit" class="btn btn-primary" onClick="return addpincodevalues();" value="Add Pincode"></div>
							</div>
							
						</form>
			</div>
			<div class="col-md-3"></div>
		</div><!--/.row-->	
			</div><!--/.col-->
		<br /><br /><br />
		<br><br>
		