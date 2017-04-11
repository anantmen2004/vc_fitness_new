<?php
class ModelVideoVideo extends Model {

	public function getTotalVideo() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "video_master");

		return $query->row['total'];
	}
	public function getVideos($data = array()) //multiple videos
	{
		$sql = "SELECT * FROM oc_video_master";

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
	public function getVideo($video_id)  // single video
	{
		$query = $this->db->query("SELECT * FROM oc_video_master WHERE video_id = $video_id");

		return $query->row;
	}
	public function editVideo($video_id, $data) {
		$this->event->trigger('pre.admin.video.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "video_master SET video_name = '" . $data['video_description'][1]['name'] . "', video_path = '" . $data['video_description'][1]['video_path'] . "', description = '" . $data['video_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE video_id = '" . (int)$video_id . "'");

		
		$this->cache->delete('video');

		$this->event->trigger('post.admin.video.edit', $video_id);
	}

	public function addVideo($data) {
		// $this->event->trigger('pre.admin.video.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "video_master SET video_name = '" . $data['video_description'][1]['name'] . "', video_path = '" . $data['video_description'][1]['video_path'] . "', description = '" . $data['video_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

		$video_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.video.add', $video_id);

		return $video_id;
	}

	public function deleteVideo($video_id) {
		$this->event->trigger('pre.admin.video.delete', $video_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE video_id = '" . (int)$video_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "video_master WHERE video_id = '" . (int)$video_id . "'");
		
		$this->cache->delete('video');

		$this->event->trigger('post.admin.video.delete', $video_id);
	}




















}
