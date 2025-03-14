<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDriverController extends Controller
{
    public function showDriverTable(){
        $drivers = DB::table('users')->where('tem_carro', 1)->get();
        return view('dashboard_passageiro', compact('drivers'));
    }
}
