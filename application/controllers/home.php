<?php 

class Home extends MY_Controller {

	function index() {
		
		$template["pageTitle"] = "Inicio";
		$template["content"] = "Inicio";
		
		$this->load->view($this->config->item("template")."template_1",$template);
	
	}

}