<?php
class ModelPackagetrainingPackagetraining extends Model {

	public function getTotalPackagetraining() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "package_training_video_master");

		return $query->row['total'];
	}


	public function getAllPackages($data = array()) //multiple gallerys
	{
		$sql = "SELECT ptv.*, pm.package_name,tt.training_name,vm.video_name FROM oc_package_training_video_master ptv JOIN oc_package_master pm ON(ptv.package_id=pm.package_id) JOIN oc_training_type tt ON(ptv.training_id=tt.training_id) JOIN oc_video_master vm ON(ptv.video_id=vm.video_id)" ;
		//print_r($sql);exit;
		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getAllPackageTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_package_master");

		return $query->rows;
	}
	public function getAllTrainingTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_training_type");

		return $query->rows;
	}
	public function getAllVideoTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_video_master");

		return $query->rows;
	}
	public function getPackagetraining($sr_id)  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_package_training_video_master WHERE sr_no = $sr_id");

		return $query->row;
	}
	public function getPackagetrainingTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_gallery_type");

		return $query->rows;
	}
	

	public function editPackagetraining($sr_no, $data) {
		$this->event->trigger('pre.admin.package_training_video_master.edit', $data);
		// echo "<pre>";print_r($data);exit;
		$this->db->query("UPDATE " . DB_PREFIX . "package_training_video_master SET package_id = '" . $data['packagetraining_description'][1]['package_id'] . "', training_id = '" . $data['packagetraining_description'][1]['training_id'] . "', video_id = '" . $data['packagetraining_description'][1]['video_id'] . "' WHERE sr_no = '" . (int)$sr_no . "'");

		
		$this->cache->delete('gallery');

		$this->event->trigger('post.admin.gallery.edit', $sr_no);
	}

	public function addPackagetraining($data) {
		// $this->event->trigger('pre.admin.gallery.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "package_training_video_master SET package_id = '" . $data['packagetraining_description'][1]['package_id'] . "', training_id = '" . $data['packagetraining_description'][1]['training_id'] . "', video_id = '" . $data['packagetraining_description'][1]['video_id'] . "', date_added = NOW()");

		$sr_no = $this->db->getLastId();

		// $this->event->trigger('post.admin.gallery.add', $category_id);

		return $sr_no;
	}

	public function deletePackagetraining($sr_no) {
		$this->event->trigger('pre.admin.gallery.delete', $sr_no);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE sr_no = '" . (int)$sr_no . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "package_training_video_master WHERE sr_no = '" . (int)$sr_no . "'");
		
		$this->cache->delete('gallery');

		$this->event->trigger('post.admin.gallery.delete', $sr_no);
	}




















}
