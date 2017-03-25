<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}
	public function select($customer_id,$galleryId)
	{
		return $this->db->query("SELECT gallery_likes_id FROM oc_gallery_likes WHERE customer_id = $customer_id AND gallery_id = $galleryId")->result_array();
	}

	public function selectAllgallery($typeId="")
	{   
		
		$extra = "";
		if(!empty($typeId))
		{
			$extra = "WHERE gal.gallery_type_id = $typeId";
		}
		//print_r("SELECT gal.*, gal.gallery_id as id, likes.*, count(likes.gallery_likes_id) as cnt  FROM oc_gallery gal LEFT JOIN oc_gallery_likes likes ON(gal.gallery_id = likes.gallery_id) $extra GROUP BY likes.gallery_id ORDER BY id ASC");
		return $this->db->query("SELECT gal.*, gal.gallery_id as id, likes.*, count(likes.gallery_likes_id) as cnt  FROM oc_gallery gal LEFT JOIN oc_gallery_likes likes ON(gal.gallery_id = likes.gallery_id) $extra GROUP BY id ORDER BY id DESC")->result_array();
	}
}