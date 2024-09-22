<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{

    public function sa_dashboard(){
        $owner_count = DB::table('owners')->count();
        $owner_active_count = DB::table('owners')->where('status','active')->count();
        $owner_inactive_count = DB::table('owners')->where('status','inactive')->count();

        return view('admin.sa_dashboard',compact('owner_count','owner_active_count','owner_inactive_count'));
    }
    
     //All Owners
     public function all_owner()
     {
         $owners = Owner::all();
     
         return view('owner.all_owner', compact('owners'));
 
     }

     //Check status of Owner
    public function updateOwnerStatus(Request $request, $id)
    {
        $owner = Owner::find($id);

        // Update the status
        $owner->status = $request->input('status');

        // Check if the status is being set to 'active'
        if ($owner->status === 'active') {
            
            if (is_null($owner->activated_at)) {
                $owner->activated_at = now();
            }
        } 

        else
        {

            $owner->activated_at = null;
        }        
        $owner->save();

        return redirect()->back()->with('success', 'Owner Status Updated Successfully.');
    }


     //To add owner
    public function add_owner(){
        return view('owner.add_owner');
    }

    //Store owner
    public function store_owner(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'tele_no' => 'required',
            'mob_no' => 'required',
            'school_name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $super_admin = auth()->user();

        // Store the data in the User table
        $user = new User();
        $user->owner_id = $super_admin->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'owner';

        $user->save();

        if($user->save()){
   
            // Store the data in the Owner table
            $owner = new Owner();
            
            $owner->user_id = $user->id; // Associate the Owner with the User
            $owner->name = $request->name;
            $owner->email = $request->email;
            $owner->password = Hash::make($request->password);
            $owner->tele_no = $request->tele_no;
            $owner->mob_no = $request->mob_no;
            $owner->school_name = $request->school_name;
            $owner->address = $request->address;
            $owner->description = $request->description;

            $image = $request->logo;
            if($image){
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->logo->move('owner',$imagename);
                $owner->logo = $imagename;
            }

            $owner->save();
        }

        return redirect()->route('all_owner')->with('success', 'Owner Added Successfully.');
    }


     //To Edit Parents
    public function edit_owner(string $id)
    {
        // Find the owner by user_id
        $owner = Owner::where('user_id', $id)->firstOrFail();

        return view('owner.edit_owner',compact('owner'));
    }

    //Update Parents
    public function update_owner(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',   
            'tele_no' => 'required|string|max:20',
            'mob_no' => 'required|string|max:20',
            'school_name' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // Store the data in the User table
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        if($user->save()){
   
            // Store the data in the Owner table
            $owner = Owner::where('user_id', $id)->firstOrFail();
            
            $owner->name = $request->name;
            $owner->email = $request->email;
            $owner->password = Hash::make($request->password);
            $owner->tele_no = $request->tele_no;
            $owner->mob_no = $request->mob_no;
            $owner->school_name = $request->school_name;
            $owner->address = $request->address;
            $owner->description = $request->description;

            $image = $request->logo;
            if($image){
                if ($owner->logo) {
                    Storage::delete('owner' . $owner->logo);
                }
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->logo->move('owner',$imagename);
                $owner->logo = $imagename;
            }
    
            $owner->save();

            if(Auth::user()->role === 'owner'){
                return redirect()->back()
                     ->with('success', "Owner Updated Successfully!");
            }
            else{

                return redirect()->route('all_owner')
                        ->with('success', "Owner Updated Successfully!");
            }

    }
}

      // Delete Owner
    public function destroy_owner(string $id)
    {
    
        Owner::destroy($id);
        User::destroy($id);
    
        return redirect()->back()
                        ->with('status', "Owner Deleted Successfully!");
    }
}
