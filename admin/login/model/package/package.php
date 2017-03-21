<?php
class ModelPackagePackage extends Model {

	public function getTotalPackage() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "package_master");

		return $query->row['total'];
	}


	public function getPackages($data = array()) //multiple packages
	{
		$sql = "SELECT * FROM oc_package_master" ;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getPackage($package_id)  // single package
	{
		$query = $this->db->query("SELECT * FROM oc_package_master WHERE package_id = $package_id AND status = 1");

		return $query->row;
	}

	public function editPackage($package_id, $data) {
		$this->event->trigger('pre.admin.package.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "package_master SET package_name = '" . $data['package_description'][1]['name'] . "', package_amount = '" . $data['package_description'][1]['package_amount'] . "', package_3m_amount = '" . $data['package_description'][1]['package_3m_amount'] . "', package_6m_amount = '" . $data['package_description'][1]['package_6m_amount'] . "', package_1y_amount = '" . $data['package_description'][1]['package_1y_amount'] . "', number_of_video = '" . $data['package_description'][1]['number_of_video'] . "', package_training_type_id = '" . $data['package_description'][1]['package_training_type_id'] . "', package_details = '" . $data['package_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', package_img = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW() WHERE package_id = '" . (int)$package_id . "'");

		
		$this->cache->delete('package');

		$this->event->trigger('post.admin.package.edit', $package_id);
	}

	public function addPackage($data) {
		// $this->event->trigger('pre.admin.package.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "package_master SET package_name = '" . $data['package_description'][1]['name'] . "', package_amount = '" . $data['package_description'][1]['package_amount'] . "', package_3m_amount = '" . $data['package_description'][1]['package_3m_amount'] . "', package_6m_amount = '" . $data['package_description'][1]['package_6m_amount'] . "', package_1y_amount = '" . $data['package_description'][1]['package_1y_amount'] . "', number_of_video = '" . $data['package_description'][1]['number_of_video'] . "', package_training_type_id = '" . $data['package_description'][1]['package_training_type_id'] . "', package_details = '" . $data['package_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', package_img = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW()");

		$package_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.package.add', $package_id);

		return $package_id;
	}

	public function deletePackage($package_id) {
		$this->event->trigger('pre.admin.package.delete', $package_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "package_master WHERE package_id = '" . (int)$package_id . "'");
		
		$this->cache->delete('package');

		$this->event->trigger('post.admin.package.delete', $package_id);
	}




















}
