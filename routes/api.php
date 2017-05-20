<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');




Route::resource('countries', 'API\CountryAPIController');

Route::resource('companies', 'API\CompanyAPIController');

Route::resource('executives', 'API\executiveAPIController');

Route::resource('vendors', 'API\VendorsAPIController');

Route::resource('sales_agents', 'API\SalesAgentAPIController');

Route::resource('taxes', 'API\TaxAPIController');

Route::resource('range_value_rates', 'API\RangeValueRateAPIController');

Route::resource('property_types', 'API\PropertyTypeAPIController');

Route::resource('tir_rates', 'API\TirRateAPIController');

Route::resource('initial_expenses', 'API\InitialExpenseAPIController');

Route::resource('property_equipments', 'API\PropertyEquipmentAPIController');

Route::resource('insurance_rates', 'API\InsuranceRateAPIController');

Route::resource('rate_purchases', 'API\RatePurchaseAPIController');

Route::resource('quotations', 'API\QuotationAPIController');

Route::resource('price_quotes', 'API\PriceQuoteAPIController');





/**
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client Secret: M9TkqTFkbYFHuR5bywpR1LH3uQvTZRXWpYxEX29U
Password grant client created successfully.
Client ID: 2
Client Secret: vaF2RFwGRgOGmxc2eRTGyCCklHP3SP6fWvK3PgMu

 */
