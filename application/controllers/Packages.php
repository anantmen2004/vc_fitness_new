<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

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
	public function packagesView()
	{
		$data = $this->data;
		
		$data['packages'] = $this->Packages_model->getAllPackages(1);
		$data['packagetrain']=array();

		foreach ($data['packages'] as $key => $value) 
		{
			$data['trainingname']=$this->Packages_model->getAllTraining($value['package_id']);
			array_push($data['packagetrain'],$data['trainingname']);
		}

		$data['optional_packages'] = $this->Packages_model->getAllPackages(2);
		$data['page'] = "packagespage";
		$this->load->view('templates/header',$data);
		$this->load->view('packages/packagesView',$data);
		$this->load->view('templates/footer');
	}
	public function custPackagesView($packageId)
	{
		$data = $this->data;
		if($data['customer_id'])
		{
			$firstname = $this->session->userdata('firstname');
			$lastname = $this->session->userdata('lastname');
			$where = array('package_id' => $packageId);
			$data['package'] = $this->Helper_model->select("","oc_package_master",$where);
			$data['name'] = "$firstname  $lastname";
			//echo "<pre>";print_r($data);exit;
			$data['page'] = "packagespage";
			$this->load->view('templates/header',$data);
			$this->load->view('packages/custPackagesView',$data);
			$this->load->view('templates/footer');
		}
		else
        {
            redirect(base_url('auth/loginView'));
        }
	}
	public function get_packageEndDate()
	{
		$startDate = $this->input->post('strat_date');
		$duration = $this->input->post('duration');
		$endDate = date('d-m-Y', strtotime("+$duration months", strtotime($startDate)));
		echo $endDate;
	}
	public function confirmPackage()
	{
		$data = $this->data;
		if($data['customer_id'])
		{
			$formData = $this->input->post();
			$where = array(
				'package_id'=> $formData['package_id'],
				'customer_id'=> $formData['package_customer_id'],
				'status'=> 0
				);
			$check_packdata= $this->Helper_model->select("","oc_package_customer_master",$where);
			if(empty($check_packdata)){

				$condition = array(
					'package_id'=> $formData['package_id']
				);
				if($formData['package_duration']== "1 months")
				{
					$select = "package_amount";
				}
				else if($formData['package_duration']== "3 months")
				{
					$select = "package_3m_amount";
				}
				else if($formData['package_duration']== "6 months")
				{
					$select = "package_6m_amount";
				}
				else if($formData['package_duration']== "12 months")
				{
					$select = "package_1y_amount";
				}

				$check_pack_amt= $this->Helper_model->select($select,"oc_package_master",$condition);
				if($check_pack_amt)
				{
					$amount= $check_pack_amt[0][$select];
				}
				else 
				{
					$amount= "";
				}
				
				//echo "<pre>";print_r($amount);exit;
				$timezone = new DateTimeZone("Asia/Kolkata" );
				$date = new DateTime();
				$date->setTimezone($timezone );
				$date =  $date->format( 'Y-m-d H:i:s');

				$data = array(
					'package_id'=> $formData['package_id'],
					'customer_id'=> $formData['package_customer_id'],
					'duration' => $formData['package_duration'],
					'amount' => $amount,
					'start_date'=> date('Y-m-d',strtotime($formData['package_stratDate'])),
					'end_date'=> date('Y-m-d',strtotime($formData['package_endDate'])),
					'comment'=> $formData['package_comment'],
					'date_added'=> $date
					);
				$result = 1;//$this->Helper_model->insert('oc_package_customer_master',$data);
				if(!empty($result))
				{
					// echo 1;
					$this->send_package_mail_to_client($data);
					$this->send_package_mail_to_admin($data);
					echo 1;
				}
			}
			else
			{
				echo 2;
			}
		}
		else
        {
            redirect(base_url('auth/loginView'));
        }
	}
	/**********************/
	public function send_package_mail_to_client($pack)
    {
    	$firstname = $this->session->userdata('firstname');
		$lastname = $this->session->userdata('lastname');
		$customer_id = $this->session->userdata('customer_id');

		$where = array('package_id' => $pack['package_id']);
		$package = $this->Helper_model->select("","oc_package_master",$where);

		$where1 = array('customer_id' => $customer_id, );
        $email = $this->Helper_model->select('email','oc_customer', $where1);
		//print_r($package);exit();
		$name = "$firstname  $lastname";

        $config['mailtype'] = 'html';
        $this->email->initialize($config);
		//print_r($package);exit();

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
        $email_body .= "<span><b>Thank you for subscription of package.</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package details are as follow :</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Name:".$package[0]['package_name']."</b></span>";
        $email_body .='<br/>';
        //print_r($email_body);exit();
        $email_body .= "<span><b>Package Name:".$pack['duration']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Package amount:".$pack['amount']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Start Date:".$pack['start_date']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package End Date:".$pack['end_date']."</b></span>";
        $email_body .='<br/>';
        
        
        $email_body .='</div>';
        $email_body .='</div>';
        $email_body .='</div>';

        $this->load->library('email');
        $this->email->from('info@vinodchanna.com');
        // print_r($email[0]['email']);exit();
        $email = $email[0]['email'];
        $this->email->to($email);
        $this->email->subject("Package subscription");
        $this->email->message($email_body);
        if(!$this->email->send())
        {
            echo 0;
        }
        else
        {
        	echo 1;
        }   
    }
    /*******************/
    public function send_package_mail_to_admin($pack)
    {
    	$firstname = $this->session->userdata('firstname');
		$lastname = $this->session->userdata('lastname');
		$customer_id = $this->session->userdata('customer_id');

		$where = array('package_id' => $pack['package_id']);
		$package = $this->Helper_model->select("","oc_package_master",$where);

		$where1 = array('customer_id' => $customer_id, );
        $customerData = $this->Helper_model->select('email,telephone','oc_customer', $where1);
        $mobile = $customerData[0]['telephone'];
        $email = $customerData[0]['email'];
		//print_r($email);exit();
		$name = "$firstname  $lastname";

        $config['mailtype'] = 'html';
        $this->email->initialize($config);
		//print_r($package);exit();

        $email_body ='<div style="background:#fff; border: 1px solid #b3b3b3; height:auto; width:650;">';
        $email_body .='<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">';
        $email_body .='<img src="'.base_url().'public/images/logo.png" style="align:center; height:150px width: 200px;" />';
        $email_body .='</div>';
        $email_body .='<br/>';
        $email_body .='<div>';
        $email_body .='<div style="background:#d9d9d9; padding:30px">';
        $email_body .= "<b>Dear Sir/Madam</b>";
        $email_body .='<br/>';
        $email_body .='<br/>';
        $email_body .= "<span><b>Following Packages has been subscribed From our sites.</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package details are as follow :</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Customer Name:".$name."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Email:".$email."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Mobile:".$mobile."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Name:".$package[0]['package_name']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Name:".$pack['duration']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Package amount:".$pack['amount']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package Start Date:".$pack['start_date']."</b></span>";
        $email_body .='<br/>';
        $email_body .= "<span><b>Package End Date:".$pack['end_date']."</b></span>";
        $email_body .='<br/>';
        
        
        $email_body .='</div>';
        $email_body .='</div>';
        $email_body .='</div>';

        //print_r($email_body);exit();

        $this->load->library('email');
        $this->email->from('info@vinodchanna.com');
        // print_r($email[0]['email']);exit();
        $this->email->to("dhananjaypingale2112@gmail.com");
        $this->email->subject("Package subscription");
        $this->email->message($email_body);
        if(!$this->email->send())
        {
            echo 0;
        }
        else
        {
        	echo 1;
        } 
    }
	/**********************/
	public function packagesPayment()
	{
		$data = $this->data;
		
		$data['page'] = "packagespage";
		$this->load->view('templates/header',$data);
		$this->load->view('packages/packagePayment');
		$this->load->view('templates/footer');
	}

	public function packagesname($id)
	{
		$data['pkname']=$this->Packages_model->getsinglePackage($id);
		echo json_encode($data);
	}
}