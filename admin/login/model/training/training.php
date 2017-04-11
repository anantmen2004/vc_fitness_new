<?php
class ModelTrainingTraining extends Model {

	public function getTotalTraining() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "training_type");

		return $query->row['total'];
	}


	public function getTrainings($data = array()) //multiple trainings
	{
		//print_r($data);exit;
		$sql = "SELECT tt.*, pm.program_name as program_name FROM oc_training_type tt JOIN oc_program_master pm ON(tt.program_id=pm.program_id)" ;

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		//print_r($sql);exit;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getTraining($training_id)  // single training
	{
		//print_r($training_id);exit;
		// $query = $this->db->query("SELECT * FROM oc_training_type tt WHERE training_id = $training_id AND status = 1");
		$sql = "SELECT tt.*, pm.program_name as program_name,tvm.*,vm.video_name FROM oc_training_type tt JOIN oc_program_master pm ON(tt.program_id=pm.program_id) LEFT JOIN oc_training_video_master tvm ON(tt.training_id = tvm.training_id) LEFT JOIN oc_video_master vm ON(tvm.video_id = vm.video_id) WHERE tt.training_id = $training_id" ;

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getVideos()  // single training
	{
		$query = $this->db->query("SELECT video_id, video_name FROM oc_video_master WHERE status = 1");

		return $query->rows;
	}
	public function getSingleVideo($id)
	{
		$query = $this->db->query("SELECT * FROM oc_video_master WHERE video_id = $id");
		return $query->row;
	}

	public function editTraining($training_id, $data) {
		$this->event->trigger('pre.admin.training.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "training_type SET program_id = '" . $data['training_description'][1]['program_id'] . "', training_name = '" . $data['training_description'][1]['name'] . "', training_description = '" . $data['training_description'][1]['description'] . "', content = '" . $data['training_description'][1]['content'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE training_id = '" . (int)$training_id . "'");

		if(!empty($training_id))
		{
			$this->db->query("DELETE FROM " . DB_PREFIX . "training_video_master WHERE training_id = '" . (int)$training_id . "'");

			$video_id = $data['video_id'];
			$training_data = array();
			foreach ($video_id as $key => $value) {
				$query = $this->db->query("SELECT * FROM oc_training_video_master WHERE video_id = $value AND training_id = $training_id");
				$cnt = $query->row;
				if(empty($cnt))
				{
					$this->db->query("INSERT INTO " . DB_PREFIX . "training_video_master SET training_id = '" . $training_id . "', video_id = '" . $value. "', date_added = NOW()");
				}
			}
			
		}

		
		$this->cache->delete('training');

		$this->event->trigger('post.admin.training.edit', $training_id);
	}

	public function addTraining($data) {
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "training_type SET program_id = '" . $data['training_description'][1]['program_id'] . "', training_name = '" . $data['training_description'][1]['name'] . "', training_description = '" . $data['training_description'][1]['description'] . "', content = '" . $data['training_description'][1]['content'] . "', status = '" . (int)$data['status'] . "',  date_modified = NOW(), created_added = NOW()");

		$training_id = $this->db->getLastId();
		if(!empty($training_id))
		{
			$video_id = $data['video_id'];
			$video_data = array();
			foreach ($video_id as $key => $value) {
				$query = $this->db->query("SELECT * FROM oc_training_video_master WHERE video_id = $value AND training_id = $training_id");
				$cnt = $query->row;
				//print_r($cnt);exit;
				if(empty($cnt) && !empty($value))
				{
					$this->db->query("INSERT INTO " . DB_PREFIX . "training_video_master SET training_id = '" . $training_id . "', video_id = '" . $value. "', date_added = NOW()");
				}
			}
			$this->event->trigger('post.admin.training.add', $training_id);
			return $training_id;
		}
	}

	public function deleteTraining($training_id) {
		$this->event->trigger('pre.admin.training.delete', $training_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE training_id = '" . (int)$training_id . "'");
		
		$this->cache->delete('training');

		$this->event->trigger('post.admin.training.delete', $training_id);
	}

	public function deleteSingleVideo($training_id, $video_id)
	{
		$this->event->trigger('pre.admin.training.delete', $training_id);

		//print_r("DELETE FROM oc_training_video_master WHERE training_id=$training_id AND  video_id = $video_id");exit;
		$query = $this->db->query("DELETE FROM oc_training_video_master WHERE training_id=$training_id AND  video_id = $video_id");

		$this->cache->delete('training');

		$this->event->trigger('post.admin.training.delete', $package_id);
	}




















}
