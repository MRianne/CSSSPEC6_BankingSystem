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
$route['transact/otc/withdraw']['GET'] = "WebsiteController/tellerView/withdrawAccount";
$route['transact/otc/withdraw']['POST'] = "TransactionController/otc_withdrawal";
$route['transact/online/transfer']['GET'] = "TransactionController/online_fund_transfer_view";
$route['transact/online/transfer']['POST'] = "TransactionController/online_fund_transfer";
/*
 * Account routes
 */
$route['account/all'] = 'UserController/get_all';
$route['account/create/(:any)']['GET'] = "WebsiteController/tellerView/createAccount/$1";
$route['account/create/(:any)']['POST'] = 'AccountController/create/$1';
$route['account/type/create']['GET'] = "WebsiteController/tellerView/CreateAccountType";
$route['account/type/create']['POST'] = "AccountTypeController/create";
$route['account/type/view'] = "websitecontroller/tellerView/listAccountTypes";
$route['account/type/view/(:any)'] = "websitecontroller/tellerView/viewAccountType";
$route['account/type/edit/(:any)'] = "websitecontroller/tellerView/editAccountType";
$route['account/type/delete'] = "websitecontroller/tellerView/viewAccountType";

$route['account/search'] = "WebsiteController/tellerView/searchAccount";
$route['account/viewBalance/(:any)'] = "AccountController/viewBalance/$1";
$route['account/viewBalance']['POST'] = "AccountController/balInq";
$route['account/viewTransactionHist/(:any)'] = "TransactionController/viewTransactionHist/$1";
/*
 * User routes
 */
$route['user/login'] = "UserController/login";
$route['user/logout'] = "UserController/logout";
$route['user/profile'] = "CustomerController/dashboard";
$route['user/customer/create/(:any)']['GET'] = "UserController/createCustomerView/$1";
$route['user/customer/create'] = "WebsiteController/tellerView/createUserAccount";
$route['user/changePass']['GET'] = "Websitecontroller/loadView/changePass";
$route['user/changePass']['POST'] = "UserController/changePass";
$route['user/create']['GET'] = "WebsiteController/tellerView/createUserAccount";
$route['user/create/(:any)']['POST'] = "UserController/create/$1";
$route['user/create']['POST'] = "UserController/create";
/**
Route::get('index','NameController@functionname')->name('index-url'); //localhost.com/index
Route::get('index',function(){
	return view('views/sample');
})->name('index-url'); //localhost.com/index

*/
/*
 * Customer routes
 */
$route['customer/create']['GET'] = "WebsiteController/tellerView/createCustomer";
$route['customer/create']['POST'] ="CustomerController/create";
$route['customer/search']['GET'] = "WebsiteController/tellerView/searchCustomer";
$route['customer/search']['POST'] = "CustomerController/get";
$route['customer/edit'] ="WebsiteController/tellerView/editCustomer";

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
$route["customer"] = "CustomerController/dashboard";
$route["balanceInquiry"] = "AccountController/balInqView";
$route["transferFunds"] = "TransactionController/online_fund_transfer_view";
$route["transactionList"] = "WebsiteController/loadView/list";
$route["teller/createAccount"] = "WebsiteController/tellerView/createCustomer";
$route["teller/createAccountType"] = "WebsiteController/tellerView/createAccountType";
$route["teller/checkAccountBalance"] = "WebsiteController/tellerView/checkAccount";
$route["teller/withdrawFromAccount"] = "WebsiteController/tellerView/withdrawAccount";
$route["teller/depositToAccount"] = "WebsiteController/tellerView/depositAccount";
$route["teller/transferFunds"] = "WebsiteController/tellerView/transferFunds";
$route["teller/approveTransfers"] = "WebsiteController/tellerView/approveTransfers";
$route["teller/profile"] = "WebsiteController/tellerView/t_profile";
$route["teller/changePass"] = "WebsiteController/tellerView/changePass";
$route["teller"] = "WebsiteController/tellerView/t_profile";

$route['api/transactions'] = "TransactionController/get_my_transactions";