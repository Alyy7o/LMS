<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Parents;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function parent_welcome()
    {
        return view('parent.parent_welcome');
    }

    public function parent_child_data(string $id)
    {
        $parent = Parents::where('user_id', $id)->firstOrFail();

        $students = $parent->students;

        return view('parent.parent_child_data', compact('students'));
    }

    public function parent_child_result(string $id)
    {
        // Get the parent and eager load students, marks, results, and subjects through sections
        $parent = Parents::with([
            'students.marks.subjects', 
            'students.result',       
            'students.sections.subject',
        ])->where('user_id', $id)->firstOrFail();

        if (!$parent) {
            return response()->json(['error' => 'Parent not found'], 404);
        }

        $students = $parent->students;

        return view('parent.parent_child_result', compact('students'));
    }

    public function parent_child_attendance(Request $request, string $id)
    {
        // Assuming you are passing parent_id from the parent authentication/session
        $parent = Parents::where('user_id', $id)->firstOrFail(); // Adjust based on your auth system
        $students = $parent->students()->with(['attendances'])->get(); // Fetch students and their attendance

        // Group the attendance by month and day
        $attendanceData = [];
        foreach ($students as $student) {
            foreach ($student->attendances as $attendance) {
                $month = $attendance->date->format('F Y'); // Format as Month Year
                $day = $attendance->date->format('d'); // Day of the month
                $attendanceData[$student->id][$month][$day] = $attendance->status;
            }
        }

        return view('parent.parent_child_attendance', compact('students', 'attendanceData'));
    }
}
