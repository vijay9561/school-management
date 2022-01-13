<?php
error_reporting(0); 
require_once APPPATH."/third_party/instamojo/instamojo.php";
class Users_controller  extends MY_Controller{
    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');
 }
   public function index(){
    $data = array('year' => $this->uri->segment(3),
                  'month' => $this->uri->segment(4));

   		$data['template']='index';
		$data['title'] ='Home';
		$data['page']='Home';
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
   public function about_us(){
	   $data['template']='about-us';
		$data['title'] ='About Us';
		$data['page']='About Us';
		$this->layout_users($data);	 
   }
    public function create_ghoswara(){
	    $data['template']='create-ghoshwara';
		$data['title'] ='Create Ghoswara';
		$data['page']='Create Ghoswara';
		$this->layout_users($data);	 
   }
   public function terms_and_condition(){
	   $data['template']='terms_and_condition';
		$data['title'] ='Terms & Condition';
		$data['page']='Terms & Condition';
		$this->layout_users($data);
	}
	 public function student_fees_details(){
	   $data['template']='student_fees_details';
		$data['title'] ='Student Fees Details';
		$data['page']='Student Fees Details';
		$this->layout_users($data);
    }
	 public function bonafied_certificate(){
	   $data['template']='bonafied_certificate';
		$data['title'] ='Bonafied Certificate';
		$data['page']='Bonafied Certificate';
		$this->layout_users($data);
    }
	  public function nirgam_uttara(){
	   $data['template']='nirgam_uttara';
		$data['title'] ='Niram Uttara';
		$data['page']='Niram Uttara';
		$this->layout_users($data);
    }
	  public function leaving_ceritificate(){
	   $data['template']='leaving_certificate';
		$data['title'] ='Leaving Certificate';
		$data['page']='Leaving Certificate';
		$this->layout_users($data);
    }
	
	 public function bonafied_certificate_english_medium(){
	   $data['template']='bonafied_certificate_english';
		$data['title'] ='Bonafied Certificate';
		$data['page']='Bonafied Certificate';
		$this->layout_users($data);
    }
	  public function nirgam_uttara_english_medium(){
	   $data['template']='nirgam_uttara_english_medium';
		$data['title'] ='Niram Uttara';
		$data['page']='Niram Uttara';
		$this->layout_users($data);
    }
	  public function leaving_ceritificate_english_medium(){
	   $data['template']='leaving_certificate_english_medium';
		$data['title'] ='Leaving Certificate';
		$data['page']='Leaving Certificate';
		$this->layout_users($data);
    }
	
   public function sales_man_login(){
	    $data['template']='salesman_login';
		$data['title'] ='Salesman Login';
		$data['page']='Salesman Login';
		$this->layout_users($data);
    }
	 public function sales_man_profiles(){
	    $data['template']='sales_man_profiles';
		$data['title'] ='Salesman Profile';
		$data['page']='Salesman Profile';
		$this->layout_users($data);
    }
	 public function salesman_school_details(){
	    $data['template']='salesman_school';
		$data['title'] ='Salesman School Details';
		$data['page']='Salesman School Details';
		$this->layout_users($data);
    }
	public function school_invoice(){
	    $data['template']='invoice';
		$data['title'] ='Invoice Details';
		$data['page']='Invoice Details';
		$this->layout_users($data);
    }
	 public function schools_invoice_details(){
	    $data['template']='invoice_view_details';
		$data['title'] ='Schools Invoice Details';
		$data['page']='Schools Invoice Details';
		$this->layout_users($data);
    }
    public function student_history(){
	$currentrecords=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
	$pid_test=$currentrecords->login_id;
	$tbl_parent_query=$this->db->query("select *from tbl_parent where pid='$pid_test'")->result();
	//echo $this->db->last_query();
	//exit;
	if(count($tbl_parent_query)>=1){
	  foreach($tbl_parent_query as $row){
	  $old_schools =$row->old_schools; $gr_code =$row->gr_code; $admission_date =$row->admission_date; $student_id_no =$row->student_id_no; 
	  $u_id_no = $row->u_id_no;  $adhar_card =$row->adhar_card; 
	  $pan_no =$row->pan_no; 
	  $Parent_mobile_no =$row->Parent_mobile_no; 
	  $Student_roll_no =$row->Student_roll_no; 
	  $Student_class_division =$row->Student_class_division; 
	  $divsion  =$row->divsion; 
	  $medium =$row->medium; 
	  $Student_year =$row->Student_year; 
	  $Student_name =$row->Student_name; 
	  $gender =$row->gender; 
	  $mother_name =$row->mother_name; 
	  $address =$row->address; 
	  $cast =$row->cast; 
	  $sub_cast =$row->sub_cast; 
	  $nationality =$row->nationality; 
	  $birth_place =$row->birth_place; 
	  $dob =$row->dob; 
	  $date_of_birth_word =$row->date_of_birth_word; 
	  $bank_no =$row->bank_no; 
      $account_no =$row->account_no; 
	  $ifc_code =$row->ifc_code; 
	   $pid =$row->pid;
	   $Subgenre=$row->Subgenre; 
	  $Date=date('Y-m-d H:i:s');
	  $Status='active';
	  $duplicatation_records=$this->db->query("select *from tbl_student_history where adhar_card='$adhar_card' and Student_year='$Student_year'")->result();
	  	   $insert_array=array('pid'=>$pid,'old_schools'=>$old_schools,'gr_code'=>$gr_code,'admission_date'=>$admission_date,'student_id_no'=>$student_id_no,'u_id_no'=>$u_id_no,'adhar_card'=>$adhar_card,'pan_no'=>$pan_no,'Parent_mobile_no'=>$Parent_mobile_no,'Student_roll_no'=>$Student_roll_no,'Student_class_division'=>$Student_class_division,'divsion'=>$divsion,'medium'=>$medium,'Student_year'=>$Student_year,'Student_name'=>$Student_name,'gender'=>$gender,'mother_name'=>$mother_name,'address'=>$address,'cast'=>$cast,'sub_cast'=>$sub_cast,'nationality'=>$nationality,'birth_place'=>$birth_place,'dob'=>$dob,'date_of_birth_word'=>$date_of_birth_word,'bank_no'=>$bank_no,'ifc_code'=>$ifc_code,'Date'=>$Date,'Status'=>$Status,'Subgenre'=>$Subgenre);
	  if(count($duplicatation_records)==0){
	$this->db->insert('tbl_student_history',$insert_array);
	  }else{
	 $this->db->where('adhar_card',$adhar_card);
	 $this->db->update('tbl_student_history',$insert_array);    
	  }
    }
  }
	    $data['template']='student_history';
		$data['title'] ='Student History';
		$data['page']='Student History';
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
	  //$result=$this->users_model->registration_principles($_POST);
	  $data=$this->input->post();
	  	    $date=date('Y-m-d H:i:s');
	    $newarray=array('Principle_name'=>$data['Principle_name'],
						'Principle_email'=>$data['Principle_email'],
						'Principle_password'=>$data['Principle_password'],
						'Principle_school_name'=>$data['Principle_school_name'],
						'Principle_mobile_no'=>$data['Principle_mobile_no'],
						'address'=>$data['Principle_schools_city'],
						'reg_no'=>$data['reg_no'],
						'data_operators'=>'principal',
						'Status'=>'pending',
						'gender'=>$data['gender'],
						'establish_year'=>$data['establish_year'],
						'sales_id'=>$data['sales_id'],
						'Date'=>$date);
		$duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$data['Principle_email']."'")->result();
	   $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$data['Principle_email']."'")->result();
	   $check_duplicate=count($duplicateemails)+count($duplicate_teachers);
	   
        if ($check_duplicate == 0) {
			$this->db->insert('tbl_principle',$newarray);
                        $id= $this->db->insert_id();
                //   $this->session->set_userdata('principal_id',$id);    
                //   $_SESSION['principal_id_current']=$id;
                        
	
           $name=$data['Principle_name'];
			$password=$data['Principle_name'];
			$email=$data['Principle_email'];
			$school_name=$data['Principle_school_name'];	  
			$mobile=$data['Principle_mobile_no'];	  
	        $mail_subject="VMBSS-New School Registeration";
	  $body='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
</head><body style="background-color:#edeff0">
<table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #edeff0;width: 100%; padding-top:20px; padding-bottom:20px;" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="vertical-align: top">
      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top; padding-top: 20px;padding-bottom: 20px;">
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
        <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;background-color: #2b2a2a;padding-bottom: 10px;padding-left: 10px;">
                <div style="background-color: transparent; width: 100% !important;">
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;background-color: #2b2a2a;">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
					  <div>
					  <h1 style="color: white;font-size:28px;">
                      <img align="left" border="0" src="http://vmbss.org/assets/img/VML.png" alt="Image" title="Image" style="outline: none;text-decoration: none;border: 0;float:left;width: 100px;max-width: 600px;margin-top: -24px;">
					  VIMALAI SCHOOL MANAGEMENT</h1>
					  </div>
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                    <div class="">
             <div style="line-height:120%;color:#febc11;font-family:Droid Serif, Georgia, Times, Times New Roman, serif; padding-right: 10px; padding-left: 10px; padding-top: 0px;
padding-bottom: 3px;">
                        <div style="font-size:12px;line-height:14px;font-family:Droid Serif, Georgia, Times, Times New Romanserif;color:#f39229;text-align:left;">
                          <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><span style="font-size: 36px; line-height:20px;"><strong><span style="line-height:20px; font-size:22px;">WELCOME TO VIMLAI SCHOOL MANAGEMENT</span></strong></span></p>
                        </div>
                      </div>
                    </div>
                    <div >
                  </div>
                 <div>
             <div style="color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; margin-top:-50px;">
                        <div style="font-size:12px;line-height:24px;color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                          <span style="font-size:16px;line-height:19px; margin-left:20px;">
						    <p style="font-size: 14px;text-align:left;"><strong><span style="font-size:18px;">Hello VMBSS Team,</strong></p>
                          <p style="color: #000000; text-align:justify; font-size:16px;">
	                         The following school have visited your site. the details are 
	                        <p style="line-height:5px;color:#000;"><strong>1)  School Name :</strong> '.$school_name.'</p>
	                        <p style="line-height:5px;color:#000;"><strong>2) Contact Parson Name :</strong> '.$name.'</p>
							 <p style="line-height:5px;color:#000;"><strong>2) Contact Numb. :</strong> '.$mobile.'</p>
							  <p style="line-height:5px;color:#000;"><strong>2) Email ID. :</strong> '.$email.'</p>
						  </p>
                        </div>
                      </div>
                    </div>
              <br />
					<div style="margin-left:10px; margin-bottom:10px;"><strong style="font-size:16px;font-style: italic;">Thanks & Regards</strong><br />
					<span style="padding-top:20px; margin-top:10px;">VIMALAI SCHOOL MANANGEMENT TEAM</span><br />
					<span style="padding-top:20px; margin-top:10px;">Visit Us At<a target="_blank" href="http://www.vmbss.com"> www.vmbss.com</a></span>
					</div>
                    <div style="background-color: #4e4646;">
                      <div class="">
                     
                        <div style="line-height:120%;color:#F99495;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 25px;">
                          <div style="font-size:12px;line-height:14px;color:#fff;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                            <p style="margin: 0;font-size:18px;line-height: 17px;text-align: center"><span style="font-size:14px; line-height: 13px;"> 
							<br />Note: If it wasnt you please immediately contact sales@vmbss.org
                              Once again, we thank you for using Vimlai School Management trusted products.
                              </span>
                            </p>
                          </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <div align="center" style="padding-right: 10px; padding-left: 10px; padding-bottom:10px;" class="">
                        <div style="line-height:10px;font-size:1px">&#160;</div>
                        <div style="display: table;">
                          <table align="left" border="0" cellspacing="0" cellpadding="0" tyle="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px">
                            <tbody>
                              <tr style="vertical-align: top">
                                <td align="left" valign="middle">
								<a href="#" title="Facebook" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> 
								<a href="#" title="Twitter" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/twitter@2x.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> <a href="#" title="Telegram" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/telegram@2x.png" alt="Telegram" title="Telegram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width:32px !important"> </a>
                                </td>					
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>';

 $body1='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
</head><body style="background-color:#edeff0">
<table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #edeff0;width: 100%; padding-top:20px; padding-bottom:20px;" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="vertical-align: top">
      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top; padding-top: 20px;padding-bottom: 20px;">
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
        <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;background-color: #2b2a2a;padding-bottom: 10px;padding-left: 10px;">
                <div style="background-color: transparent; width: 100% !important;">
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;background-color: #2b2a2a;">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
					  <div>
					  <h1 style="color: white;font-size:28px;">
                      <img align="left" border="0" src="http://vmbss.org/assets/img/VML.png" alt="Image" title="Image" style="outline: none;text-decoration: none;border: 0;float:left;width: 100px;max-width: 600px;margin-top: -24px;">
					  VIMALAI SCHOOL MANAGEMENT</h1>
					  </div>
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                    <div class="">
             <div style="line-height:120%;color:#febc11;font-family:Droid Serif, Georgia, Times, Times New Roman, serif; padding-right: 10px; padding-left: 10px; padding-top: 0px;
padding-bottom: 3px;">
                        <div style="font-size:12px;line-height:14px;font-family:Droid Serif, Georgia, Times, Times New Romanserif;color:#f39229;text-align:left;">
                          <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><span style="font-size: 36px; line-height:20px;"><strong><span style="line-height:20px; font-size:22px;">WELCOME TO VIMLAI SCHOOL MANAGEMENT</span></strong></span></p>
                        </div>
                      </div>
                    </div>
                    <div >
                  </div>
                 <div>
             <div style="color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; margin-top:-50px;">
                        <div style="font-size:12px;line-height:24px;color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                          <span style="font-size:16px;line-height:10px; margin-left:20px;">
						    <p style="font-size: 14px;text-align:left; margin-top:25px;"><strong><span style="font-size:18px;">Hello '.$school_name.',</strong></p>
                          <p style="color: #000000; text-align:justify; font-size:16px;">
				           <h2 style="color: #851bbd;font-weight: bold; font-size:20px;">CONGRATULATION AND GREETINGS !</h2>
						   <h2 style="line-height:20px; width:100%; font-size:18px;"><span style="color: #851bbd;">Thanks for visiting</span><span style="color:#FF0000">  VIMLAI SCHOOL MANAGEMENT</span><br /><span style="font-size:14px;color: #851bbd;">Our Representatives Will be Contacting You Soon . </span></h2>
						  </p>
                        </div>
                      </div>
                    </div>
              <br />
					<div style="margin-left:10px; margin-bottom:10px;"><strong style="font-size:16px;font-style: italic;">Thanks & Regards</strong><br />
					<span style="padding-top:20px; margin-top:10px; color:red; font-weight:bold;">VIMALAI SCHOOL MANANGEMENT</span>
					<p>
					Fl No 05, S No 43/46, Savitri Vihar B Wing<br />
					NR Navdeep Society, Manaji Nagar,<br />
					Narhe, Pune - 411041<br />
					PH.NO:- +91 7083926023 <br />
					E-MAIL :- sales@vmbss.org<br />
					
					<span style="padding-top:20px; margin-top:10px;">Visit Us At<a target="_blank" href="http://www.vmbss.com"> www.vmbss.com</a></span>
					</p>
					</div>
                    <div style="background-color: #4e4646;">
                      <div class="">
                     
                        <div style="line-height:120%;color:#F99495;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 25px;">
                          <div style="font-size:12px;line-height:14px;color:#fff;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                            <p style="margin: 0;font-size:18px;line-height: 17px;text-align: center"><span style="font-size:14px; line-height: 13px;"> 
							<br />Note: If it wasnt you please immediately contact sales@vmbss.org
                              Once again, we thank you for using Vimlai School Management trusted Organization.
                              </span>
                            </p>
                          </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <div align="center" style="padding-right: 10px; padding-left: 10px; padding-bottom:10px;" class="">
                        <div style="line-height:10px;font-size:1px">&#160;</div>
                        <div style="display: table;">
                          <table align="left" border="0" cellspacing="0" cellpadding="0" tyle="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px">
                            <tbody>
                              <tr style="vertical-align: top">
                                <td align="left" valign="middle">
								<a href="#" title="Facebook" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> 
								<a href="#" title="Twitter" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/twitter@2x.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> <a href="#" title="Telegram" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/telegram@2x.png" alt="Telegram" title="Telegram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width:32px !important"> </a>
                                </td>
							
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>';
      $from_email = "sales@vmbss.org";
	  $mail_subject1='Your School Registration Successfully..';
        //Load email library
		 $config = Array('mailtype' => 'html','charset' => 'iso-8859-1','wordwrap' => TRUE);
        $this->load->library('email');
		$this->email->initialize($config);
        $this->email->from($from_email, 'VMBSS');
        $this->email->to('sales@vmbss.org');
        $this->email->subject($mail_subject);
        $this->email->message($body);		
		
        
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from($from_email, 'VMBSS');
			$this->email->to($email);
			$this->email->subject($mail_subject1);
			$this->email->message($body1);
			$this->email->send();
	
             $this->session->set_userdata('SUCESSMSG','Your school registration successfully and your school super admin is approve. after then you will login');             
             
             echo $id;
           //  redirect("checkout_payment?chekout=".$id);   
           exit;
          
        } else{
           // redirect(site_url()); 
         // $_SESSION['ErrorsMsg']='This Email ID Already Registered';
           echo 0; exit;
       //   exit;
        }
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
  public function login_process(){
     $data=$this->input->post();
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
                echo 1;
                exit;
           //   exit;
	    redirect(site_url());
        } else if(count($teachers)==1) {
		$session_data['TEACHER_ID']=$teachers[0]->Tid;
		$session_data['TEACHER_EMAIL']=$teachers[0]->Teacher_email;
		$session_data['TEACHER_USERNAME']=$teachers[0]->Teacher_name;
		$session_data['SCHOOL_ID']=$teachers[0]->Pid;
		$session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
              echo 1;
              exit;
            // redirect(site_url());
             
			           } else {
                                   echo 2;
                               exit;
		// $this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
		// $_SESSION['ErrorsMsg']='Email ID or Password Incorrect';
           //  redirect(site_url());
        }
	 
    // $data=$this->users_model->principle_login($_POST);
  }
   public function parent_login_process(){
     $this->users_model->parent_login_process($_POST);
  }
   public function teacher_login_process(){
     $this->users_model->teacher_login($_POST);
  }
 public function salesman_login(){
  $this->users_model->salesman_login($_POST);
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
   public function create_final_result(){
			$files = glob('assets/result/*'); // get all file names
			foreach($files as $file){ // iterate files
			if(is_file($file))
			unlink($file); // delete file
			}
	    $data['template']='create_final_result';
		$data['title'] ='Create Final Result';
		$data['page']='Create Final Result';
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
	  }elseif(isset($_SESSION['SALES_ID'])){
	  $id=$this->session->userdata('SALES_ID');
	   $oldpassword=$this->input->post('oldPassword');
	   $newpassword=$this->input->post('newPassword');
      $array=array('password'=>$newpassword);
	  $oldpasswordget=$this->db->query("select password from tbl_sales_users where id='$id'")->result();
	  if($oldpasswordget[0]->password==$oldpassword){
	    $this->db->where('id',$id);
		$this->db->update('tbl_sales_users',$array);
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
    public function clerk_application_request(){
	   $data['template']='view-confirm-application-request';
		$data['title'] ='Applications List';
		$data['page']='Applications List';
		$this->layout_users($data);
	 
   }
  public function principle_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{ $Principle_schools_image=$_POST['defaultimage']; }
		 if(!empty($_FILES["signature"]["name"])){
         $string=explode('.',$_FILES["signature"]["name"]);
         $signature =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["signature"]["name"]));
		move_uploaded_file($_FILES["signature"]["tmp_name"], "assets/signature/" . $signature);
		}else{ $signature=$_POST['signature1']; }
		
	   $this->users_model->principle_update_profiles($_POST,$Principle_schools_image,$signature);

  }

public function clerk_update(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{ $Principle_schools_image=$_POST['defaultimage']; }
	   $this->users_model->clerk_updatation($_POST,$Principle_schools_image);

  }
  public function clerk_update1(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/profile/" . $Principle_schools_image);
		}else{ $Principle_schools_image=$_POST['defaultimage']; }
	   $this->users_model->clerk_updatation1($_POST,$Principle_schools_image);

  }

   public function teacher_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/teacher/" . $Principle_schools_image);
		}else{ $Principle_schools_image=$_POST['defaultimage']; }
	   $this->users_model->teacher_update_profiles1($_POST,$Principle_schools_image);

  }
  
 public function student_update_profiles(){
  if(!empty($_FILES["Principle_schools_image"]["name"])){
$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
  $Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/student/" . $Principle_schools_image);
		}else{  $Principle_schools_image=$_POST['defaultimage']; }  
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
$tbl_attendance1=$this->db->query("select *from tbl_attendance where  attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and  ptid='$id'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and ptid='$id'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();

	$data.='<input type="radio"  name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input checked type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
 echo $data; 	
  }

public function student_attendancesubmithalf(){
$data='';
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
$tbl_attendance1=$this->db->query("select *from tbl_attendance where  attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and  ptid='$id'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and ptid='$id'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
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
$tbl_attendance1=$this->db->query("select *from tbl_attendance where  attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and  ptid='$id'")->result();
if(count($tbl_attendance1)>=1){
$insertarray=array('attendance_status'=>$attendance_status);
       $this->db->where('aid',$tbl_attendance1[0]->aid);
	   $this->db->update('tbl_attendance',$insertarray);
  }else{
   $insertarray=array('tid'=>$tid,'attendance_status'=>$attendance_status,'year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,
					  'status'=>'active','class_name'=>$class_name,'pid'=>$pid,'ptid'=>$id,'divsion'=>$divsion);
	$this->db->insert('tbl_attendance',$insertarray); 
  }	
$tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$attendance_date."' and pid='".$pid."' and  divsion='".$divsion."' and class_name='".$class_name."' and ptid='$id'")->result();
$teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result();
$adhar_card=$this->db->query("select *from tbl_parent where pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' and Ptid='$id'")->result();
if($tbl_attendance[0]->attendance_status=='P'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
}elseif($tbl_attendance[0]->attendance_status=='H'){
$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
 }else{
	$data.='<input type="radio" checked name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_p'.$adhar_card[0]->Ptid.'" onclick="attendance_status_pr('.$adhar_card[0]->Ptid.')" value="P"  class="option-input1 radio" />&nbsp;&nbsp;<span style="color:#006600;">P</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_a'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_ar('. $adhar_card[0]->Ptid.')" value="A" class="option-input radio"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>&nbsp;&nbsp;<input type="radio" name="attendance_status'.$adhar_card[0]->Ptid.'" id="attendance_status_h'.$adhar_card[0]->Ptid.'"  onclick="attendance_status_hr('. $adhar_card[0]->Ptid.')" value="H" class="option-input2 radio"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>';
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
//$mail_to='vikram@vmbss.org';
$mail_to1='vikram@vmbss.org';
//$mail_to2='sandip@vmbss.org';
 $from_email = "info@vmbss.org";
        //Load email library
		 $config = Array('mailtype' => 'html','charset' => 'iso-8859-1','wordwrap' => TRUE);
        $this->load->library('email');
		$this->email->initialize($config);
        $this->email->from($from_email, 'VMBSS');
        $this->email->to($mail_to1);
        $this->email->subject('User Enquiry Send');
        $this->email->message($body);
        //Send mail
        if($this->email->send()){
           $this->session->set_userdata('SUCESSMSG','Your Enquiry Send Successfully..');
           redirect('contact-us');
		  }else{
		echo 'Not Send Mails';  
      }
  }
 public function add_student_time_tables(){
 $id=$_SESSION['PRINCIPLE_ID'];
 $date=date('Y-m-d');
 $get_id=$this->db->query("select login_id from tbl_principle where Pid='$id'")->row();
 $pid=$get_id->login_id;
  $class=$this->input->post('class');
  $division=$this->input->post('division');
 $duplicate_time=$this->db->query("select pid from school_time_table_master where pid='$pid' and division='$division' and class='$class'")->result();

 $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'date'=>$date);
 $time_array=$_POST['time'];
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
 //$pid=$get_id->login_id;
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
	$application=$this->input->post('application_for');
   $duplicate=$this->db->query("select *from application_request where application_for='$application' and class='$class' and division='$division' and sid='$parent_id'")->result();
   if($application=='Bonafide Certificate'){
     if(count($duplicate)==5){
	  $this->session->set_userdata('ERRORMSG','Yearly only 5 time send request for bonafied certificate');
		redirect('application-request?add_new_application=add_new_application');     
	  }
     }elseif($application=='Leaving Certificate'){
	 if(count($duplicate)==2){
	  $this->session->set_userdata('ERRORMSG','only 2 time send request for leaving certificate');
		redirect('application-request?add_new_application=add_new_application');     
	  }
	  }elseif($application=='Marks Memo Certificate'){
	   if(count($duplicate)==2){
	  $this->session->set_userdata('ERRORMSG','only 2 time send request for mark memo certificate');
		redirect('application-request?add_new_application=add_new_application');     
	  }
	  }elseif($application=='Nirgam Uttara'){
	   if(count($duplicate)==3){
	  $this->session->set_userdata('ERRORMSG','only 3 time send request for nirgam uttara certificate');
		redirect('application-request?add_new_application=add_new_application');     
	  }
	  }elseif($application=='Other'){
	   if(count($duplicate)==5){
	  $this->session->set_userdata('ERRORMSG','only 5 time send request for other certificate');
		redirect('application-request?add_new_application=add_new_application');     
	  }
	  }
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
 
  public function update_student_result(){
 $subject_name_array=$_POST['subject_name'];
 $rmid=$_POST['rmid'];
 $maximum_marks_array=$_POST['maximum_marks'];
 $minmum_marks_array=$_POST['minmum_marks'];
 $obtained_marks_array=$_POST['obtained_marks'];
	 $this->db->where('rmid',$rmid);
	 $deletes=$this->db->delete('result_subject_marks');
	 for ($i = 0; $i < count($maximum_marks_array); $i++) {
		$maximum_marks =$maximum_marks_array[$i];
		$minmum_marks = $minmum_marks_array[$i];
		$obtained_marks =$obtained_marks_array[$i];
		$subject_name=$subject_name_array[$i];
		if(!empty($subject_name)){
$insert_week_day_time=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>date('Y-m-d'));
     $this->db->insert('result_subject_marks',$insert_week_day_time);
		} 
      }
	  if($deletes==true){
	  $this->session->set_userdata('SUCESSMSG','Your Student Result Update Successfully..');
	  redirect('view-student-result');
	  //exit;
	  }else{
	  echo 2;
	  exit;
	  }
   }
   
    public function individual_subject_marks_added(){
 $subject_name=$_POST['subject_name'];
 $rmid=$_POST['sttid'];
 $maximum_marks=$_POST['maximum_marks'];
 $minmum_marks=$_POST['minmum_marks'];
 $obtained_marks=$_POST['obtained_marks'];
	$insert_week_day_time=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>date('Y-m-d'));
    $query= $this->db->insert('result_subject_marks',$insert_week_day_time);
	  if($query==true){
	  $this->session->set_userdata('SUCESSMSG','Your Student Subject Marks Added Successfully..');
	  redirect('view-student-result?edit-result='.$rmid);
	  //exit;
	  }else{
	  echo 2;
	  exit;
	  }
   }
   public function delete_individual_student_result(){
     $id=$this->input->post('id');
	 $this->db->where('rsmid',$id);
	 $query=$this->db->delete('result_subject_marks');
	 if($query==true){
	  echo 1;
	   $this->session->set_userdata('SUCESSMSG','Your Student Subject Marks Deleted Successfully..');
	  exit;
	  }else{
	  echo 0;
	  exit;
	   }
    }
public function multiple_student_delete(){
  foreach($_POST['checked_id'] as $val){
  $query=$this->db->query("delete from tbl_parent where Ptid='$val'");
  }
  if($query==true){
  $_SESSION['SUCESSMSG']='Student Deleted Successfully.';
  redirect('student-list-clerk');
  
   }
  }
  public function multiple_student_history_delete(){
  foreach($_POST['checked_id'] as $val){
  $query=$this->db->query("delete from tbl_student_history where Ptid='$val'");
  }
  if($query==true){
  $_SESSION['SUCESSMSG']='Student Deleted Successfully.';
  redirect('student_history');
  
   }
  }
public function get_attendance_data(){
$date['date']=$this->input->post('attendance_date');
$this->load->view('users/site/get_attendance',$date);
}
public function submit_bonafied_student_data(){
     $request_id=$this->input->post('request_id');
	 $pid=$this->input->post('pid');
	 $sid=$this->input->post('parent_id');
	 $select_bonafied_medium=$this->input->post('select_bonafied_medium');
	 $created_date=date('Y-m-d');
	 $tbl_bonafied=$this->db->query("select *from tbl_bonafied where request_id='$request_id'")->row();
	 $tbl_bonafied12=$this->db->query("select *from tbl_bonafied where pid='$pid'")->result();
	 $count=count($tbl_bonafied12)+1;
	 if(count($tbl_bonafied)>=1){
	 $array=array('created_date'=>$created_date);
	 $update_request=array('app_status'=>'received','received_date'=>$created_date,'medium'=>$select_bonafied_medium);
	 $this->db->where('request_id',$request_id);
	 $this->db->update('tbl_bonafied',$array);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	  }else{
	  $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'sid'=>$sid,'bonafied_no'=>mt_rand(100000, 999999));
	 $update_request=array('app_status'=>'received','received_date'=>$created_date);
	 $this->db->insert('tbl_bonafied',$array);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	  }
	  if($select_bonafied_medium=='Marathi'){
	  redirect('bonafied_certificate?application='.$sid.'&applicate_id='.$request_id);
	  }else{
	   redirect('bonafied_certificate_english_medium?application='.$sid.'&applicate_id='.$request_id); 
	  }
   }
 public function submit_nirgam_uttra(){
   $request_id=$this->input->post('application_id');
	 $pid=$this->input->post('pid');
	 $sid=$this->input->post('parent_id');
	 $created_date=date('Y-m-d');
	 $tbl_bonafied=$this->db->query("select *from nigram_uttara where request_id='$request_id'")->row();
	 if(count($tbl_bonafied)>=1){
	 $array=array('created_date'=>$created_date);
	 $update_request=array('app_status'=>'received','received_date'=>$created_date);
	 $this->db->where('request_id',$request_id);
	 $this->db->update('nigram_uttara',$array);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	  }else{
	  $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'parent_id'=>$sid);
	 $update_request=array('app_status'=>'received','received_date'=>$created_date);
	 $this->db->insert('nigram_uttara',$array);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	  }
   }
   
   public function submit_applications_leaving(){
     $request_id=$this->input->post('request_id');
	 $pid=$this->input->post('pid');
	 $parent_id=$this->input->post('parent_id');
	 $student_behavior=$this->input->post('student_behavior');
	 $schools_leaving_date=$this->input->post('schools_leaving_date');
	 $schools_leaving_year=$this->input->post('schools_leaving_year');
	 $schools_leaving_reason=$this->input->post('schools_leaving_reason');
	 $schools_shera=$this->input->post('schools_shera');
	 $student_performance=$this->input->post('student_performance');
	// $sub_caste=$this->input->post('sub_caste');
	 $created_date=date('Y-m-d');
	 $medium=$this->input->post('select_leaving_medium');
	 $tbl_bonafied=$this->db->query("select *from leaving_certificate where request_id='$request_id'")->row();
	  $countss=$this->db->query("select *from leaving_certificate where pid='$pid'")->row();
	  $get_adhar=$this->db->query("select adhar_card from tbl_parent where Ptid='$parent_id'")->row();
	  $counts=count($countss)+1;
	 if(count($tbl_bonafied)>=1){
	 $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'parent_id'=>$parent_id,'student_behavior'=>$student_behavior,'schools_leaving_date'=>$schools_leaving_date,'schools_leaving_year'=>$schools_leaving_year,'schools_leaving_reason'=>$schools_leaving_reason,'schools_shera'=>$schools_shera,'student_performance'=>$student_performance);
	 $this->db->where('request_id',$request_id);
	$result=$this->db->update('leaving_certificate',$array);	  
	  }else{
	 $update_request=array('app_status'=>'received','received_date'=>$created_date,'medium'=>$medium);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	 $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'parent_id'=>$parent_id,'student_behavior'=>$student_behavior,'schools_leaving_date'=>$schools_leaving_date,'schools_leaving_year'=>$schools_leaving_year,'schools_leaving_reason'=>$schools_leaving_reason,'schools_shera'=>$schools_shera,'student_performance'=>$student_performance,'leaving_no'=>mt_rand(100000, 999999));
	$result=$this->db->insert('leaving_certificate',$array);
	/*deleteing student all table history*/
	$this->db->query("delete from tbl_attendance where ptid='$parent_id'");
    $this->db->query("delete from tbl_fees where parent_id='$parent_id'");
	$this->db->query("delete from notification where adhar_card='$get_adhar->adhar_card'");
	$this->db->query("update tbl_parent set Status='inactive' where Ptid='$parent_id'");
	  }
	 if($medium=='Marathi'){
	 redirect('leaving_ceritificate?application='.$parent_id.'&applicate_id='.$request_id);
	 }else{
	 redirect('leaving_ceritificate_english_medium?application='.$parent_id.'&applicate_id='.$request_id);
	  }
   }
  
   public function submit_nirgam_uttra1(){
     $request_id=$this->input->post('request_id');
	 $pid=$this->input->post('pid');
	// $sub_caste=$this->input->post('sub_caste');
	 $parent_id=$this->input->post('parent_id');
     $student_performance=$this->input->post('student_performance');
	 $student_behavior=$this->input->post('student_behavior');
	 $schools_leaving_date=$this->input->post('schools_leaving_date');
	 $schools_leaving_reason=$this->input->post('schools_leaving_reason');
	 $schools_shera=$this->input->post('schools_shera');
	 $medium=$this->input->post('select_nirgam_medium');
	 $created_date=date('Y-m-d');
	 $nigram_uttara=$this->db->query("select *from nigram_uttara where request_id='$request_id'")->row();
	 $nirgam_count=$this->db->query("select *from nigram_uttara where pid='$pid'")->row();
	 $counts=count($nirgam_count)+1;
	 if(count($nigram_uttara)>=1){
	 $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'parent_id'=>$parent_id,'student_performance'=>$student_performance,'student_behavior'=>$student_behavior,'schools_leaving_date'=>$schools_leaving_date,'schools_leaving_reason'=>$schools_leaving_reason,'schools_shera'=>$schools_shera);
	 $this->db->where('request_id',$request_id);
	$result=$this->db->update('nigram_uttara',$array);
	  }else{
	 $update_request=array('app_status'=>'received','received_date'=>$created_date,'medium'=>$medium);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
	 $array=array('created_date'=>$created_date,'request_id'=>$request_id,'pid'=>$pid,'parent_id'=>$parent_id,'student_performance'=>$student_performance,'student_behavior'=>$student_behavior,'schools_leaving_date'=>$schools_leaving_date,'schools_leaving_reason'=>$schools_leaving_reason,'schools_shera'=>$schools_shera,'nirgam_no'=>mt_rand(100000, 999999));
	$result=$this->db->insert('nigram_uttara',$array);
    
	  }
	if($medium=='Marathi'){
	 redirect('nirgam_uttara?application='.$parent_id.'&applicate_id='.$request_id);
	 }else{
	  redirect('nirgam_uttara_english_medium?application='.$parent_id.'&applicate_id='.$request_id);
	  }
   }

   
    public function submit_leaving_printings(){
     $request_id=$this->input->post('application_id');
	 $pid=$this->input->post('pid');
	 $sid=$this->input->post('parent_id');
	 $created_date=date('Y-m-d');
	 $update_request=array('app_status'=>'received','received_date'=>$created_date);
	 $this->db->where('arid',$request_id);
	 $this->db->update('application_request',$update_request);
   }
   public function get_total_attendance_counts(){
   $date['attendance_date']=$this->input->post('attendance_date');
$this->load->view('users/site/total-attendance-count-ajax',$date);
}
public function all_student_attendance_submit(){
      
	  $attendance_date=$this->input->post('attendance_date');
	  $y=date('Y',strtotime($attendance_date));
	  $m=date('m',strtotime($attendance_date));
	  $current_date=date('Y-m-d');
	  $teacher_id=$_SESSION['TEACHER_ID'];
	  $teacher=$this->db->query("select  schools_name,divsion,Pid,Tid from tbl_teacher where Tid='$teacher_id'")->row();
	  $class=$teacher->schools_name; $division=$teacher->divsion; $pid=$teacher->Pid; $tid=$teacher->Tid;
	  $tbl_parent=$this->db->query("select Ptid from tbl_parent where Student_class_division='$class' and divsion='$division' and pid='$pid'")->result();
	  $days=date('D',strtotime($attendance_date));
	   $holidayslist=$this->db->query("select pid,yid,date1 from child_master where date1='$attendance_date' and pid='".$pid."'")->result();
		$yid=$holidayslist[0]->yid;
	  $holi=$this->db->query("select event_name from yearly_holiday_master where yid='$yid'")->result();
	 if(count($holidayslist)>=1){
	  echo 2;
	  exit;
	 }elseif($days=='Sun'){
	   echo 1;
	   exit;
	  }else{
	  foreach($tbl_parent as $row){
	  $parent_id=$row->Ptid;
	  $duplicate_entry=$this->db->query("select attendance_date,ptid from tbl_attendance where ptid='$parent_id' and attendance_date='$attendance_date'")->row();
	  if(count($duplicate_entry)==0){
    $insertarray=array('tid'=>$tid,'attendance_status'=>'P','year'=>$y,'month'=>$m,'date'=>$current_date,'attendance_date'=>$attendance_date,'status'=>'active','class_name'=>$class,'pid'=>$pid,'ptid'=>$parent_id,'divsion'=>$division);
	$this->db->insert('tbl_attendance',$insertarray);
	   } 
	  }
	$date['date']=$this->input->post('attendance_date');
    $this->load->view('users/site/get_attendance',$date);
    }
   }
  public function add_student_fees(){
      $total_fees=trim($this->input->post('total_fees'));
	  $paid_fees=trim($this->input->post('paid_fees'));
	  $dicount_percentage=trim($this->input->post('dicount_percentage'));
      $exam_total_fees=trim($this->input->post('exam_total_fees'));
      $exam_recives_fess=trim($this->input->post('exam_recives_fess'));
      $tour_recives_fess=trim($this->input->post('tour_recives_fess'));
      $tour_total_fees=trim($this->input->post('tour_total_fees'));
      $other_total_fees=trim($this->input->post('other_total_fees'));
	  $other_recive_fees=trim($this->input->post('other_recive_fees'));
	  $class=$this->input->post('class');
	  $division=$this->input->post('division');
	  $pid=$this->input->post('pid');
	  $parent_id=$this->input->post('parent_id');
	  $date=date('Y-m-d');
	  if($dicount_percentage==0){
	  $total_discount_fees=$total_fees;
	  }else{
      $total_discount_fees = $total_fees - ($total_fees * ($dicount_percentage / 100));
	  }
    $insert_array=array('total_fees'=>$total_fees,'total_discount_fees'=>$total_discount_fees,'dicount_percentage'=>$dicount_percentage,'exam_total_fees'=>$exam_total_fees,'exam_recives_fess'=>$exam_recives_fess,'tour_total_fees'=>$tour_total_fees,'tour_recives_fess'=>$tour_recives_fess,'other_total_fees'=>$other_total_fees,'other_recive_fees'=>$other_recive_fees,'pid'=>$pid,'division'=>$division,'parent_id'=>$parent_id,'class'=>$class,'exam_fees_date'=>date('d-m-Y'),'tour_fees_date'=>date('d-m-Y'),'other_fees_date'=>date('d-m-Y'),'create_date'=>$date);
	 $success=$this->db->insert('tbl_fees',$insert_array);
	 $id=$this->db->insert_id();
	 $fess_array=array('fees_id'=>$id,'installment_amount'=>$paid_fees,'date'=>date('d-m-Y'));
	 $this->db->insert('tbl_installment_amount',$fess_array);
	 if($success==true){
	 $this->session->set_userdata('SUCESSMSG','Student fees added successfully.');
	 redirect('student-fees-details');
	   }else{
	     echo 'Not Created Fees';
	   }
     }
	 
	 
	  public function update_student_fees(){
      $total_fees=trim($this->input->post('total_fees'));
	  $paid_fees=trim($this->input->post('paid_fees'));
	  $dicount_percentaget121=trim($this->input->post('dicount_percentage'));
	  //echo $dicount_percentaget;
	  //exit;
      $id=$this->input->post('id');
	  $t=$this->db->query("select *from tbl_fees where id='$id'")->row();
      $exam_recives_fess=trim($this->input->post('exam_recives_fess'));
      $tour_recives_fess=trim($this->input->post('tour_recives_fess'));
	  $other_recive_fees=trim($this->input->post('other_recive_fees'));
	  if($t->exam_recives_fess==$exam_recives_fess){
	    $exam_date=$t->exam_fees_date;
	  }else{
	   $exam_date=date('d-m-Y');
	  }
	  if($t->tour_recives_fess==$tour_recives_fess){
	    $tour_date=$t->exam_fees_date;
	  }else{
	   $tour_date=date('d-m-Y');
	  }
	  if($t->other_recive_fees==$other_recive_fees){
	    $other_date=$t->other_fees_date;
	  }else{
	   $other_date=date('d-m-Y');
	  }
	  $total_fees123=$this->input->post('total_fees123');
	  if($dicount_percentaget121==0){
	  $total_discount_fees=$total_fees123;
	  }else{
      $total_discount_fees = $total_fees123 - ($total_fees123 * ($dicount_percentaget121 / 100));
	  }
    $insert_array=array('exam_recives_fess'=>$exam_recives_fess,'tour_recives_fess'=>$tour_recives_fess,'other_recive_fees'=>$other_recive_fees,'exam_fees_date'=>$exam_date,'tour_fees_date'=>$tour_date,'other_fees_date'=>$other_date,'dicount_percentage'=>$dicount_percentaget121,'total_discount_fees'=>$total_discount_fees);
	 $this->db->where('id',$id);
	 $success=$this->db->update('tbl_fees',$insert_array);
	// echo $this->db->last_query();
	 //exit;
	// $id=$this->db->insert_id();
	if(!empty($paid_fees)){
	 $fess_array=array('fees_id'=>$id,'installment_amount'=>$paid_fees,'date'=>date('d-m-Y'));
	 $this->db->insert('tbl_installment_amount',$fess_array);
	 }
	 if($success==true){
	 $this->session->set_userdata('SUCESSMSG','Student installment fees added successfully.');
	 redirect('student-fees-details');
	   }else{
	     echo 'Not Created Fees';
	   }
     }
	 
	  public function add_student_fees_details(){
      $total_fees=trim($this->input->post('total_fees1'));
	  $dicount_percentage=trim($this->input->post('dicount_percentage'));
	  $class=$this->input->post('class');
	  $division=$this->input->post('division');
	  $pid=$this->input->post('pid');
	  $parent_id=$this->input->post('parent_id');
	  $date=date('Y-m-d');
	  if($dicount_percentage==0){
	  $total_discount_fees=$total_fees;
	  }else{
      $total_discount_fees = $total_fees - ($total_fees * ($dicount_percentage / 100));
	  }
    $insert_array=array('total_fees'=>$total_fees,'total_discount_fees'=>$total_discount_fees,'dicount_percentage'=>$dicount_percentage,'pid'=>$pid,'division'=>$division,'parent_id'=>$parent_id,'class'=>$class,'create_date'=>date('Y-m-d'));
	 $success=$this->db->insert('tbl_fees_master',$insert_array);
	 $id=$this->db->insert_id();
	 $fees_type_array=$_POST['fees_type'];
	 $paid_fees_array=$_POST['paid_fees'];
	 $created_date_array=$_POST['created_date'];
		 for ($i = 0; $i < count($fees_type_array); $i++) {
		$fees_type =$fees_type_array[$i];
		$total_fees = $total_fees_array[$i];
		$paid_fees =$paid_fees_array[$i];
		$created_date=$created_date_array[$i];
		if(!empty($fees_type )){
		$date=$created_date;
		}else{
		$date='0000-00-00';
		}
$insertdata=array('fees_type'=>$fees_type,'paid_fees'=>$paid_fees,'fees_id'=>$id,'created_date'=>$date);
     $this->db->insert('tbl_fees_type',$insertdata); 
      }
	 if($success==true){
	 $this->session->set_userdata('SUCESSMSG','Student fees added successfully.');
	 redirect('student-fees-details');
	   }else{
	     echo 'Not Created Fees';
	   }
     }
	 
	 
	 public function update_student_fees_details(){
      $total_fees=trim($this->input->post('total_fees1'));
	  $dicount_percentage=trim($this->input->post('dicount_percentage'));
	  $class=$this->input->post('class');
	  $division=$this->input->post('division');
	  $pid=$this->input->post('pid');
	  $parent_id=$this->input->post('parent_id');
	  $fees_id=$this->input->post('fees_id');
	  $date=date('Y-m-d');
	  if($dicount_percentage==0){
	  $total_discount_fees=$total_fees;
	  }else{
      $total_discount_fees = $total_fees - ($total_fees * ($dicount_percentage / 100));
	  }
    $insert_array=array('total_fees'=>$total_fees,'total_discount_fees'=>$total_discount_fees,'dicount_percentage'=>$dicount_percentage,'pid'=>$pid,'division'=>$division,'parent_id'=>$parent_id,'class'=>$class);
	          $this->db->where('id',$fees_id);
	 $success=$this->db->update('tbl_fees_master',$insert_array);
	// $id=$this->db->insert_id();
	 $fees_type_array=$_POST['fees_type'];
	
	 $paid_fees_array=$_POST['paid_fees'];
	 $install_ment_array=$_POST['intallmentid'];
	 $created_date_array=$_POST['created_date'];
	 
	 //print_r($install_ment_array);
	 //exit;
		 for ($i = 0; $i < count($fees_type_array); $i++) {
		$fees_type =$fees_type_array[$i];
		$paid_fees =$paid_fees_array[$i];
		$remaining_fees=$remaining_fees_array[$i];
		$update_id=$install_ment_array[$i];
		 if(!empty($fees_type)){
		$date=$created_date_array[$i];
		}else{
		$date='0000-00-00';
		}
		if(!empty($update_id)){
     $insertdata=array('fees_type'=>$fees_type,'paid_fees'=>$paid_fees,'created_date'=>$date);
     $this->db->where('id',$update_id);
     $this->db->update('tbl_fees_type',$insertdata); 
	 }else{
	 $insertdata=array('fees_type'=>$fees_type,'paid_fees'=>$paid_fees,'created_date'=>$date,'fees_id'=>$fees_id);
     $this->db->insert('tbl_fees_type',$insertdata); 
	 }
    }
	 if($success==true){
	 $this->session->set_userdata('SUCESSMSG','Student fees updated successfully.');
	 redirect('student-fees-details');
	   }else{
	     echo 'Not Created Fees';
	   }
     }
      public function checkout_payment(){
            
          
	        $data['template']='checkout';
		$data['title'] ='Pay Payment';
		$data['page']='Applications List';
		$this->layout_users($data);
            
   }
     public function thank_you_payment_recived(){
         
         // Testing Key API KEY test_c2fe63caf43569ef687266537ce  Auth Token :test_9ec7ab76e29c6087dcd81e6e17d
         // Live Details API KEY: 2b7859c26b094fc26b03db25a5024ec3 Auth Token: 5152839afdaa76a3c87d56b73d08690b
         
$api = new Instamojo\Instamojo('test_c2fe63caf43569ef687266537ce', 'test_9ec7ab76e29c6087dcd81e6e17d','https://test.instamojo.com/api/1.1/');
$payid = $_GET["payment_request_id"];            
       try {
    $response = $api->paymentRequestStatus($payid);
  //  print_r($response);
   // exit;
    if($response['status']=='Completed'){
       $payment_id1= $response['payments'][0]['payment_id'];
      $duplication=$this->db->query("select *from school_payment where payment_id='$payment_id1'")->result();
      if(count($duplication)==0){
           $purpose=$response['purpose'];
          if($purpose=='Annual School Charges'){
          $invoice_id=$_GET['id'];
         $school_payment=$this->db->query("select *from school_payment where inovice_id='$invoice_id'")->row();
        if(count($school_payment)==0){
        $this->db->query("update tbl_invoice set school_status='PAID' where id='$invoice_id'");
       $email=$response['email'];
       $get=$this->db->query("select Pid from tbl_principle where Principle_email='$email'")->row();
       $payment_id= $response['payments'][0]['payment_id'];
       $currency= $response['payments'][0]['currency'];
       $amount= $response['payments'][0]['amount'];
       $txid=$response['id'];
       $status=$response['status'];
       $get_data_in=$this->db->query("select created_date from tbl_invoice where id='$invoice_id'")->row();
       
       $from_date=$get_data_in->created_date;
       $to_date= date('Y-m-d', strtotime($from_date. ' + 365 days'));
       
       $this->db->query("update tbl_principle set Status='active',from_date='$from_date',to_date='$to_date' where Principle_email='$email'");
       $this->db->query("update tbl_teacher set Status='active' where Pid='".$get->Pid."'");
       $this->db->query("update tbl_parent set Status='active' where pid='".$get->Pid."'");
       $this->db->query("update tbl_principle set Status='active' where login_id='".$get->Pid."'");
        
         
       $insert_array=array('school_id'=>$get->Pid,'txid'=>$txid,'payment_amount'=>$amount,'currency'=>$currency,'payment_id'=>$payment_id,'payment_type'=>'Annual Charges','dates'=>date('Y-m-d H:i:s'));   
       $this->db->insert('school_payment',$insert_array);
        }else{
       $this->db->query("update tbl_invoice set school_status='PAID' where id='$invoice_id'");
       $email=$response['email'];
       $get=$this->db->query("select Pid from tbl_principle where Principle_email='$email'")->row();
       $payment_id= $response['payments'][0]['payment_id'];
       $currency= $response['payments'][0]['currency'];
       $amount= $response['payments'][0]['amount'];
       $txid=$response['id'];
       $status=$response['status'];
       $get_data_in=$this->db->query("select created_date from tbl_invoice where id='$invoice_id'")->row();
       
       $from_date=$get_data_in->created_date;
       $to_date= date('Y-m-d', strtotime($from_date. ' + 365 days'));
       
       $this->db->query("update tbl_principle set Status='active',from_date='$from_date',to_date='$to_date' where Principle_email='$email'");
       $this->db->query("update tbl_teacher set Status='active' where Pid='".$get->Pid."'");
       $this->db->query("update tbl_parent set Status='active' where pid='".$get->Pid."'");
       $this->db->query("update tbl_principle set Status='active' where login_id='".$get->Pid."'"); 
       $insert_array=array('school_id'=>$get->Pid,'txid'=>$txid,'payment_amount'=>$amount,'currency'=>$currency,'payment_id'=>$payment_id,'payment_type'=>'Annual Charges','dates'=>date('Y-m-d H:i:s'),'payment_status'=>'PAID','payment_method'=>'Online');   
       $this->db->where('inovice_id',$invoice_id);
       $this->db->update('school_payment',$insert_array);   
         }    
        }else{
        
        $email=$response['email'];
       $get=$this->db->query("select Pid from tbl_principle where Principle_email='$email'")->row();
       $payment_id= $response['payments'][0]['payment_id'];
       $currency= $response['payments'][0]['currency'];
       $amount= $response['payments'][0]['amount'];
       $txid=$response['id'];
       $status=$response['status'];
       $this->db->query("update tbl_principle set Status='active' where Principle_email='$email'");
       $insert_array=array('school_id'=>$get->Pid,'txid'=>$txid,'payment_amount'=>$amount,'currency'=>$currency,'payment_id'=>$payment_id,'payment_type'=>'Registration Charges','dates'=>date('Y-m-d H:i:s'));   
       $this->db->insert('school_payment',$insert_array);
      }
      }
    }
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
$data['payment_id']=$response['payments'][0]['payment_id'];
$data['amount']=$response['payments'][0]['amount'];
$data['template']='thankyou';
$data['title'] ='Thank You Payment Recived';
$data['page']='Thank You Payment Recived';
$this->layout_users($data);
	 
   }
   public function proced_to_payment(){
       $principal_name=$this->input->post('principal_name');
       $Pid= base64_decode($principal_name);
       $d=$this->db->query("select *from tbl_principle where Pid='$Pid'")->row();
       if(count($d)>=1){
       $api = new Instamojo\Instamojo('test_c2fe63caf43569ef687266537ce', 'test_9ec7ab76e29c6087dcd81e6e17d','https://test.instamojo.com/api/1.1/');
       try {
    $response = $api->paymentRequestCreate(array(
        "purpose" =>'School Registration Charges',
        "amount" => 1000,
        "send_email" => true,
        "email" => $d->Principle_email,
        "buyer_name" => $d->Principle_school_name,
        "phone" =>  $d->Principle_mobile_no,
        "send_sms" => true,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://localhost/school/thank_you_payment_recived"
       // "webhook" => "http://localhost/instamojopay/webhook.php"
    ));
   // print_r($response);
   // exit;

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
   // exit();
  

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
     } 
   }else{
       redirect(site_url());   
   }
  }
  public function checked_duplication_email_id(){
      $email_id=$this->input->post('email');
    //  echo $email_id;
    $duplicateemails=$this->db->query("select Principle_email from tbl_principle where Principle_email='".$email_id."'")->result();
    $duplicate_teachers=$this->db->query("select Teacher_email from tbl_teacher where Teacher_email='".$email_id."'")->result();
     $check_duplicate=count($duplicateemails)+count($duplicate_teachers);  
 //  exit;
    if($check_duplicate==0){
        echo 1; exit;
    }else{
      echo 2; exit;   
    }
   }
public function get_payment_details(){
    $cheque_no=$this->input->post('cheque_no');
    $payment_mode=$this->input->post('payment_mode');
     $Pid= base64_decode($this->input->post('pid'));
     $invoice_name=base64_decode($this->input->post('invoice_name'));
      
     $get_amount=$this->db->query("SELECT SUM(`software_charges`+`data_entry_charges`+`maintenance_charges`+`customization_charges`+`reactivation_charges`+`other_charges`) as totalamount FROM `tbl_invoice` WHERE id='$invoice_name'")->result();
     if($payment_mode=='Online'){
      
     
   
       $d=$this->db->query("select *from tbl_principle where Pid='$Pid'")->row();
       if(count($d)>=1){
       $api = new Instamojo\Instamojo('test_c2fe63caf43569ef687266537ce', 'test_9ec7ab76e29c6087dcd81e6e17d','https://test.instamojo.com/api/1.1/');
       try {
    $response = $api->paymentRequestCreate(array(
        "purpose" =>'Annual School Charges',
        "amount" => $get_amount[0]->totalamount,
        "send_email" => true,
        "email" => $d->Principle_email,
        "buyer_name" => $d->Principle_school_name,
        "phone" =>  $d->Principle_mobile_no,
        "send_sms" => true,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://localhost/school/thank_you_payment_recived?id=".$invoice_name
       // "webhook" => "http://localhost/instamojopay/webhook.php"
    ));
    $pay_ulr = $response['longurl'];
    //Redirect($response['longurl'],302); //Go to Payment page
    header("Location: $pay_ulr");
   // exit();
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
     } 
   }else{
       redirect(site_url('schools_invoice_details'));   
   }
     }elseif($payment_mode=='Cheque'){
     //  $getduplication=$this->db->query("se");
        $txn='VMBSS'.time();
       $getid=$this->db->query("select *from school_payment where inovice_id='$invoice_name'")->result();
       if(count($getid)==0){
       $insert_array=array('school_id'=>$Pid,'txid'=>$txn,'payment_amount'=>$get_amount[0]->totalamount,'currency'=>'INR','payment_id'=>$cheque_no,'payment_type'=>'Annual Charges','dates'=>date('Y-m-d H:i:s'),'payment_status'=>'PENDING','inovice_id'=>$invoice_name,'payment_method'=>'Cheque');   
       $this->db->insert('school_payment',$insert_array);
       $this->db->query("update tbl_invoice set school_status='PENDING' where id='$invoice_name'");
       $this->session->set_userdata('SUCESSMSG','Your cheque details submitted successfully');
      redirect('schools_invoice_details'); 
       }else{
        $insert_array=array('school_id'=>$Pid,'txid'=>$txn,'payment_amount'=>$get_amount[0]->totalamount,'currency'=>'INR','payment_id'=>$cheque_no,'payment_type'=>'Annual Charges','payment_status'=>'PENDING','inovice_id'=>$invoice_name,'payment_method'=>'Cheque');   
       $this->db->where('inovice_id',$invoice_name);
       $this->db->update('school_payment',$insert_array);
       $this->db->query("update tbl_invoice set school_status='PENDING' where id='$invoice_name'");
       $this->session->set_userdata('SUCESSMSG','Your cheque details submitted successfully');
      redirect('schools_invoice_details');     
       }
     }else{
      redirect('schools_invoice_details'); 
     }
    }
  }
?>