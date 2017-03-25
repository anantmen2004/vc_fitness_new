<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	public function get_cnt($table, $arr=""){
		
		$this->db->where($arr);
		return $this->db->count_all_results($table);
	}
	public function insert($tableName,$data)
	{
		$this->db->insert($tableName,$data);
		return $this->db->insert_id();
		// echo $this->db->last_query();
	}
	public function update($tableName,$data,$columnName)
	{
		$this->db->where($columnName);
		return $this->db->update($tableName, $data);
	}
	public function select($select="",$tableName,$fields="")
	{
		$this->db->select($select);
		$this->db->from($tableName);
		$this->db->where($fields);
		$query = $this->db->get();
		return $query->result_array();
		//echo $this->db->last_query();
	}
	public function selectCategory()
	{
		return $this->db->query("SELECT cat.*, cat_desc.* FROM oc_category cat JOIN oc_category_description cat_desc ON(cat.category_id = cat_desc.category_id)")->result_array();
	}
	public function selectProduct($catId,$limit)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName, ROUND(AVG(rev.rating)) as rating, wish.customer_id FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) LEFT JOIN oc_review rev ON(pro.product_id = rev.product_id) LEFT JOIN oc_customer_wishlist wish ON(wish.product_id = pro.product_id) WHERE pro_cat.category_id = $catId GROUP BY pro.product_id $limit")->result_array();
	}
	public function selectAllCatProduct($extra="",$limit)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName, ROUND(AVG(rev.rating)) as rating, wish.customer_id FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) LEFT JOIN oc_review rev ON(pro.product_id = rev.product_id) LEFT JOIN oc_customer_wishlist wish ON(wish.product_id = pro.product_id) $extra GROUP BY pro.product_id $limit")->result_array();

		//return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) $extra $limit")->result_array();
	}
	public function selectSingelProduct($proId)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*, cat_desc.name as catName FROM oc_product pro LEFT JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) LEFT JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) LEFT JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) WHERE  pro.product_id = $proId")->result_array();
	}
	public function selectSingleUser($id)
	{
		return $this->db->query("SELECT cust.*, adds.* FROM oc_customer cust JOIN oc_address adds ON(cust.customer_id=adds.customer_id) WHERE cust.customer_id=$id")->result_array();
	}
	public function checkCartProduct($id="",$proId,$sess)
	{
		$extra = "";
		if($id != 0)
		{
			$extra .= "customer_id = $id AND product_id = $proId";
		}
		else
		{
			$extra .= "session_id = '$sess' AND product_id = $proId";
		}
		//print_r("SELECT * FROM oc_cart WHERE $extra");exit();
		return $this->db->query("SELECT * FROM oc_cart WHERE $extra")->result_array();
	}
	public function countProduct($catId)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) WHERE  pro_cat.category_id = $catId")->num_rows();
	}
	public function select_wishlistPro($customer_id)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*, cat_desc.name FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) WHERE  pro.product_id = $proId")->result_array();
	}
	public function delete_wishlistItem($customer_id,$product_id)
	{
		return $this->db->query("DELETE FROM oc_customer_wishlist WHERE customer_id = $customer_id AND product_id = $product_id");
	}
	public function selectAllProduct($catId)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) WHERE pro_cat.category_id = $catId")->result_array();
	}
	
	public function selectNewproduct()
	{
		return $this->db->query("SELECT pro.*, pro_desc.* FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) ORDER BY date_added DESC LIMIT 16")->result_array();
	}
	public function selectNewproducForMenu()
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) ")->result_array();
	}
	/*************searching records************/
	public function countSearchingProduct($extra)
	{
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) $extra")->num_rows();
	}
	public function selectSeachingProduct($extra,$limit)
	{
		//print_r("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName, ROUND(AVG(rev.rating)) as rating, wish.customer_id FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) LEFT JOIN oc_review rev ON(pro.product_id = rev.product_id) LEFT JOIN oc_customer_wishlist wish ON(wish.product_id = pro.product_id) $extra GROUP BY pro.product_id $limit");exit;
		return $this->db->query("SELECT pro.*, pro_desc.*, pro_cat.*,cat_desc.name as catName, ROUND(AVG(rev.rating)) as rating, wish.customer_id FROM oc_product pro JOIN oc_product_description pro_desc ON(pro.product_id = pro_desc.product_id) JOIN oc_product_to_category pro_cat ON(pro.product_id = pro_cat.product_id) JOIN oc_category_description cat_desc ON(pro_cat.category_id = cat_desc.category_id) LEFT JOIN oc_review rev ON(pro.product_id = rev.product_id) LEFT JOIN oc_customer_wishlist wish ON(wish.product_id = pro.product_id) $extra GROUP BY pro.product_id $limit")->result_array();
	}

/************************************/
}
?>