<?php

namespace App\Http\Controllers;

use App\Jobs\CreateNewTransactionRecordJob;
use App\Jobs\CreateNewTransactionRecordJobRequest;
use App\Models\CryptoAsset;
use App\Services\GetUserTransactionsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private GetUserTransactionsService $getUserTransactionsService;

    public function __construct(GetUserTransactionsService $getUserTransactionsService)
    {
        $this->getUserTransactionsService = $getUserTransactionsService;
    }

    //Show history of all user transactions
    public function index(): Factory|View|Application
    {
        return view('transactions', ['transactions' => $this->getUserTransactionsService->execute()]);
    }

    //Creates new transaction log in Data base
    public function store(CryptoAsset $cryptoAsset, Request $request)
    {
        $fields = $request->validate([
            'transactionType' => 'required',
            'quantity' => 'required'
        ]);

        dispatch(new CreateNewTransactionRecordJob(new CreateNewTransactionRecordJobRequest(
            $request->user(),
            $cryptoAsset,
            $fields['transactionType'],
            $fields['quantity']
        )));


        return redirect('/wallet');
    }
}
