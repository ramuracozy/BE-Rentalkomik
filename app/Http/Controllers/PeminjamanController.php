<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use App\Models\Peminjaman;
use App\Services\PeminjamanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function __construct(protected PeminjamanService $peminjamanService){}

    public function store(Request $request)
    {
        $data = $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'komik_id' => 'required|exists:komiks,id',
            'tanggal_pinjam' => 'required|date',
        ]);

       $komik = Komik::findOrFail($data['komik_id']);

        if ($komik->stok < 1) {
            throw new \Exception('Stok komik habis');
        }

        $peminjaman = DB::transaction(function () use ($data, $komik) {
            $peminjaman = Peminjaman::create([
                'anggota_id' => $data['anggota_id'],
                'komik_id' => $data['komik_id'],
                'tanggal_pinjam' => $data['tanggal_pinjam'],
                'status' => 'dipinjam',
            ]);

            $komik->decrement('stok');

            return $peminjaman;
        });

        return response()->json($peminjaman->fresh(), 201);
    
    }
}
