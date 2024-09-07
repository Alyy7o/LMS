<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\User;
use App\Models\Admin;
use App\Models\Classes;
use App\Models\Parents;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function indexx(){
        return view('admin.index');
    }

    public function student(){
        return view('admin.index3');
    }
    public function teacher(){
        return view('admin.index5');
    }
    public function parent(){
        return view('admin.parents');
    }
    


    // Classes

    // Show All Classes
    public function all_classes(){
        
        $classes = Classes::all();
        return view("class.all_classes",compact('classes'));
    }
    
    // View Add Class
    public function add_class(){
        return view('class.add_class');
    }

    // Store Class
    public function store_class(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            
        ]);

        $class = new Classes();

        $class->name = $request->name;
        $class->save();

        return redirect()->route('admin.all_classes')
                ->with('success',"Class Added Successfully!");
    }

    // View All Classes
    public function show_classes()
    {

        return view('class.all_classes');
    }

    // View Edit Class
    public function edit_class(string $id)
    {
        $classes = Classes::findOrFail($id);

        return view('class.edit_class',compact('classes'));
    }

    // Edit Class
    public function update_class(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $class = Classes::findOrFail($id);
        $class->name = $request->name;
        $class->save();

        return redirect()->route('admin.all_classes')->with('success', 'Class updated successfully!');
    }

    // Delete Class
    public function destroy_class(string $id)
    {
        Classes::destroy($id);

        return redirect()->route('admin.all_classes')
        ->with('status',"Class Deleted");   
    }


    // Sections

    // View Add Section
    public function add_section(){

        $classes = Classes::all();
        return view('sections.add_section', compact('classes'));
    }

    // Store Section
    public function store_section(Request $request){

    $request->validate([
        'name' => 'required|string',
        'class_id' => 'required|exists:classes,id',
    ]);

    Section::create([
        'name' => $request->name,
        'class_id' => $request->class_id,
    ]);

    return redirect()->route('add_section')->with('success', 'Section Added Successfully!');
}

// View Section
public function show_sections(string $id) {
    $class = Classes::with('sections')->findOrFail($id);
    return view('sections.show_sections', compact('class'));
    
}

// View Edit Section
public function edit_section(string $id)
{
    $sections = Section::findOrFail($id);

    return view('sections.edit_section',compact('sections'));
}

// Edit Section
public function update_section(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|string',
    ]);

    $section = Section::findOrFail($id);
    $section->name = $request->name;
    $section->save();

    return redirect()->route('admin.all_classes')->with('success', 'Section updated successfully!');
}

// Delete Section
public function destroy_section(string $id)
{
    
    Section::destroy($id);
    
    return redirect()->route('admin.all_classes')
                     ->with('status', "Section Deleted");
}



   //Students

    // All Students
    public function all_students()
    {
        $students = Student::with('classes','sections','parents')->get();
        return view('student.all_students',compact('students'));
    }


    //To Add Students
    public function add_students()
    {
        $parents = Parents::all();
        $classes = Classes::all();
        return view('student.admission_form', compact('classes','parents'));
    }

    //Fetch Sections using ajax
    public function fetchSections(Request $request)
{
    $sections = Section::where('class_id', $request->class_id)->get();

    return response()->json(['sections' => $sections]);
}


    //Store Students
    public function store_students(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|max:255',
            'admission_id' => 'required|',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'parent_id' => 'required|exists:parents,id',
            'roll' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'fee' => 'required | numeric',
        ]);

        $student = new Student();
        $student->f_name = $request->f_name;
        $student->l_name = $request->l_name;
        $student->about = $request->about;
        $student->gender = $request->gender;
        $student->religion = $request->religion;
        $student->date_of_birth = $request->date_of_birth;
        $student->blood_group = $request->blood_group;
        $student->admission_id = $request->admission_id;
        $student->email = $request->email;
        $student->class_id = $request->class_id;
        $student->section_id = $request->section_id;
        $student->parent_id = $request->parent_id;
        $student->roll = $request->roll;
        $student->phone = $request->phone;
        $student->fee = $request->fee;


        $image = $request->pic;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pic->move('students',$imagename);
            $student->pic = $imagename;
        }

        $student->save();

        if($student->save()){

            $fee = new Fee();
            $fee->user_id = auth()->id();
            $fee->student_id = $student->id;
            $fee->amount = $request->fee;
            $fee->status = 'paid';
            
            $fee->save();

            // Retrieve the section's associated teachers and save the relationships in the student_teacher pivot table
            $section = Section::with('teachers')->find($request->section_id);
            if ($section) {
                foreach ($section->teachers as $teacher) {
                    $student->teachers()->attach($teacher->id);
                }
            }
        }

        return redirect()->route('add_students')->with('success', 'Student added successfully.');
    }

    //Show Students by Sections
    public function show_students(string $id)
    {
        $section = Section::with('classes')->findOrFail($id);
        $students = Student::with('parents')->where('section_id', $id)->get();
    
        return view('student.show_students', compact('section', 'students'));

    }

    //Show Student Details
    public function student_details (string $id){
        $student = Student::with('classes','sections','parents')->findOrFail($id);
        return view('student.student_details',compact('student'));
    }

    //To Edit Students
    public function edit_students(string $id)
    {
        $students = Student::findOrFail($id);

        return view('student.edit_students',compact('students'));
    }
    

    //Update Students
    public function update_students(Request $request, string $id)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'fee' => 'required | numeric',
        ]);

        $student = Student::findOrFail($id);

        $student->f_name = $request->f_name;
        $student->l_name = $request->l_name;
        $student->about = $request->about;
        $student->gender = $request->gender;
        $student->religion = $request->religion;
        $student->date_of_birth = $request->date_of_birth;
        $student->blood_group = $request->blood_group;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->fee = $request->fee;

        $image = $request->pic;
        if($image){
            if ($student->pic) {
                Storage::delete('students' . $student->pic);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pic->move('students',$imagename);
            $student->pic = $imagename;
        }

        $student->save();

        if($student->save()){

            $fee = new Fee();
            $fee->user_id = auth()->id();
            $fee->student_id = $student->id;
            $fee->amount = $request->fee;
            $fee->status = 'paid';
            
            $fee->save();
        }

        return redirect()->route('all_students')
                     ->with('success', "Student Updated Successfully!");

    }
    
   // Delete Student
    public function destroy_students(string $id)
    {
    
        Student::destroy($id);
    
        return redirect()->back()
                        ->with('status', "Student Deleted");
    }


    //Parents

    // All Parents
    public function all_parents()
    {
        $parents = Parents::all();
        return view('parent.all_parents',compact('parents'));
    }

    //To Add Parents
    public function add_parent()
    {
        return view('parent.add_parent');
    }

    //Store Parents
    public function store_parents(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'required|string|min:8',
            'address' => 'required|',
            'occupation' => 'required|',
            'phone' => 'nullable|string|max:255',
        ]);

        // Fetch the latest registration number and increment it
        $latestParent = Parents::orderBy('id', 'desc')->first();
        
        if ($latestParent) {
            // Extract the numeric part of the registration number
            $latestNumber = intval(substr($latestParent->reg_no, -4));
            $number = $latestNumber + 1;
        } else {
            // Start with 1 if no previous records exist
            $number = 1;
        }
        
        // Generate the new registration number
        $reg_no = 'AKH-' . now()->format('Ymd') . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);


        // Assuming the owner is the currently authenticated user
        $owner = auth()->user();

        // Store the data in the User table
        $user = new User();
        $user->owner_id = $owner->id;
        $user->name = $request->f_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'parent';

        $user->save();

        if($user->save()){

            
        $parent = new Parents();
        $parent->user_id = $user->id;
        $parent->reg_no = $reg_no;
        $parent->f_name = $request->f_name;
        $parent->l_name = $request->l_name;
        $parent->about = $request->about;
        $parent->gender = $request->gender;
        $parent->religion = $request->religion;
        $parent->blood_group = $request->blood_group;
        $parent->email = $request->email;
        $parent->password = Hash::make($request->password);
        $parent->address = $request->address;
        $parent->occupation = $request->occupation;
        $parent->phone = $request->phone;


        $image = $request->pic;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pic->move('parents',$imagename);
            $parent->pic = $imagename;
        }

        $parent->save();
    }

        return redirect()->route('all_parents')->with('success', 'Parent Added Successfully.');
    }

    //Show Parents Details
    public function parent_details (string $id){
        $parent = Parents::where('user_id', $id)->firstOrFail();
        return view('parent.parent_details',compact('parent'));
    }

    //To Edit Parents
    public function edit_parents(string $id)
    {
        $parent = Parents::where('user_id', $id)->firstOrFail();

        return view('parent.edit_parents',compact('parent'));
    }

    //Update Parents
    public function update_parents(Request $request, string $id)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'blood_group' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required|',
            'occupation' => 'required|',
            'phone' => 'nullable|string|max:255',
        ]);

        $parent = Parents::where('user_id', $id)->firstOrFail();
        $parent->f_name = $request->f_name;
        $parent->l_name = $request->l_name;
        $parent->about = $request->about;
        $parent->gender = $request->gender;
        $parent->religion = $request->religion;
        $parent->blood_group = $request->blood_group;
        $parent->email = $request->email;
        $parent->address = $request->address;
        $parent->occupation = $request->occupation;
        $parent->phone = $request->phone;


        $image = $request->pic;
        if($image){
            if ($parent->pic) {
                Storage::delete('parents' . $parent->pic);
            }
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pic->move('parents',$imagename);
            $parent->pic = $imagename;
        }

        $parent->save();

        if($parent->save()){
   
            // Store the data in the User table
            $user = User::where('id', $id)->firstOrFail();
            $user->name = $request->f_name;
            $user->email = $request->email;

            $user->save();

            
        }
        return redirect()->route('all_parents')
                     ->with('success', "Parent Updated Successfully!");

    }

    // Delete Parents
    public function destroy_parents(string $id)
    {

        $parent = Parents::where('user_id',$id)->first();

    if ($parent) {

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        // Delete the teacher record
        $parent->delete();

        return redirect()->back()
                        ->with('status', "Parent Deleted");
    } else {
        return redirect()->back()
                        ->with('status', "Parent not found Deleted");
    }

    }
   


    public function all_books(){
        return view('library.all_books');
    }
    public function add_book(){
        return view('library.add_book');
    }
    
    
    public function all_expense(){
        return view('account.all_expense');
    }
    public function all_fees(){
        return view('account.all_fees');
    }
    public function add_expense(){
        return view('account.add_expense');
    }
    


    public function class_routine(){
        return view('class-routine.class_routine');
    }
   
   
    public function student_attendence(){
        return view('student-attendence.student_attendence');
    }
   
   
    public function exam_schedule(){
        return view('exam.exam_schedule');
    }
    public function exam_grade(){
        return view('exam.exam_grade');
    }
    
    public function transport(){
        return view('transport.transport');
    }


    public function hostel(){
        return view('hostel.hostel');
    }


    public function notice(){
        return view('notice.notice');
    }
    
    
    public function message(){
        return view('message.message');
    }
}
