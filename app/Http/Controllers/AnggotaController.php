<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Resources\AnggotaResource;
use App\Models\Anggota;
use App\Services\AnggotaService;
use App\Traits\ApiResponse;

class AnggotaController extends Controller
{

    use ApiResponse;

    public function __construct(protected AnggotaService $anggotaService) {}
    
    /**
     * menampilkan data semua anggota.
     */
    public function index()
    {
        $anggota = $this->anggotaService->index();
        return $this->success(
            AnggotaResource::collection($anggota),'Daftar anggota berhasil diambil.'
        );
    }

    /**
     * menambahkan anggota baru ke dalam database.
     */
    public function store(StoreAnggotaRequest $request)
    {
        $anggota = $this->anggotaService->store($request->validated());
        return $this->success(new AnggotaResource($anggota), 'Anggota berhasil ditamba
        hkan.', 201);
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
