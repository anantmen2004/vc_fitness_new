<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	public function getAllPrograms()
	{
		return $this->db->query("SELECT * FROM oc_program_master ")->result_array();
	}
	public function getAllTrainingType($programId)
	{
		return $this->db->query("SELECT * FROM oc_training_type WHERE program_id = $programId")->result_array();
	}
	public function getTrainingContent($trainingId)
	{
		return $this->db->query("SELECT * FROM oc_training_type WHERE training_id = $trainingId")->result_array();
	}


}