 <?php 
 class supper_admin extends CI_Model {
   
	public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

 public function check_login($data) {
     //   $query = $this->db->query('admin', array('email' => $data['user_name'], 'password like binary' => $data['password']));
		$query=$this->db->query("select *from admin where email='".$data['email']."' and password='".$data['password']."' and status='active'")->result();
      // echo count($query);
	   //exit;
        if (count($query) == 1) {
		$session_data['SUPPER_ADMIN_ID']=$query[0]->id;
		$session_data['SUPPER_ADMIN_EMAIL']=$query[0]->email;
		$session_data['SUPPER_ADMIN_USERNAME']=$query[0]->username;
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
}