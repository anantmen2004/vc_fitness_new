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
		$query = $this->db->query("SELECT pm.*, ptm.training_id, tt.training_name FROM oc_package_master pm LEFT JOIN oc_package_training_master ptm ON(pm.package_id=ptm.package_id) LEFT JOIN oc_training_type tt ON(ptm.training_id=tt.training_id) WHERE pm.package_id = $package_id ");

		return $query->rows;
	}
	public function getAllTrainingTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_training_type");
		return $query->rows;
	}
	public function getSingleTraining($id)
	{
		$query = $this->db->query("SELECT * FROM oc_training_type WHERE training_id = $id");
		return $query->row;
	}


	public function editPackage($package_id, $data) {
		$this->event->trigger('pre.admin.package.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "package_master SET package_name = '" . $data['package_description'][1]['name'] . "', package_amount = '" . $data['package_description'][1]['package_amount'] . "', package_3m_amount = '" . $data['package_description'][1]['package_3m_amount'] . "', package_6m_amount = '" . $data['package_description'][1]['package_6m_amount'] . "', package_1y_amount = '" . $data['package_description'][1]['package_1y_amount'] . "', package_call = '" . $data['package_description'][1]['package_call'] . "', package_details = '" . $data['package_description'][1]['description'] . "', package_type = '" . (int)$data['package_type'] . "', status = '" . (int)$data['status'] . "', package_img = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW() WHERE package_id = '" . (int)$package_id . "'");


		if(!empty($package_id))
		{
			$this->db->query("DELETE FROM " . DB_PREFIX . "package_training_master WHERE package_id = '" . (int)$package_id . "'");

			$training_id = $data['training_id'];
			$training_data = array();
			$flag = 0;
			foreach ($training_id as $key => $value) {
				$query = $this->db->query("SELECT * FROM oc_package_training_master WHERE training_id = $value AND package_id = $package_id");
				$cnt = $query->row;
				//print_r($cnt);exit;
				if(empty($cnt))
				{
					$this->db->query("INSERT INTO " . DB_PREFIX . "package_training_master SET package_id = '" . $package_id . "', training_id = '" . $value. "', date_added = NOW()");
				}
			}
			
		}
		
		//echo "<pre>";print_r($package_id);print_r($data['training_id']);exit;

		
		$this->cache->delete('package');

		$this->event->trigger('post.admin.package.edit', $package_id);
	}

	public function addPackage($data) {
		// $this->event->trigger('pre.admin.package.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "package_master SET package_name = '" . $data['package_description'][1]['name'] . "', package_amount = '" . $data['package_description'][1]['package_amount'] . "', package_3m_amount = '" . $data['package_description'][1]['package_3m_amount'] . "', package_6m_amount = '" . $data['package_description'][1]['package_6m_amount'] . "', package_1y_amount = '" . $data['package_description'][1]['package_1y_amount'] . "', package_call = '" . $data['package_description'][1]['package_call'] . "', package_details = '" . $data['package_description'][1]['description'] . "', package_type = '" . (int)$data['package_type'] . "', status = '" . (int)$data['status'] . "', package_img = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW()");

		$package_id = $this->db->getLastId();
		if(!empty($package_id))
		{
			$training_id = $data['training_id'];
			$training_data = array();
			$flag = 0;
			foreach ($training_id as $key => $value) {
				$query = $this->db->query("SELECT * FROM oc_package_training_master WHERE training_id = $value AND package_id = $package_id");
				$cnt = $query->row;
				//print_r($cnt);exit;
				if(empty($cnt) && !empty($value))
				{
					$this->db->query("INSERT INTO " . DB_PREFIX . "package_training_master SET package_id = '" . $package_id . "', training_id = '" . $value. "', date_added = NOW()");
				}
			}
			$this->event->trigger('post.admin.package.add', $package_id);
			return $package_id;
		}
	}

	public function deletePackage($package_id) {
		$this->event->trigger('pre.admin.package.delete', $package_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "package_training_master WHERE package_id = '" . (int)$package_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "package_master WHERE package_id = '" . (int)$package_id . "'");
		
		$this->cache->delete('package');

		$this->event->trigger('post.admin.package.delete', $package_id);
	}

	public function deleteSingleTraining($package_id, $training_id)
	{
		//print_r("DELETE FROM package_training_master WHERE package_id=$package_id AND  training_id = $training_id");exit;
		$this->event->trigger('pre.admin.package.delete', $package_id);
		$query = $this->db->query("DELETE FROM oc_package_training_master WHERE package_id=$package_id AND  training_id = $training_id");

		$this->cache->delete('package');

		$this->event->trigger('post.admin.package.delete', $package_id);
	}




















}
