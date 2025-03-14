<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = DB::table('feedback')->get();
        // $feedbacks = $this->getAllFeedbacks();
        return view('feedback', compact ('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:100',
            'comment' => 'required|string|max:255',
        ]);

    //    Feedback::create([
    //     'user_id' => Auth::id(),
    //     'user_email' => Auth::user()->email,
    //     'comment' => $request -> comment,
    //     'subject' => $request -> subject,

    //    ]);

       DB::table('feedback')->insert([
        'user_id' => Auth::id(),
        'user_email' => Auth::user()->email,
        'comment' => $request->comment,
        'subject' => $request->subject,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

        return redirect()->route('feedback')->with('success', 'Feedback enviado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feedback = DB::table('feedback')
        ->join('users', 'users_id', '=', 'feedback.user_id')
        ->where('feedback.id', $id)
        ->select('feedback.*', 'users.email as user_email')
        ->first();

        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
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
    public function destroy($id)
    {
        DB::table('feedback')
        ->where('id', $id)
        ->delete();

        return redirect()->route('feedback')->with('success', 'Feedback apagado com sucesso');
    }
}
