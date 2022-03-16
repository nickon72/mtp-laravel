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


Route::get('/', 'HomeController@index');


Route::get('/company', 'CompanyController@index');
Route::get('/company_show/{id}', 'CompanyController@show')->name('company_show');
Route::get('/contract', 'ContractController@index');
Route::get('/contract_show/{id}', 'ContractController@show')->name('contract_show');
Route::get('/contract_active', 'ContractController@contract_active');
Route::get('/contract_active_show/{id}', 'ContractController@contract_active_show')->name('contract_active_show');
Route::get('/contract_tender', 'ContractController@contract_tender');
Route::get('/contract_tender_show/{id}', 'ContractController@contract_tender_show')->name('contract_tender_show');
Route::get('/contract_direct', 'ContractController@contract_direct');
Route::get('/contract_direct_show/{id}', 'ContractController@contract_direct_show')->name('contract_direct_show');
Route::post('/contract_materials', 'ContractController@contract_materials')->name('contract_materials');
Route::post('/contract_materials_show', 'ContractController@contract_materials_show')->name('contract_materials_show');
Route::get('/contract_choose_materials', 'ContractController@contract_choose_materials');


Route::group(['middleware' => 'manager'], function() {
Route::get('/delivery', 'DeliveryController@index');
Route::post('/delivery_date', 'DeliveryController@index_date')->name('delivery_date');;
Route::get('/delivery_materials', 'DeliveryController@delivery_materials')->name('delivery_materials');
Route::post('/delivery_materials_show', 'DeliveryController@delivery_materials_show')->name('delivery_materials_show');
Route::get('/delivery_company', 'DeliveryController@delivery_company')->name('delivery_company');
Route::post('/delivery_company_show', 'DeliveryController@delivery_company_show')->name('delivery_company_show');
Route::get('/delivery_filia', 'DeliveryController@delivery_filia')->name('delivery_filia');
Route::post('/delivery_filia_show', 'DeliveryController@delivery_filia_show')->name('delivery_filia_show');
Route::get('/zayvka', 'ZayvkaController@index')->name('zayavka');
Route::get('/zayvka_date', 'ZayvkaController@index_date')->name('index_date');
Route::post('/zayvka_date', 'ZayvkaController@zayvka_date')->name('zayvka_date');
Route::get('/zayvka_company', 'ZayvkaController@zayvka_company')->name('zayvka_company');
Route::post('/zayvka_company_show', 'ZayvkaController@zayvka_company_show')->name('zayvka_company_show');
Route::get('/delivery/excel', 'DeliveryController@excel')->name('delivery.excel');
Route::get('users/export/', 'UserController@export');
});


Route::get('/myview', 'AuthController@myview');
Route::post('/mywiev', 'AuthController@myview_edit');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile','ProfileController@index');
    Route::post('/profile','ProfileController@store');
    Route::get('logout', 'AuthController@logout');
});


Route::group(['prefix' =>'admin', 'namespace' => 'Admin','middleware' => 'admin'], function(){

    Route::get('/', 'DashboardController@index');
    Route::resource('/company','CompanyController');
    Route::resource('/reference','ReferenceController');
    Route::resource('/contract','ContractsController');
    Route::resource('/contract_dop','ContractDopController');
    Route::resource('/delivery','DeliveryController');
    Route::resource('/filia','FiliasController');
    Route::resource('/abz_drp','Abz_drpController');
    Route::resource('/users','UsersController');
    Route::resource('/materials','MaterialsController');
    Route::resource('/mera','MeraController');
    Route::resource('/materials_children','Materials_childrenController');
    Route::resource('/reference','ReferenceController');
    Route::resource('/zayvka','ZayvkasController');

    Route::resource('/ajax','AjaxController');
    Route::resource('/real_time','Real_timeController');
});