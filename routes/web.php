<?php
declare(strict_types=1);

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\DischargeController as AdminDischargeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], static function () {

    Route::group(['prefix' =>'account'], static function () {
        Route::get('/', AccountController::class)->name('account');
    });

    // Admin
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'check.admin',
    ], static function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/registration', AdminRegistrationController::class);
        Route::resource('/discharge', AdminDischargeController::class);
    });
});

// Guest's routes

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');
Route::get('/registration', [NewsController::class, 'registration'])
    ->name('news.registration');

Route::match(["POST", 'GET', 'PUT'], '/test', function (\Illuminate\Http\Request $request) {
    return (int) $request->isMethod('GET');
});

Route::get('/collections', function () {
    $collection = collect([1,2,3,4,77,99,9]);
    dd($collection);
});

Route::get('/session', function () {

    if (session()->has('mysession')) {
        dd(session()->all(), session()->get('mysession'));
        session()->forget('mysession');
    }
    session()->put('mysession', 'Test Session');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
