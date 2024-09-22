<?php

namespace App\Http\Controllers;

use LDAP\Result;
use App\Models\Fee;
use App\Models\User;
use App\Models\Notice;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;

class ParentController extends Controller
{
    public function parent_dashboard()
    {
        //parent id in user table
        $id = Auth::id();

        //Parent id in parents table
        $user = Parents::where('user_id', $id)->get('id');

        $parent = Parents::where('user_id', $id)->firstOrFail();
        $students = Student::where('parent_id', $user)->count();
        // dd($students);
        // $student = Student::where('parent_id', $user)->get();
        // $student_fee = $parent->students()->with(['fees'])->get();
        // $student_fee = $student->fees()->where('status', 'unpaid')->first()->amount ?? 0;
        // $amount = 0; 
        // foreach ($students->fees as $fee) {
        //     $amount += $fee;
        // } 
        $note = Notice::all()->count();
        $result = Parents::with("students.result")->count();
        $amount = Fee::sum('amount');

        return view('parent.parent_dashboard', compact('students', 'amount', 'note', 'result'));
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

    public function parent_child_fees(string $id){
        // Fetch all students with their fees
        // $students = Student::with('fees')->where->get();
        $parent = Parents::where('user_id', $id)->firstOrFail();
        $students = $parent->students()->with(['fees'])->get(); 


        return view('parent.parent_child_fees', compact('students'));
    }
}
