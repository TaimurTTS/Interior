<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Config for the Plivo library
 */
$config = Array( 
'protocol' => 'smtp',
'smtp_host' => 'smtp.mailgun.org',
'smtp_port' => 25,
'smtp_user' => 'postmaster@mailgun.tmo.co.uk', 
'smtp_pass' => 'testtest',
'mailtype'  => 'html', 
'charset'   => 'utf-8',
'crlf'      => "\r\n",       
'newline'   => "\r\n",       
);