<style>

.footer {

    position: fixed;

    bottom:0px;

    width: 100%;

	background-color:#000;

	color:#FFFFFF;

	z-index: 99999;
	padding-top: 2.5px;
padding-bottom: 2.5px;

}

.footer11 {

    position: fixed;

    bottom:94px;

    width: 100%;

	color:#FFFFFF;
}
@media(max-width:1360px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:1024px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:950px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}

@media(max-width:850px){
.footer11 {

    position: fixed;

    bottom:130px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:768px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}

}
@media(max-width:500px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}
.footer11 {

    position: fixed;

    bottom:112px;

    width: 100%;

	color:#FFFFFF;
}
}
@media(max-width:320px){
.navbar {
    position: relative;
    min-height: 63px;
    margin-bottom: 10px;
    padding-top: 0px;
    border: 1px solid transparent;
}
}

.TickerNews {
    width: 103%;
    height: 38px;
    background-color: #0a0a0b;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -101px;
    position: absolute;
    bottom:32px;
}
@media(max-width:1190px){
 .TickerNews {
    width: 103%;
    height: 38px;
    background-color: #0a0a0b;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -101px;
    position: absolute;
    bottom: -4px;
}
}
@media(max-width:768px){
 .TickerNews {
    width: 103%;
    height: 38px;
    background-color: #0a0a0b;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -101px;
    position: absolute;
    bottom:21px;
}
@media(max-width:500px){
 .TickerNews {
   width: 100%;
height: 38px;
background-color: #0a0a0b;
color: #FFFFFF;
font-size: 17px;
line-height: 38px;
margin-bottom: -106px;
position: absolute;
bottom: 39px;
}
}
</style><br><br>


<?php   ?>

<?php if((!isset($_SESSION['PARENT_ID'])) && (!isset($_SESSION['TEACHER_ID'])) && (!isset($_SESSION['PRINCIPLE_ID'])) ) {
 $expiry_date=date('Y-m-d');
$mysqlquerys=$this->db->query("select notification_name from notification_admin where expiry_date>='$expiry_date'")->result(); ?>
<?php if(count($mysqlquerys)>=1){ ?>
<style>
@media(max-width:868px){
.TickerNews {
    width: 103%;
    height: 38px;
    background-color: #654486;
    color: #FFFFFF;
    font-size: 17px;
    line-height: 38px;
    margin-bottom: -32px;
}
}
</style>
<div class="row footer11">
<?php  //echo $this->db->last_query(); ?>
		<div class="col-md-12">
		 <div class="TickerNews" id="T3ASDFSAFD">
		   
		       <marquee behavior="scroll" onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();" onmouseout="this.setAttribute('scrollamount', 3, 0);this.start();" scrollamount="8">
		<!--<div class="marquee-sibling"></div>-->
		<span	 style="color:#22ab4e; padding-top:8px;padding-bottom:8px;"> 
					<?php foreach($mysqlquerys as $row){ ?>
						<?php echo $row->notification_name; ?>
						<?php } ?>
					</span>
				</marquee>
				
				</div>
				</div>
	</div>

<?php } } ?>
<?php if(isset($_SESSION['PARENT_ID'])) { $ptid=$_SESSION['PARENT_ID'];
     $get=$this->db->query("select *from tbl_parent where Ptid='$ptid'")->row();
     $pid=$get->pid; 
	 $class=$get->Student_class_division; 
	 $division=$get->divsion; 
 ?>                 
<?php $mysqluery=$this->db->query("select *from notification where (sid='".$ptid."' OR notification_type='common') and pid='$pid' and class_name='$class' and division='$division'  order by nid desc")->result();  $expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date' and start_date<='$expiry_date'")->result(); ?>
<?php if(count($mysqluery)>=1){ ?>
		<div class="row footer11">
		<div class="col-md-12">
		 <div class="TickerNews" id="T2ADFSAF">
		 
		          <marquee behavior="scroll" onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();" onmouseout="this.setAttribute('scrollamount', 5, 0);this.start();" scrollamount="10"> 
		<!--<div class="marquee-sibling"></div>-->
		<span	 style="color:orange; padding-top:8px;padding-bottom:8px;"> 
					<?php foreach($mysqluery as $row){ ?>
						<?php echo $row->notification_description; ?>
						<?php } ?>
						</span>
						<span style="background-color:green; color:white; padding-top:8px;padding-bottom:8px;">
						<?php foreach($tgetquery as $row){ ?>
						<?php echo $row->notification_name; ?>
						<?php } ?>
					</span>
					</marquee
					
					></div>
					</div>
					
					</div>

	<?php } ?>
<?php } ?>
<?php if((isset($_SESSION['TEACHER_ID'])) || (isset($_SESSION['PRINCIPLE_ID']))){  ?>
<?php $pid=$_SESSION['SCHOOL_ID'];
	 $expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date' and start_date<='$expiry_date'")->result();
 if(count($tgetquery)>=1){
 ?>
 <style>

 </style>
 <div class="row footer11">
<?php  //echo $this->db->last_query(); ?>
		<div class="col-md-12">
		 <div class="TickerNews" id="T3">
		    <div class="ti_wrapper">
		        <div class="ti_slide11">
		            <div class="ti_content110">
					<marquee behavior="scroll" onmouseover="this.setAttribute('scrollamount', 0, 0);this.stop();" onmouseout="this.setAttribute('scrollamount', 3, 0);this.start();" scrollamount="8">
		<!--<div class="marquee-sibling"></div>-->
		<span	 style="color:#22ab4e; padding-top:8px;padding-bottom:8px;"> 
					<?php foreach($tgetquery as $row){ ?>
						 <?php echo $row->notification_name; ?>
						<?php } ?>
						</span>
						</marquee>
				</div>
				</div>
				</div>
				</div>
				</div>
	</div>



<?php } } ?>
<style>
.navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :46%;   
    float:none !important;
}
@media(max-width:500px){
  .navbar-right { 
    margin-left:auto;
    margin-right:auto; 
    max-width :100%;   
    float:none !important;
}
 }
</style>

<div class="footer">

    <div class="col-md-12" align="center"><a href="http://www.vmbss.org" style="color:#cf481b;" target="_blank">&copy; 2018 vmbss.org, SCHOOL MANAGEMENT&nbsp;&copy;</a>&nbsp;&nbsp;<a href="http://www.vjmsoftech.in">Developed By VJMSOFTECH.IN</a></div>
</div>

<div id="student_login" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
	<form method="post" action="#" id="student_login_form">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Login</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-danger" id="error_logins" style="display:none;"></div>
       <div class="form-group">
	   <input type="text" class="form-control" name="student_aadhar" onchange="student_aadharr();" id="student_aadhar" placeholder="Aadhar No" />
	   <span id="student_aadharr" style="color:red;"></span>
	   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return student_login_function();">Login</button>
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>


<div id="Login_Staff" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	<form method="post" action="#" id="commonloginusers">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Teacher / Clerek / Principal Login</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-danger" id="errror_common_login" style="display:none;"></div>
          <div class="form-group">
            <label for="name">Email ID <b style="color:red;">*</b></label>
          <input type="text" class="form-control" style="text-transform: none;"  id="Principle_email1"  onchange="Principle_emailr1()" name="email" placeholder="Email ID" name="email"  />
          <span id="Principle_emailr1" class="errormsg1"></span> </div>
          
          <div class="form-group">
            <label for="name">Password <b style="color:red;">*</b></label>
             <input type="password" style="text-transform: none;" class="form-control" id="Principle_password1" onchange="Principle_passwordr1();" name="password" placeholder="Password" name="password"  />
          <span id="Principle_passwordr1" class="errormsg1"></span> </div>
      </div>
      <div class="modal-footer">
          <input type="button"  name="sub" onclick="return login_users();" class="btn btn-primary btn-sm login-button" value="Log In" />
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

<div id="sales_login" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
	<form method="post" action="#" id="sales_login_forms">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Associate Login</h4>
      </div>
      <div class="modal-body">
	  <div class="alert alert-danger" id="errror_sales_login" style="display:none;"></div>
          <div class="form-group">
            <label class="control-label" for="name">Email ID <b style="color:red;">*</b></label>
            <input type="text" id="sales_email" name="sales_email" style="text-transform: none;"  onchange="sales_emailr()" maxlength="50" required="required" class="form-control">
            <span id="sales_emailr" style="color:red;"></span> </div>
          
          <div class="form-group">
            <label class="control-label" for="name">Password <b style="color:red;">*</b></label>
            <input type="password" style="text-transform: none;" id="sales_password" name="sales_password" onchange="sales_passwordr()" maxlength="50" required="required" class="form-control">
            <span id="sales_passwordr" style="color:red;"></span> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return sales_logins();">Login</button>
	    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>

	<script>
	
function sales_emailr(){if($('#sales_email').val()==''){}else{ $('#sales_emailr').html(' '); }}
function sales_passwordr(){if($('#sales_password').val()==''){}else{ $('#sales_passwordr').html(' '); }}

function sales_logins(){
var emailpattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
var  Principle_email=document.getElementById('sales_email').value.trim();
var  Principle_password=document.getElementById('sales_password').value.trim();
if(Principle_email==''){
$("#sales_emailr").html('Please enter email address');
$("#sales_email").focus();
return false;
}
var email1 = Principle_email.toLowerCase();
if (emailpattern.test(email1) == false){
$("#sales_emailr").html("Please enter valid email address");
$("#sales_email").focus();       
return false;
}
if(Principle_password==''){
$("#sales_passwordr").html('Please enter password');
$("#sales_password").focus();
return false;
}
var formData = new FormData($("#sales_login_forms")[0]);
$.ajax({   
url: "<?php site_url(); ?>users_controller/salesman_login",
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
	$("#errror_sales_login").show();
	$("#errror_sales_login").html("Email ID or Password Incorrect");
	return false;
	}
}
});
}	

function student_aadharr(){if($('#student_aadhar').val()==''){}else{ $('#student_aadharr').html(' '); }}
function student_login_function(){
		var mobilenovalidation=/^\d{12}$/;
			var  student_aadhar=document.getElementById('student_aadhar').value.trim();
          if(student_aadhar==''){
			$("#student_aadharr").html('Please enter Aadhar card number');
			$("#student_aadhar").focus();
			return false;
			}
			if(!(student_aadhar.match(mobilenovalidation))) {
			$("#student_aadharr").html("Please enter valid adhar card number");	
			$("#student_aadhar").focus();
			return false;
			}
			var formData = new FormData($("#student_login_form")[0]);
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
						$("#error_logins").show();
				         $("#error_logins").html("Aadhar Card Number Incrroect");
						 return false;
						}
					
				}
			});
				
	}


		$('#calendar').datepicker({

		});



		!function ($) {

		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          

		        $(this).find('em:first').toggleClass("glyphicon-minus");      

		    }); 

		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");

		}(window.jQuery);



		$(window).on('resize', function () {

		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')

		})

		$(window).on('resize', function () {

		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')

		})

	</script>	

	<script>

						    $(function () {

						        $('#hover, #striped, #condensed').click(function () {

						            var classes = 'table';

						

						            if ($('#hover').prop('checked')) {

						                classes += ' table-hover';

						            }

						            if ($('#condensed').prop('checked')) {

						                classes += ' table-condensed';

						            }

						            $('#table-style').bootstrapTable('destroy')

						                .bootstrapTable({

						                    classes: classes,

						                    striped: $('#striped').prop('checked')

						                });

						        });

						    });

						

						    function rowStyle(row, index) {

						        var classes = ['active', 'success', 'info', 'warning', 'danger'];

						

						        if (index % 2 === 0 && index / 2 < classes.length) {

						            return {

						                classes: classes[index / 2]

						            };

						        }

						        return {};

						    }

							

									function check_checkboxes()

{

  var c = document.getElementsByTagName('input');

  for (var i = 0; i < c.length; i++)

  {

    if (c[i].type == 'checkbox')

       {

       if (c[i].checked) {

	  

	   $('#bulk_delete_submit').show();

		$('#bulk_inactive_submit').show();

		$('#bulk_active_submit').show();

	   return true}else{

	   	$('#bulk_delete_submit').hide();

		$('#bulk_inactive_submit').hide();

		$('#bulk_active_submit').hide();

	   }

    }

  }

  return false;

}

function deleteConfirm(){



    if(!check_checkboxes())

        {

        alert("Please check atleast one row");  

        return false;

      }

    var result = confirm("Are you sure to delete record?");

    if(result){

        return true;

    }else{

        return false;

    }

}

function updatestatus(){

      if(!check_checkboxes())

        {

        alert("Please check atleast one row");  

        return false;

      }

    var result = confirm("Are you sure to update status");

    if(result){

        return true;

    }else{

        return false;

    }

}

$(document).ready(function(){

    $('#select_all').on('click',function(){

        if(this.checked){

            $('.checkbox').each(function(){

                this.checked = true;

            });

		$('#bulk_delete_submit').show();

        }else{

             $('.checkbox').each(function(){

                this.checked = false;

            });

			$('#bulk_delete_submit').hide();

        }

    });

    $('.checkbox').on('click',function(){

        if($('.checkbox:checked').length == $('.checkbox').length){

            $('#select_all').prop('checked',true);

        }else{

            $('#select_all').prop('checked',false);

        }

    });

});



						</script>
						
<style>
.control-label {
    font-size: 14px;
    font-weight: 400;
    pointer-events: none;
    position: absolute;
    transform: translate3d(0, 22px, 0) scale(1);
    transform-origin: left top;
    transition: 240ms;
    margin-top:-10px;
    padding-left:10px;
}
.form-group.focused .control-label {
    opacity: 1;
    transform: scale(0.75);
	color: #000;
	font-size:16px;
	font-weight:bold;
}

.form-control{
    align-self:flex-end;
}
</style>

<script>
$(document).ready(function(){
$('.form-control').on('focus blur', function (e) {
    $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');
});
</script>

</body>



</html>
	
<script>
</script>