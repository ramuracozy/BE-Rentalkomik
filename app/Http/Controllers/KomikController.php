<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use App\Http\Resources\KomikResource;
use Illuminate\Http\Request;
use App\Models\Komik;
use App\Service\KomikService;
use App\Traits\ApiResponse;

class KomikController extends Controller
{
    use ApiResponse;
    public function __construct(protected KomikService $komikService){}
    public function index()
    {
        return $this->success(KomikResource::collection($this->komikService->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKomikRequest $request)
    {
        $komik = Komik::create($request->validated());

        return $this->success(new KomikResource($komik), 'Komik berhasil ditambahkan', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->success(new KomikResource($this->komikService->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKomikRequest $request, string $id)
    {
        $komik = Komik::findorFail($id);
        $komik->update($request->validated());
        return $this->success(new KomikResource($komik), 'Komik berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Komik::findorFail($id)->delete();
        return $this->success(null, 'Komik berhasil dihapus');
    }
}
