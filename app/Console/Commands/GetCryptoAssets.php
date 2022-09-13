<?php

namespace App\Console\Commands;

use App\Jobs\GetCryptoAssetsJob;
use Illuminate\Console\Command;

class GetCryptoAssets extends Command
{
    protected $signature = 'cryptoAssets:store {limit}';
    protected $description = 'Stores for first time Crypto assets in crypto_assets table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        dispatch(new GetCryptoAssetsJob(
            $this->argument('limit'),
        ));

        return 0;
    }
}
