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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
 * Trahsaction routes
 */
$route['transact/transfer']['GET'] = "WebsiteController/tellerView/transferFunds";
$route['transact/transfer']['POST'] = "TransactionController/otc_fund_transfer";
$route['transact/otc/deposit']['GET'] = "WebsiteController/tellerView/depositAccount";
$route['transact/otc/deposit']['POST'] = "TransactionController/otc_deposit";
/*
 * Account routes
 */
$route['account/all'] = 'UserController/get_all';
$route['account/create/(:any)']['GET'] = "WebsiteController/tellerView/createAccount/$1";
$route['account/create/(:any)']['POST'] = 'AccountController/create/$1';
$route['account/type/create']['GET'] = "WebsiteController/tellerView/CreateAccountType";
$route['account/type/create']['POST'] = "AccountTypeController/create";

/*
 * User routes
 */
$route['user/login'] = "UserController/login";
$route['user/logout'] = "UserController/logout";
$route['user/create']['POST'] = "UserController/create";
$route['user/create']['GET'] = "WebsiteController/tellerView/createUserAccount";

/*
 * Customer routes
 */
$route['customer/create']['GET'] = "WebsiteController/tellerView/createCustomer";
$route['customer/create']['POST'] ="CustomerController/create";

/*
 * Migration Routes
 */
$route["migrate"] = "MigrationController/index";
$route["migrate/(:any)"] = "MigrationController/index/$1";
$route["migrate/(:any)/(:num)"] = "MigrationController/index/$1/$2";

/*
*ATM Routes
*/
$route["ATM"] = "ATMController";
/*
*Website Routes
*/
$route["website"] = "WebsiteController";
$route["profile"] = "WebsiteController/loadView/profile";
$route["balanceInquiry"] = "WebsiteController/loadView/balInq";
$route["transferFunds"] = "WebsiteController/loadView/transfer";
$route["transactionList"] = "WebsiteController/loadView/list";
$route["teller/createAccount"] = "WebsiteController/tellerView/createCustomer";
$route["teller/createAccountType"] = "WebsiteController/tellerView/createAccountType";
$route["teller/viewAccounts"] = "WebsiteController/tellerView/viewAccounts";
$route["teller/checkAccountBalance"] = "WebsiteController/tellerView/checkAccountBal";
$route["teller/withdrawFromAccount"] = "WebsiteController/tellerView/withdrawAccount";
$route["teller/depositToAccount"] = "WebsiteController/tellerView/depositAccount";
$route["teller/transferFunds"] = "WebsiteController/tellerView/transferFunds";
$route["teller/approveTransfers"] = "WebsiteController/tellerView/approveTransfers";
$route["teller"] = "WebsiteController/tellerView/profile";