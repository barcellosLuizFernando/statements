<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AccountingPoliciesController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ReportsController;

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
    return view('main');
});

Route::get('/reg/categories', [CategoriesController::class, 'index'])->middleware('auth');

Route::get('/reg/category', [CategoriesController::class, 'create'])->middleware('auth');

Route::get('/reg/category/{id}', [CategoriesController::class, 'show'])->middleware('auth');
Route::delete('/reg/category/{id}', [CategoriesController::class, 'destroy'])->middleware('auth');
Route::put('/reg/category/{id}', [CategoriesController::class, 'update'])->middleware('auth');

Route::post('reg/category', [CategoriesController::class, 'store'])->middleware('auth');

Route::get('/reg/company', [CompanyController::class, 'create'])->middleware('auth');
Route::get('/reg/company/run', [CompanyController::class, 'run'])->middleware('auth');
Route::get('/reg/companies', [CompanyController::class, 'index'])->middleware('auth');
Route::get('/reg/company/{id}', [CompanyController::class, 'show'])->middleware('auth');
Route::put('/reg/company/{id}', [CompanyController::class, 'update'])->middleware('auth');
Route::delete('/reg/company/{id}', [CompanyController::class, 'destroy'])->middleware('auth');


Route::post('reg/company', [CompanyController::class, 'store'])->middleware('auth');

Route::get('/reg', function () {
    return view('reg.reg');
});

Route::get('/tools', function () {
    return view('tools.tools');
});

Route::get('/tools/accountingpolicies', [AccountingPoliciesController::class, 'index'])->middleware('auth');
Route::get('/tools/accountingpolicy', [AccountingPoliciesController::class, 'create'])->middleware('auth');
Route::get('/tools/accountingpolicy/{id}', [AccountingPoliciesController::class, 'show'])->middleware('auth');
Route::put('/tools/accountingpolicy/{id}', [AccountingPoliciesController::class, 'update'])->middleware('auth');
Route::get('/tools/accountingpolicydetail/{id}', [AccountingPoliciesController::class, 'indexdetail'])->middleware('auth');
Route::get('/tools/accountingpolicydetail/{id}/create', [AccountingPoliciesController::class, 'createdetail'])->middleware('auth');
Route::get('/tools/accountingpolicydetail/{id}/{idDetail}', [AccountingPoliciesController::class, 'showdetail'])->middleware('auth');
Route::post('/tools/accountingpolicydetail/{id}', [AccountingPoliciesController::class, 'storedetail'])->middleware('auth');
Route::post('/tools/accountingpolicy', [AccountingPoliciesController::class, 'store'])->middleware('auth');
Route::delete('/tools/accountingpolicy/{id}', [AccountingPoliciesController::class, 'destroy'])->middleware('auth');
Route::delete('/tools/accountingpolicydetail/{id}/{idDetail}', [AccountingPoliciesController::class, 'destroydetail'])->middleware('auth');
Route::put('/tools/accountingpolicydetail/{id}/{idDetail}', [AccountingPoliciesController::class, 'updatedetail'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('main');
})->name('dashboard');

Route::get('/reports', [ReportsController::class, 'index']);
Route::get('/reports/accountingpolicies', [ReportsController::class, 'showaccountingpolicies']);
Route::get('/reports/accountingpolicies/{id}', [ReportsController::class, 'showaccountingpolicy']);

Route::get('/reports/logbooks', [LogbookController::class, 'indexreport']);
Route::get('/reports/logbooks/{id}', [LogbookController::class, 'showreport']);

Route::get('/tools/logbooks', [LogbookController::class, 'index']);
Route::post('/tools/logbooks/images', [LogbookController::class, 'storeimages']);
Route::get('/tools/logbooks/logbook/{id}', [LogbookController::class, 'show']);
Route::put('/tools/logbooks/logbook/{id}', [LogbookController::class, 'update']);
Route::delete('/tools/logbooks/logbook/{id}', [LogbookController::class, 'destroy']);
Route::get('/tools/logbooks/logbook', [LogbookController::class, 'create']);
Route::post('/tools/logbooks/logbook', [LogbookController::class, 'store']);
