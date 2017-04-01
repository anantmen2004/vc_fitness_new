<?php
class ModelSchedulerScheduler extends Model {

	public function getTotalScheduler() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "package_customer_master");

		return $query->row['total'];
	}


	public function getAllCustomer($data = array()) //multiple schedulers
	{

		$sql = "SELECT pcm.*, cust.* FROM oc_package_customer_master pcm JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) GROUP BY(cust.customer_id)" ;
		$query = $this->db->query($sql);
		return $query->rows;

	}
	public function getCustomerPackageHistory($cust_id)  // single scheduler
	{
		$sql = "SELECT pcm.*, cust.*, pm.*  FROM oc_package_customer_master pcm LEFT JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) LEFT JOIN oc_package_master pm ON(pm.package_id=pcm.package_id) WHERE pcm.customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		return $query->rows;
	}
	public function getCustomerCall($cust_id)  // single scheduler
	{
		$sql = "SELECT *  FROM oc_call_schedule WHERE customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		return $query->rows;
	}
	// public function getSchedulerTypes()  // single scheduler
	// {
	// 	$query = $this->db->query("SELECT * FROM oc_scheduler_type");

	// 	return $query->rows;
	// }
	

	// public function editScheduler($scheduler_id, $data) {
	// 	$this->event->trigger('pre.admin.scheduler.edit', $data);

	// 	$this->db->query("UPDATE " . DB_PREFIX . "scheduler SET title = '" . $data['scheduler_description'][1]['name'] . "', scheduler_type_id = '" . (int)$data['scheduler_description'][1]['scheduler_type_id'] . "', description = '" . $data['scheduler_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW() WHERE scheduler_id = '" . (int)$scheduler_id . "'");

		
	// 	$this->cache->delete('scheduler');

	// 	$this->event->trigger('post.admin.scheduler.edit', $scheduler_id);
	// }

	// public function addScheduler($data) {
	// 	// $this->event->trigger('pre.admin.scheduler.add', $data);
	// 	//echo "<pre>";print_r($data);exit;
	// 	$this->db->query("INSERT INTO " . DB_PREFIX . "scheduler SET title = '" . $data['scheduler_description'][1]['name'] . "', scheduler_type_id = '" . (int)$data['scheduler_description'][1]['scheduler_type_id'] . "', description = '" . $data['scheduler_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW()");

	// 	$scheduler_id = $this->db->getLastId();

	// 	// $this->event->trigger('post.admin.scheduler.add', $category_id);

	// 	return $scheduler_id;
	// }

	// public function deleteScheduler($scheduler_id) {
	// 	$this->event->trigger('pre.admin.scheduler.delete', $scheduler_id);

	// 	$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE scheduler_id = '" . (int)$scheduler_id . "'");
	// 	$this->db->query("DELETE FROM " . DB_PREFIX . "scheduler WHERE scheduler_id = '" . (int)$scheduler_id . "'");
		
	// 	$this->cache->delete('scheduler');

	// 	$this->event->trigger('post.admin.scheduler.delete', $scheduler_id);
	// }




















}
