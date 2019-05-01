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


$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['forgetpassword'] = 'auth/forgetpassword';
 

//users
$route['users'] = 'user/index';
$route['users/add'] = 'user/add';
$route['users/(:num)'] = 'user/edit/$1';

//Whare hosue
$route['warehouse/listing/(:any)'] = 'Warehouse/index/$1'; // whare house listing
$route['warehouse/assignusers'] = 'Warehouse/assignusers'; // whare house listing
$route['warehouse/add'] = 'Warehouse/add';
$route['warehouse/edit/(:num)'] = 'Warehouse/edit/$1';

//Whare hosue Types
$route['warehouse/types/listing/(:any)'] = 'Warehouse/types/$1'; // whare house types listing
$route['warehouse/types/add'] = 'Warehouse/add_type';
$route['warehouse/types/edit/(:num)'] = 'Warehouse/edit_type/$1';

//Inventory 
$route['inventory/(:num)'] = 'inventory/edit/$1';



//Inventory hosue Types

$route['inventory/types'] = 'Inventorytypes/index';
$route['inventory/types/listing/(:any)'] = 'Inventorytypes/index/$1'; // inventory  types listing
$route['inventory/types/add'] = 'Inventorytypes/add';
$route['inventory/types/edit/(:num)'] = 'Inventorytypes/edit/$1';


$route['crud'] = 'Crud/index';



// Dashboas

$route['dashboard/activity_listing/(:any)'] = 'Dashboard/activity_listing/$1'; // activity listing


// reports

$route['users/report'] = 'Report'; // user activity listing
$route['spares/report'] = 'Report/inventory_report'; // user activity listing




