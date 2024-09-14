<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//lesson view model
Route::get('/lesson/view/model/{id}', [CourseController::class, 'AllLessonAjax']);


//admin
Route::middleware(['auth', 'role:instructor'])->group(function(){

    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'logout')->name('admin.logout');
        Route::get('/all/studentEnroled', 'studentEnroled')->name('all.studentEnroled');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/all/course', 'all')->name('all.course');
        Route::get('/add/course', 'add')->name('add.course');
        Route::post('/store/course', 'store')->name('store.course');
        Route::get('/edit/course/{id}', 'edit')->name('edit.course');
        Route::post('/update/course', 'update')->name('update.course');
        Route::get('/delete/course/{id}', 'delete')->name('delete.course');

    });

    Route::controller(LessonController::class)->group(function () {
        Route::get('/all/lesson', 'all')->name('all.lesson');
        Route::get('/add/lesson', 'add')->name('add.lesson');
        Route::post('/store/lesson', 'store')->name('store.lesson');
        Route::get('/edit/lesson/{id}', 'edit')->name('edit.lesson');
        Route::post('/update/lesson', 'update')->name('update.lesson');
        Route::get('/delete/lesson/{id}', 'delete')->name('delete.lesson');


    });


});

//user
Route::middleware(['auth', 'role:student'])->group(function(){
    Route::controller(StudentController::class)->group(function () {
        Route::get('/user/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/student/logout', 'logout')->name('student.logout');


    });

    Route::controller(EnrolleController::class)->group(function () {
        Route::get('/student/enroled/all', 'all')->name('student.enroled.all');
        Route::get('/student/enroled/add', 'add')->name('student.enroled.add');
        Route::post('/student/enroled/store', 'store')->name('student.enroled.store');


    });

});


require __DIR__.'/auth.php';
