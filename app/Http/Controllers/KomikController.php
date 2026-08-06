<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return KomikResource::collection(Komik::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKomikRequest $request)
    {
        $komik = Komik::create($request->validated());

        return response()->json([
            'message' => 'Komik berhasil ditambahkan',
            'data' => new KomikResource($komik)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new KomikResource(Komik::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomikRequest $request, string $id)
    {
        $komik = Komik::findorFail($id);
        $komik->update($request->validated());
        return response()->json([
            'message' => 'Komik berhasil diperbarui',
            'data' => new KomikResource($komik)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Komik::findorFail($id)->delete();
        return response()->json([
            'message' => 'Komik berhasil dihapus'
        ], 200);
    }
}
