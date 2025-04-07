<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

    $users = DB::table('users')->paginate(15);
    return view('back_office.admin_dashboard', compact('users'));

    }

    public function blockUserAccess($id){
        DB::table('users')->where('id', $id)->update(['is_blocked' => 1]);
        return back()->with('message','Conta bloqueada com sucesso.');
    }

    public function unblockUserAccess($id){
        DB::table('users')->where('id', $id)->update(['is_blocked' => 0]);
        return back()->with('message','Conta desbloqueada com sucesso.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('back_office.create_admin');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255'
        ]);

        //create the data to store in the database
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'curso' => "admin",
            'data_conclusao' => "2020-01-01",
            'horario' => 9,
            'tem_carro' => 9,
            'morada' => "admin",
            'created_at' => now(),
            'updated_at' => now()
        ];


        //create the new user with user model
        $user = User::create($userData);

        //send the email verification
        $user->sendEmailVerificationNotification();

        return back()->with('message','Conta criada com sucesso. Peça para que verifiquem o email antes de fazer login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
