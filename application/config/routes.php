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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'Main';

$route['registration'] = 'Main/registration';
$route['detail/(:num)'] = 'Main/detail/$1';
$route['report/(:num)'] = 'Main/report/$1';
$route['product'] = 'bes_bd/product';
$route['cost_calculate'] = 'bes_bd/cost_calculate';
$route['contact'] = 'bes_bd/contact';
$route['city_division'] = 'admin/city_division';
$route['area_location'] = 'admin/area_location';
$route['view_report'] = 'admin/view_report';
$route['cl_detail/(:num)'] = 'admin/cl_detail/$1';
$route['cl_info_edit/(:num)'] = 'admin/cl_info_edit/$1';
$route['cl_pic_delete/(:num)'] = 'admin/cl_pic_delete/$1';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
