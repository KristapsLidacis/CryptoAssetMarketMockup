<?php

namespace App\Services;

class GetCryptoAssetsUserService
{
    public function execute()
    {
        return [auth()->user()->cryptoAssets()->get()];
    }
}
