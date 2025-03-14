<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDriverTable(){
        $drivers = DB::table('users')->where('tem_carro', 1)->get();
        return view('dashboard_passageiro', compact('drivers'));
    }

    public function showPassengerTable(){
        $passengers = DB::table('users')->where('tem_carro', 0)->get();
        return view('dashboard_condutor', compact('passengers'));
    }
}
