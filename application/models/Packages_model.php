<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllPackages($id)
	{
		return $data = $this->db->query("SELECT * FROM oc_package_master WHERE package_type = $id")->result_array();
	}


}