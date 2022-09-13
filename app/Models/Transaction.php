<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'crypto_asset_user_id',
        'transaction_type',
        'description',
        'price',
        'quantity'
    ];

    public function cryptoUser(): BelongsTo
    {
        return $this->belongsTo(CryptoAssetUser::class);
    }
}
