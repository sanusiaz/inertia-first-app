<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function __invoke()
    {

        Session::flash('error', 'You are logged out');
        auth()->logout();

        return redirect()
            ->route('user.login');
    }
}
