<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CryptoAssetUser extends Model
{
    protected $table = 'crypto_asset_user';
    protected $fillable = [
        'favorited_at',
        'owned'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cryptoAsset(): BelongsTo
    {
        return $this->belongsTo(CryptoAsset::class);
    }


    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
