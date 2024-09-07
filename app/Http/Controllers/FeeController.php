<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FeeController extends Controller
{
    public function all_fees()
    {
        // Fetch all students with their fees
        $students = Student::with('fees')->get();

        return view('account.all_fees', compact('students'));
    }

    public function updateFeeStatus(Request $request, $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->status = $request->input('status');
        $fee->paid_at = $fee->status == 'paid' ? Carbon::now() : null;
        $fee->save();

        return redirect()->back()->with('success', 'Fee status updated!');
    }

    // This function will be called in a scheduled command to update the status to 'unpaid' after one month
    public function checkAndUpdateFeeStatus()
    {
        $fees = Fee::where('status', 'paid')
                    ->where('paid_at', '<=', Carbon::now()->subMonth())
                    ->get();

        foreach ($fees as $fee) {
            $fee->status = 'unpaid';
            $fee->save();
        }
    }
}
