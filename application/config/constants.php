<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

##create constanst
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    define('URL', 'https://');
} else {
    define('URL', 'http://');
}
define('SITE_URL', URL . 'http://localhost:7777/simpleWebsite');
define('SITE_ADMIN_URL', SITE_URL . 'administrator/');
define('APP_NAME', '');
define('FROM_EMAIL','noreply@krank.co.uk');

define('IMG_URL', SITE_URL . 'assets/img/');
define('IMAGE_URL', SITE_URL . 'assets/images/');
define('CSS_URL', SITE_URL . 'assets/css/');
define('JS_URL', SITE_URL . 'assets/js/');
define('AD_IMG', SITE_URL . 'assets/files/');
define('IMG_PROF', SITE_URL . 'assets/files/profile/');
define('IMG_DEST', SITE_URL . 'assets/files/destination/');

##for admin
define('IMG_ADMIN_URL', SITE_URL . 'assets/administrator/images/');
define('FONTS_ADMIN_URL', SITE_URL . 'assets/administrator/fonts/');
define('CSS_ADMIN_URL', SITE_URL . 'assets/administrator/css/');
define('JS_ADMIN_URL', SITE_URL . 'assets/administrator/js/');
define('AVATAR_ADMIN_URL', SITE_URL . 'assets/administrator/avatars/');

/* End of file constants.php */
/* Location: ./application/config/constants.php */