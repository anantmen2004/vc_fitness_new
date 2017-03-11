<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('cart');
        // $this->load->helper('session');
    }
	public function productView($catId="")
	{
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
		$data['products'] = $this->Product_model->selectProduct($catId);
		//echo "<pre>";print_r($data['products']);exit;
		$this->load->view('product/productList',$data);
	}
	public function productDetails($proId="")
	{
		$data['cat'] = $this->Product_model->selectCategory();
 
		$data['products'] = $this->Product_model->selectSingelProduct($proId);
		//echo "<pre>";print_r($data['products']);exit;
		$this->load->view('product/productDetails',$data);
	}
	public function cartView()
	{ 
		// foreach ($this->cart->contents() as $items)
		// {
		// 	echo "<pre>";print_r($items);
		// }
		//$row = $this->cart->contents('rowid');
		//echo "<pre>";print_r($row['rowid']);exit;

		$this->load->view('product/cartView');
	}
	public function checkOut($state="")
	{
		$data['accIn'] = $state;
		$id = $this->session->userdata('customer_id');
		if(!empty($id))
		{
			$data['userExist'] = $this->Product_model->selectSingleUser($id);
		}
		//echo "<pre>";print_r($data['userExist']);exit;
		$this->load->view('product/checkOut',$data);
	}
	public function addToCart()
	{
		//$this->cart->destroy();
		//exit;
		$productId = $this->input->post('productId');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$name = $this->input->post('name');
		$image = $this->input->post('image');
		$desc = $this->input->post('desc');

		$name = str_replace(",","comma","$name");
		$name = str_replace("(","leftRound ","$name"); 
		$name = str_replace(")"," rightRound","$name"); 

		$desc = str_replace(",","comma","$desc");
		$desc = str_replace("(","leftRound","$desc"); 
		$desc = str_replace(")","rightRound","$desc"); 

		//print_r($desc);exit;
		$cartData = array(
		        'customer_id' => $qty,
		        'session_id'   => session_id(),
		        'product_id'    => $productId,
		        'quantity'    => $qty,
		        'date_added' => date("Y-m-d H:i:s")
		);

		$cartId = $this->Product_model->insert("oc_cart",$cartData);
		$data = array(
		        'id'      => $productId,
		        'qty'     => $qty,
		        'price'   => $price,
		        'name'    => $name,
		        'desc'   => $desc,
		        'image'   => $image
		);
		//print_r($data);exit;
		$ans = $this->cart->insert($data);
		if($ans)
		{
			$totalItems = $this->cart->total_items();
			echo $totalItems;
		}
		
	}
	public function removeCardItem($rowid)
	{
		$this->cart->remove($rowid);
		redirect('product/cartView');
	}
	public function destroyCart()
	{
		$this->cart->destroy();
	}
	///
	public function confirmOrder()
	{
		// foreach ($this->cart->contents() as $items){
		// 	print_r($items);
		// }exit;
		$formData = $this->input->post();
		
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
				'payment_method' => $formData['payment_method'],
				'payment_custom_field' => $formData['payment_custom_field']
				);

			$insertId = $this->Product_model->insert('oc_order',$data);
			if (!empty($insertId)) {
				$historyData = array(
					'order_id' => $insertId,
					'order_status_id' => 1,
					'date_added' => date("Y-m-d H:i:s")
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
				if (!empty($ans)) {
						foreach ($this->cart->contents() as $items){
							$this->cart->remove($items['rowid']);
						}
						echo 1;
	         	}
	         	else{
	         		echo"<pre>";print_r("error.....");
	         	}
			}
			else
			{
				echo"<pre>";print_r('erro..');exit;
			}
		}
		else{
			echo "Please login first..!";
		}
	}
	public function orderSuccess()
	{
		$this->load->view('product/orderMsg');
	}
	public function updateCart()
	{
		$rowid = $this->input->post('rowid');
		$price = $this->input->post('price');
		$operation = $this->input->post('operation');
		$data = $this->cart->get_item($rowid);
		if($operation == 'minus' && $data['qty'] != 1)
		{
			$qty = $data['qty'] - 1; 
			$data = array(
			        'rowid' => $rowid,
			        'qty'   => $qty
			);

			$this->cart->update($data);
		}
		else
		{
			$qty = $data['qty'] + 1; 
			$data = array(
			        'rowid' => $rowid,
			        'qty'   => $qty
			);
			$this->cart->update($data);
		}
	}
	/*******************************************/
}
