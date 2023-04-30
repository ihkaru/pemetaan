<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/run", [ArtisanController::class, "run"]);

// Route::get('/auth/redirect', [GoogleLoginController::class,"redirectToProvider"]);
// Route::get('/login/google/callback', [GoogleLoginController::class,"handleProviderCallback"]);

Route::get('/', function () {
    return redirect("/admin");
});
Route::get('/login', fn () => redirect('/admin/login'))->name("login");