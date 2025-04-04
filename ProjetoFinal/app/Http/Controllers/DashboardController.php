<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function showPassengerTable(){

        //get the users with cars
        $drivers = DB::table('users')->select('id','curso','data_conclusao','email','foto','horario','name','morada')->where('tem_carro', 1)->get();

        //change the boolean horario to "Laboral" or "Pos-Laboral"
        foreach ($drivers as $driver) {
            if ($driver->horario == 0) {
                $driver->horario = "Laboral";
            } else {
                $driver->horario = "Pos-Laboral";
            }
        }

        //get the user information
        $user = Auth::user();

        //get the user address
        $address = $user->morada;

        return view('dashboard_passageiro', compact('drivers', 'address'));
    }
}
