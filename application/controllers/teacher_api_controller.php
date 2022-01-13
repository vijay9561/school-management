<?php 
class Teacher_Api_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');

    }
public function teacher_login_api(){
   $Teacher_email=$this->input->get('Teacher_email');
   $Teacher_password=$this->input->get('Teacher_password');
 $query=$this->db->query("select *from tbl_teacher where Teacher_email='".$Teacher_email."' and Teacher_password='".$Teacher_password."' and status='active'")->row();
 //echo $this->db->last_query();
 //echo count($query);
 //exit;
 if(count($query)==1){
     $result_data=array('Teacher_email'=>$query->Teacher_email,'Teacher_password'=>$query->Teacher_password,'Teacher_Name'=>$query->Teacher_name);
	  echo json_encode($result_data);
     }else{
	    $erromsg=array('error'=>'Email ID & Password Incorrect');
	   echo json_encode($erromsg);
	 }
   }	
}
	
?>