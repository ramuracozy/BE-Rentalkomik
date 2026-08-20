<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success($data, string $message = 'Berhasil', int $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error(string $message = 'Terjadi kesalahan', int $code = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}
