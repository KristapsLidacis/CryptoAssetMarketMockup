<?php

namespace App\Http\Controllers;

use App\Models\CryptoAsset;
use App\Services\GetCryptoAssetsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CryptoAssetController extends Controller
{
    private GetCryptoAssetsService $getCryptoAssetsService;

    public function __construct(GetCryptoAssetsService $getCryptoAssetsService)
    {
        $this->getCryptoAssetsService = $getCryptoAssetsService;
    }

    //Show all cryptocurrencies from Database
    public function index(): Factory|View|Application
    {
        return view('home', [
            'cryptoAssets' => $this->getCryptoAssetsService->execute()
        ]);
    }

    //Show individual information about cryptocurrency
    public function show(CryptoAsset $cryptoAsset): Factory|View|Application
    {
        return view('show', ['cryptoAsset' => $cryptoAsset]);
    }
}
