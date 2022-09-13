<?php

namespace App\Jobs;

use App\Models\CryptoAsset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;

class GetCryptoAssetsJob implements ShouldQueue
{
    private int $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function handle()
    {
        $response = Http::withHeaders([
            "x-messari-api-key" => getenv('MESSARI_API_KEY')
        ])
            ->get(getenv('MESSARI_BASE_URL'), [
                'limit' => $this->limit
            ])->json();

        foreach ($response['data'] as $data){
            $fields = new CryptoAsset([
                'symbol' => $data['symbol'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'price_usd_pennies' => $data['metrics']['market_data']['price_usd'] * 1000,
                'current_market_cap' => $data['metrics']['marketcap']['current_marketcap_usd'] * 1000,
                'volume_last_day' => $data['metrics']['market_data']['volume_last_24_hours'] * 1000,
                'circulating_supply' => $data['metrics']['supply']['circulating'] * 1000,
                'change_last_hour' => $data['metrics']['market_data']['percent_change_usd_last_1_hour'] * 1000,
                'change_last_day' => $data['metrics']['market_data']['percent_change_usd_last_24_hours'] * 1000,
                'change_last_week' => null,
                'icon_path' => 'https://cryptoflash-icons-api.herokuapp.com/'.strtolower($data['symbol'])
            ]);
            $fields->save();
        }
    }
}
