<?php

namespace App\Jobs;

use App\Models\CryptoAssetUser;

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
        ]);
        $cryptoAssetUser->cryptoAsset()->associate($this->request->getCryptoAsset());
        $cryptoAssetUser->user()->associate(auth()->id());
        $cryptoAssetUser->save();
    }
}
