<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function __construct()
    {
        //
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

       if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email'));
    }

    /**
     * Authenticate and authorize admin login.
     * 
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function validateLogin(Request $request) 
    {
        //Validate user info
        $credentials = $request->validate([
            'email' => 'required|email|exists:site_admin,email',
            'password' => 'required|string|min:5|max:30',
        ]);


        //Get login data
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = true;

        //dd([$email, $password, $remember]);
        
        if (Auth::guard('admin')->attempt(['email' =>$email , 'password' => $password, 'IsActive'=>1], $remember)) {
            //Set login session
            $request->session()->regenerate();

            //Update last login
            $accQuery = Admin::where('email', $email)
                        ->update([
                            'last_login'=>date('M d, Y h:i a')
                        ]);
            
            //Redirect to dashboard
            return redirect()->intended(route('admin.dashboard'));
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login');
        session()->flush();

    }
}
