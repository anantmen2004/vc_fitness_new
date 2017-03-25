<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('helper_model');
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
	public function rgisterView()
	{
		$this->load->view('register/registration');
	}
    public function loginView($itemId = "",$from="")
    {
        $data['itemId'] = $itemId;
        $data['from'] = $from;
        $this->load->view('register/login',$data);
    }
    public function verifyUser()    // verifiaction at the time of registration
    { 
        $tableName = CUSTOMER_TABLE;
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $fields = array(
                        'email' => strtolower($email),
                        'telephone' => $mobile
                    );
        $userExist = $this->helper_model->select("",$tableName, $fields);
        if($userExist)
        {
            echo 0;
        }
        else
        {
            $otp = rand(1000,9999);
            $session_data = array(
                    'mobile' => $mobile,
                    'otp' => $otp
                );
            $this->session->set_userdata($session_data); 
            echo $otp;
        }

    } 
    public function verifyRegOtp()
    {
        $userOtp = $this->input->post('otp');
        $userMobile = $this->input->post('mobile');

        $sysMob = $this->session->userdata('mobile');
        $sysOtp = $this->session->userdata('otp');
        if($userMobile == $sysMob && $userOtp == $sysOtp)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
	public function registerUser()
    { 
        //$data = $this->input->post();
        // print_r($data);exit;
        @$email = $this->input->post('email');
        @$password = $this->input->post('password');
        @$mobile = $this->input->post('mobile');
        @$packageType = $this->input->post('packageType');
        @$packagePrice = $this->input->post('packagePrice');
        @$regWorkout = $this->input->post('regWorkout');
        @$gender = $this->input->post('gender');
        @$fname = $this->input->post('fname');
        @$lname = $this->input->post('lname');
        @$city = $this->input->post('city');
        @$country = $this->input->post('country');
        @$add = $this->input->post('address');
        @$mobile2 = $this->input->post('mobile2');
        $otp = rand(1000,9999);
        $tableName = CUSTOMER_TABLE;
        $tableName1 = ADDRESS_TABLE;
        if(!empty($email) && !empty($mobile))
        {
	        $fields = array(
	                    'email' => strtolower($email),
	                    'telephone' => $mobile
	                );
        	$userExist = $this->helper_model->select("",$tableName, $fields);
            if($userExist)
            {
                echo 0;
            }
            else
            {
                $fields = array(
                        'email' => strtolower($email),
                        'telephone' => $mobile,
                        'password' => sha1($password),
                        'firstname' => $fname,
                        'lastname' => $lname,
                        'telephone2' => $mobile2,
                        'package_id' => $packageType,
                        'reg_workout' => $regWorkout,
                        'gender' => $regWorkout
                    );
                //print_r($fields);exit;
                $userInserId = $this->helper_model->insert($tableName, $fields);
                if($userInserId){
                    $addressFields = array(
                        'customer_id' => $userInserId,
                        'firstname' => $fname,
                        'lastname' => $lname,
                        'address_1' => $add,
                        'city' => $city,
                        'country_id' => $country
                    );
                $addressId = $this->helper_model->insert($tableName1, $addressFields); 
                    if($addressId)
                    {
                        $data = array(
                            'address_id' => $addressId
                        );
                         $updateId = array(
                            'customer_id' => $userInserId
                        );
                        $updateId = $this->helper_model->update($tableName,$data,$updateId);
                        if($updateId)
                        {
                           echo 1;
                        }
                        else
                        {
                            echo 0;
                        }
                    }
                    else{
                        echo 0;
                    }
                }else{
                    echo 0;
                }
            }
        }else{
            echo 2;
        }        
    }
    /********/
    public function loginAction()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $rememberMe = $this->input->post('rememberMe');
        
        $tableName = CUSTOMER_TABLE;
        $fields = array(
                    'email' => strtolower($email),
                    'password' => sha1($password)
                );
        //print_r($fields);exit();
        $userExist = $this->helper_model->select('',$tableName, $fields);
        
        if($userExist){ 
                $condition = array('customer_id' => $userExist[0]['customer_id']);
                $proCount = $this->helper_model->get_cnt('oc_customer_wishlist',$condition);

                $session_data = array(
                    'customer_id' => $userExist[0]['customer_id'],
                    'firstname' => $userExist[0]['firstname'],
                    'lastname' => $userExist[0]['lastname'],
                    'wishCount' => $proCount
                    );
                $this->session->set_userdata($session_data);
            echo 1;          
        }else{
            echo 0;
        }    
    }
    /**************/
    public function forgotPassView()
    {
        $this->load->view('register/forgotPass');
    }
    public function verifyUsername()
    {
        $email = $this->input->post('email');

        $tableName = CUSTOMER_TABLE;
            $fields = array(
                'email' => strtolower($email)
            );

            $userExist = $this->helper_model->select('',$tableName, $fields);
            if($userExist){ 
            // print_r($userExist[0]['customer_id']);exit;
                $id = $userExist[0]['customer_id'];
                $otp = rand(1000,9999);

                $name = $userExist[0]['firstname'];

                $config['mailtype'] = 'html';
                $this->email->initialize($config);


                $email_body ='<div style="background:#fff; border: 1px solid #b3b3b3; height:auto; width:650;">';
                $email_body .='<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">';
                $email_body .='<img src="'.base_url().'public/images/logo.png" style="align:center; height:150px width: 200px;" />';
                $email_body .='</div>';
                $email_body .='<br/>';
                $email_body .='<div>';
                $email_body .='<div style="background:#d9d9d9; padding:30px">';
                $email_body .= "<b>Dear ".$name."</b>";
                $email_body .='<br/>';
                $email_body .='<br/>';
                $email_body .= "<span><b>Your OTP is </b></span>".$otp;
                $email_body .='<br/>';
                $email_body .= "<span><b>Please enter your OTP and reset Your password </b></span>";
                $email_body .='<br/>';
                
                $email_body .='</div>';
                $email_body .='</div>';
                $email_body .='</div>';

                $this->load->library('email');
                $this->email->from('info@vinodchanna.com');
                //print_r($email_body);exit();
                $this->email->to($email);
                $this->email->subject("OTP For Change Password");
                $this->email->message($email_body);
                // if(!$this->email->send())
                // {
                //     echo 0;
                // }
                // else
                // {
                    $data = array(
                            'forgot_pass_otp' => $otp
                        );
                    $fields = array(
                            'customer_id' => $id
                        );
                    
                    $ans = $this->helper_model->update($tableName,$data,$fields);
                    echo $id;
                //}
        }else{
            echo 2;
        } 
    }
    /************/
    public function forgotPassOtp($id)
    {
        // print_r($id);exit;
        $data['customer_id'] = $id;
        $this->load->view('register/forgotPassOtp',$data);
    }
    //////////////////
    public function verifyPassOtp()
    {
        $tableName = CUSTOMER_TABLE;
        $otp = $this->input->post('otp');
        $id = $this->input->post('customer_id');
        $fields = array(
            'customer_id' => $id
        );
        $otpExist = $this->helper_model->select('forgot_pass_otp',$tableName, $fields);
        if($otpExist[0]['forgot_pass_otp'] == $otp)
        {
            echo $id;
        }
        else
        {
            echo 0;
        }
    }
    ////////////
    public function resetPassword($id)
    {
        $data['customer_id'] = $id;
        $this->load->view('register/resetPass',$data);
    }
    public function updatePassword()
    {
        $tableName = CUSTOMER_TABLE;
        $password = $this->input->post('password');
        $customer_id = $this->input->post('customer_id');
        $data = array(
                    'password' => sha1($password)
                );
        $fields = array(
                'customer_id' => $customer_id
            );
        //print_r($fields);exit;
        $resp = $this->helper_model->update($tableName,$data,$fields);
        echo $resp;
    }


	/*******************************/
}