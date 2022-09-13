<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GetNewsService
{
    public function execute()
    {
        return Http::withHeaders([
            "x-messari-api-key" => "da4f3575-5df7-4d50-b518-be0a56f08516"
        ])
            ->get('https://data.messari.io/api/v1/news?',[
                'page' => 1,
                'limit' => 10
            ])->json();
    }
}
