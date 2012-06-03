<?php 
	class Companies extends MY_Controller {
		
		function __construct() {
			
			parent::__construct();
			
			$this->load->model("Model_Companies");
			$this->Model_Companies->setTable("companies");
		
		}
		
		function register_page() {
		
			
			$template["pageTitle"] = "Registro de Empresa";
			
			$template["content"] = $this->load->view($this->config->item("template")."includes/companies/register_form",null,true);
			
		}
		
		function register_post() {
		
			
		
		}
		
		function view($id) {
			
			$query_company = $this->Model_Companies->_getById($id);
			
			print_r($query_companie);
			
			if($query_company->num_rows() == 1) {
				
				$row_company = $query_company->row();
			
				$query_services = $this->Model_Companies->getCompanyServices($row_company->id_companies);
				$query_jobs = $this->Model_Companies->getCompanyJobs($row_company->id_companies);
				
				$data_content['company'] = $row_company;
				$data_content['services'] = $query_services;
				$data_content['jobs'] = $query_jobs;
			
				
				$template["pageTitle"] = "Compañia - ".$row_company->name;
				$template["content"] = $this->load->view($this->config->item("template")."includes/companies/detail_page",true);
				
				$this->load->view($this->config->item("template")."template_1",$template);
				
			}
	
			
			
			
		} 
	
	}
?>