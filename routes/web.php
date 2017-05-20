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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Rutas restringidas

Route::group(['middleware' => 'role:admin | role:super'], function(){

    Route::resource('countries', 'CountryController');
    Route::resource('companies', 'CompanyController');
    Route::resource('executives', 'ExecutiveController');
    Route::resource('vendors', 'VendorsController');
    Route::resource('salesAgents', 'SalesAgentController');
    Route::resource('taxes', 'TaxController');
    Route::resource('rangeValueRates', 'RangeValueRateController');
    Route::resource('propertyTypes', 'PropertyTypeController');
    Route::resource('tirRates', 'TirRateController');
    Route::resource('initialExpenses', 'InitialExpenseController');
    Route::resource('propertyEquipments', 'PropertyEquipmentController');
    Route::resource('insuranceRates', 'InsuranceRateController');
    Route::resource('ratePurchases', 'RatePurchaseController');
    Route::resource('quotations', 'QuotationController');
    Route::resource('priceQuotes', 'PriceQuoteController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::get('paises', 
        [
            'uses'      => 'HomeController@welcome',
            'as'        => 'selectCountries',

        ]);
    Route::any('home',[
            'uses'      => 'HomeController@index',
            'as'        => 'homeIndex'
        ]);

    Route::get('config_main',
        [
            'uses'  => 'HomeController@mainConfigMenu',
            'as'    => 'configMenu' 
        ]);

    Route::resource('marks', 'MarkController');
    Route::resource('lines', 'LineController');
    Route::resource('modelos', 'ModeloController');




});
// -----------------------------------------------------------

// Commun Access Roles
Route::group(['middleware', ['role:admin', 'role:editor']], function(){
    Route::get('home', 'HomeController@index');
});












