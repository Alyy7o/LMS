<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function student_attendence(string $id){

        $section = Section::findOrFail($id);
        $students = Student::where('section_id',$id)->get();
        $teachers = $section->teachers;

        return view('student_attendence.student_attendence', compact('section','students','teachers'));
        
    }

    public function store_attendance(Request $request)
{

        foreach ($request->students as $attendanceData) {
            Attendance::create([
                'student_id' => $attendanceData['student_id'],
                'section_id' => $request->section_id,
                'teacher_id' => $request->teacher_id,
                'status' => $attendanceData['status'],
                'date' => $request->date,
            ]);
        }
        
        return redirect()->back()->with('success', 'Attendance Saved Successfully.');
    }

}