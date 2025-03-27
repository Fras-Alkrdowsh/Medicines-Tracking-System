<?php

namespace App\Http\Controllers\Pharmacist;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where([['receiveable_type','App\Models\Pharmacist'],['receiveable_id',Auth::user()->id]])->get();
        return view('pharmacist.Messages.index', compact('messages'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacist.Messages.create');

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
            $messages->sendable_type = 'App\Models\Pharmacist';
            $messages->sendable_id = Auth::user()->id;
            $messages->save();

           DB::commit();
            session()->flash('add');
            return redirect()->route('pharmacist.Messages.create');
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
