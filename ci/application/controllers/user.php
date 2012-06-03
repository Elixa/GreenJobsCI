<?php 
	class User extends MY_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->library("form_validation");
			
			$this->load->model("Model_Users");
			$this->Model_Users->setTable("usuarios");
		
			
			
		}
		
		function login_page() {
	

		}
		
		function logon_post() {
		
			if($_POST) {
				
				$query = $this->Model_Users->login($this->input->post("txtUsername"));
				
				if($query->num_rows() == 1) {
					
					$_SESSION["user"]["name"];
				}
				
			}
		
		
		}
		
		function register_page() {
			
			$template["pageTitle"] = "Registro Usuario";
			$template["content"] = $this->load->view($this->config->item("template")."includes/users/register_form",null,true);
			
			$this->load->view($this->config->item("template")."template_1",$template);
			
		}
		
		
		function job_form() {
			
			$template["pageTitle"] = "Agregar Empleo";
			$template["content"] = $this->load->view($this->config->item("template")."includes/users/jobs_form",null,true);
			
			$this->load->view($this->config->item("template")."template_1",$template);
			
		}
		
		function service_form() {
			
			$template["pageTitle"] = "Agregar Servicio";
			$template["content"] = $this->load->view($this->config->item("template")."includes/services/services_form",null,true);
			
			$this->load->view($this->config->item("template")."template_1",$template);
			
		}
		
		function proposal_form() {
			
			$template["pageTitle"] = "Agregar Servicio";
			$template["content"] = $this->load->view($this->config->item("template")."includes/proposal/proposal_form",null,true);
			
			$this->load->view($this->config->item("template")."template_1",$template);
			
		}
		
		function register_post() {
			
			if($_POST) {
			
				if($this->validation_register()) {
				
					$data = array(
						"user" => $this->input->post("txtUser"),
						"name" => $this->input->post("txtName"),
						"pass" => $this->input->post("txtPass"),
						"charge" => 1,
						"phone" => $this->input->post("txtPhone"),
						"level" => 1,
						"city" => $this->input->post("txtCity"),
						"country" => $this->input->post("txtCountry"),
					);
				
					$this->Model_User->_insert($data);
					
					
					
				
				} 
				else {
					
					redirect("user/register_page");
					
				}
			
			} else {
				die();
			}
			
		}
		
		function view($id) {
			
			/*$query_user = $this->Model_Companies->getCompanyById($id);
			
			if($query_company->num_rows() == 1) {
				
				$row_company = $query_company->row();
			
				$query_services = $this->Model_Companies->getComapanyServices($row_company->id_companies);
				
				$data_content['company'] = $row_company;
				$data_content['services'] = $query_services;
				
			*/
				$template["pageTitle"] = "Compañia";
				$template["content"] = $this->load->view($this->config->item("template")."includes/users/detail_page",null,true);
				
				$this->load->view($this->config->item("template")."template_1",$template);
				
			//}
		
		}
		
		
		function validation_register() {
	
			
			$this->form_validation->set_rules('txtUser', 'Usuarío', 'required');
			$this->form_validation->set_rules('txtPass', 'Contraseña', 'required');
			$this->form_validation->set_rules('ptxtPassTwo', 'Conformación de Contraseña', 'required');
			$this->form_validation->set_rules('txtEmail', 'Email', 'required');
			
			return $this->form_validation->run();
			
		}
		
	
	}
?>