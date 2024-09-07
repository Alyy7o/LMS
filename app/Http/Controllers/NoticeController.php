<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    // All Notices
    public function all_notices(){

        $notices = Notice::all();
        return view('notice.all_notices', compact('notices'));
    }

    // To add notice
    public function add_notice(){
        return view('notice.add_notice');
    }

    //Store Notices
    public function store_notice(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'post_by' => 'required|string|max:255',
            'date' => 'required|date',
            
        ]);

        $notice = new Notice();

        $notice->title = $request->title;
        $notice->details = $request->details;
        $notice->post_by = $request->post_by;
        $notice->date = $request->date;

        $notice->save();

        return redirect()->route('all_notices')->with('success','Notice Posted Successfully!');
    }
    
    // Notice Details
    public function notice_detail(string $id){

        $notice = Notice::findOrFail($id);

        return view('notice.notice_detail', compact('notice'));
    }
    
    // To Edit Notice
    public function edit_notice(string $id){

        $notice = Notice::findOrFail($id);

        return view('notice.edit_notice', compact('notice'));
    }

    // Update Notice
    public function update_notice(Request $request, string $id){

        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|max:255',
            'post_by' => 'required|string|max:255',
            'date' => 'required|date',
            
        ]);

        $notice = Notice::findOrFail($id);

        $notice->title = $request->title;
        $notice->details = $request->details;
        $notice->post_by = $request->post_by;
        $notice->date = $request->date;

        $notice->save();

        return redirect()->route('all_notices')->with('success','Notice Updated Successfully!');

    }

    // Delete Notice
    public function destroy_notice(string $id){

        Notice::destroy($id);

        return redirect()->back()->with('status','Notice Deleted!');

    }
}
