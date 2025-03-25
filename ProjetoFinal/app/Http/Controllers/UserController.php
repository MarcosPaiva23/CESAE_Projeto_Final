<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'email' => 'required|email|max:255|unique:users',
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
        if($request->hasFile('photo')){
            $photo = Storage::putFile('user_images', $request->photo);
        }

        //combinate the first 4 digits with the last 3 digits of the postcode to store in the database
        $address = $request->Postcode_first4 . $request->Postcode_last3;


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

        return redirect()->route('login')->with('message','Conta criada com sucesso. Verifique o seu e-mail para validar a conta.');

    }

    public function verifyUserEmail($id, $hash, Request $request){
        //find the user by id
        $user = User::find($id);


        // verify if the url has already expired
        if (!URL::hasValidSignature($request)) {
            if (sha1($user->email) === request('hash')) {

                return view('auth.expired_verification', compact('id', 'hash'));

            } else {

                return redirect()->route('login')->with('error', 'Ocurreu um erro na validação do email.');
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

}
