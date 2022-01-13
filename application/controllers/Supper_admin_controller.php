<?php 
error_reporting(0);
class Supper_admin_controller  extends MY_Controller{

   public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');
 }
   public function supper_admin_login(){
	  $this->load->view('admin/site/login');
	}
   public function deshboard(){
   		$data['template']='home';
		$data['title'] ='Supper Admin Dashboard';
		$data['page']='Supper Admin Dashboard';
		$this->layout_admin($data);
   }
   public function notification_admin(){
   		$data['template']='notification';
		$data['title'] ='Admin Notification';
		$data['page']='Admin Notification';
		$this->layout_admin($data);
   }
   public function division_and_class_master(){
   		$data['template']='class_division_master';
		$data['title'] ='Class Division Master';
		$data['page']='Class Division Master';
		$this->layout_admin($data);
   }
   public function admin_import_student_excel_sheet(){
   		$data['template']='import_data_in_excel';
		$data['title'] ='Import Excel Sheet';
		$data['page']='Import Excel Sheet';
		$this->layout_admin($data);
   }
   public function invoice_details(){
   		$data['template']='invoice-printing';
		$data['title'] ='Inovice Details';
		$data['page']='Inovice Details';
		$this->layout_admin($data);
   }
   public function invoice_view_details(){
   		$data['template']='view_invoice_details';
		$data['title'] ='View Invoice Details';
		$data['page']='View Invoice Details';
		$this->layout_admin($data);
   }
public function salesman_users(){
   		$data['template']='salesman_users';
		$data['title'] ='Salesman Users';
		$data['page']='Salesman Users';
		$this->layout_admin($data);
   }
public function partner_commision(){
   		$data['template']='partner_users';
		$data['title'] ='Partner Users';
		$data['page']='Partner Users';
		$this->layout_admin($data);
   }
 public function add_new_class(){
 $class=$this->input->post('class');
 $array=array('name'=>$class);
 $query=$this->db->insert('schools_master',$array);
 if($query==true){
 $this->session->set_userdata('SUCESSMSG','Class Added Successfully..');
 redirect('division_and_class_master');
 }else{
 echo 'not added';
   }
 }  
 public function add_new_division(){
 $class=$this->input->post('division');
 $array=array('divison_name'=>$class);
 $query=$this->db->insert('divison_master',$array);
 if($query==true){
 $this->session->set_userdata('SUCESSMSG','Division Added Successfully..');
 redirect('division_and_class_master');
 }else{
 echo 'not added';
   }
  }
      public function main_sliders(){
   		$data['template']='add-slider-images';
		$data['title'] ='Slider Images';
		$data['page']='Slider Images';
		$this->layout_admin($data);
   }                                                                                 
    public function principle_update_profiles(){                                                      
   if(!empty($_FILES["Principle_schools_image"]["name"])){
  $Principle_schools_image=$_FILES["Principle_schools_image"]["name"];
   //$string=explode('.',$_FILES["Principle_schools_image"]["name"]);
   //$Principle_schools_image =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["Principle_schools_image"]["name"]));
		//move_uploaded_file($_FILES["Principle_schools_image"]["tmp_name"], "assets/slider/" . $Principle_schools_image);
		$upload_img = $this->cwUpload('Principle_schools_image','assets/slider/main/','',TRUE,'assets/slider/','1280','650');
		}
		$date=date('Y-m-d H:i:s');
     $data=array('slider_banner_images'=>$Principle_schools_image,
	             'slider_Heading'=>$this->input->post('slider_Heading'),
				  'slider_small_heading'=>$this->input->post('slider_small_heading'),
				  'datetime'=>$date,
				    'status'=>'active',
					'slider_type'=>'supper');
	   $result=$this->supper_admin->supper_admin_addimages($data);
     if($result==1){
	    $this->session->set_userdata('SUCESSMSG','Slider Images Added Successfully..');
		redirect('main_sliders');     
	 }else{
	   echo 'not addedd';
	  }
  }
  

  public function admin_login(){
    $username=$this->input->post('email');
    $password=$this->input->post('password');
    
    $query=$this->db->query("select *from admin where binary email='".$username."' and binary password='".$password."' and status='active'")->row();  

  
      if (count($query)==1) {
		$session_data['SUPPER_ADMIN_ID']=$query->id;
		$session_data['SUPPER_ADMIN_EMAIL']=$query->email;
		$session_data['SUPPER_ADMIN_USERNAME']=$query->username;
		 $session_data['logged_in'] = TRUE;
		$this->session->set_userdata($session_data);
             // redirect('deshboard');
                echo 1; exit;
         } else {
		$this->session->set_userdata('ErrorsMsg','Email ID or Password Incorrect');
        //   redirect('loginadmin');
             echo 2; exit;
        }
    }
	function logoutuser() {
        $this->session->sess_destroy();
         redirect('loginadmin');
    }
	public function admin_change_password(){
   		$data['template']='change-password';
		$data['title'] ='Change Password';
		$data['page']='Change Password';
		$this->layout_admin($data);
   }
   public function change_password_process(){
       $id=$this->session->userdata('SUPPER_ADMIN_ID');
	   $oldpassword=$this->input->post('oldPassword');
	   $newpassword=$this->input->post('newPassword');
      $array=array('password'=>$newpassword);
	  $oldpasswordget=$this->db->query("select password from admin where id='$id'")->result();
	  if($oldpasswordget[0]->password==$oldpassword){
	    $this->db->where('id',$id);
		$this->db->update('admin',$array);
		$_SESSION['SUCESSMSG']='Password Changed Successfully';
		echo 1;
		exit;
	  } else{
	    echo 2;
		exit;
	  }
   }
public function admin_principle(){
   		$data['template']='principle1';
		$data['title'] ='Principle View';
		$data['page']='Principle View';
		$this->layout_admin($data);
   } 
 public function delete_principle(){
	   $id=$this->input->post('id');
	     $this->db->where('Pid',$id);
		$clerek=$this->db->delete('tbl_principle');
	   $this->db->where('login_id',$id);
	$query=$this->db->delete('tbl_principle');
	$this->db->where('Pid',$id);
	$query=$this->db->delete('tbl_teacher');
	$this->db->where('pid',$id);
	$query=$this->db->delete('tbl_parent');
		if($query==true){
		echo 1;
		$_SESSION['SUCESSMSG']='Principle Deleted Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   
   public function principle_status_inactive(){
	   $id=$this->input->post('id');
	   $schools=$this->db->query("select Principle_name,Principle_school_name,Principle_email from tbl_principle where Pid='$id'")->row();
	    $array=array('Status'=>'inactive');
		$this->db->where('Pid',$id);
	   $clerek=$this->db->update('tbl_principle',$array);
	   $this->db->where('login_id',$id);
	   $query=$this->db->update('tbl_principle',$array);
	   $this->db->where('pid',$id);
	   $query12=$this->db->update('tbl_parent',$array);
	    $this->db->where('Pid',$id);
	   $query122=$this->db->update('tbl_teacher',$array);
		if($query==true){
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
						    <p style="font-size: 14px;text-align:left; margin-top:25px;"><strong><span style="font-size:18px;">Hello '.$schools->Principle_name.',</strong></p>
                          <p style="color: #000000; text-align:justify; font-size:16px;">
						   <h2 style="line-height:20px; width:100%; font-size:14px;"><span style="color: #851bbd;">Your School deactivated. if you can activated please contact on vimlai school management</span></h2>
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
	  $mail_subject1='Your School Deactivate Successfully';
        //Load email library
		 $config = Array('mailtype' => 'html','charset' => 'iso-8859-1','wordwrap' => TRUE);
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from($from_email, 'VMBSS');
			$this->email->to($schools->Principle_email);
			$this->email->subject($mail_subject1);
			$this->email->message($body1);
			$this->email->send();
		echo 1;
		$_SESSION['SUCESSMSG']='Status Updated Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   public function principle_status_active(){
	  $id=$this->input->post('id');
	  	   $schools=$this->db->query("select Principle_name,Principle_school_name,Principle_email from tbl_principle where Pid='$id'")->row();
		$array=array('Status'=>'active');
	  $this->db->where('Pid',$id);
	   $clerek=$this->db->update('tbl_principle',$array);
	   $this->db->where('login_id',$id);
	   $query=$this->db->update('tbl_principle',$array);
	   $this->db->where('pid',$id);
	   $query12=$this->db->update('tbl_parent',$array);
	    $this->db->where('Pid',$id);
	   $query122=$this->db->update('tbl_teacher',$array);
		if($query==true){
		
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
						    <p style="font-size: 14px;text-align:left; margin-top:25px;"><strong><span style="font-size:18px;">Hello '.$schools->Principle_name.',</strong></p>
                          <p style="color: #000000; text-align:justify; font-size:16px;">
						   <h2 style="line-height:20px; width:100%; font-size:14px;"><span style="color: #851bbd;">Your school activated successfully.</span></h2>
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
	  $mail_subject1='Your School Activated Successfully';
        //Load email library
		 $config = Array('mailtype' => 'html','charset' => 'iso-8859-1','wordwrap' => TRUE);
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from($from_email, 'VMBSS');
			$this->email->to($schools->Principle_email);
			$this->email->subject($mail_subject1);
			$this->email->message($body1);
			$this->email->send();
		 echo 1;
		$_SESSION['SUCESSMSG']='Status Updated Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }



  public function slider_status_inactive(){
	  $id=$this->input->post('id');
	    $this->db->where('mid',$id);
		$array=array('status'=>'inactive');
	   $query=$this->db->update('tbl_main_slider',$array);
		if($query==true){
		echo 1;
		$_SESSION['SUCESSMSG']='Status Updated Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   public function slider_status_active(){
	  $id=$this->input->post('id');
	    $this->db->where('mid',$id);
		$array=array('status'=>'active');
	   $query=$this->db->update('tbl_main_slider',$array);
		if($query==true){
		echo 1;
		$_SESSION['SUCESSMSG']='Status Updated Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   
   public function delete_sliders(){
	 $id=$this->input->post('id');
	    $this->db->where('mid',$id);
	$query=$this->db->delete('tbl_main_slider');
		if($query==true){
		echo 1;
		$_SESSION['SUCESSMSG']='Slider Deleted Successfully';
		exit;
		}else{
		echo 2;
		exit;
		}
   }
   public function principle_update_profiles1(){
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
     $this->supper_admin->principle_update_profiles1($_POST,$Principle_schools_image,$signature);
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
	//   $result=$this->supper_admin->supper_update_admin($data);
	 if($result==true){
	    $this->session->set_userdata('SUCESSMSG','Slider Images Updated  Successfully..');
		redirect('main_sliders');     
	 }else{
	   echo 'not addedd';
	  }
    // $this->supper_admin->update_banner_images($_POST,$Principle_schools_image);
  }
  public function notifications_add(){
  $this->supper_admin->notifications_add($_POST);
}
public function update_notifications(){
  $this->supper_admin->update_notifications($_POST);
}

 public function delete_my_notifications(){
     $id=$this->input->post('id');
	 $this->db->where('nid',$id);
	 $query=$this->db->delete('notification_admin');
	 if($query==true){
	  echo 1;
	   $this->session->set_userdata('SUCESSMSG','Your Notification Deleted Successfully..');
	  exit;
	  }else{
	  echo 0;
	  exit;
	   }
    }
public function delete_division_notification(){
     $id=$this->input->post('id');
	 $this->db->where('dmid',$id);
	 $query=$this->db->delete('divison_master');
	 if($query==true){
	  echo 1;
	   $this->session->set_userdata('SUCESSMSG','Your Division Deleted Successfully..');
	  exit;
	  }else{
	  echo 0;
	  exit;
	   }
    }
	public function delete_class_notification(){
     $id=$this->input->post('id');
	 $this->db->where('id',$id);
	 $query=$this->db->delete('schools_master');
	 if($query==true){
	  echo 1;
	   $this->session->set_userdata('SUCESSMSG','Your Class Deleted Successfully..');
	  exit;
	  }else{
	  echo 0;
	  exit;
	   }
    }
public function generate_invoice_details(){
     $pid=trim($this->input->post('pid'));
	 //$po_number=trim($this->input->post('po_number'));
	 $valid_from=trim($this->input->post('valid_from'));
     $til_date=trim($this->input->post('til_date'));
     $payment_terms=trim($this->input->post('payment_terms'));
     $registration_charges=trim($this->input->post('registration_charges'));
     $software_charges=trim($this->input->post('software_charges'));
     $data_entry_charges=trim($this->input->post('data_entry_charges'));
     $maintenance_charges=trim($this->input->post('maintenance_charges'));
     $customization_charges=trim($this->input->post('customization_charges'));
	 $other_charges=trim($this->input->post('other_charges'));
	 $reactivation_charges=trim($this->input->post('reactivation_charges'));
	 $created_date=date('Y-m-d');
	 $get_invoice_count=$this->db->query("select *from tbl_invoice")->result();
	 $invoice_no='VSM-'.rand(0, 100000);
	$insert_array=array('pid'=>$pid,'valid_from'=>$valid_from,'til_date'=>$til_date,'software_charges'=>$software_charges,'data_entry_charges'=>$data_entry_charges,'maintenance_charges'=>$maintenance_charges,'customization_charges'=>$customization_charges,'other_charges'=>$other_charges,'created_date'=>$created_date,'invoice_no'=>$invoice_no,'reactivation_charges'=>$reactivation_charges,'status'=>'UNPAID','school_status'=>'UNPAID');
	$succss=$this->db->insert('tbl_invoice',$insert_array);
	$id=$this->db->insert_id();
	if($succss==true){
	redirect('invoice_details?invoice_id='.$id);
	}else{
	 echo 'Not Created';
	}
  }
public function add_salesman_information(){
  $email=trim($this->input->post('email'));
  $name=trim($this->input->post('name'));
  $mobile_no=trim($this->input->post('mobile_no'));
  $aadhar_card=trim($this->input->post('aadhar_card'));
  $pan_no=trim($this->input->post('pan_no'));
  $password=trim($this->input->post('password'));
  $acount_number=trim($this->input->post('acount_number'));
  $ifsc_code=trim($this->input->post('ifsc_code'));
 $bank_name=trim($this->input->post('bank_name'));  	 
   if(!empty($_FILES["signature"]["name"])){
         $string=explode('.',$_FILES["signature"]["name"]);
         $signature =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["signature"]["name"]));
		move_uploaded_file($_FILES["signature"]["tmp_name"], "assets/signature/" . $signature);
		}else{ $signature=''; }
   $duplicate_email=$this->db->query("select email from tbl_sales_users where email='$email'")->result();
$insert=array('name'=>$name,'mobile_no'=>$mobile_no,'aadhar_card'=>$aadhar_card,'pan_no'=>$pan_no,'password'=>$password,'email'=>$email,'status'=>'active','created_date'=>date('Y-m-d'),'bank_name'=>$bank_name,'ifsc_code'=>$ifsc_code,'acount_number'=>$acount_number,'signature'=>$signature);
   if(count($duplicate_email)==0){
   $this->db->insert('tbl_sales_users',$insert);
    $this->session->set_userdata('SUCESSMSG','Salesman details added successfully');
    echo 1;
    exit;
    }else{
	echo 0;
	exit;
	}
  }
  
  public function update_salesman_information(){
   $email=trim($this->input->post('email'));
   $id=$this->input->post('id');
   $users=$this->db->query("select email from tbl_sales_users where id='$id'")->row();
   $emails=$users->email;
   $name=trim($this->input->post('name'));
   $mobile_no=trim($this->input->post('mobile_no'));
   $aadhar_card=trim($this->input->post('aadhar_card'));
   $pan_no=trim($this->input->post('pan_no'));
   $password=trim($this->input->post('password'));
     $acount_number=trim($this->input->post('acount_number'));
  $ifsc_code=trim($this->input->post('ifsc_code'));
 $bank_name=trim($this->input->post('bank_name'));  
  if(!empty($_FILES["signature"]["name"])){
         $string=explode('.',$_FILES["signature"]["name"]);
         $signature =  $string[0].'_'. rand(0, 10000) . '.' . end(explode(".", $_FILES["signature"]["name"]));
		move_uploaded_file($_FILES["signature"]["tmp_name"], "assets/signature/" . $signature);
		}else{ $signature=$_POST['signature1']; }
   $duplicate_email=$this->db->query("select email from tbl_sales_users where email='$email' and email<>'$emails'")->result();
   $insert=array('name'=>$name,'mobile_no'=>$mobile_no,'aadhar_card'=>$aadhar_card,'pan_no'=>$pan_no,'password'=>$password,'email'=>$email,'bank_name'=>$bank_name,'ifsc_code'=>$ifsc_code,'acount_number'=>$acount_number,'signature'=>$signature);
   if(count($duplicate_email)==0){
    $this->db->where('id',$id);
    $this->db->update('tbl_sales_users',$insert);
    $this->session->set_userdata('SUCESSMSG','Salesman details updated successfully');
    echo 1;
    exit;
    }else{
	echo 0;
	exit;
	}
  }
public function delete_salesman_users(){
     $id=$this->input->post('id');
	 $get_users=$this->db->query("delete from tbl_sales_users where id='$id'");
	 if($get_users==true){
	 $this->session->set_userdata('SUCESSMSG','Salesman details deleted successfully');
	 echo 1;exit;
	 }else{ echo 'not deletes'; }
  }
 public function update_invoice_details(){
    $id=trim($this->input->post('id'));
    $valid_from=trim($this->input->post('valid_from'));
	$til_date=trim($this->input->post('til_date'));
	$payment_terms=trim($this->input->post('payment_terms'));
	$registration_charges=trim($this->input->post('registration_charges'));
	$software_charges=trim($this->input->post('software_charges'));
	$data_entry_charges=trim($this->input->post('data_entry_charges'));
	$maintenance_charges=trim($this->input->post('maintenance_charges'));
	$customization_charges=trim($this->input->post('customization_charges'));
	$reactivation_charges=trim($this->input->post('reactivation_charges'));
	$other_charges=trim($this->input->post('other_charges'));	
$update_array=array('valid_from'=>$valid_from,'til_date'=>$til_date,'payment_terms'=>$payment_terms,'registration_charges'=>$registration_charges,'software_charges'=>$software_charges,'data_entry_charges'=>$data_entry_charges,'maintenance_charges'=>$maintenance_charges,'customization_charges'=>$customization_charges,'reactivation_charges'=>$reactivation_charges,'other_charges'=>$other_charges);
	$this->db->where('id',$id);
	$update=$this->db->update('tbl_invoice',$update_array);
	if($update==true){
	 $this->session->set_userdata('SUCESSMSG','Invoice updated successfully');
	redirect('invoice_view_details');
	}else{
	echo 'Not updated';
	}
  }
public function common_notifications(){
   		$data['template']='common_notification';
		$data['title'] ='Common Notification';
		$data['page']='Common Notification';
		$this->layout_admin($data);
}
public function paid_associate_amounts(){
 $id=$_GET['status'];
 $array=array('status'=>'PAID');
       $this->db->where('id',$id);
 $query=$this->db->update('tbl_invoice',$array);
 if($query==true){
 $this->session->set_userdata('SUCESSMSG','Associate amount paid successfully..');
 redirect('invoice_view_details');
 }else{
 echo 'not added';
   }
 }  
 public function paid_schools_amounts(){
 $id=$_GET['status'];
 $array=array('school_status'=>'PAID');
         $this->db->where('id',$id);
 $query=$this->db->update('tbl_invoice',$array);
 if($query==true){
 $this->session->set_userdata('SUCESSMSG','School amount paid successfully..');
 redirect('invoice_view_details');
 }else{
 echo 'not added';
   }
 }  
 public function online_payment_details(){
    $data['template']='online_payment_details';
    $data['title'] ='Online Payment Details';
    $data['page']='Online Payment Details';
    $this->layout_admin($data);
   } 
 public function changed_status_payment(){
      $payment_status=trim($this->input->post('payment_status'));
      $note=trim($this->input->post('note'));
     $inovice_id= base64_decode($this->input->post('inovice_id'));
     // exit;
      $id= base64_decode($this->input->post('id'));
      $pid= base64_decode($this->input->post('pid'));
   if($payment_status=='PAID'){
       $get_data_in=$this->db->query("select created_date from tbl_invoice where id='$inovice_id'")->row();
       
       $this->db->query("update tbl_invoice set school_status='PAID' where id='$inovice_id'");
    //   echo $this->db->last_query();
     //  exit;
       $this->db->query("update school_payment set payment_status='PAID',note='$note' where id='$id'");
       $from_date=$get_data_in->created_date;
       
       $to_date= date('Y-m-d', strtotime($from_date. ' + 365 days'));       
       $this->db->query("update tbl_principle set Status='active',from_date='$from_date',to_date='$to_date' where Pid='$pid'");
       $this->db->query("update tbl_teacher set Status='active' where Pid='".$pid."'");
       $this->db->query("update tbl_parent set Status='active' where pid='".$pid."'");
       $this->db->query("update tbl_principle set Status='active' where login_id='".$pid."'");  
       $this->session->set_userdata('SUCESSMSG','School Payment Approved Successfully.');
       redirect('online_payment_details');
   }elseif($payment_status=='DISAPPROVE'){
       $this->db->query("update tbl_invoice set school_status='DISAPPROVE' where id='$inovice_id'");
   //    echo $this->db->last_query();
    //   exit;
       $this->db->query("update school_payment set payment_status='DISAPPROVE',note='$note' where id='$id'");
       $this->session->set_userdata('SUCESSMSG','School Payment Disapprove Successfully.');
       redirect('online_payment_details');
   }else{
    redirect('online_payment_details');   
   }   
 }
}

?>