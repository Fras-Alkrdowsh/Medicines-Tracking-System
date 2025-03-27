<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Models\Pharmacist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\MessageJob;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where(
            'receiveable_type',  'App\Models\Admin',
        )->get();
        return view('admin.Messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $pharmacists = Pharmacist::all();
        return view('admin.Messages.create', compact('users', 'pharmacists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        //  $request->validate([
        //     'recipients' => 'required|array',
        //     'subject' => 'required|string',
        //     'message' => 'required|string',
        //     'sender_type' => 'required|string', // نوع المرسل
        //     'sender_id' => 'required|integer', // معرف المرسل
        // ]);

        dispatch(new MessageJob($request->recipients, $request->subject, $request->message, $request->reseive_type));
        session()->flash('add');

        return redirect()->back();
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
