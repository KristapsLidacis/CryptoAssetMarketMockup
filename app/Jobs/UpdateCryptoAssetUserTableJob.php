<?php

namespace App\Jobs;

use App\Models\CryptoAssetUser;
use Carbon\Carbon;

class UpdateCryptoAssetUserTableJob
{
    private CryptoAssetUser $cryptoAssetUser;

    public function __construct(CryptoAssetUser $cryptoAssetUser)
    {
        $this->cryptoAssetUser = $cryptoAssetUser;
    }

    public function handle(): void
    {
        if(is_null($this->cryptoAssetUser->favorited_at)){
            $fields = [
                'favorited_at' => Carbon::now('UTC')
            ];
        }else{
            $fields = [
                'favorited_at' => null
            ];
        }
        $this->cryptoAssetUser->update($fields);

    }
}
