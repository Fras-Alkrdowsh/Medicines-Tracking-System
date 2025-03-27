<?php

namespace App\Http\Controllers\Pharmacist;

use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;


class CategoryController extends Controller
{
    use  UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('pharmacist_id', Auth::user()->id)->get();
        return view('pharmacist.Categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pharmacist.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {

            $categories = new Category();
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->pharmacist_id = Auth::user()->id;
            $categories->save();

            //Upload img
            $this->verifyAndStoreImage($request, 'category_image', 'categories', 'upload_image', $categories->id, 'App\Models\Category');

            DB::commit();
            session()->flash('add');
            return redirect()->route('pharmacist.Category.index');
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
        $medicines = Category::findOrFail($id)->medicines;

        $category = Category::where('id', $id)->first();
        return view('pharmacist.Categories.show', compact('category'), compact('medicines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        return view('pharmacist.Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {

            $category = Category::findorfail($id);

            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            // update photo
            if ($request->has('category_image')) {
                // Delete old photo
                if ($category->image) {
                    $old_img = $category->image->path;
                    $this->Delete_attachment('upload_image', 'categories/' . $old_img, $id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'category_image', 'categories', 'upload_image', $category->id, 'App\Models\Category');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('pharmacist.Category.index');
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

            $this->Delete_attachment('upload_image', 'categories/' . $request->image, $id, $request->image);
        }
        Category::where('id', $id)->delete();
        session()->flash('delete');

        return redirect()->route('pharmacist.Category.index')->with('success', 'data deleted successfully');
    }
}
