<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<script>
  /*  $(function () {
    $("#todate").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2018"
    });
	$("#fromdate").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2018"
    });
});*/

function event_namer(){if($('#event_name').val()==''){}else{ $('#event_namer').html(' '); }}
function fromdater(){if($('#fromdate').val()==''){}else{ $('#fromdater').html(' '); }}
function todater(){if($('#todate').val()==''){}else{ $('#todate').html(' '); }}
function holiday_adds(){
		var mobilenovalidation=/^\d{10}$/;
		var pat1=/^\d{6}$/;
		var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	
			var  event_name=document.getElementById('event_name').value.trim();
			var  fromdate=document.getElementById('fromdate').value.trim();
			var  todate=document.getElementById('todate').value.trim();
         
			if(event_name==''){
			$("#event_namer").html('Please enter holiday name');
			$("#event_name").focus();
			return false;
			}
			if(fromdate==''){
				$("#fromdater").html('Please select start holiday date');
				$("#fromdate").focus();
				 return false;
			}
			if(todate==''){
			$("#todater").html('Please select end holiday date');
			$("#todate").focus();
			return false;
			}
		$("#pincodemangement").unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "<?php site_url(); ?>users_controller/student_holidays_submisssions",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					  window.location='holiday-list';
						return false;
					}else{
				 $("#productoutoffstock12").show();
				$("#productoutoffstock12").html('this day holiday already added please select anther days');  
				$(document).ready(function(){ setTimeout(function(){ $("#productoutoffstock12").fadeOut('slow'); }, 20000); }); 
				return false;
				}
			}
			});
			return false;  
		});
				
	}

$(document).ready(function(){
    $("#fromdate").datepicker({
        numberOfMonths: 1,
		changeYear: true,
		dateFormat: "yy-mm-dd",
        onSelect: function(selected) {
          $("#todate").datepicker("option","minDate", selected)
        }
    });
    $("#todate").datepicker({ 
        numberOfMonths: 1,
		changeYear: true,
		dateFormat: "yy-mm-dd",
        onSelect: function(selected) {
           $("#fromdate").datepicker("option","maxDate", selected)
        }
    });  
});
	</script>
<div class="container main">			
	
		
		<div class="row">
			<div class="col-lg-12">
			
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-3"></div>
		<div class="col-md-6">
	
		 <div class="panel panel-primary">
        <div class="panel-heading"><h3 style="color: white;font-size: 25px;text-align: center;margin-top: 6px;">Add New Holiday</h3></div>
			 <div class="panel-body">
		<div class="alert alert-danger" id="productoutoffstock12" style="display:none;"></div>
		<form role="form" method="post"  id="pincodemangement">
          <div class="form-group">
            <label   class="control-label" for="name">Holiday Name <b style="color:red;">*</b></label>
            <input type="text" id="event_name"  name="event_name" onchange="event_namer()" autocomplete="off" maxlength="150" autcomplete="off" required="required" class="form-control">
            <span id="event_namer" style="color:red;"></span> </div>
          <div class="form-group">
            <label   class="control-label" for="name">Holiday From Date <b style="color:red;">*</b></label>
            <input type="text" id="fromdate" name="fromdate" onchange="fromdater()" maxlength="50" autocomplete="off" required="required" class="form-control">
            <span id="fromdater" style="color:red;"></span> </div>
          <div class="form-group">
            <label   class="control-label" for="name">Holiday To Date <b style="color:red;">*</b></label>
            <input type="text" id="todate" name="todate" onchange="todater()" maxlength="50" autocomplete="off" required="required" class="form-control">
            <span id="todater" style="color:red;"></span> </div>
			
          <div class="form-group">
            <input type="submit" class="btn btn-primary" onClick="return holiday_adds();" value="Submit">
          </div>
        </form>
			  </div></div>
		
		</div>
			<div class="col-md-3"></div>
		</div>
		<br /><br /><br />
		<br><br>
		<br><br>
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
<script>
</script>


