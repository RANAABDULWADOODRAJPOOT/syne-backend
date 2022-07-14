<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\productsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::get('/getprofile', [JWTController::class, 'getprofile']);
    Route::post('/profile', [JWTController::class, 'profile']);
});

Route::group(['middleware' => 'auth'], function($router){
Route::get('/availableproducts', ['App\Http\Controllers\productsController', 'getProducts']);
Route::post('/newproduct', 'App\Http\Controllers\productsController@addProduct');
Route::post('/updateproduct/{id}','App\Http\Controllers\productsController@updateProduct');
Route::delete('/deleteproduct/{id}', 'App\Http\Controllers\productsController@deleteProduct');

Route::get('/availablecompanies', 'App\Http\Controllers\adminController@getCompanies');
Route::post('/newcompany', 'App\Http\Controllers\adminController@addCompany');
Route::post('/updatecompany/{id}','App\Http\Controllers\adminController@updateCompany');
Route::delete('/deletecompany/{id}', 'App\Http\Controllers\adminController@deleteCompany');

Route::get('/availablecontacts', 'App\Http\Controllers\adminController@getContacts');
Route::post('/newcontact', 'App\Http\Controllers\adminController@addContact');
Route::post('/updatecontact/{id}','App\Http\Controllers\adminController@updateContact');
Route::delete('/deletecontact/{id}', 'App\Http\Controllers\adminController@deleteContact');


Route::get('/availabletaxes', 'App\Http\Controllers\adminController@getTaxes');
Route::post('/newtax', 'App\Http\Controllers\adminController@addTax');
Route::post('/updatetax/{id}','App\Http\Controllers\adminController@updateTax');
Route::delete('/deletetax/{id}', 'App\Http\Controllers\adminController@deleteTax');

Route::get('/quotations', 'App\Http\Controllers\quotationController@quotations');
Route::get('/quotation/{id}', 'App\Http\Controllers\quotationController@getquotation');
Route::post('/addquotation', 'App\Http\Controllers\quotationController@addquotation');
Route::put('/updatequotation/{id}','App\Http\Controllers\quotationController@updatequotation');
Route::delete('/deletequotation/{id}', 'App\Http\Controllers\quotationController@deletequotation');

Route::get('/jobs', 'App\Http\Controllers\jobController@jobs');
Route::get('/job/{id}', 'App\Http\Controllers\jobController@getjob');
Route::post('/addjob', 'App\Http\Controllers\jobController@addjob');
Route::post('/updatejobs/{id}','App\Http\Controllers\jobController@updatejob');
Route::delete('/deletejobs/{id}', 'App\Http\Controllers\jobController@deletejob');

Route::get('/invoices', 'App\Http\Controllers\invoiceController@invoices');
Route::get('/invoice/{id}', 'App\Http\Controllers\invoiceController@getinvoice');
Route::post('/addinvoice', 'App\Http\Controllers\invoiceController@addinvoice');
Route::post('/updateinvoice/{id}','App\Http\Controllers\invoiceController@updateinvoice');
Route::delete('/deleteinvoice/{id}', 'App\Http\Controllers\invoiceController@deleteinvoice');

});
Route::get('/businessinfo', 'App\Http\Controllers\QuotationController@businessinfo');
Route::post('/updatebusinessinfo', 'App\Http\Controllers\QuotationController@addQuotation');
Route::get('/branding', 'App\Http\Controllers\QuotationController@getSingleQuotation');
Route::post('/updatebranding', 'App\Http\Controllers\QuotationController@addQuotation');
Route::get('/pdfgeneration', 'App\Http\Controllers\QuotationController@getSingleQuotation');
Route::post('/updatepdfgeneration', 'App\Http\Controllers\QuotationController@addQuotation');




// // Quotation Settings

Route::get('/settings/quotation/default', 'App\Http\Controllers\quotationSettingController@getquotationdefault');
Route::post('/settings/quotation/default', 'App\Http\Controllers\quotationSettingController@addquotationdefault');
Route::put('/settings/quotation/default/{id}', 'App\Http\Controllers\quotationSettingController@updatequotationdefault');
Route::delete('/settings/quotation/default/{id}', 'App\Http\Controllers\quotationSettingController@deletequotationdefault');

Route::post('/settings/quotation/customfields', 'App\Http\Controllers\quotationSettingController@addcustomequotationfields');
Route::get('/settings/quotation/customfields', 'App\Http\Controllers\quotationSettingController@getcustomequotationfields');
Route::get('/settings/quotation/customfields/{id}', 'App\Http\Controllers\quotationSettingController@getcustomequotationfields');
Route::put('/settings/quotation/customfields/{id}', 'App\Http\Controllers\quotationSettingController@updatecustomequotationfields');
Route::delete('/settings/quotation/customfields/{id}', 'App\Http\Controllers\quotationSettingController@deletecustomequotationfields');

Route::post('/settings/quotation/fieldslabels', 'App\Http\Controllers\quotationSettingController@addcustomequotationfieldlabels');
Route::get('/settings/quotation/fieldslabels', 'App\Http\Controllers\quotationSettingController@getcustomequotationfieldlabels');
Route::get('/settings/quotation/fieldslabels/{id}', 'App\Http\Controllers\quotationSettingController@getcustomequotationfieldlabel');
Route::put('/settings/quotation/fieldslabels/{id}', 'App\Http\Controllers\quotationSettingController@updatecustomequotationfieldlabel');
Route::delete('/settings/quotation/fieldslabels/{id}', 'App\Http\Controllers\quotationSettingController@deletecustomequotationfieldlabels');

Route::post('/settings/quotation/lineitems', 'App\Http\Controllers\quotationSettingController@addcustomequotationfieldlineitems');
Route::get('/settings/quotation/lineitems', 'App\Http\Controllers\quotationSettingController@getcustomequotationfieldlineitems');
Route::get('/settings/quotation/lineitem/{id}', 'App\Http\Controllers\quotationSettingController@getcustomequotationfieldlineitem');
Route::put('/settings/quotation/lineitem/{id}', 'App\Http\Controllers\quotationSettingController@updatecustomequotationfieldlineitems');
Route::delete('/settings/quotation/lineitem/{id}', 'App\Http\Controllers\quotationSettingController@deletecustomequotationfieldlineitems');

Route::post('/settings/quotation/listcolumns', 'App\Http\Controllers\quotationSettingController@addshowhidelistcolumns');
Route::get('/settings/quotation/listcolumns', 'App\Http\Controllers\quotationSettingController@getshowhidelistcolumns');
Route::get('/settings/quotation/listcolumns/{id}', 'App\Http\Controllers\quotationSettingController@getshowhidelistcolumn');
Route::put('/settings/quotation/listcolumns/{id}', 'App\Http\Controllers\quotationSettingController@updateshowhidelistcolumn');
Route::delete('/settings/quotation/listcolumns/{id}', 'App\Http\Controllers\quotationSettingController@deleteshowhidelistcolumn');

Route::post('/settings/quotation/showhideeditfields', 'App\Http\Controllers\quotationSettingController@getshowhideeditfields');
Route::get('/settings/quotation/showhideeditfields', 'App\Http\Controllers\quotationSettingController@getshowhideeditfields');
Route::get('/settings/quotation/showhideeditfields/{id}', 'App\Http\Controllers\quotationSettingController@getshowhideeditfield');
Route::put('/settings/quotation/showhideeditfields/{id}', 'App\Http\Controllers\quotationSettingController@updateshowhideeditfield');
Route::delete('/settings/quotation/showhideeditfields/{id}', 'App\Http\Controllers\quotationSettingController@deleteshowhideeditfield');

Route::post('/settings/quotation/showhidelineitemcolumns', 'App\Http\Controllers\quotationSettingController@addshowhidelineitemcolumns');
Route::get('/settings/quotation/showhidelineitemcolumns', 'App\Http\Controllers\quotationSettingController@getshowhidelineitemcolumns');
Route::get('/settings/quotation/showhidelineitemcolumns/{id}', 'App\Http\Controllers\quotationSettingController@getshowhidelineitemcolumn');
Route::put('/settings/quotation/showhidelineitemcolumns/{id}', 'App\Http\Controllers\quotationSettingController@updateshowhidelineitemcolumns');
Route::delete('/settings/quotation/showhidelineitemcolumns/{id}', 'App\Http\Controllers\quotationSettingController@deleteshowhidelineitemcolumns');

Route::get('/settings/quotation/pdfsettings', 'App\Http\Controllers\quotationSettingController@getpdftsettings');
// Route::post('/settings/quotation/pdfsettings', 'App\Http\Controllers\quotationSettingController@addQuotation');

Route::post('/settings/quotation/statuses', 'App\Http\Controllers\quotationSettingController@addstatuses');
Route::get('/settings/quotation/statuses', 'App\Http\Controllers\quotationSettingController@getstatuses');
Route::get('/settings/quotation/status/{id}', 'App\Http\Controllers\quotationSettingController@getstatus');
Route::put('/settings/quotation/status/{id}', 'App\Http\Controllers\quotationSettingController@updatestatus');
Route::delete('/settings/quotation/status/{id}', 'App\Http\Controllers\quotationSettingController@deletestatus');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
