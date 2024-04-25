<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UtilitiController;
use App\Http\Controllers\UniversityController;





use App\Http\Controllers\TournamentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Web
//Trang chủ
Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('/chi-tiet-giai-dau/{id}', [WebController::class, 'tournamentDetail'])->name('web.tournament-detail');
Route::get('/chi-tiet-tran-dau/{id}', [WebController::class, 'matchDetail'])->name('web.match-detail');
	
// Admin
Route::prefix('admin')->group(function () {
	Route::get('/', function () {
	    return redirect()->route('login');
	});
	Route::middleware(['auth'])->group(function () {
		Route::resource('matchs', MatchController::class);
		Route::resource('tournaments', TournamentController::class);
		Route::get('/tournament-draw/{tournament}', [TournamentController::class, 'draw'])->name('tournaments.draw');
		Route::get('/tournament-draw/{tournament}/group/{group}', [TournamentController::class, 'drawGroup'])->name('tournaments.draw-group');
		Route::post('/tournament-draw/{group}/update-draw-group', [TournamentController::class, 'updateDrawGroup'])->name('tournaments.update-draw-group');

		Route::resource('teams', TeamController::class);
		Route::resource('users', UserController::class);
		Route::get('/users/view-change-password/{user}', [UserController::class, 'viewChangePassword'])->name('users.view-change-password');
		Route::post('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');
		Route::resource('roles', RoleController::class);
		Route::resource('permissions', PermissionController::class);
	});
	require __DIR__.'/auth.php';
});

