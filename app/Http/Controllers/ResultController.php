<?php

namespace App\Http\Controllers;

use App\Models\Marks;
use App\Models\Result;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    
    // View Add Subject
    public function add_marks(string $id){

        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        $classes = $teacher->classes;
        $sections = $teacher->sections;

        return view('exam.add_marks', compact('sections','classes'));
    }

    //Fetch Sections using ajax
    public function fetchSection( Request $request )
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->firstOrFail();

        $sections =  $teacher->sections()->where('class_id', $request->class_id)->get();
        return response()->json(['sections' => $sections]);
    }

    //Fetch Sections using ajax
    public function fetchSubject( Request $request )
    {
        // $teacher = Teacher::where('user_id', Auth::user()->id)->firstOrFail();

        $subjects =  Subject::where('section_id', $request->section_id)->get();
        return response()->json(['subjects' => $subjects]);
    }

    public function fetchStudents(Request $request)
    {
        $students = Student::where('section_id', $request->section_id)->get();
        return response()->json(['students' => $students]);
    }


     // Store Subject
     public function store_marks(Request $request){

        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'marks' => 'required|array',
            'marks.*.obtained_marks' => 'required|numeric|min:0',
            'marks.*.total_marks' => 'required|numeric|min:0',
        ]);

        // $totalObtainedMarks = 0;
        // $totalMarks = 0;
    
        foreach ($request->marks as $studentId => $marksData) {
            $marks = new Marks();
            $marks->student_id = $studentId;
            $marks->subject_id = $request->subject_id;
            $marks->obtained_marks = $marksData['obtained_marks']; 
            $marks->total_marks = $marksData['total_marks'];
            
            $marks->save();


            // Fetch existing result or create a new one
            $result = Result::firstOrNew([
                'student_id' => $studentId,
            ]);

            // Add the new marks to the existing totals
            $result->total_obtained_marks += $marks->obtained_marks;
            $result->total_marks += $marks->total_marks;
            
            // Calculate the percentage and grade
            $result->percentage = ($result->total_obtained_marks / $result->total_marks) * 100;
            
            $result->save();
        }

        return redirect()->back()->with('success', 'Marks Added Successfully.');
    }


    // Show the result for a specific student
    public function student_result(string $id)
    {
        $student = Student::with('result')->findOrFail($id);
        // $marks = Marks::where('student_id', $id)->findOrFail();
        // dd($student);

        return view('exam.student_result', compact('student'));
    }   

    // Show the results for all students of a specific teacher
    public function all_result($id)
    {
        $teacher = Teacher::where('user_id', $id)->firstOrFail();
        $students = $teacher->students()->with('result')->get();
        // dd($students);

        return view('exam.all_result', compact('teacher','students'));
    }


    }
