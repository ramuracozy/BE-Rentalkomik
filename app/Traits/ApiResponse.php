<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success(mixed $data = null, string $message = 'Berhasil', int $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function error(string $message = 'Terjadi kesalahan', int $status = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $status);
    }
}
