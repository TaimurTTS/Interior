<?php

class joins_manager extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function dashboard() {
        $query = $this->db->query("");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function all_job() {
        $query = $this->db->query("SELECT 
  c.*,
  COUNT(cr.`id`) AS apply_count 
FROM
  career c 
  LEFT JOIN cv_received cr 
    ON cr.`job_id` = c.`id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function consular_holidays() {
        $query = $this->db->query("SELECT 
  c.*,
  co.`short_name` 
FROM
  consular_holidays c 
  LEFT JOIN country co 
    ON c.`country_id` = co.`id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function consular_holidays_id($id) {
        $query = $this->db->query("SELECT 
  c.*,
  co.`short_name` 
FROM
  consular_holidays c 
  LEFT JOIN country co 
    ON c.`country_id` = co.`id`
    WHERE c.id = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function customer_review() {
        $query = $this->db->query("SELECT 
  c.*,
  u.`username` 
FROM
  `customer_review` c 
  LEFT JOIN users u 
    ON c.`user_id` = u.`id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function embassy() {
        $query = $this->db->query("SELECT 
  e.*,
  c.`short_name` 
FROM
  embassy e 
  INNER JOIN country c 
    ON e.`country_id` = c.`id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function embassy_id($id) {
        $query = $this->db->query("SELECT 
  e.*,
  c.`short_name` 
FROM
  embassy e 
  INNER JOIN country c 
    ON e.`country_id` = c.`id`
    WHERE e.`id` = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function travelling_purpose() {
        $query = $this->db->query("SELECT 
  t.*,
  p.`path` 
FROM
  travelling_purpose t 
  INNER JOIN `purpose_icon` p 
    ON p.`id` = t.`icon_path_id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function travelling_purpose_id($id) {
        $query = $this->db->query("SELECT 
  t.*,
  p.`path` 
FROM
  travelling_purpose t 
  INNER JOIN `purpose_icon` p 
    ON p.`id` = t.`icon_path_id`
    WHERE t.`id` = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function fees() {
        $query = $this->db->query("SELECT 
  f.*,
  ch.`short_name` AS holder_country_name,
  cd.`short_name` AS destination_country_name,
  t.`title` AS purpose_title 
FROM
  fees f 
  INNER JOIN country ch 
    ON ch.`id` = f.`passport_holder_country` 
  INNER JOIN country cd 
    ON cd.`id` = f.`destination_country` 
  INNER JOIN travelling_purpose t 
    ON t.`id` = f.`purpose_id`");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function fees_id($id) {
        $query = $this->db->query("SELECT 
  f.*,
  ch.`short_name` AS holder_country_name,
  cd.`short_name` AS destination_country_name,
  t.`title` AS purpose_title 
FROM
  fees f 
  INNER JOIN country ch 
    ON ch.`id` = f.`passport_holder_country` 
  INNER JOIN country cd 
    ON cd.`id` = f.`destination_country` 
  INNER JOIN travelling_purpose t 
    ON t.`id` = f.`purpose_id` 
    WHERE f.`id` = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function users_detail($id) {
        $query = $this->db->query("SELECT 
  u.*,
  dc.`short_name` AS delivery_country_name,
  bc.`short_name` AS billing_country_name 
FROM
  users u 
  LEFT JOIN `country` dc 
    ON dc.`id` = u.`delivery_country` 
  LEFT JOIN `country` bc 
    ON bc.`id` = u.`billing_country` 
    WHERE u.`id` = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
    public function user_passport($id){
        $query = $this->db->query("SELECT 
  u.*,
  c.`short_name` 
FROM
  `user_passport` u 
  INNER JOIN `country` c 
    ON u.`holder_country_id` = c.`id`
    WHERE u.`id` = $id");
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function discount_list($id){
        $query = $this->db->query("SELECT 
  r.*,
  f.`total_fee` 
FROM
  `reseller_discount_fee` r 
  INNER JOIN fees f 
    ON r.`fees_id` = f.`id` 
WHERE r.`reseller_id` = $id");
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
     public function get_discount_list($fees,$id){
        $query = $this->db->query("SELECT 
            f.* 
          FROM
            fees f  
          WHERE f.`id` NOT IN ('" . implode($fees, "','") . "')");
        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
	    public function search_result($holder_country,$destination,$purpose) {
        $query = $this->db->query("SELECT 
                    * 
                  FROM
                    `visa_applications_requirements` 
                  WHERE `passport_holder_country` = $holder_country 
                    AND `destination_country` = $destination 
                    AND `purpose_id` = $purpose");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function get_user_data($user_id){
     $query = $this->db->query("SELECT 
                                    f_name,
                                    l_name,
                                    email,
                                    gender,
                                    dob,
                                    place_of_birth
                                  FROM
                                    users 
                                  WHERE id = $user_id" 
                                    );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
 }
    

}

?>