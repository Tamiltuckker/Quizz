<?php

use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\QuizTemplateController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\ProfileController;

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

Route::get('/', function () {
    return view('users.dashboard');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth','role:'.\App\Models\Role::ADMIN], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('quiztemplates', QuizTemplateController::class);
    Route::group(['prefix' => 'quiztemplates/{quiztemplate_id}'], function () {
        Route::resource('quizquestions',QuizQuestionController::class);
    });
});

Route::group(['middleware' => ['auth','role:'.\App\Models\Role::USER], 'as' => 'user.', 'prefix' => 'user', 'namespace' => 'User'], function() {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/templates/{slug}', [UserDashboardController::class, 'gettemplates'])->name('dashboard.gettemplates');
    Route::get('/dashboard/questions/{slug}', [UserDashboardController::class, 'getquestions'])->name('dashboard.getquestions');
    Route::post('/dashboard/questions/answer', [QuizController::class, 'store'])->name('dashboard.store');
    Route::resource('profiles', ProfileController::class);
});