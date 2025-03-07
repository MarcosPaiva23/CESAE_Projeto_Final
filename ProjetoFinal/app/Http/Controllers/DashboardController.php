<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showConductorTable(){
        $conductors = DB::table('users')->where('tem_carro', 1)->get();
        return view('dashboard_passageiro', compact('conductors'));
    }
}
