<?php
class ControllerPackagePackage extends Controller {
	private $error = array();

	public function index() {
		$this->language->load('package/package');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('package/package');

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
			'href' => $this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('package/package/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('package/package/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['repair'] = $this->url->link('package/package/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['packages'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$package_total = $this->model_package_package->getTotalPackage();

		$results = $this->model_package_package->getPackages($filter_data);

		 //print_r($results[0]['status']);exit;

		foreach ($results as $result) {
			if($result['status'] == '1'){
				$status = "Active";
			}
			else{
				$status = "Inactive";
			}
			$data['packages'][] = array(
				'package_id' => $result['package_id'],
				'name'        => $result['package_name'],
				 'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('package/package/edit', 'token=' . $this->session->data['token'] . '&package_id=' . $result['package_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('package/package/delete', 'token=' . $this->session->data['token'] . '&package_id=' . $result['package_id'] . $url, 'SSL')
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

		$data['sort_name'] = $this->url->link('package/package', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('package/package', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $package_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($package_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($package_total - $this->config->get('config_limit_admin'))) ? $package_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $package_total, ceil($package_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('package/package_list.tpl', $data));
	}

	/**************************************************************/

	public function edit() {
		$this->language->load('package/package');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('package/package');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_package_package->editPackage($this->request->get['package_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	protected function getForm() {
// 		 print_r($this->request->get['package_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['package_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
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

		$data['entry_1m_amount'] = $this->language->get('entry_1m_amount');
		$data['entry_3m_amount'] = $this->language->get('entry_3m_amount');
		$data['entry_6m_amount'] = $this->language->get('entry_6m_amount');
		$data['entry_1y_amount'] = $this->language->get('entry_1y_amount');
		// $data['entry_number_of_video'] = $this->language->get('number_of_video');
		$data['entry_training_type'] = $this->language->get('training_type');
		$data['entry_package_type'] = $this->language->get('package_type');

		$data['text_normal'] = $this->language->get('text_normal');
		$data['text_optional'] = $this->language->get('text_optional');

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

		if (isset($this->error['amount'])) {
			$data['error_amount'] = $this->error['amount'];
		} else {
			$data['error_amount'] = array();
		}

		if (isset($this->error['3m_amount'])) {
			$data['error_3m_amount'] = $this->error['3m_amount'];
		} else {
			$data['error_3m_amount'] = '';
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
			'href' => $this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['package_id'])) {
			$data['action'] = $this->url->link('package/package/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('package/package/edit', 'token=' . $this->session->data['token'] . '&package_id=' . $this->request->get['package_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['package_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$package_info = $this->model_package_package->getPackage($this->request->get['package_id']);
		}
		//echo "<pre>";print_r($package_info);exit;
		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		$data['training_types'] = $this->model_package_package->getAllTrainingTypes();
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($package_info)) {
			$data['name'] = $package_info[0]['package_name'];
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['package_amount'])) {
			$data['package_amount'] = $this->request->post['package_amount'];
		} elseif (!empty($package_info)) {
			$data['package_amount'] = $package_info[0]['package_amount'];
		} else {
			$data['package_amount'] = '';
		}

		if (isset($this->request->post['package_3m_amount'])) {
			$data['package_3m_amount'] = $this->request->post['package_3m_amount'];
		} elseif (!empty($package_info)) {
			$data['package_3m_amount'] = $package_info[0]['package_3m_amount'];
		} else {
			$data['package_3m_amount'] = '';
		}

		if (isset($this->request->post['package_6m_amount'])) {
			$data['package_6m_amount'] = $this->request->post['package_6m_amount'];
		} elseif (!empty($package_info)) {
			$data['package_6m_amount'] = $package_info[0]['package_6m_amount'];
		} else {
			$data['package_6m_amount'] = '';
		}

		if (isset($this->request->post['package_1y_amount'])) {
			$data['package_1y_amount'] = $this->request->post['package_1y_amount'];
		} elseif (!empty($package_info)) {
			$data['package_1y_amount'] = $package_info[0]['package_1y_amount'];
		} else {
			$data['package_1y_amount'] = '';
		}

		if (isset($this->request->post['description'])) {
			$data['description'] = $this->request->post['description'];
		} elseif (!empty($package_info)) {
			$data['description'] = $package_info[0]['package_details'];
		} else {
			$data['description'] = '';
		}

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($package_info)) {
			$data['image'] = $package_info[0]['package_img'];
		} else {
			$data['image'] = '';
		}

		// if (isset($this->request->post['number_of_video'])) {
		// 	$data['number_of_video'] = $this->request->post['number_of_video'];
		// } elseif (!empty($package_info)) {
		// 	$data['number_of_video'] = $package_info['number_of_video'];
		// } else {
		// 	$data['number_of_video'] = '';
		// }

		if (isset($this->request->post['package_training_type_id'])) {
			$data['package_training_type_id'] = $this->request->post['package_training_type_id'];
		} elseif (!empty($package_info)) {
			$data['package_training_type_id'] = $package_info[0]['package_training_type_id'];
		} else {
			$data['package_training_type_id'] = '';
		}

		if (isset($this->request->post['package_type'])) {
			$data['package_type'] = $this->request->post['package_type'];
		} elseif (!empty($package_info)) {
			$data['package_type'] = $package_info[0]['package_type'];
		} else {
			$data['package_type'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($package_info) && is_file(DIR_IMAGE . $package_info[0]['package_img'])) {
			$data['thumb'] = $this->model_tool_image->resize($package_info[0]['package_img'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		 $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		 if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($package_info)) {
			$data['status'] = $package_info[0]['status'];
		} else {
			$data['status'] = true;
		}
		$training_id = array();
		foreach ($package_info as $key => $value) {
			$training_id[$key]['training_id'] = $value['training_id'];
			$training_id[$key]['training_name'] = $value['training_id'];
		}
		//print_r($training_id);exit;
		
		 $data['package_details'][1] = array(
			'name' => $data['name'],
			'package_amount' => $data['package_amount'],
			'package_3m_amount' => $data['package_3m_amount'],
			'package_6m_amount' => $data['package_6m_amount'],
			'package_1y_amount' => $data['package_1y_amount'],
			'package_type' => $data['package_type'],
			'description' => $data['description'],
			'image' => $data['image'],
			'thumb' => $data['thumb'], );
		 $data['package_description'] = $data['package_details'];
		 $data['package_training_types'] = $training_id;
		//echo "<pre>";print_r($data);exit;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		//echo "<pre>";print_r($data);exit;
		$this->response->setOutput($this->load->view('package/package_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'package/package')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['package_description'] as $language_id => $value) {
			//print_r($value);exit;
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			if ($value['package_amount'] == "")  {
				$this->error['amount'][$language_id] = $this->language->get('error_amount');
			}

			
		}

		return !$this->error;
	}
	/****************************************************/
	public function add() {
		$this->language->load('package/package');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('package/package');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			// $aaa = $this->request->post;
			// echo "<pre>";print_r($aaa);exit;
			$this->model_package_package->addPackage($this->request->post);

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

			$this->response->redirect($this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}


	public function delete() {
		$this->language->load('package/package');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('package/package');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $package_id) {
				$this->model_package_package->deletepackage($package_id);
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

			$this->response->redirect($this->url->link('package/package', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'package/package')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function get_training() {
		$id = $this->request->post['id'];
		$this->load->model('package/package');
		$training_data = $this->model_package_package->getSingleTraining($id);
		echo json_encode($training_data);
	}
}