<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'crypto_asset_user_id',
        'transaction_type',
        'description',
        'price',
        'quantity'
    ];

}
