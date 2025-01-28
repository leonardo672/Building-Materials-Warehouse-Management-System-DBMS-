<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users_Controller ;
use App\Http\Controllers\Locations_Controller ;
use App\Http\Controllers\Materials_Controller ;
use App\Http\Controllers\Orders_Controller ;
use App\Http\Controllers\Suppliers_Controller ;
use App\Http\Controllers\Transactions_Controller ;
use App\Http\Controllers\Categories_Controller ;


Route::get('/', function () {
    return view('layout');
});

Route::resource('/users', Users_Controller::class);

Route::resource('/locations', Locations_Controller::class);

Route::resource('/materials', Materials_Controller::class);

Route::resource('/orders', Orders_Controller::class);

Route::resource('/suppliers', Suppliers_Controller::class);

Route::resource('/transactions', Transactions_Controller::class);

Route::resource('/categories', Categories_Controller::class);