<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sg_Common_Model extends CI_Model
{	
	public $_table_owner;
	public $_table_salons;
	public $_table_owner_packages;

	function __construct()
	{
		parent::__construct();
		
	}

	
	public function addLogs($logType,$userName,$userId,$task)
	{
	  $sql	=	"INSERT INTO  `tbl_logs`
				(
				`log_type`,
				`user_name`,
				`user_id`,
				`task`)
				VALUES 
				(
					'".$logType."',
					'".$userName."',
					'".$userId."',
					'".$task."')";
					
		$query = $this->db->query($sql);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}	
	
}
?>