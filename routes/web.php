<?php

// routes/web.php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileRoleController;
use App\Http\Controllers\dashboard\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaxCategoryController;
use App\Http\Controllers\TaxRateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TypeVehiculeController;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\ParcelStatusController;
use App\Http\Controllers\ProductMaterialController;
use App\Http\Controllers\DeliveryTypeController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ZonePriceController;

Route::get('/zone-prices', [ZonePriceController::class, 'index'])->name('zone-prices.index');
Route::get('/zone-prices/create', [ZonePriceController::class, 'create'])->name('zone-prices.create');
Route::post('/zone-prices', [ZonePriceController::class, 'store'])->name('zone-prices.store');
Route::get('/zone-prices/{zonePrice}', [ZonePriceController::class, 'show'])->name('zone-prices.show');
Route::get('/zone-prices/{zonePrice}/edit', [ZonePriceController::class, 'edit'])->name('zone-prices.edit');
Route::put('/zone-prices/{zonePrice}', [ZonePriceController::class, 'update'])->name('zone-prices.update');
Route::delete('/zone-prices/{zonePrice}', [ZonePriceController::class, 'destroy'])->name('zone-prices.destroy');


Route::get('/zones', [ZoneController::class, 'index'])->name('zones.index');
Route::get('/zones/create', [ZoneController::class, 'create'])->name('zones.create');
Route::post('/zones', [ZoneController::class, 'store'])->name('zones.store');
Route::get('/zones/{zone}', [ZoneController::class, 'show'])->name('zones.show');
Route::get('/zones/{zone}/edit', [ZoneController::class, 'edit'])->name('zones.edit');
Route::put('/zones/{zone}', [ZoneController::class, 'update'])->name('zones.update');
Route::delete('/zones/{zone}', [ZoneController::class, 'destroy'])->name('zones.destroy');

Route::get('/deliveries', [DeliveriesController::class, 'index'])->name('deliveries.index');
Route::get('/deliveries/create', [DeliveriesController::class, 'create'])->name('deliveries.create');
Route::post('/deliveries', [DeliveriesController::class, 'store'])->name('deliveries.store');
Route::get('/deliveries/{delivery}', [DeliveriesController::class, 'show'])->name('deliveries.show');
Route::get('/deliveries/{delivery}/edit', [DeliveriesController::class, 'edit'])->name('deliveries.edit');
Route::put('/deliveries/{delivery}', [DeliveriesController::class, 'update'])->name('deliveries.update');
Route::delete('/deliveries/{delivery}', [DeliveriesController::class, 'destroy'])->name('deliveries.destroy');

Route::get('deliveries/create', [DeliveriesController::class, 'create'])->name('deliveries.create');
Route::post('deliveries', [DeliveriesController::class, 'store'])->name('deliveries.store');



Route::get('/delivery_types', [DeliveryTypeController::class, 'index'])->name('delivery_type.index');
Route::get('/delivery_types/create', [DeliveryTypeController::class, 'create'])->name('delivery_type.create');
Route::post('/delivery_types', [DeliveryTypeController::class, 'store'])->name('delivery_type.store');
Route::get('/delivery_types/{deliveryType}', [DeliveryTypeController::class, 'show'])->name('delivery_type.show');
Route::get('/delivery_types/{deliveryType}/edit', [DeliveryTypeController::class, 'edit'])->name('delivery_type.edit');
Route::put('/delivery_types/{deliveryType}', [DeliveryTypeController::class, 'update'])->name('delivery_type.update');
Route::delete('/delivery_types/{deliveryType}', [DeliveryTypeController::class, 'destroy'])->name('delivery_type.destroy');







Route::prefix('delivery')->group(function () {
    Route::get('/parcel_statuses', [ParcelStatusController::class, 'index'])->name('parcel_status.index');
    Route::get('/parcel_statuses/create', [ParcelStatusController::class, 'create'])->name('parcel_status.create');
    Route::post('/parcel_statuses', [ParcelStatusController::class, 'store'])->name('parcel_status.store');
    Route::get('/parcel_statuses/{parcelStatus}', [ParcelStatusController::class, 'show'])->name('parcel_status.show');
    Route::get('/parcel_statuses/{parcelStatus}/edit', [ParcelStatusController::class, 'edit'])->name('parcel_status.edit');
    Route::put('/parcel_statuses/{parcelStatus}', [ParcelStatusController::class, 'update'])->name('parcel_status.update');
    Route::delete('/parcel_statuses/{parcelStatus}', [ParcelStatusController::class, 'destroy'])->name('parcel_status.destroy');
    Route::get('/product_materials', [ProductMaterialController::class, 'index'])->name('product_material.index');
    Route::get('/product_materials/create', [ProductMaterialController::class, 'create'])->name('product_material.create');
    Route::post('/product_materials', [ProductMaterialController::class, 'store'])->name('product_material.store');
    Route::get('/product_materials/{productMaterial}', [ProductMaterialController::class, 'show'])->name('product_material.show');
    Route::get('/product_materials/{productMaterial}/edit', [ProductMaterialController::class, 'edit'])->name('product_material.edit');
    Route::put('/product_materials/{productMaterial}', [ProductMaterialController::class, 'update'])->name('product_material.update');
    Route::delete('/product_materials/{productMaterial}', [ProductMaterialController::class, 'destroy'])->name('product_material.destroy');
});

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{customer}/view', [CustomerController::class, 'view'])->name('customers.view');
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\CurrencyController;
 
use App\Http\Controllers\SearchController;




    // Routes pour l'authentification et l'inscription
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);


    // Routes accessibles uniquement après authentification
  Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Dashboard SuperAdmin
    Route::get('/dashboard/analytics', [AdminDashboardController::class, 'index'])->name('dashboard-analytics');


    // les rôles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{id}', [RoleController::class,'update'])->name('roles.update');
    Route::get('/roles/{role}/show', [RoleController::class, 'show'])->name('roles.show');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // les profile rôles
    Route::get('/profileroles', [ProfileRoleController::class, 'index'])->name('profileroles.index');
    Route::get('/profileroles/create', [ProfileRoleController::class, 'create'])->name('profileroles.create');
    Route::post('/profileroles', [ProfileRoleController::class, 'store'])->name('profileroles.store');
    Route::get('/profileroles/{id}/edit', [ProfileRoleController::class, 'edit'])->name('profileroles.edit');
    Route::put('/profileroles/{id}', [ProfileRoleController::class, 'update'])->name('profileroles.update');
    Route::get('/profileroles/{id}/show', [ProfileRoleController::class, 'show'])->name('profileroles.show');
    Route::delete('/profileroles/{id}', [ProfileRoleController::class, 'destroy'])->name('profileroles.destroy');
    //livreur
    Route::get('/livreurs', [LivreurController::class, 'index'])->name('livreurs.index');
    Route::get('/livreurs/create', [LivreurController::class, 'create'])->name('livreurs.create');
    Route::post('/livreurs', [LivreurController::class, 'store'])->name('livreurs.store');
    Route::get('/livreurs/{livreur}', [LivreurController::class, 'show'])->name('livreurs.show');
    Route::get('/livreurs/{livreur}/edit', [LivreurController::class, 'edit'])->name('livreurs.edit');
    Route::put('/livreurs/{livreur}', [LivreurController::class, 'update'])->name('livreurs.update');
    Route::delete('/livreurs/{livreur}', [LivreurController::class, 'destroy'])->name('livreurs.destroy');
    //livreursearch
    Route::get('/livreurs/search', [SearchController::class, 'index'])->name('livreurs.search');

    Route::get('/livreurs/update-list', [LivreurController::class, 'updateList'])->name('livreurs.updateList');
Route::get('/livreurs/details/{id}', [LivreurController::class, 'details'])->name('livreurs.details');
 

    
  


   
    // Example of routes in web.php
Route::get('/currencies', [CurrencyController::class, 'index'])->name('currencies.index');
Route::get('/currencies/create', [CurrencyController::class, 'create'])->name('currencies.create');


Route::post('/currencies', [CurrencyController::class, 'store'])->name('currencies.store');
Route::get('/currencies/{currency}/edit', [CurrencyController::class, 'edit'])->name('currencies.edit');
Route::put('/currencies/{currency}', [CurrencyController::class, 'update'])->name('currencies.update');
Route::get('/currencies/{currency}', [CurrencyController::class, 'show'])->name('currencies.show');
Route::delete('/currencies/{currency}', [CurrencyController::class, 'destroy'])->name('currencies.destroy');
Route::put('/currencies/{id}/update-default', [CurrencyController::class, 'updateDefault'])->name('currencies.update.default');

// Routes for Tax Categories
Route::get('/taxcategories', [TaxCategoryController::class, 'index'])->name('taxcategories.index');
Route::get('/taxcategories/create', [TaxCategoryController::class, 'create'])->name('taxcategories.create');
Route::post('/taxcategories', [TaxCategoryController::class, 'store'])->name('taxcategories.store');
Route::get('/taxcategories/{taxCategory}/edit', [TaxCategoryController::class, 'edit'])->name('taxcategories.edit');
Route::put('/taxcategories/{taxCategory}', [TaxCategoryController::class, 'update'])->name('taxcategories.update');
Route::get('/taxcategories/{taxCategory}', [TaxCategoryController::class, 'show'])->name('taxcategories.show');
Route::delete('/taxcategories/{taxCategory}', [TaxCategoryController::class, 'destroy'])->name('taxcategories.destroy');
 

 

Route::get('/taxrates', [TaxRateController::class, 'index'])->name('taxrates.index');
Route::get('/taxrates/create', [TaxRateController::class, 'create'])->name('taxrates.create');

Route::post('/taxrates', [TaxRateController::class, 'store'])->name('taxrates.store');
Route::get('/taxrates/{taxRate}', [TaxRateController::class, 'show'])->name('taxrates.show');
Route::get('/taxrates/{taxRate}/edit', [TaxRateController::class, 'edit'])->name('taxrates.edit');
Route::put('/taxrates/{taxRate}', [TaxRateController::class, 'update'])->name('taxrates.update');
Route::delete('/taxrates/{taxRate}', [TaxRateController::class, 'destroy'])->name('taxrates.destroy');

Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
Route::get('/languages/{language}', [LanguageController::class, 'show'])->name('languages.show');
Route::get('/languages/{language}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
Route::put('/languages/{language}', [LanguageController::class, 'update'])->name('languages.update');
Route::delete('/languages/{language}', [LanguageController::class, 'destroy'])->name('languages.destroy');

// langueswitch
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
 
Route::get('lang/{lang}', 'App\Http\Controllers\LanguageController@switchLang')->name('lang.switch');
 

Route::get('lang/switch/{locale}', 'App\Http\Controllers\LanguageController@switchLang')->name('lang.switch');

// web.php



Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::resource('languages', LanguageController::class);

//search
Route::get('/search', [SearchController::class, 'index'])->name('search');
 

 

// Routes for TypeVehicules
Route::get('/typevehicules', [TypeVehiculeController::class, 'index'])->name('typevehicules.index');
Route::get('/typevehicules/create', [TypeVehiculeController::class, 'create'])->name('typevehicules.create');
Route::post('/typevehicules', [TypeVehiculeController::class, 'store'])->name('typevehicules.store');
Route::get('/typevehicules/{typeVehicule}/edit', [TypeVehiculeController::class, 'edit'])->name('typevehicules.edit');
Route::put('/typevehicules/{typeVehicule}', [TypeVehiculeController::class, 'update'])->name('typevehicules.update');
Route::delete('/typevehicules/{typeVehicule}', [TypeVehiculeController::class, 'destroy'])->name('typevehicules.destroy');





 




  });

