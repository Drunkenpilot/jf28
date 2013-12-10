<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';


$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['forgot_password'] = 'auth/forgot_password';
$route['forgot_password_success'] = 'auth/forgot_password_success';
$route['set_newpwd'] = 'auth/set_newpwd';
$route['set_newpwd_error'] = 'auth/set_newpwd_error';
$route['set_newpwd_success'] = 'auth/set_newpwd_success';

$route['preference'] = 'preference';
$route['preference/administration'] ='preference/administration';
$route['preference/administration/addNewAdmin'] = 'preference/administration/addNewAdmin';
$route['preference/theme'] ='preference/theme';


$route['apps/city/(:num)'] = "apps/city/index";
$route['customers/customers/(:num)'] = "customers/customers/index";
$route['catalog/products/(:num)'] = "catalog/products/index";

/* End of file routes.php */
/* Location: ./application/config/routes.php */