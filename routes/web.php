<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Livewire\Reports\RequestMonthlyReview;
use App\Http\Livewire\Reports\IncomeMonthlyReview;
use App\Http\Livewire\Reports\RequestsChart;
use App\Http\Livewire\Reports\IncomesChart;
use App\Http\Livewire\Reports\ActivityLogs;
use App\Http\Livewire\Settings\Company;

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

Route::post('/auth', [CustomLoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [CustomLoginController::class, 'logout'])->name('signout');

// Requests Ajax
Route::get('pending/requests/ajax/',[App\Http\Livewire\Requests\Pending::class, 'fetchAjaxRequest'])->name('pending.requests.fetch');
Route::get('approved/requests/ajax/',[App\Http\Livewire\Requests\Approved::class, 'fetchAjaxRequest'])->name('approved.requests.fetch');
Route::get('rejected/requests/ajax/',[App\Http\Livewire\Requests\Rejected::class, 'fetchAjaxRequest'])->name('rejected.requests.fetch');

Route::get('shopping-lists/ajax/',[App\Http\Livewire\ShoppingLists\Index::class, 'fetchAjaxRequest'])->name('shopping.lists.fetch');

// Vendors ajax
Route::get('vendors/ajax/',[App\Http\Livewire\Vendor\Index::class, 'fetchAjaxRequest'])->name('vendors.ajax.fetch');

// Clients ajax
Route::get('clients/ajax/',[App\Http\Livewire\Clients\Index::class, 'fetchAjaxRequest'])->name('clients.ajax.fetch');

// Parking areas ajax
Route::get('parking/areas/ajax/',[App\Http\Livewire\Parking\ParkingAreas::class, 'fetchAjaxRequest'])->name('parking.areas.ajax.fetch');

// Parking fees ajax
Route::get('parking/fees/ajax/',[App\Http\Livewire\Parking\ParkingFees::class, 'fetchAjaxRequest'])->name('parking.fees.ajax.fetch');


// Requests monthly ajax
Route::get('requests/monthly/ajax/',[RequestMonthlyReview::class, 'fetchAjaxRequest'])->name('requests.monthly.ajax.fetch');

// Income monthly ajax
Route::get('income/monthly/ajax/',[IncomeMonthlyReview::class, 'fetchAjaxRequest'])->name('income.monthly.ajax.fetch');

// Logs ajax
Route::get('logs/ajax/',[ActivityLogs::class, 'fetchAjaxRequest'])->name('logs.ajax.fetch');

Route::get('requests/approve/',[App\Http\Livewire\Requests\Pending::class, 'approveSelected'])->name('requests.pending.approve');



Route::group(["middleware" => "restricted"], function(){
    
    // Testing
    Route::get('user-datatables', function () {
        return view('welcome');
    });
    
    // Home
    Route::get('home',App\Http\Livewire\Home::class)->name('home');
    
    // Vendors
    Route::get('vendors-list',App\Http\Livewire\Vendor\Index::class)->name('vendors-list.index');
    Route::get('vendors/add',App\Http\Livewire\Vendor\Add::class)->name('vendors.add');
    Route::get('vendors/show/{id}',[App\Http\Livewire\Vendor\Index::class, 'show'])->name('vendor.show');

    
    Route::put('vendor/update',[App\Http\Livewire\Vendor\Index::class, 'update'])->name('vendor.update');
    Route::delete('vendor/delete',[App\Http\Livewire\Vendor\Index::class, 'destroy'])->name('vendor.destroy');
    Route::post('vendor/account/change',[App\Http\Livewire\Vendor\Index::class, 'changeVendorAccountStatus'])->name('vendor.account.change');
    

    // Shopping Lists

    Route::get('shopping/lists',App\Http\Livewire\ShoppingLists\Index::class)->name('shopping.lists.index');
    
    // Parking requests
    Route::get('requests/pending/',App\Http\Livewire\Requests\Pending::class)->name('requests.pending.index');
    Route::get('requests/approved/',App\Http\Livewire\Requests\Approved::class)->name('requests.approved.index');
    Route::get('requests/rejected/',App\Http\Livewire\Requests\Rejected::class)->name('requests.rejected.index');
    
    
    // User account
    Route::get('profile',App\Http\Livewire\Profile\Index::class)->name('profile.index');
    Route::get('profile/edit',App\Http\Livewire\Profile\Edit::class)->name('profile.edit');
    Route::get('password/change',App\Http\Livewire\Password\Edit::class)->name('password.edit');
    
    Route::get('account/manage-password',App\Http\Livewire\Profile\ManagePassword::class)->name('password.change');
    
    // Reports
    Route::get('reports',App\Http\Livewire\Reports\Index::class)->name('reports.index');
    Route::get('requests/monthly/review', RequestMonthlyReview::class)->name('requests.monthly.review');
    Route::get('income/monthly/review', IncomeMonthlyReview::class)->name('income.monthly.review');
    
    // Charts
    Route::get('charts/requests', RequestsChart::class)->name('requests.charts');
    Route::get('charts/incomes', IncomesChart::class)->name('incomes.charts');
    
    // Logs
    Route::get('logs', ActivityLogs::class)->name('logs.index');
    
    
    // Company
    Route::get('settings/company', Company::class)->name('company.add-edit');
    
    
    
});