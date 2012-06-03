<?php 
	class User extends MY_Controller {
		
		function __construct() {
			
			$this->load->model("Model_User");
			$this->Model_User->setTable("usuarios");
		
			
			
		}
		
		function login_page() {
	

		}
		
		function logon_post() {
		
		
		}
		
		function register_page() {
			
			$template["pageTitle"] = "Registro Usuario";
			$template["content"] = $this->load->view($this->config->item("template")."includes/users/register_form",null,true);
			
			$this->load->view($this->config->item("template")."template_1",$template);
			
		}
		
		function register_post() {
			
			if($_POST) {
			
				if($this->validation_register()) {
				
					$data = array(
						"" => $this->input->post("txtNombre")
					);
				
					$this->Model_User->_insert($data)
				
				} 
				else {
					
					redirect("user/register_page");
					
				}
			
			} else {
				die();
			}
			
		}
		
		function detail_page() {
			
		
		}
		
		
		function validation_register() {
		
			$this->load->library("form_validation");
			
			$this->form_validation->set_rules('txtUser', 'Usuar�o', 'required');
			$this->form_validation->set_rules('txtPass', 'Contrase�a', 'required');
			$this->form_validation->set_rules('ptxtPassTwo', 'Conformaci�n de Contrase�a', 'required');
			$this->form_validation->set_rules('txtEmail', 'Email', 'required');
			
			return $this->form_validation->run();
			
		}
		
	
	}
?>