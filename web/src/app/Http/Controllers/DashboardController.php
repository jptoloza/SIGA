<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //

    public function Index()
    {
        return view('dashboard', ['title' => 'dashboad']);
    }
}
