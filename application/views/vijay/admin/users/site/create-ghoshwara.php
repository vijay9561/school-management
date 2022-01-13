<?php if(isset($_SESSION['TEACHER_ID'])) { 
if((isset($_GET['year'])) && (isset($_GET['month']))){
$month = $_GET['month'];
$year =  $_GET['year'];
}else{
$month = date('m');
$year = date('Y');
}
$start_date = "01-".$month."-".$year;
$start_time = strtotime($start_date);
$end_time = strtotime("+1 month", $start_time);
 ?>
 
 <script>
 function create_ghoswara(){
   year=$("#year").val();
   month=$("#month").val();
   if(year==''){
   alert("Please select year");
   return false;
   }if(month==''){
      alert("Please select month");
    return false 
   }
   window.location='create-ghoswara?year='+year+'&month='+month;
   
 }
  function printpage(){
		var report = document.getElementById('myprintings');
		var printWindow = window.open('','','width=400,height=1000');
		printWindow.document.write(report.innerHTML);       
		printWindow.resizeTo(screen.width, screen.height);
	    printWindow.document.close();
		printWindow.focus();
		//alert(ss);
		printWindow.print();
	    printWindow.close();
      }
 </script>
<div class="container main">			
		<h3 align="center" style="text-decoration:underline;">Create Ghoshwara &nbsp;
		<?php if(isset($_GET['year'])) { ?>
		<input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary"><?php  } ?> </h3>
		<?php if(isset($_GET['year'])){  $te=$this->db->query("select *from tbl_teacher where  Tid='".$_SESSION['TEACHER_ID']."'")->row();
			   $class=$te->schools_name;
			   $pid=$te->Pid;
			   $schools=$this->db->query("select *from tbl_principle where Pid='$pid'")->row();
			   $divsion=$te->divsion;
			      
		    $total_stud=$this->db->query("select  *from tbl_parent  where divsion='$divsion' and Student_class_division='$class'")->result();
			  
			    ?>
		<div class="row" id="myprintings">
		<table border="1" style="border-collapse: collapse; width:100%; padding:10px; color:#000;font-size:14px; padding:20px;">
		<tr><th colspan="17"  align="center" style="text-align:center; font-size:18px; padding:5px;">MONTHLY ATTENDANCE REPORT</th></tr>
		<tr><th colspan="17" style="text-align:center; font-size:18px; padding-left:10px;"><?php echo $schools->Principle_school_name; ?></th></tr>
		<tr><th colspan="2" style="padding-left:10px;">Class & Division</th>
		<th colspan="2" style="padding-left:10px;"><?php echo $class.'('.$divsion.')'; ?></th>
		<th colspan="2" style="padding-left:10px;">Month & Year</th>
		<th colspan="2" style="padding-left:10px;"><?php echo $month.','.$year; ?></th>
		<th colspan="3" style="padding-left:10px;">Teacher Name</th>
		<th colspan="6" style="padding-left:10px;"><?php echo $te->Teacher_name; ?></th>
		</tr>
		<tr><th colspan="6" style="padding-left:10px;">Total Student</th> <th colspan="11" style="padding-left:10px;"><?php echo count($total_stud); ?></th></tr>
		<!--<tr><th style="padding-left:10px;">Class</th>
		<th style="padding-left:10px;"<?php echo $class; ?></th>
		<th style="padding-left:10px;">Division</th>
		<th style="padding-left:10px;" ><?php echo $divsion; ?></th>
		<th style="padding-left:10px;">Year</th>
		<th style="padding-left:10px;" colspan="2"><?php echo $year; ?></th>
		<th style="padding-left:10px;"  colspan="2">Month</th>
		<th style="padding-left:10px;"><?php echo $month; ?></th>
		</tr>-->
		
		<tr>
		 <th style="padding-left:10px;" rowspan="2">Date</th>
		 <th style="padding-left:10px;">Category</th>
		 <th style="padding-left:10px;" colspan="2">Open</th>
		 <th style="padding-left:10px;" colspan="2">SC</th>
		 <th style="padding-left:10px;" colspan="2">OBC</th>
         <th style="padding-left:10px;" colspan="2">ST</th>
		 <th style="padding-left:10px;" colspan="2">NT</th>
		 <th style="padding-left:10px;" colspan="2">VJNT</th>
		 <th style="padding-left:10px;" colspan="2">SBC</th>
		 <th style="padding-left:10px;">Total</th>
		 </tr>
		<tr>
		<th style="padding-left:10px;">Sex</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th style="padding-left:10px;">P</th>
	    <th style="padding-left:10px;">A</th>
		<th></th>
		</tr>
		<?php 
		
		$all_open_male_p='';
		$all_open_female_p='';
		$all_open_male_a='';
		$all_open_female_a='';
		
		$all_sc_male_p='';
		$all_sc_female_p='';
		$all_sc_male_a='';
		$all_sc_female_a='';
		
		$all_obc_male_p='';
		$all_obc_female_p='';
		$all_obc_male_a='';
		$all_obc_female_a='';
		
		$all_st_male_p='';
		$all_st_female_p='';
		$all_st_male_a='';
		$all_st_female_a='';
		
		
		$all_nt_male_p='';
		$all_nt_female_p='';
		$all_nt_male_a='';
		$all_nt_female_a='';
		
		$all_vjnt_male_p='';
		$all_vjnt_female_p='';
		$all_vjnt_male_a='';
		$all_vjnt_female_a='';

        $all_sbc_male_p='';
		$all_sbc_female_p='';
		$all_sbc_male_a='';
		$all_sbc_female_a='';
		
		 for($i=$start_time; $i<$end_time; $i+=86400){  $dd=date('d',$i); 
		 $currentdate=$year.'-'.$month.'-'.$dd;
			   
		    $open_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='OPEN'")->result();
			$all_open_male_p=$all_open_male_p+count($open_male_P);
	//	echo $this->db->last_query();
		
		    $open_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='OPEN'")->result();
			$all_open_male_a=$all_open_male_a+count($open_male_A);
			
            $open_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='OPEN'")->result();
			$all_open_female_p=$all_open_female_p+count($open_female_P);
		    $open_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='OPEN'")->result();
			$all_open_female_a=$all_open_female_a+count($open_female_A);
		  // sc statar
		    $sc_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='SC'")->result();
			$all_sc_male_p=$all_sc_male_p+count($sc_male_P);
		    $sc_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='SC'")->result();
			$all_sc_male_a=$all_sc_male_a+count($sc_male_A);
            $sc_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='SC'")->result(); 
			$all_sc_female_p=$all_sc_female_p+count($sc_female_P); 
		   $sc_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='SC'")->result();
		   $all_sc_female_a=$all_sc_female_a+count($sc_female_A);
		    //OBC Start
		    $obc_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='OBC'")->result();
		   $all_obc_male_p=$all_obc_male_p+count($obc_female_P);
		    $obc_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='OBC'")->result();
			$all_obc_male_a=$all_obc_male_a+count($obc_female_A);
            $obc_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='OBC'")->result();  
			$all_obc_female_p=$all_obc_male_p+count($obc_female_P);
		   $obc_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='OBC'")->result();
		   	$all_obc_female_a=$all_obc_male_a+count($obc_female_A);
		    //ST Start
		    $st_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='ST'")->result();
					   	$all_st_male_p=$all_st_male_p+count($st_male_P);
		    $st_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='ST'")->result();
					$all_st_male_a=$all_st_male_a+count($st_male_A);
            $st_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='ST'")->result(); 
				$all_st_female_p=$all_st_female_p+count($st_male_P); 
		   $st_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='ST'")->result();
		   	$all_st_female_a=$all_st_female_a+count($st_male_A); 
            //NT Start
		    $nt_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='NT'")->result();
				$all_nt_male_p=$all_nt_male_p+count($nt_male_P); 
		    $nt_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='NT'")->result();
			 $all_nt_male_a=$all_nt_male_a+count($nt_male_A);
            $nt_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='NT'")->result();  
			$all_nt_female_p=$all_nt_female_p+count($nt_female_P);
		   $nt_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='NT'")->result();
		   	$all_nt_female_a=$all_nt_female_a+count($nt_female_A);
		   //NT Start
		    $vjnt_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='VJNT'")->result();
			$all_vjnt_male_p=$all_vjnt_male_p+count($vjnt_male_P);
		    $vjnt_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='VJNT'")->result();
			$all_vjnt_male_a=$all_vjnt_male_a+count($vjnt_male_A);
            $vjnt_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='VJNT'")->result();  
			$all_vjnt_female_p=$all_vjnt_female_p+count($vjnt_female_P);
		   $vjnt_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='VJNT'")->result();
		   	$all_vjnt_female_a=$all_vjnt_female_a+count($vjnt_female_A);

  //NT Start
		    $sbc_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='SBC'")->result();
			$all_sbc_male_p=$all_sbc_male_p+count($sbc_male_P);
		    $sbc_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='SBC'")->result();
		  $all_sbc_male_a=$all_sbc_male_a+count($sbc_male_A);
            $sbc_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P' and p.sub_cast='SBC'")->result();  
			 $all_sbc_female_p=$all_sbc_female_p+count($sbc_female_P);
		   $sbc_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A' and p.sub_cast='SBC'")->result();
          $all_sbc_female_a=$all_sbc_female_a+count($sbc_female_A);
		?>
       <tr>
	    <th style="padding-left:10px;"><?php echo date('d-m-Y',strtotime($currentdate)); ?></th>	
	 <th style="padding-left:10px;">M<br />F<br />T</th>		
     <th style="padding-left:10px;"><?php echo count($open_male_P); ?><br /><?php echo count($open_female_P); ?><br /><?php echo count($open_female_P)+count($open_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($open_male_A); ?><br /><?php echo count($open_female_A); ?><br /><?php echo count($open_female_A)+count($open_male_A); ?></th>
	 
	 <th style="padding-left:10px;"><?php echo count($sc_male_P); ?><br /><?php echo count($sc_female_P); ?><br /><?php echo count($sc_female_P)+count($sc_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($sc_male_A); ?><br /><?php echo count($sc_female_A); ?><br /><?php echo count($sc_female_A)+count($sc_male_A); ?></th>
	 
	 <th style="padding-left:10px;"><?php echo count($obc_male_P); ?><br /><?php echo count($obc_female_P); ?><br /><?php echo count($obc_female_P)+count($obc_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($obc_male_A); ?><br /><?php echo count($obc_female_A); ?><br /><?php echo count($obc_female_A)+count($obc_male_A); ?></th>
	 
	  <th style="padding-left:10px;"><?php echo count($st_male_P); ?><br /><?php echo count($st_female_P); ?><br /><?php echo count($st_female_P)+count($st_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($st_male_A); ?><br /><?php echo count($st_female_A); ?><br /><?php echo count($st_female_A)+count($st_male_A); ?></th>
	
	  <th style="padding-left:10px;"><?php echo count($nt_male_P); ?><br /><?php echo count($nt_female_P); ?><br /><?php echo count($nt_female_P)+count($nt_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($nt_male_A); ?><br /><?php echo count($nt_female_A); ?><br /><?php echo count($nt_female_A)+count($nt_male_A); ?></th>
	 
	  <th style="padding-left:10px;"><?php echo count($vjnt_male_P); ?><br /><?php echo count($vjnt_female_P); ?><br /><?php echo count($vjnt_female_P)+count($vjnt_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($vjnt_male_A); ?><br /><?php echo count($vjnt_female_A); ?><br /><?php echo count($vjnt_female_A)+count($vjnt_male_A); ?></th>
	 
	  <th style="padding-left:10px;"><?php echo count($sbc_male_P); ?><br /><?php echo count($sbc_female_P); ?><br /><?php echo count($sbc_female_P)+count($sbc_male_P); ?></th>
	 <th style="padding-left:10px;"><?php echo count($sbc_male_A); ?><br /><?php echo count($sbc_female_A); ?><br /><?php echo count($sbc_female_A)+count($sbc_male_A); ?></th>
	  <?php $sub_total_p=count($open_male_P)+count($open_female_P)+count($sc_male_P)+count($sc_female_P)+ count($obc_male_P)+ count($obc_female_P)+count($st_male_P)+count($st_female_P)+ count($st_male_P)+ count($st_female_P)+count($nt_male_P)+count($nt_female_P)+count($vjnt_male_P)+count($vjnt_female_P)+count($sbc_male_P)+count($sbc_female_P); ?>
	  
	    <?php $sub_total_a=count($open_male_A)+count($open_female_A)+count($sc_male_A)+count($sc_female_A)+ count($obc_male_A)+ count($obc_female_A)+count($st_male_A)+count($st_female_A)+ count($st_male_A)+ count($st_female_A)+count($nt_male_A)+count($nt_female_A)+count($vjnt_male_A)+count($vjnt_female_A)+count($sbc_male_A)+count($sbc_female_A); ?>
	    <th style="padding-left:10px;">Persent: <?PHP echo $sub_total_p; ?><br />Abcent: <?PHP echo $sub_total_a; ?><br />Total: <?PHP echo $sub_total_p+$sub_total_a; ?></th>
		 </tr>
		<?php } ?>
		
		<th style="padding-left:10px;">Grand Total</th>		
       <th style="padding-left:10px;">M<br />F<br />T</th>
		<th style="padding-left:10px;"><?php echo $all_open_male_p; ?><br /><?php echo $all_open_female_p; ?><br /><?php echo $open_p=$all_open_male_p+$all_open_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_open_male_a; ?><br /><?php echo $all_open_female_a; ?><br /><?php echo $open_a=$all_open_male_a+$all_open_female_a; ?></th>
	   <th style="padding-left:10px;"><?php echo $all_sc_male_p; ?><br /><?php echo $all_sc_female_p; ?><br /><?php echo $sc_p=$all_sc_male_p+$all_sc_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_sc_male_a; ?><br /><?php echo $all_sc_female_a; ?><br /><?php echo $sc_a=$all_sc_male_a+$all_sc_female_a; ?></th>	        <th style="padding-left:10px;"><?php echo $all_obc_male_p; ?><br /><?php echo $all_obc_female_p; ?><br /><?php echo $obc_p=$all_obc_male_p+$all_obc_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_obc_male_a; ?><br /><?php echo $all_obc_female_a; ?><br /><?php echo $obc_a=$all_obc_male_a+$all_obc_female_a; ?></th>	
	    <th style="padding-left:10px;"><?php echo $all_st_male_p; ?><br /><?php echo $all_st_female_p; ?><br /><?php echo $st_p=$all_st_male_p+$all_st_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_st_male_a; ?><br /><?php echo $all_st_female_a; ?><br /><?php echo $st_a=$all_st_male_a+$all_st_female_a; ?></th>	
	    <th style="padding-left:10px;"><?php echo $all_nt_male_p; ?><br /><?php echo $all_nt_female_p; ?><br /><?php echo $nt_p=$all_nt_male_p+$all_nt_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_nt_male_a; ?><br /><?php echo $all_nt_female_a; ?><br /><?php echo $nt_a=$all_nt_male_a+$all_nt_female_a; ?></th>	
	 	<th style="padding-left:10px;"><?php echo $all_vjnt_male_p; ?><br /><?php echo $all_vjnt_female_p; ?><br /><?php echo $vjnt_p=$all_vjnt_male_p+$all_vjnt_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_vjnt_male_a; ?><br /><?php echo $all_vjnt_female_a; ?><br /><?php echo $vjnt_a=$all_vjnt_male_a+$all_vjnt_female_a; ?></th>	
	    <th style="padding-left:10px;"><?php echo $all_sbc_male_p; ?><br /><?php echo $all_sbc_female_p; ?><br /><?php echo $sbc_p=$all_sbc_male_p+$all_sbc_female_p; ?></th>
		<th style="padding-left:10px;"><?php echo $all_sbc_male_a; ?><br /><?php echo $all_sbc_female_a; ?><br /><?php echo $sbc_a=$all_sbc_male_a+$all_sbc_female_a; ?></th>	
		<?php $all_persent=$open_p+$sc_p+$obc_p+$st_p+$nt_p+$vjnt_p+sbc_p; ?>
		<?php $all_abcent=$open_a+$sc_a+$obc_a+$st_a+$nt_a+$vjnt_a+sbc_a; ?>
	    <th style="padding-left:10px;">Persent: <?php echo $all_persent; ?><br />Abcent: <?php echo $all_abcent; ?> <br />Total:  <?php echo $all_abcent+$all_persent; ?> </th> 
		</table>
		</div>
		<?php }else {  
           $month=$this->db->query("select *from month_master")->result();
           $year=$this->db->query("select *from year_master")->result();
           ?>
		<div class="row">
		<form method="post" enctype="multipart/form-data">
		<div class="col-md-2"></div>
		<div class="col-md-3">
		<label>Year</label>
		<select type="text" class="form-control" name="year" id="year" required>
		<option value="">Select Year</option>
		<?php foreach($year as $row){ ?>
		<option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="col-md-3">
		<label>Month</label>
		<select type="text" class="form-control" name="month" id="month" required>
		<option value="">Select Month</option>
		<option value="All">All</option>
		<?php foreach($month as $row){ ?>
		<option value="<?php echo $row->month; ?>"><?php echo $row->month_name; ?></option>
		<?php } ?>
		</select>
		</div>
		
		<div class="col-md-2"><br /><input type="button" name="sub" value="Get Report"  onclick="return create_ghoswara()"  class="btn btn-danger" /></div>
</form>
		</div><!--/.row-->
		<?php } ?>
		<!--/.row-->

		<br /><br /><br />
		<br /><Br /><br />
		<br><br>
	</div>
	<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
	