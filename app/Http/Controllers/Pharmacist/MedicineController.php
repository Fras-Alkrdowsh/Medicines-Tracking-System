<?php

namespace App\Http\Controllers\Pharmacist;

use App\Models\Category;
use App\Models\Medicine;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Medicine\MedicineRequest;
use App\Http\Requests\Medicine\UpdateMedicineRequest;

class MedicineController extends Controller
{
    use  UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines=Medicine::where('pharmacist_id', Auth::user()->id)->with('category')->get();
        return view('pharmacist.Medicines.index', compact('medicines'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('pharmacist_id', Auth::user()->id)->get();
        return view('pharmacist.Medicines.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineRequest $request)
    {
        DB::beginTransaction();

        try {

            $medicines = new Medicine();
            $medicines->name = $request->name;
            $medicines->description = $request->description;
            $medicines->expirationDate = $request->expirationDate;
            $medicines->quantity = $request->quantity;
            $medicines->category_id = $request->category_id;
            $medicines->pharmacist_id = Auth::user()->id;
            $medicines->save();

            //Upload img
            $this->verifyAndStoreImage($request, 'medicine_image', 'medicines', 'upload_image', $medicines->id, 'App\Models\Medicine');

            DB::commit();
            session()->flash('add');
            return redirect()->route('pharmacist.Medicine.index');
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
        $category = Medicine::findOrFail($id)->category;
        $medicine = Medicine::with('alternatives')->findOrFail($id);
        return view('pharmacist.Medicines.show', compact('category', 'medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicine=Medicine::where('id', $id)->first();
        $categories = Category::where('pharmacist_id', Auth::user()->id)->get();
        return view('pharmacist.Medicines.edit',compact('categories'),compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, string $id)
    {
        DB::beginTransaction();

        try {

            $medicine = Medicine::findorfail($id);

            $medicine->name = $request->name;
            $medicine->description = $request->description;
            $medicine->expirationDate = $request->expirationDate;
            $medicine->quantity = $request->quantity;
            $medicine->category_id = $request->category_id;
            $medicine->save();

            // update photo
            if ($request->has('medicine_image')) {
                // Delete old photo
                if ($medicine->image) {
                    $old_img = $medicine->image->path;
                    $this->Delete_attachment('upload_image', 'medicines/' . $old_img, $id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'medicine_image', 'medicines', 'upload_image', $medicine->id, 'App\Models\Medicine');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('pharmacist.Medicine.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->image) {

            $this->Delete_attachment('upload_image', 'medicines/' . $request->image, $id, $request->image);
        }
        Medicine::where('id', $id)->delete();
        session()->flash('delete');
        return redirect()->route('pharmacist.Medicine.index')->with('success', 'data deleted successfully');
    }

    public function assignAlternatives()
    {
        $medicines = Medicine::where('pharmacist_id',Auth::user()->id)->get();
        return view('pharmacist.Medicines.assign-alternatives', compact('medicines'));
    }

    public function storeAlternatives(Request $request)
    {
        $request->validate([
            'drug_id' => 'required|exists:medicines,id',
            'alternatives' => 'nullable|array',
            'alternatives.*' => 'exists:medicines,id',
        ]);

        $drug = Medicine::findOrFail($request->drug_id);
        if ($request->has('alternatives')) {
            $drug->alternatives()->sync($request->alternatives);
        } else {
            $drug->alternatives()->detach();
        }
        session()->flash('add');

        return redirect()->route('pharmacist.Medicine.index')->with('success', 'Alternatives assigned successfully.');
    }
}
