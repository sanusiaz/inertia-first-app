<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login');
    }

    public function login(Request $request)
    {
        // validate Request
        $request->validate([
            'password' => 'string|max:255|required',
            'email' => 'email|required'
        ]);
        $user = User::where('email', $request->email)->first();
        if ( $user !== null ) {


            if ( Hash::check($request->password, $user->password) ) {

                auth()->attempt($request->only('email', 'password'));

                Session::flash('success', 'Welcome Back ' . $user->name);

                return redirect()
                    ->route('posts.index');
            }
            else {
                Session::flash('error', 'Invalid User');
            }
        }
        else {
            Session::flash('error', 'Account Not Found');
        }

        return redirect()
                    ->route('user.login');
    }
}
