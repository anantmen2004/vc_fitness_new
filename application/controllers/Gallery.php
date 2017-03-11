 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Helper_model');
        $this->load->model('Packages_model');
        $this->load->model('Product_model');
        $this->load->model('Gallery_model');

        $this->data['menu_programs'] = $this->Helper_model->selectAll("","oc_program_master");
		$this->data['menu_trainings'] = $this->Helper_model->selectAll("","oc_training_type");
		$this->data['menu_packages'] = $this->Packages_model->getAllPackages(1);
		$this->data['menu_cat'] = $this->Product_model->selectCategory();
		$this->data['menu_product'] = $this->Product_model->selectNewproducForMenu();
		$this->data['customer_id'] = $this->session->userdata('customer_id');
    }

	public function index($type_id="")
	{
		$data = $this->data;

		$data['gallery'] = $this->Gallery_model->selectAllgallery($type_id);
		$data['gallery_type'] = $this->Helper_model->selectallOrder("","oc_gallery_type","name","ASC");
		$data['page'] = "gallerypage";
		$this->load->view('templates/header',$data);
		$this->load->view('pages/gallery',$data);
		$this->load->view('templates/footer');
	}
	public function addGalleryLike($galleryId = "",$postLoginLike="")
	{
		$customer_id = $this->session->userdata('customer_id');
		if($customer_id){

			$check = $this->Gallery_model->select($customer_id,$galleryId);
			if(!empty($check[0]['gallery_likes_id']))
			{
				if($postLoginLike == "postLoginLike")
				{
					//print_r(123);exit;
				}else{ //print_r(321);exit;
				$value = $check[0]['gallery_likes_id'];
				$this->Helper_model->delete("oc_gallery_likes","gallery_likes_id",$value);
				echo 0;
				}
			}
			else{
				$data = array(
					'customer_id' => $customer_id,
					'gallery_id'  => $galleryId
				);
				$this->Helper_model->insert('oc_gallery_likes',$data);
				echo 1;
			}
		}
	}




	////////////
}