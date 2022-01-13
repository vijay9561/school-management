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
	    
	 
      }
	
</script>
<?php $id=$_GET['application'];
      $applicate_id=$_GET['applicate_id'];
	      $stud=$this->db->query("select s.Student_name, s.Student_class_division ,s.divsion,s.dob,s.date_of_birth_word,s.gr_code,p.establish_year,p.schools_slogan,p.board_of_director,p.Principle_school_name,p.Principle_schools_image,s.cast,s.sub_cast,s.Subgenre,s.Student_profile_picture,p.land_line_number,s.Student_year,p.Pid,s.pid from tbl_parent s inner join tbl_principle p on s.pid=p.Pid where s.Ptid='$id'")->row();
		  $application_counts=$this->db->query("select id from tbl_bonafied where pid='".$stud->Pid."'")->result();
		  $applications=$this->db->query("select bonafied_no from tbl_bonafied where request_id='".$applicate_id."'")->row();
		  $total=count($application_counts)+1;
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
		<div class="col-md-9">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10" style="border: 3px solid #000;border-style: dashed; background-color:#FFFFFF;color: #000; padding:20px;">
<table><tr><td  style="width:100px;font-weight: bold;">शाळा  स्थापना : </td><td><?php echo $stud->establish_year; ?> &nbsp;&nbsp;&nbsp;<span style="text-align:center; margin-left:10px;"><?php echo $stud->schools_slogan; ?></span> <span style="float:right;color: #000"><span style="font-weight: bold;">फोन न.&nbsp;</span> <?php echo $stud->land_line_number; ?></span></td></tr>
<tr><td>
<?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td><td style="width:500px;">
<span style="margin-left:0px;color: #000; font-size:16px;"><?php echo $stud->board_of_director; ?></span><br />
<span style="color: #000; font-weight:bold; font-size:22px;"><?php echo $stud->Principle_school_name; ?>
</span></td><td>
<?php if(!empty($stud->Student_profile_picture)) {?>
<img src="<?php echo  base_url(); ?>assets/student/<?php echo $stud->Student_profile_picture; ?>" style="width:90px; width:90px;" />
<?php }else{ ?>
<img src="<?php echo  base_url(); ?>assets/images/student_icon.jpg" style="width:90px; width:90px;" />
<?php } ?>
</td></tr>
<tr><td>&nbsp;</td><td colspan="2"><span style="text-align:center;text-align: center;margin-left:70px;border: 2px solid #000;width: 327px;margin-top:-10px;padding-top:5px;padding-bottom:5px;
font-size:16px;color: #000; font-weight:bold; padding-left:10px; padding-right:10px;line-height: 2;">शाळा शिकत असल्याचे प्रमाणपत्र</span><br />
<span style="text-align:center;text-align: center;margin-left:70px;width: 327px;margin-top: 0px;
font-size:16px;color: #000; font-weight:bold;">[BONAFIED CERTIFICATE]</span>
</td></tr>
<tr><td><span style="font-size:14px;font-weight:bold;">बोनाफाईड: <?php echo $applications->bonafied_no; ?> </span></td><td style="font-size:14px;"><span style=" margin-left:30px;font-weight:bold;"> प्रवेश क्रमाक : <?php echo $stud->gr_code; ?></span> <span style=" margin-left:150px;font-weight:bold;">  दिनांक  : <?php echo date('d.m.Y'); ?></span></td></tr>
<tr><td colspan="3" style="border-bottom:1px solid #000;"></td></tr>
<tr><td colspan="3" style=""><br /><p style="text-align: justify;color: #000;line-height: 1.7;"><span style="font-size:14px;margin-left:60px;">प्रमाणित करण्यात येते की,</span> <strong style="font-size:14px; text-decoration:underline;">कुमार/कुमारी <?php echo $stud->Student_name; ?> </strong> <span style="font-size:14px;"> हा / ही या</span>
<span style="font-size:14px;margin-left:5px;">शाळेत शैक्षणिक वर्ष </span> <strong style="font-size:14px; text-decoration:underline;"> <?php echo $stud->Student_year; ?></strong> <span style="font-size:14px;"> मध्ये इयत्ता </span> <strong style="font-size:14px; text-decoration:underline;"> 
<?php echo $stud->Student_class_division; if(!empty($stud->Student_class_division)){ echo '('.$stud->divsion.')'; }  ?></strong> <span style="font-size:14px;"> या वर्गामध्ये शिकत आहे.</span>
<span style="font-size:14px;margin-left:5px;">त्याची/ तिची जात </span> <strong style="font-size:14px; text-decoration:underline;">
<?php echo $stud->cast.'&nbsp;'. $stud->Subgenre; ?> </strong> <span style="font-size:14px;"> असून जन्म दिनांक </span>  <strong style="font-size:14px; text-decoration:underline;"><?php if($stud->dob=='0000-00-00'){ }else{ echo date('d.m.Y',strtotime($stud->dob)); } ?></strong> <span style="font-size:14px;"> अक्षरी </span> 

<strong style="font-size:14px; text-decoration:underline; margin-left:5px;"><?php echo $stud->date_of_birth_word;  ?></strong> <span style="font-size:14px;"> ही आमच्या शालेय अभिलेखानुसार बरोबर आहे. </span>
<span style="font-size:14px;margin-left5px;">म्हणून सबब प्रमाणपत्र देण्यात येते ते बरोबर आहे </span></p>
<br />
<span  style="font-size:14px; font-weight:bold;margin-left: 34px;">लिपिक </span> <span  style="font-size:14px; float:right; font-weight:bold;margin-right: 70px;">मुख्याध्यापक  </span>
<br />
  </td></tr>
</table>
</div>
</div>
<br />
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10" style="border: 3px solid #000;border-style: dashed; background-color:#FFFFFF;color: #000; padding:20px;">
<table><tr><td  style="width:100px;font-weight: bold;">शाळा  स्थापना : </td><td><?php echo $stud->establish_year; ?> &nbsp;&nbsp;&nbsp;<span style="text-align:center; margin-left:10px;"><?php echo $stud->schools_slogan; ?></span> <span style="float:right;color: #000"><span style="font-weight: bold;">फोन न.&nbsp;</span> <?php echo $stud->land_line_number; ?></span></td></tr>
<tr><td>
<?php if(empty($stud->Principle_schools_image)){ ?>
<img src="<?php echo base_url(); ?>assets/img/google-my-images.jpg" style="height:80px; width:80px;margin-top: 9px;" />
<?php }else{ ?>
<img src="<?php echo base_url(); ?>assets/profile/<?php echo $stud->Principle_schools_image; ?>" style="height:80px; width:80px;margin-top: 9px;" />
<?php } ?>
</td><td style="width:500px;">
<span style="margin-left:0px;color: #000; font-size:16px;"><?php echo $stud->board_of_director; ?></span><br />
<span style="color: #000; font-weight:bold; font-size:22px;"><?php echo $stud->Principle_school_name; ?>
</span></td><td>
<?php if(!empty($stud->Student_profile_picture)) {?>
<img src="<?php echo  base_url(); ?>assets/student/<?php echo $stud->Student_profile_picture; ?>" style="width:90px; width:90px;" />
<?php }else{ ?>
<img src="<?php echo  base_url(); ?>assets/images/student_icon.jpg" style="width:90px; width:90px;" />
<?php } ?>
</td></tr>
<tr><td>&nbsp;</td><td colspan="2"><span style="text-align:center;text-align: center;margin-left:70px;border: 2px solid #000;width: 327px;margin-top:-10px;padding-top:5px;padding-bottom:5px;
font-size:16px;color: #000; font-weight:bold; padding-left:10px; padding-right:10px;line-height: 2;">शाळा शिकत असल्याचे प्रमाणपत्र</span><br />
<span style="text-align:center;text-align: center;margin-left:70px;width: 327px;margin-top: 0px;
font-size:16px;color: #000; font-weight:bold;">[BONAFIED CERTIFICATE]</span>
</td></tr>
<tr><td><span style="font-size:14px;font-weight:bold;">बोनाफाईड: <?php echo $applications->bonafied_no; ?> </span></td><td style="font-size:14px;"><span style=" margin-left:30px;font-weight:bold;"> प्रवेश क्रमाक : <?php echo $stud->gr_code; ?></span> <span style=" margin-left:150px;font-weight:bold;">  दिनांक  : <?php echo date('d.m.Y'); ?></span></td></tr>
<tr><td colspan="3" style="border-bottom:1px solid #000;"></td></tr>
<tr><td colspan="3" style=""><br /><p style="text-align: justify;color: #000;line-height: 1.7;"><span style="font-size:14px;margin-left:60px;">प्रमाणित करण्यात येते की,</span> <strong style="font-size:14px; text-decoration:underline;">कुमार/कुमारी <?php echo $stud->Student_name; ?> </strong> <span style="font-size:14px;"> हा / ही या</span>
<span style="font-size:14px;margin-left:5px;">शाळेत शैक्षणिक वर्ष </span> <strong style="font-size:14px; text-decoration:underline;"> <?php echo $stud->Student_year; ?></strong> <span style="font-size:14px;"> मध्ये इयत्ता </span> <strong style="font-size:14px; text-decoration:underline;"> 
<?php echo $stud->Student_class_division; if(!empty($stud->Student_class_division)){ echo '('.$stud->divsion.')'; }  ?></strong> <span style="font-size:14px;"> या वर्गामध्ये शिकत आहे.</span>
<span style="font-size:14px;margin-left:5px;">त्याची/ तिची जात </span> <strong style="font-size:14px; text-decoration:underline;">
<?php echo $stud->cast.'&nbsp;'. $stud->Subgenre; ?> </strong> <span style="font-size:14px;"> असून जन्म दिनांक </span>  <strong style="font-size:14px; text-decoration:underline;"><?php if($stud->dob=='0000-00-00'){ }else{ echo date('d.m.Y',strtotime($stud->dob)); } ?></strong> <span style="font-size:14px;"> अक्षरी </span> 

<strong style="font-size:14px; text-decoration:underline; margin-left:5px;"><?php echo $stud->date_of_birth_word;  ?></strong> <span style="font-size:14px;"> ही आमच्या शालेय अभिलेखानुसार बरोबर आहे. </span>
<span style="font-size:14px;margin-left5px;">म्हणून सबब प्रमाणपत्र देण्यात येते ते बरोबर आहे </span></p>
<br />
<span  style="font-size:14px; font-weight:bold;margin-left: 34px;">लिपिक </span> <span  style="font-size:14px; float:right; font-weight:bold;margin-right: 70px;">मुख्याध्यापक  </span>
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
 