<?php

namespace App\Http\Helpers;

class ApiResponse
{
    static function senResponse($code = 200, $msg = null, $data = null)
    {
        $response = [
            'status' => $code,
            'msg' => $msg,
            'data' => $data,
        ];

        return response()->json($response, $code);
    }
}
