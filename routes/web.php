<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('login');
});
*/
Route::view("/", "login")->name('login');
Route::post("/login", [UserController::class, "login"])->name('login');
Route::get("/logout", [UserController::class, "logout"])->name('logout');
Route::get("/users", [UserController::class, "index"])->name('user.index')->middleware('auth');
Route::post("/users", [UserController::class, "create"])->name('user.create');
Route::post("/user", [UserController::class, "update"])->name('user.update');
Route::get("/user-{id}", [UserController::class, "delete"])->name('user.delete')->middleware('auth');
// Noticias
//Route::view("/notices", "notice");
//Route::get("/notices", [NoticeController::class, "index"]);
Route::get('/notices', 'App\Http\Controllers\NoticeController@index')->name('notice.index')->middleware('auth');
Route::post('/notices', 'App\Http\Controllers\NoticeController@create')->name('notice.create')->middleware('auth');
Route::get('/notice-{id}','App\Http\Controllers\NoticeController@delete')->name('notice.delete')->middleware('auth');
Route::post("/notice", 'App\Http\Controllers\NoticeController@update')->name('notice.update')->middleware('auth');