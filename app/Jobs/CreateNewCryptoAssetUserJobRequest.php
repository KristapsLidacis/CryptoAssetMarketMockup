<?php

namespace App\Jobs;

use App\Models\CryptoAsset;

class CreateNewCryptoAssetUserJobRequest
{
    private float $owned;
    private CryptoAsset $cryptoAsset;

    public function __construct(float $owned, CryptoAsset $cryptoAsset)
    {
        $this->owned = $owned;
        $this->cryptoAsset = $cryptoAsset;
    }

    public function getCryptoAsset(): CryptoAsset
    {
        return $this->cryptoAsset;
    }

    public function getOwned(): float
    {
        return $this->owned;
    }
}
