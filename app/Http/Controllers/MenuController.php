<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=DB::table('menus as mn')
                ->leftJoin('categories as ct', 'ct.id', '=', 'mn.category_id')
                ->select('mn.*','ct.name')
                ->get();

        $maxLength = 50;

        foreach ($menus as $menu) {
            if (strlen($menu->description) > $maxLength) {
                $menu->description = substr($menu->description, 0, $maxLength) . '...';
            }
        }
        
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('menu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ]);
        
        $image = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path = 'image-fd/' . $filename;
        
        Storage::disk('public')->put($path, file_get_contents($image));
        
        $menu = Menu::create([
            'names' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'category_id' => $request->category_id
        ]);
        
        return redirect()->route('menu.index')->with('msg', 'Added');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menus, string $id)
    {
        $data =$menus->find($id);
        return view('menu.edit')->with([
            'id' => $id,
            'names' => $data->names,
            'description' => $data->description,
            'image' => $data->image,
            'category_id' => $data->category_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $categories=Category::all();
        $menus=DB::table('menus as mn')
                ->leftJoin('categories as ct', 'ct.id', '=', 'mn.category_id')
                ->select('mn.*','ct.name')
                ->where('mn.id', $id)
                ->first();

        if (!$menus) {
            abort(404); // Tambahkan aksi sesuai kebutuhan jika data tidak ditemukan
        }

        return view('menu.edit', compact('menus', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ]);
        
        $menu = Menu::findOrFail($id); // Menemukan data menu berdasarkan ID
        
        $data = [
            'names' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id
        ];
        
        // Memproses update gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'image-fd/' . $filename;
        
            Storage::disk('public')->put($path, file_get_contents($image));
        
            // Menghapus gambar lama jika ingin mengganti gambar
            Storage::disk('public')->delete('image-fd/' . $menu->image);
        
            $data['image'] = $filename;
        }
        
        $menu->update($data); // Menyimpan perubahan pada data-menu yang telah diupdate
        
        return redirect()->route('menu.index')->with('msg', 'Updated');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu, string $id)
    {
        $data = $menu->find($id);
        $data -> delete();

        return redirect('menu')->with('msg', 'Deleted');
    }

    public function listDetail(Menu $menus){
        $categories = Category::with('menu')->get();
        return view('detail.index', compact('categories'));
    }
}
