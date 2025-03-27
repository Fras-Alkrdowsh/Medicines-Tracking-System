<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pharmacist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\PharmacistStatusChanged;
use App\Http\Requests\Pharmacist\PharmacyRequest;
use App\Http\Requests\Pharmacist\UpdatePharmacyRequest;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacies = Pharmacist::all();
        return view('admin.pharmacies.index', compact('pharmacies'));
    }
    public function disable_pharmacy()
    {
        $pharmacies = Pharmacist::where('status','disable')->get();
        return view('admin.pharmacies.disable_pharmacy', compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pharmacies.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PharmacyRequest $request)
    {
        DB::beginTransaction();

        try {
         
            Pharmacist::create([
                
                'name' => $request->name,
                'email' => $request->email,
                'Phone' => $request->Phone,
                'password' => Hash::make($request->Phone),
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'status' => 'enable',
                'certificateId' => $request->certificateId,

            ]);


            DB::commit();
            session()->flash('add');

            return redirect()->route('admin.Pharmacies.index')->with('success', 'data added successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'something went wrong');
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
        $pharmacy=Pharmacist::where('id',$id)->first();
        return view('admin.pharmacies.edit',compact('pharmacy'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePharmacyRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
        Pharmacist::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'Phone' => $request->Phone,
            'password' => Hash::make($request->Phone),
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 'enable',
            'certificateId' => $request->certificateId,
        ]);
        
        DB::commit();
        session()->flash('edit');

        return redirect()->route('admin.Pharmacies.index')->with('success', 'data updated successfully');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->with('error', 'something went wrong');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pharmacist::where('id', $id)->delete();
        session()->flash('delete');

        return redirect()->route('admin.Pharmacies.index')->with('success', 'data deleted successfully');

    }
    public function update_status(Request $request)
    {
        try {
            $pharmacy=Pharmacist::where('id',$request->id)->first();
            $pharmacy->update([
                'status'=>$request->status
            ]);
            event(new PharmacistStatusChanged($pharmacy));

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_password(Request $request)
    {
        try {
            $doctor = Pharmacist::findorfail($request->id);
            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
