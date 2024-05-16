<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function respond($data = null, $status = 200)
    {
        return $status === 204 ? response()->noContent() : response()->json($data, $status);
    }
}
