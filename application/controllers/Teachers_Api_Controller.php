<?php 
class Teachers_Api_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');
    }
public function teacher_login_api(){
   $Teacher_email=$this->input->post('Teacher_email');
   $Teacher_password=$this->input->post('Teacher_password');
 $query=$this->db->query("select *from tbl_teacher where Teacher_email='".$Teacher_email."' and Teacher_password='".$Teacher_password."' and status='active'")->row();
 //echo $this->db->last_query();
 //echo count($query);
 //exit;
 if(count($query)==1){
     $result_data=array('success'=>'Success Full Login','Teacher_email'=>$query->Teacher_email,'Teacher_password'=>$query->Teacher_password,'Teacher_Name'=>$query->Teacher_name,'Teacher_mobile_no'=>$query->Teacher_mobile_no,'class_name'=>$query->schools_name,'division'=>$query->divsion,'adhar_card'=>$query->adhar_card,'Principal_ID'=>$query->Pid,'Teacher_Id'=>$query->Tid);
	  echo json_encode($result_data);
     }else{
	    $erromsg=array('success'=>'Email ID & Password Incorrect');
	   echo json_encode($erromsg);
	 }
   }
public function view_student_api(){
$division=$this->input->post('division');
$class=$this->input->post('class');
$pid=$this->input->post('pid');
$mysqluery=$this->db->query("select *from tbl_parent where divsion='".$division."' and Student_class_division='".$class."'  and pid='".$pid."' order by Student_Name asc")->result();
//echo $this->db->last_query();
$array =array();
if(count($mysqluery)>=1){
foreach($mysqluery as $rows){
     $array[]=array('parent_id'=>$rows->Ptid,'adhar_card'=>$rows->adhar_card,'teacher_id'=>$rows->tid,'pid'=>$rows->pid,'Student_Name'=>$rows->Student_name,'Roll_No'=>$rows->Student_roll_no,'Student_year'=>$rows->Student_year,'class'=>$rows->Student_class_division,'division'=>$rows->divsion,'Mobile_No'=>$rows->Parent_mobile_no,'DOB'=>$rows->dob,'pan_card'=>$rows->pan_no,'Address'=>$rows->address,'old_schools'=>$rows->old_schools,'acount_no'=>$rows->account_no,'bank_name'=>$rows->bank_no,'ifsc_code'=>$rows->ifc_code,'mother_name'=>$rows->mother_name,'residential_address'=>$rows->redensital_address,'caste'=>$rows->cast,'sub_caste'=>$rows->sub_cast,'gender'=>$rows->gender);
    }
	$result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
   }else{
       $array=array('success'=>'No Result Found');
    echo json_encode($array);
     }
   }
public function schools_time_table_api(){
$division=$this->input->post('division');
$class=$this->input->post('class');
$pid=$this->input->post('pid');
$mysl_query=$this->db->query("select *from schools_time_table st inner join school_time_table_master stt on stt.sttmid=st.sttmid where  stt.pid='".$pid."' and stt.class='$class' and stt.division='$division' order by st.sttid asc")->result();
$array=array();
if(count($mysl_query)>=1){
foreach($mysl_query as $rows){
 $array[]=array('division'=>$rows->division,'class'=>$rows->class,'pid'=>$rows->pid,'time'=>$rows->time,'monday'=>$rows->mon,'tuesday'=>$rows->tue,'wednesday'=>$rows->wed,   'thursday'=>$rows->Thu,'friday'=>$rows->Fir,'Staturday'=>$rows->Stu);
   }
    $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
}else{
       $array=array('success'=>'No Result Found');
    echo json_encode($array);
    }
  }	
  
  public function schools_examination_time_table_api(){
$division=$this->input->post('division');
$class=$this->input->post('class');
$pid=$this->input->post('pid');
$mysl_query=$this->db->query("SELECT *FROM exam_master ex INNER JOIN exam_type_master et ON et.exid=ex.exid WHERE ex.pid='$pid' AND ex.division='$division' AND ex.class='$class'")->result();
$array=array();
if(count($mysl_query)>=1){
foreach($mysl_query as $row){
  $array[]=array('exam_name'=>$row->exam_name,'pid'=>$row->pid,'division'=>$row->division,'year'=>$row->year,'day'=>$row->day,'subject'=>$row->subject,'exam_date'=>$row->exam_date,'subject_code'=>$row->subject_code,'start_time'=>$row->time_from,'end_time'=>$row->time_to);
 }
//  echo json_encode($array);
$result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
   }else{
     $array=array('success'=>'No Result Found');
    echo json_encode($array);
   }
  }	 

public function add_notfication_select_dropdown_student_list_api(){
$division=$this->input->post('division');
$class=$this->input->post('class');
$pid=$this->input->post('pid');
$mysl_query=$this->db->query("select Ptid,Student_name,adhar_card from tbl_parent where pid='$pid' and Student_class_division='$class' and divsion='$division' and Status='active'")->result();
$array=array();
foreach($mysl_query as $row){
   $array[]=array('parent_id'=>$row->Ptid,'Student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card);
}
 // echo json_encode($array);
 $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
  }	 
  
  public function add_new_notifications_for_student_api(){
     $stid=$this->input->post('parent_id');
	 $pid=$this->input->post('pid');
	 $division=$this->input->post('division');
	 $class=$this->input->post('class');
	  $date=date('Y-m-d H:i:s');
	 $notification_description1=urldecode($this->input->post('notification_description'));
	 $notification_description=urldecode($notification_description1);
	 if($stid=='All'){
	  $addusers=array('notification_description'=>$notification_description,'status'=>'active','date1'=>$date,'notification_type'=>'common','pid'=>$pid,'class_name'=>$class,'division'=>$division);
	 $result=$this->db->insert('notification',$addusers);
	  }else{
	// echo $notification_description;
	// exit;
	 $get=$this->db->query("select *from tbl_parent where Ptid='$stid'")->row();
	 $pid=$get->pid; 
	 $Student_name=$get->Student_name; 
	 $class=$get->Student_class_division; 
	 $div=$get->divsion; 
	 $roll=$get->Student_roll_no;
	 $ptid=$get->Ptid;
	 $adhar_card=$get->adhar_card;
	 $addusers=array('sid'=>$ptid,'notification_description'=>$notification_description,'status'=>'active','date1'=>$date,'notification_type'=>'individual','pid'=>$pid,'class_name'=>$class,'division'=>$div,'student_name'=>$Student_name,'adhar_card'=>$adhar_card,'roll_no'=>$roll);
	 $result=$this->db->insert('notification',$addusers);
	 }
	 if($result==true){
	 $array=array('success'=>'Notification Addedd Successfully');
	 echo json_encode($array);
	  }else{
	  $array=array('success'=>'Notification Not Inserted Successfully');
	   echo json_encode($array);
	  }
   } 
   public function update_notifications_individaul_api(){
        $notification_description1=$this->input->post('notification_description');
		$notification_description=urldecode($notification_description1);
		$notification_id=$this->input->post('notification_id');	 
       $array=array('notification_description'=>$notification_description);
	   $this->db->where('nid',$notification_id);
	  $result= $this->db->update('notification',$array);
	    if($result==true){
		 $array=array('success'=>'Notification updated Successfully');
	   echo json_encode($array);
	  }else{
	  $array=array('success'=>'Notification Not updated Successfully');
	   echo json_encode($array);
	  }
    }
public function update_view_notification_individual_data_api(){
    $nid=$this->input->post('notification_id');
   	$row=$this->db->query("select nid,notification_description from notification where nid='$nid'")->row();
	//ssecho $this->db->last_query();
	$array=array('success'=>"true",'nid'=>$row->nid,'notification_description'=>$row->notification_description);
	echo json_encode($array);
  }
public function view_all_notification_in_table_form_api(){
    $division=$this->input->post('division');
	$class=$this->input->post('class');
	$pid=$this->input->post('pid');
	
   $mysqlquery=$this->db->query("select *from notification where division='".$division."' and class_name='".$class."' and pid='".$pid."'  order by nid desc")->result();
   //echo $this->db->last_query();
   $array=array();
   if(count($mysqlquery)>=1){
   foreach($mysqlquery as $row){
      $array[]=array('notification_description'=>$row->notification_description,'date'=>$row->date1,'notification_type'=>$row->notification_type,'pid'=>$row->pid,'class'=>$row->class_name,'division'=>$row->division,'student_name'=>$row->student_name,'adhar_card'=>$row->adhar_card,'roll_no'=>$row->roll_no,'nid'=>$row->nid);
    }
 //  echo json_encode($array);
  $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
	}else{
	  $array=array('success'=>'No Result Found');
    echo json_encode($array);
	}
  }
public function view_header_images_and_header_names_api(){
    $pid=$this->input->post('pid');
  $result=$this->db->query("select Principle_schools_image,Principle_school_name from tbl_principle where Pid='$pid'")->row();
  $array=array('School_Image'=>$result->Principle_schools_image,'Schools_Name'=>$result->Principle_school_name);
//  echo json_encode($array);
$result_data=array('success'=>true,'result'=>$array);
    echo json_encode($result_data);
  } 
public function student_attendance_api(){
 $roll_no=$this->input->post('roll_no');
$divsion=$this->input->post('division');
$class_name=$this->input->post('class');
$attendance_status=$this->input->post('attendance_status');
$attendance_date=$this->input->post('attendance_date');
$parent_id=$this->input->post('parent_id');
$teacher_id=$this->input->post('teacher_id');
$pid=$this->input->post('pid');
 $extract_date = DateTime::createFromFormat("Y-m-d", $attendance_date);
$y=$extract_date->format("Y");
$m=$extract_date->format("m");
$current_date=date('Y-m-d H:i:s');
$tbl_attendance1=$this->db->query("select *from tbl_attendance where  ptid='$parent_id' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."'")->result();
if(count($tbl_attendance1)>=1){
    $insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
	   $array=array('success'=>'attendance updated successfully');
	  echo json_encode($array);
     }else{
	 $insertarray=array('roll_no'=>$roll_no,'tid'=>$teacher_id,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,'status'=>'active','class_name'=>$class_name,'pid'=>$pid,'ptid'=>$parent_id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
	
	  $array=array('success'=>'attendance submited successfully');
	  echo json_encode($array);
	 }
	
  }
 public function holidays_api_master(){
   $pid=$this->input->post('pid');
$get_holidays_list=$this->db->query("select e.event_name,e.yid,e.ptid,c.date1 from yearly_holiday_master e inner join child_master c on c.yid=e.yid where c.pid='$pid'")->result();
   $array=array();
	if(count($get_holidays_list)>=1){
	foreach($get_holidays_list as $row){
	  $array[]=array('event_name'=>$row->event_name,'event_date'=>$row->date1);
	 }
	$result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
	 }else{
   $result_data=array('success'=>'No Result Founds');
    echo json_encode($result_data);
  }
 }
public function student_attendance_list_api(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $parent_id=$this->input->post('parent_id');
  $year=date('Y');
  $month=date('m');
 $persent_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='P' order by r.aid asc")->result();
//echo $this->db->last_query();
//exit;
  $halfday_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='H'  order by r.aid asc")->result();
  
   $abscent_date=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='A'  order by r.aid asc")->result();
   
   $get_holidays_list=$this->db->query("select e.event_name,e.yid,e.ptid,c.date1 from yearly_holiday_master e inner join child_master c on c.yid=e.yid where c.pid='$pid'")->result();
   $holidays=array();
	if(count($get_holidays_list)>=1){
	foreach($get_holidays_list as $row){
	  $holiday_month=date('m',strtotime($row->date1));
	  $holidays[]=array('event_name'=>$row->event_name,'event_date'=>$row->date1,'holiday_month'=>$holiday_month);
	 }
	 }
   
$persent_array=array();
$abcent_array=array();
$half_array=array();
if((count($persent_data)>=1) ||(count($abscent_date)>=1) || (count($halfday_data)>=1)){
 foreach($persent_data as $row){
   $persent_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   foreach($abscent_date as $row){ 
   $abcent_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   foreach($halfday_data as $row){                                                 
   $half_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   $result_data=array('success'=>"true",'Persent'=>$persent_array,'Abcent'=>$abcent_array,'Halfday'=>$half_array,'Holidays'=>$holidays);
    echo json_encode($result_data);
	 }else{
   $result_data=array('success'=>'No Result Founds');
    echo json_encode($result_data);
  }
  }
  
  public function attendance_search_filter_api(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $year=$this->input->post('year');
  $month=$this->input->post('month');
  $parent_id=$this->input->post('parent_id');
$persent_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='P' and r.year='$year' and r.month='$month' order by r.aid asc")->result();
 
  $halfday_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='H' and r.year='$year' and r.month='$month' order by r.aid asc")->result();
  
   $abscent_date=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='A' and r.year='$year' and r.month='$month' order by r.aid asc")->result();
$persent_array=array();
$abcent_array=array();
$half_array=array();
if((count($persent_data)>=1) ||(count($abscent_date)>=1) || (count($halfday_data)>=1)){
 foreach($persent_data as $row){
   $persent_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   foreach($abscent_date as $row){
   $abcent_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   foreach($halfday_data as $row){
   $half_array[]=array('student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'attendance_date'=>$row->attendance_date,'attendance_status'=>$row->attendance_status,'division'=>$row->divsion,'class'=>$row->class_name,'parent_id'=>$row->ptid,'year'=>$row->year,'month'=>$row->month);
   } 
   $result_data=array('success'=>"true",'Persent'=>$persent_array,'Abcent'=>$abcent_array,'Halfday'=>$half_array);
    echo json_encode($result_data);
	 }else{
   $result_data=array('success'=>'No Result Founds');
    echo json_encode($result_data);
  }
 }
 public function student_result_api(){                     
 $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $student_result=array();
    $mysl_query=$this->db->query("select p.Student_name,p.adhar_card,r.class,r.division,r.exam_name,r.parent_id,r.create_date,r.rmid from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and r.class='$class' and r.division='$division' order by r.rmid desc")->result();
	if(count($mysl_query)>=1){
 foreach($mysl_query as $row){
		$result_subject_marks=$this->db->query("select *from result_subject_marks where rmid='".$row->rmid."'")->result();
		       $max_marks=0;
			   $obtained_marks=0;
			   $min_marks=0;
			   $percentage=0;
			   $fails='';
			   $passs='';
			   $result_status='';
			   $ii=1;
			  foreach($result_subject_marks as $rows){ 
			   $percentage=$ii+$percentage;
			   $max_marks=$rows->maximum_marks+$max_marks;
               $min_marks=$rows->minmum_marks+$min_marks;
               $obtained_marks=$rows->obtained_marks+$obtained_marks;
			   if($rows->obtained_marks>=$rows->minmum_marks){ 
			         $pass='PASS'; 
			      }else{
				      $fails='FAIL';
				    } 
			   }
			 $percent = ($obtained_marks / $max_marks) * 100;
		    if(!empty($fails)){ $result_status=$fails;  }else{ $result_status=$pass; }
		  $student_result[]=array('Student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'exam_name'=>$row->exam_name,'class'=>$row->class,'division'=>$row->division,'create_date'=>$row->create_date,'result_id'=>$row->rmid,'parent_id'=>$row->parent_id,'result'=>$result_status,'percentage'=>$percent);
		}
    $result_data=array('success'=>"true",'result'=>$student_result);
    echo json_encode($result_data);
	 }else{
   $result_data=array('success'=>'No Result Founds');
    echo json_encode($result_data);
  }
}
public function particular_student_result_details_api(){
    $rmid=$this->input->post('result_id');
	$result_subject_marks=$this->db->query("select *from result_subject_marks where rmid='$rmid'")->result();
		   $d=$this->db->query("select r.division,r.class,r.year,p.Student_roll_no,p.Student_name,pr.Principle_schools_image,pr.Principle_school_name from result_master r inner join tbl_parent p on  r.parent_id=p.Ptid inner join tbl_principle pr on pr.Pid=r.pid where r.rmid='$rmid'")->row();
		   $student_result=array();
		    $max_marks=0;
			   $obtained_marks=0;
			   $min_marks=0;
			   $percentage=0;
			   $fails='';
			   $passs='';
			   $result_status='';
			   $ii=1;
			  foreach($result_subject_marks as $rows){ 
			   $percentage=$ii+$percentage;
			   $max_marks=$rows->maximum_marks+$max_marks;
               $min_marks=$rows->minmum_marks+$min_marks;
               $obtained_marks=$rows->obtained_marks+$obtained_marks;
			   if($rows->obtained_marks>=$rows->minmum_marks){ 
			         $pass='PASS'; 
			      }else{
				      $fails='FAIL';
				    } 
			 $student_result[]=array('subject_name'=>$rows->subject_name,'max_marks'=>$rows->maximum_marks,'min_marks'=>$rows->minmum_marks,'obtain_marks'=>$rows->obtained_marks);
			   }
			  $percent = ($obtained_marks / $max_marks) * 100; 
			  if(!empty($fails)){ $result_status=$fails;  }else{ $result_status=$pass; }
			 $others_details=array('student_name'=>$d->Student_name,'division'=>$d->division,'class'=>$d->class,'year'=>$d->year,'result'=>$result_status,'percentage'=>$percent);
		     $result_data=array('success'=>"true",'marks_details'=>$student_result,'personal_details'=>$others_details);
            echo json_encode($result_data);
		}	
	public function header_sliders(){
	  $id= $this->input->post('pid');
	   $query=$this->db->query("select *from tbl_main_slider where pid='$id'")->result();
	   $result=array();
	   if(count($query)>=1){
	     foreach($query as $row){
		 $result[]=array('slider_banner_images'=>$row->slider_banner_images); 
		  }
		  $result_data=array('success'=>"true",'result'=>$result);
         echo json_encode($result_data);
	    }else{
	   $result_data=array('success'=>'No Result Founds');
       echo json_encode($result_data);
	   }
	 }
public function common_notifications(){
     $id=$this->input->post('pid');
	 $expiry_date=date('Y-m-d');
	 $mysqlquerys=$this->db->query("select notification_name from notification_master where expiry_date>='$expiry_date' and pid='$id'")->result();
	 //echo $this->db->last_query();
	  $result=array();
	  if(count($mysqlquerys)>=1){
	    foreach($mysqlquerys as $row){
		  $result[]=array('notification_name'=>$row->notification_name);
		 }
	    $result_data=array('success'=>"true",'result'=>$result);
         echo json_encode($result_data);
	    }else{
	   $result_data=array('success'=>'No Result Founds');
       echo json_encode($result_data);
	   }
    }
public function todays_persent_abscent_halfday(){
        $pid=$this->input->post('pid');
		$class=$this->input->post('class');
		$division=$this->input->post('division');
		$date=$this->input->post('date');
		$persent_stud=$this->db->query("select aid from tbl_attendance where pid='$pid' and class_name='$class' and divsion='$division' and attendance_date='$date' and attendance_status='P'")->result();
		$abscent_stud=$this->db->query("select aid from tbl_attendance where pid='$pid' and class_name='$class' and divsion='$division' and attendance_date='$date' and attendance_status='A'")->result();
		$Halfdays_stud=$this->db->query("select aid from tbl_attendance where pid='$pid' and class_name='$class' and divsion='$division' and attendance_date='$date' and attendance_status='H'")->result();
		$p_count=count($persent_stud);
		$a_count=count($abscent_stud);
		$h_count=count($Halfdays_stud);
		$total_count=$p_count+$a_count+$h_count;
		 $array=array('persent'=>$p_count,'absent'=>$a_count,'halfday'=>$h_count,'Total'=>$total_count);
		 $result_data=array('success'=>"true",'result'=>$array);
         echo json_encode($result_data);
     }
	 
	 public function get_all_student_attendance_api(){
      
	  $attendance_date=$this->input->post('attendance_date');
	  $y=date('Y',strtotime($attendance_date));
	  $m=date('m',strtotime($attendance_date));
	  $current_date=date('Y-m-d');
	  $teacher_id=$this->input->post('teacher_id');
	  $teacher=$this->db->query("select  schools_name,divsion,Pid,Tid from tbl_teacher where Tid='$teacher_id'")->row();
	 // echo $this->db->last_query();
	  //exit;
	  $class=$teacher->schools_name; $division=$teacher->divsion; $pid=$teacher->Pid; $tid=$teacher->Tid;
	  $tbl_parent=$this->db->query("select Ptid from tbl_parent where Student_class_division='$class' and divsion='$division' and pid='$pid'")->result();
	  $days=date('D',strtotime($attendance_date));
	   $holidayslist=$this->db->query("select pid,yid,date1 from child_master where date1='$attendance_date' and pid='".$pid."'")->result();
	   //echo $this->db->last_query();
	   //exit;
	   if(count($holidayslist)>=1){
		$yid=$holidayslist[0]->yid;
		}else{
		$yid=0;
		}
	  $holi=$this->db->query("select event_name from yearly_holiday_master where yid='$yid'")->result();
	 if(count($holidayslist)>=1){
	 $result_data=array('success'=>"true",'result'=>'Do not get attendance today because today is Sunday');
	 }elseif($days=='Sun'){
	   $result_data=array('success'=>"true",'result'=>'Todays is holiday');
	 //  exit;
	  }else{
	  foreach($tbl_parent as $row){
	  $parent_id=$row->Ptid;
	  $duplicate_entry=$this->db->query("select attendance_date,ptid from tbl_attendance where ptid='$parent_id' and attendance_date='$attendance_date'")->row();
	  if(count($duplicate_entry)==0){
    $insertarray=array('tid'=>$tid,'attendance_status'=>'P','year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,'status'=>'active','class_name'=>$class,'pid'=>$pid,'ptid'=>$parent_id,'divsion'=>$division);
	$this->db->insert('tbl_attendance',$insertarray);
	   } 
	  }
	  $result_data=array('success'=>"true",'result'=>'All student attendance submited successfully..');
    }
	echo json_encode($result_data);
   }
  public function student_attendance_status_list(){
  error_reporting(0);
  $pid=$this->input->post('pid');
  $division=$this->input->post('division');
  $class=$this->input->post('class');
  $date=$this->input->post('date');
  $days=date('D',strtotime($date));
   $get_student=$this->db->query("select *from tbl_parent where pid='".$pid."' and divsion='".$division."' and Student_class_division='".$class."' order by Student_name asc")->result();
   $result_array=array();
   $attendance_status='';
   foreach($get_student as $row){
   $tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$date."' and pid='".$pid."' and  divsion='".$division."' and class_name='".$class."'  and Ptid='".$row->Ptid."'")->result();
                    $holidayslist=$this->db->query("select pid,yid,date1 from child_master where date1='$date' and pid='".$pid."'")->result();
					 $yid=$holidayslist[0]->yid;
					 $holi=$this->db->query("select event_name from yearly_holiday_master where yid='$yid'")->result();
					 if(count($holidayslist)>=1){
					 $attendance_status='Holiday';
					 }elseif($days=='Sun'){
					 $attendance_status='Sunday';
					 }else if(count($tbl_attendance)>=1){
                      $attendance_status=$tbl_attendance[0]->attendance_status;					 
					 }else{
					  $attendance_status='None';
					 }
      $result_array[]=array('Student_name'=>$row->Student_name,'adhar_card'=>$row->adhar_card,'class'=>$row->Student_class_division,'division'=>$division,'Mobile_No'=>$row->Parent_mobile_no,'Attendance Status'=>$attendance_status,'parent_id'=>$row->Ptid);
       }
	   $result_data=array('success'=>'true','result'=>$result_array);
	   echo json_encode($result_data);
     } 		
  }	
?>
