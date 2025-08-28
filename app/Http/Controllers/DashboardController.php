<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();

        $token = $request->session()->get('api_token');
        return view('dashboard.dashboard', compact('user', 'token'));
    }
}
