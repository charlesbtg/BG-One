<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController
{
    public function __invoke(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
