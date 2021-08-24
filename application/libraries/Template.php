<?php
class Template {
	protected $_ci;

	function __construct() {
			$this->_ci = &get_instance(); 
		}

		function views1($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_jsAdmin', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_template', $data, TRUE);
			}
		}

		function views2($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_jsAluno', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_template', $data, TRUE);
			}
		}

		function views3($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_jsProfessor', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_template', $data, TRUE);
			}
		}
		function views4($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_jsClasseAdm', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_template', $data, TRUE);
			}
		}
		function views5($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template/_jsDisciplina', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template/_template', $data, TRUE);
			}
		}

		function view_professor($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				 $data['_meta'] 					= $this->_ci->load->view('template_professor/_meta', $data, TRUE);
				 $data['_css'] 					= $this->_ci->load->view('template_professor/_css', $data, TRUE);
				
				// Header
				$data['_nav'] 				= $this->_ci->load->view('template_professor/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('template_professor/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('template_professor/_sidebar', $data, TRUE);
				
				//Content
				$data['_headerContent'] 	= $this->_ci->load->view('template_professor/_headerContent', $data, TRUE);

				$data['_mainContent'] 		= $this->_ci->load->view($template, $data, TRUE);

				$data['_content'] 				= $this->_ci->load->view('template_professor/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('template_professor/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('template_professor/_js', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('template_professor/_template', $data, TRUE);
			}
		}


             

	}
	?>