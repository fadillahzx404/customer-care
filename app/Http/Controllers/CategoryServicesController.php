<?php

namespace App\Http\Controllers;

use App\Models\CategoryServices;
use Illuminate\Http\Request;

class CategoryServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = CategoryServices::all();
        return view('category_services.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        CategoryServices::create($data);

        return redirect()
            ->route('category-services.index')
            ->with('Success', 'Kategori Servis Baru Ditambahkan !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryServices $categoryServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryServices $categoryServices, $id)
    {
        $data = CategoryServices::findOrFail($id);
        return view('category_services.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryServices $categoryServices, $id)
    {
        $data = $request->all();

        $item = CategoryServices::findOrFail($id);

        $item->update($data);

        return redirect()
            ->route('category-services.index')
            ->with('Success', 'Kategori Services Telah Di Update !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryServices $categoryServices, $id)
    {
        $item = CategoryServices::findOrFail($id);

        $item->delete();

        return redirect()
            ->route('category-services.index')
            ->with('Success', 'Kategori Servis Telah Dihapus !!');
    }
}
