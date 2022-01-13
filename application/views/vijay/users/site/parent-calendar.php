<?php if(isset($_SESSION['PARENT_ID'])) {  ?>
	<div class="container main">			
<?php 
$getprincipal_id=$this->db->query("select pid from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
		$pid=$getprincipal_id->pid;
		$expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date'")->result();?>
		
		<?php if(count($tgetquery)>=1){ ?>
		<div class="row">
		<div class="col-md-12">
		 <div class="TickerNews" id="T1">
		    <div class="ti_wrapper">
		        <div class="ti_slide">
		            <div class="ti_content">
		
		<!--<div class="marquee-sibling"></div>-->
			
					<?php foreach($tgetquery as $row){ ?>
						
						 <div class="ti_news"> <?php echo $row->notification_name; ?></div>
						<?php } ?>
				</div></div>
				</div></div></div>
	</div>
	<?php } ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/calendar_style.css" />
<?php
/* Set the default timezone */
date_default_timezone_set("America/Montreal");

/* Set the date */
if((isset($_GET['year'])) && ($_GET['month'])){
$yy=$_GET['year'];
$mm=$_GET['month'];
$date = strtotime(date("$yy-$mm-d"));
}else{
$date = strtotime(date("Y-m-d"));
}
$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);

$firstDay = mktime(0,0,0,$month, 1, $year);
$date1 = $year.'-'.$month.'-01';
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
    $weekDays[] = strftime('%a', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
?>
<style>
.calendartable{
table-layout: fixed; width:100%;
margin-top:10px;
}
@media(max-width:768px){
.calendartable{
table-layout: fixed;
width: 100%;
margin-top: 10px;
margin-right: -52px;
margin-left: 0px;
}
}
</style>
<div class="row">
<div class="col-md-6">
<table class='table table-bordered calendartable' style="">
<?php $student_list=$this->db->query("select *from tbl_parent where ptid='".$_SESSION['PARENT_ID']."'")->result();
      // echo $this->db->last_query();
       $pid=$student_list[0]->pid;
	   $class=$student_list[0]->Student_class_division;
	   $division=$student_list[0]->divsion;
	   $anual_year=$student_list[0]->Student_year;
	   $ptid=$_SESSION['PARENT_ID'];
	   $persent=0; $absent=0; $holiday=0; $halfday=0; $holidays=0;
 ?>
    <tr>
        <th colspan="7" class="text-center" style="color:#FFFFFF;">
		<a href="<?php echo site_url(); ?>attendance_calendar?year=<?php echo date("Y",strtotime($date1.' - 1 Month')); ?>&month=<?php echo date("m",strtotime($date1.' - 1 Month')); ?>" style="color:#FFFFFF;" >&lt;&lt;</a>
		<?php echo $title ?> <?php echo $year ?>
		<a href="<?php echo site_url(); ?>attendance_calendar?year=<?php echo date("Y",strtotime($date1.' + 1 Month')); ?>&month=<?php echo date("m",strtotime($date1.' + 1 Month')); ?>" style="color:#FFFFFF;">&gt;&gt;</a></th>
    </tr>
    <tr style="background-color: #666e6e;color: white;">
        <?php  foreach($weekDays as $key => $weekDay) : ?>
            <td class="text-center"><?php echo $weekDay ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <?php for($i = 0; $i < $blank; $i++): ?>
            <td></td>
        <?php endfor; ?>
        <?php  for($i = 1; $i <= $daysInMonth; $i++): 
		
		 $current_date=$year.'-'.$month.'-'.$i;
		 $getattendancelist=$this->db->query("select *from tbl_attendance where year='$year' and month='$month' and pid='$pid' and divsion='$division' and class_name='$class' and ptid='$ptid' and attendance_date='$current_date'")->result();
		 $child_date_range=$this->db->query("select date1,yid from child_master where date1='".$current_date."' and pid='".$pid."'")->result();
		 if(count($child_date_range)>=1){
		 $aid=$child_date_range[0]->yid;
		  $event_titles=$this->db->query("select event_name from yearly_holiday_master where  yid='".$aid."'")->row();
		  //print_r();
		  //die;
		  }
		
			//$dayOfWeek1 = date('D', strtotime($current_date));
			  $nameOfDay = date('D', strtotime($current_date));
						if($nameOfDay=='Sun'){
		            ?>
			<td style="background-color:#FF0000;color:#FFFFFF" title="Sunday"><?php echo $i; ?></td> 
			<?php }elseif(count($child_date_range)>=1){ $holiday=$holiday+1;
			?>
			<td style="background-color:orange;color:#FFFFFF" title="<?php  echo $event_titles->event_name; ?>"><?php echo $i; ?></td>
              <?php 
			   }elseif(count($getattendancelist)>=1){
			    if($getattendancelist[0]->attendance_status=='P'){  $persent=$persent+1;?>
                <td style="background-color:#006600;color:#FFFFFF" title="Present"><?php echo $i; ?></td>
				<?php }elseif($getattendancelist[0]->attendance_status=='H'){   $halfday=$halfday+1;?>
				 <td style="background-color:#8ad919;color:#FFFFFF" title="HalfDay"><?php echo $i; $holidays=$holidays+1; ?></td>
				    <?php }else{ $absent=$absent+1; ?>
				 <td style="background-color:#FF0000;color:#FFFFFF" title="Absent"><?php echo $i; ?></td>
				<?php } ?>
				<?php }else{ ?>
				 <td><?php echo $i; ?></td>
				<?php } ?>
            <?php if(($i + $blank) % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
        <?php endfor; ?>
        <?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
            <td></td>
        <?php endfor; ?>
    </tr>
</table>
<br />
<div class="row">
<div class="col-md-5"></div>
<div class="col-md-6" style="margin-left:10px;">
<div class="row">
<div class="col-md-3 col-xs-3">
<span title="Your Children <?php echo $absent; ?> Days Abcent" style="background-color:#FF0000; height:40px; width:40px; position:absolute;font-size:20px;color:#FFFFFF; font-weight:bold; padding-left:10px; padding-top:5px;"><?php echo $absent; ?></span>&nbsp;&nbsp;<br /><br />
<span>Absent</span>

</div>
<div class="col-md-3 col-xs-3">
<span title="Your Children <?php echo $persent; ?> Days Persent" style="background-color:#003300; height:40px; width:40px; position:absolute; color:#FFFFFF; font-size:20px; font-weight:bold; padding-left:10px; padding-top:5px;"><?php echo $persent; ?></span>
<br /><br />
<span>Present</span>


</div>
<div class="col-md-3 col-xs-3">
<span title="Your Children <?php echo $halfday; ?> Days Persent" style="background-color:#8ad919; height:40px; width:40px; position:absolute; color:#FFFFFF; font-size:20px; font-weight:bold; padding-left:10px; padding-top:5px;"><?php echo $halfday; ?></span>
<br /><br />
<span>HalfDay</span>


</div>

<div class="col-md-3 col-xs-3">
<span title="<?php echo $holiday; ?> Goverment Holidays" style="background-color:orange; height:40px; width:40px; position:absolute;font-size:20px;color:#FFFFFF; font-weight:bold; padding-left:10px; padding-top:5px;"><?php echo $holiday; ?></span>
<br /><br />
<span>Holiday</span>

<br /><br /><br /><br /><br /><br />
</div>
</div>
</div>
</div>
</div>
<br /><br />
<br /><br /><br /><br />
</div><div class="col-md-4"></div></div>
<?PHP }else{ ?>
<script>
window.location='<?php echo site_url(); ?>';
</script>
<?php } ?>
		