<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
	public function productView($catId="",$pageno = "")
	{
		$data = $this->data;
		$data['cat'] = $this->Product_model->selectCategory();
		 
		if(empty($catId)){
			foreach ($data['cat'] as $key => $value){
				if($value['parent_id'] == 0){
					foreach ($data['cat'] as $key1 => $value1){
						if($value1['parent_id'] != 0 && $value['category_id'] == $value1['parent_id'] )
						{
							$catId = $value1['category_id'];
							break;
						}elseif(!empty($catId))
						{
							break;
						}
					}
				} 
			}
		}
		/**************** pagination ************/
		$perpage = 3;
		// $pageno = 0;
		$count = $this->Product_model->countProduct($catId);
		$total_page=ceil($count / $perpage);
		if($pageno<=$total_page)
			{
				$newpage= ++$pageno;
				//echo $newpage;exit;
				$y = $perpage;
				$x = $perpage * $newpage - $perpage;
				$limit = "LIMIT $x,$y";

				$data['products'] = $this->Product_model->selectProduct($catId,$limit);
			}
		$data['total_page'] = $total_page;
		$data['catId'] = $catId;
		$data['pageno'] = $pageno;

		$data['newProduct'] = $this->Product_model->selectNewproduct();
		$data['gallery'] = $this->Gallery_model->selectAllgallery();
		// print_r($this->data['customer_id']);
		// echo "<pre>";print_r($data['products']);exit;
		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/productList');
		$this->load->view('templates/footer');
	}
	public function allProductView($catId="",$pageno = "")
	{
		$data = $this->data;
		
		$where = array('parent_id' => $catId);
		$data['cat'] = $this->Product_model->select("","oc_category",$where);
		$count = 0;
		if(!empty($data['cat'])){
			
		 	foreach ($data['cat'] as $key => $value){
		 		$data1['products2'][$key] = $this->Product_model->selectAllProduct($value['category_id']);
		 		foreach ($data1['products2'][$key] as $key1 => $value1){
		 			$count = $count + 1;
		 		}
		 	}
		}

		$perpage = 3;
		$total_page=ceil($count / $perpage);
		if($pageno<=$total_page)
			{
				$newpage= ++$pageno;
				$y = $perpage;
				$x = $perpage * $newpage - $perpage;
				$limit = "LIMIT $x,$y";
				$data['products'] = array();
				$extra = "WHERE W";
				foreach ($data['cat'] as $key => $value){
					
					$extra .= " OR pro_cat.category_id = ".$value['category_id'];
				}
				$extra1 = str_replace("W OR","",$extra);
				$extra1 = str_replace(" W","",$extra1);
				if($extra1 == "WHERE")
				{
					$extra1 = "WHERE pro_cat.category_id = ".$catId;
				}
				//print_r($extra1);exit;
				$data['products'] = $this->Product_model->selectAllCatProduct($extra1,$limit);
			}
		//echo "<pre>";print_r($data['products']);exit;
		$data['total_page'] = $total_page;
		$data['catId'] = $catId;
		$data['pageno'] = $pageno;
		$data['cat'] = $this->Product_model->selectCategory();
		$data['newProduct'] = $this->Product_model->selectNewproduct();
		$data['gallery'] = $this->Gallery_model->selectAllgallery();

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/productList',$data);
		$this->load->view('templates/footer');
	}
	public function productDetails($proId="")
	{
		$data = $this->data;	

		$data['cat'] = $this->Product_model->selectCategory();
		$data['products'] = $this->Product_model->selectSingelProduct($proId);
		$data['newProduct'] = $this->Product_model->selectNewproduct();
		$data['gallery'] = $this->Gallery_model->selectAllgallery();

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/productDetails',$data);
		$this->load->view('templates/footer');
	}
	public function cartView()
	{ 
		$data = $this->data;

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/cartView');
		$this->load->view('templates/footer');
	}
	public function checkOut($state="")
	{
		$data = $this->data;

		$data['accIn'] = $state;
		$id = $this->session->userdata('customer_id');
		if(!empty($id))
		{
			$cartData = $this->cart->contents();
			foreach ($cartData as $key => $value) {
				$updateData = array('customer_id' => $id,);
				$columnName = array('cart_id' => $value['cartId'],);
				$this->Helper_model->update("oc_cart",$updateData,$columnName);
			}
			$data['userExist'] = $this->Product_model->selectSingleUser($id);
		}

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/checkOut',$data);
		$this->load->view('templates/footer');
	}
	public function addToCart()
	{
		
		@$id = $this->session->userdata('customer_id');
		if(empty($id))
		{
			$id = 0;
		}
		$productId = $this->input->post('productId');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$image = $this->input->post('image');
		$desc = $this->input->post('desc');
		@$delWish = $this->input->post('delWish');
		
		$name = str_replace(",","comma","$name");
		$name = str_replace("(","leftRound ","$name"); 
		$name = str_replace(")"," rightRound","$name"); 

		$desc = str_replace(",","comma","$desc");
		$desc = str_replace("(","leftRound","$desc"); 
		$desc = str_replace(")","rightRound","$desc"); 

		//print_r($delWish);exit;

		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$date =  $date->format( 'Y-m-d H:i:s');

		$cartData = array(
		        'customer_id' => $id,
		        'session_id'   => session_id(),
		        'product_id'    => $productId,
		        'quantity'    => $qty,
		        'date_added' => $date
		);
		//print_r($cartData);exit;
		$sess = session_id();
		$proExist = $this->Product_model->checkCartProduct($id,$productId,$sess);
		if($proExist)
		{
			$newQty = $proExist[0]['quantity'] + $qty;
			$update = array('quantity' => $newQty);
			$cartId = $proExist[0]['cart_id'];
			$condition = array('cart_id' => $cartId);

			$this->Product_model->update("oc_cart",$update,$condition);
			$data = array(
		        'id'      => $productId,
		        'qty'     => $qty,
		        'price'   => $price,
		        'name'    => $name,
		        'desc'    => $desc,
		        'image'   => $image,
		        'cartId'  => $cartId
			);
			$this->cart->insert($data);
		}
		else
		{
			$cartId = $this->Product_model->insert("oc_cart",$cartData);
			$data = array(
		        'id'      => $productId,
		        'qty'     => $qty,
		        'price'   => $price,
		        'name'    => $name,
		        'desc'    => $desc,
		        'image'   => $image,
		        'cartId'  => $cartId
			);
			$this->cart->insert($data);

		}	
		if($delWish == 'delWish')
		{
			ob_start(); 
			$this->deleteWishlistItem($productId);
			ob_clean();
		}	
		$totalItems = $this->cart->total_items();
		echo $totalItems;

	}
	public function removeCardItem($rowid)
	{
		$data = $this->cart->get_item($rowid);
		$value = $data['cartId'];
		if($value)
		{
			$this->Helper_model->delete('oc_cart','cart_id',$value);
			$this->cart->remove($rowid);
			$totalItems = $this->cart->total_items();
			echo $totalItems;	
		}
	}
	public function destroyCart()
	{
		$this->cart->destroy();
	}
	public function confirmOrder()
	{
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$date =  $date->format( 'Y-m-d H:i:s');
		$formData = $this->input->post();
		//print_r($formData);exit;
		$id = $this->session->userdata('customer_id');
		if(!empty($id))
		{
			$data = array(
				'customer_id' => $id,
				'firstname' => $formData['firstname'],
				'lastname' => $formData['lastname'], 
				'email' => $formData['email'],
				'telephone' => $formData['telephone'],
				'fax' => $formData['fax'],
				'shipping_address_1' => $formData['address_1'],
				'shipping_address_2' => $formData['address_2'],
				'shipping_city' => $formData['city'],
				'shipping_postcode' => $formData['pincode'],
				'shipping_country_id' => $formData['country_id'],
				'shipping_zone_id' => $formData['zone_id'],
				'shipping_address_format' => $formData['shipping_address'],
				'shipping_method' => $formData['shipping_method'],
				'batch_id' => $formData['batch'],
				'batch_date' => $formData['date'],
				'comment' => $formData['comment'],
				'total' => $formData['total'],
				'order_status_id' => 1,
				'payment_method' => $formData['payment_method'],
				'date_added' => $date,
				'date_modified' => $date
				);
			//print_r($data);exit;
			$insertId = $this->Product_model->insert('oc_order',$data);
			if (!empty($insertId)) {
				$historyData = array(
					'order_id' => $insertId,
					'order_status_id' => 1,
					'date_added' => $date
					);
				$this->Product_model->insert('oc_order_history',$historyData);
                
                foreach ($this->cart->contents() as $items){
                  $name = $items['name'];
                  $name = str_replace("comma",",","$name");
                  $name = str_replace("leftRound","( ","$name"); 
                  $name = str_replace("rightRound"," )","$name");

                  $orderProData = array(
					'order_id' => $insertId,
					'product_id' => $items['id'],
					'name'=> $name,
					'quantity'=> $items['qty'],
					'price'=> $items['price'],
					'total'=> $items['subtotal'],
				  );
				$this->Product_model->insert('oc_order_product',$orderProData);
				}
				$totalAmt = $this->cart->total();
				$orderSubTotal = array(
					'order_id' => $insertId,
					'code' => 'sub_total',
					'title' => 'Sub-Total',
					'value'=> $totalAmt
			  	);
				$this->Product_model->insert('oc_order_total',$orderSubTotal);
				$orderShipTotal = array(
					'order_id' => $insertId,
					'code' => 'shipping',
					'title' => 'Flat Shipping Rate',
					'value'=> 0
			  	);
				$this->Product_model->insert('oc_order_total',$orderShipTotal);
				$orderTotal = array(
					'order_id' => $insertId,
					'code' => 'total',
					'title' => 'Total',
					'value'=> $totalAmt
			  	);
				$ans = $this->Product_model->insert('oc_order_total',$orderTotal);
				//print_r($ans);exit;
				if (!empty($ans)) {
						foreach ($this->cart->contents() as $items){
							$this->Helper_model->delete("oc_cart","cart_id",$items['cartId']);

							$this->cart->remove($items['rowid']);
						}
						echo 1;
	         	}
	         	else{
	         		echo"<pre>";print_r("Error.....");
	         	}
			}
			else
			{
				echo"<pre>";print_r('error..');exit;
			}
		}
		else{
			echo "Please login first..!";
		}
	}
	public function orderSuccess()
	{
		$data = $this->data;
		
		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/orderMsg');
		$this->load->view('templates/footer');
	}
	public function updateCart()
	{
		$rowid = $this->input->post('rowid');
		$price = $this->input->post('price');
		$operation = $this->input->post('operation');
		$data = $this->cart->get_item($rowid);
		
		$condition = array('cart_id' => $data['cartId']);

		if($operation == 'minus' && $data['qty'] > 1)
		{
			$qty = $data['qty'] - 1; 
			$data = array(
			        'rowid' => $rowid,
			        'qty'   => $qty
			);
			$this->cart->update($data);
		   
			$newQty = $data['qty'] - 1;
			$update = array('quantity' => $newQty);

			//print_r($update);print_r($condition);exit;
			$this->Product_model->update("oc_cart",$update,$condition);
		}
		else if($operation == 'plus')
		{
			$qty = $data['qty'] + 1; 
			$data = array(
			        'rowid' => $rowid,
			        'qty'   => $qty
			);
			$this->cart->update($data);

			$newQty = $data['qty'] +1;
			$update = array('quantity' => $newQty);

			$this->Product_model->update("oc_cart",$update,$condition);
		}
	}
	/*********  wishlist        *********/
	public function wishlistView()
	{ 
		$data = $this->data;

		$customer_id = $this->session->userdata('customer_id');
		$condition = array('customer_id' => $customer_id);
		$product_id = $this->Helper_model->select('product_id','oc_customer_wishlist',$condition);
		$data['wishlist'] = array();
		foreach ($product_id as $key => $value) {
			$data['wishlist'][$key] = $this->Product_model->selectSingelProduct($value['product_id']);
		}

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/wishlistView',$data);
		$this->load->view('templates/footer');
	}
	public function addToWishlist()
	{
		$productId = $this->input->post('productId');
		$customer_id = $this->session->userdata('customer_id');
		if($customer_id){
			$timezone = new DateTimeZone("Asia/Kolkata" );
			$date = new DateTime();
			$date->setTimezone($timezone );
			$date =  $date->format( 'Y-m-d H:i:s');

			$data = array(
					'customer_id' => $customer_id,
					'product_id'  => $productId,
					'date_added'  => $date
				);
			$id = $this->Product_model->insert('oc_customer_wishlist',$data);
			$condition = array('customer_id' => $customer_id);
			$proCount = $this->Product_model->get_cnt('oc_customer_wishlist',$condition);
			$this->session->set_userdata('wishCount', $proCount);
			echo $proCount;
		}
	}
	public function deleteWishlistItem($product_id)
	{
		$customer_id = $this->session->userdata('customer_id');
		$result = $this->Product_model->delete_wishlistItem($customer_id,$product_id);
		$condition = array('customer_id' => $customer_id);
		$proCount = $this->Product_model->get_cnt('oc_customer_wishlist',$condition);
		$this->session->set_userdata('wishCount', $proCount);
		echo $proCount;
	}
	public function productSearching($catId="",$pageno = "")
	{
		$formData = $this->input->post();
		//print_r($formData);exit;
		@$search_param = $formData['search_param'];
		@$search_value = $formData['search_value'];
		if(isset($search_param) && $search_param =="its_equal")
		{
			//$sign = "=";
			$extraPro = "WHERE pro.price = $search_value ";
		}
		else if(isset($search_param) && $search_param =="contains")
		{
			//$sign = "LIKE";
			$extraPro = "WHERE pro.price LIKE '%$search_value%' OR pro_desc.name LIKE '%$search_value%'";
		}
		else if(isset($search_param) && $search_param =="greather_than")
		{
			// $sign = ">";
			$extraPro = "WHERE pro.price > $search_value ";
		}
		else if(isset($search_param) && $search_param =="less_than")
		{
			// $sign = "<";
			$extraPro = "WHERE pro.price < $search_value ";
		}
		else if(isset($search_param) && $search_param =="all")
		{
			$extraPro = "WHERE pro.price LIKE '%$search_value%' OR pro_desc.name LIKE '%$search_value%'";
		}

		
		if(empty($catId))
		{
			@$catId = $formData['currCatId'];
		}
		if(empty($pageno))
		{
			@$pageno = $formData['currPageNo'];
		}

		$data = $this->data;
		$data['cat'] = $this->Product_model->selectCategory();
		
		if(empty($catId)){
			foreach ($data['cat'] as $key => $value){
				if($value['parent_id'] == 0){
					foreach ($data['cat'] as $key1 => $value1){
						if($value1['parent_id'] != 0 && $value['category_id'] == $value1['parent_id'] )
						{
							$catId = $value1['category_id'];
							break;
						}elseif(!empty($catId))
						{
							break;
						}
					}
				} 
			}
		}
		/**************** pagination ************/
		$perpage = 3;
		// $pageno = 0;
		$extraCat = "WHERE  pro_cat.category_id = $catId";
		$count = $this->Product_model->countSearchingProduct($extraCat);

		// if(isset($catId) && $catId != "" && $catId != "null"){

			//$extraPro = "WHERE pro_cat.category_id = $catId";
			// if(isset($search_param) && $search_param != "" && $search_param != "null"){
			// 	$extraPro = "WHERE pro.price $sign $search_value ";
			// }
			//print_r($extraPro);exit;

		//  }
		// print_r($data['products']);exit;
		$total_page=ceil($count / $perpage);
		if($pageno<=$total_page)
			{
				$newpage= ++$pageno;
				//echo $newpage;exit;
				$y = $perpage;
				$x = $perpage * $newpage - $perpage;
				$limit = "LIMIT $x,$y";

				$data['products'] = $this->Product_model->selectSeachingProduct($extraPro,$limit);
			}
		//echo "<pre>";print_r($data['products']);exit;
		$data['total_page'] = $total_page;
		$data['catId'] = $catId;
		$data['pageno'] = $pageno;

		$data['newProduct'] = $this->Product_model->selectNewproduct();
		$data['gallery'] = $this->Gallery_model->selectAllgallery();

		$data['page'] = "productspage";
		$this->load->view('templates/header',$data);
		$this->load->view('product/productList');
		$this->load->view('templates/footer');
	}

	/*******************************************/
}