<?php

namespace App\Http\Controllers;

use App\Jobs\CreateNewTransactionRecordJob;
use App\Jobs\CreateNewTransactionRecordJobRequest;
use App\Models\CryptoAsset;
use App\Models\CryptoAssetUser;
use App\Services\GetUserTransactionsService;
use Carbon\Carbon;
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

    //parāda vēsturi visām lietotāja transakcijām
    public function index(): Factory|View|Application
    {
        return view('transactions', ['transactions' => $this->getUserTransactionsService->execute()]);
    }

    public function store(CryptoAsset $cryptoAsset, Request $request)
    {
        //jāpievieno validation
        dispatch(new CreateNewTransactionRecordJob(new CreateNewTransactionRecordJobRequest(
            $request->user(),
            $cryptoAsset,
            $request->get('transactionType'),
            $request->get('quantity'),
        )));


        return redirect('/wallet');
    }
}
