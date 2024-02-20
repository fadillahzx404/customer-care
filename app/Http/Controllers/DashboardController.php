<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Support;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles !== 'USER') {
            $data = Support::all();
        } else {
            $data = Support::where('users_id', Auth::user()->id)->get();
        }

        return view('dashboard', ['data' => $data]);
    }
}
