<?php if(isset($_SESSION['PRINCIPLE_ID'])) { 
$principle=$this->db->query("select Pid,login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
$pid=$principle->login_id;
//echo $this->db->last_query();
//exit;
$bonafied='';
$leaving_cerificate='';
$nirgam_uttara='';
?>
<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select *,r.medium as schoolsmedium from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where (p.Student_name LIKE '%".$searchid."%' OR p.adhar_card LIKE '%".$searchid."%' OR p.Student_roll_no LIKE '%".$searchid."%' OR p.Parent_mobile_no LIKE '%".$searchid."%') and r.pid='$pid' order by r.arid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
$year=date('Y');
$bonafied=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Bonafide Certificate' and pid='$pid' and app_status='received'")->result();
$nirgam_uttara=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Nirgam Uttara' and pid='$pid' and app_status='received'")->result();
$leaving_cerificate=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Leaving Certificate' and pid='$pid' and app_status='received'")->result();
}elseif(isset($_GET['application_type']) && (isset($_GET['year']))){
$type=$_GET['application_type'];
$year=$_GET['year'];
$bonafied=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Bonafide Certificate' and pid='$pid' and app_status='received'")->result();
$nirgam_uttara=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Nirgam Uttara' and pid='$pid' and app_status='received'")->result();
$leaving_cerificate=$this->db->query("SELECT * FROM `application_request` WHERE YEAR(`create_date`)='$year'  and application_for='Leaving Certificate' and pid='$pid' and app_status='received'")->result();

$mysqluery=$this->db->query("select *,r.medium as schoolsmedium from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where  r.pid='$pid' and YEAR(`create_date`)='$year' and r. application_for='$type'  order by r.arid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
}else{
$mysqluery=$this->db->query("select *,r.medium as schoolsmedium from  application_request r inner join tbl_parent p on p.Ptid=r.sid  where  r.pid='".$pid."' order by r.arid desc LIMIT ".$pageLimit." , ".$setLimit)->result();
$year=date('Y');
$bonafied=$this->db->query("SELECT * FROM `application_request` WHERE    application_for='Bonafide Certificate' and pid='$pid' and app_status='received'")->result();
$nirgam_uttara=$this->db->query("SELECT * FROM `application_request` WHERE   application_for='Nirgam Uttara' and pid='$pid' and app_status='received'")->result();
$leaving_cerificate=$this->db->query("SELECT * FROM `application_request` WHERE   application_for='Leaving Certificate' and pid='$pid' and app_status='received'")->result();
//echo $this->db->last_query();
//exit;

}

		 ?>
<script>
$(document).ready(function(){
$("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange:"1930:2030"
    });
	});
</script>
<script>
function search_result122(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='clerk-application-request?searchkeyowords='+search_id2;
return false;
}
</script>
<script>
function approved_application(id){
	var con=confirm('are you sure to the approved this student request!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/student_request_approved",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	
	function cancel_application(id){
	var con=confirm('are you sure to the cancel this student request!');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>users_controller/student_request_cancel",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
</script>
<style>
.bonafieds{
padding: 10px;
border: 1px solid #8e09e7;
background-color: #6f2a92;
color: white;
font-weight: bold;
margin-right:10px;
margin-bottom:20px;
}
</style>
<script>
function searchfiltrations(){
var year=$("#year").val();
var type=$("#type").val();
if(year==""){
  alert("Please select year");
  $("#year").focus();
   return false;
   }
 if(type==""){
   alert("Please select application type");
   $("#type").focus();
   return false;
  }
  window.location='clerk-application-request?application_type='+type+"&year="+year;
  return false;
 }
</script>
<div class="container main">
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
	  <div class="col-md-4"><div class="bonafieds">Bonafied: <?php echo count($bonafied); ?></div></div>
	 <div class="col-md-4"><div class="bonafieds">Leaving Certificate: <?php echo count($leaving_cerificate); ?></div></div>
     <div class="col-md-4"><div class="bonafieds">Nirgam Uttra: <?php echo count($nirgam_uttara); ?></div></div>	
	 <br /><br />  
        <div class="col-md-3"><select name="type" id="type" class="form-control">
		<?php if(isset($_GET['application_type'])){ ?>
			<option value="<?php echo $_GET['application_type']; ?>"><?php echo $_GET['application_type']; ?></option>
		<?php }else{ ?>
	
		<option value="">Select Applicatiom</option>
		<?php } ?>
		<option value="Bonafide Certificate">Bonafide Certificate</option>
	   <option value="Leaving Certificate">Leaving Certificate</option>
	   <option value="Nirgam Uttara">Nirgam Uttara</option>
	   </select>
		</div>
		<div class="col-md-3">
		<select name="year" id="year" class="form-control">
		<?php if(isset($_GET['year'])){ ?>
		
		<option value="<?php echo $_GET['year']; ?>"><?php echo $_GET['year']; ?></option>
		<?php }else{ ?>
		<option value="">Select Year</option>
		<?php } ?>
		<option value="2017">2017</option>
	    <option value="2018">2018</option>
	    <option value="2019">2019</option>
	    <option value="2020">2020</option>
		<option value="2021">2021</option>
	   <option value="2022">2022</option>			
	   </select>
		</div>
		<div class="col-md-3"><input type="button" class="btn btn-primary btn-block" value="Year Wise Search Application"  onclick="return searchfiltrations()" /></div>
        <div class="col-md-3">
          <div class="form-group pull-right">
            <form method="post">
              <input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">
              &nbsp;&nbsp;
              <input type="submit" class="btn btn-primary" value="Search" onclick="return search_result122()" />
            </form>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Student Name</th>
              <th>Aadhar Number</th>
              <th>Class</th>
              <th>Application Type</th>
              <th style="width:20%;">Application Description</th>
              <th>Received Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
					<?php $serial = ($pageLimit * $setLimit) + 1;
					//  $sn = ($pageLimit * $limit) + 1;
					$sn = ($page * $setLimit) + 1;
					$page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
					$start_num =((($page_num*$setLimit)-$setLimit)+1);
					$i=1;
					$j= (($page-1) * $setLimit) + $i; 
					foreach($mysqluery as $row){  
					$num = $sn ++;

					   ?>
            <tr>
              <td><?php echo $j++; ?></td>
              <td><?php echo $row->Student_name; ?></td>
              <td><?php echo $row->adhar_card; ?></td>
              <td><?php echo $row->class; if(!empty($row->division)){ echo '('.$row->division.')'; } ?></td>
              <td><?php echo $row->application_for; ?></td>
              <td><?php echo $row->application_description; ?></td>
              <td><?php if($row->received_date=='0000-00-00'){ echo '<b style="color:red;">Not Received</b>'; }else{ echo date('d/m/Y',strtotime($row->received_date)); } ?></td>
              <td><?php if($row->app_status=='pending') { echo '<b style="color:#2196F3">'.$row->app_status.'</b>'; } ?>
                <?php if($row->app_status=='cancel') { echo '<b style="color:red">'.$row->app_status.'</b>'; } ?>
                <?php if($row->app_status=='approved') { echo '<b style="color:green">'.$row->app_status.'</b>'; } ?>
                <?php if($row->app_status=='received') { echo '<b style="color:green">'.$row->app_status.'</b>'; } ?>
				<?php $parent_id=$row->Ptid; 
				      $request_id=$row->arid; 
				    $medium=$row->schoolsmedium; $adhar_card=$row->adhar_card; ?>
              </td>
              <td style="">
			  <?php if($row->application_for=='Bonafide Certificate'){  if($row->app_status=='received') { ?>
			    <?php if($medium=='marathi'){ ?>
				 <a  href="<?php echo site_url() ?>bonafied_certificate?application=<?php echo $parent_id; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
				<?php }else{ ?>
			   <a  href="<?php echo site_url() ?>bonafied_certificate_english_medium?application=<?php echo $parent_id; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
			   <?php } ?>
			   <?php  }else{ ?>
                <a  href="#" data-toggle="modal" data-target="#bonafied_certificate<?php echo $j; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create </a>
                <?php } }elseif($row->application_for=='Leaving Certificate'){  if($row->app_status=='received') {?>
				<?php if($medium=='marathi'){ ?>
				 <a  href="<?php echo site_url() ?>leaving_ceritificate?application=<?php echo $adhar_card; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
				<?php }else{ ?>
			   <a  href="<?php echo site_url() ?>leaving_ceritificate_english_medium?application=<?php echo $adhar_card; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
			   <?php } ?>
				<?php }else{ ?>
               <a  href="#" data-toggle="modal" data-target="#leaving_certificats<?php echo $j; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                <?php  } }elseif($row->application_for=='Marks Memo Certificate'){   if($row->app_status=='received') { echo 'Received Document'; }else{?>
                <a  href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                <?php } }elseif($row->application_for=='Nirgam Uttara'){  if($row->app_status=='received') { ?>
				<?php if($medium=='marathi'){ ?>
				 <a  href="<?php echo site_url() ?>nirgam_uttara?application=<?php echo $adhar_card; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
				<?php }else{ ?>
			   <a  href="<?php echo site_url() ?>nirgam_uttara_english_medium?application=<?php echo $adhar_card; ?>&applicate_id=<?php echo $request_id; ?>" title="View Details"  class="btn btn-primary"><i class="fa fa-eye"></i> </a>
			   <?php } ?>
				<?php }else{ ?>
                <a  href="#" data-toggle="modal" data-target="#nigram_uttras<?php echo $j; ?>"  class="btn btn-primary"><i class="fa fa-plus"></i> Create </a>
                <?php } }else{?>
                <a  href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
                <?php }?>
              </td>
            </tr>
			
			<div id="nigram_uttras<?php echo $j; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">निर्गम उतारा </h4>
                </div>
                <div class="modal-body">
				<?php $nigram=$this->db->query("select *from nigram_uttara where request_id='".$row->arid."'")->row(); ?>
  <form method="post" enctype="multipart/form-data" id="submit_leaving_certificate<?php echo $j; ?>" action="<?php echo site_url(); ?>users_controller/submit_nirgam_uttra1">
				  <input type="hidden"  name="parent_id" value="<?php echo $row->adhar_card; ?>" />
				  <input type="hidden"  name="request_id" value="<?php echo $row->arid; ?>" />
				  <input type="hidden"  name="pid" value="<?php echo $row->pid; ?>" />
					<div class="form-group">
                      <label class="control-label" for="name">प्रगती (Progress)*</label>
             <input type="text" id="nirgam_pargati<?php echo $j; ?>" value="<?php echo $nigram->student_performance; ?>" onchange="nirgam_pargatir(<?php echo $j;  ?>)" name="student_performance"  maxlength="200" class="form-control">
                      <span id="nirgam_pargatir<?php echo $j; ?>" style="color:red;"></span> </div>
					  <div class="form-group">
                      <label class="control-label" for="name">वर्तणूक (Conduct)*</label>
             <input type="text" id="nigram_vartnuk<?php echo $j; ?>" value="<?php echo $nigram->student_behavior; ?>" onchange="nigram_vartnukr(<?php echo $j;  ?>)" name="student_behavior"  maxlength="200" class="form-control">
                      <span id="nigram_vartnukr<?php echo $j; ?>" style="color:red;"></span> </div>
					  <div class="form-group">
                      <label class="control-label" for="name">शाळा सोडल्याची तारीख (Date of Leaving) *</label>
             <input type="text" id="nirgam_leave_date<?php echo $j; ?>" value="<?php echo $nigram->schools_leaving_date; ?>" onchange="nirgam_leave_dater(<?php echo $j;  ?>)" name="schools_leaving_date"  maxlength="200" class="form-control schoolleavingdate">
                      <span id="nirgam_leave_dater<?php echo $j; ?>" style="color:red;"></span> </div>
					  <div class="form-group">
                      <label class="control-label" for="name">शाळा सोडल्याचे कारण (Reason for Leaving Istitution)*</label>
             <input type="text" id="nirgam_leaving_reason<?php echo $j; ?>" value="<?php echo $nigram->schools_leaving_reason; ?>" onchange="nirgam_leaving_reasonr(<?php echo $j;  ?>)" name="schools_leaving_reason"  maxlength="200" class="form-control">
                      <span id="nirgam_leaving_reasonr<?php echo $j; ?>" style="color:red;"></span> </div>
					  <div class="form-group">
                      <label class="control-label" for="name">शेरा  (Remark)*</label>
             <input type="text" id="nirgam_shera<?php echo $j; ?>" value="<?php echo $nigram->schools_shera; ?>" onchange="nirgam_sherar(<?php echo $j;  ?>)" name="schools_shera"  maxlength="200" class="form-control">
                      <span id="nirgam_sherar<?php echo $j; ?>" style="color:red;"></span> </div>
					  <div class="form-group">
                      <label class="" for="name">Select Medium *</label>
                      <select type="text" id="select_nirgam_medium<?php echo $j; ?>"  onchange="select_nirgam_mediumr(<?php echo $j;  ?>)" name="select_nirgam_medium"  maxlength="200" class="form-control">
					  <option value="">Select Medium</option>
					  <option value="Marathi">Marathi</option>
					  <option value="English">English</option>
					  </select>
                      <span id="select_nirgam_mediumr<?php echo $j; ?>" style="color:red;"></span> </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" onclick="return submit_nigram(<?php echo $j; ?>)">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
				 </form>
              </div>
            </div>
          </div>
			
			<div id="bonafied_certificate<?php echo $j; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Bonafied Certificate </h4>
                </div>
                <div class="modal-body">
  <form method="post" enctype="multipart/form-data" id="submit_leaving_certificate<?php echo $j; ?>" action="<?php echo site_url(); ?>users_controller/submit_bonafied_student_data">
				  <input type="hidden" id="parent_id<?php echo $j; ?>" name="parent_id" value="<?php echo $row->Ptid; ?>" />
				  <input type="hidden" id="request_id<?php echo $j; ?>" name="request_id" value="<?php echo $row->arid; ?>" />
				  <input type="hidden" id="pid<?php echo $j; ?>" name="pid" value="<?php echo $row->pid; ?>" />
                    <div class="form-group">
                      <label class="" for="name">Select Medium *</label>
                      <select type="text" id="select_bonafied_medium<?php echo $j; ?>"  onchange="select_bonafied_mediumr(<?php echo $j;  ?>)" name="select_bonafied_medium"  maxlength="200" class="form-control">
					  <option value="">Select Medium</option>
					  <option value="Marathi">Marathi</option>
					  <option value="English">English</option>
					  </select>
                      <span id="select_bonafied_mediumr<?php echo $j; ?>" style="color:red;"></span> </div>
                 
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" onclick="return sumbit_bonafied_certificate(<?php echo $j; ?>)">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
				 </form>
              </div>
            </div>
          </div>
			
          <div id="leaving_certificats<?php echo $j; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">शाळेचा दाखला </h4>
                </div>
                <div class="modal-body">
				<?php $leaving=$this->db->query("select *from leaving_certificate where request_id='".$row->arid."'")->row(); ?>
  <form method="post" enctype="multipart/form-data" id="submit_leaving_certificate<?php echo $j; ?>" action="<?php echo site_url(); ?>users_controller/submit_applications_leaving">
				  <input type="hidden" id="parent_id<?php echo $j; ?>" name="parent_id" value="<?php echo $row->adhar_card; ?>" />
				  <input type="hidden" id="request_id<?php echo $j; ?>" name="request_id" value="<?php echo $row->arid; ?>" />
				  <input type="hidden" id="pid<?php echo $j; ?>" name="pid" value="<?php echo $row->pid; ?>" />
                    <div class="form-group">
                      <label class="control-label" for="name">विध्यार्थ्याची प्रगती (Student Progress)*</label>
                      <input type="text" id="student_performance<?php echo $j; ?>" name="student_performance" value="<?php echo $leaving->student_performance; ?>" onchange="student_performancer(<?php echo $j; ?>)"  maxlength="100" class="form-control">
                      <span id="student_performancer<?php echo $j; ?>" style="color:red;"></span> </div>
                    <div class="form-group">
                      <label class="control-label" for="name">विध्यार्थ्याची वर्तणूक (Student Conduct)*</label>
                     <input type="text" id="student_behavior<?php echo $j; ?>" onchange="student_behaviorr(<?php echo $j; ?>)" name="student_behavior" value="<?php echo $leaving->student_behavior; ?>"  maxlength="150" class="form-control">
                      <span id="student_behaviorr<?php echo $j; ?>" style="color:red;"></span> </div>
                    <div class="form-group">
                      <label class="control-label" for="name">शाळा सोडल्याची दिनांक (Date of Leaving)*</label>
                      <input type="text" id="schools_leaving_date<?php echo $j; ?>" value="<?php echo $leaving->schools_leaving_date; ?>" onchange="schools_leaving_dater(<?php echo $j; ?>)" name="schools_leaving_date"  maxlength="150" class="form-control schoolleavingdate">
                      <span id="schools_leaving_dater<?php echo $j; ?>" style="color:red;"></span> </div>
                    <div class="form-group">
                      <label class="control-label" for="name">शाळा सोडतावेळेची इयत्ता केंव्हापासून (Course & Year)*</label>
                      <input type="text" id="schools_leaving_year<?php echo $j; ?>" onchange="schools_leaving_yearr(<?php $j; ?>)" value="<?php echo $leaving->schools_leaving_year; ?>" name="schools_leaving_year"  maxlength="150" class="form-control">
                      <span id="schools_leaving_yearr<?php echo $j; ?>" style="color:red;"></span> </div>
                    <div class="form-group">
                      <label class="control-label" for="name">शाळा सोडल्याचे कारण (Reason of Leaving School)*</label>
                      <input type="text" id="schools_leaving_reason<?php echo $j; ?>" value="<?php echo $leaving->schools_leaving_reason; ?>" name="schools_leaving_reason" onchange="schools_leaving_reasonr(<?php echo $j; ?>)"  maxlength="200" class="form-control">
                      <span id="schools_leaving_reasonr<?php echo $j; ?>" style="color:red;"></span> </div>
					  
                    <div class="form-group">
                      <label class="control-label" for="name">शेरा (Remarks)*</label>
                      <input type="text" id="schools_shera<?php echo $j; ?>" value="<?php echo $leaving->schools_shera; ?>" onchange="schools_sherar(<?php echo $j;  ?>)" name="schools_shera"  maxlength="200" class="form-control">
                      <span id="schools_sherar<?php echo $j; ?>" style="color:red;"></span> </div>
					  
					  <div class="form-group">
                      <label class="" for="name">Select Medium *</label>
                      <select type="text" id="select_leaving_medium<?php echo $j; ?>"  onchange="select_leaving_mediumr(<?php echo $j;  ?>)" name="select_leaving_medium"  maxlength="200" class="form-control">
					  <option value="">Select Medium</option>
					  <option value="Marathi">Marathi</option>
					  <option value="English">English</option>
					  </select>
                      <span id="select_leaving_mediumr<?php echo $j; ?>" style="color:red;"></span> </div>
                 
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" onclick="return submit_employe_informations(<?php echo $j; ?>)">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
				 </form>
              </div>
            </div>
          </div>
          <?php $i++; } ?>
          </tbody>
          
        </table>
        <div class="row">
          <div class="col-md-12">
            <?php 
				   if(isset($_GET['searchkeyowords'])){ 
				echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$pid); 
				} elseif(isset($_GET['year'])){ 	echo userspaignsearchingsfilteration($setLimit,$page,$_GET['year'],$_GET['application_type'],$pid);  }
				{  echo userspagings($setLimit,$page,$pid);  } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
  <br />
  <br>
  <br>
</div>
<script>
$(document).ready(function(){
$(".schoolleavingdate").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "dd.mm.yy",
		maxDate:0
    });
	});
function student_performancer(id){ if($("#student_performance"+id).val()=='') { }else{ $("#student_performancer"+id).html(' ') } }
function student_behaviorr(id){ if($("#student_behavior"+id).val()=='') { }else{ $("#student_behaviorr"+id).html(' ') } }
function schools_leaving_dater(id){ if($("#schools_leaving_date"+id).val()=='') { }else{ $("#schools_leaving_dater"+id).html(' ') } }
function schools_leaving_yearr(id){ if($("#schools_leaving_year"+id).val()=='') { }else{ $("#schools_leaving_yearr"+id).html(' ') } }
function schools_leaving_reasonr(id){ if($("#schools_leaving_reason"+id).val()=='') { }else{ $("#schools_leaving_reasonr"+id).html(' ') } }
function subcaste_studr(id){ if($("#subcaste_stud"+id).val()=='') { }else{ $("#schools_sherar"+id).html(' ') } }
function subcaste_studr(id) { if($("#subcaste_stud"+id).val()=='') { }else{ $("#subcaste_studr"+id).html(' ') } }
function nigram_sub_caster(id) { if($("#nigram_sub_caste"+id).val()=='') { }else{ $("#nigram_sub_caster"+id).html(' ') } }
function nirgam_pargatir(id) { if($("#nirgam_pargati"+id).val()=='') { }else{ $("#nirgam_pargatir"+id).html(' ') } }
function nigram_vartnukr(id) { if($("#nigram_vartnuk"+id).val()=='') { }else{ $("#nigram_vartnukr"+id).html(' ') } }
function nirgam_leave_dater(id) { if($("#nirgam_leave_date"+id).val()=='') { }else{ $("#nirgam_leave_dater"+id).html(' ') } }
function nirgam_leaving_reasonr(id) { if($("#nirgam_leaving_reason"+id).val()=='') { }else{ $("#nirgam_leaving_reasonr"+id).html(' ') } }
function nirgam_sherar(id) { if($("#nirgam_shera"+id).val()=='') { }else{ $("#nirgam_sherar"+id).html(' ') } }
function select_bonafied_mediumr(id) { if($("#select_bonafied_medium"+id).val()=='') { }else{ $("#select_bonafied_mediumr"+id).html(' ') } }
function select_leaving_mediumr(id) { if($("#select_leaving_medium"+id).val()=='') { }else{ $("#select_leaving_mediumr"+id).html(' ') } }
function select_nirgam_mediumr(id) { if($("#select_nirgam_medium"+id).val()=='') { }else{ $("#select_nirgam_mediumr"+id).html(' ') } }
function sumbit_bonafied_certificate(id){
  var nigram_sub_caste=document.getElementById('select_bonafied_medium'+id).value.trim();	
  if(nigram_sub_caste==''){ $("#select_bonafied_mediumr"+id).html('Please select medium'); $("#select_bonafied_medium"+id).focus(); return false;  }
  }
function submit_nigram(id){
  var nirgam_pargati =document.getElementById('nirgam_pargati'+id).value.trim();
  var nigram_vartnuk=document.getElementById('nigram_vartnuk'+id).value.trim();
  var nirgam_leave_date=document.getElementById('nirgam_leave_date'+id).value.trim();
  var nirgam_leaving_reason=document.getElementById('nirgam_leaving_reason'+id).value.trim();
  var nirgam_shera=document.getElementById('nirgam_shera'+id).value.trim();
    var select_nirgam_medium=document.getElementById('select_nirgam_medium'+id).value.trim();  		
  
  if(nirgam_pargati==''){ $("#nirgam_pargatir"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची प्रगती भरा'); $("#nirgam_pargati"+id).focus(); return false;  }
  if(nigram_vartnuk==''){ $("#nigram_vartnukr"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची वर्तणूक भरा'); $("#nigram_vartnuk"+id).focus(); return false;  }
  if(nirgam_leave_date==''){ $("#nirgam_leave_dater"+id).html('कृपया वरील राखण्यात शाळा सोडल्याची दिनांक भरा'); $("#nirgam_leave_date"+id).focus(); return false;  }
  if(nirgam_leaving_reason==''){ $("#nirgam_leaving_reasonr"+id).html('कृपया वरील राखण्यात शाळा सोडल्याचे कारण भरा'); $("#nirgam_leaving_reason"+id).focus(); return false;  }
  if(nirgam_shera==''){ $("#nirgam_sherar"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची शेरा भरा'); $("#nirgam_shera"+id).focus(); return false;  }
   if(select_nirgam_medium==''){ $("#select_nirgam_mediumr"+id).html('Please select medium'); $("#select_nirgam_medium"+id).focus(); return false;  }
  }
function submit_employe_informations(id){
  var student_performance=document.getElementById('student_performance'+id).value.trim();
  var student_behavior=document.getElementById('student_behavior'+id).value.trim();
  var schools_leaving_date=document.getElementById('schools_leaving_date'+id).value.trim();
  var schools_leaving_year=document.getElementById('schools_leaving_year'+id).value.trim();
  var schools_leaving_reason=document.getElementById('schools_leaving_reason'+id).value.trim();  

  var  	schools_shera=document.getElementById('schools_shera'+id).value.trim();
  var select_leaving_medium=document.getElementById('select_leaving_medium'+id).value.trim();
   if(student_performance==''){ $("#student_performancer"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची प्रगती भरा'); $("#student_performance"+id).focus();   return false; }
   if(student_behavior==''){ $("#student_behaviorr"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची वर्तणूक भरा'); $("#student_behavior"+id).focus();   return false; }
   if(schools_leaving_date==''){ $("#schools_leaving_dater"+id).html('कृपया वरील राखण्यात शाळा सोडतावेळेची इयत्ता केंव्हापासून ते भरा'); $("#schools_leaving_date"+id).focus();  return false;  }
   if(schools_leaving_year==''){ $("#schools_leaving_yearr"+id).html('कृपया वरील राखण्यात शाळा सोडल्याची दिनांक भरा'); $("#schools_leaving_yearr"+id).focus();   return false; }
   if(schools_leaving_reason==''){ $("#schools_leaving_reasonr"+id).html('कृपया वरील राखण्यात शाळा सोडल्याचे कारण भरा'); $("#schools_leaving_reason"+id).focus();   return false; }
   if(schools_shera==''){ $("#schools_sherar"+id).html('कृपया वरील राखण्यात विध्यार्थ्याची शेरा भरा'); $("#schools_shera"+id).focus(); return false;  }
   if(select_leaving_medium==''){ $("#select_leaving_mediumr"+id).html('Please select medium'); $("#select_leaving_mediumr"+id).focus(); return false;  }
		
		/*$("#submit_leaving_certificate"+id).unbind('submit').bind('submit',function() {
			var formData = new FormData($(this)[0]);
			$.ajax({   
				url: "",
				type: "POST",
				data : formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if(data==1){
					 // window.location='principle-profile';
						return false;
						}else {
				   alert('Not Updated'); 
				return false;
					}
					
				}
			});
			return false;  
		});*/
				
	}
</script>
<?php //include('footer.php');
	
	
	 ?>
<script>
	   
	    function inactivestatus(id){
	var con=confirm('are you sure to the update status !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/principle_status_inactive",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
   	
	
</script>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>
<?php
function userspagings($per_page,$page,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM application_request r inner join  tbl_parent p on p.Ptid=r.sid  where  r.pid='$pid' and (r.app_status='approved' OR r.app_status='received') order by r.arid desc")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}                                           
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}

if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}

$setPaginate.= "</ul>\n";		
}


return $setPaginate;
} 
function userspaignsearchingsfilteration($per_page,$page,$year,$type,$pid){
$page_url="?application_type=".$type."&year=".$year.'&';
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where  r.pid='$pid' and YEAR(`create_date`)='$year' and r. application_for='$type' order by r.arid desc")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}                                                    
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}
if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}
$setPaginate.= "</ul>\n";		
}
return $setPaginate;
}
function userspaignsearchings($per_page,$page,$searchid,$pid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount from  application_request r inner join  tbl_parent p on p.Ptid=r.sid  where (p.Student_name LIKE '%".$searchid."%' OR p.adhar_card LIKE '%".$searchid."%' OR p.Student_roll_no LIKE '%".$searchid."%' OR p.Parent_mobile_no LIKE '%".$searchid."%')  and r.pid='$pid' and (r.app_status='approved' OR r.app_status='received') order by r.arid desc")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}                                                    
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}
if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}
$setPaginate.= "</ul>\n";		
}
return $setPaginate;
} 

 ?>
