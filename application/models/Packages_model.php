<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packages_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllPackages($id)
	{
		return $data = $this->db->query("SELECT * FROM oc_package_master WHERE status = 1 AND package_type = $id")->result_array();
	}

	public function getAllTraining($pid)
	 { 
	 	return $data = $this->db->query("SELECT DISTINCT p.package_id,t.training_id,t.training_name FROM oc_package_training_video_master p,oc_training_type t WHERE p.package_id = $pid AND p.training_id=t.training_id")->result_array();
	}

	public function getsinglePackage($pid)
	 { 
	 	return $data = $this->db->query("SELECT DISTINCT p.package_id,m.package_name,t.training_id,t.training_name FROM oc_package_training_video_master p,oc_training_type t, oc_package_master m WHERE p.package_id = $pid AND p.package_id=m.package_id AND p.training_id=t.training_id")->result_array();
	}
}