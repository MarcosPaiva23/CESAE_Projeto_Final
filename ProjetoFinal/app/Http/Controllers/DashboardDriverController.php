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

        $allPassengers = DB::table('users')->where('tem_carro', 0)->get();



        $user = Auth::user();

        $passengers = $this->calcKms($allPassengers, $user);

        return view('dashboard_condutor', compact('passengers'));
    }

    public function calcKms($allPassengers, $user){

        $newPassengers = [];

        foreach ($allPassengers as $passenger) {


            if ($passenger->tem_carro == 0) {

                // create the request to the api
                $response = Http::withHeaders([
                    'User-Agent' => 'CesaeBoleias/1.0 (suporte.cesae.boleias@gmail.com)', // Substitua por um identificador válido
                    ])->get('https://api.openrouteservice.org/v2/directions/driving-car', [
                        'api_key' => '5b3ce3597851110001cf6248d912628112de46d4811d7bf0b2847d74',
                        'start' => $passenger->morada,
                        'end' => $user->morada,
                    ]);

                    sleep(1);

                // verify if the request was successful
                if ($response->successful()) {
                    // decode the response to json
                    $data = $response->json();

                    // verify if the response has data
                    if (!empty($data)) {

                        if (empty($data["features"][0]["properties"]["summary"]["distance"])){
                            $distance = 0;
                        }else {
                            $distance = $data["features"][0]["properties"]["summary"]["distance"];
                        }



                        if ($distance <= 5000){
                            $passenger->distance = $distance;
                            array_push($newPassengers,$passenger);
                        }

                    } else {
                        dd("Nenhum resultado encontrado.");
                    }
                } else {
                    // if the request fails return to the home page with an error message
                    return redirect()->route('home')->with('error','Ocurreu um erro ao tentar validar o código postal. Error: ' . $response->status());
                }

            }

        }



        return $newPassengers;

    }
}
