<?php
error_reporting(0); 
class Users_controller  extends MY_Controller{

    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');
 }
   public function index(){
    $data = array('year' => $this->uri->segment(3),
                  'month' => $this->uri->segment(4));

   		$data['template']='index';
		$data['title'] ='Schools Mangement';
		$data['page']='Schools Mangement';
		$this->layout_users($data);
   }
   public function principle_registration(){
	   $data['template']='principle-registration';
		$data['title'] ='Principle Registration';
		$data['page']='Principle Registration';
		$this->layout_users($data);
	 
   }
   public function application_request(){
	   $data['template']='application_request';
		$data['title'] ='Application Request';
		$data['page']='Application Request';
		$this->layout_users($data);
	 
   }
   
   public function view_application_request(){
	   $data['template']='view-application-request';
		$data['title'] ='View Application Request';
		$data['page']='View Application Request';
		$this->layout_users($data);
	 
   } 
    public function our_teams(){
	   $data['template']='out-team';
		$data['title'] ='Our Teams';
		$data['page']='Our Teams';
		$this->layout_users($data);
	 
   }
   public function attendance_calendar(){
	   $data['template']='parent-calendar';
		$data['title'] ='Parent Calendar';
		$data['page']='Parent Calendar';
		$this->layout_users($data);
	 
   }                                                  
    public function contact_us(){
	   $data['template']='contact-us';
		$data['title'] ='Contact Us';
		$data['page']='Contact Us';
		$this->layout_users($data);
	 
   }
   public function comming_soons(){
	   $data['template']='comming';
		$data['title'] ='Comming Soon';
		$data['page']='Comming Soon';
		$this->layout_users($data);
	 
   }
   
   public function individual_notification(){
	   $data['template']='individual-notification';
		$data['title'] ='Individual Notification';
		$data['page']='Individual Notification';
		$this->layout_users($data);
	 
   }
   
    public function student_attendance_list_admin(){
	   $data['template']='student_attendance_list-admin';
		$data['title'] ='Student Attendance List Admin';
		$data['page']='Student Attendance List Admin';
		$this->layout_users($data);
   }
   
	public function notification(){
	$data['template']='notification';
	$data['title'] ='Notification';
	$data['page']='Notification';
	$this->layout_users($data);
	}
  
   public function principle_login(){
	   $data['template']='principle-login';
		$data['title'] ='Principle Login';
		$data['page']='Principle Login';
		$this->layout_users($data);
   }
   public function student_list_clerk(){
	   $data['template']='student-list-clerk';
		$data['title'] ='Student List Clerk';
		$data['page']='Student List Clerk';
		$this->layout_users($data);
   }
    public function teacher_creation(){
	   $data['template']='teacher-registration';
		$data['title'] ='New Teacher Create';
		$data['page']='New Teacher Create';
		$this->layout_users($data); 
   }   
   public function teacher_list(){
	   $data['template']='teacher-list';
		$data['title'] ='Teacher List';
		$data['page']='Teacher List';
		$this->layout_users($data);
	 
   }
   public function teacher_login(){
	   $data['template']='teacher-login';
		$data['title'] ='Teacher Login';
		$data['page']='Teacher Login';
		$this->layout_users($data);
   }
   public function teacher_profile(){
	   $data['template']='teacher-profile';
		$data['title'] ='Teacher Profile';
		$data['page']='Teacher Profile';
		$this->layout_users($data);
   }
    public function student_attendance(){
	   $data['template']='student_attendance';
		$data['title'] ='Student Attendance';
		$data['page']='Student Attendance';
		$this->layout_users($data);
   }
   public function create_clerek(){
	   $data['template']='create-clerek';
		$data['title'] ='Create Clerek';
		$data['page']='Create Clerek';
		$this->layout_users($data);
   }
   public function parent_notifications(){
	   $data['template']='parent_notification';
		$data['title'] ='Parent Notification';
		
		$data['page']='Parent Notification';
		$this->layout_users($data);
   }
    public function create_time_table(){
	   $data['template']='create-time-table';
		$data['title'] ='Create Time Table';
		$data['time_get']=$this->users_model->get_times();
		$data['page']='Create Time Table';
		$this->layout_users($data);
   }
   
    public function create_exam_time_table(){
	   $data['template']='create-exam-time-table';
		$data['title'] ='Examination Time Table';
		$data['time_get']=$this->users_model->get_times();
		$data['page']='Examination Time Table';
		$this->layout_users($data);
   }
   	function logoutprinciple() {
        $this->session->sess_destroy();
         redirect(site_url());
    }

  public function registration_process(){
	  $this->users_model->registration_principles($_POST);
  }
  public function add_new_notifications(){
     $this->users_model->add_new_notifications($_POST);
   }
    public function add_common_notifications(){
     $this->users_model->add_common_notification($_POST);
   }
   
   public function teacher_creation_process(){
	  $this->users_model->teacher_creation_process($_POST);
  }
  public function clerk_creation(){
	  $this->users_model->clerk_creation($_POST);
  }
  public function principle_login_process(){
     $this->users_model->principle_login($_POST);
  }
   public function parent_login_process(){
     $this->users_model->parent_login_process($_POST);
  }
   public function teacher_login_process(){
     $this->users_model->teacher_login($_POST);
  }
 public function student_registration_process(){
     $this->users_model->student_registration_process($_POST);
  }
  public function student_holidays_submisssions(){
    $this->users_model->student_holidays_submisssions($_POST);
  }
  public function update_holidays_events(){
    $this->users_model->update_holidays_events($_POST);
  }
public function notifications_add(){
  $this->users_model->notifications_add($_POST);
}
public function update_notifications(){
  $this->users_model->update_notifications($_POST);
}
  public function teacher_deletion(){
     $id=$this->input->post('id');
    $this->users_model->teacher_deletion($id);
  }
  
   public function change_password(){
	   $data['template']='change-password';
		$data['title'] ='Change Password';
		$data['page']='Change Password';
		$this->layout_users($data);
	 
   }
    public function student_list(){
	    $data['template']='student-list';
		$data['title'] ='Student List';
		$data['page']='Student List';
		$this->layout_users($data);
	 
   }
   public function parent_profile(){
	    $data['template']='parent-profile';
		$data['title'] ='Parent Profile';
		$data['page']='Parent Profile';
		$this->layout_users($data);
	 
   }
    public function eventcreation(){
	    $data['template']='create-event';
		$data['title'] ='Create Event';
		$data['page']='Create Event';
		$this->layout_users($data);
	 
   }
   public function holiday_list(){
	    $data['template']='holiday-list';
		$data['title'] ='Holiday List';
		$data['page']='Holiday List';
		$this->layout_users($data);
	 
   }
   public function change_password_process(){
      if(isset($_SESSION['PRINCIPLE_ID'])){
       $id=$this->session->userdata('PRINCIPLE_ID');
	   $oldpassword=$this->input->post('oldPassword');
	   $newpassword=$this->input->post('newPassword');
      $array=array('Principle_password'=>$newpassword);
	  $oldpasswordget=$this->db->query("select Principle_password from tbl_principle where Pid='$id'")->result();
	  if($oldpasswordget[0]->Principle_password==$oldpassword){
	    $this->db->where('Pid',$id);
		$this->db->update('tbl_principle',$array);
		$_SESSION['SUCESSMSG']='Password Changed Successfully';
		echo 1;
		exit;
	   }else{
	    echo 2;
		exit;
	  }
	  }elseif(isset($_SESSION['TEACHER_ID'])){
	  $id=$this->session->userdata('TEACHER_ID');
	   $oldpassword=$this->input->post('oldPassword');
	   $newpassword=$this->input->post('newPassword');
      $array=array('Teacher_password'=>$newpassword);
	  $oldpasswordget=$this->db->query("select Teacher_password from tbl_teacher where Tid='$id'")->result();
	  if($oldpasswordget[0]->password==$oldpassword){
	    $this->db->where('Tid',$id);
		$this->db->update('tbl_teacher',$array);
		$_SESSION['SUCESSMSG']='Password Changed Successfully';
		echo 1;
		exit;
	  }else{
	    echo 2;
		exit;
	  }
	  }else{
	   $id=$this->session->userdata('PARENT_ID');
	   $oldpassword=$this->input->post('oldPassword');
	   $newpassword=$this->input->post('newPassword');
      $array=array('Parent_password'=>$newpassword);
	  $oldpasswordget=$this->db->query("select password from tbl_parent where Ptid='$id'")->result();
	  if($oldpasswordget[0]->password==$oldpassword){
	    $this->db->where('Ptid',$id);
		$this->db->update('tbl_parent',$array);
		$_SESSION['SUCESSMSG']='Password Changed Successfully';
		echo 1;
		exit;
	   }else{
	    echo 2;
		exit;
	    }
	  }
   }
    public function principle_profile(){
	   $data['template']='principle-profile';
		$data['title'] ='Principle Profile';
		$data['page']='Principle Profile';
		$this->layout_users($data);
	 
   }
   public function new_student_registration(){
	   $data['template']='create-student';
		$data['title'] ='New Student Registration';
		$data['page']='New Student Registration';
		$this->layout_users($data);
	 
   }
    public function parent_login(){
	   $data['template']='parent-login';
		$data['title'] ='Parent Login';
		$data['page']='Parent Login';
		$this->layout_users($data);
	 
   }
   public function attendance_student_list(){
	   $data['template']='student_attendance_list';
		$data['title'] ='Student Attendance List';
		$data['page']='Student Attendance List';
		$this->layout_users($data);
	 
   }
   public function clerk_list(){
	   $data['template']='clerk_list';
		$data['title'] ='Clerk List';
		$data['page']='Clerk List';
		$this->layout_users($data);
	 
   }
    public function common_notification(){
	   $data['template']='common-notification';
		$data['title'] ='Common Notification';
		$data['page']='Common Notification';
		$this->layout_users($data);
	 
   }
  public function principle_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{$profile_images=mysql_real_escape_string($_POST['defaultimage']); }
	   $this->users_model->principle_update_profiles($_POST,$Principle_schools_image);

  }

public function clerk_update(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{$profile_images=mysql_real_escape_string($_POST['defaultimage']); }
	   $this->users_model->clerk_updatation($_POST,$Principle_schools_image);

  }
  public function clerk_update1(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{$profile_images=mysql_real_escape_string($_POST['defaultimage']); }
	   $this->users_model->clerk_updatation1($_POST,$Principle_schools_image);

  }

   public function teacher_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/teacher/" . $Principle_schools_image);
		}else{$profile_images=mysql_real_escape_string($_POST['defaultimage']); }
	   $this->users_model->teacher_update_profiles1($_POST,$Principle_schools_image);

  }
  
 public function student_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/student/" . $Principle_schools_image);
		}else{ $profile_images=$_POST['defaultimage']; }  
	   $this->users_model->student_update_profiles($_POST,$Principle_schools_image);

  }
public function delete_student(){
 $id=$this->input->post('id');
 $this->db->where('Ptid',$id); 
 $query=$this->db->delete('tbl_parent'); 
 //echo $this->db->last_query();
 //exit;
 if($query==true){
 $this->session->set_userdata('SUCESSMSG','Your Student Record Deleted Successfully..');
 echo 1;
 exit;
  }else{
   echo 2;
   exit;
  }
}
  public function delete_holidays(){
    $id=$this->input->post('id');
	$this->db->where('yid',$id);
	$query=$this->db->delete('yearly_holiday_master');
	if($query==true){
	  echo 1;
	  $this->session->set_userdata('SUCESSMSG','Your Holidays Deleted Successfully..');
	  exit;
	}else{
	  echo 2;
	  exit;
	}
  }
public function student_attendancesubmit(){
$data='';
$roll_no=$this->input->post('roll_no');
$anual_year=$this->input->post('anual_year');
$divsion=$this->input->post('divsion');
$class_name=$this->input->post('class_name');
$attendance_status_a=$this->input->post('attendance_status_a');
$attendance_status_p=$this->input->post('attendance_status_p');
$attendance_status='';
$attendance_status=$attendance_status_a;
$id=$this->input->post('id');
$attendance_date=date('Y-m-d');
$tid=$this->input->post('tid');
$pid=$this->input->post('pid');

$current_date=date('Y-m-d H:i:s');
$attendance_date=$this->input->post('attendance_date');
$extract_date = DateTime::createFromFormat("Y-m-d", $attendance_date);
$y=$extract_date->format("Y");
$m=$extract_date->format("m");
$tbl_attendance1=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('roll_no'=>$roll_no,'tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'anual_year'=>$anual_year,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where Student_year='".$teacher_name[0]->year."'  and pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
if($tbl_attendance[0]->attendance_status=='P'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
}elseif($tbl_attendance[0]->attendance_status=='H'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
 }else{
	$data.='<input type="radio"  name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input checked type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
	} 
 echo $data; 	
  }

public function student_attendancesubmithalf(){
$data='';
$roll_no=$this->input->post('roll_no');
$anual_year=$this->input->post('anual_year');
$divsion=$this->input->post('divsion');
$class_name=$this->input->post('class_name');
$attendance_status_a=$this->input->post('attendance_status_a');
$attendance_status_h=$this->input->post('attendance_status_h');
$attendance_status='';
$attendance_status=$attendance_status_h;
$id=$this->input->post('id');
$attendance_date=date('Y-m-d');
$tid=$this->input->post('tid');
$pid=$this->input->post('pid');
$current_date=date('Y-m-d H:i:s');
$attendance_date=$this->input->post('attendance_date');
$extract_date = DateTime::createFromFormat("Y-m-d", $attendance_date);
$y=$extract_date->format("Y");
$m=$extract_date->format("m");
$tbl_attendance1=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('roll_no'=>$roll_no,'tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'anual_year'=>$anual_year,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where Student_year='".$teacher_name[0]->year."'  and pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
if($tbl_attendance[0]->attendance_status=='P'){
$data.='<input type="radio"  name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
}elseif($tbl_attendance[0]->attendance_status=='H'){
$data.='<input type="radio"  name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" checked id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" checked value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
 }else{
	$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
	} 
 echo $data; 	
  }



public function student_attendancesubmit12(){
$data='';
$roll_no=$this->input->post('roll_no');
$anual_year=$this->input->post('anual_year');
$divsion=$this->input->post('divsion');
$class_name=$this->input->post('class_name');
$attendance_status_a=$this->input->post('attendance_status_a');
$attendance_status_p=$this->input->post('attendance_status_p');
$attendance_status='';
 $attendance_status=$attendance_status_p;
 //echo  $attendance_status;
 //exit;
$id=$this->input->post('id');
$attendance_date=date('Y-m-d');
$tid=$this->input->post('tid');
$pid=$this->input->post('pid');
$current_date=date('Y-m-d H:i:s');
$attendance_date=$this->input->post('attendance_date');
$extract_date = DateTime::createFromFormat("Y-m-d", $attendance_date);
$y=$extract_date->format("Y");
$m=$extract_date->format("m");
$tbl_attendance1=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('roll_no'=>$roll_no,'tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'anual_year'=>$anual_year,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where roll_no='".$roll_no."' and attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and anual_year='".$anual_year."'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where Student_year='".$teacher_name[0]->year."'  and pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
if($tbl_attendance[0]->attendance_status=='P'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
}elseif($tbl_attendance[0]->attendance_status=='H'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
 }else{
	$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">H</span>';
	} 
 echo $data; 	
  }
 public function clerk_deletion(){
   $id=$this->input->post('id');
   $this->db->where('Pid',$id);
   $query=$this->db->delete('tbl_principle');
  if($query==true){
     echo 1;
	 $this->session->set_userdata('SUCESSMSG','Your Clerk Deleted Successfully..');
	 exit;
    }else{
	  echo 2;
	}
  }
  public function update_notifications_individaul(){
    $this->users_model->update_notifications_individaul($_POST);
  
    }
  public function delete_individual_notification(){
  $id=$this->input->post('id');
   $this->db->where('nid',$id);
   $query=$this->db->delete('notification');
  if($query==true){
     echo 1;
	 $this->session->set_userdata('SUCESSMSG','Your Notification Deleted Successfully..');
	 exit;
    }else{
	  echo 2;
	}
   }
   
   public function schools_slider(){
   		$data['template']='add-slider-images';
		$data['title'] ='Slider Images';
		$data['page']='Slider Images';
		$this->layout_users($data);
   }                                                                                 
   
     public function view_schools_time_table(){
   		$data['template']='view-time-table';
		$data['title'] ='View Time Table';
		$data['time_get']=$this->users_model->get_times();
		$data['page']='View Time Table';
		$this->layout_users($data);
   } 
   public function view_exam_time_table(){
   		$data['template']='view--exam-time-table';
		$data['title'] ='View Exam Time Table';
		$data['time_get']=$this->users_model->get_times();
		$data['page']='View Time Table';
		$this->layout_users($data);
   }
 public function create_student_result(){
    $data['template']='create-student_result';
	$data['title']='Create Student Result';
	$data['page']='Create Student Result';
	$this->layout_users($data);
   }                                
   public function view_student_result(){
    $data['template']='view-student-result';
	$data['title']='View Student Result';
	$data['page']='View Student Result';
	$this->layout_users($data);
   }                                
   public function principle_update_profiles1(){      
      if(isset($_SESSION['PRINCIPLE_ID'])){
	    $query1=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
		$login_id=$query1->login_id;
	  }     
	$tbl_main_slider=$this->db->query("select mid from tbl_main_slider where pid='$login_id' and slider_type='schools'")->result();
	if(count($tbl_main_slider)<4){                                        
   if(!empty($_FILES["Principle_schools_image"]["name"])){
       $Principle_schools_image =$_FILES["Principle_schools_image"]["name"];
		$upload_img = $this->cwUpload('Principle_schools_image','assets/slider/main/','',TRUE,'assets/slider/','1280','650');
		}
		$date=date('Y-m-d H:i:s');
     $data=array('slider_banner_images'=>$Principle_schools_image,
	             'slider_Heading'=>$this->input->post('slider_Heading'),
				  'slider_small_heading'=>$this->input->post('slider_small_heading'),
				  'datetime'=>$date,
				    'status'=>'active',
					'pid'=>$login_id,
					'slider_type'=>'schools');
	   $result=$this->users_model->supper_admin_addimages($data);
     if($result==1){
	    $this->session->set_userdata('SUCESSMSG','Slider Images Added Successfully..');
		redirect('schools_slider');     
	 }else{
	   echo 'not addedd';
	  }
	  }else{
	   $this->session->set_userdata('ERROMESSAGE','Your schools slider image only allowed 4 images');
		redirect('schools_slider');     
	  }
  }
  
 public function contactus_email_sends(){
     $name=$this->input->post('name');
	 $email=$this->input->post('email');
	 $mobile=$this->input->post('mobile');
	 $message=$this->input->post('message');
   $body='';
$body.='<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>VMBSS</title>
    <style>
  
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0; 
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }


      .body {
        width: 100%; }

      
      .container {
        display: block;
        Margin: 0 auto !important;
        padding: 10px;
        /*width: 1000px;*/
		    width: 90%; }
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        width: 90%;
        padding: 10px;
		border: 1px solid #00aef3;
		border-radius: 14px; }
      .main {
        background: #fff;
        border-radius: 3px;
        width: 100%; }
      .wrapper {
        box-sizing: border-box;
        padding: 20px; }
      .footer {
        clear: both;
        padding-top: 10px;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color:#1d1c1c;
          font-size: 12px;
          text-align: center; }
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }
      a {
        color: #3498db;
        text-decoration: underline; }
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }
      .last {
        margin-bottom: 0; }
      .first {
        margin-top: 0; }
      .align-center {
        text-align: center; }
      .align-right {
        text-align: right; }
      .align-left {  
        text-align: left; }  
      .clear {
        clear: both; }
      .mt0 {
        margin-top: 0; }
      .mb0 {
        margin-bottom: 0; }
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
         width: 0; }
      .powered-by a { 
        text-decoration: none; }
      hr {
        border: 0; 
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; } 
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }
		  th{text-align: left;}
    </style>
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
            <table class="main">
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
					      <p>Welcome To VMBSS,</p>
                        <p>'.$name.' is Enquiry Send.</p>
						<hr style="border-bottom: 1px solid #00aef3;">
						<p><strong>Following Users Detail,</strong></p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                     <th>User Name:&nbsp;&nbsp;</th><td>'.$name.'</td>
                                    </tr>
									 <tr>
                                     <th>Email:&nbsp;&nbsp;</th><td>'.$email.'</td>
                                    </tr>
									<tr>
                                     <th>Mobile:&nbsp;&nbsp;</th><td>'.$mobile.'</td>
                                    </tr>
									<tr>
                                     <th>Message:&nbsp;&nbsp;</th><td>'.$message.'</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                         </tr>
                  </table>
                </td>
              </tr>
              </table>
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
				 <td class="content-block">
				 <span class="content-block">
				<h1 style="font-size: 31px;font-weight: bold;font-family: corbert;text-shadow: 2px 2px #acaeaf;color: #00AEF3;">VMBSS</h1></span>
				 </td>
				 <td> <span class="content-block">
				<strong>Latur</strong><br>
				Mobile No: +91 9561168569 
				Whats App: +91 9561168569<br>
				<a href="www.vmbss.org">www.vmbss.org</a>
				 </span></td>
                  <td class="content-block">
                    <span class="apple-link"><br><br>
					<a href="#" target="_blank"><img src="http://www.wiu.edu/cas/images/facebook_circle_color-512.png" style="height:30px; width:30px;"></a>
					<a  target="_blank" href="#"><img src="http://yolna.com/wp-content/uploads/2015/12/twitter-circle-logo.png" style="height:30px;width:30px;"></a>&nbsp;
			<a href="#" target="_blank"><img src="http://icons.iconarchive.com/icons/martz90/circle/512/google-plus-icon.png" style="height:26px; width:26px;"></a>&nbsp;&nbsp;
		<a href="#" target="_blank"><img src="https://www.stuorg.iastate.edu/uploads/org-site/ckuploads/1419/Social%20Media%20Icons/youtube.png" style="width:27px; height:27px;"></a>
					</span>
                 
                  </td>
                </tr>
               
              </table>
            </div></div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
$mail_to='vikram@vmbss.org';
$mail_to1='vijay@vmbss.org';
$mail_to2='sandip@vmbss.org';

//$mail_to.='vijay@vmbss.org';
//$mail_to.='vijay171819@gmail.com';
$mail_subject="Enquiry Send For ".$name;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:VMBSS.<vijay@vmbss.org>' . "\r\n";
$mail_sent = mail($mail_to,$mail_subject,$body,$headers);
$mail_sent1 = mail($mail_to1,$mail_subject,$body,$headers);
$mail_sent2 = mail($mail_to2,$mail_subject,$body,$headers);

if($mail_sent==true){
$this->session->set_userdata('SUCESSMSG','Your Enquiry Send Successfully..');
redirect('contact_us');
     
    }else{
	  echo 'Not Send';
	}
  }
 public function add_student_time_tables(){
 $id=$_SESSION['PRINCIPLE_ID'];
 $date=date('Y-m-d');
 $get_id=$this->db->query("select login_id from tbl_principle where Pid='$id'")->row();
 //echo $this->db->query();
// exit;
 $pid=$get_id->login_id;
  $class=$this->input->post('class');
  $division=$this->input->post('division');
 $duplicate_time=$this->db->query("select pid from school_time_table_master where pid='$pid' and division='$division' and class='$class'")->result();
//echo $this->db->last_query();
//exit; 
 $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'date'=>$date);
 $time_array=$_POST['time'];
// echo count($time_array);
// exit;
 $mon_array=$_POST['mon'];
 $tue_array=$_POST['tue'];
 $wed_array=$_POST['wed'];
 $Thu_array=$_POST['Thu'];
 $Fir_array=$_POST['Fir'];
 $Stu_array=$_POST['Stu'];
   if(count($duplicate_time)==0){
     $this->db->insert('school_time_table_master',$insert_array);
	 $cl_id=$this->db->insert_id();
	 for ($i = 0; $i < count($time_array); $i++) {
		$time =$time_array[$i];
		$mon = $mon_array[$i];
		$tue =$tue_array[$i];
		$wed =$wed_array[$i];
		$Thu =$Thu_array[$i];
		$Fir =$Fir_array[$i];
		$Stu =$Stu_array[$i];
		if(!empty($time)){
$insert_week_day_time=array('time'=>$time,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'Thu'=>$Thu,'Fir'=>$Fir,'Stu'=>$Stu,'sttmid'=>$cl_id);
     $this->db->insert('schools_time_table',$insert_week_day_time);
		} 
      }
	  $this->session->set_userdata('SUCESSMSG','Your Class Time Table Added Successfully..');
	  echo 1;
	  exit;
	 }else{
	 echo 2;
	 exit;
	  }                                                         
    }
public function add_new_time_tables(){
 $time=$_POST['time'];
 $mon=$_POST['mon'];
 $tue=$_POST['tue'];
 $wed=$_POST['wed'];
 $Thu=$_POST['Thu'];
 $Fir=$_POST['Fir'];
 $Stu=$_POST['Stu'];
 $cl_id=$_POST['sttid'];
 $insert_week_day_time=array('time'=>$time,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'Thu'=>$Thu,'Fir'=>$Fir,'Stu'=>$Stu,'sttmid'=>$cl_id);
     $query=$this->db->insert('schools_time_table',$insert_week_day_time);
   if($query==true){
    $this->session->set_userdata('SUCESSMSG','Your Class Period Time Added Successfully..');
    redirect('view-schools-time-table?sttid='.$cl_id);
     }else{
	 echo 'Not Inserted';
	 }	 
   } 
   
   public function update_student_time_tables(){
 $time_array=$_POST['time'];
 $sttid=$_POST['sttid'];
 $mon_array=$_POST['mon'];
 $tue_array=$_POST['tue'];
 $wed_array=$_POST['wed'];
 $Thu_array=$_POST['Thu'];
 $Fir_array=$_POST['Fir'];
 $Stu_array=$_POST['Stu']; 
	 $cl_id=$sttid;
	 $this->db->where('sttmid',$cl_id);
	 $deletes=$this->db->delete('schools_time_table');
	 for ($i = 0; $i < count($time_array); $i++) {
		$time =$time_array[$i];
		$mon = $mon_array[$i];
		$tue =$tue_array[$i];
		$wed =$wed_array[$i];
		$Thu =$Thu_array[$i];
		$Fir =$Fir_array[$i];
		$Stu =$Stu_array[$i];
		if(!empty($time)){
$insert_week_day_time=array('time'=>$time,'mon'=>$mon,'tue'=>$tue,'wed'=>$wed,'Thu'=>$Thu,'Fir'=>$Fir,'Stu'=>$Stu,'sttmid'=>$cl_id);
     $this->db->insert('schools_time_table',$insert_week_day_time);
		} 
      }
	  if($deletes==true){
	  $this->session->set_userdata('SUCESSMSG','Your Class Time Table Update Successfully..');
	  redirect('view-schools-time-table');
	  //exit;
	  }else{
	  echo 2;
	  exit;
	  }
   }
 public function delete_single_time_tables(){
    $id=$this->input->post('id');
	$this->db->where('sttid',$id);
	$query=$this->db->delete('schools_time_table');
	if($query==true){
	$this->session->set_userdata('SUCESSMSG','Your Time table single row deleted Successfully..');
	echo 1;
	exit;
	}else{
	echo 2;
	exit;
	}
 }
public function delete_all_class(){
    
	$id=$this->input->post('id');
	$this->db->where('sttmid',$id);
	$this->db->delete('schools_time_table');
		$this->db->where('sttmid',$id);
	$query=$this->db->delete('school_time_table_master');
	if($query==true){
	$this->session->set_userdata('SUCESSMSG','Your class time table deleted Successfully..');
	echo 1;
	exit;
	}else{
	echo 2;
	exit;
	}
  }
   public function add_new_examination_time_tables(){
 $id=$_SESSION['PRINCIPLE_ID'];
 $date=date('Y-m-d');
 $get_id=$this->db->query("select login_id from tbl_principle where Pid='$id'")->row();
 //echo $this->db->query();
// exit;
 $pid=$get_id->login_id;
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $exam_name=$this->input->post('exam_name');
  $year=date('Y');
  $duplicate_time='';
  if($exam_name=='First Term Examination' || $exam_name=='Second Term Examination'){
 $duplicate_time=$this->db->query("select pid from exam_master where pid='$pid' and division='$division' and class='$class' and year='$year'")->result();
 }else{
 $duplicate_time=0;
 }
//echo $this->db->last_query();
//exit; 
 $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'created_date'=>$date,'exam_name'=>$exam_name,'year'=>$year);
 $exam_date_array=$_POST['exam_date'];
 $day_array=$_POST['day'];
 $subject_array=$_POST['subject'];
 $subject_code_array=$_POST['subject_code'];
 $time_from_array=$_POST['time_from'];
 $time_to_array=$_POST['time_to'];
   if(count($duplicate_time)==0){
     $this->db->insert('exam_master',$insert_array);
	 $cl_id=$this->db->insert_id();
	 for ($i = 0; $i < count($exam_date_array); $i++) {
		$exam_date =$exam_date_array[$i];
		$day = $day_array[$i];
		$subject =$subject_array[$i];
		$subject_code =$subject_code_array[$i];
		$time_from =$time_from_array[$i];
		$time_to =$time_to_array[$i];
		$Stu =$Stu_array[$i];
		if(!empty($exam_date)){
$insert_examination_time_tables=array('day'=>$day,'subject'=>$subject,'exam_date'=>$exam_date,'subject_code'=>$subject_code,'time_from'=>$time_from,'time_to'=>$time_to,'exid'=>$cl_id,'create_date'=>$date);
     $this->db->insert('exam_type_master',$insert_examination_time_tables);
		} 
      }
	  $this->session->set_userdata('SUCESSMSG','Your Examination Time Table Added Successfully..');
	  echo 1;
	  exit;
	 }else{
	 echo 2;
	 exit;
	  }                                                         
    }
public function update_new_examination_time_tables(){
 $id=$_SESSION['PRINCIPLE_ID'];
 $date=date('Y-m-d');
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $exam_name=$this->input->post('exam_name');
  $year=date('Y');
 $insert_array=array('division'=>$division,'class'=>$class,'exam_name'=>$exam_name);
 $exam_date_array=$_POST['exam_date'];
 $day_array=$_POST['day'];
 $subject_array=$_POST['subject'];
 $subject_code_array=$_POST['subject_code'];
 $time_from_array=$_POST['time_from'];
 $time_to_array=$_POST['time_to'];
   $exid=$this->input->post('exid');
   $this->db->where('exid',$exid);
   $this->db->delete('exam_type_master');
     $this->db->where('exid',$exid);
     $this->db->update('exam_master',$insert_array);
	 $cl_id=$exid;
	 for ($i = 0; $i < count($exam_date_array); $i++) {
		$exam_date =$exam_date_array[$i];
		$day = $day_array[$i];
		$subject =$subject_array[$i];
		$subject_code =$subject_code_array[$i];
		$time_from =$time_from_array[$i];
		$time_to =$time_to_array[$i];
		$Stu =$Stu_array[$i];
		if(!empty($exam_date)){
$insert_examination_time_tables=array('day'=>$day,'subject'=>$subject,'exam_date'=>$exam_date,'subject_code'=>$subject_code,'time_from'=>$time_from,'time_to'=>$time_to,'exid'=>$cl_id,'create_date'=>$date);
     $this->db->insert('exam_type_master',$insert_examination_time_tables);
		} 
      }
	  $this->session->set_userdata('SUCESSMSG','Your Examination Time Table Added Successfully..');
	  echo 1;
	  exit;

   }
   
    public function delete_single_exam_tables(){
    $id=$this->input->post('id');
	$this->db->where('emid',$id);
	$query=$this->db->delete('exam_type_master');
	if($query==true){
	$this->session->set_userdata('SUCESSMSG','Your Examination Time table single row deleted Successfully..');
	echo 1;
	exit;
	}else{
	echo 2;
	exit;
	}
 }
 public function add_subject_wise_exam_time_table(){
      $exam_date=$_POST['exam_date'];
      $day=$_POST['day'];
      $subject=$_POST['subject'];
      $subject_code=$_POST['subject_code'];
      $time_from=$_POST['time_from'];
 $time_to=$_POST['time_to'];
   $exid=$this->input->post('exid');
   $date=date('Y-m-d');
 $insert_examination_time_tables=array('day'=>$day,'subject'=>$subject,'exam_date'=>$exam_date,'subject_code'=>$subject_code,'time_from'=>$time_from,'time_to'=>$time_to,'exid'=>$exid,'create_date'=>$date);
     $this->db->insert('exam_type_master',$insert_examination_time_tables);
   $this->session->set_userdata('SUCESSMSG','Your Examination Time table Subject Added Successfully..');
   redirect('view-exam-time-table?sttid='.$exid);
   }
   public function add_student_result(){
   $date=date('Y-m-d');
 //echo $this->db->query();
// exit;
 $pid=$get_id->login_id;
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $exam_name=$this->input->post('exam_name');
  $parent_id=$this->input->post('parent_id');
  $pid=$this->input->post('pid');
  $year=date('Y');
  $month=date('m');
  $duplicate_time='';
  if($exam_name=='First Term Examination' || $exam_name=='Second Term Examination'){
 $duplicate_time=$this->db->query("select pid from result_master where pid='$pid' and division='$division' and class='$class' and year='$year' and parent_id='$parent_id'")->result();
 }else{
 $duplicate_time=$this->db->query("select pid from result_master where pid='$pid' and division='$division' and class='$class' and year='$year' and parent_id='$parent_id' and month='$month'")->result();
 }
 $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);
 $subject_name_array=$_POST['subject_name'];
 $maximum_marks_array=$_POST['maximum_marks'];
 $minmum_marks_array=$_POST['minmum_marks'];
 $obtained_marks_array=$_POST['obtained_marks'];
   if(count($duplicate_time)==0){
     $this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
	 for ($i = 0; $i < count($subject_name_array); $i++) {
		$subject_name =$subject_name_array[$i];
		$maximum_marks = $maximum_marks_array[$i];
		$minmum_marks =$minmum_marks_array[$i];
		$obtained_marks =$obtained_marks_array[$i];
		if(!empty($subject_name)){
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
     $this->db->insert('result_subject_marks',$insert_student_result);
		} 
      }
	  $this->session->set_userdata('SUCESSMSG','Your Student Result Added Successfully..');
	  echo 1;
	  exit;
	 }else{
	 echo 2;
	 exit;
	  }                       
   }
 public function delete_my_notifications(){
     $id=$this->input->post('id');
	 $this->db->where('nid',$id);
	 $query=$this->db->delete('notification_master');
	 if($query==true){
	  echo 1;
	   $this->session->set_userdata('SUCESSMSG','Your Notification Deleted Successfully..');
	  exit;
	  }else{
	  echo 0;
	  exit;
	   }
    }
 public function update_banner_images(){
   if(!empty($_FILES["Principle_schools_image"]["name"])){
     $Principle_schools_image=$_FILES["Principle_schools_image"]["name"];
   //  $string=explode('.',$_FILES["Principle_schools_image"]["name"]);
    // $Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
	 //move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
	 	$upload_img = $this->cwUpload('Principle_schools_image','assets/slider/main/','',TRUE,'assets/slider/','1280','650');
   }else{
   $Principle_schools_image=$_POST['defaultimage'];
   }
      $id=$this->input->post('mid');
       $data=array('slider_banner_images'=>$Principle_schools_image,
	             'slider_Heading'=>$this->input->post('slider_Heading'),
				  'slider_small_heading'=>$this->input->post('slider_small_heading'));
	     $this->db->where('mid',$id);
		 $result=$this->db->update('tbl_main_slider',$data);
		// echo $this->db->last_query();
		 //exit;
	//   $result=$this->supper_admin->supper_update_admin($data);
	 if($result==true){
	    $this->session->set_userdata('SUCESSMSG','Slider Images Updated  Successfully..');
		redirect('schools_slider');     
	 }else{
	   echo 'not addedd';
	  }
    // $this->supper_admin->update_banner_images($_POST,$Principle_schools_image);
  }
 public function send_application_request(){
    $parent_id=$_SESSION['PARENT_ID'];
	$date=date('Y-m-d');
	$get_row=$this->db->query("select *from tbl_parent where Ptid='$parent_id'")->row();
	$class=$get_row->Student_class_division;
	$division=$get_row->divsion;
	$pid=$get_row->pid;
	$insert_array=array('class'=>$class,'pid'=>$pid,'sid'=>$parent_id,'division'=>$division,'application_for'=>$this->input->post('application_for'),'application_description'=>$this->input->post('application_description'),'create_date'=>$date,'app_status'=>'pending');
	$result=$this->db->insert('application_request',$insert_array);
	 if($result==true){
	    $this->session->set_userdata('SUCESSMSG','Your Application Request Send Successfully');
		redirect('application-request');     
	 }else{
	   echo 'not addedd';
	  }
    }
public function student_request_approved(){
     $id=$this->input->post('id');
	 $update=array('app_status'=>'approved');
	 $this->db->where('arid',$id);
	 $query=$this->db->update('application_request',$update);
	  if($query==true){
	    $this->session->set_userdata('SUCESSMSG','Application Request Approved Successfully');
		//redirect('application-request');     
		echo 1; 
	 }else{
	   echo 'not addedd';
	  }
   }
 public function student_request_cancel(){
     $id=$this->input->post('id');
	 $update=array('app_status'=>'cancel');
	 $this->db->where('arid',$id);
	 $query=$this->db->update('application_request',$update);
	  if($query==true){
	    $this->session->set_userdata('SUCESSMSG','Application Request Cancel Successfully');
		//redirect('application-request');     
		echo 1;
	 }else{
	   echo 'not addedd';
	  }
   }
 }
?>