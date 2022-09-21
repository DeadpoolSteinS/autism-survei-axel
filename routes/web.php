<?php

use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\FinalResultController;
use App\Http\Controllers\Admin\PilihanController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('client.home');
});

Route::get('/test', function () {
    return redirect()->route('client.test');
});

Route::get('/home', function () {
    return view('client.home');
});

Route::get('/manual', function () {
    return view('client.manual');
});

Route::get('/pilihan', function () {
    return view('client.pilihan');
});

Route::get('/pilihan/{id_datauser}', [PilihanController::class, 'index']);

Route::get('/finalresults/{id}', [TestController::class, 'showResult']);

Route::get('/isi_nama', function () {
    return view('client.isi_nama');
});

Route::post('/isi_nama', [DataUserController::class, 'store']);

Route::post('/finishtest/{survei}/{id}', [TestController::class, 'storeWithId']);

Route::get('/submit-rekomendasi/{id}', function () {
    return view('client.home');
});

Route::post('/submit-rekomendasi/{id}', [FinalResultController::class, 'store']);

// Route::get('/pilihan', function () {
//     return view('client.pilihan');
// });

Route::group(['middleware' => 'auth'], function() {
    Route::get('test/{categories}',[\App\Http\Controllers\TestController::class, 'categoryTest'])->name('client.test.categoryTest');
    Route::get('test/{categories}/{id}',[\App\Http\Controllers\TestController::class, 'categoryTestWithId']);
    Route::get('test',[\App\Http\Controllers\TestController::class, 'index'])->name('client.test');
    Route::post('test',[\App\Http\Controllers\TestController::class, 'store'])->name('client.test.store');
    Route::get('results/{result_id}',[\App\Http\Controllers\ResultController::class, 'show'])->name('client.results.show');

    // admin only
    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
        Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');
        
        // categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');

        // questions
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::delete('questions_mass_destroy', [\App\Http\Controllers\Admin\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');

        // options
        Route::resource('options', \App\Http\Controllers\Admin\OptionController::class);
        Route::delete('options_mass_destroy', [\App\Http\Controllers\Admin\OptionController::class, 'massDestroy'])->name('options.mass_destroy');

        // results
        Route::resource('results', \App\Http\Controllers\Admin\ResultController::class);
        Route::delete('results_mass_destroy', [\App\Http\Controllers\Admin\ResultController::class, 'massDestroy'])->name('results.mass_destroy');
    });

});

Auth::routes();
