<?php
class ModelOnetomanyOnetomany extends Model {

	public function getTotalOnetomany() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "package_customer_master");

		return $query->row['total'];
	}


	public function getCallDetails($call_id)  // single onetomany
	{
		$sql = "SELECT *  FROM oc_call_schedule WHERE srno = $call_id" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getAllCustomer($data = array()) //multiple onetomanys
	{

		$sql = "SELECT cs.*, cust.* FROM oc_call_schedule cs JOIN oc_customer cust ON(cs.customer_id=cust.customer_id) WHERE cs.status <> 2 AND cs.status <>4" ;

		if (!empty($data['date_from'])) {
			$sql .= " AND DATE(cs.date) >= DATE('" . $this->db->escape($data['date_from']) . "')";
		}
		if (!empty($data['date_to'])) {
			$sql .= " AND DATE(cs.date) <= DATE('" . $this->db->escape($data['date_to']) . "')";
		} 
		if (!empty($data['time_from'])) {
			$sql .= " AND DATE(cs.time) >= DATE('" . $this->db->escape($data['time_from']) . "')";
		}
		if (!empty($data['time_to'])) {
			$sql .= " AND DATE(cs.time) <= DATE('" . $this->db->escape($data['time_to']) . "')";
		} 

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		//echo"<pre>";print_r($sql);exit;
		$query = $this->db->query($sql);
		//echo"<pre>";print_r($query->rows);exit;
		return $query->rows;
	}

	public function getCustomerPackageHistory($cust_id)  // single onetomany
	{
		$sql = "SELECT pcm.*, cust.*, pm.*, pcm.status as pack_status FROM oc_package_customer_master pcm LEFT JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) LEFT JOIN oc_package_master pm ON(pm.package_id=pcm.package_id) WHERE pcm.customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		return $query->rows;
	}
	public function getCustomerCall($cust_id)  // single onetomany
	{
		$sql = "SELECT *  FROM oc_call_schedule WHERE customer_id = $cust_id" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function editOnetomany($cust_id, $data) {
		// print_r($data);exit;
		$this->event->trigger('pre.admin.onetomany.edit', $data);
		$this->db->query("UPDATE " . DB_PREFIX . "call_schedule SET date = '" . $data['date']. "', time = '" . $data['time']. "', admin_comment = '" . $data['admin_comment'] . "', video_id = '" . $data['video_id'] . "', status = '" . $data['status'] . "', updated_on = NOW() WHERE customer_id = '" . (int)$cust_id . "' AND package_id = '" . (int)$data['package_id'] . "' AND call_no = '" . (int)$data['call_no'] . "'");

		
		$this->cache->delete('onetomany');

		$this->event->trigger('post.admin.onetomany.edit', $onetomany_id);
	}

	public function getCustomerDetails($cust_id,$package_id)  // single onetomany
	{
		$sql = "SELECT cust.* FROM oc_customer cust WHERE customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		$data['customer'] = $query->rows;

		$sql1 = "SELECT pm.package_name FROM oc_package_master pm WHERE package_id = $package_id" ;
		$query1 = $this->db->query($sql1);
		
		$data['package'] = $query1->rows;
		return $data;

	}

	public function getAllVideo()  // single onetomany
	{
		$sql = "SELECT *  FROM oc_video_master WHERE video_type = 2" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}


} 