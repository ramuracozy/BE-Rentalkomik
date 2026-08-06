<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Resources\AnggotaResource;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * menampilkan data semua anggota.
     */
    public function index()
    {
        return AnggotaResource::collection(Anggota::all());
    }

    /**
     * menambahkan anggota baru ke dalam database.
     */
    public function store(StoreAnggotaRequest $request)
    {
        $anggota = Anggota::create($request->validated());
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
        return new AnggotaResource(Anggota::findOrFail($id));
    }

    /**
     * memperbarui data anggota berdasarkan ID.
     */
    public function update(UpdateAnggotaRequest $request, string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->validated());
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
        Anggota::findorFail($id)->delete();
        return response()->json([
            'message' => 'Anggota berhasil dihapus'
        ]);
    }
}
