<?php

namespace App\Services;

use App\Models\CryptoAsset;
use Illuminate\Database\Eloquent\Collection;

class GetCryptoAssetsService
{
    public function execute(): Collection
    {
        //->filter(request(['search']))
        //->paginate(10)
        return CryptoAsset::all();
    }
}
