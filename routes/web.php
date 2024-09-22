<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Models\Owner;
use App\Models\Teacher;

Route::get('/', function () {
    return redirect('/login');
});
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

// Super Admin
Route::middleware('auth','isAdmin:super_admin')->group( function () {
    Route::get('super_admin/dashboard', [SuperAdminController::class, 'sa_dashboard'])->name('dashboard');
    Route::get('add_owner', [SuperAdminController::class, 'add_owner'])->name('add_owner');
    Route::post('store_owner', [SuperAdminController::class, 'store_owner'])->name('store_owner');
    Route::get('all_owner', [SuperAdminController::class, 'all_owner'])->name('all_owner');
    Route::put('update_owner_status/{id}', [SuperAdminController::class, 'updateOwnerStatus'])->name('update_owner_status');
    Route::delete('destroy_owner/{id}', [SuperAdminController::class, 'destroy_owner'])->name('destroy_owner');
    
})->name('super_admin');

Route::middleware('auth','isAdmin:super_admin,owner')->group( function () {
    Route::get('edit_owner/{id}', [SuperAdminController::class, 'edit_owner'])->name('edit_owner');
    Route::put('update_owner/{id}', [SuperAdminController::class, 'update_owner'])->name('update_owner');
});

// Owner
Route::middleware('auth','isAdmin:owner')->group( function () {
    
    Route::get('owner_dashboard', [OwnerController::class, 'owner_dashboard'])->name('owner_dashboard') ;

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
    Route::delete('destroy_subject/{id}', [SubjectController::class, 'destroy_subject'])->name('destroy_subject');
    Route::delete('destroy_notice/{id}', [NoticeController::class, 'destroy_notice'])->name('destroy_notice');
    

})->name('owner');


// Owner and Admin
Route::middleware('auth','isAdmin:admin,owner')->group( function () {

    Route::get('student', [AdminController::class, 'student']) ;

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
    Route::post('/fetch-sections', [AdminController::class, 'fetchSections'])->name('fetch.sections');
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
    
    
    // Subject
    Route::get('all_subjects', [SubjectController::class, 'all_subjects'])->name('all_subjects');
    Route::get('add_subject', [SubjectController::class, 'add_subject'])->name('add_subject');
    Route::post('store_subject', [SubjectController::class, 'store_subject'])->name('store_subject');
    Route::get('show_subjects/{id}', [SubjectController::class, 'show_subjects'])->name('show_subjects');
    Route::get('edit_subject/{id}', [SubjectController::class, 'edit_subject'])->name('edit_subject');
    Route::put('update_subject/{id}', [SubjectController::class, 'update_subject'])->name('update_subject');
    
    
    // Notice
    Route::get('all_notices', [NoticeController::class, 'all_notices'])->name('all_notices');
    Route::get('add_notice', [NoticeController::class, 'add_notice'])->name('add_notice');
    Route::post('store_notice', [NoticeController::class, 'store_notice'])->name('store_notice');
    Route::get('notice_detail/{id}', [NoticeController::class, 'notice_detail'])->name('notice_detail');
    Route::get('edit_notice/{id}', [NoticeController::class, 'edit_notice'])->name('edit_notice');
    Route::put('update_notice/{id}', [NoticeController::class, 'update_notice'])->name('update_notice');
    
    // Fee
    Route::get('all_fees', [FeeController::class, 'all_fees'])->name('all_fees');
    Route::patch('all_fees/{id}', [FeeController::class, 'updateFeeStatus'])->name('fees_status_update');
});


// Admin Only
Route::middleware('auth','isAdmin:admin')->group( function () {
    
    Route::get('admin_dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard') ;


    //Library
    Route::get('all_books', [AdminController::class, 'all_books']);
    Route::get('add_book', [AdminController::class, 'add_book']);
    
})->name('admin');



// Admin and owner and teacher
Route::middleware('auth','isAdmin:admin,owner,teacher')->group( function () {
    
    Route::get('show_students_of_teacher/{id}', [TeacherController::class, 'show_students_of_teacher'])->name('show_students_of_teacher');
    Route::get('student_result/{id}', [ResultController::class, 'student_result'])->name('student_result');
    
});

// Teacher Only
Route::middleware('auth','isAdmin:teacher')->group( function () {
    
    Route::get('teachers_dashboard', [TeacherController::class, 'teachers_dashboard'])->name('teachers_dashboard');
    
    Route::get('profile_of_teacher/{id}', [TeacherController::class, 'profile_of_teacher'])->name('profile_of_teacher');
    Route::get('all_classes_of_teacher/{id}', [TeacherController::class, 'all_classes_of_teacher'])->name('all_classes_of_teacher');
    Route::get('all_sections_of_teacher/{id}/{class_id}', [TeacherController::class, 'all_sections_of_teacher'])->name('all_sections_of_teacher');
    Route::get('all_students_of_teacher/{id}', [TeacherController::class, 'all_students_of_teacher'])->name('all_students_of_teacher');
    
    Route::get('student_attendence/{id}', [AttendanceController::class, 'student_attendence'])->name('student_attendence');
    Route::post('store_attendance', [AttendanceController::class, 'store_attendance'])->name('store_attendance');
    
    Route::get('add_marks/{id}', [ResultController::class, 'add_marks'])->name('add_marks');
    Route::post('/api/fetch-section', [ResultController::class, 'fetchSection'])->name('fetch.section');
    Route::post('/api/fetch-subject', [ResultController::class, 'fetchSubject'])->name('fetch.subject');
    Route::post('/api/fetch-students', [ResultController::class, 'fetchStudents'])->name('fetch.students');
    Route::post('store_marks', [ResultController::class, 'store_marks'])->name('store_marks');

    Route::get('all_result/{id}', [ResultController::class, 'all_result'])->name('all_result');

    
})->name('teacher');


Route::middleware('auth','isAdmin:parent')->group( function () {

    Route::get('parent_dashboard', [ParentController::class, 'parent_dashboard'])->name('parent_dashboard');
    Route::get('parent_child_data/{id}', [ParentController::class, 'parent_child_data'])->name('parent_child_data');
    Route::get('parent_child_result/{id}', [ParentController::class, 'parent_child_result'])->name('parent_child_result');
    Route::get('parent_child_attendance/{id}', [ParentController::class, 'parent_child_attendance'])->name('parent_child_attendance');
    Route::get('parent_child_fees/{id}', [ParentController::class, 'parent_child_fees'])->name('parent_child_fees');


})->name('parent');

