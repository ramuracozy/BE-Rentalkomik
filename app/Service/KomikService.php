<?php

namespace App\Service;
use App\Models\Komik;

class KomikService 
{
    public function getAll()
    {
        return Komik::with('kategori')->get();
    }

    public function getById($id)
    {
        return Komik::with('kategori')->findOrFail($id);
    }

    public function store(array $data): Komik
    {
        return Komik::create($data)->refresh()->load('kategori');
    }
}