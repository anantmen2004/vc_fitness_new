<?php 
	class Myclass{
		public $CI="";

		public function __construct()	
		{
			$this->CI=& get_instance();
			// pre ($this->CI);
		}

		public function get_brand()
		{
			// echo 1111;
			$this->CI->load->model('client/client_model');
			return $this->CI->client_model->brand();
			// pre($record);
		} 
		////////////////
		public function get_category()
		{
			// echo 1111;
			$this->CI->load->model('client/client_model');
			return $this->CI->client_model->category();
			// pre($record);
		} 	
		////////////////////
		public function get_subcategory($ans)
		{
			$this->CI->load->model('client/client_model');
			return $this->CI->client_model->get_subcategory($ans);
		}

		public function get_all_products($catId)
		{
			$this->CI->load->model('common');
			return $this->CI->client_model->productView($catId);
		}

		public function get_wishlist_products()
		{
			$uid=$this->CI->session->userdata('uid');
			echo $uid;
			$this->CI->load->model('client/client_model');
			$pid=$this->CI->client_model->get_wishlist_pid($uid);
			pre($pid);

			if(count($pid)>0)
			{
				return $pid;
			}
			else
			{
				return 0;
			}
		}


		/////////////////////////////////////////////////////////




		



	}
 ?>

