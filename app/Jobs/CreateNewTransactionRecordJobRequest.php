<?php

namespace App\Jobs;

use App\Models\CryptoAsset;
use App\Models\CryptoAssetUser;
use App\Models\User;

class CreateNewTransactionRecordJobRequest
{

    private User $user;
    private CryptoAsset $cryptoAsset;
    private string $transactionType;
    private float $quantity;

    public function __construct(User $user, CryptoAsset $cryptoAsset, string $transactionType, float $quantity)
    {
        $this->user = $user;
        $this->cryptoAsset = $cryptoAsset;
        $this->transactionType = $transactionType;
        $this->quantity = $quantity;
    }

    public function getPrice(): int
    {
        return $this->cryptoAsset->price_usd_pennies;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getDescription(): string
    {
        return $this->cryptoAsset->symbol . " " . $this->cryptoAsset->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getCryptoAssetUser()
    {
        if ($this->transactionType == 'buy') {
            $asset = auth()->user()->cryptoAssets()->where('crypto_asset_id', '=', $this->cryptoAsset->id)->get();
            if (count($asset) < 1) {
                dispatch(new CreateNewCryptoAssetUserJob(new CreateNewCryptoAssetUserJobRequest(
                    $this->quantity*1000,
                    $this->cryptoAsset,
                )));
                $asset = auth()->user()->cryptoAssets()->where('crypto_asset_id', '=', $this->cryptoAsset->id)->get();
                return $asset[0]->pivot;
            }

            $fields = [
                'owned' => $asset[0]->pivot->owned + ($this->quantity*1000),
            ];
            $asset[0]->pivot->update($fields);
            return $asset[0]->pivot;
        }

        $asset = auth()->user()->cryptoAssets()->where('crypto_asset_id', '=', $this->cryptoAsset->id)->get();
        $sold = ($asset[0]->pivot->owned /1000 ) - $this->quantity;
        if ($sold < 0) {
            dd("you don't own so much crypto!");
            //Should implement throw/exception
        }

        if(!is_null($asset[0]->pivot->favorited_at) || $sold != 0){
            $fields = [
                'owned' => $sold * 1000,
            ];
            $asset[0]->pivot->update($fields);
            return $asset[0]->pivot;
        }

        return $asset[0]->pivot;
    }

    public function getTransactionType(): string
    {
        return $this->transactionType;
    }
}
