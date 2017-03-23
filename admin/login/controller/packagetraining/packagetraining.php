<?php
class ControllerPackagetrainingPackagetraining extends Controller {
	private $error = array();

	public function index() {
		// print_r(121212);exit;
		$this->language->load('packagetraining/packagetraining');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('packagetraining/packagetraining');

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
			'href' => $this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('packagetraining/packagetraining/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('packagetraining/packagetraining/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['repair'] = $this->url->link('packagetraining/packagetraining/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['galleries'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$packagetraining_total = $this->model_packagetraining_packagetraining->getTotalPackagetraining();

		$results = $this->model_packagetraining_packagetraining->getAllPackages($filter_data);

		//echo "<pre>";print_r($results);exit;

		foreach ($results as $result) {
			
			$data['galleries'][] = array(
				'sr_no' => $result['sr_no'],
				'name'        => $result['package_name'],
				'training_name'        => $result['training_name'],
				'video_name'        => $result['video_name'],
				 'sort_order'  => "ASC",
				'edit'        => $this->url->link('packagetraining/packagetraining/edit', 'token=' . $this->session->data['token'] . '&sr_no=' . $result['sr_no'] . $url, 'SSL'),
				'delete'      => $this->url->link('packagetraining/packagetraining/delete', 'token=' . $this->session->data['token'] . '&sr_no=' . $result['sr_no'] . $url, 'SSL')
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

		$data['sort_name'] = $this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $packagetraining_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($packagetraining_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($packagetraining_total - $this->config->get('config_limit_admin'))) ? $packagetraining_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $packagetraining_total, ceil($packagetraining_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('packagetraining/packagetraining_list.tpl', $data));
	}

	/**************************************************************/

	public function edit() {
		$this->language->load('packagetraining/packagetraining');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('packagetraining/packagetraining');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_packagetraining_packagetraining->editPackagetraining($this->request->get['sr_no'], $this->request->post);

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

			$this->response->redirect($this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	protected function getForm() {
// 		 print_r($this->request->get['packagetraining_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['sr_no']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_packagetraining_type'] = $this->language->get('entry_packagetraining_type');
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

		$data['entry_package_type'] = $this->language->get('entry_package_type');
		$data['entry_training_type'] = $this->language->get('entry_training_type');
		$data['entry_video_type'] = $this->language->get('entry_video_type');

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
			'href' => $this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['sr_no'])) {
			$data['action'] = $this->url->link('packagetraining/packagetraining/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('packagetraining/packagetraining/edit', 'token=' . $this->session->data['token'] . '&sr_no=' . $this->request->get['sr_no'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['sr_no']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$packagetraining_info = $this->model_packagetraining_packagetraining->getPackagetraining($this->request->get['sr_no']);
		}
		
		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();


		$data['package_types'] = $this->model_packagetraining_packagetraining->getAllPackageTypes();
		$data['training_types'] = $this->model_packagetraining_packagetraining->getAllTrainingTypes();
		$data['video_types'] = $this->model_packagetraining_packagetraining->getAllVideoTypes();

		
		
		if (isset($this->request->post['package_id'])) {
			$data['package_id'] = $this->request->post['package_id'];
		} elseif (!empty($packagetraining_info)) {
			$data['package_id'] = $packagetraining_info['package_id'];
		} else {
			$data['package_id'] = '';
		}
		if (isset($this->request->post['training_id'])) {
			$data['training_id'] = $this->request->post['training_id'];
		} elseif (!empty($packagetraining_info)) {
			$data['training_id'] = $packagetraining_info['training_id'];
		} else {
			$data['training_id'] = '';
		}
		if (isset($this->request->post['video_id'])) {
			$data['video_id'] = $this->request->post['video_id'];
		} elseif (!empty($packagetraining_info)) {
			$data['video_id'] = $packagetraining_info['video_id'];
		} else {
			$data['video_id'] = '';
		}
		if (isset($this->request->post['sr_no'])) {
			$data['sr_no'] = $this->request->post['sr_no'];
		} elseif (!empty($packagetraining_info)) {
			$data['sr_no'] = $packagetraining_info['sr_no'];
		} else {
			$data['sr_no'] = '';
		}
		
		 $data['packagetraining_details'][1] = array(
			'package_id' => $data['package_id'],
			'training_id' => $data['training_id'],
			'video_id' => $data['video_id']);
		 $data['packagetraining_description'] = $data['packagetraining_details'];
		//echo "<pre>";print_r($data);exit;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		//echo "<pre>";print_r($data);exit;

		$this->response->setOutput($this->load->view('packagetraining/packagetraining_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'packagetraining/packagetraining')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['packagetraining_description'] as $language_id => $value) {
			//print_r($value['package_id']);exit;
			if ($value['package_id'] = 0)  {
				$this->error['package_id'][$language_id] = $this->language->get('error_name');
			}

			
		}

		return !$this->error;
	}
	/****************************************************/
	public function add() {
		// print_r(123);exit;
		$this->language->load('packagetraining/packagetraining');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('packagetraining/packagetraining');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_packagetraining_packagetraining->addPackagetraining($this->request->post);

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

			$this->response->redirect($this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}


	public function delete() {
		$this->language->load('packagetraining/packagetraining');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('packagetraining/packagetraining');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $sr_no) {
				$this->model_packagetraining_packagetraining->deletepackagetraining($sr_no);
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

			$this->response->redirect($this->url->link('packagetraining/packagetraining', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'packagetraining/packagetraining')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}