<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ImportPatientController;

Route::apiResource('patient', 'App\Http\Controllers\PatientController');
Route::get('patient/search/{search}', [PatientController::class,'search']);
Route::post('importcsv', [ImportPatientController::class,'uploadCsvFiles']);
Route::apiResource('address', 'App\Http\Controllers\AddressController');
Route::apiResource('cep', 'App\Http\Controllers\CepController');