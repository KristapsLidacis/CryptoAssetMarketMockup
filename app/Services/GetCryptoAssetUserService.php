<?php

namespace App\Services;

class GetCryptoAssetUserService
{
    public function execute()
    {
        return [auth()->user()->cryptoAssets()];
    }
}
