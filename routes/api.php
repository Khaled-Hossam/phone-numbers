<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerPhoneController;
use Illuminate\Support\Facades\Route;



Route::get('/phone-numbers', CustomerPhoneController::class);

Route::get('/countries-list', [CountryController::class, 'countriesListForDropdown']);
