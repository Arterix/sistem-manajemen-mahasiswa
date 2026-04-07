<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;

Route::apiResource('mahasiswa', MahasiswaController::class)->names([
    'index'   => 'api.mahasiswa.index',
    'store'   => 'api.mahasiswa.store',
    'show'    => 'api.mahasiswa.show',
    'update'  => 'api.mahasiswa.update',
    'destroy' => 'api.mahasiswa.destroy',
]);
