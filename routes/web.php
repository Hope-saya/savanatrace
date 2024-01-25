<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MqttController;

Route::get('/update-ip-address', [MqttController::class, 'updateIpAddress']);


Route::get('/', function () {
    return view('welcome');
});
