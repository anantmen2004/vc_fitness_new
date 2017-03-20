<?php
class ModelTrainingTraining extends Model {

	public function getTotalTraining() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "training_type");

		return $query->row['total'];
	}


	public function getTrainings($data = array()) //multiple trainings
	{
		$sql = "SELECT tt.*, pm.program_name as program_name FROM oc_training_type tt JOIN oc_program_master pm ON(tt.program_id=pm.program_id)" ;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getTraining($training_id)  // single training
	{
		$query = $this->db->query("SELECT * FROM oc_training_type tt WHERE training_id = $training_id AND status = 1");

		return $query->row;
	}

	public function editTraining($training_id, $data) {
		$this->event->trigger('pre.admin.training.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "training_type SET program_id = '" . $data['training_description'][1]['program_id'] . "', training_name = '" . $data['training_description'][1]['name'] . "', training_description = '" . $data['training_description'][1]['description'] . "', content = '" . $data['training_description'][1]['content'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), created_added = NOW() WHERE training_id = '" . (int)$training_id . "'");

		
		$this->cache->delete('training');

		$this->event->trigger('post.admin.training.edit', $training_id);
	}

	public function addTraining($data) {
		// $this->event->trigger('pre.admin.training.add', $data);

		//$query = $this->db->query("INSERT INTO " . DB_PREFIX . "training_type SET program_id = '" . $data['training_description'][1]['program_id'] . "', training_name = '" . $data['training_description'][1]['name'] . "', training_description = '" . $data['training_description'][1]['description'] . "', content = " . $data['training_description'][1]['content'] . ", status = '" . (int)$data['status'] . "',  date_modified = NOW(), created_added = NOW()");
		//print_r($query);exit;

		
		$this->db->query("INSERT INTO " . DB_PREFIX . "training_type SET program_id = '" . $data['training_description'][1]['program_id'] . "', training_name = '" . $data['training_description'][1]['name'] . "', training_description = '" . $data['training_description'][1]['description'] . "', content = '" . $data['training_description'][1]['content'] . "', status = '" . (int)$data['status'] . "',  date_modified = NOW(), created_added = NOW()");

		$category_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.training.add', $category_id);

		return $category_id;
	}

	public function deleteTraining($training_id) {
		$this->event->trigger('pre.admin.training.delete', $training_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE training_id = '" . (int)$training_id . "'");
		
		$this->cache->delete('training');

		$this->event->trigger('post.admin.training.delete', $training_id);
	}




















}
