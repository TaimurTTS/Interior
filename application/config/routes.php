<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']     = 'home/index';

//ADMIN
$route['admin']            = 'admin/index';
$route['admin-login']      = 'admin/login';
$route['admin-slider']     = 'admin/slider';
$route['add-slider']       = 'admin/addSlider';
$route['update-slider/:num']    = 'admin/updateSlider';
$route['delete-slider-image/:num']    = 'admin/deleteSlider';
$route['manage-category']     = 'admin/category';
$route['add-category']     = 'admin/addCategory';
$route['update-category/:num']    = 'admin/updateCategory';
$route['delete-category/:num']    = 'admin/deleteCategory';
$route['manage-subcategory']     = 'admin/subCategory';
$route['add-subcategory']     = 'admin/addSubcategory';
$route['update-subcategory/:num']    = 'admin/updateSubcategory';
$route['delete-subcategory/:num']    = 'admin/deleteSubcategory';
$route['manage-product']    = 'admin/product';



$route['get-data']     = 'user/getData';
$route['save-company']     = 'user/saveCompany';
$route['edit-company']     = 'user/editCompany';
$route['save-application']     = 'user/addApplication';
$route['edit-application']     = 'user/editApplication';
$route['save-computer']     = 'user/saveComputer';
$route['edit-computer']     = 'user/editComputer';
$route['company-status']     = 'user/companyActive';
$route['application-status']     = 'user/applicationActive';
$route['computer-status']     = 'user/computerActive';
$route['search-computer']     = 'user/computerSearch';
$route['search-company']     = 'user/computerCompanySearch';
$route['get-computer']     = 'user/getComputer';
$route['computer-detail/(:any)'] 	= 'user/get_api';