<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function teachers_dashboard(){
        $id = Auth::id();
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        $students = count($teacher->students);
        $classes = count($teacher->classes);
        $sections = count($teacher->sections);
        return view('teacher.teachers_dashboard', compact('students', 'classes', 'sections'));
    }

    // profile_of_teacher
    public function profile_of_teacher(string $id)
    {
        $teacher = Teacher::where('user_id', $id)->firstOrFail();

        return view('teacher.teacher_details', compact('teacher'));
    }


    //all_classes_of_teacher
    public function all_classes_of_teacher(string $id){
         
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        
        $classes = $teacher->classes;
        
        return view('teacher.all_classes_of_teacher', compact('teacher', 'classes'));
    }

    //all_sections_of_teacher
    public function all_sections_of_teacher(string $id, string $class_id){
         
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        
        $sections = $teacher->sections()->where('class_id', $class_id)->get();
        
        return view('teacher.all_sections_of_teacher', compact('teacher', 'sections'));
    }

    //Show Students by Sections
    public function show_students_of_teacher(string $id)
    {
        $section = Section::with('classes')->findOrFail($id);
        $students = Student::with('parents')->where('section_id', $id)->get();
    
        return view('teacher.show_students_of_teacher', compact('section', 'students'));

    }

    public function all_students_of_teacher(string $id)
    {
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        $students = $teacher->students;

        return view('teacher.all_students_of_teacher', compact('teacher', 'students'));
    }
    
    public function add_paper()
    {
        //
    }

    public function add_quiz()
    {
        //
    }


}
