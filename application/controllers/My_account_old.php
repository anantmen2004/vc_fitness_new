<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
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
	public function index()
	{
		$data = $this->data;

		$cust=$data['customer_id'];
		
		if($data['customer_id'])
		{
			$data['page'] = "";
			$tableName='oc_customer cust, oc_address addrs';
			$select='cust.customer_id,cust.firstname as fname,cust.lastname as lname ,cust.email,cust.telephone,cust.telephone2,cust.fax, addrs.*';
			$where='cust.customer_id=addrs.customer_id AND cust.customer_id='.$cust;
			$data['userData']=$this->Helper_model->select($select, $tableName, $where);

			$tableName1='oc_order o, oc_order_history oh, oc_order_status os';
			$select1='o.*, os.name as status';
			$where1='o.order_id = oh.order_id AND o.order_id = os.order_status_id AND o.customer_id='.$data['customer_id'];
			$order_id = 'o.date_added';
			$order = 'DESC';
			
			$data['myOrders']=$this->Helper_model->selectallWhereOrder($select1, $tableName1, $where1, $order_id,$order);

		// Package details 
			$packages=$this->Packages_model->getPackageType($cust);

			$training = array();
			$data['result']=array();	
			$data['packdata']= array();
			$videoinfo = array();
			$data['video']=array();
			$data['trainarr']= array();
			$data['call_data']=array();

		foreach ($packages as $key => $value2) 
		{
			$data['packdata']= $packages;
			
		   $calls = $this->Packages_model->getCallno($value2['package_id'],$cust);
		   array_push($data['call_data'], $calls);
		
		  	
				
			$training_data=$this->Packages_model->getTrainingType($value2['package_id']);
			array_push($data['trainarr'], $training_data);

			$data1['packageinfo'] = array();
			foreach ($training_data as $key1 => $value1) 
			{
				$video_data=$this->Packages_model->getVideoType($value1['training_id']);
				array_push($data1['packageinfo'], $video_data);
			}
				
			array_push($data['video'], $data1['packageinfo']);
		}

		/************************************/
		 //pakage history
		 $packagehistory=$this->Packages_model->getHistory($cust);

		 	$data['packhistory']= array();
			$data['video1']=array();
			$data['trainarr1']= array();
			$data['callnumber1']=array();
			$data['call4']=array();
		    $data['call3']=array();

			foreach ($packagehistory as $key => $value2) 
			{
			$data['packhistory']= $packagehistory;
			
		    $callstatus=$this->Packages_model->getCallno($value2['package_id'],$cust);
		    array_push($data['callnumber1'], $callstatus);

		    $select = '*';
    		$tableName = 'oc_call_schedule';
    		$where = array('customer_id' => $cust,'package_id' => $value2['package_id']);
   	 		$call1 = $this->Helper_model->select($select, $tableName, $where);
		 	array_push($data['call3'], $call1);
		   
			$training_data=$this->Packages_model->getTrainingType($value2['package_id']);
			array_push($data['trainarr1'], $training_data);

			$data1['packageinfo1'] = array();
			foreach ($training_data as $key1 => $value1) 
			{
				$video_data=$this->Packages_model->getVideoType($value1['training_id']);
				array_push($data1['packageinfo1'], $video_data);
			}
				
			array_push($data['video1'], $data1['packageinfo1']);
		}
		 array_push($data['call4'], $data['call3']);
		 //echo "<pre>"; print_r($data['call4']); exit();
		 //history end
		/**********************/
			$condition = array('customer_id' => $data['customer_id']);
			$product_id = $this->Helper_model->select('product_id','oc_customer_wishlist',$condition);
			$data['wishlist'] = array();
			foreach ($product_id as $key => $value) 
			{
				$data['wishlist'][$key] = $this->Product_model->selectSingelProduct($value['product_id']);
			}

			//echo "<pre>";print_r($data['call_data']); exit();

			$this->load->view('templates/header',$data);
			$this->load->view('myAccount/my_account');
			$this->load->view('templates/footer');
		}
	}


	public function updateBasicInfo()
	{
		$formData = $this->input->post();
        $fields = array(
                'customer_id' => $formData['customer_id']
            );
        unset($formData['customer_id']);
        $resp = $this->Helper_model->update("oc_customer",$formData,$fields);
        echo $resp;
	}
	public function updateAddressinfo()
	{
		$formData = $this->input->post();
		//print_r($formData);exit;
        
        $fields = array(
                'address_id' => $formData['address_id']
            );
        unset($formData['address_id']);
        //print_r($formData);exit;
        $resp = $this->Helper_model->update("oc_address",$formData,$fields);
        echo $resp;
	}
	public function myOrders($order_id)
	{
		$data = $this->data;
		
		//echo "<pre>";print_r($data['customer_id']);exit;
		if($data['customer_id'])
		{
			$data['page'] = "";
			$id =$data['customer_id'];
			$tableName1='oc_order o, oc_order_product op, oc_product pro,oc_product_description pro_desc, oc_order_history oh, oc_order_status os';
			$select1='o.*, o.total as order_total,op.*, os.name as status,pro.image, pro_desc.meta_title';
			$where1='o.order_id=op.order_id AND o.order_id = oh.order_id AND o.order_id = os.order_status_id AND op.product_id = pro.product_id AND op.product_id = pro_desc.product_id AND o.customer_id= '.$id.' AND o.order_id='.$order_id;
			$data['myOrders']=$this->Helper_model->select($select1, $tableName1, $where1);

			//echo "<pre>";print_r($data['myOrders']);exit;
			$this->load->view('templates/header',$data);
			$this->load->view('myAccount/order_history');
			$this->load->view('templates/footer');
		}
	}
	public function order_return($order_id)
	{
		$data = $this->data;
		if($data['customer_id'])
		{
			$data['page'] = "";
			$id =$data['customer_id'];
			$tableName1='oc_order o, oc_order_product op, oc_order_history oh, oc_order_status os';
			$select1='o.*, o.total as order_total,op.*, os.name as status';
			$where1='o.order_id=op.order_id AND o.order_id = oh.order_id AND o.order_id = os.order_status_id AND o.customer_id= '.$id.' AND o.order_id='.$order_id;
			$data['myOrders']=$this->Helper_model->select($select1, $tableName1, $where1);

			//echo "<pre>";print_r($data['myOrders']);exit;
			$this->load->view('templates/header',$data);
			$this->load->view('myAccount/product_return');
			$this->load->view('templates/footer'); 
		}
	}

	public function insert_return_order()
	{
		$formData = $this->input->post();
		//print_r($formData);exit;
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$date =  $date->format( 'Y-m-d H:i:s');
		$data = array(
				'customer_id' => $formData['customer_id'],
				'firstname' => $formData['firstname'],
				'lastname' => $formData['lastname'], 
				'email' => $formData['email'],
				'telephone' => $formData['telephone'],
				'order_id' => $formData['order_id'],
				'product_id' => $formData['product_id'],
				'date_added' => date("Y-m-d",strtotime($formData['date_ordered'])),
				'product' => $formData['product'],
				'model' => $formData['model'],
				'quantity' => $formData['quantity'],
				'opened' => $formData['opened'],
				'comment' => $formData['comment'],
				'return_reason_id' => $formData['return_reason_id'],
				'date_modified' => $date
				);
			//print_r($data);exit;
			$insertId = $this->Product_model->insert('oc_return',$data);
			//print_r($insertId);exit;
			if (!empty($insertId)) {
				echo $insertId;
			}
	}

	public function order_return_success()
	{
		$data = $this->data;
		$data['page'] = "";
		//echo "<pre>";print_r($data['myOrders']);exit;
		$this->load->view('templates/header',$data);
		$this->load->view('myAccount/order_return_success');
		$this->load->view('templates/footer'); 
	}

	public function videocall()
	{
		$data = $this->data;
		$cust=$data['customer_id'];

		$formData = $this->input->post();
		//echo "<pre>"; print_r($formData); exit();

		$packageid=$formData['package_id'];
		$date=$formData['date1'];
		$hour=$formData['hour'];
		$minute=$formData['minute'];
		$pm=$formData['pm'];
		$callstatus=$formData['call_status'];
		$packcall=$formData['packcall'];
		$package_call=$formData['package_call'];

		$tableName ='oc_call_schedule';

		foreach ($packcall as $key => $value) 
		{
			if(!empty($date[$key]))
			{
				$callcheck = array();
				$select = '*';
    			$tableName = 'oc_call_schedule';
    			$where = array('customer_id' => $cust,'package_id' => $packageid, 'call_no' => $value);
   	 			$callcheck = $this->Helper_model->select($select, $tableName, $where);
  
// print_r($callcheck);
   	 			if(empty($callcheck))
   	 			{
   	 				//echo "date";
					$call=array(
					'customer_id' => $cust,
					'package_id' => $packageid,
					'date' => date("Y-m-d",strtotime($date[$key])),
					'time' => $hour[$key].':'.$minute[$key].' '.$pm[$key], 
					'status' => $callstatus[$key],
					'complete_status' => 0,
					'call_no' => $value,
					'added_on' => date("Y-m-d h:i:s")
				);
					//echo "date";print_r($call);exit;
					$callid=$this->Helper_model->insert($tableName, $call);
					$callcheck = array();
					if(!empty($callid))
					{
						//echo 1;
						//send_call_schedule_mail($call);
					}
				}
				else
				{
					//echo "update";
					if($callcheck[0]['complete_status'] !=1)
					{
						$call=array(
						'date' => date("Y-m-d",strtotime($date[$key])),
						'time' => $hour[$key].':'.$minute[$key].' '.$pm[$key], 
						'status' => $callstatus[$key],
						'updated_on' => date("Y-m-d h:i:s")
						);

						$where=array(
							'customer_id' => $cust,
							'package_id' => $packageid,
							'call_no' => $value
							);
						//echo "update";print_r($call);print_r($where);;exit;
						$updateid=$this->Helper_model->update($tableName,$call,$where);
						if(!empty($updateid))
						{
							//echo 2;
							//send_call_schedule_mail($where);
						}
					}
					$callcheck = array();
				} 
			}
		}
	}
	/*****************************************/
	public function send_call_schedule_mail($call)
	{

		print_r($call);
		
  //       $config['mailtype'] = 'html';
  //   	$this->email->initialize($config);

		// $email_body ='<div style="background:#fff; border: 1px solid #b3b3b3; height:auto; width:650;">';
		// $email_body .='<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">';
		// $email_body .='<img src="'.base_url().'public/images/logo.png" style="align:center; height:150px width: 200px;" />';
		// $email_body .='</div>';
		// $email_body .='<br/>';		
		// $email_body .='<div>';
		// $email_body .='<div style="background:#d9d9d9; padding:30px">';
		// $email_body .= "<b>Hello Sir/Madam,</b>";
		// $email_body .='<br/>';
		// $email_body .='Following Call have been Scheduled Now';
		// $email_body .='<br/>';
  //       $email_body .='<br/>';
  //       $email_body .= "<span><b>Login Details:</b></span>";
  //       $email_body .='<br/>';
  //       $email_body .= "<span><b>Login :</b></span>".$email;
  //       $email_body .='<br/>';
  //       $email_body .= "<span><b>Password :</b></span>".$password;
  //       $email_body .='<br/>';
  //       $email_body .='<br/>';
        
  //       $email_body .='</div>';
  //       $email_body .='</div>';
  //       $email_body .='</div>';
      
  //       //print_r($email_body);exit();
		// $this->load->library('email');
		// $this->email->from("dhanuping@noreply.net");
		// //print_r($email_body);exit();
		// $this->email->to("dhananjaypingale2112@gmail.com");
		
		// $this->email->subject("Call Schedulling Request");
		// $this->email->message($email_body);
		// if(!$this->email->send())
		// {
		// 	echo 0;
		// }
		// else
		// {
		// echo 1;
		// }
	}

/*************************************************/	
}