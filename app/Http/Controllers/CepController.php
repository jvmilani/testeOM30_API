<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CepController extends Controller
{
     
    public function show($id)
    {
        $result = Redis::get($id);

        if (!$result) {
            $response = Http::get("https://viacep.com.br/ws/$id/json/");
            $result = $response->getBody()->getContents();
            Redis::set($id, $result, 'EX', 3600);
        }

        return response()->json(json_decode($result));
    }

}
