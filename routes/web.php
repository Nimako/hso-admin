<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@dashboard');


Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::post('update-registration', 'AuthController@updateRegistration');
Route::get('delete-registration/{id}', 'AuthController@deleteRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');
Route::get('user-edit/{id}', 'AuthController@editUser');


Route::get('/order-detail/{id}', 'TransactionController@GetEntries');
Route::get('/orders/{id}', 'TransactionController@Orders');

//--------------------------------------------------


Route::get('/bills', 'PageController@bills');
Route::get('/bill-account/{id}', 'PageController@billAccount');
Route::resource('ledgers', 'LedgerController');
Route::get('bill-list', 'LedgerController@billList');
Route::get('payment-list', 'LedgerController@paymentList');

Route::resource('records', 'RecordController');
Route::get('/record-list',  'RecordController@recordList'); //DATATABLES
Route::get('delete-record/{id}', 'RecordController@deleteRecord');


Route::resource('suburb', 'SuburbController');
Route::post('save-suburb', 'SuburbController@SaveSuburb');

Route::resource('fees', 'FeesController');
Route::post('save-fees', 'FeesController@SaveFees');

Route::get('collectors', 'CollectorController@index')->name('collectors');
Route::post('save-collector', 'CollectorController@SaveCollector');
Route::get('/collector-list',  'CollectorController@collectorList');
Route::get('/collector-edit/{id}', 'CollectorController@editCollector');
Route::post('collector-revenue-delete','CollectorController@DeleteCollectorRevenue');
Route::post('update-collector', 'CollectorController@UpdateCollector');
Route::get('SearchStatement', 'CollectorController@SearchStatement');
