<?php

namespace App\Jobs;

use App\Models\CryptoAsset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class UpdateCryptoAssetsTableJob implements ShouldQueue
{
    use Dispatchable;
    public function handle()
    {
        $limit = CryptoAsset::all();
        $response = Http::withHeaders([
            "x-messari-api-key" => getenv('MESSARI_API_KEY')
        ])
            ->get(getenv('MESSARI_BASE_URL'), [
                'limit' => count($limit)
            ])->json();

        foreach ($response['data'] as $data){
            CryptoAsset::where('symbol', $data['symbol'])->
            update([
                'price_usd_pennies' => $data['metrics']['market_data']['price_usd'] * 100000,
                'current_market_cap' => $data['metrics']['marketcap']['current_marketcap_usd'] * 100000,
                'volume_last_day' => $data['metrics']['market_data']['volume_last_24_hours'] * 100000,
                'circulating_supply' => $data['metrics']['supply']['circulating'] * 1000,
                'change_last_hour' => $data['metrics']['market_data']['percent_change_usd_last_1_hour'] * 100000,
                'change_last_day' => $data['metrics']['market_data']['percent_change_usd_last_24_hours'] * 100000,
                'change_last_week' => null
            ]);
        }
        echo 'done';
    }
}
