<?php
class ControllerSchedulerScheduler extends Controller {
	private $error = array();

	public function index() {
		// print_r(121212);exit;
		$this->language->load('sheduler/sheduler');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sheduler/sheduler');

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
			'href' => $this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('sheduler/sheduler/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('sheduler/sheduler/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['repair'] = $this->url->link('sheduler/sheduler/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['galleries'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$sheduler_total = $this->model_sheduler_sheduler->getTotalScheduler();

		$results = $this->model_sheduler_sheduler->getGalleries($filter_data);

		 //print_r($results[0]['status']);exit;

		foreach ($results as $result) {
			if($result['status'] == '1'){
				$status = "Active";
			}
			else{
				$status = "Inactive";
			}
			$data['galleries'][] = array(
				'sheduler_id' => $result['sheduler_id'],
				'name'        => $result['title'],
				'type'        => $result['name'],
				 'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('sheduler/sheduler/edit', 'token=' . $this->session->data['token'] . '&sheduler_id=' . $result['sheduler_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('sheduler/sheduler/delete', 'token=' . $this->session->data['token'] . '&sheduler_id=' . $result['sheduler_id'] . $url, 'SSL')
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

		$data['sort_name'] = $this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $sheduler_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($sheduler_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($sheduler_total - $this->config->get('config_limit_admin'))) ? $sheduler_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $sheduler_total, ceil($sheduler_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sheduler/sheduler_list.tpl', $data));
	}

	/**************************************************************/

	public function edit() {
		$this->language->load('sheduler/sheduler');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sheduler/sheduler');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sheduler_sheduler->editScheduler($this->request->get['sheduler_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	protected function getForm() {
// 		 print_r($this->request->get['sheduler_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['sheduler_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_sheduler_type'] = $this->language->get('entry_sheduler_type');
		$data['entry_description'] = $this->language->get('entry_description');
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
			'href' => $this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['sheduler_id'])) {
			$data['action'] = $this->url->link('sheduler/sheduler/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('sheduler/sheduler/edit', 'token=' . $this->session->data['token'] . '&sheduler_id=' . $this->request->get['sheduler_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['sheduler_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$sheduler_info = $this->model_sheduler_sheduler->getScheduler($this->request->get['sheduler_id']);
		}
		
		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();


		$data['sheduler_types'] = $this->model_sheduler_sheduler->getSchedulerTypes();

		// print_r($data['sheduler_types']);exit;

		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($sheduler_info)) {
			$data['name'] = $sheduler_info['title'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (!empty($sheduler_info)) {
			$data['description'] = $sheduler_info['description'];
		} else {
			$data['description'] = '';
		}

		if (isset($this->request->post['sheduler_type_id'])) {
			$data['sheduler_type_id'] = $this->request->post['sheduler_type_id'];
		} elseif (!empty($sheduler_info)) {
			$data['sheduler_type_id'] = $sheduler_info['sheduler_type_id'];
		} else {
			$data['sheduler_type_id'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($sheduler_info)) {
			$data['image'] = $sheduler_info['img_path'];
		} else {
			$data['image'] = '';
		}  
		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($sheduler_info) && is_file(DIR_IMAGE . $sheduler_info['img_path'])) {
			$data['thumb'] = $this->model_tool_image->resize($sheduler_info['img_path'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		

		 $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		 if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($sheduler_info)) {
			$data['status'] = $sheduler_info['status'];
		} else {
			$data['status'] = true;
		}

		
		 $data['sheduler_details'][1] = array(
			'name' => $data['name'],
			'description' => $data['description'],
			'sheduler_type_id' => $data['sheduler_type_id'],
			'image' => $data['image'],
			'thumb' => $data['thumb'], );
		 $data['sheduler_description'] = $data['sheduler_details'];
		//echo "<pre>";print_r($data);exit;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		//echo "<pre>";print_r($data);exit;

		$this->response->setOutput($this->load->view('sheduler/sheduler_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'sheduler/sheduler')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['sheduler_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		return !$this->error;
	}
	/****************************************************/
	public function add() {
		$this->language->load('sheduler/sheduler');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sheduler/sheduler');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_sheduler_sheduler->addScheduler($this->request->post);

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

			$this->response->redirect($this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}


	public function delete() {
		$this->language->load('sheduler/sheduler');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sheduler/sheduler');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $sheduler_id) {
				$this->model_sheduler_sheduler->deletesheduler($sheduler_id);
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

			$this->response->redirect($this->url->link('sheduler/sheduler', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'sheduler/sheduler')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}