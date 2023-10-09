<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return Inertia::render('ForgetPassword');
    }
}
