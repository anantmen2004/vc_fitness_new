<?php

class ControllerOnetomanyOnetomany extends Controller {

	private $error = array();
	public function index() {

		// print_r(121212);exit;

		$this->language->load('onetomany/onetomany');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('onetomany/onetomany');
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
			'href' => $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . $url, 'SSL')
			);

		$data['add'] = $this->url->link('onetomany/onetomany/add', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['delete'] = $this->url->link('onetomany/onetomany/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['repair'] = $this->url->link('onetomany/onetomany/repair', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['call_session_start'] = $this->url->link('onetomany/onetomany/call_session_start', 'token=' . $this->session->data['token'] . $url, 'SSL');

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

		$onetomany_total = $this->model_onetomany_onetomany->getTotalOnetomany();
		$results = $this->model_onetomany_onetomany->getAllCustomer($filter_data);
	 	//echo "<pre>"; print_r($results);exit;
		foreach ($results as $result) {
			if($result['status'] == '0'){
				$status = "Active";
			}

			else{
				$status = "Inactive";
			}

			$data['customer'][] = array(
				'sr_no' => $result['srno'],
				'customer_id'        => $result['customer_id'],
				'fname'        => $result['firstname'],
				'lname'        => $result['lastname'],
				'date'        => $result['date'],
				'time'        => $result['time'],
				'call_no'        => $result['call_no'],
				'sort_order'  => "ASC",
				'status'  => $status,
				'edit'        => $this->url->link('onetomany/onetomany/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $result['customer_id'] . $url, 'SSL'),
				'delete'      => $this->url->link('onetomany/onetomany/delete', 'token=' . $this->session->data['token'] . '&customer_id=' . $result['customer_id'] . $url, 'SSL')

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
		$data['sort_name'] = $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');

		$data['sort_sort_order'] = $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . '&sort=sort_order' . $url, 'SSL');



		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		$data['token'] = $this->session->data['token'];

		$pagination = new Pagination();
		$pagination->total = $onetomany_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($onetomany_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($onetomany_total - $this->config->get('config_limit_admin'))) ? $onetomany_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $onetomany_total, ceil($onetomany_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;

		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('onetomany/onetomany_list.tpl', $data));

	}



	/**************************************************************/



	public function edit() {

		$this->language->load('onetomany/onetomany');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('onetomany/onetomany');
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

			// print_r(1233);exit;

			$this->model_onetomany_onetomany->editOnetomany($this->request->get['customer_id'], $this->request->post);

			$this->send_call_mail($this->request->get['customer_id'],$this->request->post);

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
			$this->response->redirect($this->url->link('onetomany/onetomany/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $this->request->get['customer_id'] . $url, 'SSL'));		
		}
		$this->getForm();
	}



	protected function getForm() {

// 		 print_r($this->request->get['customer_id']);exit;

		$data['heading_title'] = $this->language->get('heading_title');



		$data['text_form'] = !isset($this->request->get['customer_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$data['text_none'] = $this->language->get('text_none');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_onetomany_type'] = $this->language->get('entry_onetomany_type');
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

			'href' => $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . $url, 'SSL')

			);

		if (!isset($this->request->get['customer_id'])) {

			$data['action'] = $this->url->link('onetomany/onetomany/add', 'token=' . $this->session->data['token'] . $url, 'SSL');

		} else {

			$data['action'] = $this->url->link('onetomany/onetomany/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $this->request->get['customer_id'] . $url, 'SSL');



			$data['call_start'] = $this->url->link('onetomany/onetomany/call_start');

		}



		$data['cancel'] = $this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['token'] = $this->session->data['token'];
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();

		//$data['onetomany_types'] = $this->model_onetomany_onetomany->getOnetomanyTypes();
		if (isset($this->request->get['customer_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {

			$onetomany_info = $this->model_onetomany_onetomany->getCustomerPackageHistory($this->request->get['customer_id']);

			$call_info = $this->model_onetomany_onetomany->getCustomerCall($this->request->get['customer_id']);

			$video = $this->model_onetomany_onetomany->getAllVideo();
			//print_r($video);exit;

		}
		$cnt = count($onetomany_info);

		// echo "<pre>";print_r($call_info);exit;
		for ($i=0; $i <$cnt ; $i++) { 
			if (isset($this->request->post['fname'])) {
				$data['fname'] = $this->request->post['fname'];
			} elseif (!empty($onetomany_info)) {
				$data['fname'] = $onetomany_info[$i]['firstname'];
			} else {
				$data['fname'] = '';
			}

			if (isset($this->request->post['lname'])) {
				$data['lname'] = $this->request->post['lname'];
			} elseif (!empty($onetomany_info)) {
				$data['lname'] = $onetomany_info[$i]['lastname'];
			} else {
				$data['lname'] = '';
			}


			if (isset($this->request->post['comment'])) {

				$data['comment'] = $this->request->post['comment'];

			} elseif (!empty($onetomany_info)) {

				$data['comment'] = $onetomany_info[$i]['comment'];

			} else {

				$data['comment'] = '';

			}



			if (isset($this->request->post['package_name'])) {

				$data['package_name'] = $this->request->post['package_name'];

			} elseif (!empty($onetomany_info)) {

				$data['package_name'] = $onetomany_info[$i]['package_name'];

			} else {

				$data['package_name'] = '';

			}



			if (isset($this->request->post['package_id'])) {

				$data['package_id'] = $this->request->post['package_id'];

			} elseif (!empty($onetomany_info)) {

				$data['package_id'] = $onetomany_info[$i]['package_id'];

			} else {

				$data['package_id'] = '';

			}



			if (isset($this->request->post['customer_id'])) {

				$data['customer_id'] = $this->request->post['customer_id'];

			} elseif (!empty($onetomany_info)) {

				$data['customer_id'] = $onetomany_info[$i]['customer_id'];

			} else {

				$data['customer_id'] = '';

			}



			if (isset($this->request->post['package_call'])) {

				$data['package_call'] = $this->request->post['package_call'];

			} elseif (!empty($onetomany_info)) {

				$data['package_call'] = $onetomany_info[$i]['package_call'];

			} else {

				$data['package_call'] = '';

			}



			if (isset($this->request->post['start_date'])) {

				$data['start_date'] = $this->request->post['start_date'];

			} elseif (!empty($onetomany_info)) {

				$data['start_date'] = date("d-m-Y",strtotime($onetomany_info[$i]['start_date']));

			} else {

				$data['start_date'] = '';

			}



			if (isset($this->request->post['end_date'])) {

				$data['end_date'] = $this->request->post['end_date'];

			} elseif (!empty($onetomany_info)) {

				$data['end_date'] = date("d-m-Y",strtotime($onetomany_info[$i]['end_date']));

			} else {

				$data['end_date'] = '';

			}



			if (isset($this->request->post['duration'])) {

				$data['duration'] = $this->request->post['duration'];

			} elseif (!empty($onetomany_info)) {

				$data['duration'] = $onetomany_info[$i]['duration'];

			} else {

				$data['duration'] = '';

			}



			if (isset($this->request->post['entry_date'])) {

				$data['entry_date'] = $this->request->post['entry_date'];

			} elseif (!empty($onetomany_info)) {

				$data['entry_date'] = date("d-m-Y",strtotime($onetomany_info[$i]['date_added']));

			} else {

				$data['entry_date'] = '';

			}





			if (isset($this->request->post['status'])) {

				$data['status'] = $this->request->post['pack_status'];

			} elseif (!empty($onetomany_info)) {

				$data['status'] = $onetomany_info[$i]['pack_status'];

			} else {

				$data['status'] = true;

			}

		// echo "<pre>";print_r($onetomany_info);exit;

			$data['onetomany_description'][$i]= array(

				'fname' => $data['fname'],

				'lname' => $data['lname'],

				'package_id' => $data['package_id'],

				'customer_id' => $data['customer_id'],

				'comment' => $data['comment'],

				'duration' => $data['duration'],

				'package_call' => $data['package_call'],

				'package_name' => $data['package_name'],

				'start_date' => $data['start_date'],

				'end_date' => $data['end_date'],

				'entry_date' => $data['entry_date'],

				'status' => $data['status'],
				);
		}


		$call_cnt = COUNT($call_info);

		for ($j=0; $j < $call_cnt; $j++) {

			if (isset($this->request->post['package_id'])) {
				$data['package_id'] = $this->request->post['package_id'];
			} elseif (!empty($call_info)) {
				$data['package_id'] = $call_info[$j]['package_id'];
			} else {
				$data['package_id'] = true;
			} 

			if (isset($this->request->post['date'])) {
				$data['date'] = $this->request->post['date'];
			} elseif (!empty($call_info)) {
				$data['date'] = $call_info[$j]['date'];
			} else {
				$data['date'] = true;
			}

			if (isset($this->request->post['time'])) {
				$data['time'] = $this->request->post['time'];

			} elseif (!empty($call_info)) {

				$data['time'] = $call_info[$j]['time'];

			} else {

				$data['time'] = true;

			}



			if (isset($this->request->post['call_no'])) {
				$data['call_no'] = $this->request->post['call_no'];
			} elseif (!empty($call_info)) {
				$data['call_no'] = $call_info[$j]['call_no'];
			} else {
				$data['call_no'] = true;
			}

			if (isset($this->request->post['admin_comment'])) {
				$data['admin_comment'] = $this->request->post['call_no'];
			} elseif (!empty($call_info)) {
				$data['admin_comment'] = $call_info[$j]['admin_comment'];
			} else {
				$data['admin_comment'] = true;
			}

			if (isset($this->request->post['video_id'])) {
				$data['video_id'] = $this->request->post['video_id'];
			} elseif (!empty($call_info)) {
				$data['video_id'] = $call_info[$j]['video_id'];
			} else {
				$data['video_id'] = true;
			}



			if (isset($this->request->post['status'])) {

				$data['status'] = $this->request->post['status'];

			} elseif (!empty($call_info)) {

				$data['status'] = $call_info[$j]['status'];

			} else {

				$data['status'] = true;

			}



			if (isset($this->request->post['complete_status'])) {

				$data['complete_status'] = $this->request->post['complete_status'];

			} elseif (!empty($call_info)) {

				$data['complete_status'] = $call_info[$j]['complete_status'];

			} else {

				$data['complete_status'] = true;

			}



			$data['video'] = $video;

			$data['call'][$j]= array(
				'package_id' => $data['package_id'],
				'call_no' => $data['call_no'],
				'admin_comment' => $data['admin_comment'],
				'video_id' => $data['video_id'],
				'date' => $data['date'],
				'time' => $data['time'],
				'status' => $data['status'],
				'complete_status' => $data['complete_status'],
				);



		}

		//echo "<pre>";print_r($data['call']);exit;



		$data['header'] = $this->load->controller('common/header');

		$data['column_left'] = $this->load->controller('common/column_left');

		$data['footer'] = $this->load->controller('common/footer');

		//echo "<pre>";print_r($data);exit;



		$this->response->setOutput($this->load->view('onetomany/onetomany_form.tpl',$data));

	}



	protected function validateForm() {

		if (!$this->user->hasPermission('modify', 'onetomany/onetomany')) {

			$this->error['warning'] = $this->language->get('error_permission');

		}



		// foreach ($this->request->post['onetomany_description'] as $language_id => $value) {

		// 	if ((utf8_strlen($value['name']) < 2) || (utf8_strlen($value['name']) > 255)) {

		// 		$this->error['name'][$language_id] = $this->language->get('error_name');

		// 	}

		// }



		return !$this->error;

	}

	/****************************************************/

	function send_call_mail($customer_id,$call_data)

	{

		//print_r($call_data);exit;

		$pack_id = $call_data['package_id'];

		$this->load->model('scheduler/scheduler');

		$data = $this->model_scheduler_scheduler->getCustomerDetails($customer_id,$pack_id);

		

		$pack_name = $data['package'][0]['package_name'];

		$firstname = $data['customer'][0]['firstname'];	

		$lastname = $data['customer'][0]['lastname'];

		$email = $data['customer'][0]['email'];	

		$date = date("d-m-Y",strtotime($call_data['date']));

		$time = $call_data['time'];

		//echo "<pre>";print_r($customer_name);exit;
		$from = 'info@vinodchanna.com';
		$to = $email;
		$subject="Call Sheduling Details";
		$msg  = "";
		$msg .='
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>VC Fitness</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<style type="text/css">    
				body {
					margin-left:100px;
					margin-right:100px;
				}
			.TextCss {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
				color:#333333 ;
				padding:45px;
			}    
		</style>
	</head>
	<body>
		<div class="container" style="width:700px;">
			<div style="background:#fff; border: 1px solid #b3b3b3; width:650;">
				<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">
					<img src="http://demo.proxanttech.com/vc_fitness/public/images/logo.png"  style="align:center; height:150px width: 200px;" />
				</div>
				<br/>
				<div style="background:#d9d9d9; padding:30px;height:auto; text-align:justify;" >
					<b>Dear '.$firstname.',</b>
					<br/>
					<br/>
					<p> Your call has been schedule on : '.$date.' at : '.$time.'</b></p>
					<br/>
					<footer>
						<b>Thanks & Regards,</b>
						<br/>
						VC Fitness<br/>
						<b>Mr. Vinod Channa</b><br/>
						Conact no.: 022 65556512<br/>
						ADD- 98/3446, <br/>
						Mumbai 400024.
					</footer> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>';	
	// print_r($msg);exit;
$mailheaders  = 'MIME-Version: 1.0' . "\r\n";
$mailheaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailheaders .= 'From: VC Fitness <info@vinodchanna.com>' . "\r\n";
mail($to,$subject,$msg,$mailheaders);
// print_r($msg);exit;
}
public function call_start($call_id)
{
	// echo "111";print_r($call_data);exit;
	$call_data = $this->model_onetomany_onetomany->getCallDetails($call_id);
	//$call_data = $this->request->post;
	//print_r($data);exit;
	$pack_id = $call_data[0]['package_id'];
	$customer_id = $call_data[0]['customer_id'];
	//print_r($pack_id);exit;
	$this->load->model('scheduler/scheduler');
	$data = $this->model_scheduler_scheduler->getCustomerDetails($customer_id,$pack_id);
	//echo "<pre>";print_r($data);exit;
	$pack_name = $data['package'][0]['package_name'];
	$firstname = $data['customer'][0]['firstname'];	
	$lastname = $data['customer'][0]['lastname'];
	$email = $data['customer'][0]['email'];	
	$date = date("d-m-Y",strtotime($call_data[0]['date']));
	$time = $call_data[0]['time'];
	$link = 'http://demo.proxanttech.com/vc_fitness/';
		// echo "<pre>";print_r($firstname);exit;
	$from = 'info@vinodchanna.com';
	$to = $email;
	$subject="Call Sheduling Details";
	$msg  = "";
	$msg .='<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>VC Fitness</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style type="text/css">    
			body {
				margin-left:100px;
				margin-right:100px;
			}
	</style>
</head>
<body>
	<div class="container" style="width:700px;">
		<div style="background:#fff; border: 1px solid #b3b3b3; width:650;">
			<div style="margin-left:10px; margin-top: 10px; margin-bottom: 0px;">
				<img src="http://demo.proxanttech.com/vc_fitness/public/images/logo.png"  style="align:center; height:150px width: 200px;" />
			</div>
			<br/>
			<div style="background:#d9d9d9; padding:30px;height:auto; text-align:justify;" >
				<b>Dear '.$firstname.',</b>
				<br/>
				<br/>
				<p><b> Your call has been schedule on : '.$date.' at : '.$time.'</b></p>
				<br/>
				<p>Click on Link For video Call : <a href="'.$link.'">Call Start</a></p> 
				<footer>
					<b>Thanks & Regards,</b>
					<br/>
					VC Fitness<br/>
					<b>Mr. Vinod Channa</b><br/>
					Conact no.: 022 65556512<br/>
					ADD- 98/3446, <br/>
					Mumbai 400024.
				</footer> 
			</div>
		</div>
	</div>
</div>
</body>
</html>';	
	print_r($msg);exit;
$mailheaders  = 'MIME-Version: 1.0' . "\r\n";
$mailheaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailheaders .= 'From: VC Fitness <info@vinodchanna.com>' . "\r\n";
//mail($to,$subject,$msg,$mailheaders);

 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 6; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
echo $randomString;

//echo mt_rand();

}


	public function call_session_start() {


		$this->language->load('onetomany/onetomany');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('onetomany/onetomany');
		if (isset($this->request->post['selected']) && $this->validateSession()) {
			foreach ($this->request->post['selected'] as $call_id) {
				//print_r($call_id);
				$this->call_start($call_id);
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
			$this->response->redirect($this->url->link('onetomany/onetomany', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}
		$this->getList();

	}



	protected function validateSession() {

		if (!$this->user->hasPermission('modify', 'onetomany/onetomany')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}
}