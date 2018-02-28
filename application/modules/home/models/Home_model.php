<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_Model extends CI_Model
{
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
    $db = $this->load->database();
  }

  public function getSlider()
  {
    $sql = "SELECT * from tbl_slider where is_active = 1 ORDER BY id ASC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function getCategory()
  {
    $sql = "SELECT * from tbl_category ORDER BY id ASC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function getComputerData()
  {
    $sql = "SELECT c.*,co.name as companyName,
    GROUP_CONCAT(a.name ORDER BY a.id) AppNames
    from tbl_computer as c 
    INNER JOIN tbl_company AS co ON c.company = co.id
    LEFT JOIN tbl_application a
    ON FIND_IN_SET(a.id, c.applications) > 0
    GROUP   BY c.id
    ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function getApplicationData()
  {
    $sql = "select * from tbl_application ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  public function getActiveApplicationData()
  {
    $sql = "select * from tbl_application where status = 1";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
    {
      return $query->result_array();
    }
    else
    {
      return false;
    }
  }

  /*************** SAVE COMPANY ***************/
  public function saveCompany($data)
  {
    $sql = "INSERT INTO `tbl_company` (
    `name`,
    `domain_name`,
    `source`,
    `source_path`,
    `user_name`,
    `password`
    ) 
    VALUES
    (
    '".$data['companyName']."',
    '".$data['domainName']."',
    '".$data['source']."',
    '".$data['sourcePath']."',
    '".$data['userName']."',
    '".$data['password']."'
    ) ";

    $query = $this->db->query($sql);
    if($query)
    {
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }
    else
    {
      return false;
    }
  }

/*************** EDIT COMPANY ***************/
public function editCompany($data)
{
  $sql = " UPDATE `tbl_company` set
         name = '".$data['companyName']."',
         `domain_name` = '".$data['domainName']."',
         `source` = '".$data['source']."',
         `source_path` = '".$data['sourcePath']."',
         `user_name` = '".$data['userName']."',
         `password` = '".$data['password']."' where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return true;
  }
  else
  {
    return false;
  }
}

/*************** SAVE APPLICATION ***************/
public function saveApplication($data)
{
  $sql = "INSERT INTO `tbl_application` (
  `name`,
  `link`,
  `command`
  ) 
  VALUES
  (
  '".$data['appName']."',
  '".$data['appLink']."',
  '".$data['appCommand']."'
  ) ";
  
  $query = $this->db->query($sql);

  if($query)
  {
   $insert_id = $this->db->insert_id();
   return $insert_id;
 }
 else
 {
  return false;
}
}

/*************** EDIT APPLICATION ***************/
public function editApplication($data)
{
  $sql = " UPDATE `tbl_application` set name = '".$data['appName']."', `link` = '".$data['appLink']."', `command` = '".$data['appCommand']."' where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return array("appName" => $data['appName'], "appLink" => $data['appLink'], "appCommand" => $data['appCommand'], "id" => $data['id'] );
  }
  else
  {
    return false;
  }
}

public function saveComputer($data)
{
  $sql = "INSERT INTO `tbl_computer` (
  `name`,
  `serial_number`,
  `model`,
  `domain_joined`,
  `company`,
  `applications`
  ) 
  VALUES
  (
  '".$data['compName']."',
  '".$data['compSno']."',
  '".$data['compModel']."',
  '".$data['domainJoined']."',
  '".$data['companyJoined']."',
  '".$data['applications']."'
  ) ";
  
  $query = $this->db->query($sql);

  if($query)
  {
   $insert_id = $this->db->insert_id();
   return $insert_id;
 }
 else
 {
  return false;
}
}

/*************** EDIT COMPUTER ***************/
public function editComputer($data)
{
  $sql = " UPDATE `tbl_computer` set name = '".$data['compName']."', `serial_number` = '".$data['compSno']."', `model` = '".$data['compModel']."', `domain_joined` = '".$data['domainJoined']."', `company` = '".$data['companyJoined']."', `applications` = '".$data['applications']."' where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return array("compName" => $data['compName'], "compSno" => $data['compSno'], "compModel" => $data['compModel'], "domainJoined" => $data['domainJoined'], "company" => $data['company'],"companyJoined" => $data['companyJoined'],"applications" => $data['applications'], "id" => $data['id'] );
  }
  else
  {
    return false;
  }
}

public function companyAction($data)
{
  $sql = " UPDATE `tbl_company` set status = '".$data['action']."'
  where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return true;
  }
  else
  {
    return false;
  }
}

public function computerAction($data)
{
  $sql = " DELETE from `tbl_computer` where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return true;
  }
  else
  {
    return false;
  }
}

public function applicationAction($data)
{
  $sql = " UPDATE `tbl_application` set status = '".$data['action']."'
  where id = ".$data['id']." ";
  $query =  $this->db->query($sql); 
  if($query)
  {
    return true;
  }
  else
  {
    return false;
  }
}

public function searchComputer($data)
{
  $sql = "SELECT c.*,co.name as companyName,
  GROUP_CONCAT(a.name ORDER BY a.id) AppNames
  from tbl_computer as c 
  INNER JOIN tbl_company AS co ON c.company = co.id
  LEFT JOIN tbl_application a
  ON FIND_IN_SET(a.id, c.applications) > 0
  where c.`name` LIKE '%".$data['search']."%'
  GROUP   BY c.id";
  $query =  $this->db->query($sql); 
  if($query->num_rows() > 0)
  {
    $row = $query->result_array();
    return $row;
  }
  else
  {
    return false;
  }
}

public function searchCompanyComputer($data)
{
  $sql = "SELECT c.*,co.name as companyName,
  GROUP_CONCAT(a.name ORDER BY a.id) AppNames
  from tbl_computer as c 
  INNER JOIN tbl_company AS co ON c.company = co.id
  LEFT JOIN tbl_application a
  ON FIND_IN_SET(a.id, c.applications) > 0
  where c.`company` = ".$data['search']."
  GROUP   BY c.id";
  $query =  $this->db->query($sql); 
  if($query->num_rows() > 0)
  {
    $row = $query->result_array();
    return $row;
  }
  else
  {
    return false;
  }
}

  public function companyById($id)
  {
    $sql = "SELECT name,domain_name from tbl_company where id = ".$id;
    $query =  $this->db->query($sql); 
    if($query->num_rows() > 0)
    {
      $row = $query->result_array();
      return $row;
    }
    else
    {
      return false;
    }
  }

  public function computerXmlUrl($id,$url)
  {
    $sql = " UPDATE `tbl_computer` set url = '".$url."' where id = ".$id;
    $query =  $this->db->query($sql); 
    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function computerBySerialNumber($sNo)
  {
    $sql = "SELECT c.*,co.name as companyName,co.domain_name as companyDomain,
            co.source as source,co.source_path as sourcePath,co.user_name as userName,
            co.password as password,
            GROUP_CONCAT(a.name ORDER BY a.id) AppNames,
            GROUP_CONCAT(a.id ORDER BY a.id) AppIds,
            GROUP_CONCAT(a.link ORDER BY a.id) AppLinks,
            GROUP_CONCAT(a.command ORDER BY a.id) AppCommands
            from tbl_computer as c 
            INNER JOIN tbl_company AS co ON c.company = co.id
            LEFT JOIN tbl_application a
            ON FIND_IN_SET(a.id, c.applications) > 0
            where serial_number = '".$sNo."' ";

    $query = $this->db->query($sql);

    if($query->num_rows() > 0)
    {
      $row = $query->result_array();
      return $row;
    }
    else
    {
      return false;
    }
  }

  public function appById($sNo)
  {
   $sql = "SELECT * from tbl_application where id IN (".$sNo.") ";

    $query = $this->db->query($sql);

    if($query->num_rows() > 0)
    {
      $row = $query->result_array();
      return $row;
    }
    else
    {
      return false;
    }
  }

}
?>
