<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Admin\DashboardController@index')->middleware('auth');
Route::get('/login', 'Admin\AuthController@index')->name('admin.auth.index');
Route::post('/login/process', 'Admin\AuthController@login')->name('admin.auth.login');
Route::post('/logout', 'Admin\AuthController@logout')->name('admin.auth.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});


// accounting
Route::group(['prefix' => 'accounting', 'as' => 'accounting.', 'namespace' => 'Accounting', 'middleware' => ['auth']], function () {
    // Route::get('/', 'DashboardController@index')->name('dashboard');
    // accounts
    Route::resource('accounts', 'AccountController');
    Route::get('/accountdata', 'AccountController@accountdata')->name('accounts.accountdata');
    // Journal
    Route::resource('journal', 'JournalController');
    Route::get('/journaldata', 'JournalController@journaldata')->name('journal.journaldata');
    Route::delete('/detail/delete/{id}', 'JournalController@deleteItemDetail')->name('journal.deleteItemDetail');
    Route::get('journal/report/{id}','JournalController@report')->name('journal.report');
    Route::get('/journalexpense/{date}', 'JournalController@expense')->name('journal.expense');
    // Buku Besar (Ledger)

    Route::resource('ledger', 'LedgerController');
    Route::get('/ledgerdata', 'LedgerController@ledgerdata')->name('ledger.ledgerdata');
    Route::get('ledger/report/{id}','LedgerController@report')->name('ledger.report');


    // neraca
    Route::resource('trialbalance', 'TrialBalanceController');
    Route::get('trialbalancedata', 'TrialBalanceController@trialbalancedata')->name('trialbalance.trialbalancedata');
    Route::get('trialbalance/report/{id}','TrialBalanceController@report')->name('trialbalance.report');

    Route::resource('incomestatement', 'IncomeStatementController');
    Route::get('incomestatementdata', 'IncomeStatementController@incomestatementdata')->name('incomestatement.incomestatementdata');
    Route::get('incomestatement/report/{id}','IncomeStatementController@report')->name('incomestatement.report');

});

// cashier

Route::group(['prefix' => 'cashier', 'as' => 'cashier.', 'namespace' => 'Cashier', 'middleware' => ['auth']], function () {
    // Route::resource('transaction', 'TransactionController');
    Route::get('transaction', 'TransactionController@index')->name('transaction.index');
    Route::get('transaction/create', 'TransactionController@create')->name('transaction.create');
    Route::get('transaction/create/{date}', 'TransactionController@create_date')->name('transaction.create_date');
    Route::get('transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::put('transaction/{id}', 'TransactionController@update')->name('transaction.update');
    Route::post('transaction/store', 'TransactionController@store')->name('transaction.store');
    Route::get('transaction/show/{date}', 'TransactionController@show')->name('transaction.show');
    Route::get('transaction/expense/{date}', 'TransactionController@expense')->name('transaction.expense');
    Route::post('transaction/expense', 'TransactionController@expense_store')->name('transaction.expense_store');
    Route::get('/transactiondata', 'TransactionController@transactiondata')->name('transaction.transactiondata');
    Route::delete('/transaction/{id}', 'TransactionController@destroy')->name('transaction.destroy');

    Route::get('transaction/report', 'TransactionController@report')->name('transaction.report');


    // material
    Route::resource('material', 'MaterialController');
    Route::get('/materialdata', 'MaterialController@materialdata')->name('material.materialdata');
});
