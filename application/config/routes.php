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
|	https://codeigniter.com/userguide3/general/routing.html
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
|
| Contoh :
| format url (Request/req/tampReq)
| format to controller (Request/postReq) 
| Request -> class di controller
| postReq -> fuction di dalam controller
*/
$route['default_controller']        = 'Dashboard/index';
$route['404_override']              = 'Dashboard/error404';
$route['translate_uri_dashes']      = FALSE;

$route['Dashboard/das']             = 'Dashboard/index';

$route['Supplier/sup']              = 'Supplier/index';
$route['Supplier/sup/getListSup']	= 'Supplier/getListSup';
$route['Supplier/sup/createSup']	= 'Supplier/createSup';

// Item
$route['Item/itm/getListItm']       = 'Item/index';
$route['Item/itm/createItm']        = 'Item/add';

// Request
$route['Request/req/getListReq']    = 'Request/index';
$route['Request/req/createReq']     = 'Request/add';
$route['Request/req/getSupplier']	= 'Request/getSupplier';
$route['Request/req/getMstrBrg']	= 'Request/getMstrBrg';
$route['Request/req/postTmpReq']	= 'Request/postTmpReq';
$route['Request/req/GetDtlBarang']	= 'Request/GetDtlBarang';
$route['Request/req/delTmpReq']		= 'Request/delTmpReq';
$route['Request/req/postReq']		= 'Request/postReq';
$route['Request/req/dtlReq']        = 'Request/dtlReq';

// Stock
$route['Stock/sto/getListStock']	= 'Stock/getListStock';
$route['Stock/sto/stockIn']			= 'Stock/stock_in_data';
$route['Stock/sto/stockOut']		= 'Stock/stock_out_data';

$route['User/usr']                  = 'User/index';

$route['Stock/in']          		= 'stock/stock_in_data';
$route['Stock/in/add']      		= 'stock/stock_in_add'; 

$route['Stock/out']         		= 'stock/stock_out_data';
$route['Stock/out/add']     		= 'stock/stock_out_add'; 
