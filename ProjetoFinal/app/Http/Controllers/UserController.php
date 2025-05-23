<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //return the register view
    public function viewRegister(){
        return view('auth.register');
    }

    //function to create a new user
    public function createUser(Request $request){

        //validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|regex:/@msft\.cesae\.pt$/',
            'password' => 'required|max:255',
            'course' => 'required|max:255',
            'completion_date' => 'required|date',
            'Schedule' => 'required|boolean',
            'have_car' => 'required|boolean',
            'Postcode_first4' => 'required|numeric|digits:4',
            'Postcode_last3' => 'required|numeric|digits:3',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'cb_accept' => 'required|accepted'
        ]);

        //create the variable for the photo
        $photo = null;

        //check if the request has a photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('user_images', 'public');
        }


        //combinate the first 4 digits with the last 3 digits of the postcode to search on the api
        $address = $request->Postcode_first4 . "-" . $request->Postcode_last3;


        // create the request to the api
        $response = Http::withHeaders([
            'User-Agent' => 'CesaeBoleias/1.0 (suporte.cesae.boleias@gmail.com)', // Substitua por um identificador válido
        ])->get('https://nominatim.openstreetmap.org/search', [
            'q' => $address,
            'format' => 'json',
        ]);

        // verify if the request was successful
        if ($response->successful()) {
            // decode the response to json
            $data = $response->json();

            // verify if the response has data
            if (!empty($data)) {
                // pick the first result
                $firstResult = $data[0];

                // change the post code to the coordinates (lon first because the api for the distance use it first)
                $address = $firstResult['lon'] . "," . $firstResult['lat'];

            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            // if the request fails return to the home page with an error message
            return redirect()->route('home')->with('error','Ocurreu um erro ao tentar validar o código postal. Error: ' . $response->status());
        }


        //create the data to store in the database
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'curso' => $request->course,
            'data_conclusao' => $request->completion_date,
            'horario' => $request->Schedule,
            'tem_carro' => $request->have_car,
            'morada' => $address,
            'created_at' => now(),
            'updated_at' => now()
        ];

        //add the photo if it exists
        if ($photo !== null) {
            $userData['foto'] = $photo;
        }

        //create the new user with user model
        $user = User::create($userData);

        //switch on of the checkbox for to boolean
        if ($request->monday == "on") {
            $request->monday = 1;
        }else{
            $request->monday = 0;
        }

        if ($request->tuesday == "on") {
            $request->tuesday = 1;
        }else{
            $request->tuesday = 0;
        }

        if ($request->wednesday == "on") {
            $request->wednesday = 1;
        }else{
            $request->wednesday = 0;
        }

        if ($request->thursday == "on") {
            $request->thursday = 1;
        }else{
            $request->thursday = 0;
        }

        if ($request->friday == "on") {
            $request->friday = 1;
        }else{
            $request->friday = 0;
        }

        //add days to the user in the days table
        DB::table('dias_viagem')->insert([
            'user_id' => $user->id,
            'segunda' => $request->monday,
            'terca' => $request->tuesday,
            'quarta' => $request->wednesday,
            'quinta' => $request->thursday,
            'sexta' => $request->friday
        ]);

        //send the email verification
        $user->sendEmailVerificationNotification();

        return redirect()->route('home')->with('message','Conta criada com sucesso. Verifique o seu e-mail para validar a conta.');

    }

    public function verifyUserEmail($id, $hash, Request $request){
        //find the user by id
        $user = User::find($id);


        // verify if the url has already expired
        if (!URL::hasValidSignature($request)) {
            if (sha1($user->email) === request('hash')) {

                return view('auth.expired_verification', compact('id', 'hash'));

            } else {

                return redirect()->route('home')->with('error', 'Ocurreu um erro na validação do email.');
            }

        }



        //check if the user hash is correct
        if (sha1($user->email) === request('hash')) {
            // changes the user email status to verifed
            $user->markEmailAsVerified();

            //save the user
            $user->save();

            return redirect()->route('login')->with('message','Conta verificada com sucesso.');
        } else {

            // redirect with error message if the hash isn't correct
            return redirect()->route('login')->with('error', 'Ocurreu um erro na validação do email.');
        }


    }

    public function verifyUserEmailResend(Request $request){

        $id = $request->id;
        $hash = $request->hash;

        //find the user by id
        $user = User::find($id);

        //check if the user hash is correct
        if (sha1($user->email) === request('hash')) {
            //send the email verification
            $user->sendEmailVerificationNotification();

            return back()->with('message','Email de verificação reenviado com sucesso.');
        } else {

            return back()->with('error','Ocurreu um erro ao tentar reenviar o email, porfavor contact o suport.');
        }

    }

    // Logout -  Encerra a sessão do utilizador atual e redireciona para a página inicial.

    public function logout() {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    }
}
