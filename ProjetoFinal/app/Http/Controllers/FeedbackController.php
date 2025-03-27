<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
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
        // For admin backoffice - list all feedback
        $feedbacks = Feedback::paginate(10);
        return view('back_office.ver_feedback', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedback');
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



       DB::table('feedback')->insert([
        'user_id' => Auth::id(),
        'user_email' => Auth::user()->email,
        'comentario' => $request->comment,
        'assunto' => $request->subject,
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
        ->join('users', 'users.id', '=', 'feedback.user_id')
        ->where('feedback.id', $id)
        ->select('feedback.*', 'users.email as user_email')
        ->first();

        $feedback = Feedback::findOrFail($id);
        return view('back_office.ver_feedback_especifico', compact('feedback'));
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

        Feedback::destroy($id);
        return redirect()->route('back_office.ver_feedback')
             ->with('success', 'Feedback eliminado com sucesso');
    }

}
