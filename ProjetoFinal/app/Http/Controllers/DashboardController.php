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

        // the final array where gona put the users to send to page
        $drivers = [];

        //get the users with cars
        $driversTemp = DB::table('users')->select('id','curso','data_conclusao','email','foto','horario','name','morada')->where('tem_carro', 1)->get();

        //get the user information
        $user = Auth::user();

        //get the user days
        $userDays = DB::table('dias_viagem')->where('user_id',$user->id)->first();

        //get the days
        $days = DB::table('dias_viagem');

        // make the wheres necessary to return only the needed users
        if ($userDays->segunda == 1){
            $days = $days->where('segunda',1);
        }
        if ($userDays->terca == 1){
            $days = $days->where('terca',1);
        }
        if ($userDays->quarta == 1){
            $days = $days->where('quarta',1);
        }
        if ($userDays->quinta == 1){
            $days = $days->where('quinta',1);
        }
        if ($userDays->sexta == 1){
            $days = $days->where('sexta',1);
        }
        $days = $days->get();

        // pick the required users to send to the page
        foreach ($driversTemp as $driver) {

            if ($driver->horario == $user->horario){

                foreach ($days as $day){
                    if ($driver->id == $day->user_id){
                        $drivers[] = $driver;
                    }
                }

            }
        }

        //get the user address
        $address = $user->morada;

        return view('dashboard_passageiro', compact('drivers', 'address'));
    }
}
