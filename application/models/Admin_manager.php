<?php
class admin_manager extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    ////////
    public function check_admin_login($user_name, $password) {

        $this->db->select("*, count(*) as total")
                ->from("admin_users")
                ->where("user_name", $user_name)
                ->where("password", $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function get_user_permissions($id) {

        $this->db->select("*")
                ->from("admin_permissions")
                ->where("admin_user_id", $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
            
        } else {
            return 0;
        }
    }
    
    public function get_today_clients() {
    
    $query = $this->db->query("SELECT * FROM clients WHERE DAY(NOW()) = DAY(created_on) AND is_active = 1");
	if ($query->num_rows() > 0) {
	    return $query->result_array();
	} else {
	    return 0;
	}
    }
    
    public function get_today_activated_packages() {
    
    	$query = $this->db->query("SELECT 
			  tp.*,
			  c.first_name,
			  c.last_name,
			  c.email 
			FROM
			  travel_packages tp 
			  INNER JOIN clients c 
			    ON tp.client_id = c.id 
			WHERE DAY(NOW()) = DAY(tp.activation_date) 
			  AND tp.is_active = 1 
			  AND CURDATE() != tp.activation_date 
			ORDER BY tp.client_id");
    	if ($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }
    
    public function cm_listing_by_client_id($id) {
    
    	$query = $this->db->query("SELECT * FROM client_listings WHERE client_id = '".$id."' AND DATE_FORMAT(listing_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')");
    	if ($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }

    public function check_exists($user_name, $email){
        
        $this->db->from("admin_users a");
        $this->db->where("a.user_name", $user_name);
        $this->db->where("a.email", $email);
        return $this->db->count_all_results();
    }

    public function check_by_username($user_name){
        
        $this->db->select("*");
        $this->db->from("admin_users a");
        $this->db->where("a.user_name", $user_name);
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $data = $row;
            }
        }else{
            $data = 0;  
        }
        return $data;
        
    }

    public function check_admin_auth($sec_id = '') {
        if ($this->session->userdata('adminLogged') == "yes") {
            if (isset($sec_id)) {
                $this->db->select("*")
                        ->from("admin_permissions")
                        ->where("admin_user_id", $this->session->userdata('admin_id'))
                        ->where("admin_section_id", $sec_id);
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
                    return true;
                } else {
                    redirect(SITE_ADMIN_URL);
                }
            }
        } else {
            redirect(SITE_ADMIN_URL);
        }
    }

    public function permissions_delete_by_admin_user_id($admin_users_id, $table){
        
        $this->db->where("admin_user_id", $admin_users_id);
        if($this->db->delete($table))
        {
            return true;
        }else
        {
            return false;
        }
    }
    
    public function delete_parents($parent_id, $table){
    
    	$this->db->where("id", $parent_id);
    	$this->db->or_where("parent_id", $parent_id);
    	if($this->db->delete($table))
    	{
    		return true;
    	}else
    	{
    		return false;
    	}
    }
    
    
    
    public function select_request($id) {    
    $query = $this->db->query("SELECT 
  ar.*,
  c.`country_name` AS country,
  s.name AS state 
FROM
  `admin_request` ar 
  LEFT JOIN `country` c 
    ON ar.`country_id` = c.`id` 
  LEFT JOIN `states` s 
    ON ar.`state_id` = s.id 
    WHERE ar.id = $id");
    	if ($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }
    
    public function job_portal() {    
    $query = $this->db->query("SELECT 
  jp.*,
  a.id AS applicant_id 
FROM
  job_portal jp 
  LEFT JOIN applicant a 
    ON jp.id = a.job_id");
    	if ($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }
    
    
    public function job_applicant($id) {    
    $query = $this->db->query("SELECT 
a.*,
c.`country_name`,
s.`name` AS state_name,
j.`title`
FROM
  `applicant` a 
  LEFT JOIN country c 
    ON a.`country_id` = c.`id` 
  LEFT JOIN states s 
    ON a.`state_id` = s.`id` 
  LEFT JOIN job_portal j 
    ON a.`job_id` = j.`id`
    WHERE a.`job_id` = $id");
    	if ($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }
    
    
}

?>