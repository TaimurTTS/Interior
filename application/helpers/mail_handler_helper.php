<?php
class mail_handler
{
	private $table = 'mails';

	var $sent_to = '';
	var $mail_subject = '';
	var $mail_text = '';
	var $sent_on = '';
	function send_mail($to, $subject, $heading, $body_in,$attachment, $frm_nm='Travel Package Compare', $frm_email='info@travelpackagecompare.com')
    {
        global $constsx;
        $site_url = $constsx['SITE_URL'];

        ##define Body
        $messg  = '';
        $messg .= '<div style="width:650px; padding:2px; color:#545453; font-family: Arial,Helvetica,sans-serif; font-size:12px;">';

        $messg .= '<div style="width:100%; height:38px; background:none repeat scroll 0 0 #087dc2; color:#087dc2;">&nbsp;.&nbsp;</div>';
        $messg .= '<div style="padding:20px 15px 12px 15px; ackground:repeat scroll 0 0 #087dc2;">';

        $messg .= '<div>';
        $messg .= '<div style="padding-left:1px; margin-left:-5px;"><a href="'.SITE_URL.'" target="_blank"><img src="'.SITE_URL.'assets/images/logo.png" border="none" /></a></div><br />';

        $messg .= '<div style="padding-top:5px; border-bottom:solid 1px #087dc2;">';
        $messg .= "<div style='padding:3px 5px 3px 1px; border:none; border-bottom:solid 1px #087dc2;'><b style='font-size:15px; color:#087dc2;'>".$heading."</b></div><br />";
        $messg .= "<div style='padding:10px 0 3px; color:#545453;'>".$body_in."</div>";
        $messg .= "<br /><br /><b style='color:#087dc2; font-size:14px;'>Regards,<br />TravelPackageCompare.com</b><br /><br />";
        $messg .= '</div>';

        $messg .= '</div><br />';

        $messg .= '</div>';
        $messg .= '</div>';

        //echo $messg; die();

        //$messg = chunk_split(base64_encode($messg));

        /*
        ## Defining Header
        $hdr='';
        $hdr.='MIME-Version: 1.0'."\n";
        $hdr.='Content-type: text/html; charset=utf-8'."\n";
        $hdr.='Content-Transfer-Encoding: base64'."\n";
    	$hdr.="From: {$frm_nm}<{$frm_email}>\n";
        $hdr.="Reply-To: {$frm_nm}<{$frm_email}>\n";
        $hdr.="Return-Path: <{$frm_email}>\n";
        $hdr.="Message-ID: <".time()."@{$frm_email}>\n";
        $hdr.='X-Mailer: DSP/1.0';
        #*/


        #/ Hide PHP Script Identifiers (X-PHP-Script)
        $phpself = $_SERVER['PHP_SELF'];
        $phpremoteaddr = $_SERVER['REMOTE_ADDR'];
        $phpservername = $_SERVER['SERVER_NAME'];
        $_SERVER['PHP_SELF'] = "/";
        $_SERVER['REMOTE_ADDR'] = "0.0.0.0";
        $_SERVER['SERVER_NAME'] = "none";


        #/ Send Email
        /*
        $x=@mail($to, $subject, $messg, $hdr);
        if($x==0)
        {
        	$to = str_replace('@', '\@', $to);
        	$hdr = str_replace('@', '\@', $hdr);

        	$x = @mail($to, $subject, $messg, $hdr);
        }
        #*/
        $x = $this->send_email($to, $messg, $subject,$attachment, $frm_email, $frm_nm);
		$this->save_email( $to, $subject,$messg);
		
        #/ restore obfuscated server variables
        $_SERVER['PHP_SELF'] = $phpself;
        $_SERVER['REMOTE_ADDR'] = $phpremoteaddr;
        $_SERVER['SERVER_NAME'] = $phpservername;


        return $x;

    }//end func.....


    function send_email($to, $message, $subject,$attachment, $from, $from_nm)
	{
		$config = Array(
    		'charset' => 'utf-8',
    		'mailtype' => 'html',
    		);

		//$message = $this->add_email_body_to_message($message);

		$ci_obj = new CI_Controller();
        $ci_obj->load->library('email', $config);
		
        //$this->email->set_newline("\n");
		$ci_obj->email->from($from, $from_nm); //('no-reply@TravelPackageCompare.com', 'Travel Package Compare');
		$ci_obj->email->reply_to($from, $from_nm);
		
        $ci_obj->email->to($to);

		$ci_obj->email->subject($subject);
		$ci_obj->email->message($message);
		if($attachment == 1){
			//$ci_obj->email->attach('D:\Users\eForte\Desktop\people\Alberto.jpg');
			$ci_obj->email->attach($site_url.'assets/images/logo.png');
		}
        //die('x');
		if(!$ci_obj->email->send())
        return array($ci_obj->email->print_debugger());
        else
        return true;

	}//end func....


	/*
    private function add_email_body_to_message ($message)
    {

		return '<div style="width:650;margin 0 auto;">
			<div>
				<font face="Lucida Grande, Segoe UI, Arial, Verdana, Lucida Sans Unicode, Tahoma, Sans Serif">
					<span style="font-size: 30px; color: #79C500; letter-spacing: 1.5px;">Travel Package Compare</span>
				</font>
			</div>
			<div>
				<font face="Lucida Grande, Segoe UI, Arial, Verdana, Lucida Sans Unicode, Tahoma, Sans Serif">
				<br />
					'.$message.'
					<br /><br />
					Regards<br />
					The Travel Package Compare team
				</font>
			</div>
			<div style="padding-top: 15px;">
				<font face="Lucida Grande, Segoe UI, Arial, Verdana, Lucida Sans Unicode, Tahoma, Sans Serif">
					<span style="font-size: 12px; color: #888"> � 2013 <span class="il">Travel Package Compare</span></span>
				</font>
			</div>
			</div>';
	}
    */


	function send_email_to_new_user($email, $activation_token)
	{
		$subject = "Welcome to Travel Package Compare";
		$message= 'Thank you for signing up for Travel Package Compare! The last thing you need to do is activate your account by clicking the link below
		<br/><br/>
		'.SITE_URL.'user/activate?email='.$email.'&at='.$activation_token;
		$this->send_email($email, $message, $subject);
		//$this->save_email($email, $subject, $message);

	}

	function save_email( $email, $subject,$message)
	{
		$to_save = array ();
        $to_save['e_to'] = $email;
		$to_save ['e_from'] = 'Info@Travelliser.com';
		$to_save ['e_subject'] = $subject;
		$to_save ['e_message'] = $message;
		$to_save ['e_date'] = date('Y-m-d G:i:s');
        $to_save ['e_sent'] = 1;
		$CI =& get_instance();
		
		$CI->db->insert('sent_emails', $to_save);

		//return  $this->db->insert_id () ;
	}
	public function forgot_password($email,$link)
	{      

		$subject = "Reset your password on Travelliser";

		$message = 'Hello
		<br/><br/>
		We received a request to reset the password associated with this e-mail address.
		If you made this request, please follow the instructions below. Click the link below to reset your password using our secure server:<br/>
		<a href="'.$link.'">Click here..</a><br/>
		If you did not request to have your password reset you can safely ignore this email.
		Rest assured your customer account is safe.<br><br> We will never e-mail you and ask you to disclose or verify your account\'s password, credit card,
		 or banking account number.
		 If you receive a suspicious e-mail with a link to update your account information,
		 do not click on the link--instead, report the e-mail to Travelliser for investigation.
<br><br><br><br>
		 Thanks for visiting Travelliser!<br><br>
		 Team Travelliser!';

		// $this->send_email($email, $message, $subject);
		$this->save_email($email, $subject, $message);


	}

}
