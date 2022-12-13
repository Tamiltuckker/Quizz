<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentManagementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\QuizTemplateController;
use App\Http\Controllers\Admin\QuizAnsweredController;
use App\Http\Controllers\User\ContentManagementController as UserContentManagementController;
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
    return  redirect()->route('user.dashboard.index');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth','role:'.\App\Models\Role::ADMIN], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);    
    Route::resource('quiztemplates', QuizTemplateController::class);
    Route::group(['prefix' => 'quiztemplates/{quiztemplate_id}'], function () {
        Route::resource('quizquestions',QuizQuestionController::class);
    });
    Route::get('users/{user_id}/getansweredtemplates', [QuizAnsweredController::class, 'getansweredtemplates'])->name('getansweredtemplates');
    Route::get('users/{user_id}/getansweredtemplates/{template_id}/getansweredquestions', [QuizAnsweredController::class, 'getansweredquestions'])->name('getansweredquestions');
    Route::resource('contents', ContentController::class);
});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard.index');

Route::group(['middleware' => ['auth','role:'.\App\Models\Role::USER], 'as' => 'user.', 'prefix' => 'user', 'namespace' => 'User'], function() {
    Route::get('/templates/{slug}', [UserDashboardController::class, 'gettemplates'])->name('dashboard.gettemplates');
    Route::get('/questions/{slug}', [UserDashboardController::class, 'getquestions'])->name('dashboard.getquestions');
    Route::post('/questions/answer', [QuizController::class, 'store'])->name('dashboard.store');
    Route::resource('profiles', ProfileController::class);
    Route::get('/contact', [UserContentManagementController::class, 'getcontact'])->name('contact'); 
    Route::get('/home', [UserContentManagementController::class, 'gethome'])->name('home'); 
    Route::get('/about', [UserContentManagementController::class, 'getabout'])->name('about'); 
    Route::get('/view/{id}', [UserDashboardController::class, 'viewquizanswer'])->name('dashboard.view');
    Route::post('/sendcontact', [UserContentManagementController::class, 'sendcontact'])->name('contact.sendcontact');
});

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function() {
    Route::get('/impersonate/{user}', [UserController::class, 'impersonate'])->name('impersonate');
    Route::get('/leave-impersonate', [UserController::class, 'leave_impersonate'])->name('leave-impersonate');
});