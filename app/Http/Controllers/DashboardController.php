<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function deportes()
    {
        return view('dashboard.deportes');
    }
    
    public function estadios()
    {
        return view('dashboard.estadios');
    }

}
