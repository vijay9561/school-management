<?php 
 class Users_model extends CI_Model {
   	public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

 public function registration_principles($data) {
	    $date=date('Y-m-d H:i:s');
       $newarray=array('Principle_name'=>$data['Principle_name'],
						'Principle_email'=>$data['Principle_email'],
						'Principle_password'=>$data['Principle_password'],
						'Principle_school_name'=>$data['Principle_school_name'],
						'Principle_mobile_no'=>$data['Principle_mobile_no'],
						'address'=>$data['Principle_schools_city'],
						'reg_no'=>$data['reg_no'],
						'data_operators'=>'principal',
						'Status'=>'inactive',
						'gender'=>$data['gender'],
						'establish_year'=>$data['establish_year'],
						'sales_id'=>$data['sales_id'],
						'Date'=>$date);
		$duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Principle_email']."'")->result();
	   $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Principle_email']."'")->result();
	   $check_duplicate=count($duplicateemails)+count($duplicate_teachers);
        if ($check_duplicate == 0) {
			$this->db->insert('tbl_principle',$newarray);
	$this->session->set_userdata('SUCESSMSG','Your school registration successfully and your school super admin is approve. after then you will login');
        
        //Send mail
	 echo 1;
	exit;
			 
        } else {
           echo 2;
		   exit;
        }
    }
 public function clerk_creation($data) {
	    $date=date('Y-m-d H:i:s');
       $newarray=array('Principle_name'=>$data['Teacher_name'],
						'Principle_email'=>$data['Teacher_email'],
						'Principle_password'=>$data['Teacher_password'],
						'Principle_mobile_no'=>$data['Teacher_mobile_no'],
						'adhar_card'=>$data['adhar_card'],
						'dob'=>$data['dob'],
						'address'=>$data['address'],
						'pan_card'=>$data['pan_card'],
						'monthly_salary'=>$data['payment'],
						'acount_no'=>$data['account_no'],
						'ifc_code'=>$data['ifc_code'],
						'data_operators'=>'clerk',
						'gender'=>$data['gender'],
						'Status'=>'active',
						'login_id'=>$_SESSION['PRINCIPLE_ID'],
						'Date'=>$date);
		 $duplicateemails1=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Teacher_email']."'")->result();
		 $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
		 $duplicateemails=count($duplicateemails1)+count($duplicate_teachers);
        if ($duplicateemails == 0) {	 
        } else {
           echo 2;
		   exit;
        }
	$duplicate_desginations=$this->db->query("select data_operators from tbl_principle where login_id='".$_SESSION['PRINCIPLE_ID']."' and data_operators='clerk'")->result();
	//echo $this->db->last_query();
	//exit;
	  if (count($duplicate_desginations)<4) {
	  $this->db->insert('tbl_principle',$newarray);
	  echo 1;
	  $this->session->set_userdata('SUCESSMSG','Your Clerk Registration Successfully..');
	  exit;
	  }else{
	  echo 3;
	  exit;
	  }
    }
	
	 public function clerk_updatation($data,$images) {
	    //$date=date('Y-m-d H:i:s');
		$pid=$data['Pid'];
       $newarray=array('Principle_name'=>$data['Teacher_name'],
						'Principle_email'=>$data['Teacher_email'],
						'Principle_password'=>$data['Teacher_password'],
						'Principle_mobile_no'=>$data['Teacher_mobile_no'],
						'adhar_card'=>$data['adhar_card'],
						'dob'=>$data['dob'],
						'Principle_schools_image'=>$images,
						'address'=>$data['address'],
						'pan_card'=>$data['pan_card'],
						'monthly_salary'=>$data['payment'],
						'acount_no'=>$data['account_no'],
						'gender'=>$data['gender'],
						'ifc_code'=>$data['ifc_code']);
						
					   $duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Teacher_email']."'")->result();
		               $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
					   $duplicateemails1=count($duplicateemails)+count($duplicate_teachers);
					   
					if($duplicateemails[0]->Principle_email==$data['Teacher_email']){
					$this->db->where('Pid',$pid);
					$this->db->update('tbl_principle',$newarray);
					  $this->session->set_userdata('SUCESSMSG','Your Clerk Updated Successfully..');
					echo 1;
					exit; 
					}	
					if ($duplicateemails1 == 0) {	
					$this->db->where('Pid',$pid);
					$this->db->update('tbl_principle',$newarray);
					$this->session->set_userdata('SUCESSMSG','Your Clerk Updated Successfully..');
					echo 1;
					exit; 
					} else {
					echo 2;
					exit;
					}
          }	

 public function clerk_updatation1($data,$images) {
	    //$date=date('Y-m-d H:i:s');
		$pid=$data['Pid'];
       $newarray=array('Principle_name'=>$data['Teacher_name'],
						'Principle_email'=>$data['Teacher_email'],
						'Principle_password'=>$data['Teacher_password'],
						'Principle_mobile_no'=>$data['Teacher_mobile_no'],
						'adhar_card'=>$data['adhar_card'],
						'dob'=>$data['dob'],
						'Principle_schools_image'=>$images,
						'address'=>$data['address'],
						'pan_card'=>$data['pan_card'],
						'monthly_salary'=>$data['payment'],
						'acount_no'=>$data['account_no'],
						'gender'=>$data['gender'],
						'ifc_code'=>$data['ifc_code']);
					   $duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Teacher_email']."'")->result();
		               $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
					   $duplicateemails1=count($duplicateemails)+count($duplicate_teachers);
					if($duplicateemails[0]->Principle_email==$data['Teacher_email']){
					$this->db->where('Pid',$pid);
					$this->db->update('tbl_principle',$newarray);
					  $this->session->set_userdata('SUCESSMSG','Your Clerk Updated Successfully..');
					echo 1;
					exit; 
					}	
					if ($duplicateemails1 == 0) {	
					$this->db->where('Pid',$pid);
					$this->db->update('tbl_principle',$newarray);
					$this->session->set_userdata('SUCESSMSG','Your Clerk Updated Successfully..');
					echo 1;
					exit; 
					} else {
					echo 2;
					exit;
					}
          }	

		
public function principle_login($data) {
		$query=$this->db->query("select *from tbl_principle where Principle_email='".$data['email']."' and Principle_password like binary'".$data['password']."' and Status='active'")->result();
	   $teachers=$this->db->query("select *from tbl_teacher where Teacher_email='".$data['email']."' and Teacher_password like binary'".$data['password']."' and status='active'")->result();

        if (count($query) == 1) {
		$session_data['PRINCIPLE_ID']=$query[0]->Pid;
		$session_data['PRINCIPLE_EMAIL']=$query[0]->Principle_email;
		$session_data['PRINCIPLE_USERNAME']=$query[0]->Principle_name;
		$session_data['USERTYPE']=$query[0]->data_operators;
		if($query[0]->data_operators=='clerk'){
		$session_data['SCHOOL_ID']=$query[0]->login_id;
		}else{
		$session_data['SCHOOL_ID']=$query[0]->Pid;
		}
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
	    redirect(site_url());
        } else if(count($teachers)==1) {
		$session_data['TEACHER_ID']=$teachers[0]->Tid;
		$session_data['TEACHER_EMAIL']=$teachers[0]->Teacher_email;
		$session_data['TEACHER_USERNAME']=$teachers[0]->Teacher_name;
		$session_data['SCHOOL_ID']=$teachers[0]->Pid;
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
             redirect(site_url());
			           } else {
		// $this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
		 $_SESSION['ErrorsMsg']='Email ID or Password Incorrect';
            redirect(site_url());
        }
    }
public function parent_login_process($data) {
     //   $query = $this->db->query('admin', array('email' => $data['user_name'], 'password like binary' => $data['password']));
		$query=$this->db->query("select *from tbl_parent where adhar_card='".$data['student_aadhar']."'  and Status='active'")->result();
      // echo count($query);
	   //exit;
        if (count($query) == 1) {
		$session_data['PARENT_ID']=$query[0]->Ptid;
		$session_data['PARENT_ADHAR_CARD']=$query[0]->adhar_card;
		$session_data['PARENT_USERNAME']=$query[0]->Student_name;
		$session_data['SCHOOL_ID']=$query[0]->pid;
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
            echo 1;
			exit;
        } else {
		//$this->session->set_userdata('ErrorsMsg','Adhar Card Number Incorrect');
           echo 2;
		   exit;
        }
    }


public function teacher_creation_process($data){
    $date=date('Y-m-d H:i:s');
     $insertarray=array('Teacher_name'=>$data['Teacher_name'],
						'Teacher_email'=>$data['Teacher_email'],
						'Teacher_password'=>$data['Teacher_password'],
						'Teacher_mobile_no'=>$data['Teacher_mobile_no'],
						'schools_name'=>$data['schools_name'],
						'divsion'=>$data['divsion'],
						'year'=>$data['year'],
						'Pid'=>$data['principleid'],
						'status'=>'active',
						'dob'=>$data['dob'],
						'gender'=>$data['gender'],
						'pan_card'=>$data['pan_card'],
						'adhar_card'=>$data['adhar_card'],
						'payment'=>$data['payment'],
						'account_no'=>$data['account_no'],
						'ifc_code'=>$data['ifc_code'],
						'address'=>$data['address'],
						'teacher_type'=>'teacher',
						'Date'=>$date);
	   //$duplicateteacher=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
	                   $duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Teacher_email']."'")->result();
		               $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
					   $duplicateemails1=count($duplicateemails)+count($duplicate_teachers);
	    //$duplicateteacher=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
	   if($duplicateemails1==0){
	   $this->db->insert('tbl_teacher',$insertarray);
	   $this->session->set_userdata('SUCESSMSG','Teacher Registration Successfully..');
	   echo 1;
	   exit;
	   }else{
	//   $this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
           echo 2;
		   exit;
	   }
     }
	 
	 public function non_teaching_registration($data){
    $date=date('Y-m-d H:i:s');
     $insertarray=array('Teacher_name'=>$data['Teacher_name'],
						'Teacher_email'=>$data['Teacher_email'],
						'Teacher_password'=>$data['Teacher_password'],
						'Teacher_mobile_no'=>$data['Teacher_mobile_no'],
						'Pid'=>$data['principleid'],
						'status'=>'active',
						'dob'=>$data['dob'],
						'pan_card'=>$data['pan_card'],
						'adhar_card'=>$data['adhar_card'],
						'teacher_type'=>'clarke',
						'payment'=>$data['payment'],
						'account_no'=>$data['account_no'],
						'ifc_code'=>$data['ifc_code'],
						'address'=>$data['address'],
						'Date'=>$date);
	                   $duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Teacher_email']."'")->result();
		               $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
					   $duplicateemails1=count($duplicateemails)+count($duplicate_teachers);
	    //$duplicateteacher=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Teacher_email']."'")->result();
	   if($duplicateemails1==0){
	   $this->db->insert('tbl_teacher',$insertarray);
	   $this->session->set_userdata('SUCESSMSG','Teacher Registration Successfully..');
	   echo 1;
	   exit;
	   }else{
	//   $this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
           echo 2;
		   exit;
	   }
     }

public function teacher_deletion($id){
     $this->db->where('Tid',$id);
	 $query=$this->db->delete('tbl_teacher');
	 if($query==true){
	 echo 1;
	  $this->session->set_userdata('SUCESSMSG','Teacher Deleted Successfully..');
	 exit;
	 }else{
	 echo 2;
	 exit;
    }
  }
 public function principle_update_profiles($data,$images,$signature){
 $newarray=array('Principle_name'=>$data['Principle_name'],
				'Principle_email'=>$data['Principle_email'],
				'Principle_school_name'=>$data['Principle_school_name'],
				'Principle_mobile_no'=>$data['Principle_mobile_no'],
				'Principle_schools_city'=>$data['Principle_schools_city'],
				'aternative_phone'=>$data['aternative_phone'],
				'land_line_number'=>$data['land_line_number'],
				'address'=>$data['address'],
				'gender'=>$data['gender'],
				'reg_no'=>$data['reg_no'],
				'establish_year'=>$data['establish_year'],
				'signature'=>$signature,
				'schools_slogan'=>$data['schools_slogan'],
				'board_of_director'=>$data['board_of_director'],
				'Principle_schools_image'=>$images);
		$this->db->where('Pid',$data['principle_id']);
		$query=$this->db->update('tbl_principle',$newarray);
		if($query==true){
		$this->session->set_userdata('SUCESSMSG','Profile Updated Successfully..');
		echo 1;
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   public function teacher_update_profiles($data,$images){
   $newarray=array('Teacher_name'=>$data['Teacher_name'],
						'Teacher_email'=>$data['Teacher_email'],
						'Teacher_password'=>$data['Teacher_password'],
						'Teacher_mobile_no'=>$data['Teacher_mobile_no'],
						'schools_name'=>$data['schools_name'],
						'divsion'=>$data['divsion'],
						'year'=>$data['year'],
						'dob'=>$data['dob'],
						'gender'=>$data['gender'],
						'pan_card'=>$data['pan_card'],
						'adhar_card'=>$data['adhar_card'],
						'payment'=>$data['payment'],
						'account_no'=>$data['account_no'],
						'ifc_code'=>$data['ifc_code'],
						'address'=>$data['address'],
						'Teacher_profile_image'=>$images);
		$this->db->where('Tid',$data['Tid']);
		$query=$this->db->update('tbl_teacher',$newarray);
		if($query==true){
		$this->session->set_userdata('SUCESSMSG','Teacher Profile Updated Successfully..');
		echo 1;
		exit;
		}else{
		echo 2;
		exit;
		}
   }
    public function teacher_update_profiles1($data,$images){
  $newarray=array('Teacher_name'=>$data['Teacher_name'],
						'Teacher_email'=>$data['Teacher_email'],
						'Teacher_mobile_no'=>$data['Teacher_mobile_no'],
						'schools_name'=>$data['schools_name'],
						'divsion'=>$data['divsion'],
						'year'=>$data['year'],
						'dob'=>$data['dob'],
						'gender'=>$data['gender'],
						'pan_card'=>$data['pan_card'],
						'adhar_card'=>$data['adhar_card'],
						'payment'=>$data['payment'],
						'account_no'=>$data['account_no'],
						'ifc_code'=>$data['ifc_code'],
						'address'=>$data['address'],
						'Teacher_profile_image'=>$images);
		$this->db->where('Tid',$data['Tid']);
		$query=$this->db->update('tbl_teacher',$newarray);
		if($query==true){
		$this->session->set_userdata('SUCESSMSG','Teacher Profile Updated Successfully..');
		echo 1;
		exit;
		}else{
		echo 2;
		exit;
		}
   }
  
   
  public function teacher_login($data) {
		$query=$this->db->query("select *from tbl_teacher where Teacher_email='".$data['Principle_email']."' and Teacher_password like binary'".$data['Principle_password']."' and status='active'")->result();
        if (count($query) == 1) {
		$session_data['TEACHER_ID']=$query[0]->Tid;
		$session_data['TEACHER_EMAIL']=$query[0]->Teacher_email;
		$session_data['TEACHER_USERNAME']=$query[0]->Teacher_name;
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
            echo 1;
			exit;
        } else {
		$this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
           echo 2;
		   exit;
        }
}
public function salesman_login($data){
$query=$this->db->query("select *from tbl_sales_users where email='".$data['sales_email']."' and password like binary'".$data['sales_password']."' and status='active'")->result();
        if (count($query) == 1) {
		$session_data['SALES_ID']=$query[0]->id;
		$session_data['SALES_EMAIL']=$query[0]->email;
		$session_data['SALES_USERNAME']=$query[0]->name;
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
            echo 1;
			exit;
        } else {
		$this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
           echo 2;
		   exit;
        }
    }
public function student_registration_process($data){
	$id=$_SESSION['PRINCIPLE_ID'];
	$date=date('Y-m-d H:i:s');
	$teacherid=$this->db->query("select login_id from tbl_principle where Pid='$id'")->result();
	$pid=$teacherid[0]->login_id;
   $newarray=array('Student_name'=>$data['Student_name'],
   				   'Student_roll_no'=>$data['Student_roll_no'], 
					'Parent_mobile_no'=>$data['Parent_mobile_no'],
					'Student_year'=>$data['year'],
					'divsion'=>$data['divsion'],
					'Student_class_division'=>$data['schools_name'],
					'gr_code'=>$data['gr_code'],
					'dob'=>$data['dob'],
					'pan_no'=>$data['pan_no'],
					'address'=>$data['address'],
					'gender'=>$data['gender'],
					'old_schools'=>$data['old_schools'],
					'date_of_birth_word'=>$data['date_of_birth_word'],
					'account_no'=>$data['account_no'],
					'bank_no'=>$data['bank_no'],
					'ifc_code'=>$data['ifc_code'],
					'Date'=>$date,
					'pid'=>$pid,
					'Status'=>'active',
					'mother_name'=>$data['mother_name'],
					'redensital_address'=>$data['redensital_address'],
					'cast'=>$data['cast'],
					'sub_cast'=>$data['sub_cast'],
					'adhar_card'=>$data['adhar_card'],
					'u_id_no'=>$data['u_id_no'],
					'medium'=>$data['medium'],
					'nationality'=>$data['nationality'],
					'birth_place'=>$data['birth_place'],
					'student_id_no'=>$data['student_id_no'],
					'Subgenre'=>$data['Subgenre'],
					'admission_no'=>$data['admission_no'],
					'admission_date'=>$data['admission_date']);
		            $currentyeat=date('Y');
		//print_r($newarray);
		
$duplicatationtest=$this->db->query("select *from tbl_parent where Student_roll_no='".$data['Student_roll_no']."' AND pid='".$pid."' AND Student_year='".$data['year']."'")->result();
$adhar_card1=$this->db->query("select *from tbl_parent where adhar_card='".$data['adhar_card']."'")->result();
//echo $this->db->last_query();
//exit;
		$string=explode('-',$data['year']);
		if(count($adhar_card1)>=1){
		 echo 5;
		 exit;
		}elseif($string[0]<=$currentyeat){
		   $this->db->insert('tbl_parent',$newarray);
		// echo   $this->db->last_query();
		   echo 1;
		   $this->session->set_userdata('SUCESSMSG','Student Added Successfully..');
		   exit;
		 }else{
		echo 3;
	   exit;
	}
  }
 public function student_update_profiles($data,$images){
   $newarray=array('Student_name'=>$data['Student_name'],
   				   'Student_roll_no'=>$data['Student_roll_no'],
				    'gr_code'=>$data['gr_code'],
					'Parent_mobile_no'=>$data['Parent_mobile_no'],
					'Student_year'=>$data['year'],
					'adhar_card'=>$data['adhar_card'],
					'dob'=>$data['dob'],
					'pan_no'=>$data['pan_no'],
					'address'=>$data['address'],
					'old_schools'=>$data['old_schools'],
					'account_no'=>$data['account_no'],
					'Student_year'=>$data['year'],
					'divsion'=>$data['divsion'],
					'Student_class_division'=>$data['schools_name'],
					'date_of_birth_word'=>$data['date_of_birth_word'],
					'bank_no'=>$data['bank_no'],
					'gender'=>$data['gender'],
					'ifc_code'=>$data['ifc_code'],
					'mother_name'=>$data['mother_name'],
					'redensital_address'=>$data['redensital_address'],
					'cast'=>$data['cast'],
					'sub_cast'=>$data['sub_cast'],
					'Student_profile_picture'=>$images,
					'u_id_no'=>$data['u_id_no'],
					'medium'=>$data['medium'],
					'nationality'=>$data['nationality'],
					'birth_place'=>$data['birth_place'],
					'student_id_no'=>$data['student_id_no'],
					'Subgenre'=>$data['Subgenre'],
					'admission_no'=>$data['admission_no'],
					'admission_date'=>$data['admission_date']);
			$currentyeat=date('Y');
			$string=explode('-',$data['year']);
			$duplicateadhar=$this->db->query("select adhar_card from tbl_parent where Ptid='".$data['Ptid']."'")->result();
			$duplicateadhar1=$this->db->query("select adhar_card from tbl_parent where Ptid='".$data['adhar_card']."'")->result();
			if($duplicateadhar[0]->adhar_card==$data['adhar_card']){
			}else{
			if(count($duplicateadhar1)==0){
			}else{
			 echo 3;
			 exit;
			}
		}
			if($string[0]<=$currentyeat){
			$this->db->where('Ptid',$data['Ptid']);
			$this->db->update('tbl_parent',$newarray);
		//	echo $this->db->last_query();
			//exit;
			$this->session->set_userdata('SUCESSMSG','Student Updated Successfully..');
			echo 1;
			exit;
			}else{
			echo 2;
			exit;	
			}
			}
public function student_holidays_submisssions($data){
           // $pid=$_SESSION['PRINCIPLE_ID'];
			$get_records=$this->db->query("select login_id from tbl_principle where pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
			$pid=$get_records->login_id;
           $newarray=array('event_name'=>$data['event_name'],'fromdate'=>$data['fromdate'],'todate'=>$data['todate'],'ptid'=>$pid,'status'=>'active');
	$duplicatecounts=$this->db->query("select *from  yearly_holiday_master where (fromdate>='".$data['fromdate']."' AND todate<='".$data['todate']."') and ptid='$pid'")->result();
	
		if(count($duplicatecounts)==0){
		$this->db->insert('yearly_holiday_master',$newarray);
		$id=$this->db->insert_id();
		$from = $data['fromdate'];
        $to =$data['todate'];

$diff = abs(strtotime($to) - strtotime($from));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$i=0;
while($i<=$days){
$date = new DateTime($data['fromdate']);
$date->modify('+'.$i.' day');
$child_date= $date->format("Y-m-d");
$array=array('pid'=>$pid,'yid'=>$id,'date1'=>$child_date);
$this->db->insert('child_master',$array);
$i++;
}

		$this->session->set_userdata('SUCESSMSG','Holiday added successfully....');
		echo 1;
		exit;
		}else{
	    echo 2;
	    exit;
	   }			
   }
   
   public function update_holidays_events($data){
            $get_records=$this->db->query("select login_id from tbl_principle where pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
			$pid=$get_records->login_id;
			$yid=$data['yid'];
           $newarray=array('event_name'=>$data['event_name'],
		                   'fromdate'=>$data['fromdate'],
						   'todate'=>$data['todate']);
	$duplicatecounts=$this->db->query("select *from  yearly_holiday_master where (fromdate>='".$data['fromdate']."' AND todate<='".$data['todate']."') and yid='$yid'")->result();
	//echo 'hi'.count($duplicatecounts);
	//exit;
	$duplicatecounts1=$this->db->query("select *from  yearly_holiday_master where (fromdate>='".$data['fromdate']."' AND todate<='".$data['todate']."') and ptid='$pid'")->result();
	if(($duplicatecounts[0]->fromdate==$data['fromdate']) and ($duplicatecounts[0]->todate==$data['todate'])){
	$this->db->where('yid',$yid);
	$this->db->update('yearly_holiday_master',$newarray);
	$this->session->set_userdata('SUCESSMSG','Holiday updated successfully....');
	echo 1; exit;
	}elseif(count($duplicatecounts1)==0){
	$this->db->where('yid',$yid);
	$this->db->update('yearly_holiday_master',$newarray);
	$this->db->where('yid',$yid);
	$this->db->delete('child_master');
	  $from = $data['fromdate'];
        $to =$data['todate'];
$diff = abs(strtotime($to) - strtotime($from));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$i=0;
while($i<=$days){
$date = new DateTime($data['fromdate']);
$date->modify('+'.$i.' day');
$child_date= $date->format("Y-m-d");
$array=array('pid'=>$pid,'yid'=>$yid,'date1'=>$child_date);
$this->db->insert('child_master',$array);
$i++;
}
    $this->session->set_userdata('SUCESSMSG','Holiday updated successfully....');
	echo 1; exit;
	}else{
	echo 2; exit;
    	}         			
      }
public function notifications_add($data){
       $date=date('Y-m-d');
       $insertarr=array('notification_name'=>$data['notification_name'],
	                    'expiry_date'=>$data['expiry_date'],
						 'start_date'=>$data['start_date'],
						'pid'=>$data['pid'],
						'date'=>$date);
			$result=$this->db->insert('notification_master',$insertarr);
		if($result==true){
		  echo 1;
		  $this->session->set_userdata('SUCESSMSG','Notification Adeed successfully....');
		} else{
		 echo 2;
		}
      }
public function update_notifications($data){
 $insertarr=array('notification_name'=>$data['notification_name'],
                  'start_date'=>$data['start_date'],
	                    'expiry_date'=>$data['expiry_date']);
				$this->db->where('nid',$data['nid']);
		$result=$this->db->update('notification_master',$insertarr);
		if($result==true){
		  echo 1;
		  $this->session->set_userdata('SUCESSMSG','Notification updated successfully....');
		} else{
		 echo 2;
		}
}
public function add_new_notifications($data){
     $stid=$data['student_name'];
	 $notification_description=$data['notification_description'];
	 $id=$_SESSION['TEACHER_ID'];
	 $date=date('Y-m-d H:i:s');
	 if($stid=='All'){
	 $teacher_id=$this->db->query("select Pid,divsion,schools_name from tbl_teacher where Tid='$id'")->row();
	 $pid=$teacher_id->Pid; 
	 $class=$teacher_id->schools_name; 
	 $div=$teacher_id->divsion; 
	 $addusers=array('notification_description'=>$notification_description,'status'=>'active','date1'=>$date,'notification_type'=>'common','pid'=>$pid,'class_name'=>$class,'division'=>$div);
	 $result=$this->db->insert('notification',$addusers);
	 }else{
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
	 $this->session->set_userdata('SUCESSMSG','Notification Added Successfully..');
	    echo 1; exit;
		
	  }else{
	    echo 2; exit;
	  }
   }
  public function update_notifications_individaul($data){
       $array=array('notification_description'=>$data['notification_description']);
	   $this->db->where('nid',$data['nid']);
	  $result= $this->db->update('notification',$array);
	    if($result==true){
		$this->session->set_userdata('SUCESSMSG','Notification Updated Successfully..');
	    echo 1; exit;
	  }else{
	    echo 2; exit;
	  }
    }
	public function supper_admin_addimages($data){
     $query=$this->db->insert('tbl_main_slider',$data);
	 if($query==true){
	     return 1;
	   }else{
	   return 2;
	  }
  }
  public function get_times(){
     return $this->db->query("select *from time_master")->result();
    }
  }