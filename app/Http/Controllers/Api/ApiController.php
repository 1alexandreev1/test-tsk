<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getYandex(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'news' => [
                'data'
            ]
        ]);
    }

    public function getOzon(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'news' => [
                'data'
            ]
        ]);
    }
}
