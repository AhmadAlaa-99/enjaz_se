<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TenantsController as AdminTenantController;
use App\Http\Controllers\Admin\MainTenancesController as AdminMainTenancesController;
use App\Http\Controllers\Admin\ReportsController as ReportsController;
use App\Http\Controllers\Admin\SettingsController as SettingsController;
use App\Http\Controllers\Admin\LeasesController as AdminLeasesController;
use App\Http\Controllers\Admin\UnitsController as AdminUnitsController;
use App\Http\Controllers\Admin\RealtiesController as AdminRealtiesController;
use App\Http\Controllers\Tenant\MainTenancesController as TenantMainTenancesController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\receive_reports;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;



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

    Route::any('user/notifications/get',[NotificationsController::class,'getNotifications']);
    Route::any('user/notifications/read',[NotificationsController::class,'markAsRead']);
    Route::any('user/notifications/read/{id}',[NotificationsController::class,'markAsReadAndRedirect']);

Route::get('/', [HomeController::class,'enjaz'])->name('enjaz');
Route::get('/autocomplete', [HomeController::class,'autocomplete'])->name('autocomplete');
Route::get('/storage', function () {
    Artisan::call('storage:link');
});
Route::get('/clear', function() {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('storage:link');
//    $exitCode = Artisan::call('migrate:fresh --seed');
    return 'All routes cache has just been removed';
});
Route::get('/fresh', function() {

   $exitCode = Artisan::call('migrate:fresh --seed');
    return 'All routes cache has just been fresh';
});
Route::get('/scheduler', function() {
	$exitCode = Artisan::call('schedule:run');
//    $exitCode = Artisan::call('migrate:fresh --seed');
    return 'All routes cache has just been removed';
});
Route::get('/owner_autocomplete',[AdminLeasesController::class,'fetchownerdata']);
Route::get('/realty_autocomplete',[AdminLeasesController::class,'fetchrealtyrdata']);
Route::get('/unit_autocomplete',[AdminLeasesController::class,'fetchunitdata']);
Route::get('/getunits',[AdminUnitsController::class,'getunits']);
Route::get('/statistics',[SettingsController::class,'statistics'])->name('statistics');
Route::get('/categories/{key}', [HomeController::class,'categories'])->name('categories');
Route::get('/property_search', [HomeController::class,'property_search'])->name('property_search');
Route::get('/all_units', [HomeController::class,'all_units'])->name('all_units');

Route::get('/test', function () {
    return view('test');
});
 Auth::routes(['register' => false]);
   Route::get('/downFile/{id}',[AdminLeasesController::class, 'downFile'])->name('down.file');



//Admin

Route::group([
    'prefix'=>'Admin',
    //'middleware'=>'auth',
  ],function()

  {
          Route::get('/site_setting', [SettingsController::class,'site_setting'])->name('site_setting');




            Route::get('/add_commercial',[ContractController::class,'add_commercial'])->name('add_commercial');
            Route::post('/store_commercial',[ContractController::class,'store_commercial'])->name('store_commercial');




     Route::resource('/owners',\Admin\OwnersController::class);
     Route::get('/owner_destroy/{id}',[AdminOwnersController::class,'destroy'])->name('owner.destroy');

    Route::get('/leases_renew/{id}',[AdminLeasesController::class,'leases_renew'])->name('leases.renew.show');
    Route::post('/leases_renew_store',[AdminLeasesController::class,'leases_renew_store'])->name('leases.renew.store');
    Route::get('/previous_leases/{id}',[AdminLeasesController::class,'previous_leases'])->name('previous.leases');



        Route::get('/realty_financial/{id}',[AdminRealtiesController::class,'realty_financial'])->name('realty_financial');
        Route::get('/realty_leasing/{id}',[AdminRealtiesController::class,'realty_leasing'])->name('realty_leasing');
                Route::post('/realty_leasing_search',[AdminRealtiesController::class,'realty_leasing_search'])->name('realty_leasing_search');
             Route::post('/realty_financial_search',[AdminRealtiesController::class,'realty_financial_search'])->name('realty_financial_search');


        Route::get('/Unit_leasing/{id}',[AdminUnitsController::class,'Unit_leasing'])->name('Unit_leasing');



     Route::get('/tenants',[AdminTenantController::class,'index']);
     Route::get('/accept_requests',[AdminMainTenancesController::class,'accept_requests'])->name('accept_requests');
     Route::get('/wait_request',[AdminMainTenancesController::class,'wait_request'])->name('wait_request');
          Route::post('/request_accept/{id}',[AdminMainTenancesController::class,'accept'])->name('request_accept');

     Route::post('/maint_response/{id}',[AdminMainTenancesController::class,'maint_response'])->name('maint_response');
     Route::resource('/realties',\Admin\RealtiesController::class);

    Route::get('/realty_destroy/{id}',[AdminRealtiesController::class,'destroy'])->name('realty.destroy');
   Route::get('/printl', function () {
    return view('lease_print');
});

     Route::get('/site_units',[AdminUnitsController::class,'site_units'])->name('site_units');

     Route::post('/units_add',[AdminUnitsController::class,'units_add'])->name('units_add');
     Route::get('/empty_units',[AdminUnitsController::class,'empty_units'])->name('empty_units');
     Route::get('/unit_destroy/{id}',[AdminUnitsController::class,'destroy'])->name('unit.destroy');
     Route::get('/rented_units',[AdminUnitsController::class,'rented_units'])->name('rented_units');
     Route::resource('/units',\Admin\UnitsController::class);


    // Route::resource('/leases',\Admin\LeasesController::class);

     Route::get('/unit_rent/{id}',[AdminLeasesController::class,'create'])->name('unit.rent');
    Route::post('/lease_store',[AdminLeasesController::class,'store'])->name('leases.store');
    Route::post('/payment_add/{id}',[ContractController::class,'payment_add'])->name('payment_contract.add');


          Route::get('contract_residential',[ContractController::class,'contract_residential'])->name('contract_residential');
          Route::get('contract_commercial',[ContractController::class,'contract_commercial'])->name('contract_commercial');

              Route::get('/renew_contract/{id}',[ContractController::class,'renew_contract'])->name('renew.contract');
               Route::post('/renew_contracted',[ContractController::class,'renew_contracted'])->name('renew.contracted');
                Route::get('/finish_contract/{id}',[ContractController::class,'finish_contract'])->name('finish.contract');





        Route::post('contract_store',[ContractController::class,'contract_store'])->name('rent_contract_store');
        Route::get('contract_edit/{id}',[ContractController::class,'contract_edit'])->name('contract_edit');
        Route::post('contract_update',[ContractController::class,'contract_update'])->name('contract_update');

        Route::get('contract_payments',[ContractController::class,'contract_payments'])->name('contract_payments');




           Route::get('contract_effictive',[ContractController::class,'contract_effictive'])->name('contract_effictive');
           Route::get('contract_finished',[ContractController::class,'contract_finished'])->name('contract_finished');


         Route::get('contract_details/{id}',[ContractController::class,'details'])->name('contract_details');
          Route::get('/down_contract_file/{id}',[ContractController::class, 'down_contract_file'])->name('down.contract_file');



     Route::get('/effictive',[AdminLeasesController::class,'effictive'])->name('effictive');
     Route::get('/finished',[AdminLeasesController::class,'finished'])->name('finished');;
     Route::get('/lease_details/{id}',[AdminLeasesController::class,'details'])->name('lease.details');
     Route::get('/lease_un.details/{id}',[AdminLeasesController::class,'lease_un_details'])->name('lease_un.details');

     Route::post('/payment_lease_add/{id}',[AdminLeasesController::class,'payment_add'])->name('payment_lease_add');

     Route::get('/lease_edit/{id}',[AdminLeasesController::class,'lease_edit'])->name('lease_edit');
     Route::post('/lease_update',[AdminLeasesController::class,'lease_update'])->name('lease_update');


     Route::post('/payments_edit/{id}',[AdminLeasesController::class,'payments_edit'])->name('payment.edit');
     Route::get('/payment_details/{id}',[AdminLeasesController::class,'payment_details'])->name('payment.details');

     Route::get('/payments_details/{id}',[ReportsController::class,'payments_details'])->name('payments.details');
     Route::get('/tenant_details/{tenant_id}', [ReportsController::class,'tenant_details'])->name('tenant_details');




     Route::resource('/receives_reports',\Admin\receive_reports::class);

    Route::get('/receive_details/{id}',[receive_reports::class,'details'])->name('receive.details');
    Route::get('/receive_destroy/{id}',[receive_reports::class,'destroy'])->name('receive.destroy');
    Route::get('/receive_add/{id}',[receive_reports::class,'create'])->name('receive.add');
     Route::get('/maintenance_payments',[ReportsController::class,'maintenance_payments']);
     Route::get('/proceeds',[ReportsController::class,'proceeds'])->name('proceeds');
     Route::post('/proceeds_date',[ReportsController::class,'proceeds_date'])->name('proceeds_date');
     Route::get('/receivables',[ReportsController::class,'receivables'])->name('receivables');
    Route::get('/realties_proceeds',[ReportsController::class,'realties_proceeds'])->name('realties_proceeds');
     Route::post('/receivables_date',[ReportsController::class,'receivables_date'])->name('receivables_date');

         Route::get('/realty_leases/{id}',[ReportsController::class,'realty_leases'])->name('realty_leases');


     Route::get('/site_data',[SettingsController::class,'site_data'])->name('site_data');


     Route::post('/add_quarters',[SettingsController::class,'add_quarters'])->name('add_quarters');
     Route::post('/edit_quarter/{id}',[SettingsController::class,'edit_quarter'])->name('edit_quarter');
          Route::post('/add_types',[SettingsController::class,'add_types'])->name('add_types');
     Route::post('/edit_type/{id}',[SettingsController::class,'edit_type'])->name('edit_type');
          Route::post('/edit_national/{id}',[SettingsController::class,'edit_national'])->name('edit_national');

               Route::post('/add_nationalist',[SettingsController::class,'add_nationalist'])->name('add_nationalist');





     Route::get('/Account_settings',[SettingsController::class,'Account_settings'])->name('account_settings');
     Route::post('/Account_edit',[SettingsController::class,'Account_edit'])->name('Account_edit');

        Route::get('/company_settings',[SettingsController::class,'company_settings'])->name('company_settings');
       Route::post('/company_settings',[SettingsController::class,'company_settings_store'])->name('company_settings_edit');

       Route::get('/privacy_settings',[SettingsController::class,'privacy_settings'])->name('privacy_settings');
     Route::post('/privacy_settings',[SettingsController::class,'privacy_settings_store'])->name('privacy_settings_edit');

     Route::get('/notifications_settings',[SettingsController::class,'notifications_settings'])->name('notifications_settings');








     Route::resource('/roles',\UserManagement\RoleController::class);
     Route::resource('/users',\UserManagement\UserController::class);

     Route::get('/archive_leases',[AdminLeasesController::class,'archive'])->name('archive_leases');
     Route::get('/move_le_archive/{id}',[AdminLeasesController::class,'move_le_archive'])->name('move_le.archive');
     Route::get('/archive_tenants',[AdminTenantController::class,'archive'])->name('archive_tenants');
     Route::get('/archive_owners',[AdminOwnersController::class,'archive'])->name('archive_owners');


     Route::get('/realty_units_add/{id}',[AdminUnitsController::class,'realty_units_add'])->name('realty_units_add');
     Route::post('/realty_units_store/{id}',[AdminUnitsController::class,'realty_units_store'])->name('realty_units_store');
     Route::get('/realty_units_show/{id}',[AdminUnitsController::class,'realty_units_show'])->name('realty_units_show');
    Route::get('/settings',[SettingsController::class,'settings']);




   /*

     Route::get('/tn_payments',[AdminTenantController::class,'payments']);
     Route::get('/profile',[profileController::class,'Admin'])->name('Admin_profile');
     Route::get('/contract_payments',[ReportsController::class,'contract_payments']);
     Route::get('/rental_traffic',[ReportsController::class,'rental_traffic']);
     Route::get('/invoice_details',[ReportsController::class,'details']);
     Route::get('/maintenance_details',[ReportsController::class,'maintenance_details']);
     */

  });
     Route::get('/User/settings',[TenantController::class,'settings'])->name('user_settings');
     Route::get('/User/privacy',[TenantController::class,'privacy'])->name('user_privacy');
     Route::get('/User/change_password',[TenantController::class,'change_password'])->name('user_change_password');

  Route::group([
    'prefix'=>'Tenant',
  // 'middleware'=>'auth|privateAdmin',
  ],function()
  {
     Route::get('/leases',[TenantController::class,'leases'])->name('leases_tenant');
     Route::get('/request_form',[TenantController::class,'request_form']);
     Route::post('/request_send',[TenantController::class,'request_send'])->name('request_send');
     Route::get('/maints_requests',[TenantController::class,'maints_requests'])->name('maints_requests');
     Route::get('/tn_lease.details/{id}',[TenantController::class,'tn_lease_details'])->name('tn_lease.details');

  });

  Route::group([
    'prefix'=>'Owner',
   //'middleware'=>'auth|privateAdmin',
  ],function()
  {
    Route::get('/actived_tenants',[OwnerController::class,'actived_tenants']);
    Route::get('/archive_tenants',[OwnerController::class,'archive_tenants']);


    Route::get('/realties',[OwnerController::class,'all_realties']);
    Route::get('/empty_units',[OwnerController::class,'empty_units']);
    Route::get('/rented_units',[OwnerController::class,'rented_units']);
    Route::get('/show_units/{id}',[OwnerController::class,'show_units'])->name('show_units_ow');
    Route::get('/expired_leases',[OwnerController::class,'expired_leases']);
    Route::get('/actived_leases',[OwnerController::class,'actived_leases']);
    Route::get('/details_lease/{id}',[OwnerController::class,'details_lease'])->name('ow_lease.details');

  });
