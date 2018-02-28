<?php

class user_manager extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function check_login($text_login, $password, $column) {
        $this->db->select(" *, count(*) as count")
                ->where($column, $text_login)
                ->where("password", $password)
                ->from("users");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function check_forget($email) {

        $this->db->where("email", $email);
        $this->db->from("users");
        $count = $this->db->count_all_results();

        return $count;
    }

    public function check_fb_id($fb_id) {

        $this->db->where("facebook_id", $fb_id);
        $this->db->from("users");
        $count = $this->db->count_all_results();
        return $count;
    }

    public function check_user_id($id) {

        $this->db->where("user_id", $fb_id);
        $this->db->from("fb_friend_list");
        $count = $this->db->count_all_results();
        return $count;
    }
 ///for country
    
    
    public function case_1($deti, $filter_name, $age_start, $age_end) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE country_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_2($deti, $filter_name, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE country_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end
                                    AND gender = '$gender'"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_3($deti, $age_start, $age_end) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE country_id = $deti 
                                     AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_4($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE country_id = $deti 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end
                                    AND gender = '$gender'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_5($deti,$user_id) {
        $query = $this->db->query("SELECT 
                                    w.id AS w_id   
                                  FROM
                                    `want_go` w 
                                  WHERE w.`destination_id` = $deti 
                                    AND w.category_id = 2
                                    AND w.user_id = $user_id
                                    ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_6() {
        $query = $this->db->query("SELECT 
                                    b.id AS b_id 
                                  FROM
                                    `been_here` b 
                                  WHERE b.`destination_id` = $deti
                                    AND b.category_id = 2 
                                    AND b.user_id = $user_id"
                );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_7($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE country_id = 165
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= 18 && (YEAR(CURDATE()) - YEAR(birth_date)) <= 50 
                                    AND member_type = 'travel_guide'"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_8($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                        * 
                                      FROM
                                        users 
                                      WHERE country_id = 165
                                        AND (YEAR(CURDATE()) - YEAR(birth_date)) >= 18 && (YEAR(CURDATE()) - YEAR(birth_date)) <= 50 
                                        AND gender = 'Male'
                                        AND member_type = 'travel_guide'
                                        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
    
    ///////////for city
    
    public function case_9($deti, $filter_name, $age_start, $age_end) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE current_city_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_10($deti, $filter_name, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE current_city_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end
                                    AND gender = '$gender'"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_11($deti, $age_start, $age_end) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE current_city_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_12($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE current_city_id = $deti 
                                    AND username LIKE '%$filter_name%' 
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= $age_start && (YEAR(CURDATE()) - YEAR(birth_date)) <= $age_end
                                    AND gender = '$gender'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_13() {
        $query = $this->db->query("");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_14() {
        $query = $this->db->query("");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_15($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                    * 
                                  FROM
                                    users 
                                  WHERE current_city_id = 165
                                    AND (YEAR(CURDATE()) - YEAR(birth_date)) >= 18 && (YEAR(CURDATE()) - YEAR(birth_date)) <= 50 
                                    AND member_type = 'travel_guide'"
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_16($deti, $age_start, $age_end, $gender) {
        $query = $this->db->query("SELECT 
                                        * 
                                      FROM
                                        users 
                                      WHERE current_city_id = 165
                                        AND (YEAR(CURDATE()) - YEAR(birth_date)) >= 18 && (YEAR(CURDATE()) - YEAR(birth_date)) <= 50 
                                        AND gender = 'Male'
                                        AND member_type = 'travel_guide'
                                        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
     public function case_17($deti,$user_id) {
        $query = $this->db->query("SELECT 
                                    w.id AS w_id   
                                  FROM
                                    `want_go` w 
                                  WHERE w.`destination_id` = $deti 
                                    AND w.category_id = 3
                                    AND w.user_id = $user_id
                                    ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function case_18() {
        $query = $this->db->query("SELECT 
                                    b.id AS b_id 
                                  FROM
                                    `been_here` b 
                                  WHERE b.`destination_id` = $deti
                                    AND b.category_id = 3 
                                    AND b.user_id = $user_id"
                );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

}

?>