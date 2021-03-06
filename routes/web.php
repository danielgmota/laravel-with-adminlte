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

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    $this->get('/', 'AdminController@index')->name('admin.home');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');

    $this->post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');

    $this->get('balance/withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
    $this->post('balance/withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    
    $this->get('balance/transfer', 'BalanceController@transfer')->name('balance.transfer');
    $this->post('balance/transfer', 'BalanceController@transferStore')->name('transfer.store');
    $this->post('balance/transfer/confirm', 'BalanceController@transferConfirm')->name('transfer.confirm');
});

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();