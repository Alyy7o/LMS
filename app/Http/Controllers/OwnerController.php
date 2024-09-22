<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\User;
use App\Models\Admin;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{

    public function owner_dashboard()
    {
        $id = Auth::id();
        
        $teachers = User::where('owner_id', $id)->where('role', 'teacher')->count();
        $parents = User::where('owner_id', $id)->where('role', 'parent')->count();
        $fees = Fee::where('user_id', $id)->sum('amount');
        $students = Student::all()->count();
        $classes = Classes::all()->count();
        $sections = Section::all()->count();

        // Return view with students count
        return view('owner.owner_dashboard', compact('students', 'teachers', 'parents', 'fees', 'sections', 'classes'));
        
        // Get the count of students based on owner_id
        // $students = Student::whereHas('parent', function ($query) use ($id) {
        //     $query->where('user_id', $id);
        // })->count();

        // $parents = User::where('owner_id', $id)->where('role','parent')->get();
        // $studentsCount = 0;

        // foreach ($parents as $parent) {
        //     foreach ($parent->students as $student) {
        //         // $studentsCount[] = $student;
        //         $studentsCount = $studentsCount + $parent->students;
        //     }
        // }
        
        // You can now count the students
        // $students = count($studentsCount);
        // dd($students);

        // $students = User::where('owner_id', $id)
        //             // ->where('role', 'parent')
        //             ->withCount('students')
        //             ->get()
        //             ->sum('students_count');




        // $students = Student::whereHas('parent', function ($query) use ($id) {
        //     $query->whereHas('user', function ($userQuery) use ($id) {
        //         $userQuery->where('owner_id', $id);
        //     });
        // })->count();

        // $teachers = User::where('owner_id', $id)->where('role', 'teacher')->count(); 
        // dd($teachers);


    }
    
    public function all_admin(){
         $admins = Admin::all();
     
         return view('admin.all_admin', compact('admins'));
 
    }

    //To add admin
    public function add_admin(){
        return view('admin.add_admin');
    }

    //Store owner
    public function store_admin(Request $request){

        $request->validate([
           'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'cnic' => 'required|numeric|unique:admins,cnic',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'blood_group' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'mob_no' => 'required',
            'phone_no' => 'required',
            'address' => 'required|string',
            'salary' => 'required|numeric',
            'pic' => 'nullable|image',
            'doc_pic' => 'nullable|image',
        ]);

        // Assuming the owner is the currently authenticated user
        $owner = auth()->user();

        // Store the data in the User table
        $user = new User();
        $user->owner_id = $owner->id;
        $user->name = $request->f_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';

        $user->save();

        

        if($user->save()){
   
            // Store the data in the Owner table
        $admin = new Admin();

        $admin->user_id = $user->id;
        $admin->owner_id = $owner->id; // Associate the Admin with the Owner
        $admin->f_name = $request->f_name;
        $admin->l_name = $request->l_name;
        $admin->cnic = $request->cnic;
        $admin->gender = $request->gender;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->blood_group = $request->blood_group;
        $admin->religion = $request->religion;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Encrypt the password
        $admin->mob_no = $request->mob_no;
        $admin->phone_no = $request->phone_no;
        $admin->address = $request->address;
        $admin->salary = $request->salary;

        $image = $request->pic;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->pic->move('admin',$imagename);
            $admin->pic = $imagename;
        }
        
        $images = $request->doc_pic;
        if($images){
            $imagename = time().'.'.$images->getClientOriginalExtension();
            $request->doc_pic->move('admin',$imagename);
            $admin->doc_pic = $imagename;
        }

        $admin->save();
        }

        return redirect()->route('all_admin')->with('success', 'Admin Added Successfully.');
    }

    //Show Admin Details
    public function admin_details (string $id){
        $admin = Admin::where('user_id', $id)->firstOrFail();
        return view('admin.admin_details',compact('admin'));
    }

    //To Edit Admin
    public function edit_admin(string $id)
    {
        // Find the owner by user_id
        $admin = Admin::where('user_id', $id)->firstOrFail();

        return view('admin.edit_admin',compact('admin'));
    }

    //Update Admin
    public function update_admin(Request $request, string $id)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
             'l_name' => 'required|string|max:255',
             'cnic' => 'required|numeric',
             'gender' => 'required|string',
             'date_of_birth' => 'required|date',
             'blood_group' => 'required|string',
             'email' => 'required|email',
             'mob_no' => 'required',
             'phone_no' => 'required',
             'address' => 'required|string',
             'salary' => 'required|numeric',
             'pic' => 'nullable|image',
             'doc_pic' => 'nullable|image',
         ]);


         // Store the data in the Owner table
         $admin = Admin::where('user_id', $id)->firstOrFail();

         $admin->f_name = $request->f_name;
         $admin->l_name = $request->l_name;
         $admin->cnic = $request->cnic;
         $admin->gender = $request->gender;
         $admin->date_of_birth = $request->date_of_birth;
         $admin->blood_group = $request->blood_group;
         $admin->religion = $request->religion;
         $admin->email = $request->email;
         $admin->mob_no = $request->mob_no;
         $admin->phone_no = $request->phone_no;
         $admin->address = $request->address;
         $admin->salary = $request->salary;

         
         $image = $request->pic;
         if($image){
             if ($admin->pic) {
                 Storage::delete('owner' . $admin->pic);
             }
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->pic->move('admin',$imagename);
             $admin->pic = $imagename;
         }

         $image = $request->doc_pic;
         if($image){
             if ($admin->doc_pic) {
                 Storage::delete('owner' . $admin->doc_pic);
             }
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->doc_pic->move('admin',$imagename);
             $admin->doc_pic = $imagename;
         }

        $admin->save();

        if($admin->save()){
   
            // Store the data in the User table
            $user = User::where('id', $id)->firstOrFail();
            $user->name = $request->f_name;
            $user->email = $request->email;

            $user->save();

            
        return redirect()->route('all_admin')
                     ->with('success', "Admin Updated Successfully!");

    }
}

    // Delete Owner
    public function destroy_admin(string $id)
    {

        $admin = Admin::where('user_id',$id)->first();

    if ($admin) {

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        // Delete the teacher record
        $admin->delete();

        return redirect()->back()
                        ->with('status', "Admin Deleted");
    } else {
        return redirect()->back()
                        ->with('status', "Admin not found Deleted");
    }
    

    }


    // Teacher

    // All Teachers
    public function all_teachers(){

        $teachers = Teacher::with(['classes','sections'])->get();
    
        return view('teacher.all_teachers', compact('teachers'));  
     }


    //To add teacher
    public function add_teacher(){

         // Fetch classes and sections to display in the form
         $classes = Classes::all();
         $sections = Section::all();

        return view('teacher.add_teacher', compact('classes', 'sections'));
    }

    //Store Teacher
    public function store_teacher(Request $request){

    $request->validate([
         'f_name' => 'required|string|max:255',
         'l_name' => 'required|string|max:255',
         'cnic' => 'required|numeric|unique:admins,cnic',
         'gender' => 'required|string',
         'date_of_birth' => 'required|date',
         'blood_group' => 'required|string',
         'email' => 'required|email|unique:admins,email',
         'password' => 'required|string|min:8',
         'mob_no' => 'required',
         'phone_no' => 'required',
         'address' => 'required|string',
         'salary' => 'required|numeric',
         'pic' => 'nullable|image',
         'doc_pic' => 'nullable|image',
     ]);

     // Assuming the owner is the currently authenticated user
     $owner = auth()->user();

     $user = new User();
     $user->owner_id = $owner->id;
     $user->name = $request->f_name;
     $user->email = $request->email;
     $user->password = Hash::make($request->password);
     $user->role = 'teacher';

     $user->save();

     if($user->save()){

     $teacher = new Teacher();
         
     $teacher->user_id = $user->id;
     $teacher->f_name = $request->f_name;
     $teacher->l_name = $request->l_name;
     $teacher->cnic = $request->cnic;
     $teacher->gender = $request->gender;
     $teacher->date_of_birth = $request->date_of_birth;
     $teacher->blood_group = $request->blood_group;
     $teacher->religion = $request->religion;
     $teacher->email = $request->email;
     $teacher->password = Hash::make($request->password); // Encrypt the password
     $teacher->mob_no = $request->mob_no;
     $teacher->phone_no = $request->phone_no;
     $teacher->address = $request->address;
     $teacher->salary = $request->salary;

     // Assign to owner or admin
     $teacher->assignTo(auth()->user());

     $image = $request->pic;
     if($image){
         $imagename = time().'.'.$image->getClientOriginalExtension();
         $request->pic->move('teacher',$imagename);
         $teacher->pic = $imagename;
     }
     
     $images = $request->doc_pic;
     if($images){
         $imagename = time().'.'.$images->getClientOriginalExtension();
         $request->doc_pic->move('teacher',$imagename);
         $teacher->doc_pic = $imagename;
     }

     $teacher->save();
    
     }

    // Attach classes and sections
    if ($request->has('classes')) {
        $teacher->classes()->attach($request->input('classes'));
    }
    
    if ($request->has('sections')) {
        $teacher->sections()->attach($request->input('sections'));
    }

    return redirect()->route('all_teachers')->with('success', 'Teacher Added Successfully.');
}
 

//teacher details
public function teacher_details(string $id)
{
    $teacher = Teacher::where('user_id', $id)->firstOrFail();

    return view('teacher.teacher_details', compact('teacher'));
}

// To edit teacher
public function edit_teacher(string $id)
{
    $teacher = Teacher::where('user_id', $id)->firstOrFail();
    $classes = Classes::all();
    $sections = Section::all();

    return view('teacher.edit_teacher', compact('teacher', 'classes', 'sections'));
}

//update teacher
public function update_teacher(Request $request,string $id)
{

    $request->validate([
        'f_name' => 'required|string|max:255',
        'l_name' => 'required|string|max:255',
        'cnic' => 'required|numeric',
        'gender' => 'required|string',
        'date_of_birth' => 'required|date',
        'blood_group' => 'required|string',
        'email' => 'required|email',
        'mob_no' => 'required',
        'phone_no' => 'required',
        'address' => 'required|string',
        'salary' => 'required|numeric',
        'pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'doc_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);


    // Store the data in the Owner table
    $teacher = Teacher::where('user_id', $id)->firstOrFail();
        
    $teacher->f_name = $request->f_name;
    $teacher->l_name = $request->l_name;
    $teacher->cnic = $request->cnic;
    $teacher->gender = $request->gender;
    $teacher->date_of_birth = $request->date_of_birth;
    $teacher->blood_group = $request->blood_group;
    $teacher->religion = $request->religion;
    $teacher->email = $request->email;
    $teacher->mob_no = $request->mob_no;
    $teacher->phone_no = $request->phone_no;
    $teacher->address = $request->address;
    $teacher->salary = $request->salary;


    $image = $request->pic;
    if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->pic->move('teacher',$imagename);
        $teacher->pic = $imagename;
    }

    $image = $request->pic;
         if($image){
             if ($teacher->pic) {
                 Storage::delete('teacher' . $teacher->pic);
             }
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->pic->move('teacher',$imagename);
             $teacher->pic = $imagename;
         }

    $image = $request->doc_pic;
         if($image){
             if ($teacher->doc_pic) {
                 Storage::delete('teacher' . $teacher->doc_pic);
             }
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->doc_pic->move('teacher',$imagename);
             $teacher->doc_pic = $imagename;
         }

         if($teacher->save()){

            // Store the data in the User table
        $user = User::where('id', $id)->firstOrFail();;
        $user->name = $request->f_name;
        $user->email = $request->email;
        $user->save();
        }

    // Sync classes and sections
    $teacher->classes()->sync($request->input('classes', []));
    $teacher->sections()->sync($request->input('sections', []));

    return redirect()->route('all_teachers')->with('success', 'Teacher Updated Successfully.');
}


// delete teacher
public function destroy_teacher(string $id)
    {

    $teacher = Teacher::where('user_id',$id)->first();

    if ($teacher) {

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        // Delete the teacher record
        $teacher->delete();

        return redirect()->back()
                        ->with('status', "Teacher Deleted");
    } else {
        return redirect()->back()
                        ->with('status', "Teacher not found Deleted");
    }

    }

}
