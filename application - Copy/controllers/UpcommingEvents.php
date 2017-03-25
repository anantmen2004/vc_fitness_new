<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpcommingEvents extends CI_Controller {

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
		
		//echo "<pre>";print_r($data['menu_cat']);exit;
		$data['page'] = "index";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/upcomming_events');
		$this->load->view('templates/footer');
	}
}