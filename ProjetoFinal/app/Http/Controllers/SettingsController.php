<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        $userDays = DB::table('dias_viagem')
            ->where('user_id', $userId)
            ->first();

        $daysArray = [];
        if ($userDays) {
            foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta'] as $day) {
                if ($userDays->$day) {
                    $daysArray[] = array_search($day, ['segunda', 'terca', 'quarta', 'quinta', 'sexta']) + 1;
                }
            }
        }

        return view('home', [
            'userDays' => $daysArray
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $userId = auth()->id();
        $selectedDays = $request->input('dias', []);

        // Prepare data for insert/update
        $data = [
            'segunda' => isset($selectedDays['segunda']) ? 1 : 0,
            'terca' => isset($selectedDays['terca']) ? 1 : 0,
            'quarta' => isset($selectedDays['quarta']) ? 1 : 0,
            'quinta' => isset($selectedDays['quinta']) ? 1 : 0,
            'sexta' => isset($selectedDays['sexta']) ? 1 : 0,
        ];

        // Check if record exists
        $exists = DB::table('dias_viagem')->where('user_id', $userId)->exists();

        if ($exists) {
            // Update existing record
            DB::table('dias_viagem')
                ->where('user_id', $userId)
                ->update($data);
        } else {
            // Insert new record
            $data['user_id'] = $userId;
            DB::table('dias_viagem')->insert($data);
        }

        return back()->with('success', 'Definições atualizadas com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
