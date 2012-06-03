<?php 

class Home extends MY_Controller {

	function index() {
		
		$template["pageTitle"] = "Inicio";

		$template["content"] = $this->load->view($this->config->item("template")."includes/index",null,true);
		$template["slide"] = 1;
		
		$this->load->view($this->config->item("template")."template_1",$template);
	
	}

}