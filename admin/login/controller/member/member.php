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



public function call_start($call_id)
{
	$call_data = $this->model_member_member->getCallDetails($call_id);
	$pack_id = $call_data[0]['package_id'];
	$customer_id = $call_data[0]['customer_id'];
	$this->load->model('scheduler/scheduler');
	$data = $this->model_scheduler_scheduler->getCustomerDetails($customer_id,$pack_id);

	$pack_name = $data['package'][0]['package_name'];
	$firstname = $data['customer'][0]['firstname'];	
	$lastname = $data['customer'][0]['lastname'];
	$email = $data['customer'][0]['email'];

	$link = 'http://demo.proxanttech.com/vc_fitness/';

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
				<p><b> Your call has been schedule Now.</b></p>
				<br/>
				<p>Please Click on Link For video Call : <a href="'.$link.'">Call Start</a></p> 
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
	//print_r($msg);exit;
$mailheaders  = 'MIME-Version: 1.0' . "\r\n";
$mailheaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mailheaders .= 'From: VC Fitness <info@vinodchanna.com>' . "\r\n";
//$resp = mail($to,$subject,$msg,$mailheaders);
$resp = 1;
if($resp)
{
	 $call_data = $this->model_member_member->update_call_status($call_id);
	 // print_r($call_data);exit;
}

}


	public function call_session_start() {


		$this->language->load('member/member');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('member/member');
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
			//$this->response->redirect($this->url->link('member/member', 'token=' . $this->session->data['token'] . $url, 'SSL'));

			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 10; $i++) {
			    $randomString .= $characters[rand(0, $charactersLength - 1)];
			}

			?>
			<script type="text/javascript">
			var resp = '<?php echo $randomString; ?>';
			// alert(resp);
				window.open(
                  'http://www.pkfood.in:8443/'+resp+'',
                  '_blank' // <- This is what makes it open in a new window.
                );
			</script>

<?php

			//header("Location: http://www.pkfood.in:8443/$randomString");
		}
		$this->getList();

	}



	protected function validateSession() {

		if (!$this->user->hasPermission('modify', 'member/member')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}
}