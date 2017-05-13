<?php
class ModelSchedulerScheduler extends Model {

	public function getTotalScheduler() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "package_customer_master");

		return $query->row['total'];
	}

	public function getAllCustomer($data = array()) //multiple schedulers
	{

		$sql = "SELECT pcm.*, cust.* FROM oc_package_customer_master pcm JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) GROUP BY(cust.customer_id)" ;

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		$query = $this->db->query($sql);
		return $query->rows;

	}
	public function getCustomerPackageHistory($cust_id)  // single scheduler
	{
		$sql = "SELECT pcm.*, cust.*, pm.*, pcm.status as pack_status FROM oc_package_customer_master pcm LEFT JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) LEFT JOIN oc_package_master pm ON(pm.package_id=pcm.package_id) WHERE pcm.customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		return $query->rows;
	}
	public function getCustomerCall($cust_id)  // single scheduler
	{
		$sql = "SELECT *  FROM oc_call_schedule WHERE customer_id = $cust_id" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function editScheduler($cust_id, $data) {
		//print_r($data);exit;
		$this->event->trigger('pre.admin.scheduler.edit', $data);
		$this->db->query("UPDATE " . DB_PREFIX . "call_schedule SET date = '" . $data['date']. "', time = '" . $data['time']. "', admin_comment = '" . $data['admin_comment'] . "', video_id = '" . $data['video_id'] . "', status = '" . $data['status'] . "', updated_on = NOW() WHERE customer_id = '" . (int)$cust_id . "' AND package_id = '" . (int)$data['package_id'] . "' AND package_sub_id = '" . (int)$data['package_sub_id'] . "' AND call_no = '" . (int)$data['call_no'] . "'");



		$this->cache->delete('scheduler');

		$this->event->trigger('post.admin.scheduler.edit', $scheduler_id);
	}
	
	public function updateCallStatus($data) {
		//print_r($data);exit;
		$this->event->trigger('pre.admin.scheduler.edit', $data);
		$this->db->query("UPDATE " . DB_PREFIX . "call_schedule SET status = '" . $data['status'] . "', updated_on = NOW() WHERE customer_id = '" . (int)$data['customer_id'] . "' AND package_id = '" . (int)$data['package_id'] . "' AND package_sub_id = '" . (int)$data['package_sub_id'] . "' AND call_no = '" . (int)$data['call_no'] . "'");

		$this->cache->delete('scheduler');

		$this->event->trigger('post.admin.scheduler.edit', $scheduler_id);
	}

	public function getCustomerDetails($cust_id,$package_id)  // single scheduler
	{
		$sql = "SELECT cust.* FROM oc_customer cust WHERE customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		$data['customer'] = $query->rows;

		$sql1 = "SELECT pm.package_name FROM oc_package_master pm WHERE package_id = $package_id" ;
		$query1 = $this->db->query($sql1);
		
		$data['package'] = $query1->rows;
		return $data;

	}

	public function getAllVideo()  // single scheduler
	{
		$sql = "SELECT *  FROM oc_video_master WHERE video_type = 2" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}


}
