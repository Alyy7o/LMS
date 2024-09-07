<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Subject;
use Mockery\Matcher\Subset;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //All Subjects
    public function all_subjects(){

        $subjects = Subject::all();
        return view('subject.all_subjects', compact('subjects'));
    }

    // View Add Subject
    public function add_subject(){

        $sections = Section::all();
        $classes = Classes::all();
        return view('subject.add_subject', compact('sections','classes'));
    }

    //Fetch Sections using ajax
    public function fetchSection( Request $request)
    {
        $sections = Section::where('class_id', $request->class_id)->get();
        return response()->json(['sections' => $sections]);
    }

    // Store Subject
    public function store_subject(Request $request){

        $request->validate([
            'name' => 'required|string',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->class_id = $request->class_id;
        $subject->section_id = $request->section_id;

        $subject->save();
    
        return redirect()->route('all_subjects')->with('success', 'Subject Added Successfully!');
    }

    //Show Subjects by Sections
    public function show_subjects(string $id)
    {
        $section = Section::with('subject')->findOrFail($id);
    
        return view('subject.show_subjects', compact('section'));

    }

    // View Edit Class
    public function edit_subject(string $id)
    {
        $sections = Section::all();
        $classes = Classes::all();
        $subject = Subject::findOrFail($id);
        return view('subject.edit_subject',compact('subject','classes','sections'));
    }

    // Edit Class
    public function update_subject(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $subject = Subject::findOrFail($id);

        $subject->name = $request->name;
        $subject->class_id = $request->class_id;
        $subject->section_id = $request->section_id;

        $subject->save();

        return redirect()->route('all_subjects')->with('success', 'Subject Updated Successfully!');
    }


    // Delete Section
    public function destroy_subject(string $id)
    {

        Subject::destroy($id);

        return redirect()->back()
                            ->with('status', "Subject Deleted");
    }
}
