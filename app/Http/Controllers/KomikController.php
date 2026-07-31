<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;

class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Komik::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $komik = Komik::create($request->all());
        return response()->json($komik, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komik = Komik::findorFail($id);
        return response()->json($komik);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komik = Komik::findorFail($id);
        $komik->update($request->all());
        return response()->json($komik);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komik = Komik::findorFail($id);
        $komik->delete();
        return response()->json(null, 204);
    }
}
