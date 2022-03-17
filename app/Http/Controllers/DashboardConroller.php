<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Customer;
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
        $approve_asset = Asset::where('status', false)->count();
        $approve_customer = Customer::where('status', false)->count();
        $approved_customer = Customer::where('status', true)->count();

        return view('dashboard.index', compact('kph', 'category', 'user', 'asset', 'approve_asset','approve_customer','approved_customer'));
    }
}