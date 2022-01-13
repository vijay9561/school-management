<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="container main">			
		<div class="row">
	
		</div><!--/.row-->
		<div class="row" style="margin-top:10px;">
			<div class="col-lg-12">
				
			</div>
		</div><!--/.row-->
		<script type="text/javascript">
    function printpage()
        {
		var report = document.getElementById('myprintings');
		var printWindow = window.open('','','width=400,height=1000');
		printWindow.document.write(report.innerHTML);       
		printWindow.resizeTo(screen.width, screen.height);
	    printWindow.document.close();
		printWindow.focus();
		//alert(ss);
		printWindow.print();
	    printWindow.close();
	 //  alert( printWindow.document.close()); 
	       var parent_id=$("#parent_id").val();
		   var application_id=$("#application_id").val();
		   var pid=$("#principal_id").val();
	           $.ajax({
				url: "<?php echo site_url() ?>users_controller/submit_nirgam_uttra",
				type: 'POST',
				data: {parent_id:parent_id,application_id:application_id,pid:pid},
				success: function(data) {
				//alert(data);
				}
				});
	 
      }
	
</script>
<?php $id=$_GET['application'];
      $applicate_id=$_GET['applicate_id'];
	      $stud=$this->db->query("select s.Student_name, s.Student_class_division ,s.divsion,s.dob,s.date_of_birth_word,s.gr_code,p.establish_year,p.schools_slogan,p.board_of_director,p.Principle_school_name,p.Principle_schools_image,s.cast,s.sub_cast,s.Subgenre,p.land_line_number,s.Student_year,p.Pid,s.pid,s.mother_name,s.old_schools,s.adhar_card,s.Student_class_division ,s.birth_place from tbl_student_history s inner join tbl_principle p on s.pid=p.Pid where s.adhar_card='$id' order by s.Ptid desc")->row();
		  
		  $asending=$this->db->query("select Student_class_division from tbl_student_history where adhar_card='$id' order by Ptid asc")->row();
		  
		   $nirgam_uttra=$this->db->query("select *from nigram_uttara where request_id='".$applicate_id."'")->row();
		  $application_result=$this->db->query("select id from nigram_uttara where pid='".$stud->Pid."'")->result();
		  $total=count($application_counts)+1;
		   $total_coint=count($application_result)+1;
		 // echo $this->db->last_query();
	    ?>
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_GET['application'] ?>" />
		<input type="hidden" name="application_id" id="application_id" value="<?php echo $_GET['applicate_id'] ?>" />
		<input type="hidden" name="principal_id" id="principal_id" value="<?php echo $stud->Pid; ?>" />
		<div class="col-md-2"><input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary"> 
		   <a href="<?php echo site_url(); ?>clerk-application-request" class="btn btn-danger"> Back</a></div>
		<div class="row">
		
		<div  id="myprintings">
		<div class="col-md-12" style="background-color:#FFFFFF;color: #000;padding:0px 20px; border:1px solid">
<table style="width: 100%;">
<tr>
<td style="width:100px;">नंबर : <?php echo $nirgam_uttra->nirgam_no; ?></td>
<td style="width:100px;"><?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td>

<td><span style="text-align:center;text-align: center;margin-left:0px;margin-top: 0px;padding-top: 10px;padding-bottom: 10px;
font-size: 22px;color: #000; font-weight:bold;margin-left: 63px;"><?php echo $stud->Principle_school_name; ?></span><br />
<span style="text-align:center;text-align: center;margin-left:50px;width: 327px;margin-top: 0px;
font-size: 18px;color: #000; font-weight:bold;margin-left: 170px;">-: प्रवेश निर्गम उतारा  :-</span><br />
<span style="font-weight:bold; margin-left:300px;color:#000; font-size:16px; float:right;">दिनांक :<?php echo date('d.m.Y'); ?></span>
</td>
</tr>
</table>
  <table border="1" style="border-collapse: collapse; width:100%; padding:10px; color:#000;font-size:11px;">
  <tr><th style="padding:5px;">रजिस्टर नं.</th>
  <th style="padding:5px;">विध्यार्थ्याचे पूर्ण नाव </th>
  <th style="padding:5px;">आईचे नाव </th>
  <th style="padding:5px;">धर्म</th>
  <th style="padding:5px;">जात पोटजात</th>
  <th style="padding:5px;">जन्मस्थळ </th>
  <th style="padding:5px;">जन्म तारीख अंकी व अक्षरी </th>
  <th style="padding:5px;"> पूर्वीची शाळा</th>
  <th style="padding:5px;">दाखला दिनांक  </th>
  <th style="padding:5px;">दाखल केलेला वर्ग </th>
  <th style="padding:5px;">प्रगती  </th>
  <th style="padding:5px;">वर्तणूक  </th>
  <th style="padding:5px;">शाळा सोडल्याची तारीख  </th>
   <th style="padding:5px;">इयत्ता व वर्ग सोडल्याचा   </th>
      <th style="padding:5px;">शाळा सोडल्याचे कारण  </th>
      <th style="padding:5px;">शेरा </th>
  </tr>
  <tr style="text-align:center;"><td>१</td><td>२</td><td>३</td><td>४ </td><td>५ </td><td>६ </td><td>7 </td><td>८</td><td>९ </td><td>१० </td><td>११  </td><td>१२ </td><td>१३ </td><td>१४ </td><td>१५ </td><td>१६  </td></tr>
    <tr style="text-align:center; height:100px;">
	<td><?php echo $nirgam_uttra->nirgam_no; ?></td>
	<td><?php echo $stud->Student_name; ?></td>
	<td><?php echo $stud->mother_name; ?></td>
	<td><?php echo $stud->cast; ?></td>
	<td><?php echo $nirgam_uttra->Subgenre; ?> </td>
	<td><?php echo $stud->birth_place; ?></td>
	<td><?php if( $stud->dob=='0000-00-00'){ echo '__.__._____'; }else{ echo date('Y.m.d',strtotime($stud->dob)); }   echo '<br>'.$stud->date_of_birth_word;?></td>
	<td><?php echo $stud->old_schools; ?></td>
	<td><?php echo date('m.d.Y'); ?> </td>
	<td><?php echo  $asending->Student_class_division; ?></td>
	<td><?php echo $nirgam_uttra->student_performance; ?> </td>  
	<td><?php echo $nirgam_uttra->student_behavior; ?></td>
	<td><?php echo $nirgam_uttra->schools_leaving_date; ?> </td>
	<td><?php echo $stud->Student_class_division; ?></td>
	<td><?php echo $nirgam_uttra->schools_leaving_reason; ?></td>
	<td><?php echo $nirgam_uttra->schools_shera; ?></td></tr>
  </table>
  <table style="width:100%;">
  <br /><br />
  <tr><td style="width:600px;"></td><td style="margin-right:100px; font-weight:bold;">लिपिक</td> <td style="margin-left:400px; text-align:right; font-weight:bold;">मुख्याध्यापक </td></tr>
  </table>
</div>

<br />
<div class="col-md-12" style="background-color:#FFFFFF;color: #000; padding:0px 20px; border:1px solid">
<table style="width:100%;">
<tr>
<td style="width:100px;">नंबर : <?php echo $nirgam_uttra->nirgam_no; ?></td>
<td style="width:100px;"><?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td>

<td><span style="text-align:center;text-align: center;margin-left:0px;margin-top: 0px;padding-top: 10px;padding-bottom: 10px;
font-size: 22px;color: #000; font-weight:bold;margin-left: 63px;"><?php echo $stud->Principle_school_name; ?></span><br />
<span style="text-align:center;text-align: center;margin-left:100px;width: 327px;margin-top: 0px;
font-size: 18px;color: #000; font-weight:bold;margin-left: 170px;">-: प्रवेश निर्गम उतारा  :-</span><br />
<span style="font-weight:bold; margin-left:300px;color:#000; font-size:16px; float:right;">दिनांक :<?php echo date('d.m.Y'); ?></span>
</td>
</tr>
</table>
  <table border="1" style="border-collapse: collapse; width:100%; padding:10px; color:#000;font-size:11px;">
  <tr><th style="padding:5px;">रजिस्टर नं.</th>
  <th style="padding:5px;">विध्यार्थ्याचे पूर्ण नाव </th>
  <th style="padding:5px;">आईचे नाव </th>
  <th style="padding:5px;">धर्म</th>
  <th style="padding:5px;">जात पोटजात</th>
  <th style="padding:5px;">जन्मस्थळ </th>
  <th style="padding:5px;">जन्म तारीख अंकी व अक्षरी </th>
  <th style="padding:5px;"> पूर्वीची शाळा</th>
  <th style="padding:5px;">दाखला दिनांक  </th>
  <th style="padding:5px;">दाखल केलेला वर्ग </th>
  <th style="padding:5px;">प्रगती  </th>
  <th style="padding:5px;">वर्तणूक  </th>
  <th style="padding:5px;">शाळा सोडल्याची तारीख  </th>
   <th style="padding:5px;">इयत्ता व वर्ग सोडल्याचा   </th>
      <th style="padding:5px;">शाळा सोडल्याचे कारण </th>
      <th style="padding:5px;">शेरा </th>
  </tr>
  <tr style="text-align:center;"><td>१</td><td>२</td><td>३</td><td>४ </td><td>५ </td><td>६ </td><td>7 </td><td>८</td><td>९ </td><td>१० </td><td>११  </td><td>१२ </td><td>१३ </td><td>१४ </td><td>१५ </td><td>१६  </td></tr>
    <tr style="text-align:center; height:100px;">
	<td><?php echo $nirgam_uttra->nirgam_no; ?></td>
	<td><?php echo $stud->Student_name; ?></td>
	<td><?php echo $stud->mother_name; ?></td>
	<td><?php echo $stud->cast; ?></td>
	<td><?php echo $nirgam_uttra->Subgenre; ?> </td>
	<td><?php echo $stud->birth_place; ?></td>
	<td><?php if( $stud->dob=='0000-00-00'){ echo '__.__._____'; }else{ echo date('Y.m.d',strtotime($stud->dob)); }   echo '<br>'.$stud->date_of_birth_word;?></td>
	<td><?php echo $stud->old_schools; ?></td>
	<td><?php echo date('m.d.Y'); ?> </td>
	<td><?php echo  $asending->Student_class_division; ?></td>
	<td><?php echo $nirgam_uttra->student_performance; ?> </td>  
	<td><?php echo $nirgam_uttra->student_behavior; ?></td>
	<td><?php echo $nirgam_uttra->schools_leaving_date; ?> </td>
	<td><?php echo $stud->Student_class_division; ?></td>
	<td><?php echo $nirgam_uttra->schools_leaving_reason; ?></td>
	<td><?php echo $nirgam_uttra->schools_shera; ?></td></tr>
  </table>
  <table style="width:100%;">
  <br /><br />
  <tr><td style="width:600px;"></td><td style="margin-right:100px; font-weight:bold;">लिपिक</td> <td style="margin-left:400px; text-align:right; font-weight:bold;">मुख्याध्यापक </td></tr>
  </table>
</div>
</div>
<br /><br /><br /><br />
</div>
<br /><br /><br /><br /><br /><br /><br /><br />
</div>
<br /><br /><br /><br />
</body>
</html>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>
 