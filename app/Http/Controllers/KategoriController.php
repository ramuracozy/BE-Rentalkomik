<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return Kategori::all();
    }

    public function store(Request $request)
    {
        $Kategori = Kategori::create($request->all());
        return response()->json([
            'message' => 'Kategori created successfully',
            'data' => $Kategori
        ], 201);
    }

    public function show(string $id)
    {
        return Kategori::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->update($request->all());
        return response()->json([
            'message' => 'Kategori updated successfully',
            'data' => $Kategori
        ]);
    }

    public function destroy(string $id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->delete();
        return response()->json([
            'message' => 'Kategori deleted successfully'
        ]);
    }
}
