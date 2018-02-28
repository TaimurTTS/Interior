<?php



class main_manager extends CI_Model {



    public function __construct() {

        $this->load->database();

    }



    ##insert function



    public function insert($data, $table) {

        if ($this->db->insert($table, $data)) {

            return true;

        } else {

            return false;

        }

    }



    public function insert_get_id($data, $table) {

        if ($this->db->insert($table, $data)) {

            $insert_id = $this->db->insert_id();

            $this->db->trans_complete();

            return $insert_id;

        } else {

            return false;

        }

    }



    ##update



    public function update($id, $data, $table) {



        $this->db->trans_start();

        $this->db->where('id', $id);

        $this->db->update($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    public function update_by_coupon_id($id, $data, $table) {



        $this->db->trans_start();

        $this->db->where('coupon_id', $id);

        $this->db->update($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }

    

    

    public function update_msg_status($resiver_id,$sender_id) {



        $this->db->trans_start();

        $this->db->where('reciever_id', $resiver_id);

        $this->db->where('sender_id', $sender_id);

        $this->db->update('app_messages',array('status' => 1));

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    public function update_by_store($id, $data, $table) {



        $this->db->trans_start();

        $this->db->where('store_id', $id);

        $this->db->update($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    public function update_by_coupon($id, $data) {



        $this->db->trans_start();

        $this->db->where('product_id', $id);

        $this->db->update("coupons", $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    public function update_user_coupon($user_id, $coupon_id, $data) {



        $this->db->trans_start();

        $this->db->where('user_id', $user_id);

        $this->db->where('coupon_id', $coupon_id);

        $this->db->update("coupons", $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    public function update_col_name($id, $col_name, $data, $table) {

        $this->db->trans_start();

        $this->db->where('id', $id);

        $this->db->update($table, $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            return false;

        } else {

            return true;

        }

    }



    ##delete



    public function delete($id, $table) {

        $this->db->where('id', $id);

        if ($this->db->delete($table)) {

            return true;

        } else {

            return false;

        }

    }



    public function delete_by_other_id($col, $col_val, $table) {

        $this->db->where($col, $col_val);

        if ($this->db->delete($table)) {

            return true;

        } else {

            return false;

        }

    }



    ##select all 



    public function select_all($table) {



        $this->db->select("*")

                ->from($table)

                ->order_by("id", "desc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function select_all_active($table) {



        $this->db->select("*")

                ->from($table)

                ->where('is_active', 1)

                ->order_by("id", "desc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function select_all_country($table) {

        $this->db->select("*")

                ->from($table)

                ->order_by("name", "ASC");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_all_limit($table, $offset, $limit) {



        $this->db->select("*")

                ->from($table)

                ->order_by("id", "desc")

                ->limit($limit, $offset);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function all_promotion($table, $offset, $limit) {



        $this->db->select("*")

                ->from($table)

                ->where('is_active',1)        

                ->order_by("id", "desc")

                ->limit($limit, $offset);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_all_limit_search($table, $search_key, $search_text, $offset, $limit) {



        $query = $this->db->query("SELECT * from $table where $search_key LIKE '%$search_text%' LIMIT $offset,$limit");

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    

    public function search_promotion($table, $search_key, $search_text, $offset, $limit) {



        $query = $this->db->query("SELECT * from $table where $search_key LIKE '%$search_text%' AND is_active = 1 LIMIT $offset,$limit");

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    ## acending all



    public function select_all_ASC($table) {



        $this->db->select("*")

                ->from($table)

                ->order_by("id", "ASC");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_all_row_order($table, $row, $order) {



        $this->db->select("*")

                ->from($table)

                ->order_by($row, $order);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    ##pagination count



    public function record_count($table) {

        return $this->db->count_all($table);

    }



    ##select all for pagination



    public function select_pagination($limit, $start, $table) {



        $this->db->limit($limit, $start);

        $this->db->order_by("id", "desc");

        $query = $this->db->get($table);



        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }



    ## select all if status is 1



    public function select_all_status($status_col, $status, $order_by_col, $order_by, $table) {

        $this->db->where($status_col, $status)

                ->order_by($order_by_col, $order_by);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    ## select by id



    public function select_by_id($id, $table) {

        $this->db->where('id', $id);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }





    public function select_user_id_is_active($id, $table) {

        $this->db->where('id', $id);

        $this->db->where('is_active', 1);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_id_profile($id, $table) {

        $this->db->where('id', $id);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return NULL;

        }

    }



    public function where_not_in($user_id, $col, $col_val, $table) {

        $this->db->where_not_in($col, $col_val);

        $this->db->where_not_in('user_id', $user_id);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_two_id($id1, $id2, $table) {

        $this->db->where('id', $id);

        $this->db->where('id', $id);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function check_device($number, $device) {

        $this->db->where('mobile', $number);

        $this->db->where('device_id', $device);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function check_users($number, $device) {

        $this->db->where('mobile', $number);

        $this->db->where('device_id', $device);

        // $this->db->where('is_active',0);

        //$this->db->where('is_deleted', 0);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function check_verify($number, $code) {

        $this->db->where('mobile', $number);

        $this->db->where('activation_code', $code);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_type($type, $table) {

        $this->db->where('type', $type);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    ########select status 1



    public function select_status_on($table) {



        $this->db->select('*')

                ->from($table)

                ->where("status", 1)

                ->order_by("id", "desc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data[] = $row;

            }

        }

        return $data;

    }



    ##count check specifically for delete check either value is present in other table



    public function delete_count($col, $col_val, $table) {

        $this->db->where($col, $col_val);

        $this->db->from($table);

        $count = $this->db->count_all_results();

        return $count;

    }



    public function delete_count_two_columns($col_one, $col_val_one, $col_two, $col_val_two, $table) {



        $this->db->where($col_one, $col_val_one);

        $this->db->where($col_two, $col_val_two);

        $this->db->from($table);

        $count = $this->db->count_all_results();

        return $count;

    }



    ##get all for specic define foreign key id 



    public function select_by_other_id_order($col, $col_val,$order_by_key,$order, $table) {

        $this->db->where($col, $col_val);

        $this->db->order_by($order_by_key, $order);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    

    public function select_by_other_id($col, $col_val, $table) {

        $this->db->where($col, $col_val);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function store_promotion($col, $col_val, $table) {

        $this->db->where($col, $col_val);

        $this->db->where('is_active',1);

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_other_id_limit($col, $col_val, $table, $offset, $limit) {

        $this->db->where($col, $col_val);

        $query = $this->db->get($table, $offset, $limit);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function store_product($col, $col_val, $table, $offset, $limit) {

        $this->db->where($col, $col_val);

        $this->db->where('is_active',1);

        $this->db->where('quantity >', 'no_sold');

        $query = $this->db->get($table, $offset, $limit);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

    

    public function store_product_search($col, $col_val, $search_key, $search_text, $table, $offset, $limit) {

        $this->db->where($col, $col_val);

        $this->db->where('is_active',1);

        $this->db->where('quantity >', 'no_sold');

        $this->db->like($search_key, $search_text);

        $query = $this->db->get($table, $offset, $limit);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_other_id_search_limit($col, $col_val, $search_key, $search_text, $table, $offset, $limit) {

        $this->db->where($col, $col_val);

        $this->db->like($search_key, $search_text);

        $query = $this->db->get($table, $offset, $limit);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_by_other_id_active($col, $col_val, $table) {

        $this->db->where($col, $col_val);

        $this->db->where('is_active', '1');

        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_msg_user($country, $gender) {

        $this->db->where('country_id', $country);

        $this->db->where('gender', $gender);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_where_ids_in($ids_array, $table) {

        $query = $this->db->query('SELECT * from ' . $table . ' where id IN (' . implode(",", $ids_array) . ') ');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function select_limit_status($limit, $table) {



        $this->db->select('*')

                ->from($table)

                ->where("status", 1)

                ->limit($limit)

                ->order_by("id", "desc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data[] = $row;

            }

        }

        return $data;

    }



    public function record_count_join($table1, $table2, $col1, $col2) {



        $this->db->select('count(*) as total')

                ->from($table1)

                ->join($table2, $table1 . "." . $col1 . "=" . $table2 . "." . $col2, 'inner');

        $query = $this->db->get();

        $count = $query->row_array();

        return $count['total'];

    }



    public function delete_user_coupon($user_id, $coupon_id) {

        $this->db->where('user_id', $user_id);

        $this->db->where('coupon_id', $coupon_id);

        if ($this->db->delete('user_coupons')) {

            return true;

        } else {

            return false;

        }

    }



    public function is_user_coupon($user_id, $coupon_id) {

        $query = $this->db->query('SELECT * from user_coupons where user_id = ' . $user_id . ' AND coupon_id = ' . $coupon_id . ' AND is_redeemed = 0');

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



    public function get_this_by_other_id($term, $other_id, $other_value, $table) {

        $query = $this->db->query("SELECT $term FROM $table WHERE " . $other_id . " = $other_value AND is_active = 1");

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }

	public function getTravellingPurpose()

	{

	   $query = $this->db->query("SELECT id,title FROM `travelling_purpose` WHERE is_active = 1");

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

	}

	public function getAllCountry()

	{

	   $query = $this->db->query("SELECT id,name FROM `countries`");

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

	}

	public function addVisaRequirement($importantInformation,$admin_id,$holderCountryData,$destinationCountryData,$visaTypeTmp,$visaRequiredTmp,$purposeId,$vat)

	{

			 $sql = "INSERT INTO `visa_applications_requirements`

            (

             `user_id`,

			 `important_info`,

             `visa_type`,

             `passport_holder_country`,

             `destination_country`,

             `purpose_id`,

             `offer_visa`,

             `visa_required`,

             `vat`

             )

		VALUES (

				'".$admin_id."',

				'".$importantInformation."',

				'".$visaTypeTmp."',

				'".$holderCountryData."',

				'".$destinationCountryData."',

				'".$purposeId."',

				'1',

                '".$visaRequiredTmp."',

                '".$vat."'

				)";

		   

		$query =  $this->db->query($sql);

		if($query)

		{



			$insert_id  = $this->db->insert_id();

			return $insert_id;

		}

		else

		{

		  return 0;

		}

	}

	

	public function addFees($visa_app_req_id,$type,$processingTime,$handlingFee,$consularFee,$service,$total,$cost)

	{

			 $sql = "	INSERT INTO `fees`

		    (

		     `type`,

		     `service`,

		     `consular_fee`,

		     `handling_fee`,

		     `total_fee`,

		     `processing_time`,

		     `visa_app_req_id`,

             `cost`

		     )

			VALUES (

				'".$type."',

				'".$service."',

				'".$consularFee."',

				'".$handlingFee."',

				'".$total."',

				'".$processingTime."',

				'".$visa_app_req_id."',

                '".$cost."')

				";

				   

		$query =  $this->db->query($sql);

		if($query)

		{



			$insert_id  = $this->db->insert_id();

			return $insert_id;

		}

		else

		{

		  return 0;

		}

	}

	

    public function addCustomRequirement($visa_app_req_id,$requirementName,$requirementDetail,$requirementImg)

	{

			 $sql = "INSERT INTO `visa_requirement_custom`

            (

             `visa_app_req_id`,

             `requirement_name`,

             `requirement_details`,

             `image_icon`)

						 

			VALUES (

					'".$visa_app_req_id."',

					'".$requirementName."',

					'".$requirementDetail."',

                    '".$requirementImg."')";

				   

		$query =  $this->db->query($sql);

		if($query)

		{



			$insert_id  = $this->db->insert_id();

			return $insert_id;

		}

		else

		{

		  return 0;

		}

	}

   public function addAdditionalFees($title,$price,$id)

	{

			 $sql = "INSERT INTO `additional_fees`

            (

             `title`,

             `price`,

             `visa_app_req_id`)

			VALUES (

				'".$title."',

				'".$price."',

				'".$id."'

					)";

				   

		$query =  $this->db->query($sql);

		if($query)

		{



			$insert_id  = $this->db->insert_id();

			return $insert_id;

		}

		else

		{

		  return 0;

		}

	}

	public function addRequiredDocuments($fileName,$fileUrl,$id)

	{

			 $sql = "INSERT INTO `required_documents`

					(

					 `file_name`,

					 `file_url`,

					 `visa_app_req_id`

					 

					 

					 )

					VALUES (

							'".$fileName."',

							'".$fileUrl."',

							'".$id."'

							);";

				   

		$query =  $this->db->query($sql);

		if($query)

		{



			$insert_id  = $this->db->insert_id();

			return $insert_id;

		}

		else

		{

		  return 0;

		}

	}

		### taimur model

		 public function getUserDatas($id)

  {

     $query = $this->db->query("select * from users where id = '".$id."'");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }

  public function userAuth($data)

  {

     // $query = $this->db->query("select id from users where email = '".$data['email']."' AND password = '".md5($data['password'])."'");

        $query = $this->db->query("select id from users where email = '".$data['email']."' AND password = '".md5($data['password'])."'  ");



        if ($query->num_rows() > 0) {



            $checkBlockQuery = $this->db->query("select id from users where email = '".$data['email']."' AND password = '".md5($data['password'])."' AND status = '1' ");

                if ($checkBlockQuery->num_rows() > 0) 

                {

                    $row = $query->result_array();

             

                    $this->session->set_userdata('user_id',$row[0]['id']);

                    return 1;

                }

                else

                {

                    return 3;

                }

            

        } 

        else

         {

            return 0;

         }



  }



  public function getCountries()

  {

     $query = $this->db->query("select Code,name FROM tbl_country ORDER BY Name ASC");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }



  public function getStatesById($id)

  {

     $query = $this->db->query("select id,name FROM tbl_city WHERE CountryCode = '".$id."'  ORDER BY name ASC");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }



  public function getStates()

  {

     $query = $this->db->query("select id,name FROM tbl_city ORDER BY name ASC");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }

  public function get_faq($table) {



        $this->db->select('*')

                ->from($table)

                ->where("is_active", 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data[] = $row;

            }

        }

        return $data;

    }

    public function getEmbassyData($startParam = 'a')

    {

        $query = $this->db->query(" SELECT c.`name` , i.`address`,i.`phone`,i.`fax`,i.`email`,i.`website`,i.`consular_email`,i.`consular_fax`,i.`opening_hours`

                                    ,i.`consular_opening_hour`,i.`consular_phone`  FROM   `tbl_embassy_info` AS i

                                     INNER JOIN `countries` AS c

                                     ON c.`id` = i.`country_id`

                                     WHERE i.`country_start` = '".$startParam."' ORDER BY c.`name` ASC");

                                      if ($query->num_rows() > 0) 

                                      {

                                            return $query->result_array();

                                      }

                                       else

                                        {

                                            return 0;

                                        }

    }



function checkUserRegistration($hash)

{

    $query = $this->db->query("SELECT id,first_name,last_name FROM `tbl_user` WHERE hash = '".$hash."' AND status = 0");

                              

    if ($query->num_rows() > 0) 

    {

        $update = "UPDATE tbl_user SET hash = '',status = 1 WHERE hash = '".$hash."'";

        $q      =  $this->db->query($update); 

        if($q)

        {

                return $query->result_array();

        }

        else

        {

                return 0;

        }

    }

    else

    {

        return 0;

    }

}



  public function getDataByPk($table,$data,$id)

  {

     $query = $this->db->query("select ".$data."  FROM ".$table." WHERE id = '".$id."' ");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }

  public function getDataByFK($table,$data,$id,$fk)

  {



	 $query = $this->db->query("select ".$data."  FROM ".$table." WHERE ".$fk." = '".$id."' ");

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }



  // UBAID



  public function getComapanyName($params=array())

  {

     $sql = "select id,company_name,country_id FROM tbl_company";

     $query = $this->db->query($sql);

      if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }



  }



   public function existComapanyName($id,$getCompany)

  {

     $sql = "select id,company_name,country_id FROM tbl_company WHERE country_id = '".$id."' AND company_name = '".$getCompany."'";

     $query = $this->db->query($sql);

      if ($query->num_rows() > 0) {

            return 1;

        } else {

            return 0;

        }



  }



     public function existComapanyNameConutryId($id,$company)

      {

         $sql = "select id,company_name,country_id FROM tbl_company WHERE country_id = '".$id."' AND company_name = '".$company."'";

         $query = $this->db->query($sql);

          if ($query->num_rows() > 0) {

               return $query->result_array();

            } else {

                return 0;

            }



      }



public function getUserProfilePic($id)

{

    $sql = "SELECT u.profile_pic,c.`company_name` FROM tbl_user u

            INNER JOIN tbl_company c ON c.id = u.company_id

            where u.id = ".$id." ";

    $query = $this->db->query($sql);

    if($query->num_rows() > 0)

    {

        $row = $query->result_array();

        return $row;

    }

    else

    {

        return 0;

    }

}



public function select_all_order_asc($table) {



        $this->db->select("*")

                ->from($table)

                ->order_by("id", "asc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        } else {

            return 0;

        }

    }



  

}



?>