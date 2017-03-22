<?php
class ModelGalleryGallerytype extends Model {

	public function getTotalGallerytype() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "gallery_type");

		return $query->row['total'];
	}
	public function getGalleries($data = array()) //multiple gallerytypes
	{
		$sql = "SELECT * FROM oc_gallery_type" ;

		$query = $this->db->query($sql);

		return $query->rows;
	}
	public function getGallerytype($gallery_type_id)  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_gallery_type WHERE gallery_type_id = $gallery_type_id");

		return $query->row;
	}
	public function getGalleryTypes()  // single gallery
	{
		$query = $this->db->query("SELECT * FROM oc_gallery_type");

		return $query->rows;
	}
	

	public function editGallerytype($gallery_type_id, $data) {
		$this->event->trigger('pre.admin.gallery.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "gallery_type SET name = '" . $data['gallery_type_description'][1]['name'] . "', description = '" . $data['gallery_type_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE gallery_type_id = '" . (int)$gallery_type_id . "'");

		
		$this->cache->delete('gallery_type');

		$this->event->trigger('post.admin.gallery_type.edit', $gallery_type_id);
	}

	public function addGallerytype($data) {
		// $this->event->trigger('pre.admin.gallery_type.add', $data);
		// echo "<pre>";print_r($data);exit;
		$this->db->query("INSERT INTO " . DB_PREFIX . "gallery_type SET name = '" . $data['gallery_type_description'][1]['name'] . "', description = '" . $data['gallery_type_description'][1]['description'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

		$gallery_type_id = $this->db->getLastId();

		// $this->event->trigger('post.admin.gallery_type.add', $category_id);

		return $gallery_type_id;
	}

	public function deletegallery_type($gallery_type_id) {
		$this->event->trigger('pre.admin.gallery_type.delete', $gallery_type_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "training_type WHERE gallery_type_id = '" . (int)$gallery_type_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "gallery_type WHERE gallery_type_id = '" . (int)$gallery_type_id . "'");
		
		$this->cache->delete('gallery_type');

		$this->event->trigger('post.admin.gallery_type.delete', $gallery_type_id);
	}
}
