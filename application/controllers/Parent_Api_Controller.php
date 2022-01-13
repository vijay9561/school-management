<?php
class Parent_Api_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');
    }
public function parent_login_api(){
   $adhar_card=$this->input->post('adhar_card');
 $query=$this->db->query("select *from tbl_parent where adhar_card='".$adhar_card."' and Status='active'")->row();
 if(count($query)==1){
     $result_data=array('success'=>'Successfull Login','Parent_Id'=>$query->Ptid,'adhar_card'=>$query->adhar_card,'pid'=>$query->pid,'Student_Name'=>$query->Student_name,'class'=>$query->Student_class_division,'division'=>$query->divsion,'adhar_card'=>$query->adhar_card);
	  echo json_encode($result_data);
     }else{
	    $erromsg=array('success'=>'Adhar Card Incorrect');
	   echo json_encode($erromsg);
	 }
   }
 public function student_schools_time_tables_api(){
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
    $array=array('success'=>'No Found Result');
  echo json_encode($array);
    }
  }	
  
 public function student_examination_api(){
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
  $array=array('success'=>'No Found Result');
  echo json_encode($array);
  }
  }
  
  
   public function student_holiday_master_api(){
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
public function student_attendance_calendar_api(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $parent_id=$this->input->post('parent_id');
  $month=date('m');
  $year=date('y');
  $persent_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='P' and r.year='$year' and r.month='$month' order by r.aid asc")->result();
 //echo $this->db->last_query();
 //exit;
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
  
  public function student_calendar_month_wise_filteration(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $parent_id=$this->input->post('parent_id');
  $year=$this->input->post('year');
  $month=$this->input->post('month');
 $persent_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='P' order by r.aid asc")->result();
 //echo $this->db->last_query();
 //exit;
  $halfday_data=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='H' order by r.aid asc")->result();
  
   $abscent_date=$this->db->query("select r.roll_no,p.Student_name,p.adhar_card,r.year,r.month,r.attendance_date,r.attendance_status,r.divsion,r.class_name,r.aid,r.ptid from tbl_parent p inner join  tbl_attendance r on r.ptid=p.Ptid where r.divsion='".$division."' and r.class_name='".$class."' and r.pid='".$pid."' and r.ptid='$parent_id' and r.attendance_status='A' order by r.aid asc")->result();
   
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
public function student_profiles_api(){
   $parent_id=$this->input->post('parent_id');
   $row=$this->db->query("select adhar_card,Ptid,Student_name,Student_roll_no,Student_year,Student_class_division,divsion,Parent_mobile_no,dob,pan_no,address,old_schools,account_no,bank_no,ifc_code,mother_name,redensital_address,cast,sub_cast,gender from tbl_parent where Ptid='$parent_id'")->row();
    if(count($row)>=1){
   $result=array('success'=>"true",'adhar_card'=>$row->adhar_card,'Student_Name'=>$row->Student_name,'mother_name'=>$row->mother_name,'residential_address'=>$row->redensital_address,'Roll_No'=>$row->Student_roll_no,'class'=>$row->Student_class_division,'division'=>$row->divsion,'mobile_no'=>$row->Parent_mobile_no,'DOB'=>$row->dob,'Pan_Card'=>$row->pan_no,'Address'=>$row->address,'old_schools'=>$row->old_schools,'account_no'=>$row->account_no,'bank_no'=>$row->bank_no,'ifc_code'=>$row->ifc_code,'caste'=>$row->cast,'sub_cast'=>$row->sub_cast);
  
echo   json_encode($result);
    }else{
	echo json_encode(array('success'=>'No Result Found')); 
	}
  }
  public function student_parent_result_api(){
 $class=$this->input->post('class');
  $division=$this->input->post('division');
  $pid=$this->input->post('pid');
  $parent_id=$this->input->post('parent_id');
  $student_result=array();
    $mysl_query=$this->db->query("select p.Student_name,p.adhar_card,r.class,r.division,r.exam_name,r.parent_id,r.create_date,r.rmid from result_master r inner join tbl_parent p on r.parent_id=p.Ptid where  r.pid='".$pid."' and r.class='$class' and r.division='$division' and r.parent_id='$parent_id' order by r.rmid desc")->result();
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
public function individual_parent_notification_api(){
  $parent_id=$this->input->post('parent_id');
  $division=$this->input->post('division');
  $class=$this->input->post('class');
  $pid=$this->input->post('pid');
  $mysqluery=$this->db->query("select notification_description from notification where (sid='$parent_id' OR notification_type='common') and class_name='$class' and division='$division' and pid='$pid'")->result();
  
  if(count($mysqluery)>=1){
 foreach($mysqluery as $row){
   $array[]=array('notification_description'=>$row->notification_description);
   } 
   $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
    }else{
   $result_data=array('success'=>'No Result Founds');
    echo json_encode($result_data);
  }
 }
 public function particular_student_parent_details_api(){
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
		
public function application_type(){
    $application_master=$this->db->query("select name from application_master")->result(); 
	if(count($application_master)>=1){
 foreach($application_master as $row){
   $array[]=array('applications_type'=>$row->name);
   } 
   $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
    }
   }
    public function student_applications_submit(){
    $parent_id=$this->input->post('parent_id');
	$application_description= urldecode($this->input->post('application_description'));
	$application_for=urldecode($this->input->post('applications_type'));
	$date=date('Y-m-d');
	$get_row=$this->db->query("select *from tbl_parent where Ptid='$parent_id'")->row();
	//echo $this->db->last_query();
	//exit;
	$class=$get_row->Student_class_division;
	$division=$get_row->divsion;
	$pid=$get_row->pid;
$insert_array=array('class'=>$class,'pid'=>$pid,'sid'=>$parent_id,'division'=>$division,'application_for'=>$application_for,'application_description'=>$application_description,'create_date'=>$date,'app_status'=>'pending');
	$result=$this->db->insert('application_request',$insert_array);
	 if($result==true){
	     $result_data=array("success"=>"applications submited successfully");
		 echo json_encode($result_data);
	  }else{
	   $result_data=array("success"=>"sorry somthing wrong");
		 echo json_encode($result_data);
	  }
    }
	public function view_application_details(){
	$parent_id=$this->input->post('parent_id');
    $application_master=$this->db->query("select *from application_request where sid='$parent_id' order by arid")->result(); 
	if(count($application_master)>=1){
 foreach($application_master as $row){
   $array[]=array('Application Type'=>$row->application_for,'Application Description'=>$row->application_description,'Created Date'=>$row->create_date,'Received Date'=>$row->received_date,'Status'=>$row->app_status);
   } 
   $result_data=array('success'=>"true",'result'=>$array);
    echo json_encode($result_data);
    }else{
	  $result_data=array('success'=>"true",'result'=>'No Data found');
	  echo json_encode($result_data);
	 }
   }
   public function student_fees_details_api(){
   error_reporting(0);
    $id=$this->input->post('parent_id');
	$parent=$this->db->query("select *from tbl_parent where Ptid='$id'")->row();
		$class=$parent->Student_class_division;
		$division=$parent->divsion;
		$tbl_fees=$this->db->query("select *from tbl_fees where parent_id='$id' and division='$division' and class='$class'")->row(); 
		$fees_id=$tbl_fees->id;
		$installment=$this->db->query("select *from tbl_installment_amount where fees_id='$fees_id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		if(count($tbl_fees)>=1) {
		$total_remaing=''; $paid_amount='0'; $i=1;
		//$all_paid_amount='';
		$remaining_exam_fees=$tbl_fees->exam_total_fees-$tbl_fees->exam_recives_fess;
		if($remaining_exam_fees<=0){ $remaining_fees_status='COMPLETED'; }else{ $remaining_fees_status='PENDING'; }
		$remaining_tour_fees=$tbl_fees->tour_total_fees-$tbl_fees->tour_recives_fess; 
      if($remaining_tour_fees<=0){ $remaining_tour_status='COMPLETED'; }else{ $remaining_tour_status='PENDING'; } 
	  $remaining_other_fees=$tbl_fees->other_total_fees-$tbl_fees->other_recive_fees;
	  if($remaining_other_fees<=0){ $other_fees_status='COMPLETED'; }else{ $other_fees_status='PENDING'; }
		$all_data[]=array('Admission No'=> $parent->gr_code,'Admission Date'=>$parent->admission_date,'U.I.D.No.'=>$parent->u_id_no,'Student Name'=>$parent->Student_name,'Class'=>$tbl_fees->class,'Division'=>$tbl_fees->division,'Medium'=>$parent->medium,'Total Fees'=>$tbl_fees->total_fees,'Discount Fees'=>$tbl_fees->total_discount_fees.'('.$tbl_fees->dicount_percentage.' %)','Total Exam Fees'=>$tbl_fees->exam_total_fees,'Exam Recive Fees'=>$tbl_fees->exam_recives_fess,'Exam Fees Date'=>$tbl_fees->exam_fees_date,'Exam Pending Amount'=>$remaining_exam_fees,'Exam Fees Status'=>$remaining_fees_status,'Total Tour Fees'=>$tbl_fees->tour_total_fees,'Tour Recive Fees'=>$tbl_fees->tour_recives_fess,'Tour Fees Date'=>$tbl_fees->tour_fees_date,'Tour Pending Amount'=>$remaining_tour_fees,'Tour Fees Status'=>$remaining_tour_status,'Other Total Fees'=>$tbl_fees->other_total_fees,'Other Recive Fees'=>$tbl_fees->other_recive_fees,'Other Fees Date'=>$tbl_fees->other_fees_date,'Other Pending Amount'=>$remaining_other_fees,'Other Fees Status'=>$other_fees_status);
		
		foreach($installment as $row){  
			  $total_remaing=($total_amunt-$row->installment_amount);
			  $paid_amount=$paid_amount+$row->installment_amount;
			   $all_paid_amount=$total_amunt-$paid_amount;
			   if($all_paid_amount<=0){ $fees_status='COMPLETED'; }else{ $fees_status='PENDING'; } 
$array[]=array('Sr No.'=>$i,'Date'=>$row->date,'PAID INSTALMENT'=>$row->installment_amount,'Status'=>'PAID','PENDING AMOUNT'=>$all_paid_amount,'Fess Status'=>$fees_status); 
			   $i++;
		  }
		   $result_data=array('success'=>"true",'result'=>$all_data,'installment_fess'=>$array);
		}else{
		  $result_data=array('success'=>"true",'result'=>'Your children fees not paid');
	    
		}
	 echo json_encode($result_data);
   }
   
   public function vimlai_header_sliders(){
	  $query=$this->db->query("select *from tbl_main_slider where status='active' and slider_type='supper'")->result();
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
public function view_fees_details(){
     $parent=$this->input->post('parent_id');
	 $class=$this->input->post('class');
	 $division=$this->input->post('division');
	$student_details=array();
	$installment_details=array(); 
	    $tbl_fees=$this->db->query("select *from tbl_fees_master where division='$division' and class='$class' and parent_id='$parent'")->row(); 
		$parent_id=$tbl_fees->parent_id;
	    $id=$tbl_fees->id;
		$status='';
		$parent=$this->db->query("select *from tbl_parent where Ptid='$parent_id' and Status='active'")->row();
		$installment=$this->db->query("select *from tbl_fees_type where fees_id='$id'")->result();
		$total_amunt=$tbl_fees->total_discount_fees;
		$fees=$this->db->query("select sum(paid_fees) as totalfees from tbl_fees_type where fees_id='$id'")->result();
		 $classdetails=$tbl_fees->class .'('.$tbl_fees->division.')';
		  $totalss=$total_amunt-$fees[0]->totalfees; if($totalss<=0){ $tot=0; 		$status='PAID'; }else{ $tot=$totalss; $status='PENDING'; } 
	   $student_details[]=array('Student Name'=>$parent->Student_name,'Class And Division'=>$classdetails,'Total Fees'=>$$tbl_fees->total_fees,'Discount Fees'=>$tbl_fees->total_discount_fees,'Total Paid Fees'=>$fees[0]->totalfees,'Total Remaining Fees'=>$tot,'Fees Status'=>$status);
	   $i=1;
	    foreach($installment as $row){
		$installment_details[]=array('Sr.No'=>$i,'Fees Type'=>$row->fees_type,'Total Fees'=>$row->total_fees,'Paid Fees'=>$row->paid_fees,'Paid Date'=>$row->created_date);
		$i++;  
		}	
	if(count($tbl_fees)>=1){
	  $response=array('success'=>"true",'Fees Details'=>$student_details,'Installment Details'=>$installment_details);
	 }else{
	 $response=array('success'=>"No Result Found"); 
	 }	
	// $this->output->set_content_type('application/json')->set_output(json_encode($////));
     echo json_encode($response);
   }
 public function school_logo_images(){
      $pid=$this->input->post('pid');
	$q=$this->db->query("select Principle_schools_image from tbl_principle where Pid='$pid'")->row();
      //  echo $this->db->last_query();
       // exit;
	if(!empty($q->Principle_schools_image)){
	$logo='http://www.vmbss.org/assets/profile/'.$q->Principle_schools_image;
	$response=array("success"=>"true","logo"=>$q->Principle_schools_image);
	}else{
    $response=array('success'=>"No Logo");
	}
	 echo json_encode($response);
	 //$this->output->set_content_type('application/json')->set_output(json_encode($response));
   }
 
}
 ?>