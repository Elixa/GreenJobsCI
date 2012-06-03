<?php 
	class Jobs extends MY_Controller {
	
		function __construct() {
			parent::__construct();
		}
	
		function index() {
		
			$data['jobs'] = $this->db->get("jobs");
			
			$template["pageTitle"] = "Lista de Empleos";
			
			$template["content"] = $this->load->view($this->config->item("template")."includes/jobs/list",$data,true);
				
			$this->load->view($this->config->item("template")."template_1",$template);
				
		}
	
	}
?>