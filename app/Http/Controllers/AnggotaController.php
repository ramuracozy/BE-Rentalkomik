<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * menampilkan data semua anggota.
     */
    public function index()
    {
        return Anggota::all();
    }

    /**
     * menambahkan anggota baru ke dalam database.
     */
    public function store(Request $request)
    {
        $anggota = Anggota::create($request->all());
        return response()->json([
            'message' => 'Anggota berhasil ditambahkan',
            'data' => $anggota
        ], 201);
    }

    /**
     * menampilkan data anggota berdasarkan ID.
     */
    public function show(string $id)
    {
        return Anggota::findOrFail($id);
    }

    /**
     * memperbarui data anggota berdasarkan ID.
     */
    public function update(Request $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());
        return response()->json([
            'message' => 'Anggota berhasil diperbarui',
            'data' => $anggota
        ]);
    }

    /**
     * menghapus data anggota berdasarkan ID.
     */
    public function destroy(string $id)
    {
         Anggota::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Anggota berhasil dihapus'
        ]);
    }
}
