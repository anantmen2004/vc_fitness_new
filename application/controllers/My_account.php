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
		//echo "<pre>";print_r($cust);exit;
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
			//echo "<pre>";print_r($select1);print_r($tableName1);print_r($where1);exit;
			$data['myOrders']=$this->Helper_model->selectallWhereOrder($select1, $tableName1, $where1, $order_id,$order);

			$query="SELECT  m.package_id, m.package_name,m.package_details, v.video_id, v.video_name, v.video_path, t.training_id, t.training_name, pc.duration,pc.customer_id FROM oc_package_training_video_master p,oc_training_type t, oc_package_master m,oc_video_master v, oc_package_customer_master pc WHERE m.package_id = pc.package_id AND m.package_id = p.package_id AND p.training_id = t.training_id AND p.video_id = v.video_id AND pc.customer_id =".$cust;
			echo $query;exit;

			$data['packageinfo']=$this->Helper_model->selectQuery($query);

			echo "<pre>";print_r($data['packageinfo']);
			foreach ($data['packageinfo'] as $key => $value) {
				# code...




			}


			exit;

			// $query="SELECT pc.package_id, p.package_name, p.package_details, pc.duration from oc_package_customer_master pc, oc_package_master p where pc.package_id = p.package_id AND pc.customer_id=".$cust;
			// $data['packagename']=$this->Helper_model->selectQuery($query);

			// $data['training']=array();
			// $data['videonamepath']=array();

			// foreach ($data['packagename'] as $key => $value) 
			// {
			// 	$train="SELECT DISTINCT t.training_id, t.training_name,ptv.package_id from oc_training_type t, oc_package_training_video_master ptv where t.training_id = ptv.training_id AND ptv.package_id = ".$value['package_id'];
			// 	$data['trainname']=$this->Helper_model->selectQuery($train);
			// 	array_push($data['training'], $data['trainname']);

			// 	foreach ($data['training'] as $key1 => $value1) 
			// 	{
			// 		$video="SELECT v.video_id, v.video_path, v.video_name, ptv.training_id, ptv.package_id from oc_video_master v, oc_package_training_video_master ptv where v.video_id = ptv.video_id AND ptv.training_id= ".$value1[$key1]['training_id']." AND ptv.package_id=" .$value1[$key1]['package_id'];
				
			// 		$data['videoinfo']=$this->Helper_model->selectQuery($video);
			// 		array_push($data['videonamepath'], $data['videoinfo']);
			// 	}
			// }
			// echo "<pre>";
			// print_r($data['videonamepath']);
			// exit();
			
			// echo "<pre>";print_r($data['packagename']);exit;

			$condition = array('customer_id' => $data['customer_id']);
			$product_id = $this->Helper_model->select('product_id','oc_customer_wishlist',$condition);
			$data['wishlist'] = array();
			foreach ($product_id as $key => $value) {
				$data['wishlist'][$key] = $this->Product_model->selectSingelProduct($value['product_id']);
			}
			//echo "<pre>";print_r($data['myOrders']);exit;
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
	
/*************************************************/	
}