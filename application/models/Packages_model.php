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
	 	return $data = $this->db->query("SELECT DISTINCT p.package_id,t.training_id,t.training_name FROM oc_package_training_master p,oc_training_type t WHERE p.package_id = $pid AND p.training_id=t.training_id")->result_array();
	}

	public function getsinglePackage($pid)
	 { 
	 	return $data = $this->db->query("SELECT DISTINCT p.package_id,m.package_name,t.training_id,t.training_name FROM oc_package_training_master p,oc_training_type t, oc_package_master m WHERE p.package_id = $pid AND p.package_id=m.package_id AND p.training_id=t.training_id")->result_array();
	}

	public function getPackageType($custid)
	{
		return $data = $this->db->query("SELECT p.package_id, p.package_name, p.package_details,pc.duration, pc.amount, p.package_call FROM oc_package_master p, oc_package_customer_master pc WHERE pc.package_id=p.package_id AND pc.status = 0 AND pc.customer_id = $custid ")->result_array();
	}

	public function getTrainingType($pid)
	{
		return $data = $this->db->query("SELECT DISTINCT t.training_id, t.training_name,p.package_id,p.package_name from oc_training_type t, oc_package_training_master ptv, oc_package_master p where t.training_id = ptv.training_id AND p.package_id = ptv.package_id AND ptv.package_id = $pid")->result_array();
	}

	public function getVideoType($tid)
	{
		return $data = $this->db->query("SELECT DISTINCT v.video_id, v.video_path, v.video_name from oc_video_master v JOIN oc_training_video_master tv  ON (tv.video_id=v.video_id) where tv.training_id= $tid")->result_array();
	}

	public function getCallno($pid, $custid)
	{
		//print_r("SELECT * from oc_call_schedule where customer_id = $custid AND package_id= $pid");exit;
		return $this->db->query("SELECT * FROM oc_call_schedule WHERE customer_id = $custid AND package_id= $pid")->result_array();
	}
}