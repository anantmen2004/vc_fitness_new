<?php
class ControllerProgramProgram extends Controller {
	private $error = array();

	public function index() {
		$this->language->load('program/program');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('program/program');

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
			'href' => $this->url->link('program/program', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('program/program/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('program/program/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['repair'] = $this->url->link('program/program/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['programs'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$program_total = $this->model_program_program->getTotalProgram();

		$results = $this->model_program_program->getPrograms($filter_data);

		// print_r($results[0]['status']);exit;

		foreach ($results as $result) {
			if($result['status'] == '1'){
				$status = "Active";
			}
			else{
				$status = "Inactive";
			}
			$data['programs'][] = array(
				'program_id' => $result['program_id'],
				'name'        => $result['program_name'],
				 'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('program/program/edit', 'token=' . $this->session->data['token'] . '&program_id=' . $result['program_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('program/program/delete', 'token=' . $this->session->data['token'] . '&program_id=' . $result['program_id'] . $url, 'SSL')
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

		$data['sort_name'] = $this->url->link('program/program', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('program/program', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $program_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/category', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($program_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($program_total - $this->config->get('config_limit_admin'))) ? $program_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $program_total, ceil($program_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('program/program_list.tpl', $data));
	}

	/**************************************************************/

	public function edit() {
		$this->language->load('program/program');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('program/program');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_program_program->editProgram($this->request->get['program_id'], $this->request->post);

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

			$this->response->redirect($this->url->link('program/program', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}














	protected function getForm() {
		// print_r($this->request->get['program_id']);exit;
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['program_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
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
			'href' => $this->url->link('program/program', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['program_id'])) {
			$data['action'] = $this->url->link('program/program/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('program/program/edit', 'token=' . $this->session->data['token'] . '&program_id=' . $this->request->get['program_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('program/program', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['program_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$category_info = $this->model_program_program->getPrograms($this->request->get['program_id']);
		}

		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		// if (isset($this->request->post['program_description'])) {
		// 	$data['program_description'] = $this->request->post['program_description'];
		// } elseif (isset($this->request->get['program_id'])) {
		// 	$data['program_description'] = $this->model_catalog_category->getCategoryDescriptions($this->request->get['program_id']);
		// } else {
		// 	$data['program_description'] = array();
		// }

		// if (isset($this->request->post['path'])) {
		// 	$data['path'] = $this->request->post['path'];
		// } elseif (!empty($category_info)) {
		// 	$data['path'] = $category_info['path'];
		// } else {
		// 	$data['path'] = '';
		// }

		// if (isset($this->request->post['parent_id'])) {
		// 	$data['parent_id'] = $this->request->post['parent_id'];
		// } elseif (!empty($category_info)) {
		// 	$data['parent_id'] = $category_info['parent_id'];
		// } else {
		// 	$data['parent_id'] = 0;
		// }

		// $this->load->model('catalog/filter');

		// if (isset($this->request->post['category_filter'])) {
		// 	$filters = $this->request->post['category_filter'];
		// } elseif (isset($this->request->get['program_id'])) {
		// 	$filters = $this->model_catalog_category->getCategoryFilters($this->request->get['program_id']);
		// } else {
		// 	$filters = array();
		// }

		// $data['category_filters'] = array();

		// foreach ($filters as $filter_id) {
		// 	$filter_info = $this->model_catalog_filter->getFilter($filter_id);

		// 	if ($filter_info) {
		// 		$data['category_filters'][] = array(
		// 			'filter_id' => $filter_info['filter_id'],
		// 			'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
		// 		);
		// 	}
		// }

		// $this->load->model('setting/store');

		// $data['stores'] = $this->model_setting_store->getStores();

		// if (isset($this->request->post['category_store'])) {
		// 	$data['category_store'] = $this->request->post['category_store'];
		// } elseif (isset($this->request->get['program_id'])) {
		// 	$data['category_store'] = $this->model_catalog_category->getCategoryStores($this->request->get['program_id']);
		// } else {
		// 	$data['category_store'] = array(0);
		// }

		// if (isset($this->request->post['keyword'])) {
		// 	$data['keyword'] = $this->request->post['keyword'];
		// } elseif (!empty($category_info)) {
		// 	$data['keyword'] = $category_info['keyword'];
		// } else {
		// 	$data['keyword'] = '';
		// }

		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($category_info)) {
			$data['image'] = $category_info['image'];
		} else {
			$data['image'] = '';
		}

		if (isset($this->request->post['hover_image'])) {
			$data['hover_image'] = $this->request->post['hover_image'];
		} elseif (!empty($category_info)) {
			$data['hover_image'] = $category_info['hover_image'];
		} else {
			$data['hover_image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $category_info['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($category_info['image'], 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		if (isset($this->request->post['hover_image']) && is_file(DIR_IMAGE . $this->request->post['hover_image'])) {
			$data['thumb_hover'] = $this->model_tool_image->resize($this->request->post['hover_image'], 100, 100);
		} elseif (!empty($category_info) && is_file(DIR_IMAGE . $category_info['hover_image'])) {
			$data['thumb_hover'] = $this->model_tool_image->resize($category_info['hover_image'], 100, 100);
		} else {
			$data['thumb_hover'] = $this->model_tool_image->resize('no_image.png', 100, 100);
		}

		// $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		// if (isset($this->request->post['top'])) {
		// 	$data['top'] = $this->request->post['top'];
		// } elseif (!empty($category_info)) {
		// 	$data['top'] = $category_info['top'];
		// } else {
		// 	$data['top'] = 0;
		// }

		// if (isset($this->request->post['column'])) {
		// 	$data['column'] = $this->request->post['column'];
		// } elseif (!empty($category_info)) {
		// 	$data['column'] = $category_info['column'];
		// } else {
		// 	$data['column'] = 1;
		// }

		// if (isset($this->request->post['sort_order'])) {
		// 	$data['sort_order'] = $this->request->post['sort_order'];
		// } elseif (!empty($category_info)) {
		// 	$data['sort_order'] = $category_info['sort_order'];
		// } else {
		// 	$data['sort_order'] = 0;
		// }

		// if (isset($this->request->post['status'])) {
		// 	$data['status'] = $this->request->post['status'];
		// } elseif (!empty($category_info)) {
		// 	$data['status'] = $category_info['status'];
		// } else {
		// 	$data['status'] = true;
		// }

		// if (isset($this->request->post['category_layout'])) {
		// 	$data['category_layout'] = $this->request->post['category_layout'];
		// } elseif (isset($this->request->get['program_id'])) {
		// 	$data['category_layout'] = $this->model_catalog_category->getCategoryLayouts($this->request->get['program_id']);
		// } else {
		// 	$data['category_layout'] = array();
		// }

		// $this->load->model('design/layout');

		//$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('program/program_form.tpl',$data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'program/program')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['program_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}

			
		}

		return !$this->error;
	}



	/****************************************************/
	public function add() {
		$this->language->load('program/program');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('program/program');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_program_program->addProgram($this->request->post);

			print_r(111);exit;

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

			$this->response->redirect($this->url->link('program/program', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}



}