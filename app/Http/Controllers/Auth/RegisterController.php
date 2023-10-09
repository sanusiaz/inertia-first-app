<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Register');
    }

    public function register( Request $request )
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required'
        ]);

        User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password )
        ] );

        Session::flash('success', 'User has been created successfully');

        return redirect()
            ->route('user.login');


    }
}
