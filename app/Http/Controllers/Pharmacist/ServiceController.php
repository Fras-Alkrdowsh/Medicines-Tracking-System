<?php

namespace App\Http\Controllers\Pharmacist;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Service\ServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('pharmacist_id', Auth::user()->id)->get();
        return view('pharmacist.Services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacist.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        DB::beginTransaction();

        try {

            $services = new Service();
            $services->name = $request->name;
            $services->description = $request->description;
            $services->type = $request->type;
            $services->price = $request->price;
            $services->status = 'enable';
            $services->pharmacist_id = Auth::user()->id;
            $services->save();

        
            DB::commit();
            session()->flash('add');
            return redirect()->route('pharmacist.Service.index');
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
        $service = Service::where('id', $id)->first();
        return view('pharmacist.Services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        DB::beginTransaction();

        try {

            $service = Service::findorfail($id);

            $service->name = $request->name;
            $service->description = $request->description;
            $service->type = $request->type;
            $service->price = $request->price;
            $service->save();          

            DB::commit();
            session()->flash('edit');
            return redirect()->route('pharmacist.Service.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Service::where('id', $id)->delete();
        return redirect()->route('pharmacist.Service.index')->with('success', 'data deleted successfully');
    }

    public function update_status(Request $request)
    {
        try {
            $service=Service::where('id',$request->id)->first();
            $service->update([
                'status'=>$request->status
            ]);

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
