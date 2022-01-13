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
			   $divsion=$te->divsion; ?>
		<div class="row" id="myprintings">
		<table border="1" style="border-collapse: collapse; width:100%; padding:10px; color:#000;font-size:14px; padding:20px;">
		<tr><th colspan="8"  align="center" style="text-align:center; font-size:18px; padding:5px;">MONTHLY ATTENDANCE REPORT</th></tr>
		<tr><th colspan="8" style="text-align:center; font-size:18px; padding-left:10px;"><?php echo $schools->Principle_school_name; ?></th></tr>
		<tr style="padding-left:10px;"><th style="padding-left:10px;">Teacher Name</th>
		<th colspan="7" style="padding-left:10px;"><?php echo $te->Teacher_name; ?></th></tr>
		<tr><th style="padding-left:10px;">Year</th>
		<th style="padding-left:10px;" colspan="3"><?php echo $year; ?></th>
		<th style="padding-left:10px;"  colspan="3">Month</th>
		<th style="padding-left:10px;"><?php echo $month; ?></th></tr>
		
		<tr><th style="padding-left:10px;">Class</th>
		<th style="padding-left:10px;"  colspan="3"><?php echo $class; ?></th>
		<th style="padding-left:10px;" colspan="3">Division</th>
		<th style="padding-left:10px;" ><?php echo $divsion; ?></th></tr>
		<tr><th colspan="4"></th></tr>
		<tr><th style="padding-left:10px;">Date</th><th style="padding-left:10px;" colspan="3">Male</th><th style="padding-left:10px;" colspan="3">Female</th>
		<th style="padding-left:10px;">Total</th></tr>	
		<tr><td></th><th style="padding-left:10px;">P</th>
         <th style="padding-left:10px;">A</th>
		 <th style="padding-left:10px;">Total Male</th>
		 <th style="padding-left:10px;">P</th>
		 <th style="padding-left:10px;">A</th>
		 <th style="padding-left:10px;">Total Female</th>
		 <td></td></tr>
		<?php
		
			 
		//echo $this->db->last_query();
		 $all_total=''; $all_female_a=''; $all_female_p=''; $all_male_p=''; $all_male_p='';
		  $all_males=''; 
		  $all_females='';
		  
		 for($i=$start_time; $i<$end_time; $i+=86400){  $dd=date('d',$i);?>
		<tr><td style="padding-left:10px;"><?php echo $dd.'-'.$month.'-'.$year; 
		 $currentdate=$year.'-'.$month.'-'.$dd;
		  $get_male_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P'")->result();

 $get_male_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Male' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A'")->result();

		  $get_female_P=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='P'")->result();
		  
		  $get_female_A=$this->db->query("select  *from tbl_attendance t inner join tbl_parent p on t.ptid=p.Ptid where p.gender='Female' and t.divsion='$divsion' and t.class_name='$class' and t.attendance_date='$currentdate' and t.attendance_status='A'")->result();
		     // male count
		    $total_males_P=count($get_male_P); 
		    $total_males_A=count($get_male_A); 
			$total_males=$total_male_A+$total_males_P;
			$all_male_p=$all_male_p+$total_males_P;
		    $all_male_a=$all_male_a+$total_males_A;
			$all_males=$all_males+$total_males;
			 // female count
			$total_female_P=count($get_female_P);  
			$total_female_A=count($get_female_A);  
			$total_females=$total_female_P+$total_female_A;
			$all_female_p=$all_female_p+$total_female_P;
		    $all_female_a=$all_female_a+$total_female_A;
			$all_females=$all_females+$total_females;
			
			// subtotal
			$totals_sub=$total_females+$total_males;
			$all_total=$all_total+$totals_sub;
		?>
		<?php 
		  $sunday=date('D',strtotime($currentdate));
		 ?>
		</td>
		
		<td  style="padding-left:10px;"><?php echo $total_males_P; ?></td>
		<td style="padding-left:10px;"><?php echo $total_males_A; ?></td>
		<td style="padding-left:10px;"><?php echo $total_males; ?></td>
		
		<td  style="padding-left:10px;"><?php echo $total_female_P; ?></td>
		<td style="padding-left:10px;"><?php echo $total_female_A; ?></td>
		<td style="padding-left:10px;"><?php echo $total_females; ?></td>
		<td style="padding-left:10px;"><?php echo $totals_sub; ?></td>
		</tr>
		<?php } ?>
		<tr><th style="padding-left:10px;">Grand Total</th>
		<th style="padding-left:10px;"><?php echo $all_male_p; ?></th>
	    <th style="padding-left:10px;"><?php echo $all_male_a; ?></th>
		<th style="padding-left:10px;"><?php echo $all_males; ?></th>
		
        <th style="padding-left:10px;"><?php echo $all_female_p; ?></th>
	    <th style="padding-left:10px;"><?php echo $all_female_a; ?></th>
		<th style="padding-left:10px;"><?php echo $all_females; ?></th>	
	   <th style="padding-left:10px;"><?php echo $all_total; ?></th>
		</tr>
		<tr><td colspan="8"><br /><br /><br />
		<span style="font-weight:bold; float:left; width:250px;">Teacher Signature</span>
		<span style="width:400px; font-weight:bold; text-align:center; margin-left:70px;">Clerk Signature</span>
		<span style="width:200px; font-weight:bold; float:right;">Principal Signature</span>
		</td></tr>
		</table>
		</div>
		<?php }else {  
$month=$this->db->query("select *from month_master")->result();
$year=$this->db->query("select *from year_master")->result();?>
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
	