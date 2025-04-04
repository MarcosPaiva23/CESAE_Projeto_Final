<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class DashboardDriverController extends Controller
{
    public function showDriverTable(){

        //get the users with no car
        $passengers = DB::table('users')->select('id','curso','data_conclusao','email','foto','horario','name','morada')->where('tem_carro', 0)->get();

        //change the boolean horario to "Laboral" or "Pos-Laboral"
        foreach ($passengers as $passenger) {
            if ($passenger->horario == 0) {
                $passenger->horario = "Laboral";
            } else {
                $passenger->horario = "Pos-Laboral";
            }
        }

        //get the user information
        $user = Auth::user();

        //get the user address
        $address = $user->morada;

        return view('dashboard_condutor', compact('passengers','address'));
    }
}
