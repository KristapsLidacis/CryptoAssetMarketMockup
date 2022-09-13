<?php

namespace App\Console\Commands;

use App\Jobs\UpdateCryptoAssetsTableJob;
use Psy\Command\Command;

class  UpdateCryptoAssetsTableCommand extends Command
{
    protected $signature = 'cryptoAssets:update';
    protected $description = 'Updates all existing entries in CryptoAssets table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        dispatch(new UpdateCryptoAssetsTableJob());

        return 0;
    }
}
