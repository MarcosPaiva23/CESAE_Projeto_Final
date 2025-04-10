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
        $matches = [];

        //get the user information
        $user = Auth::user();
        $userDiasViagem = DB::table('dias_viagem')->where('user_id', $user->id)->first();
        $userAvailableDays = [];


            if ($userDiasViagem->segunda == 1){
                $userAvailableDays[] = 'segunda';
            }
            if ($userDiasViagem->terca == 1){
                $userAvailableDays[] = 'terca';
            }
            if ($userDiasViagem->quarta == 1){
                $userAvailableDays[] = 'quarta';
            }
            if ($userDiasViagem->quinta == 1){
                $userAvailableDays[] = 'quinta';
            }
            if ($userDiasViagem->sexta == 1){
                $userAvailableDays[] = 'sexta';
            }


        //change the boolean horario to "Laboral" or "Pos-Laboral"
        foreach ($passengers as $passenger) {
            if ($passenger->horario == 0) {
                $passenger->horario = "Laboral";
            } else {
                $passenger->horario = "Pos-Laboral";
            }
            if ($passenger->id == DB::table('dias_viagem')->select('user_id')->where('user_id', $passenger->id)->first()->user_id) {
                $currentPassengerTable = DB::table('dias_viagem')->where('user_id', $passenger->id)->first();
                $compatibleDayPassengers = [];
                if ($currentPassengerTable->segunda == 1){
                    $compatibleDayPassengers[] = 'segunda';
                }
                if ($currentPassengerTable->terca == 1){
                    $compatibleDayPassengers[] = 'terca';
                }
                if ($currentPassengerTable->quarta == 1){
                    $compatibleDayPassengers[] = 'quarta';
                }
                if ($currentPassengerTable->quinta == 1){
                    $compatibleDayPassengers[] = 'quinta';
                }
                if ($currentPassengerTable->sexta == 1){
                    $compatibleDayPassengers[] = 'sexta';
                }
                if ($compatibleDayPassengers == $userAvailableDays) {
                    $matches[] = $passenger;
                }
            }
        }

        //get the user address
        $address = $user->morada;

        return view('dashboard_condutor', compact('matches','address'));
    }
}
