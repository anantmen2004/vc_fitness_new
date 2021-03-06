<?php

class ControllerMemberMember extends Controller {

	private $error = array();
	public function index() {

		// print_r(121212);exit;

		$this->language->load('member/member');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('member/member');
		$this->getList();
	}



	protected function getList() {

		if (isset($this->request->get['date_from'])) {
			$date_from = $this->request->get['date_from'];
		} else {
			$date_from = null;
		}

		if (isset($this->request->get['date_to'])) {
			$date_to = $this->request->get['date_to'];
		} else {
			$date_to = null;
		}

		if (isset($this->request->get['time_to'])) {
			$time_to = $this->request->get['time_to'];
		} else {
			$time_to = null;
		}

		if (isset($this->request->get['time_from'])) {
			$time_from = $this->request->get['time_from'];
		} else {
			$time_from = null;
		}

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

		if (isset($this->request->get['date_from'])) {
			$url .= '&date_from=' . $this->request->get['date_from'];
		}

		if (isset($this->request->get['date_to'])) {
			$url .= '&date_to=' . $this->request->get['date_to'];
		}

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
			'href' => $this->url->link('member/member', 'token=' . $this->session->data['token'] . $url, 'SSL')
			);

		$data['add'] = $this->url->link('member/member/add', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['delete'] = $this->url->link('member/member/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['repair'] = $this->url->link('member/member/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['call_session_start'] = $this->url->link('member/member/call_session_start', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['galleries'] = array();

		$filter_data = array(
			'date_from'  => $date_from,
			'date_to'  => $date_to,
			'time_from'  => $time_from,
			'time_to'  => $time_to,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
			);

		$member_total = $this->model_member_member->getTotalMember();
		$results = $this->model_member_member->getAllCustomer($filter_data);
	 	//echo "<pre>"; print_r($results);exit;
		foreach ($results as $result) {
			if($result['status'] == '0'){
				$status = "Active";
			}

			else{
				$status = "Inactive";
			}

			$data['customer'][] = array(
				'customer_id'  => $result['customer_id'],
				'fname'        => $result['firstname'],
				'lname'        => $result['lastname'],
				'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('member/member/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $result['customer_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('member/member/delete', 'token=' . $this->session->data['token'] . '&customer_id=' . $result['customer_id'] . $url, 'SSL')

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

		//echo "<pre>"; print_r($results['customer']);exit;

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$data['sort_name'] = $this->url->link('member/member', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');

		$data['sort_sort_order'] = $this->url->link('member/member', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');



		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		$data['token'] = $this->session->data['token'];

		$pagination = new Pagination();
		$pagination->total = $member_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('member/member', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($member_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($member_total - $this->config->get('config_limit_admin'))) ? $member_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $member_total, ceil($member_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;

		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('member/member_list.tpl', $data));

	}



	/**************************************************************/




	public function edit() {
		$this->language->load('member/member');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('member/member');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			$this->model_member_member->editPackage($this->request->get['customer_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('member/member', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	protected function getForm() {
// 		 print_r($this->request->get['member_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['customer_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
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
		$data['entry_member_type'] = $this->language->get('member_type');

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
			'href' => $this->url->link('member/member', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['customer_id'])) {
			$data['action'] = $this->url->link('member/member/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('member/member/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $this->request->get['customer_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('member/member', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['customer_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$member_info = $this->model_member_member->getCustomerDetails($this->request->get['customer_id']);
		}

		//echo "<pre>";print_r($member_info);exit;
		
		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();
		
		if (isset($this->request->post['customer_id'])) {
			$data['customer_id'] = $this->request->post['customer_id'];
		} elseif (!empty($member_info)) {
			$data['customer_id'] = $member_info[0]['customer_id'];
		} else {
			$data['customer_id'] = '';
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($member_info)) {
			$fname = $member_info[0]["firstname"];
			$lname = $member_info[0]["lastname"];
			$data['name'] = $fname.' '.$lname;	
		} else {
			$data['name'] = '';
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} elseif (!empty($member_info)) {
			$data['email'] = $member_info[0]['email'];
		} else {
			$data['email'] = '';
		}

		if (isset($this->request->post['telephone'])) {
			$data['telephone'] = $this->request->post['telephone'];
		} elseif (!empty($member_info)) {
			$data['telephone'] = $member_info[0]['telephone'];
		} else {
			$data['telephone'] = '';
		}

		
        if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($member_info)) {
			$data['status'] = $member_info[0]['status'];
		} else {
			$data['status'] = true;
		}
		
		//print_r($training_id);exit;
		
		 $data['member_details'][1] = array(
			'customer_id' => $data['customer_id'],
			'name' => $data['name'],
			'email' => $data['email'],
			'telephone' => $data['telephone'],
			 );
		 $data['member_description'] = $data['member_details'];
		
		//echo "<pre>";print_r($data['member_description']);exit;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		// /echo "<pre>";print_r($data);exit;
		$this->response->setOutput($this->load->view('member/member_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'member/member')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['member_description'] as $language_id => $value) {
			//print_r($value);exit;
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			if ($value['member_amount'] == "")  {
				$this->error['amount'][$language_id] = $this->language->get('error_amount');
			}

			
		}

		return !$this->error;
	}

	/******************/
}