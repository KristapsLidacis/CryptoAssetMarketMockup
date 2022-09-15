<?php

namespace App\Jobs;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateNewTransactionRecordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CreateNewTransactionRecordJobRequest $request;

    public function __construct(CreateNewTransactionRecordJobRequest $request)
    {
        $this->request = $request;
    }

    public function handle()
    {

        $transaction = new Transaction([
            'crypto_asset_user_id' => $this->request->getCryptoAssetUser()->crypto_asset_id,
            'transaction_type' => $this->request->getTransactionType(),
            'description' => $this->request->getDescription(),
            'price' => $this->request->getPrice(),
            'quantity' => $this->request->getQuantity(),
        ]);
        $transaction->save();

    }
}
