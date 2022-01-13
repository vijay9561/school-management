<?php

class FunctionalController extends MY_Controller {

    var $current_date;
    var $current_timestamp;

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('Y-m-d');
        $current_timestamp = date('Y-m-d h:m:s');
        $this->load->library('form_validation');
        $this->load->model("AdminGenericModel");
        $this->load->model("GenericModel");
        $this->load->model("UserGenericModel");
    }

    /*
     * Function to get baggages you have created     */

    public function getMyBaggageList() {
        $data = array(
            "select" => "*",
            "tablename" => "kitpurchase",
            "where" => array(
                "userid" => $this->session->userdata("userid"),
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    /*
     * Function to get baggages available to purchase     */

    public function getBaggageInfo() {
        $data = array(
            "select" => "*",
            "tablename" => "kit",
            "where" => array(
                "1" => "1",
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    /*
     * Function to get purchase a baggage of your choice    
     */

    public function purchaseKit() {
        $info = $this->input->post();

        if (isset($info['rowselected']))
            $this->session->set_userdata($info);
        $data = array(
            "select" => "kitno,btc,payablebtc,btc",
            "tablename" => "kit",
            "where" => array(
                "kitno" => $this->session->userdata('rowselected')
            )
        );
        //get Kit Details
        $response = $this->AdminGenericModel->getSingleRecord($data);
        $totalbtctosend = $response['payablebtc'];

        //Create a Kit for the Purchase
        $time = date("Y-m-d h:m:s");
        $userkey = strtoupper(substr($this->session->userdata('username'), 0, 3));
        $kitid = "HC" . $userkey . md5($time);
        $purchaseid = time();
        $kitdata = array(
            "tablename" => "kitpurchase",
            "data" => array(
                "purchaseid" => $purchaseid,
                "kitid" => $kitid,
                "kitno" => $response['kitno'],
                "userid" => $this->session->userdata("userid"),
                "status" => "pending",
                "comment" => "Kit Creation Completed",
                "paidbtc" => $totalbtctosend,
                "kitbtc" => $response['btc'],
                "datecreated" => date('Y-m-d h:m:s')
            )
        );
        $this->AdminGenericModel->insertRecord($kitdata);

//Redirect to the Payment Gateway And Accept BTC
//        if ($r) {
        $data = array();

        $uid = $this->session->userdata('userid');
        $data['userid'] = $uid;
//        $data['apidata'] = file_get_contents("http://www.hikecoins.com/api/Example/getkitdepositapi?amount=1");
        //echo "<pre>";print_r($data['apidata']);die(); 
//        $data['apidata'] = json_decode($data['apidata']);
//        $data['key'] = $data['apidata']->user_list[0]->api_pub_key;
//        $data['unconfirm'] = $data['apidata']->user_list[0]->unconfirm;
//        $data['confirm'] = $data['apidata']->user_list[0]->confirm;

        $data['template'] = 'payment';
        $data['title'] = 'Payment Gateway';
        $data['purchaseid'] = $kitdata['data']['purchaseid'];
        $data['userid'] = $this->session->userdata('userid');
        $data['payablebtc'] = $totalbtctosend;
        $this->admin_layout($data);
//        } 
//        else {
/*  echo "<script>alert('Error Occured During Creating Baggage".$r."')</script>";*/
//        }
    }

    /*
     * Function to get contract available      */

    public function getContractList() {
        $data = array(
            "select" => "*",
            "tablename" => "contract",
            "where" => array(
                "1" => "1",
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
//        print_r($response);die())
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function signContract() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $this->session->set_userdata('payablebtc', $request->payablebtc);
        $this->session->set_userdata('contractbtc', $request->kitbtc);
        $this->session->set_userdata('contractid', $request->contractid);
        $this->session->set_userdata('contract_duration', $request->contract_duration);
        $this->session->set_userdata('mining_percent', $request->mining_percent);
    }

    public function checkBaggage() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
//        $query = "select * from kitpurchase where kitid=".$request->baggageid." and status='active'";
        $data = array(
            "select" => "*",
            "tablename" => "kitpurchase",
            "where" => array(
                "kitid" => $request->baggageid,
                "userid" => $this->session->userdata("userid"),
                "paidbtc" => $this->session->userdata('payablebtc'),
            )
        );
        $response = $this->AdminGenericModel->getSingleRecord($data);
        if (!isset($response['errstatus'])) {
            if (isset($response['status']) && $response['status'] == 'active') {
                $response['status'] = 200;
                $response['message'] = "Valid Baggage Id";
                $response['data'] = $response;
            } else if (isset($response['status']) && $response['status'] == 'pending') {
                $response['status'] = 400;
                $response['message'] = "Invalid Baggage Id";
            } else if (isset($response['status']) && $response['status'] == 'used') {
                $response['status'] = 201;
                $response['message'] = "Baggage Id Already Used";
            } else {
                $response['status'] = 400;
                $response['message'] = "Invalid Baggage Id";
            }
        } else {
            $response['status'] = 400;
            $response['message'] = "Invalid Baggage Id";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function signnow() {
        $request = $this->input->post();
//        print_r($request);die();  
        /*
         * Create Contract with respect to payablebtc,Userid,kit,kitpurchase
         *           */
        $contractdata = array(
            "tablename" => "miningcontract",
            "data" => array(
                "contractid" => $request['purchaseid'],
                "userid" => $request['userid'],
                "contractprice" => $request['kitbtc'],
                "paidbtc" => $request['paidbtc'],
                "contracttypeid" => $this->session->userdata('contractid'),
                "contract_duration" => $this->session->userdata('contract_duration'),
                "mining_percent" => $this->session->userdata('mining_percent'),
                "status" => "Active",
                "signdate" => date('Y-m-d h:m:s')
            )
        );
        $kitpurchasedata = array(
            "tablename" => "kitpurchase",
            "where" => array(
                "kitid" => $request['baggageid']
            ),
            "data" => array(
                "status" => "used"
            )
        );
        $u = $this->AdminGenericModel->updateRecord($kitpurchasedata);
        $i = $this->AdminGenericModel->insertRecord($contractdata);
        //Update User Tag
        $query = "select * from account where userid=" . $request['userid'];
        $r = $this->AdminGenericModel->getQueryResult($query);
        if (($r['nodeweight'] + $request['kitbtc']) > 0 && ($r['nodeweight'] + $request['kitbtc']) < 0.5) {
            //set accstatus in account to active            
            $this->db->query("update account set accstatus='active', nodeweight=nodeweight+" . $request['kitbtc'] . " where userid=" . $request['userid']);
        } else if (($r['nodeweight'] + $request['kitbtc']) >= 0.5) {
            //set accstatus in account to silver
            $this->db->query("update account set accstatus='silver', nodeweight=nodeweight+" . $request['kitbtc'] . " where userid=" . $request['userid']);
        }
//Topup Procedure
        $query = "CALL reg_topuplend('" . $request['userid'] . "','" . $request['kitbtc'] . "')";
        $this->db->query($query);
        $data = array('payablebtc', 'contractbtc', 'contractid');
        $this->session->unset_userdata($data);
        $this->session->set_userdata("contractpurchase", true);
        $subject = "Cryptowey - Contract Purchase Acknowledgment  ";
        $messagebody .= "Hi,<br><br>";
        $messagebody = "Congratulations!!! <b>" . $this->session->userdata('username') .
                "</b> You have purchased the Bitcoin Mining Contract worth BTC " . $request['kitbtc'] . ".<br>";
        $messagebody .= "Sit Back And Relax We Are Making You Gain The Best Benefits Out Of Your Investment.<br>";
        $messagebody .= "Request To Update Your User Profile.<br>";
        $messagebody .= "<br><br>_________________________________________________________<br><br>";
        $messagebody .= "Regards,<br>Cryptowey Team.";
        $messagebody .= "<br><br><i>Visit Us At <a href='https://www.cryptowey.com/'>www.cryptowey.com/</a></i>";
        $successmsg = "";
        $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
        $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
        redirect(base_url() . "Ack");
    }

    public function getMyContractInfo() {
        $response = $this->GenericModel->getQueryResult("select contractid,mining_percent,DATE_FORMAT(signdate,'%d, %b %y') 'signdate' ,DATE_FORMAT(DATE_ADD(signdate,INTERVAL contract_duration DAY),'%d, %b %y') 'expiredate',contractprice,paidbtc,userid,status,contract_duration,mining_percent,contracttypeid from miningcontract where userid=" . $this->session->userdata("userid"));
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyTotalMiningInfo() {
        $data = array(
            "select" => "*",
            "tablename" => "miningop",
            "where" => array(
                "userid" => $this->session->userdata("userid")
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function setPDFfetcher() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $this->session->set_userdata('pdfid', $request->contractid);
        $this->session->set_userdata('pdfsigndate', $request->signdate);
        $this->session->set_userdata('pdfexpiredate', $request->expiredate);
        $this->session->set_userdata('pdfcontractprice', $request->contractprice);
        $this->session->set_userdata('pdfpaidbtc', $request->paidbtc);
        $this->session->set_userdata('pdfserverspeed', '150 GHS');
        $this->session->set_userdata('pdfmining_percent', $request->mining_percent);
        return true;
    }

    public function pdf() {
        $this->load->helper('pdf_helper');
        $request->contractid = $this->session->userdata('pdfid');
        $txid = $this->GenericModel->getQueryResult("select txID from crypto_payments where orderID=" . $this->session->userdata('pdfid') . " and userid=" . $this->session->userdata('userid') . " limit 1");
        $request->txID = $txid[0]['txID'];
        $data['contract'] = $request;
        $this->load->view('pdfreport', $data);
    }

    //FAQ Details
    public function getFaqDetail() {
        $data = array(
            "select" => "*",
            "tablename" => "faq",
            "where" => array(
                "1" => "1",
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    //FEED Details
    public function getFeedDetail() {
        $data = array(
            "select" => "*",
            "tablename" => "feed",
            "where" => array(
                "1" => "1",
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyProfile() {
        $data = array(
            "select" => "username,emailid,userwalletaddress,contactno,referral_id,btcmonk_ci",
            "tablename" => "user",
            "where" => array(
                "userid" => $this->session->userdata('userid'),
            )
        );
        $response = $this->AdminGenericModel->getMultipleRecord($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function sendQueryRequest() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $request->userid = $this->session->userdata('userid');
        $request->timestamped = time();
        $request->ipaddress = $this->input->ip_address();
        $request->emailaddress = $this->session->userdata('emailid');
        $subject = "Ticket Raised = " . $request->subject;
        $this->db->insert('ticket', $request);
        $messagebody = "<br>Request Raised By : " . $this->session->userdata('username') . ", <br>" . $request->query;
        $messagebody .= "<br>________________________________________________________________________";
        $messagebody .= "<br>Regards,<br>" . $this->session->userdata('username') . "<br>" . $this->session->userdata('emailid');
        $successmsg = "Ticket generated successfully";
        $errmsg = "Some Issue in the Ticket Generation";
        $response = $this->GenericModel->sendEmail("support@cryptowey.com", $this->session->userdata('emailid'), $subject, $messagebody, $successmsg, $errmsg);
        if ($response['status']) {
            $r = $this->GenericModel->getQueryResult("select ticketid from ticket where userid=" . $this->session->userdata('userid') . " and timestamped=" . $request->timestamped . "  order by ticketid desc limit 1");
            $subject = "Support Ticket Raised - Your Ticket Id " . $r[0]['ticketid'];
            $messagebody .= "<br>Your Support Ticket Id : " . $r[0]['ticketid'];
            $messagebody = "<br>Thankyou For Contacting Cryptowey Support. We have Received Your Query as Below:<br>";
            $messagebody .= "<br>________________________________________________________________________<br>";
            $messagebody .= $request->query;
            $messagebody .= "<br>________________________________________________________________________<br>";
            $messagebody .= "<br>Our support team will contact you in a short while.<br><br>";
            $messagebody .= "Regards,<br>Cryptowey Team.";
            $messagebody .= "<br><br><i>Visit Us At <a href='https://www.cryptowey.com/'>www.cryptowey.com</a></i>";
            $messagebody .= "<br><br>For Any Help Contact on <span><a>support@cryptowey.com</a></span>";
            $successmsg = "Ticket generated successfully";
            $errmsg = "Some Issue in the Ticket Generation";
            $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function updateMyProfile() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $request->userid = $this->session->userdata('userid');
        $request->timestamped = time();
        if ((date('d') >= 1 && date('d') <= 5) || (date('d') >= 16 && date('d') <= 21)) {
            $subject = "Cryptowey - Profile Update Mail";
           /* $messagebody = "Hi " . $this->session->userdata('username') . ",<br><br>";
            $messagebody .= "You have made a Request To Update Your User Profile.<br>"
                    . "<br>We have Monthly 2 Payout Cycles (1st - 5th) and (16th-21st)";
            $messagebody .= "<br>User is not allowed to update profile during the payout cycle dates.";
            $messagebody .= "<br>Incase The Update is urgent please contact us at support@cryptowey.com";
            $messagebody .= "_________________________________________________________________";
            $messagebody .= "<br><br>Regards,<br>Cryptowey Team.";
            $messagebody .= "<br><br><i>Visit Us At <a href='https://www.cryptowey.com/'>www.cryptowey.com</a></i>";
            $messagebody .= "<br><br>For Any Help Contact on <span><a>support@cryptowey.com</a></span>";*/
			$messagebody='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if !mso]><!-->
<!--<![endif]-->
<title></title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
</head><body style="background-color:#edeff0">
<table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #edeff0;width: 100%; padding-top:20px; padding-bottom:20px;" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="vertical-align: top">
      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top; padding-top: 20px;padding-bottom: 20px;"><!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #FADDBB;"><![endif]-->
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;background-color: #2b2a2a;">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <img class="center  autowidth  fullwidth" align="center" border="0" src="https://www.cryptowey.com/assets/images/hickcoins-logo.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;float: none;width: 320px;max-width: 600px" width="600">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                </div>
              </div>
              <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div class="">
             <div style="line-height:120%;color:#f39229;font-family:Droid Serif, Georgia, Times, Times New Roman, serif; padding-right: 10px; padding-left: 10px; padding-top: 0px;
padding-bottom: 3px;">
                        <div style="font-size:12px;line-height:14px;font-family:Droid Serif, Georgia, Times, Times New Romanserif;color:#f39229;text-align:left;">
                          <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><span style="font-size: 36px; line-height:20px;"><strong><span style="line-height:20px; font-size:22px;">CRYPTOWEY PROFILE UPDATE</span></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <div >
                    </div>
                    <div>
             <div style="color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; margin-top:-50px;">
                        <div style="font-size:12px;line-height:24px;color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                          <span style="font-size:16px;line-height:19px; margin-left:20px;">
						    <p style="font-size: 14px;text-align:left;"><strong><span style="font-size:18px;">Hi '.strtolower($this->session->userdata('username')).',</span></strong></p>
							<!--<p style="font-size:16px;border:1px solid #000000;padding:10px;color: #000000;text-align: center;"><strong style="color:#000000;">Your Expired Contract ID: <span style="color: green;font-size: 20px;"> 1234</span> </strong></p>-->
                          <p style="color: #000000; text-align:justify; font-size:16px;">You have made a request to update your user profile. We have monthly 2 payout cycles (1st - 5th) and (16th-21st). 
                                      <br /><br /><b>Please note you are not allowed to update profile during these payout cycle dates.</b>
									   <strong><br /><br />Incase, the update is urgent please contact us at support@cryptowey.com</strong></p>
                        </div>
                      </div>
                    </div>
              <br /><br />
					<div style="margin-left:10px; margin-bottom:10px;"><strong style="font-size:16px;font-style: italic;">Thanks & Regards</strong><br />
					<span style="padding-top:20px; margin-top:10px;">Cryptowey Team</span><br />
					<span style="padding-top:20px; margin-top:10px;">Visit us at<a target="_blank" href="http://www.cryptowey.com"> www.cryptowey.com</a></span>
					</div>
                    <div style="background-color: #4e4646;">
                      <div class="">
                     
                        <div style="line-height:120%;color:#F99495;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 25px;">
                          <div style="font-size:12px;line-height:14px;color:#fff;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                            <p style="margin: 0;font-size:18px;line-height: 17px;text-align: center"><span style="font-size:14px; line-height: 13px;"> 
							Please do not reply to this email. Emails sent to this address will not be answered.
							<br />Note: If it wasn&#39;t you please immediately contact  <a href="mailto:support@cryptowey.com" style="color:#fab029;" target="_blank">support@cryptowey.com</a>
                              Once again, we thank you for using Cryptowey trusted products.
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
								<a href="https://www.facebook.com/hikecoins/" title="Facebook" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> 
								<a href="https://twitter.com/hikecoin11" title="Twitter" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/twitter@2x.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> <a href="https://t.me/hikecoins" title="Telegram" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/telegram@2x.png" alt="Telegram" title="Telegram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width:32px !important"> </a>
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
            $successmsg = "";
            $errmsg = "Some Issue in the Profile Update. Please Raise a Ticket";
            $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg); //hikecoins@gmail.com
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $link = base_url() . "udmpwidtl/" . base64_encode($this->GenericModel->mc_encrypt($request, ENCRYPTION_KEY));
            $link = str_replace('=', '', $link);
            $subject = "Cryptowey - Profile Update Mail";
           /* $messagebody = "Hi " . $this->session->userdata('username') . ",<br><br>";
            $messagebody .= "You have made a Request To Update Your User Profile.<br>"
                    . "To Make the Update Click On the Below link <br><br><a href=" . $link . ">Click Here</a>";
            $messagebody .= "<br><br>_________________________________________________________<br><br>";
            $messagebody .= "Regards,<br>Cryptowey Team.";
            $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
            $messagebody .= "<br><br>For Any Help Contact on <span><a>support@cryptowey.com</a></span>";*/
			$messagebody='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if !mso]><!-->
<!--<![endif]-->
<title></title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
</head><body style="background-color:#edeff0">
<table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #edeff0;width: 100%; padding-top:20px; padding-bottom:20px;" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="vertical-align: top">
      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top; padding-top: 20px;padding-bottom: 20px;"><!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #FADDBB;"><![endif]-->
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;background-color: #2b2a2a;">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <img class="center  autowidth  fullwidth" align="center" border="0" src="https://www.cryptowey.com/assets/images/hickcoins-logo.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;float: none;width: 320px;max-width: 600px" width="600">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                </div>
              </div>
              <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div class="">
             <div style="line-height:120%;color:#f39229;font-family:Droid Serif, Georgia, Times, Times New Roman, serif; padding-right: 10px; padding-left: 10px; padding-top: 0px;
padding-bottom: 3px;">
                        <div style="font-size:12px;line-height:14px;font-family:Droid Serif, Georgia, Times, Times New Romanserif;color:#f39229;text-align:left;">
                          <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><span style="font-size: 36px; line-height:20px;"><strong><span style="line-height:20px; font-size:22px;">CRYPTOWEY PROFILE UPDATE</span></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <div >
                    </div>
                    <div>
             <div style="color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; margin-top:-50px;">
                        <div style="font-size:12px;line-height:24px;color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                          <span style="font-size:16px;line-height:19px; margin-left:20px;">
						    <p style="font-size: 14px;text-align:left;"><strong><span style="font-size:18px;">Hi '.strtolower($this->session->userdata('username')).',</span></strong></p>
							<!--<p style="font-size:16px;border:1px solid #000000;padding:10px;color: #000000;text-align: center;"><strong style="color:#000000;">Your Expired Contract ID: <span style="color: green;font-size: 20px;"> 1234</span> </strong></p>-->
                          <p style="color: #000000; text-align:justify; font-size:16px;">You have made a request to update your user profile.
						  To make the update click on the below link 
                                  </p>
								 <div align="center">
				<a href="'.$link.'" style="background-color: #f39229;padding: 10px;border-radius: 6px;text-decoration: none;color: white;font-size: 20px;">Click Here</a></div>
                        </div>
                      </div>
                    </div>
              <br /><br />
					<div style="margin-left:10px; margin-bottom:10px;"><strong style="font-size:16px;font-style: italic;">Thanks & Regards</strong><br />
					<span style="padding-top:20px; margin-top:10px;">Cryptowey Team</span><br />
					<span style="padding-top:20px; margin-top:10px;">Visit us at <a target="_blank" href="http://www.cryptowey.com"> www.cryptowey.com</a></span>
					</div>
                    <div style="background-color: #4e4646;">
                      <div class="">
                     
                        <div style="line-height:120%;color:#F99495;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 25px;">
                          <div style="font-size:12px;line-height:14px;color:#fff;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                            <p style="margin: 0;font-size:18px;line-height: 17px;text-align: center"><span style="font-size:14px; line-height: 13px;"> 
							Please do not reply to this email. Emails sent to this address will not be answered.
							<br />Note: If it wasn&#39;t you please immediately contact <a href="mailto:support@cryptowey.com" style="color:#fab029;" target="_blank">support@cryptowey.com</a>.
                              Once again, we thank you for using Cryptowey trusted products.
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
								<a href="https://www.facebook.com/hikecoins/" title="Facebook" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> 
								<a href="https://twitter.com/hikecoin11" title="Twitter" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/twitter@2x.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> <a href="https://t.me/hikecoins" title="Telegram" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/telegram@2x.png" alt="Telegram" title="Telegram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width:32px !important"> </a>
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
			
            $successmsg = "";
            $errmsg = "Some Issue in the Profile Update. Please Raise a Ticket";
            $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }

    public function dothchngnow() {
        $update = $this->GenericModel->mc_decrypt(base64_decode($this->uri->segment(2)), ENCRYPTION_KEY);
        if ((time() - $update->timestamped) <= (60 * 60)) {
            $data = array(
                "where" => array(
                    "userid" => $update->userid
                ),
                "tablename" => "user",
                "data" => array(
                    "emailid" => $update->emailid,
                    "userwalletaddress" => $update->userwalletaddress,
                    "contactno" => $update->contactno,
                    "btcmonk_ci" => $update->btcmonk_ci
                )
            );
            if ($this->GenericModel->updateRecord($data) > 0) {
                $data['data']['userid'] = $update->userid;
                $data['data']['username'] = $update->username;
                $this->session->set_userdata($data['data']);
                redirect(base_url() . "Profile");
            } else {
                redirect(base_url() . "Login");
            }
        } else {
            redirect(base_url() . "LinkExpired");
        }
    }

    public function updateMyCredential() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $request->userid = $this->session->userdata('userid');
        $request->timestamped = time();
        $link = base_url() . "gmcuwidtl/" . base64_encode($this->GenericModel->mc_encrypt($request, ENCRYPTION_KEY));
        $link = str_replace('=', '', $link);
        $subject = "Cryptowey - Change Password Request";
       /* $messagebody = "Hi " . $this->session->userdata('username') . ",<br><br>";
        $messagebody .= "You have made a Request To Update Your Password.<br>"
                . "To Make the Update <a href=" . $link . ">Click Here</a><br><br>Note:<br><i> Incase this request is not made by you please report to cryptowey at support@cryptowey.com</i>";
        $messagebody .= "<br><br>_________________________________________________________<br><br>";
        $messagebody .= "Regards,<br>Cryptowey Team.";
        $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";*/
		$messagebody='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if !mso]><!-->
<!--<![endif]-->
<title></title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
</head><body style="background-color:#edeff0">
<table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #edeff0;width: 100%; padding-top:20px; padding-bottom:20px;" cellpadding="0" cellspacing="0">
  <tbody>
    <tr style="vertical-align: top">
      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top; padding-top: 20px;padding-bottom: 20px;"><!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #FADDBB;"><![endif]-->
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;background-color: #2b2a2a;">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <img class="center  autowidth  fullwidth" align="center" border="0" src="https://www.cryptowey.com/assets/images/hickcoins-logo.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;float: none;width: 320px;max-width: 600px" width="600">
                      <div style="line-height:15px;font-size:1px">&#160;</div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <!--[if (!mso)&(!IE)]><!-->
                  </div>
                  <!--<![endif]-->
                </div>
              </div>
              <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
          </div>
        </div>
        <div style="background-color:transparent;">
          <div style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;" class="block-grid ">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
              <div class="col num12" style="min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;">
                <div style="background-color: transparent; width: 100% !important;">
                  <!--[if (!mso)&(!IE)]><!-->
                  <div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                    <!--<![endif]-->
                    <div class="">
             <div style="line-height:120%;color:#f39229;font-family:Droid Serif, Georgia, Times, Times New Roman, serif; padding-right: 10px; padding-left: 10px; padding-top: 0px;
padding-bottom: 3px;">
                        <div style="font-size:12px;line-height:14px;font-family:Droid Serif, Georgia, Times, Times New Romanserif;color:#f39229;text-align:left;">
                          <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center"><span style="font-size: 36px; line-height:20px;"><strong><span style="line-height:20px; font-size:22px;">CRYPTOWEY CHANGE PASSWORD</span></strong></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                    <div >
                    </div>
                    <div>
             <div style="color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; margin-top:-50px;">
                        <div style="font-size:12px;line-height:24px;color:#555555;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                          <span style="font-size:16px; line-height:19px; margin-left:20px;">
						    <p style="font-size: 14px;text-align:left;"><strong><span style="font-size:18px;">Hi '.strtolower($this->session->userdata('username')).',</span></strong></p>
                          <p style="color: #000000; text-align:justify; font-size:16px;">You have made a request to change your password. To make the update click on following link -</p>
						  <div style="text-align: center;margin-top: 32px;">
		<a href="'.$link.'" style="background-color: #f39229;padding: 10px;border-radius: 6px;text-decoration: none;color: white;font-size: 20px;">Click Here</a>
						  </div>
                        </div>
                      </div>
                    </div>
              <br /><br />
					<div style="margin-left:10px; margin-bottom:10px;"><strong style="font-size:16px;font-style: italic;">Thanks & Regards</strong><br />
					<span style="padding-top:20px; margin-top:10px;">Cryptowey Team</span><br />
					<span style="padding-top:20px; margin-top:10px;">Visit us at&nbsp;&nbsp;<a target="_blank" href="http://www.cryptowey.com"> www.cryptowey.com</a></span>
					</div>
                    <div style="background-color: #4e4646;">
                      <div class="">
                     
                        <div style="line-height:120%;color:#F99495;font-family:Droid SerifGeorgia, Times,Times New Roman,serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 25px;">
                          <div style="font-size:12px;line-height:14px;color:#fff;font-family:Droid SerifGeorgia, Times,Times New Roman,serif;text-align:left;">
                            <p style="margin: 0;font-size:18px;line-height: 17px;text-align: center"><span style="font-size:14px; line-height: 13px;"> 
							Please do not reply to this email. Emails sent to this address will not be answered.
							<br />Note: If it wasn&#39;t you please immediately contact  <a href="mailto:support@cryptowey.com" style="color:#fab029;" target="_blank">support@cryptowey.com</a>..
                              Once again, we thank you for using Cryptowey trusted products.
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
								<a href="https://www.facebook.com/cryptowey/" style="color: #4e4646;" title="Facebook" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/facebook@2x.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> 
								<a href="https://twitter.com/cryptowey" title="Twitter" style="color: #4e4646;" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/twitter@2x.png" alt="Twitter" title="Twitter" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width: 32px !important"> </a> <a style="color: #4e4646;" href="https://t.me/cryptowey" title="Telegram" target="_blank"> <img src="https://app-rsrc.getbee.io/public/resources/social-networks-icon-sets/circle-color/telegram@2x.png" alt="Telegram" title="Telegram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;border: none;float: none;max-width:32px !important"> </a>
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

        $successmsg = "<span class='text-info'>Update Link is Sent To The Registerd Email Id<br>Click To Update Changes</span>";
        $errmsg = "Some Issue in the Profile Update. Please Raise a Ticket";
//        echo $link;
        $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
        json_encode($response);
        if ($response['status'] == 200) {
            $this->session->sess_destroy();
            print_r($response['status']);
            $this->session->set_flashdata('sucessmessage', 'Recovery Link is Sent To The Registerd Email Id');
        } else {
            print_r($response['status']);
        }
    }

    public function cmacchngnow() {
        $update = $this->GenericModel->mc_decrypt(base64_decode($this->uri->segment(2)), ENCRYPTION_KEY);
        if ((time() - $update->timestamped) <= (60 * 60)) {
            $data = array(
                "where" => array(
                    "userid" => $update->userid
                ),
                "tablename" => "user",
                "data" => array(
                    "password" => md5($update->password)
                )
            );
            if ($this->GenericModel->updateRecord($data) > 0) {
//                $this->session->sess_destroy();
                $this->session->set_flashdata('sucessmessage', ' <div class="alert alert-success">Your password has been reset successfully  </div>');                redirect(base_url() . "Login");
            } else {
                redirect(base_url() . "Login");
            }
        } else {
            redirect(base_url() . "LinkExpired");
        }
    }

    public function getMyDailyOutput() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $count = "select count(*) 'count' from miningop where contractid=" . $request->invoiceid . " and userid=" . $this->session->userdata('userid');
        $Query = "select DATE_FORMAT(m.miningdate,'%d-%M-%Y') as 'miningdate',m.miningop,m.contractid from miningop m where m.contractid=" . $request->invoiceid . " and m.userid=" . $this->session->userdata('userid') . " order by m.miningdate desc limit " . $request->pagerangestart . " , " . $request->pagesize;
        $query = "select sum(mo.miningop) 'total',c.contractname,c.description,m.signdate,m.contractprice,m.paidbtc from miningop mo,miningcontract m,contract c where mo.contractid=m.contractid and m.contracttypeid=c.contractid and mo.contractid=" . $request->invoiceid . " and mo.userid=" . $this->session->userdata("userid") . " order by mo.miningdate desc";
        $c = ($this->AdminGenericModel->getQueryResult($count));

        $response['totalpages'] = ceil($c[0]['count'] / $request->pagesize);
        $response['detail'] = $this->AdminGenericModel->getQueryResult($Query);
        $response['info'] = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyWithdrawalStatus() {
        /*         * **********************************MINING OUTPUT*********************************************** */
        $query = "select * from transaction where txId!='' and userid=" . $this->session->userdata('userid');
        $r = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($r));
    }

    public function getMyWithdrawals() {
        $query = "select * from cycle where CURRENT_DATE>=cyclestartdate and cycleendate>=CURRENT_DATE";
        $r = $this->AdminGenericModel->getQueryResult($query);
        $currentcycle = $r[0]['cycleid'];
        $query = "select * from cycle where cycleid=" . ($currentcycle - 1);
        $pr = $this->AdminGenericModel->getQueryResult($query);
        $cyclestartdate = $pr[0]['cyclestartdate'];
        $cycleenddate = $pr[0]['cyclestartdate'];
        $currentcyclestartdate = $r[0]['cyclestartdate'];
        $currentcycleenddate = $r[0]['cycleendate'];
        /*         * **********************************MINING OUTPUT*********************************************** */
        $query_miningledger = "select sum(miningop) 'tilllastcycle' from miningop mo,cycle c where mo.miningdate <= DATE_ADD(c.cycleendate,INTERVAL 1 DAY) and c.cycleid=" . ($currentcycle - 1) . " and status=0 and userid=" . $this->session->userdata('userid');
        $r1 = $this->AdminGenericModel->getQueryResult($query_miningledger);
        $query_miningbalance = "select sum(miningop) 'currentcycle' from miningop_current mo,cycle c where mo.miningdate>=c.cyclestartdate and mo.miningdate<= DATE_ADD(c.cycleendate,INTERVAL 1 DAY) and  c.cycleid=" . ($currentcycle) . " and userid=" . $this->session->userdata('userid');
        $r2 = $this->AdminGenericModel->getQueryResult($query_miningbalance);
        $response['miningledger'] = $r2[0]['currentcycle'];
        $response['miningbalance'] = $r1[0]['tilllastcycle'];
        /*         * **********************************DSI OUTPUT*********************************************** */
        $query_binaryledger = "select wallet1,wallet2 from mlm_pending_payout where userid=" . $this->session->userdata('userid');
        $rd = $this->AdminGenericModel->getQueryResult($query_binaryledger);
        if (isset($rd[0])) {
            $response['dsibalance'] = $rd[0]['wallet2'];
            $response['binarybalance'] = $rd[0]['wallet1'];
        } else {
            $response['dsibalance'] = 0;
            $response['binarybalance'] = 0;
        }
        $query = "select sum(comm) 'currentledger' from mlm_direct_income where status=1 and received_on>='" . $currentcyclestartdate . "' and received_on<='" . $currentcycleenddate . "' and userid=" . $this->session->userdata('userid');
        $r = $this->AdminGenericModel->getQueryResult($query);
        $response['dsiledger'] = $r[0]['currentledger'];
        $query = "Select  sum(a.payout_given) as 'currentrefferal' FROM mlm_binary_daily_payout a INNER JOIN  user b ON a.userid = b.userid  AND a.payout_amt > 0 AND a.userid =10 and a.binary_date>$currentcyclestartdate and a.binary_date<=$currentcycleenddate";
        $r = $this->AdminGenericModel->getQueryResult($query);
        $response['binaryledger'] = $r[0]['currentrefferal'];
        /*         * **********************************TOTAL OUTPUT*********************************************** */
        $response['totalledger'] = $response['miningledger'] + $response['dsiledger'] + $response['binaryledger'];
        $response['totalbalance'] = $response['miningbalance'] + $response['dsibalance'] + $response['binarybalance'];
        $query_totalreceived = "select sum(transactionbtc) 'balance' from transaction where userid =" . $this->session->userdata('userid');
        $r = $this->AdminGenericModel->getQueryResult($query_totalreceived);
        $response['totalreceived'] = $r[0]['balance'];
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyDirectIncomeInfo() {
        $query = "SELECT b.username, a.total_amt, a.comm, a.percent, DATE_FORMAT(a.created_on,'%d %M %Y') As created_on, a.status FROM mlm_direct_income a, user b where a.child_id = b.userid and a.userid ='" . $this->session->userdata('userid') . "'  Order By a.created_on DESC";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyBinaryIncomeInfo() {
        $query = "Select  b.username, a.binary_date,a.match_comit ,a.payout_given FROM mlm_binary_daily_payout a INNER JOIN  user b ON a.userid = b.userid  AND a.payout_amt > 0 AND a.userid =" . $this->session->userdata('userid') . " Order By a.binary_date DESC";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    /*     * **************************************************************************** */

    public function getMiningStats() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $cond = $request->filterval;
        $query = "";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getDirectStats() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $cond = $request->filterval;
        $query = "SELECT b.username, a.total_amt, a.comm, a.percent, DATE_FORMAT(a.created_on,'%d %M %Y') As created_on, a.status FROM mlm_direct_income a, user b where a.child_id = b.userid and a.userid =" . $this->session->userdata('userid') . " and a.status=1  Order By a.userid DESC";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getBinaryStats() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $cond = $request->filterval;
        $query = "Select  a.binary_date, a.left_confirmed, a.right_confirmed,  a.payout_amt, a.carry_forward_left, a.carry_forward_right, a.payout_given FROM mlm_binary_daily_payout a INNER JOIN  user b ON a.userid = b.userid   AND a.userid =" . $this->session->userdata('userid') . " Order By a.userid DESC";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyDashboard() {
        $query = "select cycleid from cycle where CURRENT_DATE>=cyclestartdate and cycleendate>=CURRENT_DATE";
        $r = $this->AdminGenericModel->getQueryResult($query);
        $currentcycle = $r[0]['cycleid'];

        $query = "select sum(miningop) 'ledger' from miningop mo,cycle c where mo.miningdate>=c.cyclestartdate and mo.miningdate<= DATE_ADD(c.cycleendate,INTERVAL 1 DAY) and  c.cycleid=" . ($currentcycle) . " and userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["ledger"] = $response[0]["ledger"];

        $query = "select sum(lendingop) 'lendingledger' from lendingop mo,cycle c where mo.lendingdate>=c.cyclestartdate and mo.lendingdate<= DATE_ADD(c.cycleendate,INTERVAL 1 DAY) and  c.cycleid=" . ($currentcycle) . " and userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        if ($response[0]["lendingledger"] == null) {
            $dashboard["lendingledger"] = 0;
        } else {
            $dashboard["lendingledger"] = $response[0]["lendingledger"];
        }

       // $query = "select sum(miningop) as 'mininigtotal' from miningop where userid=" . $this->session->userdata('userid');
	   $query = "select sum(m.miningop) as 'mininigtotal' from miningop m inner join miningcontract mi on m.contractid=mi.contractid where mi.status='Active' and m.userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard['miningtotal'] = $response[0]["mininigtotal"];

       $query = "select sum(comm) as 'directincome' from mlm_direct_income where status=1 AND userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["directincome"] = $response[0]["directincome"];
		
		 $query = "select sum(amount) as referal_contract_percentage from lending_history where  userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
       if($response[0]["referal_contract_percentage"]>=1){
        $dashboard['referal_contract_percentage'] = $response[0]["referal_contract_percentage"];
		}else{
		 $dashboard['referal_contract_percentage']=0;
		}
		$dashboard['INR_wallet_amount'] = $this->AdminGenericModel->selectlendingwallet($this->session->userdata("userid"));
        $dashboard['BTC_wallet_amount'] = $this->AdminGenericModel->selectbitcoinwallet($this->session->userdata("userid"));

        $query = "Select sum( a.payout_amt) as 'refferalincome' FROM mlm_binary_daily_payout a INNER JOIN  user b ON a.userid = b.userid  AND a.payout_amt > 0 AND a.userid =" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["refferalincome"] = $response[0]["refferalincome"];

        /*         * *********************************dashboard profile section detail*************************************** */
        $query = "select nodeweight from account where userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["nodeweight"] = $response[0]["nodeweight"];

      //  $query = "select mining_percent,contract_duration,sum(paidbtc) as paidbtc from miningcontract where userid=" . $this->session->userdata('userid') . " group by mining_percent,contract_duration ";
	   $query = "select mining_percent,contract_duration,sum(paidbtc) as paidbtc from miningcontract where userid=" . $this->session->userdata('userid') . "  and status='Active' group by mining_percent,contract_duration ";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["mining_contract"] = $response;

      //  $query = "select sum(paidbtc) as paidbtc from miningcontract where userid=" . $this->session->userdata('userid');
	  $query = "select sum(paidbtc) as paidbtc from miningcontract where status='Active' and userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        if ($response[0]['paidbtc'] == null)
            $dashboard["mininginvestment"] = 0;
        else
            $dashboard["mininginvestment"] = $response[0]['paidbtc'];


        $query = "select total_balance from mlm_payout_completed where userid=" . $this->session->userdata('userid') . " order by created_on desc limit 1";
        $response = $this->AdminGenericModel->getQueryResult($query);
        if ($response[0]["total_balance"] == null) {
            $dashboard["affiliate"] = 0;
        } else
            $dashboard["affiliate"] = $response[0]["total_balance"];

        // lending reinvest
        $query = "Select sum(usdamount) as 'reinvestamount' FROM reinvest where userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        if ($response[0]["reinvestamount"] == null) {
            $dashboard["reinvestamount"] = 0;
        } else
            $dashboard["reinvestamount"] = $response[0]["reinvestamount"];


        $query = "Select sum(amountusd) as 'lendinginvestment' FROM lendingtb where userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);
        if ($response[0]["lendinginvestment"] == null) {
            $dashboard["lendinginvestment"] = 0;
        } else
            $dashboard["lendinginvestment"] = $response[0]["lendinginvestment"] - $dashboard["reinvestamount"];

        // // lending income
        $query = "select sum(lendingop) as 'lendingincome' from lendingop where userid=" . $this->session->userdata('userid');
        $response = $this->AdminGenericModel->getQueryResult($query);

        if ($response[0]["lendingincome"] == null)
            $dashboard['lendingincome'] = 0;
        else
            $dashboard['lendingincome'] = $response[0]["lendingincome"];

        /*         * ****************************dashboard withdrawal details******************************************************** */
        $query = "select txId,datecreated,transactionbtc from transaction where userid=" . $this->session->userdata('userid') . "  order by datecreated desc limit 10";
        $response = $this->AdminGenericModel->getQueryResult($query);
        $dashboard["withdrawals"] = $response;
        $this->output->set_content_type('application/json')->set_output(json_encode($dashboard));
    }

    // *********************** for lending *****************
    //method to deposit bitcoin from user
    function deposit() {
        $data = array();
        $uid = $this->session->userdata('userid');
        $data['userid'] = $uid;
        $data['apidata'] = file_get_contents("http://www.cryptowey.com/api/Example/getdepositapi?amount=1");
        $data['apidata'] = json_decode($data['apidata']);
        $data['key'] = $data['apidata']->user_list[0]->api_pub_key;
        $data['unconfirm'] = $data['apidata']->user_list[0]->unconfirm;
        $data['confirm'] = $data['apidata']->user_list[0]->confirm;


        $uid = $this->session->userdata('userid');
        $data['bitcoinwallet'] = $this->AdminGenericModel->selectbitcoinwallet($uid);

        $selecttransaddress = $this->AdminGenericModel->selecttransaddress($uid);
        $data['wallet_address'] = $this->AdminGenericModel->selectwalletaddress($uid);
        //echo "<pre>";print_r($selecttransaddress);die();
        $data['txaddress'] = $selecttransaddress;
        $data['template'] = 'deposit';
        $data['title'] = 'Deposit Your Bitcoin';
        $this->admin_layout($data);
    }

    public function Pay() {
        $data['template'] = 'pay';
        $data['title'] = 'Pay';
        $data['amount'] = $_POST['amountSatoshis'];
        $this->admin_layout($data);
    }

    public function depositrequest() {
        $uid = $this->session->userdata('userid');
        $this->AdminGenericModel->savedeposit($_POST['amount'], $uid);
        $get_current_balance=$this->db->query("select btc_balance from user_balances where userid='$uid'")->row();
        $current_bitcoins=$get_current_balance->btc_balance;
        $btcamount=$_POST['amount']+$current_bitcoins;
        $this->db->query("update user_balances set btc_balance='$btcamount' where userid='$uid'");
        echo 1;
        exit();
    }

    public function kitdepositrequest() {        
        $uid = $this->session->userdata('userid');
        $this->AdminGenericModel->savekitdeposit($_POST['amount'], $uid, $_POST['purchaseid']);
        echo 1;
        exit();
    }

    public function lending() {
        $data = array();
        $uid = $this->session->userdata('userid');
        $data['lendingwallet'] = $this->AdminGenericModel->selectlendingwallet($uid);
        $data['bitcoinwallet'] = $this->AdminGenericModel->selectbitcoinwallet($uid);
        $data['totalearning'] = $this->AdminGenericModel->selecttotalearning($uid);
        $data['caplendingwallet'] = $this->AdminGenericModel->selectlcapendingwallet($uid);
        $data['capbitcoinwallet'] = $this->AdminGenericModel->selectcapbitcoinwallet($uid);
		$data['Lend_BTC']=$this->db->query("select *from lending_percentage where status='LendBTC'")->result();
		$data['Reinvest']=$this->db->query("select *from lending_percentage where status='Reinvest'")->result();
		$data['Capital_Reinvest']=$this->db->query("select *from lending_percentage where status='CapitalReinvest'")->result();
        // Total Amount lended
        $lendedamountusd = $this->AdminGenericModel->selectlendedamountusd($uid);
        // reinvested amount
        $sql2 = "SELECT sum(usdamount) as reinvested FROM reinvest WHERE userid = '$uid'";
        $result2 = $this->db->query($sql2);
        $reinvested = $result2->result_array();

        if (!empty($lendedamountusd)) {
            $data['lendedamount'] = $lendedamountusd[0]['totallendedamountusd'] - $reinvested[0]['reinvested'];
        } else {
            $data['lendedamount'] = 0.0;
        }

        if (!empty($reinvested[0]['reinvested'])) {
            $data['reinvestment'] = $reinvested[0]['reinvested'];
        } else {
            $data['reinvestment'] = 0.0;
        }

        $lendedamountdetails = $this->AdminGenericModel->selectlendedamountdetails($uid);
        $data['lendedamountdetails'] = $lendedamountdetails;
        $data['template'] = 'lending';
        $data['title'] = 'Lend Your Bitcoin';
        $this->admin_layout($data);
    }

    public function lendingtx() {
        $this->db->trans_start();
        $time = date("Y-m-d h:m:s");
        $info = $this->input->post();
        $bitcoinamount = $info['bitcoinamount'];
        $dollaramount = $info['dollaramount'];
        $onebtctodolloar = $_POST['onebtctodolloar'];
        $peramount = round($_POST['usdequivalent']);
        if(empty($bitcoinamount) || empty($dollaramount) || empty($peramount)){
            $this->session->set_flashdata('message', 'Fail, Please Try Again');
            redirect(base_url() . "Lending");
        }
        /*if ($peramount < 5001) {
            $lending_percent = 6.5;
        } else if ($peramount > 5000 && $peramount < 15001) {
            $lending_percent = 7.5;
        } else if ($peramount > 15000 && $peramount < 25001) {
            $lending_percent = 8.5;
        } else if ($peramount > 25000) {
            $lending_percent = 10;
        }*/
		$lending_percent=$info['slab_percentage'];
		$referral_percentage=$info['referral_percentage'];
        //   print_r($peramount.' '.$lending_percent); die();    
        $purchaseid = time();
        $users_id=$this->session->userdata('userid');
        $wallets_balance=$this->db->query("select lending_balance,btc_balance from user_balances where userid='$users_id'")->row();
        $lending_balance=$wallets_balance->lending_balance;
        $btc_balance=$wallets_balance->btc_balance;
        // this is for reinvest
        if ($info['type'] == 'reinvest') {
          /*  $reinvest = array(
                "tablename" => "reinvest",
                "data" => array(
                    "userid" => $this->session->userdata("userid"),
                    "usdamount" => $dollaramount,
                    "date" => date('Y-m-d h:m:s'),
                    "comment" => "Reinvest"
                )
            );
            $result = $this->AdminGenericModel->insertRecord($reinvest);

            // update balances from lending wallet
            $update_lending_balance=$lending_balance-$dollaramount;
            $update_lending_array=array('lending_balance'=>$update_lending_balance);
            $this->db->where('userid',$users_id);
            $this->db->update('user_balances',$update_lending_array);*/
			
			
			$res = $this->site->oneusdtousrcurr();
         $to = $this->session->userdata('currency');
	   $convertedamount=round($dollaramount/$res);
      //$usdamount=$dollaramount;
	  $investtype='Reinvest';
		  if($convertedamount>=10){
		$get_data=$this->db->query("select slab_percentage,referral_percentage from lending_percentage where usd_amount_from <= '$convertedamount' and usd_amount_to >= '$convertedamount' and status='$investtype'")->row();
		$referral_percentage1=$get_data->referral_percentage;
		$lending_percentage1=$get_data->slab_percentage;
	  
				if( $referral_percentage==$referral_percentage1)
				{
					  $referral_percentage=$referral_percentage1;
				}else{
				
						$referral_percentage=0;
					}
			}
			$getcontraact=$this->db->query("select lending_percent,referral_percentage from lendingcontract where userid='".$this->session->userdata("userid")."' && status='Active'");
	$avgArray=[];
	$i=0;
	foreach ($getcontraact->result() as $row)
		{	
        $avgArray[$i]=$row->lending_percent;
		$i++;
		}
		$percentage= round(array_sum($avgArray)/count($avgArray),2);
		
		if($percentage==0)
		{
				
			if($lending_percentage1==$lending_percent)
			{
				
				  $lending_percent=$lending_percentage1;
			}else{
				 
				$lending_percent=0;
			}
				
		}else{
			if($lending_percent==$percentage)
				{
					
					$lending_percent=$percentage;
				}else{
					
					$lending_percent=0;
				}
		}
				$reinvest = array(
                "tablename" => "reinvest",
                "data" => array(
                    "userid" => $this->session->userdata("userid"),
                    "usdamount" => $dollaramount,
                    "date" => date('Y-m-d h:m:s'),
                    "comment" => "Reinvest"
                )
            );
            $result = $this->AdminGenericModel->insertRecord($reinvest);

            // update balances from lending wallet
            $update_lending_balance=$lending_balance-$dollaramount;
            $update_lending_array=array('lending_balance'=>$update_lending_balance);
            $this->db->where('userid',$users_id);
            $this->db->update('user_balances',$update_lending_array);
			
        } else {
           // update balances from btc wallet
             $update_btc_balance=$btc_balance-$bitcoinamount;
             $update_btc_array=array('btc_balance'=>$update_btc_balance);
             $this->db->where('userid',$users_id);
             $this->db->update('user_balances',$update_btc_array);
        }
        // reinvest end here

        $lendingdata = array(
            "tablename" => "lendingtb",
            "data" => array(
                "purchaseid" => $purchaseid,
                "userid" => $this->session->userdata("userid"),
                "amountbtc" => $bitcoinamount,
                "amountusd" => $dollaramount,
                "originalamount" => $dollaramount,
                "datecreated" => date('Y-m-d h:m:s'),
                "status" => 1,
                "comment" => "lended",
                "currencysymbol" => $this->session->userdata("currency"),
            )
        );
        //  echo "<pre>";print_r($lendingdata);die();

        $result = $this->AdminGenericModel->insertRecord($lendingdata);
        $lendcontractdata = array(
            "tablename" => "lendingcontract",
            "data" => array(
                "contractid" => $purchaseid,
                "userid" => $this->session->userdata("userid"),
                "paidbtc" => $bitcoinamount,
                "contract_duration" => '750',
                "investment" => $_POST['investment'],
                "lending_percent" => $lending_percent,
				"referral_percentage"=>$referral_percentage,
                "status" => "Active",
                "signdate" => date('Y-m-d h:m:s')
            )
        );
        $result = $this->AdminGenericModel->insertRecord($lendcontractdata);
        //Update User Tag
        $query = "select * from account where userid=" . $this->session->userdata("userid");
        $r = $this->AdminGenericModel->getQueryResult($query);
        //echo "<pre>";print_r($r[0]['nodeweight']);die();
        $newamt = $r[0]['nodeweight'] + $bitcoinamount;


        if ($newamt > 0 && $newamt < 0.5) {
            //set accstatus in account to active            
            $this->db->query("update account set accstatus='active', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
        } else if ($newamt >= 0.5) {
            //set accstatus in account to silver
            $this->db->query("update account set accstatus='silver', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
        }


        $query = "CALL reg_topuplend('" . $this->session->userdata("userid") . "','" . $bitcoinamount . "')";
        $this->db->query($query);

        $data = array('amountbtc', 'amountusd');
        $this->session->unset_userdata($data);
        $this->session->set_userdata("contractpurchase", 'lending');
        $subject = "Cryptowey - Lending Contract Acknowledgment";
        $messagebody .= "Hi,<br><br>";
        $messagebody = "Congratulations!!! <b>" . $this->session->userdata('username') .
                "</b> You have purchased the Bitcoin Lending Contract worth ".$this->session->userdata("currency")." " . $dollaramount . ".<br>";
        $messagebody .= "Sit Back And Relax We Are Making You Gain The Best Benefits Out Of Your Investment.<br>";
        $messagebody .= "Request To Update Your User Profile.<br>";
        $messagebody .= "<br><br>_________________________________________________________<br><br>";
        $messagebody .= "Regards,<br>Cryptowey Team.";
        $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
        $successmsg = "";
        $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
        $response = $this->GenericModel->sendEmail($this->session->userdata("emailid"), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', 'Fail, Please Try Again');
            redirect(base_url() . "Lending");
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('sucessmessage', 'Amount Lended Successfully');
            redirect(base_url() . "Acknowledge");
        }
    }

    function deposittx() {
        if (isset($_REQUEST)) {
            $info = $this->input->post();
            // echo '<pre>';print_r($info);die();
            $totalbtctosend = $info['payablebtc'];
            // $totalusd = $info['paidusd'];

            $time = date("Y-m-d h:m:s");
            $userkey = strtoupper(substr($this->session->userdata('username'), 0, 3));

            $purchaseid = time();
            $data = array();
            $data['template'] = 'deposit';
            $data['title'] = 'Payment Gateway';
            $data['purchaseid'] = $purchaseid;
            $data['userid'] = $this->session->userdata('userid');
            $data['payablebtc'] = $totalbtctosend;
            // $data['amountUSD'] = $totalusd;
            unset($_SESSION['purchaseid']);
            unset($_SESSION['payablebtc']);
            $this->gourl_layout1($data);
        } else {
            redirect(base_url() . "Deposit");
        }
    }

    public function lendwithdrawalamount() {
        $postdata = file_get_contents("php://input");
        $requestamount = json_decode($postdata);
        $data = array();
        $uid = $this->session->userdata('userid');
        // $bitcoinwallet = $this->AdminGenericModel->selectbitcoinwallet($uid);
        $users_balances_btc=$this->db->query("select btc_balance from user_balances where userid='$uid'")->row();
        $bitcoinwallet=$users_balances_btc->btc_balance;
        if ($bitcoinwallet >= $requestamount->amount) {
            $status = "Pending";
            $withdrawdata = array(
                "tablename" => "withdrawal",
                "data" => array(
                    "user_id" => $uid,
                    "debit_amount" => $requestamount->amount,
                    "amount" => $requestamount->amount,
                    "status" => $status,
                    "create_date" => date('Y-m-d h:m:s')
                )
            );
            $res = $this->AdminGenericModel->insertRecord($withdrawdata);

           $updated_btc_amount=$bitcoinwallet-$requestamount->amount;
           $update_btc=array('btc_balance'=>$updated_btc_amount);
           $this->db->where('userid',$uid);
           $this->db->update('user_balances',$update_btc);

            $subject = "Cryptowey - Withdraw Request";
            $messagebody .= "Hi,<br><br>";
            $messagebody .= $this->session->userdata('username') . " Has Sent Withdrawal Request Of " . $requestamount->amount . " BTC";
            $messagebody .= "<br><br> CI Number Is: " . $this->session->userdata('btcmonk_ci');
            $messagebody .= "<br><br> Wallet Address Is: " . $this->session->userdata('userwalletaddress');
            $messagebody .= "<br><br> EmailID Is: " . $this->session->userdata('emailid');
            $messagebody .= "<br>_________________________________________________________<br";
            $messagebody .= "Regards,<br> <br> Cryptowey Team.";
            $successmsg = "";
            $response = $this->GenericModel->sendEmail('hikecoin@gmail.com', "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);

            echo 1;
            exit();
        } else {
            echo 0;
            exit();
        }
    }

    public function getlendwithdrawalrequests() {
        $this->db->select('*');
        $this->db->from('withdrawal');
        $this->db->where('user_id', $this->session->userdata("userid"));
        $this->db->order_by('create_date', 'desc');
        $res = $this->db->get();
        $result = $res->result();
        echo json_encode($result);
    }

    public function currentbtcprice() {
        $this->db->select('currency');
        $this->db->from('user');
        $this->db->where('userid', $this->session->userdata("userid"));
        $usrcurrency = $this->db->get()->row();
        $curr = $usrcurrency->currency;
        //additional code for api run on local
        $this->load->library('site');
        $response = $this->site->getbrokerage();
        if ($curr == 'INR') {
            $res = 1;
        } else {
            $res = $this->site->currencyconvertor('INR', $curr);
        }
        $onebtctocurrency = $response['buy'] * $res;
        $this->output->set_content_type('application/json')->set_output(json_encode($onebtctocurrency));
    }

    public function currentbtcsellprice() {
        $this->db->select('currency');
        $this->db->from('user');
        $this->db->where('userid', $this->session->userdata("userid"));
        $usrcurrency = $this->db->get()->row();
        $curr = $usrcurrency->currency;
        $this->load->library('site');
        $response = $this->site->getbrokerage();
        if ($curr == 'INR') {
            $res = 1;
        } else {
            $res = $this->site->currencyconvertor('INR', $curr);
        }
        $onebtctocurrency = $response['buy'] * $res;
        $this->output->set_content_type('application/json')->set_output(json_encode($onebtctocurrency));
    }

    public function headercurrentbtcprice() {
        $this->load->library('site');
        $response = $this->site->getbrokerage();
        $res = $this->site->currencyconvertor('INR', 'USD');
        $onebtctousd = $response['buy'] * $res;
        $this->output->set_content_type('application/json')->set_output($onebtctousd);
    }

    public function updatecurrency() {
        $uid = $this->session->userdata('userid');
        $postdata = file_get_contents("php://input");
        $currencydata = array(
            "tablename" => "currencyrequest",
            "data" => array(
                "userid" => $uid,
                "currencytochange" => $postdata,
                "status" => 'Pending',
            )
        );
        $this->db->delete('currencyrequest', array('userid' => $uid));
        $res = $this->AdminGenericModel->insertRecord($currencydata);
        if ($res) {
            $subject = "Cryptowey - Currency Change Request";
            $messagebody .= "Hi,<br><br>";
            $messagebody .= "Your Request to Change Currency is Successfully sent. ";
            $messagebody .= "Make Sure That If You Will Change Your Currency, Your Current Lending Wallet Amount Get Convereted Into BitCoin Wallet. From Next Payout You Will Receive Payout In Changed Currency And That Will Be Your Lending Wallet.<br>";
            $messagebody .= "_________________________________________________________<br><br>";
            $messagebody .= "Regards,<br>Cryptowey Team.";
            $messagebody .= "<br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
            $successmsg = "";
            $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
            $response = $this->GenericModel->sendEmail($this->session->userdata('emailid'), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
        }
    }

    public function getrank() {
        $uid = $this->session->userdata('userid');
        $iseligibal = $response = $this->GenericModel->getQueryResult("SELECT direct_left_conf,direct_right_conf from mlm_progress_count  Where userid=" . $uid);

        if ($iseligibal[0]['direct_left_conf'] >= 1 && $iseligibal[0]['direct_right_conf'] >= 1) {
            $response = $this->GenericModel->getQueryResult("SELECT b.left_business,b.right_business from user a, mlm_progress_count b Where a.userid=b.userid and a.userid=" . $uid);
            if ($response[0]['left_business'] > $response[0]['right_business']) {
                $business = $response[0]['right_business'];
            } else {
                $business = $response[0]['left_business'];
            }

            $response = $this->GenericModel->getQueryResult("SELECT * from ranker where business <=" . $business . "order by business desc limit 1");
            $rankdata = array(
                'name' => $response[0]['name'],
                'business' => $response[0]['business'],
                'image' => $response[0]['image'],
            );

            $this->output->set_content_type('application/json')->set_output(json_encode($rankdata));
        } else {
            echo 0;
        }
    }

    public function checkamount() {
        $uid = $this->session->userdata('userid');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $bitcoinamount = $request;
        $bitcoinwallet = $this->AdminGenericModel->selectbitcoinwallet($uid);
        if ($bitcoinamount <= $bitcoinwallet) {
            $response = true;
        } else {
            $response = false;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMylendinginfo() {
        $response = $this->GenericModel->getQueryResult("select lc.contractid,DATE_FORMAT(lc.signdate,'%d, %b %y') 'signdate' ,DATE_FORMAT(DATE_ADD(lc.signdate,INTERVAL lc.contract_duration DAY),'%d, %b %y') 'expiredate',lc.paidbtc,lc.userid,lc.status,lc.contract_duration,lc.investment,lc.lending_percent,lt.amountusd,lt.currencysymbol,lt.amountbtc,lt.originalamount,lc.reinvest_status from lendingcontract as lc,lendingtb as lt where lc.contractid=lt.purchaseid and lc.userid=" . $this->session->userdata("userid")." ORDER BY lc.signdate DESC" );
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMyDailyOutputlend() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $count = "select count(*) 'count' from lendingop where contractid=" . $request->invoiceid . " and userid=" . $this->session->userdata('userid');
        $c = ($this->AdminGenericModel->getQueryResult($count));
        $query = "select sum(lo.lendingop) 'total',l.signdate,lt.amountusd,l.paidbtc from lendingop lo,lendingcontract l,lendingtb lt where lo.contractid=l.contractid and l.contractid=lt.purchaseid and lo.contractid=" . $request->invoiceid . " and lo.userid=" . $this->session->userdata("userid") . " order by lo.lendingdate desc";
        $response['info'] = $this->AdminGenericModel->getQueryResult($query);
        $signdate = $response['info'][0]['signdate'];
        $signdate = date('Y-m-d H:i:s', strtotime($signdate . ' +1 day'));
        $Query = "select DATE_FORMAT(m.lendingdate,'%d-%M-%Y') as 'lendingdate',m.lendingop,m.contractid from lendingop m where m.contractid=" . $request->invoiceid . " and m.lendingdate >'" . $signdate . "' and m.userid=" . $this->session->userdata('userid') . " order by m.lendingdate desc limit " . $request->pagerangestart . " , " . $request->pagesize;
        $response['totalpages'] = ceil($c[0]['count'] / $request->pagesize);
        $response['detail'] = $this->AdminGenericModel->getQueryResult($Query);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function transferdollertobtc() {
        $uid = $this->session->userdata('userid');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $lendwallet = $this->AdminGenericModel->selectlendingwallet($uid);
        $requestamt = $request->usd;
        if ($requestamt > $lendwallet) {
            $response = false;
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $adminfees = number_format((0.2 / 100) * $request->btc, 8, '.', '');
            $btcamount = $request->btc - $adminfees;
            $transferdata = array(
                "tablename" => "lending_to_btc_transfer",
                "data" => array(
                    "userid" => $uid,
                    "usdamount" => $request->usd,
                    "btcamount" => $btcamount,
                    "currency" => $this->session->userdata('currency'),
                    "datecreated" => date('Y-m-d h:m:s'),
                    "status" => 1,
                )
            );

            $result = $this->AdminGenericModel->insertRecord($transferdata);
            $feedata = array(
                "tablename" => "adminfee",
                "data" => array(
                    "userid" => $uid,
                    "fee" => $adminfees,
                    "amount" => $btcamount,
                    "comment" => 'transfer fee',
                    "create_date" => date('Y-m-d h:m:s')
                )
            );
            $resfee = $this->AdminGenericModel->insertRecord($feedata);
            if ($result) {
                $curent_wallet=$this->db->query("select lending_balance,btc_balance from user_balances where userid='$uid'")->row();
                $update_lending_balance=$curent_wallet->lending_balance-$request->usd;
                $update_btc_balance=$curent_wallet->btc_balance+$btcamount;
                $update_user_balance=array('btc_balance'=>$update_btc_balance,'lending_balance'=>$update_lending_balance);
                $this->db->where('userid',$uid);
                $this->db->update('user_balances',$update_user_balance);
                $response = $result;
            } else {
                $response = false;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }

    //by shivraj
    public function adminpanelminingform() {
        $this->db->trans_start();
        //*************************kitpurchase ****************
        $res = $this->db->get_where('user', array('username' => $_POST['selectuser']))->result_array();

        if (!empty($res[0]['userid'])) {
            $info['selectuser'] = $res[0]['userid'];
        } else {
            $this->session->set_flashdata('message', 'Enter Correct Username');
            redirect('MiningContract');
        }

        $info['selectkit'] = $_POST['selectkit'];

        // comment these two line to run code
        // print_r('remove comment of die() from Admin/FunctionController/adminpanelminingform method to run this code');
        // die();  

        $datakit1 = array(
            "select" => "kitno,btc,payablebtc,mining_percent,contract_duration",
            "tablename" => "kit",
            "where" => array(
                "kitno" => $info['selectkit']
            )
        );
        //get Kit Details
        $response = $this->AdminGenericModel->getSingleRecord($datakit1);

        $datauser = array(
            "select" => "*",
            "tablename" => "user",
            "where" => array(
                "userid" => $info['selectuser']
            )
        );
        $responseuser = $this->AdminGenericModel->getSingleRecord($datauser);

        $dataacc = array(
            "select" => "*",
            "tablename" => "account",
            "where" => array(
                "userid" => $info['selectuser']
            )
        );

        $totalbtctosend = $response['payablebtc'];
        $time = date("Y-m-d h:m:s");
        $userkey = strtoupper(substr($responseuser['username'], 0, 3));
        $kitid = "HC" . $userkey . md5($time);
        $purchaseid = time();
        $kitdata = array(
            "tablename" => "kitpurchase",
            "data" => array(
                "purchaseid" => $purchaseid,
                "kitid" => $kitid,
                "kitno" => $response['kitno'],
                "userid" => $responseuser['userid'],
                "status" => "pending",
                "comment" => "Kit Creation Completed",
                "paidbtc" => $totalbtctosend,
                "kitbtc" => $response['btc'],
                "datecreated" => date('Y-m-d h:m:s')
            )
        );
        $this->AdminGenericModel->insertRecord($kitdata);

        $crypto_pay_data = array(
            "tablename" => "crypto_payments",
            "data" => array(
                "paymentID" => $purchaseid,
                "boxID" => "6494",
                "boxType" => "paymentbox",
                "orderID" => $purchaseid,
                "userID" => $responseuser['userid'],
                "countryID" => "IND",
                "coinLabel" => "BTC",
                "amount" => $totalbtctosend,
                "amountUSD" => 0,
                "unrecognised" => 0,
                "addr" => $responseuser['userwalletaddress'],
                "txID" => "txid",
                "txDate" => $time,
                "txConfirmed" => "used",
                "txCheckDate" => $time,
                "recordCreated" => $time,
            )
        );
        $this->AdminGenericModel->insertRecord($crypto_pay_data);
        //Create a Kit for the Purchase
        $contractdata = array(
            "tablename" => "miningcontract",
            "data" => array(
                "contractid" => $purchaseid,
                "userid" => $responseuser['userid'],
                "contractprice" => $totalbtctosend,
                "paidbtc" => $totalbtctosend,
                "contracttypeid" => $response['kitno'],
                "contract_duration" => $response['contract_duration'],
                "mining_percent" => $response['mining_percent'],
                "status" => "Active",
                "signdate" => date('Y-m-d h:m:s')
            )
        );
        $kitpurchasedata = array(
            "tablename" => "kitpurchase",
            "where" => array(
                "kitid" => $kitid
            ),
            "data" => array(
                "status" => "used"
            )
        );

        $u = $this->AdminGenericModel->updateRecord($kitpurchasedata);
        $i = $this->AdminGenericModel->insertRecord($contractdata);
        //Update User Tag


        $r = $this->AdminGenericModel->getSingleRecord($dataacc);

        if (($r['nodeweight'] + $totalbtctosend) > 0 && ($r['nodeweight'] + $totalbtctosend) < 0.5) {
            //set accstatus in account to active            
            $this->db->query("update account set accstatus='active', nodeweight=nodeweight+" . $totalbtctosend . " where userid=" . $responseuser['userid']);
        } else if (($r['nodeweight'] + $totalbtctosend) >= 0.5) {
            //set accstatus in account to silver
            $this->db->query("update account set accstatus='silver', nodeweight=nodeweight+" . $totalbtctosend . " where userid=" . $responseuser['userid']);
        }

        //Topup Procedure
        $query = "CALL reg_topuplend('" . $responseuser['userid'] . "','" . $totalbtctosend . "')";
        $this->db->query($query);
        $data = array('payablebtc', 'contractbtc', 'contractid');
        //$this->session->unset_userdata($data);
        $this->session->set_userdata("contractpurchase", true);
        $subject = "Cryptowey - Contract Purchase Acknowledgment  ";
        $messagebody .= "Hi,<br><br>";
        $messagebody = "Congratulations!!! <b>" . $responseuser['username'] .
                "</b> You have purchased the Bitcoin Mining Contract worth BTC " . $totalbtctosend . ".<br>";
        $messagebody .= "Sit Back And Relax We Are Making You Gain The Best Benefits Out Of Your Investment.<br>";
        $messagebody .= "Request To Update Your User Profile.<br>";
        $messagebody .= "<br><br>_________________________________________________________<br><br>";
        $messagebody .= "Regards,<br>Cryptowey Team.";
        $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
        $successmsg = "";
        $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
        $response = $this->GenericModel->sendEmail($responseuser['emailid'], "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', 'Fail, Please Try Again');
            redirect(base_url() . "MiningContract");
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('sucessmessage', 'Contract Buy Successfully');
            redirect(base_url() . "MiningContract");
        }


        //*************************signnow*****************
    }

    public function AdminLendDeposite() {
        // comment these two line to run code
        //  print_r('remove comment of die() from Admin/FunctionController/AdminLendDeposite method to run this code');
        //  die();
        $res = $this->db->get_where('user', array('username' => $_POST['selectuser']))->result_array();

        $this->load->library('site');
        $response = $this->site->getbrokerage();
        $result = $this->site->currencyconvertor('INR', 'USD');
        $onebtctousd = $response['buy'] * $result;
        $currentprice = round($onebtctousd, 2);
        $t = time();
 $btc_wallets_amount= $this->AdminGenericModel->selectbitcoinwallet($res[0]['userid']);
        if (!empty($res[0]['userid'])) {
		$btcamount=$btc_wallets_amount+$_POST['amount'];
		$this->db->query("update user_balances set btc_balance='$btcamount' where userid='".$res[0]['userid']."'");
            $crypto_pay_data = array(
                "tablename" => "crypto_payments_deposit",
                "data" => array(
                    'userID' => $res[0]['userid'],
                    'paymentID' => $t,
                    'amount' => $_POST['amount'],
                    'amountUSD' => $_POST['amount'] * $currentprice,
                    'txConfirmed' => 0,
                    'txCheckDate' => date('yy-m-d H:i:s'),
                    'txDate' => date('yy-m-d H:i:s'),
                    'boxType' => 'paymentbox',
                    'boxID' => 11061,
                    'orderID' => $t,
                    'recordCreated' => date('yy-m-d H:i:s'),
                    'coinLabel' => 'BTC',
                    'countryID' => 'IND',
                )
            );

            $this->AdminGenericModel->insertRecord($crypto_pay_data);
            $this->session->set_flashdata('sucessmessage', 'Amount Deposited Successfully');
            redirect('LendingDeposit');
        } else {
            $this->session->set_flashdata('message', 'Enter Correct Username');
            redirect('LendingDeposit');
        }
    }

    public function setPDFfetcher_lend() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $this->session->set_userdata('pdfid', $request->contractid);
        $this->session->set_userdata('pdfsigndate', $request->signdate);
        $this->session->set_userdata('pdfexpiredate', $request->expiredate);
        $this->session->set_userdata('pdfcontractprice', $request->contractprice);

        $this->session->set_userdata('pdfpaidbtc', $request->paidbtc);
        $this->session->set_userdata('pdflending_percent', $request->lending_percent);

        $this->session->set_userdata('pdfserverspeed', '150 GHS');
        $this->session->set_userdata('pdfinvestment', $request->investment);

        return true;
    }

    public function pdf_lend() {
        $this->load->helper('pdf_helper');
        $request->contractid = $this->session->userdata('pdfid');

        $txid = $this->GenericModel->getQueryResult("select lc.contractid,lc.investment,DATE_FORMAT(lc.signdate,'%d, %b %y') 'signdate' ,DATE_FORMAT(DATE_ADD(lc.signdate,INTERVAL lc.contract_duration DAY),'%d, %b %y') 'expiredate',lc.paidbtc,lc.userid,lc.contract_duration,lc.lending_percent from lendingcontract as lc,lendingtb as lt where lc.contractid=lt.purchaseid and lc.userid=" . $this->session->userdata("userid"));
        $request->txID = $txid[0]['txID'];
        //   $data['contract'] = $request;
        $this->load->view('pdfreport1', $data);
    }

    public function getallrank() {
        $this->db->select('*');
        $this->db->from('ranker');
        $result = $this->db->get()->result();
        echo json_encode($result);
    }

    public function getuserwithrank() {
        echo 'username ' . ' ' . ' Node_Weight ' . ' ' . ' rank ' . ' ' . ' eligibalbusiness ' . ' ' . ' actualbusiness <br>';
        $response = $this->GenericModel->getQueryResult("SELECT a.userid,a.username,c.nodeweight, b.left_business,b.right_business from user a, mlm_progress_count b, account c Where a.userid=b.userid AND a.userid=c.userid AND a.datecreated >= '2018-01-01 00:00:00'");
       
        foreach ($response as $user) {
            if ($user['left_business'] > $user['right_business']) {
                $business = $user['right_business'];
            } else {
                $business = $user['left_business'];
            }
            $res = $this->GenericModel->getQueryResult("SELECT * from ranker where business <=" . $business . "order by business desc limit 1");
            $rankdata = array(
                'username' => $user['username'],
                'Node_Weight' => $user['nodeweight'],
                'rank' => $res[0]['name'],
                'eligibalbusiness' => $res[0]['business'],
                'actualbusiness' => $business,
            );
            if ($business >= 5 || $user['nodeweight'] >= 7 ) {
                echo $user['username'] . '&nbsp&nbsp&nbsp ' . $user['nodeweight'] . '&nbsp&nbsp&nbsp ' . $res[0]['name'] . ' &nbsp&nbsp&nbsp' . $res[0]['business'] . '&nbsp&nbsp&nbsp ' . $business;
                echo '<br>';
            }
        }
    }

    public function lending_investment() {
        $uid = $this->session->userdata('userid');
        $data['invest_data'] = $this->db->query("select contractid,investment from lendingcontract where userid='$uid'")->result();
        //  echo $this->db->last_query();
        $data['template'] = 'invest_lending';
        $data['title'] = 'Invest Lending';
        $this->admin_layout($data);
    }

    public function update_lending_investment() {
        $uid = $this->session->userdata('userid');
        $contract_id = trim($this->input->post('contract_id'));
        $investment = trim($this->input->post('investment'));
        $query = $this->db->query("update lendingcontract set investment='$investment' where contractid='$contract_id' and userid='$uid'");
        if ($query == true) {
            $_SESSION['success'] = 'Updated Successfully..';
            redirect('Lending_Investment');
        } else {
            echo 'not updated';
        }
    }

    public function get_wallets() {
        $res = $this->db->select('userid')->from('lendingcontract')->group_by('userid')->get()->result();
        foreach ($res as $u) {
            $uid = $u->userid;
            $lendingwallet = $this->AdminGenericModel->selectlendingwallet($uid);
            $bitcoinwallet = $this->AdminGenericModel->selectbitcoinwallet($uid);
            echo $uid . '---' . $lendingwallet . '---' . $bitcoinwallet . '<br>';
        }
    }

    public function minimum_payout_report_history(){
        //$userid=$this->session->userdata('userid');
          $uid = $this->session->userdata('userid');
          $data['Mining']=$this->db->query("SELECT t.userid, u.username, u.userwalletaddress,u.btcmonk_ci, a.nodeweight, SUM( t.debit_amount ) AS miningop
          FROM mlm_transaction t, account a, user u WHERE u.userid = a.userid AND t.userid = u.userid AND u.btcmonk_ci!=0 AND trans_date>= '2018-03-01' AND trans_date<='2018-03-15' AND description LIKE '%Mining%' and t.userid='$uid' GROUP BY u.btcmonk_ci order by t.userid")->row();
          $data['Binary']=$this->db->query("SELECT mlmt.userid,u.username, u.userwalletaddress,u.btcmonk_ci,SUM(mlmt. debit_amount) as miningop  FROM mlm_transaction as mlmt,user as u WHERE mlmt.userid='$uid' and  mlmt.userid=u.userid and u.btcmonk_ci !=0 and trans_date like '%2018-03-16%' and description LIKE  '%Binary%' GROUP BY u.btcmonk_ci order by mlmt.userid")->row();
          $data['Direct']=$this->db->query("SELECT SUM( t.debit_amount ) as miningop , t.userid,u.userwalletaddress,u.btcmonk_ci,u.username FROM mlm_transaction t,user u WHERE t.userid = u.userid and u.btcmonk_ci!=0 and trans_date>=  '2018-03-01' AND  trans_date <= '2018-03-15' and t.userid='$uid' AND description LIKE  '%Direct%' GROUP BY u.btcmonk_ci order by  t.userid")->row();
          $data['Lending']=$this->db->query("SELECT t.userid, u.username, u.userwalletaddress,u.btcmonk_ci, a.nodeweight, SUM( t.debit_amount ),u.username AS miningop FROM mlm_transaction t, account a, user u WHERE u.userid = a.userid AND t.userid = u.userid AND trans_date>= '2018-03-01' AND trans_date <= '2018-03-15' and t.userid='$uid' AND description LIKE '%Lending%' GROUP BY u.userid")->row();
          $data['template'] = 'payout_report_history';
          $data['title'] = 'Payout Report History';
          $this->admin_layout($data);
   }

   /*capital lend amount transfer to lending wallet*/
public function capital_lending_amount_transfer_to_lending_wallet(){
    $userid=$this->session->userdata('userid');
    $lend_amount=$this->input->post('capital_lend_amount');
    $user_balances=$this->db->query("select lending_balance,cap_inr_balance from user_balances where userid='$userid'")->row();
    $cap_inr_balance=$user_balances->cap_inr_balance;
    $lending_balance=$user_balances->lending_balance;
    $add_lend_amount=$lending_balance+$lend_amount;
    $cap_inr='0.00';
    $update=$this->db->query("update user_balances set lending_balance='$add_lend_amount',cap_inr_balance='$cap_inr' where userid='$userid'");
    if($update==true){
    $_SESSION['sucessmessage']='Capital Lending Amount Transfer Successfully..';
    echo 1;
    exit;
    }else{
    echo 3;
    exit;
    }
}
/*--------------------------e    nd----------------------------------*/

public function getusdconvertdollarprice(){
      $res = $this->site->oneusdtousrcurr();
      $to = $this->session->userdata('currency');
      $usdamount=$this->input->post('usdamount');
     $convertedamount=round($usdamount/$res);
     echo $convertedamount;
     exit;
         
}
public function capital_reinvest_amount() {
     $curr = $this->session->userdata('currency');
             $users_id=$this->session->userdata('userid');
     //additional code for api run on local
     $arrContextOptions = array("ssl" => array("verify_peer" => false,"verify_peer_name" => false,),);
     $return = file_get_contents('http://test2.btcmonk.com/api/brokerage', false, stream_context_create($arrContextOptions));
     // end additional code for api run on local
     $response = $this->site->getbrokerage();
     if ($curr == 'INR') {
         $res = 1;
     } else {
         $res = $this->site->currencyconvertor('INR', $curr);
     }
     $onebtctocurrency = $response['buy'] * $res;
        
     $dollar_rate=$response['rates'][$to];
     $this->db->trans_start();
     $time = date("Y-m-d h:m:s");
     $info = $this->input->post();
      $dollaramount = $info['finalreinvestamount'];
      $bitcoinamount1 =$info['finalreinvestamount']*1/$onebtctocurrency;
      $bitcoinamount=number_format($bitcoinamount1, 8, '.', '');
     $dollar_rate=$this->site->oneusdtousrcurr();
     $peramount=round($dollaramount/$dollar_rate);
      
      //$get_amount=$this->db->query("select lending_balance cap_btc_balance from user_balances where userid='$users_id'")->row();
      //$database_amount=$get_amount->lending_balance+$get_amount->cap_btc_balance;
      //$percentage1 = (25/ 100) * $database_amount;
      //$database_amount=$percentage1+$database_amount;
     
     //echo $bitcoinamount;
     //exit;
     if($peramount<=9){
        echo 3; // Minimum Reinvestment Must Be 10$
        exit; 
       }
    /* if ($peramount < 5001) {
         $lending_percent = 7.5;
     } else if ($peramount > 5000 && $peramount < 15001) {
         $lending_percent = 8.5;
     } else if ($peramount > 15000 && $peramount < 25001) {
         $lending_percent = 9.5;
     } else if ($peramount > 25000) {
         $lending_percent = 11;
     }*/
	  $lending_percent=$info['slab_percentage'];
	 $referral_percentage=$info['referral_percentage'];
     //   print_r($peramount.' '.$lending_percent); die();    
     $purchaseid = time();
     $wallets_balance=$this->db->query("select lending_balance,btc_balance from user_balances where userid='$users_id'")->row();
     $lending_balance=$wallets_balance->lending_balance;
     $btc_balance=$wallets_balance->btc_balance;
     // this is for reinvest
     if ($info['reinvest_type'] == 'reinvest') {
         $reinvest = array(
             "tablename" => "reinvest",
             "data" => array(
                 "userid" => $this->session->userdata("userid"),
                 "usdamount" => $dollaramount,
                 "date" => date('Y-m-d h:m:s'),
                 "comment" => "Reinvest"
             )
         );

         $result = $this->AdminGenericModel->insertRecord($reinvest);
     /*Lending wallet deduction amount*/
     if(!empty($info['reinvested_lending_amount'])){
         $lend_wallet_amount=$info['reinvested_lending_amount'];
         $lend_wallet_amount=$lending_balance-$lend_wallet_amount;
       }else{
        $lend_wallet_amount=$lending_balance;
        }
      $cap_inr_balance='0.00'; 
      $update_lending_array=array('lending_balance'=>$lend_wallet_amount,'cap_inr_balance'=>$cap_inr_balance);
      $this->db->where('userid',$this->session->userdata("userid"));
      $this->db->update('user_balances',$update_lending_array);         
      /*----------------------------------end--------------------------------*/
     }
     // reinvest end here
     $lendingdata = array(
         "tablename" => "lendingtb",
         "data" => array(
             "purchaseid" => $purchaseid,
             "userid" => $this->session->userdata("userid"),
             "amountbtc" => $bitcoinamount,
             "amountusd" => $dollaramount,
             "originalamount" => $dollaramount,
             "datecreated" => date('Y-m-d h:m:s'),
             "status" => 1,
             "comment" => "lended",
             "currencysymbol" => $this->session->userdata("currency"),
         )
     );
     //  echo "<pre>";print_r($lendingdata);die();
     $result = $this->AdminGenericModel->insertRecord($lendingdata);
     $lendcontractdata = array(
         "tablename" => "lendingcontract",
         "data" => array(
             "contractid" => $purchaseid,
             "userid" => $this->session->userdata("userid"),
             "paidbtc" => $bitcoinamount,
             "contract_duration" => '750',
             "investment" => $_POST['investment'],
             "lending_percent" => $lending_percent,
			 'referral_percentage'=>$referral_percentage,
             "status" => "Active",
             "signdate" => date('Y-m-d h:m:s')
         )
     );
     $result = $this->AdminGenericModel->insertRecord($lendcontractdata);
     //Update User Tag
     $query = "select * from account where userid=" . $this->session->userdata("userid");
     $r = $this->AdminGenericModel->getQueryResult($query);
     $newamt = $r[0]['nodeweight'] + $bitcoinamount;
     if ($newamt > 0 && $newamt < 0.5) {
        //set accstatus in account to active            
        $this->db->query("update account set accstatus='active', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
    } else if ($newamt >= 0.5) {
        //set accstatus in account to silver
        $this->db->query("update account set accstatus='silver', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
    }
     //echo "<pre>";print_r($r[0]['nodeweight']);die(); 
 //  echo $bitcoinamount;
  // exit;

     $query = "CALL reg_topuplend('" .$this->session->userdata("userid")."','" . $bitcoinamount . "')";
     $this->db->query($query);

     $data = array('amountbtc', 'amountusd');
     $this->session->unset_userdata($data);
     $this->session->set_userdata("contractpurchase", 'lending');
     $subject = "Cryptowey - Lending Contract Acknowledgment";
     $messagebody .= "Hi,<br><br>";
     $messagebody = "Congratulations!!! <b>" . $this->session->userdata('username') .
             "</b> You have purchased the Bitcoin Lending Contract worth USD " . $dollaramount . ".<br>";
     $messagebody .= "Sit Back And Relax We Are Making You Gain The Best Benefits Out Of Your Investment.<br>";
     $messagebody .= "Request To Update Your User Profile.<br>";
     $messagebody .= "<br><br>_________________________________________________________<br><br>";
     $messagebody .= "Regards,<br>Cryptowey Team.";
     $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
     $successmsg = "";
     $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
     $response = $this->GenericModel->sendEmail($this->session->userdata("emailid"), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);

     // $btc_amount = $this->AdminGenericModel->selectbitcoinwallet($this->session->userdata("userid"));
      //$lend_amount = $this->AdminGenericModel->selectlendingwallet($this->session->userdata("userid"));
      
     if ($this->db->trans_status() === FALSE) {
         $this->db->trans_rollback();
         $this->session->set_flashdata('message', 'Fail, Please Try Again');
        // redirect(base_url() . "Lending");
        echo 2;
        exit;
     } else {
         $this->db->trans_commit();
         //$_SESSION['sucessmessage']='Amount Lend Successfully';
          //redirect(base_url() . "Ack");
         //$this->session->set_flashdata('sucessmessage', 'Amount Lended Successfully');
         echo 1;
         exit;
       //  redirect(base_url() . "Ack");
     }
      
      
 }


   
   /************ amol code start ************************8*/ 
    public function currentcapbtcamount(){
     
    $res = $this->db->select('cap_btc_balance')->from('user_balances')->where('id',$this->session->userdata("userid"))->get()->row();
    echo $res->cap_btc_balance;
}

function getcapvalue()
 {
 $user_balances=$this->db->query("select cap_btc_balance from user_balances where userid='".$this->session->userdata("userid")."'")->row();

 $cap_btc_balance=$user_balances->cap_btc_balance+$originalamount;

  $response = $this->site->getbrokerage();

 $getbtctoinrv=$cap_btc_balance*$response['buy'];

 $new_width = (25 / 100) * $getbtctoinrv;

 $includeprice=$getbtctoinrv+$new_width;

 echo $getbtctoinrv1=$includeprice *1/$response['buy'];    

}
function forbtcgetcapvalue()
{
$user_balances=$this->db->query("select cap_btc_balance from user_balances where userid='".$this->session->userdata("userid")."'")->row();

$cap_btc_balance=$user_balances->cap_btc_balance+$originalamount;

$response = $this->site->getbrokerage();

$getbtctoinrv=$cap_btc_balance*$response['buy'];

//$new_width = (25 / 100) * $getbtctoinrv;

//$includeprice=$getbtctoinrv+$new_width;

echo $getbtctoinrv1=$getbtctoinrv *1/$response['buy'];    

}
public function lendingtx1() {
    //echo $bitcoinamount;
          $info = $this->input->post();
        $this->db->trans_start();
        $time = date("Y-m-d h:m:s");
        $bitcoinamount =$info['bitcoinamount'];
       $dollaramount = $info['dollaramount'];
       $res = $this->site->oneusdtousrcurr();
        $peramount=round($dollaramount/$res);
           
       /* if ($peramount < 5001) {
            $lending_percent = 7.5;
        } else if ($peramount > 5000 && $peramount < 15001) {
            $lending_percent = 8.5;
           
        } else if ($peramount > 15000 && $peramount < 25001) {
            $lending_percent = 9.5;
           
        } else if ($peramount > 25000) {
            $lending_percent = 11;
           
        }*/
     $lending_percent=$info['slab_percentage'];
	 $referral_percentage=$info['referral_percentage'];
	 
        //   print_r($peramount.' '.$lending_percent); die();    
        $purchaseid = time();
        if ($info['type'] == 'reinvest') {
            $reinvest = array(
                "tablename" => "reinvest",
                "data" => array(
                    "userid" => $this->session->userdata("userid"),
                    "usdamount" => $dollaramount,
                    "date" => date('Y-m-d h:m:s'),
                    "comment" => "Reinvest"
                )
            );
          $result = $this->AdminGenericModel->insertRecord($reinvest);
        /*Lending wallet deduction amount*/
         $user_balances=$this->db->query("select cap_btc_balance,btc_balance from user_balances where userid='".$this->session->userdata("userid")."'")->row();
        //$update_btc_balance=$btc_balance->cap_btc_balance;
        if(!empty($info['btcincludeamount'])){
          $update_cap_btc_balance=$user_balances->btc_balance-$info['btcincludeamount'];
          }else{
          $update_cap_btc_balance=$user_balances->btc_balance;
          }
        $update_lending_array=array('btc_balance'=>$update_cap_btc_balance,'cap_btc_balance'=>'');
        $this->db->where('userid',$this->session->userdata("userid"));
        $this->db->update('user_balances',$update_lending_array);
        /*----------------------------------end--------------------------------*/
        }
        // reinvest end here
        $lendingdata = array(
            "tablename" => "lendingtb",
            "data" => array(
                "purchaseid" => $purchaseid,
                "userid" => $this->session->userdata("userid"),
                "amountbtc" => $bitcoinamount,
                "amountusd" => $dollaramount,
                "originalamount" => $dollaramount,
                "datecreated" => date('Y-m-d h:m:s'),
                "status" => 1,
                "comment" => "lended",
                "currencysymbol" => $this->session->userdata("currency"),
            )
        );
        //  echo "<pre>";print_r($lendingdata);die();
        $result = $this->AdminGenericModel->insertRecord($lendingdata);
        $lendcontractdata = array(
            "tablename" => "lendingcontract",
            "data" => array(
                "contractid" => $purchaseid,
                "userid" => $this->session->userdata("userid"),
                "paidbtc" => $bitcoinamount,
                "contract_duration" => '750',
                "investment" => $_POST['investment'],
                "lending_percent" => $lending_percent,
				'referral_percentage'=>$referral_percentage,
                "status" => "Active",
                "signdate" => date('Y-m-d h:m:s')
            )
        );
        $result = $this->AdminGenericModel->insertRecord($lendcontractdata);
        //Update User Tag
        $query = "select * from account where userid=" . $this->session->userdata("userid");
        $r = $this->AdminGenericModel->getQueryResult($query);
        //echo "<pre>";print_r($r[0]['nodeweight']);die();
       $newamt = $r[0]['nodeweight'] + $bitcoinamount;
   
   
           if ($newamt > 0 && $newamt < 0.5) {
               //set accstatus in account to active            
               $this->db->query("update account set accstatus='active', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
           } else if ($newamt >= 0.5) {
               //set accstatus in account to silver
               $this->db->query("update account set accstatus='silver', nodeweight=" . $newamt . " where userid=" . $this->session->userdata("userid"));
           }
   
   
           $query = "CALL reg_topuplend('" . $this->session->userdata("userid") . "','" . $bitcoinamount . "')";
           $this->db->query($query);
   
        $data = array('amountbtc', 'amountusd');
        $this->session->unset_userdata($data);
        $this->session->set_userdata("contractpurchase", 'lending');
        $subject = "Cryptowey - Lending Contract Acknowledgment";
        $messagebody .= "Hi,<br><br>";
        $messagebody = "Congratulations!!! <b>" . $this->session->userdata('username') .
                "</b> You have purchased the Bitcoin Lending Contract worth USD " . $dollaramount . ".<br>";
        $messagebody .= "Sit Back And Relax We Are Making You Gain The Best Benefits Out Of Your Investment.<br>";
        $messagebody .= "Request To Update Your User Profile.<br>";
        $messagebody .= "<br><br>_________________________________________________________<br><br>";
        $messagebody .= "Regards,<br>Cryptowey Team.";
        $messagebody .= "<br><br><i>Visit Us At <a href='http://www.cryptowey.com'>www.cryptowey.com</a></i>";
        $successmsg = "";
        $errmsg = "Some Issue in the Sending Acknowledgment. Please Raise a Ticket";
        $response = $this->GenericModel->sendEmail($this->session->userdata("emailid"), "Cryptowey", $subject, $messagebody, $successmsg, $errmsg);
   
        // $btc_amount = $this->AdminGenericModel->selectbitcoinwallet($this->session->userdata("userid"));
        //$lend_amount = $this->AdminGenericModel->selectlendingwallet($this->session->userdata("userid"));
         
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('message', 'Fail, Please Try Again');
            redirect(base_url() . "Lending");
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('sucessmessage', 'Amount Lended Successfully');
            redirect(base_url() . "Acknowledge");
        }
   }
public function checkamount1() {
    $uid = $this->session->userdata('userid');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $bitcoinamount = $request;
   //$bitcoinwallet1 = $this->AdminGenericModel->selectbitcoinwallet($uid);
     $get_wallate_amount=$this->db->query("select btc_balance from user_balances where userid='$uid'")->row();
     $bitcoinwallet=$get_wallate_amount->btc_balance;
    if ($bitcoinamount <= $bitcoinwallet) {
        $response = true;
    } else {
        $response = false;
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($response));
}

public function checkamount2() {
    
    $uid = $this->session->userdata('userid');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    //$bitcoinamount = $request;
      $new_width = (25 / 100) * $request->bitcoinamount;
      $usdamount1=$request->bitcoinamount-$new_width;
     
      $usdamount2=$usdamount1-$request->usdamount;
     
     $get_wallate_amount=$this->db->query("select cap_btc_balance from user_balances where userid='$uid'")->row();
     $bitcoinwallet=$get_wallate_amount->cap_btc_balance;
    if ($usdamount2 == $bitcoinwallet || $usdamount2 < $bitcoinwallet) {
       echo 1;
    } else {
       echo 0;
    }
}

public function btcTransfer()
{
 $balance=$this->input->post("balance");
$user_balances=$this->db->query("select btc_balance,lending_balance,cap_inr_balance from user_balances where userid='".$this->session->userdata("userid")."'")->row();
 $lending_balance=$user_balances->btc_balance+$balance;
 $update_users_balances=array('btc_balance'=>$lending_balance);
 $this->db->where('userid',$this->session->userdata("userid"));
 $update=$this->db->update('user_balances',$update_users_balances);
if($update)
{
 $update_users_balances1=array('cap_btc_balance'=>0);
 $this->db->where('userid',$this->session->userdata("userid"));
 $update=$this->db->update('user_balances',$update_users_balances1);
 echo 1;
}else{
 echo 2;
}

}
 public function acknowledge() {
     $data['template'] = 'acknowledge';
     $data['title'] = 'Lending Acknowledge';
     $this->admin_layout($data);
 }

 public function referal_lending_daily_income() {
    $data['template'] = 'direct_lending_daily_referral_income';
    $data['title'] = 'Daily Referral Income';
    $this->admin_layout($data);
}

public function daily_referal_income_show(){
    $list = $this->UserGenericModel->get_datatables();
 //    echo $this->db->last_query();
     //exit;
    $data = array();
    $no = $_POST['start']+1;
     
  /*  foreach ($list as $rows) {
        $row = array();
        $row[] = $no++;
        $row[] = $rows->totalamoount;
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
    }*/
	 foreach ($list as $rows) {
	   $row = array();	
        $row[] = $no++;
	   if($rows->status=='paid'){
        $row[] = '<b style="color:green;">+'.$rows->totalamoount.'</b>';
		}else{
		$row[] = '<b style="color:red">-'.$rows->totalamoount.'</b>';
		 }
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
    }
	 /*foreach ($list as $rows) {
	     $first_payout_sum='';
		 $scond_payout_sum='';
		 $payout_total='';
		$first_days=date('Y-m-01',strtotime($rows->created_date));
		$mid_days=date('Y-m-15',strtotime($rows->created_date));
	    $sixtin_days=date('Y-m-16',strtotime($rows->created_date));
	    $last_days=date('Y-m-t',strtotime($rows->created_date));
	   // $current_date=date('Y-m-d');
		$get_date=date('Y-m-d',strtotime($rows->created_date));
		$days=date('d',strtotime($rows->created_date));
		
		if(($get_date<=$first_days)  && ($get_date<=$mid_days)){
		$no++;
        $row = array();
        $row[] = $no;
        $row[] = '<b style="color:green">+'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }elseif(($get_date<=$sixtin_days) && ($get_date<=$last_days)){
	   $payout_total=$payout_total+$rows->totalamoount;
	   $no++;
	    $row = array();
        $row[] = $no;
        $row[] = '<b style="color:green">+'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }else{
	   $no++;
	   $row = array();	
        $row[] = $no;
        $row[] = '<b style="color:red">-'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }
    }*/
             $output = array("draw" => $_POST['draw'],
                          "recordsTotal" => $this->UserGenericModel->count_all(),
                          "recordsFiltered" => $this->UserGenericModel->count_filtered(),
                           "data" => $data,);
    //output to json format
    echo json_encode($output);
}

public function referal_lending_daily_income_test() {
    $data['template'] = 'direct_lending_daily_referral_income_test';
    $data['title'] = 'Daily Referral Income Test';
    $this->admin_layout($data);
}

public function daily_referal_income_show_test(){
    $list = $this->UserGenericModel->get_datatables();
    $data = array();
    $no = $_POST['start'];
     
    foreach ($list as $rows) {
	     $first_payout_sum='';
		 $scond_payout_sum='';
		 $payout_total='';
		$first_days=date('Y-m-01',strtotime($rows->created_date));
		$mid_days=date('Y-m-15',strtotime($rows->created_date));
	    $sixtin_days=date('Y-m-16',strtotime($rows->created_date));
	    $last_days=date('Y-m-t',strtotime($rows->created_date));
	   // $current_date=date('Y-m-d');
		$get_date=date('Y-m-d',strtotime($rows->created_date));
		$days=date('d',strtotime($rows->created_date));
		
		if(($get_date<=$first_days)  && ($get_date<$mid_days)){
		$no++;
		$payout_total=$payout_total+$rows->totalamoount;
        $row = array();
        $row[] = $no;
        $row[] = '<b style="color:green">+'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }elseif(($get_date<=$sixtin_days) && ($get_date<$last_days)){
	   $payout_total=$payout_total+$rows->totalamoount;
	   $no++;
	    $row = array();
        $row[] = $no;
        $row[] = '<b style="color:green">+'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }else{
	   $no++;
	   $row = array();	
        $row[] = $no;
        $row[] = '<b style="color:red">-'.$rows->totalamoount.'</b>';
        $row[] = date('d-m-Y',strtotime($rows->created_date));
        $data[] = $row;
	   }
    }
             $output = array("draw" => $_POST['draw'],
                          "recordsTotal" => $this->UserGenericModel->count_all(),
                          "recordsFiltered" => $this->UserGenericModel->count_filtered(),
                           "data" => $data,);
    //output to json format
    echo json_encode($output);
}

public function checkamount3() {
	
    $uid = $this->session->userdata('userid');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    //$bitcoinamount = $request;
     $new_width = (25 / 100) * $request->bitcoinamount;
     $usdamount1=$request->bitcoinamount-$new_width;
    
    // $usdamount2=$usdamount1-$request->usdamount;
    
    $get_wallate_amount=$this->db->query("select cap_btc_balance from user_balances where userid='$uid'")->row();
    $bitcoinwallet=$get_wallate_amount->cap_btc_balance;
    if ($usdamount1 == $bitcoinwallet || $usdamount1< $bitcoinwallet) {
       echo 1;
    } else {
       echo 0;
    }
 }
 public function individual_lending_payout_report() {
    $data['template'] = 'lending_history';
    $data['title'] = 'Lending History';
    $this->admin_layout($data);
}
public function mining_montly_payout_history(){
    $page =  $_GET['page'];
    $payout_reports = $this->AdminGenericModel->lending_montly_payout_history($page);
     $data='';
     if(count($payout_reports)>=1){
     //$st=explode('To',);

    $data.='<tbody>';
    foreach($payout_reports as $row){
             $strn=(explode(" To ",$row->month_half));
           $date =date('Y-m-d', strtotime('first day of this month'));
           $last_date=date('Y-m-d',strtotime($strn[1]));
           $current_date=date('Y-m-d',strtotime(date('Y-m-d')));
          if($last_date<=$current_date){
  $data.='<tr><td>'.$i.'</td><td>'.$row->month_half.'</td><td>'.$this->session->userdata("currency").'&nbsp;'.number_format($row->price_sum, 2, '.', '').'</td></tr>';
    $i++;
     }
 }
   $data.='</tbody>';
     }else{
         $data.=1;
         }
      echo $data;
    exit;
}
// update code date 15-05-2019
public function reinvested_slab_percentage_get(){
      $res = $this->site->oneusdtousrcurr();
      $to = $this->session->userdata('currency');
      $usdamount=$this->input->post('usdamount');
	  $investtype=$this->input->post('investtype');
	 if($investtype=='LendBTC'){
     $convertedamount=round($usdamount);
	 }else{
	 $convertedamount=round($usdamount/$res);
	 }
	 if($convertedamount>=10){
$get_data=$this->db->query("select slab_percentage,referral_percentage from lending_percentage where usd_amount_from <= '".$convertedamount."' and usd_amount_to >= '".$convertedamount."' and status='".$investtype."'")->row();
	 $slabe_per=$get_data->slab_percentage;
	   $data=array('slab_percentage'=>$get_data->slab_percentage,'referral_percentage'=>$get_data->referral_percentage);
       echo json_encode($data);
       exit;
	  }else{
	  echo 0;
	  exit;
	}         
}
public function checkwithdraworder(){

	$getcontraact=$this->db->query("select lending_percent,referral_percentage from lendingcontract where userid='".$this->session->userdata("userid")."' && status='Active'");
	$avgArray=[];
	$i=0;
	foreach ($getcontraact->result() as $row)
		{	
        $avgArray[$i]=$row->lending_percent;
		$i++;		
		}
	echo $percentage= round(array_sum($avgArray)/count($avgArray),2)."sep".count($avgArray);
   }
}
