<?php 
class ControllerExtensionPaymentPzopencart extends Controller {
	private $error = array(); 

	public function index() {
		$this->load->language('extension/payment/pzopencart');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('pzopencart', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['entry_module'] = $this->language->get('entry_module');
		$data['entry_module_id'] = $this->language->get('entry_module_id');
		
		$data['entry_order_status'] = $this->language->get('entry_order_status');	
		$data['entry_order_fail_status'] = $this->language->get('entry_order_fail_status');	
		$data['entry_status'] = $this->language->get('entry_status');
		
		//$data['entry_currency'] = $this->language->get('entry_currency');
		//$data['help_currency'] = $this->language->get('help_currency');
		
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');		
				
		$data['entry_merchant'] = $this->language->get('entry_merchant');
		$data['entry_workingkey'] = $this->language->get('entry_workingkey');
		$data['entry_partner_name'] = $this->language->get('entry_partner_name');
		
		$data['entry_partner_id'] = $this->language->get('entry_partner_id');
		$data['entry_partner_testurl'] = $this->language->get('entry_partner_testurl');
		$data['entry_partner_liveurl'] = $this->language->get('entry_partner_liveurl');
		$data['entry_ipaddress'] = $this->language->get('entry_ipaddress');
		$data['entry_test'] = $this->language->get('entry_test');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
      

 		if ($this->error) {
			$data = array_merge($data,$this->error);
		} 
		
  		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true),
      		'separator' => ' :: '
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('extension/payment/pzopencart', 'token=' . $this->session->data['token'], true),
      		'separator' => ' :: '
   		);
				
		$data['action'] = $this->url->link('extension/payment/pzopencart', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['pzopencart_module'])) {
			$data['pzopencart_module'] = $this->request->post['pzopencart_module'];
		} else {
			$data['pzopencart_module'] = $this->config->get('pzopencart_module');
		}
		
		
		
		
		if (isset($this->request->post['pzopencart_pz_merchant'])) {
			$data['pzopencart_pz_merchant'] = $this->request->post['pzopencart_pz_merchant'];
		} else {
			$data['pzopencart_pz_merchant'] = $this->config->get('pzopencart_pz_merchant');
		}
		
		if (isset($this->request->post['pzopencart_pz_workingkey'])) {
			$data['pzopencart_pz_workingkey'] = $this->request->post['pzopencart_pz_workingkey'];
		} else {
			$data['pzopencart_pz_workingkey'] = $this->config->get('pzopencart_pz_workingkey');
		}
		
		
		if (isset($this->request->post['pzopencart_pz_partner_name'])) {
			$data['pzopencart_pz_partner_name'] = $this->request->post['pzopencart_pz_partner_name'];
		} else {
			$data['pzopencart_pz_partner_name'] = $this->config->get('pzopencart_pz_partner_name');
		}

		
		
		if (isset($this->request->post['pzopencart_pz_partner_id'])) {
			$data['pzopencart_pz_partner_id'] = $this->request->post['pzopencart_pz_partner_id'];
		} else {
			$data['pzopencart_pz_partner_id'] = $this->config->get('pzopencart_pz_partner_id');
		}
		
		/* New Code Starts here */
		if (isset($this->request->post['pzopencart_pz_testurl'])) {
			$data['pzopencart_pz_testurl'] = $this->request->post['pzopencart_pz_testurl'];
		} else {
			$data['pzopencart_pz_testurl'] = $this->config->get('pzopencart_pz_testurl');
		}
		
		
		if (isset($this->request->post['pzopencart_pz_liveurl'])) {
			$data['pzopencart_pz_liveurl'] = $this->request->post['pzopencart_pz_liveurl'];
		} else {
			$data['pzopencart_pz_liveurl'] = $this->config->get('pzopencart_pz_liveurl');
		}
		
		/* New Code Ends here */
		
		
		
		if (isset($this->request->post['pzopencart_pz_ipaddress'])) {
			$data['pzopencart_pz_ipaddress'] = $this->request->post['pzopencart_pz_ipaddress'];
		} else {
			$data['pzopencart_pz_ipaddress'] = $this->config->get('pzopencart_pz_ipaddress');
		}
		
		
		
		
		
		/* if (isset($this->request->post['pzopencart_currency'])) {
			$data['pzopencart_currency'] = $this->request->post['pzopencart_currency'];
		} else {
			$data['pzopencart_currency'] = $this->config->get('pzopencart_currency'); 
		}  */
				
		if (isset($this->request->post['pzopencart_order_status_id'])) {
			$data['pzopencart_order_status_id'] = $this->request->post['pzopencart_order_status_id'];
		} else {
			$data['pzopencart_order_status_id'] = $this->config->get('pzopencart_order_status_id'); 
		} 

		if (isset($this->request->post['pzopencart_order_fail_status_id'])) {
			$data['pzopencart_order_fail_status_id'] = $this->request->post['pzopencart_order_fail_status_id'];
		} else {
			$data['pzopencart_order_fail_status_id'] = $this->config->get('pzopencart_order_fail_status_id'); 
		} 
		
		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['pzopencart_geo_zone_id'])) {
			$data['pzopencart_geo_zone_id'] = $this->request->post['pzopencart_geo_zone_id'];
		} else {
			$data['pzopencart_geo_zone_id'] = $this->config->get('pzopencart_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');
										
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['pzopencart_status'])) {
			$data['pzopencart_status'] = $this->request->post['pzopencart_status'];
		} else {
			$data['pzopencart_status'] = $this->config->get('pzopencart_status');
		}
		
		
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

				
		$this->response->setOutput($this->load->view('extension/payment/pzopencart.tpl', $data));
	}

	private function validate() {
		$flag=false;
		
		if (!$this->user->hasPermission('modify', 'extension/payment/pzopencart')) {
			$this->error['error_warning'] = $this->language->get('error_permission');
		}
		
		//Pzopencart both parameters mandatory
		if($this->request->post['pzopencart_pz_merchant'] || $this->request->post['pzopencart_pz_workingkey']) {
			if (!$this->request->post['pzopencart_pz_merchant']) {
				$this->error['error_merchant'] = $this->language->get('error_merchant');
			}
			
			if (!$this->request->post['pzopencart_pz_workingkey']) {
				$this->error['error_salt'] = $this->language->get('error_workingkey');
			}
		}
		if($this->request->post['pzopencart_pz_merchant'] && $this->request->post['pzopencart_pz_workingkey']) {
			$flag=true;	
		}
		
		
		if (!$this->request->post['pzopencart_module']) {
			$this->error['error_module'] = $this->language->get('error_module');
		}
		
		if (!$this->request->post['pzopencart_pz_testurl']) {
			$this->error['error_module'] = $this->language->get('error_module');
		}
		
		/* if(!$this->request->post['pzopencart_currency'] || strlen($this->request->post['pzopencart_currency']) < 3)
		{
			$this->error['error_currency'] = $this->language->get('error_currency');
		}
		else {
			$this->request->post['pzopencart_currency'] = strtoupper($this->request->post['pzopencart_currency']);
		} */
		
		if(!$flag && $this->request->post['pzopencart_status'] == '1')
		{
			$this->error['error_status'] = $this->language->get('error_status');
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>