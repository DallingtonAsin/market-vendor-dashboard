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

// Users ajax
Route::get('users/ajax/',[App\Http\Livewire\Users\Index::class, 'fetchAjaxRequest'])->name('users.ajax.fetch');

// Clients ajax
Route::get('clients/ajax/',[App\Http\Livewire\Clients\Index::class, 'fetchAjaxRequest'])->name('clients.ajax.fetch');

// Parking areas ajax
Route::get('parking/areas/ajax/',[App\Http\Livewire\Parking\ParkingAreas::class, 'fetchAjaxRequest'])->name('parking.areas.ajax.fetch');

// Parking fees ajax
Route::get('parking/fees/ajax/',[App\Http\Livewire\Parking\ParkingFees::class, 'fetchAjaxRequest'])->name('parking.fees.ajax.fetch');

// Vehicle category ajax
Route::get('vehicle/categories/ajax/',[App\Http\Livewire\VehicleCategory\Index::class, 'fetchAjaxRequest'])->name('vehicle.categories.ajax.fetch');

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

// Users
    Route::get('users',App\Http\Livewire\Users\Index::class)->name('users.index');
    Route::get('users/add',App\Http\Livewire\Users\Add::class)->name('users.add');


// Clients
    Route::get('clients',App\Http\Livewire\Clients\Index::class)->name('clients.index');
    Route::get('clients/add',App\Http\Livewire\Clients\Add::class)->name('clients.add');



// Parking areas
    Route::get('parking/areas/',App\Http\Livewire\Parking\ParkingAreas::class)->name('parking.areas.index');

     Route::get('parking/area/create',App\Http\Livewire\Parking\AddParkingArea::class)->name('parking.area.create');

// Parking fees
    Route::get('parking/fees/',App\Http\Livewire\Parking\ParkingFees::class)->name('parking.fees.index');

    Route::get('parking/fees/create',App\Http\Livewire\Parking\AddParkingFee::class)->name('parking.fees.create');

// Parking requests
    Route::get('requests/pending/',App\Http\Livewire\Requests\Pending::class)->name('requests.pending.index');
    Route::get('requests/approved/',App\Http\Livewire\Requests\Approved::class)->name('requests.approved.index');
    Route::get('requests/rejected/',App\Http\Livewire\Requests\Rejected::class)->name('requests.rejected.index');

//  Vehicle categories
    Route::get('vehicle/category/add',App\Http\Livewire\VehicleCategory\Add::class)->name('vehicle.category.add');
    Route::get('vehicle/categories',App\Http\Livewire\VehicleCategory\Index::class)->name('vehicle.category.index');

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

// Roles
    Route::get('roles', App\Http\Livewire\Users\Roles\Index::class)->name('roles.index');
    Route::get('role/create/',App\Http\Livewire\Users\Roles\Add::class)->name('roles.add');

    // Company
    Route::get('settings/company', Company::class)->name('company.add-edit');



});