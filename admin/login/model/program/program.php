<?php
class ModelProgramProgram extends Model {

	public function getTotalProgram() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "program_master");

		return $query->row['total'];
	}


	public function getPrograms($data = array()) //multiple programs
	{
		$sql = "SELECT * FROM oc_program_master" ;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getProgram($program_id)  // single program
	{
		$query = $this->db->query("SELECT * FROM oc_program_master WHERE program_id = $program_id AND status = 1");

		return $query->row;
	}

	public function editProgram($program_id, $data) {
		$this->event->trigger('pre.admin.program.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "program_master SET program_name = '" . $data['program_description'][1]['name'] . "', program_description = '" . $data['program_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', program_img = '" . $data['image'] . "',program_img_hover = '" . $data['hover_image'] . "', date_modified = NOW(), created_added = NOW() WHERE program_id = '" . (int)$program_id . "'");

		
		$this->cache->delete('program');

		$this->event->trigger('post.admin.program.edit', $program_id);
	}

	public function addProgram($data) {
		// $this->event->trigger('pre.admin.program.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "program_master SET program_name = '" . $data['program_description'][1]['name'] . "', program_description = '" . $data['program_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', program_img = '" . $data['image'] . "',program_img_hover = '" . $data['hover_image'] . "', date_modified = NOW(), created_added = NOW()");

		$category_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.program.add', $category_id);

		return $category_id;
	}

	public function deleteProgram($program_id) {
		$this->event->trigger('pre.admin.program.delete', $program_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE program_id = '" . (int)$program_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "program_master WHERE program_id = '" . (int)$program_id . "'");
		
		$this->cache->delete('program');

		$this->event->trigger('post.admin.program.delete', $program_id);
	}




















}
