<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(1);
class User extends MX_Controller { 

  function __construct()  
  { 
    parent::__construct();
    $this->load->helper('url');

    $this->load->library(array('form_validation', 'email', 'session', 'pagination', 'upload'));
    $this->load->model('user_model','user_model');
    $this->load->model(array("admin_manager", "main_manager", 'joins_manager'));
  }

  public function index()
  {
    $final_data['company'] = $this->user_model->getCompanyData();
    $final_data['application'] = $this->user_model->getActiveApplicationData();
    $this->load->view('user/index',$final_data);
    return true;
  }

  public function getData()
  {
    if($_POST) {
      $final_data['company'] = $this->user_model->getCompanyData();
      $final_data['computer'] = $this->user_model->getComputerData();
      $final_data['application'] = $this->user_model->getApplicationData();
      echo json_encode($final_data);
    }
  }

  public function getComputer()
  {
    if($_POST) {
      $final_data['computer'] = $this->user_model->getComputerData();
      echo json_encode($final_data);
    }
  }

  /*************************SAVE COMPANY *****************************/
  public function saveCompany()
  {
    if($_POST) {

      $data  = array();
      $data['companyName']  =   strip_tags($this->input->post('companyName'));
      $data['domainName']   =   strip_tags($this->input->post('domainName'));
      $data['source']   =   strip_tags($this->input->post('source'));
      $data['sourcePath']   =   strip_tags($this->input->post('sourcePath'));
      $data['userName']   =   strip_tags($this->input->post('userName'));
      $data['password']   =   strip_tags($this->input->post('password'));

      $result = $this->user_model->saveCompany($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function editCompany()
  {
    if($_POST) {
      $data  = array();
      $data['companyName']  =   strip_tags($this->input->post('companyName'));
      $data['domainName']   =   strip_tags($this->input->post('domainName'));
      $data['source']   =   strip_tags($this->input->post('source'));
      $data['sourcePath']   =   strip_tags($this->input->post('sourcePath'));
      $data['userName']   =   strip_tags($this->input->post('userName'));
      $data['password']   =   strip_tags($this->input->post('password'));
      $data['id']           =   strip_tags($this->input->post('id'));

      $result = $this->user_model->editCompany($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => 'Data Updated' ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  /*************************SAVE APPLICATION *****************************/
  public function addApplication()
  {
    if($_POST) {
      $data  = array();
      $data['appName']    =   strip_tags($this->input->post('appName'));
      $data['appLink']    =   strip_tags($this->input->post('appLink'));
      $data['appCommand'] =   strip_tags($this->input->post('appCommand'));

      $result = $this->user_model->saveApplication($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  /* EDIT APPLICATION */
  public function editApplication()
  {
    if($_POST) {
      $data  = array();
      $data['appName']  =   strip_tags($this->input->post('appName'));
      $data['appLink']   =   strip_tags($this->input->post('appLink'));
      $data['appCommand']   =   strip_tags($this->input->post('appCommand'));
      $data['id']           =   strip_tags($this->input->post('id'));

      $result = $this->user_model->editApplication($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function saveComputer()
  {
    if($_POST) {
      $data  = array();
      $data['compName']      =   strip_tags($this->input->post('compName'));
      $data['compSno']       =   strip_tags($this->input->post('compSno'));
      $data['compModel']      =   strip_tags($this->input->post('compModel'));
      $data['applications']  =   strip_tags($this->input->post('applications'));
      $data['domainJoined']  =   strip_tags($this->input->post('domainJoined'));
      $data['companyJoined'] =   strip_tags($this->input->post('companyJoined'));

      $result = $this->user_model->saveComputer($data);
      if($result) {
        $data['id'] = $result;
        $this->generateXml($data,$result,false);
        //echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function editComputer()
  {
    if($_POST) {
      $data  = array();
      $data['compName']      =   strip_tags($this->input->post('compName'));
      $data['compSno']       =   strip_tags($this->input->post('compSno'));
      $data['compModel']      =   strip_tags($this->input->post('compModel'));
      $data['applications']  =   strip_tags($this->input->post('applications'));
      $data['domainJoined']  =   strip_tags($this->input->post('domainJoined'));
      $data['companyJoined'] =   strip_tags($this->input->post('companyJoined'));
      $data['id']           =   strip_tags($this->input->post('id'));

      $result = $this->user_model->editComputer($data);
      if($result) {
        $this->generateXml($data,$result,true);
        // echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function companyActive()
  {
    if($_POST) {
      $data  = array();
      $data['id']     =   strip_tags($this->input->post('id'));
      $data['action'] =   strip_tags($this->input->post('action'));

      $result = $this->user_model->companyAction($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function computerActive()
  {
    if($_POST) {
      $data  = array();
      $data['id']     =   strip_tags($this->input->post('id'));
      $data['action'] =   strip_tags($this->input->post('action'));

      $result = $this->user_model->computerAction($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function applicationActive()
  {
    if($_POST) {
      $data  = array();
      $data['id']     =   strip_tags($this->input->post('id'));
      $data['action'] =   strip_tags($this->input->post('action'));

      $result = $this->user_model->applicationAction($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function computerSearch()
  {
    if($_POST) {
      $data  = array();
      $data['search'] =   strip_tags($this->input->post('search'));

      $result = $this->user_model->searchComputer($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function computerCompanySearch()
  {
    if($_POST) {
      $data  = array();
      $data['search'] =   strip_tags($this->input->post('search'));

      $result = $this->user_model->searchCompanyComputer($data);
      if($result) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => false, "data" => null ));
      }
    }
  }

  public function get_api()
  {
    $uri = $this->uri->segment(2);
    $xmlUrl = $this->user_model->computerBySerialNumber($uri);
    if($xmlUrl[0]['id'] == NULL)
    {
      echo 'No Computer Found !'; 
    }
    else if($xmlUrl)
    {
      $jsonRes = (object) $xmlUrl[0];
      $myObj = new StdClass();
      $myObj->pc_id = $jsonRes->id;
      $myObj->domain = $jsonRes->companyDomain;
      $myObj->hostname = $jsonRes->companyName;
      $myObj->source = $jsonRes->source;
      $myObj->source_path = $jsonRes->sourcePath;
      $myObj->username = $jsonRes->userName;
      $myObj->password = $jsonRes->password;
      $appName = explode(',', $jsonRes->AppIds);
      $appData = $this->user_model->appById($jsonRes->AppIds);
      $myObj->applications = $appData;
      $myObj->xml = base_url().'xml/'.$jsonRes->url;
      echo json_encode($myObj,JSON_UNESCAPED_SLASHES);
    }
  }

  function generateXml($data,$result,$isEdit)
  {
    if($isEdit) {
      $id = $result['id'];
    } else {
      $id = $result;
    }
    $companyName = $this->user_model->companyById($data['companyJoined']);
    $test_xml = '<?xml version="1.0" encoding="utf-8"?>';
    $test_xml .= 
    '<unattend xmlns="urn:schemas-microsoft-com:unattend">
    <settings pass="oobeSystem">
        <component name="Microsoft-Windows-International-Core" processorArchitecture="amd64" publicKeyToken="31bf3856ad364e35" language="neutral" versionScope="nonSxS" xmlns:wcm="http://schemas.microsoft.com/WMIConfig/2002/State" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <InputLocale>0409:00000409</InputLocale>
            <SystemLocale>en-US</SystemLocale>
            <UILanguage>en-US</UILanguage>
            <UserLocale>en-US</UserLocale>
        </component>
        <component name="Microsoft-Windows-Shell-Setup" processorArchitecture="amd64" publicKeyToken="31bf3856ad364e35" language="neutral" versionScope="nonSxS" xmlns:wcm="http://schemas.microsoft.com/WMIConfig/2002/State" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
            <OOBE>
                <HideEULAPage>true</HideEULAPage>
                <HideOEMRegistrationScreen>true</HideOEMRegistrationScreen>
                <HideOnlineAccountScreens>true</HideOnlineAccountScreens>
                <HideWirelessSetupInOOBE>true</HideWirelessSetupInOOBE>
                <HideLocalAccountScreen>true</HideLocalAccountScreen>
                <ProtectYourPC>3</ProtectYourPC>
            </OOBE>
            <UserAccounts>
                <AdministratorPassword>
                    <Value>UwB1AHAAZQByAGgAZQBzAGwAbwAxAEEAZABtAGkAbgBpAHMAdAByAGEAdABvAHIAUABhAHMAcwB3AG8AcgBkAA==</Value>
                    <PlainText>false</PlainText>
                </AdministratorPassword>
                <LocalAccounts>
                    <LocalAccount wcm:action="add">
                        <Password>
                            <Value>UwB1AHAAZQByAGgAZQBzAGwAbwAxAFAAYQBzAHMAdwBvAHIAZAA=</Value>
                            <PlainText>false</PlainText>
                        </Password>
                        <Description>maint</Description>
                        <DisplayName>maint</DisplayName>
                        <Group>Administrators</Group>
                        <Name>maint</Name>
                    </LocalAccount>
                </LocalAccounts>
            </UserAccounts>
            <FirstLogonCommands>
                <SynchronousCommand wcm:action="add">
                    <CommandLine>powershell -NoLogo -ExecutionPolicy Unrestricted  -File C:\Windows\Setup\Scripts\startup.ps1</CommandLine>
                    <Order>1</Order>
                </SynchronousCommand>
            </FirstLogonCommands>
        </component>
    </settings>
    <settings pass="specialize">
        <component name="Microsoft-Windows-Shell-Setup" processorArchitecture="amd64" publicKeyToken="31bf3856ad364e35" language="neutral" versionScope="nonSxS" xmlns:wcm="http://schemas.microsoft.com/WMIConfig/2002/State" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><ComputerName>'.$data['compName'].'</ComputerName>
            <AutoLogon>
                <Password>
                    <Value>UwB1AHAAZQByAGgAZQBzAGwAbwAxAFAAYQBzAHMAdwBvAHIAZAA=</Value>
                    <PlainText>false</PlainText>
                </Password>
                <LogonCount>1</LogonCount>
                <Enabled>true</Enabled>
                <Domain> '.$data['compName'].' </Domain>
                <Username>maint</Username>
            </AutoLogon>
        </component>';

    if($data['domainJoined'] == 1) {
      $test_xml .= '<component name="Microsoft-Windows-UnattendedJoin" processorArchitecture="amd64" publicKeyToken="31bf3856ad364e35" language="neutral" versionScope="nonSxS" xmlns:wcm="http://schemas.microsoft.com/WMIConfig/2002/State" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <Identification>
                    <DebugJoin>true</DebugJoin>
                    <JoinDomain>'.$companyName[0]['domain_name'].'</JoinDomain>
                    <MachinePassword>'.$data['compName'].'</MachinePassword>
                    <UnsecureJoin>true</UnsecureJoin>
                </Identification>
            </component>';
    } 

    $test_xml .= '</settings>
        <cpi:offlineImage cpi:source="wim:c:/tmp/install.wim#Windows 10 Pro" xmlns:cpi="urn:schemas-microsoft-com:cpi" />
    </unattend>';

    $companyName = str_replace(' ','-',$companyName[0]['name']);
    $filename = $companyName.'-Computer-'.$id.'.xml';
    if (!is_dir('xml')) {
      mkdir('xml');
    }
    file_put_contents('xml/'.$filename, $test_xml);
    $xmlUrl = $this->user_model->computerXmlUrl($id,$filename);
    if($xmlUrl)
    {
      if($isEdit) {
        echo json_encode(array("success" => true, "data" => $result ));
      } else {
        echo json_encode(array("success" => true, "data" => $id ));  
      }
    }
    else
    {
      echo json_encode(array("success" => false, "data" => null ));
    }
  }
}

/* End of file hmvc.php */
/* Location: ./application/widgets/hmvc/controllers/hmvc.php */
