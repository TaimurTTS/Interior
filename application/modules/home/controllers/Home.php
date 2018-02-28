<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(1);
class Home extends MX_Controller { 

  function __construct()  
  { 
    parent::__construct();
    $this->load->helper('url');

    $this->load->library(array('form_validation', 'email', 'session', 'pagination', 'upload'));
    $this->load->model('home_model','home_model');
    $this->load->model(array("admin_manager", "main_manager", 'joins_manager'));
  }

  public function index()
  {
    $data['slider'] = $this->home_model->getSlider();
    $data['category'] = $this->home_model->getCategory();
    $tmpArr = [];
    // foreach ($data['category'] as $key => $value) {
    //   if(($key + 1) % 2 == 0) {
    //     array_push($tmpArr, ($key+1).' col lg 5');
    //   }  else if(($key + 1) % 3 == 0) {
    //     array_push($tmpArr, ($key+1).' col lg 4');
    //   } else {
    //     array_push($tmpArr, ($key+1).' col lg 7');
    //   }
    // }
    // echo "<pre>";
    // var_dump($tmpArr);
    // die;
    $this->load->view('header');
    $this->load->view('home/index',$data);
  }
}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
