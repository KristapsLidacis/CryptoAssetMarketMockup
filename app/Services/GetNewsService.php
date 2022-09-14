<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GetNewsService
{
    public function execute()
    {

        $response = Http::get('https://newsapi.org/v2/everything?q=bitcoin&sortBy=popularity&apiKey='.getenv('NEWS_API_KEY'));
        return json_decode($response);

    }
}
