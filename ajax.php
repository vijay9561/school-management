<?php
$action=$_GET['action'];
if($action=='status-persents'){

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
	  	<input  type="hidden" name="roll_no<?php echo $adhar_card[0]->Ptid; ?>"  name="roll_no<?php echo $row->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_roll_no; ?>" />
		<input  type="hidden" name="anual_year<?php echo $adhar_card[0]->Ptid; ?>"  name="anual_year<?php echo $row->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_year; ?>" />
		<input type="hidden" name="pid<?php echo $adhar_card[0]->Ptid; ?>"  name="pid<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->pid; ?>" />
		<input type="hidden" name="tid<?php echo $adhar_card[0]->Ptid; ?>"  name="tid<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->tid; ?>" />
		<input type="hidden" name="divsion<?php echo $adhar_card[0]->Ptid; ?>"  name="divsion<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->divsion; ?>" />  <input type="hidden" name="class_name<?php echo $adhar_card[0]->Ptid; ?>" name="class_name<?php echo $adhar_card[0]->Ptid; ?>" value="<?php echo $adhar_card[0]->Student_class_division; ?>" />
			
}
 ?>