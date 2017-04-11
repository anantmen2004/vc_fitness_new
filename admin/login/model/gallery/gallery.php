<?php
class ModelGalleryGallery extends Model {

	public function getTotalGallery() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "gallery");

		return $query->row['total'];
	}


	public function getGalleries($data = array()) //multiple gallerys
	{
		$sql = "SELECT gal.*, type.name FROM oc_gallery gal JOIN oc_gallery_type type ON(gal.gallery_type_id=type.gallery_type_id)" ;

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
	public function getGallery($gallery_id)  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_gallery WHERE gallery_id = $gallery_id AND status = 1");

		return $query->row;
	}
	public function getGalleryTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_gallery_type");

		return $query->rows;
	}
	

	public function editGallery($gallery_id, $data) {
		$this->event->trigger('pre.admin.gallery.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "gallery SET title = '" . $data['gallery_description'][1]['name'] . "', gallery_type_id = '" . (int)$data['gallery_description'][1]['gallery_type_id'] . "', description = '" . $data['gallery_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW() WHERE gallery_id = '" . (int)$gallery_id . "'");

		
		$this->cache->delete('gallery');

		$this->event->trigger('post.admin.gallery.edit', $gallery_id);
	}

	public function addGallery($data) {
		// $this->event->trigger('pre.admin.gallery.add', $data);
		//echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "gallery SET title = '" . $data['gallery_description'][1]['name'] . "', gallery_type_id = '" . (int)$data['gallery_description'][1]['gallery_type_id'] . "', description = '" . $data['gallery_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', img_path = '" . $data['image'] . "', date_modified = NOW(), date_added = NOW()");

		$gallery_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.gallery.add', $category_id);

		return $gallery_id;
	}

	public function deleteGallery($gallery_id) {
		$this->event->trigger('pre.admin.gallery.delete', $gallery_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE gallery_id = '" . (int)$gallery_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "gallery WHERE gallery_id = '" . (int)$gallery_id . "'");
		
		$this->cache->delete('gallery');

		$this->event->trigger('post.admin.gallery.delete', $gallery_id);
	}




















}
