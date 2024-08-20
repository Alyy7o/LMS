<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


Route::middleware('auth','isAdmin:admin')->group( function () {
    Route::get('index', [AdminController::class, 'index']) ;
    Route::get('student', [AdminController::class, 'student']) ;
    Route::get('parent', [AdminController::class, 'parent']);
    Route::get('teacher', [AdminController::class, 'teacher']);

    // Classes
    Route::get('all_classes', [AdminController::class, 'all_classes'])->name('admin.all_classes');
    Route::get('add_class', [AdminController::class, 'add_class'])->name('admin.add_classes');
    Route::post('store_class', [AdminController::class, 'store_class'])->name('admin.store_class');
    Route::get('edit_class/{id}', [AdminController::class, 'edit_class'])->name('admin.edit_class');
    Route::put('update_class/{id}', [AdminController::class, 'update_class'])->name('admin.update_class');
    Route::delete('destroy_class/{id}', [AdminController::class, 'destroy_class'])->name('admin.destroy_class');
    
    // Sections
    Route::get('add_section', [AdminController::class, 'add_section'])->name('add_section');
    Route::post('store_section', [AdminController::class, 'store_section'])->name('store_section');
    Route::get('sections/{id}', [AdminController::class, 'show_sections'])->name('show_sections');
    Route::get('edit_section/{id}', [AdminController::class, 'edit_section'])->name('edit_section');
    Route::put('update_section/{id}', [AdminController::class, 'update_section'])->name('update_section');
    Route::delete('destroy_section/{id}', [AdminController::class, 'destroy_section'])->name('destroy_section');


    // Students
    Route::get('all_students', [AdminController::class, 'all_students'])->name('all_students');
    Route::get('add_students', [AdminController::class, 'add_students'])->name('add_students');
    Route::post('/api/fetch-section', [AdminController::class, 'fetchSection'])->name('fetch.section');
    Route::post('store_students', [AdminController::class, 'store_students'])->name('store_students');
    Route::get('student_details/{id}', [AdminController::class, 'student_details'])->name('student_details');
    Route::get('show_students/{id}', [AdminController::class, 'show_students'])->name('show_students');
    Route::get('edit_students/{id}', [AdminController::class, 'edit_students'])->name('edit_students');
    Route::put('update_students/{id}', [AdminController::class, 'update_students'])->name('update_students');
    Route::delete('destroy_students/{id}', [AdminController::class, 'destroy_students'])->name('destroy_students');
    
    
    // Parents
    Route::get('all_parents', [AdminController::class, 'all_parents'])->name('all_parents');
    Route::get('add_parent', [AdminController::class, 'add_parent'])->name('add_parent');
    Route::post('store_parents', [AdminController::class, 'store_parents'])->name('store_parents');
    Route::get('parent_details/{id}', [AdminController::class, 'parent_details'])->name('parent_details');
    Route::get('edit_parents/{id}', [AdminController::class, 'edit_parents'])->name('edit_parents');
    Route::put('update_parents/{id}', [AdminController::class, 'update_parents'])->name('update_parents');
    Route::delete('destroy_parents/{id}', [AdminController::class, 'destroy_parents'])->name('destroy_parents');

   
    //Library
Route::get('all_books', [AdminController::class, 'all_books']);
Route::get('add_book', [AdminController::class, 'add_book']);

})->name('admin');

//Account
Route::get('all_expense', [AdminController::class, 'all_expense']);
Route::get('add_expense', [AdminController::class, 'add_expense']);
Route::get('all_fees', [AdminController::class, 'all_fees']);

//Class


// Route::middleware('auth','isAdmin:student')->group( function () {
//     Route::get('all_student', [AdminController::class, 'all_student']);
//     Route::get('student_details', [AdminController::class, 'student_details']);
//     Route::get('admission_form', [AdminController::class, 'admission_form']);
//     Route::get('student_promotion', [AdminController::class, 'student_promotion']);
// })->name('student');

Route::middleware('auth','isAdmin:teacher')->group( function () {
    Route::get('all_teachers', [AdminController::class, 'all_teachers']);
    Route::get('teacher_details', [AdminController::class, 'teacher_details']);
    Route::get('add_teacher', [AdminController::class, 'add_teacher']);
    Route::get('teacher_payment', [AdminController::class, 'teacher_payment']);
})->name('teacher');

// Route::middleware('auth','isAdmin:parents')->group( function () {
//     Route::get('all_parents', [AdminController::class, 'all_parents']);
//     Route::get('parent_details', [AdminController::class, 'parent_details']);
// })->name('parents');


//Admin
// Route::get('index', [AdminController::class, 'index'])->name('ex');
// Route::get('student', [AdminController::class, 'student']);
// Route::get('parent', [AdminController::class, 'parent']);
// Route::get('teacher', [AdminController::class, 'teacher']);

//student
// Route::get('all_student', [AdminController::class, 'all_student']);
// Route::get('student_details', [AdminController::class, 'student_details']);
// Route::get('admission_form', [AdminController::class, 'admission_form']);
// Route::get('student_promotion', [AdminController::class, 'student_promotion']);

// Teachers
// Route::get('all_teachers', [AdminController::class, 'all_teachers']);
// Route::get('teacher_details', [AdminController::class, 'teacher_details']);
// Route::get('add_teacher', [AdminController::class, 'add_teacher']);
// Route::get('teacher_payment', [AdminController::class, 'teacher_payment']);

//Parents
// Route::get('all_parents', [AdminController::class, 'all_parents']);
// Route::get('add_parent', [AdminController::class, 'add_parent']);
// Route::get('parent_details', [AdminController::class, 'parent_details']);

// //Library
// Route::get('all_books', [AdminController::class, 'all_books']);
// Route::get('add_book', [AdminController::class, 'add_book']);

// //Account
// Route::get('all_expense', [AdminController::class, 'all_expense']);
// Route::get('add_expense', [AdminController::class, 'add_expense']);
// Route::get('all_fees', [AdminController::class, 'all_fees']);

// //Class
// Route::get('all_classes', [AdminController::class, 'all_classes']);
// Route::get('add_class', [AdminController::class, 'add_class']);

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

