<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=DB::table('categories as ct') 
                        ->select('ct.*')
                        ->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);
        
        Category::create($validated);

        return redirect()->route('category.index')->with('msg', 'Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories, string $id)
    {
        $data =$categories->find($id);
        return view('category.edit')->with([
            'id' => $id,
            'name' => $data->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=DB::table('categories as ct') 
                        ->select('ct.*')
                        ->where('ct.id', $id)
                        ->first();
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        
        $category = Category::findOrFail($id);
        $category->update($validated);
        
        return redirect()->route('category.index')->with('msg', 'Updated');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, String $id)
    {
        $data = $category->find($id);
        $data -> delete();

        return redirect('category')->with('msg', 'Deleted');
    }
}
