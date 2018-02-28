<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(1);
class Admin extends MX_Controller { 

  function __construct()  
  { 
    parent::__construct();
    $this->load->helper('url');

    $this->load->library(array('form_validation', 'email', 'session', 'pagination', 'upload'));
    $this->load->model('admin_model','admin_model');
    // $this->load->model(array("admin_manager", "/main_manager", 'joins_manager'));
  }

  public function index()
  {
    // $final_data['company'] = $this->user_model->getCompanyData();
    // $final_data['application'] = $this->user_model->getActiveApplicationData();
    $this->load->view('admin/login');
    return true;
  }

  public function login()
  {
    if($_POST) {
      $data['username'] = strip_tags($this->input->post('username'));
      $data['password'] = strip_tags($this->input->post('password'));

      $login_data = $this->admin_model->adminAuth($data);
      if($login_data == 0) {
        echo json_encode(array('success' => false, 'message' => 'Incorrect Password !'));
      } else if($login_data == 1) {
        echo json_encode(array('success' => false, 'message' => 'Your account is blocked !'));
      } else if($login_data == 2) {
        echo json_encode(array('success' => true, 'message' => 'Authentication Successful  !'));
      } else if(!$login_data) {
        echo json_encode(array('success' => false, 'message' => 'User Not Found !'));
      }
    }
  }

  public function slider()
  {
    if($_SESSION['is_admin']) {

      $data['slider'] = $this->admin_model->getSlider();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar',$data);
      $this->load->view('admin/slider');
      return true;
    } else {
        redirect(base_url().'admin');
    }
  }

  public function addSlider()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['alternateText'] = strip_tags($this->input->post('alternateText'));
        $data['tagline'] = strip_tags($this->input->post('tagline'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));
        
        if(empty($data['alternateText'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Alternate Text'));
        } else if(empty($data['tagline'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Tagline'));
        } else if(empty($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);

          $add_slider = $this->admin_model->addSlider($data);
          if($add_slider) {
            echo json_encode(array('success' => true, 'message' => 'Slider Added !', 'data' => $add_slider));
          }
          return true;
        }
      }

    }
  }

  public function updateSlider()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['id'] = $this->uri->segment(2);
        $data['alternateText'] = strip_tags($this->input->post('alternateText'));
        $data['tagline'] = strip_tags($this->input->post('tagline'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));

        if(empty($data['alternateText'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Alternate Text'));
        } else if(empty($data['tagline'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Tagline'));
        } else if(empty($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);
          $data['imageName'] = $data['imageName'][0];

          $update_slider = $this->admin_model->updateSlider($data);
          if($update_slider) {
            echo json_encode(array('success' => true, 'message' => 'Slider Updated !'));
          } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
          }
          return true;
        }
      }

    }
  }

  public function deleteSlider()
  {
    if($_SESSION['is_admin']) {

    if($_POST) {
       $data['id'] = $this->uri->segment(2);
        $delete_slider = $this->admin_model->deleteSlider($data['id']);
        if($delete_slider) {
          echo json_encode(array('success' => true, 'message' => 'Slider Image Deleted !'));
        } else {
          echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
        }
        return true;
      }
    }

  }

  public function category()
  {
    if($_SESSION['is_admin']) {

      $data['category'] = $this->admin_model->getAdminCategory();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar',$data);
      $this->load->view('admin/categories');
      return true;
    } else {
        redirect(base_url().'admin');
    }
  }

  public function addCategory()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['catno'] = strip_tags($this->input->post('catno'));
        $data['catname'] = strip_tags($this->input->post('catname'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));
        
        if(empty($data['catno'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Number !'));
        } else if(empty($data['catname'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Cateogyr Name !'));
        } else if(empty($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image !'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);

          $add_category = $this->admin_model->addCategory($data);
          if($add_category) {
            echo json_encode(array('success' => true, 'message' => 'Category Added !', 'data' => $add_category));
          }
          return true;
        }
      }

    }
  }

  public function updateCategory()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['id'] = $this->uri->segment(2);
        $data['catno'] = strip_tags($this->input->post('catno'));
        $data['catname'] = strip_tags($this->input->post('catname'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));

        if(empty($data['catno'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Number !'));
        } else if(empty($data['catname'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Name !'));
        } else if(empty($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image !'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);
          $data['imageName'] = $data['imageName'][0];

          $update_slider = $this->admin_model->updateCategory($data);
          if($update_slider) {
            echo json_encode(array('success' => true, 'message' => 'Category Updated !'));
          } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
          }
          return true;
        }
      }

    }
  }

  public function deleteCategory()
  {
    if($_SESSION['is_admin']) {

    if($_POST) {
       $data['id'] = $this->uri->segment(2);
        $delete_slider = $this->admin_model->deleteCategory($data['id']);
        if($delete_slider) {
          echo json_encode(array('success' => true, 'message' => 'Category Deleted !'));
        } else {
          echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
        }
        return true;
      }
    }

  }

  public function subCategory()
  {
    if($_SESSION['is_admin']) {
      $data['categories'] = $this->admin_model->getAdminCategory();
      $data['subcategories'] = $this->admin_model->getAdminSubcategory();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar',$data);
      $this->load->view('admin/sub-category');
      return true;
    } else {
        redirect(base_url().'admin');
    }

  }

  public function addSubcategory()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['catno'] = strip_tags($this->input->post('catno'));
        $data['catname'] = strip_tags($this->input->post('catname'));
        $data['category_id'] = strip_tags($this->input->post('categoryId'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));

        if(empty($data['catno'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Number !'));
        } else if(empty($data['catname']) || !isset($data['catname'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Cateogyr Name !'));
        } else if(empty($data['imageName']) || !isset($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image !'));
        } else if(empty($data['category_id']) || !isset($data['category_id']) || $data['category_id'] == "undefined") {
          echo json_encode(array('success' => false, 'message' => 'Please Select Category !'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);

          $add_subcategory = $this->admin_model->addsubCategory($data);
          if($add_subcategory) {
            echo json_encode(array('success' => true, 'message' => 'Subcategory Added !', 'data' => $add_subcategory));
          }
          return true;
        }
      }

    }
  }

  public function updateSubcategory()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['id'] = $this->uri->segment(2);
        $data['catno'] = strip_tags($this->input->post('catno'));
        $data['catname'] = strip_tags($this->input->post('catname'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));
        $data['category_id'] = strip_tags($this->input->post('categoryId'));

        if(empty($data['catno'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Number !'));
        } else if(empty($data['catname'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Name !'));
        } else if(empty($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image !'));
        } else if(empty($data['category_id'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Select Category !'));
        }  else {
          $data['imageName'] = explode(',', $data['imageName']);
          $data['imageName'] = $data['imageName'][0];

          $update_subcategory = $this->admin_model->updateSubcategory($data);
          if($update_subcategory) {
            echo json_encode(array('success' => true, 'message' => 'Subcategory Updated !'));
          } else {
            echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
          }
          return true;
        }
      }

    }
  }

  public function deleteSubcategory()
  {
    if($_SESSION['is_admin']) {

    if($_POST) {
        $data['id'] = $this->uri->segment(2);
        $delete_subcategory = $this->admin_model->deleteSubcategory($data['id']);
        if($delete_subcategory) {
          echo json_encode(array('success' => true, 'message' => 'Category Deleted !'));
        } else {
          echo json_encode(array('success' => false, 'message' => 'Something went wrong ! Please try again.'));
        }
        return true;
      }
    }

  }

  public function product()
  {
    if($_SESSION['is_admin']) {
      // $data['categories'] = $this->admin_model->getAdminCategory();
      $data['subcategories'] = $this->admin_model->getAdminSubcategory();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar',$data);
      $this->load->view('admin/product');
      return true;
    } else {
        redirect(base_url().'admin');
    }

  }

  public function addProduct()
  {
    if($_SESSION['is_admin']) {

      if($_POST) {
        $data['catno'] = strip_tags($this->input->post('catno'));
        $data['catname'] = strip_tags($this->input->post('catname'));
        $data['category_id'] = strip_tags($this->input->post('categoryId'));
        $data['imageName'] = strip_tags($this->input->post('imageName'));

        if(empty($data['catno'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Category Number !'));
        } else if(empty($data['catname']) || !isset($data['catname'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Insert Cateogyr Name !'));
        } else if(empty($data['imageName']) || !isset($data['imageName'])) {
          echo json_encode(array('success' => false, 'message' => 'Please Upload an Image !'));
        } else if(empty($data['category_id']) || !isset($data['category_id']) || $data['category_id'] == "undefined") {
          echo json_encode(array('success' => false, 'message' => 'Please Select Category !'));
        } else {
          $data['imageName'] = explode(',', $data['imageName']);

          $add_product = $this->admin_model->addProduct($data);
          if($add_product) {
            echo json_encode(array('success' => true, 'message' => 'Subcategory Added !', 'data' => $add_product));
          }
          return true;
        }
      }

    }
  }

}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
