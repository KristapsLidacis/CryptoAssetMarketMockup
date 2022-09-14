<?php

namespace App\Services;

use App\Models\CryptoAsset;
use Illuminate\Database\Eloquent\Collection;

class GetCryptoAssetsService
{
    public function execute(): Collection
    {
        return CryptoAsset::all();
    }
}
