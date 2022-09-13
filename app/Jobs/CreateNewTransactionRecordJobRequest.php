<?php

namespace App\Jobs;

use App\Models\CryptoAsset;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function PHPUnit\Framework\throwException;

class CreateNewTransactionRecordJobRequest
{

    private User $user;
    private CryptoAsset $cryptoAsset;
    private string $transactionType;
    private int $quantity;

    public function __construct(User $user, CryptoAsset $cryptoAsset, string $transactionType, int $quantity)
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
                    $this->quantity,
                    $this->cryptoAsset,
                )));
                $asset = auth()->user()->cryptoAssets()->where('crypto_asset_id', '=', $this->cryptoAsset->id)->get();
                return $asset[0]->pivot;
            }

            $fields = [
                'owned' => $asset[0]->pivot->owned + $this->quantity,
            ];
            $asset[0]->pivot->update($fields);
            return $asset[0]->pivot;
        }

        $asset = auth()->user()->cryptoAssets()->where('crypto_asset_id', '=', $this->cryptoAsset->id)->get();
        if ($asset[0]->pivot->owned <= $this->quantity) {
            dd('error');
        }

        $fields = [
            'owned' => $asset[0]->pivot->owned - $this->quantity,
        ];
        $asset[0]->pivot->update($fields);
        return $asset[0]->pivot;
    }

    public function getTransactionType(): string
    {
        return $this->transactionType;
    }
}
