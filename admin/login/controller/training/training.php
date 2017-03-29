<?php
class ControllerTrainingTraining extends Controller {
	private $error = array();

	public function index() {
		// print_r(123);exit;
		$this->language->load('training/training');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('training/training');

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('training/training/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('training/training/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['repair'] = $this->url->link('training/training/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['trainings'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$training_total = $this->model_training_training->getTotaltraining();

		$results = $this->model_training_training->getTrainings($filter_data);

		 //print_r($result['training_id']);exit;

		foreach ($results as $result) {
			if($result['status'] == '1'){
				$status = "Active";
			}
			else{
				$status = "Inactive";
			}
			$data['trainings'][] = array(
				'training_id' => $result['training_id'],
				'name'        => $result['training_name'],
				'program_name'        => $result['program_name'],
				 'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('training/training/edit', 'token=' . $this->session->data['token'] . '&training_id=' . $result['training_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('training/training/delete', 'token=' . $this->session->data['token'] . '&training_id=' . $result['training_id'] . $url, 'SSL')
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_rebuild'] = $this->language->get('button_rebuild');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('training/training', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('training/training', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $training_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('training/training', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($training_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($training_total - $this->config->get('config_limit_admin'))) ? $training_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $training_total, ceil($training_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		//echo "<pre>";print_r($data['trainings']);exit;
		$this->response->setOutput($this->load->view('training/training_list.tpl', $data));
	}

	/**************************************************************/

	public function edit() {
		$this->language->load('training/training');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('training/training');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_training_training->editTraining($this->request->get['training_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	protected function getForm() {
// 		 print_r($this->request->get['training_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['training_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_meta_title'] = $this->language->get('entry_meta_title');
		$data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$data['entry_keyword'] = $this->language->get('entry_keyword');
		$data['entry_parent'] = $this->language->get('entry_parent');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_hover_image'] = $this->language->get('entry_hover_image');
		$data['entry_top'] = $this->language->get('entry_top');
		$data['entry_column'] = $this->language->get('entry_column');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_layout'] = $this->language->get('entry_layout');

		$data['help_filter'] = $this->language->get('help_filter');
		$data['help_keyword'] = $this->language->get('help_keyword');
		$data['help_top'] = $this->language->get('help_top');
		$data['help_column'] = $this->language->get('help_column');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_design'] = $this->language->get('tab_design');

		$data['program_type'] = $this->language->get('program_type');
		$data['entry_content'] = $this->language->get('entry_content');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['training_id'])) {
			$data['action'] = $this->url->link('training/training/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('training/training/edit', 'token=' . $this->session->data['token'] . '&training_id=' . $this->request->get['training_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['training_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$training_info = $this->model_training_training->getTraining($this->request->get['training_id']);
		}

		
		
		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$this->load->model('program/program');
		$data['programs'] = $this->model_program_program->getPrograms();

		$data['video_types'] = $this->model_training_training->getVideos();

// echo "<pre>";print_r($training_info);exit;
		if(!empty($training_info))
		{
			$video_id = array();
			foreach ($training_info as $key => $value) {
				$video_id[$key]['video_id'] = $value['video_id'];
				$video_id[$key]['video_name'] = $value['video_name'];
			}

			$data['training_video_types'] = $video_id;
		}

		// print_r($data['training_video_types']);exit;

		// if (isset($this->request->post['training_video_id'])) {
		// 	$data['training_video_id'] = $this->request->post['training_video_id'];
		// } elseif (!empty($training_info)) {
		// 	$data['training_video_id'] = $training_info[0]['training_video_id'];
		// } else {
		// 	$data['training_video_id'] = '';
		// }
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($training_info)) {
			$data['name'] = $training_info[0]['training_name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (!empty($training_info)) {
			$data['description'] = $training_info[0]['training_description'];
		} else {
			$data['description'] = '';
		}
		
		if (isset($this->request->post['program_id'])) {
			$data['program_id'] = $this->request->post['program_id'];
		} elseif (!empty($training_info)) {
			$data['program_id'] = $training_info[0]['program_id'];
		} else {
			$data['program_id'] = " ";
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($training_info)) {
			$data['status'] = $training_info[0]['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['content'])) {
			$data['content'] = $this->request->post['content'];
		} elseif (!empty($training_info)) {
			$data['content'] = $training_info[0]['content'];
		} else {
			$data['content'] = '';
		}

		if (isset($this->request->post['video_id'])) {
			$data['video_id'] = $this->request->post['video_id'];
		} elseif (!empty($training_info)) {
			$data['video_id'] = $training_info[0]['video_id'];
		} else {
			$data['video_id'] = '';
		}

		
		 $data['training_details'][1] = array(
		 	'program_id' => $data['program_id'],
			'name' => $data['name'],
			'description' => $data['description'],
			'content' => $data['content'],
			'status' => $data['status'],
			'video_id' => $data['video_id'],
			// 'training_video_id' => $data['training_video_id'],
			//'image' => $data['image'],
			// 'thumb' => $data['thumb'],
			// 'thumb_hover' => $data['thumb_hover'], 
			);
		 $data['training_description'] = $data['training_details'];
		//echo "<pre>";print_r($data);exit;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		// echo "<pre>";print_r($data['training_description']);exit;
		$this->response->setOutput($this->load->view('training/training_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'training/training')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['training_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			
		}

		return !$this->error;
	}
	/****************************************************/
	public function add() {
		$this->language->load('training/training');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('training/training');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			$aaa = $this->request->post;
			// echo "<pre>";print_r($aaa);exit;
			$this->model_training_training->addTraining($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}


	public function delete() {
		$this->language->load('training/training');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('training/training');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $training_id) {
				$this->model_training_training->deletetraining($training_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('training/training', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'training/training')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function get_video() {
		$id = $this->request->post['id'];
		$this->load->model('training/training');
		$video_data = $this->model_training_training->getSingleVideo($id);
		echo json_encode($video_data);
	}

	public function delete_training() {
		//print_r("123");exit;
		$pack_id = $this->request->post['pack_id'];
		$training_id = $this->request->post['training_id'];

		$this->load->model('package/package');
		$training_data = $this->model_package_package->deleteSingleTraining($pack_id,$training_id);
		//echo json_encode($training_data);
	}
}