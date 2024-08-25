<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\TeacherController;

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::middleware('auth','isAdmin:super_admin')->group( function () {
    Route::get('index', [SuperAdminController::class, 'index'])->name('index');
    Route::get('add_owner', [SuperAdminController::class, 'add_owner'])->name('add_owner');
    Route::post('store_owner', [SuperAdminController::class, 'store_owner'])->name('store_owner');
    Route::get('all_owner', [SuperAdminController::class, 'all_owner'])->name('all_owner');
    Route::put('update_owner_status/{id}', [SuperAdminController::class, 'updateOwnerStatus'])->name('update_owner_status');
    Route::get('edit_owner/{id}', [SuperAdminController::class, 'edit_owner'])->name('edit_owner');
    Route::put('update_owner/{id}', [SuperAdminController::class, 'update_owner'])->name('update_owner');
    Route::delete('destroy_owner/{id}', [SuperAdminController::class, 'destroy_owner'])->name('destroy_owner');

})->name('super_admin');


Route::middleware('auth','isAdmin:owner')->group( function () {
    
    Route::get('indexx', [AdminController::class, 'indexx']) ;

    //Admin
    Route::get('add_admin', [OwnerController::class, 'add_admin'])->name('add_admin');
    Route::post('store_admin', [OwnerController::class, 'store_admin'])->name('store_admin');
    Route::get('all_admin', [OwnerController::class, 'all_admin'])->name('all_admin');
    Route::get('admin_details/{id}', [OwnerController::class, 'admin_details'])->name('admin_details');
    Route::get('edit_admin/{id}', [OwnerController::class, 'edit_admin'])->name('edit_admin');
    Route::put('update_admin/{id}', [OwnerController::class, 'update_admin'])->name('update_admin');
    Route::delete('destroy_admin/{id}', [OwnerController::class, 'destroy_admin'])->name('destroy_admin');
    
    //Deletes of all
    Route::delete('destroy_teacher/{id}', [OwnerController::class, 'destroy_teacher'])->name('destroy_teacher');
    Route::delete('destroy_class/{id}', [AdminController::class, 'destroy_class'])->name('admin.destroy_class');
    Route::delete('destroy_section/{id}', [AdminController::class, 'destroy_section'])->name('destroy_section');
    Route::delete('destroy_students/{id}', [AdminController::class, 'destroy_students'])->name('destroy_students');
    Route::delete('destroy_parents/{id}', [AdminController::class, 'destroy_parents'])->name('destroy_parents');
    

})->name('owner');


Route::middleware('auth','isAdmin:admin,owner')->group( function () {

    Route::get('teacher', [AdminController::class, 'teacher']);
    Route::get('student', [AdminController::class, 'student']) ;
    Route::get('parent', [AdminController::class, 'parent']);
    

    //Teacher
    Route::get('add_teacher', [OwnerController::class, 'add_teacher'])->name('add_teacher');
    Route::post('store_teacher', [OwnerController::class, 'store_teacher'])->name('store_teacher');
    Route::get('all_teachers', [OwnerController::class, 'all_teachers'])->name('all_teachers');
    Route::get('teacher_details/{id}', [OwnerController::class, 'teacher_details'])->name('teacher_details');
    Route::get('edit_teacher/{id}', [OwnerController::class, 'edit_teacher'])->name('edit_teacher');
    Route::put('update_teacher/{id}', [OwnerController::class, 'update_teacher'])->name('update_teacher');

    // Classes
    Route::get('all_classes', [AdminController::class, 'all_classes'])->name('admin.all_classes');
    Route::get('add_class', [AdminController::class, 'add_class'])->name('admin.add_classes');
    Route::post('store_class', [AdminController::class, 'store_class'])->name('admin.store_class');
    Route::get('edit_class/{id}', [AdminController::class, 'edit_class'])->name('admin.edit_class');
    Route::put('update_class/{id}', [AdminController::class, 'update_class'])->name('admin.update_class');
    
    // Sections
    Route::get('add_section', [AdminController::class, 'add_section'])->name('add_section');
    Route::post('store_section', [AdminController::class, 'store_section'])->name('store_section');
    Route::get('sections/{id}', [AdminController::class, 'show_sections'])->name('show_sections');
    Route::get('edit_section/{id}', [AdminController::class, 'edit_section'])->name('edit_section');
    Route::put('update_section/{id}', [AdminController::class, 'update_section'])->name('update_section');


    // Students
    Route::get('all_students', [AdminController::class, 'all_students'])->name('all_students');
    Route::get('add_students', [AdminController::class, 'add_students'])->name('add_students');
    Route::post('/api/fetch-section', [AdminController::class, 'fetchSection'])->name('fetch.section');
    Route::post('store_students', [AdminController::class, 'store_students'])->name('store_students');
    Route::get('student_details/{id}', [AdminController::class, 'student_details'])->name('student_details');
    Route::get('show_students/{id}', [AdminController::class, 'show_students'])->name('show_students');
    Route::get('edit_students/{id}', [AdminController::class, 'edit_students'])->name('edit_students');
    Route::put('update_students/{id}', [AdminController::class, 'update_students'])->name('update_students');
    
    
    // Parents
    Route::get('all_parents', [AdminController::class, 'all_parents'])->name('all_parents');
    Route::get('add_parent', [AdminController::class, 'add_parent'])->name('add_parent');
    Route::post('store_parents', [AdminController::class, 'store_parents'])->name('store_parents');
    Route::get('parent_details/{id}', [AdminController::class, 'parent_details'])->name('parent_details');
    Route::get('edit_parents/{id}', [AdminController::class, 'edit_parents'])->name('edit_parents');
    Route::put('update_parents/{id}', [AdminController::class, 'update_parents'])->name('update_parents');
});


Route::middleware('auth','isAdmin:admin')->group( function () {
   
    //Library
Route::get('all_books', [AdminController::class, 'all_books']);
Route::get('add_book', [AdminController::class, 'add_book']);

})->name('admin');

//Account
Route::get('all_expense', [AdminController::class, 'all_expense']);
Route::get('add_expense', [AdminController::class, 'add_expense']);
Route::get('all_fees', [AdminController::class, 'all_fees']);


//Subject
Route::get('all_subjects', [AdminController::class, 'all_classes']);

//Class Routine
Route::get('class_routine', [AdminController::class, 'class_routine']);

//Student Attendence
Route::get('student_attendence', [AdminController::class, 'student_attendence']);

// Exam
Route::get('exam_schedule', [AdminController::class, 'exam_schedule']);
Route::get('exam_grade', [AdminController::class, 'exam_grade']);

//Transport
Route::get('transport', [AdminController::class, 'transport']);

// Hostel
Route::get('hostel', [AdminController::class, 'hostel']);

// Notice
Route::get('notice', [AdminController::class, 'notice']);

// Message
Route::get('message', [AdminController::class, 'message']);

