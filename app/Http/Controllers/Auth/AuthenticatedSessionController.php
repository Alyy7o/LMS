<?php

namespace App\Http\Controllers\Auth;

use App\Models\Owner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // super admin
            if( $user->role === 'super_admin'){
                    return redirect('index');
                }

                // owner
                else if( $user->role === 'owner'){

                    $owner = Owner::where('user_id', $user->id)->first();

                    // Check if owner is active
                    if ($owner && $owner->status !== 'active') {
                        Auth::logout();
                        return redirect('/login')->with('error', 'Your account is inactive. Please contact support.');
                    }
                    else
                    {

                        return redirect('all_admin');
                    }
   
                }
                
                // admin
                else if( $user->role === 'admin'){
                    return redirect('student');
                }
                
                // else if($request->user()->role === 'teacher'){
                //     return redirect('teacher');
                // }
                // else if($request->user()->role === 'parent'){
                //     return redirect('parent');
                // }
                // else if($request->user()->role === 'student'){
                //     return redirect('student');
                // }
                else {
                   // return redirect()->intended(route('dashboard'));
                    // session()->flash('error', 'User not found or credentials do not match.');
                    // return redirect()->back();
                    return redirect('/welcome')->with('error', 'Unauthorized access.');
                }
            } 
                
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        

    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
