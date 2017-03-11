<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Helper_model');
        $this->load->model('Packages_model');
        $this->load->model('Product_model');

        $this->data['menu_programs'] = $this->Helper_model->selectAll("","oc_program_master");
		$this->data['menu_trainings'] = $this->Helper_model->selectAll("","oc_training_type");
		$this->data['menu_packages'] = $this->Packages_model->getAllPackages(1);
		$this->data['menu_cat'] = $this->Product_model->selectCategory();
		$this->data['menu_product'] = $this->Product_model->selectNewproducForMenu();
		$this->data['customer_id'] = $this->session->userdata('customer_id');
    }

	public function contactUsView()
	{
		$data = $this->data;

		$data['page'] = "contactpage";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/contactUs');
		$this->load->view('templates/footer');	
	}
	public function sendContactUsEmail()
	{
		$formData = $this->input->post();

		@$name = $formData['txtname'];
		@$email = $formData['txtemail'];
		@$subject = $formData['cmbsubject'];
		@$message = $formData['txtmessage'];
		// print_r($formData);exit;
           
        $config['mailtype'] = 'html';
        $this->email->initialize($config);


        $email_body ='<div style="background:#fff; border: 1px solid #b3b3b3; height:auto; width:650;">';
        $email_body .='<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">';
        $email_body .='<img src="'.base_url().'public/images/logo.png" style="align:center; height:150px width: 200px;" />';
        $email_body .='</div>';
        $email_body .='<br/>';
        $email_body .='<div>';
        $email_body .='<div style="background:#d9d9d9; padding:30px">';
        $email_body .= "<b>Dear Sir/madam,</b>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Following Details are capture from website</b></span>";
        $email_body .='<br/>';
        $email_body .='<br/>';
        $email_body .= "<span><b>Name : ".$name."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Sender Email : ".$email."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Subject : ".$subject."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Message : ".$message."</b></span>";
        $email_body .='<br/>';
        
        $email_body .='</div>';
        $email_body .='</div>';
        $email_body .='</div>';
        $this->load->library('email');
        $this->email->from($email);
        $this->email->to("dhananjaypingale2112@gmail.com");
        $this->email->subject("Contacts From website");
        $this->email->message($email_body);

        $timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$date =  $date->format( 'Y-m-d');

        if(!$this->email->send())
        {
            echo 0;
        }
        else
        {
            $data = array(
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'date_added' =>$date,
                );
            //print_r($data);exit;
            $ans = $this->Helper_model->insert("oc_contact_us",$data);
            echo $ans;
        }

}

/****************/



/*************************/
}