<?php
$action=$_GET['action'];
if($action=='status-persents'){
$roll_no=$_POST['roll_no'];
$anual_year=$_POST['anual_year'];
$divsion=$_POST['divsion'];
$class_name=$_POST['class_name'];
$attendance_status=$_POST['attendance_status'];
$id=$_POST['id'];
$attendance_date=date('Y-m-d');
$tid=$_POST['tid'];
$pid=$_POST['pid'];
$y=date('Y');
$m=date('m');
$current_date=date('Y-m-d H:i:s');
$tbl_attendance=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where Student_year='".$teacher_name[0]->year."'  and pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
$data='';
if(count($tbl_attendance)>=1){
$insertarray=array('attendance_date'=>$attendance_date);
       $this->db->where('aid',$tbl_attendance[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('roll_no'=>$roll_no,'tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'anual_year'=>$anual_year,'pid'=>$pid,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
?>
	  	<input  type="hidden" name="roll_no<?php echo $adhar_card[0]->Ptid; ?>" name="roll_no<?php echo $row->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_roll_no; ?>" />
		<input  type="hidden" name="anual_year<?php echo $adhar_card[0]->Ptid; ?>" name="anual_year<?php echo $row->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_year; ?>" />
		<input type="hidden" name="pid<?php echo $adhar_card[0]->Ptid; ?>" name="pid<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->pid; ?>" />
		<input type="hidden" name="tid<?php echo $adhar_card[0]->Ptid; ?>" name="tid<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->tid; ?>" />
		<input type="hidden" name="divsion<?php echo $adhar_card[0]->Ptid; ?>" name="divsion<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->divsion; ?>" />  <input type="hidden" name="class_name<?php echo $adhar_card[0]->Ptid; ?>" name="class_name<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_class_division; ?>" />
		<input type="radio" <?php if($tbl_attendance[0]->attendance_status=='P'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $adhar_card[0]->Ptid; ?>" id="attendance_status_p<?php echo $adhar_card[0]->Ptid; ?>" onclick="attendance_status_pr(<?php echo $adhar_card[0]->Ptid; ?>)" value="P" />&nbsp;&nbsp;P
	<input type="radio" <?php if($tbl_attendance[0]->attendance_status=='A'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $adhar_card[0]->Ptid; ?>"     id="attendance_status_a<?php echo $adhar_card[0]->Ptid; ?>"  onclick="attendance_status_ar(<?php echo $adhar_card[0]->Ptid; ?>)" value="A"/>&nbsp;&nbsp;A
<?php  		
}
 ?>