<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
    return redirect('dashboard');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function ()
    {
        Route::get('/dashboard', function () {
            return view('blank');
        })->name('dashboard');

        Route::resource('stages', StageController::class);


        Route::resource('grades', GradeController::class);
        Route::post('grades/delete_all', [GradeController::class, 'delete_all'])->name('grades.delete_all');
        Route::post('grades/stage', [GradeController::class, 'stage'])->name('grades.stage');


        Route::resource('classrooms', ClassroomController::class);
        Route::get('classrooms/gradesbystage/{stage_id}', [ClassroomController::class, 'gradesbystage']);

        Route::view('add_parent', 'livewire.parent_details')->name('add_parent');


    }
);
require __DIR__.'/auth.php';

