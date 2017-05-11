<?php
class ModelMemberMember extends Model {

	public function getTotalMember() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer");

		return $query->row['total'];
	}


	// public function getCustomerDetails($cust_id)  // single member
	// {
	// 	$sql = "SELECT *  FROM oc_customer WHERE customer_id = $cust_id" ;
	// 	// print_r($sql);exit;
	// 	$query = $this->db->query($sql);
	// 	return $query->rows;
	// }

	public function getAllCustomer($data = array()) //multiple members
	{
		//echo"<pre>";print_r($data);exit;
		$sql = "SELECT cust.* FROM oc_customer cust" ;

		// if (!empty($data['date_from'])) {
		// 	$sql .= " AND DATE(cs.date) >= DATE('" . $this->db->escape($data['date_from']) . "')";
		// }
		// if (!empty($data['date_to'])) {
		// 	$sql .= " AND DATE(cs.date) <= DATE('" . $this->db->escape($data['date_to']) . "')";
		// } 
		// if (!empty($data['time_from'])) {
		// 	$sql .= " AND DATE(cs.time) >= DATE('" . $this->db->escape($data['time_from']) . "')";
		// }
		// if (!empty($data['time_to'])) {
		// 	$sql .= " AND DATE(cs.time) <= DATE('" . $this->db->escape($data['time_to']) . "')";
		// } 

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

	public function getCustomerPackageHistory($cust_id)  // single member
	{
		$sql = "SELECT pcm.*, cust.*, pm.*, pcm.status as pack_status FROM oc_package_customer_master pcm LEFT JOIN oc_customer cust ON(pcm.customer_id=cust.customer_id) LEFT JOIN oc_package_master pm ON(pm.package_id=pcm.package_id) WHERE pcm.customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		return $query->rows;
	}
	public function getCustomerCall($cust_id)  // single member
	{
		$sql = "SELECT *  FROM oc_call_schedule WHERE customer_id = $cust_id" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function update_call_status($call_id) {
		// print_r("UPDATE " . DB_PREFIX . "call_schedule SET status =  2,  WHERE srno = '" . (int)$call_id . "'");exit;
		$this->event->trigger('pre.admin.member.edit', $data);
		$this->db->query("UPDATE " . DB_PREFIX . "call_schedule SET status =  2 WHERE srno = '" . (int)$call_id . "'");

		
		$this->cache->delete('member');

		$this->event->trigger('post.admin.member.edit', $member_id);
	}

	public function getCustomerDetails($cust_id)  // single member
	{
		$sql = "SELECT cust.* FROM oc_customer cust WHERE customer_id = $cust_id" ;
		$query = $this->db->query($sql);
		$data = $query->rows;

		// $sql1 = "SELECT pm.package_name FROM oc_package_master pm WHERE package_id = $package_id" ;
		// $query1 = $this->db->query($sql1);
		
		// $data['package'] = $query1->rows;
		return $data;

	}

	public function getAllVideo()  // single member
	{
		$sql = "SELECT *  FROM oc_video_master WHERE video_type = 2" ;
		// print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->rows;
	}


} 