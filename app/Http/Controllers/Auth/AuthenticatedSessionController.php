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


                        if ($owner) {
                            if ($owner->status === 'active' && $owner->activated_at && now()->diffInDays($owner->activated_at) >= 30) {
                                // Inactivate the owner after 30 days
                                $owner->status = 'inactive';
                                $owner->save();

                                Auth::logout();
                                return redirect('/login')->with('error', 'Your account has been deactivated after 30 days of activity.');
                            }
                        
                            if ($owner->status !== 'active') {
                                Auth::logout();
                                return redirect('/login')->with('error', 'Your account is inactive. Please contact support.');
                            }
                        }

                        return redirect('all_admin');
   
                }
                
                // admin
                else if( $user->role === 'admin'){
                    return redirect('student');
                }
                
                // teacher
                else if($request->user()->role === 'teacher'){
                    return redirect('parent');
                }
                
                else if($request->user()->role === 'parent'){
                    return redirect('parent_welcome');
                }

                // else if($request->user()->role === 'student'){
                //     return redirect('student');
                // }
                else {
                  
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
