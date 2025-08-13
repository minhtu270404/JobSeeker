<?php

use App\Http\Controllers\Admin\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::controller(UserController::class)->group(function () {

    Route::get('/getUserList', 'getUserList')->name('getUserList');
    Route::get('/getOnceUserList/{id}', 'getOnceUserList')->name('getOnceUserList');
});