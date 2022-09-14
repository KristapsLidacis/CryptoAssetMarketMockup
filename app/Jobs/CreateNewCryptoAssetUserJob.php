<?php

namespace App\Jobs;

use App\Models\CryptoAssetUser;
use Carbon\Carbon;

class CreateNewCryptoAssetUserJob
{
    private CreateNewCryptoAssetUserJobRequest $request;

    public function __construct(CreateNewCryptoAssetUserJobRequest $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $cryptoAssetUser = new CryptoAssetUser([
            'owned' => $this->request->getOwned(),
            'favorited_at' => Carbon::now('UTC')
        ]);
        $cryptoAssetUser->cryptoAsset()->associate($this->request->getCryptoAsset());
        $cryptoAssetUser->user()->associate(auth()->id());
        $cryptoAssetUser->save();
    }
}
