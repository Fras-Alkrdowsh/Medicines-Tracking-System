<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where([['receiveable_type','App\Models\User'],['receiveable_id',Auth::user()->id]])->get();
        return view('Messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Messages.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $messages = new Message();
            $messages->subject = $request->subject;
            $messages->message = $request->message;
            $messages->receiveable_type ='App\Models\Admin' ;
            $messages->receiveable_id = 1;
            $messages->sendable_type = 'App\Models\User';
            $messages->sendable_id = Auth::user()->id;
            $messages->save();

           DB::commit();
            session()->flash('add');
            return redirect()->route('Messages.create');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      
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
