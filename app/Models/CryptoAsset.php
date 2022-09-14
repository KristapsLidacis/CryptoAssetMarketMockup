<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CryptoAsset extends Model
{
    protected $fillable = [
        'symbol',
        'name',
        'slug',
        'price_usd_pennies',
        'current_market_cap',
        'volume_last_day',
        'circulating_supply',
        'change_last_hour',
        'change_last_day',
        'change_last_week',
        'icon_path'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
