<?php
class ModelSchedulerScheduler extends Model {

	public function getTotalScheduler() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "scheduler");

		return $query->row['total'];
	}


	public function getGalleries($data = array()) //multiple schedulers
	{
		$sql = "SELECT gal.*, type.name FROM oc_scheduler gal JOIN oc_scheduler_type type ON(gal.scheduler_type_id=type.scheduler_type_id)" ;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getScheduler($scheduler_id)  // single scheduler
	{
		$query = $this->db->query("SELECT * FROM oc_scheduler WHERE scheduler_id = $scheduler_id AND status = 1");

		return $query->row;
	}
	public function getSchedulerTypes()  // single scheduler
	{
		$query = $this->db->query("SELECT * FROM oc_scheduler_type");

		return $query->rows;
	}
	

	public function editScheduler($scheduler_id, $data) {
		$this->event->trigger('pre.admin.scheduler.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "scheduler SET title = '" . $data['scheduler_description'][1]['name'] . "', scheduler_type_id = '" . (int)$data['scheduler_description'][1]['scheduler_type_id'] . "', description = '" . $data['scheduler_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW() WHERE scheduler_id = '" . (int)$scheduler_id . "'");

		
		$this->cache->delete('scheduler');

		$this->event->trigger('post.admin.scheduler.edit', $scheduler_id);
	}

	public function addScheduler($data) {
		// $this->event->trigger('pre.admin.scheduler.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "scheduler SET title = '" . $data['scheduler_description'][1]['name'] . "', scheduler_type_id = '" . (int)$data['scheduler_description'][1]['scheduler_type_id'] . "', description = '" . $data['scheduler_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW()");

		$scheduler_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.scheduler.add', $category_id);

		return $scheduler_id;
	}

	public function deleteScheduler($scheduler_id) {
		$this->event->trigger('pre.admin.scheduler.delete', $scheduler_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE scheduler_id = '" . (int)$scheduler_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "scheduler WHERE scheduler_id = '" . (int)$scheduler_id . "'");
		
		$this->cache->delete('scheduler');

		$this->event->trigger('post.admin.scheduler.delete', $scheduler_id);
	}




















}
