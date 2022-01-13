<?php if(isset($_SESSION['PRINCIPLE_ID'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leaving Certificate</title>
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
	      /* var parent_id=$("#parent_id").val();
		   var application_id=$("#application_id").val();
		   var pid=$("#principal_id").val();
	           $.ajax({
				url: "<?php echo site_url() ?>users_controller/submit_leaving_printings",
				type: 'POST',
				data: {parent_id:parent_id,application_id:application_id,pid:pid},
				success: function(data) {
				//alert(data);
				}
				});*/
	 
      }
	
</script>
<?php $id=$_GET['application'];
          $applicate_id=$_GET['applicate_id'];
	      $stud=$this->db->query("select *from tbl_student_history s inner join tbl_principle p on s.pid=p.Pid where s.adhar_card='$id' order by s.Ptid desc")->row();
		  $application_result=$this->db->query("select id from leaving_certificate where pid='".$stud->Pid."'")->result();
		  $get_leaving_data=$this->db->query("select *from leaving_certificate where request_id='$applicate_id'")->row();
		  $total=count($application_counts)+1;
		  $total_coint=count($application_result)+1;
		   $stud1=$this->db->query("select *from tbl_student_history where adhar_card='$id' order by Ptid desc")->row();
		 // echo $this->db->last_query();
	    ?>
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_GET['application'] ?>" />
		<input type="hidden" name="application_id" id="application_id" value="<?php echo $_GET['applicate_id'] ?>" />
		<input type="hidden" name="principal_id" id="principal_id" value="<?php echo $stud->Pid; ?>" />
		<div class="col-md-2"><input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary"> 
		   <a href="<?php echo site_url(); ?>clerk-application-request" class="btn btn-danger"> Back</a></div>
		<div class="row">
		
		<div  id="myprintings">
		<div class="col-md-12" style="background-color:#FFFFFF;color: #000; padding:20px; border:1px solid #000;"><br />
<table>
<tr><td colspan="2" style="margin-left:210px;"><span style="margin-left:140px; font-size:12px; color:#FF0000;line-height: 2;">
सूचना: हे प्रमाणपत्र देणाऱ्या अधिकाऱ्या व्यतिरिक्त अन्य कोणीही या प्रमाणपत्रात कोणताही बदल 
करू </span><br/><span style="margin-left:180px; font-size:12px; color:#FF0000;">नये. अनधिकृत बदल केल्यास विध्यार्थ्याला पुढील शिक्षणास आयोग्य ठरविन्यात येईल.  </span><br />
     <span style="margin-left:240px; font-size:12px; color:#FF0000;">(नियम १७ व ३२ प्रकरण II विभाग II प्रमाणे)</span>
  </td></tr>
<tr>
<td style="width:100px;"><?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height: 103px;width: 111px;margin-top: -83px;margin-left:12px"/>
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height: 103px;width: 111px;margin-top: -83px;margin-left:12px" />
<?php } ?>
</td>
<td style="margin-left:100px;">
<span style="text-align:center;text-align: center;margin-left:30px;margin-top: 0px;padding-top: 10px;padding-bottom:0px;
font-size: 15px;color: #326cd1; font-weight:bold; padding-bottom:0px;"><?php echo $stud->board_of_director; ?></span><br />
<span style="text-align:center;text-align: center;margin-left:30px;margin-top: 0px;padding-top:2px;padding-bottom:0px;
font-size: 19px;color: #FF0000; font-weight:bold;"><?php echo $stud->Principle_school_name; ?></span>
<span><br /><br />
<span style="color:#326cd1; font-size:14px;color: #326cd1;font-size: 15px;margin-left: -104px;"><strong>स्थापना: </strong><?php echo $stud->establish_year; ?></span>
<span style="color:#326cd1; font-size:14px;color: #326cd1;font-size: 15px;margin-left:150px;"><strong>जी.</strong><?php echo $stud->Principle_schools_city; ?></span>
<span style="color:#326cd1; font-size:14px;color: #326cd1;font-size: 15px;margin-left:100px;"><strong>U.Dise Code: </strong><?php echo $stud->reg_no; ?></span>
<br /><br />
</td>
</tr>
<tr><td colspan="2" style="text-align:center; margin-left:100px; margin-bottom:2px;"><span style="border: 1px solid #000;
    padding: 7px;
    font-size: 20px;
    color: #FF0000;
    border-radius: 10px;
    padding-right: 40px;
    padding-left: 40px;
    margin-top: 16px; margin-bottom:100px;">शाळा सोडण्याचे प्रमाण पत्र </span><br /><br /></td></tr>

<td colspan="2" style="margin-top:10px;">
<span style="color:#000;margin-left:50px;padding-top:10px;"><strong>प्रवेश क्रमांक: </strong><?php echo $stud->gr_code; ?></span> 
<span style="color:#000; margin-left: 47px;padding-top:10px;"><strong>प्रमाणपत्र क्रमांक: </strong><?php echo $total_coint; ?></span> 
<span style="color:#000;margin-left:100px;padding-top:10px;"><strong>दि. </strong><?php echo date('m.d-Y'); ?></span>

</td></tr>
</table>
  <table border="1" style="border-collapse: collapse; width:100%; padding:10px; color:#000;padding:10px;">
  <tr><td align="center" style="width:50px;padding:4px;">1</td>
  <td  colspan="2" style="padding-left:30px;width:200px;">स्टुडट आय. डी.नंबर   </td><td style="    padding-left: 20px;"><?php echo $stud->student_id_no; ?></td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">2</td><td colspan="2" style="padding-left:30px;width:200px;">यु आय. डी.नंबर   </td><td style="    padding-left: 20px;"><?php echo $stud->u_id_no; ?></td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">3</td><td colspan="2" style="padding-left:30px;width:200px;">विध्यार्थ्याचे संपूर्ण नाव </td><td style="    padding-left: 20px;"><?php echo $stud->Student_name; ?></td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">4</td><td colspan="2" style="padding-left:30px;width:200px;">आईचे नाव </td><td style="    padding-left: 20px;">
  <?php echo $stud->mother_name; ?>
  </td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">5</td><td colspan="2" style="padding-left:30px;width:200px;">धर्म व जात(उपजातीसह)   </td><td style="    padding-left: 20px;">
  <?php echo $stud->cast; ?>  (<?php echo $stud->Subgenre; ?>)
  </td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">6</td><td  colspan="2" style="padding-left:30px;width:200px;">राष्ट्रीयत्व </td><td style="    padding-left: 20px;"><?php echo $stud->nationality; ?></td></tr>
  <tr><td align="center" style="width:50px;padding:4px;">7</td><td colspan="2" style="padding-left:30px;width:200px;">जन्मस्थळ </td><td style="    padding-left: 20px;"><?php echo $stud->birth_place; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;" rowspan="2">8</td><td rowspan="2" style="padding-left:30px;width:200px;">जन्म दिनांक  </td><td style="padding-left:10px;width:50px;padding:4px;">अंकी </td><td style="    padding-left: 20px;"><?php echo $stud1->dob; ?></td></tr>
  <tr><td style="padding-left:10px;width:50px;padding:4px;">अक्षरी</td><td style="    padding-left: 20px;"> <?php echo $stud->date_of_birth_word; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;">9</td><td colspan="2" style="padding-left:30px;width:200px;">पूर्वीची शाळा </td><td style="    padding-left: 20px;"><?php echo $stud->old_schools; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;">10</td><td colspan="2" style="padding-left:30px;width:200px;">प्रवेश दिनांक </td><td style="    padding-left: 20px;"><?php echo $stud->admission_date; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;">11</td><td colspan="2" style="padding-left:30px;width:200px;">प्रगती </td>
<td style= "padding-left: 20px;"><?php echo $get_leaving_data->student_performance; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;">12</td><td colspan="2" style="padding-left:30px;width:200px;">वर्तणूक  </td><td  style="    padding-left: 20px;">
<?php echo $get_leaving_data->student_behavior; ?>
</td></tr>
<tr><td align="center" style="width:50px;padding:4px;">13</td><td colspan="2" style="padding-left:30px;width:200px;">शाळा सोडल्याची दिनांक  </td><td style="    padding-left: 20px;">
<?php echo $get_leaving_data->schools_leaving_date; ?></td></tr>
<tr><td align="center" style="width:50px;padding:4px;">14</td><td colspan="2" style="padding-left:30px;width:200px;">शाळा सोडतावेळेची इयत्ता केंव्हापासून  </td><td style="    padding-left: 20px;">
<?php echo $get_leaving_data->schools_leaving_year; ?>
</td></tr>
<tr><td align="center" style="width:50px;padding:4px;">15</td><td colspan="2" style="padding-left:30px;width:200px;">शाळा सोडल्याचे कारण  </td><td style="    padding-left: 20px;">
<?php echo $get_leaving_data->schools_leaving_reason; ?>
</td></tr>
<tr><td align="center" style="width:50px;padding:4px;">16</td><td colspan="2" style="padding-left:30px;width:200px;">शेरा</td><td style="    padding-left: 20px;">
<?php echo $get_leaving_data->schools_shera; ?>
</td></tr>
  </table>
  <P style="margin-top:10px; color:#000;">शाळेच्या प्रवेश पंजीके प्रमाणे वरील सर्व माहिती खरी असल्याचे प्रमाणित केले आहे .</P>
  <table style="width:80%;">
  <br />
  <tr><td style="margin-right:100px; font-weight:bold; text-align:right">लेखनिक</td><td style="margin-left:200px; font-weight:bold; text-align:right;">कार्यालय प्रमुख  </td> <td style="margin-left:100px; font-weight:bold; text-align:right;">मुख्याध्यापक </td></tr>
  </table>
</div>
<br /><br /><br /><br />
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
 