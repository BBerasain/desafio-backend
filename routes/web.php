<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix("/empleados/index")->group(function () {
    Route::get('/', [EmpleadosController::class, 'index'])->name('empleados.index');
    Route::post("/", [EmpleadosController::class, "store"])->name('empleados.store');
    Route::delete("/{empleados}", [EmpleadosController::class, "destroy"])->name('empleados.destroy');
});

Route::prefix("/empleados/create")->group(function () {
    Route::get("/", [EmpleadosController::class, "create"]);
    Route::post("/", [EmpleadosController::class, "store"]);
});

Route::prefix("/empleados/{empleados}/edit")->group(function () {
    Route::get("/", [EmpleadosController::class, "edit"])->name('empleados.edit');
    Route::patch("/", [EmpleadosController::class, "update"])->name('empleados.update');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
