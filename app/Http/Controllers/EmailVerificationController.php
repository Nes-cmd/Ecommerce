<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function notice()
    {
        return view('auth.verify-email');
    }
    public function sendEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/dashboard');
    }
}
