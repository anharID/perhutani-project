<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setting()
    {
        $user = auth()->user();
        return view('dashboard.settings.setting', compact('user'));
    }
}