<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting('1');
class Profile extends MX_Controller { 
	
	function __construct()  
	{ 
		parent::__construct();
		if(!$this->session->userdata('user_id'))
		{
		   header('location:'.base_url().'login');
		  
		}
		$this->load->library(array('form_validation', 'email', 'session', 'pagination', 'upload'));
        $this->load->model('profile_model','profile_model');
        $this->load->model(array("admin_manager", "main_manager", 'joins_manager'));

	}	
  public function publicProfile()
	{
      echo 1;  	
	}
  
}
 
/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
