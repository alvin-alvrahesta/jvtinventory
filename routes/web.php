<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\PemakaiController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/hardware/detailhw/{id_hw}', [HardwareController::class, 'detail']);
Route::get('/hardware/addhw', [HardwareController::class, 'add']);
Route::post('/hardware/inserthw', [HardwareController::class, 'insert']);
Route::get('/hardware/edithw/{id_hw}', [HardwareController::class, 'edit']);
Route::post('/hardware/updatehw/{id_hw}', [HardwareController::class, 'update']);
Route::get('/hardware/deletehw/{id_hw}', [HardwareController::class, 'delete']);
    Route::get('/hardware/index', [HardwareController::class, 'getHardware'])->name('hardware');
    Route::get('/hardware/workstations/', [HardwareController::class, 'atWorkstations'])->name('workstations');
    Route::get('/hardware/detailhw/{id_hw}', [HardwareController::class, 'detail']);


Route::get('/software/index', [SoftwareController::class, 'index']);

Route::get('/user/admin', [UserController::class, 'index']);
Route::get('/user/staff', [UserController::class, 'index']);

Route::get('/pemakai', [PemakaiController::class, 'index']);

// route::view('/','v_home');

// route::view('/hardware/workstations/','hardware.v_workstations');
// route::view('/hardware/server/','hardware.v_server');
// route::view('/hardware/printer/','hardware.v_printer');
// route::view('/hardware/sparepart/','hardware.v_sparepart');
// route::view('/hardware/other/','hardware.v_other');

// route::view('/software/subscription/','software.v_subscription');
// route::view('/software/sekalibayar/','software.v_sekalibayar');

// route::view('/user/admin/','user.v_admin');
// route::view('/user/staff/','user.v_staff');

// route::view('/pemakai','v_pemakai');
