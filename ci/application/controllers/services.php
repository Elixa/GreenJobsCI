<?php 
	class Services extends MY_Controller {
	
		function __construct() {
			parent::__construct();
		}
	
		function index() {
		
			$data['services'] = $this->db->get("services");
			
			$template["pageTitle"] = "Servicios";
			
			$template["content"] = $this->load->view($this->config->item("template")."includes/services/list",$data,true);
				
			$this->load->view($this->config->item("template")."template_1",$template);
				
		}
	
	}
?>