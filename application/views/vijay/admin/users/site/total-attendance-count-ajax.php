<?php $teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
  // echo $this->db->last_query();
  // exit;
           $get_current_date=$attendance_date;
		    $a_class=$teacher_name[0]->schools_name;
		   $Pid=$teacher_name[0]->Pid;
		   $a_division=$teacher_name[0]->divsion;
		   $date=date('Y-m-d');
		  $persent_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$get_current_date' and attendance_status='P'")->result();
		$abscent_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$get_current_date' and attendance_status='A'")->result();
		$Halfdays_stud=$this->db->query("select aid from tbl_attendance where pid='$Pid' and class_name='$a_class' and divsion='$a_division' and attendance_date='$get_current_date' and attendance_status='H'")->result();
		$p_count=count($persent_stud);
		$a_count=count($abscent_stud);
		$h_count=count($Halfdays_stud);
		$total=$p_count+$a_count+$h_count;
		 ?>
<div class="row countclass" id="get_new_data">
		<div class="col-md-1"></div>
<div class="col-md-2 col-xs-6" style="border:2px solid #8e09e7;padding: 6px;background-color: #060;color: white;margin-bottom: 10px;"><strong>Persent:</strong> <?php echo $p_count; ?></div>
		<div class="col-md-2 col-xs-6" style="border: 2px solid #8e09e7;padding: 6px;color: white;background-color: red;"><strong>Absent:</strong> <?php echo $a_count; ?></div>
		<div class="col-md-2 col-xs-6" style="border:2px solid #8e09e7;padding: 6px;color: white;background-color:#a7d919;"><strong>Halfday:</strong> <?php echo $h_count; ?></div>
		<div class="col-md-2 col-xs-6 total-count" style="border:2px solid #8e09e7;padding: 6px;color: white;background-color:#cc4a2c;"><strong>Total:</strong> <?php echo $total; ?></div>
		</div>