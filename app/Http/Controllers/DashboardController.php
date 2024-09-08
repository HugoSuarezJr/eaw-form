<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the Dashboard.
     */
    public function show()
    {
        return view('dashboard');
    }
}
