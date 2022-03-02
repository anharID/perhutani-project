<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Kph;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardConroller extends Controller
{
    public function index()
    {
        $kph = Kph::count();
        $category = Category::count();
        $user = User::count();
        $asset = Asset::count();
        $approve = Asset::where('status', false)->count();
        return view('dashboard.index', compact('kph', 'category', 'user', 'asset', 'approve'));
    }
}