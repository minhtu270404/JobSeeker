<?php

use App\Http\Controllers\Admin\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/getUserList', [UserController::class,'getUserList'])->name('getUserList');
