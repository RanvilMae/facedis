<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeneficiariesController;
use App\Http\Controllers\DafacController;
use App\Http\Controllers\BeneficiaryRosterController;
use App\Http\Controllers\BeneFamMembersController;
use App\Http\Controllers\AssistanceProviderController;
use App\Http\Controllers\AuditLogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UnitListController;
use App\Http\Controllers\RDSController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::resource('beneficiary_rosters', BeneficiaryRosterController::class);

Route::post('region', [BeneficiaryRosterController::class, 'region']);
Route::get('generatePDF', [BeneficiaryRosterController::class, 'generatePDF']);
Route::get('generateDAFACcard', [BeneficiaryRosterController::class, 'generateDAFACcard']);
Route::post('fetch-province', [BeneficiaryRosterController::class, 'fetchProvince']);
Route::post('fetch-citymun', [BeneficiaryRosterController::class, 'fetchCitymun']);
Route::post('fetch-barangay', [BeneficiaryRosterController::class, 'fetchBarangay']);
Route::post('save', [BeneficiaryRosterController::class, 'save']);
Route::get('export', [BeneficiaryRosterController::class, 'export']);
Route::post('revoke', [UsersController::class, 'revoke']);
Route::post('daily', [BeneficiaryRosterController::class, 'daily']);
Route::post('monthly', [BeneficiaryRosterController::class, 'monthly']);
Route::post('quarterly', [BeneficiaryRosterController::class, 'quarterly']);
Route::post('semestral', [BeneficiaryRosterController::class, 'semestral']);
Route::post('annual', [BeneficiaryRosterController::class, 'annual']);


Route::resource('companies', CompanyController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('beneficiaries', BeneficiariesController::class);
Route::resource('dafac', DafacController::class);
Route::resource('beneficiary_roster', BeneficiaryRosterController::class);
Route::resource('beneficiaryfammember', BeneFamMembersController::class);
Route::resource('assistance_provided', AssistanceProviderController::class);
Route::resource('logs', AuditLogsController::class);
Route::resource('users', UsersController::class);
Route::resource('units', UnitListController::class);
Route::resource('rds', RDSController::class);



Route::get('rosters', [RosterController::class, 'index']);
Route::get('beneficiary_roster/{id}', [RosterController::class, 'show'])->name('beneficiary_roster.show');

