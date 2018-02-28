<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if( ! ini_get('date.timezone') )
{
	date_default_timezone_set('GMT');
}

class Sg_Common_Session
{
	public $_owner_id;
	public $_owner_status;
	public $_owner_pkg;
	public $_salon_id;
	public $_owner_registerd_date;
	public $_table_owner;
	public $_table_salons;

	function __construct()
	{		
		//Table name 
		$this->_table_owner			=		"sg_owner";
		$this->_table_salons		=		"sg_salons";
		$this->CI = & get_instance();
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
		$this->CI->load->model('sg_common_model');
		/*echo "<pre>"; 
		print_r($this->CI->session->userdata); 
		echo "</pre>";*/
	
		### if owner session not exists
		if( !$this->CI->session->userdata('avn_id') )
		{
			header('location:'.SITE_URL.'login');
		}
	
		$this->_owner_id = $this->CI->session->userdata('od_slg'); 
	
		### verify owner status is on or off
		$this->_owner_status = $this->CI->sg_common_model->get_status_owner($this->_owner_id);
		if( $this->_owner_status == 0 )
		{
			$this->CI->session->sess_destroy();
			redirect(SITE_URL.'login');
		}
		### get package of owner
		$this->_owner_pkg = $this->CI->sg_common_model->get_pkg_owner($this->_owner_id);
		if(isset($this->_owner_pkg) && ($this->_owner_pkg==1 || $this->_owner_pkg==0))
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>1								
						));
		}
		elseif(isset($this->_owner_pkg) && $this->_owner_pkg==2)
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>2								
						));
		}
		elseif(isset($this->_owner_pkg) && $this->_owner_pkg==3)
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>3								
						));
		}
		elseif(isset($this->_owner_pkg) && $this->_owner_pkg==4)
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>4								
						));
		}
		elseif(isset($this->_owner_pkg) && $this->_owner_pkg==5)
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>5								
						));
		}
		elseif(isset($this->_owner_pkg) && $this->_owner_pkg==6)
		{
			 $this->CI->session->set_userdata(array(
							'_owner_pkg'=>6								
						));
		}				
	
		$this->_salon_id =  $this->CI->sg_common_model->get_salon_id($this->_owner_id);

		if($this->_salon_id == 0)
		{
			 $this->CI->session->set_userdata(array(
			 				'salon_id'=>$this->_salon_id,
							'_salon_business_profile'=>0								
						));
			//header('location:'.SITE_URL.'business-profile'."?success=".base64_encode('Kindly add your business details First'));
		}
		else if($this->_salon_id > 0)
		{
			$this->CI->session->set_userdata(array(
						'salon_id'=>$this->_salon_id,
						'_salon_business_profile' => ''							
					));
		}

		// session for packages
		$created = $this->CI->sg_common_model->get_date_owner($this->_owner_id);
		// trial static date check 
		$trial_date = "2015-09-30 03:56:31";
		$trial_date = "2015-09-30 03:56:31";
		//echo "today date:".$today_date."<br>";
		$date_created = $created;
		//echo "owner register date:".$date_created."<br>";
		if($date_created>=$trial_date)
		{
			$date_modified = date('Y-m-d',strtotime($date_created . "+30 days"));
		}
		else
		{
			$date_modified = date('Y-m-d',strtotime($date_created . "+90 days"));
		}
		$this->_owner_registerd_date = $date_modified; 

		if($trial_date>=$date_modified)
		{
			$pkg_data = $this->CI->sg_common_model->get_package_info($this->_owner_id,$this->_salon_id);
			if(!empty($pkg_data) && $pkg_data[0]->pkg_id>1)
			{
				$this->CI->session->set_userdata(array(
					'owner_pkg_resourcexid'=>$pkg_data[0]->pkg_id,
					'owner_pkg_resourcex'=>$pkg_data[0]->pkg_name,
					'owner_pkg_trial'=>'TLEXP'
				));
			}
			else
			{
				$this->CI->session->set_userdata(array(
					'owner_pkg_resourcexid'=>'',
					'owner_pkg_resourcex'=>'',
					'owner_pkg_trial'=>'TLEXP'
				));
			}
		}
		else
		{
			$this->CI->session->set_userdata(array(
				'owner_pkg_trial'=>'TLEXT'									
			));
		}
	
	  if(isset($this->CI->session->userdata['owner_pkg_trial']) && $this->CI->session->userdata['owner_pkg_trial']=='TLEXT')
	  {
		  ### if trial period remaining
		  $this->CI->session->set_userdata(array(
			'_emp_addlmt'=>50							
		  ));
	  } 

	  if( $this->CI->session->userdata['owner_pkg_trial'] == 'TLEXP' )
	  {			  
		  if( isset($this->CI->session->userdata['owner_pkg_resourcexid']) && ($this->CI->session->userdata['owner_pkg_resourcexid'] == '' || $this->CI->session->userdata['owner_pkg_resourcexid']== 0) )
		  {
			  $this->CI->session->set_userdata(array(
				'_sel_pkg' => 0								
			  ));
			  #### Tril period is over And package is not selected
			  //header('location:'.SITE_URL.'billing-information'."?success=".base64_encode('your trial is over kindly select any package!'));
		  }
		  else if(  isset($this->CI->session->userdata['owner_pkg_resourcexid']) && ($this->CI->session->userdata['owner_pkg_resourcexid'] != '' && $this->CI->session->userdata['owner_pkg_resourcexid']>0) )
		  {
			  $this->CI->session->set_userdata(array(
				'_sel_pkg' => 1							
			  ));
			  #### Tril period is over And package is selected
			  #### Tril period is over And package is selected
			  // echo "Package is selected"; 
			  // chck of add or can't add employee
			  // echo $emp_count; echo "         ".$emp_pkg; 
		  
		  	$owner_pkg_resourcexid = $this->CI->session->userdata['owner_pkg_resourcexid'];
		  
			if($owner_pkg_resourcexid==2)
			{
				$this->CI->session->set_userdata(array(
					'_emp_addlmt'=>10								
				));
			}
			else if($owner_pkg_resourcexid==3)
			{
				$this->CI->session->set_userdata(array(
					'_emp_addlmt'=>20								
				));
			}
			else if($owner_pkg_resourcexid==4)
			{
				$this->CI->session->set_userdata(array(
					'_emp_addlmt'=>30								
				));
			}
			else if($owner_pkg_resourcexid==5)
			{
				$this->CI->session->set_userdata(array(
					'_emp_addlmt'=>40								
				));
			}
			else if($owner_pkg_resourcexid==6)
			{
				$this->CI->session->set_userdata(array(
				'_emp_addlmt'=>50								
				));
			}
		  }
	  } 
	
	
	// hassan changes for employee access level 07-10-2015-09-15
	### generic employee access rights for option employee
		if($this->CI->session->userdata('emp_id')>0)
		{
			$this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'employee','emp');

			### generic employee access rights for option services
			$this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'services','ser');

			### generic employee access rights for option customer
			$this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'customer','cus');

			### generic employee access rights for option calendar
			$this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'calendar','cal');

			### generic employee access rights for option groups
			$this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'groups','grp');

			### generic payment slip access rights for option groups
			echo $this->CI->sg_common_model->giveEmployeeAccessRights($this->CI->session->userdata('access_level'),'checkout','psp');

		}
			 			  
	}
	
	
	
}
?>