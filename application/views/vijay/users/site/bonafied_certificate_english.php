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
	      /* var parent_id=$("#parent_id").val();
		   var application_id=$("#application_id").val();
		   var pid=$("#principal_id").val();
	           $.ajax({
				url: "<?php echo site_url() ?>users_controller/submit_bonafied_student_data",
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
	      $stud=$this->db->query("select s.Student_name, s.Student_class_division ,s.divsion,s.dob,s.date_of_birth_word,s.gr_code,p.establish_year,p.schools_slogan,p.board_of_director,p.Principle_school_name,p.Principle_schools_image,s.cast,s.sub_cast,s.Subgenre,s.Student_profile_picture,p.land_line_number,s.Student_year,p.Pid,s.pid from tbl_parent s inner join tbl_principle p on s.pid=p.Pid where s.Ptid='$id'")->row();
		  $applications=$this->db->query("select bonafied_no from tbl_bonafied where request_id='".$applicate_id."'")->row();
		  
		 // $total=count($application_counts)+1;
		 // echo $this->db->last_query();
	    ?>
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_GET['application'] ?>" />
		<input type="hidden" name="application_id" id="application_id" value="<?php echo $_GET['applicate_id'] ?>" />
		<input type="hidden" name="principal_id" id="principal_id" value="<?php echo $stud->Pid; ?>" />
		<div class="row">
		<div class="col-md-2"><input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary"> 
		   <a href="<?php echo site_url(); ?>clerk-application-request" class="btn btn-danger"> Back</a></div>
		<div  id="myprintings">
		
				<br /><br /><br /><br /><br />
		<div class="col-md-10">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10" style="border: 3px solid #000;border-style: dashed; background-color:#FFFFFF;color: #000; padding:20px;">
<table><tr><td  style="width:100px;font-weight: bold;">Since : </td><td><?php echo $stud->establish_year; ?> &nbsp;&nbsp;&nbsp;<span style="text-align:center; margin-left:10px;"><?php echo $stud->schools_slogan; ?></span> <span style="float:right;color: #000"><span style="font-weight: bold;">Phone No.&nbsp;</span> <?php echo $stud->land_line_number; ?></span></td></tr>
<tr><td>
<?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td><td style="width:500px;">
<span style="margin-left:0px;color: #000; font-size:16px;"><?php echo $stud->board_of_director; ?></span><br />
<span style="color: #000; font-weight:bold; font-size:22px;"><?php echo $stud->Principle_school_name; ?></span></td>
<td>
<?php if(!empty($stud->Student_profile_picture)) {?>
<img src="<?php echo  base_url(); ?>assets/student/<?php echo $stud->Student_profile_picture; ?>" style="width:90px; width:90px;" />
<?php }else{ ?>
<img src="<?php echo  base_url(); ?>assets/images/student_icon.jpg" style="width:90px; width:90px;" />
<?php } ?>
</td>
</tr>
<tr><td>&nbsp;</td><td colspan="2">
<span style="text-align:center;text-align: center;margin-left:70px;width: 327px;margin-top: 0px;
font-size:16px;color: #000; font-weight:bold;">[BONAFIED CERTIFICATE]</span>
</td></tr>
<tr><td style="width: 150px;"><span style="font-size:14px;font-weight:bold;">Bonafied No: <?php echo $applications->bonafied_no; ?> </span></td><td style="font-size:14px;"><span style=" margin-left:30px;font-weight:bold;"> Admission No : <?php echo $stud->gr_code; ?></span> <span style=" margin-left:150px;font-weight:bold;">  Date  : <?php echo date('d.m.Y'); ?></span></td></tr>
<tr><td colspan="3" style="border-bottom:1px solid #000;"></td></tr>
<tr><td colspan="3" style=""><br /><p style="text-align: justify;color: #000;line-height: 1.7;"><span style="font-size:14px;margin-left:60px;">This is to certify that,</span> <strong style="font-size:14px; text-decoration:underline;">son/daughter: <?php echo $stud->Student_name; ?> </strong> <span style="font-size:14px;"> Bonafied student this school and studying / studied in </span>
 <strong style="font-size:14px; text-decoration:underline;"> </strong> <span style="font-size:14px;"></span> <strong style="font-size:14px; text-decoration:underline;"> 
<?php echo $stud->Student_class_division; if(!empty($stud->Student_class_division)){ echo '('.$stud->divsion.')'; }  ?></strong> <span style="font-size:14px;"> during the academic year <strong style="text-decoration:underline;"><?php echo $stud->Student_year; ?>.</strong></span>
<span style="font-size:14px;margin-left:5px;">His/ Her Subcaste</span> <strong style="font-size:14px; text-decoration:underline;">
<?php echo $stud->cast.'&nbsp;'. $stud->Subgenre; ?> .</strong> <span style="font-size:14px;"> His/Her Date of Birth as per our records is</span>  <strong style="font-size:14px; text-decoration:underline;"><?php if($stud->dob=='0000-00-00'){ }else{ echo date('d.m.Y',strtotime($stud->dob)); } ?></strong> <span style="font-size:14px;"> In Words </span> 

<strong style="font-size:14px; text-decoration:underline; margin-left:5px;"><?php echo $stud->date_of_birth_word;  ?></strong> <span style="font-size:14px;"> This is right according to our school records. </span>
<span style="font-size:14px;margin-left5px;">Therefore, it is a good certification that it is correct</span></p>
<br />
<span  style="font-size:14px; font-weight:bold;margin-left: 34px;">Clerk </span> <span  style="font-size:14px; float:right; font-weight:bold;margin-right: 70px;">HeadMaster  </span>
<br />
  </td></tr>
</table>
</div>
</div>
<br />
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10" style="border: 3px solid #000;border-style: dashed; background-color:#FFFFFF;color: #000; padding:20px;">
<table><tr><td  style="width:100px;font-weight: bold;">Since : </td><td><?php echo $stud->establish_year; ?> &nbsp;&nbsp;&nbsp;<span style="text-align:center; margin-left:10px;"><?php echo $stud->schools_slogan; ?></span> <span style="float:right;color: #000"><span style="font-weight: bold;">Phone No.&nbsp;</span> <?php echo $stud->land_line_number; ?></span></td></tr>
<tr><td>
<?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td><td style="width:500px;">
<span style="margin-left:0px;color: #000; font-size:16px;"><?php echo $stud->board_of_director; ?></span><br />
<span style="color: #000; font-weight:bold; font-size:22px;"><?php echo $stud->Principle_school_name; ?></span></td>
<td>
<?php if(!empty($stud->Student_profile_picture)) {?>
<img src="<?php echo  base_url(); ?>assets/student/<?php echo $stud->Student_profile_picture; ?>" style="width:90px; width:90px;" />
<?php }else{ ?>
<img src="<?php echo  base_url(); ?>assets/images/student_icon.jpg" style="width:90px; width:90px;" />
<?php } ?>
</td>
</tr>
<tr><td>&nbsp;</td><td colspan="2">
<span style="text-align:center;text-align: center;margin-left:70px;width: 327px;margin-top: 0px;
font-size:16px;color: #000; font-weight:bold;">[BONAFIED CERTIFICATE]</span>
</td></tr>
<tr><td style="width: 150px;"><span style="font-size:14px;font-weight:bold;">Bonafied No: <?php echo $applications->bonafied_no; ?> </span></td><td style="font-size:14px;"><span style=" margin-left:30px;font-weight:bold;"> Admission No : <?php echo $stud->gr_code; ?></span> <span style=" margin-left:150px;font-weight:bold;">  Date  : <?php echo date('d.m.Y'); ?></span></td></tr>
<tr><td colspan="3" style="border-bottom:1px solid #000;"></td></tr>
<tr><td colspan="3" style=""><br /><p style="text-align: justify;color: #000;line-height: 1.7;"><span style="font-size:14px;margin-left:60px;">This is to certify that,</span> <strong style="font-size:14px; text-decoration:underline;">Son/Daughter: <?php echo $stud->Student_name; ?> </strong> <span style="font-size:14px;"> Bonafied student this school and studying / studied in </span>
 <strong style="font-size:14px; text-decoration:underline;"> </strong> <span style="font-size:14px;"></span> <strong style="font-size:14px; text-decoration:underline;"> 
<?php echo $stud->Student_class_division; if(!empty($stud->Student_class_division)){ echo '('.$stud->divsion.')'; }  ?></strong> <span style="font-size:14px;"> during the academic year <strong style="text-decoration:underline;"><?php echo $stud->Student_year; ?>.</strong></span>
<span style="font-size:14px;margin-left:5px;">His/ Her Subcaste</span> <strong style="font-size:14px; text-decoration:underline;">
<?php echo $stud->cast.'&nbsp;'. $stud->Subgenre; ?> .</strong> <span style="font-size:14px;"> His/Her Date of Birth as per our records is</span>  <strong style="font-size:14px; text-decoration:underline;"><?php if($stud->dob=='0000-00-00'){ }else{ echo date('d.m.Y',strtotime($stud->dob)); } ?></strong> <span style="font-size:14px;"> In Words </span> 

<strong style="font-size:14px; text-decoration:underline; margin-left:5px;"><?php echo $stud->date_of_birth_word;  ?></strong> <span style="font-size:14px;"> This is right according to our school records. </span>
<span style="font-size:14px;margin-left5px;">Therefore, it is a good certification that it is correct</span></p>
<br />
<span  style="font-size:14px; font-weight:bold;margin-left: 34px;">Clerk </span> <span  style="font-size:14px; float:right; font-weight:bold;margin-right: 70px;">HeadMaster  </span>
<br />
  </td></tr>
</table>
</div>
</div>
</div></div>
<br /><br /><br /><br />
<div class="col-md-2"></div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br />
</div>
<br /><br /><br /><br />
</body>
</html>
<?PHP }else{ ?>
<script>window.location='<?php echo site_url(); ?>';</script>
<?php } ?>
 